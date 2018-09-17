@extends('lcms.layouts.master_modal')
@section('layer_title')
    단강좌정보
@stop
@section('layer_header')
    <form class="form-horizontal form-label-left" id="lec_search_form" name="lec_search_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field($method) !!}
@endsection

    @section('layer_content')
    <h5>- 검색한 단강좌 선택 후 저장 버튼을 클릭해 주세요.</h5>
    <div class="x_panel">
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-2" for="">단강좌검색</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="search_value" name="search_value">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-search ml-10" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                </div>
                <div class="col-xs-2">
                    <button class="btn btn-default" type="button">검색초기화</button>
                </div>
            </div>
        </div>
    </div>

    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="lec_list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>강의기본정보</th>
                    <th>특강여부</th>
                    <th>과정명</th>
                    <th>과목명</th>
                    <th>교수명</th>
                    <th>강좌명</th>
                    <th>진행상태</th>
                    <th>판매가</th>
                    <th>배수</th>
                    <th>판매여부</th>
                    <th>사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</form>

<script type="text/javascript">
    var $datatable;
    var $lec_search_form = $('#lec_search_form');
    var $lec_list_table = $('#lec_list_ajax_table');

    $(document).ready(function() {
        $datatable = $lec_list_table.DataTable({
            serverSide: true,
            ajax: {
                'url' : '{{ site_url("/board/professor/{$boardName}/lecListAjax") }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($lec_search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : 'wContentCcdName'},
                {'data' : 'wProfIdx'},
                {'data' : 'wProfId'},
                {'data' : 'wProfName', 'render' : function(data, type, row, meta) {
                        return '<a href="#" class="btn-modify" data-idx="' + row.wProfIdx + '"><u>' + data + '</u></a>';
                    }},
                {'data' : 'wIsUse', 'render' : function(data, type, row, meta) {
                        return (data == 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }},
                {'data' : 'wRegAdminName'},
                {'data' : 'wRegDatm'}
            ]
        });
    });
</script>
@endsection