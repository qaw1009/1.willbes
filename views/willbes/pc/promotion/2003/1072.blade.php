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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .WB_con01 {background:url(http://file3.willbes.net/new_gosi/2018/10/EV181024Y_01_bg.jpg) no-repeat center top; margin-top:20px}
        .WB_con01 div {position:relative; width:1210px; margin:0 auto}

        .WB_con01 div span {position:absolute}
        .WB_con01 div span.t1 {top:220px; left:71px; width:187px; height:202px; z-index:10;
            -webkit-animation:slideOutLeft .5s ease-out;
            animation:slideOutLeft .5s ease-out;
        }
        .WB_con01 div span.t2 {top:220px; left:212px; width:184px; height:204px; z-index:9;
            -webkit-animation:slideOutLeft 1s ease-out;
            animation:slideOutLeft 1s ease-out;
        }
        .WB_con01 div span.t3 {top:207px; left:352px; width:202px; height:212px; z-index:8;
            -webkit-animation:slideOutLeft 1.5s ease-out;
            animation:slideOutLeft 1.5s ease-out;
        }

        @@keyframes slideOutLeft {
             from {
                 -webkit-transform: translate3d(0, 0, 0);
                 transform: translate3d(100%, 0, 0);
                 opacity:0;
             }

             to {
                 visibility: hidden;
                 -webkit-transform: translate3d(-100%, 0, 0);
                 transform: translate3d(0, 0, 0);
                 opacity:1;
             }
         }
        @@-webkit-keyframes slideOutLeft {
             from {
                 -webkit-transform: translate3d(0, 0, 0);
                 transform: translate3d(100%, 0, 0);
                 opacity:0;
             }

             to {
                 visibility: hidden;
                 -webkit-transform: translate3d(-100%, 0, 0);
                 transform: translate3d(0, 0, 0);
                 opacity:1;
             }
         }

        .WB_con02 {background:#eee; padding-bottom:80px}
        .WB_con03 {background:url(http://file3.willbes.net/new_gosi/2018/10/EV181024Y_03_bg.jpg) no-repeat center top;}
        .WB_con04 {background:#eee}
        .WB_con05 {background:#ee4f5e}
        .WB_info {background:#292b33}

        /* 슬라이드배너 */
        .bannerImg2 {position:relative; width:926px; margin:0 auto}
        .bannerImg2 img {width:100%}
        .bannerImg2 p {position:absolute; top:50%; width:51px; z-index:100}
        .bannerImg2 p a {cursor:pointer}
        .bannerImg2 p.leftBtn2 {left:-60px; top:45%; width:44px; height:44px}
        .bannerImg2 p.rightBtn2 {right:-60px; top:45%; width:44px; height:44px}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox WB_con01">
            <div>
                <img src="http://file3.willbes.net/new_gosi/2018/10/EV181024Y_01.jpg" alt="전수환 경영학 기본강의+문제풀이"  />
                <span class="t1"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181024Y_01_t1.png" alt="경"  /></span>
                <span class="t2"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181024Y_01_t2.png" alt="영"  /></span>
                <span class="t3"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181024Y_01_t3.png" alt="학"  /></span>
            </div>
        </div>
        <!--//WB_con01-->

        <div class="evtCtnsBox WB_con02">
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181024Y_02.jpg" alt="수강평"  />
            <div class="bannerImg2">
                <ul id="slidesImg2">
                    <li><img src="http://file3.willbes.net/new_gosi/2018/10/EV181024Y_02_i1.png" alt="수강평1"/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/10/EV181024Y_02_i2.png" alt="수강평2"/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/10/EV181024Y_02_i3.png" alt="수강평3"/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/10/EV181024Y_02_i4.png" alt="수강평4"/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/10/EV181024Y_02_i5.png" alt="수강평5"/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/10/EV181024Y_02_i6.png" alt="수강평6"/></li>
                </ul>
                <p class="leftBtn2"><a id="imgBannerLeft2"><img src="http://file3.willbes.net/new_gosi/2017/11/EV171129_army2_arr_l.png"></a></p>
                <p class="rightBtn2"><a id="imgBannerRight2"><img src="http://file3.willbes.net/new_gosi/2017/11/EV171129_army2_arr_r.png"></a></p>
            </div>
        </div>
        <!--WB_con02//-->

        <div class="evtCtnsBox WB_con03" >
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181024Y_03.jpg" alt="경영학 마스터 전수환"/>
        </div>
        <!--WB_con03//-->

        <div class="evtCtnsBox WB_con04" >
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181024Y_04.jpg" alt="경영학 교재소개"/>
        </div>
        <!--WB_con04//-->

        <div class="evtCtnsBox WB_con05" >
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181024Y_05_1.jpg" alt="경영학 종합 패키지" usemap="#Map181024" border="0" />
            <map name="Map181024" id="Map181024">
                <area shape="rect" coords="860,747,1093,832" href="{{ site_url('/package/show/cate/3024/pack/648001/prod-code/150632') }}" target="_blank" alt="2019 경영학 패키지">
                <area shape="rect" coords="860,886,1093,972" href="{{ site_url('/package/show/cate/3024/pack/648001/prod-code/146647') }}" target="_blank" alt="2019 경영학 기본강의">
                <area shape="rect" coords="860,1027,1093,1111" href="{{ site_url('/package/show/cate/3024/pack/648001/prod-code/146649') }}" target="_blank" alt="2019 감사직 객관식 문제풀이">
        </div>
        <!--WB_con05//-->

        <div class="evtCtnsBox WB_info">
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181024Y_06.jpg" alt=""/>
        </div>
        <!--WB_info//-->

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg2 = $("#slidesImg2").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:926,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft2").click(function (){
                slidesImg2.goToPrevSlide();
            });

            $("#imgBannerRight2").click(function (){
                slidesImg2.goToNextSlide();
            });
        });
    </script>
@stop