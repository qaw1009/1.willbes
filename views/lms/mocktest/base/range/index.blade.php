@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 문제등록을 위한 과목별 문제영역(학습요소)을 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs($site_code_def, 'tabs_site_code', 'tab', false) !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        <select class="form-control" style="width: 24%;" name="">
                            <option value="">카테고리</option>
                        </select>
                        <select class="form-control" style="width: 24%;" name="">
                            <option value="">직렬</option>
                        </select>
                        <select class="form-control" style="width: 24%;" name="">
                            <option value="">과목</option>
                        </select>
                        <select class="form-control" style="width: 24%;" name="">
                            <option value="">사용여부</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">통합검색</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="" style="width:300px;"> 명칭, 코드 검색 가능
                    </div>
                    <div class="col-md-5 text-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-spin fa-refresh"></i> 검색</button>
                        <button type="submit" class="btn btn-default mr-30">초기화</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2">
                    <thead class="bg-odd">
                    <tr>
                        <th class="text-center">선택</th>
                        <th class="text-center">NO</th>
                        <th class="text-center">모의고사 카테고리<br>(카테고리>직렬>과목)</th>
                        <th class="text-center">문제영역코드</th>
                        <th class="text-center">문제영역명</th>
                        <th class="text-center">영역수</th>
                        <th class="text-center">사용여부</th>
                        <th class="text-center">등록자</th>
                        <th class="text-center">등록일</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--@foreach($data as $row)--}}
                    {{--<tr>--}}
                        {{--<td></td>--}}
                        {{--<td></td>--}}
                        {{--<td></td>--}}
                        {{--<td></td>--}}
                        {{--<td></td>--}}
                        {{--<td></td>--}}
                        {{--<td></td>--}}
                        {{--<td></td>--}}
                        {{--<td></td>--}}
                    {{--</tr>--}}
                    {{--@endforeach--}}
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
                    { text: '<i class="fa fa-copy mr-5"></i> 복사', className: 'btn btn-sm btn-primary mr-15' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 문제영역등록', className: 'btn btn-sm btn-success', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/mocktest/baseRange/create') }}' + dtParamsToQueryString($datatable);
                    }}
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
                sendAjax('{{ site_url('/product/base/course/reorder') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace(location.pathname + dtParamsToQueryString($datatable));
                    }
                }, showError, false, 'POST');
            });

            // 모달창 오픈
            $('.act-reg').on('click', function() {
                var is_regist = ($(this).prop('class').indexOf('btn-regist') !== -1) ? true : false;
                var uri_param = (is_regist === true) ? '' : $(this).data('idx');

                $('.act-reg').setLayer({
                    'url' : '{{ site_url() }}' + '/mocktest/baseCode/' + $(this).data('type') + '/' + uri_param,
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
