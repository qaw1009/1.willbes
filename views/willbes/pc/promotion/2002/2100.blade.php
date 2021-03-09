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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/2100_top_bg.jpg) no-repeat center top;}   

        .evt01 {background:#F5F5F5}

        .evt02 {padding-bottom:100px}
        .evt02 .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evt02 .request h3 {font-size:17px;}
        .evt02 .request td {padding:10px}
        .evt02 .request input {height:26px;}
        .evt02 .requestL {width:48%; float:left}
        .evt02 .requestR {width:48%; float:right; }
        .evt02 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:241px; overflow-y:scroll }
        .evt02 .requestL li {display:inline-block; margin-right:10px}
        .evt02 .requestR li {margin-bottom:5px}
        .evt02 .request:after {content:""; display:block; clear:both}
        .evt02 .btn {clear:both; width:500px; margin:0 auto;}
        .evt02 .btn a {display:block; text-align:center; font-size:25px; color:#fff; background:#000; padding:20px 0; margin-top:30px; border-radius:50px}
        .evt02 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}

        .evt03 {background:#EFEFEF}

        .evt04 {background:#fff}
        
        .evt05 {background:#D7D7D7}

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
                <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2021/03/2100_sky.png" title="초시생"></a>
                <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/03/2100_sky2.png" title="유튜브"></a>
                <a href="#evt_02"><img src="https://static.willbes.net/public/images/promotion/2021/03/2100_sky3.png" title="합격 설명회"></a>
            </div>

            <div class="evtCtnsBox evt00">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/police.jpg" title="경찰학원 1위">
            </div>

            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2100_top.jpg" title="커리큘럼 설명회">
            </div>

            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2100_01.jpg" title="할인권 제공">
            </div>

            <div class="evtCtnsBox evt02" id="evt_01">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2100_02.jpg" title="설명회 스케줄">
                <div class="request" id="request">
                    <div class="requestL">
                        <h3 class="NSK-Black">* 3월 설명회  신청접수</h3>
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
                    <a href="#none" onclick="javascript:fn_submit();">2021년 3월 설명회 학원 신청하기 ></a>
                </div>
            </div>

            <div class="evtCtnsBox evt03" id="evt_02">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2100_03.jpg" title="참여고 경품고">
            </div>

            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2100_04.jpg" title="기초 입문서 완료">                
            </div>
                  
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif  

            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2100_05.jpg" title="완벽대비">                
            </div>

            <div class="evtCtnsBox">
                <div class="loadmap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.7927493090915!2d126.94179831559448!3d37.51280597980801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c9fe8a0a1e2a5%3A0x3bc432e93a6e20c1!2zKOyjvCnsnIzruYTsiqQ!5e0!3m2!1sko!2skr!4v1603420278998!5m2!1sko!2skr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>

            <div class="evtCtnsBox evt06">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2100_06.jpg" title="위치 및 시간">                
            </div>

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
                    <div class="infoTit NG"><strong>[이벤트 유의사항]</strong></div>
                    <ul>
                        <li>&lt;무엇이든 물어보세요 이벤트&gt;</li>
                        <li>1. 전까지 진행되며, 당첨시 장바구니에 교재를  지급해드립니다. (개별안내 문자 예정)</li>    
                        <li>2. 장바구니 교재 지급일 : 3이벤트는 3/14(일) 설명회 종료 /22(월)  / 장바구니 유효기간 : 7일</li>
                        <li>3. 추첨으로 총 50명 선정되며,, 배송비 2,500원을 결제해야 하며 이후에 재지급은 불가능합니다.</li>      
                        <li>4. 2021년 3월 22일(월)부터  결제시 순차발송되어집니다.</li>
                        <li>5. 이벤트용 교재이며 판매불가 상품입니다.<br>
                            * 발송일정은 내부사정에 의해 변동될 수 있습니다.<br>
                            * 배송은 배송비 결제 시 입력한 배송 주소지로 발송되며, 입력된 배송지가 잘못되어있으면 배송이 되지 않을 수도 있습니다.<br>&nbsp;&nbsp; 이 경우에는 본원에서 책임 지지 않습니다.<br>                            
                            * 배송 주소지 변경은 불가합니다.<br>
                            * 탈퇴 등의 부정한 방법으로 이벤트 참여 시, 혜택 제공 대상자에서 제외됩니다.
                        </li>              
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