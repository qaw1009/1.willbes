@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container cus NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section p_re">
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

        <div class="Section mt90">
            <div class="widthAuto">
                <ul class="PBcts">
                    @for($i=1; $i<=5; $i++)
                        @if(isset($data['arr_main_banner']['메인_교수진_'.$i]) === true)
                            <li>
                                <div class="bSlider">
                                    {!! banner_html($data['arr_main_banner']['메인_교수진_'.$i], 'slider') !!}
                                </div>
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section NSK mt90">
            <div class="widthAuto">
                {{-- board include --}}
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section NSK mt90 mb90">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>
        <!-- CS센터 //-->

        {{--
        <div id="QuickMenu" class="MainQuickMenu">
            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005_sky01.jpg"></a></div>
            <ul>
                <li><a href="#none">강의 계획서</a></li>
                <li><a href="#none">강의 시간표</a></li>
                <li><a href="#none">강의실 배정표</a></li>
                <li><a href="#none">학원 할인정책</a></li>
            </ul>
        </div>
        --}}

    </div>
    <!-- End Container -->

@stop