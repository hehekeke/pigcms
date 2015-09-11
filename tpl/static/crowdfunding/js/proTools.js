
/* 更多展开 */
function MoreBtn(settings) {
    this.btn = settings.btn;
    this.infoMin = settings.infoMin;
    this.infoAll = settings.infoAll;
    this.infoMinClass = settings.infoMinClass || "info-min";
    this.infoAllClass = settings.infoAllClass || "info-all";
    this.packUpClass = settings.packUpClass || "btn-up";
    this.upHtml = settings.upHtml || '收起<i class="icon"></i>';
    this.defaultHtml = settings.defaultHtml || '更多<i class="icon"></i>';
    this.init();
}

MoreBtn.prototype = {
    init: function () {
        this.bindEvent();
    },
    bindEvent: function () {
        var _this = this;
        this.btn.on("tap", function () {
            console.info(1);
            //console.info($(this).hasClass(_this.packUpClass))
            if ($(this).hasClass(_this.packUpClass)) {
                _this.infoAll.hide();
                _this.infoMin.show();
                $(this).removeClass(_this.packUpClass).html(_this.defaultHtml);
            } else {
                _this.infoMin.hide();
                _this.infoAll.show();
                $(this).addClass(_this.packUpClass).html(_this.upHtml);
            }
        })
    }

}


