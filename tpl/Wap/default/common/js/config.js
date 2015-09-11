"use strict";
som.config({
	basePath: '../',
	hostPath: location.protocol +'//'+ location.host +'/',
	query: {	//插件调用
		jquery: {
			url:'common/jquery.js',
			exports:'jQuery $'
		},
		jmquery: {
			url:'common/jmquery.js',
			exports:'jQuery $'
		}
	}, 
	map: {
		'cache'			: 'js/common/cache.js',
		'tool'			: 'js/common/tool.js',
		'lang'			: 'common/lang.js',
		'data'			: 'common/data.js',
		'event'			: 'common/event.js',
		'insertHTML'	: 'common/insertHTML.js',
		'somesayss'		: 'common/somesayss.js',
		'ease'			: 'js/common/ease.js',
		'easeing'		: 'js/common/easeing.js',
		'style'			: 'js/common/style.js',
		'map'			: 'common/map.js',
		'fate'			: 'common/fate.js',
		'json'			: 'module_tool/jsonV1.js',
		'template'		: 'module_tool/templateV1.js',
		'storage'		: 'module_tool/storage.js',
		'verify'		: 'module_tool/verify.js'
	}
})