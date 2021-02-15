@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div id="Sticky" class="sticky-Title">
            <div class="sticky-Grid sticky-topTit">
                <div class="willbes-Tit NGEB p_re">
                    <button type="button" class="goback" onclick="history.back(-1); return false;">
                        <span class="hidden">뒤로가기</span>
                    </button>
                    좌석선택하기
                </div>
            </div>
        </div>

        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
            <colgroup>
                <col style="width: 87%;">
                <col style="width: 13%;">
            </colgroup>
            <tbody>
            <tr class="replyList willbes-Open-Table">
                <td class="w-data tx-left">
                    <div class="w-tit tx16">결제정보 및 좌석정보 </div>
                </td>
                <td class="MoreBtn tx-center">></td>
            </tr>
            <tr class="willbes-Open-List">
                <td class="w-data tx-left" colspan="2">
                    <ul class="disc tx-gray">
                        <li><strong>주문번호</strong> {{ $lec_data['OrderNo'] }}</li>
                        <li>
                            <strong>회원정보</strong> {{ $lec_data['MemName'] }}({{ $lec_data['MemId'] }})
                            <span class="row-line">|</span> {{ $lec_data['Tel1'] }}-{{ $lec_data['Tel2'] }}-{{ $lec_data['Tel3'] }}
                        </li>
                        <li><strong>결제금액</strong> {{ number_format($lec_data['RealPayPrice']) }}원</li>
                        <li><strong>결제일</strong> {{ $lec_data['CompleteDatm'] }}</li>
                        <li><strong>결제상태</strong> {{ $lec_data['PayStatusName'] }}</li>
                        <li><strong>상품명</strong> {{ $lec_data['ProdName'] }}</li>
                        @if(element('pkg_yn',$form_data) === 'Y')
                            <li><strong>단과반정보</strong> {{ $lec_data['ProdNameSub'] }}</li>
                        @endif
                        <li><strong>좌석정보</strong><br>
                            [강의실명] <span class="tx-blue">{{ $lec_data['LectureRoomName'] }}</span> | <span class="tx-blue">{{ $lec_data['UnitName'] }}</span><br>
                            [좌석번호] {!! ((empty($lec_data['LrsrIdx']) === true) ? "<span class='tx-red'>미선택</span>" : "<span class='tx-blue'>{$lec_data['MemSeatNo']}</span>")  !!}
                            {!! ((empty($lec_data['LrsrIdx']) === false) && $lec_data['MemSeatStatusCcd'] == '728003') ? "<span class='tx-red'>[퇴실]</span>" : "" !!}<br>
                            [좌석선택기간] <span class="tx-blue">{{ $lec_data['SeatChoiceStartDate'] }} ~ {{ $lec_data['SeatChoiceEndDate'] }}</span>
                        </li>
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>

        <form class="form-horizontal" id="_seat_assign_form" name="_seat_assign_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
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

            <div class="seatChoiceSec">
                <div class="seatBtn">
                    <a href="javascript:;" onclick="javascript:show_map(); return false;">좌석배치도 보기 ></a>
                </div>
                <div class="seatInfo">
                    <div class="tx-red">※ 좌석선택 주의사항</div>
                    하단 좌석 선택란의 좌석 위치는 실제 좌석 배치와 다르니, 첨부된 [좌석배치도]의 실제 좌석 위치 확인 후 해당하는 좌석 번호를 선택해 주시기 바랍니다.
                </div>

                <div class="seatImg mt10 mb20" style="display: none">
                    <img src="{{ $lec_data['SeatMapFileRoute'] }}" style="max-width: 100%; max-height: 100%;">
                </div>

                <div class="seatChoice"><span>선택가능</span> <span>선택완료</span></div>
                <div class="seatNumber">
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
                                        data-member-idx="{{$row['MemIdx']}}"
                                        style="{{ (($row['SeatStatusCcd'] != '727001') ? 'cursor: not-allowed; pointer-events: none;' : '') }}">
                                    {{$row['SeatNo']}}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </form>

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>

        <div class="lec-btns w100p">
            <ul>
                <li><a href="javascript:;" class="btn-purple btn-subject">적용</a></li>
            </ul>
        </div>
        <!-- Topbtn -->
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        var $_seat_assign_form = $('#_seat_assign_form');

        $(document).ready(function() {
            var set_table_row = '{{ $lec_data['TransverseNum'] }}';
            $('.n_mem_seat li').css('width', 'calc(100% / '+set_table_row+')');

            $_seat_assign_form.on('click', '.btn_choice_seat', function() {
                if ($(this).data("seat-type") != '727001') {
                    alert('선택가능한 좌석이 아닙니다.');
                    return false;
                }
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

            $(".btn-subject").on('click', function () {
                var member_seat_type = '{{ ((empty($lec_data['LrsrIdx']) === false) && $lec_data['MemSeatStatusCcd'] == '728003' ? 'N' : 'Y') }}';
                if (member_seat_type == 'N') {
                    alert('해당 강의실에서 퇴실된 상태입니다. 좌석을 선택할 수 없습니다.');
                    return;
                }
                if ($("#lr_rurs_idx").val() == '') {
                    alert('좌석을 선택해 주세요.');
                    return;
                }

                var _url = '{{ front_url('/classroom/off/assignSeatStore') }}';
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
                        location.reload();
                    }
                }, showValidateError, null, false, 'alert');
            });
        });

        function show_map() {
            $(".seatImg").toggle();
        }
    </script>
@stop