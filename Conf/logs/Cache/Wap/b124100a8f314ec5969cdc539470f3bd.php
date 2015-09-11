<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>个人资料</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
<link href="<?php echo RES;?>/css/userinfo/fans.css" rel="stylesheet" type="text/css"> 

<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  -->
<script type="text/javascript" src="/tpl/User/default/common/js/select/js/jquery.js"></script>
<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="<?php echo RES;?>/css/guajiang/js/jquery.js">\x3C/script>')</script>
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>
<script src="/tpl/static/upyun.js?2013"></script>
<script src="/tpl/static/alert.js"></script>
<link href="/tpl/static/kindeditor/examples/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" rel="stylesheet" type="text/css">
<script src="<?php echo $staticPath;?>/tpl/static/jquery.min.js" type="text/javascript"></script>
<script src="/tpl/static/kindeditor/examples/jquery-ui/js/jquery-ui-1.9.2.custom.js" type="text/javascript"></script>
<style>

.footFix{width:100%;text-align:center;position:fixed;left:0;bottom:0;z-index:99;}
#footReturn a, #footReturn2 a {
display: block;
line-height: 41px;
color: #fff;
text-shadow: 1px 1px #282828;
font-size: 14px;
font-weight: bold;
}
#footReturn, #footReturn2 {
z-index: 89;
display: inline-block;
text-align: center;
text-decoration: none;
vertical-align: middle;
cursor: pointer;
width: 100%;
outline: 0 none;
overflow: visible;
Unknown property name.-moz-box-sizing: border-box;
box-sizing: border-box;
padding: 0;
height: 41px;
opacity: .95;
border-top: 1px solid #181818;
box-shadow: inset 0 1px 2px #b6b6b6;
background-color: #515151;
Invalid property value.background-image: -ms-linear-gradient(top,#838383,#202020);
background-image: -webkit-linear-gradient(top,#838383,#202020);
Invalid property value.background-image: -moz-linear-gradient(top,#838383,#202020);
Invalid property value.background-image: -o-linear-gradient(top,#838383,#202020);
background-image: -webkit-gradient(linear,0% 0,0% 100%,from(#838383),to(#202020));
Invalid property value.filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#838383',endColorstr='#202020');
Unknown property name.-ms-filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#838383',endColorstr='#202020');
}
.code{float:100%;float:left;margin:8px 10px 0 5px;padding:5px;width:80px;}
.is_check{float:left;margin:8px 0;padding:2px 10px;font-size:12px;border:1px solid #c1c1c1;background:#e6e6e6;border-radius:3px;}
.is_check:hover{background:#c1c1c1;}
#num{padding-right:5px;}
.window .title{background-image: linear-gradient(#179f00, #179f00);}

.ui-dialog .ui-dialog-titlebar {
    background-image: linear-gradient(#179f00, #179f00);
    color:#fff;
}

</style>
</head>
<body id="fans" >
<div class="qiandaobanner"> <img src="<?php echo ($homepic); ?>" > </div>
<div class="cardexplain">
<li class="nob">
<div class="beizhu"><?php if ($cardid){ if($cardInfo != false): ?>您可以修改你的会员卡信息。以下信息将作为消费凭证，请认真填写！ <?php else: ?>填写以下信息即可领取vip会员卡,红色字必填<?php endif; }else {echo '请先完善您的个人信息，红色为必填项';}?></div>
</li>
<ul class="round">
<?php if($cardInfo != false): ?><li>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
	<tr>
	<th><font color='red'>会员卡号</font></th>
	<td><input  type="text" class="px" readonly value="<?php echo ($cardnum); ?>"></td>
	</tr>
	</table>
	</li><?php endif; ?>

<?php if($conf['wechaname'] == 0): else: ?>
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th><font <?php if($conf['wechaname'] == 1 && $conf['is_wechaname'] == 1){?>color='red'<?php }?>><?php echo $isFuwu ? '昵称' : '微信昵称';?></font></th>
<td><input name="wechaname" onfocus="check_white(this)" 
<?php if($conf['wechaname'] == 1 && $conf['is_wechaname'] == 1){?>onblur="check_wechaname(this)"<?php }?>  type="text" class="px" id="wechaname" value="<?php echo ($fans["wechaname"]); ?>" placeholder="请输入您的微信名称"></td>
</tr>
</table>
</li><?php endif; ?>

<?php if($conf['tel'] == 0): else: ?>
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th><font <?php if($conf['tel'] == 1 && $conf['is_tel'] == 1){?>color='red'<?php }?>>手机号码</font></th>
<td><input onfocus="check_white(this)" 
<?php if($conf['tel'] == 1 && $conf['is_tel'] == 1){?>onblur="check_tel(this)"<?php }?> name="tel"  class="px" id="tel" value="<?php echo ($info["tel"]); ?>"  type="text" placeholder="手机号码"></td>
</tr>
</table>
</li><?php endif; ?>
<?php if($cardInfo == '' and $is_check == '1'): ?><li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th><font color='red'>短信验证</font></th>
<td><input name="code"  class="code" id="code" value=""  type="text" placeholder="效验码"><a class="is_check" href="javascript:void(0);"><em id="num"></em><b>点击获取效验码</b></a></td>
</tr>
</table>
</li><?php endif; ?>
<?php if($conf['truename'] == 0): else: ?>
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th><font <?php if($conf['truename'] == 1 && $conf['is_truename'] == 1){?>color='red'<?php }?>>真实姓名</font></th>
<td><input name="truename" onfocus="check_white(this)" 
<?php if($conf['truename'] == 1 && $conf['is_truename'] == 1){?>onblur="check_truename(this)"<?php }?> type="text" class="px" id="truename" value="<?php echo ($info["truename"]); ?>" placeholder="请输入您的真实姓名"></td>
</tr>
</table>
</li><?php endif; ?>

<?php if($conf['qq'] == 0): else: ?>

<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th><font <?php if($conf['qq'] == 1 && $conf['is_qq'] == 1){?>color='red'<?php }?>>QQ号码</font></th>
<td><input onfocus="check_white(this)" 
<?php if($conf['qq'] == 1 && $conf['is_qq'] == 1){?>onblur="check_qq(this)"<?php }?> name="qq"  class="px" id="qq" value="<?php echo ($info["qq"]); ?>"  type="text" placeholder="请输入您的QQ号码"></td>
</tr>
</table>
</li><?php endif; ?>

<?php if($cardid != ''): if($conf['paypass'] == 0): else: ?>
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th><font <?php if($conf['paypass'] == 1 && $conf['is_paypass'] == 1){?>color='red'<?php }?>>支付密码</font></th>
<td><input onfocus="check_white(this)" 
<?php if($conf['paypass'] == 1 && $conf['is_paypass'] == 1){?>onblur="check_paypass(this)"<?php }?> name="paypass"  class="px" id="paypass" value=""  type="password" placeholder="请输入您的支付密码"></td>
</tr>
</table>
</li><?php endif; endif; ?>


</ul>



<?php if($conf['portrait'] == 0): else: ?>
<ul class="round" id='ul_portrait' onclick="check_white(this)">
<li>
<style>
.por{width:65px;float:left;height:65px;}
.por img{width:60px;height:60px;cursor:pointer}
.por img.selected{border:2px solid #f60}
</style>
<script>
function selectpor(el){
	$("#portrait").val(el.src);
	$('#pors img').removeClass('selected');
	$('#portrait_src').attr('src',el.src);
	el.className='selected';
}
</script>
<div style="padding:10px 10px 10px 0;"><font <?php if($conf['portrait'] == 1 && $conf['is_portrait'] == 1){?>color='red'<?php }?>>请设置头像</font></div>
<input type="hidden" value="<?php echo ($info["portrait"]); ?>" id="portrait" name="portrait" size="80" />
 <a href="###" onclick="upyunWapPicUpload('portrait',200,200,'<?php echo ($_GET['token']); ?>')" class="a_upload" style="color:red">点击这里上传</a>
<div class="por"><img src="<?php if($fans["portrait"] != ''): echo ($fans["portrait"]); else: ?>/tpl/User/default/common/images/portrait.jpg<?php endif; ?>" id="portrait_src" /></div>
<div style="clear:both"></div>
或者选择下面头像
<div style="margin:10px 0 20px 0" id="pors">
<div class="por"><img onclick="selectpor(this)" src="/tpl/static/portrait/1.jpg" /></div>
<div class="por"><img onclick="selectpor(this)" src="/tpl/static/portrait/2.jpg" /></div>
<div class="por"><img onclick="selectpor(this)" src="/tpl/static/portrait/3.jpg" /></div>
<div class="por"><img onclick="selectpor(this)" src="/tpl/static/portrait/4.jpg" /></div>
<div class="por"><img onclick="selectpor(this)" src="/tpl/static/portrait/5.jpg" /></div>
<div class="por"><img onclick="selectpor(this)" src="/tpl/static/portrait/6.jpg" /></div>
<div class="por"><img onclick="selectpor(this)" src="/tpl/static/portrait/7.jpg" /></div>
<div class="por"><img onclick="selectpor(this)" src="/tpl/static/portrait/8.jpg" /></div>
<div class="por"><img onclick="selectpor(this)" src="/tpl/static/portrait/9.jpg" /></div>
<div class="por"><img onclick="selectpor(this)" src="/tpl/static/portrait/10.jpg" /></div>
<div style="clear:both"></div>
</div>
</li>
</ul><?php endif; ?>



<ul class="round">

<?php if($conf['sex'] == 0): else: ?>
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th><font <?php if($conf['sex'] == 1 && $conf['is_sex'] == 1){?>color='red'<?php }?>>性别</font></th>
<td><select onfocus="check_white(this)" 
<?php if($conf['sex'] == 1 && $conf['is_sex'] == 1){?>onblur="check_sex(this)"<?php }?> name="sex" class="dropdown-select" id="sex">
<option  class="dropdown-option">请选择你的性别</option>
<option  value="1" <?php if($info['sex'] == 1): ?>selected<?php endif; ?>>男</option>
<option  value="2" <?php if($info['sex'] == 2): ?>selected<?php endif; ?>> 女</option>
<option  value="3" <?php if($info['sex'] == 3): ?>selected<?php endif; ?>>其他</option>
</select></td>
</tr>
</table>
</li><?php endif; ?>

<?php if($conf['bornyear'] == 0): else: ?>

<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th><font <?php if($conf['bornyear'] == 1 && $conf['is_bornyear'] == 1){?>color='red'<?php }?>>出生年</font></th>
<td><input onfocus="check_white(this)" 
<?php if($conf['bornyear'] == 1 && $conf['is_bornyear'] == 1){?>onblur="check_bornyear(this)"<?php }?> name="bornyear"  type="text" class="px" id="bornyear" value="<?php echo ($info["bornyear"]); ?>" placeholder="请输入出生年份"></td>
</tr>
</table>
</li><?php endif; ?>

<?php if($conf['bornmonth'] == 0): else: ?>

<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th><font <?php if($conf['bornmonth'] == 1 && $conf['is_bornmonth'] == 1){?>color='red'<?php }?>>出生月</font></th>
<td><input onfocus="check_white(this)" 
<?php if($conf['bornmonth'] == 1 && $conf['is_bornmonth'] == 1){?>onblur="check_bornmonth(this)"<?php }?> name="bornmonth"  type="text" class="px" id="bornmonth" value="<?php echo ($info["bornmonth"]); ?>" placeholder="请输入出生月份"></td>
</tr>
</table>
</li><?php endif; ?>

<?php if($conf['bornday'] == 0): else: ?>

<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th><font <?php if($conf['bornday'] == 1 && $conf['is_bornday'] == 1){?>color='red'<?php }?>>出生日</font></th>
<td><input onfocus="check_white(this)" 
<?php if($conf['bornday'] == 1 && $conf['is_bornday'] == 1){?>onblur="check_bornday(this)"<?php }?> name="bornday"  type="text" class="px" id="bornday" value="<?php echo ($fans["bornday"]); ?>" placeholder="请输入出生日"></td>
</tr>
</table>
</li><?php endif; ?>


</ul>

<div class="footReturn">
<a id="showcard"  class="submit" >提交信息</a>
<div class="window" id="windowcenter" >
<div id="title" class="wtitle"><span class="close" id="alertclose"></span></div>
<div class="content">
<div id="txt"></div>
</div>
</div>
</div>
<div style="height:60px;" id="msg">&nbsp;</div>
</div>
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Index",
            "moduleID":"0",
            "imgUrl": "", 
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Index/index',array('token'=>$token));?>",
            "tTitle": "",
            "tContent": ""
};
</script>
<?php echo ($shareScript); ?>

<script type="text/javascript">
$('.is_check').click(function(){
	if($('#num').html() != ''){
		return false;
	}
	var phone 	= $('#tel').val();
	reg=/^0{0,1}(13[0-9]|145|15[0-9]|18[0-9])[0-9]{8}$/i;
	 if(!reg.test(phone)){   
		alert("错误,请输入11位的手机号！");
		$('#tel').css('background','red');
		return false;
	 }else{
		var num = $('#num').html();
		if(num == ''){
			$.post('index.php?g=Wap&m=Userinfo&a=get_code&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&cardid=<?php echo ($cardid); ?>', {phone:phone},
			function(data) {
				if(data.error == 0){
					$('#num').html('60');
					$('.is_check>b').html('后重新获取');
					count_down();
				}else{
					alert(data.info);
				}
			},"json");
		}
	 }
});
function count_down(){
	var down = setInterval(function(){
		var num 	= $('#num').html();
		if(num > 0){
			$('#num').html(num-1);
		}else{
			$('#num').html('');
			$('.is_check>b').html('点击获取效验码');
			clearInterval(down);
		}
	},1000);
}
$("#showcard").bind("click",
function() {
    var btn = $(this);
    var wechaname = $("#wechaname").val();
	var tel 	  = $("#tel").val();
	var truename  = $("#truename").val();
	var qq 		  = $("#qq").val();
	var sex 	  = $("#sex").val();
	var birthday  = $("#birthday").val();	
	var address   = $("#address").val();
	var info  	  = $("#info").val();
	var bornyear  = $("#bornyear").val();
	var bornmonth = $("#bornmonth").val();
	var bornday   = $("#bornday").val();
	var portrait  = $("#portrait").val();
	var paypass   = $("#paypass").val();
	var code   	  = $("#code").val();
	var portrait   	  = $("#portrait").val();
	var portrait_img  = $('#ul_portrait img').eq(0).attr('src');
	

<?php if($conf['tel'] == 1 && $conf['is_tel'] == 1){?>
    if (tel == '') {
		document.getElementById('tel').style.background="red";
        alert("请认真输入手机号");
        return
    }
<?php }?>
<?php if($conf['wechaname'] == 1 && $conf['is_wechaname'] == 1){?>
    if (wechaname == '') {
		document.getElementById('wechaname').style.background="red";
        alert("请认真输入微信号");
        return
    }
<?php }?>
<?php if($conf['truename'] == 1 && $conf['is_truename'] == 1){?>
    if (truename == '') {
		document.getElementById('truename').style.background="red";
        alert("请认真输入真实姓名");
        return
    }
<?php }?>
<?php if($conf['qq'] == 1 && $conf['is_qq'] == 1){?>
    if (qq == '') {
		document.getElementById('qq').style.background="red";
        alert("请认真输入QQ号");
        return
    }
<?php }?>
<?php if($conf['paypass'] == 1 && $conf['is_paypass'] == 1){?>
    if (paypass == '') {
		document.getElementById('paypass').style.background="red";
        alert("请认真输入支付密码");
        return
    }
<?php }?>
<?php if($conf['portrait'] == 1 && $conf['is_portrait'] == 1){?>
    if (portrait == '' && portrait_img == '/tpl/User/default/common/images/portrait.jpg') {
		$('#ul_portrait').css('background-color','red');
		$('.a_upload').css('color','#333');
        alert("请设置您的头像");
        return
    }
<?php }?>
<?php if($conf['sex'] == 1 && $conf['is_sex'] == 1){?>
    if (sex == '请选择你的性别') {
		document.getElementById('sex').style.background="red";
        alert("请选择你的性别");
        return
    }
<?php }?>
<?php if($conf['bornyear'] == 1 && $conf['is_bornyear'] == 1){?>
    if (bornyear == '') {
		document.getElementById('bornyear').style.background="red";
        alert("请认真输入出生年");
        return
    }
<?php }?>
<?php if($conf['bornmonth'] == 1 && $conf['is_bornmonth'] == 1){?>
    if (bornmonth == '') {
		document.getElementById('bornmonth').style.background="red";
        alert("请认真输入出生月");
        return
    }
<?php }?>
<?php if($conf['bornday'] == 1 && $conf['is_bornday'] == 1){?>
    if (bornday == '') {
		document.getElementById('bornday').style.background="red";
        alert("请认真输入出生日");
        return
    }
<?php }?>


   
    var submitData = {
        wechaname : wechaname,
        tel 	  : tel,
        truename  : truename,
        qq        : qq,
        sex 	  : sex,
        birthday  : birthday,
        address   : address,
        info 	  : info,
        bornyear  : bornyear,
        bornmonth : bornmonth,
        bornday   : bornday,
        cardid 	  : <?php echo ($cardid); ?>,
        portrait  : portrait,
        paypass   : paypass,
        code	  : code,
        action: "index"
    };

	
	 
	
    $.post('index.php?g=Wap&m=Userinfo&a=index&token=<?php echo ($_GET['token']); ?>&wecha_id=<?php echo ($_GET['wecha_id']); ?>&cardid=<?php echo ($_GET['cardid']); ?>', submitData,
    function(data) {
        if(data==1){			 
			alert('个人信息保存成功');
			setTimeout(function(){
				location.href = "<?php echo ($redirectUrl); ?>";
			},1000);
		}else if(data==3){
			 
			alert('该商家会员卡缺货了');
		}else if(data==4){
			 
			alert('您的积分不够领取改会员卡');
		}else if(data==5){

			alert('短信验证码无效');

		}else if(data==6){

			alert('获取验证码的手机与领取会员卡的手机号不是同一个');

		}else if(data.errCode == 2){
			//alert('成功领取了会员卡');	
			if(data.api_item == 1){
				$("#spanmessage").text('领卡成功，你有开卡赠送的优惠券');
		        $("#message").dialog({
		           title:"温馨提示！",
		           modal: true,
		           buttons: {
		           	"取消": function() {
				        $(this).dialog("close");
				        location.href = "<?php echo U('Card/card',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cardid'=>$_GET['cardid']));?>";
				    },
		            "领取": function() {
		               	giftCard($(this));
		            }
		           }
		        }); 

			}else{
				alert('成功领取会员卡');
				setTimeout(function(){
					location.href = "<?php echo U('Card/card',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cardid'=>$_GET['cardid']));?>";
				},1000);
			}
		}else{
			 
			alert('您未修改任何信息');
		}
    },
    "json")
});


function giftCard(obj){

	wx.addCard({
	    cardList: [
	    	<?php echo ($giftCard); ?>
	    ],
	    success: function (res) {
			obj.dialog("close");
			location.href = "<?php echo U('Card/card',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cardid'=>$_GET['cardid']));?>";
	    }
	});
}
<?php if($conf['wechaname'] == 1 && $conf['is_wechaname'] == 1){?>
function check_wechaname(obj){	 
	if(obj.value == ''){
		alert("请输入您的微信名称");
		document.getElementById(obj.id).style.background="red";
		return;
	}
}
<?php }?>
<?php if($conf['truename'] == 1 && $conf['is_truename'] == 1){?>
function check_truename(obj){	 
	if(obj.value == ''){
		alert("请输入您的真实姓名");
		document.getElementById(obj.id).style.background="red";
		return;
	}
}
<?php }?>
<?php if($conf['qq'] == 1 && $conf['is_qq'] == 1){?>
function check_qq(obj){	 
	if(obj.value == ''){
		alert("请输入您的QQ号码");
		document.getElementById(obj.id).style.background="red";
		return;
	}
}
<?php }?>
<?php if($conf['sex'] == 1 && $conf['is_sex'] == 1){?>
function check_sex(obj){	 
	if(obj.value == '请选择你的性别'){
		alert("请选择你的性别");
		document.getElementById(obj.id).style.background="red";
		return;
	}
}
<?php }?>
<?php if($conf['paypass'] == 1 && $conf['is_paypass'] == 1){?>
function check_paypass(obj){	 
	if(obj.value == ''){
		alert("请输入您的支付密码");
		document.getElementById(obj.id).style.background="red";
		return;
	}
}
<?php }?>
<?php if($conf['bornyear'] == 1 && $conf['is_bornyear'] == 1){?>
function check_bornyear(obj){	 
	if(obj.value == ''){
		alert("请输入您的出生年");
		document.getElementById(obj.id).style.background="red";
		return;
	}
}
<?php }?>
<?php if($conf['bornmonth'] == 1 && $conf['is_bornmonth'] == 1){?>
function check_bornmonth(obj){	 
	if(obj.value == ''){
		alert("请输入您的出生月");
		document.getElementById(obj.id).style.background="red";
		return;
	}
}
<?php }?>
<?php if($conf['bornday'] == 1 && $conf['is_bornday'] == 1){?>
function check_bornday(obj){	 
	if(obj.value == ''){
		alert("请输入您的出生日");
		document.getElementById(obj.id).style.background="red";
		return;
	}
}
<?php }?>
function check_white(obj){   
  	document.getElementById(obj.id).style.background="white"; 
	$('.a_upload').css('color','red');
}
<?php if($conf['tel'] == 1 && $conf['is_tel'] == 1){?>
function check_tel(obj){
	if(obj.value == ''){
		alert('手机号码必须填写');
		document.getElementById(obj.id).style.background="red";
		return;
	}
	//reg=/^0{0,1}(13[0-9]|145|15[0-9]|18[0-9])[0-9]{8}$/i;
	reg=/^\d{6,}$/i;
	  if(!reg.test(obj.value)){   
			alert("请输入正确的手机号！");
			document.getElementById(obj.id).style.background="red";
			return;
	 }
}
<?php }?>
</script>
<div id='message' style='display:none;'>
	<span id='spanmessage'></span>
</div>
</body>
</html>