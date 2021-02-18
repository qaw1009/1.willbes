@extends('html.m.layouts.v2.master')

@section('content')

<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div id="Sticky" class="sticky-Title">
        <div class="sticky-Grid sticky-topTit">
            <div class="willbes-Tit NGEB p_re">   
                학원 오시는 길
            </div>
        </div>
    </div>

    <div class="mapArea ssamMapArea">      
        <div id="location1" class="tabContent">
            <div class="mapTitle bdb-Black2 pb10">윌비스임용고시학원</div>
            <ul>
                <li>[도로명] 서울시 동작구 노량진로 202 5층 <br>
                [지번] 서울시 동작구 노량진동 197 남강타워 5층</li>
                <li><a href="tel:1544-3169" target="_blank">1544-3169</a></li>
            </ul>

            <div class="location_map">
                <span><img src="https://static.willbes.net/public/images/promotion/m/icon_add.png" alt="학원"></span>
                <div class="mapimg"><a href="http://kko.to/NfJMuAxYo" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/2018/map_ssam.jpg" alt="오시는 길"></a></div>
            </div>
        </div>
    </div>

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->
</div>
<!-- End Container -->



@stop