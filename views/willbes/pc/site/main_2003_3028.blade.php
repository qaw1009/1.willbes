@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container tech NGR c_both">
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
            <div class="widthAuto ">
                <a href="#none"><img src="{{ img_url('gosi_tech/visual/visual_top.jpg') }}" alt="윌비스TOP 기술직 라인업"></a>
            </div>
        </div>

        <div class="Section ProfBox">
            <div class="widthAuto">
                <ul class="PBtab NSK">
                    <li><a href="#tab01">기초부터 차근차근, 체계적인 이론학습</a></li>
                    <li><a href="#tab02">실전에 더 가깝게, 빠르고 정확한 문제풀이</a></li>
                </ul>
                <div id="tab01">
                    <img src="{{ img_url('gosi_tech/visual/visual_tit01_02.jpg') }}" alt="점수의 기반을 형성하는 이론정립">                   
                    <ul class="PBcts">
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
                    <img src="{{ img_url('gosi_tech/visual/visual_tit01_01.jpg') }}" alt="고득점 문제풀이 스킬 확립">                  
                    <ul class="PBcts">
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
                <div><img src="{{ img_url('gosi_tech/visual/visual_tip.jpg') }}" alt="빈틈없는 완벽한 실력을 쌓게 됩니다."></div>
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto p_re">
                <img src="{{ img_url('gosi_tech/visual/visual_tit02.jpg') }}" alt="무엇 하나 빠지지 않는 빈틈없는 라인업 윌비스 TOP 기술직 교수진">
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