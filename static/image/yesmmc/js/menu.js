//<![CDATA[
//全局
/* GetObj begin */
function GetObj(objName){if(document.getElementById){return eval('document.getElementById("'+objName+'")')}else if(document.layers){return eval("document.layers['"+objName+"']")}else{return eval('document.all.'+objName)}}
/* GetObj end */

/* 显示/隐藏一个容器 begin */
function hiddenObj(ObjId){GetObj(ObjId).style.display="none"}function showObj(ObjId){GetObj(ObjId).style.display="block"}
/* 显示/隐藏一个容器 end */

/* 改变className begin */
function chgClassName(ObjId,className){GetObj(ObjId).className=className}
/* 改变className end */

function showTime(){var date=new Date();var year=date.getYear();year=(year<2008)?(year+1900):year;var month=date.getMonth()+1;var day=date.getDate();var time=year+"."+month+"."+day;return time;}

/* ========== 舌签构造函数 begin ========== */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('r z=1g.1h.1i("1j")!=-1?I:9;s 6(h,j,k,l,m){5.1k="1.0";5.1l="1m";5.t=6.$(h);7(5.t==q){J B K("6(x)参数错误:x 对像存在!")};7(!6.u){6.u=B 1n()};5.x=6.u.v;6.u.17(5);5.1o=9;5.8=[];5.R=k==q?0:k;5.L=5.R;5.S=l==q?"1p":l;5.T=m==q?"":m;5.M=9;r n=U("6.u["+5.x+"].M = I");r o=U("6.u["+5.x+"].M = 9");7(z){5.t.C("V",n)}w{5.t.D("W",n,9)};7(z){5.t.C("X",o)}w{5.t.D("Y",o,9)};7(Z(j)!="1q"){j="1r"};j=j.1s();1t(j){N"V":5.y="W";E;N"X":5.y="Y";E;N"1u":5.y="1v";E;N"1w":5.y="1x";E;1y:5.y="1z"};5.18=s(a,b,c,d,e){7(6.$(a)==q){J B K("18(19)参数错误:19 对像存在!")};r f=5.8.v;7(c==""){c=q};5.8.17([a,b,c,d,e]);r g=U(\'6.u[\'+5.x+\'].F(\'+f+\')\');7(z){6.$(a).C("1A"+5.y,g)}w{6.$(a).D(5.y,g,9)};7(f==5.R){6.$(a).O=5.S;7(6.$(b)){6.$(b).A.P=""};7(c!=q){5.t.A.1a=c};7(d!=q){G(d)}}w{6.$(a).O=5.T;7(6.$(b)){6.$(b).A.P="1b"}};7(6.$(b)){7(z){6.$(b).C("V",n)}w{6.$(b).D("W",n,9)};7(z){6.$(b).C("X",o)}w{6.$(b).D("Y",o,9)}}};5.F=s(a){7(Z(a)!="10"){J B K("F(1c)参数错误:1c 不是 10 类型!")};r i;11(i=0;i<5.8.v;i++){7(i==a){6.$(5.8[i][0]).O=5.S;7(6.$(5.8[i][1])){6.$(5.8[i][1]).A.P=""};7(5.8[i][2]!=q){5.t.A.1a=5.8[i][2]};7(5.8[i][3]!=q){G(5.8[i][3])}}w 7(5.L==i){6.$(5.8[i][0]).O=5.T;7(6.$(5.8[i][1])){6.$(5.8[i][1]).A.P="1b"};7(5.8[i][4]!=q){G(5.8[i][4])}}};5.L=a};5.12=s(){7(H.v!=5.8.v){J B K("12()参数错误:参数数量与标签数量不符!")};r a=0,i;11(i=0;i<H.v;i++){a+=H[i]};r b=1B.12(),13=0;11(i=0;i<H.v;i++){13+=H[i]/a;7(b<13){5.F(i);E}}};5.Q=9;r p=q;5.14=1C;5.1D=s(a){7(Z(a)=="10"){5.14=a};1d(p);p=1E("6.u["+5.x+"].1e()",5.14);5.Q=I};5.1e=s(){7(5.Q==9||5.M==I){15};r a=5.L;a++;7(a>=5.8.v){a=0};5.F(a)};5.1F=s(){1d(p);5.Q=9}};6.$=s(a){7(16.1f){15 G(\'16.1f("\'+a+\'")\')}w{15 G(\'16.1G.\'+a)}}',62,105,'|||||this|SubShowClass|if|label|false|||||||||||||||||null|var|function|parentObj|childs|length|else|ID|eventType|isIE|style|new|attachEvent|addEventListener|break|select|eval|arguments|true|throw|Error|selectedIndex|mouseIn|case|className|display|autoPlay|defaultID|openClassName|closeClassName|Function|onmouseover|mouseover|onmouseout|mouseout|typeof|number|for|random|percent|spaceTime|return|document|push|addLabel|labelID|background|none|num|clearInterval|nextLabel|getElementById|navigator|appVersion|indexOf|MSIE|version|author|mengjia|Array|lock|selected|string|onmousedown|toLowerCase|switch|onclick|click|onmouseup|mouseup|default|mousedown|on|Math|5000|play|setInterval|stop|all'.split('|'),0,{}))
/* ========== 舌签构造函数 end ========== */
try{document.execCommand('BackgroundImageCache', false, true);}catch(e){}
//]]>

