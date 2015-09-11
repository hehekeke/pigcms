<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/numqueue/js/jquery1.8.3.js"></script>
<link href="<?php echo ($staticPath); ?>/tpl/static/numqueue/css/css.css" type="text/css" rel="stylesheet"  />
<title><?php echo ($reply_title); ?></title>
<script>
	window.onload = function(){
		var divs = document.getElementsByTagName("fu_txt");
		var len = divs.length;
		for(var i=0;i<len;i++){
			divs[i].onclick = function(){
				for(var j=0;j<len;j++){
					divs[j].style.backgroundColor = "black";
				}
				this.style.backgroundColor = "red";
			};
		}
	};
</script>
</head>
<body class="body">
<div class="content">
<form action="<?php echo U('Numqueue/store_list',array('id'=>$action_id,'token'=>$token));?>" method="POST">
  <label for="textfield"></label>
  <input type="text" name="name" class="sec_input" placeholder="搜索店面">
  <input type="submit" class="tijiao" value="搜&nbsp;&nbsp;索" style="-webkit-appearance: none;"/>
</form>
<div class="fu">
  <div class="fu_txt" style="border-bottom:1px #ccc solid" onclick="window.location.href= '/index.php?g=Wap&m=Numqueue&a=store_list&id=<?php echo ($action_id); ?>&token=<?php echo ($token); ?>';return false">
    <div  style=" float:left">附近门店</div>
    <div class="fu_img"><img src="<?php echo ($staticPath); ?>/tpl/static/numqueue/images/jiantou-hui.png" width="20px"  /></div>
    <div style="clear:both"></div>
  </div>
  <?php if($is_hot == 1): ?><div class="fu_txt" style="border-bottom:1px #ccc solid" onclick="window.location.href= '/index.php?g=Wap&m=Numqueue&a=hot_store&id=<?php echo ($action_id); ?>&token=<?php echo ($token); ?>';return false">
    <div  style=" float:left">热卖品牌厅</div>
    <div class="fu_img"><img src="<?php echo ($staticPath); ?>/tpl/static/numqueue/images/jiantou-hui.png" width="20px" /> </div>
	<div style="clear:both"></div>
  </div><?php endif; ?>
  <div class="fu_txt" onclick="window.location.href= '/index.php?g=Wap&m=Numqueue&a=number_list&id=<?php echo ($action_id); ?>&token=<?php echo ($token); ?>';return false">
    <div  style=" float:left">我的排号</div>
    <div class="fu_img"><img src="<?php echo ($staticPath); ?>/tpl/static/numqueue/images/jiantou-hui.png" width="20px"  /></div>
    <div style="clear:both"></div>
  </div>
   </div>
</div>
<div class="content" style="padding-top:0">
<ul>
<?php if(is_array($store_list)): $i = 0; $__LIST__ = $store_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li onclick="window.location.href= '<?php echo U('Numqueue/detail_store',array('store_id'=>$vo['id'],'id'=>$vo['action_id'],'token'=>$vo['token']));?>';return false">
<div class="data">
<div class="data_img"><img src="<?php echo ($vo["logo"]); ?>" /></div>
<div class="data_arc">
<div class="data_title"><?php echo ($vo["name"]); ?></div>
<div class="data_arc_arc">
<div class="data_left" style="width:52%;">
<div class="data_left_top">
<div class="data_left_left"><?php echo ($vo["remark"]); ?></div>
<div style="clear:both"></div>
</div>
<div class="data_left_top">
<div class="data_left_left"> <div class="data_left_txt" style="color:#777B7E"><?php echo ($vo['opentime']); ?>:00--<?php echo ($vo['closetime']); ?>:00</div></div>
<div style="clear:both"></div>
</div>
<div class="data_left_top">
<div class="data_left_left">&yen;<?php echo ($vo["price"]); ?>/人</div>
<!--div class="data_left_right"> <div class="data_left_right_txt" style="margin-left:3px;"><?php if(!isset($is_loaded)): ?>定位中...<?php else: echo ($vo['distancestr']); endif; ?></div></div-->
<div style="clear:both"></div>
</div>
</div>
<div class="data_right">
<div class="data_right_right"><img src="<?php echo ($icon); ?>" style="  margin-top: 15px; width:30px;" /></div>
<div class="data_right_right0" id="wait_count_<?php echo ($vo["id"]); ?>"><?php echo ($vo["receive_count"]); ?></div>
<!--script>
$(function(){
	var id = '<?php echo ($vo["id"]); ?>';
	var token = '<?php echo ($vo["token"]); ?>';
	$.get("/index.php?g=Wap&m=Numqueue&a=ajax_waits&store_id="+id+"&token="+token,function(data){
		$("#wait_count_"+id).text(data);
	});
});
</script-->
<div class="data_right_right"><span>位</span><br /><span>在等待</span></div>
<div style="clear:both"></div>
</div>
<div style="clear:both"></div>
</div>
</div>
</div>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
<br /><br />
<script>
	window.shareData = {  
		"moduleName":"Numqueue",
		"moduleID":"0",
		"imgUrl": "<?php echo ($f_siteUrl); ?>/tpl/static/numqueue/images/paidui.png", 
		"timeLineLink": "<?php echo ($f_siteUrl); echo U('Numqueue/index',array('token'=>$token,'id'=>$action_id));?>",
		"sendFriendLink": "<?php echo ($f_siteUrl); echo U('Numqueue/index',array('token'=>$token,'id'=>$action_id));?>",
		"weiboLink": "<?php echo ($f_siteUrl); echo U('Numqueue/index',array('token'=>$token,'id'=>$action_id));?>",
		"tTitle": "<?php echo ($reply_title); ?>",
		"tContent": "<?php echo ($reply_title); ?>",
		"fTitle": "<?php echo ($reply_title); ?>",
	};
</script>
<?php echo ($shareScript); ?>
</body>
</html>