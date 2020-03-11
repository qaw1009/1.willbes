@extends('lcms.layouts.master_modal')

@section('layer_title')
    좌석정보 등록/수정
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" novalidate action="{{ site_url('/crm/sms/storeSend') }}">--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="lr_code" value="{{ $lr_code }}" title="강의실코드">
        <input type="hidden" name="lr_unit_code" value="{{ $lr_unit_code }}" title="강의실회차코드">
@endsection

@section('layer_content')
    <div class="form-group form-group-sm">
        <label class="control-label col-md-1-1" for="unit_name">좌석정보명<span class="required">*</span></label>
        <div class="col-md-5 item">
            <input type="text" class="form-control" name="unit_name" value="{{ $data['UnitName'] }}" title="좌석정보명" required="required" style="width: 80%">
        </div>
        <label class="control-label col-md-1-1" for="seat_choice_start_date">좌석정보코드</label>
        <div class="col-md-4 form-inline">
            <p class="form-control-static">@if($method == 'PUT'){{ $data['LrUnitCode'] }}@else # 등록 시 자동 생성 @endif</p>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="control-label col-md-1-1" for="use_qty">강의실총좌석수<span class="required">*</span></label>
        <div class="col-md-5 form-inline item">
            <input type="number" class="form-control" id="use_qty" name="use_qty" required="required" title="강의실총좌석수" value="{{ $data['UseQty'] }}" > 개 <span class="ml-10">• 숫자만 입력</span>
        </div>
        <label class="control-label col-md-1-1" for="transverse_num">가로수<span class="required">*</span></label>
        <div class="col-md-4 form-inline item">
            <input type="number" class="form-control" id="transverse_num" name="transverse_num" required="required" title="가로수" value="{{ $data['TransverseNum'] }}" > 개 <span class="ml-10">• 숫자만 입력</span>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="control-label col-md-1-1" for="start_no">좌석시작번호<span class="required">*</span></label>
        <div class="col-md-5 form-inline item">
            <input type="number" class="form-control" id="start_no" name="start_no" required="required" title="좌석시작번호" value="{{ $data['StartNo'] }}" @if($method == 'PUT')disabled="disabled"@endif> <span class="ml-10">• 숫자만 입력</span>
        </div>
        <label class="control-label col-md-1-1" for="end_no">좌석종료번호<span class="required">*</span></label>
        <div class="col-md-4 form-inline item">
            <input type="number" class="form-control" id="end_no" name="end_no" required="required" title="좌석종료번호" value="{{ $data['EndNo'] }}" readonly="readonly"> <span class="ml-10">• 숫자만 입력</span>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="control-label col-md-1-1" for="seat_choice_start_date">좌석선택기간<span class="required">*</span></label>
        <div class="col-md-5 form-inline">
            <div class="input-group item">
                <div class="input-group-addon no-border-right"><i class="fa fa-calendar"></i></div>
                <input type="text" class="form-control datepicker" name="seat_choice_start_date" value="{{ $data['SeatChoiceStartDate'] }}" title="좌석선택기간" required="required">
                <div class="input-group-addon no-border no-bgcolor">~</div>
                <div class="input-group-addon no-border-right"><i class="fa fa-calendar"></i></div>
                <input type="text" class="form-control datepicker" name="seat_choice_end_date" value="{{ $data['SeatChoiceEndDate'] }}" title="좌석선택기간" required="required">
            </div>
        </div>
        <label class="control-label col-md-1-1" for="is_use_y">사용여부<span class="required">*</span></label>
        <div class="col-md-4 form-inline item">
            <div class="radio">
                <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($method == 'POST' || $data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
            </div>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="control-label col-md-1-1" for="map_file">좌석배치도</label>
        <div class="col-md-8 form-inline">
            <input type="file" id="map_file" name="map_file" class="form-control input-file" title="좌석배치도"/>
            @if(empty($data['SeatMapFileRoute']) === false)
                <p class="form-control-static" id="file_info_box">
                    <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['SeatMapFileRoute'])}}" data-file-name="{{ urlencode($data['SeatMapFileName']) }}">
                        {{ $data['SeatMapFileName'] }}
                    </a>
                    <a href="#none" class="file-delete" data-lr-code="{{ $data['LrCode']  }}" data-lr-unit-code="{{ $data['LrUnitCode']  }}"><i class="fa fa-times red"></i></a>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="control-label col-md-1-1" for="desc">설명</label>
        <div class="col-md-9 item">
            <textarea id="desc" name="desc" class="form-control" rows="3" title="내용" placeholder="">{!! $data['Desc'] !!}</textarea>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="control-label col-md-1-1">알림문자</label>
        <div class="col-md-9">
            <div class="row form-inline mb-10">
                <div class="col-md-10">
                    <span class="mr-5">[문자발송사용여부]</span>
                    <select class="form-control" name="sms_is_use">
                        <option value="Y" @if($data['IsSmsUse'] == 'Y')selected="selected"@endif>사용</option>
                        <option value="N" @if($method == 'POST' || $data['IsSmsUse'] == 'N')selected="selected"@endif>미사용</option>
                    </select>
                    <span class="mr-5">• 좌석 선택 적용완료 시 해당 문자가 발송됩니다.</span>
                </div>
            </div>
            <div class="row-line mb-10">
                <textarea class="form-control sms-content" name="sms_content" rows="3" title="문자발송내용" placeholder="">{!! $data['SmsContent'] !!}</textarea>
            </div>

            <div class="row form-inline">
                <div class="col-md-7">
                    <span class="mr-5">[발신번호]</span>
                    {!! html_callback_num_select($arr_send_callback_ccd, $data['SendTel'], 'send_tel', 'send_tel', '', '발신번호', '') !!}
                </div>
                <div class="col-md-5 mt-5 red text-right">
                    <span class="content-byte" id="content_byte">0</span> Byte <span style="color: #73879C">(55byte 이상일 경우 MMS로 전환됩니다.)</span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="control-label col-md-1-1">등록자
        </label>
        <div class="col-md-5">
            <p class="form-control-static">@if($method == 'PUT'){{ $data['RegAdminName'] }}@endif</p>
        </div>
        <label class="control-label col-md-1-1">등록일
        </label>
        <div class="col-md-4">
            <p class="form-control-static">@if($method == 'PUT'){{ $data['RegDatm'] }}@endif</p>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="control-label col-md-1-1">수정자
        </label>
        <div class="col-md-5">
            <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdAdminName'] }}@endif</p>
        </div>
        <label class="control-label col-md-1-1">수정일
        </label>
        <div class="col-md-4">
            <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdDatm'] }}@endif</p>
        </div>
    </div>

    <script type="text/javascript">
        var $modal_regi_form = $('#modal_regi_form');
        $(document).ready(function() {
            //좌석종료번호 계산
            $modal_regi_form.on('keyup change', 'input[name="use_qty"], input[name="start_no"]', function() {
                var end_no;
                var use_qty = 0 || parseInt($modal_regi_form.find('input[name="use_qty"]').val(), 10);
                var start_no = 0 || parseInt($modal_regi_form.find('input[name="start_no"]').val(), 10);
                if (use_qty < 1 || start_no < 1) { return; }
                end_no = (start_no + use_qty) -1;
                $modal_regi_form.find('input[name="end_no"]').val(end_no);
            });

            // 바이트 수
            $modal_regi_form.on('change keyup input', '.sms-content', function() {
                $("#content_byte").text(fn_chk_byte($(this).val()));
            });

            //등록,수정
            $modal_regi_form.submit(function () {
                if(!confirm('저장하시겠습니까?')) return false;
                var _url = '{{ site_url("/pass/lectureRoom/regist/storeUnit") }}';
                ajaxSubmit($modal_regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                        $("#pop_modal").modal('toggle');
                    }
                }, showValidateError, null, false, 'alert');
            });

            //파일다운로드
            $('.file-download').click(function() {
                var _url = '{{ site_url("/pass/lectureRoom/regist/download") }}/' + getQueryString() + '&path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                window.open(_url, '_blank');
            });

            // 파일삭제
            $modal_regi_form.on('click', '.file-delete', function() {
                var _url = '{{ site_url("/pass/lectureRoom/regist/destroyFile") }}' + getQueryString();
                var data = {
                    '{{ csrf_token_name() }}' : $modal_regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'lr_code' : $(this).data('lr-code'),
                    'lr_unit_code' : $(this).data('lr-unit-code')
                };
                if (!confirm('정말로 삭제하시겠습니까?')) {
                    return;
                }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#file_info_box").remove();
                    }
                }, showError, false, 'POST');
            });
        });
    </script>
@stop

@section('add_buttons')
    <button type="submit" class="btn btn-success">저장</button>
@endsection

@section('layer_footer')
    </form>
@endsection