"use strict";
/**
 * 2012.09.30
 * 底层动画框架 
 */
define(som.config.basePath + 'common/style.js', ['cache', 'tool'], function(require, exports){

	//依赖
	var cache = require('cache'),
		tool = require('tool'),
		DOC = cache.DOC,
		BODY = cache.BODY,
		HEAD = cache.HEAD,
		toolHasname = tool.object.hasname;

	//关于css操作的函数
	exports.css = function css(){

	}

	//关于是否支持css操作的函数 判断是否有css3属性，正确获取css3属性名，正确获取jsCss3属性名
	var dataName = {
		'Moz': '-moz-',
		'webkit': '-webkit-',
		'O': '-o-',
		'ms': '-ms-'
	}
	var REX = {
		'value00': /-(\w)/g,
		'value01': /[A-Z]/g
	}
	//格式化
	function format(name){
		return name.replace(REX.value00, function(a, b){
			return b.toUpperCase();
		})
	}
	function decompile(name){
		return name.replace(REX.value01, function(a){
			return '-'+a.toLowerCase();
		})
	}
	//核心
	function hascssMain(name, node){
		var flag, style, i, hasname, tempName;
		//初始化node正确拿到
		node = node || BODY;
		style = node.style;
		hasname = toolHasname;
		name = format(name);
		flag = hasname(style, name);
		if(flag)
			return [name, ''];
		name = name.slice(0, 1).toUpperCase() + name.slice(1);
		for(i in dataName){
			tempName = i + name;
			flag = hasname(style, tempName);
			if(flag)
				return [tempName, i];
		}
		return ['', ''];
	}
	//入口
	var hasCss = exports.hasCss = function(name, node){
		return !!hascssMain(name, node)[0];
	}
	hasCss.getJsName = function(name, node){
		return hascssMain(name, node)[0];
	}
	hasCss.getCssName = function(name, node){
		var val = hascssMain(name, node),
			val1 = val[0],
			val2 = val[1];
		if(val1 === '')
			return '';
		name = decompile(name);
		if(val2 === '')
			return name;
		return dataName[val2] + name;
	}
	hasCss.flag = hasCss('transition');

	//动态写入style
	exports.writeStyle = function(cssText){
		var styleNode = DOC.createElement('style'),
			textNode;
		styleNode.type = 'text/css';
		if(styleNode.styleSheet){
			styleNode.styleSheet.cssText = cssText;
		}else{
			textNode = DOC.createTextNode(cssText);
			styleNode.appendChild(textNode);
		}
		HEAD.appendChild(styleNode);
	}

})