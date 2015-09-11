<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>我的发布列表</title>
</head>

<body>
<div align="center">
    <table width="100%" border="1">
        <tbody>
        <tr>
            <th scope="col">我的发布列表</th>
        </tr>
        <?php if(is_array($help_list)): $i = 0; $__LIST__ = $help_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hl): $mod = ($i % 2 );++$i;?><tr>
                <td><div align="center">【<?php echo ($type[$hl['need_type']]['name']); ?>】<a href="#"><?php echo ($hl["title"]); ?></a> 时间：<?php echo (date("Y-m-d",$hl["create_time"])); ?></div></td>


        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>