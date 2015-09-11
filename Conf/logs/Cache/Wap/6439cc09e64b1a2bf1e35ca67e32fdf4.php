<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" type="text/css" href="<?php echo STATICS;?>/vhouse/online_booking.css" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo STATICS;?>/vhouse/wap/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo STATICS;?>/vhouse/pig-ui.css" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo STATICS;?>/vhouse/common.css" media="all">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>

    <title><?php echo ($reslist['title']); ?></title>

    <style>
        #qiandaobanner,#xxx img{width:100%!important;}
        body{max-width: 100%;}
    </style>
    <script type="text/javascript">
        window.onload = function () {
            var oWin = document.getElementById("win");
            var oLay = document.getElementById("overlay");
            var oBtn = document.getElementById("popmenu");
            var oClose = document.getElementById("close");
            oBtn.onclick = function () {
                oLay.style.display = "block";
                oWin.style.display = "block";
                //oWin.style.zIndex = 99999;
            };
            oLay.onclick = function () {
                oLay.style.display = "none";
                oWin.style.display = "none";
            }
        };

        $('#plug-wrap').removeClass();
        //document.body.removeChild(document.getElementById('plug-wrap'));
    </script>
    <style>
        #plug-wrap{z-index: 0}
    </style>
    <link rel="stylesheet" href="<?php echo STATICS;?>/schools/css/plugmenu.css">
    <link href="<?php echo STATICS;?>/schools/css/news3_3.css" rel="stylesheet" type="text/css" />
</head>
<body onselectstart="return true;" ondragstart="return false;" id="onlinebooking">
   <script type="text/javascript">
window.shareData = {
            "moduleName":"School",
            "moduleID":"0",
            "imgUrl": "<?php echo ($info['head_url']); ?>",
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('School/index',array('token'=>$token));?>",
            "tTitle": "<?php echo ($info['title']); ?>",
            "tContent": "<?php echo (mb_substr(strip_tags(html_entity_decode($info['info'])),0,89,'utf-8')); ?>..."
        };
</script>
<?php echo ($shareScript); ?>

    <div id="ui-header" >
        <div class="fixed">
            <a class="ui-title" id="popmenu">选择分类</a> <a class="ui-btn-left_pre" href="<?php echo U('School/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>">
            </a><a class="ui-btn-right" href=""></a>
        </div>
    </div>
    <div id="overlay"></div>
<div id="win" >
<ul class="dropdown">
<?php if(is_array($cat)): $i = 0; $__LIST__ = $cat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($cat["url"]); ?>"><span><?php echo ($cat["name"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
<!--
<li><a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'cid'=>$info['menu1_id']));?>"><span><?php echo (($info['menu1'])?($info['menu1']):'学校简介'); ?></span></a></li>
<li><a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'cid'=>$info['menu2_id'],'type'=>'assess'));?>"><span><?php echo (($info['menu2'])?($info['menu2']):'教师风采'); ?></span></a></li>
<li><a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'cid'=>$info['menu3_id']));?>"><span><?php echo (($info['menu3'])?($info['menu3']):'同学天地'); ?></span></a></li>
<li><a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'cid'=>$info['menu4_id'],'type'=>'yyclass'));?>"><span><?php echo (($info['menu4'])?($info['menu4']):'课程介绍'); ?></span></a></li>
<li><a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>'school'));?>"><span><?php echo (($info['menu5'])?($info['menu5']):'食谱安排'); ?></span></a></li>
<li><a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'cid'=>$info['menu6_id']));?>"><span><?php echo (($info['menu6'])?($info['menu6']):'校园公告'); ?></span></a></li>
<li><a href="<?php echo U('School/qresults',array('token'=>$token,'wecha_id'=>$wecha_id));?>"><span><?php echo (($info['menu7'])?($info['menu7']):'成绩查询'); ?></span></a></li>
<li><a href="<?php echo U('Reply/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>"><span><?php echo (($info['menu8'])?($info['menu8']):'家长建议'); ?></span></a></li>
<li><a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>'course'));?>"><span><?php echo (($info['menu9'])?($info['menu9']):'课程预约'); ?></span></a></li>
<li><a href="<?php echo U('School/public_list',array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>'curriculum'));?>"><span><?php echo (($info['menu10'])?($info['menu10']):'课程安排'); ?></span></a></li>
-->
<div class="clr"></div>
 </ul>
