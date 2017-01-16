var YinXiangMaDataJson = {
	token: '123',
	tabindex: 1,
	theme: 'black',
	lang: 'chinese',
	size: '8',
	style: 'style1',
	refresh_time: '300',
	type: 'image',
	apiserver: YXM_localsec_url,
	mediaserver: YXM_localsec_url,
	isAjax: YXM_isajax,
	level: YXM_level + '1'
};
YinXiangMa = new YinXiangMaObject(YinXiangMaDataJson);
YinXiangMa.initcss();
var YXM_isAjax = 0;
var YinXiangMa_size = 1;
var YXM_start_count_time = 0;
var YXM_form = null;
var YXM_validStatus = 0;
var YXM_isFirstTime = true;
var YXM_result_text = "";
var YXM_YinXiangMaData = YinXiangMaDataJson;
var YXM_temp_onsubmit = null;
var YXM_resultScript = null;
var YXM_refreshTime = 0;
var YXM_validFlag = false;
var YXM_validText = "";
var YXM_ip_script = null;
var YXM_ip_loaded = false;
var o_YXM_seccodeverify_xyz_p = null;
var o_YXM_box = null;
function YinXiangMa_init(divid) {
	if (arguments.length == 0) {
		YinXiangMa.init();
	} else {
		YinXiangMa.init(divid);
	}
}
function YinXiangMaObject(opts) {
	var YinXiangMaData = YXM_YinXiangMaData = opts;
	var so;
	YXM_isAjax = YinXiangMaData.isAjax != "undefined" && YinXiangMaData.isAjax != null ? YinXiangMaData.isAjax: 0;
	YinXiangMa_size = YinXiangMaData.size;
	this.theme = {
		"black": {
			bg: '#111',
			bd: '#111',
			fg: '#ccc',
			lk: '#ccf',
			hv: '#555',
			er: '#f00',
			ms: '#ccc',
			is: '-V2',
			ls: '-V2'
		}
	};
	this.locale = {
		"chinese": {
			"INFO": "帮助",
			"VISUAL": "切换到视频",
			"AUDIO": "声音",
			"AGAIN": "重试",
			"NEWPUZ": "刷新",
			"ANSWER": '请输入视频中<span style="margin:0; padding:1px 0; font-size:12px; line-height:16px;height:16px; color:red;display:inline;">红色</span>的字母:',
			"ANSWERIMAGE": "请输入图片中要求的文字",
			"TIMEOUTMESSAGE": "<span style='margin:0; padding:1px 0; font-size:12px; line-height:16px;height:16px; width:200px; color:red;display:inline;'>已超时，请刷新以重新获取验证码。</span>"
		}
	};
	this.size = {
		"8": {
			"w": 300,
			"h": 120
		}
	};
	this.player = {
		"width": this.size[YinXiangMaData.size].w,
		"height": this.size[YinXiangMaData.size].h,
		"file": YinXiangMaData.token
	};
	this.widget = {
		"widgetserver": YinXiangMaData.mediaserver + "images",
		"clickserver": "http://www.yinxiangma.com"
	};
	this.is_YXM_POPwindow = function() {
		return YinXiangMaData.size == "10";
	};
	this.isAjax = function() {
		return YXM_isAjax != "undefined" ? YXM_isAjax == 1 : false;
	};
	this.html = {
		"image": '<input type="hidden" name="YXM_input_result" id="YXM_input_result" value=""><input type="hidden" name="YXM_level" id="YXM_level" value="' + YinXiangMaData.level + '">' + (this.is_YXM_POPwindow() ? ('<div style="clear:both;height:0px; font-size:0px; line-hight:0px;margin:0;border:0;padding:0;"></div><div id="YXM_flow_box" tabIndex="0" style="position:absolute;display:block;visibility:hidden;height:156px; width:320px;outline:none;min-height:0;overflow:hidden;zoom:1; margin:0;border:0;padding:0;z-index:32767;" hidefocus="true" onmouseover="YXM_showPanel_onmouseover(\'div\');" onmouseout="YXM_showPanel_onmouseout(\'div\');" onfocus="YXM_showPanel_onfocus(\'div\');" onblur="YXM_showPanel_onblur(\'div\');" ><div class="YXM_flow_content_box"><span id="YinXiangMa-instr-msg"></span><div id="YinXiangMa-player-zone" style="height:121px; width:302px; margin-top:7px;margin-left:11px;background:none; "></div><a href="javascript:YinXiangMa.reload(\'\');YXM_showPanel_onfocus(\'div\');" style="display:block; height:17px; width:18px; position:absolute; top:1px; left:289px; z-index:2; background:url(' + YinXiangMaData.mediaserver + 'images/popup_refresh.png) no-repeat;"></a><a href="http://www.yinxiangma.com" target="_blank" style="display:block; cursor:point; position:absolute; width:50px; height:16px;top:1px;left:5px;"></a></div></div><input type="text" name="YinXiangMa_response" id="seccodeverify_xyz_p" style="color:#888;margin:0;border:1px solide #ccc;padding:0;height:23px; line-height:23px; font-size:14px;"  value="点击获取验证码" onfocus="YXM_showPanel_onfocus(\'input\');if(this.value!=\'点击获取验证码\'){this.style.color=\'#000\';}else{this.style.color=\'#000\';this.value=\'\';};" onblur="YXM_showPanel_onblur(\'input\');if(this.value==\'\'){this.value=\'点击获取验证码\';this.style.color=\'#888\';};"  size="20" autocomplete="off"><span id="YinXiangMa_challenge_container"><input type="hidden" name="YinXiangMa_challenge" id="YinXiangMa_challenge" value="' + YinXiangMaData.token + '">') : ('<div style="clear:both;height:0px; font-size:0px; line-hight:0px;margin:0;border:0;padding:0;"></div><div id="YinXiangMa-contenter"><div id="YinXiangMa-player-zone" style="position: relative;border:0; width:_WIDTH_px; height:_HEIGHT_px; "><a style="width:_WIDTH_px;height:_HEIGHT_px;line-height: 27px;border:0;display: block;text-align: center;position: absolute;right: 0px;top: 0px;background-position: 0 -500px;" href="http://www.yinxiangma.com" id="clickable_img" ></a></div><span id="YinXiangMa-instr-msg"></span><div id="YinXiangMa-instr-row"><dl id="YinXiangMa-instr"><dt id="YinXiangMa-link-logo"><a href="http://www.yinxiangma.com" target="_blank"  ><img src="_MEDIA_/icon_03.png"></a></span></dt><dd id="YinXiangMa-response-cell"><input type="text" name="YinXiangMa_response"  id="seccodeverify_xyz_p" style="margin-top:5px;margin-bottom:0px;font-size:12px; height:23px;border:0; line-height:23px; padding: 0;  background-color:#e8e8e8;" size="20"  autocomplete="off"><span id="YinXiangMa_challenge_container"><input type="hidden" name="YinXiangMa_challenge" id="YinXiangMa_challenge" value="' + YinXiangMaData.token + '"></span></dd> <dd id="YinXiangMa-response-button" style="width: 58px;"><a href="javascript:YinXiangMa.reload(\'\')" style="background-image:url(_MEDIA_/reload-V2.gif);" id="YinXiangMa-link-refresh" title="_NEWPUZ_"></a><a href="javascript:YinXiangMa.moreinfo(\'_JSID_\')" style="background-image:url(_MEDIA_/info-V2.gif);" id="YinXiangMa-link-info" title="_INFO_"></a></dd></dl></div></div>'))
	};
	this._bi = function(id) {
		return YinXiangMaData.id ? id + "-" + YinXiangMaData.id: id;
	};
	this._bj = function() {
		return YinXiangMaData.id ? '-' + YinXiangMaData.id: '';
	};
	this._bk = function() {
		return YinXiangMaData.id ? YinXiangMaData.id: '';
	};
	this.byid = function(id) {
		var name = this._bi(id);
		return document.getElementById(name);
	};
	this._bn = function() {
		if (!YinXiangMaData.token) {
			this.byid('YinXiangMa-player-zone').innerHTML = '<b>系统检测到您的行为不正常，不能获得授权!</b>';
			return;
		}
		if (YinXiangMaData.type == "image") {
			this.loadImageYzm();
			return;
		}
	};
	this.loadImageYzm = function() {
		try {
			document.getElementById('YinXiangMa-player-zone').innerHTML = '<div id="d_BigPic" class="" style="width:' + this.player.width + '; height:' + this.player.height + 'px; position: relative; overflow-x: hidden; overflow-y: hidden;border:' + (this.is_YXM_POPwindow() ? '1px #333 solid': '0') + ';margin:' + (this.is_YXM_POPwindow() ? '0px auto 0px': '0') + ';padding:0;"><a style="border:0;margin:0;padding:0;width:' + this.player.width + 'px;height:' + this.player.height + 'px;line-height: 27px;display: block;text-align: center;position: absolute;top: 0px; z-index:10; background:url(' + YinXiangMaData.mediaserver + 'images/transparent.gif);" target="_blank" href="' + this.widget.clickserver + '" id="clickable_img"></a><img style="border:0;padding:0;margin:0;position:absolute;z-index:3;" src="' + YinXiangMaData.apiserver + 'securimage_show.php?w=' + this.player.width + '&h=' + this.player.height + '"><img id="YXMimgOnloadMessage"  style="position:absolute; top:35px; left:40%; z-index:1; " src="' + YinXiangMaData.mediaserver + 'images/' + (this.is_YXM_POPwindow() ? 'load2': 'loading') + '.gif"></div>';
			o_YXM_seccodeverify_xyz_p = document.getElementById('seccodeverify_xyz_p');
			o_YXM_box = document.getElementById('YXM_flow_box');
			this.refreshTime = new Date().getTime();
			setTimeout(function() {
				if (new Date().getTime() - YXM_refreshTime >= 300000) document.getElementById('YinXiangMa-instr-msg').innerHTML = timeOut;
			},
			300000);
			return;
		} catch(exception) {
			setTimeout("YinXiangMa.reload('');", 0);
		}
	};
	var lang = this.locale[YinXiangMaData.lang] || this.locale.chinese;
	var timeIn = YinXiangMaData.type == "video" ? lang.ANSWER: "";
	var timeOut = lang.TIMEOUTMESSAGE;
	var clickUrl = this.widget.clickserver;
	this.reload = function() {
		document.getElementById('YinXiangMa-instr-msg').innerHTML = timeIn;
		document.getElementById('seccodeverify_xyz_p').value = "";
		this._bn();
	};
	this.moreinfo = function(widget_id) {
		if (typeof(this.win) == 'undefined' || this.win.closed) {
			var url = 'http://www.yinxiangma.com/widget/widget_more_info.php?lang=' + YinXiangMaData.lang;
			this.win = window.open(url, 'POPUP', "toolbar=no,status=no,location=no,menubar=no," + "resizable=yes,scrollbars=yes,height=600,width=650", 'yes');
			this.win.focus();
			this.win.location = url;
		} else {
			this.win.focus();
		}
	};
	this._bu = function() {
		if (typeof(YinXiangMaData.theme) == 'object') return YinXiangMaData.theme;
		return this.theme[YinXiangMaData.theme];
	};
	this._bx = function() {
		var width = this.size[YinXiangMaData.size].w;
		var height = this.size[YinXiangMaData.size].h;
		var html = this.html[YinXiangMaData.type];
		var media = this.widget.widgetserver;
		var lang = this.locale[YinXiangMaData.lang] || this.locale.chinese;
		var thm = this._bu();
		var id = this._bj();
		var jsid = this._bk();
		html = html.replace(/_WIDTH_/g, width);
		html = html.replace(/_HEIGHT_/g, height);
		html = html.replace(/_ID_/g, id);
		html = html.replace(/_JSID_/g, jsid);
		html = html.replace(/_SUFFIX_/g, (thm.is || '-bk'));
		html = html.replace(/_LOGOSUFFIX_/g, (thm.ls || '-bk'));
		html = html.replace(/_MEDIA_/g, media);
		html = html.replace(/_ANSWERIMAGE_/g, lang.ANSWERIMAGE);
		html = html.replace(/_ANSWER_/g, lang.ANSWER);
		html = html.replace(/_NEWPUZ_/g, lang.NEWPUZ);
		html = html.replace(/_AUDIO_/g, lang.AUDIO);
		html = html.replace(/_VISUAL_/g, lang.VISUAL);
		html = html.replace(/_INFO_/g, lang.INFO);
		return html;
	};
	this._by = function(opts) {
		if (!opts) return;
		if (opts.lang in this.locale) {
			YinXiangMaData.lang = opts.lang;
		}
		if (opts.size in this.size) {
			YinXiangMaData.size = opts.size;
		}
		if ((opts.theme in this.theme) || (typeof(opts.theme) == 'object')) {
			YinXiangMaData.theme = opts.theme;
		}
		if (opts.tabindex) {
			YinXiangMaData.tabindex = opts.tabindex;
		}
		YinXiangMaData.id = opts.id;
	};
	this.initcss = function() {
		this._by(YinXiangMaData);
		if (this.byid('YinXiangMa_response')) {
			return;
		}	
		
		if(document.createStyleSheet){//IE
			document.createStyleSheet(YinXiangMaData.apiserver+"yinxiangma.css");
		}
		else{//FF
			var my_link = document.createElement("link");
			my_link.setAttribute("type","text/css");
			my_link.setAttribute("rel","stylesheet");
			my_link.setAttribute("href",YinXiangMaData.apiserver+"yinxiangma.css");
			document.getElementsByTagName("head")[0].appendChild(my_link);
		}

	};
	this.init = function(divid) {
		this._by(YinXiangMaData);
		if (this.byid('YinXiangMa_response')) {
			return;
		}
		if (arguments.length == 0) {
			document.getElementById('YXM_here').outerHTML = this._bx();
			this._bn();
			o_YXM_seccodeverify_xyz_p = document.getElementById('seccodeverify_xyz_p');
			o_YXM_box = document.getElementById('YXM_flow_box');
			if (YinXiangMaData.isAjax == 1) setTimeout("YXM_onTextChanged()", 1000);
		} else {
			if (document.readyState == 'loaded' || document.readyState == 'complete' || YXM_start_count_time < 50) {
				var div = document.getElementById(divid);
				if (div) {
					div.innerHTML = this._bx();
					this._bn();
					o_YXM_seccodeverify_xyz_p = document.getElementById('seccodeverify_xyz_p');
					o_YXM_box = document.getElementById('YXM_flow_box');
					if (YinXiangMaData.isAjax == 1) setTimeout("YXM_onTextChanged()", 1000);
				} else {
					setTimeout("YinXiangMa_init('" + divid + "');", 1000);
					return;
				}
			}
		}
		if (YinXiangMaData.isAjax == 1) setTimeout("YXM_onTextChanged()", 1000);
		var tempnode = this.byid('YinXiangMa-player-zone');
		while (tempnode != null) {
			if (tempnode.tagName == "form" || tempnode.tagName == "FORM") break;
			else if (tempnode.parentNode != null) tempnode = tempnode.parentNode;
			else tempnode = null;
		}
		YXM_form = tempnode;
		if (YinXiangMaData.level.charAt(0) != 1 && YinXiangMaData.level.charAt(0) != 2 && YinXiangMaData.isAjax != 1) {
			if (YXM_form != null) {
				if (YXM_form.addEventListener) {
					YXM_form.addEventListener("submit", YXM_onsubmit, false);
				} else if (YXM_form.attachEvent) {
					YXM_form.attachEvent("onsubmit", YXM_onsubmit);
				}
			}
		}
		if (this.is_YXM_POPwindow()) setTimeout(function() {
			o_YXM_seccodeverify_xyz_p.onfocus = function() {
				YXM_showPanel_onfocus('input');
				if (this.value != '点击获取验证码') {
					this.style.color = '#000';
				} else {
					this.style.color = '#000';
					this.value = '';
				};
			}
		},
		500);
	};
};
YinXiangMa_init();
function YXM_valid(text) {
	if (YXM_validStatus != 1) setTimeout("YXM_jsValidTimer('" + text + "','" + YXM_YinXiangMaData.level + "','" + YXM_YinXiangMaData.token + "');", 1);
}
function YXM_onsubmit(e) {
	if (e && e.preventDefault) e.preventDefault();
	YXM_valid(o_YXM_seccodeverify_xyz_p.value);
	if (YXM_validStatus == 1) return true;
	else return false;
}
function YXM_submit() {
	var res = "";
	if (typeof(YXM_result_text) == "undefined") res = "";
	else res = YXM_result_text;
	if (YXM_resultScript != null) YXM_resultScript.parentNode.removeChild(YXM_resultScript);
	if (YXM_YinXiangMaData.level.charAt(0) == 4) {
		if (res == "") {
			alert('验证码连接超时，请稍后再试。');
			YXM_validStatus = 0;
			return false;
		}
		if (res != "true") {
			alert('验证码不正确，请重新验证。');
			YXM_validStatus = 0;
			return false;
		}
	} else {
		document.getElementById('YXM_input_result').value = res;
	}
	YXM_validStatus = 1;
	if (typeof(YXM_form.submit) == "function") YXM_form.submit();
	else {
		var YXM_submit_temp = YXM_form.submit;
		YXM_form.removeChild(YXM_submit_temp);
		try {
			YXM_form.submit();
		} catch(err) {}
	}
}
function YXM_jsValidTimer(text, level, t) {
	if (YXM_resultScript != null && YXM_resultScript.parentNode != null) YXM_resultScript.parentNode.removeChild(YXM_resultScript);
	YXM_resultScript = document.createElement('SCRIPT');
	YXM_resultScript.setAttribute("type", "text/javascript");
	if (level.charAt(0) == 4 || level.charAt(0) == 3) {
		if (typeof(YXM_resultScript.onload) != "undefined") {
			YXM_resultScript.onload = function() {
				YXM_submit();
			};
		} else {
			YXM_resultScript.onreadystatechange = function() {
				if (this.readyState == "loaded" || this.readyState == "complete") {
					YXM_submit();
				}
			};
		}
	}
	YXM_resultScript.setAttribute("src", YXM_YinXiangMaData.apiserver + 'securimage_valid.php?c=' + text + '&l=' + level +'&t='+YXM_YinXiangMaData.token);
	var HEAD = document.getElementsByTagName("head").item(0) || document.documentElement;
	HEAD.appendChild(YXM_resultScript);
}
function is_YXM_POPwindow() {
	return YinXiangMa_size == "10";
};
function YXM_sleep(n) {
	var start = new Date().getTime();
	while (true) {
		if (new Date().getTime() - start > n) break;
	}
}
var YXM_divFocusFlag = false;
var YXM_inputFocusFlag = false;
var w3c = (document.getElementById) ? true: false;
var agt = navigator.userAgent.toLowerCase();
var ie = ((agt.indexOf("msie") != -1) && (agt.indexOf("opera") == -1) && (agt.indexOf("omniweb") == -1));
var ie5 = (w3c && ie) ? true: false;
var ns6 = (w3c && (navigator.appName == "Netscape")) ? true: false;
var op8 = (navigator.userAgent.toLowerCase().indexOf("opera") == -1) ? false: true;
function Obj(o) {
	return document.getElementById(o) ? document.getElementById(o) : o;
}
function GetXYWH() {
	var nLt = 0;
	var nTp = 0;
	var offsetParent = o_YXM_seccodeverify_xyz_p;
	while (offsetParent != null && offsetParent != document.body) {
		nLt += offsetParent.offsetLeft;
		nTp += offsetParent.offsetTop;
		offsetParent = offsetParent.offsetParent;
	}
	var Sys = {};
	var tempMargin = document.body.style.border;
	var tempPadding = document.body.style.margin;
	var tempBorder = document.body.style.padding;
	document.body.style.border = "0";
	document.body.style.margin = "0";
	document.body.style.padding = "0";
	nTp -= (o_YXM_box.offsetHeight == 0 ? 157 : o_YXM_box.offsetHeight) + 2;
	if (nTp < 0) {
		nTp += (o_YXM_box.offsetHeight == 0 ? 157 : o_YXM_box.offsetHeight) + o_YXM_seccodeverify_xyz_p.offsetHeight + 4;
	}
	o_YXM_box.style.top = nTp + "px";
	o_YXM_box.style.left = nLt + "px";
	document.body.style.border = tempMargin;
	document.body.style.margin = tempPadding;
	document.body.style.padding = tempBorder;
}
function YXM_showPanel_onfocus(e) {
	if (e == "div") YXM_divFocusFlag = true;
	else YXM_inputFocusFlag = true;
	if (typeof(o_YXM_box) != "undefined") {
		o_YXM_box.style.visibility = 'visible';
		GetXYWH();
	}
}
function YXM_showPanel_onblur(e) {
	setTimeout("YXM_showPanel_onblur_timeout('" + e + "')", 200);
}
function YXM_showPanel_onblur_timeout(e) {
	if (e == "div") YXM_divFocusFlag = false;
	else YXM_inputFocusFlag = false;
	if (! (YXM_divFocusFlag || YXM_inputFocusFlag)) {
		typeof(o_YXM_box) == "undefined" ? null: o_YXM_box.style.visibility = 'hidden';
	}
}
function YXM_showPanel_onmouseover() {
	YXM_divFocusFlag = true;
}
function YXM_showPanel_onmouseout() {
	setTimeout("YXM_divFocusFlag=false;", 200);
}
function YXM_onTextChanged() {
	try {
		if (!YXM_validFlag && YXM_YinXiangMaData.isAjax == 1 && o_YXM_seccodeverify_xyz_p) if (YXM_validText != o_YXM_seccodeverify_xyz_p.value && o_YXM_seccodeverify_xyz_p.value != '' && o_YXM_seccodeverify_xyz_p.value != '点击获取验证码') {
			YXM_validFlag = true;
			YXM_validText = o_YXM_seccodeverify_xyz_p.value;
			if (YXM_resultScript != null && YXM_resultScript.parentNode != null) YXM_resultScript.parentNode.removeChild(YXM_resultScript);
			YXM_resultScript = document.createElement('SCRIPT');
			YXM_resultScript.setAttribute("type", "text/javascript");
			if (typeof(YXM_resultScript.onload) != "undefined") {
				YXM_resultScript.onload = function() {
					YXM_onTextChanged_callback();
				};
			} else {
				YXM_resultScript.onreadystatechange = function() {
					if (this.readyState == "loaded" || this.readyState == "complete") {
						YXM_onTextChanged_callback();
					}
				};
			}
			YXM_resultScript.setAttribute("src", YXM_YinXiangMaData.apiserver + 'securimage_valid.php?c=' + YXM_validText + '&l=' + YXM_YinXiangMaData.level +'&t='+YXM_YinXiangMaData.token);
			var HEAD = document.getElementsByTagName("head").item(0) || document.documentElement;
			HEAD.appendChild(YXM_resultScript);
		} else {
			if (YXM_validText != '' && (o_YXM_seccodeverify_xyz_p.value == '' || o_YXM_seccodeverify_xyz_p.value == '点击获取验证码')) {
				YXM_validText = o_YXM_seccodeverify_xyz_p.value;
				if (typeof(YXM_valided_false) != "undefined" && typeof(YXM_valided_false) == "function") {
					YXM_valided_false();
				}
			}
			YXM_validFlag = false;
			setTimeout("YXM_onTextChanged()", 1000);
		}
	} catch(ex) {
		YXM_validFlag = false;
		setTimeout("YXM_onTextChanged()", 1000);
	}
}
function YXM_onTextChanged_callback() {
	try {
		var res = "";
		if (typeof(YXM_ajax_result) == "undefined") res = "";
		else res = YXM_ajax_result;
		document.getElementById('YXM_input_result').value = YXM_result_text;
		if (YXM_resultScript != null) YXM_resultScript.parentNode.removeChild(YXM_resultScript);
		if (res == "true") {
			if (typeof(YXM_valided_true) != "undefined" && typeof(YXM_valided_true) == "function") {
				YXM_valided_true();
			}
		} else {
			if (typeof(YXM_valided_false) != "undefined" && typeof(YXM_valided_false) == "function") {
				YXM_valided_false();
			}
		}
		YXM_validFlag = false;
		setTimeout("YXM_onTextChanged()", 1000);
	} catch(ex) {
		YXM_validFlag = false;
		setTimeout("YXM_onTextChanged()", 1000);
	}
}