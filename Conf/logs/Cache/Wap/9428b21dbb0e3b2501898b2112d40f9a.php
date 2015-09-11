<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>发布需求</title>
</head>

<body>
<table width="100%" border="1">
    <form action="" method="post">
    <tbody>
    <tr>
        <td><div align="center">←</div></td>
        <td ><div align="left">爱帮忙</div></td>
    </tr>
    <tr>
        <td><div align="center">需求：</div></td>
        <td><div align="left">
            <input type="text" name="title">
        </div></td>
    </tr>
    <tr>
        <td><div align="center">类型：</div></td>
        <td><div align="left">
            <select name="need_type">
                <option value="0">请选择类型</option>

                <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><option value="<?php echo ($t["id"]); ?>"><?php echo ($t["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

            </select>
        </div></td>

    </tr>
    <tr>
        <td><div align="center">详情：</div></td>
        <td><div align="left">
            <input type="text" name="detail">
        </div></td>

    </tr>
    <tr>
        <td><div align="center">备注：</div></td>
        <td><div align="left">
            <input type="text" name="note">
        </div></td>

    </tr>
    <tr>
        <td><div align="center">区域：</div></td>

        <td><div align="left">
            <select name="region">
                <option value="0">请选择区域</option>

                <?php if(is_array($region)): $i = 0; $__LIST__ = $region;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><option value="<?php echo ($r["id"]); ?>"><?php echo ($r["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

            </select>

            <br>
            <select name="region2">
            <option value="0">请选择区域</option>

            <?php if(is_array($region)): $i = 0; $__LIST__ = $region;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($r2["id"]); ?>"><?php echo ($r2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

        </select>
        </div></td>

    </tr>
    <tr>
        <td><div align="center">地址详情：</div></td>
        <td><div align="left">
            <input type="text" name="address">
        </div></td>

    </tr>
    <tr>
        <td><div align="center">联系方式：</div></td>
        <td><div align="left">
            <input type="text" name="contact">
        </div></td>

    </tr>
    <tr>
        <td><div align="center">时间：</div></td>
        <td><div align="left">
            <input type="text" name="send_time"> <input type="text" name="time_zone">
        </div></td>

    </tr>
    <tr>
        <td><div align="center">佣金：</div></td>
        <td><div align="left">
            <input type="text" name="money">
        </div></td>

    </tr>
    <tr>
        <td><div align="center">提交：</div></td>
        <td><div align="left">
            <input type="submit" value="提交">
        </div></td>

    </tr>

    </tbody>
    </form>
</table>

</body>
</html>