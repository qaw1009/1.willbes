@extends('willbes.m.layouts.master')

@section('page_title', '오시는 길')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <!-- PageTitle -->
        @include('willbes.m.layouts.page_title')
        <div class="mapArea ssamMapArea">
            <div id="location1" class="tabContent">
                <div class="mapTitle bdb-Black2 pb10">윌비스임용고시학원</div>
                <ul>
                    <li>[도로명] 서울 동작구 만양로 105 한성빌딩 2층<br>
                        [지번] 서울 동작구 만양로 105 한성빌딩 2층</li>
                    <li><a href="tel:1544-3169" target="_blank">1544-3169</a></li>
                </ul>

                <div class="location_map">
                    <span><img src="https://static.willbes.net/public/images/promotion/m/icon_add.png" alt="학원"></span>
                    <div class="mapimg"><a href="http://kko.to/1OZeEGANoP" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/2018/map_ssam.jpg" alt="오시는 길"></a></div>
                </div>
                
                <div id="map" class="location_map">지도영역</div>
                
            </div>
        </div>

        <!-- Topbtn -->
        @include('willbes.m.layouts.topbtn')
    </div>
    
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey={{ config_item('kakao_js_app_key') }}&libraries=services"></script>
    <script type="text/javascript" src="/public/js/map_util.js?ver={{time()}}"></script>
    <script type="text/javascript">
        //카카오맵 주석처리
        $(document).ready(function() {
            var info_txt = '<div style="padding:5px; 5px; background:#fff; border: 1px solid midnightblue"><strong class="tx-color">윌비스임용</strong> (한성빌딩 2층)</div>';
            var $kakaomap = new kakaoMap();
            $kakaomap.config.ele_id = 'map';
            $kakaomap.config.alter_id = 'alterMap1';
            $kakaomap.config.level = 3;
            $kakaomap.config.addr = '서울 동작구 만양로 105';
            $kakaomap.config.info_txt = info_txt;
            $kakaomap.config.info_txt_x_anchor = 0.5;
            $kakaomap.config.info_txt_y_anchor = 2.7;
            $kakaomap.run();
        });
    </script>
    
@stop
