@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 사용자 운영 사이트 메뉴를 생성하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], true) !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value="{{ $def_site_code }}"/>
        <div class="x_panel">
            <div class="x_content">
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
                        <select class="form-control" id="search_menu_type" name="search_menu_type">
                            <option value="">메뉴구분</option>
                            @foreach($arr_menu_type as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
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
                        <th class="rowspan">운영사이트 [<span class="blue">코드</span>]</th>
                        <th>정렬</th>
                        <th>뎁스</th>
                        <th>메뉴코드</th>
                        <th>메뉴구분</th>
                        <th>메뉴경로 (하위메뉴 등록)</th>
                        <th style="width: 220px;">메뉴명 (메뉴 수정)</th>
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
        var $json_menu_type = {!! json_encode($arr_menu_type) !!};  // 메뉴구분 코드

        $(document).ready(function() {
            // datatable setting
            $datatable = $list_table.DataTable({
                serverSide: true,
                paging: false,
                dom: 'T<"clear"><<"pull-left mt-5 txt-caution-info"><"pull-right"B>><"clear">rtip',
                buttons: [
                    { text: '<i class="fa fa-floppy-o mr-5"></i> 수동캐시저장', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-save-cache' },
                    { text: '<i class="fa fa-sort-numeric-asc mr-5"></i> 정렬변경', className: 'btn-sm btn-success border-radius-reset mr-15 btn-reorder' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 최상위 메뉴 등록', className: 'btn-sm btn-primary border-radius-reset btn-regist' }
                ],
                ajax: {
                    'url' : '{{ site_url('/site/siteMenu/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {});
                    }
                },
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : 'SiteName', 'render' : function(data, type, row, meta) {
                        return data + '[<span class="blue">' + row.SiteCode + '</span>]';
                    }},
                    {'data' : 'OrderNum', 'render' : function(data, type, row, meta) {
                        return '<input type="text" name="order_num" class="form-control input-sm" value="' + data + '" data-origin-order-num="' + data + '" data-idx="' + row.MenuIdx + '" style="width: 80px;" />';
                    }},
                    {'data' : 'MenuDepth'},
                    {'data' : 'MenuIdx'},
                    {'data' : 'MenuType', 'render' : function(data, type, row, meta) {
                        return $json_menu_type[data];
                    }},
                    {'data' : 'MenuRouteName', 'render' : function(data, type, row, meta) {
                        return '<a href="#none" class="btn-regist" data-idx="' + row.MenuIdx + '" data-menu-depth="' + (row.MenuIdx + 1) + '"><u>' + data.replace(/>/gi, ' > ') + '</u></a>';
                    }},
                    {'data' : 'MenuName', 'render' : function(data, type, row, meta) {
                        var icon = '';
                        if (row.MenuDepth > 1) {
                            icon = '<i class="fa fa-hand-o-right red bold" style="margin-left: ' + ((row.MenuDepth - 1) * 20) + 'px;"></i>';
                        }

                        return icon + ' <a href="#none" class="btn-modify" data-idx="' + row.MenuIdx + '"><u>' + data + '</u></a>';
                    }},
                    {'data' : 'MenuUrl'},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                        return data === 'Y' ? '사용' : '<span class="red">미사용</span>';
                    }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 주의 메시지 출력
            $('div.txt-caution-info').html('<span class="red">* 사이트 메뉴 등록/수정 이후 `수동캐시저장` 버튼을 클릭해야만 운영(프런트) 사이트에 반영됩니다.</span>');

            // 카테고리 등록/수정 모달창 오픈
            $list_form.on('click', '.btn-regist, .btn-modify', function() {
                var is_regist = ($(this).prop('class').indexOf('btn-regist') !== -1) ? true : false;
                var uri_param = '';

                if (is_regist === true) {
                    var menu_depth = (typeof $(this).data('menu-depth') != 'undefined') ? $(this).data('menu-depth') : 1;
                    var parent_menu_idx = (menu_depth != 1) ? $(this).data('idx') : 0;

                    uri_param = menu_depth + '/' + parent_menu_idx;
                } else {
                    uri_param = $(this).data('idx');
                }

                $('.btn-regist, .btn-modify').setLayer({
                    'url' : '{{ site_url('/site/siteMenu/create/') }}' + uri_param,
                    'width' : 900
                });
            });

            // 수동캐시저장 버튼 클릭
            $('.btn-save-cache').on('click', function() {
                if (!confirm('수동으로 사이트 메뉴 캐시를 업데이트하시겠습니까?\n(주의요망 : 전체 사이트 메뉴 캐시가 업데이트 됨)')) {
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT'
                };
                sendAjax('{{ site_url('/site/siteMenu/saveCache') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                    }
                }, showError, false, 'POST');
            });

            // 순서 변경
            $('.btn-reorder').on('click', function() {
                if (!confirm('변경된 순서를 적용하시겠습니까?')) {
                    return;
                }

                var $order_num = $list_form.find('input[name="order_num"]');
                var $params = {};
                $order_num.each(function(idx) {
                    // 정렬순서 값이 변하는 경우에만 파라미터 설정
                    if ($(this).val() != $(this).data('origin-order-num')) {
                        $params[$(this).data('idx')] = $(this).val();
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
                sendAjax('{{ site_url('/site/siteMenu/reorder') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });
        });
    </script>
@stop
