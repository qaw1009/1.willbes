@extends('willbes.pc.layouts.master')

@section('content')
    <style>
        .gosi .tx-color {
            color: #ba5610;
        }
        .gosi .will-nTit {border:0; font-size:46px}
        .gosi .will-nTit span {color:#ba5610}

        .gosi .Menu h3 {border:0}

        /**/
        .gosi-bnfull-Sec {position:relative; margin:0; height: 90px !important;}
        .gosi-bnfull {position: absolute;
            top:0;
            left:50%;
            margin-left:-1000px;
            width: 2000px;
            min-width: 1120px;
            max-width: 2000px;
            height: 90px;
            overflow: hidden;}
        .gosi-bnfull .bx-wrapper .sliderBar img {width:2000px !important; height:90px}

        /*상단 메인 배너*//
        .gosi .gosi-Sec {
            width: 100%;
            max-width: 2000px;
        }
        .gosi .gosi-bntop {position:relative; margin:0; height: 460px !important;}
        .gosi .gosi-bntop .GositabBox {
            position: absolute;
            top:0;
            left:50%;
            margin-left:-1000px;
            width: 2000px;
            min-width: 1120px;
            max-width: 2000px;
            height: 460px;
            overflow: hidden;
        }

        .gosi .gosi-bntop .GositabBox p {position:absolute; top:50%; left:50%; margin-top:-28px; width:32px; height:50px; cursor:pointer;
            background: url(https://static.willbes.net/public/images/promotion/main/2012_arrow_01.png) no-repeat left center;  opacity:0.2; filter:alpha(opacity=20);}
        .gosi .gosi-bntop .GositabBox p a {display:none;}
        .gosi .gosi-bntop .GositabBox p.leftBtn {margin-left:-620px;}
        .gosi .gosi-bntop .GositabBox p.rightBtn {margin-left:588px; background-position: right center;}
        .gosi .gosi-bntop .GositabBox p:hover {opacity:100; filter:alpha(opacity=100);}

        .gosi .gosi-bntop .GositabList {
            position: absolute;
            top:404px;
            width:100%;
            z-index: 50;
            background-color: rgba(0,0,0,0.5);
            padding:10px 0;
        }

        .gosi .gosi-bntop .Gositab {width:1120px; margin:0 auto; text-align:center}
        .gosi .gosi-bntop .Gositab:after {content:""; display:block; clear:both}
        .gosi .gosi-bntop .Gositab li {display:inline-block;  width: calc(11.11111% - 2px);}
        .gosi .gosi-bntop .Gositab li a {display:block; text-align:center; line-height:1.2; font-size: 15px; color:#b4b4b4;}
        .gosi .gosi-bntop .Gositab li a:hover,
        .gosi .gosi-bntop .Gositab li a.active {color:#fff; font-weight: bold;}

        /**/
        .gosi .gosi-bn02 {margin-top:100px}
        .gosi .gosi-bn02 ul {margin-right:-20px}
        .gosi .gosi-bn02 li {
            display: inline;
            float: left;
            width: 265px;
            margin-right:20px;
        }
        .gosi .gosi-bn02 ul:after {
            content: "";
            display: block;
            clear: both;
        }
        .gosi .gosi-bn02 .slider {width: 265px; height:123px; overflow:hidden;}
        .gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager {
            width: auto;
            left: 0;
            bottom: -20px;
            text-align: center;
        }
        .gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager.bx-default-pager a {
            background: #e1e1e1;
        }
        .gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager.bx-default-pager a:hover,
        .gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager.bx-default-pager a.active,
        .gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager.bx-default-pager a:focus {
            background: #898989 !important;
        }

        /**/
        .gosi-bn03 {margin-top:120px; padding-bottom:100px}
        .gosi-bn03 ul {margin-top:60px; margin-right:-20px}
        .gosi-bn03 li {display:inline; float:left; width:265px; margin-right:20px}
        .gosi-bn03 li:first-child {width:550px;}
        .gosi-bn03 ul:after {content: ""; display: block; clear:both}
        .gosi-bn03 .sliderNum {height:303px; overflow:hidden;}
        .gosi-bn03 .nSlider .bx-wrapper .bx-controls-direction {
            position: absolute;
            top: 310px;
            left:0;
            right: 0;
            width: 100%;
            height: 20px;
            text-align:center;
        }
        .gosi-bn03 .nSlider .bx-wrapper .bx-controls-direction a {
            width: 20px;
            height: 20px;
        }
        .gosi-bn03 .nSlider .bx-wrapper a.bx-prev {
            background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat right top;
            left:145px !important;
        }
        .gosi-bn03 .nSlider .bx-wrapper a.bx-next {
            background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat left top;
            left:100px !important;
        }
        .gosi-bn03 li:first-child .bx-wrapper a.bx-prev {
            left:290px !important;
        }
        .gosi-bn03 li:first-child .bx-wrapper a.bx-next {
            left:240px !important;
        }
        .gosi-bn03 .nSlider .bx-wrapper .bx-pager {
            width: auto;
            position: absolute;
            top: 315px;
            left:0;
            right: 0;
            bottom: 0;
            font-size: 11px;
            font-weight: 300;
            color: #000;
            margin: 0;
            padding: 0;
            letter-spacing: 0;
        }

        /* */
        .gosi-bnfull-Sec02 {position:relative; height: 190px; background: url(https://static.willbes.net/public/images/promotion/main/2003/3019_1120x190_bg.jpg) repeat-x left bottom; }
        .gosi-bnfull-Sec02 .gosi-bnfull02 {width: 1120px; height: 190px; margin:0 auto; overflow: hidden;}
        .gosi-bnfull-Sec02 p {position:absolute; top:70%; left:50%; margin-top:-19px; width:22px; height:38px; cursor:pointer;
            background: url(https://static.willbes.net/public/images/promotion/main/arrow_w22.png) no-repeat left center;  opacity:0.4; filter:alpha(opacity=40);}
        .gosi-bnfull-Sec02 p a {display:none;}
        .gosi-bnfull-Sec02 p.leftBtn {margin-left:-620px;}
        .gosi-bnfull-Sec02 p.rightBtn {margin-left:588px; background-position: right center;}
        .gosi-bnfull-Sec02 p:hover {opacity:100; filter:alpha(opacity=100);}

        /*교수진*/
        .gosi-profWrap {background:#c0bcb0; padding:130px 0}
        .gosi-profWrap .will-nTit {color:#fff; margin-bottom:60px}
        .gosi-profWrap .will-nTit span {color:#535046}

        .gosi-tabs-contents-wrap {width:1120px; height:470px; overflow:hidden}
        .gosi-gate-prof li {
            display: inline;
            float: left;
            margin-right:15px;
            width: 208px;
            height:470px;
            background:#fff;
        }

        .gosi-gate-prof li:last-child {margin:0}
        .gosi-gate-prof:after {
            content: "";
            display: block;
            clear: both;
        }
        .gosi-gate-prof .nSlider {}
        .gosi-gate-prof .nSlider .sliderProf div {width: 208px !important; height:470px; position:relative;}
        .gosi-gate-prof .nSlider .bx-wrapper .bx-controls-direction {
            position: absolute;
            top: 425px;
            left:0;
            right: 0;
            width: 100%;
            height: 20px;
            text-align:center;
        }
        .gosi-gate-prof .nSlider .bx-wrapper .bx-controls-direction a {
            width: 20px;
            height: 20px;
        }
        .gosi-gate-prof .nSlider .bx-wrapper a.bx-prev {
            background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat right top;
            left:120px !important;
        }
        .gosi-gate-prof .nSlider .bx-wrapper a.bx-next {
            background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat left top;
            left:70px !important;
        }
        .gosi-gate-prof .nSlider .bx-wrapper .bx-pager {
            width: auto;
            position: absolute;
            top: 430px;
            left:0;
            right: 0;
            bottom: 0;
            font-size: 11px;
            font-weight: 300;
            color: #000;
            margin: 0;
            padding: 0;
            letter-spacing: 0;
        }

    </style>
    <!-- Container -->

    <div id="Container" class="Container gosi NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="gosi-bnfull-Sec">
            <div class="gosi-bnfull">
                {!! banner_html(element('메인_상단띠배너', $data['arr_main_banner']), 'sliderBar') !!}
            </div>
        </div>

        <div class="Section gosi-Sec NSK">
            <div class="gosi-bntop">
                @if(empty($data['arr_main_banner']['메인_빅배너']) === false)
                    <div id="TechRollingSlider" class="GositabBox">
                        {!! banner_html($data['arr_main_banner']['메인_빅배너'], 'GositabSlider') !!}

                        <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                        <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p>
                    </div>

                    <div id="TechRollingDiv" class="GositabList">
                        <div class="Gositab">
                            @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                                <li><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{!! $row['BannerName'] !!}</a></li>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="Section gosi-bn02">
            <div class="widthAuto">
                <ul>
                    @for($i=1;$i<=4;$i++)
                        <li>
                            <div class="bSlider">
                                @if(isset($data['arr_main_banner']['메인_교수홍보' . $i]) === true)
                                    {!! banner_html(element('메인_교수홍보' . $i, $data['arr_main_banner']),'slider') !!}
                                @endif
                            </div>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section gosi-bn03">
            <div class="widthAuto">
                <div class="tx16 mb20">교수님 추천강좌 / 이벤트 / 최신소식</div>
                <div class="will-nTit NSK-Black">지금 바로 주목해야 할 <span>HOT PICK</span></div>
                <ul>
                    @for($i=1; $i<=3; $i++)
                        @if(isset($data['arr_main_banner']['메인_핫픽'.$i]) === true)
                            <li class="nSlider">
                                {!! banner_html(element('메인_핫픽'.$i, $data['arr_main_banner']), 'sliderNum') !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        @if(isset($data['arr_main_banner']['메인_중간띠배너']) === true)
            <div class="gosi-bnfull-Sec02">
                <div class="gosi-bnfull02">
                    {!! banner_html($data['arr_main_banner']['메인_중간띠배너'], 'sliderBar02') !!}

                    <p class="leftBtn" id="imgBannerLeft02"><a href="#none">이전</a></p>
                    <p class="rightBtn" id="imgBannerRight02"><a href="none">다음</a></p>
                </div>
            </div>
        @endif

        <div class="Section">
            <div class="widthAuto">
                {!! banner_html(element('메인_미들배너', $data['arr_main_banner'])) !!}
            </div>
        </div>

        <div class="Section gosi-profWrap">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">합격을 책임질 <span>7급 대표 교수진</span></div>
                <div class="gosi-tabs-contents-wrap">
                    <div class="gosi-tabs-content">
                        <ul class="gosi-gate-prof">
                            <li>
                                @for($i=1; $i<=5; $i++)
                                    @if(isset($data['arr_main_banner']['메인_교수진'.$i]) === true)
                                        <div class="nSlider">
                                            {!! banner_html(element('메인_교수진'.$i, $data['arr_main_banner']), 'sliderProf') !!}
                                        </div>
                                    @endif
                                @endfor
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section NG mt130">
            <div class="widthAuto">
                {{-- study comment include --}}
                @include('willbes.pc.site.main_partial.study_comment_' . $__cfg['SiteCode'])
            </div>
        </div>
        <!-- 수강후기 //-->

        <div class="Section NSK mt90">
            <div class="widthAuto">
                <div class="willbesLec">
                    <div class="smallTit mb30">
                        <p><span>합격 콘텐츠를 한 눈에! <strong>윌비스 강좌</strong></span></p>
                    </div>

                    {{-- best product include --}}
                    @include('willbes.pc.site.main_partial.lecture_' . $__cfg['SiteCode'])

                    <div class="will-listTit mt45">무료특강</div>
                    <ul class="freeLectBx">
                        @for($i=1; $i<=2; $i++)
                            @if(isset($data['arr_main_banner']['메인_무료특강'.$i]) === true)
                                <li>
                                    {!! banner_html($data['arr_main_banner']['메인_무료특강'.$i], '', '', true) !!}
                                </li>
                            @endif
                        @endfor
                    </ul>
                </div>
                <!-- willbesLec//-->

                <div class="willbesNews">
                    <div class="smallTit mb30">
                        <p><span>윌비스 <strong>소식</strong></span></p>
                    </div>
                    {{-- board include --}}
                    @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'] . '_box')
                </div>
                <!--willbesNews //-->
            </div>
        </div>

        <div class="Section NSK mt90 mb90">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>

    </div>
    <!-- End Container -->

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

    <script src="/public/js/willbes/jquery.counterup.min.js"></script>
    <script src="/public/js/willbes/waypoints.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function( $ ) {
            $('#counter').counterUp({
                delay: 11, // the delay time in ms
                time: 1000 // the speed time in ms
            });
        });
    </script>

    <script type="text/javascript">
        $(function() {
            $('.sliderBar').bxSlider({
                mode:'fade',
                auto: true,
                touchEnabled: false,
                controls: false,
                sliderWidth:2000,
                pause: 3000,
                autoHover: true,
                pager: false,
            });
        });

        //상단 메인 배너
        $(function(){
            var slidesImg = $(".GositabSlider").bxSlider({
                mode:'horizontal',
                touchEnabled: false,
                speed:400,
                pause:5000,
                sliderWidth:2000,
                auto : true,
                autoHover: true,
                pagerCustom: '#TechRollingDiv',
                controls:false,
                onSliderLoad: function(){
                    $("#TechRollingSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
            $("#imgBannerRight").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerLeft").click(function (){
                slidesImg.goToNextSlide();
            });
        });

        /*bar 배너 롤링 */
        $(function() {
            var slidesImg02 = $(".sliderBar02").bxSlider({
                mode:'fade',
                auto: true,
                touchEnabled: false,
                controls: false,
                sliderWidth:2000,
                pause: 3000,
                autoHover: true,
                pager: false,
            });
            $("#imgBannerRight02").click(function (){
                slidesImg02.goToPrevSlide();
            });

            $("#imgBannerLeft02").click(function (){
                slidesImg02.goToNextSlide();
            });
        });

        /*교수진*/
        $(function() {
            $('.sliderProf').bxSlider({
                auto: true,
                controls: true,
                pause: 4000,
                pager: true,
                pagerType: 'short',
                slideWidth: 208,
                minSlides:1,
                maxSlides:1,
                moveSlides:1,
                adaptiveHeight: true,
                infiniteLoop: true,
                touchEnabled: false,
                autoHover: true,
                onSliderLoad: function(){
                    $(".gosi-gate-prof").css("visibility", "visible").animate({opacity:1});
                }
            });
        });

        /*윌비스 강좌*/
        $(function(){
            $('.prof-subject').bxSlider({
                speed:800,
                responsive:true,
                infiniteLoop:true,
                pager:false,
                slideWidth:78,
                minSlides:1,
                maxSlides:8
            });
        });

        /*수강후기*/
        $(function() {
            $('.sliderNumV').bxSlider({
                mode: 'vertical',
                auto: true,
                controls: true,
                infiniteLoop: true,
                slideWidth: 1120,
                pagerType: 'short',
                minSlides: 3,
                pause: 3000,
                pager: true,
                onSliderLoad: function(){
                    $(".vSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
        });
    </script>
@stop