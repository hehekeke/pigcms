<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if($action_info['action_name']): echo ($action_info['action_name']); endif; ?></title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=no" />
<link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/static/voteimg/css/style.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/static/voteimg/css/style_PageDefault.css">
<link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/static/voteimg/css/style_PageMaster.css">
<link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/static/voteimg/css/swipe.css">
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/voteimg/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/voteimg/js/jquery.lightbox-0.5.min.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/voteimg/js/tanchuang.js"></script>
<script type="text/javascript">
$(function(){
	$("#fly_page").hide();
	//$("#TopTipClose").click();//执行关闭
	$("#TopTipHolder").hide();
});
</script>
<style>
#ul_page{width:95%;float:left; left:2.5%}     
#ul_page ol{ width:47%;}  
.page a{ background: #ffffff none repeat scroll 0 0; border-radius: 4px;padding: 5px 10px 5px;color: #fe5842;margin-left:3.5px;}
.page .current{border:1px #2dcc70 solid; background: #2dcc70 none repeat scroll 0 0; border-radius: 4px;padding: 5px 10px 5px;color: #FFFFFF;margin-left:3.5px;}
.img_po{height:28px;left: 0;position:absolute;width:100%;top:0%;}
.img_po_div{background: #000000 none repeat scroll 0 0;height: 28px;opacity: 0.3;position: absolute;width: 100%;left: 1px;top: 0px;}
#setdiv{margin-bottom:10px;}
.img_po_txt{ color: #ffffff;line-height: 30px;padding-left: 5px;position: absolute;}
#content_tab{width:98%;padding:1%;}
#content_result{padding-bottom: 10px;}
#position{bottom:10px;}
#faq ul{margin: 0;padding: 0;display: inline;}
#faq li{line-height: 30px;padding: 0 0 5px 22px;border-bottom:1px #ccc solid;height:30px;}
</style>
</head>
<body id="body">
<?php if($memberNotice != ''): echo ($memberNotice); endif; ?>
  <div id="div">
    <div id="content_pic">
      <div class="addWrap">
        <div class="swipe" id="mySwipe">
          <div class="swipe-wrap">
		  <?php if($banner != ''): if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["external_links"] != ''): ?><div style="height:150px;overflow:hidden;width:100%;" onclick="window.location.href='<?php echo ($vo["external_links"]); ?>'"><img class="img-responsive" src="<?php echo ($vo["img_url"]); ?>"/></div>
				<?php else: ?>
				<div style="height:150px;overflow:hidden;width:100%;"><img class="img-responsive" src="<?php echo ($vo["img_url"]); ?>"/></div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			<?php else: ?>
			<div style="width:100%;height:130px;overflow:hidden;"><img class="img-responsive" src="<?php echo ($action_info["reply_pic"]); ?>"/></div><?php endif; ?>
          </div>
        </div>
        <ul id="position">
		  <?php if($banner != ''): if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(count($banner) > 1): ?><li <?php if($key == 0): ?>class="cur"<?php endif; ?>></li><?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
        </ul>
      </div>
    </div>
   	<?php if($hide != 2): ?><div id="main">
      <div id="main_1">
        <div id="main_1_1">
          <?php echo ($name[0]); ?>
        </div>
        <div id="main_a">
        </div>
      </div>
      <div id="main_1">
        <div id="main_1_1">
          <?php echo ($name[1]); ?>
        </div>
        <div id="main_b">   
       </div>
     </div>
     <div id="main_2">
      <div id="main_1_1">
        <?php echo ($name[2]); ?>
      </div>
      <div id="main_c"></div>
    </div>
  </div>
  <?php else: ?>
  <div style="height: 10px;background: #fff;"></div><?php endif; ?>
  <!--参与 -->
  <nav id="article">
   <div id="faq">
   <?php if($menu[0]['hide'] == 1): ?><ul>
      <li <?php if($menu[0]['menu_link'] != ''): ?>onclick="window.location.href='<?php echo ($menu[0]['menu_link']); ?>'"<?php endif; ?>>
        <div id="article_pic"><img src="<?php if(strpos($menu[0]['menu_icon'],'http') !== false){ echo $menu[0]['menu_icon'];}else{ echo $staticPath.$menu[0]['menu_icon'];} ?>"  /></div>
        <div id="article_word"><?php echo ($menu[0]['menu_name']); ?></div></li>
      </ul><div style="clear: both;"></div><?php endif; ?>
	  <?php if($menu[1]['hide'] == 1): ?><ul>
        <li class="jiajian">
          <div id="article_pic"><img src="<?php if(strpos($menu[1]['menu_icon'],'http') !== false){ echo $menu[1]['menu_icon'];}else{ echo $staticPath.$menu[1]['menu_icon'];} ?>"/></div>
          <div id="article_word">
           <?php echo ($menu[1]['menu_name']); ?></div></li>
		    <dd id="date" style="display:none;" class="qiehuan_s"> 
			<div id="jiandiv1" >
				<div id="jiandiv2">
                  <div id="jiandiv">
                     活动时间
                  </div>
                  <div class="toupiao_s">
                   投票时间：<br> <?php echo (date('Y-m-d H:i',$action_info['start_time'])); ?>到<?php echo (date("Y-m-d H:i",$action_info['end_time'])); ?><br>
				   报名时间： <br><?php echo (date('Y-m-d H:i',$action_info['apply_start_time'])); ?>到<?php echo (date("Y-m-d H:i",$action_info['apply_end_time'])); ?><br>
                  </div>
                </div>
                </div></dd>    
          </ul><div style="clear: both;"></div><?php endif; ?>
		  <?php if($menu[2]['hide'] == 1): ?><dl>
            <dt class="jiajian">
              <div id="article_pic"><img src="<?php if(strpos($menu[2]['menu_icon'],'http') !== false){ echo $menu[2]['menu_icon'];}else{ echo $staticPath.$menu[2]['menu_icon'];} ?>" /></div>
              <div id="article_word">
                <?php echo ($menu[2]['menu_name']); ?>
              </div></dt>
              <dd class="qiehuan_s" style="display: none;"> <div  id="jiandiv1" >
                <div  id="jiandiv2">
                  <div id="jiandiv">
                    活动介绍
                  </div>
                  <div  class="toupiao_s">
                    <?php echo (html_entity_decode($action_info['action_desc'])); ?><br>
					您一共可以投票的次数：<?php if($action_info['limit_vote'] == 0): ?>不限制<?php else: echo ($action_info['limit_vote']); ?>次<?php endif; ?><br>
					您每天可以投票的次数：<?php if($action_info['limit_vote_day'] == 0): ?>不限制<?php else: echo ($action_info['limit_vote_day']); ?>次<?php endif; ?><br>
					每个投票选项您可以投票的次数：<?php if($action_info['limit_vote_item'] == 0): ?>不限制<?php else: echo ($action_info['limit_vote_item']); ?>次<?php endif; ?>
                  </div>
                </div>
                <?php if(strip_tags($action_info['join_desc']) != ''): ?><div  id="jiandiv2">
                  <div id="jiandiv">
                     如何参与
                  </div>
                  <div  class="toupiao_s">
                    <?php echo (html_entity_decode($action_info['join_desc'])); ?><br>
                  </div>
                </div><?php endif; ?>
			<?php if(strip_tags($action_info['flow_desc']) != ''): ?><div  id="jiandiv2">
                  <div id="jiandiv">
                   流程介绍
                  </div>
                  <div  class="toupiao_s">
                    <?php echo (html_entity_decode($action_info['flow_desc'])); ?><br>
                  </div>
                </div><?php endif; ?>
			<?php if(strip_tags($action_info['award_desc']) != ''): ?><div id="jiandiv2">
                  <div id="jiandiv">
                     奖品介绍
                  </div>
                  <div  class="toupiao_s">
                    <?php echo (html_entity_decode($action_info['award_desc'])); ?><br>
                  </div>
                </div><?php endif; ?>
                </div></dd>    
              </dl><div style="clear: both;"></div><?php endif; ?>
		  <?php if($menu[3]['hide'] == 1): ?><dl>
                <dt class="jiajian"><div id="article_pic"><img src="<?php if(strpos($menu[3]['menu_icon'],'http') !== false){ echo $menu[3]['menu_icon'];}else{ echo $staticPath.$menu[3]['menu_icon'];} ?>"   /></div>
                  <div id="article_word">
                     <?php echo ($menu[3]['menu_name']); ?>
                  </div>
                </dt>
                <dd id="vote_record" class="qiehuan_s" style="display: none;"></dd>   
              </dl><div style="clear: both;"></div><?php endif; ?>
		  <?php if($menu[4]['hide'] == 1): ?><ul>
                <a href="javascript:;" onclick="apply()"><dt><div id="article_pic"><img src="<?php if(strpos($menu[4]['menu_icon'],'http') !== false){ echo $menu[4]['menu_icon'];}else{ echo $staticPath.$menu[4]['menu_icon'];} ?>"/></div>
                  <div id="article_word">
                   <?php echo ($menu[4]['menu_name']); ?>
                  </div></dt>
                </a>   
              </ul><div style="clear: both;"></div><?php endif; ?>
			  <?php if(is_array($custom_menu)): $i = 0; $__LIST__ = $custom_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$me): $mod = ($i % 2 );++$i;?><dl>
			    <a href="javascript:;" onclick="window.location.href='<?php echo ($me["menu_link"]); ?>'">
                <dt><div id="article_pic"><img src="<?php echo ($me["menu_icon"]); ?>" style="width:25px;height:25px;margin-left:-37%;"/></div>
                  <div id="article_word" style="padding-left:7px;">
                    <?php echo ($me["menu_name"]); ?>
                  </div></dt></a>
              </dl><div style="clear: both;"></div><?php endforeach; endif; else: echo "" ;endif; ?>
			  <?php if($key_word != ''): ?><dl>
			    <a href="javascript:;" onclick="window.location.href='<?php echo U('Voteimg/index',array('id'=>$id,'token'=>$token));?>'">
                <dt><div id="article_pic"><img src="<?php echo ($staticPath); ?>/tpl/static/voteimg/img/back1.png"/></div>
                 <div id="article_word">
				返回首页
               </div></dt></a>
              </dl>
			  <?php else: ?>
			   <dl>
			    <a href="javascript:;" onclick="window.location.reload()">
                <dt><div id="article_pic"><img src="<?php echo ($staticPath); ?>/tpl/static/voteimg/img/update.png"/></div>
                  <div id="article_word">
					刷新
                  </div></dt></a>
              </dl><div style="clear: both;"></div><?php endif; ?>
            </div> 
          </nav>
          <!--内容 -->
          <div style="clear:both"></div>
          <!-- <form id="form1" name="form1" method="post" action=" ">-->
          <div id="content">
            <!--主体 -->  
            <div class="content_left">
             <!--头部 -->  
             <div class="settab">
			 <?php if($key_word == ''): ?><div id="setdiv">
                <dl id="J_setTabANav" class="tabnav"  style="width:100%">
                  <dd id="new" class="tab-menu hover" style="width:50%" onclick="change('new')">
                    <span>最新</span> 
                  </dd>
                  
                  <dd id="all" class="tab-menu" style="width:50%" onclick="change('all')">
                    <span>全部</span>
                  </dd>
                </dl>
              </div><?php endif; ?>
              <!--头部 -->  
              <!--查看 --> 
              <div id="J_setTabABox" class="tabbox" style="width:100%">
				<div id="detail" class="detail" style="display: block">  
                  <div id="ul_page" style="position:absolute;  ">
				  <?php if($alllist != ''): if(is_array($alllist)): $i = 0; $__LIST__ = $alllist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$all): $mod = ($i % 2 );++$i;?><ol class="li">
					<div id="content_tab"><div><div id="content_pic"><?php if($all["jump_url"] != ''): ?><a href="<?php echo ($all["jump_url"]); ?>"><div class="img_po"><div class="img_po_div"></div><div class="img_po_txt">编号: <?php echo ($all["baby_id"]); ?></div></div><img src="<?php echo ($all["vote_img"]); ?>"/></a><?php else: ?><a href="<?php echo U('Voteimg/popup_view',array('id'=>$all['vote_id'],'token'=>$all['token'],'item_id'=>$all['id']));?>"><img src="<?php echo ($all["vote_img"]); ?>"/></a><?php endif; ?></div></div><div id="content_xinxi"><?php echo (mb_substr($all["vote_title"],0,8,'utf-8')); ?></div><div id="content_result"><div id="content_rebu"><?php if($vote_date != '' && ($vote_date == 'wait' || $vote_date == 'over')): ?><button class="STYLE1" id="content_button" style="background-color:#ccc" onclick="wait_vote();";>投票</button><?php elseif($notice_content != '' && $notice_content == 'no_register'): ?><a href="#TopTip" onclick="anchor()"><button class="STYLE1" id="content_button">投票</button></a><?php elseif($notice_content != '' && $notice_content == 'no_follow'): ?><a href="#fly_page" onclick="anchor_follow()"><button class="STYLE1" id="content_button">投票</button></a><?php else: ?><button class="STYLE1" id="content_button" onclick="vote(<?php echo ($all["id"]); ?>,this)">投票</button><?php endif; ?></div><div  class="content_piao_<?php echo ($all["id"]); ?>" id="content_piao"><?php echo ($all["vote_count"]); ?>票</div><div style="clear:both"></div></div></div></ol><?php endforeach; endif; else: echo "" ;endif; ?>
				  <ol class="li page" style="top:1000px;height:90px;width:97%;"><?php echo ($page); ?></ol>
				  <?php else: ?>
				   <ul class="li" style="width:100%;color:#000;"><div id="content_tab">暂无记录</div></ul><?php endif; ?>
			</div>				
</div>
 <!--查看   
</div>-->
</div>
</div>
<br />
<br />
<!--主体 --> 
<!--</form> -->
<div id="foot"> 
<div style="width:100%; margin:0 auto;" id="c_foot">
<?php if(is_array($custom_bottom)): $i = 0; $__LIST__ = $custom_bottom;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bo): $mod = ($i % 2 );++$i;?><div id="foot_bu">  
 <div><span><a href="<?php echo ($bo["bottom_link"]); ?>"><button value='' id="" class="btnclick1" ><img src="<?php echo ($bo["bottom_icon"]); ?>" width="20" height="20" /><br />
<?php echo (mb_substr($bo["bottom_name"],0,5,'utf-8')); ?></button></a></span></div></div><?php endforeach; endif; else: echo "" ;endif; ?>
<?php if($bottom[0]['hide'] == 1): ?><div id="foot_bu">  
<div><span><a href="tel:<?php echo ($action_info['phone']); ?>"><button value='' id="btnclick2" class="btnclick2" ><img src="<?php echo ($staticPath); echo ($bottom[0]['bottom_icon']); ?>" width="20" height="20" /><br />
<?php echo (mb_substr($bottom[0]['bottom_name'],0,5,'utf-8')); ?></button></a></span></div></div><?php endif; ?>
<?php if($bottom[1]['hide'] == 1): ?><div id="foot_bu">  
  <div><span><button value='' id="btnclick1" class="btnclick1" ><img src="<?php echo ($staticPath); echo ($bottom[1]['bottom_icon']); ?>" width="20" height="20" /><br />
	<?php echo (mb_substr($bottom[1]['bottom_name'],0,5,'utf-8')); ?></button></span></div>  </div><?php endif; ?>
<?php if($bottom[2]['hide'] == 1): ?><div id="foot_bu">  
<div><span><button value='' id="btnclick" class="btnclick" onclick="btnclick()"><img src="<?php echo ($staticPath); echo ($bottom[2]['bottom_icon']); ?>" width="20" height="20"/><br />
<?php echo (mb_substr($bottom[2]['bottom_name'],0,5,'utf-8')); ?></button></span></div>  </div><?php endif; ?>
<?php if($bottom[3]['hide'] == 1): ?><div id="foot_bu">   
<div><span><button value='' id="btnclick4" class="btnclick4" ><img src="<?php echo ($staticPath); echo ($bottom[3]['bottom_icon']); ?>" width="20" height="20" /><br />
<?php echo (mb_substr($bottom[3]['bottom_name'],0,5,'utf-8')); ?></button></span></div></div><?php endif; ?>
</div>
</div>
<!--搜索-->
<div class="divShow1"></div>
<div class="dis1"> 
<div class="ttop1">
<div class="txtspan1">
  <div id="sec">
	<form id="form_search" name="form1" method="post" action="<?php echo U('Voteimg/index',array('id'=>$id,'token'=>$token));?>">
	  <div  id="sec_div">
		<label for="txt"></label>
		<div  id="sec_form">
		  <input type="hidden" name="id" value="<?php echo ($id); ?>" />
		  <input type="hidden" name="token" value="<?php echo ($token); ?>" />
		  <input type="text" name="key_word" id="txt" placeholder="请输入选项标题或编号" value="" class="sec_input" style="padding-left:10%;"/>
		</div>
		<div id="sec_div2">
		  <button  id="sec_butt">
			<div id="sec_sec"><img src="<?php echo ($staticPath); ?>/tpl/static/voteimg/img/daohang_02.png" width="20" height="20" onclick="search()"/></div>&nbsp;&nbsp;搜索</button>
		  </div>
		</div>
	  </form>
	  </div>
		 <div class="button_s"><button id="cabutt" onclick="hidediv(1)">关闭</button></div>
	 </div >
   </div> 
 </div>  
 <!-- 搜索-->
