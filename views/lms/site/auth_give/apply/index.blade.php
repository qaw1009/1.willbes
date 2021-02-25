@extends('lcms.layouts.master')
@section('content')
    <h5>- 인증 신청 정보를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-5 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', false, $arr_site_code) !!}
                        <select class="form-control" id="search_ag_idx" name="search_ag_idx">
                            @foreach($auth_list as $row)
                            <option value="{{ $row['AgIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['Title'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_apply_ccd" name="search_apply_ccd">
                            <option value="">승인여부</option>
                            @foreach($apply_ccd as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_member">회원</label>
                    <div class="col-md-7 form-inline">
                        <select name="search_member_opt" class="form-control">
                            <option value="J.MemName">이름</option>
                            <option value="J.MemId">아이디</option>
                            <option value="A.PhoneEnc">휴대폰</option>
                        </select>
                        <input type="text" class="form-control" name="search_member" style="width:300px;"> 이름, 아이디, 휴대폰번호 검색 가능
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_product">강좌/교수</label>
                    <div class="col-md-7 form-inline">
                        <select name="search_product_opt" class="form-control">
                            <option value="D.ProdName">강좌명</option>
                            <option value="H.wProfName_String">교수명</option>
                        </select>
                        <input type="text" class="form-control" name="search_product" style="width:300px;"> 강좌명, 교수명 검색 가능
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>

    <form class="form-horizontal" id="regi_form" name="regi_form">
        {!! csrf_field() !!}
        <input type="hidden" name="process_type" id="process_type" value="">
        <input type="hidden" name="app_status" id="app_status" value="">
        <input type="hidden" name='check_idx' id="check_idx" value="">
        <div class="x_panel mt-10">
            <div class="x_content">
                <table id="list_ajax_table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th class="rowspan">선택</th>
                            <th class="rowspan">회원정보</th>
                            <th class="rowspan">신청정보</th>
                            <th class="rowspan">첨부</th>
                            <th>신청강좌</th>
                            <th class="rowspan">인증신청일</th>
                            <th class="rowspan">승인자</th>
                            <th class="rowspan">승인일</th>
                            <th class="rowspan">취소자</th>
                            <th class="rowspan">취소일</th>
                            <th class="rowspan">승인상태</th>
                            <th class="rowspan">승인확인</th>
                            <th class="rowspan">주문</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');
        var $regi_form = $('#regi_form');

        $(document).ready(function() {

            $search_form.find('select[name="search_ag_idx"]').chained("#search_site_code");

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn btn-default btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-sms' },
                ],
                lengthMenu : [20,50,100],
                pageLength: 50,
                ajax: {
                    'url' : '{{ site_url('/site/authgive/authApply/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'AaIdx', 'class': 'text-center', 'render' : function(data,type,row,meta) {
                            return '<input type="checkbox" id="checkIdx'+row.AaIdx+ '" name="checkIdx[]" class="flat target-crm-member" value="'+row.AaIdx+'" data-mem-idx="'+row.MemIdx+'" data-approval="' + row.ApplyStatusCcd + '"/>';
                        }},
                    {'data' : 'MemId', 'class': 'text-center', 'render' : function(data,type,row,meta) {
                            return row.MemName+'('+row.MemId+')<BR>'+row.Phone;
                        }},
                    {'data' : 'Affiliation', 'class': 'text-center', 'render' : function(data,type,row,meta) {
                            return row.Affiliation;
                        }},
                    {'data' : 'AttachFileName', 'class': 'text-center', 'render' : function(data,type,row,meta) {
                            return $return =  row.AttachFileName != null ? '<a class="btn-attachFile glyphicon glyphicon-file" href="{{site_url('/site/authgive/authApply/download/')}}?filename=' + encodeURIComponent(row.AttachFilePath + row.AttachFileName) + '&filename_ori=' + encodeURIComponent(row.AttachFileReal) + '" target="_blank"></a>' : '';
                        }},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            return '['+ row.SubjectName+']' + row.wProfName_String + ' ' + row.ProdName +'</a>';
                        }},
                    {'data' : 'RegDatm', 'class': 'text-center', },
                    {'data' : 'ApprovalAdminName', 'class': 'text-center', },
                    {'data' : 'ApprovalDatm', 'class': 'text-center', },
                    {'data' : 'CancelAdminName' , 'class': 'text-center', },
                    {'data' : 'CancelDatm' , 'class': 'text-center', },
                    {'data' : 'ApplyStatus_Name', 'class': 'text-center', 'render' : function(data,type,row,meta) {
                            return ((row.ApplyStatusCcd === '741003' || row.ApplyStatusCcd === '741004') ? '<b><font color="red"> '+row.ApplyStatus_Name+'</font></b>' : '<b>'+row.ApplyStatus_Name+'</b>');
                        }},
                    {'data' : 'ApplyStatusCcd', 'class': 'text-center', 'render' : function(data,type,row,meta) {
                        if(row.ApplyStatusCcd === '741001') {
                            return '<a href="javascript:;" class="btn-approval btn-sm btn-success border-radius-reset mr-5" data-idx="' + row.AaIdx + '" data-app-status="741002">승인</a>' +
                                '<a href="javascript:;" class="btn-cancel btn-sm btn-danger mr-1 border-radius-reset" data-idx="' + row.AaIdx + '" data-app-status="741003">취소</a>';
                        } else if (row.ApplyStatusCcd === '741002') {
                            return '<a href="javascript:;" class="btn-cancel btn-sm btn-danger border-radius-reset" data-idx="' + row.AaIdx + '" data-app-status="741004">취소</a>';
                        } else {
                            return '';
                        }
                    }},
                    {'data' : 'ApplyStatus_Name', 'class': 'text-center', 'render' : function(data,type,row,meta) {
                            return (row.OrderIdx != null ? '<a class="btn-attachFile glyphicon glyphicon-eye-open" href="{{site_url('/pay/order/show/')}}'+row.OrderIdx+'" target="_blank"></a>' : '');
                        }},
                ]
            });

            //개별 승인/취소
            $list_table.on('click', '.btn-cancel, .btn-approval', function() {
                //var $checkidx_each = $(this).data('idx');
                if($(this).attr("class").match("btn-cancel")) {
                    $msg = '취소';
                } else if($(this).attr("class").match("btn-approval")) {
                    $msg = '승인';
                }
                if (confirm($msg + " 하시겠습니까?")) {
                    $("#process_type").val('each');
                    $("#app_status").val($(this).data('app-status'));
                    $("#check_idx").val($(this).data('idx'));

                    var _url = '{{ site_url('/site/authgive/authApply/change') }}';
                    ajaxSubmit($regi_form, _url, function (ret) {
                        if (ret.ret_cd) {
                            notifyAlert('success', '알림', ret.ret_msg);
                            $datatable.draw();
                        }
                    }, showValidateError, null, false, 'alert');
                }
            });

            //엑셀다운로드
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/site/authgive/authApply/listAjax/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

        });
    </script>
@stop