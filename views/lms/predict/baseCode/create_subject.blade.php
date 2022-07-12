@extends('lcms.layouts.master_modal')

@section('layer_title')
    합격예측 직렬별 과목 추가
@stop

@section('layer_header')
<form class="form-horizontal" id="_sub_regi_form" name="_sub_regi_form" method="POST" onsubmit="return false;">
{!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="predict_idx" value="{{$arr_base['predict_idx']}}">
    <div id="add-box"></div>
    <div id="del-box"></div>
@endsection

@section('layer_content')
        <div class="row" style="max-height: 800px; overflow-y: auto;">
            <div class="col-md-12">
                <table id="_sub_list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="rowspan">직렬</th>
                        <th>선택</th>
                        <th>과목</th>
                        <th>과목타입</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $row)
                        <tr>
                            <input type="hidden" name="take_mock_part[{{$key}}]" value="{{$row['ParentCcd']}}">
                            <td>{{$row['ParentName']}}</td>
                            <td><input type="checkbox" id="_subject_code_{{$row['Ccd']}}" name="_subject_code" class="flat" value="{{$row['Ccd']}}" @if(empty($row['PrsIdx']) === false)checked="checked"@endif data-form-num="{{$key}}" data-subject-idx="{{$row['PrsIdx']}}"/></td>
                            <td>{{$row['SubjectCcdName']}}</td>
                            <td>{{$row['Type']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script type="text/javascript">
            var $_sub_datatable;
            var $_sub_regi_form = $('#_sub_regi_form');
            var $_sub_list_table = $('#_sub_list_table');

            $(document).ready(function() {
                $_sub_datatable = $_sub_list_table.DataTable({
                    serverSide: false,
                    ajax : false,
                    paging: false,
                    searching: true,
                    rowsGroup: ['.rowspan'],
                    buttons: []
                });

                $_sub_datatable.on('ifChanged', 'input[name="_subject_code"]', function() {
                    var that = $(this);
                    var code = that.val();
                    var subject_idx = that.data("subject-idx");
                    var form_num = that.data("form-num");

                    // 체크시
                    if (that.prop('checked') === true) {
                        if (subject_idx == '') {
                            var add_input = '<input type="hidden" name="add_subject_code[' + form_num + ']" value="' + code + '" id="add_' + form_num + '">';
                            $('#add-box').append(add_input);
                        } else {
                            $('#del-box').find("#del_"+form_num).remove();
                        }
                    } else {
                        $('#add-box').find("#add_"+form_num).remove();
                        if (subject_idx != '') {
                            var del_input = '<input type="hidden" name="del_subject_code[' + form_num + ']" value="' + subject_idx + '" id="del_' + form_num + '">';
                            $('#del-box').append(del_input);
                        }
                    }
                });

                $_sub_regi_form.submit(function() {
                    if (!confirm("저장하시겠습니까?")) return false;
                    var _url = '{{ site_url('/predict/baseCode/storeSubject') }}';
                    ajaxSubmit($_sub_regi_form, _url, function(ret) {
                        if(ret.ret_cd) {
                            notifyAlert('success', '알림', ret.ret_msg);
                            $("#modal_search_organization").modal('toggle');
                            var _replace_url = '{{ site_url('/predict/baseCode/listSubject/'.$arr_base['predict_idx']) }}';
                            replaceModal(_replace_url,'');
                        }
                    }, showValidateError, null, false, 'alert');
                });

                $('#list_ajax_table_wrapper').on('click', '.btn-regist, .btn-modify-parent, .btn-modify', function() {
                    var strMakeType = '';
                    var strGroupCcd = '';
                    var strCcd = '';
                    var uri_param = '';
                    var is_regist = $(this).prop('class').indexOf('btn-regist') !== -1;

                    if (is_regist) {    //등록
                        strMakeType = (typeof $(this).data('code-type') !== 'undefined') ? $(this).data('code-type') : "group";

                        if(strMakeType === "group") {
                            strGroupCcd = "0"
                        } else {
                            if ($list_table.find('input[name="GroupCcd"]:checked').length === 0) {
                                alert("그룹유형을 선택해 주세요.");
                                return false;
                            }
                            strGroupCcd =$list_table.find('input[name="GroupCcd"]:checked').val();
                        }
                        uri_param = strMakeType+"/"+strGroupCcd+"/";
                    }  else {           //수정
                        strMakeType = $(this).data('code-type');
                        strGroupCcd = $(this).data('group-ccd');
                        strCcd = $(this).data('ccd');
                        //alert(strMakeType+" - "+strCcd);
                        uri_param = strMakeType+"/"+strGroupCcd+"/"+strCcd;
                    }

                    $('.btn-regist, .btn-modify').setLayer({
                        "url" : "{{ site_url('sys/code/createModal/') }}"+ uri_param
                        ,width : "800"
                    });
                });
            });
        </script>
@stop

@section('add_buttons')
        <button type="submit" class="btn btn-success">저장</button>
@endsection

@section('layer_footer')
</form>
@endsection