<!-- 拉票-->
<div class="divShow4"></div>
<div class="dis4"> 
<div class="ttop4">
  <div class="txtspan4">
	<div id="sec1">
		<div  id="sec_div">
		  <label for="txt"></label>
		  <div id="sec_form">
			<input type="text" name="lp" id="lp" value="" placeholder="请输入选项编号进行拉票" class="sec_input" style="padding-left:10%;"/>
		  </div>
		  <div id="sec_div2">
			<button  id="sec_butt1" onclick="lpclick()">
			  <div id="sec_sec"><img src="<?php echo ($staticPath); ?>/tpl/static/voteimg/img/daohang_04.png" width="20" height="20"/></div>&nbsp;&nbsp;拉票</button>
			</div>
		  </div></div>
			<div class="button_s"><button id="cabutt" onclick="hidediv(4)">关闭</button></div>
	   </div >
	 </div> 
   </div>  
   <!-- 拉票-->
<!--投票提示 -->
<!--div id="vote_notice" class="myDiv" style="display:none">投票成功</div-->
<div id="notice_vote" style="z-index:99;left:58%;top: 30%;width:250px;height:40px; line-height:40px;color:#fff; font-size:18px;  border-radius: 9px;  background-color: #2dcc70;  margin: 0 auto; text-align:center; font-family:'微软雅黑';margin-left:-150px!important;margin-top:-60px!important;margin-top:0px;position:fixed!important;display:none">投票成功</div>

<div id="no_follow" style="z-index:99;left:48%;top: 30%;width:315px;height:40px; line-height:40px;margin-left:-150px;margin-right:150px;margin-top:-60px;position:fixed;display:none"><?php echo ($memberNotice); ?></div>
<div id="bg" class="bg" style="display:none;"></div>
<!--投票时的临时记录数据-->
<input type="hidden" id="stat" value="true" />
<input type="hidden" id="last_notice" value="" />
<input type="hidden" id="last_id" value="" />
</body>
</html>
<script>
//计算高宽
window.onload=function(){
var alii = document.getElementsByTagName('ol'); 
var aHeighti={L:[],C:[],R:[]}; 
 var h1=document.body.scrollWidth;
 var hee=h1*0.038;
for(var i = 0;i<alii.length;i++){ 
	var iNowi=i%2; 
	switch(iNowi){ 
		case 0: 
			alii[i].style.left='1%'; 
			aHeighti.L.push(alii[i].offsetHeight); 
			var step=Math.floor(i/2); 
			if(!step){ 
				alii[i].style.top=0; 
			}else{ 
				var sum=0; 
				for(var j=0;j<step;j++){ 
					sum+=aHeighti.L[j]+hee; 
				} 
				alii[i].style.top=sum+'px'; 
			} 
			break; 
	case 1: 
			alii[i].style.left='52%'; 
			aHeighti.C.push(alii[i].offsetHeight); 
			var step=Math.floor(i/2); 
			if(!step){ 
				alii[i].style.top=0; 
			}else{ 
				var sum=0; 
				for(var j=0;j<step;j++){ 
					sum+=aHeighti.C[j]+hee; 
				} 
				alii[i].style.top=sum+'px'; 
			} 
				break;  
			}
		//计算分页的位置
		if(i == alii.length - 1){
			var prev_top = alii[i-1].style.top;
			var prev_height = alii[i-1];
			var h = $(prev_height).height();
			//取分页上一个ol的高度
			var top = prev_top.substring(0,prev_top.length-2);
			top = parseInt(top);
			//投票选项超过1个,分页也是ol标签不算一个
			if(alii.length > 2){
				var prev_top_1 = alii[i-2].style.top;
				var prev_height_1 = alii[i-2];
				var h1 = $(prev_height_1).height();
				var top1 = prev_top_1.substring(0,prev_top_1.length-2);
				top1 = parseInt(top1);
			//投票选项只有一个
			}else{
				var top1 = alii[i].style.top;
				var top1 = top1.substring(0,top1.length-2);
				var ph = alii[i];
				var h1 = $(ph).height();
			}
			if(top == top1){
				he = h1 > h ? h1 : h;
				alii[i].style.top = (top+parseInt(he)+30)+'px';
			}else if(top+parseInt(h) > top1+parseInt(h1)){
				alii[i].style.top = (top+parseInt(h)+30)+'px';
			}else if(top+parseInt(h) < top1+parseInt(h1)){
				alii[i].style.top = (top1+parseInt(h1)+30)+'px';
			}
			alii[i].style.left = '1%';
		}
	}
}
</script>
<script src="<?php echo ($staticPath); ?>/tpl/static/voteimg/js/swipe.js"></script> 
  <script type="text/javascript">
  var bullets = document.getElementById('position').getElementsByTagName('li');
  var banner = Swipe(document.getElementById('mySwipe'), {
	auto: 2000,
	continuous: true,
	disableScroll:false,
	callback: function(pos) {
	  var i = bullets.length;
	  while (i--) {
		bullets[i].className = ' ';
	  }
	  bullets[pos].className = 'cur';
	}
  });
  </script>
