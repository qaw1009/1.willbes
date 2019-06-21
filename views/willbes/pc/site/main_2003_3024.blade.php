@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container gp NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section mt20 p_re">
            <div class="MainVisual NSK">
                <div class="VisualBox">
                    <div class="bSlider">
                        {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                    </div>
                </div>
                <div class="VisualsubBox">
                    <div class="bSlider VisualsubBoxTop">
                        {!! banner_html(element('메인_서브1', $data['arr_main_banner'])) !!}
                    </div>
                    <div class="bSlider">
                        {!! banner_html(element('메인_서브2', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="Section barBnr">
            <div class="widthAuto">
                {!! banner_html(element('메인_띠배너', $data['arr_main_banner'])) !!}
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <img src="{{ img_url('gpgosi/visual/visual_tit01.jpg') }}" alt="빠른 합격을 위한 윌비스 군무원 추천강좌">
                <ul class="PBcts">
                    @for($i=1; $i<=4; $i++)
                        @if(isset($data['arr_main_banner']['메인_미들'.$i]) === true)
                            <li>
                                <div class="bSlider">
                                    {!! banner_html($data['arr_main_banner']['메인_미들'.$i], 'slider') !!}
                                </div>
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <img src="{{ img_url('gpgosi/visual/visual_tit02.jpg') }}" alt="독보적인 강의력! 군무원 강의에 최적화된 윌비스 군무원 명품 교수진">
                <ul class="PBctsB">
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
