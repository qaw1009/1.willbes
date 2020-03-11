@extends('lcms.layouts.master_modal')

@section('layer_title')
    좌석정보
@stop

@section('layer_header')
@endsection

@section('layer_content')
    <form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" novalidate action="{{ site_url('/crm/sms/storeSend') }}">--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="lr_code" value="{{ $lr_code }}" title="강의실코드">
        <input type="hidden" name="lr_unit_code" value="{{ $lr_unit_code }}" title="강의실회차코드">
        <input type="hidden" id="lr_rurs_idx" name="lr_rurs_idx" value="" title="강의실회차좌석식별자">
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">운영사이트
            </label>
            <div class="col-md-5">
                <p class="form-control-static">{{$data['SiteName']}}</p>
            </div>
            <label class="control-label col-md-1-1">캠퍼스
            </label>
            <div class="col-md-4">
                <p class="form-control-static">{{$data['CampusName']}}</p>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">강의실명
            </label>
            <div class="col-md-5">
                <p class="form-control-static">{{$data['LectureRoomName']}}</p>
            </div>
            <label class="control-label col-md-1-1">좌석정보
            </label>
            <div class="col-md-4">
                <p class="form-control-static">{{$data['UnitName']}}</p>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">사용/총좌석
            </label>
            <div class="col-md-5">
                <p class="form-control-static">{{$data['UseSeatCnt'] + $data['UseMemberSeatCnt']}} / {{ $data['UseQty'] }}</p>
            </div>
            <label class="control-label col-md-1-1">잔여석
            </label>
            <div class="col-md-4">
                <p class="form-control-static">{{$data['UseQty'] - ($data['UseSeatCnt'] + $data['UseMemberSeatCnt'])}}</p>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">시작 ~ 종료번호
            </label>
            <div class="col-md-5">
                <p class="form-control-static">{{$data['StartNo']}} / {{ $data['EndNo'] }}</p>
            </div>
            <label class="control-label col-md-1-1">좌석선택기간
            </label>
            <div class="col-md-4">
                <p class="form-control-static">{{ $data['SeatChoiceStartDate'] }} ~ {{ $data['SeatChoiceEndDate'] }}</p>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">좌석배치도
            </label>
            <div class="col-md-5">
                <p class="form-control-static">
                    <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['SeatMapFileRoute'])}}" data-file-name="{{ urlencode($data['SeatMapFileName']) }}">
                        {{ $data['SeatMapFileName'] }}
                    </a>
                </p>
            </div>
            <label class="control-label col-md-1-1">사용여부
            </label>
            <div class="col-md-4">
                <p class="form-control-static">{{ ($data['IsUse'] == 'Y' ? '사용' : '미사용') }}</p>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">좌석번호 <span class="required">*</span>
            </label>
            <div class="col-md-3 form-inline">
                <input type="text" id="choice_serial_num" name="choice_serial_num" class="form-control" title="좌석번호" style="width: 200px;" readonly="readonly">
            </div>
            <div class="col-md-5 mt-5">
                <span class="mr-5">• 다중선택가능</span>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">좌석상태 <span class="required">*</span>
            </label>
            <div class="col-md-3 form-inline">
                <div class="radio">
                    @foreach($arr_seat_unit_ccd as $key => $val)
                        <input type="radio" id="seat_status_{{$key}}" name="seat_status" class="flat" value="{{$key}}" title="좌석상태"/> <label for="seat_status_{{$key}}" class="input-label">{{$val}}</label>
                    @endforeach
                </div>
            </div>
            <div class="col-md-5 mt-5">
                <span class="mr-5">• 하단 좌석번호를 클릭해 주세요.{{-- (미사용 좌석만 선택 가능합니다.)--}}</span>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">설명
            </label>
            <div class="col-md-7">
                <input type="text" id="desc" name="desc" class="form-control" title="설명" style="width: 100%;">
            </div>
        </div>
        <div class="form-group form-group-sm text-center mb-30">
            <button type="submit" id="btn_store_log" class="btn btn-sm btn-primary mb-20">적용</button>
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
                                switch ($row['SeatStatusCcd']) {
                                    case "727001" : $btn_type = 'btn-default'; break;
                                    case "727002" : $btn_type = 'btn-primary'; break;
                                    case "727003" : $btn_type = 'btn-danger'; break;
                                    default : $btn_type = 'btn-default';
                                }
                            @endphp
                            <li>
                                <button type="button" id="_seat_{{$row['SeatNo']}}" class="btn {{$btn_type}} btn_choice_seat" data-lr-rurs-idx="{{$row['LrrursIdx']}}" data-seat-type="{{$row['SeatStatusCcd']}}" data-seat-num="{{$row['SeatNo']}}" data-member-idx="{{$row['MemIdx']}}">{{$row['SeatNo']}}
                                    {{--<p>{{(empty($row['MemName']) === true) ? '미사용' : $row['MemName']}}</p>--}}
                                    <p>
                                        @if (empty($row['MemName']) === false)
                                            <p>{{ $row['MemName'] }}</p>
                                        @else
                                            <p>{{ $row['SeatStatusName'] }}</p>
                                        @endif
                                </button>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </form>

    <form class="form-horizontal form-label-left" id="search_form_modal" name="search_form_modal" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="lr_code" value="{{ $lr_code }}" title="강의실코드">
        <input type="hidden" name="lr_unit_code" value="{{ $lr_unit_code }}" title="강의실회차코드">
        <div class="x_panel mt-10">
            <div class="x_title text-left">
                <h6>* 좌석상태 변경 내역을 확인하실 수 있습니다.</h6>
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
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1" for="search_value_modal">통합검색</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="search_value_modal" name="search_value">
                </div>
                <div class="col-md-3">
                    <p class="form-control-static">회원명,회원아이디,주문번호,설명 검색 가능</p>
                </div>
                <div class="col-md-4 text-right">
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
        var $search_form_modal = $('#search_form_modal');
        var $list_table_modal = $('#list_ajax_table_modal');

        $(document).ready(function() {
            var set_table_row = '{{$data['TransverseNum']}}';
            $('.n_mem_seat li').css('width', 'calc(100% / '+set_table_row+')');

            //좌석선택
            var arr_lr_rurs_idx = [];
            var arr_seat_num = [];
            $modal_regi_form.on('click', '.btn_choice_seat', function() {
                $(this).toggleClass('btn-success');
                var lr_rurs_idx = $(this).data('lr-rurs-idx');
                var seat_num = $(this).data('seat-num');

                if ($.inArray(lr_rurs_idx, arr_lr_rurs_idx) != -1) {
                    //배열 값 삭제
                    arr_lr_rurs_idx.splice($.inArray(lr_rurs_idx, arr_lr_rurs_idx), 1);
                    arr_seat_num.splice($.inArray(seat_num, arr_seat_num), 1);
                } else {
                    //배열 값 추가
                    arr_lr_rurs_idx.push(lr_rurs_idx);
                    arr_seat_num.push(seat_num);
                }
                $('#lr_rurs_idx').val(arr_lr_rurs_idx);
                $('#choice_serial_num').val(arr_seat_num);
            });

            //파일다운로드
            $('.file-download').click(function() {
                var _url = '{{ site_url("/pass/lectureRoom/regist/download") }}/' + getQueryString() + '&path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                window.open(_url, '_blank');
            });

            //등록
            $modal_regi_form.submit(function() {
                var _url = '{{ site_url('/pass/lectureRoom/regist/storeSeat') }}';
                ajaxSubmit($modal_regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        var _replace_url = "{{ site_url('/pass/lectureRoom/regist/infoSeatModal/'.$lr_code.'/'.$lr_unit_code) }}";
                        replaceModal(_replace_url,'');
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            var addValidate = function() {
                if ($('#choice_serial_num').val() == '') {
                    alert('좌석을 선택해주세요.');
                    return false;
                }
                if ($("input:radio[name='seat_status']").is(":checked") == false) {
                    alert('좌석상태를 선택해주세요.');
                    return false;
                }
                if (!confirm('수정 하시겠습니까?')) { return false; }
                return true;
            };

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
        });
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
@endsection