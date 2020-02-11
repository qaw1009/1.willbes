{{-- 제휴할인 독서실 데이터가 있을 경우만 노출 --}}
@if(empty($results['affiliate']) === false)
    <div class="willbes-Layer-CartBox willbes-Layer-CartBox2">
        <a class="closeBtn" href="#none" onclick="closeWin('AffDiscReadingRoom')">
            <img src="{{ img_url('cart/close_cart.png') }}">
        </a>
        <div class="Layer-Tit NG bg-blue">자매독서실 할인적용</div>
        <div class="studyRoomCts">
            <ul class="studyRoominfo">
                <li>자매 독서실을 이용하실 경우 5% 할인이 적용됩니다.</li>
                <li>과목별 수강료 5만원 미만은 할인 불가능합니다.</li>
                <li>중복 할인 불가능합니다.</li>
                <li>학원 데스크에 방문하여 수강증 발급 전 자매 독서실 증빙 자료를 제출 하여야 하며, 증빙 불총족 시 전체환불 후 수강료 정상가로 재접수해야 하는점 유의해 주시기 바랍니다.</li>
            </ul>
            <form id="_aff_disc_readingroom_form" name="_aff_disc_readingroom_form" method="POST" onsubmit="return false;" novalidate>
                <div>
                    <select id="_aff_idx" name="_aff_idx" title="자매독서실">
                        <option value="">자매독서실 선택</option>
                        @foreach($results['affiliate'] as $row)
                            <option value="{{ $row['AffIdx'] }}">{{ $row['AffName'] }}</option>
                        @endforeach
                    </select>
                </div>
                <ul class="btnSet">
                    <li class="subBtn blue NSK"><a id="_btn_aff_disc_readingroom_apply" href="#none">할인적용</a></li>
                    <li class="subBtn NSK"><a id="_btn_aff_disc_readingroom_cancel" href="#none">할인적용 취소</a></li>
                </ul>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $_aff_disc_form = $('#_aff_disc_readingroom_form');

        $(document).ready(function() {
            // 할인적용 버튼 클릭
            $_aff_disc_form.on('click', '#_btn_aff_disc_readingroom_apply', function() {
                var aff_idx = $_aff_disc_form.find('select[name="_aff_idx"]').val();
                var is_lec_disc_info = $('#regi_form').find('.lec_disc_info').length > 0;
                var confirm_msg = '할인적용을 하시겠습니까?';
                if (is_lec_disc_info === true) {
                    confirm_msg = '이미 할인이 적용되어 있어 중복할인이 불가능합니다.\n자매독서실 할인적용으로 대체하시겠습니까?';
                }

                if (aff_idx.length < 1) {
                    alert('자매독서실을 선택해 주세요.');
                    return;
                }

                if (confirm(confirm_msg)) {
                    choiceAffDiscReadingRoom('apply', aff_idx);
                }
            });

            // 할인적용 취소 버튼 클릭
            $_aff_disc_form.on('click', '#_btn_aff_disc_readingroom_cancel', function() {
                if (confirm('할인적용을 취소하시겠습니까?')) {
                    choiceAffDiscReadingRoom('cancel', '');
                }
            });

            // 할인적용/취소
            var choiceAffDiscReadingRoom = function(type, aff_idx) {
                var url = '{{ front_url('/order/choiceAffiliateDiscRate/type/') }}' + type;
                var data = {
                    '{{ csrf_token_name() }}' : '{{ csrf_token() }}',
                    '_method' : 'POST',
                    'aff_idx' : aff_idx
                };
                sendAjax(url, data, function (ret) {
                    if (ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.reload();
                    }
                }, showValidateError, false, 'POST');
            };

            // 할인적용 모달팝업 자동 오픈
            $(function() {
                @if(strlen($results['aff_idx']) < 1)
                    openWin('AffDiscReadingRoom');
                @endif
            });
        });
    </script>
@endif
