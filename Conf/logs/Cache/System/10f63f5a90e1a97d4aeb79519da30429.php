<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>权限管理</title>
<link href="<?php echo RES;?>/images/main.css" type="text/css" rel="stylesheet">
<script src="<?php echo STATICS;?>/jquery-1.4.2.min.js" type="text/javascript"></script>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>
<script src="./tpl/User/default/common/js/date/WdatePicker.js"></script>
</head>
<body class="warp">
<div id="artlist" class="addn">
<?php if(($info["id"]) > "0"): ?><form action="<?php echo U('Renew/upsave');?>" method="post" name="form" enctype="multipart/form-data" id="myform">
			<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
		<?php else: ?>
			<form action="<?php echo U('Renew/insert');?>" method="post" name="form" enctype="multipart/form-data" id="myform"><?php endif; ?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" id="addn">

				 <tr>
					<th colspan="4"><?php echo ($title); ?></th>
				</tr>
				<tr>
					<td height="48" align="right"><strong>标题：</strong></td>
					<td colspan="3" class="lt">
						<input type="name" name="name" class="ipt" value="<?php echo ($info["name"]); ?>" size="45"/>
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>url地址：</strong></td>
					<td colspan="3" class="lt">
						<input type="url" name="url" class="ipt" value="<?php echo ($info["url"]); ?>" size="45"/>
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>宣传图片：</strong></td>
					<td colspan="3" class="lt">
						<input type="text" class="ipt" id="pic3" name="imgs" value="<?php echo ($info["imgs"]); ?>" /> <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('pic3','<?php echo ($token); ?>')">上传</a> <a href="###" onclick="viewImg('pic3')">预览</a>
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>选中时图片：</strong></td>
					<td colspan="3" class="lt">
						<input type="text" class="ipt" id="pic1" name="img_x" value="<?php echo ($info["img_x"]); ?>" /> <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('pic1','<?php echo ($token); ?>')">上传</a> <a href="###" onclick="viewImg('pic1')">预览</a>
						<span style="color:red">&nbsp;&nbsp;&nbsp;建议尺寸：120x120</span>
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>未选中时图片：</strong></td>
					<td colspan="3" class="lt">
						<input type="text" class="ipt" id="pic2" name="img_w" value="<?php echo ($info["img_w"]); ?>" /> <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('pic2','<?php echo ($token); ?>')">上传</a> <a href="###" onclick="viewImg('pic2')">预览</a>
						<span style="color:red">&nbsp;&nbsp;&nbsp;建议尺寸：120x120</span>
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>小图标颜色：</strong></td>
					<td colspan="3" class="lt">
						<select style="height:25px;width:150px" name="color" id="sele"> 
							<option value ="0">——请选择颜色——</option>
							<option value ="1" <?php if($info["color"] == 1): ?>selected<?php endif; ?>>绿  色</option>
							<option value ="2" <?php if($info["color"] == 2): ?>selected<?php endif; ?>>黄  色</option>
							<option value ="3" <?php if($info["color"] == 3): ?>selected<?php endif; ?>>棕  色</option>
							<option value ="4" <?php if($info["color"] == 4): ?>selected<?php endif; ?>>蓝  色</option>
							<option value ="5" <?php if($info["color"] == 5): ?>selected<?php endif; ?>>粉  色</option>
						</select>
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>发布时间：</strong></td>
					<td colspan="3" class="lt">
						<input type="text" name="time" onClick="WdatePicker()" class="ipt" size="45" value="<?php echo ($info["time"]); ?>">
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>状态：</strong></td>
					<td colspan="3" class="lt">
						<input type="radio" class="radio" class="ipt" value="1" name="status" id="status1" <?php if(($info["status"] == 1) OR ($info['status'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="status" id="status2" <?php if(($info["status"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭
					</td>
				</tr>
				<tr>
					<td colspan="3" class="lt">
						<input type="hidden" name="pid" class="ipt" value="<?php echo ($pid); ?>" size="45"/>
					</td>
				</tr>
	<tr>
		<td colspan="4">
			<?php if(($info["id"]) > "0"): ?><input class="bginput" type="submit" name="dosubmit" value="修 改" >
				<?php else: ?>
				<input class="bginput" type="submit" name="dosubmit" value="添 加"><?php endif; ?>
			&nbsp;
			<input class="bginput" type="button" onclick="javascript:history.back(-1);" value="返 回" ></td>
	</tr>
</table>
</form>
<br />
<br />
<br />

</div>
</body>
</html>