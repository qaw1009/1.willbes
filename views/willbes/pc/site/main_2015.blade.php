@extends('willbes.pc.layouts.master')
@section('content')
<style>
 /*소방공무원 합격 스토리*/
.gosi-bnfull-Sec02 {position:relative; height: 190px; background: url(https://static.willbes.net/public/images/promotion/main/2003/3019_1120x190_bg.jpg) repeat-x left bottom; }
.gosi-bnfull-Sec02 .gosi-bnfull02 {width: 1120px; height: 190px; margin:0 auto; overflow: hidden;}
.gosi-bnfull-Sec02 p {position:absolute; top:70%; left:50%; margin-top:-19px; width:22px; height:38px; cursor:pointer;
    background: url(https://static.willbes.net/public/images/promotion/main/arrow_w22.png) no-repeat left center;  opacity:0.4; filter:alpha(opacity=40);}
.gosi-bnfull-Sec02 p a {display:none;}
.gosi-bnfull-Sec02 p.leftBtn {margin-left:-620px;}
.gosi-bnfull-Sec02 p.rightBtn {margin-left:588px; background-position: right center;}
.gosi-bnfull-Sec02 p:hover {opacity:100; filter:alpha(opacity=100);}
</style>
    <link href="/public/css/willbes/style_2015.css?ver={{time()}}" rel="stylesheet">
    <!-- Container -->
    <div id="Container" class="Container incheon NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual mt20">
            <div class="widthAuto">
                @if(isset($data['arr_main_banner']['메인_빅배너']) === true)
                <div class="VisualBox p_re">
                    <div id="MainRollingDiv" class="MaintabList">
                        <ul class="Maintab">
                            @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                                <li><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{{ $row['BannerName'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="MainRollingSlider" class="MaintabBox">
                        <div class="bx-wrapper">
                            <div class="bx-viewport">
                                {!! banner_html($data['arr_main_banner']['메인_빅배너'], 'MaintabSlider') !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="VisualsubBox mt40">
                    <ul>
                        @for($i=1; $i<=3; $i++)
                            @if(isset($data['arr_main_banner']['메인_서브'.$i]) === true)
                                <li>
                                    <div class="bSlider acad">
                                        {!! banner_html($data['arr_main_banner']['메인_서브'.$i], 'slider') !!}
                                    </div>
                                </li>
                            @endif
                        @endfor
                    </ul>
                </div>
            </div>
        </div>

        <div class="Section mt40">
            <div class="widthAuto c_both">
                <div class="f_left">
                    {{--<a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2015_bn_550x150_01.jpg" alt="배너명"></a>--}}
                    {!! banner_html(element('메인_미들1', $data['arr_main_banner'])) !!}
                </div>
                <div class="f_right">
                    {{--<a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2015_bn_550x150_02.jpg" alt="배너명"></a>--}}
                    {!! banner_html(element('메인_미들2', $data['arr_main_banner'])) !!}
                </div>
            </div>
        </div>

        <div class="Section">
            <div class="gosi-bnfull-Sec02">
                <div class="gosi-bnfull02">
                    <a href="https://willbesedu.willbes.net/pass/promotion/index/cate/3126/code/2877" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/main/fire_sec01.jpg" alt="소방공무원 합격 스토리">
                    </a>
                    <p class="leftBtn" id="imgBannerLeft02"><a href="#none">이전</a></p>
                    <p class="rightBtn" id="imgBannerRight02"><a href="none">다음</a></p>
                </div>
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <a href="https://willbesedu.willbes.net/pass/promotion/index/cate/3126/code/2877" target="_blank"> 
                    <img src="https://static.willbes.net/public/images/promotion/main/fire_sec02.jpg" alt="공통점은 합격">
                </a>    
            </div>
        </div>           

        <div class="Section gosi-profWrap">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">합격을 책임질 <span>소방 대표 교수진</span></div>
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

        <div class="Section mt20 c_both">
            <div class="widthAuto">
                <div class="will-acadTit">학원 <span class="tx-color">둘러보기</span></div>
                <div class="acadview">
                    <ul class="avslider">
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_01.jpg">
                        </li>
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_02.jpg">
                        </li>
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_03.jpg">
                        </li>
                        {{--
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_04.jpg">
                        </li>
                        --}}
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_05.jpg">
                        </li>
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_06.jpg">
                        </li>
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_07.jpg">
                        </li>
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_08.jpg">
                        </li>
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_09.jpg">
                        </li>
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_10.jpg">
                        </li>
                        {{--
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_11.jpg">
                        </li>
                        --}}
                    </ul>
                    <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                    <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>
                </div>
            </div>
        </div>

        <div class="Section mt40">
            <div class="widthAuto">
                {{-- board include --}}
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section4_ic mt40">
            @include('willbes.pc.site.main_partial.campus_' . $__cfg['SiteCode'])
        </div>

        <div class="Section mt50 mb50 c_both">
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

    <script type="text/javascript">
        $(function() {
            var slidesImg1 = $(".avslider").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:4,
                maxSlides:4,
                slideWidth: 280,
                slideMargin:12,
                autoHover: true,
                moveSlides:1,
                pager:true,
            });
            $("#imgBannerLeft1").click(function (){
                slidesImg1.goToPrevSlide();
            });
            $("#imgBannerRight1").click(function (){
                slidesImg1.goToNextSlide();
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
    </script>
    {!! popup('657001', $__cfg['SiteCode'], '0', '605005') !!}
@stop