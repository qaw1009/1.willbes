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
    <div class="form-group form-group-sm no-border-bottom mb-0">
        <p class="form-control-static"><span class="required">*</span> 검색한 카테고리 선택 후 적용 버튼을 클릭해 주세요. (다중 선택 가능합니다.)</p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body" style="max-height: 120px; overflow-y: auto;">
                    <ul id="_selected_subject_mapping" class="list-unstyled mb-0">
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="panel-footer text-right pt-5 pb-5">
                    <button type="button" class="btn btn-success btn-sm mb-0" id="_btn_apply"> 적 용 </button>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group form-group-bordered pt-10 pb-5">
        <label class="control-label col-md-2 pt-5" for="search_value">과목검색
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
        var $datatable_modal;
        var $search_form_modal = $('#_search_form');
        var $list_table_modal = $('#_list_ajax_table');
        var $parent_regi_form = $('#regi_form');
        var $parent_selected_subject_mapping = $('#selected_subject_mapping');
        var $selected_subject_mapping = $('#_selected_subject_mapping');
        var $ori_selected_data = {};

        $(document).ready(function() {
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable_modal = $list_table_modal.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/common/searchSubjectMapping/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        var code = row.CateCode + '_' + row.SubjectIdx;
                        var checked = ($ori_selected_data.hasOwnProperty(code) === true) ? 'checked="checked"' : '';

                        return '<input type="checkbox" id="_subject_mapping_' + code + '" name="_subject_mapping_code" class="flat" value="' + code + '" data-row-idx="' + meta.row + '" ' + checked + '/>';
                    }},
                    {'data' : 'CateSubjectRouteName'},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 전체선택
            $datatable_modal.on('ifChanged', '#_is_all', function() {
                if ($(this).prop('checked') === true) {
                    $('input[name="_subject_mapping_code"]').iCheck('check');
                } else {
                    $('input[name="_subject_mapping_code"]').iCheck('uncheck');
                }
            });

            // 카테고리 선택
            $datatable_modal.on('ifChanged', 'input[name="_subject_mapping_code"]', function() {
                var that = $(this);
                var row = $datatable_modal.row(that.data('row-idx')).data();
                var code = that.val();
                var route_name = '';

                if (that.prop('checked') === true) {
                    route_name = row.CateSubjectRouteName;
                    route_name = route_name.substr(route_name.indexOf(' > ') + 3);
                    $selected_subject_mapping.append('<li id="_selected_subject_mapping_' + code + '" data-subject-mapping-code="' + code + '" class="pull-left mb-5 mr-20">' + route_name + ' <a href="#none" class="_selected-subject-mapping-delete"><i class="fa fa-times red"></i></a></li>');
                } else {
                    $selected_subject_mapping.find('#_selected_subject_mapping_' + code).remove();
                }
            });

            // 선택한 카테고리 삭제 버튼 클릭
            $selected_subject_mapping.on('click', '._selected-subject-mapping-delete', function() {
                var data = $(this).parent().data('subject-mapping-code');
                $(this).parent().remove();
                $('input[id="_subject_mapping_' + data + '"]').prop('checked', false).iCheck('update');
            });

            // 적용 버튼
            $('#_btn_apply').on('click', function() {
                var code, route_name, html = '';

                if ($selected_subject_mapping.html().trim() === '') {
                    alert('선택된 카테고리 정보가 없습니다.')
                    return;
                }

                if (!confirm('선택한 카테고리를 선택하시겠습니까?')) {
                    return;
                }

                $('#_selected_subject_mapping li').each(function() {
                    code = $(this).data('subject-mapping-code');
                    route_name = $(this).text().trim();

                    html += '<span class="pr-10">' + route_name;
                    html += '   <a href="#none" data-subject-mapping-code="' + code + '" class="selected-subject-mapping-delete"><i class="fa fa-times red"></i></a>';
                    html += '   <input type="hidden" name="subject_mapping_code[]" value="' + code + '"/>';
                    html += '</span>';
                });

                $parent_regi_form.find('input[name="subject_mapping_code[]"]').remove();
                $parent_selected_subject_mapping.html(html);

                // change 이벤트 발생
                $parent_selected_subject_mapping.trigger('change');

                $("#pop_modal").modal('toggle');
            });

            // 기존 선택된 정보 셋팅
            var setOriSelectedData = function() {
                var that, code, route_name;
                $parent_selected_subject_mapping.find('span').each(function() {
                    that = $(this);
                    code = that.find('input[name="subject_mapping_code[]"]').val();
                    route_name = that.text().trim();

                    $selected_subject_mapping.append('<li id="_selected_subject_mapping_' + code + '" data-subject-mapping-code="' + code + '" class="pull-left mb-5 mr-20">' + route_name + ' <a href="#none" class="_selected-subject-mapping-delete"><i class="fa fa-times red"></i></a></li>');

                    // 기존 선택된 정보 json 변수에 저장
                    $ori_selected_data[code] = route_name;
                });
            };

            setOriSelectedData();
        });
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
    </form>
@endsection