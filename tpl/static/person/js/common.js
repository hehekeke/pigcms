/*收藏代码*/
function addfavorite() 
{ 
if (document.all) 
{ 
window.external.addFavorite('http://new.dodoca.com','点点客微伙伴'); 
} 
else if (window.sidebar) 
{ 
window.sidebar.addPanel('点点客微伙伴', 'new.dodoca.com', ""); 
} 
} 

/*生成桌面图标*/
function createDesktop(sUrl,sName)
{
try
{
var fso = new ActiveXObject("Scripting.FileSystemObject");
var shell = new ActiveXObject("WScript.Shell");
var folderPath = shell.SpecialFolders("Desktop") ;//获取桌面本地桌面地址
if(!fso.FolderExists(folderPath))
{
fso.CreateFolder(folderPath);
}
if(!fso.FileExists(folderPath + "//"+sName+".lnk"))
{
//在指定的文件夹下创建名为sName的快捷方式
var shortLink = shell.CreateShortcut(folderPath + "//"+sName+".lnk"); //相应的描述信息
shortLink.Description = "shortcut for "+sName; //快捷方式指向的链接
shortLink.TargetPath = sUrl; //激活链接并且窗口最大化
shortLink.WindowStyle = 3;
shortLink.Save();
alert('成功');
}
}catch(e){
alert("当前IE安全级别不允许操作！");
}
}

/*左侧二级菜单选择切换样式*/
function changeBg(link)
{
var alllinks=document.getElementById("subnav").getElementsByTagName("li");
for(var i=0;i<alllinks.length;i++){
   alllinks[i].className="default";//默认未点击时引用的样式
}
link.className="foucs";//点击切换样式
}

/*快捷链接固定层*/
$.fn.smartFloat = function () {
            var position = function (element) {
                var top = element.offset().top, pos = element.css("position");
                $(window).scroll(function () {
                    var scrolls = $(this).scrollTop();
                    if (scrolls > top) {
                        if (window.XMLHttpRequest) {
                            element.css({ position: "fixed", top: 0 });
                        } else {
                            element.css({ top: scrolls });
                        }
                    } else {
                        //element.css({position: pos,top: top});	
                        element.removeAttr("style");
                    }
                });
            };
            return $(this).each(function () {
                position($(this));
            });
        };
        //绑定
        $("#qlink").smartFloat();

/*新闻滚动样式*/
function ScrollText(content, btnPrevious, btnNext, autoStart) {
  this.Delay = 10;
  this.LineHeight = 20;
  this.Amount = 1; //注意:LineHeight一定要能整除Amount.
  this.Direction = "up";
  this.Timeout = 3000;
  this.ScrollContent = this.$(content);
  this.ScrollContent.innerHTML += this.ScrollContent.innerHTML;
  //this.ScrollContent.scrollTop = 0;
  if (btnNext) {
    this.NextButton = this.$(btnNext);
    this.NextButton.onclick = this.GetFunction(this, "Next");
    this.NextButton.onmouseover = this.GetFunction(this, "Stop");
    this.NextButton.onmouseout = this.GetFunction(this, "Start");
  }
  if (btnPrevious) {
    this.PreviousButton = this.$(btnPrevious);
    this.PreviousButton.onclick = this.GetFunction(this, "Previous");
    this.PreviousButton.onmouseover = this.GetFunction(this, "Stop");
    this.PreviousButton.onmouseout = this.GetFunction(this, "Start");
  }
  this.ScrollContent.onmouseover = this.GetFunction(this, "Stop");
  this.ScrollContent.onmouseout = this.GetFunction(this, "Start");
  if (autoStart) {
    this.Start();
  }
}

ScrollText.prototype.$ = function(element) {
  return document.getElementById(element);
}

ScrollText.prototype.Previous = function() {
  clearTimeout(this.AutoScrollTimer);
  clearTimeout(this.ScrollTimer);
  this.Scroll("up");
}

