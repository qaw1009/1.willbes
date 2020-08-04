@extends('btob.layouts.master')

@section('content')
<h5>- 첨삭 회차 등록 및 수강생의 첨삭 답안 제출 현황을 확인하는 메뉴입니다.</h5>
<div class="x_panel">
    <div class="x_content">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>캠퍼스</th>
                <th>강좌기본정보</th>
                <th>수강형태</th>
                <th>과정</th>
                <th>과목</th>
                <th>강사</th>
                <th>단과반명</th>
                <th>판매여부</th>
                <th>사용여부</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$product_data['CampusCcd_Name']}}</td>
                <td>
                    {{$product_data['SiteName']}}<br>
                    {{(empty($product_data['CateName_Parent']) === true ? '' : $product_data['CateName_Parent'].'<Br>')}} {{$product_data['CateName']}}<br>
                    {{$product_data['SchoolYear']}}
                </td>
                <td>{{$product_data['StudyPatternCcd_Name']}}</td>
                <td>{{$product_data['CourseName']}}</td>
                <td>{{$product_data['SubjectName']}}</td>
                <td>{{$product_data['wProfName_String']}}</td>
                <td>[{{$product_data['ProdCode']}}] {{$product_data['ProdName']}}</td>
                <td>
                    @if($product_data['SaleStatusCcd_Name'] == '판매불가')
                    <span class="red">{{$product_data['SaleStatusCcd_Name']}}</span>
                    @else
                    {{$product_data['SaleStatusCcd_Name']}}
                    @endif
                </td>
                <td>
                    {!! ($product_data['IsUse'] == 'Y') ? '사용' : '<span class="red">미사용</span>' !!}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-xs-12 text-right form-inline">
            <button type="button" class="btn btn-sm btn-primary ml-10 btn-product-list">전체강좌목록</button>
        </div>
    </div>
</div>

<form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    <input type="hidden" name="site_code" value="{{$arr_base['site_code']}}">
    <input type="hidden" name="prod_code" value="{{$arr_base['prod_code']}}">

    <div class="x_panel">
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-1" for="search_value">조건검색</label>
                <div class="col-md-11 form-inline">
                    <select class="form-control" id="search_is_reply" name="search_is_reply">
                        <option value="">채점여부</option>
                        <option value="Y">채점완료</option>
                        <option value="N">미채점</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-1" for="search_value">회차명/내용</label>
                <div class="col-md-5 form-inline">
                    <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;">
                </div>
                <label class="control-label col-md-1">검색일</label>
                <div class="col-md-5 form-inline">
                    <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                        <option value="ca.RegDatm">배정일</option>
                        <option value="cua.RegDatm">채점일</option>
                        <option value="cua.ReplyRegDatm">제출일</option>
                    </select>
                    <div class="input-group mb-0 mr-20">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="" autocomplete="off">
                        <div class="input-group-addon no-border no-bgcolor">~</div>
                        <div class="input-group-addon no-border-right">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="" autocomplete="off">
                    </div>
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

<div class="x_panel mt-10">
    <div class="x_content">
        <table id="list_ajax_table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>번호</th>
                <th>회차명</th>
                <th>첨부</th>
                <th>등록자</th>
                <th>제출기간</th>
                <th>제출일</th>
                <th>배정일</th>
                <th>담당자</th>
                <th>채점여부</th>
                <th>채점일</th>
                <th>점수</th>
                <th>채점료</th>
                <th>삭제</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var $datatable;
    var $search_form = $('#search_form');
    var $list_table = $('#list_ajax_table');

    $(document).ready(function() {
        $datatable = $list_table.DataTable({
            serverSide: true,
            ajax: {
                'url' : '{{ site_url('/correct/regist/issueForProductAjax') }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            "createdRow" : function( row, data, index ) {
                if (data['IsStatus'] == 'N') {
                    $(row).addClass('bg-gray-custom');
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : 'Title', 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="btn-manager-assignment" data-idx="' + row.CuaIdx + '"><u>' + data + '</u></a>';
                    }},
                {'data' : 'AttachAssignmentData_User', 'render' : function(data, type, row, meta) {
                        var tmp_return;
                        (data === null) ? tmp_return = '' : tmp_return = '<p class="glyphicon glyphicon-file"></p>';
                        return tmp_return;
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        var str = row.MemId;
                        return row.MemName + ' ('+row.MemId+')';
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        var string = (row.Date_Diff < '0') ? ' <p class="red">(종료)</p>' : '';
                        return row.StartDate + ' - ' + row.EndDate + string;
                    }},
                {'data' : 'RegDatm'},
                {'data' : 'AssignRegDate'},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        var str = row.AssignAdminName;
                        if (row.IsReply == 'Y' && row.SuperAdminName != null) {
                            str += '<p><b>관리자채점 : '+row.SuperAdminName+'</b></p>';
                        }
                        return str;
                    }},
                {'data' : 'IsReply', 'render' : function(data, type, row, meta) {
                        var str = '<p class="red">미채점</p>';
                        if (data == 'Y') {
                            var str = '채점완료';
                        }
                        return str;
                    }},
                {'data' : 'IsReply', 'render' : function(data, type, row, meta) {
                        var str = '<p class="red">미채점</p>';
                        if (data == 'Y') {
                            var str = row.ReplyRegDatm;
                        }
                        return str;
                    }},
                {'data' : 'ReplyScore'},
                {'data' : 'Price', 'render' : function(data, type, row, meta) {
                        return comma(data);
                    }},

                {'data' : 'BaIdx', 'render' : function(data, type, row, meta) {
                        if (row.IsStatus == 'Y') {
                            if (row.AssignmentStatusCcd == '698002') {
                                return '<a href="javascript:void(0);" class="btn-delete" data-idx="' + row.CuaIdx + '"><u><p class="red">삭제</p></u></a>';
                            } else {
                                return '삭제불가';
                            }
                        } else {
                            return '삭제처리완료';
                        }
                    }},
            ],
        });

        //전체강좌목록
        $('.btn-product-list').click(function() {
            location.href = '{{ site_url("/correct/regist/product/") }}';
        });

        $list_table.on('click', '.btn-manager-assignment', function() {
            var idx = $(this).data('idx');
            $('.btn-manager-assignment').setLayer({
                "url" : "{{ site_url("/grade/issue/managerAssignmentModal") }}",
                "width" : "1200",
                'add_param_type' : 'param',
                'add_param' : [
                    { 'id' : 'cua_idx', 'name' : '첨삭식별자', 'value' : idx, 'required' : true }
                ]
            });
        });

        $list_table.on('click', '.btn-delete', function() {
            var _url = '{{ site_url("/correct/regist/deleteAssignment") }}/' + $(this).data('idx') + getQueryString();
            var data = {
                '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE'
            };

            if (!confirm('해당 과제를 삭제하시겠습니까?')) {
                return;
            }
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable.draw();
                }
            }, showError, false, 'POST');
        });
    });

    function comma(str) {
        str = String(str);
        return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
    }
</script>
@stop