<script type="text/javascript">
//活动介绍我的投票展开收缩效果
$(function(){
　　$('.jiajian').click(function(){
		var index=$('.jiajian').index(this);
	　　$(this).toggleClass('jianjian');
		$('.qiehuan_s').eq(index).toggle();
	})
});
//我的投票记录
$(function(){
	$.get("/index.php?g=Wap&m=Voteimg&a=vote_record&id=<?php echo ($id); ?>&token=<?php echo ($token); ?>",function(content){
		$("#vote_record").html(content);
	});
});
//异步请求统计信息
$(function(){
	$.get("/index.php?g=Wap&m=Voteimg&a=stat_info&id=<?php echo ($id); ?>&token=<?php echo ($token); ?>",function(json_data){
		obj = eval("("+json_data+")");
		item_count = obj.item_count ? obj.item_count : 0;
		voted_count = obj.voted_count ? obj.voted_count : 0;
		visit_count = obj.visit_count ? obj.visit_count : 0;
		$("#main_a").text(item_count);
		$("#main_b").text(voted_count);
		$("#main_c").text(visit_count);				

	});
});
//提示信息
function votenotice(text,time){
	var t = arguments[1] ? arguments[1] : 2000;
	$("#notice_vote").text(text);
	$("#notice_vote").show();
	$("#bg").show();
	$("#notice_vote").delay(t).hide(1);
	$("#bg").delay(t).hide(1);
}
//投票
function vote(id,obj){
var stat = $("#stat").val();
var last_id = $("#last_id").val();
if(last_id == id && stat == 'false'){
	votenotice($("#last_notice").val());
}else{
	var msg = '';
	$.ajax({
	  type: 'GET',
	  async: true,
	  url: '/index.php?g=Wap&m=Voteimg&a=vote&vote_id=<?php echo ($id); ?>&token=<?php echo ($token); ?>&id='+id,
	  beforeSend: function(){ 
	    $(obj).attr("disabled","disabled");
		$(".content_piao_"+id).prev().children().text('投票中');
	  },
	  success: function(info){
		var data = eval('('+info+')');
		if(data.status == 'done'){
			if(data.data.left_vote_day == ''){
				msg = '投票成功';
			}else{
				msg = '投票成功,今日还可以投'+data.data.left_vote_day+'票';
			}
			var vid = $(".content_piao_"+id).text();
			var total_count = $("#main_b").text();
			$(".content_piao_"+id).text((parseInt(vid)+1)+'票');
			$("#main_b").text((parseInt(total_count)+1));
			votenotice(msg);
			$("#stat").val('true');
			$("#last_id").val(id);
		}else{
			$("#stat").val('false');
			$("#last_notice").val(data.data);
			$("#last_id").val(id);
			votenotice(data.data);
		}
	  },
	  complete: function(){
		$(obj).removeAttr("disabled");
		$(".content_piao_"+id).prev().children().text('投票');
	 }
	});
}
}
//锚点
function anchor(){
	$("#TopTipHolder").show();
	if($("#TopTipHolder").css('height') == '0px'){
		$("#TopTipClose").click();//执行关闭
		$("#TopTipHolder").css('height','35px');//弹出
	}
}
function anchor_follow(){
	$("#fly_page").show();
}
function wait_vote(){
	var msg = '';
	var vote_date = '<?php echo ($vote_date); ?>';
	if(vote_date == 'wait'){
		msg= '投票活动还未开始';
	}else if(vote_date == 'over'){
		msg = '投票活动已结束';
	}
	votenotice(msg);
}
//隐藏提醒关注注册弹框
$(".close").click(function(){
	$("#no_follow").hide();
	$("#bg").hide();
});
//隐藏
function hidediv(id){
	if(id == 0){
		$('.dis').hide();
		$('.divShow').hide();
	}
	$('.dis'+id).hide();
	$('.divShow'+id).removeClass('show1');
	$('.divShow'+id).css('height',0);
	$('.divShow'+id).css('width',0);
}
//排行
function btnclick(){
	window.location.href = "/index.php?g=Wap&m=Voteimg&a=vote_record&id=<?php echo ($id); ?>&token=<?php echo ($token); ?>&type=ranking";
}
//搜索
function search(){
	$("#form_search").submit();
}
//拉票
function lpclick(){
	var lp = $("#lp").val();
	lp = $.trim(lp);
	if(lp == ""){
		alert('编号或名称不能为空');
		return false;
	}
	var jump_url = '/index.php?g=Wap&m=Voteimg&a=popup_view&id=<?php echo ($id); ?>&token=<?php echo ($token); ?>&key_word='+lp;
	window.location.href = jump_url;
}
function change(type){
	var t = type ? type : 'new';
	window.location.href = "/index.php?g=Wap&m=Voteimg&a=index&id=<?php echo ($id); ?>&token=<?php echo ($token); ?>&type="+t;
}
//最新和全部切换
$(function(){
	var type = '<?php echo ($type); ?>' ? '<?php echo ($type); ?>' : 'new';
	if(type == 'new'){
		$("#new").addClass('hover');
		$("#all").removeClass('hover');
	}else{
		$("#all").addClass('hover');
		$("#new").removeClass('hover');
	}
});
//底部导航宽度自适应
$(function(){
	var foot_bu = $('#c_foot').children('#foot_bu');
	var len   = foot_bu.length;
	if(len == 1){
		foot_bu.each(function(){
			$(this).css("width","100%");
		});
	}else if(len == 2){
		foot_bu.each(function(){
			$(this).css("width","50%");
		});
	}else if(len == 3){
		foot_bu.each(function(){
			$(this).css("width","33%");
		});
	}else{
		foot_bu.each(function(){
			$(this).css("width","25%");
		});
	}
});

