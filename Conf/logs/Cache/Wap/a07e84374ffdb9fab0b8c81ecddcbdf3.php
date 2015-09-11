<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo ($info['title']); ?></title>
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no,target-densitydpi=device-dpi, width=device-width"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no" />
       <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="format-detection" content="telephone=no">
    <meta content="telephone=no" name="format-detection">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="<?php echo STATICS;?>/education/flaticon.css"/>
    <link rel="stylesheet" href="<?php echo STATICS;?>/schools/css/idangerous.swiper.css" />
    <link href="<?php echo STATICS;?>/schools/css/iscroll.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo STATICS;?>/schools/css/plugmenu.css" />
    <link rel="Stylesheet" href="<?php echo STATICS;?>/schools/css/moban.css" type="text/css" />
    <link href="<?php echo STATICS;?>/schools/css/cate.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
     .btn_music
        {
            display: inline-block;
            width: 35px;
            height: 35px;
            background: url('<?php echo STATICS;?>/schools/images/play.png') no-repeat center center;
            background-size: 100% auto;
            position: absolute;
            z-index: 100;
left: 15px;            top: 20px;
        }
        .btn_music.on
        {
            background-image: url("<?php echo STATICS;?>/schools/images/stop.png");
        }


    </style>
    <script src="<?php echo STATICS;?>/schools/js/iscroll.js" type="text/javascript"></script>

    <script type="text/javascript">
        var myScroll;

        function loaded() {
            myScroll = new iScroll('wrapper', {
                snap: true,
                momentum: false,
                hScrollbar: false,
                onScrollEnd: function () {
                    document.querySelector('#indicator > li.active').className = '';
                    document.querySelector('#indicator > li:nth-child(' + (this.currPageX + 1) + ')').className = 'active';
                }
            });
        }
        document.addEventListener('DOMContentLoaded', loaded, false);
        window.addEventListener("DOMContentLoaded", function () {
            playbox.init("playbox");
        }, false);


    </script>
    <script src="<?php echo STATICS;?>/schools/js/zepto.min.js" type="text/javascript"></script>
    <script src="<?php echo STATICS;?>/schools/js/plugmenu.js" type="text/javascript"></script>
<script type="text/javascript">
window.shareData = {
            "moduleName":"School",
            "moduleID":"0",
            "imgUrl": "<?php echo ($info['head_url']); ?>",
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('School/index',array('token'=>$token));?>",
            "tTitle": "<?php echo ($info['title']); ?>",
            "tContent": "<?php echo (mb_substr(strip_tags(html_entity_decode($info['info'])),0,89,'utf-8')); ?>..."
        };
</script>
<?php echo ($shareScript); ?>
</head>
<body id="cate19"  >

    <script src="<?php echo STATICS;?>/schools/js/audio.js" type="text/javascript"></script>
    <script>
        window.addEventListener("DOMContentLoaded", function () {
            playbox.init("playbox");
        }, false);
    </script>
    <!--轮播背景图-->
<div class="banner">
<div id="wrapper">
     <div id="scroller">
      <ul id="thelist">
        <?php if(is_array($flash)): $i = 0; $__LIST__ = $flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href=""><img src="<?php echo ($vo['picurl']); ?>" alt="<?php echo ($vo['title']); ?>"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
     </ul>
     </div>
</div>
<div id="nav">
<div id="prev" onclick="myScroll.scrollToPage('prev', 0,400,5);return false">&larr; prev</div>
<!-- <ul id="indicator">
<li class=""></li><li class=""></li><li class="active"></li>
</ul> -->
<div id="next" onclick="myScroll.scrollToPage('next', 0,400,5);return false">next &rarr;</div></div>
<div class="clr"></div>
</div>
<?php if($info['musicurl'] != ''): ?><span id="playbox" class="btn_music" onclick="playbox.init(this).play();">
            <audio src="<?php echo ($info['musicurl']); ?>" loop id="audio"></audio>
        </span><?php endif; ?>
<link rel="stylesheet" href="<?php echo STATICS;?>/schools/css/idangerous.swiper.css">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="<?php echo STATICS;?>/schools/js/idangerous.swiper-2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    var mySwiper = new Swiper('.swiper-container', {
        pagination: '.pagination',
        loop: true,
        grabCursor: true,
        paginationClickable: true
    })
    $('.arrow-left').on('click', function (e) {
        e.preventDefault()
        mySwiper.swipePrev()
    })
    $('.arrow-right').on('click', function (e) {
        e.preventDefault()
        mySwiper.swipeNext()
    })
</script>
<script>
    var count = document.getElementById("thelist").getElementsByTagName("img").length;

    var count2 = document.getElementsByClassName("menuimg").length;
    for (i = 0; i < count; i++) {
        document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:" + document.body.clientWidth + "px";

    }
    document.getElementById("scroller").style.cssText = " width:" + document.body.clientWidth * count + "px";

    setInterval(function () {
        myScroll.scrollToPage('next', 0, 400, count);
    }, 3500);
    window.onresize = function () {
        for (i = 0; i < count; i++) {
            document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:" + document.body.clientWidth + "px";

        }
        document.getElementById("scroller").style.cssText = " width:" + document.body.clientWidth * count + "px";
    }


