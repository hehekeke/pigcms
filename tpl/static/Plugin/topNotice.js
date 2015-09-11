	/* 
	 * 页面顶部提示栏效果(TopTipEffect)
	 *  
	 * @param {string}    id           tip提示标签id
	 * @param {string}    holderId     父标签
	 * @param {bool}      expand       展开/收起
	 * @param {string}    step         每次移动步长
	 * @param {object}    speed        移动速度
	 */

	 if (document.getElementById("TopTipClose") != undefined) {

	var TopTipEffect = function(id, holderId, expand, step, speed){
	    this.obj = document.getElementById(id);
	    this.holder = document.getElementById(holderId);
	    this.step = step;
	    this.speed = speed;
	    this.expand = expand;
	    this.maxH = this.obj.offsetHeight;
	    this.moveT = null;
	    this.moving = false;
	    this.tempH = expand ? 0 : this.maxH;
	}
	TopTipEffect.prototype = {
	    play : function(){
	        if(this.moving) return;
	        if(this.holder.offsetHeight > this.maxH) return;
	        var _this = this;
	        this.moveT = setInterval(function(){_this.move()}, _this.speed);
	    },
	    move : function(){
	        this.moving = true;
	        if(this.expand){
	            this.tempH += this.step;
	            if(this.tempH > this.maxH){
	                if((this.tempH - this.maxH) >= this.step){
	                    this.expand = false;
	                    this.moving = false;
	                    clearInterval(this.moveT);
	                    return;
	                }else{
	                    this.tempH = this.maxH;
	                }
	            }
	        }else{
	            this.tempH -= this.step;
	            if(this.tempH < 0){
	                if(-this.tempH >= this.step){
	                    this.expand = true;
	                    this.moving = false;
	                    clearInterval(this.moveT);
	                    return;
	                }else{
	                    this.tempH = 0;
	                }
	            }
	        }
	        this.holder.style.height = this.tempH + "px";
	        this.holder.scrollTop = this.maxH - this.tempH;
	    }
	}
	//右上角关闭按钮点击
	document.getElementById("TopTipClose").onclick = function(){
	    mytip.play();
	}

	//运行
	var mytip = new TopTipEffect("TopTip", "TopTipHolder", true, 1, 10);
	mytip.play();
}

	function pageClose(){
		document.getElementById("fly_page").style.display="none";
	}