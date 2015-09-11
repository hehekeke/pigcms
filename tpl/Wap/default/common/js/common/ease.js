"use strict";
/**
 * 2012.09.30 
 * 底层动画框架
 */
define(som.config.basePath + 'common/ease.js', ['cache', 'easeing', 'tool'], function(require, exports){

	//依赖
	var cache = require('cache'),
		tool = require('tool'),
		easeing = require('easeing'),
		getLetter = cache.globeRex.getLetter;

	/**
 	 * @fileoverview 缓动类
 	 * @param {array} startPos 开始坐标 一串数字型的数组
 	 * @param {array} endPos 结束坐标 一串数字型的数组
 	 * @param {number} time 持续时间
 	 * @param {string} easing 缓动属性
 	 * @event 事件 start moving end stop all
	 */
	var ease = function(startPos, endPos, time, easing){
		return this instanceof ease ? this.init(startPos, endPos, time, easing) : new ease(startPos, endPos, time, easing);
	}
	ease.prototype = {
		init: function(startPos, endPos, time, easing){
			//验证通过
			if(this.checkVal = this.check(startPos, endPos)){
				this.startPos = startPos;
				this.endPos = endPos;
				this.time = ~~time || 500;
				//默认是easeInOutExpo
				this.easing = easeing[''+easing] || easeing['easeInOutExpo'];
				//事件
				var blankFn = cache.blankFn;
				this.event = {
					start: blankFn,		//开始
					moving: blankFn,	//运动中
					end: blankFn,		//运动结束 对应 正常end和 end()
					stop: blankFn,		//运动中途停止 对应 stop()
					all: blankFn		//运动开始,运动中,运动结束
				}
			}
			//验证不通过
			else{
				tool.mes('Parameter is not legitimate');
			}
			return this;
		},
		//启动器
		fire: function(s, p, t, e){
			var self = this,
				checkVal = s && p ? this.check(s, p) : self.checkVal,
				requestAnimationFrame = cache.requestAnimationFrame,
				i, j,
				event, startPos, endPos, time, easing,
				beginTime,
				changePos = [];
			//防御
			if(!checkVal)
				return self;
			//获取处理好的数据
			startPos = s || self.startPos;
			endPos = p || self.endPos;
			time = ~~t || self.time;
			easing = (e && easeing[''+e]) || self.easing;
			event = self.event;
			//获取开始时间
			beginTime = new Date().getTime();
			event.all(startPos);
			event.start(startPos, 'start');
			for(i = 0,j = endPos.length; i<j; i++){
				changePos.push((endPos[i] - startPos[i])*100);
			}
			//动画的迭代
			self.animateHandle = requestAnimationFrame(function main(){
				var changeTime = new Date().getTime() - beginTime,
					change = [],
					i, j;
				for(i = 0, j = changePos.length; i<j; i++){
					change.push( startPos[i] + ( Math.ceil( changePos[i]*easing( changeTime/time ) ) )/100 )
				}
				event.all(change);
				event.moving(change);
				//时间到
				if(changeTime >= time){
					event.all(endPos);
					event.end(endPos, 'end');
					return;
				}
				self.animateHandle = requestAnimationFrame(main);
			})
			return self;
		},
		//停止
		stop: function(){
			//防御
			if(!this.checkVal)
				return this;
			//这里发现个BUG
			var cancelAnimationFrame = cache.cancelAnimationFrame;
			cancelAnimationFrame(this.animateHandle);
			this.event.stop(this.endPos, 'stop');
			return this;
		},
		//停止并且到最后
		end: function(){
			//防御
			if(!this.checkVal)
				return this;
			var cancelAnimationFrame = cache.cancelAnimationFrame,
				event = this.event;
			cancelAnimationFrame(this.animateHandle);
			event.all(this.endPos);
			event.end(this.endPos, 'end');
			return this;
		},
		//验证参数
		check: function(startPos, endPos){
			var i, j, Typeof = tool.Typeof;
			//startPos必须为Array
			if(Typeof(startPos) !== 'Array'){
				return false;
			}else{
				for(i = 0, j = startPos.length; i < j; i++){
					if(Typeof(startPos[i]) !== 'Number')
						return false;
				}
			}
			//endPos必须为Array
			if(Typeof(endPos) !== 'Array'){
				return false;
			}else{
				for(i = 0, j = endPos.length; i < j; i++){
					if(Typeof(endPos[i]) !== 'Number')
						return false;
				}
			}
			return true;
		},
		//事件
		on: function(str, fn){
			//防御
			if(!this.checkVal)
				return this;
			var self = this;
			str.replace(getLetter, function(a){
				self.event[a] = fn;
			})
			return self;
		}
	}

	return ease;

})