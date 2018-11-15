@extends('lcms.layouts.master_modal')

@section('layer_title')
    카테고리 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        @foreach($arr_param as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
        @endforeach
@endsection

@section('layer_content')
    <div class="form-group form-group-sm mb-0">
        <p class="form-control-static"><span class="required">*</span> 검색한 카테고리 정보를 선택해 주세요. (다중 선택 불가능합니다.)</p>
    </div>
    <div class="form-group pt-10 pb-5">
        <label class="control-label col-md-2 pt-5" for="search_value">통합검색
        </label>
        <div class="col-md-4">
            <input type="text" class="form-control input-sm" id="search_value" name="search_value">
        </div>
        <div class="col-md-4">
            <p class="form-control-static">명칭, 코드 검색 가능</p>
        </div>
        <div class="col-md-2 text-right pr-5">
            <button type="submit" class="btn btn-primary btn-sm btn-search mr-0" id="_btn_search">검 색</button>
        </div>
    </div>
    <div class="row mt-20 mb-20">
        <div class="col-md-12 clearfix">
            <table id="_list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>카테고리 정보</th>
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
        var $search_form = $('#_search_form');
        var $list_table = $('#_list_ajax_table');

        $(document).ready(function() {
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/common/searchCategory/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'CateRouteName', 'render' : function(data, type, row, meta) {
                        return '<a href="#" class="btn-select" data-row-idx="' + meta.row + '"><u>' + data + '</u></a>';
                    }},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 카테고리 선택
            $datatable.on('click', '.btn-select', function() {
                if (!confirm('해당 카테고리를 선택하시겠습니까?')) {
                    return;
                }

                var that = $(this);
                var row = $datatable.row(that.data('row-idx')).data();
                var $parent_regi_form = $('#regi_form');
                var $parent_selected_category = $('#selected_category');

                $parent_regi_form.find('input[name="cate_code"]').val(row.CateCode);
                if ($parent_selected_category.length > 0) {
                    var route_name = row.CateRouteName;
                    route_name = route_name.substr(route_name.indexOf(' > ') + 3);
                    $parent_selected_category.text(route_name);
                }

                $("#pop_modal").modal('toggle');
            });
        });
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
    </form>
@endsection