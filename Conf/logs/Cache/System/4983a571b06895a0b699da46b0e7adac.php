<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>权限管理</title>
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
<div class="cr"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
	  <tr>
		<td width="150">图片位置</td>
		<td>图片</td>
		<td width="100">管理操作</td>
	  </tr>

		<tr>
			<td ><b>功能介绍</b></td>
			<td ><img src="<?php echo ($list['fc']); ?>" style="height:150px"/></td>
			<td align='center'>
				<a href="<?php echo U('Images/edit/',array('id'=>1,'pid'=>$pid));?>">修改</a>
			</td>
		</tr>

		<tr>
			<td ><b>关于我们</b></td>
			<td ><img src="<?php echo ($list['about']); ?>" style="height:150px"/></td>
			<td align='center'>
				<a href="<?php echo U('Images/edit/',array('id'=>2,'pid'=>$pid));?>">修改</a>
			</td>
		</tr>

		<tr>
			<td ><b>资费说明</b></td>
			<td ><img src="<?php echo ($list['price']); ?>" style="height:150px"/></td>
			<td align='center'>
				<a href="<?php echo U('Images/edit/',array('id'=>3,'pid'=>$pid));?>">修改</a>
			</td>
		</tr>

		<tr>
			<td ><b>产品案例</b></td>
			<td ><img src="<?php echo ($list['common']); ?>" style="height:150px"/></td>
			<td align='center'>
				<a href="<?php echo U('Images/edit/',array('id'=>4,'pid'=>$pid));?>">修改</a>
			</td>
		</tr>

		<tr>
			<td ><b>管理中心</b></td>
			<td ><img src="<?php echo ($list['login']); ?>" style="height:150px"/></td>
			<td align='center'>
				<a href="<?php echo U('Images/edit/',array('id'=>5,'pid'=>$pid));?>">修改</a>
			</td>
		</tr>

		<tr>
			<td ><b>帮助中心</b></td>
			<td ><img src="<?php echo ($list['help']); ?>" style="height:150px"/></td>
			<td align='center'>
				<a href="<?php echo U('Images/edit/',array('id'=>6,'pid'=>$pid));?>">修改</a>
			</td>
		</tr>


     <tr bgcolor="#FFFFFF"> 
      <td colspan="8"><div class="listpage"><?php echo ($page); ?></div></td>
    </tr>
   
</table>

<div class="bottom">

</div>

</body>
</html>