/* 移动端轮播插件【基于zepto】*/
function WebSlider(settings) {
    this.slideHolder = settings.slideHolder; //整体容器
    this.scrollHolder = settings.scrollHolder; //滚动区域
    this.loop = settings.loop || false;
    this.autoPlay = settings.autoPlay || false;
    this.pagination = settings.pagination;  //index按钮
    this.changeTime = settings.chagneTime || 5000;
    this.currentClass = settings.currentClass; //当前index下按钮的Class
    this.init();
}
WebSlider.prototype = {
    init: function () {
        this.itemLength = this.scrollHolder.children().length; //总共几页
        if (this.itemLength <= 1) {
            this.pagination.hide();
            return false;
        }

        this.sliding = false;
        this.moveStartTime = 0;
        if (this.loop) {
            var originHtml = this.scrollHolder.html();
            this.scrollHolder.html(originHtml + originHtml);
            this.currentIndex = this.itemLength;  //当前页索引
        } else {
            this.currentIndex = 0;
        }
        this.realIndex = 0;   //换算后索引
        var ua = navigator.userAgent.toLowerCase();
        this.isiOS = ua.indexOf('ipad') > -1 || ua.indexOf('iphone') > -1;
        this.reset();
        this.bindEvent();
        return this;
    },
    reset: function () {
        this.itemWidth = this.slideHolder.width(); //页宽
        this.slideTimer = null;
        this.currentX = -this.itemWidth * this.currentIndex;    //当前偏移量
        var target = "translateX(" + this.currentX + "px)"
        this._animate(this.scrollHolder, target, 0);
        if (this.autoPlay)this._autoPlay();
    },
    _autoPlay: function () {
        var self = this;
        clearInterval(self.autoTimer);
        self.autoTimer = setInterval(function () {
            self.slideToCurrent("next");
        }, self.changeTime)
    },
    bindEvent: function () {
        var _this = this;
        var lastX = 0;
        var lastY = 0;
        var lastTime = 0;
        var moveX = 0;
        var startX = 0;
        var disX = 0;
        var scrollPage = false;  //是否触发了向下滚动
        var slideStart = false;//是否点击在轮播区内
        var sliding = false; //是否轮播中
        this.slideHolder
            .on("touchstart", function (e) {
                _this.moveStartTime = new Date().getTime();
                lastX = e.changedTouches[0].clientX;
                lastY = e.changedTouches[0].clientY;
                startX = e.changedTouches[0].clientX;
                _this.scrollHolder.css({"transition": "0s", "-webkit-transition": "0s"});
                clearInterval(_this.autoTimer);
                slideStart = true;
            })
        $(document)
            .on("touchmove", function (e) {
                var curTime = new Date().getTime();
                if (slideStart && !scrollPage && curTime - lastTime > 30) {
                    moveHandler(e);
                    lastTime = curTime;
                }
            }).on("touchend", function () {
                if (slideStart && sliding) {
                    _this.slideToCurrent();
                }
                slideStart = false;
                scrollPage = false;
                sliding = false;
                if(_this.autoPlay)_this._autoPlay();
            })

        $(window).on('orientationchange', function (e) {
            if (_this.isiOS) {
                _this.reset();
            } else {
                setTimeout(function () {
                    _this.reset();
                }, 500)
            }
        });
        function moveHandler(e) {
            disX = e.changedTouches[0].clientX - lastX;
            moveX = e.changedTouches[0].clientX - startX;
            disY = e.changedTouches[0].clientY - lastY;
            if ((Math.abs(disY) > Math.abs(disX)) && !scrollPage && !sliding) {   //判断初始状态是滚动页面还是轮播
                scrollPage = true;
            } else {
                sliding = true;
                e.preventDefault();
                _this.slide(disX, moveX);
                lastX = e.changedTouches[0].clientX;
            }
            lastY = e.changedTouches[0].clientY;
        }

    },
    slide: function (disX, moveX) {
        if (this.sliding)return false;
        var target = "";
        disX = this.currentX + disX;
        if (!this.loop && this.realIndex == 0 && disX > 0) {  //橡皮筋效果
            target = "translateX(" + moveX / 3 + "px)";
        } else if (!this.loop && this.realIndex == this.itemLength - 1 && disX < 0) {
            target = "translateX(" + (disX - moveX / 3 * 2) + "px)"
        } else {
            target = "translateX(" + disX + "px)"
        }
        this._animate(this.scrollHolder, target, 0);
        this.currentX = disX;
    },
    slideToCurrent: function (next) {
        var _this = this;
        if (_this.sliding)return false;
        _this.sliding = true;
        var totalMove = (this.currentX - (-this.itemWidth * this.currentIndex)) / this.itemWidth; //单次滑动的比例
        var totalMoveTime = new Date().getTime() - this.moveStartTime; //单次滑动的时间
        if (totalMove > 0.5 || (totalMoveTime < 300 && totalMove > 0)) {
            this.currentIndex = Math.max(0, this.currentIndex - 1);
        } else if (totalMove < -0.5 || (totalMoveTime < 300 && totalMove < 0) || next) {
            if (!this.loop) {
                this.currentIndex = Math.min(this.itemLength - 1, this.currentIndex + 1);
            } else {
                this.currentIndex = Math.min(this.itemLength * 2 - 1, this.currentIndex + 1);
            }
        }
        this.realIndex = this.currentIndex % this.itemLength;
        this.pagination.children().eq(this.realIndex).addClass(this.currentClass).siblings().removeClass(this.currentClass);
        this.currentX = (-this.currentIndex) * this.itemWidth;
        var target = "translateX(" + this.currentX + "px)";
        this._animate(this.scrollHolder, target, 0.3);
        clearTimeout(this.slideTimer);
        this.slideTimer = setTimeout(function () {
            _this.sliding = false;
            if (_this.currentIndex >= _this.itemLength * 2 - 1 && _this.loop) {
                _this.currentIndex = _this.itemLength - 1;
                _this.currentX = -_this.currentIndex * _this.itemWidth
                var target = "translateX(" + _this.currentX + "px)";
                _this._animate(_this.scrollHolder, target, 0);
            } else if (_this.currentIndex <= 0 && _this.loop) {
                _this.currentIndex = _this.itemLength;
                _this.currentX = -_this.itemWidth * _this.itemLength;
                var target = "translateX(-" + _this.currentX + "px)";
                _this._animate(_this.scrollHolder, target, 0);
            }
        }, 300);
    },
    _animate: function (obj, target, time) {
        obj.css({"transition": time + "s", "-webkit-transition": time + "s", "transform": target, "-webkit-transform": target, "transition-timing-function": "ease-out", "-webkit-transition-timing-function": "ease-out"});
        return obj;
    }
}

/* 回到顶部  */
function goToTop(topBtn) {
    var goTopTimer;
    topBtn.on("touchend", function () {
        goTopTimer = setInterval(function () {
            var sclTop = $(window).scrollTop();
            $(window).scrollTop(sclTop * 0.9);
            console.log(sclTop)
            if ($(window).scrollTop() <= 0) {
                clearInterval(goTopTimer);
                $(window).scrollTop(0);
            }
        }, 20);
    });
    $(document).on('touchstart', function () {
        clearInterval(goTopTimer);
    })

}


/* 页面滑动 跳转页面 */
function Scrollhref(opt) {
    this.Obj = opt.Obj;
    this.direction = opt.direction || 'left';
    this.ahref = opt.ahref;

    this.init();
}

