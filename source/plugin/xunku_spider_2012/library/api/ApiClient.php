<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
/*
 * Elife Client:负责系统间底层通信
 */
class ApiClient {
	
	/*
	 * @param string $_apiUrl 接口地址
	 */
	protected $_apiUrl = '';
	
	/*
	 * @param string $_publicKey 通信公钥
	 */
	protected $_publicKey = '';
	
	/*
	 * @param string $_secretKey 通信密钥
	 */
	protected $_secretKey = '';
	
	/*
	 * @param string $_format 返回数据格式
	 */
	protected $_format = '';
	
	/*
	 * 初始化操作
	 */
	public function __construct() {
		global $xk_publickey,$xk_ownkey,$xk_config;
		$this->_apiUrl = $xk_config['server_path'];
		$this->_publicKey = $xk_publickey;
		$this->_secretKey = $xk_ownkey;
		$this->_format = 'json';
	}
	
	/*
	 * 接口调用
	 */
	public function execute($apiMethod,$apiParams) {
		$systemParams = $this->_getSystemParams($apiMethod);
		$systemParams['sign'] = $this->_generateSign(array_merge($systemParams,$apiParams));
		$requestUrl = $this->_buildRequestUrl($apiMethod);
		foreach ($systemParams as $sysParamKey => $sysParamValue) {
			$requestUrl .= $sysParamKey."=" . urlencode($sysParamValue) . '&';
		}
		$requestUrl = substr($requestUrl, 0, -1);
		$resp = $this->_socket($requestUrl, $apiParams);
		$respWellFormed = false;
		if ("json" == $this->_format) {
			$respObject = json_decode($resp,true);
			if (null !== $respObject) {
				$respWellFormed = true;
			}
		} elseif("xml" == $this->_format) {
			$respObject = simplexml_load_string($resp);
			if (false !== $respObject) {
				$respWellFormed = true;
			}
		}
		if (false === $respWellFormed) {
			throw new Exception($apiMethod."接口返回数据不合法");
		}
		if (CHARSET == 'gbk') {
			$respObject = xkConvert($respObject,'GBK','UTF8');
		}
		return $respObject;
	}
	
	/*
	 * 处理系统参数
	 */
	protected function _getSystemParams($apiMethod) {
		$systemParams = array();
		$systemParams['pkey'] = $this->_publicKey;
		$systemParams['format'] = $this->_format;
		$systemParams['timestamp'] = time();
		return $systemParams;
	}
	
	/*
	 * 生成签名
	 */
	protected function _generateSign($buildParams) {
		ksort($buildParams);
		$stringToBeSigned = $this->_secretKey;
		foreach ($buildParams as $k => $v) {
			$stringToBeSigned .= $k.$v;
		}
		unset($k, $v);
		$stringToBeSigned .= $this->_secretKey;
		return md5($stringToBeSigned);
	}
	
	/*
	 * 生成请求行为的url 
	 */
	protected function _buildRequestUrl($method) {
		$requestUrl = rtrim($this->_apiUrl,'/').'/'.'?';
		$requestUrl .= 'action='.$method;
		return $requestUrl.'&';
	}
	
	/*
	 * curl远程请求
	 */
	protected function _curl($url, $postFields = null) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FAILONERROR, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if (is_array($postFields) && 0 < count($postFields)) {
			$postBodyString = "";
			$postMultipart = false;
			foreach ($postFields as $k => $v) {
				if("@" != substr($v, 0, 1)) {
					$postBodyString .= $k.'=' . urlencode($v) . "&"; 
				} else {
					$postMultipart = true;
				}
			}
			unset($k, $v);
			curl_setopt($ch, CURLOPT_POST, true);
			if ($postMultipart) {
				curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
			} else {
				curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString,0,-1));
			}
		}
		$response = curl_exec($ch);
		if (curl_errno($ch)) {
			throw new Exception(curl_error($ch),0);
		} else {
			$httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if (200 !== $httpStatusCode) {
				throw new Exception($response,$httpStatusCode);
			}
		}
		curl_close($ch);
		return $response;
	}

	/**
	 * socket方式请求
	 */
	 protected function _socket($url,$postField,$method = 'POST',$timeout = 5) {
		$parse = parse_url($url);
		$method = strtoupper($method);
		$data = '';
		foreach ($postField as $k => $v) {
			$data .= $k.'=' . urlencode($v) . "&"; 
		}
		if (empty($parse)) return null;
		if (!isset($parse['port']) || !$parse['port']) $parse['port'] = '80';
		if (!in_array($method, array('POST', 'GET'))) return null;
		
		$parse['host'] = str_replace(array('http://', 'https://'), array('', 'ssl://'), $parse['scheme'] . "://") . $parse['host'];

		if (function_exists('fsockopen')) {
			if (!$fp = @fsockopen($parse['host'], $parse['port'], $errnum, $errstr, $timeout)) return null;
		}elseif(function_exists('pfsockopen')) {
			if (!$fp = @pfsockopen($parse['host'], $parse['port'], $errnum, $errstr, $timeout)) return null;
		}else{
			exit('空间不支持fsockopen或者pfsockopen，请联系空间商开启');
		}
		
		$contentLength = '';
		$postContent = '';
		$query = isset($parse['query']) ? $parse['query'] : '';
		$parse['path'] = str_replace(array('\\', '//'), '/', $parse['path']) . "?" . $query;
		if ($method == 'GET') {
			substr($data, 0, 1) == '&' && $data = substr($data, 1);
			$parse['path'] .= ($query ? '&' : '') . $data;
		} elseif ($method == 'POST') {
			$contentLength = "Content-length: " . strlen($data) . "\r\n";
			$postContent = $data;
		}
		$write = $method . " " . $parse['path'] . " HTTP/1.0\r\n";
		$write .= "Host: " . $parse['host'] . "\r\n";
		$write .= "Content-type: application/x-www-form-urlencoded\r\n";
		$write .= $contentLength;
		$write .= "Connection: close\r\n\r\n";
		$write .= $postContent;
		@fwrite($fp, $write);
		$responseText = '';
		while ($data = fread($fp, 4096)) {
			$responseText .= $data;
		}
		@fclose($fp);
		$responseText = trim(stristr($responseText, "\r\n\r\n"), "\r\n");
		return $responseText;
	 }
}

?>