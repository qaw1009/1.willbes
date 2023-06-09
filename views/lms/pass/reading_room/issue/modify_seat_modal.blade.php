@extends('lcms.layouts.master_modal')

@section('layer_title')
    좌석변경
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
    {{--<form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" action="{{ site_url("/pass/readingRoom/issue/storeSeatChange") }}?{!! $default_query_string !!}" novalidate>--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="now_order_idx" value="{{ $data['NowOrderIdx'] }}"/>
        @endsection

        @section('layer_content')
            <h5>• 좌석정보</h5>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">운영사이트
                </label>
                <div class="col-md-4">
                    {{$data['SiteName']}}
                </div>
                <label class="control-label col-md-1-1">캠퍼스
                </label>
                <div class="col-md-4">
                    {{$data['CampusName']}}
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">주문번호
                </label>
                <div class="col-md-4">
                    {{$data['OrderNo']}}
                </div>
                <label class="control-label col-md-1-1">결제금액(결제상태)
                </label>
                <div class="col-md-4">
                    {{$data['RealPayPrice']}}원 ({{$data['PayStatusName']}})
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">회원명(아이디)
                </label>
                <div class="col-md-4">
                    {{$data['MemName']}} ({{$data['MemId']}})
                </div>
                <label class="control-label col-md-1-1">연락처
                </label>
                <div class="col-md-4">
                    {{$data['MemPhone']}}
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">독서실명(예치금)
                </label>
                <div class="col-md-4">
                    {{$data['ReprProdName']}} <span class="blue">[예치금]</span> {{number_format($data['SubRealPayPrice'])}}원
                </div>
                <label class="control-label col-md-1-1">좌석번호
                </label>
                <div class="col-md-4">
                    {{$data['SerialNumber']}}
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">좌석상태
                </label>
                <div class="col-md-10 form-inline">
                    {{$arr_seat_status[$data['SeatStatusCcd']]}}
                    <input type="hidden" name="rdr_seat_status" value="{{$data['SeatStatusCcd']}}">
                    {{--<div class="radio">
                        @foreach($arr_seat_status as $key => $val)
                            <input type="radio" id="rdr_seat_status_{{$key}}" name="rdr_seat_status" class="flat" value="{{$key}}" title="좌석상태" @if($data['SeatStatusCcd'] == $key)checked="checked"@endif/>
                            <label for="rdr_seat_status_{{$key}}" class="input-label">{{$val}}</label>
                        @endforeach
                    </div>--}}
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">대여기간
                </label>
                <div class="col-md-10 form-inline">
                    {{$data['UseStartDate']}} ~ {{$data['UseEndDate']}}
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">좌석이동
                </label>
                <div class="col-md-2 form-inline">
                    <input type="text" class="form-control" id="set_seat" name="set_seat" value="{{$data['SerialNumber']}}" autocomplete="off" style="width: 80px;" readonly="readonly">
                </div>
                <div class="col-md-6 form-inline">
                    <p class="form-control-static">• 동일 운영사이트/캠퍼스 내에서만 이동 가능 (좌석표에서 좌석 선택 시 좌석번호 자동 입력)</p>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">예치금여부
                </label>
                <div class="col-md-2 form-inline">
                    {{$data['SubRefundTypeName']}}
                    <a href="{{ site_url('/pay/order/show/'.$data['OrderIdx']) }}" class="btn btn-sm btn-dark" target="_blank">예치금 반환</a>
                </div>
                <div class="col-md-8 form-inline">
                    <p class="form-control-static bg-orange">• 결제/환불 정보에 따라 자동 셋팅되며 수정불가 ([LMS] 결제관리 > 환불관리에서 예치금 반환 처리 </p>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <div class="col-md-12 form-inline">
                    <div class="n_mem_seat_info">
                        <ul class="clearfix-r">
                            @foreach($arr_seat_status as $key => $val)
                                @php
                                    $btn_type = '';
                                    switch ($key) {
                                        case "682001" : $btn_type = 'btn-default'; break;
                                        case "682002" : $btn_type = 'btn-info'; break;
                                        case "682003" : $btn_type = 'btn-warning'; break;
                                        case "682004" : $btn_type = 'btn-success'; break;
                                        case "682005" : $btn_type = 'btn-danger'; break;
                                    }
                                @endphp
                                <li><span class="color-box {{$btn_type}}">-</span> {{$val}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <ul class="n_mem_seat">
                        @foreach($seat_data as $row)
                            @php
                                $btn_type = '';
                                switch ($row['StatusCcd']) {
                                    case "682001" : $btn_type = 'btn-default'; break;
                                    case "682002" : $btn_type = 'btn-info'; break;
                                    case "682003" : $btn_type = 'btn-warning'; break;
                                    case "682004" : $btn_type = 'btn-success'; break;
                                    case "682005" : $btn_type = 'btn-danger'; break;
                                }
                            @endphp
                            <li>
                                <button type="button" id="_seat_{{$row['SerialNumber']}}" class="btn {{$btn_type}} btn_choice_seat" data-seat-type="{{$row['StatusCcd']}}" data-seat-num="{{$row['SerialNumber']}}" data-member-idx="{{$row['MemIdx']}}">{{$row['SerialNumber']}}
                                    <p>{{(empty($row['MemName']) === true) ? '미사용' : $row['MemName']}}</p>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="form-group btn-wrap clear pt-20">
                <div class="text-left col-md-5 form-inline">
                    <button type="button" class="btn btn-sm btn-default" id="btn_seat_out">퇴실처리</button>
                </div>
                <div class="text-left col-md-6 form-inline">
                    <button type="submit" class="btn btn-sm btn-success">수정</button>
                </div>
            </div>

            <div class="row form-group-sm pt-20">
                <div class="text-left col-md-6 form-inline">
                    <h5 class="clearfix">• 메모관리</h5>
                </div>
                <div class="text-right col-md-6 form-inline">
                    <button type="button" class="btn btn-sm btn-primary mr-20" id="btn_memo">메모저장</button>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <div class="col-md-12">
                    <textarea id="memo_content" name="memo_content" class="form-control" rows="7" title="내용" placeholder="ex) 총무 결제, 1층A 6번 → 2층B 4번으로 자리 이동"></textarea>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <div class="col-md-12">
                    <table id="list_ajax_table_modal" class="table table-striped table-bordered">
                        <colgroup>
                            <col style="width: 8%;">
                            <col>
                            <col style="width: 15%;">
                            <col style="width: 20%;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>메모내용</th>
                                <th>등록자</th>
                                <th>등록일</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        @stop

        @section('layer_footer')
    </form>

    <script type="text/javascript">
        var $datatable_modal;
        var $list_ajax_table_modal = $('#list_ajax_table_modal');
        var $_regi_form = $('#_regi_form');
        var is_change_seat = '{{$is_change_seat}}';

        $(document).ready(function() {
            var set_table_row = '{{$data['TransverseNum']}}';
            $('.n_mem_seat li').css('width', 'calc(100% / '+set_table_row+')');

            //좌석선택
            $('.btn_choice_seat').click(function() {
                var seat_num = $(this).data('seat-num');
                var is_use_seat = 'N';

                if (is_change_seat == 'N') {
                    alert('대여기간이 만료된 상태에서는 좌석변경을 할 수 없습니다.');
                    return false;
                }

                if ($(this).data('member-idx') != '') {
                    is_use_seat = 'Y';
                }

                if ($(this).data('seat-type') != '682001') {
                    is_use_seat = 'Y';
                }

                if (is_use_seat == 'Y') {
                    alert('미사용 좌석만 선택가능합니다. 다른 좌석을 선택해주세요.');
                    return false;
                }
                $('.btn_choice_seat').removeAttr('style');
                $(this).css('background-color','#12ec23');
                $('#set_seat').val(seat_num);
            });

            $datatable_modal = $list_ajax_table_modal.DataTable({
                serverSide: true,
                buttons: [],
                ajax: {
                    'url' : '{{ site_url('/pass/readingRoom/issue/ajaxListMemo/') }}' + '{{$data['MasterOrderIdx']}}' + '?' + '{!! $default_query_string !!}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($_regi_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'Memo', 'render' : function(data, type, row, meta) {
                            return nl2br(data);
                        }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            //메모저장
            $('#btn_memo').on('click', function() {
                {!! check_menu_perm_inner_script('write') !!}
                var _url = '{{ site_url('/pass/readingRoom/issue/storeMemo') }}' + '?' + '{!! $default_query_string !!}';
                var memo = $('#memo_content').val();

                if (memo == '') {
                    alert('메모를 입력해주세요.');
                    return false;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $_regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'master_order_idx' : '{{$data['MasterOrderIdx']}}',
                    'memo_content' : memo
                };

                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable_modal.draw();
                    }
                }, showError, false, 'POST');
            });

            //퇴실처리
            $('#btn_seat_out').on('click', function() {
                {!! check_menu_perm_inner_script('write') !!}
                var now_seat_id = "_seat_{{$data['SerialNumber']}}";
                var _url = '{{ site_url('/pass/readingRoom/issue/storeSeatOut') }}' + '?' + '{!! $default_query_string !!}';
                var data = {
                    '{{ csrf_token_name() }}' : $_regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'lr_idx' : '{{$data['LrIdx']}}',
                    'now_order_idx' : '{{$data['NowOrderIdx']}}',
                    'now_seat_num' : '{{$data['SerialNumber']}}'
                };

                if (!confirm('퇴실 시 좌석 정보가 \'미사용\'으로 변경되어 환불이 불가합니다.\n퇴실처리 하시겠습니까?’')) {
                    return;
                }

                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $('#'+now_seat_id).removeClass('btn-info').addClass('btn-default');
                        $('#'+now_seat_id+'> p').text('미사용');
                        $("input:radio[name='rdr_seat_status']").removeAttr("checked");
                        $("input:radio[name='rdr_seat_status']").prop('checked', false).iCheck('update');
                    }
                }, showError, false, 'POST');
            });

            $_regi_form.submit(function() {
                {!! check_menu_perm_inner_script('write') !!}
                var _url = '{{ site_url('/pass/readingRoom/issue/storeSeatChange') }}' + '?' + '{!! $default_query_string !!}';

                if (!confirm('수정 하시겠습니까?')) {
                    return false;
                }

                ajaxSubmit($_regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

        });

        function nl2br(str){
            return str.replace(/\n/g, "<br />");
        }

        function addValidate() {
            return true;
        }
    </script>
@endsection