@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/      
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/2139_top_bg.jpg) no-repeat center top;}

        .evt02 {background:#f6f0e0} 

       

        .loadmapBox .loadmap {position: relative; padding-bottom:56.25%; height: 0; overflow: hidden; max-width:100%; height:auto; }
        .loadmapBox .loadmap iframe {position:absolute; top: 0; left: 0; width:100%; height:100%;}
        .loadmapBox ul {width:1120px; margin:100px auto}
        .loadmapBox li {float:left; width:calc(50% - 30px); font-size:18px; text-align:left; line-height:1.8; margin-bottom:10px; font-weight:bold; list-style:disc; margin-left:20px}
        .loadmapBox li div {font-size:16px}
        .loadmapBox li div span {vertical-align:middle; font-size:12px; padding:0 10px; display:inline-block; margin-right:10px; color:#fff; background:#58a933; font-weight:normal}
        .loadmapBox li div span.blue {background:#3a65b4}
        .loadmapBox li div span.red {background:#cc0003}
        .loadmapBox ul:after {content:''; display:block; clear:both}
        
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2139_top.jpg"  alt="4월 추천강좌"/>
        </div> 

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2139_01.jpg"  alt="심화이론.기출 패키지" />
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2139_02.jpg"  alt="신청하기">
        </div>

        <div class="evtCtnsBox loadmapBox">
            <div class="loadmap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.7927493090915!2d126.94179831559448!3d37.51280597980801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c9fe8a0a1e2a5%3A0x3bc432e93a6e20c1!2zKOyjvCnsnIzruYTsiqQ!5e0!3m2!1sko!2skr!4v1603420278998!5m2!1sko!2skr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <ul>
                <li>
                    주소 : 서울시 동작구 만양로 105 한성빌딩 2층
                </li>
                <li>
                    문의 : 1544-0336
                </li>
                <li>
                    지하철 이용 시
                    <div>
                    지하철 1호선 1번 출구 도보로 3분<br>
                    지하철 9호선 3번 출구 도보로 4분<br>
                    </div>
                </li>
                <li>
                    버스 이용 시
                    <div>
                        <span class="blue">간선</span> N15, 150, 152, 360, 500, 504, 507, 605, 640, 654, 751, 752<br>
                        <span>지선</span> 5516, 5517, 5531, 5535, 5536, 6211, 6411, 8551<br>
                        <span class="red">지선</span> 9408<br>
                        <span>마을</span> 동작01, 동작03, 동작08, 동작13<br>
                    </div>
                </li>
            </ul>
        </div>
        
    </div>
    <!-- End Container -->
@stop