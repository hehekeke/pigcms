<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
<title><?php echo ($info["title"]); ?></title>
<link rel="stylesheet" type="text/css" href="/tpl/static/wall/css/base.css">
<link rel="stylesheet" type="text/css" href="/tpl/static/wall/css/zAlert.css">

<script type="text/javascript" src="/tpl/static/wall/js/jquery-2.0.3.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/tpl/static/wall/js/zAlert.js" charset="utf-8"></script>
</head>

<link rel="stylesheet" type="text/css" href="/tpl/static/wall/css/screen_wall.css">

<body class="FUN WALL" style="background-image:url(<?php echo ($info["background"]); ?>);" onload="screen_init();">
<div class="Panel Top" style="top: 0px;">
    <?php if($info['logo'] != ''): ?><img class="activity_logo" src="<?php echo ($info["logo"]); ?>"><?php endif; ?>
    <div class="top_title" style="font-size: 30px">
        <div>欢迎您参加-<?php echo ($info["title"]); ?></div>    
    </div>
    <?php if($info["qrcode"] != ''): ?><img class="mp_account_codeimage" src="<?php echo ($info["qrcode"]); ?>"><?php endif; ?>
</div>

<div id="Msg" class="Panel MsgList" style="display: block; opacity: 1;"> 
    <?php if(is_array($message)): $key = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($key % 2 );++$key;?><div class="MsgItem" msg_id="<?php echo ($item["id"]); ?>">
                <div class="head" style="background-image: url(<?php echo ($item["portrait"]); ?>);"></div>
                <div class="nickname">
                    <?php echo ($item["nickname"]); ?>
                </div>
                <div class="msgword">
                    <?php echo ($item["content"]); ?>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div id="MsgBox" class="Panel MsgList" style="display: none; opacity: 1;">
    <?php if(is_array($temp)): $key = 0; $__LIST__ = $temp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($key % 2 );++$key;?><div class="MsgItem" msg_id="<?php echo ($item["id"]); ?>">
                <div class="head" style="background-image: url(<?php echo ($item["portrait"]); ?>);"></div>
                <div class="nickname">
                    <?php echo ($item["nickname"]); ?>
                </div>
                <div class="msgword">
                    <?php echo ($item["content"]); ?>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<script>
