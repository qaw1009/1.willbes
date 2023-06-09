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
                <div class="Act5">
                    <img src="{{ img_url('cs/willbes_m_guide.jpg') }}">
                    <div class="w-Guide mt40">
                        @if($__cfg['SiteCode'] == '2017')
                        <div class="willbes-m-guide NGEB">
                            <div class="tabBox">
                                <div class="tabContent"><img src="https://static.willbes.net/public/images/promotion/sub/2007_willbes_m_guide.jpg" alt="모바일 웹"></div>
                            </div>
                        </div>
                        @else  
                        <div class="willbes-m-guide NGEB">
                            <ul class="tabWrap tab_m_Guide p_re NG">
                                <li class="w-m-guide1"><a class="qBox on" href="#m_guide1"><span>모바일 웹</span></a></li>
                                <li class="w-m-guide2"><a class="qBox" href="#m_guide2"><span>모바일 수강전용 앱</span></a></li>
                            </ul>
                            <div class="tabBox mt60">
                                <div id="m_guide1" class="tabContent"><img src="https://static.willbes.net/public/images/promotion/sub/cs/willbes_m_guide01.jpg" alt="모바일 웹"></div>
                                <div id="m_guide2" class="tabContent"><img src="https://static.willbes.net/public/images/promotion/sub/cs/willbes_m_guide02.jpg" alt="모바일 수강전용 앱"></div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- willbes-CScenter -->
        </div>
        {!! banner('고객센터_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
@stop