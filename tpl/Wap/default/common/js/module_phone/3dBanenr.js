"use strict";
/**
 * 2012.09.30
 * 手机端的命名需要全部依赖 
 * 比如UC浏览器是无法获取 jsPath的
 */
define(som.config.basePath + 'module_phone/3dBanenr.js', ['jmquery', 'ease', 'cache', 'js/module_phone/imgLoad.js'], function(require, exports){
	//依赖
	var $ = require('jmquery'),
		easeing = require('ease'),
		cache = require('cache'),
		imgLoad = require('js/module_phone/imgLoad.js');
	//banner主函数
	function action(id, imgList, imgLink, callback){
		var main = $(id),
	        WIN = cache.WIN,
	        BODY = cache.BODY,
	        sDOC = $(cache.DOC),
	        winWidth = main.width(),
	        guid = 0;
	    main.css({
	        'width': winWidth+'px',
	        'height': Math.floor(winWidth/2)+'px'
	    });
	    //布局
	    var num = imgList.length,
	        max = num + 2,
	        //li最大多少百分比
	        //maxLi = 100/max,
	        maxLi = winWidth,
	        maxUl = maxLi*max,
	        str = '',
	        i;
	    //确保第一个在num计数内
	    guid = guid % num;
	    //设置ul
	    str += '<ul class="fn-clear" style="left:'+(guid+1)*-winWidth+'px;width:'+maxUl+'px">';
	    //把最后的放到开头 设置旋转当前 0 100% 0 0, 当前个的前面设置成 -90deg 0 0 0, 后面设置成 90deg 0 0 0
	    str += '<li style="width:'+winWidth+'px"><a href="'+imgLink[num-1]+'"><img src="'+imgList[num-1]+'" style="transform:perspective(1000px) rotateY(-90deg);transform-origin:100% 0 0;"/></a></li>';
	    //中间的
	    for(i = 0; i < num; i++){
	        if(i < guid){
	            str += '<li style="width:'+winWidth+'px"><a href="'+imgLink[i]+'"><img src="'+imgList[i]+'" style="transform:perspective(1000px) rotateY(-90deg);transform-origin:100% 0 0;"/></a></li>';
	        }else{
	            str += '<li style="width:'+winWidth+'px"><a href="'+imgLink[i]+'"><img src="'+imgList[i]+'" style="transform:perspective(1000px) rotateY(0deg);transform-origin:0 0 0;"/></a></li>';
	        }
	    }
	    //把开头的放到最后
	    str += '<li style="width:'+winWidth+'px"><a href="'+imgLink[0]+'"><img src="'+imgList[0]+'" style="transform:perspective(1000px) rotateY(90deg);transform-origin:0 0 0;"/></li></a></ul>';
	    //解析字符串
	    main.append(str);
	    //return;
	    //初始化布局 
	    var mainUl = $(id+' ul'),
	        mainImg = $(id+' img'),
	        flagTouch = false,
	        leftFlag = true,
	        timeoutId;
	        guid++;
	    callback && callback(guid - 1);
	    //如果只有一张的话
	    if(imgLink.length <= 1){
	    	return;
	    }
	    //当前一个
	    var ease = easeing([0, 90, 0], [-90, 0, 0], 1000, 'easeInOutExpo').on('all', function(a){
	    		flagTouch = true;
	            var thisKey = leftFlag ? guid-1 : guid,
	                nextKey = leftFlag ? guid : guid+1;
	            //
	            mainImg.eq(thisKey).css({
	                'transform':'perspective(1000px) rotateY('+a[0]+'deg)',
	                'transform-origin':'100% 0 0'
	            });
	            //
	            mainImg.eq(nextKey).css({
	                'transform':'perspective(1000px) rotateY('+a[1]+'deg)',
	                'transform-origin':'0 0 0'
	            });
	            //
	            mainUl.css({
	                left: a[2]+'px'
	            });
	        }).on('end', function(){
	            mainImg.css({
	                'transform':'perspective(1000px) rotateY(0deg)',
	                'transform-origin':'0 0 0'
	            });
	            //
	            flagTouch = false;
	            if(guid > num){
	                guid = 1;
	                mainUl.css({
	                    left: -winWidth+'px'
	                });
	            }else if(guid <= 0){
	                guid = num;
	                mainUl.css({
	                    left:-winWidth*num+'px'
	                });
	            }
	            callback && callback(guid - 1);
	            timeoutId = setTimeout(loop, 5000);
	        })

	    //return;
	    function loop(){
	        flagTouch = true;
	        leftFlag = true;
	        guid++;
	        var left = guid*-winWidth;
	        ease.fire([0, 90, left+winWidth],[-90, 0, left]);
	    }
	    timeoutId = setTimeout(loop, 5000);

	    //事件
	    main.on('vmousedown.phoneTable', function(e){
	        clearTimeout(timeoutId);
	        if(flagTouch)
	            return;
	        var nowLeft = e.screenX,
	            newperleft = parseFloat(mainUl[0].style['left']),
	            bannerBoxWidth = main.width(),
	            perRotateY,
	            perLeft;
	        
	        sDOC.on('vmousemove.phoneTable', function(e){
	        	e.preventDefault();
	            var thisLeft = e.screenX,
	                //得到当前的滑动值
	                toLeft = thisLeft - nowLeft,
	                pre = toLeft/bannerBoxWidth;
	                //获取百分比
	            perLeft = toLeft + newperleft;
	            //移动 left
	            mainUl.css({
	                left: perLeft+'px'
	            });
	            //手指从右滑到左
	            if(toLeft < 0){
	                leftFlag = true;
	                //移动 rotateY
	                perRotateY = pre*90;
	                //当前的一个img 0 ~ -90
	                mainImg.eq(guid).css({
	                    'transform-origin': '100% 0 0',
	                    'transform': 'perspective(1000px) rotateY('+perRotateY+'deg)'
	                });
	                //当前之后的一个img 90 ~ 0
	                mainImg.eq(guid+1).css({
	                    'transform-origin': '0 0 0',
	                    'transform': 'perspective(1000px) rotateY('+(90+perRotateY)+'deg)'
	                });
	            }
	            //手指从左滑到右
	            else{
	                leftFlag = false;
	                //移动 rotateY
	                perRotateY = pre*90;
	                //当前的一个img 0 ~ 90
	                mainImg.eq(guid).css({
	                    'transform-origin': '0 0 0',
	                    'transform': 'perspective(1000px) rotateY('+perRotateY+'deg)'
	                });
	                //当前之前的一个img -90 ~ 0
	                mainImg.eq(guid-1).css({
	                    'transform-origin': '100% 0 0',
	                    'transform': 'perspective(1000px) rotateY('+(-90+perRotateY)+'deg)'
	                });
	            }
	        })

	        sDOC.on('vmouseup.phoneTable', function(e){
	            sDOC.off('vmouseup.phoneTable');
	            sDOC.off('vmousemove.phoneTable');
	            //手指从右滑到左然后松开 
	            if(leftFlag){
	                guid++;
	                //img
	                ease.fire([perRotateY, 90+perRotateY, perLeft],[-90, 0, guid*-winWidth], 1000, 'easeOutExpo');
	            }else{
	                guid--;
	                //img
	                ease.fire([perRotateY - 90, perRotateY, perLeft],[0, 90, guid*-winWidth], 1000, 'easeOutExpo');
	            }

	        });

	    })
	}

	return function(id, imgList, imgLink, callback, loadedFn){
		imgLoad({
			loaded: function(list){
				loadedFn();
				var temp = [];
				temp = temp.concat(list);
				action(id, temp, imgLink, callback);
			}
		}).fire(imgList)
	}


})