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
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative;}

        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/07/2277_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#0d1121}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/07/2277_02_bg.jpg) repeat-y center center;}
        /* 슬라이드배너 */
        .slide_con {position:relative; width:1120px; margin:0 auto}	
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:0; top:46%; width:67px; height:67px;}
        .slide_con p.rightBtn {right:0;top:46%; width:67px; height:67px;}
        .evt03 {background:#fff;}

        .snslink {
            width: 980px;
            margin: 0 auto 50px;
        }
        .snslink li {
            display: inline;
            float: left;
            width: 50%;
            text-align: center;
        }
        .snslink:after {
            content:'';
            display: block;
            clear:both;
        }

    </style>

    <div class="evtContent NSK mb100">      
        <div class="evtCtnsBox evtTop">                       
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2277_top.png" title="적중은 신광은 경찰팀!" data-aos="flip-left">    
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2277_01.jpg" title="신광은 경찰팀 적중" data-aos="fade-left">
        </div>

        <div class="evtCtnsBox evt02">
            <div class="slide_con" data-aos="fade-left">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2277_02_01.jpg" alt="신광은" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2277_02_02.jpg" alt="장정훈" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2277_02_03.jpg" alt="김원욱" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2277_02_04.jpg" alt="하승민" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2277_02_05.jpg" alt="오태진" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2277_02_06.jpg" alt="원유철" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2277_02_07.jpg" alt="김현정" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2021/07/2277_arrow_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2021/07/2277_arrow_next.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <div class="wrap" data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2277_03.jpg" title="적중문제를 소문 봄">
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운로드" style="position: absolute; left: 23.84%; top: 64.55%; width: 40.98%; height: 3.5%; z-index: 2;"></a> 
            </div>         
            <ul class="snslink">
                <li><a href="http://cafe.daum.net/policeacademy" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/2021/02/snsline01.png"alt="다음카페 경사모" /></a></li>
                <li><a href="http://cafe.naver.com/polstudy" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/2021/02/snsline02.png" alt="네이버카페 경꿈사" /></a></li>               
            </ul>
        </div>

        {{--강사 이미티콘 홍보url댓글
        @include('html.event_replyEmoticonUrl')--}}

        <!--  이모티콘 댓글 -->
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_emoticon_partial')
        @endif

	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>
    <script type="text/javascript">

        function doEvent() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var url = "{{front_url('/predict/index/' . (empty($arr_promotion_params['PredictIdx']) === true ? '' : $arr_promotion_params['PredictIdx']))}}";
            window.open(url,'event', 'scrollbars=no,toolbar=no,resizable=yes,width=660,height=700,top=50,left=100');
        }

        function doEvent2() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.', '') !!}
            var url = "{{ site_url('/promotion/popup/' . $arr_base['promotion_code']) }}" ;
            window.open(url,'event2', 'scrollbars=no,toolbar=no,resizable=yes,width=665,height=629,top=50,left=100');
        }

        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:1120,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
                });
            
                $("#imgBannerLeft3").click(function (){
                    slidesImg3.goToPrevSlide();
                });
            
                $("#imgBannerRight3").click(function (){
                    slidesImg3.goToNextSlide();
                });
        });

    </script>

@stop