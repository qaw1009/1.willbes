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

    <ul class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
        <li><a href="#location1" class="on">신림(본원)</a><span class="row-line">|</span></li>
        <li><a href="#location2">강남(분원)</a></li>
    </ul>

    <div class="mapArea">      
        <div id="location1" class="tabContent">
            <div class="mapTitle">한림법학원 신림(본원)
                <p>5급행정 / 국립외교원 / PSAT / 5급헌법</p>
            </div>
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

        <div id="location2" class="tabContent">
            <div class="mapTitle">한림법학원 강남(분원)
                <p>법원행시 / 변호사시험</p>
            </div>
            <ul>
                <li>서울 강남구 테헤란로 19길 18<br>
                    (역삼동 645-12)</li>
                <li><a href="tel:1544-1661" target="_blank">1544-1661</a></li>
            </ul>

            <div class="location_map">
                <span><img src="https://static.willbes.net/public/images/promotion/m/icon_add.png" alt="학원"></span>
                <div class="mapimg"><a href="http://kko.to/FE4NVXTDT" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/map_kn.jpg" alt="강남분원 오시는 길"></a></div>
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