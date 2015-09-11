<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>需求大厅</title>
</head>

<body><table width="100%" border="1">
    <tbody>
    <tr>
        <td><div align="center">←</div></td>
        <td colspan="2"><div align="center">爱帮忙</div></td>
    </tr>
    <tr>
        <td><div align="center">
            <select name="type">
                <option value="0">需求类别</option>

               <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><option value="<?php echo ($t["id"]); ?>"><?php echo ($t["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div></td>
        <td><div align="center">默认排序</div></td>
        <td><div align="center">帅选</div></td>
    </tr>
    <!--内容start-->
    <?php if(is_array($needs)): $i = 0; $__LIST__ = $needs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$need): $mod = ($i % 2 );++$i;?><tr>
            <td>
                <a href="<?php echo U('Wap/Weneed/detail',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$need['id']));?>">
                    <p align="center">【<?php echo ($type[$need['need_type']]['name']); ?>】<?php echo ($need['title']); ?></p>
                </a>

                <p align="center"><?php echo ($region[$need['region']]['name']); ?>→<?php echo ($region[$need['region2']]['name']); ?></p>
            </td>
            <td><p align="center">￥<?php echo ($need['money']); ?></p>
                <p align="center">07-06 18:00-19:00</p></td>
            <td><div align="center">帮</div></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <!--内容end-->

    <tr>
        <td><div align="center">爱帮忙首页</div></td>
        <td><div align="center">需求大厅</div></td>
        <td><div align="center">个人中心</div></td>
    </tr>
    </tbody>
</table>

</body>
</html>