<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>案例展示－<?php echo ($f_siteTitle); ?></title>
        <script type="text/javascript">
        	onload = function(){
        		var lli=document.getElementById("menu").getElementsByTagName("li");
        		var lid = lli[0].id;
        		var nli=document.getElementById("main").getElementsByTagName("li");
        		for(var i=0;i<nli.length;i++){
                    nli[i].style.display=nli[i].id==lid?"block":"none";                    
                }
        		lli[0].className="greenbg";
        	}
        </script>
        <script type="text/javascript">
            function setTab(m,n){
                var tli=document.getElementById("menu").getElementsByTagName("li");
                var mli=document.getElementById("main").getElementsByTagName("li");
                for(var i=0;i<tli.length;i++){
                    tli[i].className=tli[i].id==n?"greenbg":"";
                }
                for(var i=0;i<mli.length;i++){
                    mli[i].style.display=mli[i].id==n?"block":"none";
                }
            }

        </script>
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
            	<p  style="background:url(<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/fourbg_02.png) repeat-x;" class="zhutu clr">
                	<?php if($images['common'] == null): ?><img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/4.png" />
                    <?php else: ?>
                        <img src="<?php echo ($images['common']); ?>" style="width:100%;height:300px;"><?php endif; ?>
                </p>
            </div>
            <!--end banner-->
        
        <div class="content clr">
        	<div class="contLt clr">
                <ul id="menu">
                	<?php if($class == ''): ?><li id="0"><div onClick="setTab(0,0)">案例展示</li>
						<li id="99999"><div onClick="setTab(0,99999)">案例展示</li>
                	<?php else: ?>
	                    <?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id="<?php echo ($vo["id"]); ?>"><div onClick="setTab(0,<?php echo ($vo["id"]); ?>)"><?php echo ($vo["name"]); ?></div></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </ul>
            </div>
            <div class="contRt clr">
            	<!---->
                    <div class="contNei clr" style="min-height:421px;" >
                    	<p class="chaxun clr">案例展示</p>
                        <!---->
                      <div class="section">
                            <ul class="clearfix" id="main">
                            	<?php if($cases == ''): ?><li id="0" style="display:none;">
										<div class="photo"><img  src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/1_03.png"></div>
	                                    <div class="rsp"></div>
	                                    <div class="text">
	                                        <p class="weiXin clr"><img src="<?php echo C('site_twm');?>" /></p>
	                                        <p class="chakanX clr"><a href="javascript:void(0)">案例展示</a></p>
	                                    </div>
									</li>
									<li id="0" style="display:none;">
                                        <div class="photo"><img  src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/1_03.png"></div>
                                        <div class="rsp"></div>
                                        <div class="text">
                                            <p class="weiXin clr"><img src="<?php echo C('site_twm');?>" /></p>
                                            <p class="chakanX clr"><a href="javascript:void(0)">案例展示</a></p>
                                        </div>
									</li>
									<li id="99999" style="display:none;">
										<div class="photo"><img  src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/3_03.png"></div>
	                                    <div class="rsp"></div>
	                                    <div class="text">
	                                        <p class="weiXin clr"><img src="<?php echo C('site_twm');?>" /></p>
	                                        <p class="chakanX clr"><a href="javascript:void(0)">案例展示</a></p>
	                                    </div>
									</li>
                            	<?php else: ?>
	                                <?php if(is_array($cases)): $i = 0; $__LIST__ = $cases;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(C('server_topdomain') == 'pigcms.cn'): ?><li id="<?php echo ($vo["classid"]); ?>" style="display:none;">
                                                <div class="photo"><img  src="<?php echo ($vo["writer"]); ?>"></div>
                                                <div class="rsp"></div>
                                                <div class="text">
                                                    <p class="weiXin clr"><img src="<?php echo ($vo["pic"]); ?>"  style="height:102px"/></p>
                                                    <p class="chakanX clr"><a href="<?php if($vo["url"] == ''): ?>javascript:void(0)<?php else: echo ($vo["url"]); endif; ?>">微信扫一扫</a></p>
                                                </div>
                                            </li>
                                        <?php else: ?>
    		                                <li id="<?php echo ($vo["class"]); ?>" style="display:none;">
    		                                    <div class="photo"><img  src="<?php echo ($vo["img"]); ?>"></div>
    		                                    <div class="rsp"></div>
    		                                    <div class="text">
    		                                        <p class="weiXin clr"><img src="<?php echo ($vo["timg"]); ?>"  style="height:102px"/></p>
    		                                        <p class="chakanX clr"><a href="<?php if($vo["url"] == ''): ?>javascript:void(0)<?php else: echo ($vo["url"]); endif; ?>"><?php if($vo["name"] == ''): ?>微信扫一扫<?php else: echo ($vo["name"]); endif; ?></a></p>
    		                                    </div>
    		                                </li><?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <!---->
                    </div>
                <!---->
              	<script type="text/javascript">
                        $(document).ready(function(){	
                            $(".section ul li .rsp").hide();	
                            $(".section	 ul li").hover(function(){
                                $(this).find(".rsp").stop().fadeTo(500,0.7)
                                $(this).find(".text").stop().animate({left:'0'}, {duration: 500})
                            },
                            function(){
                                $(this).find(".rsp").stop().fadeTo(500,0)
                                $(this).find(".text").stop().animate({left:'300'}, {duration: "fast"})
                                $(this).find(".text").animate({left:'-300'}, {duration: 0})
                            });
                        });
                </script>  
            </div>
        </div>
        <!--endof content-->
        
        <!--startof footer-->
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