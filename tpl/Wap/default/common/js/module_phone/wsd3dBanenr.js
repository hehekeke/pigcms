"use strict";
/**
 * 2012.09.30
 * 手机端的命名需要全部依赖 
 * 比如UC浏览器是无法获取 jsPath的
 */
define(som.config.basePath + 'module_phone/wsd3dBanenr.js', ['jmquery','js/module_phone/css3Animate.js'], function(require, exports){
	//依赖
	var $ = require('jmquery'),
		css3Animate = require('js/module_phone/css3Animate.js');
	//微时代banner的业务代码 is3D 可选择是否选择3Dbanenr
	return function(is3D){
		var wsdBanner = $('#wsdBanner'),
	        wsdBannerBtn,
	        wsdbannerP,
	        imgList = [],
	        imgLink = [],
	        str = '';
	    wsdbannerP = $('#wsdBanner p');
	    wsdbannerP.each(function(i){
	    	var self = wsdbannerP.eq(i);
	    	imgList.push(self.data('imgList'));
	    	imgLink.push(self.data('imgLink'));
	    });
	    for(var i = 0, j = imgList.length; i < j; i++){
	        str += '<span></span>';
	    }
	    $('#wsdBanner .ui-btn').html(str);
	    wsdBannerBtn = $('#wsdBanner span');
	    function main(banenr){
	    	banenr('#wsdBanner', imgList, imgLink, function(a){
		        wsdBannerBtn.removeClass('ui-focus').eq(a).addClass('ui-focus');
		        wsdbannerP.addClass('fn-hide').eq(a).removeClass('fn-hide');
		    }, function(){
		        css3Animate(wsdBanner[0], {
		            opacity: 1
		        });
		    });
	    }
	    !is3D ? som.use('js/module_phone/3dBanenr.js', function(banenr){
	    	main(banenr)
	    }) : som.use('js/module_phone/normalBanner.js', function(banenr){
	    	main(banenr)
	    })
	}
});