@extends('lcms.layouts.master_modal')

@section('layer_title')
    카테고리 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="site_code" value="{{ $site_code }}"/>
@endsection

@section('layer_content')
    <div class="form-group form-group-sm mb-0">
        <p class="form-control-static"><span class="required">*</span> 검색한 카테고리 선택 후 적용 버튼을 클릭해 주세요. (다중 선택 가능합니다.)</p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body" style="max-height: 120px; overflow-y: auto;">
                    <ul id="_selected_subject_mapping" class="list-unstyled mb-0">
                    </ul>
                </div>
                <div class="panel-footer text-right pt-5 pb-5">
                    <button type="button" class="btn btn-success btn-sm mb-0" id="_btn_apply"> 적 용 </button>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group form-group-bordered pt-10 pb-5">
        <label class="control-label col-md-2 pt-5">과목검색
        </label>
        <div class="col-md-4">
            <input type="text" class="form-control input-sm" id="search_value" name="search_value">
        </div>
        <div class="col-md-4">
            <p class="form-control-static">과목만 검색 가능</p>
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
                    <th>전체선택 <input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/></th>
                    <th>카테고리 정보</th>
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
                    'url' : '{{ site_url('/common/searchSubjectMapping/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" id="_subject_mapping_' + row.CateCode + '_' + row.SubjectIdx + '" name="_subject_mapping_code" class="flat" value="' + row.CateCode + '_' + row.SubjectIdx + '" data-subject-mapping-route-name="' + row.CateSubjectRouteName + '"/>';
                    }},
                    {'data' : 'CateSubjectRouteName'},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 전체선택
            $datatable.on('ifChanged', '#_is_all', function() {
                if ($(this).prop('checked') === true) {
                    $('input[name="_subject_mapping_code"]').iCheck('check');
                } else {
                    $('input[name="_subject_mapping_code"]').iCheck('uncheck');
                }
            });

            // 카테고리 선택
            $datatable.on('ifChanged', 'input[name="_subject_mapping_code"]', function() {
                var _selected_subject_mapping = $('#_selected_subject_mapping');
                var that = $(this);
                var data = that.val();

                if (that.prop('checked') === true) {
                    _selected_subject_mapping.append('<li id="_selected_subject_mapping_' + data + '" data-subject-mapping-code="' + data + '" class="mb-5">' + that.data('subject-mapping-route-name') + ' <a href="#none" class="_selected-subject-mapping-delete"><i class="fa fa-times red"></i></a></li>');
                } else {
                    _selected_subject_mapping.find('#_selected_subject_mapping_' + data).remove();
                }
            });

            // 선택한 카테고리 삭제 버튼 클릭
            $('#_selected_subject_mapping').on('click', '._selected-subject-mapping-delete', function() {
                var data = $(this).parent().data('subject-mapping-code');
                //that.parent().remove();
                $('input[id="_subject_mapping_' + data + '"]').iCheck('uncheck');
            });

            // 적용 버튼
            $('#_btn_apply').on('click', function() {
                if (!confirm('선택한 카테고리를 선택하시겠습니까?')) {
                    return;
                }

                var $parent_regi_form = $('#regi_form');
                var $parent_selected_subject_mapping = $('#selected_subject_mapping');
                var input_hidden = '', txt_selected = '', subject_mapping_code, subject_mapping_txt;

                $('#_selected_subject_mapping li').each(function() {
                    subject_mapping_code = $(this).data('subject-mapping-code');
                    subject_mapping_txt = $(this).text().trim();

                    input_hidden += '<input type="hidden" name="subject_mapping_code[]" value="' + subject_mapping_code + '"/>\n';
                    txt_selected += '<span class="pr-10">' + subject_mapping_txt.substr((subject_mapping_txt.indexOf(' > ') + 3));
                    txt_selected += ' <a href="#none" data-subject-mapping-code="' + subject_mapping_code + '" class="selected-subject-mapping-delete"><i class="fa fa-times red"></i></a></li></span>';
                });

                $parent_regi_form.find('input[name="subject_mapping_code[]"]').remove();
                $parent_regi_form.append(input_hidden);
                $parent_selected_subject_mapping.html(txt_selected);

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