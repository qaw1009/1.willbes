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
    
    <div class="mapArea">
        <div class="mapTitle">한림법학원 신림(본원)</div>
        <ul>
            <li>서울 관악구 신림로 23길 16 일성트루엘 4층<br>
                (신림동 1523-1)</li>
            <li>1544-1881</li>
        </ul>

        <div class="location_map">
            지도영역
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