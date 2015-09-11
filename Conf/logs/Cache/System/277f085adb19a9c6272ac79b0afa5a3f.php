<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
	onload = function() {
		$("#clas1").val(<?php echo ($info['class1']); ?>);
        $("#clas2").val(<?php echo ($info['class2']); ?>);
        $("#clas3").val(<?php echo ($info['class3']); ?>);
    }        
</script>
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
<div id="artlist">
	<?php if($wxname == null): ?><div class="ksearch">
		 	<div class="fl">
		 		<span style="color:red">请设置公众号后再进行新闻管理操作。</span>
		 	</div>
	 		<form action="<?php echo U('News/insert');?>" method="post" style="float:left;margin-left:80px">
	 		<input type="hidden" name="pid" class="ipt" value="<?php echo ($pid); ?>" size="45"/>
	 		公众号：
		 		<input name="new" type="text" value="">
		 		<input type="submit" value=" 确 定 ">
	 		</form>
	    </div>
	<?php else: ?>
	    <div class="ksearch">
	    	<div style="margin-left:20px"><b>当前公众号：<?php echo ($wxname); ?></b><span style="margin-left:40px"><a href="<?php echo U('News/del',array('wxname'=>$wxname,'pid'=>$pid));?>">退出</a></span></div>
	    </div><?php endif; ?>
</div>
<?php if($wxname != null): ?><table width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
		<tr>
			<td width="100">id</td>
			<td >新闻分类1</td>
			<td >新闻分类2</td>
			<td >新闻分类3</td>
			<td width="200">操作</td>
		</tr>
		<form action="<?php echo U('News/upsave');?>" method="post">
			<tr>
				<td align='center'><?php echo ($info["id"]); ?></td>
				<td align='center'>
					<select style="height:25px;width:200px" id="clas1" name="class1"> 
						<option value ="0">——请选择新闻分类——</option>
						<?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value ="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</td>
				<td align='center'>
					<select style="height:25px;width:200px" id="clas2" name="class2"> 
						<option value ="0">——请选择新闻分类——</option>
						<?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value ="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</td>
				<td align='center'>
					<select style="height:25px;width:200px" id="clas3" name="class3"> 
						<option value ="0">——请选择新闻分类——</option>
						<?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value ="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</td>

				<td style="display:none">
					<input name="tok" type="text" value="<?php echo ($tok); ?>">
					<input name="name" type="text" value="<?php echo ($wxname); ?>">
					<input type="hidden" name="pid" class="ipt" value="<?php echo ($pid); ?>" size="45"/>
				</td>
				<td align='center'>
					<input type="submit" value=" 确 定 ">
				</td>
			</tr>
		</form>
	</table>
	<div style="color:red;margin:10px 0 0 20px;font-size:13px;">请选择文章分类,系统会选取每个分类下的5篇文章作为新闻信息。</div><?php endif; ?>
</body>
</html>