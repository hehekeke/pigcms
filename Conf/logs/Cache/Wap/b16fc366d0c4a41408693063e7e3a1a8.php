<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class=" clickberry-extension clickberry-extension-standalone">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" type="text/css" href="<?php echo STATICS;?>/vhouse/online_booking.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo STATICS;?>/vhouse/pig-ui.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo STATICS;?>/vhouse/common.css" media="all">
<script type="text/javascript" src="<?php echo STATICS;?>/vhouse/jQuery.js"></script>
<title>我的预约</title>
<meta content="clickberry-extension-here">
<script type="text/javascript">
    window.onload = function () {
        var oWin = document.getElementById("win");
        var oLay = document.getElementById("overlay");
        var oBtn = document.getElementById("popmenu");
        var oClose = document.getElementById("close");
        oBtn.onclick = function () {
            oLay.style.display = "block";
            oWin.style.display = "block";
            //oWin.style.zIndex = 99999;
        };
        oLay.onclick = function () {
            oLay.style.display = "none";
            oWin.style.display = "none";
        }
    };

   $('#plug-wrap').removeClass();
   //document.body.removeChild(document.getElementById('plug-wrap'));
</script>
<style>
    #plug-wrap{z-index: 0}
</style>
<link rel="stylesheet" href="<?php echo STATICS;?>/schools/css/plugmenu.css">
<link href="<?php echo STATICS;?>/schools/css/news3_3.css" rel="stylesheet" type="text/css" />
</head>
    <body onselectstart="return true;" ondragstart="return false;" id="onlinebooking-list">
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
    <div class="cardexplain">
<ul class="round">
<?php if($books == ''): ?><a href="javascript:;">
        <li class="title">
        <span>订单详情 <?php if($vo['remate'] == 0): ?><em class="no"></em><?php endif; ?></span>
        </li>
</a>
<li><a href="javascript:;">
            </a><div class="text"><a href="javascript:;">
            <span style="font-size: 24px">您还没有预约。</span>
          </div>

</li><?php endif; ?>

<?php if(is_array($books)): $i = 0; $__LIST__ = $books;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="javascript:;">
        <li class="title">
        <span>开课时间: <?php echo ($vo['dateline']); ?> <?php if($vo['remate'] == 0): ?><em class="no">等待确认</em><?php elseif($vo['remate'] == 1): ?><em class="no"><font color="green">客服已确认</font></em><?php elseif($vo['remate'] == 2): ?><em class="no"><font color="red">已拒绝</font></em><?php endif; ?></span>
        </li>
</a>
<li><a href="javascript:;">
            </a><div class="text"><a href="javascript:;">
                <p>姓名：<?php echo ($vo['truename']); ?></p>
                <p>联系电话：<?php echo ($vo['tel']); ?></p>
                <p>课程名称：<?php echo ($vo['housetype']); ?></p>
                <p>授课老师：<?php echo ($vo['choose']); ?></p>
                <p>开课时间：<?php echo ($vo['dateline']); ?></p>
                <p>上课地址：<?php echo ($vo['address']); ?></p>
                <p>我的备注 ：<?php echo ($vo['info']); ?> </p>
                <p>提交时间：<?php echo (date('Y年m月d日 H时i分',$vo['booktime'])); ?></p>
                </a><div class="footReturn"><a href="javascript:;"></a>
<?php if($vo['remate'] == 0): ?><a id="" style="color:#fff;" class="submit" href="<?php echo U('School/del',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$vo['id'],'type'=>$vo['type']));?>" onclick="return(confirm('您确定要删除吗?删除表示您放弃本次预约.'));return false;">删除订单 </a><?php endif; ?>
<?php if($vo['remate'] != 0): ?><p>客服回复：<font color="#2c2a24"><?php echo ($vo['kfinfo']); ?></font></p><?php endif; ?>

                </div>
        </div>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
<?php if($count > 5): ?><p style="text-align: center;
padding: 10px;"><?php echo ($page); ?></p><?php endif; ?>
</ul>

<!--页码-->
    </div>
<div mark="stat_code" style="width:0px; height:0px; display:none;"></div>

    <div class="copyright">
      <span class="copyright">
    <?php if($iscopyright == 1): echo ($homeInfo["copyright"]); ?>
    <?php else: ?>
    <?php echo ($siteCopyright); endif; ?>
    </span>

    </div>

<style>
.top_bar{top: 93%; }
</style>
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
   document.body.removeChild(document.getElementById('plug-wrap'));

function onBridgeReady(){
     document.addEventListener('WeixinJSBridgeReady', function onBridgeReady()  {
 WeixinJSBridge.call('hideOptionMenu');
 });
}

if (typeof WeixinJSBridge == "undefined"){
    if( document.addEventListener ){
        document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
    }else if (document.attachEvent){
        document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
        document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
    }
}else{
    onBridgeReady();
}
</script>
<style>
    #plug-wrap{z-index: 0}
</style>
</body></html>