@extends('lcms.layouts.master_modal')

@section('layer_title')
    좌석정보
@stop

@section('layer_header')
@endsection

@section('layer_content')
    <form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" name="lr_code" value="{{ $lr_code }}" title="강의실코드">
        <input type="hidden" name="lr_unit_code" value="{{ $lr_unit_code }}" title="강의실회차코드">
        <input type="hidden" name="order_idx" value="{{ $order_idx }}" title="주문식별자">
        <input type="hidden" id="old_seat_no" name="old_seat_no" value="{{ $data['SeatNo'] }}" title="기존좌석번호">
        <input type="hidden" id="lr_rurs_idx" name="lr_rurs_idx" value="" title="강의실회차좌석식별자">
        <input type="hidden" id="choice_serial_num" name="choice_serial_num" value="" title="좌석번호">

        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">주문번호
            </label>
            <div class="col-md-5">
                <p class="form-control-static">{{$data['OrderNo']}} [{{$data['SiteName']}}]</p>
            </div>
            <label class="control-label col-md-1-1">회원정보
            </label>
            <div class="col-md-4">
                <p class="form-control-static">{{$data['MemName']}} | {{$data['Tel1']}}-{{$data['Tel2']}}-{{$data['Tel3']}}</p>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">결제금액
            </label>
            <div class="col-md-5">
                <p class="form-control-static">{{$data['RealPayPrice']}}</p>
            </div>
            <label class="control-label col-md-1-1">결제일
            </label>
            <div class="col-md-4">
                <p class="form-control-static">{{$data['CompleteDatm']}}</p>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">상품명
            </label>
            <div class="col-md-5">
                <p class="form-control-static">{{$data['ProdName']}}</p>
            </div>
            <label class="control-label col-md-1-1">결제상태
            </label>
            <div class="col-md-4">
                <p class="form-control-static">{{$data['PayStatusCcdName']}}</p>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">좌석정보
            </label>
            <div class="col-md-5">
                <p class="form-control-static mb-20"><span class="blue">[강의실명]</span> {{$data['LectureRoomName']}} | {{$data['UnitName']}} <span class="blue">[좌석번호]</span> {{$data['SeatNo']}}<br>
                    <span class="blue">[좌석선택기간]</span> {{$data['SeatChoiceStartDate']}} ~ {{$data['SeatChoiceEndDate']}}</p>
            </div>
            <label class="control-label col-md-1-1">단과반정보
            </label>
            <div class="col-md-4">
                <p class="form-control-static">
                    {{$data['ProdNameSub']}}
                </p>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <div class="col-md-12 form-inline">
                <div class="n_mem_seat_info">
                    <ul class="clearfix-r">
                        @foreach($arr_seat_unit_ccd as $key => $val)
                            @php
                                $btn_type = '';
                                switch ($key) {
                                    case "727001" : $btn_type = 'btn-default'; break;
                                    case "727002" : $btn_type = 'btn-primary'; break;
                                    case "727003" : $btn_type = 'btn-danger'; break;
                                }
                            @endphp
                            <li><span class="color-box {{$btn_type}}">-</span> {{$val}}</li>
                        @endforeach
                    </ul>
                </div>
                @if (empty($seat_data) === false)
                    <ul class="n_mem_seat">
                        @foreach($seat_data as $row)
                            @php
                                $btn_type = '';
                                if ($row['LrrursIdx'] == $data['LrrursIdx']) {
                                    switch ($data['MemSeatStatusCcd']) {
                                        case "728003" : $btn_type = 'bg-orange'; break;
                                        case "728004" : $btn_type = 'bg-dark'; break;
                                        default : $btn_type = 'bg-orange';
                                    }
                                } else {
                                    switch ($row['SeatStatusCcd']) {
                                        case "727001" : $btn_type = 'btn-default'; break;
                                        case "727002" : $btn_type = 'btn-primary'; break;
                                        case "727003" : $btn_type = 'btn-danger'; break;
                                        default : $btn_type = 'btn-default';
                                    }
                                }
                            @endphp
                            <li>
                                <button type="button" id="_seat_{{$row['SeatNo']}}" class="btn {{$btn_type}} btn_choice_seat btn"
                                        data-lr-rurs-idx="{{$row['LrrursIdx']}}"
                                        data-seat-type="{{$row['SeatStatusCcd']}}"
                                        data-seat-num="{{$row['SeatNo']}}"
                                        data-member-idx="{{$row['MemIdx']}}" {{ ($row['SeatStatusCcd'] != '727001') ? 'disabled' : '' }}>
                                    {{$row['SeatNo']}}
                                    <p>
                                    @if (empty($row['MemName']) === false)
                                        <p>{{ $row['MemName'] }}</p>
                                    @else
                                        <p>
                                            @if ($row['LrrursIdx'] == $data['LrrursIdx'] && $data['MemSeatStatusCcd'] == '728003')
                                                {{ $data['MemName'] }} (퇴실)
                                            @elseif ($row['LrrursIdx'] == $data['LrrursIdx'] && $data['SeatStatusCcd'] == '728004')
                                                {{ $data['MemName'] }} (환불)
                                            @else
                                                {{ $row['SeatStatusName'] }}
                                            @endif
                                        </p>
                                    @endif
                                </button>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">탈퇴처리
                <input type="checkbox" class="flat" value="Y" id="is_seat_out" name="is_seat_out">
            </label>
            <div class="col-md-7 item">
                <div class="form-inline">[설명] <input type="text" id="desc" name="desc" class="form-control" required="required" title="설명" style="width: 80%;">
                </div>
            </div>
        </div>
        <div class="form-group form-group-sm text-center mb-30">
            <button type="submit" class="btn btn-sm btn-primary mb-20">적용</button>
        </div>
    </form>

    <form class="form-horizontal form-label-left" id="search_form_modal" name="search_form_modal" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="lr_code" value="{{ $lr_code }}" title="강의실코드">
        <input type="hidden" name="lr_unit_code" value="{{ $lr_unit_code }}" title="강의실회차코드">
        <input type="hidden" name="order_prod_idx" value="{{ $data['OrderProdIdx'] }}" title="주문상품코드">
        <div class="x_panel mt-10">
            <div class="x_title text-left">
                <h6>* 주문의 해당되는 회원좌석상태 변경 내역을 확인하실 수 있습니다.</h6>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1" for="seat_status_ccd_modal">좌석상태검색</label>
                <div class="col-md-2 form-inline">
                    <select class="form-control" id="seat_status_ccd_modal" name="seat_status_ccd">
                        <option value="">좌석상태검색</option>
                        @foreach($arr_seat_all_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>
                </div>

                <label class="control-label col-md-1" for="before_seat_no_modal">변경전 좌석</label>
                <div class="col-md-1 form-inline">
                    <input type="text" class="form-control" id="before_seat_no_modal" name="before_seat_no" style="width: 50px;">
                </div>
                <label class="control-label col-md-1" for="search_value">변경후 좌석</label>
                <div class="col-md-2 form-inline">
                    <input type="text" class="form-control" id="after_seat_no" name="after_seat_no" style="width: 50px;">
                </div>
                <div class="col-md-3 text-right">
                    <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                    <button type="button" class="btn btn-default btn-search" id="_btn_reset_modal">초기화</button>
                </div>
            </div>
            <div class="x_content">
                <table id="list_ajax_table_modal" class="table table-bordered table-striped">
                    <thead class="bg-white-gray">
                    <tr>
                        <th rowspan="2" class="text-center valign-middle">No</th>
                        <th rowspan="2" class="text-center valign-middle">주문번호</th>
                        <th rowspan="2" class="text-center valign-middle">회원명</th>
                        <th colspan="2" class="text-center valign-middle">좌석번호</th>
                        <th rowspan="2" class="text-center valign-middle">좌석상태</th>
                        <th rowspan="2" class="text-center valign-middle">설명</th>
                        <th rowspan="2" class="text-center valign-middle">회원등록자</th>
                        <th rowspan="2" class="text-center valign-middle">관리자등록자</th>
                        <th rowspan="2" class="text-center valign-middle">등록일</th>
                    </tr>
                    <tr>
                        <th class="valign-middle">변경전</th>
                        <th class="valign-middle">변경후</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        var $modal_regi_form = $('#modal_regi_form');
        var $datatable_modal;
        var $list_table_modal = $('#list_ajax_table_modal');
        var $search_form_modal = $('#search_form_modal');

        $(document).ready(function() {
            var set_table_row = '{{$data['TransverseNum']}}';
            $('.n_mem_seat li').css('width', 'calc(100% / ' + set_table_row + ')');

            $datatable_modal = $list_table_modal.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/pass/lectureRoom/regist/listAjaxForLectureLog') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'OrderProdIdx'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return (row.MemName == null) ? '' : row.MemName + '(' + row.MemId + ')';
                        }},
                    {'data' : 'BeforeSeatNo'},
                    {'data' : 'AfterSeatNo'},
                    {'data' : 'SeatStatusName'},
                    {'data' : 'Desc'},
                    {'data' : 'MemName'},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 초기화 버튼 클릭
            $search_form_modal.on('click', '#_btn_reset_modal', function() {
                $search_form_modal[0].reset();
                $datatable_modal.draw();
            });

            // 좌석선택
            $modal_regi_form.on('click', '.btn_choice_seat', function() {
                /*$(this).toggleClass('btn-success');*/
                if ($('#lr_rurs_idx').val() == $(this).data('lr-rurs-idx')) {
                    $('#lr_rurs_idx').val('');
                    $('#choice_serial_num').val('');
                } else {
                    var lr_rurs_idx = $(this).data('lr-rurs-idx');
                    var seat_num = $(this).data('seat-num');
                    $('#lr_rurs_idx').val(lr_rurs_idx);
                    $('#choice_serial_num').val(seat_num);
                }
            });

            // 좌석상태수정
            $modal_regi_form.submit(function() {
                var _url = '{{ site_url('/pass/lectureRoom/issue/storeSeat') }}';
                ajaxSubmit($modal_regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        var param = '?order_idx=' + '{{ $order_idx }}' + '&prod_code_sub=' + '{{ $prod_code_sub }}';
                        var _replace_url = "{{ site_url('/pass/lectureRoom/issue/modifyMemberSeatModal/'.$lr_code.'/'.$lr_unit_code) }}" + param;
                        replaceModal(_replace_url,'');
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            var addValidate = function() {
                var _msg = '';
                if ($("input:checkbox[name='is_seat_out']").is(":checked") == true) {
                    _msg = '해당 회원의 좌석을 퇴실처리 하시겠습니까?';
                } else {
                    if ($('#choice_serial_num').val() == '') {
                        alert('좌석을 선택해주세요.');
                        return false;
                    }
                    if ($("#old_seat_no").val() == $("#choice_serial_num").val()) {
                        alert('자리이동을 할 경우 다른 좌석을 선택해주세요.');
                        return false;
                    }
                    _msg = $("#old_seat_no").val() + ' -> ' + $("#choice_serial_num").val()+'번 좌석으로 이동하시겠습니까?';
                }
                if (!confirm(_msg)) { return false; }

                return true;
            };
        });
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
@endsection