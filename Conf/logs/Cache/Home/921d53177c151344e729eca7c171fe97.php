<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <title><?php echo ($f_siteTitle); ?></title>
<meta name="keywords" content="<?php echo ($f_metaKeyword); ?>"/>
<meta name="description" content="<?php echo ($f_metaDes); ?>"/>
<script language="javascript" type="text/javascript">
function banner(){  
    var bn_id = 0;
    var bn_id2= 1;
    var speed33=5000;
    var qhjg = 1;
    var MyMar33;
    $("#banner .d1").hide();
    $("#banner .d1").eq(0).fadeIn("slow");
    if($("#banner .d1").length>1)
    {
        $("#banner_id li").eq(0).addClass("nuw");
        function Marquee33(){
            bn_id2 = bn_id+1;
            if(bn_id2>$("#banner .d1").length-1)
            {
                bn_id2 = 0;
            }
            $("#banner .d1").eq(bn_id).css("z-index","2");
            $("#banner .d1").eq(bn_id2).css("z-index","1");
            $("#banner .d1").eq(bn_id2).show();
            $("#banner .d1").eq(bn_id).fadeOut("slow");
            $("#banner_id li").removeClass("nuw");
            $("#banner_id li").eq(bn_id2).addClass("nuw");
            bn_id=bn_id2;
        };
    
        MyMar33=setInterval(Marquee33,speed33);
        
        $("#banner_id li").live('click',function(){
            var bn_id3 = $("#banner_id li").index(this);
            if(bn_id3!=bn_id&&qhjg==1)
            {
                qhjg = 0;
                $("#banner .d1").eq(bn_id).css("z-index","2");
                $("#banner .d1").eq(bn_id3).css("z-index","1");
                $("#banner .d1").eq(bn_id3).show();
                $("#banner .d1").eq(bn_id).fadeOut("slow",function(){qhjg = 1;});
                $("#banner_id li").removeClass("nuw");
                $("#banner_id li").eq(bn_id3).addClass("nuw");
                bn_id=bn_id3;
            }
        })
        $("#banner_id").hover(
            function(){
                clearInterval(MyMar33);
            }
            ,
            function(){
                MyMar33=setInterval(Marquee33,speed33);
            }
        )   
    }
    else
    {
        $("#banner_id").hide();
    }
}

function showNotice() {            
            document.getElementById("bg").style.display ="block";
            document.getElementById("show").style.display ="block";
            document.getElementsByTagName('body')[0].style.overflow='hidden';
            document.getElementsByTagName('body')[0].scroll="no";
            $('.zRight').css({'display':'none'});
        }
function hideNotice() {
            document.getElementById("bg").style.display ='none';
            document.getElementById("show").style.display ='none';
            document.getElementsByTagName('body')[0].style.overflow='auto';
            document.getElementsByTagName('body')[0].scroll="yes";
            $('.zRight').css({'display':'block'});
        }
        
</script>
<style type="text/css">
        #bg{ display: none;  position: absolute;  top: 0%;  left: 0%;  width: 100%;  height: 100%;  background-color: black;  z-index:1001;  -moz-opacity: 0.7;  opacity:.70;  filter: alpha(opacity=70);}
        #show{display: none; z-index:1002;  position: absolute;right:100px;top:0px; }
</style>
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


<div id="bg"></div>
<div id="show">
    <img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/noticeReg.png" usemap="#noticeReg" style="float:right" />

    <map name="noticeReg"> 
        <area shape="rectangle" coords="102,0,245,30" href="<?php echo U('Index/login');?>" title="登陆/注册"> 
        <area shape="rectangle" coords="87,502,272,574" value="Close" onclick="hideNotice();" href="#" title="关闭提示">
    </map>
