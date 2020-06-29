@extends('willbes.m.layouts.master')

@section('page_title', '학원 오시는 길')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <!-- PageTitle -->
        @include('willbes.m.layouts.page_title')
        <div class="mapArea">
            <div id="location1" class="tabContent">
                <div class="mapTitle">윌비스 공무원학원 노량진(본원)</div>
                <ul>
                    <li>서울 동작구 노량진로 196 7층 윌비스<br>
                        김동진 법원팀)</li>
                    <li><a href="tel:1544-0330" target="_blank">1544-0330</a></li>
                </ul>
                <div class="location_map">
                    <span><img src="https://static.willbes.net/public/images/promotion/m/icon_add.png" alt="학원"></span>
                    <div class="mapimg"><a href="http://kko.to/8piq_XHYT" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/map_nrj.jpg" alt="오시는 길"></a></div>
                </div>
            </div>
        </div>

        <!-- Topbtn -->
        @include('willbes.m.layouts.topbtn')
    </div>
@stop