Scrollhref.prototype = {
    init: function () {
        this.bindEvent();
        return this
    },
    bindEvent: function () {
        var that = this;
        var startX = 0,
            startY = 0,
            moveX = 0,
            moveY = 0,
            preX = 0;
        var frame = 0;
        var isPageScroll = false;
        var isPageSlide = false;
        var needExchange = false;
        var touchstart = false;
        this.Obj.on("touchstart", function (ev) {
            startX = preX = ev.changedTouches[0].clientX;
            startY = ev.changedTouches[0].clientY;
            touchstart = true;
        });
        $(document).on("touchmove", function (ev) {
            frame++;
            if (frame > 2) {
                if (isPageSlide && touchstart) {
                    ev.preventDefault();
                    moveX = ev.changedTouches[0].clientX - preX;
                    if (that.direction == "left") {
                        if (moveX < 0 && isPageSlide) {
                            that.pgTransform(".3", "-50");
                            needExchange = true;
                        }
                        if (moveX > 0 && isPageSlide) {
                            that.pgTransform(".1", "0");
                            needExchange = false;
                        }
                    } else if (that.direction == "right") {
                        if (moveX > 0 && isPageSlide) {
                            that.pgTransform(".3", "50");
                            needExchange = true;
                        }
                        if (moveX < 0 && isPageSlide) {
                            that.pgTransform(".1", "0");
                            needExchange = false;
                        }
                    }
                    preX = ev.changedTouches[0].clientX;
                } else {
                    moveY = ev.changedTouches[0].clientY - startY;
                    moveX = ev.changedTouches[0].clientX - startX;
                    preX = ev.changedTouches[0].clientX;
                    if (Math.abs(moveX) > Math.abs(moveY * 2)) {
                        isPageSlide = isPageSlide || true;
                        ev.preventDefault();
                    } else {
                        isPageScroll = true;
                    }
                }

                frame = 0;
            }
        });
        $(document).on("touchend", function (ev) {
            if (needExchange) {
                that.Obj.removeAttr("style");
                window.location.href = that.ahref;
            }
            isPageScroll = false;
            isPageSlide = false;
            needExchange = false;
            touchstart = false;
        });
        return that;
    },
    pgTransform: function (time, val) {
        var that = this;
        that.Obj.css({"transition": time + "s", "-webkit-transition": time + "s", "transform": "translateX(" + val + "px)", "-webkit-transform": "translateX(" + val + "px)", "transition-timing-function": "ease-out", "-webkit-transition-timing-function": "ease-out"});
    }
}

/*格式化日期*/
Date.prototype.Format = function (fmt) { //author: meizz
    var o = {
        "M+": this.getMonth() + 1, //月份
        "d+": this.getDate(), //日
        "h+": this.getHours(), //小时
        "m+": this.getMinutes(), //分
        "s+": this.getSeconds(), //秒
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度
        "S": this.getMilliseconds() //毫秒
    };
    if (/(y+)/.test(fmt))
        fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt))
            fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}


/**==============================================================
 2.页面功能组件模块（高耦合）
 ==============================================================**/

/* 评论组件 */
function Comment(settings) {
    this.cmtBox = settings.cmtBox;
    this.sendCallback = settings.sendCallback;
    this.hideAry = settings.hideAry;
    this.loginFn = settings.loginFn || "";
    this.isLogin = settings.isLogin || false;
    this.checkCont = settings.checkCont || function (_str) {
        if (_str.replace(/\s/g, "")) {
            return true;
        } else {
            return false;
        }
    }
    this.warnning = settings.warnning;
    this.init().bindEvent();
}

