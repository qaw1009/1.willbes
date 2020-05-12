@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">        
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative;}

        /************************************************************/
        .evtTop {background:#3c5ddd url(https://static.willbes.net/public/images/promotion/2020/05/1628_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#363636}

        .evt02 {background:#1b1c1c; padding:100px 0}
        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}	
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-80px; top:46%; width:67px; height:67px;}
        .slide_con p.rightBtn {right:-80px;top:46%; width:67px; height:67px;}
        .evt03 {background:#fff;}

        .snslink {
            width: 980px;
            margin: 0 auto 50px;
        }
        .snslink li {
            display: inline;
            float: left;
            width: 25%;
            text-align: center;
        }
        .snslink:after {
            content:'';
            display: block;
            clear:both;
        }
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">      
        <div class="evtCtnsBox evtTop">                       
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1628_top.jpg" title="적중은 신광은 경찰팀!">    
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1628_01.jpg" title="신광은 경찰팀 적중">
        </div>

        <div class="evtCtnsBox evt02">
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/05/1628_02_01.jpg" alt="신광은" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/05/1628_02_02.jpg" alt="장정훈" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/05/1628_02_03.jpg" alt="김원욱" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/05/1628_02_04.jpg" alt="하승민" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/05/1628_02_05.jpg" alt="오태진" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/05/1628_02_06.jpg" alt="원유철" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/05/1628_02_07.jpg" alt="김현정" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2019/04/1199_arrow_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2019/04/1199_arrow_next.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1628_03.jpg" usemap="#Map1628a" title="적중문제를 소문내 봄" border="0">
            <map name="Map1628a" id="Map1628a">
                <area shape="rect" coords="272,1326,729,1397" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" />
            </map>
            <ul class="snslink">
                <li><a href="http://cafe.daum.net/policeacademy" target="_blank" ><img src="http://file3.willbes.net/new_cop/common/snsline01.png"alt="다음카페 경사모" /></a></li>
                <li><a href="http://cafe.naver.com/polstudy" target="_blank" ><img src="http://file3.willbes.net/new_cop/common/snsline02.png" alt="네이버카페 경꿈사" /></a></li>
                <li><a href="https://gall.dcinside.com/board/lists/?id=government" target="_blank" ><img src="http://file3.willbes.net/new_cop/common/snsline03.png" alt="디시 공무원 갤러리" /></a></li>
                <li><a href="https://gall.dcinside.com/mgallery/board/lists/?id=policeofficer" target="_blank"><img src="http://file3.willbes.net/new_cop/common/snsline04.png" alt="디시 순경마이너 갤러리" /></a></li>
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

    <script src="/public/js/willbes/jquery.counterup.min.js"></script>
    <script src="/public/js/willbes/waypoints.min.js"></script>
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
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:980,
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