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
 <form id="myform" action="<?php echo U('Site/insert');?>" method="post">
    <tr> 
      <td  height="48" align="right"><strong>共售出：</strong></td>
      <td><?php echo ($total); ?>条
	  </td>
    </tr>
    <tr style="display:none"> 
      <td  height="48" align="right"><strong>接口地址：</strong></td>
      <td><input type="text" name="sms_url" value="<?php echo C('sms_url');?>" class="ipt" size="45" /><span>&nbsp;&nbsp;</span>
	  </td>
    </tr>
	 <tr> 
      <td  height="48" align="right"><strong>短信key：</strong></td>
      <td><input type="text" name="sms_key" value="<?php echo C('sms_key');?>" class="ipt" size="45" /><span>&nbsp;&nbsp;联系pigcms获取</span>
    </tr>
     <tr> 
      <td  height="48" align="right"><strong>价格：</strong></td>
      <td><input type="text" name="sms_price" value="<?php echo C('sms_price');?>" class="ipt" size="45" /><span> 每条多少分钱（卖给客户的）&nbsp;&nbsp;</span>
	  
    </tr>
    <tr> 
      <td  height="48" align="right"><strong>签名：</strong></td>
      <td><input type="text" name="sms_sign" value="<?php echo C('sms_sign');?>" class="ipt" size="45" /><span>&nbsp;&nbsp;短信的后缀，必须带有签名</span>
    </tr>
    <tr> 
      <td  height="48" align="right"><strong>测试：</strong></td>
      <td><input type="text" name="sms_mp" value="<?php echo C('sms_mp');?>" id="sms_mp" class="ipt" size="45" /><span> 输入手机号以后，然后<a href="###" onclick="sendtest()" style="color:red">点击这里</a></span>进行测试
	     </td>
    </tr>

        <input type="hidden" name="reg_mp_verify" value="0" id="regOff" />
        

   <input type="hidden" name="files" value="sms.php" />
    <tr> 
      <td height="48" colspan="2">
		  <div id="addkey"></div>
		  <div style="padding-left:100px;">
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