Comment.prototype = {
    init: function () {
        this.$textArea = this.cmtBox.find(".cmtTextArea");
        this.$cmtBtn = this.cmtBox.find(".cmt-btn");
        this.$closeBtn = this.cmtBox.find(".close");
        this.$sendBtn = this.cmtBox.find(".btn-send");
        return this;
    },
    bindEvent: function () {
        var _this = this;
        this.$textArea.on("focus", function () {
            _this.comment();
        })

        this.$cmtBtn.on("tap", function (e) {
            _this.comment();
        })

        this.$closeBtn.on("touchend", function (e) {
            e.preventDefault();
            _this.reset();
        })

        this.$textArea.on("input", function () {
            if ($(this).val().replace(/\s/g, "")) {
                _this.$sendBtn.addClass("highlighted");
            } else {
                _this.$sendBtn.removeClass("highlighted");
            }
        })

        this.$sendBtn.on("touchend", function (e) {
            e.preventDefault();
            if (_this.checkCont(_this.$textArea.val())) {
                _this.sendCallback && _this.sendCallback();
            } else {
                _this.warnning();
            }
        })
    },
    reset: function () {
        this.$textArea.val("").blur();
        this.$sendBtn.removeClass("highlighted");
        for (var i = 0; i < this.hideAry.length; i++) {
            this.hideAry[i].show();
        }
        $("body").removeClass("htmlLock");
        $("html").removeClass("htmlLock");
        this.cmtBox.removeClass("focus");
    },
    comment: function () {
        if (this.isLogin) {
            for (var i = 0; i < this.hideAry.length; i++) {
                this.hideAry[i].hide();
            }
            $("body").addClass("htmlLock");
            $("html").addClass("htmlLock");
            this.cmtBox.addClass("focus");
            this.$textArea.focus();
        } else {
            this.$textArea.blur();
            this.loginFn && this.loginFn();
        }
    }
}


/* 文件上传预览图 */
function FileLoad(settings) {
    this.input = settings.input;
    this.imgView = settings.imgView;
    this.delBtn = settings.delBtn;
    this.init();
}
var image_base64="";
var image_name="";
FileLoad.prototype = {
    init: function () {
        var _this = this;
        if (typeof(FileReader) === 'undefined') {

        } else {
            this.input.on("change", function () {
                _this.readFile.call(_this);
            });
        }

        _this.delBtn.on("click", function (e) {
            _this.imgView.html("");
            _this.input.val("");
            image_name="";
            image_base64="";
            $(this).hide();
        })
    },
    readFile: function () {
        var _this = this;
        var file = this.input[0].files[0];
        if(file.size>3145728){
            //alertWarning('请上传小于3M的图片','top');
            alert('请上传小于3M的图片');
            $("#fileInput").val("");
            return false;
        }
        image_name=file.name;
        var fileType = file.type;
        if (fileType && !/image\/\w+/.test(fileType)) {
            alert("请上传图片文件");
            return false;
        }

        var $img = new Image();
        var url = webkitURL.createObjectURL(file);
        $img.onload = function() {
            //生成比例
            var width = $img.width;
            var height = $img.height;
            if (width>height){
                if (width>600){
                    height = height * (600/width);
                    width = parseInt(600);
                }
            }else if (height > width){
                if (height > 600){
                    width = width * (600/height);
                    height = parseInt(600);
                }
            }else {
                if (width >600){
                    width = parseInt(600);
                    height = parseInt(600);
                }
            }
            //生成canvas
            var $canvas =  document.createElement('canvas');
            var ctx = $canvas.getContext('2d');
            $canvas.width= width;
            $canvas.height = height;
            ctx.drawImage($img, 0, 0, width, height);
            image_base64 = $canvas.toDataURL('image/png',0.3);
            image_base64=encodeURIComponent(image_base64);
            _this.imgView.html('<img src="'+url+'"/>');
            _this.delBtn.show();
        }
        $img.src = url;
    }
}

//加载中
function alertLoading(txt) {
    var _txt = txt || '加载中...';
    var loadingHtml = '<div class="abs-mm" style="color:#fff">' + txt + '</div>'
    var loadingBox = createDiv('div-mask', loadingHtml);
    return  loadingBox;
}

/*弹出提示层*/
//示例
// alertWarning('您输入的手机验证码错误，请重新输入');
// alertWarning('<img src="css/i/icon.png" alt=""/>开通成功','top','7.15rem');
//type的值为top，mid
function alertWarning(text, type, maxWidth) {
    $(".warningBox").remove();
    switch (type) {
        case "top":
            var warningBox = createDiv("warningBox fixTop", text);
            break;
        case "mid":
            var warningBox = createDiv("warningBox fixMid", text);
            break;
        default :
            var warningBox = createDiv("warningBox fixMid", text);
            break;
    }
    if (maxWidth)warningBox.style.maxWidth = maxWidth;
    $(warningBox).addClass("fadeOut")
    warningBox.addEventListener("webkitAnimationEnd", function () {
        $(this).remove();
    })
}
//加载中
function alertLoading(txt) {
    var _txt = txt || '加载中...';
    var loadingHtml = '<div class="abs-mm" style="color:#fff">' + txt + '</div>>'
    var loadingBox = createDiv('div-mask', loadingHtml);

    return  loadingBox;
}