</div>
<div class="qiandaobanner" id="qiandaobanner">

    <img src="<?php echo ($reslist['headpic']); ?>">

</div>
<div class="cardexplain">

    <ul class="round">
        <li>
            <a href="<?php echo U('School/mylist',array('token'=>$token,'wecha_id'=>$wecha_id,'rid'=>$_GET['id'],'type'=>$_GET['readtype']));?>"><span>我的预约订单<em class="ok"><?php if($count != ''): echo ($count); else: ?>0<?php endif; ?></em></span>
            </a>
        </li>
    </ul>

    <ul class="round" id="xxx">
        <li>
            <h2>预约说明</h2>
            <div class="text"><?php echo (html_entity_decode($reslist['info'])); ?></div>
        </li>
    </ul>

    <ul class="round">
        <li class="addr"><span>课程名称: <?php echo ($reslist['keyword']); ?></span></li>
        <li class="addr"><span>开课时间: <?php echo ($reslist['typename3']); ?></span></li>
        <li class="addr"><span>截止时间: <?php echo ($reslist['date']); ?></span></li>
        <li class="addr"><span>地址： <?php echo ($reslist['address']); ?></span></li>
        <li class="tel"><a href="tel:<?php echo ($reslist['tel']); ?>"><span>预约电话： <?php echo ($reslist['tel']); ?></span></a></li>
    </ul>
    <?php if($reslist['longitude'] != ''): ?><ul class="round roundyellow" >
            <li class="userinfo"><a href="http://chabus.duapp.com/mapapi.php?lng=<?php echo ($reslist['longitude']); ?>&lat=<?php echo ($reslist['latitude']); ?>&title=预约&info=<?php echo ($reslist['name']); ?>"><span>点击查看地图</span></a></li>
        </ul><?php endif; ?>

    <ul class="round">

        <div class="">
            <ul class="round">
                <li class="title mb"><span class="none">请认真填写在线预约信息！</span></li>
                <input type="hidden" name="type" value="course">
                <input type="hidden" name="token" value="<?php echo ($token); ?>">
                <input type="hidden" name="wecha_id" value="<?php echo ($wecha_id); ?>">

                <li class="nob" id="namea">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                        <tbody><tr>
                            <th>姓名</th>
                            <td><input name="truename" type="text" class="px" id="truename" value="" onblur="check1(this)" onfocus="check2(this)" placeholder="请输入真实姓名" data-validation-engine="validate[required,minSize[2],maxSize[8]]" data-errormessage-value-missing="必填项" data-prompt-position="bottomLeft"></td>
                        </tr>
                        </tbody></table>
                </li>

                <li class="nob" id="phonea">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                        <tbody><tr>
                            <th>联系电话</th>
                            <td><input name="mobile" type="text" class="px" id="mobile" value="" onfocus="check2(this)" onblur="check3(this)"  placeholder="请输入您的电话" data-validation-engine="validate[required,minSize[11],maxSize[11]]" data-errormessage-value-missing="必填项" data-prompt-position="bottomLeft"></td>
                        </tr>
                        </tbody></table>
                </li>
                <!--自己添加的微信号填写栏-->
                <li class="nob" id="phonea">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                        <tbody><tr>
                            <th>微信号</th>
                            <td><input name="wx" type="text" class="px" id="wx" value=""   placeholder="请输入您的微信号" ></td>
                        </tr>
                        </tbody></table>
                </li>
                <!--自己添加的微信号填写栏-->


                <li class="nob" id="diseasea">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                        <tbody><tr>
                            <th>备注</th>
                            <td><input name="info" type="text" class="px" id="info" value="" placeholder="以上如有不足或有其它要求，请在此填写！"></td>
                        </tr>
                        </tbody></table>
                </li>

            </ul>


        </div>

    </ul>
    <div class="footReturn">
        <?php
