KISSY.use('node,gallery/slide/1.2/',function(S,Node,Slide){
    var $=Node.all;
    var v_h  = null;     

    function init_pageH(){
        var fn_h = function() {
            if(document.compatMode == 'BackCompat')
                var Node = document.body;
            else
                var Node = document.documentElement;
             return Math.max(Node.scrollHeight,Node.clientHeight);
        }
        var page_h = fn_h();
        var m_h = $('.item').height();
        page_h >= m_h ? v_h = page_h : v_h = m_h ;
        
        //设置各种模块页面的高度，扩展到整个屏幕高度
        $('.item').height(v_h);     
        $('.viewport').height(v_h);
        $('.j-slider').height(v_h);
    };
    init_pageH(); 

    window.s = new Slide('#J_slide',{
        contentClass:'viewport',
        pannelClass:'item',
        navClass:'pointer',
        triggerSelector:'span',
        defaultTab:1,
        selectedClass:'current',
        effect:'hSlide',
        touchmove:true
        
    });
    window.s.on('afterSwitch',function(e){
        $('.element-1 .phone').removeClass('animated tada');
        $('.element-1 .hand').removeClass('animated fadeInDown');
        $('.element-1 .gold').removeClass('animated fadeInUp');
        $('.element-1 .gift').removeClass('animated fadeInRight');
        $('.element-1 .text').removeClass('animated zoomIn');
        $('.element-2 .phone').removeClass('animated tada');
        $('.element-2 .building').removeClass('animated fadeInUp');
        $('.element-2 .floor').removeClass('animated fadeInLeft');
        $('.element-2 .text').removeClass('animated zoomIn');
        $('.element-3 .phone').removeClass('animated tada');
        $('.element-3 .house').removeClass('animated fadeInDown');
        $('.element-3 .handshake').removeClass('animated fadeInUp');
        $('.element-3 .message').removeClass('animated zoomInLeft');
        $('.element-3 .text').removeClass('animated zoomIn');
        $('.btn-go').removeClass('animated zoomIn');
        if(e.index==0){      
            setTimeout(function(){
                $('.element-1 .phone').addClass('animated tada');
            },100);
            setTimeout(function(){
                $('.element-1 .hand').addClass('animated fadeInDown');
            },500);
            setTimeout(function(){
                $('.element-1 .gold').addClass('animated fadeInUp');
            },600);
            setTimeout(function(){
                $('.element-1 .gift').addClass('animated fadeInRight');
            },1000);
            setTimeout(function(){
                $('.element-1 .text').addClass('animated zoomIn');
            },800);
        }
        if(e.index==1){         
            setTimeout(function(){
                $('.element-2 .phone').addClass('animated tada');
            },100);
            setTimeout(function(){
                $('.element-2 .building').addClass('animated fadeInUp');
            },500);
            setTimeout(function(){
                $('.element-2 .floor').addClass('animated fadeInLeft');
            },800);
            setTimeout(function(){
                $('.element-2 .text').addClass('animated zoomIn');
            },600);  
        }
        if(e.index==2){          
            setTimeout(function(){
                $('.element-3 .phone').addClass('animated tada');
            },100);
            setTimeout(function(){
                $('.element-3 .house').addClass('animated fadeInDown');
            },500);
            setTimeout(function(){
                $('.element-3 .handshake').addClass('animated fadeInUp');
            },600);
            setTimeout(function(){
                $('.element-3 .message').addClass('animated zoomInLeft');
            },1000);
            setTimeout(function(){
                $('.element-3 .text').addClass('animated zoomIn');
            },800);
            setTimeout(function(){
                $('.btn-go').addClass('animated zoomIn');
            },1200);
        } 
    });


    //引导页动画
    setTimeout(function(){
        $('.element-1 .phone').addClass('animated tada');
    },100);
    setTimeout(function(){
        $('.element-1 .hand').addClass('animated fadeInDown');
    },500);
    setTimeout(function(){
        $('.element-1 .gold').addClass('animated fadeInUp');
    },600);
    setTimeout(function(){
        $('.element-1 .gift').addClass('animated fadeInRight');
    },1000);
    setTimeout(function(){
        $('.element-1 .text').addClass('animated zoomIn');
    },800);
});