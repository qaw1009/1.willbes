@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container law NGR c_both">
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

        <div class="Section Section2">
            <div class="widthAuto">
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3035_visual_top.jpg" alt="최적의 합격솔루션 김동진 법원팀"></a>
            </div>
        </div>

        <div class="Section ProfBox">
            <div class="widthAuto">
                <ul class="PBtab NSK">
                    <li><a href="#tab01">1순환 – 큰 틀에서 흐름을 파악하라</a></li>
                    <li><a href="#tab02">예비순환 - 1년차 합격을 위한 동행의 첫걸음</a></li>
                </ul>
                <div id="tab01">
                    <div class="copyTit NSK-Black mt50">
                        강의와 복습에 시간을 투자하여 <span class="tx-color">과목별 기본 원칙을 수립하라</span>
                    </div>                     
                    <ul class="PBcts mt40">
                        @for($i=1; $i<=4; $i++)
                            @if(isset($data['arr_main_banner']['메인_미들'.$i]) === true)
                                <li>
                                    <div class="bSlider">
                                        {!! banner_html($data['arr_main_banner']['메인_미들'.$i], 'sliderTab') !!}
                                    </div>
                                </li>
                            @endif
                        @endfor
                    </ul>
                </div>
                <div id="tab02">
                    <div class="copyTit NSK-Black mt50">
                        시행착오를 줄이고 <span class="tx-color">최적화된 컨디션을 찾아라!</span>
                    </div>  
                    <ul class="PBcts mt40">
                        @for($i=5; $i<=8; $i++)
                            @if(isset($data['arr_main_banner']['메인_미들'.$i]) === true)
                                <li>
                                    <div class="bSlider">
                                        {!! banner_html($data['arr_main_banner']['메인_미들'.$i], 'sliderTab') !!}
                                    </div>
                                </li>
                            @endif
                        @endfor
                    </ul>
                </div>
            </div>
        </div>

        <div class="Section Section3 mt100">
            <div class="widthAuto p_re">
                <div><img src="https://static.willbes.net/public/images/promotion/main/3035_visual_tip.gif" alt="오직 법원직을 위한 최강 라인업 윌비스 김동진 법원팀"></div>
                <ul class="tipGo NSK">
                    <li><a href="{{ site_url('/promotion/index/cate/3035/code/1089') }}">강좌 바로가기</a></li>
                    <li><a href="{{ site_url('/promotion/index/cate/3035/code/1241') }}">강좌 바로가기</a></li>
                    <li><a href="{{ site_url('/promotion/index/cate/3035/code/1273') }}">강좌 바로가기</a></li>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3035/code/1381">강좌 바로가기</a></li>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3035/code/1415">강좌 바로가기</a></li>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3035/code/1483">강좌 바로가기</a></li>
                </ul>
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto p_re">
                <img src="{{ img_url('gosi_law/visual/visual_tit02.jpg') }}" alt="오직 법원직을 위한 최강 라인업 윌비스 김동진 법원팀">
                <ul class="ProfBoxB">
                    @for($i=1; $i<=8; $i++)
                        @if(isset($data['arr_main_banner']['메인_교수진'.$i]) === true)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_교수진'.$i]) !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section NSK mt90">
            <div class="widthAuto">
                <div class="willbesNews">
                    {{-- board include --}}
                    @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'] . '_wide')
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

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>
    </div>
    <!-- End Container -->   

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop

@section('post_content')
    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function() {
                $('.PBtab').each(function () {
                    var $active, $content, $links = $(this).find('a');
                    $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
                    $active.addClass('active');

                    $content = $($active[0].hash);

                    $links.not($active).each(function () {
                        $(this.hash).hide();
                    });

                    // Bind the click event handler
                    $(this).on('click', 'a', function (e) {
                        $active.removeClass('active');
                        $content.hide();

                        $active = $(this);
                        $content = $(this.hash);

                        $active.addClass('active');
                        $content.show();

                        e.preventDefault();
                    });
                });
            }, 200);
        });
    </script>
@stop
