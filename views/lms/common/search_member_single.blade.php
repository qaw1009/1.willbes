@extends('lcms.layouts.master_modal')

@section('layer_title')
    회원 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        @foreach($arr_param as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
        @endforeach
@endsection

@section('layer_content')
    <div class="form-group form-group-sm no-border-bottom mb-0">
        <p class="form-control-static"><span class="required">*</span> 검색한 회원 정보를 선택해 주세요. (다중 선택 불가능합니다.)</p>
    </div>
    <div class="form-group form-group-bordered pt-10 pb-5">
        <label class="control-label col-md-2 pt-5" for="search_value">회원검색
        </label>
        <div class="col-md-4">
            <input type="text" class="form-control input-sm" id="search_value" name="search_value" value="{{ element('parent_value', $arr_param, '') }}">
        </div>
        <div class="col-md-4">
            <p class="form-control-static">이름, 아이디, 휴대폰번호 검색 가능</p>
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
                    <th>회원명 (아이디)</th>
                    <th>휴대폰번호</th>
                    <th>E-mail주소</th>
                    <th>주소</th>
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
                    'url' : '{{ site_url('/common/searchMember/listAjax') }}',
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
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return '<a href="#none" class="btn-select" data-row-idx="' + meta.row + '"><u>' + data + ' (' + row.MemId + ')</u></a>';
                    }},
                    {'data' : 'Phone'},
                    {'data' : 'Mail'},
                    {'data' : 'ZipCode', 'render' : function(data, type, row, meta) {
                        return data + ' ' + row.Addr1 + ' ' + row.Addr2;
                    }}
                ]
            });

            // 회원 선택
            $datatable_modal.on('click', '.btn-select', function() {
                if (!confirm('해당 회원을 선택하시겠습니까?')) {
                    return;
                }

                var that = $(this);
                var row = $datatable_modal.row(that.data('row-idx')).data();
                var $parent_regi_form = $('#{{ $target_form_id }}');
                var $parent_selected_member = $parent_regi_form.find('#selected_member');

                $parent_regi_form.find('input[name="mem_idx"]').data('result-data', row);
                $parent_regi_form.find('input[name="mem_idx"]').val(row.MemIdx).trigger('change');

                if ($parent_selected_member.length > 0) {
                    var mem_name = row.MemName + '(' + row.MemId + ')';
                    mem_name += '<input type="hidden" name="mem_idx[]" value="' + row.MemIdx + '"/>';

                    $parent_regi_form.find('input[name="mem_idx[]"]').remove();
                    $parent_selected_member.html(mem_name);
                }

                $("#pop_modal_member_search").modal('toggle');
            });
        });
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
    </form>
@endsection