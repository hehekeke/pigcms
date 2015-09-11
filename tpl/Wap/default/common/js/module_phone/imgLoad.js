"use strict";
/**
 * 2012.09.30
 * 手机端的命名需要全部依赖 
 * 比如UC浏览器是无法获取 jsPath的
 */
define(som.config.basePath + 'module_phone/imgLoad.js', ['jmquery'], function(require, exports){
	//依赖
	var $ = require('jmquery');
	
	/**
	 * @fileoverview 图片加载类 v1.1.0	2013.5.13
	 * @param {object} obj 回调属性
	 */
	var imgLoad = function(obj){
		return this instanceof imgLoad ? this.init(obj) : new imgLoad(obj);
	}
	$.extend(imgLoad, {
		cache: {}
	})
	imgLoad.prototype = {
		init: function(obj){
			var option = this.option = {
				loaded: function(){},
				error: function(){},
				complete: function(){},
				oneImg: false
			}
			$.extend(option, obj || {})
		},
		fire: function(url){
			var self, base, i, j, option, src;
			//代码防御
			if(url === undefined)
				return self;
			self = this;
			option = self.option;
			base = self.base;
			url = [].concat(url);
			i = 0;
			j = url.length;
			//如果url只有一个
			if(j === 1){
				src = url[0];
				//如果此图片在缓存中直接执行函数
				base.call(self, src, option.loaded, option.error, option.complete);
			}else{
				for(; i < j; i++){
					base.call(self, url[i], function(){}, option.error, function(){
						var k = 0, z = j, flag = true;
						for(; k < z; k++){
							if(imgLoad.cache[url[k]] === undefined){
								flag = false;
							}
						}
						if(flag){
							//统一 this, 为了只产生一次回调
							option.loaded && option.loaded.call(null, url);	
							option.complete && option.complete.call(null, url);
							delete option.loaded;
							delete option.complete;
						}
					});
				}
			}
			return self;
		},
		base: function(url, callback, errorback, complete){
			var self = this, img, oneImg = self.option.oneImg;
			//代码防御
			if(imgLoad.cache[url] === 1){
				callback(url);
				complete(url);
				return;
			}
			img = oneImg ? self.oneImg : new Image();
			function handle(img, src, a, b){
				img.onerror = img.onload = null;
				//把加载完成的存入cache
				imgLoad.cache[src] = 1;
				a(src);
				b(src);
			}
			img.onload = function(){
				handle(img, this.src, callback, complete);
			}
			img.onerror = function(){
				handle(img, this.src, errorback, complete);
			}
			img.src = url;
		},
		oneImg: new Image()
	}
	
	return imgLoad;

})