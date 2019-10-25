@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container lang c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual">        
            <div class="widthAuto NSK mt30">
                <div class="VisualsubBox">
                    <div class="bSlider">
                        {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="Section Section1">
            <div class="widthAuto">
                {!! banner_html(element('메인_띠배너', $data['arr_main_banner'])) !!}
            </div>
        </div>

        <div class="Section Section2 NSK">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2007_sec02s.jpg" alt="g-telp를 선택해야하는 이유">
                {{--
                <ul>
                    <li><a href="https://www.g-telp.co.kr:335/receipt/schedule.asp" target="_blank">시험일정 확인하기</a></li>
                    <li><a href="https://www.g-telp.co.kr:335" target="_blank">원서접수 바로가기</a></li>
                </ul>
                --}}
            </div>
        </div>

        <div class="Section Section3">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2007_sec03.jpg" alt="g-telp를 선택해야하는 이유">
            </div>
        </div>

        <div class="Section Section4">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2007_sec04.jpg" alt="완벽한 수험가이드">
                <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/main/2007_sec04_tab1.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/main/2007_sec04_tab2.jpg" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/main/2007_arrow_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/main/2007_arrow_right.png"></a></p>
            </div>
            </div>
        </div>

        <div class="Section Section5">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2007_sec05.jpg" alt="교재 자세히 보기" usemap="#Map2007a" border="0">
                <map name="Map2007a" id="Map2007a">
                    <area shape="rect" coords="742,538,1059,601" href="https://lang.willbes.net/book/index/cate/3093" target="_blank" />
                </map>
            </div>
        </div>

        <div class="Section Section6">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2007_sec06.jpg" alt="19년 4분기 시험 일정" usemap="#Map2007b" border="0">
                <map name="Map2007b" id="Map2007b">
                    <area shape="rect" coords="81,763,380,832" href="https://www.dev.willbes.net/home/html/guide_lang" target="_blank" />
                    <area shape="rect" coords="410,762,714,834" href="https://www.g-telp.co.kr:335/receipt/schedule.asp" target="_blank" />
                    <area shape="rect" coords="737,763,1042,836" href="https://www.g-telp.co.kr:335/"target="_blank" />
                </map>
            </div>
        </div>

        <div class="Section NSK mt90">
            <div class="widthAuto">  
                <div class="willbesNews">
                    {{-- board include --}}
                    @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
                </div>
                <!--willbesNews //-->
            </div>
        </div>

        <div class="Section NSK mt70 mb90">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>
        <!-- CS센터 //-->
    </div>
    <!-- End Container -->

    <script>
    $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
        });
    </script>

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop