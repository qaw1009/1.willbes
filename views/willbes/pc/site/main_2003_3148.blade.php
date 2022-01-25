@extends('willbes.pc.layouts.master')

@section('content')
    <style>
        .gosi .Menu h3 {height:40px;margin-top:20px;line-height:38px;border-bottom:2px solid #000;}

        /*상단 메인 배너*/
        .gosi .gosi-Sec {
            width: 100%;
            max-width: 2000px;
            margin: 20px auto 0;
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
        .gosi .gosi-bntop .Gositab li {display:inline-block;  width: calc(12.5% - 1.5px);}
        .gosi .gosi-bntop .Gositab li a {display:block; text-align:center; line-height:1.2; font-size: 15px; color:#b4b4b4;}
        .gosi .gosi-bntop .Gositab li a:hover,
        .gosi .gosi-bntop .Gositab li a.active {color:#fff; font-weight: bold;}


        /*교수진*/
        .gosi-profWrap {background:#d3e0e4; padding:130px 0}
        .gosi-profWrap .will_nTit {border:0;font-size:46px;color:#fff;padding-bottom:50px;}
        .gosi-profWrap .will_nTit span {color:#4f6f7c;vertical-align:top;}

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
            top: 445px;
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
            top: 450px;
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

        .Section4_hl {margin:100px auto 50px}
        .Section4_hl .will-acadTit {font-size:19px;font-weight:600;color:#363636;line-height:60px;border-bottom: 2px solid #000;margin-bottom:20px;}
        .Section4_hl .tx-color {color:#643fb5;}
        .willbesNumber .tx-color {color:#643fb5;}
    </style>

    <div id="Container" class="Container gosi NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

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

        <div class="Section">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2003/3148_01.jpg" alt="연간 커리큘럼">
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2003/3148_02.jpg" alt="합격을 위한 운영방식">
            </div>
        </div>

        <div class="Section gosi-profWrap">
            <div class="widthAuto">
                <div class="will_nTit NSK-Black">합격을 책임질 <span>검찰 대표 교수진</span></div>
                <div class="gosi-tabs-contents-wrap">
                    <div class="gosi-tabs-content">
                        <ul class="gosi-gate-prof">
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['arr_main_banner']['메인_교수진'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('메인_교수진'.$i, $data['arr_main_banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section NSK Section4_hl">
            <div class="widthAuto">
                <div class="will-acadTit">윌비스 <span class="tx-color">공무원</span> 학원</div>
                <div class="noticeTabs campus c_both">
                    <div class="tabBox noticeBox_campus">
                        <div id="campus1" class="tabContent">
                            <div class="map_img" id="map">지도영역</div>
                            <div class="map_img" id="alterMap1" style="display: none">
                                <img src="https://static.willbes.net/public/images/promotion/main/2003/3035_map.jpg" alt="김동진 법원팀">
                            </div>
                            <div class="campus_info">
                                <dl>
                                    <dt>
                                        <div class="c-tit"><span class="tx-color">학원</span> 오시는 길</div>
                                        <div class="c-info">
                                            <div class="address">
                                                <span class="a-tit">주소</span>
                                                <span>서울 동작구 노량진로 196 JH빌딩 3층</span>
                                            </div>
                                            <div class="tel">
                                                <span class="a-tit">연락처</span>
                                                <span class="tx-color">1544-0330</span>
                                            </div>
                                        </div>
                                    </dt>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section NSK mt90 mb90">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>
    </div>
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey={{ config_item('kakao_js_app_key') }}&libraries=services"></script>
    <script type="text/javascript" src="/public/js/map_util.js?ver={{time()}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
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

            var info_txt = '<div style="padding:5px; 5px; background:#fff; border: 1px solid midnightblue">윌비스 <strong class="tx-color">한림법학원</strong><br>검찰팀(3층)</div>';
            var $kakaomap = new kakaoMap();
            $kakaomap.config.ele_id = 'map';
            $kakaomap.config.alter_id = 'alterMap1';
            $kakaomap.config.level = 4;
            $kakaomap.config.addr = '서울 동작구 노량진로 196';
            $kakaomap.config.info_txt = info_txt;
            $kakaomap.config.info_txt_x_anchor = 0.5;
            $kakaomap.config.info_txt_y_anchor = 2.2;
            $kakaomap.run();
        });
    </script>
@stop