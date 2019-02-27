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
                @include('willbes.pc.site.mocktest.tab_menu_partial')

                모의고사안내 컨텐츠 삽입



            </div>
            <!-- willbes-Mypage-Tabs -->

        </div>
        <div class="Quick-Bnr ml20">
            <img src="{{ img_url('sample/banner_180605.jpg') }}">
        </div>
    </div>
    <!-- End Container -->
@stop