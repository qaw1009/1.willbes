@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">        
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .top_police{background:#404040}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/07/1346_top_bg.jpg) no-repeat center top;}
        .evt01 {padding-bottom:120px}               
        .evt01 .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evt01 .request h3 {font-size:17px; color:#000; font-weight:bold;letter-spacing:-1px;}
        .evt01 .request td {padding:10px}
        .evt01 .request input {height:26px;}
        .evt01 .requestL {width:49%; float:left}
        .evt01 .requestR {width:49%; float:right; }
        .evt01 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:190px; overflow-y:scroll}
        .evt01 .requestL li {display:inline-block;}
        .evt01 .requestR li {margin-bottom:5px}
        .evt01 .request:after {content:""; display:block; clear:both}
        .evt01 .btn {clear:both; width:700px; margin:0 auto;}
        .evt01 .btn a {display:block; text-align:center; font-size:28px; color:#fff; background:#164351; padding:20px 0; margin-top:30px; border-radius:50px; box-shadow:0 10px 10px rgba(0,0,0,.2);}
        .evt01 .btn a:hover {background:#e71833}
        .evt02 {background:#2e3c52 url(https://static.willbes.net/public/images/promotion/2019/07/1329_02_bg.jpg) no-repeat center top; padding-top:100px}         
        .evt03 {background:#fff;} 
        
        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}

        .table_type th,
        .table_type td {letter-spacing:normal;padding:5px 8px;text-align:left;}
        .table_type td label{margin-right:0;}

        .requestL .file{height:50px;line-height:50px;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" name="file_chk" value="Y"/>

            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1346_top.jpg" title="최신판례 무료특강">
            </div>                
            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1346_01.jpg" title="고득점 마지막 단계"> 
                <div class="request" id="request">
                    <div class="requestL">
                        <h3>* 8.3(토) 14:30~15:30 신광은 형소법 무료 최신판례특강 접수</h3>
                        <table width="0" cellspacing="0" cellpadding="0" class="table_type">
                            <col width="20%" />
                            <col  />
                            <tr>
                                <th>* 이름</th>
                                <td scope="col">
                                    <input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" {{(sess_data('is_login') === true) ? 'readonly="readonly"' : ''}}/>
                                </td>
                            </tr>
                            <tr>
                                <th>* 연락처</th>
                                <td>
                                    <input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" placeholder="" maxlength="11">
                                </td>
                            </tr>                            
                            <tr>
                                <th>* 참여캠퍼스</th>
                                <td>
                                    <ul>
                                        @foreach($arr_base['register_list'] as $row)
                                            <li><input type="radio" name="register_chk[]" id="register_chk_{{ $row['ErIdx'] }}" value="{{$row['ErIdx']}}" /> <label for="register_chk_{{ $row['ErIdx'] }}">{{ $row['Name'] }}</label></li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="file" name="attach_file" id="attach_file">
                                </td>
                            </tr>
                        </table>
                        * 응시표 인증파일 첨부(jpg,gif,png 파일만 등록가능)
                    </div>
                    <div class="requestR">
                        <h3>* 개인정보 수집 및 이용에 대한 안내</h3>
                        <ul>
                            <li>
                                <strong>개인정보 수집 이용 목적</strong> <br>
                                - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대
                                - 이벤트 참여에 따른 강의 수강자 목록에 활용                                               
                            </li>
                            <li>
                                <strong>개인정보 수집 항목</strong> <br>
                                - 신청인의 이름,연락처,응시표 
                            </li>
                            <li>
                                <strong>개인정보 이용기간 및 보유기간</strong><br>
                                - 본 수집, 활용목적 달성 후 바로 파기 
                            </li>
                            <li>
                                <strong>개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익</strong><br>
                                - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                            </li>                          
                        </ul>
                        <div>
                            <input name="is_chk" id="is_chk" type="checkbox" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                        </div>
                    </div>
                </div>
                <div class="btn NGEB">
                    <a href="#none" onclick="javascript:fn_submit();">신광은 형소법 무료 최신판례특강 신청하기 ></a>
                </div>
            </div>
            
        </form>
	</div>
    <!-- End Container -->

    <script>
        //파일 확장자 체크
        function fileExtCheck(strfile) {
            if( strfile != "" ){
                var ext = strfile.split('.').pop().toLowerCase();
                if($.inArray(ext, ['jpg','gif','png']) == -1) {
                    alert('jpg,gif,png 파일만 업로드 할수 있습니다.');
                    return false;
                }
            }
        }

        function fn_submit() {
            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            if ($('#attach_file').val() == '') {
                alert('첨부파일은 필수입니다.'); return;
            }else{
                if(fileExtCheck($('#attach_file').val()) == false) {
                    return;
                }
            }
            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의 하셔야 합니다.'); return;
            }
            if ($.trim($regi_form_register.find('input[name="register_name"]').val()) == ''){
                alert('이름을 입력해 주세요'); return;
            }
            if ($.trim($regi_form_register.find('input[name="register_tel"]').val()) == ''){
                alert('연락처를 입력해 주세요'); return;
            }
            if (typeof $regi_form_register.find('input[name="register_chk[]"]:checked').val() === 'undefined') {
                alert('참여캠퍼스를 선택해 주세요.'); return;
            }

            if (!confirm('저장하시겠습니까?')) { return true; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }
    </script>
@stop