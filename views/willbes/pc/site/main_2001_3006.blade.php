@extends('willbes.pc.layouts.master')

@section('content')
    <link href="/public/css/willbes/style_cop_pro.css?ver={{time()}}" rel="stylesheet">
    <style>
        .pro .Menu h3 {border:0}
    </style>

    <!-- Container -->
    <div id="Container" class="Container pro NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual">
            <div class="VisualBox p_re">
                @if(empty($data['arr_main_banner']['메인_빅배너']) === false)
                    <div id="MainRollingSlider" class="MaintabBox">
                        {!! banner_html($data['arr_main_banner']['메인_빅배너'], 'MaintabSlider') !!}
                        <p class="leftBtn" id="imgBannerLeft"><a href="javascript:void(0);">이전</a></p>
                        <p class="rightBtn" id="imgBannerRight"><a href="javascript:void(0);">다음</a></p>
                        <div id="MainRollingDiv" class="MaintabList">
                            <div class="Maintab">
                                @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                                    <span><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{{ $row['BannerName'] }}</a></span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="Section mt40">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2001/3006_1148x133.jpg" alt="경감/경정 승진 패스 개설, 네오고시뱅크 제휴">
            </div>
        </div>

        <div class="Section mt50">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">경찰승진 <span class="tx-color">객관식</span> <span class="tx16 NSK ml20">형사소송법, 형법, 실무종합, 헌법, 행정학</span></div>
                <img src="https://static.willbes.net/public/images/promotion/main/2001/3006_1120x465.jpg" alt="전문화된 교수진">
            </div>
        </div>

        <div class="Section mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">경찰승진 <span class="tx-color">주관식</span> <span class="tx16 NSK ml20">형사소송법, 행정법</span></div>
                <div>
                    {!! banner_html(element('메인_교수진1', $data['arr_main_banner']), null, null, null, 'span', 'mr20 f_left') !!}
                    {!! banner_html(element('메인_교수진2', $data['arr_main_banner']), null, null, null, 'span', 'mr20 f_left') !!}
                    {!! banner_html(element('메인_교수진3', $data['arr_main_banner']), null, null, null, 'span', 'f_left') !!}
                </div>
            </div>
        </div>

        <div class="Section mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">승진대비 <span class="tx-color">계급&amp;직렬</span> 승진 PASS</div>
                <div>
                    {!! banner_html(element('메인_승진패스1', $data['arr_main_banner']), null, null, null, 'span','mr25') !!}
                    {!! banner_html(element('메인_승진패스2', $data['arr_main_banner']), null, null, null, 'span') !!}
                </div>
            </div>
        </div>

        <div class="Section Section3 mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">승진합격을 위한 윌비스 <span class="tx-color">경찰승진</span> 교수님</div>
                <ul class="ProfProBox">
                    @for($i=1; $i<=9; $i++)
                        <li>
                            {!! banner_html(element('메인_승진교수'.$i, $data['arr_main_banner'])) !!}
                        </li>
                    @endfor

                    <li class="bSlider">
                        {!! banner_html(element('메인_승진교수10', $data['arr_main_banner']), 'slider') !!}
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section Section6 mb50 mt100">
            <div class="widthAuto">
                {{-- best/new product include --}}
                @include('willbes.pc.site.main_partial.lecture_' . $__cfg['SiteCode'])
                {{-- board include --}}
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section mt50">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">협력기관<span class="tx-color">(MOU)</span> <span class="tx16 ml10 NSK">문의: 070-4006-8926</span></div>
                <div class="mouBox">
                    <span><a href="https://www.police.go.kr/index.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/2001/3006_180x50_01.jpg" alt=""></a></span>
                    <span><a href="https://www.police.ac.kr/police/index.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/2001/3006_180x50_02.jpg" alt=""></a></span>
                    <span><a href="https://www.smpa.go.kr/home/homeIndex.do?menuCode=kidonghq" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/2001/3006_180x50_03.jpg" alt=""></a></span>
                    <span><a href="https://www.cnpolice.go.kr" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/2001/3006_180x50_04.jpg" alt=""></a></span>
                    <span><a href="https://www.jjpolice.go.kr/jjpolice" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/2001/3006_180x50_05.jpg" alt=""></a></span>
                    <span><a href="https://www.smpa.go.kr/home/homeIndex.do?menuCode=dj" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/2001/3006_180x50_06.jpg" alt=""></a></span>
                </div>
            </div>
        </div>

        <div class="Section Section7 mb100 mt50">
            <div class="widthAuto">
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
        $(function(){
            var slidesImg = $(".MaintabSlider").bxSlider({
                mode:'horizontal',
                touchEnabled: false,
                speed:400,
                pause:5000,
                sliderWidth:2000,
                auto : true,
                autoHover: true,
                pagerCustom: '#MainRollingDiv',
                controls:false,
                onSliderLoad: function(){
                    $("#MainRollingSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
            $("#imgBannerLeft").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg.goToNextSlide();
            });
        });

        $(function(){
            $('.mou ul').bxSlider({
                speed:800,
                responsive:true,
                infiniteLoop:true,
                pager:false,
                slideWidth:556,
                minSlides:1,
                maxSlides:2,
            });
        });
    </script>
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
