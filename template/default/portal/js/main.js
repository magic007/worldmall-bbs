//autoSwitch();

function textareasize(obj, op) {

	if(!op) {
		if(obj.scrollHeight > 70) {
			obj.style.height = (obj.scrollHeight < 300 ? obj.scrollHeight : 300) + 'px';
			if(obj.style.position == 'absolute') {
				obj.parentNode.style.height = obj.style.height;
			}
		}
	} else {
		if(obj.style.position == 'absolute') {
			obj.style.position = '';
			obj.style.width = '';
			obj.parentNode.style.height = '';
		} else {
			obj.parentNode.style.height = obj.parentNode.offsetHeight + 'px';
			obj.style.width = BROWSER.ie > 6 || !BROWSER.ie ? '90%' : '600px';
			obj.style.position = 'absolute';
		}
	}
}






var listcheck = $('[type=checkbox][name=checklist]');
$('[type=checkbox][name=selectall]').click(function(){
	if($(this)[0].checked){
		 listcheck.attr('checked', true);
		  }else{
		 listcheck.attr('checked', false);
	}
});


$('.order .view_order').click(function(t){
	listcheck.url = 'index.php?app=cashier&order_id=';
	listcheck.val = '';
	listcheck.each(function(s){
		if(listcheck.eq(s)[0].checked){
			listcheck.val += listcheck.eq(s).val()+',';
		}
		});
	listcheck.val = listcheck.val.substr(0,listcheck.val.length-1);
	if(listcheck.val){
		document.location.href = listcheck.url+listcheck.val+'&pt=cl';
	}
});




//充值取消
$('.recharge .recall').each(function() {
    $(this).click(function() {
        if (!confirm(lang.confirm_remove_account)) {
            return false
        } else {
            var url = $(this).attr('url');
            var rdata;
            $.ajax({
                async: false,
                type: "POST",
                url: url,
                dataType: 'json',
                success: function(retdata) {
                    rdata = retdata
                }
            });
            if (rdata.isok) {
                $(this).parents('tr').hide();
                return true
            } else {
                alert(rdata.msg);
                return false
            }
        }
    })
});


//订单详细
var ORDER_LIST = $('.order');
ORDER_LIST.pr = ORDER_LIST.find('.order_details');
ORDER_LIST.point = ORDER_LIST.find('dd.bor-none>img');
ORDER_LIST.i=0;//当前展开的内容
//ORDER_LIST.pr.eq(ORDER_LIST.i).show();//加载显示默认内容
ORDER_LIST.point.each(function(s){
		$(this).click(function(){//按键单击
			var t= $(this);
			t.parent().addClass('po_re');
			ORDER_LIST.order_details=ORDER_LIST.pr.eq(s);
			ORDER_LIST.plugin={
				closeContent:function(){
					ORDER_LIST.order_details.find('.close').add('.r').bind('click',function(){
						ORDER_LIST.plugin.b(t);
						ORDER_LIST.order_details.hide();//单击关闭隐藏显示内容
					});
				},
				a:function(d){d.attr('src',lang.subtract);},
				b:function(d){d.attr('src',lang.adding);}
			}
			new ORDER_LIST.plugin.closeContent;
			if(ORDER_LIST.i==s){
				var status =ORDER_LIST.order_details.toggle();
				status.is(':hidden')?ORDER_LIST.plugin.b(t):ORDER_LIST.plugin.a(t);
				return;
			}//如果当前内容是显示的，下面就不执行
			ORDER_LIST.pr.eq(ORDER_LIST.i).hide();//上一个内容层隐藏
			ORDER_LIST.order_details.show();//显示当前内容层
			ORDER_LIST.plugin.b(ORDER_LIST.point.eq(ORDER_LIST.i));//上一个内容层隐藏
			ORDER_LIST.plugin.a(t);
			ORDER_LIST.i = s;//记录当前层的位置
		});
	});
$(function(){
	var CARTBUTTOM = $('.list_add_to_cart');
	CARTBUTTOM.url = SITE_URL + '/index.php?app=cart&act=add_temp_cart';
	CARTBUTTOM.width=600;
	CARTBUTTOM.each(function(){
		$(this).bind('click',function(){
		but=$(this);
			CARTBUTTOM.id=$(this).attr('rel');
			$.getJSON(CARTBUTTOM.url+"&goods_id="+CARTBUTTOM.id,function(retdata){
				if(retdata.done)
				{
					but.attr('class','gray_btn');
					but.unbind('click');
					new wordMall.HOME.USER_CARTSTATE;
					but.html("已加入");				
				}
				else
				{
					alert(retdata.msg);
				}
				});

			//ajax_form(CARTBUTTOM.id, CARTBUTTOM.title,CARTBUTTOM.url, CARTBUTTOM.width);
			});
		});
});

