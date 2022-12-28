    @extends('willbes.pc.layouts.master')

    @section('content')
        @include('willbes.pc.layouts.partial.site_menu')
        <!-- Container -->
        <style type="text/css">
            .evtContent {
                width:100% !important;
                min-width:1120px !important;
                margin-top:20px !important;
                padding:0 !important;
                background:#fff;
                font-size:14px;
                line-height:1.4;          
            }
            .evtContent span {vertical-align:top}
            .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
            .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
            /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

            /************************************************************/

            .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/12/2863_top_bg.jpg) repeat-x;}
            .evt01 {width:1120px; margin:50px auto; padding:20px; text-align:left; font-size:16px; line-height:1.4}
            .evt01 p {font-weight:bold; font-size:18px}
            .evt01 .info {font-size:14px; margin-top:50px}
            .evt01 .info ul {border:1px solid #ccc; background:#f4f4f4; padding:20px; margin:20px 0 10px;}
            .evt01 .info li {margin-left:20px; list-style:dimecal; margin-bottom:5px}
            .evt01 .info ul:after {content:""; display:block; clear:both}
            .evt01 input,
            .evt01 label {vertical-align:middle}
            .evt01 label {margin-left:5px; font-size:14px}
            .evt01 input[type=checkbox] {width:20px; height:20px}
            .evt01 .table_wrap {margin-top:50px}
            .evt01 .table_wrap table {width:100%; border-top:1px solid #d0d2d9; background:#fff; margin-top:10px !important}
            .evt01 .table_wrap td,
            .evt01 .table_wrap th{padding:10px; border:1px solid #d0d2d9; border-left:0; border-top:0; font-size:15px; text-align:center}
            .evt01 .table_wrap th{color:#767987; font-weight:500; background:#dfe1e7}
            .evt01 .table_wrap td{color:#444;padding:10px; line-height:1.5; text-align:left}
            .evt01 .table_wrap tr th{border-top:1px solid #d0d2d9}

            .evt01 .info02 {width:100%; margin:50px auto 0}
            .evt01 .info02 li {margin-left:20px; list-style-type: disc;}

            .evt01 .btnSet {width:80%; margin:50px auto}
            .evt01 .btnSet a {display:block; padding:20px 0; text-align:center; font-size:25px; font-weight:bold; background:#427eec; color:#fff; border-radius:50px}
            .evt01 .btnSet a:hover {background:#333;}    
            



        </style>

        <div class="evtContent NSK" id="evtContainer">
            <div class="evtCtnsBox evtTop" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2863_top.png" alt="연간패키지 신청자의 경품 제공 동의서"/>
            </div>

            <form name="regi_form_register" id="regi_form_register">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <input type="hidden" name="file_chk" value="Y"/>
                <input type="hidden" name="file_chk2" value="Y"/>
                <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
                <input type="hidden" name="target_param_names[]" value="임용단기 아이디"/> {{-- 체크 항목 전송 --}}
                <input type="hidden" id="register_name" name="register_name" value="{{ sess_data('mem_name') }}"/>
                <input type="hidden" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}">
                <input type="hidden" name="register_chk[]"  id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>

                <div class="evtCtnsBox evt01" data-aos="fade-up">
                    <div>
                        안녕하세요. <br>
                        윌비스 임용입니다.<br>
                        <br>
                        윌비스 임용에서는 지난 2022년 12월 17일(금) 합격전략 설명회를 개최하였고,<br>
                        설명회 당일 학원에서 연간패키지를 수강하면 문화상품권(2만원)을 지급해 드리기로 하였습니다.<br>
                        (또, 설명회 전에 미리 연간패키지를 신청하시고 당일 설명회에 참석하셔도 같은 문화상품권을 지급해 드리기로 하였습니다.)<br>
                        <br>
                        저희가 지급하기로 한 문화상품권은 모바일 상품권으로 수신자의 동의가 있어야 발송이 가능합니다. <br>
                        <br>
                        문화상품권은 수신 동의를 하신 분부터 순차적으로 지급됩니다. <br>
                        <br>
                        <p>[문화상품권 신청 대상자] </p>
                        * 지난 2022년 12월 17일(토) 설명회에 참석하시고, 연간패키지를 12월17일 23:59까지 신청해 주신 선생님.  <br>
                        * 설명회 전 연간패키지를 신청하시고, 설명회에 참석하신 선생님. <br>
                        ※ 설명회 참석자 기준은 경품 응모권을 작성해 주신 분입니다. (작성하지 않으신 분은 인정되지 않습니다.) <br>
                        <br>
                        <p>[신청 기간] </p>
                        * 2023년 12월 31일(토) 까지 <br> 
                        <br> 
                        <p>* 문의사항: 윌비스 임용 1544-3169 </p>
                    </div>
                    <div class="info">
                        <ul>
                            <li>개인정보 및 고유식별정보 수집/이용 동의<br>
                            1) 개인정보의 수집ㆍ이용 목적: 경품(문화상품권) 지급을 위한 수신동의 절차<br>
                            2) 수집하려는 개인정보의 항목 : 학원ID, 이름, 연락처, 수강과목 등<br>
                            3) 개인정보 및 고유식별 정보 수집/이용 동의에 거부하실 수 있으며, 거부하실 경우 문화상품권 발송은 불가합니다. </li>
                            <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리 방침에 따라 보호되고 있습니다. </li>
                            <li>개인정보 수집/이용에 동의하셨으면, 아래 사항을 기재해 주시기 바랍니다. </li>
                        </ul>
                        <label><input type="checkbox" id="is_chk" name="is_chk" value="Y" title="동의"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                    </div>

                    <div class="table_wrap">
                        <table>
                            <col width="15%">
                            <col >
                            <col width="15%">
                            <col >
                            <tbody>
                                <tr>
                                    <th>* 성명</th>
                                    <td>{{sess_data('mem_name')}}</td>
                                    <th>* 윌비스 ID</th>
                                    <td>{{sess_data('mem_id')}}</td>
                                </tr>
                                <tr>
                                <th>* 연락처</th>
                                    <td colspan="3">{{sess_data('mem_phone')}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="info02">
                            <ul>
                                <li>본 이벤트에서 제공되는 경품은 모바일 문화상품권(2만원권) 입니다.</li>
                                <li>홈페이지에 로그인 하시면 상기 성명, ID, 전화번호가 자동 입력되며, 상품이 발송될 전화번호를 꼭 확인해 주시기 바랍니다.<br>(* 연락처 수정은 홈페이지 상단의 “내강의실 > 회원정보 > 개인정보관리“에서 변경할 수 있습니다. </li>
                                <li>회원가입 정보에 표기되어 있는 전화번호로 모바일 문화상품권이 발송됩니다. (* 오기로 인한 불이익은 당사에서 책임지지 않습니다.)</li>
                                <li>본 상품권의 수령 후, 수강 환불시에는 상품권 대금 2만원이 추가로 공제됩니다.</li>
                            </ul>
                        </div>

                        <div class="btnSet">
                            <a href="{!! front_url('/event/registerStore') !!}" onclick="javascript:fn_submit(); return false;">상기 내용에 동의하며, 문화상품권 발송 신청합니다 ></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Container -->

        <script type="text/javascript">
            var $regi_form_register = $('#regi_form_register');

            function fn_submit() {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                var _url = '{!! front_url('/event/registerStore') !!}';
                ajaxSubmit($regi_form_register, _url, function (ret) {
                    if (ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.reload();
                    }
                }, showValidateError, addValidate, false, 'alert');
            }

            function addValidate() {
                if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                    alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                    return false;
                }

                if ($regi_form_register.find('input[name="register_data1"]').val() == '') {
                    alert('임용단기ID를 입력해주세요.');
                    return false;
                }

                if (!$regi_form_register.find('input[name="attach_file"]').val()) {
                    alert('인증파일을 등록해 주세요.');
                    return;
                }

                if (!$regi_form_register.find('input[name="attach_file2"]').val()) {
                    alert('신분증사본 파일을 등록해 주세요.');
                    return;
                }

                if (confirm('저장하시겠습니까?')) {
                    return true;
                }

                return false;
            }

            function chkUploadFile(elem) {
                if ($(elem).val()) {
                    var filename = $(elem).prop("files")[0].name;
                    var ext = filename.split('.').pop().toLowerCase();

                    if ($.inArray(ext, ['gif', 'jpg', 'jpeg', 'png', 'bmp']) === -1) {
                        $(elem).val("");
                        alert('이미지 파일만 업로드 가능합니다.');
                    }
                }
            }

            function del_file(id){
                $("#attach_file_"+id).val("");
            }
        </script>
        <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">    
        <script src="/public/js/willbes/dist/aos.js"></script>
        <script>
            $(document).ready( function() {
                AOS.init();
            });
        </script>
    @stop