//创建div
function createDiv(className, innerHTML) {
    var oDiv = document.createElement("div");
    oDiv.className = className;
    if (innerHTML) {
        oDiv.innerHTML = innerHTML
    }
    document.body.appendChild(oDiv);
    return oDiv;
}


//input框清空
function clearCompoment($input) {
    $input.each(function () {
        var _this = $(this);
        var clearBtn = $(this).siblings(".clear-btn");
        clearBtn.on("touchstart", function () {
            clearBtn.hide();
            _this.val("").focus();
        })

        $(this).on("input", function () {
            if ($(this).val()) {
                clearBtn.show();
            } else {
                clearBtn.hide();
            }
        })
    })
}


/*下拉刷新(目前只能支持全屏幕)*/
function PullToRequest(loadFn, beforeLoadFn) {
    this.pullIng = false;
    this.needLoading = false;
    this.beforeLoadFn = beforeLoadFn || "";
    this.loading = false;
    this.loadFn = loadFn || "";
    this.init();
}



PullToRequest.prototype = {
    init: function () {
        this.bindEvent();
    },
    bindEvent: function () {
        var _this = this;
        var startY = 0;
        var scrollTop = 0;
        var disY = 0;
        var moveTimer = null;

        function endFn() {
            if (_this.pullIng && _this.needLoading) {
                _this.loading = true;
                _this.loadFn && _this.loadFn();
            }
            startY = 0;
            disY = 0;
            scrollTop = 0;
            _this.pullIng = false;
            _this.needLoading = false
        }

        $(document).on("touchstart", function (e) {
            if (($(document).height() - ($(window).scrollTop() + $(window).height())) <= 5 && !_this.loading && !_this.pullIng) {
                _this.pullIng = true;
                startY = e.changedTouches[0].clientY;
                scrollTop = $(window).scrollTop();
            }
        })

        $(document).on("touchmove", function (e) {
                if (_this.pullIng) {
                    disY = startY - e.changedTouches[0].clientY;
                    if (disY > 0) {
                        if (_this.beforeLoadFn && !_this.loading) {
                            _this.beforeLoadFn();
                        } else {
                            _this.needLoading = true;
                        }
                    }
                    clearTimeout(moveTimer);
                    moveTimer = setTimeout(function () {
                        if (disY > 50) {
                            endFn();
                        }
                    }, 300)
                }
            }
        )

        $(document).on("touchend", function () {
            clearTimeout(moveTimer);
            endFn();
        })
    }
}

/**
 * 日期选择控件
 */

function DatePlugn(settings) {
    this.$input = settings.$input;  //输入框
    this.$reduceBtn = settings.$reduceBtn; //减少按钮
    this.$addBtn = settings.$addBtn;  //增加按钮
    this.$dateTitle = settings.$dateTitle; //标题
    this.$confirm = settings.$confirm;
    this.maxDay = settings.maxDay;
    this.inputCallBack = settings.inputCallBack;
    this.submitFn = settings.submitFn;
    this.init();
}

DatePlugn.prototype = {
    init: function () {
        this.currentDay = 0;
        this.bindEvent();
    },
    bindEvent: function () {
        var _this = this;
        this.$input.on('keyup', function () {
            if (parseInt($(this).val())) {
                _this.currentDay = parseInt($(this).val());
            }else{
                _this.currentDay = 0;
            }
            _this.inputCallBack && _this.inputCallBack.call(_this, $(this).val());
        });

        this.$input.on('blur', function () {
        	var dayNum="";
        	if(parseInt($(this).val()) > 1){
                dayNum=Math.min(_this.maxDay,parseInt($(this).val()));
            }else{
                dayNum=Math.max(1,parseInt($(this).val()));
            }
            _this.currentDay=dayNum;
        	if (dayNum){
                $(this).val(dayNum + "天");
                _this.inputCallBack && _this.inputCallBack.call(_this,dayNum);
            }
        });

        this.$addBtn.on('touchstart', function () {
            _this.currentDay++;
            _this.currentDay = Math.min(_this.maxDay, _this.currentDay);
            _this.$input.val(_this.currentDay + "天");
            _this.inputCallBack && _this.inputCallBack.call(_this, _this.currentDay);
        });

        this.$reduceBtn.on('touchstart', function () {
            _this.currentDay--;
            _this.currentDay = Math.max(1, _this.currentDay);
            _this.$input.val(_this.currentDay + "天");
            _this.inputCallBack && _this.inputCallBack.call(_this, _this.currentDay);
        });

        this.$confirm.on('touchend', function (e) {
            e.preventDefault();
            _this.submitFn && _this.submitFn();
        })

    },
    computeDate: function () {
        var value = parseInt(this.$input.val());
        var _date = new Date();
        var limitDay = _date.getDate() + value;
        _date.setDate(limitDay);
        return _date.Format("yyyy-MM-dd");
    }
}