$('*[ectype="dialog"]').click(function() {
        var id = $(this).attr("dialog_id");
        var title = $(this).attr("dialog_title") ? $(this).attr("dialog_title") : "";
        var url = $(this).attr("uri");
        var width = $(this).attr("dialog_width");
        ajax_form(id, title, url, width);
        return false
    });


$("document").ready(function(){
	new wordMall.HOME.init();
});

var wordMall = Object();
wordMall.HOME = {
	init:function(){
		if(wordMall.is_page==null){
			wordMall.is_page = 'HOME';
		}

		//公用函数
		wordMall.HOME.USER_MYCART_TOGGLE();
		wordMall.HOME.USER_SEARCH();
		


		if(wordMall.is_page=='HOME'){
			new wordMall.HOME.FLASHautoSwitch;
			new wordMall.HOME.RIGHTSWITCH;
		}else if(wordMall.is_page=='BRAND_USER'){
			new wordMall.HOME.HOME_NOUN;
		}
		else if(wordMall.is_page=='GOODS_INFO'){
			new wordMall.HOME.COMMENTSUBMIT;
		}else if(wordMall.is_page=='GOODS_CART'){
			new wordMall.HOME.CARTCHECKED;
			new wordMall.HOME.CARTSAVEORDER;
			new wordMall.HOME.CARTTEXS;
			}

		if(wordMall.is_page=='GOODS_CART' || wordMall.is_page=='GOODS_INFO'){
			wordMall.HOME.GOODSADDNUM();
		}

		if(wordMall.is_page=='BRAND_USER' || wordMall.is_page=='GOODS_INFO'){
			wordMall.HOME.LEFTTREE();
		}
		//搜索框商品和品牌
		$(".search_type .pitch_up li").html($(".search_type .toselect .curr a").html()+"<span>三角形</span>");
		$(".search_type .toselect .curr").hide();
		
		$(".search_type").mouseover(function(){	
		$(this).find('.toselect').show();
    	});
		$(".search_type").mouseout(function(){	
		$(this).find('.toselect').hide();
   		 });
		$(".search_type .toselect li a").click(function(){	
		$(".search_type #act").val($(this).attr('val'));
		$(".search_type .toselect .curr").show();
		$(".search_type .toselect .curr").removeClass();
		$(this).parent().addClass("curr");
		$(".search_type .pitch_up li").html($(".search_type .toselect .curr a").html()+"<span>三角形</span>");
		$(".search_type .toselect .curr").hide();
		$(".search_type .toselect").hide();
    	});
		
		},//首页幻灯切换
	FLASHautoSwitch:function(){
		var AUTOOBJ = Object();
		AUTOOBJ.i = 0;
		AUTOOBJ.Min = 0;
		AUTOOBJ.Max = 3;
		AUTOOBJ.a = $(".flashbox");
		AUTOOBJ.LI = AUTOOBJ.a.find('ul li');
		AUTOOBJ.DIV = AUTOOBJ.a.find('div div');
		AUTOOBJ.LI.hover(function(){
			clearTimeout(AUTOOBJ.t);
			AUTOOBJ.LI.removeClass('selected');
			AUTOOBJ.DIV.hide();
			AUTOOBJ.TIME = $(this).index();
			AUTOOBJ.DIV.eq(AUTOOBJ.TIME).fadeIn("fast");
			AUTOOBJ.i = AUTOOBJ.TIME+1;
			},function(){
				$(this).addClass('selected');
				AUTOOBJ.t = setTimeout("AUTOTIME()",3000);
		});
		AUTOTIME = function(){
			if(AUTOOBJ.i>AUTOOBJ.Max){AUTOOBJ.i = 0;}
			AUTOOBJ.LI.removeClass('selected');
			AUTOOBJ.LI.eq(AUTOOBJ.i).addClass('selected');
			AUTOOBJ.DIV.hide("");
			AUTOOBJ.DIV.eq(AUTOOBJ.i).fadeIn("fast");
			AUTOOBJ.i++;
		AUTOOBJ.t = setTimeout("AUTOTIME()",3000);
		}

		AUTOTIME();
		},//重新得到购物车数据
		USER_CARTSTATE:function(){			 
			var URL = '/index.php?app=cart&act=get_carts';			
				$.get(URL, {rec_id: 1},function(data) {				
					$(".mycart>dl>dd").html(data);
				});					
		},
		USER_CARTDELETE:function(){			
			var DEL = $(".mycart");
			DEL.C = DEL.find(".settlement");
			DEL.EM = DEL.C.find("em");
			DEL.STRONG = DEL.C.find("strong");
			DEL.URL = SITE_URL + "/index.php?app=cart&act=drop";
			DEL.EM.num = parseInt(DEL.EM.text());
			DEL.PIRCES = parseFloat(DEL.STRONG.text()).toFixed(2);
			DEL.CREAR=function(){
			DEL.STRONG.text(parseFloat(DEL.PIRCES).toFixed(2));
						if(DEL.PIRCES>DEL.NEWPIRCE){DEL.PIRCES--;}
			}
			DEL.find('.del').each(function(){
				$(this).click(function() {
					DEL.P = parseFloat($(this).attr('rel')).toFixed(2);
					DEL.REL = parseInt($(this).attr('url'));
					$.getJSON(DEL.URL, {rec_id: DEL.REL},function(data) {
						DEL.EM.text(data.retval.cart.quantity);
						DEL.STRONG.text(parseFloat(data.retval.cart.amount).toFixed(2));
						});
					$(this).parents('li').slideUp('show',
					function() {
						DEL.NEWPIRCE = DEL.PIRCES - DEL.P;
						//if(DEL.EM.num==0){DEL.PIRCES='0.00';}
						//DEL.CREARTIME = setInterval(DEL.CREAR, (1000 / DEL.NEWPIRCE*9));
					});
				});
			});
			return false;
			$(".close").click(function(){
				$(this).parents(".login").hide();
			});
			}
		,//网站头部购物车
	USER_MYCART_TOGGLE:function(){
		var S = function(Obj){			
			Obj.find('dt').hover(function(){
			new wordMall.HOME.USER_CARTDELETE;
			Obj.find('dd').slideDown(100).add(Obj).mouseleave(function(){Obj.find('dd').slideUp();});
			});
			}
		S.userObj = $('.user');
		S.mycartObj =  $('.mycart');
		S(S.userObj);
		S(S.mycartObj);
		},//标签切换
	RIGHTSWITCH:function(){
		NORTHALLSWITCH = function(MAINOBJ,CLASS,ELEMENT){
		MAINOBJ.MENUOBJ = MAINOBJ.find('.cswitch-menu li');
		MAINOBJ.superiority_MAIN = MAINOBJ.find('.cswitch-content');
			MAINOBJ.MENUOBJ.each(function(){
			$(this).hover(function(){
				MAINOBJ.SUM = $(this).index();
				MAINOBJ.superiority_MAIN.hide().eq(MAINOBJ.SUM).show();
				MAINOBJ.MENUOBJ.MENU = MAINOBJ.MENUOBJ;
				if(ELEMENT)
				MAINOBJ.MENUOBJ.MENU = MAINOBJ.MENUOBJ.find('a');
				MAINOBJ.MENUOBJ.MENU.removeClass(CLASS);
				MAINOBJ.MENUOBJ.MENU.eq(MAINOBJ.SUM).attr('class',CLASS);
				},function(){
					if(ELEMENT)
					MAINOBJ.MENUOBJ.MENU =$(this).find('a');
					MAINOBJ.MENUOBJ.MENU.eq($(this).index()).attr('class',CLASS);});
			});
		}
		var MAINOBJ = $('.cswitch');
		NORTHALLSWITCH(MAINOBJ,'current',1);
		MAINOBJ.OBJA = $('.obja');
		NORTHALLSWITCH(MAINOBJ.OBJA,'hovertab','');
		MAINOBJ.OBJB = $('.objb');
		NORTHALLSWITCH(MAINOBJ.OBJB,'hovertab','');
		MAINOBJ.OBJC = $('.about');
		NORTHALLSWITCH(MAINOBJ.OBJC,'current',1);
	},//品牌页左侧滑动
	LEFTTREE:function(){
		var OBJ = $('.tree li h5');
		var OBJUL = $('.tree li ul');
		$(".tree li ul:not(:first)").hide();
		OBJ.bind('click',function(){
			OBJUL.slideUp("fast");
			$(this).next('ul').slideToggle('fast').siblings('ul').slideUp("fast");
		});
	},//品牌页，详细切换与加入收藏
	HOME_NOUN:function(){
		$obj = $('.btn-link a');
		$obj.list = $('.brand_list');
		$obj.introduction = $('.brand_introduction');
		$obj.eq(0).click(function(){
			$obj.introduction.hide("show");
			$obj.list.show("show");
		}

		);
		$obj.eq(1).click(function(){
			$obj.list.hide("show");
			$obj.introduction.show("show");
		});
		$obj.eq(2).click(function(){
				var ctrl = (navigator.userAgent.toLowerCase()).indexOf('mac') != -1 ? 'Command/Cmd': 'CTRL';
				if (document.all) {
					window.external.addFavorite(document.location.href, document.title)
				} else if (window.sidebar) {
					window.sidebar.addPanel(document.title, 'http://www.wordmall.cn', "")
				} else {
					alert(lang.add_to_favorites)
				}
	   });
	},//商品详细有用无用提交
	COMMENTSUBMIT:function(){
			$('span a[name="item-feedback-useful"]').click(
				function(){
					var obj = $(this);
					obj.objRel = obj.attr('rel');
					obj.rels = obj.attr('rels');
					obj.Parent = obj.parent().attr('rel');
					obj.tirVal = obj.parent().attr('tir');
					sub_useful(obj.objRel,obj.Parent,obj,obj.tirVal,obj.rels);
				}
			);
			sub_useful=function(i,b,o,t,useful) {
				var a = SITE_URL + "/index.php?app=goods&act=comment_add&ajax=1";
				$.getJSON(a, {
					id: i,
					item_id: b,
					type:t,
					useful:useful
				},
				function(data) {
				var msg = data.msg;
				var is_succ = data.retval.is_succ;
				if (is_succ==2) {
					alert(lang.you_have_voted_a);
				}else if(is_succ==3){
					alert(lang.please_login_to_vote);
				}else{
					o.css('color','#E00E12').find('em').text("("+data.retval.useful_num+")");
				}})
			}
		},//首页搜索
		USER_SEARCH:function(){
			$OBJ = $('.search-header input[name="keyword"]');
			$OBJ.ISCLICK = 0;
			$OBJ.click(function(){
				if($OBJ.ISCLICK==0)
				$(this).val('');
				$OBJ.ISCLICK++;
			});
		},//增加购物数量
		GOODSADDNUM:function(){
			var thisObj = Object();
			thisObj.toggles = function(l) {
				if (l) {
					if (thisObj.thisVal > -1) {
						thisObj.thisTr.addClass('tb-selected');
						thisObj.thisTdEm.show();
					}
				} else {
					if (thisObj.thisVal < 1) {
						thisObj.thisTr.removeClass('tb-selected');
						thisObj.thisTdEm.hide();
					}
				}
			}
			$('.add_num').each(function() {
				$(this).click(function() {
					var isadd = $(this).attr('rel');
					if (wordMall.is_page == 'GOODS_INFO') {
						//thisObj.thisTr = $(this).parent('td').parent('tr').find('td:first');
						thisObj.thisTr = $(this).parent('dd').prev().prev().prev().prev().prev().prev();
						thisObj.thisTdEm = thisObj.thisTr.find('em');
					}
					if (isadd == '1') {
						thisObj.obj = $(this).next('input');
						thisObj.thisVal = parseInt(thisObj.obj.val());

						if (thisObj.thisVal > 0) {
							thisObj.obj.val(--thisObj.thisVal);
						}
						if (wordMall.is_page == 'GOODS_INFO') {
							thisObj.toggles();
						}else if(wordMall.is_page == 'GOODS_CART'){
							thisObj.obj.keyup();
							/*if(thisObj.thisVal==0){
							thisObj.obj.val(++thisObj.thisVal);
							}*/
						}

					} else {
						thisObj.obj = $(this).prev('input');
						thisObj.thisVal = parseInt(thisObj.obj.val());
						thisObj.obj.val(++thisObj.thisVal);
						if (wordMall.is_page == 'GOODS_INFO') {
							thisObj.toggles(true);
						}else if(wordMall.is_page == 'GOODS_CART'){
							thisObj.obj.keyup();
						}
					}

				});
			});
			},//购物车全选反选+复选删除
			CARTCHECKED:function(){
				$('[type=checkbox]:checkbox').each(function(){
					$(this).click(function(){
						var thisName = $(this).attr('name');

						if(thisName=='checkboxitem'){
								var	tableObj = $(this).parents("table");
								tableObj.check = tableObj.find("input[type=checkbox][name=checkbox]");
								tableObj.listCheck = tableObj.find("input[type=checkbox][name=checkboxitem]:checked").size();
								if(!tableObj.listCheck)tableObj.check.removeAttr('checked');
							return;
						}else if(thisName=='checkbox'){
							var store_id=$(this).nextAll("[name='store_check']").val();
							var addr_id=$("[name='address_options']").val();
							if($(this)[0].checked){
								$(this).parents('table').find('[name=checkboxitem]:checkbox').attr('checked', true);
								$.ajax({
									async:false,
									type:'POST',
									url:"index.php?app=cart&act=ajax_getdata&store_id="+store_id,
									dataType:'json',
									success:function(ret){
										var orders_amount=0;
										$("#shipping_"+store_id+"type").attr('rel',ret.retval[store_id].all_weight);		//修改相关的rel属性
										set_goods_money(store_id,ret.retval[store_id].goods_amount);
										ship_price_change(store_id);
																	 

										total_amount_change();
									   
									   		for(huipi in ret.retval.huipi_info)
									   		{
												set_huipi_element(huipi,ret.retval.huipi_info[huipi]['huipi_ok']);
											}
										}
									});

							}else{
								var orders_amount=get_total_money();
								var order_money=get_order_money(store_id);
								orders_amount=orders_amount-order_money;
								$("#shipping_"+store_id+"type").attr('rel',0);		//修改相关的price和rel属性
								set_ship_money(store_id,0);
								set_goods_money(store_id,0);
								set_order_money(store_id,0);
								set_total_money(orders_amount);					
								$(this).parents('table').find('[name=checkboxitem]:checkbox').attr('checked', false);
							}
							return;
						}else{
							var store_ids="";
							var store_id_arr=new Array();
							$("[name='store_check']").each(function(){
								store_id_arr.push($(this).val());
								});
							store_ids=(store_id_arr.length !== 0)?store_id_arr.join():"";
							var addr_id=$("[name='address_options']").val();
							if($(this)[0].checked){
								$.ajax({
									async:false,
									type:'POST',
									url:"index.php?app=cart&act=ajax_getdata&addr_id="+addr_id,
									dataType:'json',
									success:function(ret){
										var orders_amount=0;
									  for(index in store_id_arr)
									  {	
										  store_id=store_id_arr[index];
										  $("#shipping_"+store_id+"type").attr('rel',ret.retval[store_id].all_weight);		//修改相关的rel属性
										  set_goods_money(store_id,ret.retval[store_id].goods_amount);
										  ship_price_change(store_id);
									  }
									  
									   $('[type=checkbox]:checkbox').attr('checked', true);
									   		for(huipi in ret.retval.huipi_info)
									   		{
												set_huipi_element(huipi,ret.retval.huipi_info[huipi]['huipi_ok']);
											}
										}
									});

								 
							}else{
								for(index in store_id_arr)
								{	
								  store_id=store_id_arr[index];
								  set_ship_money(store_id,0);
								  set_goods_money(store_id,0);
								  set_order_money(store_id,0);
								  $("#shipping_"+store_id+"type").attr('rel',0);		//修改相关的price和rel属性
								}
								 set_total_money(0);
								 $('[type=checkbox]:checkbox').attr('checked', false);
							}
						}
					});
				});

				$("#goods_del").click(function(){
						//获取被选中的商品ID列表
					var goods_ids="";											
					$(".distribution [name='checkboxitem']:checked").each(function(){
					goods_ids+=$(this).attr('gid')+",";
					});
					goods_ids=(goods_ids !== '')?goods_ids.substring(0,goods_ids.length-1):"";
					
					   $.getJSON("index.php?app=cart&act=drop_select_goods&goods_id_select="+goods_ids,
						  function(h) {		
							  if (h.done) {
								  
								  if ($(".distribution [name='checkboxitem']:checked").size() == $(".distribution [name='checkboxitem']").size()) {									  window.location.reload();
								  } else {
									  
									  $("[ectype='store_order']").each(function(){
										 var sel_goods=$(this).find("[name='checkboxitem']:checked");
										 var no_sel_goods=$(this).find("[name='checkboxitem']");
										 var store_id=$(this).attr('store_id');
										 var ship_type=$("#shipping_"+store_id+"type");									//店铺配送方式	
										  if(sel_goods.size()==no_sel_goods.size())
										  {
											  $(this).remove();
										  }
										  else
										  {
											  sel_goods.each(function(){
												 $("#cart_item_" + $(this).attr("gid")).remove();;	  
												  });
											  set_goods_money(store_id,0);
											  ship_type.attr('rel',0);
											  ship_price_change(store_id);
										  }
										  
									  });
										  

							  }
					    }
						else
						{
							alert(h.msg);
						}
					 });
/*					$('[name=checkboxitem]:checkbox').each(function(){
						if($(this)[0].checked){
							$(this).next('input').keyup();
						}
					});
*/
				});
				

			},//保存订单
			CARTSAVEORDER:function(){
				var order_id = '';
				var sub_order_err=true;
				$('input[name=submitorder]').click(function() {
					var orders_number=get_orders_count();
					var orders_amount=get_total_money();
					if(confirm("您将生成"+orders_number+"个订单,所有订单总价为:"+price_format(orders_amount)+",您确认提交订单?")==false)
					{
						return;
					}
					
					if(parseFloat($("#total_orders").attr("price"))==0)
					{
					alert("当前商品总价为0,无法提交订单！");
					return;
					}

					var address_options = $('input[@type=radio][name=address_options][checked]').val();
					var store_num = $('input[name=store_check]').index();
					var i = 1;
					var is_no_huipi = false;
					$('input[name=store_check]').each(function() {
						if (!check_order(parseInt($(this).val()), address_options)) {
							is_no_huipi = true;
							return false
						}
					});
					if (is_no_huipi) {
						is_no_huipi = false;
						return false
					}
					$('input[name=store_check]').each(function() {
						
						if(sub_order_err)
						{
						 sub_order_err=sub_order(parseInt($(this).val()), address_options, store_num, i);
						  i++;
						  
						}
					})
					sub_order_err=true;
				});
				function check_order(store_id, address_options) {
					var re;
					var goods_ids="";
					$(".distribution [name='checkboxitem']:checked").each(function(){
						goods_ids+=$(this).attr('gid')+",";
						});
					goods_ids=(goods_ids !== '')?goods_ids.substring(0,goods_ids.length-1):"";
					goods_ids="&goods_ids="+goods_ids;
					
					$.ajax({
						async: false,
						type: "POST",
						url: "index.php?app=cart&act=Ajax_check_order_huipi&goods=cart&store_id=" + store_id,
						dataType: 'json',
						data:goods_ids,
						success: function(retdata) {
							if(retdata.msg=="no_goods")
							{
							alert("当前数据已超时！");
							window.location.reload();	
							}
							if (retdata.retval.order_id == 0) {
								alert(retdata.msg);
								re = false;
								return
							} else {
								re = true;
								return
							}
						}
					});
					return re
				}
				function sub_order(store_id, address_options, num, i) {
					var CART = $('#cart_' + store_id);
					var re=true;
					CART.postscript = CART.find('textarea[name=postscript]').val();
					CART.postscript=CART.postscript.replace(lang.carteclplain,'');
					CART.shipping_id = CART.find('select[name=shipping_id]').val();
					CART.url = 'index.php?app=cashier&order_id=';
					CART.postdata = '';
					CART.postdata += ((CART.postdata == '') ? '': '&') + 'postscript=' + CART.postscript;
					CART.postdata += ((CART.shipping_id == '') ? '': '&') + 'shipping_id=' + CART.shipping_id;
					CART.postdata += ((address_options == '') ? '': '&') + 'address_options=' + address_options;
					var goods_ids="";
					$("#order"+store_id+" [name='checkboxitem']:checked").each(function(){
						goods_ids+=$(this).attr('gid')+",";
						});
					goods_ids=(goods_ids !== '')?goods_ids.substring(0,goods_ids.length-1):"";
					
					if(goods_ids==""){
						if (num != i) {
							return true;
						} else {
							window.location = CART.url + order_id.substring(0,order_id.length-1);
						}
					}
					
					CART.postdata += ((goods_ids == '') ? '': '&') + 'goods_ids=' + goods_ids;
					$.ajax({
						async: false,
						type: "POST",
						url: "index.php?app=cart&act=ajax_saver_order&goods=cart&store_id=" + store_id,
						dataType: 'json',
						data: CART.postdata,
						success: function(retdata) {
							if (!retdata.done || retdata.retval.order_id == 0) {
								alert(retdata.msg);
								re=false;
							} else {
								if (num != i) {
									order_id += retdata.retval.order_id + ','
								} else {
									order_id += retdata.retval.order_id;
									window.location = CART.url + order_id
								}
							}
						}
					});
				
					return re;
				}

			},//购物车文件框变大编辑
			CARTTEXS:function(){
				$('.explains').each(function() {
					$(this).click(function() {
						var $THIS = $(this);
						if ($THIS.val() == lang.carteclplain) {
							$THIS.val('')
						}
						$THIS.css('position','absolute');
						$THIS.animate({
							
							width: '300px',
							height: '200px'
							
						});
						$THIS.keyup(function() {});
						$THIS.blur(function() {
							
							if ($THIS.val() == '') {
								$THIS.val(lang.carteclplain)
							}
							$THIS.animate({
								width: '160px',
								height: '30px'
							});
						})
					})
				});
			}
	};
	
