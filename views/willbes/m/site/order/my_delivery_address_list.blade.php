<div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h470 fix">
    <a class="closeBtn" href="#none" onclick="closeWin('{{ $ele_id }}')">
        <img src="{{ img_url('m/calendar/close.png') }}">
    </a>
    <h4>
        나의 배송 주소록
    </h4>
    <div class="addressListBox">
    @if (empty($results) === true)
        <div class="addList">
            <ul>
                <li>해당 정보가 없습니다.</li>
            </ul>
        </div>
    @else
        @foreach($results as $idx => $row)
            <div class="addList">
                <ul>
                    <li>
                        <input type="radio" id="addr_idx_{{ $row['AddrIdx'] }}" name="addr_idx" value="{{ $row['AddrIdx'] }}" data-row="{{ json_encode($row) }}" class="btn-addr-select"/>
                        <label for="addr_idx_{{ $row['AddrIdx'] }}">{{ $row['AddrName'] }}</label>
                    </li>
                    <li>{{ $row['Receiver'] }}</li>
                    <li>{{ $row['ZipCode'] }}</li>
                    <li>{{ $row['Addr1'] }}</li>
                    <li>{{ $row['Addr2'] }}</li>
                    <li>{{ $row['ReceiverPhone1'] }}-{{ $row['ReceiverPhone2'] }}-{{ $row['ReceiverPhone3'] }}</li>
                </ul>
            </div>
        @endforeach
    @endif
        <ul class="addInfo">
            <li>주소록은 최대 5개까지 등록 가능합니다.</li>
            <li>주소록 수정/삭제는 PC에서만 가능합니다.</li>
        </ul>
    </div>
</div>
<div class="dim" onclick="closeWin('{{ $ele_id }}')"></div>
<script type="text/javascript">
    var $parent_regi_form = $('#regi_form');

    $(document).ready(function() {
        // 배송지 선택 radio 버튼 클릭
        $('.addList .btn-addr-select').on('click', function() {
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
    });
</script>