ScrollText.prototype.Next = function() {
  clearTimeout(this.AutoScrollTimer);
  clearTimeout(this.ScrollTimer);
  this.Scroll("down");
}

ScrollText.prototype.Start = function() {
  clearTimeout(this.AutoScrollTimer);
  this.AutoScrollTimer = setTimeout(this.GetFunction(this, "AutoScroll"), this.Timeout);
}

ScrollText.prototype.Stop = function() {
  clearTimeout(this.ScrollTimer);
  clearTimeout(this.AutoScrollTimer);
}

ScrollText.prototype.AutoScroll = function() {
  if (this.Direction == "up") {
    if (parseInt(this.ScrollContent.scrollTop) >= parseInt(this.ScrollContent.scrollHeight) / 2) {
      this.ScrollContent.scrollTop = 0;
    }
    this.ScrollContent.scrollTop += this.Amount;
  } else {
    if (parseInt(this.ScrollContent.scrollTop) <= 0) {
      this.ScrollContent.scrollTop = parseInt(this.ScrollContent.scrollHeight) / 2;
    }
    this.ScrollContent.scrollTop -= this.Amount;
  }
  if (parseInt(this.ScrollContent.scrollTop) % this.LineHeight != 0) {
    this.ScrollTimer = setTimeout(this.GetFunction(this, "AutoScroll"), this.Delay);
  } else {
    this.AutoScrollTimer = setTimeout(this.GetFunction(this, "AutoScroll"), this.Timeout);
  }
}

ScrollText.prototype.Scroll = function(direction) {
  if (direction == "up") {
    if (this.ScrollContent.scrollTop == 0) {
      this.ScrollContent.scrollTop = parseInt(this.ScrollContent.scrollHeight) / 2;
    }
    this.ScrollContent.scrollTop -= this.Amount;
  } else {
    this.ScrollContent.scrollTop += this.Amount;
  }
  if (parseInt(this.ScrollContent.scrollTop) >= parseInt(this.ScrollContent.scrollHeight) / 2) {
    this.ScrollContent.scrollTop = 0;
  }
  if (parseInt(this.ScrollContent.scrollTop) % this.LineHeight != 0) {
    this.ScrollTimer = setTimeout(this.GetFunction(this, "Scroll", direction), this.Delay);
  }
}

ScrollText.prototype.GetFunction = function(variable, method, param) {
  return function() {
    variable[method](param);
  }
}


/*选择框样式*/
jQuery.fn.customInput = function(){
	return $(this).each(function(){	
		if($(this).is('[type=checkbox],[type=radio]')){
			var input = $(this);
			
			// 使用输入的ID得到相关的标签
			var label = $('label[for='+input.attr('id')+']');
			
			// 必要的浏览器不支持：hover伪类的标签
			label.hover(
				function(){ $(this).addClass('hover'); },
				function(){ $(this).removeClass('hover'); }
			);
			
			//绑定自定义事件，触发它，绑定点击，焦点，模糊事件				
			input.bind('updateState', function(){	
				input.is(':checked') ? label.addClass('checked') : label.removeClass('checked checkedHover checkedFocus'); 
			})
			.trigger('updateState')
			.click(function(){ 
				label.addClass('checked');
				var showFoucus = $(this).parent().parent().children(".showFoucus");
				if(showFoucus.css("display") == "none"){
					showFoucus.show();
				}else{
					showFoucus.hide();	
				}
				
				$('input[name='+ $(this).attr('name') +']').trigger('updateState'); 
			})
			.focus(function(){ 
				label.addClass('focus'); 
				if(input.is(':checked')){  $(this).addClass('checkedFocus'); } 
			})
			.blur(function(){ label.removeClass('focus checkedFocus'); });
		}
	});
};

/*弹出层样式*/
$(function(){
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
    x_Dialog.showDialog("#layShow","#layer");
    $(".layclose").click(function(){
        x_Dialog.close();
    })

})