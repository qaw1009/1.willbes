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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/


        /*2018-07-31 상단변경*/
        .layer {width:100%; height:800px; -ms-overflow:hidden;}
        .video {width:100%; height:800px; overflow:hidden; position:relative; opacity:0.4; box-shadow:0px rgba(0,0,0,0.4); background:#000}
        .pngimg	 {width:1120px; margin:0 auto; position:relative; top:-800px;}
        .pngimg-real {width:1120px; height:0px; position:absolute;top:0;}
        .wb_mp4 {width:100%; text-align:center; margin:0 auto; background:#000; min-width:1120px;}
        .wb_mp4 ul {width:100%; margin:0 auto; min-width:1120px;}

        /* 상단탭 */
        .wb_top {background:#ddd;}
        .tab_box {position:relative; width:1120px; height:110px; display:block; margin:0 auto; }
        .tab_menu {position:absolute; width:1120px; height:110px; top:0px; text-align:center;}
        .tab_menu li {display:inline; float:left;}
        .tab_menu li a img.off {display:block}
        .tab_menu li a img.on {display:none}

        .wb_cts02 {background:#000 url(https://static.willbes.net/public/images/promotion/2019/07/1101_1_bg.png) no-repeat center;}
        .wb_cts03 {background:#eee;padding:70px 0;}
        .wb_cts04 {background:#fff;}
        .wb_cts05 {background:#eee; padding:70px 0;}
        .wb_cts12 {background:#e1eaf1;}
        .wb_cts06 {background:#fff;}
        .wb_cts07 {background:#eee; padding:70px 0;}
        .wb_cts08 {background:#fff;}
        .wb_cts09 {background:#fff;}
        .wb_cts10 {background:#fff;}
        .wb_cts11 {background:#fff; padding-bottom:70px;}

        /* 슬라이드배너 */
        .bannerImg1 {position:relative; background:#eee; width:810px; margin:0 auto; z-index:10; }
        .bannerImg1 p {position:absolute; top:200px; width:50px; z-index:1000}
        .bannerImg1 img {width:100%;}
        .bannerImg1 p a {cursor:pointer}
        .bannerImg1 p.left_arr {left:-10%;  width:30px; height:30px;}
        .bannerImg1 p.right_arr {right:-10%;width:30px; height:30px;}

        /* 신청 팝업 */
        .Pstyle {opacity:0; display:none; position:relative; width:auto; padding:0px; background:#f2f2f2;}
        .b-close {position:absolute;right:5px;top:5px;padding:5px;display:inline-block;cursor: pointer; color:#000;}
        .popcontent {height:auto; width:auto; float:left;}
        .popcontent h2{margin-top:15px; font-size:21px; font-weight:bold; color:#fff; padding-top:0px; background-color:#0b0c18; line-height:46px; letter-spacing:-1px; text-align:center; font-family: 'Noto Sans KR'; }
        .popcontent h3{font-size:14px; font-weight:bold; color:#b3462e; padding:2px; background-color:#f2f2f2; line-height:25px; text-align:center; letter-spacing:-0.8px; padding-top:20px; font-family: 'Noto Sans KR'; border-bottom:1px #ccc solid;  }
        .tit {font-size:13px; font-weight:bold;  color:#000;}
        .inBx_con {padding-top:10px; border-top:0}
        .inBx_con ul {padding-top:10px;}
        .inBx_con ul li	{padding:4px 40px; border-top:0}
        .align_l {float:left; text-align:center !important;}
        .btn_lec {margin:20px; text-align:center !important;}
        .cursor1 {cursor:hand;}

        #nav {
            display:block;
            position:fixed;
            bottom:0;
            width:100%;
            min-width:1120px;
            text-align:center;
            background: url(http://file3.willbes.net/new_gosi/2018/10/EV181030_scroll_bn_bg.png) repeat-x;
            z-index:20;}
        #nav ul { width:100%; margin:0 auto;}

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            z-index:1;
        }
    </style>

    <form id="promotionForm" name="promotionForm" method="GET">
        @if(empty($arr_base['test_type']) === false)
            <input type="hidden" name="type" value="{{ $arr_base['test_type'] }}">
        @endif
    </form>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_mp4" id="main">
            <div class="layer">
                <div class="video">
                    <video style="width:100%;" autoplay loop muted="">
                        <source src="https://static.willbes.net/public/images/promotion/2019/07//1101_bg.mp4" type="video/mp4"></source>
                    </video>
                </div>
                <div class="pngimg">
                    <div class="pngimg-real">
                        <img src="https://static.willbes.net/public/images/promotion/2019/07/1101_t.png" alt="윌비스 관리반" />
                    </div>
                </div>
            </div>
        </div>


        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1101_1.png" alt="#" />
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1101_2.png" alt="#" />
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1101_3.png"alt="#" />
        </div>
        <!--wb_cts04//-->


        <div class="evtCtnsBox wb_cts07">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1101_4txt.png" alt="" />
            <div class="bannerImg1">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1101_03_4_tab1.png" alt="1"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1101_03_4_tab2.png" alt="1"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1101_03_4_tab3.png" alt="2"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1101_03_4_tab4.png" alt="3"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1101_03_4_tab5.png" alt="4"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1101_03_4_tab6.png" alt="5"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1101_03_4_tab7.png" alt="6"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1101_03_4_tab8.png" alt="7"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1101_03_4_tab9.png" alt="8"/></li>
                </ul>
                <p class="left_arr"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2019/07/1101_arr_l.png"></a></p>
                <p class="right_arr"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2019/07/1101_arr_r.png"></a></p>
            </div>
        </div>
        <!--wb_cts07//-->

        <div class="evtCtnsBox wb_cts08">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1101_7.png"alt="#" />
        </div>
        <!--wb_cts08//-->

        <div class="evtCtnsBox wb_cts11">
            <p id="lec_send"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181005_9.png" alt="신청방식" /></p>
            <p><a onclick="go_popup()"><img src="https://static.willbes.net/public/images/promotion/2019/07/1101_btn.png" alt="입실상담신청하기"></a></p>
            <p><img src="https://static.willbes.net/public/images/promotion/2019/07/1101_03_6_tel.png" alt="문의및 접수" /></p>
        </div>
        <!--wb_cts11//-->

        <!--팝업-->
        <div id="popup_{{ $arr_base['promotion_code'] }}"></div>
        <!--//팝업-->
    </div>
    <!-- End Container -->


    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);

            var slidesImg1 = $("#slidesImg1").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:810,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft").click(function (){
                slidesImg1.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg1.goToNextSlide();
            });

            $(document).on('click', '.b-modal', function () {
                /*$('.b-modal').on('click', function() {*/
                /*$('.b-modal').click(function () {*/
                console.log(1);
            });
        });

        function go_popup() {
            //팝업 내용 초기화
            $('.Pstyle').html('');

            var url = "{{ site_url("/pass/promotion/popup/1123") }}";
            var data = $('#promotionForm').serialize();

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','N') !!}
            sendAjax(url,
                data,
                function(d){
                    $("#popup_{{ $arr_base['promotion_code'] }}").html(d).end();
                    $('#popup').bPopup();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }
    </script>


    <script>

    </script>
@stop