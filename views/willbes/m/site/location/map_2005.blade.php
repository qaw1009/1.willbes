@extends('willbes.m.layouts.master')

@section('page_title', '학원 오시는 길')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <!-- PageTitle -->
        @include('willbes.m.layouts.page_title')

        <div class="mapArea">
            <div class="mapTitle">한림법학원 신림(본원)</div>
            <ul>
                <li>서울 관악구 신림로 23길 16 일성트루엘 4층<br>
                    (신림동 1523-1)</li>
                <li>1544-1881</li>
            </ul>

            {{-- 카카오맵 영역 --}}
            <div id="map" class="location_map">
            </div>
            <div id="alterMap" class="location_map" style="display: none;">
                <span><img src="https://static.willbes.net/public/images/promotion/m/icon_add.png" alt="학원"></span>
                <div class="mapimg"><img src="https://static.willbes.net/public/images/promotion/m/map.jpg" alt="오시는 길"></div>
            </div>
        </div>

        <!-- Topbtn -->
        @include('willbes.m.layouts.topbtn')
    </div>
    <!-- End Container -->
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey={{ config_item('kakao_js_app_key') }}&libraries=services"></script>
    <script type="text/javascript" src="/public/js/map_util.js?ver={{time()}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            kakaoMap('map', 'alterMap', '37.470477', '126.934481', '서울 관악구 신림로 23길 16', '신림(본원)');
        });
    </script>
@stop
