/**
 * 카카오맵 연동
 * @param ele_id [지도가 표시될 element id]
 * @param alter_id [지도 표시에 실패할 경우 표시할 대체 element id]
 * @param level [지도의 확대 레벨]
 * @param addr [주소]
 * @param info_txt [마커상단에 표기되는 텍스트]
 * @param info_txt_x_anchor [마커상단에 표기되는 텍스트 X좌표(위치)]
 * @param info_txt_y_anchor [마커상단에 표기되는 텍스트 Y좌표(위치)]
 */
function kakaoMap(ele_id, alter_id, level, addr, info_txt, info_txt_x_anchor, info_txt_y_anchor) {
    // 카카오 라이브러리가 없을 경우 대체 지도 표시
    if (alter_id.length > 0 && typeof kakao === 'undefined') {
        document.getElementById(ele_id).style.display = 'none';
        document.getElementById(alter_id).style.display = '';
        return;
    }

    // 주소-좌표 변환 객체를 생성합니다
    var geocoder = new kakao.maps.services.Geocoder();

    // 주소로 좌표를 검색합니다
    geocoder.addressSearch(addr, function(result, status) {
        // 정상적으로 검색이 완료됐으면
        if (status === kakao.maps.services.Status.OK) {
            var mapContainer = document.getElementById(ele_id), // 지도를 표시할 div
                mapOption = {
                    center: new kakao.maps.LatLng(result[0].y, result[0].x), // 지도의 중심좌표
                    level: level, // 지도의 확대 레벨
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
                position: new kakao.maps.LatLng(result[0].y, result[0].x), // 마커의 좌표
                map: map // 마커를 표시할 지도 객체
            });

            if (typeof info_txt !== 'undefined' && info_txt.length > 0) {
                // 커스텀 오버레이를 생성하고 지도에 표시한다
                var customOverlay = new kakao.maps.CustomOverlay({
                    map: map,
                    content: info_txt,
                    position: new kakao.maps.LatLng(result[0].y, result[0].x), // 커스텀 오버레이를 표시할 좌표
                    xAnchor: info_txt_x_anchor, // 컨텐츠의 x 위치
                    yAnchor: info_txt_y_anchor // 컨텐츠의 y 위치
                });
            }
        }
    });
}
