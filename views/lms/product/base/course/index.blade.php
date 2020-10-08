@extends('lcms.layouts.master')

@section('content')
    <h5>- 강좌 구성을 위한 기본 과정 정보를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_site_tabs('tabs_site_code') !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>
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
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
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
                    <th class="searching searching_site_code">운영 사이트</th>
                    <th class="searching">과정코드</th>
                    <th class="searching">과정명</th>
                    <th class="searching_is_use">사용여부</th>
                    <th>정렬</th>
                    <th>등록자</th>
                    <th>등록일</th>
                </tr>
                </thead>
                <tbody id="sortable_order_num">
                @foreach($data as $row)
                    <tr>
                        <td>{{ $loop->index }}</td>
                        <td>{{ $row['SiteName'] }}<span class="hide">{{ $row['SiteCode'] }}</span></td>
                        <td>{{ $row['CourseIdx'] }}</td>
                        <td><a href="#" class="btn-modify" data-idx="{{ $row['CourseIdx'] }}"><u>{{ $row['CourseName'] }}</u></a></td>
                        <td>@if($row['IsUse'] == 'Y') 사용 @elseif($row['IsUse'] == 'N') <span class="red">미사용</span> @endif
                            <span class="hide">{{ $row['IsUse'] }}</span>
                        </td>
                        <td>
                            <input type="text" name="order_num" class="form-control input-sm" value="{{ $row['OrderNum'] }}" data-origin-order-num="{{ $row['OrderNum'] }}" data-idx="{{ $row['CourseIdx'] }}" readonly="readonly" style="width: 50px;" />
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
    <script src="/public/vendor/jquery/v.1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_form = $('#list_form');
        var $list_table = $('#list_table');

        $(document).ready(function() {
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                ajax: false,
                paging: true,
                pageLength: 50,
                searching: true,
                buttons: [
                    { text: '<i class="fa fa-sort-numeric-asc mr-5"></i> 정렬번호초기화', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-order-num-reset hide' },
                    { text: '<i class="fa fa-sort-numeric-asc mr-5"></i> 정렬변경', className: 'btn-sm btn-success border-radius-reset mr-15 btn-reorder hide' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 과정 등록', className: 'btn-sm btn-primary border-radius-reset btn-regist' }
                ]
            });

            // 사이트탭별 정렬변경 버튼, 정렬순서 필드 설정 변경
            $datatable.on('draw', function() {
                if ($search_form.find('input[name="search_site_code"]').val() !== '') {
                    $('.btn-reorder').removeClass('hide');
                    $('.btn-order-num-reset').removeClass('hide');
                    $list_form.find('input[name="order_num"]').prop('readonly', false);
                } else {
                    $('.btn-reorder').addClass('hide');
                    $('.btn-order-num-reset').addClass('hide');
                    $list_form.find('input[name="order_num"]').prop('readonly', true);
                }
            });

            // 정렬번호 초기화
            $('.btn-order-num-reset').on('click', function() {
                if (!confirm('정렬번호를 현재 순서로 초기화하시겠습니까?\n적용하시려면 정렬변경 버튼을 클릭해 주세요.')) {
                    return;
                }

                var $order_num = $list_form.find('input[name="order_num"]');
                $order_num.each(function(idx) {
                    $(this).val(idx + 1);
                });
            });

            // 정렬변경 drag & drop
            $('#sortable_order_num').sortable({
                placeholder: 'bg-info',
                cursor: 'move',
                start: function(e, ui) {
                    ui.item.data('start_pos', ui.item.index());
                },
                stop: function(e, ui) {
                    if ($search_form.find('input[name="search_site_code"]').val() === '') {
                        alert('전체 탭에서는 정렬순서를 변경하실 수 없습니다.');
                        $(this).sortable('cancel');
                        return false;
                    }

                    // 전체 정렬번호 재설정
                    var $order_num = $list_form.find('input[name="order_num"]');
                    $order_num.each(function(idx) {
                        $(this).val(idx + 1);
                    });

                    // 이동위치 표시
                    $order_num.eq(ui.item.index()).addClass('bg-red');
                }
            }).disableSelection();

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
                sendAjax('{{ site_url('/product/base/course/reorder') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace(location.pathname + dtParamsToQueryString($datatable));
                    }
                }, showError, false, 'POST');
            });

            // 과정 등록/수정 모달창 오픈
            $list_form.on('click', '.btn-regist, .btn-modify', function() {
                var is_regist = ($(this).prop('class').indexOf('btn-regist') !== -1) ? true : false;
                var uri_param = (is_regist === true) ? '' : $(this).data('idx');

                $('.btn-regist, .btn-modify').setLayer({
                    'url' : '{{ site_url('/product/base/course/create/') }}' + uri_param,
                    'width' : 900
                });
            });
        });

        // datatable searching
        function datatableSearching() {
            $datatable
                .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                .column('.searching_site_code').search($search_form.find('input[name="search_site_code"]').val())
                .draw();
        }
    </script>
@stop
