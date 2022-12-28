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

            .evtTop {background:#369eff}
            .evt01 {width:1120px; margin:50px auto; padding:20px; text-align:left; font-size:16px; line-height:1.4}
            .evt01 p {font-weight:bold; font-size:19px;padding:20px 0;}
            .evt01 .info {font-size:14px; margin-top:50px}
            .evt01 .info ul {border:1px solid #ccc; background:#f4f4f4; padding:20px; margin:20px 0 10px;}
            .evt01 .info li {margin-left:20px; list-style:disc; margin-bottom:5px}
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

            .evt01 .info02 {width:100%;display:flex; justify-content: space-between; width:100%; margin:0 auto;}
            .evt01 .info02 li {margin-left:20px; list-style-type: disc;font-size:15px;}
            
            .popupBtn {width:380px; margin-left:30px}
            .popupBtn a {width:100%; height:100%; display:flex; justify-content: center; align-items: center; text-align:center; background:#fcc43e; border-radius:10px; border:5px solid #fc9c3e; font-size:22px;}
            .popupBtn a:hover {background:#fc9c3e; color:#fff}

            .evt01 .btnSet {width:80%; margin:50px auto}
            .evt01 .btnSet a {display:block; padding:20px 0; text-align:center; font-size:25px; font-weight:bold; background:#427eec; color:#fff; border-radius:50px}
            .evt01 .btnSet a:hover {background:#333;}    
            
            .evtInfo {padding:80px 0; background:#f9f9f9; color:#333; font-size:16px}
            .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
            .evtInfoBox h4 {font-size:40px; margin-bottom:30px}
            .evtInfoBox .infoTit {font-size:20px; margin-bottom:20px}
            .evtInfoBox ul {margin-bottom:30px}
            .evtInfoBox ul li {list-style:decimal;  margin-left:20px; margin-bottom:10px; font-size:14px}
            .evtInfoBox span {color:#427eec}

            /*레이어팝업*/
            .Pstyle {
                opacity: 0;
                display: none;
                position: relative;
                width: auto;
            }
            .b-close {
                position: absolute;
                right: -39px;
                top: -39px;
                display: inline-block;
                cursor: pointer;
                width: 78px;
                height: 78px; 
                transform: rotate(0deg);
                transition: all 1s;
                z-index: 9999;
            }
            .b-close:hover {transform: rotate(360deg); transition: all 1s;}
            
            .Pstyle .content {height:auto; width:auto;}
            .sample {height:600px; overflow-y: scroll;}

        </style>

        <div class="evtContent NSK" id="evtContainer">
            <div class="evtCtnsBox evtTop" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2862_top.jpg" alt="임용단기 프리패스"/>
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
                        윌비스 임용입니다. <br>
                        <br>
                        임용시험의 불합격 결과에 심심한 위로의 말씀을 드립니다. <br>
                        최종 합격하는 날까지 윌비스임용은 교단에 서는 여러분의 꿈을<br>
                        끝까지 응원하겠습니다.<br>
                        <br>
                        (구)임용단기의 프리패스를 수강하신 선생님들께 수강기간 갱신 방법을 안내합니다.<br>
                        <br>
                        <p>[갱신 신청 대상자]</p>
                        평생 및 평생 0원 프리패스, 무제한 프리패스 수강신청자 <br>
                        <br>
                        <p>[갱신 신청 기간] </p>
                        * 1차: 2023년 01월 26일(목) 까지<br>
                        * 2차: 2023년 02월 23일(목) 까지
                    </div>
                    <div class="info">
                        <ul>
                            <li>
                                개인정보 및 고유식별정보 수집/이용 동의<br>
                                1) 개인정보의 수집ㆍ이용 목적 : 수강기간 연장을 위한 확인 <br>
                                2) 수집하려는 개인정보의 항목 : 학원ID, 이름, 연락처, 주민등록번호, (본인의 점수가 표시된) 시험 응시정보 또는 시험 확인서<br>
                                3) 개인정보 및 고유식별 정보 수집/이용 동의에 거부할 수 있으며, 거부하실 경우 수강갱신은 불가합니다. 
                            </li>
                            <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리 방침에 따라 보호되고 있습니다.</li>
                            <li>개인정보 수집/이용에 동의하셨으면, 아래 사항을 기재해 주시기 바랍니다.</li>
                        </ul>
                        <label><input type="checkbox" id="is_chk" name="is_chk" value="Y" title="개인정보 수집/이용 동의"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                    </div>

                    <div class="table_wrap">
                        <table>
                            <col width="10%">
                            <col width="10%">
                            <col width="35%">
                            <col width="15%">
                            <col width="*">
                            <tbody>
                                <tr>
                                <th colspan="2">* 성명</th>
                                    <td>{{sess_data('mem_name')}}</td>
                                    <th>* 윌비스 ID</th>
                                    <td>{{sess_data('mem_id')}}</td>
                                </tr>
                                <tr>
                                <th colspan="2">* 연락처</th>
                                    <td colspan="3">{{sess_data('mem_phone')}}</td>
                                    {{--
                                    <th>* 임용단기 ID</th>
                                    <td>
                                        <input type="text" id="register_data1" name="register_data1" maxlength="50"/>
                                    </td>
                                    --}}
                                </tr>
                                <tr>
                                    <th rowspan="2">
                                    불합격 인증<br />
                                        (파일제출)
                                    </th>
                                    <th>인증파일</th>
                                    <td colspan="3">
                                        <input type="file" id="attach_file_1" name="attach_file" onchange="chkUploadFile(this)" style="width:40%; margin-right:10px"/>
                                        <a onclick="javascript:del_file(1);"><img src="https://static.willbes.net/public/images/promotion/2021/01/2034_btn_del.png" style="vertical-align:middle !important" alt="삭제"></a>
                                        * 10MB 이하의 이미지 파일(png, jpg, gif, bmp)
                                    </td>
                                </tr>
                                <tr>
                                <th>신분증사본</th>
                                    <td colspan="3">
                                        <input type="file" id="attach_file_2" name="attach_file2" onchange="chkUploadFile(this)" style="width:40%; margin-right:10px"/>
                                        <a onclick="javascript:del_file(2);"><img src="https://static.willbes.net/public/images/promotion/2021/01/2034_btn_del.png" style="vertical-align:middle !important" alt="삭제"></a>
                                        * 10MB 이하의 이미지 파일(png, jpg, gif, bmp)
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <p>* 불합격 인증 파일 제출시 참고사항 </P>
                        <div class="info02">                            
                            <ul>                                
                                <li>불합격 인증 파일을 제출할 때에는 오른쪽의 『인증 예시 파일 보기』를 참고 하시고, 예시와 같이 해당 란의 모든 내용이 표시된 파일을 제출하셔야 갱신이 가능합니다. (예외규정 없음)</li>                                  
                                <li>인증 파일은 『나이스 홈페이지 화면 캡처본』과 시험에 응시한 해당 시·도 교육청에서 발급 받은『시험확인서』 두 종류의 파일만 인정됩니다.</li>
                                <li>두 종류의 인증 파일중 하나를 선택하셔서 제출해 주시면 됩니다.</li>
                            </ul>
                            <div class="popupBtn NSK-Black"><a href="javascript:go_popup1()">🔺<br>인증 예시<br>파일 보기<br></a></div>
                        </div>

                        <div class="btnSet">
                            <a href="{!! front_url('/event/registerStore') !!}" onclick="javascript:fn_submit(); return false;">평생 프리패스 수강기간 갱신 신청하기 ></a>
                        </div>
                    </div>
                </div>
            </form>

            <div id="popup1" class="Pstyle">
                <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span> 
                <div class="content"> 
                    <div class="sample">                 
                        <img src="https://static.willbes.net/public/images/promotion/2022/12/2862_popup.jpg" alt="" />
                    </div>
                </div> 
            </div>  

            <div class="evtCtnsBox evtInfo" data-aos="fade-up">
                <div class="evtInfoBox">
                    <h4 class="NSK-Black">[갱신 신청 관련 유의 사항]</h4>             
                    <ul>
                        <li>수강기간 갱신(연장) 신청은 매년 갱신 신청 페이지를 통해 신청하셔야 합니다. (이후에도 동일하게 진행예정)</li>
                        <li>갱신자격이 확인된 선생님들은 2024학년도 1차 시험일(2023년 11월말)까지 연장됩니다.</li>
                        <li>수강기간 연장은 갱신 신청 마감 기간 이후, 7일 이내 일괄적으로 자동 적용 됩니다. (프리패스 기준 제공 )</li>
                        <li>갱신으로 연장된 수강기간은 무료 제공(서비스)되는 혜택으로, 환불이 적용되지 않습니다.</li>
                        <li>기간 내 신청하지 않으신 분은 갱신(연장)이 불가합니다.(예외 없음)</li>
                        <li>
                            불합격인증 파일은 예시와 같은 방법으로 작성하여 제출된 파일만 가능합니다.<br>
                            - 두 종류(나이스 홈페이지 캡쳐본 또는 시험확인서)의 파일 중 한가지를 선택하여 제출<br>
                            - 시험 응시 불가능한 재학생(교육대학원)의 경우, 학년이 표시되고 1개월 이내 발급된 재학 증명서(스캔) 파일 제출<br>
                            - 해당 시험(전공) 최종 선발 인원이 0명인 경우는 불합격 인증 파일 없이 가능
                        </li>
                        <li>
                            신분증 사본은 주민등록증, 여권, 운전면허증 사본 파일만 가능합니다.<br>
                            - 신분증 제출시 이름과 생년월일이 확인 가능해야 함 (단, 신분증 전체가 확인 되어야 하며, 주민등록번호 뒷자리 등은 부분 미공개 처리 가능)<br>
                            - 신분증 등 개인 정보 관련 내용은 신원 확인 용도로만 사용되며, 확인 이후 폐기 됩니다.
                        </li>
                        <li>필수 제출 서류 두 가지(불합격 인증파일, 신분증 사본)가 모두 제출되어야 합니다. 제출서류 누락 시 갱신이 불가합니다.</li>
                        <li>갱신 상품 수강 회원 정보와 제출하시는 확인 서류의 명의가 100% 동일해야 갱신이 이뤄집니다.</li>
                    </ul>
                </div>
            </div> 

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
        <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>

        <script>
            $(document).ready( function() {
                AOS.init();
            });
            //팝업
            function go_popup1(){$('#popup1').bPopup();}
        </script>
    @stop