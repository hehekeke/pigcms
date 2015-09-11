<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-/W3C/DTD XHTML 1.0 Transitional/EN" "http:/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http:/www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<title><?php echo ($res["title"]); ?>-<?php echo ($tpl["wxname"]); ?></title> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<link href="<?php echo RES;?>/css/yl/news.css" rel="stylesheet" type="text/css" />

<script src="<?php echo RES;?>/js/yl/audio.min.js" type="text/javascript"></script>
<?php if($res['is_focus'] == '0'): ?><style>
#content .is_hidden{display: none;}
</style><?php endif; ?>
    <script>
      audiojs.events.ready(function() {
        audiojs.createAll();
      });
    </script>
</head> 
<script>
window.onload = function ()
{
var oWin = document.getElementById("win");
var oLay = document.getElementById("overlay");	
var oBtn = document.getElementById("popmenu");
var oClose = document.getElementById("close");
oBtn.onclick = function ()
{
oLay.style.display = "block";
oWin.style.display = "block"	
};
oLay.onclick = function ()
{
oLay.style.display = "none";
oWin.style.display = "none"	
}
};
</script>
<body id="news">
<div id="ui-header">
<div class="fixed">
<a class="ui-title" id="popmenu">选择分类</a>
<a class="ui-btn-left_pre" href="javascript:history.go(-1)"></a>
<a class="ui-btn-right_home" href="<?php echo U('Index/index',array('token'=>$tpl['token']));?>"></a>
</div>
</div>
<div id="overlay"></div>
<div id="win">
<ul class="dropdown"> 
<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/lists',array('token'=>$vo['token'],'classid'=>$vo['id']));?>"><span><?php echo ($vo["name"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
 	
<div class="clr"></div>
</ul>
</div>
<div class="Listpage">
<div class="top46"></div>
<div class="page-bizinfo">

<div class="header" style="position: relative;">
<h1 id="activity-name"><?php echo ($res["title"]); ?></h1>
<span id="post-date"><?php echo (date("y-m-d",$res["createtime"])); ?></span>
</div>
<a id="biz-link" class="btn" href="<?php echo U('Index/index',array('token'=>$res['token']));?>"  data-transition="slide" >
<div class="arrow">
<div class="icons arrow-r"></div>
</div>
<div class="logo">
<div class="circle"></div>
<img id="img" src="<?php echo ($tpl["headerpic"]); ?>">
</div>
<div id="nickname"><?php echo ($tpl["wxname"]); ?></div>
<div id="weixinid">微信号:<?php echo ($tpl["weixin"]); ?></div>
</a>
<?php if(($res["showpic"]) == "1"): ?><div class="showpic"><img src="<?php echo ($res["pic"]); ?>" /></div><?php endif; ?>
<div class="text" id="content">
<?php echo (htmlspecialchars_decode($res["info"])); ?>
</div>

 <script>

function dourl(url){
location.href= url;
}
</script>

</div>	

    <div class="list">
<div id="olload">
<span>往期回顾</span>
</div>

<div id="oldlist">
<ul>
  <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lo): $mod = ($i % 2 );++$i;?><li class="newsmore">
	<!--在整合列表页和分类也的时候，这里修改过模板-->
		<a href="<?php echo U('Index/content',array('token'=>$lo['token'],'id'=>$lo['id'],'classid'=>intval($_GET['classid'])));?>">
		<div class="olditem">
		<div class="title"><?php echo ($lo["title"]); ?></div> 
		</div>
		</a>
	</li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
   <a class="more" href="<?php echo U('Index/lists',array('token'=>$res['token'],'classid'=>$res['classid']));?>">更多精彩内容</a>	</div>
</div>
<a class="footer" href="#news" target="_self"><span class="top">返回顶部</span></a>

</div>

 <div style="display:none"><?php echo (htmlspecialchars_decode($res["tongji"])); ?></div>

  <div class="copyright">
<?php if($iscopyright == 1): echo ($homeInfo["copyright"]); ?>
<?php else: ?>
<?php echo ($siteCopyright); endif; ?>
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
<!-- share -->

		<script type="text/javascript">

			window.shareData = {  
				"moduleName":"Img",
				"moduleID": '<?php echo (intval($_GET["id"])); ?>',
				"imgUrl": "<?php echo ($res["pic"]); ?>", 
				"timeLineLink": "<?php echo ($f_siteUrl); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid'],'id'=>intval($_GET['id'])));?>",
				"sendFriendLink": "<?php echo ($f_siteUrl); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid'],'id'=>intval($_GET['id'])));?>",
				"weiboLink": "<?php echo ($f_siteUrl); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid'],'id'=>intval($_GET['id'])));?>",
				"tTitle": "<?php echo ($res["title"]); ?>-<?php echo ($tpl["wxname"]); ?>",
				"tContent": "<?php echo (str_replace('"','',str_replace("\r\n",' ',mb_substr(trim(strip_tags(htmlspecialchars_decode($res["text"]))),0,30,'utf-8')))); ?>"
			};
		</script>	

<?php echo ($shareScript); ?>
</body>
</html>