</div>
            <!--banner-->
            <div class="banner" id="banner" >
            	<div id="agin">
                <?php if($banner == ''): ?><a href="javascript:void(0)" class="d1" style="background:url(<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/bann.jpg) center no-repeat;background-size:cover;-webkit-background-size:cover;-moz-background-size:cover;"></a>
                    <a href="javascript:void(0)" class="d1" style="background:url(<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/ban.jpg) center no-repeat;background-size:cover;-webkit-background-size:cover;-moz-background-size:cover;"></a>
                <?php else: ?>
                    <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php if($vo["url"] == ''): ?>javascript:void(0)<?php else: echo ($vo["url"]); endif; ?>" class="d1" style="background:url(<?php echo ($vo["img"]); ?>) center no-repeat;background-size:cover;-webkit-background-size:cover;-moz-background-size:cover;"></a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </div>
                <div class="d2" id="banner_id">
                    <ul id="ll">
                    </ul>
                </div>
            </div>
            <script type="text/javascript">banner()</script>
            <!--end banner-->
        
        <!--startof content-->
        <div class="contents clr">
        	<div class="chengZhang clr" style="margin-top:120px;">
            	<div class="daZi">
                	<p class="Dazi clr">功能更新进程</p>
                    <p class="Xiaozi clr">无与伦比的更新进度 让您的微信营销领先一步</p>
                </div>
                <!-- 更新进程-内容 -->
                <div class="fivePhoto">
            		<ul>
                    <div class="rendv">
                    <?php if($renew == ''): ?><li class="tuPian" id="ren">
                            <a href="javascript:void(0)">
                                <P class="tubiao" id="wz" style="background:url(<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/datu_03.png) no-repeat center; height:120px;"></P>
                                <P class="tubiao1" id="xz" style="background:url(<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/tupian_03.png) no-repeat center; height:120px;display:none"></P>
                                <p class="xiaoZhu clr"><?php echo ($f_siteName); ?>新分享</p>
                                <p class="weizhi clr"></p>
                                <p class="hengXian clr"></p>
                                <p class="sixth clr">2013年8月12日</p>  
                            </a>
                        </li>  
                        <li class="tuPian" id="ren">
                            <a href="javascript:void(0)">
                                <P class="tubiao" id="wz" style="background:url(<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/datu_05.png) no-repeat center; height:120px;"></P>
                                <P class="tubiao1" id="xz" style="background:url(<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/tupian_05.png) no-repeat center; height:120px;display:none"></P>
                                <p class="xiaoZhu clr"><?php echo ($f_siteName); ?>微助力</p>
                                <p class="weizhi clr"></p>
                                <p class="hengXian clr"></p>
                                <p class="sixth clr">2013年11月11日</p>  
                            </a>
                        </li> 
                        <li class="tuPian" id="ren">
                            <a href="javascript:void(0)">
                                <P class="tubiao" id="wz" style="background:url(<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/datu_07.png) no-repeat center; height:120px;"></P>
                                <P class="tubiao1" id="xz" style="background:url(<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/tupian_07.png) no-repeat center; height:120px;display:none"></P>
                                <p class="xiaoZhu clr"><?php echo ($f_siteName); ?>人气冲榜</p>
                                <p class="weizhi clr"></p>
                                <p class="hengXian clr"></p>
                                <p class="sixth clr">2014年3月24日</p>  
                            </a>
                        </li>  
                        <li class="tuPian" id="ren">
                            <a href="javascript:void(0)">
                                <P class="tubiao" id="wz" style="background:url(<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/datu_09.png) no-repeat center; height:120px;"></P>
                                <P class="tubiao1" id="xz" style="background:url(<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/tupian_09.png) no-repeat center; height:120px;display:none"></P>
                                <p class="xiaoZhu clr"><?php echo ($f_siteName); ?>九宫格</p>
                                <p class="weizhi clr"></p>
                                <p class="hengXian clr"></p>
                                <p class="sixth clr">2014年6月9日</p>  
                            </a>
                        </li>   
                        <li class="tuPian" id="ren">
                            <a href="javascript:void(0)">
                                <P class="tubiao" id="wz" style="background:url(<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/datu_11.png) no-repeat center; height:120px;"></P>
                                <P class="tubiao1" id="xz" style="background:url(<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/tupian_11.png) no-repeat center; height:120px;display:none"></P>
                                <p class="xiaoZhu clr"><?php echo ($f_siteName); ?>授权登录</p>
                                <p class="weizhi clr"></p>
                                <p class="hengXian clr"></p>
                                <p class="sixth clr">2014年9月19日</p>
                            </a>
                        </li>          
                    <?php else: ?>
                		<?php if(is_array($renew)): $i = 0; $__LIST__ = $renew;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="tuPian" id="ren">
        	                    	<a href="<?php if($vo["url"] == ''): ?>javascript:void(0)<?php else: echo ($vo["url"]); endif; ?>">
        	                        	<P class="tubiao" id="wz" style="<?php if($vo["img_w"] == ''): ?>background:url(<?php echo ($vo["img_x"]); ?>)<?php else: ?>background:url(<?php echo ($vo["img_w"]); ?>)<?php endif; ?> no-repeat center; height:120px;"></P>
                                        <P class="tubiao1" id="xz" style="<?php if($vo["img_x"] == ''): ?>background:url(<?php echo ($vo["img_w"]); ?>)<?php else: ?>background:url(<?php echo ($vo["img_x"]); ?>)<?php endif; ?> no-repeat center; height:120px;display:none"></P>
        	                            <p class="xiaoZhu clr"><?php echo ($vo["name"]); ?></p>
        	                            <p class="<?php if($vo["color"] == 1): ?>weizhi1<?php elseif($vo["color"] == 2): ?>weizhi2<?php elseif($vo["color"] == 3): ?>weizhi3<?php elseif($vo["color"] == 4): ?>weizhi4<?php elseif($vo["color"] == 5): ?>weizhi5<?php else: ?>weizhi<?php endif; ?>"></p>
        	                            <p class="hengXian clr"></p>
        	                            <p class="<?php if($vo["color"] == 1): ?>sixtha<?php elseif($vo["color"] == 2): ?>sixthb<?php elseif($vo["color"] == 3): ?>sixthc<?php elseif($vo["color"] == 4): ?>sixthd<?php elseif($vo["color"] == 5): ?>sixthe<?php else: ?>sixth<?php endif; ?>"><?php echo ($vo["time"]); ?></p>  
        	                        </a>
        	                    </li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </div> 
                    </ul>
                </div>
            </div>
            <!---->
            
            </div>
            
            <!---->
            <div class="baokuo clr">
                <div class="fuWu clr">
                    <div class="daZi">
                        <p class="Dazi clr">功能模块</p>
                        <p class="Xiaozi clr"><?php echo ($f_siteName); ?>系统内置100多项应用，涵盖近30个行业的垂直领域应用</p>
                    </div>
                    <div class="diaoYan clr">
                        <div class="diaoYtupian1 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                    <p class="beiJingtu clr"></p>
                                    <p class="words clr">微调研</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian2 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                    <p class="beiJingtu clr"></p>
                                    <p class="words clr">微信墙</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian3 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">摇一摇</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian4 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微社区</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian5 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微群发</p>
                                </div>
                            </a>
                        </div>
                        <!---->
                        <div class="diaoYtupian6 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微美容</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian7 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微健身</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian8 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微政务</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian9 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微食品</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian10 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微装修</p>
                                </div>
                            </a>
                        </div>
                        <!---->
                        <div class="diaoYtupian11 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">会员卡支付</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian12 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微城市</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian13 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微团购</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian14 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微订餐</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian15 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">超级商城</p>
                                </div>
                            </a>
                        </div>
                        <!---->
                    </div>
                    <p class="anniu clr"><a href="<?php echo U('Home/Index/fc');?>">更多功能...</a></p>
                </div>
            </div>
            <!---->
            <div class="anLie clr">
            	<div class="daZi">
                	<p class="Dazi clr">案例展示</p>
                    <p class="Xiaozi clr">深入了解我们客户的案例以及我们能做什么</p>
                </div>
                <div style="width:1050px; margin:0 auto">
                    <div class="mr_frbox">
                          <img class="mr_frBtnL prev" src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/mfrL.png" width="28" height="46" />
                          <div class="mr_frUl">
                          		<!---->
                              <div class="section">
                                    <ul class="clearfix">
                                        <?php if($case == ''): ?><li>
                                                <div class="photo"><img  src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/1_03.png"></div>
                                                <div class="rsp"></div>
                                                <div class="text">
                                                    <p class="weiXin clr"><img src="<?php echo C('site_twm');?>" /></p>
                                                    <p class="chakanX clr"><a href="javascript:void(0)">查看详情</a></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="photo"><img  src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/2_03.png"></div>
                                                <div class="rsp"></div>
                                                <div class="text">
                                                    <p class="weiXin clr"><img src="<?php echo C('site_twm');?>" /></p>
                                                    <p class="chakanX clr"><a href="javascript:void(0)">查看详情</a></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="photo"><img  src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/3_03.png"></div>
                                                <div class="rsp"></div>
                                                <div class="text">
                                                    <p class="weiXin clr"><img src="<?php echo C('site_twm');?>" /></p>
                                                    <p class="chakanX clr"><a href="javascript:void(0)">查看详情</a></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="photo"><img  src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/4_03.png"></div>
                                                <div class="rsp"></div>
                                                <div class="text">
                                                    <p class="weiXin clr"><img src="<?php echo C('site_twm');?>" /></p>
                                                    <p class="chakanX clr"><a href="javascript:void(0)">查看详情</a></p>
                                                </div>
                                            </li>

                                        <?php else: ?>
                                        	<?php if(is_array($case)): $i = 0; $__LIST__ = $case;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(C('server_topdomain') == 'pigcms.cn'): ?><li>
                                                        <div class="photo"><img  src="<?php echo ($vo["writer"]); ?>"></div>
                                                        <div class="rsp"></div>
                                                        <div class="text">
                                                            <p class="weiXin clr"><img src="<?php echo ($vo["pic"]); ?>"  style="height:102px"/></p>
                                                            <p class="chakanX clr"><a href="<?php if($vo["url"] == ''): ?>javascript:void(0)<?php else: echo ($vo["url"]); endif; ?>">微信扫一扫</a></p>
                                                        </div>
                                                    </li>
                                                <?php else: ?>
    		                                        <li>
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
                          <img class="mr_frBtnR next" src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/mfrR.png" width="28" height="46" />
                    </div>
                    <script language="javascript">
                    $(".mr_frUl ul li img").hover(function(){$(this).css("border-color","#A0C0EB");},function(){$(this).css("border-color","#d8d8d8")});
                    jQuery(".mr_frbox").slide({titCell:"",mainCell:".mr_frUl ul",autoPage:true,effect:"leftLoop",autoPlay:true,vis:4});
                    </script>
                    </div>
                </div>
            </div>
            <!---->
            <div style="width:1060px;margin:20px auto;margin-bottom:-20px;display:<?php if($links == ''): ?>none<?php else: ?>blank<?php endif; ?>">友情链接：
                    <?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$loo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($loo["url"]); ?>" ><?php echo ($loo["name"]); ?></a>&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <!---->
            <div class="aboutUs clr">
                <div class="zhongXin clr">
                    <?php if($info == ''): ?><div class="zuoBian clr">
                            <h4>产品动态</h4>
                            <ul>
                                <li><a href="#">双应用助兴圣诞元旦双节 节日气氛嗨起</a></li>
                                <li><a href="#">一周新功能回顾之12月22日篇</a></li>
                                <li><a href="#">微助力活动上线了</a></li>
                                <li><a href="#">人气冲榜活动上线了</a></li>
                                <li><a href="#">人气冲榜活动上线了</a></li>
                            </ul>
                        </div>
                        <div class="zuoBian clr">
                            <h4>微信百科</h4>
                            <ul>
                                <li><a href="#">如何做好粉丝互动营销?</a></li>
                                <li><a href="#">朋友圈营销如何用内容去打动用户</a></li>
                                <li><a href="#">营销者看过来：微信营销全新解读</a></li>
                                <li><a href="#">微信公众号搜素排名优化方法分享</a></li>
                                <li><a href="#">细分行业行业微信运营方法谈之餐饮</a></li>
                            </ul>
                        </div>
                        <div class="zuoBian clr">
                            <h4>行业动态</h4>
                            <ul>
                                <li><a href="#">FB股价创新高：受益移动业务及Instagra</a></li>
                                <li><a href="#">我们听懂张小龙的微信八条了吗</a></li>
                                <li><a href="#">微信开启“声音登录”功能</a></li>
                                <li><a href="#">央行松绑二维码支付还得跨过三重门</a></li>
                                <li><a href="#">微信支付开大门 公众号App都可发现金红包</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                    	<div class="zuoBian clr">
                        	<h4><?php echo ($info['name1']); ?></h4>
                            <ul>
                            	<?php if(is_array($title1)): $i = 0; $__LIST__ = $title1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php if ($vo['url']){ echo ($vo["url"]); }else{ ?>index.php?g=Home&m=Index&a=about&iid=<?php echo ($vo["id"]); }?>" target="_blank"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="zuoBian clr">
                        	<h4><?php echo ($info['name2']); ?></h4>
                            <ul>
                            	<?php if(is_array($title2)): $i = 0; $__LIST__ = $title2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php if ($vo['url']){ echo ($vo["url"]); }else{ ?>index.php?g=Home&m=Index&a=about&iid=<?php echo ($vo["id"]); }?>" target="_blank"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="zuoBian clr">
                        	<h4><?php echo ($info['name3']); ?></h4>
                            <ul>
                            	<?php if(is_array($title3)): $i = 0; $__LIST__ = $title3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php if ($vo['url']){ echo ($vo["url"]); }else{ ?>index.php?g=Home&m=Index&a=about&iid=<?php echo ($vo["id"]); }?>" target="_blank"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div><?php endif; ?>
                </div>   
            </div>            
        <!-- footer -->
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
        <script type="text/javascript">
         window.onload=function(){
			var a = document.getElementById("agin").getElementsByTagName("a");
			var len = a.length;
			for(var i=0;i<len;i++){
				$("#ll").append("<li></li>");
			}
		}
            <?php echo ($showNotice); ?>
		</script>
    </body>
</html>