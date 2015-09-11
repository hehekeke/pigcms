<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>需求详情</title>
</head>

<body><table width="100%" border="1">
    <tbody>
    <tr>
        <td><div align="center">←</div></td>
        <td ><div align="center">爱帮忙</div></td>
    </tr>
    <tr>
        <td><div align="center">需求：</div></td>
        <td><div align="center"><?php echo ($need['title']); ?></div></td>

    </tr>
    <tr>
        <td><div align="center">类型：</div></td>
        <td><div align="center">【<?php echo ($type[$need['need_type']]['name']); ?>】</div></td>

    </tr>
    <tr>
        <td><div align="center">详情：</div></td>
        <td><div align="center"><?php echo ($need['detail']); ?></div></td>

    </tr>
    <tr>
        <td><div align="center">区域：</div></td>
        <td><div align="center"><?php echo ($region[$need['region']]['name']); ?>→<?php echo ($region[$need['region2']]['name']); ?></div></td>

    </tr>
    <tr>
        <td><div align="center">地址详情：</div></td>
        <td><div align="center"><?php echo ($need['address']); ?></div></td>

    </tr>
    <tr>
        <td><div align="center">时间：</div></td>
        <td><div align="center"><?php echo (date('Y-m-d',$need['send_time'])); ?></div></td>

    </tr>
    <tr>
        <td><div align="center">佣金：</div></td>
        <td><div align="center"><?php echo ($need['money']); ?></div></td>

    </tr>


    </tbody>
</table>

</body>
</html>