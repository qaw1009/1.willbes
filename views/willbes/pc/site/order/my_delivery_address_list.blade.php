<div class="willbes-Layer-CartBox">
    <a class="closeBtn" href="#none" onclick="closeWin('{{ $ele_id }}');">
        <img src="{{ img_url('cart/close_cart.png') }}">
    </a>
    <div class="Layer-Tit NG bg-blue">나의 배송 주소록</div>
    <div id="AddList" class="Layer-Cont p_re">
        <div class="address caution-txt">주소록은 최대 5개까지 등록 가능합니다.</div>
        <div class="subBtn address NSK"><a href="#none" onclick="closeWin('AddList'); openWin('AddModify')">신규주소등록 ></a></div>
        <div class="couponWrap">
            <table cellspacing="0" cellpadding="0" class="couponTable upper-black under-gray tx-gray">
                <colgroup>
                    <col style="width: 50px;">
                    <col style="width: 75px;">
                    <col style="width: 70px;">
                    <col style="width: 120px;">
                    <col style="width: 275px;">
                    <col style="width: 100px;">
                </colgroup>
                <thead>
                <tr>
                    <th>선택<span class="row-line">|</span></th>
                    <th>배송지<span class="row-line">|</span></th>
                    <th>이름<span class="row-line">|</span></th>
                    <th>연락처<span class="row-line">|</span></th>
                    <th>주소<span class="row-line">|</span></th>
                    <th>수정/삭제</th>
                </tr>
                </thead>
                <tbody>
                @if (empty($results) === true)
                    <tr>
                        <td colspan="6">해당 정보가 없습니다.</td>
                    </tr>
                @else
                    @foreach($results as $idx => $row)
                        <tr id="addr_row_{{ $row['AddrIdx'] }}">
                            <td><input type="radio" name="addr_idx" value="{{ $row['AddrIdx'] }}" data-row="{{ json_encode($row) }}" class="btn-addr-select"/></td>
                            <td>{{ $row['AddrName'] }}</td>
                            <td>{{ $row['Receiver'] }}</td>
                            <td>{{ $row['ReceiverPhone1'] }}-{{ $row['ReceiverPhone2'] }}-{{ $row['ReceiverPhone3'] }}</td>
                            <td class="address tx-left pl20">
                                {{ $row['ZipCode'] }}<br/>{{ $row['Addr1'] }}<br/>{{ $row['Addr2'] }}
                            </td>
                            <td class="address w-buy">
                                <div class="tBox NSK t1 black"><a href="#none" class="btn-addr-modify" data-addr-idx="{{ $row['AddrIdx'] }}">수정</a></div>
                                <div class="tBox NSK t2 gray"><a href="#none" class="btn-addr-delete" data-addr-idx="{{ $row['AddrIdx'] }}">삭제</a></div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- 배송 주소 리스트 -->
    <div id="AddModify" class="Layer-Cont Modify p_re" style="display: none;">
        <div class="address caution-txt">주소록은 최대 5개까지 등록 가능합니다. <span class="tx-light-blue f_right">(* 필수입력항목)</span></div>
        <form id="_addr_form" name="_addr_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="ele_id" value="{{ $ele_id }}"/>
            <input type="hidden" name="addr_idx" value=""/>
            <div class="couponWrap">
            <table cellspacing="0" cellpadding="0" class="classTable deliveryTable under-gray tx-gray">
                <colgroup>
                    <col style="width: 140px;">
                    <col width="*">
                </colgroup>
                <tbody>
                <tr class="u-to">
                    <td class="w-tit bg-light-white tx-left pl20">배송지<span class="tx-light-blue">(*)</span></td>
                    <td class="w-info tx-left pl20 item"><input type="text" id="_addr_name" name="addr_name" title="배송지" required="required" class="iptLocation" maxlength="30"/></td>
                </tr>
                <tr>
                    <td class="w-tit bg-light-white tx-left pl20">이름<span class="tx-light-blue">(*)</span></td>
                    <td class="w-info tx-left pl20 item"><input type="text" id="_receiver" name="receiver" title="이름" required="required" class="iptName" maxlength="30"></td>
                </tr>
                <tr>
                    <td class="w-tit bg-light-white tx-left pl20">주소<span class="tx-light-blue">(*)</span></td>
                    <td class="w-info tx-left pl20">
                        <div class="inputBox Add p_re">
                            <div class="searchadd item">
                                <input type="text" id="_zipcode" name="zipcode" title="우편번호" required="required" readonly="readonly" class="iptAdd bg-gray" maxlength="6">
                                <button type="button" onclick="searchPost('_SearchPost', '_zipcode', '_addr1', 'N');" class="mem-Btn combine-Btn mb10 bg-blue bd-dark-blue" style="margin-left: 5px; margin-right: 5px;">
                                    <span>우편번호 찾기</span>
                                </button>
                                <div id="_SearchPost" class="willbes-Layer-Black">
                                    <div class="willbes-Layer-CartBox">
                                        <a class="closeBtn" href="#none" onclick="closeSearchPost('_SearchPost');">
                                            <img src="{{ img_url('cart/close_cart.png') }}">
                                        </a>
                                        <div class="Layer-Tit NG bg-blue">우편번호 찾기</div>
                                    </div>
                                </div>
                            </div>
                            <div class="addbox1 p_re item">
                                <input type="text" id="_addr1" name="addr1" title="기본주소" required="required" readonly="readonly" class="iptAdd1 bg-gray" placeholder="기본주소" maxlength="30">
                            </div>
                            <div class="addbox2 p_re item">
                                <input type="text" id="_addr2" name="addr2" title="상세주소" required="required" class="iptAdd2" placeholder="상세주소" maxlength="30">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="w-tit bg-light-white tx-left pl20">휴대폰번호<span class="tx-light-blue">(*)</span></td>
                    <td class="w-info tx-left pl20">
                        <div class="item multi">
                            <select id="_receiver_phone1" name="receiver_phone1" title="휴대폰번호1" required="required" class="selePhone">
                                <option value="">선택</option>
                                @foreach($arr_phone1_ccd as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select> -
                            <input type="text" id="_receiver_phone2" name="receiver_phone2" title="휴대폰번호2" required="required" class="iptCellhone1 phone" maxlength="4"> -
                            <input type="text" id="_receiver_phone3" name="receiver_phone3" title="휴대폰번소3" required="required" class="iptCellhone2 phone" maxlength="4">
                            <input type="hidden" id="_receiver_phone" name="receiver_phone" title="휴대폰번호" required="required" pattern="phone"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="w-tit bg-light-white tx-left pl20">전화번호</td>
                    <td class="w-info tx-left pl20">
                        <div class="item multi">
                            <select id="_receiver_tel1" name="receiver_tel1" title="전화번호1" class="selePhone">
                                <option value="">선택</option>
                                @foreach($arr_tel1_ccd as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select> -
                            <input type="text" id="_receiver_tel2" name="receiver_tel2" title="전화번호2" class="iptPhone1 phone" maxlength="4"> -
                            <input type="text" id="_receiver_tel3" name="receiver_tel3" title="전화번호3" class="iptPhone2 phone" maxlength="4">
                            <input type="hidden" id="_receiver_tel" name="receiver_tel" title="전화번호" pattern="tel" class="optional"/>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="p-info tx-gray c_both">
                • 정확하지 않은 정보 기재 시, 불이익을 받을 수 있으니 유의하시기 바랍니다.<br/>
                • 집 외의 공공장소 등 직접 수령이 어려운 장소로의 배송은 분실 위험이 있으니 주의하시기 바랍니다.
            </div>
            <ul class="btnWrapbt">
                <li class="subBtn NSK"><a href="#none" id="btn_addr_regist">저장</a></li>
                <li class="subBtn white NSK"><a href="#none" onclick="closeWin('AddModify'); openWin('AddList')">목록</a></li>
            </ul>
        </div>
        </form>
    </div>
    <!-- 배송 주소 수정 -->
</div>
<script src="/public/vendor/validator/multifield.js"></script>
<script type="text/javascript">
    var $_addr_form = $('#_addr_form');
    var $parent_regi_form = $('#regi_form');

    $(document).ready(function() {
        // 배송지 선택 radio 버튼 클릭
        $('#AddList .btn-addr-select').on('click', function() {
            if (confirm('해당 주소를 적용하시겠습니까?')) {
                var data = $(this).data('row');

                // 부모 등록폼에 셋팅
                $parent_regi_form.find('input[name="receiver"]').val(data.Receiver);
                $parent_regi_form.find('input[name="receiver_phone"]').val(data.ReceiverPhone);
                $parent_regi_form.find('select[name="receiver_phone1"]').val(data.ReceiverPhone1);
                $parent_regi_form.find('input[name="receiver_phone2"]').val(data.ReceiverPhone2);
                $parent_regi_form.find('input[name="receiver_phone3"]').val(data.ReceiverPhone3);
                $parent_regi_form.find('input[name="receiver_tel"]').val(data.ReceiverTel);
                $parent_regi_form.find('select[name="receiver_tel1"]').val(data.ReceiverTel1);
                $parent_regi_form.find('input[name="receiver_tel2"]').val(data.ReceiverTel2);
                $parent_regi_form.find('input[name="receiver_tel3"]').val(data.ReceiverTel3);
                $parent_regi_form.find('input[name="zipcode"]').val(data.ZipCode);
                $parent_regi_form.find('input[name="addr1"]').val(data.Addr1);
                $parent_regi_form.find('input[name="addr2"]').val(data.Addr2);

                // 추가 배송료 추가 여부 확인을 위해 이벤트 발생
                $parent_regi_form.find('input[name="zipcode"]').trigger('change');

                closeWin('{{ $ele_id }}');
            }

            $(this).prop('checked', false);
        });

        // 수정 버튼 클릭
        $('#AddList .btn-addr-modify').on('click', function() {
            var addr_idx = $(this).data('addr-idx');
            var data = $('#AddList #addr_row_' + addr_idx).find('input[name="addr_idx"]').data('row');

            // 배송 주소록 등록폼에 셋팅
            $_addr_form.find('input[name="addr_idx"]').val(addr_idx);
            $_addr_form.find('input[name="addr_name"]').val(data.AddrName);
            $_addr_form.find('input[name="receiver"]').val(data.Receiver);
            $_addr_form.find('input[name="receiver_phone"]').val(data.ReceiverPhone);
            $_addr_form.find('select[name="receiver_phone1"]').val(data.ReceiverPhone1);
            $_addr_form.find('input[name="receiver_phone2"]').val(data.ReceiverPhone2);
            $_addr_form.find('input[name="receiver_phone3"]').val(data.ReceiverPhone3);
            $_addr_form.find('input[name="receiver_tel"]').val(data.ReceiverTel);
            $_addr_form.find('select[name="receiver_tel1"]').val(data.ReceiverTel1);
            $_addr_form.find('input[name="receiver_tel2"]').val(data.ReceiverTel2);
            $_addr_form.find('input[name="receiver_tel3"]').val(data.ReceiverTel3);
            $_addr_form.find('input[name="zipcode"]').val(data.ZipCode);
            $_addr_form.find('input[name="addr1"]').val(data.Addr1);
            $_addr_form.find('input[name="addr2"]').val(data.Addr2);

            closeWin('AddList');
            openWin('AddModify');
        });

        // 삭제 버튼 클릭
        $('#AddList .btn-addr-delete').on('click', function() {
            if (confirm('삭제 하시겠습니까?')) {
                var addr_idx = $(this).data('addr-idx');
                var data = {
                    '{{ csrf_token_name() }}': $_addr_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method': 'DELETE',
                    'addr_idx': addr_idx
                };
                sendAjax('{{ site_url('/myDeliveryAddress/destroy') }}', data, function (ret) {
                    if (ret.ret_cd) {
                        alert(ret.ret_msg);
                        _reloadList();
                    }
                }, showAlertError, false, 'POST');
            }
        });

        // 저장 버튼 클릭
        $_addr_form.on('click', '#btn_addr_regist', function() {
            var url = '{{ site_url('/myDeliveryAddress/store') }}';
            ajaxSubmit($_addr_form, url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    _reloadList();
                }
            }, showValidateError, null, false, 'alert');
        });

        // 배송 주소록 목록 조회
        var _reloadList = function() {
            var ele_id = $_addr_form.find('input[name="ele_id"]').val();
            var data = { 'ele_id' : ele_id };
            sendAjax('{{ site_url('/myDeliveryAddress/') }}', data, function(ret) {
                $('#' + ele_id).html(ret);
            }, showAlertError, false, 'GET', 'html');
        };
    });
</script>
