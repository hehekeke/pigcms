<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>会员卡领取</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="telephone=no, address=no" name="format-detection">
<meta name="apple-mobile-web-app-capable" content="yes"/>
<!-- apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<link href="<?php echo $staticPath;?>/tpl/static/card/css/main.css" rel="stylesheet" type="text/css">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
<link href="./tpl/static/tpl/com/css/iscroll.css" rel="stylesheet" type="text/css" />
<script src="./tpl/static/tpl/com/js/iscroll.js" type="text/javascript"></script>
<script>
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
<body onselectstart="return true;" ondragstart="return false;">
<div class="container get card">
	<header>
<?php if($flash != ''): ?><div class="banner">
		<div id="wrapper">
			<div id="scroller">
				<ul id="thelist">
				<?php if(is_array($flash)): $i = 0; $__LIST__ = $flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><li><p><?php echo ($so["info"]); ?></p><a href="<?php echo (($so["url"])?($so["url"]):'javascript:void(0)'); ?>"><img src="<?php echo ($so["img"]); ?>"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>


		<div id="nav">
			<div id="prev" onclick="myScroll.scrollToPage('prev', 0,400,2);return false">&larr; prev</div>
				<ul id="indicator">
					<?php if(is_array($flash)): $i = 0; $__LIST__ = $flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><li <?php if($i == 1): ?>class="active"<?php endif; ?> ></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			<div id="next" onclick="myScroll.scrollToPage('next', 0);return false">next &rarr;</div>
		</div>
		<div class="clr"></div>
	</div>
