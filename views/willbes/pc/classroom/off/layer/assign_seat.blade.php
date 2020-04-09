<a class="closeBtn" href="#none" onclick="closeWin('seatChoice')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">좌석선택하기</div>

<div class="lecMoreWrap of-hidden h590">
    <div class="PASSZONE-List widthAutoFull">
        <div class="strong mt25 mb10 tx-gray">· 결제정보 및 좌석정보</div>
        <div class="LeclistTable bdt-gray">
            <table cellspacing="0" cellpadding="0" class="listTable listTableLeft passTable-Select under-gray tx-gray">
                <colgroup>
                    <col style="width:10%;">
                    <col style="width:55%;">
                    <col style="width:10%;">
                    <col>
                </colgroup>
                <tbody>
                <tr>
                    <th>주문번호 </th>
                    <td>{{ $lec_data['OrderNo'] }}</td>
                    <th>회원정보</th>
                    <td>{{ $lec_data['MemName'] }}({{ $lec_data['MemId'] }}) | {{ $lec_data['Tel1'] }}-{{ $lec_data['Tel2'] }}-{{ $lec_data['Tel3'] }} </td>
                </tr>
                <tr>
                    <th>결제금액 </th>
                    <td>{{ number_format($lec_data['RealPayPrice']) }}원</td>
                    <th>결제일</th>
                    <td>{{ $lec_data['CompleteDatm'] }}</td>
                </tr>
                <tr>
                    <th>상품명</th>
                    <td>{{ $lec_data['ProdName'] }}</td>
                    <th>결제상태</th>
                    <td>{{ $lec_data['PayStatusName'] }}</td>
                </tr>

                {{--//종합반일 경우만 노출--}}
                @if(element('pkg_yn',$form_data) === 'Y')
                <tr>
                    <th>단과반정보</th>
                    <td colspan="3">
                        {{ $lec_data['ProdNameSub'] }}
                    </td>
                </tr>
                @endif
                {{--종합반일 경우만 노출//--}}

                <tr>
                    <th>좌석정보</th>
                    <td colspan="3">
                        <ul class="seatsection bg-none">
                            <li>[강의실명] <span>{{ $lec_data['LectureRoomName'] }} | {{ $lec_data['UnitName'] }}</span></li>
                            <li>[좌석번호]
                                {!! ((empty($lec_data['LrsrIdx']) === true) ? "<span class='tx-red'>미선택</span>" : "<span>{$lec_data['MemSeatNo']}</span>")  !!}
                                {!! ((empty($lec_data['LrsrIdx']) === false) && $lec_data['MemSeatStatusCcd'] == '728003') ? "<span class='tx-red'>[퇴실]</span>" : "" !!}
                            </li>
                            <li>[좌석선택기간] <span>{{ $lec_data['SeatChoiceStartDate'] }} ~ {{ $lec_data['SeatChoiceEndDate'] }}</span></li>
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <form class="form-horizontal" id="_seat_assign_form" name="_seat_assign_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {{--{!! method_field('POST') !!}--}}
            {!! method_field((empty($lec_data['LrsrIdx']) === true) ? 'POST' : 'PUT') !!}

            <input type="hidden" name="pkg_yn" value="{{ element('pkg_yn',$form_data) }}" title="상품구분">
            <input type="hidden" name="order_idx" value="{{ element('orderidx', $form_data) }}" title="주문식별자">
            <input type="hidden" name="order_prod_idx" value="{{ element('orderprodidx', $form_data) }}" title="주문상품식별자">
            <input type="hidden" name="prod_code" value="{{ element('prod_code', $form_data) }}" title="상품코드">
            <input type="hidden" name="prod_code_sub" value="{{ element('prod_code_sub', $form_data) }}" title="서브상품코드">
            <input type="hidden" name="arr_prod_code_sub" value="{{ (empty($lec_data['OrderSubProdCodes']) === true) ? '' : $lec_data['OrderSubProdCodes'] }}" title="종합반서브상품코드">
            <input type="hidden" name="lr_code" value="{{ element('lr_code', $form_data) }}" title="강의실코드">
            <input type="hidden" name="lr_unit_code" value="{{ element('lr_unit_code', $form_data) }}" title="강의실회차코드">
            <input type="hidden" name="old_lrsr_idx" value="{{ $lec_data['LrsrIdx'] }}" title="단일 강의실회차회원좌석식별자">
            <input type="hidden" name="old_arr_lrsr_idx" value="{{ (empty($lec_data['LrsrIdxData']) === true) ? '' : $lec_data['LrsrIdxData'] }}" title="다중 강의실회차회원좌석식별자">
            <input type="hidden" id="old_seat_no" name="old_seat_no" value="{{ $lec_data['MemSeatNo'] }}" title="기존강의실회차회원좌석번호">
            <input type="hidden" id="lr_rurs_idx" name="lr_rurs_idx" value="" title="강의실회차좌석식별자">
            <input type="hidden" id="seat_num" name="seat_num" value="" title="강의실회차좌석번호">

            <div class="PASSZONE-Lec-Section mt25">
                <div class="btnAuto164 mt20 tx-white tx14 strong"><a href="javascript:show_map('{{ $lec_data['LrUnitCode'] }}');" class="bBox blackBox widthAutoFull">좌석배치도 보기 ></a></div>
                <div class="strong mt25 tx-gray h22">
                    · 좌석선택하기 : 좌석 변경은 좌석선택기간 안에만 가능하오니, 좌석배치도를 확인하신 후 신중히 선택해 주시기 바랍니다.
                </div>
                <div class="seatNumber">
                    <div class="seatNumberInfo">
                        <div class="sNumberA"><span>선택가능</span></div>
                        <div class="sNumberB"><span>선택완료</span></div>
                    </div>
                    <ul class="n_mem_seat">
                        @foreach($seat_data as $row)
                            @php
                                $btn_type = '';
                                if (empty($lec_data['MemIdx']) === false && $row['MemIdx'] == $lec_data['MemIdx'] && $row['LrrursIdx'] == $lec_data['LrrursIdx']) {
                                    $btn_type = 'sNumberC';
                                } else {
                                    switch ($row['SeatStatusCcd']) {
                                        case "727001" : $btn_type = 'sNumberA'; $btn_txt = '선택가능';break;
                                        case "727002" : $btn_type = 'sNumberB'; $btn_txt = '선택완료';break;
                                        case "727003" : $btn_type = 'sNumberB'; $btn_txt = '선택불가';break;
                                        default : $btn_type = 'btn-default'; $btn_txt = '';
                                    }
                                }
                            @endphp
                            <li>
                                <button type="button" id="_seat_{{$row['SeatNo']}}" class="{{$btn_type}} btn_choice_seat"
                                        data-lr-rurs-idx="{{$row['LrrursIdx']}}"
                                        data-seat-type="{{$row['SeatStatusCcd']}}"
                                        data-seat-num="{{$row['SeatNo']}}"
                                        data-member-idx="{{$row['MemIdx']}}" {{ ($row['SeatStatusCcd'] != '727001') ? 'disabled' : '' }}>
                                    {{$row['SeatNo']}}

                                    @if ($row['SeatStatusCcd'] == '727002')
                                        @if ($lec_data['LrrursIdx'] == $row['LrrursIdx'])
                                            <span style="font-weight: bold;">{{ $row['MemName'] }}</span>
                                        @else
                                            <span>선택완료</span>
                                        @endif
                                    @else
                                        <span>{{ $btn_txt }}</span>
                                    @endif
                                </button>
                                    {{--{!! ($row['SeatStatusCcd'] == '727002' && empty($row['MemName']) === false) ? "<span>{$row['MemName']}</span>" : "<span>{$btn_txt}</span>" !!}</button>--}}
                            </li>
                        @endforeach
                    </ul>
                    <div class="btnAuto130 mt20 tx-white tx14 strong"><button type="submit" class="bBox blueBox widthAutoFull ">적용</button></div>
                </div>
            </div>
        </form>
    </div>
    <!-- PASSZONE-List -->
</div>

<script type="text/javascript">
    var $_seat_assign_form = $('#_seat_assign_form');
    var set_table_row = '{{ $lec_data['TransverseNum'] }}';
    $('.n_mem_seat li').css('width', 'calc(100% / '+set_table_row+')');

    $_seat_assign_form.on('click', '.btn_choice_seat', function() {
        if ($(".btn_choice_seat").hasClass('active') === true) {
            $(".btn_choice_seat").removeClass('active');
        }
        if ($(this).hasClass('active') === true) {
            $(".btn_choice_seat").removeClass('active');
        } else {
            $(this).addClass('active');
        }

        $("#lr_rurs_idx").val($(this).data("lr-rurs-idx"));
        $("#seat_num").val($(this).data("seat-num"));
    });

    $_seat_assign_form.submit(function() {
        var parent_seat_id = '{{ element('orderidx', $form_data) }}' + '_' + '{{ element('lr_unit_code', $form_data) }}';
        var member_seat_type = '{{ ((empty($lec_data['LrsrIdx']) === false) && $lec_data['MemSeatStatusCcd'] == '728003' ? 'N' : 'Y') }}';
        if (member_seat_type == 'N') {
            alert('해당 강의실에서 퇴실된 상태입니다. 좌석을 선택할 수 없습니다.');
            return;
        }
        if ($("#lr_rurs_idx").val() == '') {
            alert('좌석을 선택해 주세요.');
            return;
        }

        var _url = '{{ front_url('/classroom/off/AssignSeatStore') }}';
        var _msg = '';
        if ($("#old_seat_no").val() == '') {
            _msg = $("#seat_num").val()+'번 좌석으로 선택하시겠습니까?';
        } else {
            _msg = $("#old_seat_no").val() + ' -> ' + $("#seat_num").val()+'번 좌석으로 이동하시겠습니까?';
        }
        if (!confirm(_msg)) { return true; }
        ajaxSubmit($_seat_assign_form, _url, function(ret) {
            if(ret.ret_cd) {
                alert(ret.ret_msg);
                $("#seat_id_"+parent_seat_id+" > span").text($("#seat_num").val());
                $("#seat_id_"+parent_seat_id+" > span").removeClass('tx-red');
                AssignSeat('{{ element('pkg_yn', $form_data) }}','{{ element('choice_box_p_no', $form_data) }}','{{ element('choice_box_no', $form_data) }}', 'Y');
            }
        }, showValidateError, null, false, 'alert');
    });

    function show_map(lr_unit_code) {
        popupOpen('{{front_url('/classroom/off/showSeatMap/')}}' + lr_unit_code, 'seatMap', 1100, 800, null, null, 'no', 'no');
    }
</script>