function addtofavorite()
{
			var ctrl = (navigator.userAgent.toLowerCase()).indexOf('mac') != -1 ? 'Command/Cmd': 'CTRL';
				if (document.all) {
					window.external.addFavorite(document.location.href, document.title)
				} else if (window.sidebar) {
					window.sidebar.addPanel(document.title, 'http://www.wordmall.cn', "")
				} else {
					alert(lang.add_to_favorites)
				}
}

var old_remarks=new Array();

function edit_remarks(order_id)
{
	var obj_remarks=$("#remarks_"+order_id);
	var obj_remarks_buff=obj_remarks.children("[name='remark_buff']");
	if(!order_id)
	{return false;}
	
	if(obj_remarks.css('display')=="none")
	{
	var url=SITE_URL+"?app=seller_order&act=ajax_get_remarks&id="+order_id;
	$.ajax({    async: false,
                type: "POST",
                url: url,
                dataType: 'json',
                success: function(ret) {
					if(ret.done)
			{
				obj_remarks_buff.val(ret.retval);
				old_remarks[order_id]=obj_remarks_buff.val();
				obj_remarks.show();
				obj_remarks_buff.focus();
				obj_remarks.click(function(){
				obj_remarks_buff.focus();});
			}
			else
			{
				alert(ret.msg);
				return;
			}		
		}
	});



	}
	else
	{
		if(old_remarks[order_id]!=obj_remarks_buff.val())
		{
		if(confirm("当前备注修改未保存,是否保存")==true)	
			{
				save_remarks(order_id);
				return;
			}
			else
			{
				obj_remarks_buff.val(old_remarks[order_id]);
				obj_remarks.hide();
			}
		}
		else
		{
			obj_remarks.hide();
		}
	}

}

