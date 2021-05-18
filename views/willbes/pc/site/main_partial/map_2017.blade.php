<div class="Section">
    <div class="mapWrap">
        <div class="will-nTit">
            윌비스 <span class="tx-color">교원임용고시 </span> 학원
        </div>

        <div class="mapL" id="map">지도영역</div>
        <div class="mapL" id="alterMap1" style="display: none;"><img src="https://static.willbes.net/public/images/promotion/main/2018/2017_map.jpg"></div>
        <div class="mapR">
            <div>
                <p>윌비스 <span class="tx-color">교원임용고시</span>학원 오시는 길</p>
                <div class="tx16">서울 동작구 노량진로 202 남강타워 5층</div>
            </div>
            <div class="traffic">
                <p><img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map01.png">지하철을 이용할 경우</p>
                <ul>
                    <li>
                        <div class="tx14">1.9호선 <span class="tx-color">노량진역 (1.2.3번 출구)</span></div>
                        한강대교 방향으로 600m 도보 / 사육신 공원 앞 <br>
                        * 육교를 지나쳐야 합니다. (윌비스 공무원 건물과 구분)<br>
                    </li>
                    <li>
                        <div class="tx14">9호선 <span class="tx-color">노들역(5번출구)</span></div>
                        노량진 대로를 따라서 사육신공원 방향으로 350m 도보<br>
                        * 사육신 공원 맞은 편 (육교 지나기 전 건물)<br>
                    </li>
                </ul>
                <div class="line"></div>
                <p><img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map02.png">버스를 이용할 경우</p>
                <ul>
                    <li>
                        <div>사육신공원(노들역방면) 정류장</div>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map03.png"> 152, 500, 504, 654, 742<br>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map04.png"> 5516, 5517, 5535, 5536
                    </li>
                    <li>
                        <div>사육신공원(노량진역방면) 정류장</div>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map03.png"> 752<br>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map04.png"> 5516, 5535, 5536
                    </li>
                    <li>
                        <div>노들역(노들섬방면) 정류장</div>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map03.png"> 150, 152, 360, 500, 504, 605, 640, 654 742<br>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map04.png"> 5517, 5531, 6211, 6411<br>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map05.png"> 동작03, 동작08<br>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map06.png"> 9408
                    </li>
                    <li>
                        <div>노들역(노량진역방면) 정류장</div>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map03.png"> 150, 360, 507, 605, 640<br>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map04.png"> 5531, 6211, 6411<br>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map05.png"> 동작03, 동작08<br>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map06.png"> 9408
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey={{ config_item('kakao_js_app_key') }}&libraries=services"></script>
<script type="text/javascript" src="/public/js/map_util.js?ver={{time()}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var info_txt = '<div style="padding:5px; 5px; background:#fff; border: 1px solid midnightblue"><strong class="tx-color">교원임용고시학원</strong> (남강타워 5층)</div>';
        var $kakaomap = new kakaoMap();
        $kakaomap.config.ele_id = 'map';
        $kakaomap.config.alter_id = 'alterMap1';
        $kakaomap.config.level = 4;
        $kakaomap.config.addr = '서울 동작구 노량진로 202';
        $kakaomap.config.info_txt = info_txt;
        $kakaomap.config.info_txt_x_anchor = 0.5;
        $kakaomap.config.info_txt_y_anchor = 2.7;
        $kakaomap.run();
    });
</script>