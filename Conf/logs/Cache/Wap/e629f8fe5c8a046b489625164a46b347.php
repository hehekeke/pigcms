<?php if (!defined('THINK_PATH')) exit();?><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="ddtab">
<tbody>
<tr style="background-color:#fc6; line-height:40px;">
	<td>排名</td>
	<td>选项</td>
	<td>我投的票数</td>
	<td>得票数</td>
</tr>
<?php if($vote_record != ''): if(is_array($vote_record)): $k = 0; $__LIST__ = $vote_record;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
<td><?php echo ($k); ?></td>
<td><?php echo ($vo["vote_title"]); ?></td>
<td><?php echo ($vo["my_vote_count"]); ?></td>
<td><?php echo ($vo["vote_count"]); ?></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
<?php else: ?>
<tr><td colspan=4 align="center">暂无记录</td></tr><?php endif; ?>
</tbody>
</table>