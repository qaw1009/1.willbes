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
    <div class="form-group form-group-sm mb-0">
        <p class="form-control-static"><span class="required">*</span> 검색한 회원 선택 후 적용 버튼을 클릭해 주세요. (다중 선택 가능합니다.)</p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body" style="max-height: 120px; overflow-y: auto;">
                    <ul id="_selected_member" class="list-unstyled mb-0">
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
                    <th>전체선택 <input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/></th>
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
        var $datatable;
        var $search_form = $('#_search_form');
        var $list_table = $('#_list_ajax_table');
        var $parent_regi_form = $('#regi_form');
        var $parent_selected_member = $('#selected_member');
        var $selected_member = $('#_selected_member');
        var $ori_selected_data = {};

        $(document).ready(function() {
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/common/searchMember/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        var idx = row.MemIdx;
                        var checked = ($ori_selected_data.hasOwnProperty(idx) === true) ? 'checked="checked"' : '';

                        return '<input type="checkbox" id="_mem_idx_' + idx + '" name="_mem_idx" class="flat" value="' + idx + '" data-row-idx="' + meta.row + '" ' + checked + '/>';
                    }},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return '<u>' + data + ' (' + row.MemId + ')</u>';
                    }},
                    {'data' : 'Phone'},
                    {'data' : 'Mail'},
                    {'data' : 'ZipCode', 'render' : function(data, type, row, meta) {
                        return data + ' ' + row.Addr1 + ' ' + row.Addr2;
                    }}
                ]
            });

            // 전체선택
            $datatable.on('ifChanged', '#_is_all', function() {
                var $_mem_idx = $('input[name="_mem_idx"]');
                if ($(this).prop('checked') === true) {
                    $_mem_idx.iCheck('check');
                } else {
                    $_mem_idx.iCheck('uncheck');
                }
            });

            // 회원 선택
            $datatable.on('ifChanged', 'input[name="_mem_idx"]', function() {
                var that = $(this);
                var row = $datatable.row(that.data('row-idx')).data();
                var mem_idx = that.val();
                var mem_name = '';

                if (that.prop('checked') === true) {
                    mem_name = row.MemName + ' (' + row.MemId + ')';
                    $selected_member.append('<li id="_selected_member_' + mem_idx + '" data-mem-idx="' + mem_idx + '" class="pull-left mb-5 mr-20">' + mem_name + ' <a href="#none" class="_selected-member-delete"><i class="fa fa-times red"></i></a></li>');
                } else {
                    $selected_member.find('#_selected_member_' + mem_idx).remove();
                }
            });

            // 선택한 회원 삭제 버튼 클릭
            $selected_member.on('click', '._selected-member-delete', function() {
                var data = $(this).parent().data('mem-idx');
                $(this).parent().remove();
                $('input[id="_mem_idx_' + data + '"]').prop('checked', false).iCheck('update');
            });

            // 적용 버튼
            $('#_btn_apply').on('click', function() {
                var mem_idx, mem_name, html = '';

                if ($selected_member.html().trim() === '') {
                    alert('선택된 회원 정보가 없습니다.')
                    return;
                }

                if (!confirm('선택한 회원을 선택하시겠습니까?')) {
                    return;
                }

                $('#_selected_member li').each(function() {
                    mem_idx = $(this).data('mem-idx');
                    mem_name = $(this).text().trim();

                    html += '<span class="pr-10">' + mem_name;
                    html += '   <a href="#none" data-mem-idx="' + mem_idx + '" class="selected-member-delete"><i class="fa fa-times red"></i></a>';
                    html += '   <input type="hidden" name="mem_idx[]" value="' + mem_idx + '"/>';
                    html += '</span>';
                });

                $parent_regi_form.find('input[name="mem_idx[]"]').remove();
                $parent_selected_member.html(html);

                $("#pop_modal").modal('toggle');
            });

            // 기존 선택된 정보 셋팅
            var setOriSelectedData = function() {
                var that, mem_idx, mem_name;
                $parent_selected_member.find('span').each(function() {
                    that = $(this);
                    mem_idx = that.find('input[name="mem_idx[]"]').val();
                    mem_name = that.text().trim();

                    $selected_member.append('<li id="_selected_member_' + mem_idx + '" data-mem-idx="' + mem_idx + '" class="pull-left mb-5 mr-20">' + mem_name + ' <a href="#none" class="_selected-member-delete"><i class="fa fa-times red"></i></a></li>');

                    // 기존 선택된 정보 json 변수에 저장
                    $ori_selected_data[mem_idx] = mem_name;
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