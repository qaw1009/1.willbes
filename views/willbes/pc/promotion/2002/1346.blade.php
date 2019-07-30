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
        .evt01 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:190px; overflow-y:scroll }
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

        /* input file type 
            .input-file {
            display: inline-block;
            }

            .input-file [type="file"] {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0 none;
            }
            .input-file .file-label {
            display: inline-block;
            min-width: 53px;
            height: 27px;
            line-height: 24px;
            padding: 0 10px;
            border-radius: 2px;
            font-size: 13px;
            background-color: #333;
            color: #fff;
            text-align: center;
            }
            .input-file .file-name {
            width: 80px;
            background: #f5f5f5;
            height: 27px;
            line-height: 26px;
            text-indent: 5px;
            border: 1px solid #bbb;
            }*/

            /* 접근성 탭 포커스 스타일
            .file-focus {
            outline: 1px dotted #d2310e;
            } */
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_chk[]"  id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>
            <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data2"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data3"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="참여일"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="직렬"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="캠퍼스"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="register_type" value="promotion"/>


           
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
                                        <li><input type="radio" name="register_data3" id="CP1" value="노량진" /> <label for="CP1">노량진</label></li>
                                        <li><input type="radio" name="register_data3" id="CP2" value="신림" /> <label for="CP2">신림</label></li>
                                        <li><input type="radio" name="register_data3" id="CP3" value="인천" /> <label for="CP3">인천</label></li>
                                        <li><input type="radio" name="register_data3" id="CP4" value="대구" /> <label for="CP4">대구</label></li>
                                        <li><input type="radio" name="register_data3" id="CP5" value="부산" /> <label for="CP5">부산</label></li>
                                        <li><input type="radio" name="register_data3" id="CP6" value="광주" /> <label for="CP6">광주</label></li>   
                                        <li><input type="radio" name="register_data3" id="CP7" value="전북" /> <label for="CP7">전북</label></li>                              
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="file" name="ATTACH_FILE" id="ATTACH_FILE">
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
        function fn_submit() {
            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
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