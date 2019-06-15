@extends('lcms.layouts.master_modal')

@section('layer_title')
    수동배정처리
@stop

@section('layer_header')
    <form class="form-horizontal" id="_manual_search_form" name="_manual_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        @endsection

    @section('layer_content')
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-1" for="">회원검색</label>
                <div class="col-md-10 form-inline">
                    <input type="text" name="_manual_search_value" id="_manual_search_value" class="form-control"  style="width: 150px;"  value="" >
                    &nbsp;
                    <button type="submit" class="btn btn-sm btn-primary mr" id="manual_modal_btn_search">검 색</button>
                    <button type="button" class="btn btn-sm btn-default mr" id="manual_modal_btn_reset">검색초기화</button>
                    - 회원아이디/회원명 검색
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-1" for="">수동배정</label>
                <div class="col-md-10 form-inline">

                        <select class="form-control" id="_InterestCcd" name="_InterestCcd" title="준비과정" >
                            <option value="" >-준비과정-</option>
                            @foreach($InterestCcd as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="_AssignCcd" name="_AssignCcd" title="배정구분" >
                            <option value="" >-배정구분-</option>
                            @foreach($AssignCcd as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="_wAdminIdx" name="_wAdminIdx" title="TM" >
                            <option value="" >-TM-</option>
                            @foreach($AssignAdmin as $row)
                                <option value="{{$row['wAdminIdx']}}">{{$row['wAdminName']}}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <button type="button" class="btn btn-sm btn-success mr" id="btn_manual_assign">회원배정</button>

                </div>
            </div>

            <div class="row mt-20 mb-20">
                <div class="col-md-12 clearfix">
                    <table id="_list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="5%">선택</th>
                            <th width="10%">회원명</th>
                            <th width="13%">회원아이디</th>
                            <th >핸드폰번호</th>
                            <th width="12%">준비과정</th>
                            <th width="8%">블랙</th>
                            <th width="8%">SMS수신</th>
                            <th width="18%">가입일</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <script type="text/javascript">
                var $datatable_modal;
                var $search_form_modal = $('#_manual_search_form');
                var $list_table_modal = $('#_list_ajax_table');

                $(document).ready(function() {

                    $datatable_modal = $list_table_modal.DataTable({
                        serverSide: true,
                        paging: false,
                        ajax: {
                            'url' : '{{ site_url('/crm/tm/TmMng/assignManualMemberList') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form_modal.serializeArray()), { '{{ csrf_token_name() }}' : $search_form_modal.find('input[name="{{ csrf_token_name() }}"]').val()});
                            }
                        },
                        columns: [
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return "<input type='radio' name='MemIdx' id='memIdx_"+data.MemIdx+"' value='"+data.MemIdx+"' class='flat'>"
                                }},
                            {'data' : 'MemName'},
                            {'data' : 'MemId'},
                            {'data' : 'Phone'},
                            {'data' : 'Interest_Name'},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return data.IsBlackList == 'Y' ? "<font color=red>Y</font>" : data.IsBlackList;
                                }},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return data.SmsRcvStatus == 'Y' ? "<font color=red>Y</font>" : data.SmsRcvStatus;
                                }},
                            {'data' : 'JoinDate'}
                        ]
                    });

                    $('#manual_modal_btn_reset').click(function(){
                        $search_form_modal[0].reset();
                    });

                    $('#btn_manual_assign').click(function(){

                        if($("#_InterestCcd").val() == "") {
                            alert("준비과정을 선택해 주세요.");return;
                        }
                        if($("#_AssignCcd").val() == "") {
                            alert("배정조건을 선택해 주세요.");return;
                        }
                        if($("#_wAdminIdx").val() == "") {
                            alert("TM을 선택해 주세요.");return;
                        }
                        if($('input:radio[name=MemIdx]').is(':checked') == false) {
                            alert("회원을 선택해 주세요");return;
                        }
                        var _url = '{{ site_url('/crm/tm/TmMng/assignManual') }}';
                        ajaxSubmit($search_form_modal, _url, function(ret) {
                            if(ret.ret_cd) {
                                //notifyAlert('success', '알림', ret.ret_msg);
                                //$("#btn_assign").attr("disabled",true);
                                alert("회원이 배정되었습니다.");
                                $("#pop_modal").modal('toggle');
                                showAssign(ret.ret_data)
                            }
                        }, showValidateError, null, false, 'alert');
                    });
                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection