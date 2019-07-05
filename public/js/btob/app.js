/**
 * BtoB 전용 스크립트
 */
$(document).ready(function() {
    // 제휴사 관리자 정보수정 모달창 오픈
    $('.btn-btob-admin-modify').setLayer({
        "url" : "/auth/regist/edit",
        'width' : 900
    });
});
