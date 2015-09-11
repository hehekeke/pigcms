<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="cn"><head>
<?php if($zd['status'] == 1): echo ($zd['code']); endif; ?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  	<meta charset="UTF-8">
  	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
  	<meta name="apple-mobile-web-app-capable" content="yes">
  	<meta name="format-detection" content="telephone=no, email=no">
  	<title><?php echo ($tpl["wxname"]); ?></title>
 <style>
  .spinner {
    width: 32px;
    height: 32px;
    position: absolute;
    z-index: 9998;
  }
  .cube1, .cube2 {
    width: 10px;
    height: 10px;
    position: absolute;
    top: 0;
    left: 0;
    -webkit-animation: cubemove 1.8s infinite ease-in-out;
    animation: cubemove 1.8s infinite ease-in-out;
  }
  .aassdd{
      display: none;
  }

  .cube1 {
    -webkit-animation-delay: -1.8s;
    animation-delay: -1.8s;
  }
  .cube2 {
    -webkit-animation-delay: -0.9s;
    animation-delay: -0.9s;
  }
  @-webkit-keyframes cubemove {
    25% {
      -webkit-transform: translateX(42px) rotate(-90deg) scale(0.5)
    }
    50% {
      -webkit-transform: translateX(42px) translateY(42px) rotate(-180deg)
    }
    75% {
      -webkit-transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5)
    }
    100% {
      -webkit-transform: rotate(-360deg)
    }
  }
  @keyframes cubemove {
    25% {
      transform: translateX(42px) rotate(-90deg) scale(0.5);
      -webkit-transform: translateX(42px) rotate(-90deg) scale(0.5);
    }
    50% {
      transform: translateX(42px) translateY(42px) rotate(-179deg);
      -webkit-transform: translateX(42px) translateY(42px) rotate(-179deg);
    }
    50.1% {
      transform: translateX(42px) translateY(42px) rotate(-180deg);
      -webkit-transform: translateX(42px) translateY(42px) rotate(-180deg);
    }
    75% {
      transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5);
      -webkit-transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5);
    }
    100% {
      transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
    }
  }
  .mod-menu {
      position: absolute;
  }
  </style>

  <script>
    var jsTimer = [];
    jsTimer.push(new Date().getTime()/1000); //jsTimer_0
  </script>
</head>

<body style="overflow: hidden; width: 320px; height: 681px; max-height: 681px;">
  <div id="bg_img_data" style="display:none;"><?php if(is_array($flashbg)): $i = 0; $__LIST__ = $flashbg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?>,<?php echo ($so["img"]); endforeach; endif; else: echo "" ;endif; ?></div>
  <script type="text/javascript">
		var app = {
		data: {"f_cover_templated_id":"4","f_cover_pic_after":[],"module":[]}  };
		jsTimer.push(new Date().getTime()/1000);
		window.onload=function(){
  			var bg_img = document.getElementById("bg_img_data").innerHTML.replace(/(^\s*)|(\s*$)/g, "").substring(1),bg_img_arr = bg_img.split(','),bg_img_count = bg_img_arr.length,bg_img_rand_n = Math.floor(Math.random()*bg_img_count);
			document.getElementById("bg-img").style.cssText="background-image:url("+bg_img_arr[bg_img_rand_n]+");background-repeat: repeat-x;";
		}
  </script>
  <script src="./tpl/static/tpl/1358/js/vstar_main_tpl4.js"></script>
<div data-view-cid="view-0">
	<div class="bg-img" id="bg-img" style="width:100%;height:100%;"></div>
</div>
<div class="swiper-container" style="padding-top: 340.5px; overflow: hidden;">
  <div class="swiper-wrapper" style="padding-top: 0px; padding-bottom: 0px; width: 1631.75px;height:100%">
      <div class="arrows"></div>
      <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i < 31): ?><div class="swiper-slide" data-item="0" data-delay="0" style="-webkit-transform: rotate(15deg) skew(15deg) translate3d(0px, 0px, 0px); opacity: 1;">
        <a style="color:white" href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo (htmlspecialchars_decode($vo["url"])); endif; ?>">
	        <div class="swiper-item slide-bg" style="background-image: url(<?php echo ($vo["img"]); ?>)">
	          <div class="swiper-item-bg"></div>
	           <div class="swiper-item-name" style="left:1%;">
	            <div class="d-left" style="height: 26px; overflow: hidden;">
	              <span class="sub-title"><?php echo ($vo["name"]); ?></span>
	            </div>
	            <div class="swiper-item-white d-left" style=""><div class="swiper-item-red"></div></div>
	          </div>
	         <div class="swiper-item-con" style="left: 30px;"><?php echo ($vo["info"]); ?></div>
        	</div>
       	</a>
      </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>

      <div class="swiper-slide swiper-slide-visible swiper-slide-active" style="height: 700px;" ></div>
      
      <div class="arrows2"></div>
  </div>

</div></div>
<div class="copyright" style="display:none;">
<?php if($iscopyright == 1): echo ($homeInfo["copyright"]); ?>
<?php else: ?>
<?php echo ($siteCopyright); endif; ?>
</div>  <?php if($home['start'] == 1): ?><style>
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
</body></html>