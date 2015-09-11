<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title><?php echo ($info['title']); ?></title>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/public-framework/scripts/jquery.js"></script>
<link href="<?php echo ($staticPath); ?>/tpl/static/public-framework/styles/framework.css" rel="stylesheet" type="text/css">
<link href="<?php echo ($staticPath); ?>/tpl/static/public-framework/styles/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="<?php echo ($staticPath); ?>/tpl/static/public-framework/styles/owl.theme.css" rel="stylesheet" type="text/css">
<link href="<?php echo ($staticPath); ?>/tpl/static/public-framework/styles/swipebox.css"         rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/alert.js"></script>
<link href="<?php echo ($staticPath); ?>/tpl/static/helping/countdown/jquery.countdown.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/helping/countdown/jquery.countdown.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/helping/js/script.js"></script>

<link href="<?php echo ($staticPath); ?>/tpl/static/helping/css/index.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function swapStyleSheet(sheet){
	document.getElementById('pagestyle').setAttribute('href', sheet);
}
</script>

</head>
<body>
<?php if($memberNotice != ''): echo ($memberNotice); endif; ?>

<div id="preloader">
	<div id="status">
    	<p class="center-text">
            <em>Loading...</em>
        </p>
    </div>
</div>

<div class="all-elements">
    <div id="content" class="page-content">
    	<div class="content-controls solid-color fixed-header">
            <?php if($is_over == 1): ?><a class="button-big button-turqoise" href="javascript:void(0);" style="background:#5a5a5a;">活动还没开始</a>
            <?php elseif($is_over == 2): ?>    
                <a class="button-big button-turqoise" href="javascript:void(0);" style="background:#5a5a5a;">活动已经结束</a>
            <?php elseif($share_key != ''): ?>
                <a class="button-big button-turqoise" href="<?php echo U('Helping/index',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$info['id']));?>">返回我的</a>
            <?php else: ?>
                <?php if($memberNotice == ''): ?><a class="button-big button-turqoise" id="share" href="javascript:void(0);">找朋友助力</a>
                <?php else: ?>
                   <a class="button-big button-turqoise"  href="#memberNoticeBox" id="modaltrigger_notice">我要参加</a><?php endif; endif; ?>
        </div>    
        
		<!--gift start-->
		<div class="content">
            <div class="container">
                <div class="top_pic">
                    <img src="<?php echo ($info['reply_pic']); ?>" alt="<?php echo ($info['title']); ?>">
                </div>

                <div class="blank"></div>
                <div class="title">
                    <?php echo ($info['title']); ?>
                </div>
                <div class="blank"></div>
                <div class="times">
                    <span class="time-ico">
                        活动时间：<?php echo (date("y.m.d",$info['start'])); ?> - <?php echo (date("y.m.d",$info['end'])); ?>
                    </span>
                </div>
                <div class="blank"></div>
                <?php if($is_over == 0): ?><div class="countdown" id="countdown" endtime="<?php echo ($info['end']); ?>"></div>
                    <div class="blank"></div><?php endif; ?>
                <div class="rule">
                    <?php echo (htmlspecialchars_decode($info['info'])); ?>
                </div>
                <div class="blank"></div>
                <?php if($user != ''): ?><div class="status">
                    <span>我的助力值: <i><?php echo ($user["help_count"]); ?></i></span>
                    <span>我的排名: <i class="cl-red"><?php echo ($user["help_rank"]); ?></i></span>
                </div>
                <div class="blank"></div><?php endif; ?>
            </div> 
        </div> 
		<!--gift end-->
		<div class="blank"></div>
		<!--sharelist start-->
		 <div class="content">
            <div class="rank_title">
                <div class="top">TOP30</div>
                <div class="cot">
                    参与活动人数: 
                    <i class="cl-green"><?php echo ($count); ?></i>
                </div>
            </div>
        </div>
		<!--sharelist end-->
  		<div class="blank"></div>	 

        <div class="content">
            <div class="container con-last">
            	<table class="table" border="0" width="100%">
                    <tr>
                        <th>排名</th>
                        <th>姓名</th>
                        <th>手机号</th>
                        <th>助力值</th>
                    </tr>
                    <?php if(is_array($rank)): $key = 0; $__LIST__ = $rank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rank): $mod = ($key % 2 );++$key;?><tr>
                        <td><?php echo ($key); ?></td>
                        <td><?php echo ($rank["username"]); ?></td>
                        <td><?php echo ($rank["tel"]); ?></td>
                        <td><?php echo ($rank["help_count"]); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </div>
        </div>

    </div>  
</div>
<div class="share_bg">
    <img src="<?php echo ($staticPath); ?>/tpl/static/live/default/share-guide.png">
</div>
<script type="text/javascript">
/*<?php if($is_over > 0): ?>document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() { 
	WeixinJSBridge.call('hideOptionMenu');
});
<?php else: ?>
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {   
	WeixinJSBridge.call('showOptionMenu');
});<?php endif; ?>*/
</script>

<script type="text/javascript">
$(function(){
	$('#share').click(function(){
		$('.share_bg').css('display','block');
	});
	
	$('.share_bg').click(function(){
		if($(this).css('display') == 'block'){
			$(this).css('display','none');
		}
	});

    <?php if($share_key != '' and $is_over == 0): ?>$.getJSON("<?php echo U('Helping/add_share',array('token'=>$token,'id'=>$info['id']));?>",{share_key:'<?php echo ($share_key); ?>',wecha_id:'<?php echo ($wecha_id); ?>'},function(res){
    		alert(res.info);
    	});<?php endif; ?>

});

</script>

<script type="text/javascript">
window.shareData = {  
            "moduleName":"Helping",
            "moduleID":"0",
            "imgUrl": "<?php echo ($info["reply_pic"]); ?>", 
            "timeLineLink": "<?php echo ($f_siteUrl); echo U('Helping/index',array('token'=>$token,'id'=>$info['id'],'share_key'=>$user['share_key']));?>",
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Helping/index',array('token'=>$token,'id'=>$info['id'],'share_key'=>$user['share_key']));?>",
            "weiboLink": "<?php echo ($f_siteUrl); echo U('Helping/index',array('token'=>$token,'id'=>$info['id'],'share_key'=>$user['share_key']));?>",
            "tTitle": "<?php echo ($info["title"]); ?>",
            "tContent": "<?php echo (sharefilter($info["intro"])); ?>"
};
</script>
<?php echo ($shareScript); ?>

<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/public-framework/scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/public-framework/scripts/jquery.swipebox.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/public-framework/scripts/framework.launcher.js"></script>

</body>
</html>