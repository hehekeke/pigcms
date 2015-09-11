"use strict";
/**
 * 2012.09.30 
 * 核心储存常量的地方
 */
define(som.config.basePath + 'common/cache.js', [], function(require, exports){
	//常量
	var WIN = exports.WIN = window;

	var DOC = exports.DOC = WIN.document;

	exports.HTML = DOC.documentElement;

	exports.HEAD = DOC.head || DOC.getElementsByTagName('head')[0];

	exports.BODY = DOC.body;
	//时间戳
	exports.timesTamp = new Date().getTime();
	//BOM对象
	var winNav = WIN.navigator;
	exports.BOM = [WIN, winNav, WIN.screen, WIN.history, WIN.location];

	try{
	//顶级window下的documetn
	var TOPWIN = exports.TOPWIN = WIN.top;

	var TOPDOC = exports.TOPDOC = TOPWIN.document;

	exports.TOPHTML = TOPDOC.documentElement;

	exports.TOPHEAD = TOPDOC.head || TOPDOC.getElementsByTagName('head')[0];
	//顶层的body
	exports.TOPBODY = TOPDOC.body;

	}catch(e){ WIN.console && WIN.console.log('cross domain: '+e); }
	
	//一个空函数
	exports.blankFn = function(){};
	//一个空的DIV
	exports.blankDIV = DOC.createElement('div');
	//一个文档碎片
	exports.blanksFragment = DOC.createDocumentFragment();
	//一个标准的range对象
	exports.w3cRange = DOC.implementation.hasFeature('Range', '2.0') ? DOC.createRange() : undefined;
	//标准的定时控制动画 这里有个BUG 不能直接使用 cache.requestAnimationFrame 需要把 var s = cache.requestAnimationFrame 保存在一个变量中
	exports.requestAnimationFrame = WIN.requestAnimationFrame||WIN.mozRequestAnimationFrame||WIN.webkitRequestAnimationFrame||WIN.msRequestAnimationFrame||WIN.oRequestAnimationFrame||function(callback){return setTimeout(callback, 1000/60)};
	//标准去定时控制动画
	exports.cancelAnimationFrame = WIN.cancelAnimationFrame||WIN.mozCancelAnimationFrame||WIN.webkitCancelAnimationFrame||WIN.msCancelAnimationFrame||WIN.oCancelAnimationFrame||function(id){return clearTimeout(id)};	
	//浏览器头
	exports.UA = winNav.userAgent;
	//全局的正则REX
	exports.globeRex = {
		getLetter: /\w+/g
	}

})