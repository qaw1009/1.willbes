<!-- 내부팝업 -->
<div class="modal in" id="in_pop_modal" style="display: none;">
    <div class="modal-dialog modal-lg" style="width: 700px; z-index: 9999;">
        <div class="modal-content">
            <div class="modal-header bg-green">
                <button type="button" class="close" onclick="closeWin('in_pop_modal')" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">TM 운영정책</h4>
            </div>
            <div class="modal-body">
                <div class="form-group form-group-sm">
                    <div class="x_title no-border text-left">• TM 대상</div>
                    <div class="x_txt">- 활성화된 회원(휴면, 탈퇴회원 제외) 중 ‘블랙컨슈머’ 회원 제외 and 수신동의 ‘Y’인 회원</div>

                    <div class="x_title no-border text-left">• TM 배정 조건</div>
                    <div class="x_txt">- 동일 조건에서 1회 배정 시 이후 21일간 배정되지 않음</div>

                    <div class="x_title no-border text-left">• TM 배정 분류값별 정책</div>
                    <div class="x_txt">
                        - 신규 : 가입 후 한 달 이내 유료 구매가 없는 회원<br/>
                        - 장바구니 : 장바구니에 상품 담은 날 + 7일 이상인 경우 (미결제 상태)<br/>
                        - 재수강 : 유료로 구매한 강의 종료 후 30일 이내 재구매 이력이 없는 회원 - 회수(부재중) : TM상담관리>상담분류값이 ‘부재중’으로 등록된 회원<br/>
                        ※ 신규 > 재수강 > 회수(부재중) > 장바구니
                    </div>

                    <div class="x_title no-border text-left">• 배정 회원 조회</div>
                    <div class="x_txt">- 접근일로부터 3개월 이내만 배정된 회원 검색/조회 가능</div>

                    <div class="x_title no-border text-left">• 결제/환불 집계 조건</div>
                    <div class="x_txt">
                        - 결제 : TM분류값이 ‘통화’이며, 최종통화일 (상담등록일)로 부터 21일 이내 매출 발생 시<br/>
                        (대상 상품 : 온라인강좌 상품 전체 (교재, 학원강좌 제외)  : 단강좌, 사용자패키지, 운영자패키지, 기간제패키지)<br/>
                        - 환불 : 결제일 기준 30일 이내 환불 시 제외
                    </div>
                </div>
            </div>
            <script>
                // 닫기 Script
                function closeWin(divID) {
                    document.getElementById(divID).style.display = "none";
                }
                // 열기 Script
                function openWin(divID) {
                    document.getElementById(divID).style.display = "block";
                }
            </script>
        </div>
    </div>
    <div class="modal-backdrop in"></div>
</div>
<!-- End 내부팝업 -->
