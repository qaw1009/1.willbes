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
                <img src="https://static.willbes.net/public/images/promotion/main/2007_sec02.jpg" alt="g-telp를 선택해야하는 이유">
                <ul>
                    <li><a href="https://www.g-telp.co.kr:335/receipt/schedule.asp" target="_blank">시험일정 확인하기</a></li>
                    <li><a href="https://www.g-telp.co.kr:335" target="_blank">원서접수 바로가기</a></li>
                </ul>
            </div>
        </div>

        <div class="Section Section3">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2007_sec03.jpg" alt="g-telp를 선택해야하는 이유">
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

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop