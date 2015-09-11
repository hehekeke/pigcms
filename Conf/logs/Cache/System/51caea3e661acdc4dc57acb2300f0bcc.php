<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>短信接口</title>
<link href="<?php echo RES;?>/images/main.css" type="text/css" rel="stylesheet">
<link href="<?php echo RES;?>/images/jquery-1.7.2.min.js" type="text/css" rel="stylesheet">
<link href="<?php echo RES;?>/images/jquery.form.js" type="text/css" rel="stylesheet">
<meta http-equiv="x-ua-compatible" content="ie=7" />
</head>
<body class="warp">
<style>
.set_top{background:url('<?php echo RES;?>/images/set_top.png');height:60px;}
.set_top li{font-weight: bold;float:left;width:98px;line-height:60px;text-align: center;background:url('<?php echo RES;?>/images/set_top_li.png');}
#set_top_li_bg{background:url('<?php echo RES;?>/images/set_top_li_hover.png');}
</style>
<div class="set_top">
	<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if(ACTION_NAME == $vo['name']): ?>id="set_top_li_bg"<?php endif; ?>><a href="<?php echo U($action.'/'.$vo['name'],array('pid'=>6,'level'=>3));?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<script>
function sendtest(){
	location.href="<?php echo U('Site/smssendtest');?>&mp="+document.getElementById('sms_mp').value;
}
</script>
<div id="artlist">
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="addn">
 <form id="myform" action="" method="post">
    <tr> 
      <td  height="48" align="right"><strong>appId：</strong></td>
      <td><input type="text" name="appId" value="<?php echo ($site['appId']); ?>" class="ipt" size="45" /><span>&nbsp;&nbsp;微信公众平台应用appId</span>
	  </td>
    </tr>
	 <tr> 
      <td  height="48" align="right"><strong>appSecret：</strong></td>
      <td><input type="text" name="appSecret" value="<?php echo ($site['appSecret']); ?>" class="ipt" size="45" /><span>&nbsp;&nbsp;微信公众平台应用appSecret</span>
    </tr>
     <tr> 
      <td  height="48" align="right"><strong>token：</strong></td>
      <td><input type="text" name="token" value="<?php echo ($site['token']); ?>" class="ipt" size="45" /><span>&nbsp;&nbsp;
	 公众号消息校验Token</span>
	  
    </tr>
    <tr>
      <td  height="48" align="right"><strong>aesKey：</strong></td>
      <td><input type="text" name="encodingAesKey" value="<?php echo ($site['encodingAesKey']); ?>" class="ipt" size="45" /><span>&nbsp;&nbsp;公众号消息加解密Key</span>
    </tr>

    <tr> 
      <td height="48" colspan="2">
		  <div id="addkey"></div>
		  <div style="padding-left:100px;">
			<input type="hidden" name="type" value="1">
			<input type="submit" value="保存设置" />
		  </div>
	  </td>
    </tr>
	</form>
</table><br />
<br />
<br />

</div>
</body>
</html>