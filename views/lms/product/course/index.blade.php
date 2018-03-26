@extends('lcms.layouts.master')

@section('content')
    <h5>- 강의 구성을 위한 기본 과정 정보를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        <ul class="nav nav-tabs bar_tabs mt-30" role="tablist">
            <li role="presentation" class="active"><a href="#none"><strong>전체</strong></a></li>
            <li role="presentation"><a href="#none"><strong>경찰</strong></a></li>
            <li role="presentation"><a href="#none"><strong>공무원</strong></a></li>
            <li role="presentation"><a href="#none"><strong>임용</strong></a></li>
        </ul>
        <div id="tabs_site_code1" class="tabs-site-codes" data-is-all-tab="1" data-tab-type="tab" data-tab-data="{'all':10,'2001':1,'2002':2,'2003':3,'2004':4}"></div>
        <div id="tabs_site_code2" class="tabs-site-codes" data-is-all-tab="0" data-tab-type="self"></div>
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
                    <th>No</th>
                    <th>운영 사이트</th>
                    <th class="searching">과정코드</th>
                    <th class="searching">과정명</th>
                    <th class="searching_is_use">사용여부</th>
                    <th>정렬</th>
                    <th>등록자</th>
                    <th>등록일</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $loop->index }}</td>
                        <td>운영 사이트</td>
                        <td>{{ $row['RoleIdx'] }}</td>
                        <td><a href="#" class="btn-modify" data-idx="{{ $row['RoleIdx'] }}"><u>{{ $row['RoleName'] }}</u></a></td>
                        <td>@if($row['IsUse'] == 'Y') 사용 @elseif($row['IsUse'] == 'N') <span class="red">미사용</span> @endif
                            <span class="hide">{{ $row['IsUse'] }}</span>
                        </td>
                        <td>
                            <input type="text" name="order_num" class="form-control" value="" data-origin-order-num="{{ $row['OrderNum'] }}" data-idx="{{ $row['RoleIdx'] }}" style="width: 30px;" />
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
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                ajax: false,
                paging: false,
                searching: true,
                buttons: [
                    { text: '<i class="fa fa-sort-numeric-asc mr-5"></i> 정렬변경', className: 'btn-sm btn-success border-radius-reset mr-15 btn-reorder' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 과정 등록', className: 'btn-sm btn-primary border-radius-reset btn-regist' }
                ]
            });

            // datatable searching
            var datatableSearching = function() {
                $datatable
                    .column('.searching').search($search_form.find('input[name="search_value"]').val())
                    .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                    .draw();
            };

            // 검색
            $search_form.submit(function(e) {
                e.preventDefault();
                datatableSearching();
            });

            $search_form.find('input[name="search_value"], select[name="search_is_use"]').on('keyup change', function () {
                datatableSearching();
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
                sendAjax('{{ site_url('/product/course/reorder') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
            });

            // 과정 등록/수정 모달창 오픈
            $('.btn-regist, .btn-modify').click(function() {
                var is_regist = ($(this).prop('class').indexOf('btn-regist') !== -1) ? true : false;
                var uri_param = (is_regist === true) ? '' : $(this).data('idx');

                $('.btn-regist, .btn-modify').setLayer({
                    'url' : '{{ site_url('/product/course/create/') }}' + uri_param,
                    'width' : 900
                });
            });
        });
    </script>
@stop
