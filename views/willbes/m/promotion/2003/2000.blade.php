@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox ul:after {content:""; display:block; clear:both}

    .evtTop {position:relative}

    .evtMenu { width:100%; border-bottom:1px solid #d9d9d9; border-top:1px solid #d9d9d9}
    .tabs {width:100%; max-width:720px; margin:0 auto;}
    .tabs li {display:inline; float:left; width:33.3333%}
    .tabs li a {display:block; text-align:center; font-size:16px; line-height:1.5; padding:15px 0; color:#000; font-weight:bold; letter-spacing:-1px;}
    .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
    .tabs:after {content:""; display:block; clear:both}

    .embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } 
    .embed-container iframe, 
    .embed-container object, 
    .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
    
    .fixed {position:fixed; width:100%; left:0; z-index:10; border:0; opacity: .95;} 
    .fixed ul {width:100%; max-width:720px; margin:0 auto; background:rgba(255,255,255,0.5); background:#f3f3f3; box-shadow:0 10px 10px rgba(102,102,102,0.2);}

    .evt05 {background:#C1392D;}
    .evt05 a {position: absolute; width:26.81%; height:7.65%; z-index: 2;}
    .evt05 a.a01 {left: 51.25%; top: 40.37%;}
    .evt05 a.a02 {left: 51.53%; top: 47.6%;}
    .evt05 a.a03 {left: 59.17%; top: 83.89%;}
    
    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {
   
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
 
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {
        
    }
</style>

<div id="Container" class="Container NSK c_both">       

    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1915m_top.gif" alt="체인지" > 
    </div>  

    <div class="evtMenu">
        <ul class="tabs">
            <li><a href="/m/promotion/index/cate/3028/code/1915" >축산직<br>윤용범 교수</a></li>
            <li><a href="#none;">기계직<br>윤황현 교수</a></li>
            <li><a href="/m/promotion/index/cate/3028/code/2001">조경직<br>이윤주 교수</a></li>
        </ul>
    </div> 
    
    <div class="evtCtnsBox evt01" >
        <img src="https://static.willbes.net/public/images/promotion/2020/12/2000m_01.jpg" alt="기계직 윤황현" >
    </div>

    <div class="evtCtnsBox evt02" >
        <img src="https://static.willbes.net/public/images/promotion/2020/12/2000m_02.jpg" alt="경쟁률" >
    </div>

    <div class="evtCtnsBox evt03" >
        <img src="https://static.willbes.net/public/images/promotion/2020/12/2000m_03.jpg" alt="유튜브" >
        <div class='embed-container'>
            <iframe src='https://www.youtube.com/embed/s53Pjkbzjng?rel=0' frameborder='0' allowfullscreen></iframe>
        </div>
    </div>

    <div class="evtCtnsBox evt04" >
        <img src="https://static.willbes.net/public/images/promotion/2020/12/2000m_04.jpg" alt="리얼 전문가" >
    </div>

    <div class="evtCtnsBox evt05" >
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2000m_05.jpg" alt="수강신청"  >
        <a href="https://pass.willbes.net/m/lecture/show/cate/3028/pattern/only/prod-code/174807" target="_blank" alt="기계일반" class="a01">
        <a href="https://pass.willbes.net/m/lecture/show/cate/3028/pattern/only/prod-code/174808" target="_blank" alt="기계설계" class="a02">
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/178353" target="_blank" alt="기계직" class="a03">
    </div>

</div>
<!-- End Container -->

<script type="text/javascript">
    /*스크롤고정*/
    $(function() {
        var nav = $('.evtMenu');
        var navTop = nav.offset().top+100;
        var navHeight = nav.height()+10;
        var showFlag = false;
        nav.css('top', -navHeight+'px');
        $(window).scroll(function () {
            var winTop = $(this).scrollTop();
            if (winTop >= navTop) {
                if (showFlag == false) {
                    showFlag = true;
                    nav
                        .addClass('fixed')
                        .stop().animate({'top' : '0px'}, 100);
                }
            } else if (winTop <= navTop) {
                if (showFlag) {
                    showFlag = false;
                    nav.stop().animate({'top' : -navHeight+'px'}, 100, function(){
                        nav.removeClass('fixed');
                    });
                }
            }
        });
    });

    $(window).on('scroll', function() {
        $('.top-tab').each(function() {
            if($(window).scrollTop() >= $('#'+$(this).data('tab')).offset().top) {
                $('.top-tab').removeClass('active')
                $(this).addClass('active');
            }
        });
    });

</script>

@stop