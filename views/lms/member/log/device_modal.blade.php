@extends('lcms.layouts.master_modal')
@section('layer_title')
    기기등록정보
@stop

@section('layer_header')
    <form class="form-horizontal" id="search_form_modal" name="search_form_modal" method="POST" onsubmit="return false;">
        <input type="hidden" name="memIdx" value="{{$data['MemIdx']}}" />
        <input type="hidden" name="MdIdx" id="MdIdx" value="" />
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            {!! form_errors() !!}
            @include('lms.member.log.infonav')
            <div class="x_panel mt-0">
                <div class="x_content">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="chg_name">기기등록현황</label>
                        <div class="col-md-9 item">
                            총 {{$data['PcCount'] + $data['MobileCount']}}대(PC {{$data['PcCount']}}대 + 모바일 {{$data['MobileCount']}}대)
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="chg_name">기기등록정책</label>
                        <div class="col-md-9 item">
                            * 맥 어드레스는 PC/모바일 제한없이 최대 2대까지 등록 가능<br/>
                            * 맥 어드레스 초기화(삭제)는 1회로 제한 (회원이 직접 1회 초기화 가능)
                        </div>
                    </div>
                </div>
            </div>

            <div class="x_panel mt-10">
                <div class="x_content">
                    <table id="list_ajax_table_modal" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>기기구분</th>
                            <th>고유번호</th>
                            <td>정보</td>
                            <th>등록일</th>
                            <th>삭제일</th>
                            <th>삭제자</th>
                            <th>삭제</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
    </form>
    <div class="col-md-6">
        <h4><strong>메모관리</strong></h4>
    </div>
    <div class="col-md-6 text-right">
    </div>
    <div class="col-md-12">
        <form class="form-horizontal form-label-left" id="regi_memo_form" name="regi_memo_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="mem_idx" value="{{ $data['MemIdx']  }}"/>
            <div class="item">
                <textarea id="device_memo" name="device_memo" class="form-control" rows="3" title="메모" required="required" placeholder="메모 내용을 입력해 주십시오."></textarea>
            </div>
            <button class="btn btn-sm btn-primary mt-5">메모저장</button>
        </form>
    </div>
    <div class="col-md-12">
        <table id="list_memo_table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>메모내용</th>
                <th>등록자</th>
                <th>등록일</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form_modal');
        var $list_table = $('#list_ajax_table_modal');

        var $datatable_memo;
        var $regi_memo_form = $('#regi_memo_form');
        var $list_memo_table = $('#list_memo_table');

        $(document).ready(function() {
            $datatable = $list_table.DataTable({
                serverSide: true,
                paging : false,
                ajax: {
                    'url' : '{{ site_url("/member/manage/ajaxdeviceList/") }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta){
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'DeviceType', 'render' : function (data, type, row, meta) {
                            if(data == 'P'){ return 'PC';}
                            else if(data == 'M'){ return 'Mobile';}
                            else if(data == 'A'){ return 'App';}
                        }},
                    {'data' : 'DeviceId'},
                    {'data' : null, 'render' : function(data, type, row, meta){
                            return row.Os + ' ' + row.DeviceModel + ' (' + row.App + ')';

                        }},
                    {'data' : 'RegDatm'},
                    {'data' : 'DelDatm'},
                    {'data' : 'adminName'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            if(row.IsUse == 'Y'){
                                return '<button type="button" class="btn btn-dark bg-red mr-10" onclick="deleteDevice('+row.MdIdx+');" value="sdlkjf">삭제</botton>';
                            } else {
                                return '';
                            }

                        }}
                ]
            });

            // 메모 목록
            $datatable_memo = $list_memo_table.DataTable({
                serverSide: true,
                paging: true,
                pagingType : 'simple_numbers',
                lengthMenu: [5,10,20],
                pageLength : 5,
                ajax: {
                    'url' : '{{ site_url('/member/manage/ajaxDeviceMemo') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($regi_memo_form.find('input[type="hidden"]').serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable_memo.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'Content', 'render' : function(data, type, row, meta) {
                            return data.replace(/\n/gi, '<br/>');
                        }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDate'}
                ]
            });

            // 메모 등록
            $regi_memo_form.submit(function() {
                var _url = '{{ site_url('/member/manage/storeDeviceMemo') }}';

                ajaxSubmit($regi_memo_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $regi_memo_form.find('textarea[name="device_memo"]').val('');
                        $datatable_memo.draw();
                    }
                }, showValidateError, null, false, 'alert');
            });
        });

        function deleteDevice(MdIdx)
        {
            var _url = '{{ site_url("/member/manage/deleteDevice") }}' + getQueryString();
            $('#MdIdx').val(MdIdx);

            ajaxSubmit($search_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    // 성공후에 layer 안에 내용 변경하기
                    $datatable.draw();
                }
            }, showValidateError, false, 'alert');
        }
    </script>
@stop

@section('add_buttons')

@endsection

@section('layer_footer')
@endsection