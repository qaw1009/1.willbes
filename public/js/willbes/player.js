/**
 * 샘플강좌 플레이어
 * @param $prodCode
 * @param $unitIdx
 */
function fnPlayerSample($prodCode, $unitIdx){
    popupOpen(app_url('/Player/Sample/'+$prodCode+'/'+$unitIdx, 'www'), 'samplePlayer', '1000', '600', null, null);
}

/**
 * 강사 소개 플레이어
 * @param $ProfessorCode
 */
function fnPlayerProf($ProfessorCode){
    popupOpen(app_url('/Player/Professor/'+$ProfessorCode, 'www'), 'samplePlayer', '1000', '600', null, null);
}

/**
 * 일반강좌 플레이어
 */
function fnPlayer(){
    popupOpen(app_url('/Player/', 'www'), 'samplePlayer', '1000', '600', null, null);
}

/**
 * 모바일웹 모바일 플레이어
 */
function mobilePlayer(){

}
