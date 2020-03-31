@extends('lcms.layouts.master')
@section('content')
    <h5>- 좌석제 상품에 대한 주문내역을 확인하고, 좌석을 변경할 수 있는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="lr_code" value="{{ $lr_code }}" title="회차코드">

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        {{--{!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : ''), false, $arr_site_code) !!}--}}
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', '', false, $arr_site_code) !!}
                    </div>
                    <label class="control-label col-md-1-1" for="campus_ccd">캠퍼스<span class="required">*</span></label></label>
                    <div class="col-md-4 form-inline item">
                        <select class="form-control" id="campus_ccd" name="campus_ccd" title="캠퍼스" required="required" @if($method == 'PUT')disabled="disabled"@endif>
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}" @if($method == 'PUT' && ($row['CampusCcd'] == $data['CampusCcd'])) selected="selected" @endif>{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="room_name">강의실명<span class="required">*</span></label>
                    <div class="col-md-4 item">
                        <input type="text" class="form-control" id="room_name" name="room_name" required="required" title="강의실명" value="{{ $data['LectureRoomName'] }}" style="width: 80%">
                    </div>
                    <label class="control-label col-md-1-1" for="">강의실코드</label>
                    <div class="col-md-3">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['LrCode'] }}@else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($method == 'POST' || $data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4 ">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-1-1">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegDatm'] }}@endif</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">수정자
                    </label>
                    <div class="col-md-4 ">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-1-1">수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdDatm'] }}@endif</p>
                    </div>
                </div>

                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </div>
        </div>
    </form>

    @if(empty($lr_code) === false)
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="lr_code" value="{{ $lr_code }}">
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-bordered table-striped">
                <thead class="bg-white-gray">
                <tr>
                    <th>No</th>
                    <th>회차명</th>
                    <th>좌석선택기간</th>
                    <th>사용중/총좌석</th>
                    <th>잔여석</th>
                    <th>사용여부</th>
                    <th>자동문자</th>
                    <th>등록자</th>
                    <th>등록일</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            $regi_form.find('select[name="campus_ccd"]').chained("#site_code");
            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/pass/lectureRoom/regist") }}/' + getQueryString();
            });

            // ajax submit
            $regi_form.submit(function() {
                if(!confirm('저장하시겠습니까?')) return false;
                var _url = '{{ site_url("/pass/lectureRoom/regist/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/pass/lectureRoom/regist/create/') }}' + ret.ret_data.last_idx + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-files-o mr-5"></i> 좌석정보등록', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-unit-create' },
                ],
                ajax: {
                    'url' : '{{ site_url('/pass/lectureRoom/regist/listAjaxUnit') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'UnitName', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-unit-modify" data-idx="' + row.LrUnitCode + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.SeatChoiceStartDate + ' ~ ' + row.SeatChoiceEndDate;
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-unit-seat-view" data-idx="' + row.LrUnitCode + '"><u>' + row.UseSeatCnt + '/' + row.UseQty + '</u></a>';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.UseQty - row.UseSeatCnt;
                        }},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<p class="red">미사용</p>';
                        }},
                    {'data' : 'IsSmsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<p class="red">미사용</p>';
                        }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            $('.btn-unit-create').click(function() {
                $('.btn-unit-create').setLayer({
                    "url" : "{{ site_url('/pass/lectureRoom/regist/createUnitModal/'.$lr_code) }}",
                    "width" : "1200",
                });
            });

            $datatable.on('click', '.btn-unit-modify', function() {
                $('.btn-unit-modify').setLayer({
                    "url" : "{{ site_url('/pass/lectureRoom/regist/createUnitModal/'.$lr_code.'/') }}" + $(this).data('idx'),
                    "width" : "1200",
                });
            });

            $datatable.on('click', '.btn-unit-seat-view', function() {
                $('.btn-unit-seat-view').setLayer({
                    "url" : "{{ site_url('/pass/lectureRoom/regist/infoSeatModal/'.$lr_code.'/') }}" + $(this).data('idx'),
                    "width" : "1200",
                });
            });
        });
    </script>
@stop