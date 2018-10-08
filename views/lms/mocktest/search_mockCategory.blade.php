@extends('lcms.layouts.master_modal')

@section('layer_title')
    모의고사카테고리 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="siteCode" value="{{ $siteCode }}">
        @endsection

        @section('layer_content')
            <div class="mt-10 mb-5">
                <span class="required">*</span> 검색한 카테고리 선택 후 적용 버튼을 클릭해 주세요. (다중 선택 가능합니다.)
            </div>
            <div>
                <div class="panel panel-default">
                    <div class="panel-body" style="min-height:60px; max-height: 120px; overflow-y: auto;">
                        <ul id="_selected_category" class="list-unstyled mb-0">
                        </ul>
                    </div>
                </div>
                <div class="text-right" style="margin-top: -15px">
                    <button type="button" class="btn btn-success btn-sm mb-0" id="_btn_apply">적용</button>
                </div>
            </div>
            <div class="form-group form-group-bordered mt-50">
                <div class="col-xs-9">
                    <div class="form-inline">
                        <label class="mr-15">과목검색</label>
                        <input type="text" class="form-control input-sm" name="sc_fi" style="width:50%">
                        <span class="ml-5">과목만 검색 가능</span>
                    </div>
                </div>
                <div class="col-xs-3 text-right">
                    <button type="submit" class="btn btn-primary btn-sm" id="_btn_search">검색</button>
                    <button type="button" class="btn btn-default btn-sm" style="margin-right: -5px;" id="act-searchInit">초기화</button>
                </div>
            </div>
            <div class="mt-10 mb-50">
                <table id="_list_ajax_table" class="table table-striped table-bordered">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center"><input type="checkbox" id="_is_all" class="flat" value="Y"></th>
                        <th>카테고리 정보</th>
                        <th class="text-center">사용여부</th>
                        <th class="text-center">등록자</th>
                        <th class="text-center" style="width: 150px;">등록일</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <script type="text/javascript">
                var $datatable;
                var $search_form = $('#_search_form');
                var $list_table = $('#_list_ajax_table');
                var $parent_selected_category = $('#selected_category');
                var $selected_category = $('#_selected_category');
                var $ori_selected_data = {};

                $(document).ready(function() {
                    // 페이징 번호에 맞게 일부 데이터 조회
                    $datatable = $list_table.DataTable({
                        language: {
                            "info": "[ 총 _MAX_건 ]",
                        },
                        dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                        serverSide: true,
                        ajax: {
                            'url' : '{{ site_url('/mocktest/baseCode/moCateList') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                            }
                        },
                        columns: [
                            {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                    var code = row.MrsIdx;
                                    var checked = ($ori_selected_data.hasOwnProperty(code) === true) ? 'checked="checked"' : '';

                                    return '<input type="checkbox" id="_cate_code_' + code + '" name="_cate_code" class="flat" value="' + code + '" data-row-idx="' + meta.row + '" ' + checked + '/>';
                                }},
                            {'data' : 'CateRouteName'},
                            {'data' : 'IsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                    return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                                }},
                            {'data' : 'wAdminName', 'class': 'text-center'},
                            {'data' : 'RegDatm', 'class': 'text-center'}
                        ]
                    });

                    // 전체선택
                    $datatable.on('ifChanged', '#_is_all', function() {
                        var $_cate_code = $('input[name="_cate_code"]');
                        if ($(this).prop('checked') === true) $_cate_code.iCheck('check');
                        else $_cate_code.iCheck('uncheck');
                    });

                    // 카테고리 선택
                    $datatable.on('ifChanged', '[name="_cate_code"]', function() {
                        var that = $(this);
                        var row = $datatable.row(that.data('row-idx')).data();
                        var code = that.val();
                        var route_name = '';

                        if (that.prop('checked') === true) {
                            route_name = row.CateRouteName;
                            route_name = route_name.substr(route_name.indexOf(' > ') + 3);
                            $selected_category.append('<li id="_selected_category_' + code + '" data-cate-code="' + code + '" class="col-xs-4 pb-5">' + route_name + ' <a href="#none" class="_selected-category-delete"><i class="fa fa-times red"></i></a></li>');
                        } else {
                            $selected_category.find('#_selected_category_' + code).remove();
                        }
                    });

                    // 선택한 카테고리 삭제
                    $selected_category.on('click', '._selected-category-delete', function() {
                        var data = $(this).parent().data('cate-code');
                        $(this).parent().remove();
                        $('input[id="_cate_code_' + data + '"]').prop('checked', false).iCheck('update');
                    });

                    // 적용 버튼
                    $('#_btn_apply').on('click', function() {
                        var code, route_name, html = '';

                        if ($selected_category.html().trim() === '') {
                            alert('선택된 카테고리 정보가 없습니다.')
                            return;
                        }

                        if (!confirm('카테고리를 선택하시겠습니까?')) {
                            return;
                        }

                        $('#_selected_category li').each(function() {
                            code = $(this).data('cate-code');
                            route_name = $(this).text().trim();

                            html += '<div class="col-xs-4 pb-5">' + route_name;
                            html += '   <a href="#none" data-cate-code="' + code + '" class="selected-category-delete"><i class="fa fa-times red"></i></a>';
                            html += '   <input type="hidden" name="moLink[]" value="' + code + '"/>';
                            html += '</div>';
                        });
                        $parent_selected_category.html(html);

                        $("#pop_modal").modal('toggle');
                    });

                    // 기존 선택된 정보 셋팅
                    var setOriSelectedData = function() {
                        var that, code, route_name;
                        $parent_selected_category.find('div').each(function() {
                            that = $(this);
                            code = that.find('input[name="moLink[]"]').val();
                            route_name = that.text().trim();

                            $selected_category.append('<li id="_selected_category_' + code + '" data-cate-code="' + code + '" class="col-xs-4 pb-5">' + route_name + ' <a href="#none" class="_selected-category-delete"><i class="fa fa-times red"></i></a></li>');

                            // 기존 선택된 정보 json 변수에 저장
                            $ori_selected_data[code] = route_name;
                        });
                    };
                    setOriSelectedData();

                    // 검색초기화
                    $('#act-searchInit').on('click', function () {
                        $('[name="sc_fi"]').val('');
                        $('#_btn_search').trigger('click');
                    });
                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection