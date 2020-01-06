@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">

            <div class="willbes-Mocktest INFOZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 모의고사
                </div>
            </div>
            <!-- "willbes-Mocktest INFOZONE -->
            <div class="willbes-Mypage-Tabs mt10">
                @include('willbes.pc.site.mocktestNew.tab_menu_partial')

                <div class="mt10">
                @if($__cfg['SiteGroupCode'] == '1001')
                    {{-- 경찰온라인 사이트일 경우만 적용 --}}
                    <img src="{{ img_url('sub/mocktest_cop.jpg') }}" alt="경찰 통합모의고사">
                @endif
                @if($__cfg['SiteGroupCode'] == '1002')
                    {{-- 공무원 온라인 사이트일 경우만 적용 --}}
                    <img src="{{ img_url('sub/mocktest_gosi.jpg') }}" alt="공무원 통합모의고사">
                @endif    
                </div>

            </div>
            <!-- willbes-Mypage-Tabs -->

        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
    <!-- End Container -->
@stop