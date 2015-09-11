
var global_obj={
	page_init:function(){
		$('a').each(function(){
			var url=$(this).attr('href');
			if(url && url.charAt(0)!='#' && url.indexOf('tel:')==-1 && url.indexOf('javascript:')==-1 && url.indexOf('mailto:')==-1 && url.indexOf('baidu')==-1 && url.indexOf('wxref=mp.weixin.qq.com')==-1 && window.location.href.indexOf('api.')==-1){
				/*if(url.charAt(url.length-1)=='/' || url.indexOf('?')==-1){
					$(this).attr('href', url+'?wxref=mp.weixin.qq.com');
				}else{
					$(this).attr('href', url+'&wxref=mp.weixin.qq.com');
				}*/
				if(typeof(window.PG.distributor)!='undefined'){
					$(this).attr('href',$(this).attr('href').replace(/DisOpenId=[0-9a-zA-Z\-_]*/,'')+(url.indexOf('?')==-1?'?':'&')+'DisOpenId='+window.PG.openid);
				}
			}
		});
		typeof(window.PG.share)!='undefined' && (document.title=window.PG.share.title);
		
		if(window.PG.js_sdk){
			$(window).load(function(){
				wx.config({
					appId:window.PG.js_sdk.appId,
					timestamp:window.PG.js_sdk.timestamp,
					nonceStr:window.PG.js_sdk.nonceStr,
					signature:window.PG.js_sdk.signature,
					jsApiList:['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo', 'startRecord', 'stopRecord', 'onVoiceRecordEnd', 'playVoice', 'pauseVoice', 'stopVoice', 'onVoicePlayEnd', 'uploadVoice', 'downloadVoice', 'chooseImage', 'previewImage', 'uploadImage', 'downloadImage', 'translateVoice', 'getNetworkType', 'openLocation', 'getLocation', 'hideOptionMenu', 'showOptionMenu', 'hideMenuItems', 'showMenuItems', 'hideAllNonBaseMenuItem', 'showAllNonBaseMenuItem', 'closeWindow', 'scanQRCode']
				});
				wx.ready(function(){
					typeof(window.PG.share)!='undefined' && global_obj.share_init(window.PG.share);	
				});
			});
		}
	},
	
	share_init:function(share){
		
		if(typeof(share.img_url)=='undefined' || !share.img_url){
			if(window.PG.cover){
				share.img_url=window.PG.cover;
			}else{
				share.img_url=system_obj.domain('static')+'/api/images/global/share/'+window.PG.page[1]+'.jpg';
			}
		}
		(typeof(share.link)=='undefined' || !share.link) && (share.link=window.location.href);
		(typeof(share.title)=='undefined' || !share.title) && (share.title=document.title);
		(typeof(share.desc)=='undefined' || !share.desc) && (share.desc=share.title);
		(typeof(share.trans)=='undefined' || !share.trans) && (share.trans=1);
			
		var share_res=function(share_to){
			share.share_to=share_to;
			share.do_action='action.share';
			$.post('./', share);
		}
		var url_filter=function(url){
			if(url.indexOf('?')!=-1){
				var aParams=url.substr(url.indexOf('?')+1).split('&');
				var url=url.substr(0, url.indexOf('?'));
				var reqstr='';
				var argumentslen=arguments.length;
				var argumentstr='&';
				if(argumentslen>1){
					for(var i=1; i<argumentslen; i++){
						argumentstr+=arguments[i].toString()+'&';
					}
				}
				for(i=0; i<aParams.length; i++){
					var aParam=aParams[i].split('=');
					if(aParam[0]!='' && argumentstr.indexOf('&'+aParam[0]+'&')<0){
						reqstr+=aParam[0]+'='+aParam[1]+'&';
					}
				}
				url=url+'?';
				url=reqstr.lastIndexOf('&')>0?url+reqstr.substring(0, reqstr.length-1):url;
				url=url+'&Share=1';
				return url;
			}else{
				return url+'?Share=1';
			}
		}
		
		share.link=url_filter(share.link, 'OpenId', 'Share');
		var appmessage_share={
			imgUrl:share.img_url,
			link:share.link,
			title:share.title,
			desc:share.desc,
			success:function(){share_res(0);}
		}
		var timeline_share={
			imgUrl:share.img_url,
			link:share.link,
			title:share.trans?share.desc:share.title,
			desc:share.trans?share.title:share.desc,
			success:function(){share_res(1);}
		}
		wx.onMenuShareTimeline(timeline_share);
		wx.onMenuShareAppMessage(appmessage_share);
	},
	
	share_layer:function(remove){
		if(remove==1){
			$('#global_share_layer').remove();
			return;
		}
		$('body').prepend('<div id="global_share_layer"><div></div></div>');
		$('#global_share_layer').css({
			width:'100%',
			height:'100%',
			overflow:'hidden',
			position:'fixed',
			top:0,
			left:0,
			background:'#000',
			opacity:0.8,
			'z-index':100000
		}).children('div').css({
			width:'100%',
			height:'100%',
			background:'url('+system_obj.domain('static')+'/api/images/global/share/layer.png) left top no-repeat',
			'background-size':'100% auto',
			position:'relative',
			left:0,
			top:0
		});
		$('#global_share_layer').click(function(){
			$('#global_share_layer').remove();
		});
	},
	
	attention_layer:function(remove,keyword){//提示用户关注我们
		if(keyword.indexOf('|')>-1){
			var re = new RegExp("|","g");
			var arr = keyword.match(re);
			for(var i=0;i<arr.length;i++){
				keyword=keyword.replace('|','&nbsp;');
			}
		}
		if(remove==1){
			$('#global_share_layer').remove();
			return;
		}
		$('body').prepend('<div id="global_share_layer"><div></div></div>');
		$('#global_share_layer').css({
			width:'100%',
			height:'100%',
			overflow:'hidden',
			position:'fixed',
			top:0,
			left:0,
			background:'#000',
			opacity:0.8,
			'z-index':100000
		}).children('div').css({
			width:'100%',
			height:'100%',
			background:'url('+system_obj.domain('static')+'/api/images/global/share/attention.png) left top no-repeat',
			'background-size':'100% auto',
			position:'relative',
			left:0,
			color:'#fff',
			top:0
		});
		$('#global_share_layer div').html('<div style="position:absolute; bottom:20%; width:100%; text-align:center; height:20px; font-size:18px; line-height:20px;">发送关键词<span style="color:#f00;">'+keyword+'</span>可以参加本活动</div>');
		$('#global_share_layer').click(function(){
			$('#global_share_layer').remove();
		});
	},
	
	win_alert:function(tips, handle){
		$('body').prepend('<div id="global_win_alert"><div>'+tips+'</div><h1>好</h1></div>');
		$('#global_win_alert').css({
			position:'fixed',
			left:$(window).width()/2-125,
			top:'30%',
			background:'#fff',
			border:'1px solid #ccc',
			opacity:0.95,
			width:250,
			'z-index':100000,
			'border-radius':'8px'
		}).children('div').css({
			'text-align':'center',
			padding:'30px 10px',
			'font-size':16
		}).siblings('h1').css({
			height:40,
			'line-height':'40px',
			'text-align':'center',
			'border-top':'1px solid #ddd',
			'font-weight':'bold',
			'font-size':20
		});
		$('#global_win_alert h1').click(function(){
			$('#global_win_alert').remove();
		});
		if($.isFunction(handle)){
			$('#global_win_alert h1').click(handle);
		}
	},
	
	get_sms:function(obj, do_action, phone_obj, tips){
		obj.off().click(function(){
			phone_obj.removeAttr('style');
			if(!phone_obj.val()){
				phone_obj.css('border', '1px solid red');
				phone_obj.focus();
				return false;
			}
			if(!system_obj.check_form('', $('*[format]'))){
				var self=$(this)
				self.attr('disabled', true);
				$.get('./?do_action='+do_action+'&MobilePhone='+phone_obj.val(),function(data){
					if(data.ret==1){
						var timer=setInterval('time_obj()', 1000);
						var value=obj.val();
						var time=0;
						time_obj=function(){
							if(time>=60){
								obj.val(value).attr('disabled', false);
								time=0;
								clearInterval(timer);
							}else{
								obj.val(tips+'('+(60-time)+')');
								time++;
							}
						}	
					}else{
						global_obj.win_alert(data.msg);
						self.attr('disabled', false);
					}
				},'json');
			}
		});
	}
}