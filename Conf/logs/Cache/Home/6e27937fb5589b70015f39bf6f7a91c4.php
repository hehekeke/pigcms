<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>登陆与注册－<?php echo ($f_siteTitle); ?></title>
        <link href="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/css/public.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/js/daohang.js" type="text/javascript"></script>
        <link href="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/css/manage.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
    	<!--startof header-->
    	<link href="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/css/public.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/css/index2.css" rel="stylesheet" type="text/css" />
<!--<script src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/js/jquery-1.9.1.min.js" type="text/javascript"></script>-->
<script src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/js/jquery1.js" type="text/javascript"></script>
<script src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/js/daohang.js" type="text/javascript"></script>

<script src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/js/ss.js"></script>
<link href="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/css/gongneng.css" rel="stylesheet" type="text/css" />
<script src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/js/gongnneg.js" type="text/javascript"></script>
<link href="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/css/gongneng.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/css/help.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/css/zifei.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/css/case.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/css/about us.css" rel="stylesheet" type="text/css" />
<!--startof header-->
<div class="header clr">
	<div class="biaotilan clr">
        <div class="shang clr">
            <div class="zhongJian clr">
                <div class="zLeft clr">欢迎使用<?php echo ($f_siteName); ?>!</div>
                <div class="zRight clr">
                    <?php if($_SESSION[uid]==false): ?><span class="ones clr"><a href="<?php echo U('Index/login');?>">注册</a></span>
                        <span class="twos clr"><a href="<?php echo U('Index/login');?>">登录</a></span>
                    <?php else: ?>
                        你好,<a href="/#" hidefocus="true"  ><span style="color:red"><?php echo (session('uname')); ?></span></a>（uid:<?php echo ($_SESSION['uid']); ?>）
                        <a href="/#" onclick="Javascript:window.open('<?php echo U('System/Admin/logout');?>','_blank')" >退出</a><?php endif; ?>   
                </div>
            </div>
        </div>
    
        <div class="xia clr">
            <div class="logo clr" style="height:60px"><a href="/"><img src="<?php echo ($f_logo); ?>" /></a></div>
            <div class="daohang1 clr">
                <ul>
                    <li <?php if((ACTION_NAME == 'index') and (GROUP_NAME == 'Home')): ?>class="special"<?php endif; ?>><a href="/" >首页</a></li>
                    <li <?php if((ACTION_NAME) == "fc"): ?>class="special"<?php endif; ?>><a href="<?php echo U('Home/Index/fc');?>">功能介绍</a></li>
                    <li <?php if((ACTION_NAME) == "about"): ?>class="special"<?php endif; ?>><a href="<?php echo U('Home/Index/about');?>">关于我们</a></li>
                    <li <?php if((ACTION_NAME) == "price"): ?>class="special"<?php endif; ?>><a href="<?php echo U('Home/Index/price');?>">资费说明</a></li>
                    <li <?php if((ACTION_NAME) == "common"): ?>class="special"<?php endif; ?>><a href="<?php echo U('Home/Index/common');?>">产品案例</a></li>
                    <li <?php if((GROUP_NAME) == "User"): ?>class="special"<?php endif; ?>><a href="<?php echo U('User/Index/index');?>">管理中心</a></li>
                    <li <?php if((ACTION_NAME) == "help"): ?>class="special"<?php endif; ?>><a href="<?php echo U('Home/Index/help');?>">帮助中心</a></li>
                </ul>
            </div>
        </div>
    </div>
            <!--banner-->
            <div class="banner clr" >
            	<p class="zhutu clr" style="background:#cbfef7;">
                    <?php if($images['login'] == null): ?><img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/5.png" />
                    <?php else: ?>
                        <img src="<?php echo ($images['login']); ?>" style="width:100%;height:300px;"><?php endif; ?>
                </p>
            </div>
            <!--end banner-->
        <!--ENDOF header-->
        
        <!--startof content-->
        <div class="content clr">
        	<div class="congtS clr">
            	<div class="shangLt clr">当前位置</div>
                <div class="shangRt clr">
                	<p class="oneth clr"> <a href="#"><?php echo ($f_siteName); ?>多用户微信营销系统</a></p>
                    <p>»</p>
                    <p class="twoth clr"><a href="#">管理中心</a></p>
                </div>
            </div>
            <!--end congtX-->
            <div class="congtX">
            	<div class="contLt clr">
                    <form action="<?php echo U('Users/checklogin');?>" method="post" class="login">
                    	<p class="denglu clr">登录</p>
                    	<div class="name clr">
                        	<span style="padding-right:10px;">用户名</span> 
                            <input class="text" type="text" name="username" />
                        </div><br />
                        <div class="password clr">
                        	<span style="padding-right:10px;">密码</span> 
                            <input class="text" type="password" name="password" />
                        </div><br />
                        <div class="yanzheng clr">
                        	<span style="padding-right:10px;">验证码</span> 
                             <input name="verifycode2" type="text" size="8" style="width:80px;" class="text" maxlength="4" />&nbsp;<img src="<?php echo U('Index/verifyLogin');?>" id="txtCheckCode2" style="width:70px;margin-top:-5px"/>&nbsp;<a href="javascript:refreshImg2();" style="color:#666">看不清？换一张</a>
                            <script>
                            function refreshImg2(){
                                document.getElementById("txtCheckCode2").src="/index.php?g=Home&m=Index&a=verifyLogin&s="+Math.random();
                            }
                            </script>
                        </div><br />
                        <button class="submit" type="submit">登录</button>
                    </form>
                </div>
                <!--end left-->
                
                <p style="border-right:1px solid #E3E3E3; width:1px; float:left; height:530px; padding-left:20px;"></p>
                
                <div class="contRt clr">
                	<form action="<?php echo U('Users/checkreg');?>" method="post" class="login">
                    	<p class="denglu clr">注册</p>
                    	<div class="name clr">
                        	<span>用户名</span> 
                            <input class="text" required="" value="请输入用户名" onclick="if(this.value=='请输入用户名'){this.value=''}" onblur="if(this.value==''){this.value='请输入用户名'}" type="text" name="username">
                        </div><br />
                        <div class="password clr">
                        	<span>密码</span> 
                            <input class="text" type="password" name="password">
                        </div><br />
                        <div class="aginword clr">
                        	<span>重复密码</span> 
                            <input class="text" type="password" name="repassword">
                        </div><br />
                        <?php if($f_regNeedMp){ ?>
                        <div class="teliphone clr">
                        	<span>手机</span> 
                            <input class="text" type="text" id="sms_mp" name="mp" />
                        </div><br />
                        <?php } ?>
                        <div class="youxiang clr">
                        	<span>邮箱</span> 
                            <input class="text" type="text" name="email" value="" onclick="if(this.value=='请输入电子邮箱'){this.value=''}" onblur="if(this.value==''){this.value=''}">
                        </div><br />
                        <div class="hangYe clr">
                        	<span style="margin-left: -226px;">所属行业</span> 
                            <select name="business">
                                <?php if(is_array($business)): $i = 0; $__LIST__ = $business;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$business): $mod = ($i % 2 );++$i;?><option value="<?php echo ($business["key"]); ?>"><?php echo ($business["val"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div><br />
                        <div class="duanxin clr">
                <?php if(C('reg_mp_verify') == 0): ?><div class="hangYe clr">
                        	<span style="margin-left: -86px;">验证码</span> 
                        <script>
                        function refreshImg(){
                            document.getElementById("txtCheckCode").src="/index.php?g=Home&m=Index&a=verify&s="+Math.random();
                        }
                        </script>
                        <input name="verifycode" type="text" size="4" style="width:80px;" class="text" maxlength="4" />&nbsp;<img src="<?php echo U('Index/verify');?>" id="txtCheckCode" style="width:70px;"/>&nbsp;<a href="javascript:refreshImg();" style="color:#666;font-size: 16px;border:none">看不清？换一张</a></td>
                    </div>

                <?php else: ?>                   
                     <div class="hangYe clr">
                        	<span style="margin-left: -86px;">短信验证</span> 
                        	<input type="text" class="text" name="verifycode" style="width:80px" maxlength="6" />
                             <span id="a_verify" >

                           <a href="###" onclick="sendMsg()" id="a_btn" >获取验证码</a>

                            </span>
                   
                        <script>
                            function sendMsg(){
                                var num = document.getElementById('sms_mp').value;
                                var reg=/^0{0,1}1[0-9]{10}$/i;
                                if( num == '' || !reg.test(num)){
                                    alert('请输入正确的手机号！');
                                    return false;
                                }


                               if (confirm("我们会将会发送验证码到 "+num)){
                                    jQuery(function($) {
                                        $.ajax({
                                            url:"<?php echo U('Users/sendMsg');?>",
                                            type:"post",
                                            data:"mp="+num,
                                            success:function(data){
                                                
                                                $("#a_verify").css({"background":"#ccc","borderColor":"#ccc"});
                                                fun_timedown(60);

                                              }
                                        });
                                    });
                                }
                                return false;
                            }

                            function fun_timedown(time){
                                if(time=='undefined'){
                                    time = 60;
                                }

                                $("#a_verify").html(time+"秒后可重新获取");
                                
                                time = time-1;
                                if(time>=0){
                                    setTimeout("fun_timedown("+time+")",1000);
                                }else{
                                    $("#a_verify").css({"background":"#fff","borderColor":"#007DDB"});
                                    $("#a_verify").html('<a href="javascript:sendMsg();" id="a_btn" >获取验证码</a>');
                                }
                            }
                        </script><?php endif; ?>
                        </div><br />
                        <input class="text" type="hidden" name="invitecode" value="<?php echo $_GET['invitecode'];?>">
                        <button class="submit" type="submit" class="buttom"style=" margin-left:84px;">注册</button>

                    </form>
                </div>
                <!--end right-->
                
            </div>
        </div>
        
        <!--endof content-->
        
        
        <!--footer-->
        	<!--悬浮框-->
            <div id="leftsead">
                <ul>
                    <?php if($agentid == 0): ?><li>
                            <a href="javascript:void(0)" class="youhui">
                                <img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/xufu/l02.png" width="47" height="49" class="shows" />
                                <img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/xufu/a.png" width="57" height="49" class="hides"/>
                                <img src="<?php echo C('site_twm');?>" width="145" class="2wm" style="display:none;margin:-100px 57px 0 0"/>
                                <map name="taklhtml"><area shape="rect" coords="26,273,115,300 " href="#" /></map>
                            </a>
                        </li>
                        <li>
                            <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('site_qq');?>&site=qq&menu=yes" target="_blank">
                                <div class="hides" style="width:161px;display:none;" id="qq">
                                    <div class="hides" id="p1">
                                        <img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/xufu/ll04.png">
                                    </div>
                                    <?php if(C('site_qq') == ''): ?><div class="hides" id="p2">
                                            <span style="color:#FFF;font-size:13px">xxxxxxxxxxx</span>
                                        </div>
                                    <?php else: ?>
                                        <?php if(is_array($siteqq)): $i = 0; $__LIST__ = $siteqq;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="hides" id="p2">
        	                                    <span style="color:#FFF;font-size:13px"><?php echo ($vo); ?></span>
        	                                </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </div>
                                <img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/xufu/l04.png" width="47" height="49" class="shows" />
                            </a>
                        </li>
                        <li id="tel">
                            <a href="javascript:void(0)">
                                <div class="hides" style="width:161px;display:none" id="tels"/>
                                    <div class="hides" id="p1">
                                        <img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/xufu/ll05.png">
                                    </div>
                                    <?php if(C('site_mp') == ''): ?><div class="hides" id="p3">
                                            <span style="color:#FFF;font-size:12px">xxxxxxxxxxx</span>
                                        </div>
                                    <?php else: ?>
                                        <?php if(is_array($sitemp)): $i = 0; $__LIST__ = $sitemp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="hides" id="p3">
        	                                    <span style="color:#FFF;font-size:12px"><?php echo ($vo); ?></span>
        	                                </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </div>
                                <img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/xufu/l05.png" width="47" height="49" class="shows" />
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="javascript:void(0)" class="youhui">
                                <img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/xufu/l02.png" width="47" height="49" class="shows" />
                                <img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/xufu/a.png" width="57" height="49" class="hides"/>
                                <img src="<?php echo ($qrcode); ?>" width="145" class="2wm" style="display:none;margin:-100px 57px 0 0"/>
                                <map name="taklhtml"><area shape="rect" coords="26,273,115,300 " href="#" /></map>
                            </a>
                        </li>
                        <li>
                            <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($qq); ?>&site=qq&menu=yes" target="_blank">
                                <div class="hides" style="width:161px;display:none;" id="qq">
                                    <div class="hides" id="p1">
                                        <img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/xufu/ll04.png">
                                    </div>
                                    <?php if(siteqq == ''): ?><div class="hides" id="p2">
                                            <span style="color:#FFF;font-size:13px">xxxxxxxxxxx</span>
                                        </div>
                                    <?php else: ?>
                                        <?php if(is_array($siteqq)): $i = 0; $__LIST__ = $siteqq;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="hides" id="p2">
                                                <span style="color:#FFF;font-size:13px"><?php echo ($vo); ?></span>
                                            </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </div>
                                <img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/xufu/l04.png" width="47" height="49" class="shows" />
                            </a>
                        </li>
                        <li id="tel">
                            <a href="javascript:void(0)">
                                <div class="hides" style="width:161px;display:none" id="tels"/>
                                    <div class="hides" id="p1">
                                        <img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/xufu/ll05.png">
                                    </div>
                                    <?php if(sitemp == ''): ?><div class="hides" id="p3">
                                            <span style="color:#FFF;font-size:12px">xxxxxxxxxxx</span>
                                        </div>
                                    <?php else: ?>
                                        <?php if(is_array($sitemp)): $i = 0; $__LIST__ = $sitemp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="hides" id="p3">
                                                <span style="color:#FFF;font-size:12px"><?php echo ($vo); ?></span>
                                            </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </div>
                                <img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/xufu/l05.png" width="47" height="49" class="shows" />
                            </a>
                        </li><?php endif; ?>
                    <li id="btn">
                        <a id="top_btn">
                        <div class="hides" style="width:161px;display:none"><img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/xufu/ll06.png" width="161" height="49" /></div>
                        <img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/xufu/l06.png" width="47" height="49" class="shows" />
                        </a>
                    </li>
                </ul>
            </div>
        	<!--leftsead end-->
        </div>
        <!--startof footer-->
        <div class="footer clr" style="padding-bottom:20px;">
        	<div class="last clr">
            	<P style="padding-bottom: 0px;">© <?php echo ($time); ?> <?php echo C('server_topdomain');?>   <?php if($copyright == ''): echo C('ipc'); else: echo ($copyright); endif; ?></P>
            	<?php
 if (C('server_topdomain')=='pigcms.cn'){ echo '<P style="padding:20px 0 0 0;"><a  key ="549258c23b05a3da0fbc6eb3"  logo_size="83x30"  logo_type="realname"  href="http://www.anquan.org" ><script src="http://static.anquan.org/static/outer/js/aq_auth.js"></script></a></p>'; } ?>
            	
            </div>
        </div>
    <script type="text/javascript">
        //功能更新
        $(".tuPian").mouseover(function(){
          $(this).children().children(".tubiao").hide();
          $(this).children().children(".tubiao1").show();
        });
        $(".tuPian").mouseout(function(){
          $(this).children().children(".tubiao").show();
          $(this).children().children(".tubiao1").hide();
        });
        //右侧导航 - 二维码
        $(".youhui").mouseover(function(){
            $(this).children(".2wm").show();
        })
        $(".youhui").mouseout(function(){
            $(this).children(".2wm").hide();
        });
        //右侧导航 - QQ
        var ndiv = $("#qq").children().length;;
        var npx = ((ndiv-2)*49)+"px";
        $("#qq").mouseover(function(){
            $("#tel").css("margin-top",npx);
        })
        $("#qq").mouseout(function(){
            $("#tel").css("margin-top","0px");
        })
        //右侧导航 - 电话
        var ndiv = $("#tels").children().length;
        var npx1 = ((ndiv-2)*49)+"px";
        $("#tels").mouseover(function(){
            $("#btn").css("margin-top",npx1);
        })
        $("#tels").mouseout(function(){
            $("#btn").css("margin-top","0px");
        })
    </script>
    </body>
</html>