function save_remarks(order_id)
{
	var remark_buff=$("#remarks_"+order_id).children("[name='remark_buff']").val();
	var info=$("#info_"+order_id);
		
		if(!order_id)
	{return false;}
	
	if(remark_buff.length>254)
	{
		if(info.html()=="保存失败,备注不能超过254个字符")
		{
		info.fadeOut(100);
		info.fadeIn(100);
		}
	info.html('保存失败,备注不能超过254个字符');	
	return;
	}
	var url=SITE_URL+"?app=seller_order&act=ajax_save_remarks&id="+order_id;
	var data="remark="+remark_buff;
	$.ajax({    async: false,
                type: "POST",
                url: url,
                dataType: 'json',
				data:data,
                success: function(ret) {
		if(info.html()==ret.retval)
		{
		info.fadeOut(100);
		info.fadeIn(100);
		}
		info.html(ret.retval);
		old_remarks[order_id]=remark_buff;
		if(remark_buff!='')
		{
		$("#remarks_ico_"+order_id).attr('src',"themes/mall/red2/styles/default/images/remarks.png");
			if($("#order_remarks").css('display')=="none")
			{
				$("#order_remarks").show();
			}
			$("#order_remarks span").html(remark_buff);
		}
		else
		{
			$("#remarks_ico_"+order_id).attr('src',"themes/mall/red2/styles/default/images/no_remarks.png");
			$("#order_remarks").hide();
		}
		}
	 });
	}

