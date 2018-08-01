/**
 * 샘플강좌 플레이어
 * @param $prodCode
 * @param $unitIdx
 * @param $quility
 */
function fnPlayerSample($prodCode, $unitIdx, $quility){
    popupOpen(app_url('/Player/Sample/'+$prodCode+'/'+$unitIdx+'/'+$quility, 'www'), 'samplePlayer', '1000', '600', null, null);
}

/**
 * 강사 소개 플레이어
 * @param $ProfessorCode
 * @param $viewType ( OT | WS | S1 | S2 | S3 )
 */
function fnPlayerProf($ProfessorCode, $viewType){
    popupOpen(app_url('/Player/Professor/'+$ProfessorCode+'/'+$viewType+"/_", 'www'), 'profPlayer', '1000', '600', null, null);
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
