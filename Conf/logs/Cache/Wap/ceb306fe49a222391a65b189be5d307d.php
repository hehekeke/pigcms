<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php echo ($thisCard["cardname"]); ?></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<!-- Mobile Devices Support @begin -->
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="telephone=no, address=no" name="format-detection">
<meta name="apple-mobile-web-app-capable" content="yes"/>
<!-- apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<!-- Mobile Devices Support @end -->
<link href="<?php echo $staticPath;?>/tpl/static/card/css/main.css" rel="stylesheet" type="text/css">
<script src="<?php echo $staticPath;?>/tpl/static/jquery.min.js" type="text/javascript"></script>
</head>
<body onselectstart="return true;" ondragstart="return false;">
<div class="container card">
    <header>
    <div class="header card">
        <div id="card" data-role="card" onClick="this.classList.toggle('on');">
            <div class="front" style="background-image:url(<?php if($thisCard['diybg']!=''){ echo ($thisCard["diybg"]); }else{ echo ($thisCard["bg"]); }?>);">
                <span class="logo"><img id="cardlogo" class="logo" src="<?php echo ($thisCard["logo"]); ?>"></span>
                <span class="name" style="color:<?php echo ($card["vipnamecolor"]); ?>;"><?php echo ($thisCard["cardname"]); ?></span>
                <span class="no" style="color:<?php echo ($card["numbercolor"]); ?>;"><?php echo ($thisMember["number"]); ?></span>
            </div>
        </div>
        <p class="explain"><span>点击卡片查看会员卡条码</span></p>
        <div class="code">
            <img src="<?php echo U('Card/showCode',array('token'=>$token,'cardid'=>$card['id'],'textCode'=>$thisMember['number']));?>" alt="">
        </div>
        <div class="mask"></div>
    </div>
    <div>
        <ul class="box group_btn">
            <li><a href="<?php echo U('Card/topay', array('token' => $token,'wecha_id'=>$wecha_id,'cardid'=>$card['id']));?>">充值</a></li>
            <li><a href="<?php echo U('Card/consume', array('token' => $token,'wecha_id'=>$wecha_id,'cardid'=>$card['id']));?>">付款</a></li>
        </ul>
    </div>
    </header>
    <div class="body">
        <ul class="list_ul">
            <div>
                <?php if($previlege != ''): if(is_array($previlege)): $i = 0; $__LIST__ = $previlege;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$previlege): $mod = ($i % 2 );++$i;?><li class="li_a">
                            <label class="label" onClick="this.parentNode.classList.toggle('on');"><i>&nbsp;</i><?php echo ($previlege["title"]); ?><span>&nbsp;</span></label>
                            <ol>
                                <h6>详细说明：</h6>
                                <p>
                                    <?php echo ($previlege["info"]); ?>
                                </p>
                            </ol>
                        </li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                <li class="li_b">
                    <a href="<?php echo U('Card/my_coupon', array('token' => $token,'wecha_id'=>$wecha_id,'cardid'=>$card['id']));?>">
                        <label class="label">
                            <i>&nbsp;</i>
                            会员优惠
                            <span>&nbsp;</span>
                        </label>
                    </a>
                </li>
                <li class="li_e">
                    <a href="<?php echo U('Card/notice',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>">
                        <label class="label">
                            <i>&nbsp;</i>
                            消息通知
                            <span>&nbsp;</span>
                        </label>
                    </a>
                </li>
                <li class="li_d">
                    <a href="<?php echo U('Userinfo/index',array('token'=>$_GET['token'],'cardid'=>(int)$_GET['cardid'],'wecha_id'=>$_GET['wecha_id'],'redirect'=>'Card/card|cardid:'.(int)$_GET['cardid']));?>">
                        <label class="label">
                            <i>&nbsp;</i>
                            完善会员卡资料 
                            <span>&nbsp;</span>
                        </label>
                    </a>
                </li>

            </div>
            <div>
                <li class="li_v">
                    <a href="<?php echo U('Card/cardIntro',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$card['id']));?>">
                        <label class="label"><i>&nbsp;</i>
                            <p class="mutipleLine">
                                会员卡介绍
                            </p>
                            <span>&nbsp;</span>
                        </label>
                    </a>
                </li>
                <!-- 门店-->
                <li class="li_k">
                    <a href="<?php echo U('Card/companyDetail',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$card['id']));?>">
                        <label class="label">
                            <i>&nbsp;</i>
                            商家门店
                            <span>&nbsp;</span>
                        </label>
                    </a>
                </li>
            </div>
        </ul>
    </div>
    <div style="display: none;" id="orderpay"></div>

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
</div>

<script>
    $('.explain,.front').click(function(){
        $('.code').show();
        $('.mask').show();
    });
    $('.mask,.code').click(function(){
        $('.code').hide();
        $('.mask').hide();
    });
</script>
</body>
</html>