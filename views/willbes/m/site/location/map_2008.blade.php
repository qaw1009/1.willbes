@extends('willbes.m.layouts.master')

@section('page_title', '학원 오시는 길')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <!-- PageTitle -->
        @include('willbes.m.layouts.page_title')
        <div class="mapArea">
            <div id="location1" class="tabContent">
                <div class="mapTitle">윌비스 경찰간부학원</div>
                <ul>
                    <li>서울 관악구 신림로 23길 16 일성트루엘 4층<br>
                        (신림동 1523-1)</li>
                    <li><a href="tel:1544-1881" target="_blank">1544-1881</a></li>
                </ul>
                <div class="location_map">
                    <span><img src="https://static.willbes.net/public/images/promotion/m/icon_add.png" alt="학원"></span>
                    <div class="mapimg"><a href="http://kko.to/8piq_XHYT" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/map.jpg" alt="신림본원 오시는 길"></a></div>
                </div>
            </div>
        </div>

        <div class="appPlayer c_both mb40">
            {{-- app player include --}}
            @include('willbes.m.site.main_partial.app_player')
        </div>

        <!-- Topbtn -->
        @include('willbes.m.layouts.topbtn')
    </div>
@stop
