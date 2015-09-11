<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
	 <div class="ksearch">
		<form action="" method="post">
			<div class="fl">
				<b class="kserico">快速搜索：</b>搜索类型：
				<select name="type">
					<option value="1">公众号名称</option>
					<option value="2">公众号ID</option>
					<option value="3">公众号邮箱</option>
					<option value="4">订单号</option>
				</select>
				<input name="name" class="ipt" type="text" value=""/> 
			</div>
			<div class="fl">
				<b>排序方式：</b>
				<select name="order">
					<option value="0">时间（倒序）</option>
					<option value="1">时间（顺序）</option>
				</select>
			</div>
			<div class="fl">
				<b>状态：</b>
				<select name="paid">
					<option value="0">全部</option>
					<option value="1">未对帐</option>
					<option value="2">已对帐</option>
				</select>
			</div>
			<input type="submit" class="ksub" value=""/>
		</form>
    </div>
</div>
<form action="<?php echo U('Platform/paid_all');?>" method="post">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
		<tr>
			
			<td width="80">选中</td>
			<td width="150">订单来源标识</td>
			<td width="150">订单号</td>
			<td width="150">订单金额</td>
			<td width="150">公众号</td>
			<td width="150">公众号邮箱</td>
			<td width="150">所属用户</td>
			<td width="150">产生时间</td>
			<td width="150">状态</td>
		</tr>
		<?php if(is_array($platform_list)): $i = 0; $__LIST__ = $platform_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td align='center'><input type="checkbox" name="platform_id[]" value="<?php echo ($vo["platform_id"]); ?>"/></td>
				<td align='center'><?php echo ($vo["from"]); ?></td>
				<td align='center'><?php echo ($vo["orderid"]); ?></td>
				<td align='center' style="color:blue;"><?php echo ($vo["price"]); ?></td>
				<td align='center'><?php echo ($vo["wxname"]); ?></td>
				<td align='center'><?php echo ($vo["qq"]); ?></td>
				<td align='center'><a href="<?php echo U('Users/edit',array('id'=>$vo['uid']));?>" target="_blank" style="color:blue;"><?php echo ($vo["username"]); ?></a></td>
				<td align='center'><?php echo (date('Y-m-d H:i:s',$vo["time"])); ?></td>
				<td align='center'><?php if($vo['paid'] == 1): ?>已对帐<?php else: ?>未处理【<a url="<?php echo U('Platform/paid',array('paid'=>1,'platform_id'=>$vo['platform_id']));?>" class="paid_btn" style="cursor:pointer;color:blue;">变更</a>】<?php endif; ?></td>

			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<tr bgcolor="#FFFFFF">
			<td align='center'>选中所有&nbsp;<input type="checkbox" id="checkAll" value="1" style="vertical-align:middle;"/></td>
			<td align='center'><input type="submit" id="paid_all" value="一键处理所有选中"/></td>
			<td colspan="8"><div class="listpage"><?php echo ($page); ?></div></td>
		</tr>
		<tr bgcolor="#FFFFFF"> 
			<td colspan="9"><div class="listpage" style="text-align:left;padding-left:20px;">此页总计：总金额 (<font color="blue"><?php echo floatval($platform_count['all']);?>元</font>) ，已对帐 (<font color="blue"><?php echo floatval($platform_count['ok']);?>元</font>) ，未处理 (<font color="red"><?php echo floatval($platform_count['none']);?>元</font>)</div></td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	$(function(){
		$('.paid_btn').click(function(){
			var paid_btn = $(this);
			var go_url = paid_btn.attr('url');
			if(confirm('此过程不可逆，是否确定？')){
				$.getJSON(go_url,function(result){
					if(result.status == 1){
						paid_btn.closest('td').html('已对帐');
					}else{
						alert(result.info);
					}
				});
			}
			return false;
		});
		$('#checkAll').click(function(){
			if($(this).attr('checked')){
				$(':checkbox').attr('checked','true');
			}else{
				$(':checkbox').removeAttr('checked');
			}
		});
	});
</script>
</body>
</html>