
$(function () {
    //顶部轮播
    var $slideHolder = $("#slider");
    var $scrollHolder = $("#scrollHolder");
    var $pagination = $("#slideCircle");
    var myWebSlider = new WebSlider({
        slideHolder: $slideHolder,
        scrollHolder: $scrollHolder,
        pagination: $pagination,
        loop:true,
        currentClass: "swiper-active-switch"
    });

    //分类滚动
    var $slideHolder = $("#category");
    var $scrollHolder = $("#categoryWrap");
    var $pagination = $("#categoryCircle");
    var myWebSlider = new WebSlider({
        slideHolder: $slideHolder,
        scrollHolder: $scrollHolder,
        pagination: $pagination,       
        currentClass: "swiper-active"
    });

    //回到顶部和定位导航栏目
    var $navHolder = $("#navHolder");
    var navShow = false;
    $(window).scroll(function () {
        $navHolder.css("height", 0);
        var scroTop = $(window).scrollTop(),
            tabulTop = $(".tabul-box").offset().top;
        if (tabulTop - scroTop <= 5) {
            $(".tabul-div").addClass("tabul-fixed");
        } else {
            $(".tabul-div").removeClass("tabul-fixed");
        }

    });
    
    goToTop($("#goTop"));


    //关闭顶部黑色提示框
    $(".tip-fq-close").on("touchend",function(){
        $(".tip-faqi").hide();
    })
})