//报名判断
function apply(){
	var allow_apply = '<?php echo ($allow_apply); ?>';
	if(allow_apply == ""){
		window.location.href='/index.php?g=Wap&m=Voteimg&a=apply&id=<?php echo ($id); ?>&token=<?php echo ($token); ?>';
	}else{
		if(allow_apply == 'over'){
			alert('报名已截止');
		}else if(allow_apply == 'wait'){
			alert('报名未开始');
		}else if(allow_apply == 'exists'){
			alert('您已经报过名');
		}
	}
}

//刷新票数
function refresh_count(){
	var refresh_vote_count = GetCookie('refresh_vote_<?php echo ($id); ?>');
	if(refresh_vote_count == 1 && refresh_vote_count != 'null'){
		SetCookie('refresh_vote_<?php echo ($id); ?>',0);
		window.location.reload();
	}
}
$(function(){
	window.setInterval(refresh_count, 300); 
});
</script>
<script>
window.shareData = {  
	"moduleName":"Voteimg",
	"moduleID":"<?php echo ($id); ?>",
	"imgUrl": "<?php echo ($imgUrl); ?>", 
	"timeLineLink": "<?php echo ($f_siteUrl); echo U('Voteimg/index',array('token'=>$token,'id'=>$id));?>",
	"sendFriendLink": "<?php echo ($f_siteUrl); echo U('Voteimg/index',array('token'=>$token,'id'=>$id));?>",
	"weiboLink": "<?php echo ($f_siteUrl); echo U('Voteimg/index',array('token'=>$token,'id'=>$id));?>",
	"tTitle": "<?php echo (sharefilter($action_info['action_name'])); ?>",
	"tContent": "<?php echo (sharefilter($action_info['action_name'])); ?>",
	"fTitle": "<?php echo (sharefilter($action_info['action_name'])); ?>",
};
</script>
<?php echo ($shareScript); ?>