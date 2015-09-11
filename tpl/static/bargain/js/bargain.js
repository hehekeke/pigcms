
var bargain_obj={
	index_ini:function(){
		$('body,html').css('background','#ff7800');
		var rata=$(window).width()/320;
		rata=rata<1?1:rata;
		$('#banner').css('height',$('#banner').height()*rata);
		if($('#banner .swiper-slide').size()>1){
			var swiper= new Swiper('.swiper-container',{loop:true,autoplayDisableOnInteraction:false,autoplay:3500});
		}
		bargain_obj.index_loading();
	},
	products_loading:function(){
		var new_load=1;
		var page=1;
		var Column=$('input[name=Column]').val();
		var Keywroks=$('input[name=Keywroks]').val();
		
		$(window).scroll(function(){
			var scroll_h=$(document).height()-$(window).height();
			if($(window).scrollTop()>=scroll_h && new_load){
				$('#loading').show();
				new_load=0;
				$.post('./','do_action=bargain.products_loading&Column='+Column+'&page='+page+'&Keywroks='+Keywroks,function(data){
					if(data.ret==1){
						var have_new=false;
						var html='';
						for(var i=0; i<data.msg.length; i++){
							if($('#products div[ProId='+data.msg[i]['ProId']+']').size()==0){
								have_new=true;
								html+='<div class="items" ProId='+data.msg[i]['ProId']+'>';
								html+='<div class="img"><a href="detail/'+data.msg[i]['ProId']+'/"><img src="'+data.msg[i]['PicPath_0']+'" alt="'+data.msg[i]['Name']+'"/></a></div>';
								html+='<div class="info">';
								html+='<div class="name"><a href="detail/'+data.msg[i]['ProId']+'/">'+data.msg[i]['Name']+'</a></div>';
								html+='<div class="desc">'+data.msg[i]['BriefDescription']+'</div>';
								html+='<div class="price"><span class="volume">销量'+data.msg[i]['Volume']+'</span>底价:<span><i>￥</i>'+data.msg[i]['Price_0']+'</span>原价:<span><i>￥</i>'+data.msg[i]['Price_1']+'</span></div>';
								html+='</div></div>';
							}
						}
						if(have_new){
							new_load=1;
							$('#products').append(html);
							page++;
						}
					}
					$('#loading').hide();
				}, 'json');
			}
		});
	},
	my_activity:function(){
		var new_load=1;
		var page=1;
		bargain_obj.server_time();
		$('#activity_list div[Working=0]').each(function(index, element){
			bargain_obj.time_down($(element).attr('Deadline'),$(element));
			$(element).attr('Working',1);
		});
		$(window).scroll(function(){
			var scroll_h=$(document).height()-$(window).height();
			if($(window).scrollTop()>=scroll_h && new_load){
				$('#loading').show();
			}
		});
	},
	
	detail_init:function(){
		var rata=$(window).width()/320;
		rata=rata<1?1:rata;
		$('.product_banner').css('height',$('.product_banner').height()*rata);
		if($('.product_banner .swiper-slide').size()>1){
			var swiper= new Swiper('.swiper-container',{loop:true,autoplayDisableOnInteraction:false,autoplay:3500});
		}
	},
	server_time:function(){
		cur_time=server_time+(new Date().getTime()-start_time)/1000;
		setTimeout(function(){bargain_obj.server_time()}, 1000);
	},
	time_down:function(time,id){
		var obj='';
		if(typeof(id)=='object'){
			obj=id;
		}else{
			obj=$(id);
		}
	
		var hour_c = obj.find('.hour');
		var minute_c = obj.find('.minute');
		var second_c = obj.find('.second');
		sys_second = (time-cur_time);
		if (sys_second > 1) {
			sys_second -= 1;
			var hour = Math.floor((sys_second / 3600));
			var minute = Math.floor((sys_second / 60) % 60);
			var second = Math.floor(sys_second % 60);
			$(hour_c).text(hour<10?"0"+hour:hour);//计算小时
			$(minute_c).text(minute<10?"0"+minute:minute);//计算分钟
			$(second_c).text(second<10?"0"+second:second);//计算秒杀
			setTimeout(function(){bargain_obj.time_down(time,id)}, 1000);
		}
	},
	activity_init:function(){
		var rata=$(window).width()/320;
		rata=rata<1?1:rata;
		$('.product_banner').css('height',$('.product_banner').height()*rata);
		if($('input[name=Deadline]').val()>0){
			bargain_obj.server_time();
			bargain_obj.time_down($('input[name=Deadline]').val(),'#countdown');	
		}
		$('input[name=help_me]').click(function(){
			global_obj.share_layer();
			return false;	
		});
		$('input[name=join]').click(function(){
			global_obj.attention_layer(0,window.attention.keyword);
			return false;	
		});
		
		$('.btn_bar li:visible').css('width',100/$('.btn_bar li:visible').size()+'%');
		$('body,html').css('background','#fff');
		$('#activity_show div.btn').click(function(){
			system_obj.div_mask(1);
			$('#activity_show').hide();
		});
		
	},
	checkout_init:function(){
		var address_display=function(){
			var AId=parseInt($('#checkout_form input[name=AId]:checked').val());
			if(AId==0 || isNaN(AId)){
				$('#checkout_form .address dl').show();
			}else{
				$('#checkout_form .address dl').hide();
			}
		}
		
		$('#checkout_form input[name=AId]').click(address_display);
		address_display();
		
		$('#checkout_form').submit(function(){return false;});
		$('#checkout_form .checkout input').click(function(){
			var AId=parseInt($('#checkout_form input[name=AId]:checked').val());
			if(AId==0 || isNaN(AId)){
				var flag=false;
				$('input[name=Name], input[name=MobilePhone]').each(function(){
					if($(this).val()==''){
						$(this).focus();
						flag=true;
						return false;
					}
				});
				if(!flag && $('input[name=Address]').size() && $('input[name=Address]').val()==''){
					$('input[name=Address]').focus();
					flag=true;
				}
				if(flag){return;}
			}
			
			$(this).attr('disabled', true);
		});
	},
	
	payment_init:function(){
		var PaymentMethod=$('#payment_form input[name=PaymentMethod]');
		if(PaymentMethod.size()){
			var change_payment_method=function(){
				if(PaymentMethod.filter(':checked').val()=='线下支付'){
					$('#payment_form .payment_info').show();
				}else{
					$('#payment_form .payment_info').hide();
				}
			}
			
			PaymentMethod.click(change_payment_method);
			PaymentMethod.filter('[value='+$('#payment_form input[name=DefautlPaymentMethod]').val()+']').click();
			change_payment_method();
		}else{
			$('#payment_form').hide();
		}
		
		$('#payment_form').submit(function(){return false;});
		$('#payment_form .payment input').click(function(){
			$(this).attr('disabled', true);
		});
	}
}