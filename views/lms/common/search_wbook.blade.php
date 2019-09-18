@extends('lcms.layouts.master_modal')

@section('layer_title')
    교재 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
@endsection

@section('layer_content')
    <div class="form-group form-group-sm mb-0">
        <p class="form-control-static"><span class="required">*</span> 검색한 교재를 선택해 주세요. (다중 선택 불가능합니다.)</p>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2 pt-5" for="search_value">교재검색
        </label>
        <div class="col-md-4">
            <input type="text" class="form-control input-sm" id="search_value" name="search_value">
        </div>
        <div class="col-md-4">
            <p class="form-control-static">명칭, 코드 검색 가능</p>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2 pt-5" for="search_publ_author">출판사/저자명
        </label>
        <div class="col-md-4">
            <input type="text" class="form-control input-sm" id="search_publ_author" name="search_publ_author">
        </div>
        <div class="col-md-2">
            <select class="form-control input-sm" id="search_sale_ccd" name="search_sale_ccd">
                <option value="">판매여부</option>
                @foreach($sale_ccd as $key => $val)
                    <option value="{{ $key }}">{{ $val }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 text-right">
            <button type="submit" class="btn btn-primary btn-sm btn-search" id="_btn_search">검 색</button>
            <button type="button" class="btn btn-default btn-sm btn-search" id="_btn_reset">초기화</button>
        </div>
    </div>
    <div class="row mt-20 mb-20">
        <div class="col-md-12 clearfix">
            <table id="_list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>교재코드</th>
                    <th>교재명</th>
                    <th>출판사</th>
                    <th>저자</th>
                    <th>판매여부</th>
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
        var $datatable_modal;
        var $search_form_modal = $('#_search_form');
        var $list_table_modal = $('#_list_ajax_table');

        $(document).ready(function() {
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable_modal = $list_table_modal.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/common/searchWBook/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'wBookIdx'},
                    {'data' : 'wBookName', 'render' : function(data, type, row, meta) {
                        return '<a href="#" class="btn-select" data-row-idx="' + meta.row + '"><u class="blue">' + data + '</u></a>';
                    }},
                    {'data' : 'wPublName'},
                    {'data' : 'wAuthorNames', 'render' : function(data, type, row, meta) {
                        return data.replace(/,/g, '<br/>');
                    }},
                    {'data' : 'wSaleCcdName'},
                    {'data' : 'wRegAdminName'},
                    {'data' : 'wRegDatm'}
                ]
            });

            // 교재 선택
            $datatable_modal.on('click', '.btn-select', function() {
                if (!confirm('해당 교재를 선택하시겠습니까?')) {
                    return;
                }

                var that = $(this);
                var row = $datatable_modal.row(that.data('row-idx')).data();
                var $parent_regi_form = $('#regi_form');
                var $parent_book_name = $parent_regi_form.find('input[name="book_name"]');
                var $parent_selected_book = $('#selected_book');
                var $parent_selected_publ_name = $('#selected_publ_name');
                var $parent_selected_publ_date = $('#selected_publ_date');
                var $parent_selected_author_names = $('#selected_author_names');
                var $parent_selected_isbn = $('#selected_isbn');
                var $parent_selected_page_cnt = $('#selected_page_cnt');
                var $parent_selected_edition_ccd_name = $('#selected_edition_ccd_name');
                var $parent_selected_print_edtion_cnt = $('#selected_print_edtion_cnt');
                var $parent_selected_edtion_size = $('#selected_edtion_size');
                var $parent_selected_wbook_desc = $('#selected_wbook_desc');
                var $parent_selected_wauthor_desc = $('#selected_wauthor_desc');
                var $parent_selected_wtable_desc = $('#selected_wtable_desc');
                var $parent_selected_wstock_cnt = $('#selected_wstock_cnt');
                var $parent_sale_ccd = $parent_regi_form.find('input[name="sale_ccd"]');
                var $parent_selected_sale_ccd_name = $('#selected_wsale_ccd_name');
                var $parent_org_price = $parent_regi_form.find('input[name="org_price"]');

                $parent_regi_form.find('input[name="wbook_idx"]').val(row.wBookIdx);
                if ($parent_book_name.length > 0) { $parent_book_name.val(row.wBookName); }
                if ($parent_selected_book.length > 0) { $parent_selected_book.text(row.wBookName + ' [' + row.wBookIdx + ']'); }
                if ($parent_selected_publ_name.length > 0) { $parent_selected_publ_name.text(row.wPublName); }
                if ($parent_selected_publ_date.length > 0) { $parent_selected_publ_date.text(row.wPublDate); }
                if ($parent_selected_author_names.length > 0) { $parent_selected_author_names.text(row.wAuthorNames); }
                if ($parent_selected_isbn.length > 0) { $parent_selected_isbn.text(row.wIsbn); }
                if ($parent_selected_page_cnt.length > 0) { $parent_selected_page_cnt.text(row.wPageCnt + 'p'); }
                if ($parent_selected_edition_ccd_name.length > 0) { $parent_selected_edition_ccd_name.text(row.wEditionCcdName); }
                if ($parent_selected_print_edtion_cnt.length > 0) { $parent_selected_print_edtion_cnt.text(  row.wEditionCnt+ '판 ' +row.wPrintCnt + '쇄'); }
                if ($parent_selected_edtion_size.length > 0) { $parent_selected_edtion_size.text(row.wEditionSize); }
                if ($parent_selected_wbook_desc.length > 0) { $parent_selected_wbook_desc.html(row.wBookDesc); }
                if ($parent_selected_wauthor_desc.length > 0) { $parent_selected_wauthor_desc.html(row.wAuthorDesc); }
                if ($parent_selected_wtable_desc.length > 0) { $parent_selected_wtable_desc.html(row.wTableDesc); }
                if ($parent_selected_wstock_cnt.length > 0) { $parent_selected_wstock_cnt.text(addComma(row.wStockCnt)); }
                if ($parent_sale_ccd.length > 0) { $parent_regi_form.find('input[name="sale_ccd"][value="' + row.wSaleCcd + '"]').prop('checked', true).iCheck('update'); }
                if ($parent_selected_sale_ccd_name.length > 0) { $parent_selected_sale_ccd_name.html(row.wSaleCcdName); }
                if ($parent_org_price.length > 0) {
                    $parent_org_price.val(row.wOrgPrice);
                    $parent_org_price.trigger('change');    // change 이벤트 발생
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