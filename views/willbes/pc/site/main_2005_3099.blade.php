@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container hanlim3099 NGR c_both">
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
        <div class="Section barBnr">
            <div class="widthAuto">
                {!! banner_html(element('메인_띠배너', $data['arr_main_banner'])) !!}
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <div class="copyTit NSK-Thin mt100">
                    흉내 낼 수는 있지만 <strong class="NSK-Black"><span class="tx-color">같을 수 없습니다.</span></strong><br />
                    <strong class="NSK-Black">합격을 위한 이유있는 선택!</strong> 시험을 가장 잘 아는 <strong class="NSK-Black"><span class="tx-color">한림법학원</span></strong>의 합격 최적화 강의!
                </div>
                <img src="https://static.willbes.net/public/images/promotion/main/3099_visual01.gif" alt="로드맵">
            </div>
        </div>

        <div class="Section Section1">
            <div class="widthAuto">
                <div class="copyTit NSK-Thin mb50">
                    최단기 합격을 위한<br />
                    <strong class="NSK-Black">수강생을 위한 <span class="tx-color">맞춤형 추천 강좌</span></strong>
                </div>
                <ul class="PBcts">
                    @for($i=1; $i<=5; $i++)
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

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>
    </div>
    <!-- End Container -->

    <script>
        $(document).ready(function() {

        });
    </script>

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop