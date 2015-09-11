// JavaScript Document

$(document).ready(function() {
    jQuery.jqtab = function(tabtit,tabcon) {
        $(tabcon).hide();
        $(tabtit+" li:first").addClass("thistab").show();
        $(tabcon+":first").show();
        $(tabtit+" li").click(function() {

        	//给指定元素添加隐藏属性
        	var tab 	= $(this).children('a').attr('tab');
        	if(tab == 'tab3' || tab == 'tab5'){
        		var child 	= $('#'+tab+'>.element-list>.element-item').each(function(){
        			$(this).children('.content').children(":first").addClass("is_hidden");
        		});
        	}
        	
            $(tabtit+" li").removeClass("thistab");
            $(this).addClass("thistab");
            $(tabcon).hide();
            var activeTab = $(this).find("a").attr("tab");
            $("#"+activeTab).fadeIn();
            return false;
        });
        
    };
    /*调用方法如下：*/
    $.jqtab("#tabs",".tab_con");
    
});



<!--配色方案-->


		$(document).ready(function(){

		var hash=window.location.hash || "#site";

		if(hash){

			var lis=$("#nav_lis>li"),

				divs=$("#nav_uls>div");

			lis.each(function(index, v) {

				if(hash == v.getAttribute("data-hash")){

					v.className="hover";

					//.var divs = $("#nav_uls>div");

					for(var i=0,ci; ci = divs[i]; i++){

						if(index == ci.getAttribute("data-index")){

							$(ci).addClass("show");

						}else{

							$(ci).removeClass("show");

						}

					}

			

				}

			});

		}

	$("#nav_lis").on("mouseover", function(e){

			$(this).find("li").removeClass("hover");

			e.target.className = "hover";

			var index = e.target.getAttribute("data-index");

			//

			var divs = $("#nav_uls>div");

			for(var i=0,ci; ci = divs[i]; i++){

				if(index == ci.getAttribute("data-index")){

					$(ci).addClass("show");

				}else{

					$(ci).removeClass("show");

				}

			}

		});

	});
