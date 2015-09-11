<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图片审核</title>
<link href="<?php echo RES;?>/images/main.css" type="text/css" rel="stylesheet">
<script src="<?php echo STATICS;?>/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/function.js" type="text/javascript"></script>
<meta http-equiv="x-ua-compatible" content="ie=7" />
</head>
<body class="warp">
<div id="artlist">
	<div class="mod kjnav">
		<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($action.'/'.$vo['name'],array('pid'=>$_GET['pid'],'level'=>3,'title'=>urlencode ($vo['title'])));?>"><?php echo ($vo['title']); ?></a>
		<?php if(($action == 'Article') or ($action == 'Img') or ($action == 'Text') or ($action == 'Voiceresponse')): break; endif; endforeach; endif; else: echo "" ;endif; ?>
	</div>   	
</div>
<!--fancyBox-->
<link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/static/fancyBox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/static/fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/static/fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/fancyBox/lib/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/fancyBox/source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/fancyBox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/fancyBox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<!--fancyBox-->
<div class="cr"></div>
<form action="<?php echo U('Examine_image/set_all');?>" method="post">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
		<tr>
			<td width='80'>选中</td>
			<td>图片</td>
			<td>尺寸</td>
			<td>上传IP</td>
			<td>上传时间</td>
			<td>状态</td>
			<td>管理操作</td>
		</tr>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td align='center'><input type="checkbox" name="files_id[]" class="check" value="<?php echo ($vo["id"]); ?>"/></td>
			<td style="padding:5px;"><a class="fancybox" rel="group" href="<?php echo ($vo["url"]); ?>"><img src="<?php echo ($vo["url"]); ?>" alt="" height="50px"/></a></td>
			<td><?php echo round(($vo['size']/1024),2).'Kb';?></td>
			<td><?php echo ($vo["upload_ip"]); ?></td>
			<td><?php echo (date("Y-m-d H:i:s",$vo["time"])); ?></td>
			<td><?php if($vo['state'] == 0){echo "<span style='color:red'>未审核</span>";}else{echo "<span style='color:green'>已审核</span>";}?></td>
			<td>
				<a href="<?php echo U('System/Examine_image/set',array('id'=>$vo['id']));?>"><?php if($vo['state'] == 0){echo "通过";}else{echo "不通过";}?></a>
				&nbsp;|&nbsp;
				<a href="<?php echo U('System/Examine_image/info',array('id'=>$vo['id'],'p'=>$_GET['p']));?>">查看详情</a>
				&nbsp;|&nbsp;
				<a href="javascript:drop_confirm('您确定永久删除此图片吗？','<?php echo U('System/Examine_image/del',array('id'=>$vo['id']));?>')">删除</a>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<tr bgcolor="#FFFFFF">
			<td align="center">选中所有&nbsp;<input type="checkbox" id="checkAll" value="0" style="vertical-align:middle;"></td>
			<td align="center"><input type="submit" id="set_all" value="一键审核所有选中"></td>
			<td colspan="8"><div class="listpage"><?php echo ($page); ?></div></td>
		</tr>
	   
	</table>
	<div id="info" style="padding:20px;width:400px;height:400px;overflow:auto;display:none"></div>
</form>
<script type="text/javascript">
	$(function(){
		$(".fancybox").fancybox();
	
		$('#checkAll').click(function(){
			var ischecked = $(this).is(':checked');
			if(ischecked){
				$('.check').prop('checked',true);
			}else{
				$('.check').prop('checked',false);
				//location.reload();
			}
		});
	});
	function drop_confirm(msg, url){
			if(confirm(msg)){
				window.location = url;
			}
		}
</script>
</body>
</html>