if(strtotime($reslist['date']) >= time()){ ?>
        <input id="showcard" class="submit" value="提交消息" type="button" style="width: 100%;cursor: pointer;">
        <?php
}else{ ?>
        <input  class="submit" value="已经结束报名" readonly disabled type="button" style="width: 100%;">
        <?php
} ?>


        <div class="window" id="windowcenter">
            <div id="title" class="wtitle">操作提示<span class="close" id="alertclose"></span></div>
            <div class="content">
                <div id="txt"></div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">

    $("#showcard").bind("click",
            function() {
                var btn = $(this);
                var truename    = $("#truename").val();
                var mobile      = $("#mobile").val();
                var info        = $("#info").val();
                var housetype   = "<?php echo ($reslist['keyword']); ?>";
                var type        = 'course';
                var token       = "<?php echo ($token); ?>";
                var wecha_id    = "<?php echo ($wecha_id); ?>";
                var rid         = <?php echo ($reslist['id']); ?>;
                var dateline    = "<?php echo ($reslist['typename3']); ?>";
                var address     = "<?php echo ($reslist['address']); ?>";
                var choose      = "<?php echo ($reslist['typename']); ?>";
                //var portrait       = $("#portrait").val();
                //  微信号
                var wx = $("#wx").val();


                if (mobile == '') {
                    alert("请认真输入手机号");
                    return
                }

                if (truename == '') {
                    alert("请输入真实姓名");
                    return
                }

                if(wecha_id == ''){
                    alert("您可能没有关注我们的微信号,因此不能提交信息.请关注后再来.");
                    return;
                }

                var submitData = {
                    truename  : truename,
                    mobile    : mobile,
                    housetype : housetype,
                    type      : type,
                    token     : token,
                    wecha_id  : wecha_id,
                    rid       : rid,
                    info      : info,
                    dateline  : dateline,
                    address   : address,
                    choose    : choose,
                    action    : "yysave",
                    //  微信输入框的内容
                    wx          :wx
                };
                $.post("<?php echo U('School/yysave',array('token'=>$token,'wecha_id'=>$wecha_id));?>", submitData,
                        function(data) {
                            if(1==data.errno){
                                //setTimeout("window.location.href = location.href",2000);
                                alert('预约成功,请稍等...');
                                location.href = data.url;
                            }else if(2 == data.errno){
                                alert('提交信息不对,请重新输入,或者联系我们');
                            }else if(3 == data.errno){
                                alert(data.msg);
                                location.href = data.url;
                            }else{
                                alert("非常抱歉,请重新打开此页面.");
                            }
                        },
                        "json")
            });


    function check1(obj){
        if(obj.value == ''){
            alert("请输入真实的姓名.");
            document.getElementById(obj.id).style.background="red";
            return;
        }
    }
    function check2(obj){
        document.getElementById(obj.id).style.background="white";
        document.getElementById(obj.id).style.color="black";
        ///document.getElementById(obj.id).style.font="bolder";
    }
    function check3(obj){
        if(obj.value == ''){
            alert('手机号码必须填写');
            document.getElementById(obj.id).style.background="red";
            return;
        }
        reg=/^(13[0123456789]{1}\d{8}$|^15[12375689]{1}\d{8}$|^18[25436789]{1}\d{8})|(0[0-9]{1,3}\-?[0-9]{7,8})$/;
        if(!reg.test(obj.value)){
            alert("错误,请输入11位的手机号！");
            document.getElementById(obj.id).style.background="red";
            return;
        }
    }
</script>

<p><br/></p>
<div mark="stat_code" style="width:0px; height:0px; display:none;">
</div>



<div class="copyright">
      <span class="copyright">
    <?php if($iscopyright == 1): echo ($homeInfo["copyright"]); ?>
        <?php else: ?>
        <?php echo ($siteCopyright); endif; ?>
    </span>

</div>

<style>
    .top_bar{top: 93%; }
</style>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
<?php if($radiogroup > 8): ?><br>
<br><?php endif; ?>
<script>
function displayit(n){
	for(i=0;i<4;i++){
		if(i==n){
			var id='menu_list'+n;
			if(document.getElementById(id).style.display=='none'){
				document.getElementById(id).style.display='';
				document.getElementById("plug-wrap").style.display='';
			}else{
				document.getElementById(id).style.display='none';
				document.getElementById("plug-wrap").style.display='none';
			}
		}else{
			if($('#menu_list'+i)){
				$('#menu_list'+i).css('display','none');
			}
		}
	}
}
function closeall(){
	var count = document.getElementById("top_menu").getElementsByTagName("ul").length;
	for(i=0;i<count;i++){
		document.getElementById("top_menu").getElementsByTagName("ul").item(i).style.display='none';
	}
	document.getElementById("plug-wrap").style.display='none';
}

document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
});
</script> 
<script>
    $('#plug-wrap').removeClass();
    document.body.removeChild(document.getElementById('plug-wrap'));
</script>
<style>
    #plug-wrap{z-index: 0}
</style>
</body></html>