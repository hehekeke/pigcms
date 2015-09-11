    $('.button-reload').click(function(){
        $('#prize_rank option:first').attr('selected',true)
        window.location.reload();
    });

    userinterval = setInterval(loadUser,loadTime);

    function loadUser(){
        var url = '/index.php?g=User&m=Scene&a=loadUser';
        $.getJSON(url, {'id':id}, function(data){
            if(data.err == 0){
                $('.usercount-label b').html(data.count);
            }
            
        })
    }
    $("#prize_rank").change( function() {
        var val = $(this).val();
        var url = '/index.php?g=User&m=Scene&a=prize_data';
        $('.lottery-right').html('');
        if(val != ''){
            $.getJSON(url, {'id':id,'pid':val}, function(data){
                $('#prize_num').html(data.prize_num);
                if(data.prize_user){
                    var html = createHtml( data.prize_user);
                    $('.lottery-right').html(html);
                }  
            }); 
        }else{
            $('#prize_num').html(0);
        }
 
    }); 


    var is_start    = 0;
    $('.button-run').on('click',function(){
        var num     = $('#prize_num').html()*1;
        var prize_id = $('#prize_rank').val();
        var url = '/index.php?g=User&m=Scene&a=get_lottery';

        if(prize_id){  

            if(num){
               
                $.getJSON(url, {'id':id,'pid':prize_id}, function(data){
                    if(data.err>0){     
                        clearInterval(interval);
                        alert(data.info);   
                    }else{
                        $('.button-run').hide();
                        $('.button-stop').show();
    /*                    interval = setInterval(function(){
                            var len = data.res.length-1;
                            var i = GetRandomNum(0,len);
                            $('#header').css('background-image','url('+data.res[i].portrait+')');
                            $('#header .nick-name').html(data.res[i].nickname);
                        },300);*/

                        if (data.res && data.res.length) {
                            tempData = data.res;
                        }

                        var e = 0;
                        if(is_start == 0){
                            interval = setInterval(function() {
                                var g = [];
                                for (var j in tempData) {
                                    g.push(j)
                                }
                                var k = g.length;
                                var h = g[e];
                                $("#header").css({
                                    "background-image": "url("+tempData[h].portrait+")"
                                }).attr("lid", tempData[h].id);
                                e++;
                                if (e >= k) {
                                    e = 0
                                }

                                $('#header .nick-name').html(tempData[h].nickname);
                            },
                            100);
                            is_start = 1;
                        }
                    }    
                }); 
            } else {
                alert('中奖名额已用光');
            }
        }else{
            alert("请先选择奖项");
        }
    });

    $('.button-stop').on('click',function(){  
        var num     = $('#prize_num').html()*1;
        if(lottery_type == 1){
            var lottery_num     = 1;
        }else{
            var lottery_num     = num;
        }

        var count   = tempData.length;
        if(count < 1 || (lottery_type == 0 && num>count)){
            alert('人数不足奖品数量,请设置“单个抽奖”模式进行抽奖');
            clearInterval(interval);
            $('.button-run').show();
            $('.button-stop').hide();
        }else{
            clearInterval(interval);
            is_start     = 0;
            var prize_id = $('#prize_rank').val();
            var uid       = '';
            var rand    = GetRandomNum(lottery_num,0,count-1);
            var cn      = rand.length;
            for (var e = 0; e < cn; e++) {
                $('.lottery-right').append('<div class="result-line" style="display: block;"><div class="result-num">'+(e+1)+'</div><div class="user" style="background-image: url('+tempData[rand[e]].portrait+');"><span class="nick-name">'+tempData[rand[e]].nickname+'</span></div></div>');
                uid  += tempData[rand[e]].id+',';
                if(lottery_type == 1){ 
                    $('#prize_num').html(num-lottery_num);
                }else{
                    $('#prize_num').html(0);
                }
                $('#header').css('background-image','url('+tempData[rand[e]].portrait+')');
                $('#header .nick-name').html(tempData[rand[e]].nickname);
            }
            $('.button-run').show();
            $('.button-stop').hide();
            var url      = '/index.php?g=User&m=Scene&a=lottery_ok';
            $.getJSON(url, {'id':id,'uid':uid,'pid':prize_id}, function(res){});
        }


        /*var prize_id = $('#prize_rank').val();
        var url      = '/index.php?g=User&m=Scene&a=lottery_ok';

        $.getJSON(url, {'id':id,'pid':prize_id}, function(data){
                $('#header').css('background-image','url('+data[0].portrait+')');
                $('#header .nick-name').html(data[0].nickname);
                
                $('.button-run').show();
                $('.button-stop').hide();

                var html    = createHtml(data,true);
                var right   = $('.lottery-right');

                right.html(html+right.html());
                var num = $('#prize_num').html()*1;     
                $('#prize_num').html(num-1);
        });      */
    });

    function GetRandomNum(num , from , to)
    {
        var arr=[];
        var json={};
        while(arr.length<num)
        {
            //产生单个随机数
            var ranNum=Math.ceil(Math.random()*(to-from))+from;
            //通过判断json对象的索引值是否存在 来标记 是否重复
            if(!json[ranNum])
            {
                json[ranNum]=1;
                arr.push(ranNum);
            }
             
        }
        return arr;
    }

    function createHtml(data){
        var len     = data.length;
        var html    = '';
        var num     = $('.lottery-right').children().length;

        for (var i = 0; i < len; i++) {
            html += '<div class="result-line" style="display: block;"><div class="result-num">'+(num+i+1)+'</div><div class="user"  style="background-image: url('+data[i].portrait+');"><span class="nick-name">'+data[i].nickname+'</span></div></div>';
        };

        return html;
    }