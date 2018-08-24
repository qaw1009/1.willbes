@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <!-- willbes-CScenter -->
            <div class="willbes-CScenter c_both">
                <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">· 모바일 서비스안내</div>
                <div class="Act5 mt30">
                    <img src="{{ img_url('cs/willbes_m_guide.jpg') }}">
                    <div class="w-Guide mt40">
                        <div class="willbes-m-guide NGEB">
                            <ul class="tabWrap tabcsDepth2 tab_m_Guide p_re NG">
                                <li class="w-m-guide1"><a class="qBox" href="#m_guide1"><span>모바일앱1</span></a></li>
                                <li class="w-m-guide2"><a class="qBox" href="#m_guide2"><span>모바일앱2</span></a></li>
                            </ul>
                            <div class="tabBox mt60">
                                <div id="m_guide1" class="tabContent">모바일앱 가이드 이미지1</div>
                                <div id="m_guide2" class="tabContent">모바일앱 가이드 이미지2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- willbes-CScenter -->
        </div>
        <div class="Quick-Bnr ml20">
            <img src="{{ img_url('sample/banner_180605.jpg') }}">
        </div>
    </div>
    <!-- End Container -->
@stop