var status      = 1;    //请求状态
var load_time   = 2000; //请求间隔
var sceneid     = '<?php echo ($sceneid); ?>';
var is_pic      = 0;
var url         = '/index.php?g=User&m=Scene&a=ajaxWall&token=<?php echo ($token); ?>&id=<?php echo ($info["id"]); ?>';
</script>
<input type="hidden" name="ajax_time" style="width:100px;" value="<?php echo time();?>" id="ajax_time" />
<script type="text/javascript" src="/tpl/static/wall/js/scene_wall.js" charset="utf-8"></script>
<div class="Panel Bottom" style="bottom: 0px;">
    <div class="helperpanel pulse">
        搜索关注<span class="mp_account"><?php echo ($info["wxuser"]); ?></span><br>发送<span class="activity_key"><?php echo ($info["keyword"]); ?></span>即可参与
    </div>
    <div class="navbar">
        <!--
    <?php if($sceneid > '0'): ?><a class="navbaritem fullscreen" href="<?php echo U('Scene/index',array('token'=>$_SESSION['token']));?>">
            <div class="icon"></div>
            <div class="label">管理中心</div>
        </a><?php endif; ?>-->
        <a class="navbaritem fullscreen" id="fullscreen" href="javascript:void(0);">
            <div class="icon"></div>
            <div class="label">全屏</div>
        </a>
    <?php if($info['open_vote'] == '1'): ?><a class="navbaritem vote <?php if(ACTION_NAME == 'vote'): ?>hover<?php endif; ?>" href="<?php echo U('Scene/vote',array('sceneid'=>$sceneid,'token'=>$_SESSION['token']));?>">
            <div class="icon"></div>
            <div class="label">投票</div>
        </a><?php endif; ?>
     <?php if($info['open_zzle'] == '1'): ?><a class='navbaritem pairup <?php if(ACTION_NAME == 'supperzzle'): ?>hover<?php endif; ?>' href="<?php echo U('Scene/supperzzle',array('sceneid'=>$sceneid,'token'=>$_SESSION['token']));?>">
            <div class="icon"></div>
            <div class="label">对对碰</div>
        </a><?php endif; ?>   
    <?php if($info['open_lottery'] == '1'): ?><a class="navbaritem lottery <?php if(ACTION_NAME == 'lottery'): ?>hover<?php endif; ?>" href="<?php echo U('Scene/lottery',array('sceneid'=>$sceneid,'token'=>$_SESSION['token']));?>">
            <div class="icon"></div>
            <div class="label">抽奖</div>
        </a><?php endif; ?>   
    <?php if($info['open_shake'] != 0 or ($info['shake_id'] != 0)): ?><a class="navbaritem rocker <?php if(ACTION_NAME == 'shake'): ?>hover<?php endif; ?>" href="<?php echo U('Scene/shake',array('id'=>$info['id'],'sceneid'=>$sceneid,'token'=>$_SESSION['token']));?>">
            <div class="icon"></div>
            <div class="label">摇一摇</div>
        </a><?php endif; ?>
    <?php if($info['open_wall'] != 0 or ($info['wall_id'] != 0)): ?><a class="navbaritem wall_pic <?php if(ACTION_NAME == 'wall_pic'): ?>hover<?php endif; ?>" href="<?php echo U('Scene/wall_pic',array('id'=>$info['id'],'sceneid'=>$sceneid,'token'=>$_SESSION['token']));?>">
            <div class="icon"></div>
            <div class="label">图片</div>
        </a>
        <a class="navbaritem wall <?php if(ACTION_NAME == 'wall'): ?>hover<?php endif; ?>" href="<?php echo U('Scene/wall',array('id'=>$info['id'],'sceneid'=>$sceneid,'token'=>$_SESSION['token']));?>">
            <div class="icon"></div>
            <div class="label">微信上墙</div>
        </a><?php endif; ?>
    </div>    
</div>
<div id="leafContainer"></div>
    <div style="display: none;" class="bigmpcodebar">
        <div class="closebutton"></div>
        <div class="label">微信扫一扫，发送<span class="activity_key"><?php echo ($info["keyword"]); ?></span>即可参与</div>
        <img src="<?php echo ($info["qrcode"]); ?>">
    </div>
<script>

$('.mp_account_codeimage').click(function(){
    $('.bigmpcodebar').css('display','block');
});

$('.closebutton').click(function(){
    $('.bigmpcodebar').css('display','none');
});

$('#fullscreen').click(function(){
    
    if($('#fullscreen').hasClass('in')){
        exitFullscreen();
        $('#fullscreen').removeClass("in"); 
    }else{   
        fullscreen();
        $('#fullscreen').addClass("in"); 
    }
    
});

function fullscreen(){
    elem=document.body;
    if(elem.webkitRequestFullScreen){
        elem.webkitRequestFullScreen();   
    }else if(elem.mozRequestFullScreen){
        elem.mozRequestFullScreen();
    }else if(elem.requestFullScreen){
        elem.requestFullscreen();
    }else{
        //浏览器不支持全屏API或已被禁用
    }
}

function exitFullscreen(){
    var elem=document;
    if(elem.webkitCancelFullScreen){
        elem.webkitCancelFullScreen();    
    }else if(elem.mozCancelFullScreen){
        elem.mozCancelFullScreen();
    }else if(elem.cancelFullScreen){
        elem.cancelFullScreen();
    }else if(elem.exitFullscreen){
        elem.exitFullscreen();
    }else{
        //浏览器不支持全屏API或已被禁用
    }
}
</script>
</body>
</html>