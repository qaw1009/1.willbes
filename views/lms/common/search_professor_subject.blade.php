@extends('lcms.layouts.master_modal')

@section('layer_title')
    과목/교수 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="site_code" value="{{ $site_code }}"/>
        <input type="hidden" name="cate_code" value="{{ $cate_code }}"/>
@endsection

@section('layer_content')
    <div class="form-group form-group-sm no-border-bottom mb-0">
        <p class="form-control-static"><span class="required">*</span> 검색한 과목/교수 선택 후 적용 버튼을 클릭해 주세요. (다중 선택 가능합니다.)</p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body" style="max-height: 120px; overflow-y: auto;">
                    <ul id="_selected_prof_subject" class="list-unstyled mb-0">
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="panel-footer text-right pt-5 pb-5">
                    <button type="button" class="btn btn-success btn-sm mb-0" id="_btn_apply"> 적 용 </button>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group pt-10 pb-5">
        <label class="control-label col-md-2 pt-5" for="search_value">교수검색
        </label>
        <div class="col-md-4">
            <input type="text" class="form-control input-sm" id="search_value" name="search_value">
        </div>
        <div class="col-md-4">
            <p class="form-control-static">교수만 검색 가능</p>
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
                    <th>과목/교수 정보</th>
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
        var $parent_regi_form = $('#regi_form');
        var $parent_selected_prof_subject = $('#selected_prof_subject');
        var $selected_prof_subject = $('#_selected_prof_subject');
        var $ori_selected_data = {};

        $(document).ready(function() {
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/common/searchProfessorSubject/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : 'ProfSubjectIdx', 'render' : function(data, type, row, meta) {
                        var checked = ($ori_selected_data.hasOwnProperty(data) === true) ? 'checked="checked"' : '';

                        return '<input type="checkbox" id="_prof_subject_' + data + '" name="_prof_subject_idx" class="flat" value="' + data + '" data-row-idx="' + meta.row + '" ' + checked + '/>';
                    }},
                    {'data' : 'ProfSubjectName'},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 전체선택
            $datatable.on('ifChanged', '#_is_all', function() {
                if ($(this).prop('checked') === true) {
                    $('input[name="_prof_subject_idx"]').iCheck('check');
                } else {
                    $('input[name="_prof_subject_idx"]').iCheck('uncheck');
                }
            });

            // 과목/교수 선택
            $datatable.on('ifChanged', 'input[name="_prof_subject_idx"]', function() {
                var that = $(this);
                var row = $datatable.row(that.data('row-idx')).data();
                var code = that.val();

                if (that.prop('checked') === true) {
                    $selected_prof_subject.append('<li id="_selected_prof_subject_' + code + '" data-prof-subject-idx="' + code + '" class="pull-left mb-5 mr-20">' + row.ProfSubjectName + ' <a href="#none" class="_selected-prof-subject-delete"><i class="fa fa-times red"></i></a></li>');
                } else {
                    $selected_prof_subject.find('#_selected_prof_subject_' + code).remove();
                }
            });

            // 선택한 과목/교수 삭제 버튼 클릭
            $selected_prof_subject.on('click', '._selected-prof-subject-delete', function() {
                var data = $(this).parent().data('prof-subject-idx');
                $(this).parent().remove();
                $('input[id="_prof_subject_' + data + '"]').prop('checked', false).iCheck('update');
            });

            // 적용 버튼
            $('#_btn_apply').on('click', function() {
                var code, route_name, html = '';

                if ($selected_prof_subject.html().trim() === '') {
                    alert('선택된 과목/교수 정보가 없습니다.')
                    return;
                }

                if (!confirm('선택한 과목/교수를 선택하시겠습니까?')) {
                    return;
                }

                $('#_selected_prof_subject li').each(function() {
                    code = $(this).data('prof-subject-idx');
                    route_name = $(this).text().trim();

                    html += '<span class="pr-10">' + route_name;
                    html += '   <a href="#none" data-prof-subject-idx="' + code + '" class="selected-prof-subject-delete"><i class="fa fa-times red"></i></a>';
                    html += '   <input type="hidden" name="prof_subject_idx[]" value="' + code + '"/>';
                    html += '</span>';
                });

                $parent_regi_form.find('input[name="prof_subject_idx[]"]').remove();
                $parent_selected_prof_subject.html(html);

                $("#pop_modal").modal('toggle');
            });

            // 기존 선택된 정보 셋팅
            var setOriSelectedData = function() {
                var that, code, route_name;
                $parent_selected_prof_subject.find('span').each(function() {
                    that = $(this);
                    code = that.find('input[name="prof_subject_idx[]"]').val();
                    route_name = that.text().trim();

                    $selected_prof_subject.append('<li id="_selected_prof_subject_' + code + '" data-prof-subject-idx="' + code + '" class="pull-left mb-5 mr-20">' + route_name + ' <a href="#none" class="_selected-prof-subject-delete"><i class="fa fa-times red"></i></a></li>');

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