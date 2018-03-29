@extends('lcms.layouts.master')

@section('content')
    <h5>- WBS 메뉴를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
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
                    <th class="searching rowspan">GNB-2depth [<span class="blue">코드</span>]</th>
                    <th class="searching rowspan">LNB-3depth [<span class="blue">코드</span>] <button type="button" class="btn btn-xs btn-success ml-10 btn-regist" data-menu-depth="2">추가</button></th>
                    <th class="searching">LNB-4depth [<span class="blue">코드</span>] <button type="button" class="btn btn-xs btn-success ml-10 btn-regist" data-menu-depth="3">추가</button></th>
                    <th>URL</th>
                    <th class="searching_is_use">사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>
                            <div class="form-group form-group-sm">
                                <input type="text" name="order_num" class="form-control" value="{{ $row['wBOrderNum'] }}" data-origin-order-num="{{ $row['wBOrderNum'] }}" data-idx="{{ $row['wBMenuIdx'] }}" style="width: 30px;" />
                                <input type="radio" name="menu_idx" value="{{ $row['wBMenuIdx'] }}" data-menu-depth="{{ $row['wBMenuDepth'] }}" class="flat"/>
                                <a href="#none" class="btn-modify" data-idx="{{ $row['wBMenuIdx'] }}"><u>{{ $row['wBMenuName'] }}</u></a>
                                [<span class="blue">{{ $row['wBMenuIdx'] }}</span>]
                                @if($row['wBIsUse'] == 'Y') (사용) @elseif($row['wBIsUse'] == 'N') (<span class="red">미사용</span>) @endif
                            </div>
                        </td>
                        <td>
                            @if(empty($row['wMMenuIdx']) === false)
                                <div class="form-group form-group-sm">
                                    <input type="text" name="order_num" class="form-control" value="{{ $row['wMOrderNum'] }}" data-origin-order-num="{{ $row['wMOrderNum'] }}" data-idx="{{ $row['wMMenuIdx'] }}" style="width: 30px;" />
                                    <input type="radio" name="menu_idx" value="{{ $row['wMMenuIdx'] }}" data-menu-depth="{{ $row['wMMenuDepth'] }}" class="flat"/>
                                    <a href="#none" class="btn-modify" data-idx="{{ $row['wMMenuIdx'] }}"><u>{{ $row['wMMenuName'] }}</u></a>
                                    [<span class="blue">{{ $row['wMMenuIdx'] }}</span>]
                                    @if($row['wMIsUse'] == 'Y') (사용) @elseif($row['wMIsUse'] == 'N') (<span class="red">미사용</span>) @endif
                                </div>
                            @endif
                        </td>
                        <td>
                            @if(empty($row['wSMenuIdx']) === false)
                                <div class="form-group form-group-sm">
                                    <input type="text" name="order_num" class="form-control" value="{{ $row['wSOrderNum'] }}" data-origin-order-num="{{ $row['wSOrderNum'] }}" data-idx="{{ $row['wSMenuIdx'] }}" style="width: 30px;" />
                                    <a href="#none" class="btn-modify" data-idx="{{ $row['wSMenuIdx'] }}"><u>{{ $row['wSMenuName'] }}</u></a>
                                    [<span class="blue">{{ $row['wSMenuIdx'] }}</span>]
                                </div>
                            @endif
                        </td>
                        <td>{{ $row['wLastMenuUrl'] }}</td>
                        <td>@if($row['wLastIsUse'] == 'Y') 사용 @elseif($row['wLastIsUse'] == 'N') <span class="red">미사용</span> @endif
                            <span class="hide">{{ $row['wLastIsUse'] }}</span>
                        </td>
                        <td>{{ $row['wLastRegAdminName'] }}</td>
                        <td>{{ $row['wLastRegDatm'] }}</td>
                    </tr>
                @endforeach
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
                ajax: false,
                paging: false,
                searching: true,
                rowsGroup: ['.rowspan'],
                buttons: [
                    { text: '<i class="fa fa-sort-numeric-asc mr-5"></i> 정렬변경', className: 'btn-sm btn-success border-radius-reset mr-15 btn-reorder' },
                    { text: '<i class="fa fa-pencil mr-5"></i> GNB 메뉴등록', className: 'btn-sm btn-primary border-radius-reset btn-regist' }
                ]
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

                var data = {
                    '{{ csrf_token_name() }}' : $list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };
                sendAjax('{{ site_url('/sys/menu/reorder') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
            });

            // 메뉴 등록/수정 모달창 오픈
            $('.btn-regist, .btn-modify').click(function() {
                var is_regist = ($(this).prop('class').indexOf('btn-regist') !== -1) ? true : false;
                var uri_param = '';

                if (is_regist === true) {
                    var parent_menu_idx = 0;
                    var menu_depth = (typeof $(this).data('menu-depth') != 'undefined') ? $(this).data('menu-depth') : 1;
                    if (menu_depth != 1) {
                        parent_menu_idx = $list_form.find('input[name="menu_idx"]:checked').val();

                        if (typeof parent_menu_idx == 'undefined' || $list_form.find('input[name="menu_idx"]:checked').data('menu-depth') != (menu_depth - 1)) {
                            alert('상위 그룹유형을 선택해 주세요.');
                            return false;
                        }
                    }
                    uri_param = menu_depth + '/' + parent_menu_idx;
                } else {
                    uri_param = $(this).data('idx');
                }

                $('.btn-regist, .btn-modify').setLayer({
                    'url' : '{{ site_url('/sys/menu/create/') }}' + uri_param,
                    'width' : 900
                });
            });
        });

        // datatable searching
        function datatableSearching() {
            $datatable
                .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                .draw();
        }
    </script>
@stop
