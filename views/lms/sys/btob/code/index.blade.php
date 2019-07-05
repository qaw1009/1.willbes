@extends('lcms.layouts.master')
@section('content')
    <h5>- 제휴사 사이트 운영을 위한 공통코드를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_btob_idx">제휴사검색</label>
                    <div class="col-md-2">
                        <select class="form-control" id="search_btob_idx" name="search_btob_idx">
                            @foreach($arr_btob_idx as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static"><span class="required">*</span> 제휴사를 선택해 주세요.</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>

                        <select class="form-control" id="search_is_value_use" name="search_is_value_use">
                            <option value="">세부항목값사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>제휴사명</th>
                    <th class="rowspan">그룹유형 [<span class="blue">코드</span>]</th>
                    <th>세부항목명 [<span class="blue">코드</span>] <button type="button" class="btn btn-xs btn-success ml-10 btn-regist" data-code-type="sub">추가</button></th>
                    <th>세부항목값</th>
                    <th>세부항목설명</th>
                    <th>값사용여부</th>
                    <th>사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
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
                paging: true,
                pageLength: 50,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 그룹유형등록', className: 'btn-sm btn-primary border-radius-reset btn-regist' }
                ],
                ajax: {
                    'url' : '{{ site_url('/sys/btob/btobCode/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length });
                    }
                },
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'BtobName'},
                    {'data' : 'ParentCcd', 'render' : function(data, type, row, meta) {
                        return '<input type="radio" name="GroupCcd" value="' + data + '"  class="flat"/>' +
                            ' <a href="#none" class="btn-modify" data-ccd="' + data + '" data-code-type="group" data-group-ccd="0" >' +
                            '<u>' + row.ParentName + ' [<span class="blue">' + data + '</span>]</u></a>';
                    }},
                    {'data' : 'Ccd', 'render' : function(data, type, row, meta) {
                        if (data !== null) {
                            return '<a href="#none" class="btn-modify" data-ccd="' + data + '" data-code-type="sub" data-group-ccd="' + row.ParentCcd + '">' +
                                '<u>' + row.CcdName + ' [<span class="blue">' + data + '</span>]</u></a>';
                        } else {
                            return '';
                        }
                    }},
                    {'data' : 'CcdValue'},
                    {'data' : 'CcdDesc'},
                    {'data' : 'IsValueUse', 'render' : function(data, type, row, meta) {
                        return data === 'Y' ? '<span class="red">사용</span>' : '미사용';
                    }},
                    {'data' : 'IsUseView', 'render' : function(data, type, row, meta) {
                        if (data !== '') {
                            return data === '사용' ? data : '<span class="red">미사용</span>';
                        } else {
                            return '';
                        }
                    }},
                    {'data' : 'wAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 제휴사 코드 등록/수정 모달창 오픈
            $('#list_ajax_table_wrapper').on('click', '.btn-regist, .btn-modify-parent, .btn-modify', function() {
                var strMakeType = '';
                var strGroupCcd = '';
                var strCcd = '';
                var uri_param = '';
                var is_regist = $(this).prop('class').indexOf('btn-regist') !== -1;

                if (is_regist) {    //등록
                    strMakeType = (typeof $(this).data('code-type') !== 'undefined') ? $(this).data('code-type') : "group";

                    if(strMakeType === "group") {
                        strGroupCcd = "0"
                    } else {
                        if ($list_table.find('input[name="GroupCcd"]:checked').length === 0) {
                            alert("그룹유형을 선택해 주세요.");
                            return false;
                        }
                        strGroupCcd =$list_table.find('input[name="GroupCcd"]:checked').val();
                    }
                    uri_param = strMakeType+"/"+strGroupCcd+"/";
                }  else {           //수정
                    strMakeType = $(this).data('code-type');
                    strGroupCcd = $(this).data('group-ccd');
                    strCcd = $(this).data('ccd');
                    uri_param = strMakeType+"/"+strGroupCcd+"/"+strCcd;
                }

                $('.btn-regist, .btn-modify').setLayer({
                    "url" : "{{ site_url('sys/btob/btobCode/createModal/') }}"+ uri_param
                    ,width : "800"
                });
            });
        });
    </script>
@stop
