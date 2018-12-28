@extends('lcms.layouts.master_modal')

@section('layer_title')
    상담등록
@stop

@section('layer_header')

        @endsection

        @section('layer_content')

            <div class="row">
                <div class="col-md-6">
                    <strong>· TM회원정보</strong>
                </div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-sm btn-primary mr-10 btn-modal-message">쪽지발송</button>
                    <button class="btn btn-sm btn-primary mr-10 btn-modal-sms">SMS발송</button>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>가입사이트</th>
                            <th>회원명</th>
                            <th>아이디 </th>
                            <th>핸드폰번호(수신여부) </th>
                            <th>가입일</th>
                        </tr>
                        <tr>
                            <td>{{$data_mem['SiteName']}}</td>
                            <td>{{$data_mem['MemName']}}</td>
                            <td>{{$data_mem['MemId']}}</td>

                            <td>{{$data_mem['Phone']}} ({{$data_mem['SmsRcvStatus']}})</td>
                            <td>{{$data_mem['JoinDate']}}</td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="row">
                <form class="form-horizontal" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;">
                    {!! csrf_field() !!}
                    <input type="hidden" id="MemIdx" name="MemIdx" value="{{ $data_mem['MemIdx'] }}"/>
                    <input type="hidden" id="MemId" name="MemId" value="{{ $data_mem['MemId'] }}"/>
                    <input type="hidden" name="TaIdx" value="{{ $TaIdx }}"/>

                    <div class="col-md-12">
                        <p><strong>· TM상담등록</strong></p>
                    </div>
                    <div class="col-md-10 form-inline">
                        <p>
                        <select class="form-control" id="_reg_ConsultCcd" name="_reg_ConsultCcd"  title="상담대상유형">
                            <option value="">상담대상유형</option>
                            @foreach($ConsultCcd  as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <select class="form-control" id="_reg_TmClassCcd" name="_reg_TmClassCcd"  title="TM분류">
                            <option value="">TM분류</option>
                            @foreach($TmClassCcd  as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        </p>
                    </div>
                    <div class="col-md-2 text-right">
                        <button class="btn btn-sm btn-primary mr-10 btn-consult">상담저장</button>
                    </div>
                    <div class="col-md-12">
                        <P>
                        <textarea id="_reg_TmContent" name="_reg_TmContent"  class="form-control" rows="3" placeholder="" title="내용"></textarea>
                        </P>
                    </div>
                </form>

                <form class="form-horizontal" id="_consult_search_form" name="_consult_search_form" method="POST" onsubmit="return false;">
                    <div class="col-md-3 form-inline">

                    </div>
                    <div class="col-md-9 form-inline text-right">
                            <select class="form-control" id="_consult_search_ConsultCcd" name="_consult_search_ConsultCcd">
                                <option value="">상담대상유형</option>
                                @foreach($ConsultCcd  as $key=>$val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                            &nbsp;
                            <select class="form-control" id="_consult_search_TmClassCcd" name="_consult_search_TmClassCcd">
                                <option value="">TM분류</option>
                                @foreach($TmClassCcd  as $key=>$val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                            &nbsp;
                            <input type="text" name="_consult_search_value" id="_consult_search_value" class="form-control"  style="width: 150px;"  value="" >
                            &nbsp;
                            <button type="submit" class="btn btn-sm btn-primary mr" id="modal_btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                            <button type="button" class="btn btn-sm btn-default mr" id="modal_btn_reset">검색초기화</button>

                    </div>

                    <div class="col-md-12">
                            <table id="_consult_list_ajax_table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th width="3%">NO</th>
                                    <th width="10%">배정구분</th>
                                    <th width="12%">배정일</th>
                                    <th width="12%">상담대상유형</th>
                                    <th width="12%">TM분류</th>
                                    <th >상담내용</th>
                                    <th width="8%">등록자</th>
                                    <th width="12%">등록일</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                    </div>
                </form>
            </div>

            <br>
            <div class="row">
                <div class="col-md-12">
                    <p><strong>· CS상담관리 (회원 정보 개발 후)</strong></p>
                </div>
                <div class="col-md-10 form-inline">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="3%">NO</th>
                            <th width="10%">운영사이트</th>
                            <th width="10%">구분</th>
                            <th width="10%">분류</th>
                            <th>상담내용</th>
                            <th width="10%">조치여부</th>
                            <th width="10%">등록자</th>
                            <th width="10%">등록일</th>
                            <th width="10%">최종수정자</th>
                            <th width="10%">최종수정일</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>


            <br>
            <div class="row">
                <div class="col-md-12">
                    <p><strong>· 쿠폰관리 (회원 정보 개발 후)</strong></p>
                </div>
                <div class="col-md-10 form-inline">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="3%">NO</th>
                            <th width="10%">쿠폰번호</th>
                            <th width="10%">쿠폰정보</th>
                            <th width="10%">발급구분</th>
                            <th>발급일</th>
                            <th width="10%">유효여부</th>
                            <th width="10%">사용여부</th>
                            <th width="10%">사용상품</th>
                            <th width="10%">발급회수일</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <script type="text/javascript">
                var $datatable_modal;
                var $regi_form_modal = $('#_regi_form');
                var $search_form_modal = $('#_consult_search_form');
                var $list_table_modal = $('#_consult_list_ajax_table');

                $(document).ready(function() {
                    // 페이징 번호에 맞게 일부 데이터 조회
                    $datatable_modal = $list_table_modal.DataTable({
                        serverSide: true,
                        paging: false,
                        ajax: {
                            'url' : '{{ site_url('/crm/tm/TmAssign/consultListAjax') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form_modal.serializeArray()), { '{{ csrf_token_name() }}' : $regi_form_modal.find('input[name="{{ csrf_token_name() }}"]').val(), 'MemIdx' : $regi_form_modal.find('input[name="MemIdx"]').val()});
                            }
                        },
                        columns: [
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    // 리스트 번호
                                    return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                                }},
                            {'data' : 'AssignCcd_Name'},
                            {'data' : 'RegDatm'},
                            {'data' : 'ConsultCcd_Name'},
                            {'data' : 'TmClassCcd_Name'},
                            {'data' : 'TmContent'},
                            {'data' : 'RegAdminName'},
                            {'data' : 'writeDate'}
                        ]
                    });


                    $('#modal_btn_reset').click(function(){
                        $search_form_modal[0].reset();
                    });

                    $('.btn-consult').click(function(){

                        if($("#_reg_ConsultCcd").val() == "") {
                            alert("상담대상유형을 선택해 주세요.");return;
                        }
                        if($("#_reg_TmClassCcd").val() == "") {
                            alert("TM 분류를 선택해 주세요.");return;
                        }
                        if($("#_reg_TmContent").val() == "") {
                            alert("상담내용을 등록해 주세요.");return;
                        }

                        if(!confirm("저장 후 수정이 불가능합니다. 저장하시겠습니까?")) {
                            return;
                        }

                        var _url = '{{ site_url('/crm/tm/TmAssign/consultStore') }}';
                        ajaxSubmit($regi_form_modal, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', '상담이 저정되었습니다.');
                                $regi_form_modal[0].reset();
                                $search_form_modal[0].reset();
                                //$search_form_modal.submit();
                                $datatable_modal.draw();
                            }
                        }, showValidateError, null, false, 'alert');
                    });

                    $('.btn-modal-message').click(function (){
                        var target_idx = $('#MemIdx').val();
                        if(target_idx == ''){ alert('쪽지발송 대상 회원을 선택해 주세요.');return;}
                        $('.btn-modal-message').setLayer({
                            url : "{{ site_url('crm/message/createSendModal') }}?target_idx="+target_idx,
                            width : 800,
                            modal_id : "message_modal"
                        });
                    });

                    $('.btn-modal-sms').click(function (){
                        var target_id = $('#MemId').val();
                        if(target_id == ''){ alert('SMS발송 대상 회원을 선택해 주세요.');return;}
                        $('.btn-modal-sms').setLayer({
                            url : "{{ site_url('crm/sms/createSendModal') }}?target_id="+target_id,
                            width : 1100,
                            modal_id : "message_modal"
                        });
                    });

                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')

@endsection