@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/        

        .sky {position:fixed;top:200px;right:10px;z-index:100;}
        .sky a {display:block; margin-bottom:10px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/11/2827_top_bg.jpg) no-repeat center top; height:1428px;}
        .evtTop span {position: absolute; top:300px; left:50%; margin-left:-380px; z-index: 2;}

        a.btn {width:600px; margin:50px auto; display:block; background:#010a2b; color:#fff; font-size:30px; padding:20px; border-radius:20px}
        a.btn:hover,
        .evt03 a.btn:hover {background:#06f4f6; color:#010a2b}

        .evt01 {margin-top:100px}

        /*선착순 이벤트*/
        .evt03 {background:#010729 url(https://static.willbes.net/public/images/promotion/2022/11/2827_03_bg.jpg) repeat-x center top; padding:100px 0}
        .evt03 a.btn {background:#000;}
        .evt03 .attend {width:1000px; margin:50px auto; line-height:1.4; font-size:16px; display:flex; justify-content: space-between; flex-wrap: wrap;}
        .evt03 .attend > div {background:url(https://static.willbes.net/public/images/promotion/2022/11/2827_date_bg.png) no-repeat center center; width:183px; height:183px; display:flex; justify-content: center; align-items: center;  flex: 1 1 20%; margin-bottom:20px; position: relative;}
        .evt03 .attend > div:hover {cursor: pointer;}
        .evt03 .attend > div p {display:block; font-size:18px;  width:100%; margin:0; padding:0; line-height:1.2}
        .evt03 .attend > div p strong {font-size:22px; font-weight:bold;}
        .evt03 .attend > div div {position: absolute; width:100%; height:100%; background:rgba(0,0,0,.8); color:#fff; font-size:40px; border-radius:20px; display:flex; justify-content: center; align-items: center; font-weight:bold}

        /* 
        .evt03 .attend {position:absolute; bottom:475px; left:50%; width:850px; margin-left:-425px; z-index:1; display: flex; justify-content: space-evenly; flex-wrap: wrap;}
        .evt03 .attend span {background:url(https://static.willbes.net/public/images/promotion/2022/11/2827_date_bg.png) no-repeat center top; width:176px; height:176px;
        font-size:18px; padding-top:30px; font-family: Impact,  "Noto Sans KR Regular", Haettenschweiler, 'Arial Narrow Bold', sans-serif; color:#425A94; margin-bottom:10px}
        .evt03 .attend span.end {background-image:url(https://static.willbes.net/public/images/promotion/2022/11/2827_as_off.png); font-size:0;}
        */

        .evt_apply {padding-bottom:150px;}
        .evt_apply .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evt_apply .request h3 {font-size:17px;}
        .evt_apply .request td {padding:10px}
        .evt_apply .request input {height:26px;}
        .evt_apply .requestL {width:48%; float:left}
        .evt_apply .requestR {width:48%; float:right; }
        .evt_apply .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:241px; overflow-y:scroll }
        .evt_apply .requestL li {display:inline-block; margin-right:10px}
        .evt_apply .requestR li {margin-bottom:5px}
        .evt_apply .request:after {content:""; display:block; clear:both}
        .evt_apply .btn {clear:both; width:600px; margin:0 auto;}
        .evt_apply .btn a {display:block; text-align:center; font-size:25px; color:#fff; background:#000; padding:20px; margin-top:30px; border-radius:50px}
        .evt_apply .btn a strong {color:#ffe400}
        .evt_apply .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2); background:#BB0001}

        .evt05 {background:#010c2c;}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#reply"><img src="https://static.willbes.net/public/images/promotion/2022/11/2827_sky01.jpg" alt=""></a>   
            <a href="#evt02"><img src="https://static.willbes.net/public/images/promotion/2022/11/2827_sky02.jpg" alt=""></a>   
            <a href="#first_come"><img src="https://static.willbes.net/public/images/promotion/2022/11/2827_sky03.jpg" alt=""></a>   
            <a href="#evt04"><img src="https://static.willbes.net/public/images/promotion/2022/11/2827_sky04.jpg" alt=""></a>          
        </div>

        <div class="evtCtnsBox evtTop">
            <span data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2022/11/2827_top_img.png" title="극한 퀴즈쇼  "></span>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <a href="#reply" class="btn NSK-Black">11/26일 극한 퀴즈쇼 참가 신청하기 ></a>
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2827_01.jpg" title="퀴즈쇼 참가 이벤트">
            <div id="reply">
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif
            </div> 
        </div>   

        <div class="evtCtnsBox evt02" data-aos="fade-up" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2827_02.jpg" title="라이브 방송">
            <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank" class="btn NSK-Black">윌비스경찰 유튜브 채널 바로가기 ></a>
        </div>

        <form id="add_apply_form" name="add_apply_form">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" name="apply_chk_el_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="event_register_chk" value="N"/>

            @foreach($arr_base['add_apply_data'] as $row)
                @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyEndDatm']))
                    <input type="hidden" name="add_apply_chk[]" value="{{$row['EaaIdx']}}" />
                    @break;
                @endif
            @endforeach

            <div class="evtCtnsBox evt03" data-aos="fade-up" id="first_come">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/11/2827_03.png" alt="무료증정 이벤트"/>
                    <div class="attend">
                        @if(empty($arr_base['add_apply_data']) === false)
                            @foreach($arr_base['add_apply_data'] as $key => $row)
                                <div>
                                    {!! $row['Name'] !!}
                                    {!! (time() >= strtotime($row['ApplyEndDatm']) || $row['PersonLimit'] <= $row['MemberCnt'] ? '<div>마감</div>' : '') !!}
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <a href="javascript:void(0);" class="btn NSK-Black" onclick="fn_add_apply_submit(); return false;">김재규 교수님 스탬프 랠리 신청하기 ></a>
                </div>
            </div>
        </form> 

        <div class="evtCtnsBox evt04" data-aos="fade-up" id="evt04">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2827_04.jpg" title="총알 스탬프랠리">
        </div>

        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="직렬"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="register_type" value="promotion"/>

            <div class="evtCtnsBox evt_apply">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2827_apply.jpg" title="100일의 기적 시작합니다">    
                <div class="request" id="request">
                    <div class="requestL">
                        <h3 class="NSK-Black">* 김재규 교수님 공개강의 무료신청(노량진 본원)</h3>
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
                                                    $reg_month = mb_strlen($reg_month_day[0], 'utf-8') == 1 ? '0'.$reg_month_day[0] : $reg_month_day[0];
                                                    $reg_day = mb_strlen($reg_month_day[1], 'utf-8') == 1 ? '0'.$reg_month_day[1] : $reg_month_day[1];
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
                                        <li><input type="radio" name="register_data1" id="CT1" value="일반남자" /> <label for="CT1">일반남자</label></li>
                                        <li><input type="radio" name="register_data1" id="CT2" value="일반여자" /> <label for="CT2">일반여자</label></li>
                                        &nbsp;&nbsp;&nbsp;<li><input type="radio" name="register_data1" id="CT3" value="101단" /> <label for="CT3">101단</label></li>
                                        <li><input type="radio" name="register_data1" id="CT4" value="경행경채" /> <label for="CT4">경행경채</label></li>
                                        <li><input type="radio" name="register_data1" id="CT5" value="전의경경채" /> <label for="CT5">전의경경채</label></li>
                                        <li><input type="radio" name="register_data1" id="CT6" value="법학경채" /> <label for="CT6">법학경채</label></li>
                                        <li><input type="radio" name="register_data1" id="CT7" value="기타" /> <label for="CT7">기타</label></li>
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
                    <a href="javascript:void(0);" onclick="fn_submit(); return false;">학원 공개강의 <strong>신청하기 >></strong></a>
                </div>
            </div>
        </form>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2827_05.jpg" title="김재규 총알 경찰학">
        </div>
    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
            AOS.init();
        });
    </script>

    <script type="text/javascript">
        // 무료 당첨
        function fn_add_apply_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            var $add_apply_form = $('#add_apply_form');
            var _url = '{!! front_url('/event/addApplyStore') !!}';

            if (typeof $add_apply_form.find('input[name="add_apply_chk[]"]').val() === 'undefined') {
                alert('이벤트 기간이 아닙니다.'); return;
            }

            if (!confirm('신청하시겠습니까?')) { return true; }
            ajaxSubmit($add_apply_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert( getApplyMsg(ret.ret_msg) );
                    location.reload();
                }
            }, function(ret, status, error_view) {
                alert( getApplyMsg(ret.ret_msg || '') );
            }, null, false, 'alert');
        }

        // 이벤트 추가 신청 메세지
        function getApplyMsg(ret_msg) {
            {{-- 해당 프로모션 종속 결과 메세지 --}}
            var apply_msg = '';
            var arr_apply_msg = [
                ['이미 신청하셨습니다.','이미 당첨되셨습니다.'],
                ['신청 되었습니다.','당첨을 축하합니다. 장바구니를 확인해 주세요.'],
                //['이벤트 신청후 이용 가능합니다.','봉투모의고사 신청후 이용 가능합니다.'],
                ['마감되었습니다.','내일 21시에 다시 도전해 주세요.']
            ];
            for (var i = 0; i < arr_apply_msg.length; i++) {
                if(arr_apply_msg[i][0] == ret_msg) {
                    apply_msg = arr_apply_msg[i][1];
                }
            }
            if(apply_msg == '') apply_msg = ret_msg;
            return apply_msg;
        }

        // 설명회 신청하기

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
            if ($regi_form_register.find('input[name="register_data1"]').is(':checked') === false) {
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

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop