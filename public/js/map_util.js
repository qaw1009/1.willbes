/**
 * 카카오맵 연동
 * @param ele_id [지도가 표시될 element id]
 * @param alter_id [지도 표시에 실패할 경우 표시할 대체 element id]
 * @param lat [지도의 중심좌표의 위도]
 * @param lng [지도의 중심좌표의 경도]
 * @param addr [주소]
 * @param info_txt [마커상단에 표기되는 텍스트]
 */
function kakaoMap(ele_id, alter_id, lat, lng, addr, info_txt) {
    // 카카오 라이브러리가 없을 경우 대체 지도 표시
    if (alter_id.length > 0 && typeof kakao === 'undefined') {
        document.getElementById(ele_id).style.display = 'none';
        document.getElementById(alter_id).style.display = '';
        return;
    }

    // 지도 설정
    var mapContainer = document.getElementById(ele_id), // 지도를 표시할 div
        mapOption = {
            center: new kakao.maps.LatLng(lat, lng), // 지도의 중심좌표
            level: 3 // 지도의 확대 레벨
        };

    // 지도를 생성합니다
    var map = new kakao.maps.Map(mapContainer, mapOption);

    // 주소-좌표 변환 객체를 생성합니다
    var geocoder = new kakao.maps.services.Geocoder();

    // 주소로 좌표를 검색합니다
    geocoder.addressSearch(addr, function(result, status) {
        // 정상적으로 검색이 완료됐으면
        if (status === kakao.maps.services.Status.OK) {
            var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

            // 결과값으로 받은 위치를 마커로 표시합니다
            var marker = new kakao.maps.Marker({
                map: map,
                position: coords
            });

            // 인포윈도우로 장소에 대한 설명을 표시합니다
            var infowindow = new kakao.maps.InfoWindow({
                content: '<div style="width:150px;text-align:center;padding:6px 0;">' + info_txt + '</div>'
            });
            infowindow.open(map, marker);

            // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
            map.setCenter(coords);
        }
    });
}