<?php else: ?>
	<div class="header card">
		<img src="<?php echo $staticPath;?>/tpl/static/card/images/banner1_03.png" style="width:100%;height:100%;">
	</div>
	<div>
		<ul class="tbox group_btn3">
			<li></li>
			<li></li>
		</ul>
	</div><?php endif; ?>

	</header>
	<div class="body">
		<ul class="list_ul">
			<!-- 特权
			<li class="li_a">
			<label class="label" onclick="this.parentNode.classList.toggle('on');"><i>&nbsp;</i>会员特权<span>&nbsp;</span></label>
			<ol>
				<h6>会员尊享9.5折（演示）:</h6>
				<p>
					<p>
						<span style="color:#009900;"><span style="line-height:20px;color:#009900;">1、持本卡可享受全店9.5折优惠</span></span>
					</p>
					<p>
						<span style="color:#009900;">
						<span style="line-height:20px;color:#009900;">2、持本卡可领取会员特有优惠券或代金券</span>
						</span>
					</p>
					<p>
						<span style="color:#009900;"><span style="line-height:20px;color:#009900;">3、本卡为积分储值卡，不可兑换</span></span>
					</p>
				</p>
			</ol>
			</li>-->
			<!-- 开卡活动-->
			<li class="li_b on">
				<label class="label show">
					<i>&nbsp;</i>
					领取会员卡
					<em class="pop <?php if($cardsCount == 0): ?>no<?php else: ?>yes<?php endif; ?>"><?php echo ($cardsCount); ?></em>
				</label>
				<?php if(is_array($allCards)): $i = 0; $__LIST__ = $allCards;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><ol class="bg">
						<a href="<?php echo U('Card/card',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$c['id']));?>">
							<img src="<?php echo ($c["logo"]); ?>" class="img">
							<h6><?php echo ($c["cardname"]); ?></h6>
							<p>
								<?php  if($isFuwu) { echo str_replace('微信', '', $c['msg']); } else { echo $c['msg']; } ?>
							</p>
			                <?php if($c['applied']): ?><em class="no">
		                            用卡
		                        </em>
		                    <?php else: ?>
		                        <em class="yes">
		                            领卡
		                        </em><?php endif; ?>
	                	</a>
	                	<?php if($c["gifts"] > 0): ?><div class="gifts">
                                <a href="javascript:void(0);">
                                    点击查看开卡赠送活动
                                </a>
                            </div>
                            <div class="gifts_list clr">
                                <dl>
                                    <?php if(is_array($c['gifts_list'])): $i = 0; $__LIST__ = $c['gifts_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gifts): $mod = ($i % 2 );++$i;?><dt class="name">
                                        <?php echo ($gifts["name"]); ?>
                                    </dt>
                                    <dd class="times"><?php echo (date('Y-m-d',$gifts["end"])); ?></d><?php endforeach; endif; else: echo "" ;endif; ?>
                                </dl>
                            </div><?php endif; ?>
	                	<span class="clear"></span>
					</ol><?php endforeach; endif; else: echo "" ;endif; ?>
			</li>

			<!-- 
			<li class="li_e">
			<label class="label" onclick="this.parentNode.classList.toggle('on');"><i>&nbsp;</i>圣诞送优惠券满100减10元<span>&nbsp;</span></label>
			<ol>
				<h6>中秋节给大家送积分:</h6>
				<p></p>
			</ol>
			</li>
			-->

			<!-- 联系电话 -->
			<li class="li_i">
				<a class="label" href="tel:<?php echo ($thisCompany["tel"]); ?>">
					<i>&nbsp;</i>
					<?php if($thisCompany["tel"] != ''): echo ($thisCompany["tel"]); ?>
					<?php else: ?>
						商家未设置电话<?php endif; ?>
					<span>&nbsp;</span>
				</a>
			</li>
			<!-- 门店-->
			<li class="li_k">
				<a href="<?php echo U('Card/companyDetail',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>">
					<label class="label">
						<i>&nbsp;</i>
						<?php if($thisCompany["name"] != ''): echo ($thisCompany["name"]); ?>
						<?php else: ?>
							商家未设置名称<?php endif; ?>
						<span>&nbsp;</span>
					</label>
				</a>
			</li>
						<!-- 地址-->
			<li class="li_j">
				<a href="<?php echo U('Card/companyMap',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>">
				<label class="label">
					<i>&nbsp;</i>
					<p class="mutipleLine">
						<?php if($thisCompany["address"] != ''): echo ($thisCompany["address"]); ?>
						<?php else: ?>
							商家未设置地址<?php endif; ?>
					</p>
					<span>&nbsp;</span>
				</label>
				</a>
			</li>
		</ul>
	</div>
</div>

<footer>
    <nav class="nav">
        <ul class="box">
            <li>
                <a href="<?php echo U('Card/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>" class="<?php if(ACTION_NAME=='index'){ ?>on<?php } ?>">
                    <p class="share"></p>
                    <span>
                        <?php if($thisCard['id'] == ''): ?>领卡
                        <?php else: ?>
                            换卡<?php endif; ?>
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Card/card',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>" class="<?php if(ACTION_NAME=='card'){ ?>on<?php } ?>">
                    <p class="card"></p>
                    <span>会员卡</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Card/cards',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>" class="my <?php if(ACTION_NAME=='cards'){ ?>on<?php } ?>" >
                    <p class="my"  ></p>
                    <span>我的</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Card/notice',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>" class="<?php if(ACTION_NAME=='notice'){ ?>on<?php } ?>">
                    <p id="Js-msg-num" class="msg" data-count="1" ></p>
                    <span>消息</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Card/signscore',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>" class="<?php if(ACTION_NAME=='signscore'){ ?>on<?php } ?>">
                    <p class="sign"></p>
                    <span>签到</span>
                </a>
            </li>
        </ul>
    </nav>
</footer>

<!--
<div class="box clr"></div>
<div class="xia clr">
    <ul>
        <li class="clr <?php if(ACTION_NAME=='index'){ ?>cur<?php } ?>">
            <a href="<?php echo U('Card/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>">
                <i class="ico_bt hk"></i>
                <P>
                    <?php if($thisCard['id'] == ''): ?>领卡
                    <?php else: ?>
                        换卡<?php endif; ?>
                </P>
            </a>
        </li>
        <li class="clr <?php if(ACTION_NAME=='card'){ ?>cur<?php } ?>">
            <a href="<?php echo U('Card/card',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>">
                <i class="ico_bt hyk"></i>
                <p>会员卡</p>
            </a>
        </li>
        <li class="clr <?php if(ACTION_NAME=='notice'){ ?>cur<?php } ?>">
            <a href="<?php echo U('Card/notice',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>">
                <i class="ico_bt xx"></i>
                <p>消息</p>
            </a>
        </li>
        <li class="clr <?php if(ACTION_NAME=='signscore'){ ?>cur<?php } ?>">
            <a href="<?php echo U('Card/signscore',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>">
                <i class="ico_bt qd"></i>
                <p>签到</p>
            </a>
        </li>
        <li class="clr <?php if(ACTION_NAME=='cards'){ ?>cur<?php } ?>">
            <a href="<?php echo U('Card/cards',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>">
                <i class="ico_bt wd"></i>
                <p>我的</p>
            </a>
        </li>
    </ul>
</div>
-->
<script type="text/javascript">
/*var phoneWidth = parseInt(window.screen.width);
var phoneScale = phoneWidth/520;
var ua = navigator.userAgent;
var meta = document.createElement("meta"); 
	meta.setAttribute("name","viewport");

if (/Android (\d+\.\d+)/.test(ua)){
	var version = parseFloat(RegExp.$1);
	// andriod 2.3
	if(version>2.3){
		meta.setAttribute("content",'width=520, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi');
	// andriod 2.3以上
	}else{
		meta.setAttribute("content",'width=520, target-densitydpi=device-dpi');
	}
	// 其他系统
} else {
	meta.setAttribute("content",'width=520, user-scalable=no, target-densitydpi=device-dpi');
}
document.head.appendChild(meta);
*/

window.shareData = {  
            "moduleName":"Card",
            "moduleID":"0",
            "imgUrl": "", 
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Card/index',array('token'=>$token));?>",
            "tTitle": "会员卡",
            "tContent": ""
};
</script>
<?php echo ($shareScript); ?>
<script>


var count = document.getElementById("thelist").getElementsByTagName("img").length;	
var count2 = document.getElementsByClassName("menuimg").length;


for(i=0;i<count;i++){
 document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+$('.container').width()+"px";

}
for(i=0;i<count2;i++){
  
document.getElementsByClassName("menuimg").item(i).style.cssText = " HEIGHT:"+($('.container').width()/320)*111+"px";
document.getElementsByClassName("menumesg").item(i).style.cssText = " HEIGHT:"+($('.container').width()/320)*111+"px";
 
}

document.getElementById("scroller").style.cssText = " width:"+$('.container').width()*count+"px";


 setInterval(function(){
myScroll.scrollToPage('next', 0,400,count);
},3500 );

window.onresize = function(){ 
for(i=0;i<count;i++){
document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+$('.container').width()+"px";

}
for(i=0;i<count2;i++){
 
 
document.getElementsByClassName("menuimg").item(i).style.cssText = " HEIGHT:"+($('.container').width()/320)*111+"px";
document.getElementsByClassName("menumesg").item(i).style.cssText = " HEIGHT:"+($('.container').width()/320)*111+"px";
  
}

 document.getElementById("scroller").style.cssText = " width:"+$('.container').width()*count+"px";
} 

</script>
<script>

    $(function(){
        $('.gifts').click(function(){
            if($(this).siblings('.gifts_list').css('display') == 'none'){
                $(this).addClass('hidd');
                $(this).siblings('.gifts_list').css('display','block')
            }else{
                $(this).removeClass('hidd');
                $(this).siblings('.gifts_list').css('display','none')
            }
        });
    });
</script>
</body>
</html>