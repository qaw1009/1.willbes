@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">            
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        .sky {position:fixed; top:200px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/08/2756_top_bg.jpg) no-repeat center top; height:1021px}   
        .evtTop span {position:absolute; top:100px; left:50%; margin-left:-491px; z-index: 2;}

        .evt01 {padding:280px 0 150px}
        .evt01 .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evt01 .request h3 {font-size:17px;}
        .evt01 .request td {padding:10px}
        .evt01 .request input {height:26px;}
        .evt01 .requestL {width:48%; float:left}
        .evt01 .requestR {width:48%; float:right; }
        .evt01 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:241px; overflow-y:scroll }
        .evt01 .requestL li {display:inline-block; margin-right:10px}
        .evt01 .requestR li {margin-bottom:5px}
        .evt01 .request:after {content:""; display:block; clear:both}
        .evt01 .btn {clear:both; width:600px; margin:0 auto;}
        .evt01 .btn a {display:block; text-align:center; font-size:25px; color:#fff; background:#000; padding:20px; margin-top:30px; border-radius:50px}
        .evt01 .btn a strong {color:#ffe400}
        .evt01 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2); background:#ff5d18}

        .evt02 {background:#353535}

        .evt04 {background:#f3f3f3}


        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}


    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
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
            
            <div class="sky" id="QuickMenu">               
                <a href="#request"><img src="https://static.willbes.net/public/images/promotion/2022/08/2756_sky01.png" title="설명회"></a>
                <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/08/2756_sky02.png" title="윌비스경찰 유튜브"></a>
                <a href="#evt_02"><img src="https://static.willbes.net/public/images/promotion/2022/08/2756_sky03.png" title="이벤트"></a>
            </div>

            <div class="evtCtnsBox evtTop">
                <span data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2022/08/2756_top.png" title="커리큘럼 설명회"></span>
            </div>

            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2756_01.jpg" title="설명회">
                <div class="request" id="request">
                    <div class="requestL">
                        <h3 class="NSK-Black">* 9월 설명회 신청접수(유튜브 라이브)</h3>
                        <table width="0" cellspacing="0" cellpadding="0" class="table_type">
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
                                <th>* 직렬</th>
                                <td>
                                    <ul>
                                        <li><input type="radio" name="register_data2" id="CT1" value="일반남자" /> <label for="CT1">일반남자</label></li>
                                        <li><input type="radio" name="register_data2" id="CT2" value="일반여자" /> <label for="CT2">일반여자</label></li>
                                        &nbsp;&nbsp;&nbsp;<li><input type="radio" name="register_data2" id="CT3" value="101단" /> <label for="CT3">101단</label></li>
                                        <li><input type="radio" name="register_data2" id="CT4" value="경행경채" /> <label for="CT4">경행경채</label></li>
                                        <li><input type="radio" name="register_data2" id="CT5" value="전의경경채" /> <label for="CT5">전의경경채</label></li>
                                        <li><input type="radio" name="register_data2" id="CT6" value="법학경채" /> <label for="CT6">법학경채</label></li>
                                        <li><input type="radio" name="register_data2" id="CT7" value="기타" /> <label for="CT7">기타</label></li>
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
                                - 신청자 본인 확인 및 신청 접수 및 문의사항 응대<br>
                                - 통계분석 및 마케팅<br>
                                - 윌비스 경찰학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공
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
                <div class="btn NGEB">
                    <a href="#none" onclick="javascript:fn_submit();">유튜브 커리큘럼 설명회 <strong>시작알림</strong> 받기 ></a>
                </div>
            </div>

            <div class="evtCtnsBox evt02" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2756_02.jpg" title="명쾌한 해답 제시">
            </div>

            <div class="evtCtnsBox evt03" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2756_03.jpg" title="역대급 설명회 혜택">                
            </div>

            <div class="evtCtnsBox evt04" data-aos="fade-up" id="evt_02">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2756_04.jpg" title="이벤트 댓글">                         
            </div>    
            
            <div class="evtCtnsBox evt05" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2756_05.jpg" title="이벤트 댓글">                         
            </div>  
        </form>
	</div>
    <!-- End Container -->

    <script>
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

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>
@stop 