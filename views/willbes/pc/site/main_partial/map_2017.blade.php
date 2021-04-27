<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey={{ config_item('kakao_js_app_key') }}&libraries=services"></script>
<div class="Section">
    <div class="mapWrap">
        <div class="will-nTit">
            윌비스 <span class="tx-color">교원임용고시 </span> 학원
        </div>

        <div class="mapL" id="map">지도영역</div>
        <div class="mapR">
            <div>
                <p>윌비스 <span class="tx-color">교원임용고시</span>학원 오시는 길</p>
                <div class="tx16">서울 동작구 노량진로 197 남강타워 5층</div>
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

<script type="text/javascript">
    $(document).ready(function() {
        var x = 37.512873;
        var y = 126.948245;
        var mapContainer = document.getElementById('map'), // 지도를 표시할 div
            mapOption = {
                center: new kakao.maps.LatLng(x, y), // 지도의 중심좌표
                level: 4, // 지도의 확대 레벨
                mapTypeId : kakao.maps.MapTypeId.ROADMAP // 지도종류
            };
        // 지도를 생성한다
        var map = new kakao.maps.Map(mapContainer, mapOption);

        // 지도 타입 변경 컨트롤을 생성한다
        var mapTypeControl = new kakao.maps.MapTypeControl();

        // 지도의 상단 우측에 지도 타입 변경 컨트롤을 추가한다
        map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);

        // 지도에 마커를 생성하고 표시한다
        var marker = new kakao.maps.Marker({
            position: new kakao.maps.LatLng(x, y), // 마커의 좌표
            map: map // 마커를 표시할 지도 객체
        });

        // 커스텀 오버레이를 생성하고 지도에 표시한다
        var customOverlay = new kakao.maps.CustomOverlay({
            map: map,
            content: '<div style="padding:5px; 5px; background:#fff; border: 1px solid midnightblue"><strong class="tx-color">교원임용고시학원</strong> (남강타워 5층)</div>',
            position: new kakao.maps.LatLng(x, y), // 커스텀 오버레이를 표시할 좌표
            xAnchor: 0.5, // 컨텐츠의 x 위치
            yAnchor: 2.7 // 컨텐츠의 y 위치
        });
    });
</script>