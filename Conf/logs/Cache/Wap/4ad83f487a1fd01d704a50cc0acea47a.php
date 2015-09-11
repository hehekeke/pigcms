<?php if (!defined('THINK_PATH')) exit();?><html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="Author" content="Chacha"/>
    <meta name="Keywords" content="15小时形象设计<?php echo RES;?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta content="”telephone=no”" name="”format-detection”"/>
    <title>爱帮忙－主页</title>
    <link type="text/css" rel="stylesheet" href="tpl/static/weneed/css/reset.css">
    <link type="text/css" rel="stylesheet" href="tpl/static/weneed/css/commonstyle.css">
    <link type="text/css" rel="stylesheet" href="tpl/static/weneed/css/index.css">
    <script src="tpl/static/weneed/js/jquery.min.js"></script>
</head>
<body>
<!--container start-->
<div class="container">
    <nav class="nav-bar">
        <ul>
            <li id="btn-menu"><a href="<?php echo U('Wap/Weneed/home',array('token'=>$token,'wecha_id'=>$wecha_id));?>"><span><img src="tpl/static/weneed/images/icon_img/btn-menu-active.png"></span>主页</a></li>
            <li id="btn-need"><a href="<?php echo U('Wap/Weneed/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>"><span><img src="tpl/static/weneed/images/icon_img/btn-needs.gif"/></span>需求大厅</a></li>
            <li id="btn-user"><a href="<?php echo U('Wap/Weneed/user',array('token'=>$token,'wecha_id'=>$wecha_id));?>"><span><img src="tpl/static/weneed/images/icon_img/btn-user.gif"/></span>个人中心</a></li>
        </ul>
    </nav>
    <div class="content-box">
        <div class="banner">
            <ul class="banner-img">
                <li ><a><img id="img_tl" style="width:100%;height:100%;" src="tpl/static/weneed/images/baner1.jpg"/></a></li>
            </ul>
            <ul class="tab-bar">
                <li id="t1"  onmouseover="hover_ad(this)" style="border-right: 2px rgb(215,215,215) solid"><a href="#" class="tab-bar-active">免费领军训背心</a></li>
                <li id="t2" onmouseover="hover_ad(this)"><a href="#">3.9元麦当劳领回家</a></li>
            </ul>
        </div>
        <div class="icon-list">
            <ul>
                <li><a href="#"><span><img/></span></a>图标一</li>
                <li><a href="#"><span><img/></span></a>图标二</li>
                <li><a href="#"><span><img/></span></a>图标三</li>
            </ul>
        </div>
        <div class="help-tabs">
            <ul class="tab-btn">
                <li class="active-tab"><a href="#">我爱帮忙</a></li>
                <li><a href="<?php echo U('Wap/Weneed/help',array('token'=>$token,'wecha_id'=>$wecha_id));?>">需要帮忙</a></li>
            </ul>
            <ul class="tab-content">
                <li class="love-help-tab">
                    <p>
                        此处为加入爱帮忙流程示意图或发布需求操作流程图
                    </p>
                </li>
                <li class="need-help-tab"></li>
            </ul>
        </div>
    </div>
</div>
<!--container end-->
<script>
    function hover_ad(t){

        $("li > a").removeClass("tab-bar-active");
        $(t).children("a").addClass("tab-bar-active");
        //$("#img_tl").attr('src',"http://wx.imakebe.com/tpl/Home/pigcms/common/images/logo-pigcms.png");

    }
</script>
</body>
</html>