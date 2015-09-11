<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台首页</title>
<link href="<?php echo RES;?>/images/main.css" type="text/css" rel="stylesheet">
<meta http-equiv="x-ua-compatible" content="ie=7" />
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
</head>
<body style="background:none">
<div class="content">
<div class="box" style="width:95%">
	<h3><?php if($needUpdate): ?>有更新请备份好文件<?php else: ?>暂时没有更新<?php endif; ?></h3>
    <div class="con dcon">
    <div class="update">
    <?php if($needUpdate): ?><p style="color:red；font-size:18px">温馨提示：此升级为官方同步升级，更新包为Zend加密，需要zend loader运行环境。交流QQ：75943938</p>
    <p style="color:red">注意了：在升级前请先备份好您的网站文件，不做备份直接升级可能造成网站不能访问，不做备份直接升级造成的网站问题概不负责</p>
    <p style="color:red">另外：必须做好数据库备份</p>
    <p style="color:red">备份就是把您的网站文件拷贝一份放到其他地方</p>
   <p><a href="?g=System&m=System&a=doUpdate" class="blue">我已经备份好了，升级吧</a></p>
   <?php else: ?>暂时没有更新 <a href="?g=System&m=System&a=main" class="blue">返回</a><?php endif; ?>
    </div>
  
    </div>
</div>
<!--/box-->

<!--/box-->
</div>
<script>

</script>
</body>
</html>