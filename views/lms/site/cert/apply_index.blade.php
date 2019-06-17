@extends('lcms.layouts.master')
@section('content')
    <h5>- 사용자가 등록한 파일을 확인한 후 무한패스허용, 쿠폰자동발급을 승인하거나 취소하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <div class="x_panel">
            <div class="x_content">

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_type">인증검색</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control" id="search_category" name="search_category">
                            <option value="">카테고리</option>
                            @foreach($arr_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_type" name="search_type">
                            <option value="">인증구분</option>
                            @foreach($CertType_ccd as $key=>$val)
                                <option value="{{ $key }}" @if($key == $arr_search['search_type']) selected @endif>{{ $val }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_condition" name="search_condition">
                            <option value="">인증조건</option>
                            @foreach($CertCondition_ccd as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>

                        <input type="text" class="form-control" id="search_cert" name="search_cert" style="width:150px;"> 인증코드, 회차명 검색 가능

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건검색</label>
                    <div class="col-md-11 form-inline">

                        <select class="form-control" id="search_no" name="search_no">
                            <option value="">회차</option>
                            @for($i=1;$i<=10;$i++)
                                <option value="{{$i}}" @if($i == $arr_search['search_no']) selected @endif>{{$i}}</option>
                            @endfor
                        </select>

                        <select class="form-control" id="search_approval" name="search_approval">
                            <option value="">승인여부</option>
                            <option value="A">미승인</option>
                            <option value="Y">승인</option>
                            <option value="N">취소</option>
                        </select>

                        <select class="form-control" id="search_order" name="search_order">
                            <option value="">구매여부</option>
                            <option value="Y">Y</option>
                            <option value="N">N</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">회원검색</label>
                    <div class="col-md-5 form-inline">
                        <p class="form-control-static">
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:150px;">
                            이름, 아이디, 연락처 검색 가능
                        </p>
                    </div>
                    <label class="control-label col-md-1" for="search_date_type">날짜검색</label>
                    <div class="col-md-5 form-inline">

                        <select class="form-control" id="search_date_type" name="search_date_type" style="width:120px;">
                            <option value="SA.ApprovalDatm">승인일</option>
                            <option value="SA.CancelDatm">승인취소일</option>
                        </select>
                        <input name="search_sdate"  class="form-control datepicker" id="search_sdate" style="width: 100px;"  type="text"  value="">
                        ~ <input name="search_edate"  class="form-control datepicker" id="search_edate" style="width: 100px;"  type="text"  value="">

                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>

    <form class="form-horizontal" id="regi_form" name="regi_form">
        {!! csrf_field() !!}
        <input type="hidden" name="process_type" id="process_type" value="">
        <input type="hidden" name="app_status" id="app_status" value="">
        <input type="hidden" name='checkIdx_each' id="checkIdx_each" value="">


    <div class="x_panel mt-10">
        <p>※ '승인'시, 인증전용 무한패스 구매 권한이 회원에게 부여됩니다.('취소' 시 인증전용 무한패스 구매 불가)</p>
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>선택</th>
                    <th>NO</th>
                    <th>운영사이트</th>
                    <th>카테고리</th>
                    <th>인증코드</th>
                    <th>인증구분</th>
                    <th>회차 - 회차명</th>
                    <th>응시직렬</th>
                    <th>회원명</th>
                    <th>상세<br>정보</th>
                    <th>첨부</th>
                    <th>등록일</th>
                    <th>승인자</th>
                    <th>승인일</th>
                    <th>승인취소자</th>
                    <th>승인취소일</th>
                    <th>승인<br>여부</th>
                    <th>승인확인</th>
                    <th>구매여부</th>

                    <th>기간연장<Br>(연장일)</th>
                    <th>추가정보</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $regi_form = $('#regi_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            $search_form.find('select[name="search_category"]').chained("#search_site_code");

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn btn-default btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-sms' },
                    { text: '<i class="fa fa-copy mr-5"></i> 승인취소', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-all-cancel' },
                    { text: '<i class="fa fa-copy mr-5"></i> 승인', className: 'btn-sm btn-success border-radius-reset btn-all-permission'}
                ],
                ajax: {
                    'url' : '{{ site_url('/site/cert/apply/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            return '<input type="checkbox" id="checkIdx'+data.CaIdx+ '" name="checkIdx[]" class="flat target-crm-member" value="'+data.CaIdx+'" data-mem-idx="'+data.MemIdx+'" data-approval="' + (data.ApprovalStatus ) + '"/>';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'SiteName'},
                    {'data' : 'CateName'},
                    {'data' : 'CertIdx'},
                    {'data' : 'CertTypeCcd_Name'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return data.No +' - '+ data.CertTitle;
                        }},
                    {'data' : null,  'render' : function(data,type,row,meta) {
                            return data.TakeKind_Name !=null ? data.TakeKind_Name:data.TakeKind;
                        },'name' : 'TakeKind'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:;" class="btn-member" data-idx="'+ data.MemIdx+ '" ><u>'+data.MemName+'('+data.MemId+')</u></a><BR>'+data.Phone+'('+data.SmsRcvStatus+')';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:;" class="btn-info btn-sm btn-primary border-radius-reset" data-idx="'+ data.CaIdx+ '">확인</a>';
                        }},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            return $return =  data.AttachFileName != null ? '<a class="btn-attachFile glyphicon glyphicon-file" href="{{site_url('/site/cert/apply/download/')}}?filename=' + encodeURIComponent(data.AttachFilePath + data.AttachFileName) + '&filename_ori=' + encodeURIComponent(data.AttachFileReal) + '" target="_blank"></a>' : '';
                        }},
                    {'data' : 'RegDatm'},
                    {'data' : 'ApprovalAdmin_Name'},
                    {'data' : 'ApprovalDatm'},
                    {'data' : 'CancelAdmin_Name'},
                    {'data' : 'CancelDatm'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            if(data.ApprovalStatus == 'A') {
                                return '미승인';
                            } else if(data.ApprovalStatus == 'Y') {
                                return '승인';
                            } else if(data.ApprovalStatus == 'N') {
                                return '<span class="red">취소</span>';
                            }
                        }},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            if(data.ApprovalStatus == 'A') {
                                return '<a href="javascript:;" class="btn-permission btn-sm btn-success border-radius-reset mr-10" data-idx="' + data.CaIdx + '">승인</a>' +
                                    '<a href="javascript:;" class="btn-cancel btn-sm btn-danger mr-1 border-radius-reset" data-idx="' + data.CaIdx + '">취소</a>';
                            } else if (data.ApprovalStatus === 'Y') {
                                return '<a href="javascript:;" class="btn-cancel btn-sm btn-danger border-radius-reset" data-idx="' + data.CaIdx + '">취소</a>';
                            } else {
                                return '';
                            }
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return (data.orderCount != "0") ? 'Y' : '<span class="red">N</span>';
                        }},

                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return data.ExtendStatus;//data.ExtendStatus+ (data.ExtendStatus=='Y' ? '<Br>'+data.ExtendDatm : '');
                        },'name' : 'Extend'},

                    {'data' : null, 'render' : function(data, type, row, meta) {
                            str = '';
                            if(data.AddContent1 != null && data.AddContent1 != '') {
                                str = data.AddContent1;
                                if(data.AddContent2 != null && data.AddContent2 != '') {
                                    str  += '<BR>' + data.AddContent2;
                                }
                            }
                            return str;
                        },'name' : 'AddContent'},

                ]
            });


            $datatable.on( 'draw', function () {
                var $OrderStatus_col = $datatable.column('OrderStatus:name');
                //var $OrderDatm_col = $datatable.column('OrderDatm:name');
                var $Extend_col = $datatable.column('Extend:name');
                var $TakeKind_col = $datatable.column('TakeKind:name');
                var $AddContent_col = $datatable.column('AddContent:name');

                if ($('#search_type').val() == '' || $('#search_type').val() == '684001' || $('#search_type').val() == '684003' ) {
                    $OrderStatus_col.visible(true);
                    //$OrderDatm_col.visible(true);
                    $Extend_col.visible(false);
                    $TakeKind_col.visible(false);
                    $AddContent_col.visible(false);

                }else if($('#search_type').val() == '684002') {         //제대군인인증
                    $OrderStatus_col.visible(true);
                   //$OrderDatm_col.visible(true);
                    $Extend_col.visible(false);
                    $TakeKind_col.visible(false);
                    $AddContent_col.visible(false);

                }else if($('#search_type').val() == '684004') {         //환승인증
                    $OrderStatus_col.visible(true);
                    //$OrderDatm_col.visible(true);
                    $Extend_col.visible(false);
                    $TakeKind_col.visible(false);
                    $AddContent_col.visible(false);

                } else if($('#search_type').val() == '684005') {        //수험표 인증
                    $TakeKind_col.visible(true);
                    $OrderStatus_col.visible(false);
                    //$OrderDatm_col.visible(false);
                    $Extend_col.visible(false);
                    $AddContent_col.visible(true);
                } else {
                    $Extend_col.visible(false);
                    $TakeKind_col.visible(false);
                }
            });


            //상세정보
            $list_table.on('click', '.btn-info', function() {
                $('.btn-info').setLayer({
                    'url' : '{{ site_url('/site/cert/apply/info/') }}' + $(this).data('idx'),
                    'width' : 750
                });
            });


            //선택 승인/취소
            $('.btn-all-cancel , .btn-all-permission').on('click', function() {
                var $branching = '';
                var $branching_msg = '';
                if($(this).attr("class").match("btn-all-cancel")) {
                    $branching = 'N';
                    $branching_msg = '승인 취소';
                } else if($(this).attr("class").match("btn-all-permission")) {
                    $branching = 'Y';
                    $branching_msg = '승인';
                }


                if ($('input:checkbox[name="checkIdx[]"]').is(":checked") == false || $('input:checkbox[name="checkIdx[]"]').length == 0) {
                    alert($branching_msg + " 할 내역을 선택해 주세요.");
                    return;
                }

                $bundle_check = ''; //일괄처리 가능여부

                $('input:checkbox[name="checkIdx[]"]:checked').each(function() {
                    if($(this).data('approval') != 'A') {
                        $bundle_check = 'N';
                    }
                });

                if($bundle_check=='N') {
                    alert("'미승인' 의 경우만 일괄 처리가 가능합니다.");
                    return;
                }

                if (confirm($branching_msg + " 하시겠습니까?")) {

                    $("#app_status").val($branching);
                    $("#process_type").val('all');

                    var _url = '{{ site_url('/site/cert/apply/change') }}';
                    ajaxSubmit($regi_form, _url, function (ret) {
                        if (ret.ret_cd) {
                            notifyAlert('success', '알림', ret.ret_msg);
                            $datatable.draw();
                        }
                    }, showValidateError, null, false, 'alert');

                }

            });

            //개별 승인/취소
            $list_table.on('click', '.btn-cancel, .btn-permission', function() {

                var $branching = '';
                var $branching_msg = '';
                var $checkidx_each = $(this).data('idx');

                if($(this).attr("class").match("btn-cancel")) {
                    $branching = 'N';
                    $branching_msg = '승인 취소';
                } else if($(this).attr("class").match("btn-permission")) {
                    $branching = 'Y';
                    $branching_msg = '승인';
                }

                if (confirm($branching_msg + " 하시겠습니까?")) {
                    $("#process_type").val('each');
                    $("#app_status").val($branching);
                    $("#checkIdx_each").val($checkidx_each);

                    var _url = '{{ site_url('/site/cert/apply/change') }}';
                    ajaxSubmit($regi_form, _url, function (ret) {
                        if (ret.ret_cd) {
                            notifyAlert('success', '알림', ret.ret_msg);
                            $datatable.draw();
                        }
                    }, showValidateError, null, false, 'alert');

                }
            });

            $list_table.on('click', '.btn-member', function() {
                window.open("{{site_url('/member/manage/detail/')}}"+$(this).data('idx'), '_blank');
            });

            //엑셀다운로드
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/site/cert/apply/listAjax/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

        });
    </script>
    </form>

@stop