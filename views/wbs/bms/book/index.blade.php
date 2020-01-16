@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 온라인에서 제공하는 전체 교재의 원천정보를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드, ISBN 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_sale_ccd">조건</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_sale_ccd" name="search_sale_ccd">
                            <option value="">판매여부</option>
                            @foreach($sale_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_publ_author">출판사/저자 검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_publ_author" name="search_publ_author">
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
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>교재코드</th>
                    <th>교재명</th>
                    <th>표지보기</th>
                    <th>출판사</th>
                    <th>저자</th>
                    <th>가격</th>
                    <th>재고</th>
                    <th>판매여부</th>
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
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 교재 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                        location.href = '{{ site_url('/bms/book/create') }}' + dtParamsToQueryString($datatable);
                    }}
                ],
                ajax: {
                    'url' : '{{ site_url('/bms/book/listAjax') }}',
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
                    {'data' : 'wBookIdx'},
                    {'data' : 'wBookName', 'render' : function(data, type, row, meta) {
                        return '<a href="#" class="btn-modify" data-idx="' + row.wBookIdx + '"><u>' + data + '</u></a>';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        var html = '';
                        if (row.wAttachImgName) {
                            html += '<div class="btn-group">';
                            html += '   <a href="' + row.wAttachImgPath + row.wAttachImgName + '" rel="popup-image" class="btn btn-sm btn-default">원본</a>';
                            html += '   <a href="' + row.wAttachImgPath + row.wAttachImgSmName + '" rel="popup-image" class="btn btn-sm btn-default">S</a>';
                            html += '   <a href="' + row.wAttachImgPath + row.wAttachImgMdName + '" rel="popup-image" class="btn btn-sm btn-default">M</a>';
                            html += '   <a href="' + row.wAttachImgPath + row.wAttachImgLgName + '" rel="popup-image" class="btn btn-sm btn-default">L</a>';
                            html += '</div>';
                        }
                        return html;
                    }},
                    {'data' : 'wPublName'},
                    {'data' : 'wAuthorNames', 'render' : function(data, type, row, meta) {
                        return data.replace(/,/g, '<br/>');
                    }},
                    {'data' : 'wOrgPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data) + '원';
                    }},
                    {'data' : 'wStockCnt', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'wSaleCcdName'},
                    {'data' : 'wIsUse', 'render' : function(data, type, row, meta) {
                        return (data == 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }},
                    {'data' : 'wRegAdminName'},
                    {'data' : 'wRegDatm'}
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href = '{{ site_url('/bms/book/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
