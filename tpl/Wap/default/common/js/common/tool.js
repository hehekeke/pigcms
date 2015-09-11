"use strict";
/**
 * 2012.09.30
 * 核心工具函数,快捷,好用的函数都存放在这
 * 这是一切的基石!!!! 
 */
define(som.config.basePath + 'common/tool.js', ['cache'], function(require, exports){
	//依赖
	var cache = require('cache');
	//需要初始化的变量
	var WIN = cache.WIN,
		DOC = cache.DOC,
		HTML = cache.HTML,
		BODY = cache.BODY,
		REX = {
			trim: /^\s+|\s+$/g,
			webkitMobile: /AppleWebKit.*Mobile./
		},
		BOM = cache.BOM;
	//正确获取对象类型增强版的typeof typeof是关键字
	var Typeof = exports.Typeof = function(key){
		switch(Object.prototype.toString.call(key)){
			case '[object Array]' 		: return 'Array';
			case '[object String]' 		: return 'String';
			case '[object RegExp]' 		: return 'RegExp';
			case '[object Number]' 		: return 'Number';
			case '[object Function]'	: return 'Function';
			case '[object Boolean]' 	: return 'Boolean';
			case '[object Math]'		: return 'Math';
			case '[object Date]'		: return 'Date';
			default :
				//由于 IE678 null undefined 会显示[object Object] 所以我们直接匹配
				switch(key){
					case null 			: return 'Null';
					case undefined 		: return 'Undefined';
					default 			: return 'Object';
				}
		}
	}
	//增强版的try cache 	try是关键字
	var Try = exports.Try = function(){
		for(var i=0,j=arguments.length;i<j;++i){
			try{
				return arguments[i]();
			}catch(e){}
		}
	}
	//对象的方法
	var object = exports.object = {
		//对象的继承
		extend: function(obj, source){
			for(var i in source)
				if(source.hasOwnProperty(i))
					obj[i] = source[i];
			return obj;
		},
		//对象的复制
		clone: function(source){
			return object.extend({}, source)
		},
		//判断是否有这个方法
		hasname: function(obj, name){
			try{
				var is = obj.hasOwnProperty(name);
				if(is)
					return is;
				return name in obj;
			}catch(e){
				return name in obj;
			}
		},
		//判断是否为原型连方法
		isprototypename: function(obj, name){
			return !obj.hasOwnProperty(name) && name in obj;
		},
		//判断对象是否空
		isEmpty: function(obj){
			for(var i in obj)
				return false;
			return true;
		},
		//打印对象属性
		log: function(obj, is){
			if(object.isEmpty(obj)){
				log('空对象: '+obj);
			}else{
				for(var i in obj){
					log('[ '+i+' : '+obj[i]+' ]', is);
				}
			}
			return obj;
		},
		/**
		 * 判定对象的类型，也就是Typeof(xx) === 'Object'为true的时候的对象
		 * 对象基本有
		 * 基本对象({})
		 * 类数组对象(arguments) ps. window 有 length属性
		 * DOM(节点对象 document 等等)
		 * BOM(浏览器对象 window location 等等)
		 * nodelist(相当于类数组对象)
		 */
		Typeof: function(obj){
			var rtv = Typeof(obj);
			//先把能用Typeof找出的对象给过滤
			if(rtv !== 'Object')
				return rtv;
			//找到DOM对象
			if(obj.nodeType !== undefined)
				return 'DOM';
			if(index(BOM, obj) !== -1)
				return 'BOM';
			//如果是这么个对象 {length1:10} 还是区分不出来
			if(obj.length !== undefined)
				return 'arrayLike';
			return 'Object';
		}
	}
	//全局eval
	exports.globalEval = function(str){
		var WINDOW = WIN;
		str += '';
		return WINDOW.execScript ? WINDOW.execScript(str) : WINDOW.eval(str);
	}
	//字符串的解析
	var globalParse = exports.globalParse =  function(str, scope){
		return new Function( 'return ' + str ).call(scope || WIN);
	}
	//正确解析 Unicode编码 入参 16进制
	exports.analyzeUnicode = function(number){
		return globalParse('"\\u'+number+'"');				//方式二
	}
	//兼容IE6的log
	var log = exports.log = function(arg, is){
		if(!WIN.console || is){
			var DIV = DOC.createElement('div');
			DIV.style.cssText = 'background:#CCC;color:#F00;border-top:1px solid #FFF;';
			DIV.innerHTML = 'MES: '+arg;
			BODY.appendChild(DIV);
		}else{
			WIN.console.log(arg);
		}
		return arg;
	}
	//只在有log方法的情况下才使用的
	exports.mes = function(arg){
		var win = WIN;
		win.console && win.console.log(arg);
	}
	//判断浏览器
	var UA = cache.UA;
	exports.browser = (function(WIN){
		return {
			IE6		: !!WIN.ActiveXObject && !WIN.XMLHttpRequest,	//IE6
			IE7		: !+"\v1" && !DOC.querySelector,				//IE67
			IE8		: !+"\v1",										//IE678
			IEnew 	: !!DOC.documentMode,							//IE8910+
			IE8only : DOC.documentMode === 8,						//IE8
			IE9only : DOC.documentMode === 9,						//IE9
			IE10only: DOC.documentMode === 10,						//IE10
			IE		: !!WIN.attachEvent && !WIN.opera,				//IE
			opear	: !!WIN.opera,									//opear
			webkit 	: !!navigator.vendor,							//webkit
			firefox : UA.indexOf("Firefox") !== -1,//firefox
			webkitMobile :  REX.webkitMobile.test(UA)
		}
	})(WIN);
	/**
	 * 核心函数格式化数组
	 * 对照
	 * Undefined -> []
	 * Null 	 -> []
	 * true		 -> []
	 * string 	 -> [原对象]
	 * number 	 -> [原对象]
	 * Array 	 -> [原对象]
	 * Object 	 -> [原对象]
	 * dom 	 	 -> [原对象]
	 * nodeList  -> [格式化数组对象]
	 * jqObject  -> [格式化数组对象]
	 */
	var array = exports.array = function(obj){
		return Try(
			function(){
				//IE678,对于string的处理和W3C浏览器不一样,IE8可以获取 'bbb'[1], IE67 无法获取
				//对于Number,Object这了做个统一
				//但是对象有比较特殊有 dom nodeList 类数组对象 ps. window 有 length属性
				switch(Typeof(obj)){
					case 'String':
					case 'Number':
						return [obj];
					case 'Array':
						return obj;
					case 'Object':
						//类数组对象
						if(object.Typeof(obj) === 'arrayLike')
							break;
						return [obj];
				}
				return Array.prototype.slice.call(obj, 0);
			},
			function(){
				var arr = [], i = 0, j = obj.length;
				for(; i < j; ++i){
					arr[i] = obj[i];
				}
				return arr;
			},
			function(){
				return [];
			}
		)
	}
	/**
 	 * 核心函数遍历数组
 	 * 对照 各个对象的 length的属性
 	 * Undefined -> 报错
	 * Null 	 -> 报错
	 * true		 -> undefined
	 * string 	 -> num
	 * number 	 -> undefined
	 * Array 	 -> num
	 * Object 	 -> undefined?	
	 * dom 	 	 -> undefined
	 * nodeList  -> num
	 * jqObject  -> num
	 */
	var index = exports.index = function(arr, obj){
		//根据对错表,设置代码防御, 首先排除 undefined, null
		switch(Typeof(arr)){
			case 'Undefined':
			case 'Null':
				return -1;
		}
		//如果 length属性不为undefined就进行查找
		if(arr.length !== undefined){
			for(var i = arr.length-1; 0<=i; --i){
				if(obj === arr[i])
					return i;
			}
		}
		return -1;
	};
	/**
	 * 核心函数each
	 * 首先找到对象并且是非类数组对象并且不是dom对象
	 * 注意:传过去的this是个对象,不是基本对象 dom.valueOf() 这个方法IE678下会报错
	 */
	exports.each = function(arr, fn, flag){
		var i = 0, j, z;
		if(object.Typeof(arr) === 'Object' || flag){
			for(z in arr){
				if(arr.hasOwnProperty(z)){
					if(fn.call(arr[z], arr[z], z, arr) === false)
						break;
				}
			}
		}else{
			arr = array(arr);
			j = arr.length;
			for(; i < j; ++i)
				if(fn.call(arr[i], arr[i], i, arr) === false)
					break;
		}
	}
	//字符串去空白
	exports.trim = function(str){
		return str.trim ? str.trim() : str.replace(REX.trim, '');
	}
	//继承
	exports.extend = function(){
		var objectT = object;
		return objectT.extend.apply(objectT, arguments);
	}
	/**
 	 * @fileoverview 各种进制的表示转换方法
 	 * @param {string} 原来对象的入参 这里最好是string如果是number首先会toString()操作. parseInt(0x4e,16) parseInt('0x4e',16) 解析不一样 
	 * @param {number} 原来对象的进制
	 * @param {number} 目标对象的进制
 	 * @return {string} 字符串
 	 * ps parseInt(a, b); b是为a的进制这点要注意 如果
	 */
	exports.aryChange = function(sourceStr, sourceAry, targetAry){
		return parseInt(sourceStr, sourceAry).toString(targetAry);
	}
	/**
 	 * @fileoverview 获取一个区间内的随机数
 	 * @param {number} x 区间的开始 默认值0  x < y
 	 * @param {number} y 区间的介绍 默认值0
	 */
	exports.getRandomNum = function(x, y){
		//设置默认值
		x = ~~x;
		y = ~~y;
		//如果不满足 x > y跳出
		if(x >= y)
			return 0;
		return Math.floor((y-x+1)*Math.random()+x);
	}
	
	//doc对象
	exports.doc = {
		//判断两个元素的子父关系
		contains:function(fa,ch){
			if(fa === ch) 
				return true;
			if(fa.contains) 
				return fa.nodeType === 9 ? true : fa.contains(ch);
			if(fa.compareDocumentPosition) 
				return !!(fa.compareDocumentPosition(ch) & 16);
			while(ch = ch.parentNode) 
				if(ch === fa) 
					return true;
			return false;
		}
	}
	/**
	 * win快捷函数
	 * 
	 * [window.outerHeight] 获取浏览器实际高度 IE8-没有此属性无法
	 * window.innerHeight === window.offsetWidth 获取浏览器视图布局的高度包含滚动条 但是 IE7-不包含滚动条
	 * window.clientHeight 获取浏览的视图布局的不包含滚动条
	 * window.bodyHeight  获取body的高度
	 * window.scrollHeight 获取滚动条的实际高度，在HTML标签设置了margin后各个浏览器的表现都不正常
	 * window.scrollMaxTop 获取滚动条最大可以滚动的距离
	 * window.scrollTop 设置滚动条top值
	 * window.scroll 设置
	 */
	var win = exports.win = {
		innerHeight: function(){
			return WIN.innerHeight || HTML.offsetHeight;
		},
		innerWidth: function(){
			return WIN.innerWidth || HTML.offsetWidth;
		},
		offsetWidth: function(){
			return win.innerWidth();
		},
		offsetHeight: function(){
			return win.innerHeight();
		},
		clientWidth: function(){
			return HTML.clientWidth;
		},
		clientHeight: function(){
			return HTML.clientHeight;
		},
		bodyHeight: function(){
			return BODY.offsetHeight;
		},
		bodyWidth: function(){
			return BODY.offsetWidth;
		},
		scrollHeight: function(){
			return HTML.scrollHeight;
		},
		scrollWidth: function(){
			return HTML.scrollWidth;
		},
		scrollMaxTop: function(){
			return WIN.scrollMaxY !== undefined ? WIN.scrollMaxY : win.scrollHeight() - win.clientHeight();
		},
		scrollMaxLeft: function(){
			return WIN.scrollMaxX !== undefined ? WIN.scrollMaxX : win.scrollWidth() - win.clientWidth();
		},
		scrollTo: function(top, left){
			top = ~~top;
			left = ~~left;
			if(WIN.scrollTo){
				WIN.scrollTo(top, left);
			}else{
				win.scrollTop(top);
				win.scrollLeft(left);
			}
		},
		scrollTop: function(num){
			if(num !== undefined){
				HTML.scrollTop = num;
				BODY.scrollTop = num;
			}else{
				return WIN.scrollY || HTML.scrollTop || BODY.scrollTop;
			}
		},
		scrollLeft: function(num){
			if(num !== undefined){
				HTML.scrollLeft = num;
				BODY.scrollLeft = num;
			}else{
				return  WIN.scrollX || HTML.scrollLeft || BODY.scrollLeft;
			}
			
		},
		onload: function(fun){
			if(Typeof(fun) !== "Function") return;
			//先去判断som.winLoaded是否存在，如果存在就直接运行fun不存在再去注册
			if(som.winLoaded){
				fun();
			}else{
				if(WIN.onload){
		        	var oldfun = WIN.onload;
		        	WIN.onload = function(){
		        		WIN.onload = null;
		            	oldfun();
		            	fun();
		            }
		        }else{
		       		WIN.onload = function(){
		       			WIN.onload = null;
		       			fun();
		       		};
		        }
			}
		}
	}

})