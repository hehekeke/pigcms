<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>代理商优惠套餐管理</title>
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
	  <td align="left" style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;代理商名称</td>
		 <td align="left" style="text-align:left">用途</td>
			<td>费用</td>
			<td>时间</td>
			<td>成功</td>
		<td>管理操作</td>
	  </tr>
	    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
			<td align="left" style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($list["agentname"]); ?></td>
			<td align="left" style="text-align:left"><?php echo ($list["des"]); ?></td>
		<td><?php echo ($list["amount"]); ?></td>
		<td><?php echo date('Y-m-d H:i:s',$list['time']); ?></td>
	<td><?php if($list['status'] == '1'): ?><span style="color:green">已成功</span><?php else: ?><span style="color:red">未成功</span><?php endif; ?></td>
				<td align='center'>
					<?php if($list['canconfirm'] == '1'): ?><a href="<?php echo U('AgentBuyRecords/confirm',array('id'=>$list['id']));?>">确认</a><?php endif; ?>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
     <tr bgcolor="#FFFFFF"> 
      <td colspan="8"><div class="listpage"><?php echo ($page); ?></div></td>
    </tr>
   
</table>


</body>
</html>