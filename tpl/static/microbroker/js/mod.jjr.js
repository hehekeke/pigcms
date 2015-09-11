//if (navigator.userAgent.toLowerCase().match(/MicroMessenger/i) != 'micromessenger' && navigator.userAgent.toLowerCase().match(/Windows Phone/i) != 'windows phone') {
    //window.location.href = '/';
	//document.writeln('<p>此功能只能在微信浏览器中使用。</p>');
//}

KISSY.use('node,io', function(S, Node, IO) {
	var $ = Node.all;
	function loadImages(sources, callback) {
		var count = 0,
				images = {},
				imgNum = 0;
		for (src in sources) {
			imgNum++;
		}
		for (src in sources) {
			images[src] = new Image();
			images[src].onload = function() {
				if (++count >= imgNum) {
					callback(images);
				}
			}
			images[src].src = sources[src];
		}
	}
	loadImages([staticPath+'/tpl/static/microbroker/images/bg-loader.jpg', staticPath+'/tpl/static/microbroker/images/ico-logo.png', staticPath+'/tpl/static/microbroker/images/sales-bg-loader.jpg', staticPath+'/tpl/static/microbroker/images/ico-sales-logo.png', staticPath+'/tpl/static/microbroker/images/recommend-tips.png', staticPath+'/tpl/static/microbroker/images/recommend-submit.png', staticPath+'/tpl/static/microbroker/images/recommend-logo.png', staticPath+'/tpl/static/microbroker/images/icon-jjr.png', staticPath+'/tpl/static/microbroker/images/icon-prize.png', staticPath+'/tpl/static/microbroker/images/gift_11.png', staticPath+'/tpl/static/microbroker/images/gift_01.png'], function() {
		setTimeout(function() {
			$('.loader').addClass('fadeOut').hide();
			$('.user-loader').addClass('fadeOut').hide();
			$('.main-box').addClass('fadeIn');
			$('#loading-style').remove();
		}, 1000);
	});

	var REG = {
		name: /^[a-zA-Z\u4e00-\u9fa5]{2,15}$/,
		phone: /(^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$)|(^0{0,1}1[3|4|5|6|7|8|9][0-9]{9}$)/,
		wxid: /^[a-zA-Z][a-zA-Z0-9_-]{5,19}$/,
		number: /^[+\-]?\d+(\.\d+)?$/,
        idCard:/(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/
}
    var userStatus={0:'无效', 1: '新客户',2:'已跟进',3:'到访',4 :'认筹',5:'认购',6:'签约', 7:'回款',8: '导入客户'}

	//经纪人注册
	var submit_broker = $('#J_submitReg');
	var companyName = $('.company-name');
     // 姓名电话表单公用
	var name = $('#username');
	var phone = $('#phone');

	var job = $('#job');
    var password=$('#password');
	var company = $('#company');
	var agree = $('#agree');
	var DATA = {}
	var typeclass=['GSYG','WXFS','ZJGS','DLGS','HZHB','HZSP'];
	var jobtype=parseInt(S.trim(job.val()));
    if (jobtype == 3 || jobtype == 4 || jobtype == 5 || jobtype == 6) {
        companyName.show();
    } else {
        companyName.hide();
    }

	job.on('change', function() {
		jobtype=parseInt(S.trim(job.val()));
		if (jobtype == 3 || jobtype == 4 || jobtype == 5 || jobtype == 6) {
			companyName.show();
		} else {
			companyName.hide();
		}
	});
	var submit_islock=false;/**网络慢或手快者可能触发重复提交，加个锁处理**/
	submit_broker.on('click', function() {
		if(submit_islock){
		   return false;
		}else{
		  submit_islock=true;
		}
		//姓名
		if (name.length == 1) {
			var nv = S.trim(name.val());
			if (nv == '') {
				alert('姓名不能为空！');
				submit_islock=false;
				return false;
			} else if (nv.length > 15) {
				alert('姓名不能超过15个字！');
				submit_islock=false;
				return false;
			} else if (!REG.name.test(nv)) {
				alert('请填写正确的姓名！');
				submit_islock=false;
				return false;
			}
		}
		//手机
		if (phone.length == 1) {
			var pv = S.trim(phone.val());
			if (pv == '') {
				alert('手机号不能为空！');
				submit_islock=false;
				return false;
			} else if (!REG.phone.test(pv)) {
				alert('请填写正确的手机号！');
				submit_islock=false;
				return false;
			}
		}
        //密码
        if(password.length==1){
            var psw=S.trim(password.val());
            if(psw==''){
                alert('密码不能为空！');
				submit_islock=false;
                return false;
            }else if(psw.length<6 ||  psw.length>8 || !REG.number.test(psw)){
                alert('密码必须为6到8个数字！');
				submit_islock=false;
                return false;
            }
        }

		//职业
		if (job.length == 1) {
			jobtype=parseInt(S.trim(job.val()));
            var prCompany=S.trim(company.val());
			if (jobtype == 0) {
				alert('请选择您的职业');
				submit_islock=false;
				return false;
			}else if (jobtype == 3 || jobtype == 4 || jobtype == 5 || jobtype == 6) {
               if(prCompany==''){
                   alert('公司名称不能为空！');
				   submit_islock=false;
                   return false;
               }
            }
		}
		//注册协议
		if (agree.prop('checked') == false) {
			alert('请同意注册协议');
			submit_islock=false;
			return false;
		}
		var islock=false;/**网络慢或手快者可能触发重复提交，加个锁处理**/
		var rpostUrl='/index.php?g=Wap&m=MicroBroker&a=Registering&token='+Token+'&wecha_id='+Open_id+'&bid='+Bid;
		var ErrorStr=['OK','参数出错','手机号不能为空','手机号已经被注册过了','注册失败'];
		
		IO.post(rpostUrl,{phone:pv,sp:'check'},function(data) {
			var regdata={name:nv,phone:pv,password:psw,myjob:jobtype,company:prCompany,sp:'save'};
			if (data == 0 && !islock) {
				islock=true;
				IO.post(rpostUrl,regdata,function(data) {
					if (data == 0) {
						var Openid= Open_id ? Open_id :"MBK_"+Bid+"_temp"+pv;
						alert("注册成功");
						window.location.href =SiteUrl+'/index.php?g=Wap&m=MicroBroker&a=home&token='+Token+'&wecha_id='+Openid+'&bid='+Bid;
					} else {
						alert(ErrorStr[data]);
					}
					islock=false;
					submit_islock=false;
				});

			} else {
				if (data <5) {
					alert(ErrorStr[data]);
				} else {
					alert('参数有误或系统异常，请稍后重试！');
				}
				islock=false;
				submit_islock=false;
			}
		});
	});


    //经纪人登录
    var J_login = $('#J_login');
    var userpsw=$('#userpsw');
    J_login.on('click', function() {
		if (phone.length == 1) {
			var pv = S.trim(phone.val());
			if (pv == '') {
				alert('手机号不能为空！');
				return false;
			} else if (!REG.phone.test(pv)) {
				alert('请填写正确的手机号！');
				return false;
			}
			
		}
        //密码
        if(userpsw.length==1){
            var ups=S.trim(userpsw.val());
            if(ups==''){
                alert('密码不能为空！');
                return false;
            }else if(ups.length<6 ||  ups.length>8 || !REG.number.test(ups)){
                alert('密码必须为6到8个数字！');
                return false;
            }
        }

		var LoginErrorStr=['OK','参数出错','手机号必须为纯数字','用户名或密码错误'];
		var lpostUrl='/index.php?g=Wap&m=MicroBroker&a=logining&token='+Token+'&wecha_id='+Open_id+'&bid='+Bid;
        IO.post(lpostUrl,{phone:pv,password:ups}, function(data) {
            if (data == 0) {
				var Openid= Open_id ? Open_id :"MBK_"+Bid+'_temp'+pv;
               window.location.href = SiteUrl+'/index.php?g=Wap&m=MicroBroker&a=home&token='+Token+'&wecha_id='+Openid+'&bid='+Bid;
            } else {
                alert(LoginErrorStr[data]);
            }
        });
    });

    //修改密码
	var J_modifyPwd = $('#modifyPwd');
    var newpwd=$('#newpwd');
    J_modifyPwd.on('click', function() {
		if (phone.length == 1) {
			var pv = S.trim(phone.val());
			if (pv == '') {
				alert('手机号不能为空！');
				return false;
			} else if (!REG.phone.test(pv)) {
				alert('请填写正确的手机号！');
				return false;
			}
			
		}
        //密码
        if(newpwd.length==1){
            var ups=S.trim(newpwd.val());
            if(ups==''){
                alert('密码不能为空！');
                return false;
            }else if(ups.length<6 ||  ups.length>8 || !REG.number.test(ups)){
                alert('密码必须为6到8个数字！');
                return false;
            }
        }

		var LoginErrorStr=['OK','参数出错','手机号必须为纯数字','如果确认已注册，请使用注册时的微信号进行重置密码。如果没注册，请您使用先注册'];
		var lpostUrl='/index.php?g=Wap&m=MicroBroker&a=modifyPwding&token='+Token+'&wecha_id='+Open_id+'&bid='+Bid;
        IO.post(lpostUrl,{phone:pv,password:ups}, function(data) {
            if (data == 0) {
				var Openid= Open_id ? Open_id :"MBK_"+Bid+'_temp'+pv;
                window.location.href = SiteUrl+'/index.php?g=Wap&m=MicroBroker&a=login&token='+Token+'&wecha_id='+Openid+'&bid='+Bid;
            } else {
                alert(LoginErrorStr[data]);
            }
        });
    });
    //个人中心登录
    var J_login_my = $('#J_login_my');
    var username=$('#user-name');
    var userPsw=$('#user-psw');

    J_login_my.on('click', function() {
        if(username.length==1){
            var username=S.trim(username.val());
            if(username==''){
                alert('手机不能为空！');
                return false;
            }
            DATA.username=username;
        }
        //密码
        if(userPsw.length==1){
            var psw=S.trim(userPsw.val());
            if(psw==''){
                alert('密码不能为空！');
                return false;
            }else if(psw.length<6 ||  psw.length>8 || !REG.number.test(psw)){
                alert('密码必须为6到8个数字！');
                return false;
            }
            DATA.password=psw;
        }

        IO.post('/index.php?c=login', DATA, function(data) {
            if (data.status == 200) {
                location.href = data.url;
            } else {
                alert('密码错误');
            }
        }, 'json');
    });

	//我要推荐提交
	var submitRec = $('#J_submitRec');
	var floor = $('#rfloor');
	var rname = $('#rusername');
	var rphone = $('#rphone');
	//var selorderTime = $('#selorderTime');
	//var selorderTime2 = $('#selorderTime2');
    var remark = $('#remark');
	var tj_lock=false;
	submitRec.on('click', function() {
		//姓名
		if(tj_lock){
		   return false;
		}else{
		   tj_lock=true;
		}
		if (rname.length == 1) {
			var rnv = S.trim(rname.val());
			if (rnv == '') {
				alert('姓名不能为空！');
				tj_lock=false;
				return false;
			} else if (rnv.length > 15) {
				alert('姓名不能超过15个字！');
				tj_lock=false;
				return false;
			} else if (!REG.name.test(rnv)) {
				alert('请填写正确的姓名！');
				tj_lock=false;
				return false;
			}
		}
		//手机
		if (rphone.length == 1) {
			var rpv = S.trim(rphone.val());
			if (rpv == '') {
				alert('手机号不能为空！');
				tj_lock=false;
				return false;
			} else if (!REG.phone.test(rpv)) {
				alert('请填写正确的手机号！');
				tj_lock=false;
				return false;
			}
		}
		//意向楼盘
		if (floor.length == 1) {
			var rprv = S.trim(floor.val());
			if (rprv == 0) {
				alert('请选择您意向的楼盘');
				tj_lock=false;
				return false;
			}
		}
		/*
		//预约日期
		if (selorderTime.length == 1) {
			var st = S.trim(selorderTime.val());
			if (st == 0) {
				alert('请输入预约日期');
				return false;
			}
		}
		//预约时段
		if (selorderTime2.length == 1) {
			var st2 = selorderTime2.val();
			if (st2 == 0) {
				alert('请选择预约时段');
				return false;
			}
		}*/
        if (remark.length == 1) {
            var rpre = S.trim(remark.val());
            if (rpre.length > 50) {
                alert('备注不能超过50个字');
				tj_lock=false;
                return false;
            }
        }

		var tpostUrl='/index.php?g=Wap&m=MicroBroker&a=Recommending&token='+Token+'&wecha_id='+Open_id+'&bid='+Bid;
		var tjdata={clientname:rnv,cellphone:rpv,proid:rprv,remark:rpre};
		var ReErrorStr=['OK','参数出错','网络或系统异常，请稍后重试！','此人在这个项目上您已经推荐过了'];
		//请求
		IO.post(tpostUrl,tjdata, function(data) {
			if (data == 0) {
				var proitem=itemjson['s'+rprv];
				if(proitem.xmt==1){
				  $('#recommend-desc').html('如果客户成交，您将获得'+proitem.xmn+'元佣金！');
				}else if(proitem.xmt==2){
				  $('#recommend-desc').html('如果客户成交，您将获得成交总额*'+proitem.xmn+'%的佣金！');
				}else{
				  $('#recommend-desc').html('如果客户成交，您将获得佣金！');
				}
                  $('.recommend-pop').show();
                  $('.pop-bg').show();
			} else {
				alert(ReErrorStr[data]);
			}
			tj_lock=false;
		});
	});

	var dialogs = $('#dialog');
	var ad = $('.ad');
	dialogs.on('click', function() {
			ad.addClass('adshow');
	});
	ad.on('click', function() {
			ad.remove('adshow');
	});
	//保存银行卡信息
	var saveCard = $('#J_saveCard');
	var accountName=$('#bankAccount');
	var card = $('#cardCode');
	var bank = $('#bankName');

	saveCard.on('click', function() {
		//户名
        if(accountName.length==1){
            var account=S.trim(accountName.val());
            if(account==''){
                alert('户名不能为空！');
                return false;
            } else if (!REG.name.test(account)) {
				alert('请填写正确的户名！');
				return false;
			}
        }

		//银行卡号
		if (card.length == 1) {
			var num = S.trim(card.val());
			if (num == '') {
				alert('银行卡号不能为空！');
				return false;
			} else if (!REG.number.test(num)) {
				alert('请填写正确的银行号！');
				return false;
			}
		}
		//银行卡名称
		if (bank.length == 1) {
			var name = S.trim(bank.val());
			if (name == '') {
				alert('银行名称不能为空！');
				return false;
			}
		}

		var bpostUrl='/index.php?g=Wap&m=MicroBroker&a=bindCarding&token='+Token+'&wecha_id='+Open_id+'&bid='+Bid;
		//请求
		IO.post(bpostUrl,{baccount:account,bcode:num,bname:name}, function(data) {
			if (data == 0) {
				window.location.href =SiteUrl+'/index.php?g=Wap&m=MicroBroker&a=Commission&token='+Token+'&wecha_id='+Open_id+'&bid='+Bid;
			}else if(data==1){
                alert('参数出错');
            }else {
				alert(data);
			}
		});

	});



    //编辑个人资料
    var editSave=$('#J_edit_save');
    editSave.on('click',function(){
        //姓名
        if (name.length == 1) {
            var env = S.trim(name.val());
            if (env == '') {
                alert('姓名不能为空！');
                return false;
            } else if (env.length > 15) {
                alert('姓名不能超过15个字！');
                return false;
            } else if (!REG.name.test(env)) {
                alert('请填写正确的姓名！');
                return false;
            }
        }
        //手机
        if (phone.length == 1) {
            var pv = S.trim(phone.val());
            if (pv == '') {
                alert('手机号不能为空！');
                return false;
            } else if (!REG.phone.test(pv)) {
                alert('请填写正确的手机号！');
                return false;
            }
        }
       
        //职业
		if (job.length == 1) {
			jobtype=parseInt(S.trim(job.val()));
            var prCompany=S.trim(company.val());
			if (jobtype == 0) {
				alert('请选择您的职业');
				return false;
			}else if (jobtype == 3 || jobtype == 4 || jobtype == 5 || jobtype == 6) {
               if(prCompany==''){
                   alert('公司名称不能为空！');
                   return false;
               }
            }
		}
		var epostUrl='/index.php?g=Wap&m=MicroBroker&a=EidtUsering&token='+Token+'&wecha_id='+Open_id+'&bid='+Bid;
        //请求
        IO.post(epostUrl,{name:env,myjob:jobtype,phone:pv,company:prCompany},function(data){
            if(data==0){
                alert('修改成功！');
				window.location.href =SiteUrl+'/index.php?g=Wap&m=MicroBroker&a=SetUser&token='+Token+'&wecha_id='+Open_id+'&bid='+Bid;
            }else if(data==1){
                alert('参数出错');
            }else{
			   alert(data);
			}
        });
    });

    //修改自己身份
    var changMe=$('#J_SwitchIdentity');
    changMe.on('click',function(){
		var idestr=$('#toIdentity').val();
		idestr=S.trim(idestr);
		var Fdata={
		   tome:parseInt(idestr)
		};
        //姓名
        if (name.length == 1) {
            var snv = S.trim(name.val());
            if (snv == '') {
                alert('姓名不能为空！');
                return false;
            } else if (snv.length > 15) {
                alert('姓名不能超过15个字！');
                return false;
            } else if (!REG.name.test(snv)) {
                alert('请填写正确的姓名！');
                return false;
            }
			Fdata.name=snv;
        }
        //手机
        if (phone.length == 1) {
            var spv = S.trim(phone.val());
            if (spv == '') {
                alert('手机号不能为空！');
                return false;
            } else if (!REG.phone.test(spv)) {
                alert('请填写正确的手机号！');
                return false;
            }
			Fdata.phone=spv;
        }
		if(Fdata.tome==7){
		  var invitcode=$('#invitcode').val();
		  invitcode= S.trim(invitcode);
		  if(invitcode==''){
		       alert('邀请码不能为空！');
               return false;
		  }
		  Fdata.invitcode=invitcode;
		  var prCompany=S.trim(company.val());
		  if(prCompany==''){
              alert('公司名称不能为空！');
              return false;
           }
		 Fdata.company=prCompany;
		}else if(Fdata.tome==6){
		  var identitycode=$('#identitycode').val();
		  identitycode= S.trim(identitycode);
		  if(identitycode==''){
		      alert('身份证号不能为空');
              return false;
		  }
		  Fdata.identitycode=identitycode;
		}

		var spostUrl='/index.php?g=Wap&m=MicroBroker&a=Switching&token='+Token+'&wecha_id='+Open_id+'&bid='+Bid;
        //请求
        IO.post(spostUrl,Fdata,function(data){
            if(data==0){
                alert('修改成功！');
				window.location.href =SiteUrl+'/index.php?g=Wap&m=MicroBroker&a=SetUser&token='+Token+'&wecha_id='+Open_id+'&bid='+Bid;
            }else if(data==1){
                alert('参数出错');
            }else{
			   alert(data);
			}
        });
    });

    //初始化页面高度
    var v_h  = null;     //记录设备的高度

    function init_pageH(){
        var fn_h = function() {
            if(document.compatMode == 'BackCompat')
                var Node = document.body;
            else
                var Node = document.documentElement;
             return Math.max(Node.scrollHeight,Node.clientHeight);
        }
        var page_h = fn_h();

        // //设置各种模块页面的高度，扩展到整个屏幕高度
        $('.gift').height(page_h);
        $('.regift-page').height(page_h);
    };
    init_pageH(); 

    //注册有礼添加动画
    setTimeout(function(){
        $('.gift-box').addClass('animated tada');
    },200);
    setTimeout(function(){
        $('.gift-text').addClass('animated fadeInUp');
    },500);
    setTimeout(function(){
        $('.gift-open').addClass('animated fadeInDown');
    },600);
    setTimeout(function(){
        $('.gift-flash-1').addClass('animated flash');
        $('.gift-flash-2').addClass('animated flash');
        $('.gift-flash-3').addClass('animated flash');
        $('.gift-flash-4').addClass('animated flash');
        $('.gift-flash-5').addClass('animated flash');
    },1200);
    
    //打开奖品
    var gift=$('.gift-amount');
    var prize=$('.prize');
    gift.on('click',function(){
        prize.removeClass('animated zoomOut');
        prize.addClass('animated zoomInPrice');
        bg.show();
    })

    //关闭奖品
    var prizeClose=$('.prize-close');
    prizeClose.on('click',function(){
        prize.removeClass('animated zoomInPrice');
        prize.addClass('animated zoomOut');
        bg.hide();
    })

    //分享朋友圈提示
    var share=$('.J_share');
    share.on('click',function(){
        if($('.share-tips').length==0){
            $('body').append('<div class="share-tips"><a href="javascript:;" class="close">关闭</a><img src="/tpl/www/bg-guide.png" alt="" /></div>');
        }
        $('.share-tips').on('click',function(){
            $('.share-tips,.share-tips .close,.share-tips img').remove();
        });
    });

    //案场经理全选
    var checkAll=$('.checkbox-all');
    var checkOne=$('.checkbox-btn .regular-checkbox');
    checkAll.on('click',function(){
        var is_pitch=$(this).prop('checked');
        if(is_pitch){
            checkOne.each(function(){
                $(this).prop('checked',true);
            });
        }else{
            checkOne.each(function(){
                $(this).prop('checked',false);
            });
        }
    });

    //案场经理点击checkbox
    var clients=$('.checkbox-btn');
    clients.on('click',function(){
        checkAll.prop('checked',checkOne.length==checkOne.filter(':checked').length);
    });

    //置业顾问注销
    var logOut=$('.J_logout');
    var ok_delete=$('.J_ok_delete');
    var logoutBox=$('.logout-box');
    var logoutUrl = $('#logoutUrl').val();
    var uid = $('#uid').val();
    logOut.on('click',function(){
        logoutBox.show();
    });
    ok_delete.on('click',function(){
        IO.post(logoutUrl, {uid:uid}, function(data) {
            if (data.status == 200) {
                location.href = data.teamUrl;
            } else {
                alert("注销失败");
            }
        }, 'json');
    });

    //关闭置业顾问注销弹出层
    var Cons_cancel=$('.Cons_cancel');
    Cons_cancel.on('click',function(){
        logoutBox.hide();
    });

    //经纪人信息显示隐藏
    var jjrTitle=$('.jjr-title');
    var jjrHide=$('.jjr-hide');
    var iconDown=$('.icon-down-open-big');
    jjrTitle.on('click',function(){
        jjrHide.toggle();
        iconDown.toggleClass('icon-down-transform');
    });


  /*  //案场经理修改客户状态操作
    var J_save_status = $('.J_save_status');
    var cid = $('#cid').val();
    var zid = $('#zid').val();
    var statusUrl = $('#statusUrl').val();

    J_save_status.on('click', function() {
        var now_status = $('#now_status').val();
        var updated_status = $('#updated_status').val();
        var number_status = updated_status - now_status;
        if (number_status == 1) {
            var DATA = {};
            DATA.customer_id = cid;
            DATA.zid = zid;
            DATA.waid = waid;
            if (updated_status==2) { //已跟进（有意向无意向）
                DATA.status = 2;
                DATA.intent = $('#intent').val();
                //请求
                IO.post(statusUrl, DATA, function(data) {
                    if (data.status == 200) {
                        $('#now_status').val(data.now_status);
                        location.href = data.url;
                    } else {
                        alert('操作失败');
                    }
                }, 'json');
            } else if (updated_status==6) {//签约
                   DATA.intent = 1;
                   DATA.price = $('#price').val();
                   DATA.status = 6;

                   IO.post(statusUrl, DATA, function(data) {
                        if (data.status == 200) {
                            $("#now_status").val(data.now_status);
                            location.href = data.url;
                        } else {
                            alert('操作失败');
                        }
                   }, 'json');
             }else{
                var DATA = {};
                DATA.customer_id = cid;
                DATA.zid = zid;
                DATA.waid = waid;
                DATA.intent = 1;
                DATA.status = updated_status;

                IO.post(statusUrl, DATA, function(data) {
                    if (data.status == 200) {
                        $("#now_status").val(data.now_status);
                        location.href = data.url;
                    } else {
                        alert('操作失败');
                    }
                }, 'json');
            }
        } else {
            alert('请先确认上步操作')
        }
    });
*/
    //置业顾问修改客户状态操作
    var J_save_status = $('#li-kehu-Status .btn');
    var cspostUrl='/index.php?g=Wap&m=MicroBroker&a=changStatus&token='+Token+'&wecha_id='+Open_id+'&bid='+Bid;

    J_save_status.on('click', function() {
        var now_status = $('#currentStatus').val();
		    now_status=parseInt(now_status);
			tostatus=now_status+1;
		var clientid= $('#clientid').val();
		    clientid=parseInt(clientid);

            var csDATA = {
			    clientid:clientid,
				nowstatus:now_status,
				tostatus:tostatus
			};
                //请求
                IO.post(cspostUrl, csDATA, function(data) {
                    if (data.error == 0) {
						alert(data.msg);
                        window.location.reload();
                    } else {
                        alert('操作失败');
                    }
                }, 'json');
    });
});


function direct(url,frameid,isparent)
{
	url = url.replace(/&amp;/g,"&");
	if(!isparent || isparent == "" || isparent == "undefined")
	{
		if(frameid)
		{
			window.frames[frameid].location.href = url;
		}
		else
		{
			window.location.href=url;
		}
	}
	else
	{
		if(!frameid || frameid == "" || frameid == "undefined")
		{
			parent.window.location.href = url;
		}
		else
		{
			window.parent.frames[frameid].location.href = url;
		}
	}
}

//设定多长时间运行脚本
//参数 time 是时间单位是毫秒，为0时表示直接运行 大于0小于10毫秒将自动*1000
//参数 js 要运行的脚本
function eval_js(time,js)
{
	time = parseFloat(time);
	if(time < 0.01)
	{
		eval(js);
	}
	else
	{
		if(time < 10)
		{
			time = time*1000;
		}
		window.setTimeout(js,time);
	}
}

//编码网址
function url_encode(str)
{
	return transform(str);
}