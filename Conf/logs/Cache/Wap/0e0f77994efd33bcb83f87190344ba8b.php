<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="Author" content="Chacha" />
    <meta name="Keywords" content="15小时形象设计">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta content=”telephone=no” name=”format-detection” />
    <title>爱帮忙－个人中心</title>
    <link type="text/css"  rel="stylesheet" href="tpl/static/weneed/css/reset.css">
    <link type="text/css"  rel="stylesheet" href="tpl/static/weneed/css/commonstyle.css">
    <link type="text/css"  rel="stylesheet" href="tpl/static/weneed/css/usercenter.css">
    <!-- <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script> -->

    </head>
    <body>
        <!--container start-->
    <div class="container">
        <nav class="nav-bar">
            <ul>
                <li id="btn-menu"><a href="<?php echo U('Wap/Weneed/home',array('token'=>$token,'wecha_id'=>$wecha_id));?>"><span><img src="tpl/static/weneed/images/icon_img/btn-menu.gif"></span>主页</a></li>
                <li id="btn-need"><a href="<?php echo U('Wap/Weneed/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>"><span><img src="tpl/static/weneed/images/icon_img/btn-needs.gif"/></span>需求大厅</a></li>
                <li id="btn-user"><a href="<?php echo U('Wap/Weneed/user',array('token'=>$token,'wecha_id'=>$wecha_id));?>"><span><img src="tpl/static/weneed/images/icon_img/btn-user-active.png"/></span>个人中心</a></li>
            </ul>
        </nav>
    <div class="content-box">
    <div class="user-head">
    <div>
    <span class="user-header">
    <!--<img src="tpl/static/weneed/images/header.jpg"/>-->
            <img src="<?php echo ($user["headpic"]); ?>"/>

    </span>
    <span class="user-name"><?php echo ($user["nickname"]); ?></span>
    </div>
    <div class="user-detail">
    <div class="income"><?php echo ($user["money"]); ?></br>总收益</div>
    <div class="integration"><?php echo ($user["point"]); ?></br>总积分</div>
    </div>
    </div>
    <div class="order-detail">
    <ul>
    <li><a href="#"><span><img src="tpl/static/weneed/images/icon_img/icon-delivery.gif"/></span></a>待配送</li>
    <li><a href="#"><span><img src="tpl/static/weneed/images/icon_img/icon-receive.gif"/></span></a>待收货</li>
    <li style="border: none;"><a href="#"><span><img src="tpl/static/weneed/images/icon_img/icon-cancel.gif"/></span></a>退款/已取消</li>
    </ul>
    </div>
    <div class="function-list">
    <div><a href="#"><img src="tpl/static/weneed/images/icon_img/icon-search.gif"/>全部订单<img src="tpl/static/weneed/images/icon_img/right-arrow.png" class="right-arrow"/></a></div>
    <div><a href="#"><img src="tpl/static/weneed/images/icon_img/icon-wallet.gif"/>我的卡包<img src="tpl/static/weneed/images/icon_img/right-arrow.png" class="right-arrow"/></a></div>
    <div><a href="#"><img src="tpl/static/weneed/images/icon_img/icon-message.gif"/>消息中心<img src="tpl/static/weneed/images/icon_img/right-arrow.png" class="right-arrow"/></a></div>
    <div><a href="#"><img src="tpl/static/weneed/images/icon_img/icon-question.gif"/>常见问题<img src="tpl/static/weneed/images/icon_img/right-arrow.png" class="right-arrow"/></a></div>
    <div><a href="#" style="border:none;"><img src="tpl/static/weneed/images/icon_img/icon-contact.gif"/>联系我们<img src="tpl/static/weneed/images/icon_img/right-arrow.png" class="right-arrow"/></a></div>
    </div>
    </div>
    </div><!--container end-->
    </body>
    </html>