</script>
<div class="device" >
    <a class="arrow-left" href="#"></a><a class="arrow-right" href="#"></a>
    <div class="swiper-container"  >
        <div class="swiper-wrapper" >
                <div class="swiper-slide" >
                    <div class="content-slide">
 <a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'cid'=>$info['menu1_id']));?>">
                            <p class="ico">
                                <span class="flaticon-school7"></span></p>
                            <p class="title">
                                <?php echo (($info['menu1'])?($info['menu1']):'学校简介'); ?></p>
                        </a>
<a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'cid'=>$info['menu2_id'],'type'=>'assess'));?>">
                            <p class="ico">
                                <span class="flaticon-teach"></span> </p>
                            <p class="title">
                                <?php echo (($info['menu2'])?($info['menu2']):'教师风采'); ?></p>
                        </a>
<a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'cid'=>$info['menu3_id']));?>">
                            <p class="ico">
                                <span class="flaticon-schoolclass"></span></p>
                            <p class="title">
                                <?php echo (($info['menu3'])?($info['menu3']):'同学天地'); ?></p>
                        </a>
<a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'cid'=>$info['menu4_id']));?>">
                            <p class="ico">
                                <span class="flaticon-research"></span></p>
                            <p class="title">
                                <?php echo (($info['menu4'])?($info['menu4']):'课程介绍'); ?></p>
</a> <a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>'school'));?>">
                            <p class="ico">
                                <span class="flaticon-competition"></span></p>
                            <p class="title">
                                <?php echo (($info['menu5'])?($info['menu5']):'食谱安排'); ?></p>
                        </a>
<a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'cid'=>$info['menu6_id']));?>">
                            <p class="ico">
                               <span class="flaticon-audiobook"></span></p>
                            <p class="title">
                                <?php echo (($info['menu6'])?($info['menu6']):'校园公告'); ?></p>
                        </a>
<a href="<?php echo U('School/qresults',array('token'=>$token,'wecha_id'=>$wecha_id));?>">
                            <p class="ico">
                                <span class="flaticon-certificate"></span></p>
                            <p class="title">
                                <?php echo (($info['menu7'])?($info['menu7']):'成绩查询'); ?></p>
                        </a>
<a href="<?php echo U('Reply/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>">
                            <p class="ico">
                                <span class="flaticon-open14"></span></p>
                            <p class="title">
                                <?php echo (($info['menu8'])?($info['menu8']):'家长建议'); ?></p>
                        </a>
<a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>'course'));?>">
                            <p class="ico">
                                <span class="flaticon-education"></span></p>
                            <p class="title">
                                <?php echo (($info['menu9'])?($info['menu9']):'课程预约'); ?></p>
                        </a>
<a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>'curriculum'));?>">
                            <p class="ico">
                                <span class="flaticon-clock4"></span></p>
                            <p class="title">
                                <?php echo (($info['menu10'])?($info['menu10']):'课程安排'); ?></p>
                        </a>
           </div>
                </div>
        </div>
        <div class="pagination"></div>
    </div>
    <script>
        var mySwiper = new Swiper('.swiper-container', {
            pagination: '.pagination',
            loop: true,
            grabCursor: true,
            paginationClickable: true
        })
        $('.arrow-left').on('click', function (e) {
            e.preventDefault()
            mySwiper.swipePrev()
        })
        $('.arrow-right').on('click', function (e) {
            e.preventDefault()
            mySwiper.swipeNext()
        })
    </script>
</div>
    <div id="leafContainer">
    </div>

    <style type="text/css">
 #leafContainer
{
    position:fixed;
    z-index:2;
width:100%;
    height: 690px;
top:0;
overflow:hidden;
}
 #leafContainer > div
{
    position: absolute;
    max-width: 100px;
    max-height: 100px;
    -webkit-animation-iteration-count: infinite, infinite;
    -webkit-animation-direction: normal, normal;
    -webkit-animation-timing-function: linear, ease-in;
}

#leafContainer > div > img {
     position: absolute;
     width: 100%;
     -webkit-animation-iteration-count: infinite;
     -webkit-animation-direction: alternate;
     -webkit-animation-timing-function: ease-in-out;
     -webkit-transform-origin: 50% -100%;
}

 @-webkit-keyframes fade
{

    0%   { opacity: 1; }
    95%  { opacity: 1; }
    100% { opacity: 0; }
}

 @-webkit-keyframes drop
{
       0%   { -webkit-transform: translate(0px, -50px); }
    100% { -webkit-transform: translate(0px, 650px); }
}
 @-webkit-keyframes clockwiseSpin
{
    0%   { -webkit-transform: rotate(-50deg); }
    100% { -webkit-transform: rotate(50deg); }
}
 @-webkit-keyframes counterclockwiseSpinAndFlip
{

    0%   { -webkit-transform: scale(-1, 1) rotate(50deg); }

    100% { -webkit-transform: scale(-1, 1) rotate(-50deg); }
}
 </style>
    <script type="text/javascript">
        var animationArr = { "1": "fengye", "2": "snow", "4": "rose" };
        var animationindex = "0";
        if (animationArr[animationindex] != undefined) {
        }
    </script>
 <script src='<?php echo STATICS;?>/schools/js/bjdh.js' type='text/javascript'></script>
 <div style="display: none"></div>

    <span class="copyright">
    <?php if($iscopyright == 1): echo ($homeInfo["copyright"]); ?>
    <?php else: ?>
    <?php echo ($siteCopyright); endif; ?>
    </span>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
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
</script> 
</body>
</html>