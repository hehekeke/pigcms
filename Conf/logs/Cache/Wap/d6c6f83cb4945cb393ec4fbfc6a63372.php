<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo ($info['title']); ?></title>
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="<?php echo STATICS;?>/schools/css/plugmenu.css">
    <link href="<?php echo STATICS;?>/schools/css/listhome3_3.css" rel="stylesheet" type="text/css" />

</head>
<script type="text/javascript">
    window.onload = function () {
        var oWin = document.getElementById("win");
        var oLay = document.getElementById("overlay");
        var oBtn = document.getElementById("popmenu");
        var oClose = document.getElementById("close");
        oBtn.onclick = function () {
            oLay.style.display = "block";
            oWin.style.display = "block"
        };
        oLay.onclick = function () {
            oLay.style.display = "none";
            oWin.style.display = "none"
        }
    };
</script>
<style>

</style>
<body id="listhome3">
    <div id="mcover" onclick="document.getElementById('mcover').style.display='';" style="display: none;">
        <img src="<?php echo STATICS;?>/schools/images/guide.png"></div>
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

    <div id="ui-header" >
        <div class="fixed">
            <a class="ui-title" id="popmenu">选择分类</a> <a class="ui-btn-left_pre" href="<?php echo U('School/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>">
            </a><a class="ui-btn-right" href=""></a>
        </div>
    </div>
    <div id="overlay"></div>
<div id="win" >
<ul class="dropdown">
<?php if(is_array($cat)): $i = 0; $__LIST__ = $cat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($cat["url"]); ?>"><span><?php echo ($cat["name"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
<!--
<li><a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'cid'=>$info['menu1_id']));?>"><span><?php echo (($info['menu1'])?($info['menu1']):'学校简介'); ?></span></a></li>
<li><a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'cid'=>$info['menu2_id'],'type'=>'assess'));?>"><span><?php echo (($info['menu2'])?($info['menu2']):'教师风采'); ?></span></a></li>
<li><a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'cid'=>$info['menu3_id']));?>"><span><?php echo (($info['menu3'])?($info['menu3']):'同学天地'); ?></span></a></li>
<li><a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'cid'=>$info['menu4_id'],'type'=>'yyclass'));?>"><span><?php echo (($info['menu4'])?($info['menu4']):'课程介绍'); ?></span></a></li>
<li><a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>'school'));?>"><span><?php echo (($info['menu5'])?($info['menu5']):'食谱安排'); ?></span></a></li>
<li><a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'cid'=>$info['menu6_id']));?>"><span><?php echo (($info['menu6'])?($info['menu6']):'校园公告'); ?></span></a></li>
<li><a href="<?php echo U('School/qresults',array('token'=>$token,'wecha_id'=>$wecha_id));?>"><span><?php echo (($info['menu7'])?($info['menu7']):'成绩查询'); ?></span></a></li>
<li><a href="<?php echo U('Reply/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>"><span><?php echo (($info['menu8'])?($info['menu8']):'家长建议'); ?></span></a></li>
<li><a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>'course'));?>"><span><?php echo (($info['menu9'])?($info['menu9']):'课程预约'); ?></span></a></li>
<li><a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>'curriculum'));?>"><span><?php echo (($info['menu10'])?($info['menu10']):'课程安排'); ?></span></a></li>
-->
<div class="clr"></div>
 </ul>
</div>


<div class="Listpage">
    <div class="top46">
    </div>
    <div id="todayList" >
        <ul class="chatPanel">
<?php if(is_array($infolist)): $i = 0; $__LIST__ = $infolist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="media mediaFullText">
                <?php if($readtype == 'school'): ?><a href="<?php echo U('School/readview',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$vo['id'],'readtype'=>'school'));?>">
                <?php elseif($readtype == 'course'): ?>
                <a href="<?php echo U('School/readview',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$vo['id'],'readtype'=>'course'));?>">
                <?php elseif($readtype == 'assess'): ?>
                <a href="<?php echo U('School/readview',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$vo['id'],'readtype'=>'assess'));?>">
                <?php else: ?>
                <a href="<?php echo U('School/readview',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$vo['id']));?>"><?php endif; ?>
                    <div class="mediaPanel">
                        <div class="mediaHead">
                            <span class="title"><?php echo ($vo['title']); ?></span>
                        <?php if($vo['createtime'] != ''): ?><span class="time"><?php echo (date("Y-m-d",$vo['createtime'])); ?></span><?php endif; ?>
                            <div class="clr">
                            </div>
                        </div>
                    <?php if($vo['pic'] != ''): ?><div class="mediaImg"><img src="<?php echo ($vo['pic']); ?>"></div><?php endif; ?>
                        <div class="mediaContent mediaContentP">
                            <p>
                                <?php echo ($vo['text']); ?>
                                <?php if($vo['typename'] != ''): ?>授课老师:<strong><?php echo ($vo['typename']); ?></strong>  预约上限:<strong><?php echo ($vo['typename2']); ?></strong> 单位/人  科目: <strong><?php echo ($vo['keyword']); ?></strong> 开课时间:<strong><?php echo ($vo['typename3']); ?></strong><?php endif; ?>
                            </p>
                        </div>
                        <div class="mediaFooter">
                            <span class="mesgIcon right"></span><span class="left" style="line-height: 50px;">查看全文</span>
                            <div class="clr">
                            </div>
                        </div>
                    </div>
                </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
<script>
   $('#plug-wrap').removeClass();
</script>
<style>
    #plug-wrap{z-index: 0}
</style>
<div class="pagination">
<?php if($count > 5): echo ($page); endif; ?>

    <script src="<?php echo STATICS;?>/schools/js/zepto.min.js" type="text/javascript"></script>
    <script src="<?php echo STATICS;?>/schools/js/plugmenu.js" type="text/javascript"></script>
    <div class="copyright">
      <span class="copyright">
    <?php if($iscopyright == 1): echo ($homeInfo["copyright"]); ?>
    <?php else: ?>
    <?php echo ($siteCopyright); endif; ?>
    </span></div>


</div>
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
<script>
   $('#plug-wrap').removeClass();
</script>
<style>
    #plug-wrap{z-index: 0}
</style>
    <div style="display: none">
    </div>
</body>
</html>