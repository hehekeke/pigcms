$(function(){
	
	// 需要清除表单缓存
	//$('#form')[0].reset(); 
	
	//初始化表单
	$('.szcjbt').hide();
	$('#res_'+$('#answertype').val()).show();
	
	//设置修改状态
	$('#czselarea').on('change', function() {
		 $("#menuid").attr('change', '1');
	});
	
	// 设置mask 检测用户修改状态
	$('.zizicd,.maincd').click(function(){
		var change = $("#menuid").attr('change');
		if('1' == change) {
			if (!confirm('数据已被修改 是否需要保存！')) {
				$("#menuid").attr('change', '0');
				$('.zizicd,.maincd').unmask();
				$(this).mask();
			} else {
				$.ajaxStop();
				return false;
			}
		} else {
			$('.zizicd,.maincd').unmask();
			$(this).mask();
		}
	});
	
	// 显示子菜单列表
	$('.maincd').on('click', function () {
		var child = '.zicaidan'+$(this).data('child');
		$(child).toggle();
		$("#menuid").data('child', child);
	});
	
	// 点击子菜单不隐藏子菜单列表
	$('.zizicd').on('click', function () {
		$("#menuid").removeData('child');
	});
	
	// 显示子菜单列表
	$('body').on('click', '.maskdivgen', function () {
		var child = $("#menuid").data('child');
		if (child) {
			$(child).toggle();
		}
	});
	
	// ajax 获取修改页面
	$('.edit-menu').on('click', function () {		
		loading('请求数据中...');
		$.ajax({
			url : $('#menuid').data('edit'),
			type : 'get',
			data : {id: $(this).data('id')},
			dataType : 'json',
			success : function (data) {
				if(200 == data.status) {
					$('#form').attr('action', data.url);
					$('#czselarea').html(data.html);
				}
				loading(false);
			},
			error : function () {
				tusi('请求数据出错。');
				loading(false);
			}
		});
	});
	
	//带值初始化
	if ($("#menuid").data('id')) {
		$("#menuid").trigger('click');
	}
	
	// 切换tab
	$('#czselarea').on('change', '#answertype', function(){
		$('.szcjbt').hide();
		$('#res_'+$(this).val()).show();
	});
	
	initMenu();
});

/**
 * 初始化菜单列表
 */
function initMenu() {
	if($('#menuid').data('count')==1) {
		 $(".caiduannum").find("tr td").eq(1).find("div").css("display" , "none");
		 $(".caiduannum").find("tr td").eq(2).find("div").css("display" , "none");
		 $(".zicaidan2").find(".zizicd").css("display" , "none");
		 $(".zicaidan3").find(".zizicd").css("display" , "none");
		 $(".maincd").css("width","271px");
		 $(".zizicd").css("width","253px");
		 $(".zicaidan1").css("left","46px");
	}

	if($('#menuid').data('count')==2) {
		 $(".caiduannum").find("tr td").eq(2).find("div").css("display" , "none");
		 $(".zicaidan3").find(".zizicd").css("display" , "none");
		 $(".maincd").css("width","135px");
		 $(".zizicd").css("width","126px"); 
		 $(".zicaidan1").css("left","46px");
		 $(".zicaidan2").css("left","173px");
	}
	
	
	if($('#menuid').data('count')==3) {
		 $(".maincd").css("width","86px");
		 $(".zizicd").css("width","83px"); 
		 $(".zicaidan1").css("left","47px");
		 $(".zicaidan2").css("left","131px");
		 $(".zicaidan3").css("left","215px");
	}
	
	
	if($('#menuid').data('count')==4) {
		 $(".maincd").css("width","65px");
		 $(".zizicd").css("width","63px"); 
		 $(".zicaidan1").css("left","45px");
		 $(".zicaidan2").css("left","109px");
		 $(".zicaidan3").css("left","173px");
		 $(".zicaidan4").css("left","237px");
	}
	$
}
