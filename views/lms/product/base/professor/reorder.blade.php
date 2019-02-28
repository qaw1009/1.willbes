@extends('lcms.layouts.master_modal')

@section('layer_title')
    정렬변경
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
@endsection

@section('layer_content')
    <div class="form-group form-group-sm mb-0">
        <p class="form-control-static pl-0"><span class="required">*</span> 정렬할 과목을 선택해 주세요. (과목 내 교수정렬만 가능)</p>
    </div>
    <div class="form-group pt-10 pb-5">
        <label class="control-label col-md-2 pt-5" for="search_value">교수검색
        </label>
        <div class="col-md-10 form-inline">
            {!! html_site_select('', '_search_site_code', '_search_site_code', 'mr-10', '운영 사이트', '') !!}
            <select class="form-control mr-10" id="_search_cate_code" name="_search_cate_code">
                <option value="">카테고리</option>
                @foreach($arr_category as $row)
                    <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                @endforeach
            </select>
            <select class="form-control" id="_search_subject_idx" name="_search_subject_idx">
                <option value="">과목</option>
                @foreach($arr_subject as $row)
                    <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary btn-sm btn-search ml-10" id="_btn_search">검 색</button>
        </div>
    </div>
    <div class="row mt-20 mb-20">
        <div class="col-md-12 clearfix">
            <table id="_list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>운영사이트</th>
                    <th>카테고리 정보</th>
                    <th>과목</th>
                    <th>교수코드</th>
                    <th>교수아이디</th>
                    <th>교수명</th>
                    <th>정렬</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable_modal;
        var $search_form_modal = $('#_search_form');
        var $list_table_modal = $('#_list_ajax_table');

        $(document).ready(function() {
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable_modal = $list_table_modal.DataTable({
                serverSide: true,
                paging: false,
                buttons: [
                    { text: '<i class="fa fa-sort-numeric-asc mr-5"></i> 정렬변경', className: 'btn-sm btn-success border-radius-reset _btn-reorder' }
                ],
                ajax: {
                    'url' : '{{ site_url('/product/base/professor/reorderListAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form_modal.serializeArray()), {});
                    }
                },
                columns: [
                    {'data' : 'SiteName'},
                    {'data' : 'CateRouteName'},
                    {'data' : 'SubjectName'},
                    {'data' : 'ProfIdx'},
                    {'data' : 'wProfId'},
                    {'data' : 'wProfName'},
                    {'data' : 'OrderNum', 'render' : function(data, type, row, meta) {
                        return '<input type="number" name="_order_num" class="form-control input-sm" value="' + data + '" data-origin-order-num="' + data + '" data-idx="' + row.PcIdx + '_' + row.ProfIdx + '" style="width: 60px;" />';
                    }}
                ]
            });

            // 카테고리, 과목 자동 변경
            $search_form_modal.find('select[name="_search_cate_code"]').chained("#_search_site_code");
            $search_form_modal.find('select[name="_search_subject_idx"]').chained("#_search_site_code");

            // 순서 변경
            $search_form_modal.on('click', '._btn-reorder', function() {
                if (!confirm('변경된 순서를 적용하시겠습니까?')) {
                    return;
                }

                var $order_num = $search_form_modal.find('input[name="_order_num"]');
                var $params = {};
                $order_num.each(function(idx) {
                    // 정렬순서 값이 변하는 경우에만 파라미터 설정
                    if ($(this).val() !== '' && $(this).val() != $(this).data('origin-order-num')) {
                        $params[$(this).data('idx')] = $(this).val();
                    }
                });

                if (Object.keys($params).length < 1) {
                    alert('변경된 내용이 없습니다.');
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form_modal.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };
                sendAjax('{{ site_url('/product/base/professor/reorder') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable_modal.draw();
                    }
                }, showError, false, 'POST');
            });
        });
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
    </form>
@endsection