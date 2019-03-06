@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container gp c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual">
            <div class="widthAuto NSK mt30">
                <div class="VisualsubBox">
                    <div class="bSlider">
                        <div class="sliderStopAutoPager">
                            <div><a href="#none"><img src="{{ img_url('gpgosi/banner/bnr_1120x380_01.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gpgosi/banner/bnr_1120x380_02.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gpgosi/banner/bnr_1120x380_03.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section mt30">
            <div class="widthAuto">
                <a href="#none"><img src="{{ img_url('gpgosi/banner/bnr_1120x110.jpg') }}" alt="배너명"></a>
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <img src="{{ img_url('gpgosi/visual/visual_tit01.jpg') }}" alt="빠른 합격을 위한 윌비스 군무원 추천강좌">
                <ul class="PBcts">
                    <li><a href="#none"><img src="{{ img_url('gpgosi/visual/visual_prof01.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gpgosi/visual/visual_prof02.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gpgosi/visual/visual_prof03.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gpgosi/visual/visual_prof04.jpg') }}" alt="배너명"></a></li>
                </ul>
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <img src="{{ img_url('gpgosi/visual/visual_tit02.jpg') }}" alt="빠른 합격을 위한 윌비스 군무원 추천강좌">
                <ul class="PBctsB">
                    <li><a href="#none"><img src="{{ img_url('gpgosi/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gpgosi/banner/bnr_prof_02.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gpgosi/banner/bnr_prof_03.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gpgosi/banner/bnr_prof_04.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gpgosi/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gpgosi/banner/bnr_prof_02.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gpgosi/banner/bnr_prof_03.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gpgosi/banner/bnr_prof_04.jpg') }}" alt="배너명"></a></li>
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
        <!-- CS센터 //-->
    </div>
    <!-- End Container -->
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
