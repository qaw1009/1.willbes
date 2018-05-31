@extends('lcms.layouts.master')

@section('content')
    <ul class="nav nav-tabs bar_tabs mb-20" role="tablist">
        <li role="presentation"><a href="{{ site_url('/sys/site/index/code') }}">사이트 생성관리</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/site/index/group') }}">사이트 그룹 정보관리</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/site/index/category') }}">사이트 카테고리 관리</a></li>
        <li role="presentation" class="active"><a href="{{ site_url('/sys/site/index/menu') }}" class="cs-pointer"><strong>사이트 메뉴 관리</strong></a></li>
    </ul>
    <h5>- 윌비스 사용자 운영 사이트 메뉴를 생성하는 메뉴입니다.</h5>
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
                        <th class="searching rowspan">운영사이트 [<span class="blue">코드</span>]</th>
                        <th>정렬</th>
                        <th>뎁스</th>
                        <th>메뉴코드</th>
                        <th class="searching">메뉴경로 (하위메뉴 등록)</th>
                        <th class="searching">메뉴명 (메뉴 수정)</th>
                        <th>URL</th>
                        <th class="searching_is_use">사용여부</th>
                        <th>등록자</th>
                        <th>등록일</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row['SiteName'] }} [<span class="blue">{{ $row['SiteCode'] }}</span>]</td>
                            <td>
                                <div class="form-group form-group-sm">
                                    <input type="text" name="order_num" class="form-control" value="{{ $row['OrderNum'] }}" data-origin-order-num="{{ $row['OrderNum'] }}" data-idx="{{ $row['MenuIdx'] }}" style="width: 80px;" />
                                </div>
                            </td>
                            <td>{{ $row['MenuDepth'] }}</td>
                            <td>{{ $row['MenuIdx'] }}</td>
                            <td>
                                <a href="#none" class="btn-regist" data-idx="{{ $row['MenuIdx'] }}" data-menu-depth="{{ $row['MenuDepth'] + 1 }}"><u>{{ str_replace('>', ' > ', $row['MenuRouteName']) }}</u></a></td>
                            <td>
                                @if($row['MenuDepth'] > 1)
                                    <i class="fa fa-reply fa-rotate-180 red" style="margin-left: {{ ($row['MenuDepth'] - 1) * 15 }}px;"></i>
                                @endif
                                <a href="#none" class="btn-modify" data-idx="{{ $row['MenuIdx'] }}"><u>{{ $row['MenuName'] }}</u></a>
                            </td>
                            <td>{{ $row['MenuUrl'] }}</td>
                            <td>@if($row['IsUse'] == 'Y') 사용 @elseif($row['IsUse'] == 'N') <span class="red">미사용</span> @endif
                                <span class="hide">{{ $row['IsUse'] }}</span>
                            </td>
                            <td>{{ $row['RegAdminName'] }}</td>
                            <td>{{ $row['RegDatm'] }}</td>
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
                    { text: '<i class="fa fa-pencil mr-5"></i> 최상위 메뉴 등록', className: 'btn-sm btn-primary border-radius-reset btn-regist' }
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
                    // 정렬순서 값이 변하는 경우에만 파라미터 설정
                    if ($(this).val() != $(this).data('origin-order-num')) {
                        $params[$(this).data('idx')] = $(this).val();
                    }
                });

                var data = {
                    '{{ csrf_token_name() }}' : $list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };
                sendAjax('{{ site_url('/sys/site/reorder/menu') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace(location.href + dtParamsToQueryString($datatable));
                    }
                }, showError, false, 'POST');
            });

            // 카테고리 등록/수정 모달창 오픈
            $('.btn-regist, .btn-modify').click(function() {
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
                    'url' : '{{ site_url('/sys/site/create/menu/') }}' + uri_param,
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
