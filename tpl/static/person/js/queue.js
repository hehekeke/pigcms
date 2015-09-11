/*弹出层样式*/

	function infodialogBox(idone,idtwo,closeclass){
		 var x_Dialog ={
        /**定位弹出层*/
        	dialogBox: function(){
            var objW = $(window),
            objC = $(".layer"),
            brsW = objW.width(),
            brsH = objW.height(),
            sclL = objW.scrollLeft(),
            sclT = objW.scrollTop(),
            curW = objC.width(),
            curH = objC.height(),
            left = sclL + (brsW - curW)/2,
            top = sclT + (brsH - curH)/2;
			objC.css({"left":left,"top":top});
			},
			/**弹出层位置响应*/
			winResize:function(){
				$(window).resize(function(){
				   if(!$(".layer").is(":visible")){
					   return;
				   };
				   x_Dialog.dialogBox();
				});
			},
			close:function(){
					$(".layer").removeClass("layer").hide();
					$(".bgd").hide();
			},
			/**显示弹出层*/
			showDialog:function(btn,boxCon){
				$(btn).click(function(){
					$(boxCon).addClass("layer").show();
					x_Dialog.dialogBox();
					$(".bgd").show();
					$(".layer").css("margin-top",-(document.documentElement.scrollTop*1));
					$(".layer").css("margin-top",-(window.pageYOffset*1));		
				});
				x_Dialog.winResize();
			}
		};
		/*关闭弹出层*/
		x_Dialog.showDialog(idone,"#"+idtwo);
		$("."+closeclass).click(function(){
			x_Dialog.close();
		})
	}
	
	function infodialogBox_tc(idone,idtwo,closeclass){
		 var x_Dialog ={
        /**定位弹出层*/
        	dialogBox: function(){
            var objW = $(window),
            objC = $(".layer"),
            brsW = objW.width(),
            brsH = objW.height(),
            sclL = objW.scrollLeft(),
            sclT = objW.scrollTop(),
            curW = objC.width(),
            curH = objC.height(),
            left = sclL + (brsW - curW)/2,
            top = sclT + (brsH - curH)/2;
			objC.css({"left":left,"top":top});
			},
			/**弹出层位置响应*/
			winResize:function(){
				$(window).resize(function(){
				   if(!$(".layer").is(":visible")){
					   return;
				   };
				   x_Dialog.dialogBox();
				});
			},
			close:function(){
					$(".layer").removeClass("layer").hide();
					$(".bgd").hide();
			},
			/**显示弹出层*/
			showDialog:function(btn,boxCon){
				$(btn).click(function(){
					$(boxCon).addClass("layer").show();
					x_Dialog.dialogBox();
					$(".bgd").show();
					$(".layer").css("margin-top",-(document.documentElement.scrollTop*1));
					$(".layer").css("margin-top",-(window.pageYOffset*1));		
				});
				x_Dialog.winResize();
			}
		};
		/*关闭弹出层*/
		x_Dialog.showDialog(idone,"#"+idtwo);
		$("."+closeclass).click(function(){
			x_Dialog.close();
		})
	}

	
	function showPreview(model, id){
		$("#lay4 iframe").attr("src", "/"+model+"/goodspreview?id="+id);
	}