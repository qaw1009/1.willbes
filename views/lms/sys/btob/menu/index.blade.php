@extends('lcms.layouts.master')

@section('content')
    <h5>- 제휴사 관리자 메뉴를 관리하는 메뉴입니다.</h5>
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
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
            <table id="list_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>제휴사명</th>
                    <th class="rowspan">GNB-2depth [<span class="blue">코드</span>]</th>
                    <th class="rowspan">LNB-3depth [<span class="blue">코드</span>] <button type="button" class="btn btn-xs btn-success ml-10 btn-regist" data-menu-depth="2">추가</button></th>
                    <th>LNB-4depth [<span class="blue">코드</span>] <button type="button" class="btn btn-xs btn-success ml-10 btn-regist" data-menu-depth="3">추가</button></th>
                    <th>URL</th>
                    <th>사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_form = $('#list_form');
        var $list_table = $('#list_table');

        $(document).ready(function() {
            // datatable setting
            $datatable = $list_table.DataTable({
                serverSide: true,
                paging: false,
                buttons: [
                    { text: '<i class="fa fa-sort-numeric-asc mr-5"></i> 정렬변경', className: 'btn-sm btn-success border-radius-reset mr-15 btn-reorder' },
                    { text: '<i class="fa fa-pencil mr-5"></i> GNB 메뉴등록', className: 'btn-sm btn-primary border-radius-reset btn-regist' }
                ],
                ajax: {
                    'url' : '{{ site_url('/sys/btob/btobMenu/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {});
                    }
                },
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : 'BtobName'},
                    {'data' : 'BOrderNum', 'render' : function(data, type, row, meta) {
                        var is_use = '';
                        if (row.BIsUse === 'Y') {
                            is_use = '(사용)';
                        } else if(row.BIsUse === 'N') {
                            is_use = '(<span class="red">미사용</span>)';
                        }

                        return '<input type="text" name="order_num" class="form-control" value="' + data + '" data-origin-order-num="' + data + '" data-idx="' + row.BMenuIdx + '" style="width: 50px;" />' +
                            ' <input type="radio" name="menu_idx" value="' + row.BMenuIdx + '" data-menu-depth="' + row.BMenuDepth + '" data-btob-idx="' + row.BtobIdx + '" class="flat"/>' +
                            ' <a href="#none" class="btn-modify" data-idx="' + row.BMenuIdx + '"><u>' + row.BMenuName + '</u></a>' +
                            ' [<span class="blue">' + row.BMenuIdx + '</span>] ' + is_use;
                    }},
                    {'data' : 'MOrderNum', 'render' : function(data, type, row, meta) {
                        if (row.MMenuIdx !== null) {
                            var is_use = '';
                            if (row.MIsUse === 'Y') {
                                is_use = '(사용)';
                            } else if(row.MIsUse === 'N') {
                                is_use = '(<span class="red">미사용</span>)';
                            }

                            return '<input type="text" name="order_num" class="form-control" value="' + data + '" data-origin-order-num="' + data + '" data-idx="' + row.MMenuIdx + '" style="width: 50px;" />' +
                                ' <input type="radio" name="menu_idx" value="' + row.MMenuIdx + '" data-menu-depth="' + row.MMenuDepth + '" data-btob-idx="' + row.BtobIdx + '" class="flat"/>' +
                                ' <a href="#none" class="btn-modify" data-idx="' + row.MMenuIdx + '"><u>' + row.MMenuName + '</u></a>' +
                                ' [<span class="blue">' + row.MMenuIdx + '</span>] ' + is_use;
                        } else {
                            return '';
                        }
                    }},
                    {'data' : 'SOrderNum', 'render' : function(data, type, row, meta) {
                        if (row.SMenuIdx !== null) {
                            return '<input type="text" name="order_num" class="form-control" value="' + data + '" data-origin-order-num="' + data + '" data-idx="' + row.SMenuIdx + '" style="width: 50px;" />' +
                                ' <a href="#none" class="btn-modify" data-idx="' + row.SMenuIdx + '"><u>' + row.SMenuName + '</u></a>' +
                                ' [<span class="blue">' + row.SMenuIdx + '</span>]';
                        } else {
                            return '';
                        }
                    }},
                    {'data' : 'LastMenuUrl'},
                    {'data' : 'LastIsUse', 'render' : function(data, type, row, meta) {
                        return data === 'Y' ? '사용' : '<span class="red">미사용</span>';
                    }},
                    {'data' : 'LastRegAdminName'},
                    {'data' : 'LastRegDatm'}
                ]
            });

            // 제휴사 메뉴 등록/수정 모달창 오픈
            $list_form.on('click', '.btn-regist, .btn-modify', function() {
                var is_regist = ($(this).prop('class').indexOf('btn-regist') !== -1) ? true : false;
                var uri_param = '';

                if (is_regist === true) {
                    var parent_menu_idx = 0;
                    var btob_idx = 0;
                    var menu_depth = (typeof $(this).data('menu-depth') != 'undefined') ? $(this).data('menu-depth') : 1;
                    if (menu_depth != 1) {
                        parent_menu_idx = $list_form.find('input[name="menu_idx"]:checked').val();

                        if (typeof parent_menu_idx == 'undefined' || $list_form.find('input[name="menu_idx"]:checked').data('menu-depth') != (menu_depth - 1)) {
                            alert('상위 그룹유형을 선택해 주세요.');
                            return false;
                        }

                        btob_idx = $list_form.find('input[name="menu_idx"]:checked').data('btob-idx');
                    }
                    uri_param = menu_depth + '/' + parent_menu_idx + '/' + btob_idx;
                } else {
                    uri_param = $(this).data('idx');
                }

                $('.btn-regist, .btn-modify').setLayer({
                    'url' : '{{ site_url('/sys/btob/btobMenu/create/') }}' + uri_param,
                    'width' : 900
                });
            });

            // 순서 변경
            $('.btn-reorder').on('click', function() {
                if (!confirm('변경된 순서를 적용하시겠습니까?')) {
                    return;
                }

                var $order_num = $list_form.find('input[name="order_num"]');
                var $params = {};
                $order_num.each(function(idx) {
                    // rowspan 데이터는 첫번째 display 되는 값으로 파라미터 설정
                    if ($order_num.eq(idx).closest('td').css('display') != 'none') {
                        // 정렬순서 값이 변하는 경우에만 파라미터 설정
                        if ($(this).val() != $(this).data('origin-order-num')) {
                            $params[$(this).data('idx')] = $(this).val();
                        }
                    }
                });

                if (Object.keys($params).length < 1) {
                    alert('변경된 내용이 없습니다.');
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };
                sendAjax('{{ site_url('/sys/btob/btobMenu/reorder') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });
        });
    </script>
@stop
