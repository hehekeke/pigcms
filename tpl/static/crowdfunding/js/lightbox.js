
function lightbox(opts){
	this.obj = opts.obj;
	this.init().bindEvent();
}

lightbox.prototype = {
	init: function(e){
		this.closeFn();
		return this;
	},
	bindEvent: function(){
		var that = this,
			obj = that.obj;
		obj.bind('touchend',function(e){
			e.preventDefault();
			var href = $(this).attr("href");
			var imgId = $(this).attr("data-id");
            $(document).on("touchmove", that.noScroll);
            $('body').append('<div class="div-mask"><em class="close-btn J_closeBtn"></em><div class="show-img"><img src="'+ href +'" ></div></div>');
            window.location.hash = imgId;
            that.closeImg();
        });
        return this;
    },
    closeImg: function(){
        var that = this;
        $(document).on('touchend','.J_closeBtn,.div-mask',function(e){
            e.preventDefault();
            $(document).off("touchmove", this.noScroll);
            that.closeFn();
        });

        if (window.history && window.history.pushState) {
            $(window).on('popstate', function () {
                var hashLocation = location.hash;
                var hashSplit = hashLocation.split("#!/");
                var hashName = hashSplit[1];
                if (hashName !== '') {
                    var hash = window.location.hash;
                    if (hash === '') {
                        that.closeFn();
                    }
                }
            });
        }
        return this;
    },
    closeFn: function(){
        $(".div-mask").remove();
        $(".show-img").remove();
    },
    noScroll: function(e){
        e.preventDefault();
        return false;
    }
}