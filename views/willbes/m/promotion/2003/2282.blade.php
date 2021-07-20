@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox ul:after {content:""; display:block; clear:both}

    .evtTop {position:relative}

    .embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } 
    .embed-container iframe, 
    .embed-container object, 
    .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }

    .evtMenu {background:#f3f3f3; width:100%; border-bottom:1px solid #edeff0; border-top:1px solid #edeff0}
    .tabs {width:100%; max-width:720px; margin:0 auto;}
    .tabs li {display:inline; float:left; width:20%}
    .tabs li a {display:block; text-align:center; font-size:16px; line-height:1.5; padding:15px 0; color:#ccc; font-weight:bold; letter-spacing:-1px;background:#333743;}
    .tabs li a.active {background:#d8ff00;color:#333743;}
    .tabs:after {content:""; display:block; clear:both;}
    
    .fixed {position:fixed; width:100%; left:0; z-index:10; border:0; opacity: .95;} 
    
    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 325px)  {
    .tabs li a {font-size:14px;}
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
        <img src="https://static.willbes.net/public/images/promotion/2021/07/2282m_top.jpg" alt="실전덕후단" > 
        <div class='embed-container'>
            <iframe src='https://www.youtube.com/embed/nAQUdmuvUuw?rel=0' frameborder='0' allowfullscreen></iframe>
        </div>
    </div>  

    <div class="evtMenu">
        <ul class="tabs">
            <li><a href="#tab01" data-tab="tab01" class="top-tab">실전464</a></li>
            <li><a href="#tab02" data-tab="tab02" class="top-tab">원데이특강</a></li>
            <li><a href="#tab03" data-tab="tab03" class="top-tab">새벽모고</a></li>
            <li><a href="#tab04" data-tab="tab04" class="top-tab">온라인첨삭</a></li>
            <li><a href="#tab05" data-tab="tab05" class="top-tab">EVENT</a></li>
        </ul>
    </div> 
    
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/2282m_01.jpg" alt="선택지" >
    </div>

    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/2282m_02.jpg" alt="커리큘럼" >
    </div>

    <div class="evtCtnsBox evt03" id="tab01">
        <div>
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2282m_03.jpg" alt="실전464" >
            <a href="https://pass.willbes.net/m/lecture/index/pattert_n/only?search_order=regist&cate_code=3019&subjecidx=&search_text=UHJvZE5hbWU6NDY0" target="_blank" title="" style="position: absolute;left: 28%;top: 84.5%;width: 44.27%;height: 8.8%;z-index: 2;"></a>
        </div>    
    </div>

    <div class="evtCtnsBox evt04" id="tab02">
        <div>
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2282m_04.jpg" alt="실전 원데이특강" >
            <a href="https://pass.willbes.net/m/lecture/index/pattern/only?search_order=regist&cate_code=3019&subject_idx=&search_text=UHJvZE5hbWU67JuQ642w7J20" target="_blank" title="" style="position: absolute;left: 20%;top: 84.5%;width: 59.77%;height: 8.8%;z-index: 2;"></a>
        </div>    
    </div>

    <div class="evtCtnsBox evt05" id="tab03">
        <div>
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2282m_05.jpg" alt="새벽실전모의고사" >
            <a href="https://pass.willbes.net/m/lecture/index/pattern/only?search_order=regist&cate_code=3019&subject_idx=&search_text=UHJvZE5hbWU6NDY0" target="_blank" title="" style="position: absolute;left: 23%;top: 85%;width: 54.27%;height: 8.8%;z-index: 2;"></a>
        </div>    
    </div>

    <div class="evtCtnsBox evt06" id="tab04">
        <div>
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2282m_06.jpg" alt="첨삭지도반" >
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1067" target="_blank" title="" style="position: absolute;left: 26%;top: 89.5%;width: 47.27%;height: 4.8%;z-index: 2"></a>
        </div>
    </div>

    <div class="evtCtnsBox evt07">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/2282m_07.jpg" alt="이벤트를 미리 만나보세요" >
    </div>

    <div class="evtCtnsBox evt08" id="tab05">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/2282m_08.jpg" alt="기대평 이벤트" >      
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