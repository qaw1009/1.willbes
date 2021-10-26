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
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}        
        br {font-family:dotum;} 

        /************************************************************/      

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/10/2399_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#161d25;}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/10/2399_02_bg.jpg) no-repeat center top;}

        .evt03 {background:#ff9182;}

        .evt04 {padding-bottom:50px;}        
        .evt04 .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left; font-size:14px}
        .evt04 .request h3 {font-size:17px;}
        .evt04 .request td {padding:10px}
        .evt04 .request input {height:26px;}
        .evt04 .requestL {width:48%; float:left}
        .evt04 .requestR {width:48%; float:right; }
        .evt04 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:241px; overflow-y:scroll }
        .evt04 .requestL li {display:inline-block; margin-right:10px}
        .evt04 .requestR li {margin-bottom:5px}
        .evt04 .request:after {content:""; display:block; clear:both}
        .evt04 .btn {clear:both; width:500px; margin:0 auto;}
        .evt04 .btn a {display:block; text-align:center; font-size:25px; color:#fff; background:#000; padding:20px 0; margin-top:30px; border-radius:50px}
        .evt04 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}

        .evtInfo {padding:80px 0; background:#e9e9e9; color:#555; font-size:14px}
		.evtInfoBox { width:1120px; margin:0 auto; text-align:left; line-height:1.5}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:20px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type:none; margin-left:20px; margin-bottom:5px}
        .free{color:#e44900;font-size:17px;font-weight:bold;}

        .loadmap {position: relative; padding-bottom:56.25%; height: 0; overflow: hidden; max-width:100%; height:auto; }
        .loadmap iframe {position:absolute; top: 0; left: 0; width:100%; height:100%;}

        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
               
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
{{--            <input type="hidden" name="register_chk[]"  id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>--}}
            {{--@foreach($arr_base['register_list'] as $key => $val)
                <input type="hidden" name="register_chk[]" value="{{$val['ErIdx']}}"/>
            @endforeach--}}
{{--            <input type="hidden" name="target_params[]" value="register_data1"/> --}}{{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data2"/> {{-- 체크 항목 전송 --}}
{{--            <input type="hidden" name="target_param_names[]" value="참여캠퍼스"/> --}}{{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="직렬"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="register_type" value="promotion"/>
            <!--<input type="hidden" name="register_chk_col[]" value="EtcValue"/>
            <input type="hidden" name="register_chk_val[]" value=""/>-->              

            <div class="evtCtnsBox evtTop" data-aos="fade-down">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2399_top.gif" title="석치수 무료특강">
            </div>

            <div class="evtCtnsBox evt01" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2399_01.jpg" title="확실한 처방">
            </div>

            <div class="evtCtnsBox evt02" data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2399_02.jpg" title="올바른 방향설정">
            </div>

            <div class="evtCtnsBox evt03" data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2399_03.jpg" title="혜택">
            </div>

            <div class="evtCtnsBox evt04" data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2399_04.jpg" title="무료특강">
                <div class="request" id="request">
                    <div class="requestL">
                        <h3 class="NSK-Black">* 무료특강 신청접수</h3>
                        <table class="table_type">
                            <col width="25%" />
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
                                    <input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" maxlength="11">
                                </td>
                            </tr>
                            <tr>
                                <th>* 참여일</th>
                                <td>
                                    <ul>
                                        @foreach($arr_base['register_list'] as $key => $val)
                                            @if(empty($val['RegisterExpireStatus']) === false && $val['RegisterExpireStatus'] == 'Y')
                                                @php
                                                    // 강의 기간 지나면 자동 disabled 처리
                                                    // 신청강의 날짜 형식. ex) 12.14 프리미엄올공반2차 설명회
                                                    //                         2.8(토) 초시생을 위한 합격커리큘럼 설명회
                                                    $reg_year = date('Y');
                                                    $temp_date = explode(' ', $val['Name'])[0];
                                                    if(strpos($temp_date, '(') !== false) {
                                                        $temp_date = substr($temp_date, 0, strpos($temp_date, '('));
                                                    }
                                                    $reg_month_day = explode('.', $temp_date);
                                                    $reg_month = mb_strlen($reg_month_day[0], 'utf-8') == 1 ? '0'.$reg_month_day[0] : $reg_month_day[0] ;
                                                    $reg_day = mb_strlen($reg_month_day[1], 'utf-8') == 1 ? '0'.$reg_month_day[1] : $reg_month_day[1] ;
                                                    $reg_date = $reg_year.$reg_month.$reg_day.'0000';
                                                    //echo date('YmdHi', strtotime($reg_date. '+1 days'));
                                                @endphp
                                                @if(time() >= strtotime($reg_date. '+1 days'))
                                                    <li><input type="checkbox" name="register_disable[]" id="campus{{$key}}" value="{{$val['ErIdx']}}" disabled="disabled"/> <label for="campus{{$key}}">{{$val['Name']}}</label></li>
                                                @else
                                                    <li><input type="checkbox" name="register_chk[]" id="campus{{$key}}" value="{{$val['ErIdx']}}" /> <label for="campus{{$key}}">{{$val['Name']}}</label></li>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>* 무료특강<br>확인경로</th>
                                <td>
                                    <ul>
                                        <li><input type="radio" name="register_data2" id="CT1" value="홈페이지" /> <label for="CT1">홈페이지</label></li>
                                        <li><input type="radio" name="register_data2" id="CT2" value="지인추천" /> <label for="CT2">지인추천</label></li>                                     
                                        <li><input type="radio" name="register_data2" id="CT3" value="인터넷광고" /> <label for="CT3">인터넷광고</label></li>
                                        <li><input type="radio" name="register_data2" id="CT4" value="인터넷검색" /> <label for="CT4">인터넷검색 </label></li>
                                        <li><input type="radio" name="register_data2" id="CT5" value="공무원카페" /> <label for="CT5">공무원카페</label></li>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="requestR">
                        <h3 class="NSK-Black">* 개인정보 수집 및 이용에 대한 안내</h3>
                        <ul>
                            <li>
                                <strong>1. 개인정보 수집 이용 목적</strong> <br>
                                - 신청자 본인 확인 및 신청 접수 및 문의사항 응대
                                - 통계분석 및 마케팅
                                - 윌비스 신광은경찰학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공
                            </li>
                            <li><strong>2. 개인정보 수집 항목</strong> <br>
                            - 필수항목 : 성명, 연락처, 직렬항목
                            </li>
                            <li><strong>3. 개인정보 이용기간 및 보유기간</strong><br>
                            - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기
                            </li>
                            <li><strong>4. 신청자의 개인정보 수집 및 활용 동의 거부 시</strong><br>
                            - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.
                            </li>
                            <li>5. 입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.
                            </li>
                            <li>6. 신이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.
                            </li>
                        </ul>
                        <div>
                            <input name="is_chk" id="is_chk" type="checkbox" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                        </div>
                    </div>
                </div>
                <div class="btn NSK-Black">
                    <a href="#none" onclick="javascript:fn_submit();">석치수 자료해석 무료특강 신청하기 > </a>
                </div>
            </div>

            <div class="evtCtnsBox evt05" data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2399_05.jpg" title="13년간의 강의">
            </div>           

            <div class="evtCtnsBox evtInfo" data-aos="fade-left">
                <div class="evtInfoBox">
                    <h4 class="NSK-Black">특강 정보</h4>
                    <div class="infoTit"><strong>● 특강 취지</strong></div>
                    <ul>
                        <li>자료해석 풀이 방식에 대한 문제점을 발견하여 해결하고, 자신의 약점에 대한 구체적인 처방을 통해 2022년 7급 공채 <strong>必! 합격을 실현</strong></li>                    
                    </ul>  
                    <div class="infoTit"><strong>● 문제 구성 방식</strong></div>
                    <ul>
                        <li>PSAT 자료해석 빈출 유형으로 구성함을 원칙으로 <strong>본인의 확실한 실력을 확인할 수 있도록 상, 중, 하의 난이도 문제를 모두 포함하여 출제</strong></li>                                    
                    </ul>
                    <div class="infoTit"><strong>● 수강대상</strong></div>
                    <ul>   
                      
                        <li>1. 지금까지 응시한 진단평가에서 <strong>자신의 위치나 약점을 정확하게 확인할 수 없었던 수험생</strong></li>
                        <li>2. 자료해석 공부 방법에 대해 <strong>확실한 가이드라인이 필요한 수험생</strong></li>
                        <li>3. 아무리 공부를 해도 자료해석 <strong>실력이 늘지 않아 불안한 수험생</strong></li>
                        <li>4. 2022년 7급 공채 자료해석 <strong>고득점을 원하는 수험생</strong></li>                       
                    </ul>                     
                    <div class="infoTit"><strong>● 수강특전</strong></div>
                    <ul>   
                        <li class="free">※ 참여자 전원 무료제공!</li><br>
                        <li>1. 2022년 대비 석치수의 합격하는 <strong>7급 자료해석 기본서(2022년)</strong> 무료제공</li>
                        <li>2. <strong>스타벅스 아메리카노 기프티콘</strong> 증정</li>
                        <li>3. <strong>자료해석 동영상강의 15% 할인쿠폰</strong> 증정</li>
                        <li>4. <strong>2021년 7급 공채 자료해석 해설</strong> 무료제공</li>
                        <li>5. <strong>2021년 5급 공채 자료해석 해설</strong> 무료제공</li>
                        <li>6. <strong>2021년 민간경력 자료해석 해설</strong> 무료제공</li>
                        <li>7. <strong>긴급처방 25문제 실전모의고사 단권화자료</strong>(복습용) 무료제공</li>
                        <li>8. <strong>긴급처방 25문제 실전모의고사 해설 + 유사기출 문제</strong> 모음</li>
                        <li>9. 석치수의 합격하는 <strong>주요 개념 확인 노트</strong> 무료제공</li>
                        <li>10. 석치수의 <strong>합격하는 처방전</strong> 무료제공</li><br>
                        <li>* 무료 제공 교재는 강사가 직접 구입하여 무료제공됩니다.</li>          
                    </ul>                      
                </div>
		    </div>      
                        
            <div class="evtCtnsBox" data-aos="fade-right">
                <div class="loadmap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.7927493090915!2d126.94179831559448!3d37.51280597980801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c9fe8a0a1e2a5%3A0x3bc432e93a6e20c1!2zKOyjvCnsnIzruYTsiqQ!5e0!3m2!1sko!2skr!4v1603420278998!5m2!1sko!2skr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>

            <div class="evtCtnsBox evt05" data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2399_06.jpg" title="교통편">           
            </div>

        </form>
	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );

        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }
            if ($.trim($regi_form_register.find('input[name="register_name"]').val()) == '') {
                alert('이름을 입력하셔야 합니다.');
                $("#register_name").focus();
                return;
            }
            if ($.trim($regi_form_register.find('input[name="register_tel"]').val()) == '') {
                alert('연락처를 입력하셔야 합니다.');
                $("#register_tel").focus();
                return;
            }
            if ($regi_form_register.find('input[name="register_chk[]"]:checked').length == 0) {
                alert('참여일을 선택하셔야 합니다.');
                return;
            }
            if ($regi_form_register.find('input[name="register_data2"]').is(':checked') === false) {
                alert('직렬을 선택하셔야 합니다.');
                return;
            }

            if (!confirm('저장하시겠습니까?')) { return true; }

            //전부 disabled 처리
            $regi_form_register.find('input[name="register_chk[]"]').attr('disabled', true);

            //체크 disable 해제
            $regi_form_register.find('input[name="register_chk[]"]:checked').each(function(i){
                $(this).attr('disabled', false);
            });

            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
            $regi_form_register.find('input[name="register_chk[]"]').attr('disabled', false); //disable 해제
        }
    </script>
@stop 