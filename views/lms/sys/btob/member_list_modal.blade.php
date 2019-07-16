@extends('lcms.layouts.master_modal')

@section('layer_title')
    제휴사 회원 목록
@stop

@section('layer_content')
    <form class="form-horizontal form-label-left" id="_regi_form_modal" name="_regi_form_modal" method="POST" onsubmit="return false;" novalidate >
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="btobidx" id="btobidx" value="{{$btobidx}}"/>
        <input type="hidden" name="mem_idx" id="mem_idx" value="" data-result-data=""/>
        {!! form_errors() !!}
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="search_mem_id">회원등록</label>
            <div class="col-md-4 item pl-0">
                <input type="text" id="search_mem_id" name="search_mem_id" required="required" class="form-control" value="">
            </div>
            <button type="button" id="btn_member_search" name="btn_member_search" data-result-type="single" class="btn bg-green btn-sm btn-primary">회원검색</button>
            <button type="reset" class="btn btn-sm btn-primary bg-blue ">초기화</button>
            <button type="submit" class="btn btn-sm btn-primary border-radius-reset btn-regist bg-red"><i class="fa fa-pencil mr-5"></i>등록</button>
        </div>
    </form>

    <form class="form-horizontal" id="_search_modal_form" name="_search_modal_form" method="POST" onsubmit="return false;">
        <input type="hidden" name="btobidx" id="btobidx" value="{{$btobidx}}"/>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="search_mem_id">삭제회원보기</label>
            <label><input type="checkbox" id="istatus" name="istatus" value="N" /> 삭제회원을 표시합니다.</label>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2">회원검색</label>
            <div class="col-md-4 item pl-0">
                <input type="text" class="form-control" id="search_value" name="search_value">
            </div>
            <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
        </div>
    </form>
    <div class="row mt-20 mb-20">
        <div class="col-md-12 clearfix">
            <table id="_list_ajax_table_cp_member" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="60px">No</th>
                    <th width="150px">사용자</th>
                    <th width="100px" >전화번호</th>
                    <th >등록일(삭제일)</th>
                    <th width="60px">상태</th>
                    <th width="120px">등록자(삭제자)</th>
                    <th width="60px">삭제</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <form class="form-horizontal" id="_delete_form" name="_delete_form" method="POST" >
        {!! csrf_field() !!}
        <input type="hidden" name="btobidx" id="btobidx" value="{{$btobidx}}" />
        <input type="hidden" name="bmidx" id="bmidx" value="" />
    </form>

    <script src="/public/js/lms/search_member.js"></script>
    <script type="text/javascript">
        var $_regi_form_modal = $('#_regi_form_modal');
        var $_datatable;
        var $_search_modal_form = $('#_search_modal_form');
        var $_list_ajax_table = $('#_list_ajax_table_cp_member');
        var $_delete_form = $('#_delete_form');

        $(document).ready(function() {
            $('#istatus').on('change', function(){
                $_datatable.draw();
            });

            $_search_modal_form.submit(function (){
                $_datatable.draw();
            });

            $_regi_form_modal.submit(function() {
                if($('#mem_idx').val().length < 1){
                    alert("회원검색을 통해 회원을 선택해주십시요.");
                    return;
                }

                var _url = '{{ site_url('/sys/btob/btobInfo/addCpMember') }}';

                ajaxSubmit($_regi_form_modal, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);

                        $('#mem_idx').val('');
                        $('#search_mem_id').val('');

                        $_datatable.draw();
                    }
                }, function(ret){
                    alert(ret.ret_msg);
                    $('#mem_idx').val('');
                    $('#search_mem_id').val('');

                }, null, false, 'alert');
            });

            // 페이징 번호에 맞게 일부 데이터 조회
            $_datatable = $_list_ajax_table.DataTable({
                serverSide: true,
                buttons: [
                ],
                ajax: {
                    'url' : '{{ site_url('/sys/btob/btobInfo/ajaxCpMember/') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($_search_modal_form.serializeArray()), { '{{csrf_token_name() }}' : $_regi_form_modal.find('input[name="{{ csrf_token_name() }}"]').val(), 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $_datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta){
                            return data.MemId + ' (' + data.MemName + ')';
                        }},
                    {'data' : 'Phone'},
                    {'data' : null, 'render' : function(data, type, row, meta){
                            return (data.IsStatus == 'Y' ? data.RegDatm : data.RegDatm+' (<font color=red>'+data.UpdDatm+'</font>)');
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta){
                            return (data.IsStatus == 'Y' ? '<font color=blue>정상</font>' : '<font color=red>삭제</font>');
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta){
                            return (data.IsStatus == 'Y' ? data.AdminName : data.AdminName+' (<font color=red>'+data.delAdminName+'</font>)');
                        }},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            if(data.IsStatus == 'N'){
                                return '';
                            }

                            return '<button type="button" class="btn btn-sm btn-primary border-radius-reset btn-regist bg-red btn_del" data-idx="' + data.bmIdx + '" >삭제</button>';
                        }}
                ]
            });


            $_list_ajax_table.on('click', '.btn_del', function() {
                if(window.confirm('회원을 삭제하시겠습니까?') == false){
                    return;
                }
                var _del_url = '{{ site_url('/sys/btob/btobInfo/deleteCpMember/') }}';

                $("#bmidx").val($(this).data('idx'));

                ajaxSubmit($_delete_form, _del_url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);
                        $("#bmidx").val('');
                        $_datatable.draw();
                    }
                }, function(ret){
                    $("#bmidx").val('');
                    alert(ret.ret_msg);
                }, null, false, 'alert');

            });
        });
    </script>
@stop
