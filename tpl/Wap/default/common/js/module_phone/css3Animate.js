"use strict";
/**
 * 2012.09.30
 * 手机端的命名需要全部依赖
 * 比如UC浏览器是无法获取 jsPath的 
 */
define(som.config.basePath + 'module_phone/css3Animate.js', ['jmquery', 'style'], function(require, exports){
	//依赖
	var $ = require('jmquery'),
		hasCss = require('style').hasCss,
		transitionJSname = hasCss.getJsName('transition'),
		flag = !!transitionJSname;
	
	//css3动画类
	var css3Animate = function(node, opat, time, easing, callback, onbegin){
	    return this instanceof css3Animate ? this.init.apply(this, arguments) : new css3Animate(node, opat, time, easing, callback, onbegin);
	}
	css3Animate.prototype = {
	    init: function(node, opat, time, easing, callback, onbegin){
	        this.fire(node, opat, time, easing, callback, onbegin);
	    },
	    fire: function(node, opat, time, easing, callback, onbegin){
	        var self = this, nodeTemp, i, resureVar;
	        resureVar = self.resureVar;
	        //代码防御node,opat必须存在
	        if(node === undefined)
	        	return self;
	        //设置默认
	        time = resureVar(time, 500);
	        easing = resureVar(easing, 'easeInOutExpo');
	        easing = self.easingObj[easing] || 'ease';
	        callback = resureVar(callback, function(){});
	        onbegin = resureVar(onbegin, function(){});
	        nodeTemp = $(node);
	        onbegin.call(nodeTemp, node);
	        //为什么要用定时器,是因为渲染需要时间吧
	        setTimeout(function(){
	            //设置动画属性
	            flag && (node.style[transitionJSname] = 'all '+ time +'ms '+ easing);
	            //设置样式
	            nodeTemp.css(opat);
	            //这里用了定时器，比事件要稳定
	            setTimeout(function(){
	                //去除动画属性, 用removeProperty在chrom无法正确去除,不晓得为啥
	                if(flag){
	                	node.style[transitionJSname] = '';
	                	node.style.removeProperty(transitionJSname);
	                }
	                callback.call(nodeTemp, node);
	            }, time);
	        }, 16);
	        return self;
	    },
	    resureVar: function(tar, obj){
	        return tar === undefined ? obj : tar;
	    },
	    easingObj: {
	        'easeInOutExpo': 'cubic-bezier(.9, 0, .1, 1)',
	        'easeOutExpo': 'cubic-bezier(0, 0, .1, 1)',
	        'easeInExpo': 'cubic-bezier(.9, 0, 1.0, 1.0)',
	        'ease': 'ease',
	        'ease-in': 'ease-in',
	        'ease-out': 'ease-out',
	        'ease-in-out': 'ease-in-out',
	        'linear': 'linear'
	    }
	}
	return css3Animate;

})