function EmojiTransform() {
    this.init();
}
EmojiTransform.prototype = {
    init: function () {
        this.emojiMap = {
            "[大哭]": "0",
            "[害羞]": "-20",
            "[憨笑]": "-40",
            "[奸笑]": "-60",
            "[可爱]": "-80",
            "[玫瑰]": "-100",
            "[难过]": "-120",
            "[太阳]": "-140",
            "[调皮]": "-160",
            "[偷笑]": "-180",
            "[吻]": "-200",
            "[握手]": "-220",
            "[疑问]": "-240",
            "[拥抱]": "-260",
            "[再见]": "-280",
            "[真棒]": "-300"
        }
    },
    change: function (text) {
        var self = this;
        var m = text.replace(/(\[[\u4e00-\u9fa5]*\w*\]){1}/g, function (emoji) {
            var value = self.emojiMap[emoji];
            if (value) {
                return '<i class="emoji-text " style="background-position: 50% ' + value + 'px"></i>';
            }
            return emoji;
        });
        return m;
    }
}

function Guide() {
    this.init();
}
Guide.prototype = {
    init: function () {
        this.currentLayer = 0;
        this.totalLayer = 2;
        this.guideHolder = $("#guideHolder");
        this.guideScroller = $("#guideScroller");
        this.navItem = $(".guide-nav-item");
        this.closeBtn = $("#guideCloseBtn");
        $("html,body").addClass("htmlLock");
        document.addEventListener("touchmove", this.moveHandler, false);
        this.bindEvent();
    },
    moveHandler: function (e) {
        e.preventDefault();
    },
    bindEvent: function () {
        var self = this;
        var startX = 0;
        var onStart = false;
        this.guideHolder.on("touchstart", function (e) {
            console.info(1);
            startX = e.changedTouches[0].clientX;
            onStart = true;
        })
        this.guideHolder.on("touchend", function (e) {
            var endX = e.changedTouches[0].clientX;
            var length = endX - startX;
            if (Math.abs(length) > 50 && length > 0) {
                self.changeLayer("prev");
            } else if (Math.abs(length) > 50 && length < 0) {
                self.changeLayer("next")
            }
        })
        this.closeBtn.on("touchend", function (e) {
            e.preventDefault();
            self.destroy();
        })

    },
    changeLayer: function (type) {
        var width=$(window).width();
        if (type == "next") {
            this.currentLayer++;
            if (this.currentLayer > this.totalLayer)this.currentLayer = this.totalLayer;
            //this.guideScroller.css("left", -this.currentLayer * 100 + "%");
            this.guideScroller.css("-webkit-transform", "translateX(" + -this.currentLayer * width + "px)");
            this.guideScroller.css("-ms-transform", "translateX(" + -this.currentLayer * width + "px)");
            this.guideScroller.css("transform", "translateX(" + -this.currentLayer * width + "px)");
        } else {
            this.currentLayer--;
            if (this.currentLayer < 0)this.currentLayer = 0;
            //this.guideScroller.css("left", -this.currentLayer * 100 + "%");
            this.guideScroller.css("-webkit-transform", "translateX(" + -this.currentLayer * width + "px)");
            this.guideScroller.css("-ms-transform", "translateX(" + -this.currentLayer * width + "px)");
            this.guideScroller.css("transform", "translateX(" + -this.currentLayer * width + "px)");
        }
        this.navItem.eq(this.currentLayer).addClass("current").siblings().removeClass("current");
    },
    destroy: function () {
        $("html,body").removeClass("htmlLock");
        document.removeEventListener("touchmove", this.moveHandler, false);
        this.guideHolder.hide();
    }
}