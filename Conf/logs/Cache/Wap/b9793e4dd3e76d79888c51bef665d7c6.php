<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php echo ($thisCard["cardname"]); ?></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta name="Keywords" content=""/>
<meta name="Description" content=""/>
<!-- Mobile Devices Support @begin -->
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="telephone=no, address=no" name="format-detection">
<meta name="apple-mobile-web-app-capable" content="yes"/>
<!-- apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<!-- Mobile Devices Support @end -->
<link href="/tpl/static/kindeditor/examples/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" rel="stylesheet" type="text/css">
<link href="<?php echo $staticPath;?>/tpl/static/card/css/main.css" rel="stylesheet" type="text/css">
<script src="<?php echo $staticPath;?>/tpl/static/jquery.min.js" type="text/javascript"></script>
<script src="/tpl/static/kindeditor/examples/jquery-ui/js/jquery-ui-1.9.2.custom.js" type="text/javascript"></script>

</head>
<body onselectstart="return true;" ondragstart="return false;">
<div class="container addr_add">
    <header class="center">
        <label style="display:inline-block;">
            <span>&nbsp;</span>
            会员卡消费
        </label>
    </header>
    <div class="body">
        <div>
            <form action="<?php echo U('Card/actionConsume',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>" name="myform" id="Js-myform" method="post">
                <table class="table_addr">
                <tr>
                    <td>
                        消费门店
                    </td>
                    <td>
                        <select name="company_id" id="company_id" class="select">
                        <?php if($from == 'default'): ?><option value="">请选择商家门店</option><?php endif; ?>
                        <?php if(is_array($company)): $i = 0; $__LIST__ = $company;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$company): $mod = ($i % 2 );++$i;?><option value="<?php echo ($company["id"]); ?>"><?php echo ($company["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                </tr>
                <?php if($from == 'default'): ?><tr  class="consume_show"  style="display:none;">
                    <td>
                        使用卡券
                    </td>
                    <td>
                        <select name="consume_id" id="consume_id" class="select"><option value="">请选择优惠方式</option></select>
                    </td>
                </tr>
                <?php else: ?>
                <tr>
                    <td>
                        使用卡券
                    </td>
                    <td>
                        <?php echo ($coupon_info['coupon_name']); ?>
                        <input type="hidden" name="consume_id" value="<?php echo ($coupon_info['id']); ?>">
                    </td>
                </tr><?php endif; ?>
                <tr class="is_show" <?php if($from == 'default'): ?>style="display:none;"<?php endif; ?>>
                    <td>
                        核销号码
                    </td>
                    <td>
                        <input type="text" name="cancel_code" id="cancel_code" value="<?php echo ($coupon_info['cancel_code']); ?>" readonly>
                    </td>
                </tr>
                <?php if($coupon_info['coupon_type'] != 2): ?><tr>
                    <td>
                        支付方式
                    </td>
                    <td>
                        <select name="pay_type" id="pay_type" class="select">
                            <option value="0">线下支付</option>
                            <option value="1">会员卡支付</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        消费金额
                    </td>
                    <td>
                        <input type="text" value="" name="price" id="price" placeholder="请输入实际消费金额"/>
                    </td>
                </tr><?php endif; ?>
                <tr>
                    <td colspan="2" style="padding:0;">
                        <table width="100%" class="type1">
                            <tr>
                                <td>
                                    店员用户名
                                </td>
                                <td>
                                    <input type="text" value="" name="username" class="username" id="username" placeholder="请输入商家用户名"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    店员密码
                                </td>
                                <td>
                                    <input type="password" value="" name="password" id="pwd" placeholder="请输入商家密码"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    备注信息
                                </td>
                                <td align="left">
                                    <input type="hidden" name="from" value="<?php echo ($from); ?>">
                                    <input type="hidden" name="coupon_type" id="coupon_type" value="<?php echo ($coupon_info['coupon_type']); ?>">
                                    <textarea class="px" id="notes" name="notes" style="width:100%;color:#91979d;"></textarea>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </table>
            </form>
        </div>
        <div class="pt_10 pb_10 pl_10 pr_10">
            <a href="javascript:void(0);" class="button">提&nbsp;&nbsp;&nbsp;交</a>
        </div>
    </div>
</div>
<script>
$(function(){
   var boardDiv = "<div id='message' style='display:none;'><span id='spanmessage'></span></div>";
   $(document.body).append(boardDiv);

    if($('#pay_type').val() == 1){
        $('.type1').css('display','none');
    }else{
        $('.type1').css('display','table');
    }

    $('#company_id').change(function(){
        var company_id = $(this).val();
        var submitData = {
            company_id:company_id,
        };
        $.post("<?php echo U('Card/getCardCoupon',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>", submitData,
        function(data) {
            if (data.err == 0) {
                if (data.res.length > 0) {
                    var html   = '<option value="">点击选择优惠方式</option>';
                    for (var i = data.res.length - 1; i >= 0; i--) {
                        html += '<option value="'+data.res[i]['id']+'" cancel-code="'+data.res[i]['cancel_code']+'">'+data.res[i]['coupon_name']+'</option>';
                    };
                    $("#consume_id").html(html); 
                    $('.consume_show').show();
                }
            }
        }, "json");
    });

    $('#pay_type').change(function(){
        if($(this).val() == 0){
            $('.type1').css('display','table');
        }else if($(this).val() == 1){
            $('.type1').css('display','none');
        }
    });
    
    $('.button').click(function(){
        var flag     = true;
        var coupon_type = $('#coupon_type').val();
        var price    = $('#price').val();
        var pay_type = $('#pay_type').val();
        var username = $('#username').val();
        var pwd      = $('#pwd').val();
        var consume_id = $('#consume_id').val();
        var company_id = $('#company_id').val();
        var cancel_code = $('#cancel_code').val();
        var prg     = /^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/;
        
        if(!company_id){
            $("#spanmessage").text('请选择消费门店'); 
            flag = false;
        }else if(!prg.test(price) && coupon_type != 2){
            $("#spanmessage").text('请填写正确的消费金额');
            flag = false;
        }else if(pay_type==2){
            if(username == ''){
                $("#spanmessage").text('请填写商家用户名');
                flag = false;
            }
            if(pwd == ''){
                $("#spanmessage").text('请填写商家密码');
                flag = false;
            }   
        }

        if(flag){
            $('#Js-myform').submit();
        }else{
            $("#message").dialog({
               title:"温馨提示！",
               modal: true,
               buttons: {
                    "确定": function() {
                        $(this).dialog("close");
                    }
               }
            }); 
        }
    });
    
    $('.table_addr').on('change','#consume_id',function(){
        var cancel_code =  $(this).children('option:selected').attr('cancel-code');
        $('#cancel_code').val(cancel_code);
        $('.is_show').show();
    });

});
</script>

<footer>
    <nav class="nav">
        <ul class="box">
            <li>
                <a href="<?php echo U('Card/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>" class="<?php if(ACTION_NAME=='index'){ ?>on<?php } ?>">
                    <p class="share"></p>
                    <span>
                        <?php if($thisCard['id'] == ''): ?>领卡
                        <?php else: ?>
                            换卡<?php endif; ?>
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Card/card',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>" class="<?php if(ACTION_NAME=='card'){ ?>on<?php } ?>">
                    <p class="card"></p>
                    <span>会员卡</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Card/cards',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>" class="my <?php if(ACTION_NAME=='cards'){ ?>on<?php } ?>" >
                    <p class="my"  ></p>
                    <span>我的</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Card/notice',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>" class="<?php if(ACTION_NAME=='notice'){ ?>on<?php } ?>">
                    <p id="Js-msg-num" class="msg" data-count="1" ></p>
                    <span>消息</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Card/signscore',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>" class="<?php if(ACTION_NAME=='signscore'){ ?>on<?php } ?>">
                    <p class="sign"></p>
                    <span>签到</span>
                </a>
            </li>
        </ul>
    </nav>
</footer>

<!--
<div class="box clr"></div>
<div class="xia clr">
    <ul>
        <li class="clr <?php if(ACTION_NAME=='index'){ ?>cur<?php } ?>">
            <a href="<?php echo U('Card/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>">
                <i class="ico_bt hk"></i>
                <P>
                    <?php if($thisCard['id'] == ''): ?>领卡
                    <?php else: ?>
                        换卡<?php endif; ?>
                </P>
            </a>
        </li>
        <li class="clr <?php if(ACTION_NAME=='card'){ ?>cur<?php } ?>">
            <a href="<?php echo U('Card/card',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>">
                <i class="ico_bt hyk"></i>
                <p>会员卡</p>
            </a>
        </li>
        <li class="clr <?php if(ACTION_NAME=='notice'){ ?>cur<?php } ?>">
            <a href="<?php echo U('Card/notice',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>">
                <i class="ico_bt xx"></i>
                <p>消息</p>
            </a>
        </li>
        <li class="clr <?php if(ACTION_NAME=='signscore'){ ?>cur<?php } ?>">
            <a href="<?php echo U('Card/signscore',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>">
                <i class="ico_bt qd"></i>
                <p>签到</p>
            </a>
        </li>
        <li class="clr <?php if(ACTION_NAME=='cards'){ ?>cur<?php } ?>">
            <a href="<?php echo U('Card/cards',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>">
                <i class="ico_bt wd"></i>
                <p>我的</p>
            </a>
        </li>
    </ul>
</div>
-->
<script type="text/javascript">
/*var phoneWidth = parseInt(window.screen.width);
var phoneScale = phoneWidth/520;
var ua = navigator.userAgent;
var meta = document.createElement("meta"); 
	meta.setAttribute("name","viewport");

if (/Android (\d+\.\d+)/.test(ua)){
	var version = parseFloat(RegExp.$1);
	// andriod 2.3
	if(version>2.3){
		meta.setAttribute("content",'width=520, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi');
	// andriod 2.3以上
	}else{
		meta.setAttribute("content",'width=520, target-densitydpi=device-dpi');
	}
	// 其他系统
} else {
	meta.setAttribute("content",'width=520, user-scalable=no, target-densitydpi=device-dpi');
}
document.head.appendChild(meta);
*/

window.shareData = {  
            "moduleName":"Card",
            "moduleID":"0",
            "imgUrl": "", 
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Card/index',array('token'=>$token));?>",
            "tTitle": "会员卡",
            "tContent": ""
};
</script>
<?php echo ($shareScript); ?>
</body>
</html>