<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>资费说明－<?php echo ($f_siteTitle); ?></title>
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
            	<p class="zhutu clr" style="background:#bfd4eb;">
                	<?php if($images['price'] == null): ?><img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/3.png" />
                    <?php else: ?>
                        <img src="<?php echo ($images['price']); ?>" style="width:100%;height:300px;"><?php endif; ?>
                </p>
            </div>
            <!--end banner-->
        
         <div class="content clr">
        	<div class="congtS clr">
            	<div class="shangLt clr">当前位置</div>
                <div class="shangRt clr">
                	<p class="oneth clr"> <a href="#"><?php echo ($f_siteName); ?>多用户微信营销系统</a></p>
                    <p>»</p>
                    <p class="twoth clr"><a href="#">资费说明</a></p>
                </div>
            </div>
            <div class="congtX clr">
            	<p class="guanyu clr">资费说明<span>TARIFF DESCRIPTION</span></p>
                <!--表格-->
                <div class="biaoge clr">
                	<table>
                    	<tr class="oneth clr">
                        	<td class="teshu clr">微信号流量套餐</td>
                            <?php if(is_array($groups)): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><td <?php if($i == $count): ?>class="norightborder"<?php endif; ?>><?php echo ($g["name"]); ?></th><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                        <tr class="twoth clr">
                        	<td class="teshu clr">
                            	vip价格
                                <a  class="tooltips" ><img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/biaoge_18.png" align="absmiddle" />
                                <span><p>VIP只是流量套餐！</p></span></a>
                            </td>
                            <?php if(is_array($prices)): $i = 0; $__LIST__ = $prices;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><td class="price clr">
                                    <?php echo ($g); ?><br />
                                    <span>元/月</span>
                                </td><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                        <tr class="others clr">
                        	<td class="teshu clr" align="absmiddle">
                            	允许创建公众号数量
                                <a  class="tooltips" ><img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/biaoge_18.png" align="absmiddle"/>
                                <span><p>最多允许创建公众号的数量</p></span></a>
                            </td>
                            <?php if(is_array($wechatNums)): $i = 0; $__LIST__ = $wechatNums;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><td><?php echo ($g); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                        <tr class="others clr">
                        	<td class="teshu clr" align="absmiddle">
                            	自定义图文条数
                                <a  class="tooltips" ><img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/biaoge_18.png" align="absmiddle"/>
                                <span><p>每个月可以创建的图文回复数量</p></span></a>
                            </td>
                            <?php if(is_array($diynums)): $i = 0; $__LIST__ = $diynums;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><td ><?php echo ($g); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                        <tr class="others clr">
                        	<td class="teshu clr" align="absmiddle">
                            	请求数
                                <a  class="tooltips" ><img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/biaoge_18.png" align="absmiddle"/>
                                <span><p>每个月可以进行多少次回复请求</p></span></a>
                            </td>
                            <?php if(is_array($connectnums)): $i = 0; $__LIST__ = $connectnums;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><td><?php echo ($g); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                        <tr class="others clr">
                        	<td class="teshu clr" align="absmiddle">
                            	每月活动创建次数
                                <a  class="tooltips" ><img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/biaoge_18.png" align="absmiddle"/>
                                <span><p><strong>什么是活动创建数量？</strong></p>
                                <p>每月允许创建的大转盘等互动活动数量</p></span></a>
                            </td>
                            <?php if(is_array($activitynums)): $i = 0; $__LIST__ = $activitynums;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><td><?php echo ($g); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                        <tr class="others clr">
                        	<td class="teshu clr" align="absmiddle">
                            	每月会员卡开卡数量
                                <a  class="tooltips" ><img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/biaoge_18.png" align="absmiddle"/>
                                <span>
	                                <p><strong>什么是每月会员卡开卡数量？</strong></p>
	                                <p>每个月允许创建多少张会员卡提供给会员领取</p>
                                </span></a>
                            </td>
                            <?php if(is_array($create_card_nums)): $i = 0; $__LIST__ = $create_card_nums;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><td ><?php echo ($g); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                        <tr class="others clr">
                        	<td class="teshu clr" align="absmiddle">
                            	自定义版权信息
                                <a  class="tooltips" ><img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/biaoge_18.png" align="absmiddle"/>
                                <span>
                                	<p><strong>自定义版权信息？</strong></p>
                                	<p>如果不能自定义，将在微网站底部显示页面有:此页面是由【<?php echo ($f_siteName); ?>接口平台】系统生成 版权信息</p>
                                </span></a>
                            </td>
                            <?php if(is_array($copyrights)): $i = 0; $__LIST__ = $copyrights;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><td><?php if($g): ?>可以<?php else: ?>不能<?php endif; ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                        <tr class="others clr">
                        	<td class="teshu red clr" align="absmiddle">
                            	购买VIP套餐
                                <a  class="tooltips" ><img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/biaoge_18.png" align="absmiddle"/>
                                <span><p><strong>简单购买流程提醒</strong></p></span></a>
                            </td>
                            <?php if(is_array($create_card_nums)): $i = 0; $__LIST__ = $create_card_nums;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><td>
                                    <a href="<?php echo U('User/Alipay/index',array('gid'=>0));?>" class="buys clr"><span>立即充值</span></a>
                                </td><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                        <tr style="border-bottom:1px solid #fff;">
                        	<td colspan="6" height="50px" style="line-height:50px; font-size:16px;">功能列表及套餐对比</td>
                        </tr>
                        <?php if(is_array($funs)): $i = 0; $__LIST__ = $funs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f): $mod = ($i % 2 );++$i;?><tr class="checked clr">
                            	<td class="teshu clr" align="absmiddle">
                                	<?php echo ($f["name"]); ?>
                                    <a  class="tooltips" ><img src="<?php echo ($staticPath); ?>/tpl/Home/pigcms/common/images/images/biaoge_18.png" align="absmiddle"/>
                                    <span><p><?php echo ($f["info"]); ?></p></span></a>
                                </td>
                                <?php  if ($f['access']){ $i=1; foreach ($f['access'] as $v){ ?>
                                
                                  <td class="<?php if ($v){echo '';}else{echo 'wrong';} if ($i==$count){echo ' norightborder';}?>">&nbsp;</td>
                                 <?php  $i++; } } ?>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <p style="padding-left:20px; padding-top:20px;">有疑问的请QQ<?php echo ($f_qq); ?>提问。</p>
                </div>
                <!--表格-->
            </div>
        </div>
        
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