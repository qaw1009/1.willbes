@extends('lcms.layouts.master_modal')

@section('layer_title')
    회원 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="search_form_modal" name="search_form_modal" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            <div class="form-group form-group-bordered pt-10 pb-10">
                <div class="row">
                    <label class="control-label col-md-2" for="site_code">운영 사이트</label>
                    <div class="col-md-2">
                        <select class="form-control input-sm" id="site_code" name="site_code" title="운영 사이트">
                            <option value="">사이트선택</option>
                            @foreach($get_site_array as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-5">
                    <label class="control-label col-md-2 pt-5" for="search_sms_is_agree">조건</label>
                    <div class="col-md-2">
                        <select class="form-control input-sm" id="search_sms_is_agree" name="search_sms_is_agree">
                            <option value="">SMS수신동의</option>
                            <option value="Y">동의</option>
                            <option value="N">미동의</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control input-sm" id="search_email_is_agree" name="search_email_is_agree">
                            <option value="">메일수신동의</option>
                            <option value="Y">동의</option>
                            <option value="N">미동의</option>
                        </select>
                    </div>
                    <label class="control-label col-md-1 input-sm" for="search_member_start_regdate">가입일</label>
                    <div class="col-md-4 form-inline">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker input-sm" id="search_member_start_regdate" name="search_member_start_regdate" value="">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker input-sm" id="search_member_end_regdate" name="search_member_end_regdate" value="">
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <label class="control-label col-md-2 pt-5" for="search_value">통합검색
                    </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="search_value" name="search_value" value="">
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">아이디, 이름, 휴대폰번호(끝4자리) 검색 가능</p>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-sm btn-search" id="btn_search_modal">검 색</button>
            </div>
            <div class="row mt-20 mb-20">
                <div class="col-md-12 clearfix">
                    <table id="_list_modal_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>사이트</th>
                            <th>ID</th>
                            <th>이름</th>
                            <th>휴대폰번호</th>
                            <th>SMS 수신동의</th>
                            <th>이메일주소</th>
                            <th>이메일 수신동의</th>
                            <th>가입일</th>
                            <th>상태</th>
                            <th>선택</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 text-center">
                    <button class="btn btn-info" type="button" id="btn_setting">등록</button>
                </div>
            </div>
            <script type="text/javascript">
                var $datatable_modal;
                var $search_form_modal = $('#search_form_modal');
                var $list_modal_table = $('#_list_modal_ajax_table');
                var send_type_modal = '{{$send_type}}';
                var $ori_selected_data = {};

                $(document).ready(function() {
                    var set_mem_idx = '{{$set_mem_idx}}';
                    var set_mem_id = '{{$set_mem_id}}';
                    var arr_set_mem_idx = set_mem_idx.split(',');
                    var arr_set_mem_id = set_mem_id.split(',');

                    $search_form_modal.on('click', '#btn_search_modal', function() {
                        $datatable_modal.draw();
                    });
                    // 페이징 번호에 맞게 일부 데이터 조회
                    $datatable_modal = $list_modal_table.DataTable({
                        deferLoading: false,    //datable autoload false
                        serverSide: true,
                        ajax: {
                            "url" : "{{ site_url('crm/sms/listMemberModalAjax') }}",
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                            }
                        },
                        columns: [
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    // 리스트 번호
                                    return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                                }},
                            {'data' : 'SiteName'},
                            {'data' : 'MemId'},
                            {'data' : 'MemName'},
                            {'data' : 'Phone'},
                            {'data' : 'SmsRcvStatus', 'render' : function(data, type, row, meta) {
                                    if (data == 'Y') {return '동의'} else { return '미동의' }
                                }},
                            {'data' : 'MemMail'},
                            {'data' : 'MailRcvStatus', 'render' : function(data, type, row, meta) {
                                    if (data == 'Y') {return '동의'} else { return '미동의' }
                                }},
                            {'data' : 'JoinDate'},
                            {'data' : 'IsStatus'},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    var val = '0';
                                    switch (send_type_modal) {
                                        case 'sms' :
                                            if (row.Phone == '') { val = ''; } else { val = row.Phone; }
                                            break;
                                        case 'mail' :
                                            if (row.MemMail == '') { val = ''; } else { val = row.MemMail; }
                                            break;
                                        case 'message' : val = row.MemIdx; break;
                                    }
                                    /!*var checked = ($ori_selected_data.hasOwnProperty(row.MemIdx) === true) ? 'checked="checked"' : '';*!/
                                    var checked = '';
                                    return '<input type="checkbox" name="is_checked" value="'+ val +'" class="flat" data-is-checked-idx="' + row.MemIdx + '" data-is-checked-id="' + row.MemId + '" data-is-checked-name="' + row.MemName + '" ' + checked + '>';
                                }}
                        ]
                    });

                    $('#btn_setting').on('click', function() {
                        var j=1;
                        var $params = {};
                        $('input[name="is_checked"]:checked').each(function(index) {
                            $params[$(this).data('is-checked-idx')] = [$(this).data('is-checked-id'), $(this).val(), $(this).data('is-checked-name')];
                        });

                        var $params_length = Object.keys($params).length;
                        if ($params_length <= '0') {
                            alert('수신인 명단을 선택해주세요.');
                            return false;
                        }

                        if (set_mem_idx != '') {
                            $.each(arr_set_mem_idx,function(key,value) {
                                $params[value] = [arr_set_mem_id[key], value];
                            });
                        }

                        if (!confirm('수신인 명단에 등록하시겠습니까?')) {
                            return;
                        }

                        switch (send_type_modal) {
                            case 'sms' :
                                var arr_temp_mem_phone = new Array();
                                var arr_temp_mem_name = new Array();

                                // 이전 담기
                                $('input[name="mem_phone[]"]').each(function(i){
                                    var mem_phone_val = $(this).val();
                                    var mem_name_val = $('input[name="mem_name[]"]').eq(i).val();
                                    if(mem_phone_val != '') {
                                        arr_temp_mem_phone.push(mem_phone_val);
                                        arr_temp_mem_name.push(mem_name_val);
                                    }
                                });

                                // 추가 담기
                                $.each($params, function(i, i_val) {
                                    // 같은 전화번호 있는지 체크
                                    var chk_overlap = false;
                                    $.each(arr_temp_mem_phone, function(j, j_val) {
                                        if(i_val[1] == j_val) {
                                            chk_overlap = true;
                                        }
                                    });
                                    if(chk_overlap == false){
                                        arr_temp_mem_phone.push(i_val[1]);
                                        arr_temp_mem_name.push(i_val[2]);
                                    }
                                });

                                // 그리기
                                var list_str = '';
                                $('#mem_phone_table_1 tbody').empty();
                                $('#mem_phone_table_2 tbody').empty();
                                $.each(arr_temp_mem_phone, function(i, value) {
                                    var num = i + 1;
                                    list_str += '<tr>';
                                    list_str += '	<td>' + num + '</td>';
                                    list_str += '	<td>';
                                    list_str += '		<input type="text" id="mem_name_' + num + '" name="mem_name[]" class="form-control mb-5" title="수신이름" value="' + arr_temp_mem_name[i] + '" maxlength="6">';
                                    list_str += '	</td>';
                                    list_str += '	<td>';
                                    list_str += '		<input type="text" id="mem_phone_' + num + '" name="mem_phone[]" class="form-control" title="수신번호" value="' + value + '" maxlength="11">';
                                    list_str += '	</td>';
                                    list_str += '</tr>';

                                    if(Math.floor(arr_temp_mem_phone.length/2) == i) {
                                        $('#mem_phone_table_1 tbody').html(list_str);   //중간
                                        list_str = '';
                                    } else if(arr_temp_mem_phone.length == (i+1)) {
                                        $('#mem_phone_table_2 tbody').html(list_str);   //끝
                                    }
                                });
                                break;
                            case "message" :
                                // 이전 담기
                                var temp_mem_idx_val = $('input[name=temp_mem_idx]').val();
                                var temp_mem_id_val = $('input[name=temp_mem_id]').val()
                                var arr_temp_mem_idx = temp_mem_idx_val != null && typeof temp_mem_idx_val != 'undefined' && temp_mem_idx_val != '' ? temp_mem_idx_val.split(',') : new Array();
                                var arr_temp_mem_id = temp_mem_id_val != null && typeof temp_mem_id_val != 'undefined' && temp_mem_id_val != '' ? temp_mem_id_val.split(',') : new Array();

                                // 추가 담기
                                $.each($params, function(i, i_val) {
                                    if(i_val[0] == '') return true;
                                    // 같은 아이디가 있는지 체크
                                    var chk_overlap = false;
                                    $.each(arr_temp_mem_id, function(j, j_val) {
                                        if(i_val[0] == j_val) {
                                            chk_overlap = true;
                                        }
                                    });
                                    if(chk_overlap == false){
                                        arr_temp_mem_id.push(i_val[0]);
                                        arr_temp_mem_idx.push(i_val[1]);
                                    }
                                });

                                // 그리기
                                var list_str = '', arr_choice_mem_idx = '', arr_choice_mem_id = '';
                                $('#mem_id_table_1 tbody').empty();
                                $('#mem_id_table_2 tbody').empty();
                                $.each(arr_temp_mem_id, function(i, value) {
                                    var num = i + 1;
                                    list_str += '<tr>';
                                    list_str += '	<td>' + num + '</td>';
                                    list_str += '	<td class="col-md-12 form-inline">';
                                    list_str += '		<input type="text" id="mem_id_' + num + '" name="mem_id[]" class="form-control mb-5" value="' + arr_temp_mem_id[i] + '" maxlength="11" readonly="readonly" style="width: 100px;">';
                                    list_str += '		<a href="#none" data-del-number="' + i +'" class="btn-member-del" data-=""><i class="fa fa-times red ml-10"></i></a>';
                                    list_str += '	</td>';
                                    list_str += '</tr>';

                                    if(Math.floor(arr_temp_mem_id.length/2) == i) {
                                        $('#mem_id_table_1 tbody').html(list_str);   //중간
                                        list_str = '';
                                    } else if(arr_temp_mem_id.length == (i+1)) {
                                        $('#mem_id_table_2 tbody').html(list_str);   //끝
                                    }

                                    if(i != 0) arr_choice_mem_idx += ',';
                                    arr_choice_mem_idx += arr_temp_mem_idx[i];

                                    if(i != 0) arr_choice_mem_id += ',';
                                    arr_choice_mem_id += arr_temp_mem_id[i];
                                });

                                $('input[name="temp_mem_idx"]').val(arr_choice_mem_idx);
                                $('input[name="temp_mem_id"]').val(arr_choice_mem_id);
                                $('input[name="choice_mem_idx"]').val('');
                                $('input[name="choice_mem_id"]').val('');
                                break;
                            case "mail" :
                                var j = 1;
                                for (var i=1; i<=12; i++) {
                                    if ($('#mem_name_'+i).val() == '') {
                                        j = i;
                                        break;
                                    }
                                    j++;
                                }
                                $.each($params, function(key, value) {
                                    $('#mem_mail_'+j).val(value[1]);
                                    $('#mem_name_'+j).val(value[2]);
                                    j++;
                                });
                                break;
                            default :
                                alert('발송 타입이 없습니다. 관리자에게 문의해 주세요.');
                                break;
                        }

                        $("#modal_html2").modal('toggle');
                        if($('.modal-content').is(':visible')) $('body').addClass('modal-open');   // 2개 이상의 레이어팝업이 열린 상황일때 하나가 닫히면서 이전 팝업이 스크롤이 안되는 현상 방지
                    });

                    // 기존 선택된 정보 json 변수 저장
                    var setOriSelectedData = function() {
                        $.each(arr_set_mem_idx,function(key,value) {
                            $ori_selected_data[value] = value;
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