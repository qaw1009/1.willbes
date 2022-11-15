@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed;top:250px;right:10px; width:120px; z-index:100;}
        .sky a {display:block; margin-bottom:10px; background:#fff; border:3px solid #071b44; color:#071b44; padding:15px; text-align:center; font-size:16px}
        .sky a:hover {color:#fff; background:#071b44}

        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2022/11/2820_top_bg.jpg) no-repeat center top; height: 1018px;}
        .eventTop span {position: absolute; top:390px; left:50%; margin-left:-420px}

        .evt02 {width:1120px; margin:0 auto 150px;}
        
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2022/11/2820_03_bg.jpg) no-repeat center top; height: 688px;}

        .evt_table {width:980px; margin:0 auto; border:1px solid #000; padding:50px}
        .evt_table table{width:100%;border-top:1px solid #e9e9e9;}
        .evt_table table tr {border-bottom:1px solid #e9e9e9}
        .evt_table table th,
        .evt_table table td {margin:10px 0; font-size:16px; color:#666}
        .evt_table table th {background:#f9f9f9; color:#000;}
        .evt_table thead th {background:#d9d9d9; color:#000; font-size:24px; font-weight:bold; padding:20px; border:1px solid #000}
        .evt_table table td{text-align:left; padding:15px 10px}
        .evt_table label {margin-right:10px; line-height:28px;}
        .evt_table input {vertical-align:middle}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; background:#f5f5f5; vertical-align:middle; width:90%; margin-bottom:5px}
        .evt_table td input[type=text]:last-child {margin-bottom:0}
        .evt_table input[type=radio],
        .evt_table input[type=checkbox] {height:20px; width:20px; margin-right:5px}
        .evt_table td ul {display:flex; flex-wrap: wrap;}
        .evt_table td li {width:33.333%; margin-bottom:10px; letter-spacing:-1px}
        .evt_table tr:nth-child(4) li {width:25%;}

       
        .check {margin:10px auto 30px; text-align:left}
        .check p {margin-bottom:50px;padding-top:75px;}
        .check label {cursor:pointer; font-weight:bold;font-size:15px;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}

        .evt_table .btns {margin-top:40px}
        .evt_table .btns a {display:inline-block; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#42425b; margin:0 10px; border-radius:40px; padding:0 50px}
        .evt_table .btns a:hover {background:#5d46c0}

        .evt_table .txtinfo {text-align:left;}
        .evt_table .txtinfo div {font-size:18px; font-weight:bold; margin-bottom:20px}
        .evt_table .txtinfo ul {padding:20px; border:1px solid #ccc; height: 150px; overflow-y: auto;}
        .evt_table .txtinfo li {list-style: dimical; margin-left:15px; margin-bottom:10px}
        .evt_table .txtinfo li a {display:inline-block; font-size:12px; color:#ffff00; border:1px solid #ffff00; border-radius:20px; padding:2px 10px}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#runningMate">
                임고생<br>
                Running<br>
                Mate<br>
                지원하기 👇
            </a>  
        </div>  

        <div class="evtCtnsBox eventTop">
        	<span data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2022/11/2820_top.png" alt="웜업 클래스"/></span>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/11/2820_01.jpg" alt="웜업 클래스란?"/>
        </div>

        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_chk[]"  id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" name="register_chk_el_idx" value="{{ $data['ElIdx'] }}"/> {{-- 하나수강만 선택 가능할시 --}}
            <input type="hidden" id="register_name" name="register_name" value="{{$arr_base['member_info']['MemName']}}">
            <input type="hidden" id="userId" name="userId" value="{{sess_data('mem_id')}}">
            <input type="hidden" id="register_tel" name="register_tel" value="{{$arr_base['member_info']['Phone']}}">
            <input type="hidden" id="register_email" name="register_email" value="{{$arr_base['member_info']['Mail']}}">

            <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data2"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data3"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data4"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="출신학교/학부/학년"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="과목"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="SNS채널"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="SNS계정URL"/> {{-- 체크 항목 전송 --}}

            <div class="evtCtnsBox evt02" id="runningMate" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2820_02.jpg" alt="웜업 클래스 수강신청"/>
                <div class="evt_table p_re">

                    <div class="txtinfo">
                        <div>개인정보 제공 동의 문구</div>
                        <ul>
                            <li>개인정보 수집 이용 목적<br>
                                - 윌비스임용의 러닝메이트 활동자 선정을 위한 기초 자료<br>
                                - 러닝메이트 활동기간 동안 의사소통을 위한 자료<br>
                                - 윌비스 임용의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공</li>
                            <li>개인정보 수집 항목<br>
                                - 필수항목: 성명, 연락처, 출신학교, 출신학과, 이메일, SNS계정 등 </li>
                            <li>개인정보 이용기간 및 보유기간<br>
                                - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기</li>
                            <li>신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                                - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다. </li>
                            <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리 방침에 따라 보호되고 있습니다. </li>
                            <li>이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다. </li>
                        </ul>
                    </div>
                    <div class="check" id="chkInfo">
                        <label>
                            <input name="is_chk" id="is_chk" type="checkbox" value="Y" />
                            윌비스에 개인정보 제공 동의하기 (필수)
                        </label>
                    </div>

                    <table cellspacing="2" cellpadding="2">
                        <col width="14%" />
                        <col/>
                        <col width="10%" />
                        <col />
                        <tbody>
                            <tr>
                                <th>ID / 이름</th>
                                <td>
                                    @if(sess_data('is_login') === true)
                                        {{sess_data('mem_id')}} / {{$arr_base['member_info']['MemName']}}
                                    @endif
                                </td>
                                <th>연락처</th>
                                <td>
                                    {{$arr_base['member_info']['Phone']}}
                                </td>
                            </tr>
                            <tr>
                                <th>출신학교/<br />
                                학부/학년</th>
                                <td><input type="text" name="register_data1" maxlength="100"></td>
                                <th>이메일</th>
                                <td>
                                    @if(sess_data('is_login') === true)
                                        @if (empty($arr_base['member_info']['Mail']) === true)
                                            <a href="{{app_url('/member/change/index/info','www')}}" target="_blank">개인정보수정</a>
                                        @else
                                            {{$arr_base['member_info']['Mail']}}
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th><p>희망하는<br />홍보 활동 과목<br />(교수진)<br />선택</p></th>
                                <td colspan="3">
                                    <ul>
                                        <li><label><input type="radio" name="register_data2" value="교육학 이경범 교수"/>교육학 이경범 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="교육학 정현 교수"/>교육학 정현 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="전공국어 송원영 교수"/>전공국어 송원영 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="전공국어 권보민 교수"/>전공국어 권보민 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="전공국어 구동언 교수"/>전공국어 구동언 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="전공영어 김유석 교수"/>전공영어 김유석 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="전공영어 김영문</"/>전공영어 김영문</label></li>
                                        <li><label><input type="radio" name="register_data2" value="전공수학 김철홍 교수"/>전공수학 김철홍 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="전공수학 김현웅 교수"/>전공수학 김현웅 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="수학교육론 박태영 교수"/>수학교육론 박태영 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="수학교육론 박혜향 교수"/>수학교육론 박혜향 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="전공생물 강치욱 교수"/>전공생물 강치욱 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="생물교육론 양혜정 교수"/>생물교육론 양혜정 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="전공화학 강철 교수"/>전공화학 강철 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="도덕윤리 김병찬 교수"/>도덕윤리 김병찬 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="일반사회 허역 교수팀"/>일반사회 허역 교수팀</label></li>
                                        <li><label><input type="radio" name="register_data2" value="전공역사 김종권 교수"/>전공역사 김종권 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="전공음악 다이애나 교수"/>전공음악 다이애나 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="전기전자통신 최우영 교수"/>전기전자통신 최우영 교수</label></li>
                                        <li><label><input type="radio" name="register_data2" value="전공중국어 장영희 교수"/>전공중국어 장영희 교수</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>지원자<br />
                                  소유의<br />
                                  SNS 채널</th>
                                <td colspan="3">
                                    <ul>
                                        <li><label><input type="radio" name="register_data3" value="블로그"/>블로그</label></li>
                                        <li><label><input type="radio" name="register_data3" value="인스타그램"/>인스타그램</label></li>
                                        <li><label><input type="radio" name="register_data3" value="페이스북"/>페이스북</label></li>
                                        <li><label><input type="radio" name="register_data3" value="기타"/>기타</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>SNS 계정<br>
                                URL</th>
                                <td colspan="3">
                                    <input type="text" name="register_data4" maxlength="100">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="btns">
                        <a href="javascript:void(0);" onclick="javascript:fn_submit(); return false;">러닝 메이트 지원 하기 ></a>
                    </div>
                </div>
            </div>
        </form>
        <div class="evtCtnsBox evt03" data-aos="fade-up"> </div>
    </div>
    <!-- End Container -->


    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });

        function fn_submit() {
            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            if ($regi_form_register.find('input[name="register_email"]').val() == '') {
                alert('등록된 이메일이 없습니다.\n개인정보수정 페이지에서 이메일 저장 후 신청해 주세요.');
                return;
            }

            if ($regi_form_register.find('input[name="register_data1"]').val() == '') {
                alert('출식학교/학부/학년을 입력해 주세요.');
                return;
            }

            if ($regi_form_register.find('input[name="register_data2"]').is(':checked') === false) {
                alert('희망하는 홍보 활동 과목을 선택해 주세요.');
                return;
            }

            if ($regi_form_register.find('input[name="register_data3"]').is(':checked') === false) {
                alert('지원자 소유의 SNS 채널을 선택해 주세요.');
                return;
            }

            if ($regi_form_register.find('input[name="register_data4"]').val() == '') {
                alert('SNS계정 URL을 입력해 주세요.');
                return;
            }

            if (!confirm('신청하시겠습니까?')) { return; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }
    </script>


@stop