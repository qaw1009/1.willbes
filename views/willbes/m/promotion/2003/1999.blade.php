@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox ul:after {content:""; display:block; clear:both}

    .evtTop {position:relative}

    .evtMenu {width:100%; border-bottom:2px solid #d9d9d9; border-top:1px solid #d9d9d9}
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

    .evt02 a {position: absolute; width:13.89%; height:2.85%; z-index: 2;}
    .evt02 a.a01 {left: 74.31%; top: 37.24%;}
    .evt02 a.a02 {left: 73.75%; top: 40.98%;}
    .evt02 a.a03 {left: 73.89%; top: 54.31%;}
    .evt02 a.a04 {left: 73.89%; top: 57.97%;}
    .evt02 a.a05 {left: 63.61%; top: 82.93%;}

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
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1971m_top.jpg" alt="대방고시" > 
    </div>  

    <div class="evtMenu">
        <ul class="tabs">
            <li><a href="/m/promotion/index/cate/3028/code/1971">기술직</a></li>
            <li><a href="#none;">세무직</a></li>
            <li><a href="/m/promotion/index/cate/3028/code/2003">조경직</a></li>
        </ul>
    </div> 
    
    <div class="evtCtnsBox evt01" >
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1999m_01.jpg" alt="라인업" >
    </div>

    <div class="evtCtnsBox evt02" >
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1999m_02.jpg" alt="수강신청"  >
        <a href="https://pass.willbes.net/m/lecture/show/cate/3022/pattern/only/prod-code/175999" target="_blank" alt="이윤호 회계학 기본" class="a01">
        <a href="https://pass.willbes.net/m/lecture/show/cate/3022/pattern/only/prod-code/176001" target="_blank" alt="이윤호 회계학 심화" class="a02">
        <a href="https://pass.willbes.net/m/lecture/show/cate/3022/pattern/only/prod-code/175992" target="_blank" alt="박창한 세법 기본" class="a03">
        <a href="https://pass.willbes.net/m/lecture/show/cate/3022/pattern/only/prod-code/175998" target="_blank" alt="박창한 세법 심화" class="a04">
        <a href="https://pass.willbes.net/promotion/index/cate/3022/code/1983" target="_blank" alt="세무직 패스" class="a05">
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