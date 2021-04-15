@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            z-index:1;
            width:210px;
        }
        .skybanner a {display:block; margin-bottom:5px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/04/2176_top_bg.jpg) no-repeat center;}        

        .evtMenu {background:#210b33; width:100%;}
        .tabs {width:1120px; margin:0 auto;}
        .tabs li {display:inline; float:left; width:25%}
        .tabs li a {display:block; text-align:center; font-size:16px; color:#fff; padding:20px 0; line-height:1.5; border-right:1px solid #fff}
        .tabs li:last-child a {border:0}
        .tabs li a span {font-size:20px; font-weight:bold}
        .tabs li a:hover,
        .tabs li a.active {background:#fff; color:#210b33;}
        .tabs:after {content:""; display:block; clear:both}

        .evt01 {background:#f2f2f2; padding-bottom:150px}

        .evt02 {background:#ff8151;}

        .evt03 {background:#f2f2f2; padding-bottom:150px}
        .evt03 .downbtn {width:500px; margin:0 auto 100px}
        .evt03 .downbtn a {display:block; color:#fff; background:#282828; font-size:30px; font-weight:bold; padding:20px 0; border-radius:4px}
        .evt03 .downbtn a:hover {background:#000;}

        .evt04 {background:#6a299d;padding-bottom:150px}
        .evt04 div a {display:inline-block; color:#210b33; background:#ff8151; font-size:30px; font-weight:bold; padding:20px 40px; border-radius:4px; margin:0 20px}
        .evt04 div a:hover {background:#000; color:#fff}

        .evtCtnsBox iframe {width:940px; height:528px; margin:0 auto; display:block}

        .fixed {position:fixed; width:100%; background:#210b33; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10;
        }

        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}
        .slide_con p {position:absolute; top:10%; width:56px; height:56px; margin-top:-28px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-24px}
        .slide_con p.rightBtn {right:-24px}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
        #slidesImg3:after {content::""; display:block; clear:both}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <a href="https://pass.willbes.net/pass/support/notice/show?board_idx=328086&s_campus=605001" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2176_sky01.png" alt="소방학/법규 암기노트 전원증정"></a> 
            <a href="https://pass.willbes.net/pass/promotion/index/cate/3052/code/2156" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2176_sky02.png" alt="선착순 20명 무려 88% 할인!"></a>
        </div>                       

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2176_top.jpg" alt="창업 다마고치" >             
        </div>  

        <div class="evtMenu">
            <ul class="tabs">
                <li>
                    <a href="#tab01" data-tab="tab01" class="top-tab">
                        2021.04.03 소방공채영어<br>
                        <span>해설 강의</span>
                    </a>
                </li>
                <li>
                    <a href="#tab02" data-tab="tab02" class="top-tab">
                        소방영어 NEW STAR<br>
                        <span>시험후기</span>
                    </a>
                </li>
                <li>
                    <a href="#tab03" data-tab="tab03" class="top-tab">
                        소방공채영어<br>
                        <span>적중사례 보기</span>
                    </a>
                </li>
                <li>
                    <a href="#tab04" data-tab="tab04" class="top-tab">
                        소방공채영어<br>
                        <span>강좌 신청하기</span>
                    </a>
                </li>
            </ul>
        </div> 

        <div class="evtCtnsBox evt01"  id="tab01">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2176_01.jpg" alt="창업 다마고치" >
            <iframe src="https://www.youtube.com/embed/M1uD2dcW8pI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div> 

        <div class="evtCtnsBox evt02" id="tab02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2176_02.jpg" alt="창업 다마고치" >
        </div>

        <div class="evtCtnsBox evt03" id="tab03">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2176_03.jpg" alt="창업 다마고치">
            <div class="downbtn">
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="다운로드">더 많은 적중사례 확인하기 →</a>
            </div>
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2176_03_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2176_03_02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2176_03_03.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_p_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_p_next.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt04" id="tab04">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2176_04.jpg" alt="BEST 수강후기" >
            <div>
                <a href="https://pass.willbes.net/promotion/index/cate/3023/code/1724" target="_blank">온라인 강의 신청 ></a>
                <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050&campus_ccd=605001" target="_blank">학원 실강 신청 ></a>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">  
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:2000,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });

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