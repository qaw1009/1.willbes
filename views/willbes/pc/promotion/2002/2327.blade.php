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
        .evt_wrap {width:1120px; margin:0 auto; position: relative;}
        .evt_wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.25);}

        /************************************************************/
        .sky {position:fixed;  top:150px; right:25px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        .evt00 {background:#0A0A0A}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2327_top_bg.jpg) no-repeat center top;}   

        .evt01 {padding-bottom:100px}
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
        .evt01 .btn {clear:both; width:550px; margin:0 auto;}
        .evt01 .btn a {display:block; text-align:center; font-size:25px; color:#fff; background:#000; padding:20px 0; margin-top:30px; border-radius:50px}
        .evt01 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}

        .evt02 {background:#F5F5F5}

        .evt04_reply {background:#FAFAFA;}

        .evt05 {background:#484848;margin-top:100px;}

        .loadmap {position: relative; padding-bottom:56.25%; height: 0; overflow: hidden; max-width:100%; height:auto; }
        .loadmap iframe {position:absolute; top: 0; left: 0; width:100%; height:100%;}

        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}

        .evtInfo {padding:80px 0; background:#e9e9e9; color:#555; font-size:16px}
		.evtInfoBox { width:1120px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:40px}
        .evtInfoBox h5 {font-size:20px;font-weight:bold;}
		.evtInfoBox .infoTit {font-size:25px;}
		.evtInfoBox ul {margin-bottom:30px}
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
            
            <div class="sky">               
                <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/08/2327_sky01.png" title="신광은 경찰팀 tv"></a>
                <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2021/08/2327_sky02.png" title="참석 go"></a>
                <a href="#evt_02"><img src="https://static.willbes.net/public/images/promotion/2021/08/2327_sky03.png" title="소문 go"></a>
                <a href="#evt_03"><img src="https://static.willbes.net/public/images/promotion/2021/08/2327_sky04.png" title="스벅받자"></a>
            </div>

            <div class="evtCtnsBox evt00">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/police.jpg" title="경찰학원 1위">
            </div>

            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2327_top.jpg" title="베테랑">
            </div>

            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2327_01.jpg" title="설명회">
                <div class="request" id="request">
                    <div class="requestL">
                        <h3 class="NSK-Black">* 8월 설명회  신청접수</h3>
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
                                                    $reg_year = '2021';
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
                <div class="btn NGEB">
                    <a href="#none" onclick="javascript:fn_submit();">2022년 과목개편 LIVE 합격설명회 신청하기 >></a>
                </div>
            </div>

            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2327_02.jpg" title="명쾌한 해답 제시">
            </div>

            <div class="evtCtnsBox evt03" id="evt_01">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2327_03.jpg" title="참석하고 강의 듣자">                
            </div>

            <div class="evtCtnsBox evt04_reply" id="evt_02">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2327_04_reply.jpg" title="무엇이든 물어보세요">
            </div>

            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif 

            <div class="evtCtnsBox evt04" id="evt_03">
                <div class="evt_wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2327_04.jpg" title="소문내고 강의 듣자">     
                    <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="설명회 이미지 다운받기" style="position: absolute;left: 25.77%;top: 85.78%;width: 48.27%;height: 3.8%;z-index: 2;"></a>
                </div>                        
            </div>          

            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial')
            @endif           

            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2327_05.jpg" title="누구보다 더 빨리 더 먼저">                         
            </div>   
            
            <div class="loadmap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.7927493090915!2d126.94179831559448!3d37.51280597980801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c9fe8a0a1e2a5%3A0x3bc432e93a6e20c1!2zKOyjvCnsnIzruYTsiqQ!5e0!3m2!1sko!2skr!4v1603420278998!5m2!1sko!2skr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

            <div class="evtCtnsBox evt06">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2327_06.jpg" title="오시는 길">                         
            </div>   

            <div class="evtCtnsBox evtInfo NGR">
                <div class="evtInfoBox">
                    <h4 class="NGEB">유의사항 이용안내</h4>
                    <div class="infoTit NG"><strong>[설명회 유튜브 유의사항]</strong></div>
                    <ul>
                        <li>1. 온라인 라이브 설명회 당일 오후 2시 부터 유튜브 신광은 경찰 TV 채널을 통해 실시간 진행되며, 사전 홈페이지를 통해 신청해 주면,<br>
                            설명회 알림 문자를 받아볼 수 있습니다.
                        </li>
                        <li>2. 방송 이후에 동영상이 제공되지 않으니 유의하시기 바랍니다.</li>
                        <li>3. 모바일로 참여하실 경우에는 3G, 4G(LTE), 5G 요금제 데이터 용량을 사전에 확인해 주시고 이용 바랍니다.<br>
                            (정해진 데이터 초과 시, 데이터 요금이 부과될 수 있습니다.)
                        </li>
                        <li>4. 본 이벤트 참여로서 지급된 쿠폰은 양도 및 재판매 등 일체 거래 불가하며, 당첨자 본인만 사용 가능합니다.</li>
                    </ul>
                    <div class="infoTit NG"><strong>[이벤트 유의사항]</strong></div><br>
                    <h5>&lt;설명회 참석하고 역대금 경품이벤트!&gt;</h5>
                    <ul>
                        <li>1.추첨 혜택은 사전 질문자 및 설명회 신청자, 방송 중 댓글 참여자에게 추첨으로 제공됩니다.</li>
                        <li>2. 추첨자는 방송 중 추첨을 통해 발표될 예정이며, 기프트콘 경품은 설명회 종료 후 7일 내 순차 발송됩니다.</li>
                        <li>3. 설명회 당일 '유튜브 신광은 경찰 TV 라이브' 채팅창에서 안내되는 당첨자 입력폼에 정확한 정보를 기재해주셔야 혜택을 받을 수 있습니다.</li>
                        <li>4. 사전 질문자 및 설명회 신청하신 분 중 당첨자에게는 신청 시 입력한 휴대전화번호로 개별 연락드립니다.<br> (설명회 신청하고 사전 질문을 작성할 경우 당첨확률이 올라갑니다.)</li>
                        <li>5. 특별 할인 수강권이나 무적 할인 수강권은 동영상이나 학원강의 기준이며, 교재비 별도입니다.</li>
                        <li>6. 무적 할인권의 경우 할인율은 설명회 당일 공개되며, 사용기간은 9월 5일까지입니다.</li>
                        <li>7. 부정확한 정보 기재, 혜택 발송에 필요한 정보 누락 등 당첨자 부주의로 미발송된 혜택은 재발송되지 않습니다.</li>
                        <li>8. 5만원 이상 경품의 경우, 제세공과금 당사 부담/소득신고를 위해 당첨자 본인의 신분증 사본을 요청 할 수 있습니다.</li>
                        <li>9. 경품은 당사 사정에 따라 동등한 가치를 지닌 다른 경품으로 변경될 수 있습니다.</li>
                        <li>10. 이벤트는 8/28(토) 설명회 종료 전까지 신청한 회원중에  추첨으로진행되며,   설명회 종료후 당일  오후에 개별안내 문자 예정입니다.</li>
                        <li>
                            11. 학원강의 지급<br>
                            <span>[학원] 기본종합반 및 심화이론반 당첨 확인후 학원방문  / 설명회 종료후 7일 이내</span><br>
                            <span>[학원] 6개월 슈퍼패스 당첨 확인후 학원방문 / 설명회 종료 후 7일이내</span>                       
                        </li>
                        <li>12.  [온라인]PASS지급 : 내강의실  > 무한PASS존 확인 > 무제한PASS 지급예정</li>
                    </ul>    
                    <h5>&lt;설명회 소문내고 강의듣자!! 이벤트!&gt;</h5>
                    <ul>
                        <li>* 이벤트는 8/28(토) 설명회 종료 전까지 진행되며, 당첨시 개별안내 문자 예정입니다.(학원실강은 방문필수 / 온라인PASS쿠폰은 바로지급)</li>
                        <li>* 개별 안내문자 : 8/31 오후예정</li>
                        <li>① [학원] 기본종합반 및 심화이론반 - 학원방문 필수</li>
                        <li>② [온라인] 무제한 PASS –  내강의실  > 무한PASS존 확인 > 무제한PASS 지급예정</li>
                        <li>③ 온라인PASS  30%할인쿠폰 ( 유효기간 7일 , 무제한PASS , 14개월개편PASS , 9개월개편 해당)</li>
                    </ul>
                </div>
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
@stop 