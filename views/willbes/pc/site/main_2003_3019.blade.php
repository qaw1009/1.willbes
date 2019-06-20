@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container gosi NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        {{--<div class="Section mt20">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/3019_top_1120.jpg" alt="반드시 합격할 수 있는 자신감이 되어 드리겠습니다.">
            </div>
        </div>--}}

        <div class="Section mt20">
            <div class="widthAuto lastTime">
                <span>{{ $data['Interval_time'] }}</span>
                <img src="https://static.willbes.net/public/images/promotion/main/3019_top_1120_190619.gif" alt="단 1명의 꿈이라도">
            </div>
        </div>

        <div class="Section mt20 p_re">
            <div class="MainVisual NSK">
                <div class="VisualBox">
                    <div class="bSlider">
                        {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                    </div>
                </div>
                <div class="VisualsubBox">
                    <div class="VisualsubBoxTop">
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
                <div><img src="{{ img_url('gosi/visual/visual_tit01.jpg') }}" alt="더! 강력, 더! 완벽해진 윌비스 교수진"></div>
                <ul class="PBcts">
                    @for($i=1; $i<=5; $i++)
                        @if(isset($data['arr_main_banner']['메인_교수진'.$i]) === true)
                        <li>
                            <div class="bSlider">
                                {!! banner_html($data['arr_main_banner']['메인_교수진'.$i], 'slider') !!}
                            </div>
                        </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section Section3 mt110">
            <div class="widthAuto">
                <div><img src="{{ img_url('gosi/visual/visual_tit02.jpg') }}" alt="추천강좌/이벤트/최신소식"></div>
                <ul class="SpecialBox">
                    @for($i=1; $i<=10; $i++)
                        @if(isset($data['arr_main_banner']['메인_hotpick'.$i]) === true)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_hotpick'.$i]) !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section NG mt90">
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
@stop
