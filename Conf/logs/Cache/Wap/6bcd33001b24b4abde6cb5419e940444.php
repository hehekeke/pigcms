<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
       <?php if($zd['status'] == 1): echo ($zd['code']); endif; ?>

<title><?php echo ($tpl["wxname"]); ?></title>

<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta charset="utf-8">
<link href="./tpl/static/tpl/168/css/cate.css" rel="stylesheet" type="text/css" />
 <link href="./tpl/static/tpl/com/css/iscroll.css" rel="stylesheet" type="text/css" />
<style>
.banner img {width: 100%;}
  .themeStyle{ background-color:#E83407 !important; }  
</style>
<script src="./tpl/static/tpl/com/js/iscroll.js" type="text/javascript"></script>
<script type="text/javascript">
var myScroll;

function loaded() {
myScroll = new iScroll('wrapper', {
snap: true,
momentum: false,
hScrollbar: false,
onScrollEnd: function () {
document.querySelector('#indicator > li.active').className = '';
document.querySelector('#indicator > li:nth-child(' + (this.currPageX+1) + ')').className = 'active';
}
 });
 
 
}

document.addEventListener('DOMContentLoaded', loaded, false);
</script>
 
</head>

<body>
		<!--music-->
		<?php if($homeInfo['musicurl'] != false): ?><style>
.btn_music {
display: inline-block;
width: 35px;
height: 35px;
background: url('<?php echo RES;?>/images/play.png') no-repeat center center;
background-size: 100% auto;
position: absolute;
z-index: 100;
left: 15px;
top: 20px;
}
.btn_music.on {
    background-image: url("<?php echo RES;?>/images/stop.png");
}

</style>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
<script>

var playbox = (function(){
	//author:eric_wu
	var _playbox = function(){
		var that = this;
		that.box = null;
		that.player = null;
		that.src = null;
		that.on = false;
		//
		that.autoPlayFix = {
			on: true,
			//evtName: ("ontouchstart" in window)?"touchend":"click"
			evtName: ("ontouchstart" in window)?"touchstart":"mouseover"
			
		}

	}
	_playbox.prototype = {
		init: function(box_ele){
			this.box = "string" === typeof(box_ele)?document.getElementById(box_ele):box_ele;
			this.player = this.box.querySelectorAll("audio")[0];
			this.src = this.player.src;
			this.init = function(){return this;}
			this.autoPlayEvt(true);
			return this;
		},
		play: function(){
			if(this.autoPlayFix.on){
				this.autoPlayFix.on = false;
				this.autoPlayEvt(false);
			}
			this.on = !this.on;
			if(true == this.on){
				this.player.src = this.src;
				this.player.play();
			}else{
				this.player.pause();
				this.player.src = null;
			}
			if("function" == typeof(this.play_fn)){
				this.play_fn.call(this);
			}
		},
		handleEvent: function(evt){
			this.play();
		},
		autoPlayEvt: function(important){
			if(important || this.autoPlayFix.on){
				document.body.addEventListener(this.autoPlayFix.evtName, this, false);
			}else{
				document.body.removeEventListener(this.autoPlayFix.evtName, this, false);
			}
		}
	}
	//
	return new _playbox();
})();

playbox.play_fn = function(){
	this.box.className = this.on?"btn_music on":"btn_music";
}
</script>

<script type="text/javascript">
$(document).ready(function(){
	playbox.init("playbox");
	/*
	setTimeout(function() {
		// IE
		if(document.all) {
			document.getElementById("playbox").click();
		}
		// 其它浏览器
		else {
			var e = document.createEvent("MouseEvents");
			e.initEvent("click", true, true);
			document.getElementById("playbox").dispatchEvent(e);
		}
	}, 2000);
	*/
});

</script>
<span id="playbox" class="btn_music" onclick="playbox.init(this).play();"><audio id="audio" loop src="<?php echo ($homeInfo["musicurl"]); ?>"></audio></span><?php endif; ?>
	<?php if($homeInfo['switch'] == 0): ?><div class="banner">
		<div id="wrapper">
		<div id="scroller">
		<ul id="thelist">
						<?php if(is_array($flash)): $i = 0; $__LIST__ = $flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><li><p><?php echo ($so["info"]); ?></p><a href="<?php echo ($so["url"]); ?>"><img src="<?php echo ($so["img"]); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		</div>
		</div>
		<div id="nav">

		<ul id="indicator">
						<?php if(is_array($flash)): $i = 0; $__LIST__ = $flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><li <?php if($i == 1): ?>class="active"<?php endif; ?> ></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>

		</div>

		</div>
		<div class="clr"></div>
	<?php else: ?>
      <?php if($homeInfo['switch'] == 1): ?><!-- webJQ -->
<script type="text/javascript" src="tpl/Wap/default/common/js/jmquery.js" charset="utf-8"></script><!-- /webJQ -->
<!-- 我的加载器 -->
<script type="text/javascript" src="tpl/Wap/default/common/js/som-min.js" charset="utf-8"></script><!-- /我的加载器 -->
<style>
	.fn-clear:after {
		visibility: hidden;
		display: block;
		font-size: 0;
		content: "1";
		clear: both;
		height: 0;
	}
	.fn-clear {
		zoom: 1;
	}
	fieldset, img {
		border: 0;
	}
	img, object {
		vertical-align: top;
	}
	.wsdbannerbox{background:url("<?php echo ($staticPath); ?>/tpl/Wap/default/common/images/3dload.gif") no-repeat 50%;}
	.wsdbanner{overflow:hidden;background:#FFF;margin:0 auto;min-height:160px;opacity:0;position:relative;}
	.wsdbanner ul{position:relative;left:0;top:0;height:100%;}
	.wsdbanner ul li{float:left;overflow:hidden;background:#FFF;height:100%;}
	.wsdbanner ul img{width:100%;}
	.wsdbanner ul a{display:block;overflow:hidden;height:100%;}
	.wsdbanner .ui-txt{position:absolute;bottom:0;left:0;background:rgba(0,0,0,.5);z-index:1;width:100%;height:30px;line-height:30px;overflow:hidden;color:#FFF;}
	.wsdbanner .ui-txt p{padding-left:5px;}
	.wsdbanner .fn-hide{display:none;}
	.wsdbanner .ui-btn{position:absolute;bottom:10px;right:0;z-index:2;}
	.wsdbanner .ui-btn span{float:left;width:8px;height:8px;border:1px solid #CCC;background:#000;margin-right:5px;border-radius:5px;}
	.wsdbanner .ui-btn .ui-focus{border:1px solid #FFF;background:#CCC;}
	.bodyer .ui-list .ui-cur{transform:rotate(90deg);-moz-transform:rotate(90deg);-webkit-transform:rotate(90deg);-o-transform:rotate(90deg)}
</style>
<div clajavascript:;ss="wsd_page">
	<!--banner幻灯片-->
<div class="wsdbannerbox">
    <div class="wsdbanner" id="wsdBanner" data-img-list="">
       <div class="ui-txt">
       		<?php if(is_array($flash)): $i = 0; $__LIST__ = $flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p class="fn-hide" data-img-list="<?php echo ($vo["img"]); ?>" data-img-link="<?php echo ($vo["url"]); ?>"><?php echo ($vo["info"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="ui-btn"></div>
    </div>
</div>
<script type="text/javascript">
"use strict";
som.use(['js/module_phone/wsd3dBanenr.js'], function(wsd3dBanenr){
    wsd3dBanenr();
})
</script>
</div>
<?php else: endif; endif; ?>
<ul class="mainmenu">
	<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
			<a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo (htmlspecialchars_decode($vo["url"])); endif; ?>" >
				<img src="<?php echo ($vo["img"]); ?>" />
				<p><?php echo ($vo["name"]); ?></p><p></p>
			</a>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>	
</ul>
<script>
var count = document.getElementById("thelist").getElementsByTagName("img").length;	

var count2 = document.getElementsByClassName("menuimg").length;
for(i=0;i<count;i++){
 document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";

}
document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";

 setInterval(function(){
myScroll.scrollToPage('next', 0,400,count);
},3500 );
window.onresize = function(){ 
for(i=0;i<count;i++){
document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";

}
 document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";
} 


</script>

 		
<div class="copyright">
<?php if($iscopyright == 1): echo ($homeInfo["copyright"]); ?>
<?php else: ?>
<?php echo ($siteCopyright); endif; ?>
</div>  <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
<?php if($radiogroup > 8): ?><br>
<br><?php endif; ?>
<script>
function displayit(n){
	for(i=0;i<4;i++){
		if(i==n){
			var id='menu_list'+n;
			if(document.getElementById(id).style.display=='none'){
				document.getElementById(id).style.display='';
				document.getElementById("plug-wrap").style.display='';
			}else{
				document.getElementById(id).style.display='none';
				document.getElementById("plug-wrap").style.display='none';
			}
		}else{
			if($('#menu_list'+i)){
				$('#menu_list'+i).css('display','none');
			}
		}
	}
}
function closeall(){
	var count = document.getElementById("top_menu").getElementsByTagName("ul").length;
	for(i=0;i<count;i++){
		document.getElementById("top_menu").getElementsByTagName("ul").item(i).style.display='none';
	}
	document.getElementById("plug-wrap").style.display='none';
}

document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
});
</script> <style type="text/css">
body { margin-bottom:60px !important; }
a, button, input { -webkit-tap-highlight-color:rgba(255, 0, 0, 0); }
ul, li { list-style:none; margin:0;}
.top_bar { position: fixed; z-index: 900; bottom: 0; left: 0; right: 0; margin: auto; font-family: Helvetica, Tahoma, Arial, Microsoft YaHei, sans-serif; }
.top_menu { display:-webkit-box; border-top: 1px solid #b3b3b3; display: block; width: 100%; background: rgba(255, 255, 255, 0.7); height: 45px; display: -webkit-box; display: box; margin:0; padding:0; -webkit-box-orient: horizontal; background: -webkit-gradient(linear, 0 0, 0 100%, from(#e7e4e7), to(#b9b9b9)); box-shadow: 0 1px 0 0 rgba(255, 255, 255, 0.9) inset; }
.top_bar .top_menu>li { -webkit-box-flex:1; background: -webkit-gradient(linear, 0 0, 0 100%, from(rgba(0, 0, 0, 0.1)), color-stop(50%, rgba(0, 0, 0, 0.2)), to(rgba(0, 0, 0, 0.2))), -webkit-gradient(linear, 0 0, 0 100%, from(rgba(255, 255, 255, 0.1)), color-stop(50%, rgba(255, 255, 255, 0.3)), to(rgba(255, 255, 255, 0.1))); -webkit-background-size: 1px 100%, 1px 100%; background-size: 1px 100%, 1px 100%; background-position: 1px center, 2px center; background-repeat: no-repeat; position:relative; text-align:center; width:33%; }
.top_bar .top_menu>li>a { line-height:45px; display:block; text-align:center; color:#4f4d4f; text-decoration:none; text-shadow: 0 1px rgba(255, 255, 255, 0.3); -webkit-box-flex:1; }
.top_menu>li:first-child { background:none; }
.top_bar .top_menu li a label { padding:0; font-size:14px; overflow:hidden; }
.top_bar .top_menu>li>a img { display: inline-block; height: 14px; width: 14px; margin-top:-2px; color: #fff; line-height: 40px; vertical-align:middle; }
.top_bar li:first-child a { display: block; }
.menu_font { padding: 0; position: absolute; z-index: 500; bottom: 60px; right: 10px; width: 100px; margin-left:0; background: red; background: #e4e3e2; border: 1px solid #afaeaf; border-radius: 5px; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2); }
.menu_font:before, .menu_font:after { content:""; display:inline-block; position:absolute; z-index:240; bottom:0; left: 80%; margin-left:-8px; margin-bottom:-16px; width:0; height:0; border:8px solid red; border-color:#afaeaf transparent transparent transparent; }
.menu_font:after { z-index:501; border-color:#e4e3e2 transparent transparent transparent; margin-bottom:-15px; margin-left:-8px; }
.menu_font.hidden { display:none; }
.top_menu li:last-of-type a { background: none; }
.top_menu>li:last-of-type>a label { padding: 0 0 0 3px; }
.menu_font li:last-of-type { background: none; }
.menu_font li { line-height:50px; text-align:center; background:-webkit-gradient(linear, 0 0, 100% 0, from(#e4e3e2), to(#e4e3e2), color-stop(50%, #f3f3f2)), -webkit-gradient(linear, 0 0, 100% 0, from(#e4e3e2), to(#e4e3e2), color-stop(50%, #c6c5c5)); background-size:100% 1px, 100% 2px; background-repeat:no-repeat; background-position: center bottom; }
.menu_font li:first-of-type { border-top: 0; }
.menu_font li:last-of-type { border-bottom: 0; }
.menu_font li a { height: 50px; line-height: 50px !important; position: relative; color: #4f4d4f; display: block; width: 100%; text-align:center; white-space: nowrap; text-overflow: ellipsis; overflow: hidden; text-shadow: 0 1px rgba(255, 255, 255, 0.3); text-decoration: none; }
#menu_list0 { right:0; left:10px; }
#menu_list0:before, #menu_list0:after { left: 20%; }
#sharemcover { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); display: none; z-index: 20000; }
#sharemcover img { position: fixed; right: 18px; top: 5px; width: 260px; height: 180px; z-index: 20001; border:0; }
.top_bar .top_menu>li>a:hover, .top_bar .top_menu>li>a:active { background-color:#CCCCCC; }
.menu_font li a:hover, .menu_font li a:active { background-color:#CCCCCC; }
.menu_font li:first-of-type a { border-radius:5px 5px 0 0; }
.menu_font li:last-of-type a { border-radius:0 0 5px 5px; }
#plug-wrap { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0); z-index:800; }
#cate18 .device {bottom: 49px;}
#cate18 #indicator {bottom: 240px;}
#cate19 .device {bottom: 49px;}
#cate19 #indicator {bottom: 330px;}
#cate19 .pagination {bottom: 60px;}
#cate17 .device {margin-bottom: 46px;}
#cate17 #indicator {bottom: 130px;}
</style>
<div id="sharemcover" onclick="document.getElementById(&#39;sharemcover&#39;).style.display=&#39;&#39;;" style=" display:none"><img src="./style13_files/MgnnofmleM.png"></div>
<div class="top_bar" style="-webkit-transform:translate3d(0,0,0)">
  <nav>
    <ul id="top_menu" class="top_menu">
    <?php if(is_array($catemenu)): $i = 0; $__LIST__ = $catemenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a <?php if($vo['vo']){echo 'onclick="javascript:displayit('.$vo['k'].')"';}else{echo 'href="'.$vo['url'].'"';}?>><label><?php echo ($vo["name"]); ?></label></a>
        <?php if ($vo['vo']){ ?>
            <ul id="menu_list<?php echo ($vo['k']); ?>" class="menu_font" style=" display:none">
            <?php if(is_array($vo['vo'])): $i = 0; $__LIST__ = $vo['vo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo ($vo["url"]); ?>"><label><?php echo ($vo["name"]); ?></label></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
             <?php
 } ?>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </nav>
</div>
<div id="plug-wrap" onclick="closeall()" style="display: none;"></div> <?php if($home['start'] == 1): ?><style>
*{
	margin:0;
	outline:none;
}

body{
   background:#000;
}

a:link,a:visited {
	color:#FFF;
	text-decoration:none;
}

a:hover,a:active {
	color:#FFF;
	text-decoration:none;
}

#logo{
	background:url(<?php echo ($staticPath); ?>/tpl/static/home/img/lamborghini.png) no-repeat center bottom;
	background-size:100% auto;
	position:absolute;
	width:20px;
	height:50px;
	top:50px;
	left:20px;
	display:none;
}

.container{
	background:url(<?php echo ($staticPath); ?>/tpl/static/home/img/splash-bg-small.jpg) top center no-repeat #000;
	position:absolute;
	width:100%;
	max-width:640px;
	height:100%;
	background-size:100% 50%;
	z-index: 100;
	position: absolute;
	top: 0;
	left: 0px;
}

.titles{
    text-align:center;
    font:30px 'Bickham Script Pro', 'Edwardian Script ITC', 'Palace Script MT', Zapfino, cursive;
	text-shadow:0 0 30px #fff;
	color:#fff;
	margin-top:80px;
	display:none;
	width:100px;
	margin-left:60px;
}



.car{
	position:absolute;
	left:50%;
	top:90px;
	width:200px;
	height:200px;
	margin-left:-95px;
	background:url(<?php echo ($staticPath); ?>/tpl/static/home/img/lamborghiniBMW.png) no-repeat center;
	background-size:100% auto;
	z-index:1;
}

.small{
	-webkit-transform:scale(0.05);
	-moz-transform:scale(0.05);
	-ms-transform:scale(0.05);
	-o-transform:scale(0.05);
}


.door{
	position:absolute;
	left:250px;
	top:160px;
	width:545px;
	height:395px;
	opacity:0;
	z-index:2px;
}

.door.hover{
	opacity:1;

}
</style>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/home/js/jQuery.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/home/js/chinaz_com.js"></script>

<body>
<div class="container">
      <div style="display: block;" id="logo"></div>
      <div style="display: block;" class="titles">BMW</div>
      <div style="transform: scale(1);" class="car"></div>
</div>

<script type="text/javascript"> 	
	$(document).ready(function(){
	var n = 0.05;		
    
	$(".car").removeClass("small");
	var running = setInterval(function(){
		if(n<1){
		n+=0.05;
		var scale = "scale("+n+")"	
		$(".car").css({"-ms-transform":scale,
					   "-webkit-transform":scale,
					   "-moz-transform": scale,
					   "-o-transform" : scale
							});
		}
		else{
			clearInterval(running);
			fadeIn();
		}
	},70)
	
	var i = 0;

	function fadeIn(){
		$("#logo,.title").fadeIn(500,show);
	}
	
	function show(){
			
		screenAndAudio();
	}

	function screenAndAudio(){
		var closeScreen = {
			manual_off: false,
			evtName: ("ontouchstart" in window)?"touchend":"click",
			handleEvent: function(){
				if(closeScreen.manual_off){
					var playbox = parent.playbox;
					if(playbox){
						playbox.autoPlayFix.on = false;
						playbox.autoPlayEvt(false);
						playbox.play();
					}
				}
				setTimeout(function(){
					var iframe_screen = parent.document.getElementById("iframe_screen");
					iframe_screen.parentNode.removeChild(iframe_screen);
				}, 500);
			}
		}
		//
		if(closeScreen.manual_off){
			document.body.addEventListener(closeScreen.evtName, closeScreen, false);
		}else{
			closeScreen.handleEvent();
		}
		$(".container").hide();
	}
});

</script> 

<?php elseif($home['start'] == 2): ?>
		<style>
		*{
			margin:0;
		}
		html, body{
			height:100%;
		}
		.overlay{
			height:100%;
			background:<?php echo ($homeInfo["stpic"]); ?>;
			opacity:0.7; 
			position:absolute;
			z-index:100;
			width:100%;
			left:0;
			top:0;

			/*-webkit-transform-style: preserve-3d;*/
			/*-webkit-animation-name:'bg';*/
			/*-webkit-animation-duration: 1s;*/
			/*-webkit-animation-timing-function: ease-out;*/
			/*-webkit-animation-delay: 0.6s;*/
			/*-webkit-animation-iteration-count:1;//infinite*/
			/*-webkit-animation-direction: alternate;*/
		}
		.overlay>div{
			background:rgba(255,255,255,0.5);
			position:absolute;
			top:0;
			left:0;
			bottom:0;
			right:0;
			width:100%;
			margin:auto;
			height:0;

			-webkit-transform-style: preserve-3d;
			-webkit-animation-name:'open';
			-webkit-animation-duration: 1s;
			-webkit-animation-timing-function: ease-out;
			-webkit-animation-delay: 0s;
			-webkit-animation-iteration-count:1;//infinite
		-webkit-animation-direction: alternate;
		}


		@-webkit-keyframes 'open' {
			0% {
				height:0;
				-webkit-transform:rotateY(89.9deg);
			}
			50% {
				height:100%;
				-webkit-transform:rotateY(89.9deg);
			}
			100% {
				height:100%;
				-webkit-transform:rotateY(0deg);
			}
		}

		@-webkit-keyframes 'bg' {
			 0% {
				opacity:1;
			 }
			
			 100% {
				opacity:0;
			 }
		}


		
	</style>
	<script>
		window.addEventListener("DOMContentLoaded", function(){
			document.getElementById("loader1").querySelectorAll("div")[0].addEventListener("webkitAnimationEnd", function(){
				screenAndAudio();
			}, false);
		}, false);

		function screenAndAudio(){
			var closeScreen = {
				manual_off: false,
				evtName: ("ontouchstart" in window)?"touchend":"click",
				handleEvent: function(){
					if(closeScreen.manual_off){
						var playbox = parent.playbox;
						if(playbox){
							playbox.autoPlayFix.on = false;
							playbox.autoPlayEvt(false);
							playbox.play();
						}
					}
					setTimeout(function(){
						var iframe_screen = parent.document.getElementById("iframe_screen");
						iframe_screen.parentNode.removeChild(iframe_screen);
					}, 500);
				}
			}
			//
			if(closeScreen.manual_off){
				document.body.addEventListener(closeScreen.evtName, closeScreen, false);
			}else{
				closeScreen.handleEvent();
			}
			$("#loader1").hide();
		}
	</script>
</head>
<body>
	<section id="loader1" class="overlay">
		<div></div>
	</section>
</body>
</html>
<?php elseif($home['start'] == 3): ?>
		<style>
		*{
			margin:0;
		}
		html, body{
			height:100%;
		}
		.overlay{
			height:100%;
			background:<?php echo ($homeInfo["stpic"]); ?>;
			opacity:0.7;
			position:absolute;
			z-index:100;
			width:100%;
			left:0;
			top:0;

			/*-webkit-transform-style: preserve-3d;*/
			/*-webkit-animation-name:'bg';*/
			/*-webkit-animation-duration: 1s;*/
			/*-webkit-animation-timing-function: ease-out;*/
			/*-webkit-animation-delay: 0.6s;*/
			/*-webkit-animation-iteration-count:1;//infinite*/
			/*-webkit-animation-direction: alternate;*/
		}
		.overlay>div{
			background:rgba(255,255,255,0.5);
			position:absolute;
			top:0;
			left:0;
			right:0;
			bottom:0;
			width:0;
			margin:auto;
			height:100%;

			-webkit-transform-style: preserve-3d;
			-webkit-animation-name:'open';
			-webkit-animation-duration: 1s;
			-webkit-animation-timing-function: ease-out;
			-webkit-animation-delay: 0s;
			-webkit-animation-iteration-count:1;//infinite
		-webkit-animation-direction: alternate;
		}


		@-webkit-keyframes 'open' {
			0% {
				width:0;
				-webkit-transform:rotateX(89.9deg);
			}
			50% {
				width:100%;
				-webkit-transform:rotateX(89.9deg);
			}
			100% {
				width:100%;
				-webkit-transform:rotateX(0deg);
			}
		}

		@-webkit-keyframes 'bg' {
			 0% {
				opacity:1;
			 }
			
			 100% {
				opacity:0;
			 }
		}


		
	</style>
	<script>
		window.addEventListener("DOMContentLoaded", function(){
			document.getElementById("loader1").querySelectorAll("div")[0].addEventListener("webkitAnimationEnd", function(){
				screenAndAudio();
			}, false);
		}, false);

		function screenAndAudio(){
			var closeScreen = {
				manual_off: false,
				evtName: ("ontouchstart" in window)?"touchend":"click",
				handleEvent: function(){
					if(closeScreen.manual_off){
						var playbox = parent.playbox;
						if(playbox){
							playbox.autoPlayFix.on = false;
							playbox.autoPlayEvt(false);
							playbox.play();
						}
					}
					setTimeout(function(){
						var iframe_screen = parent.document.getElementById("iframe_screen");
						iframe_screen.parentNode.removeChild(iframe_screen);
					}, 500);
				}
			}
			//
			if(closeScreen.manual_off){
				document.body.addEventListener(closeScreen.evtName, closeScreen, false);
			}else{
				closeScreen.handleEvent();
			}
			$("#loader1").hide();
		}
	</script>
<body>
	<section id="loader1" class="overlay">
		<div></div>
	</section>
</body>
</html>
<?php elseif($home['start'] == 4): ?>
	<style>
	*{margin: 0;}
	body{font-size: 12px;}
</style>
	
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/home/js/jquery_min.js"></script>
</head>
<body>
	<!--自定义开场动画-->
	<div data-role="widtet" data-widget="screen_1" class="screen_1" id="screen_1">
		<style>
			.screen_1 .animation, .screen_1 .loading{position: fixed; left: 0; top: 0; width: 100%; height: 100%; min-height: 330px;  box-shadow:5px 5px 5px 10px rgba(0, 0, 0, 0.6); z-index: 9000; display: none;background: #ffffff;}
			.screen_1 .loading{background-color: #fff; display: block; text-align: center;}
			.screen_1 .loading > div{position: absolute; left: 0; top: 50%; margin-top: -32px; width: 100%; color: #fc8e65; z-index:9010;}
		</style>
		<script>
			var screen_1 = (function(){
				$.extend($.easing, {
					def: 'easeOutQuad',
					easeOutBack: function (x, t, b, c, d, s) {
						if (s == undefined) s = 1.70158;
						return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
					},
					easeOutElastic: function (x, t, b, c, d) {
						var s=1.70158;var p=0;var a=c;
						if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
						if (a < Math.abs(c)) { a=c; var s=p/4; }
						else var s = p/(2*Math.PI) * Math.asin (c/a);
						return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
					},
					easeOutExpo: function (x, t, b, c, d) {
						return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
					}
				});

				function _animation(callback){ //开场动画
					var obj = $('#screen_1_animation');
					if(obj.length){
						obj.fadeIn(1500, function(){
							$(this).animate({top: 120}, 'easeOutBack', function(){
								$(this).animate({top: 0}, 500, 'easeOutElastic');
								$('#screen_1_loading').remove();
							}).one('touchstart click', function(e){
								$(this).animate({top: '-100%'}, function(){
								$(this).remove();
							});
							if(callback) callback.call(this);
								e.preventDefault();
							});
						});
					}else{
						if(callback) callback.call(this);
					}
				}

				function screenClose(evt){
					evt.preventDefault();
					switch(evt.type){
						case "load":
						case "error":
						default:
							_animation(function(){
								setTimeout(function(){
									$("#screen_1").remove();
									try{
										var iframe_screen = parent.document.getElementById("iframe_screen");
										iframe_screen.parentNode.removeChild(iframe_screen);
									}catch(e){
										console.log(e);
									}
									delete window.screen_1;
								}, 2000);
							});
						break;
					}
				}
				return {
					screenClose: screenClose
				}
			})($);
		</script>

		<div class="loading" id="screen_1_loading">
			<div><img src="<?php echo ($staticPath); ?>/tpl/static/home/img/loading.gif" width="50" height="50" /><!--p>数据加载中..</p--></div>
		</div>
		
		<div class="animation t1" id="screen_1_animation" style="display: block; top: 0px;">
			<img src="<?php if($homeInfo['stpic'] == ''): echo ($staticPath); ?>/tpl/static/home/kcdhbj.jpg<?php else: echo ($homeInfo["stpic"]); endif; ?>" style="width:100%;min-height:100%;" onload="screen_1.screenClose(event);" onerror="screen_1.screenClose(event);">
		</div>
	</div>

</body></html>
<?php else: endif; ?>
<?php if($state == 1): endif; ?>
<!-- share -->

	<?php if(ACTION_NAME == 'index'): ?><script type="text/javascript">
			window.shareData = {  
					"moduleName":"Index",
					"moduleID": "0",
					"imgUrl": "<?php echo ($homeInfo["picurl"]); ?>", 
					"timeLineLink": "<?php echo ($f_siteUrl); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'type'=>$_GET['type'],'bid'=>$_GET['bid'],'wecha_id'=>$_GET['wecha_id']));?>",
					"sendFriendLink": "<?php echo ($f_siteUrl); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'type'=>$_GET['type'],'bid'=>$_GET['bid'],'wecha_id'=>$_GET['wecha_id']));?>",
					"weiboLink": "<?php echo ($f_siteUrl); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'type'=>$_GET['type'],'bid'=>$_GET['bid'],'wecha_id'=>$_GET['wecha_id']));?>",
					"tTitle": "<?php echo ($homeInfo["title"]); ?>",
					"tContent": "<?php echo ($homeInfo["info"]); ?>"
				};
		</script>
	<?php else: ?>
		<script type="text/javascript">
			window.shareData = {  
				"moduleName":"NewsList",
				"moduleID": "<?php echo (intval($_GET['classid'])); ?>",
				"imgUrl": "<?php echo ($thisClassInfo["img"]); ?>", 
				"timeLineLink": "<?php echo ($f_siteUrl); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid']));?>",
				"sendFriendLink": "<?php echo ($f_siteUrl); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid']));?>",
				"weiboLink": "<?php echo ($f_siteUrl); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid']));?>",
				"tTitle": "<?php echo ($thisClassInfo["name"]); ?>",
				"tContent": "<?php echo ($thisClassInfo["info"]); ?>"
			};
		</script><?php endif; ?>
	
<?php echo ($shareScript); ?>
</body>
</html>