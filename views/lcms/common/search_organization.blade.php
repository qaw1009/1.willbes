@extends('lcms.layouts.master_modal')

@section('layer_title')
    조직 검색
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
        <p class="form-control-static"><span class="required">*</span> 검색한 조직 선택 후 적용 버튼을 클릭해 주세요. (다중 선택 가능합니다.)</p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body" style="max-height: 120px; overflow-y: auto;">
                    <ul id="_selected_organization" class="list-unstyled mb-0">
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="panel-footer text-right pt-5 pb-5">
                    <button type="button" class="btn btn-success btn-sm mb-0" id="_btn_apply"> 적 용 </button>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group pt-10 pb-5 bdt-line">
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
                    <th>전체선택 <input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/></th>
                    <th>코드</th>
                    <th>조직명</th>
                    <th>구조</th>
                    <th>사용여부</th>
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
        var $parent_regi_form = $('#_regi_form');
        var $parent_selected_organization = $('#selected_organization');
        var $selected_organization = $('#_selected_organization');
        var $ori_selected_data = {};

        $(document).ready(function() {

            $datatable_modal = $list_table_modal.DataTable({
                serverSide: true,
                pageLength: 50,
                ajax: {
                    'url' : '{{ site_url('/lcms/common/searchOrganization/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        var code = row.wOrgCode;
                        var checked = ($ori_selected_data.hasOwnProperty(code) === true) ? 'checked="checked"' : '';
                        return '<input type="checkbox" id="_org_code_' + code + '" name="_org_code" class="flat" value="' + code + '" data-row-idx="' + meta.row + '" ' + checked + '/>';
                    }},
                    {'data' : 'wOrgCode'},
                    {'data' : 'wOrgName'},
                    {'data' : 'OrgRouteName'},
                    {'data' : 'wIsUse', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }}
                ]
            });

            // 전체선택
            $datatable_modal.on('ifChanged', '#_is_all', function() {
                var $_org_code = $('input[name="_org_code"]');
                if ($(this).prop('checked') === true) {
                    $_org_code.iCheck('check');
                } else {
                    $_org_code.iCheck('uncheck');
                }
            });

            // 조직 선택
            $datatable_modal.on('ifChanged', 'input[name="_org_code"]', function() {
                var that = $(this);
                var row = $datatable_modal.row(that.data('row-idx')).data();
                var code = that.val();
                var route_name = '';

                if (that.prop('checked') === true) {
                    route_name = row.wOrgName;
                    $selected_organization.append('<li id="_selected_organization_' + code + '" data-org-code="' + code + '" class="pull-left mb-5 mr-20">' + route_name + ' <a href="#none" class="_selected-organization-delete"><i class="fa fa-times red"></i></a></li>');
                } else {
                    $selected_organization.find('#_selected_organization_' + code).remove();
                }
            });

            // 선택한 조직 삭제 버튼 클릭
            $selected_organization.on('click', '._selected-organization-delete', function() {
                var data = $(this).parent().data('org-code');
                $(this).parent().remove();
                $('input[id="_org_code_' + data + '"]').prop('checked', false).iCheck('update');
            });

            // 적용 버튼
            $('#_btn_apply').on('click', function() {
                var code, route_name, html = '';

                if ($selected_organization.html().trim() === '') {
                    alert('선택된 조직 정보가 없습니다.');
                    return;
                }

                if($('#_selected_organization li').length > 3) {
                    alert('조직은 3개까지만 선택 가능합니다.');
                    return;
                }

                if (!confirm('선택한 조직를 선택하시겠습니까?')) {
                    return;
                }

                $('#_selected_organization li').each(function() {
                    code = $(this).data('org-code');
                    route_name = $(this).text().trim();

                    html += '<span class="pr-10">' + route_name;
                    html += '   <a href="#none" data-org-code="' + code + '" class="selected-organization-delete"><i class="fa fa-times red"></i></a>';
                    html += '   <input type="hidden" name="org_code[]" value="' + code + '"/>';
                    html += '</span>';
                });

                $parent_regi_form.find('input[name="org_code[]"]').remove();
                $parent_selected_organization.html(html);

                $("#modal_search_organization").modal('toggle');
            });

            // 기존 선택된 정보 셋팅
            var setOriSelectedData = function() {
                var that, code, route_name;
                $parent_selected_organization.find('span').each(function() {
                    that = $(this);
                    code = that.find('input[name="org_code[]"]').val();
                    route_name = that.text().trim();

                    $selected_organization.append('<li id="_selected_organization_' + code + '" data-org-code="' + code + '" class="pull-left mb-5 mr-20">' + route_name + ' <a href="#none" class="_selected-organization-delete"><i class="fa fa-times red"></i></a></li>');

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