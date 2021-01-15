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

        /************************************************************/
        .sky {position:fixed;  top:200px; right:25px; z-index:10;}
        .sky a {display:block; margin-bottom:15px}

        .evt00 {background:#0A0A0A}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/01/2026_top_bg.jpg) no-repeat center top;}   

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
        .evt01 .btn {clear:both; width:500px; margin:0 auto;}
        .evt01 .btn a {display:block; text-align:center; font-size:25px; color:#fff; background:#000; padding:20px 0; margin-top:30px; border-radius:50px}
        .evt01 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}

        .evt02 {background:#F5F5F5}

        .evt03 {background:#5A0AC3}

        .loadmap {position: relative; padding-bottom:56.25%; height: 0; overflow: hidden; max-width:100%; height:auto; }
        .loadmap iframe {position:absolute; top: 0; left: 0; width:100%; height:100%;}

        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}

        .evtInfo {padding:80px 0; background:#e9e9e9; color:#555; font-size:17px}
		.evtInfoBox { width:1120px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px;}
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
                <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2026_sky01.png" title="신광은 경찰팀 유튜브"></a>
                <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2021/01/2026_sky02.png" title="합격 설명회 질문"></a>
                <a href="#evt_02"><img src="https://static.willbes.net/public/images/promotion/2021/01/2026_sky03.png" title="설명회 라이브"></a>
            </div>

            <div class="evtCtnsBox evt00">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/police.jpg" title="경찰학원 1위">
            </div>

            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2026_top.jpg" title="신세계">
            </div>

            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2026_01.jpg" title="설명회">
                <div class="request" id="request">
                    <div class="requestL">
                        <h3 class="NSK-Black">* 1월 설명회  신청접수</h3>
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
                    <a href="#none" onclick="javascript:fn_submit();">2022년 과목개편 온라인 LIVE 합격설명회 >></a>
                </div>
            </div>

            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2026_02.jpg" title="명쾌한 해답 제시">
            </div>

            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2026_03.jpg" title="역대급 설명회 혜택">                
            </div>

            <div class="evtCtnsBox evt04" id="evt_01">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2026_04.jpg" title="이벤트 댓글">                         
            </div>            
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif  

            <div class="evtCtnsBox evt05" id="evt_02">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2026_05.jpg" usemap="#Map2026_img" title="이미지 다운받기" border="0">
                <map name="Map2026_img" id="Map2026_img">
                    <area shape="rect" coords="327,1099,792,1156" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="설명회 이미지 다운받기" />
                </map>                                          
            </div>
            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial')
            @endif 

            <div class="evtCtnsBox evtInfo NGR">
                <div class="evtInfoBox">
                    <h4 class="NGEB">유의사항 이용안내</h4>
                    <div class="infoTit NG"><strong>[설명회 유의사항]</strong></div>
                    <ul>
                        <li>1. 온라인 라이브 설명회 당일 오후 2시 부터 유뷰트 신광은 경찰 TV 채널을 통해 실시간 진행되며,<br>
                            사전 홈페이지를 통해 신청해 주면, 설명회 알림 문자를 받아볼 수 있습니다.
                        </li>
                        <li>2. 방송 이후에 동영상이 제공되지 않으니 유의하시기 바랍니다.</li>
                        <li>3. 모바일로 참여하실 경우에는 3G, 4G(LTE), 5G 요금제 데이터 용량을 사전에 확인해 주시고 이용 바랍니다.<br>
                            (정해진 데이터 초과 시, 데이터 요금이 부과될 수 있습니다.)
                        </li>
                        <li>4. 본 이벤트 참여로서 지급된 쿠폰은 양도 및 재판매 등 일체 거래 불가하며, 당첨자 본인만 사용 가능합니다.</li>
                    </ul>  
                    <div class="infoTit NG"><strong>[사전신청 경품 유의사항]</strong></div>
                    <ul>
                        <strong>[전원제공 혜택: 특별할인권]</strong>
                        <li>1. 설명회 사전 신청하신 분에게만 제공되는 혜택이며, 할인권 사용기간은 설명회 종료 후 일괄 지급되며, 당일 등록 혜택 할인권 사용기간은 1월 23일(토) 19시까지 입니다.<br>
                            (5만원권 할인권 사용기간은 2월 21(일)까지 입니다.)
                        </li>
                        <li>2. 온라인 강의는 15 개월 PASS, 오프라인 강의는 2022년 대비 14개월 및 11개월 슈퍼PASS에 한해 적용가능합니다.</li>
                        <li>3. 설명회 사전 신청 시 등록하신 윌비스 아이디로 제공됩니다.</li>
                        <li>4. 특별 할인 수강권은 동영상이나 학원강의 기준이며, 교재비 별도입니다.</li>
                    </ul>   
                    <div class="infoTit NG"><strong>[추첨혜택 유의사항]</strong></div>
                    <ul>
                        <li>1. 추첨 혜택은 사전 질문자 및 설명회 신청자, 방송 중 댓글 참여자에게 추첨으로 제공됩니다.</li> 
                        <li>2. 추첨자는 방송 중 추첨을 통해 발표될 예정이며, 기프트콘 경품은 설명회 종료 후 7일 내 순차 발송됩니다.</li> 
                        <li>3. 사전 질문자 및 설명회 신청하신 분 중 당첨자에게는 신청 시 입력한 휴대전화번호로 개별 연락드립니다.<br>
                            (설명회 신청 후 사전 질문을 작성할 경우 당첨확률이 올라갑니다.)
                        </li> 
                        <li>4. 특별 강의 할인 수강권은 동영상이나 학원강의 기준이며, 교재비 별도입니다.</li> 
                        <li>5. 무적 할인권의 경우 할인율은 설명회 당일 공개되며, 사용기간은 1월 31일(일) 까지 입니다.</li> 
                        <li>6. 부정확한 정보 기재, 혜택 발송에 필요한 정보 누락 등 당첨자 부주의로 미발송되거나 잘못 전송된 경우 재발송되지 않습니다.</li>
                        <li>7. 경품은 상황에 따라 동등한 가치를 가진 다른 품목으로 변경될 수 있습니다.</li>
                    </ul>               
                    <div class="infoTit NG"><strong>[소문내기 이벤트 유의사항]</strong></div>
                    <ul>
                        <li>1. 1/22(금)까지 진행되며, 무료 쿠폰 발급은 1월 26일(화) 이후 당첨자에게는 신청 시 입력한 휴대전화 번호로 추첨 후 개별 연락 드립니다.</li>    
                        <li>2. 추첨으로 총 50명 선정되며, 할인 쿠폰의 유효기간은 2/2(화) 까지 입니다./li>
                        <li>3. 온라인 100% 할인쿠폰은 2022년 과목개편 대비 신광은 경찰팀 입문기본이론 패키지만 적용되며, 내강의실 > 쿠폰현황 확인에서 확인 가능합니다.</li>                    
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