<div class="Section">
    <div class="mapWrap">
        <div class="will-nTit">
            윌비스 <span class="tx-color">교원임용고시 </span> 학원
        </div>

        <div class="mapL" id="map">지도영역</div>

        <div class="mapR">
            <div>
                <p><span class="tx-color">윌비스임용</span> 오시는 길</p>
                <div class="tx14">서울 동작구 만양로 105 한성빌딩 2층</div>
            </div>
            <div class="traffic">
                <p class="tx16"><img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map01.png"> 지하철을 이용할 경우</p>
                <ul>
                    <li>
                        <div class="tx14">1.9호선 <span class="tx-color">노량진역 (1.2.3번 출구)</span></div>
                        도보 5분 (250m)
                    </li>
                </ul>
                <div class="line"></div>
                <p class="tx16"><img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map02.png"> 버스를 이용할 경우</p>
                <ul>
                    <li>
                        <div>ㆍ노량진역(노량진수산시장.CTS기독교TV 방면 / 노들역 방면)</div>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map03.png">150, 360, 507, 605, 640 <br>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map04.png">5531, 6211, 6411 <br>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map06.png">9408 <br>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map05.png">동작03, 동작08
                    </li>
                    <li>
                        <div>ㆍ노량진역 2번출구 (동작구청, 노량진초등학교앞 방면)</div>
                        <div>ㆍ노량진역 3번출구 (노들역 방면)</div>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map03.png">152, 500, 504, 654, 742 <br>
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map04.png">5516, 5517, 5535, 5536
                    </li>                   
                </ul>
            </div>
        </div>
        <div class="mapinfo NSK-Black">
            윌비스 임용고시학원은<br>
            별도의 <span class="tx-color">무료 주차장</span>이 없습니다. 
            가급적 <span class="tx-color">대중교통</span>을 이용해 주시기 바랍니다!
        </div>
    </div>
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