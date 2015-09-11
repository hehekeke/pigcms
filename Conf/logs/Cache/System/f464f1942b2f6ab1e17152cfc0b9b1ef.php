<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>代理商管理</title>
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
	  <td>ID</td>
		<td width="150">名称</td>
		<td>账户数</td>
		<td>公众号数</td>
		<td width="200">url</td>
		<td>手机</td>
		<td>余额</td>
		<td>到期日期</td>
		<td>管理操作</td>
	  </tr>
	    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td ><?php echo ($vo["id"]); ?></td>
				<td ><?php echo ($vo["name"]); ?></td>
				<td ><a href="?g=System&m=Users&a=index&agentid=<?php echo ($vo["id"]); ?>"><?php if($vo["usercount"] < 0): ?>0<?php else: echo ($vo["usercount"]); endif; ?></a></td>
				<td ><a href="?g=System&m=Token&a=index&agentid=<?php echo ($vo["id"]); ?>"><?php if($vo["wxusercount"] < 0): ?>0<?php else: echo ($vo["wxusercount"]); endif; ?></a></td>
				<td ><?php echo ($vo["siteurl"]); ?></td>
				<td ><?php echo ($vo["mp"]); ?></td>
				<td ><?php echo ($vo["moneybalance"]); ?></td>
				<td ><?php echo date('Y-m-d',$vo['endtime']);?></td>
				<td align='center'>
					<a href="<?php echo U('Agent/add/',array('id'=>$vo['id']));?>">修改</a> <a href="###" onclick="if(confirm('确定要删除吗')){location.href='<?php echo U('Agent/del/',array('id'=>$vo['id']));?>';}" >删除</a> <a href="?g=System&m=Users&a=index&agentid=<?php echo ($vo["id"]); ?>">账号列表</a> <a href="?g=System&m=Token&a=index&agentid=<?php echo ($vo["id"]); ?>">公众号列表</a>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
     <tr bgcolor="#FFFFFF"> 
      <td colspan="9"><div class="listpage"><?php echo ($page); ?></div></td>
    </tr>
   
</table>


</body>
</html>