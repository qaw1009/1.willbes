@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/      
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/07/2139_top_bg.jpg) no-repeat center top;}

        .evt01 {padding:100px 0; border-bottom:1px solid #ccc; width:1120px; margin:0 auto}
        .evt01 .tag {font-size:40px; color:#5b4ffb; text-align:center}
        .evt01 .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evt01 .request h3 {font-size:17px;}
        .evt01 .request td {padding:10px; font-size:14px}
        .evt01 .request input {height:26px;}
        .evt01 .requestL {width:48%; float:left}
        .evt01 .requestR {width:48%; float:right; }
        .evt01 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:196px; overflow-y:scroll }
        .evt01 .requestL li {display:inline-block; margin-right:10px}
        .evt01 .requestR li {margin-bottom:5px}
        .evt01 .request:after {content:""; display:block; clear:both}
        .evt01 .btn {clear:both; width:500px; margin:0 auto;}
        .evt01 .btn a {display:block; text-align:center; font-size:25px; color:#fff; background:#000; padding:20px 0; margin-top:30px; border-radius:50px}
        .evt01 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}

        .evt01 input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}

        .evt03 {background:#f6f0e0}  
        .evt04 {background:#978674} 
        
        .youtube {background:#36041f; padding:150px 0}
        .youtube .NSK-Black {color:#fff; font-size:50px; margin-bottom:50px}
        .youtube ul {width:1120px; margin:0 auto}
        .youtube li {display:inline; float:left;}
        .youtube li:last-child {margin-left:20px}        
        .youtube li div {margin-top:30px; font-size:30px; font-weight:bold; color:#fedf9c}
        .youtube li div span {color:#fff;}
        .youtube li iframe {width:550px; height:310px}
        .youtube ul:after {content:''; display:block; clear:both}

        .loadmapBox .loadmap {position: relative; padding-bottom:56.25%; height: 0; overflow: hidden; max-width:100%; height:auto; }
        .loadmapBox .loadmap iframe {position:absolute; top: 0; left: 0; width:100%; height:100%;}
        .loadmapBox ul {width:1120px; margin:100px auto}
        .loadmapBox li {float:left; width:calc(50% - 30px); font-size:18px; text-align:left; line-height:1.8; margin-bottom:10px; font-weight:bold; list-style:disc; margin-left:20px}
        .loadmapBox li div {font-size:16px}
        .loadmapBox li div span {vertical-align:middle; font-size:12px; padding:0 10px; display:inline-block; margin-right:10px; color:#fff; background:#58a933; font-weight:normal}
        .loadmapBox li div span.blue {background:#3a65b4}
        .loadmapBox li div span.red {background:#cc0003}
        .loadmapBox ul:after {content:''; display:block; clear:both}        
    </style>

<form name="regi_form_register" id="regi_form_register">
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
{{--            <input type="hidden" name="register_chk[]"  id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>--}}
    {{--@foreach($arr_base['register_list'] as $key => $val)
        <input type="hidden" name="register_chk[]" value="{{$val['ErIdx']}}"/>
    @endforeach--}}
{{--            <input type="hidden" name="target_params[]" value="register_data1"/> --}}{{-- 체크 항목 전송 --}}
{{--    <input type="hidden" name="target_params[]" value="register_data2"/> --}}{{-- 체크 항목 전송 --}}
{{--            <input type="hidden" name="target_param_names[]" value="참여캠퍼스"/> --}}{{-- 체크 항목 전송 --}}
{{--    <input type="hidden" name="target_param_names[]" value="직렬"/> --}}{{-- 체크 항목 전송 --}}
    <input type="hidden" name="register_type" value="promotion"/>
    <!--<input type="hidden" name="register_chk_col[]" value="EtcValue"/>
    <input type="hidden" name="register_chk_val[]" value=""/>-->

    <div class="evtContent NSK" id="evtContainer">
        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2139_top.jpg"  alt="사립탐정사"/>
        </div> 

        <div class="evtCtnsBox youtube">
            <div class="NSK-Black">사립탐정사를 영상으로 먼저 만나보세요~!!</div>
            <ul>
                <li>
                    <iframe src="https://www.youtube.com/embed/BtMp7bpCst0?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div>#한국탐정KPD소개</div>
                </li>
                <li>                    
                    <iframe src="https://www.youtube.com/embed/FQjASiTrgJo?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div>#탐정사시험안내</div>
                </li>
            </ul>            
        </div>

        <div class="evtCtnsBox evt01">
            <div class="tag NSK-Black">#사립탐정 #한국탐정 #7/24 #누구나빠르게</div>
            <div class="request" id="request">
                <div class="requestL">
                    <h3 class="NSK-Black">* 사립탐정사 시험  학원예약접수</h3>
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
                            <th>* 시험선택</th>
                            <td>
                                <ul>
                                    @foreach($arr_base['register_list'] as $key => $val)
                                        @if(empty($val['RegisterExpireStatus']) === false && $val['RegisterExpireStatus'] == 'Y')
                                            <li><input type="radio" name="register_chk[]" id="campus{{$key}}" value="{{$val['ErIdx']}}" /> <label for="campus{{$key}}">{{$val['Name']}}</label></li><br/>
                                        @endif
                                    @endforeach
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
                        - 필수항목 : 성명, 연락처, 선택항목 
                        </li>
                        <li><strong>3. 개인정보 이용기간 및 보유기간</strong><br>
                        - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기
                        </li>
                        <li><strong>4. 신청자의 개인정보 수집 및 활용 동의 거부 시</strong><br>
                        - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.
                        </li>
                        <li>5. 입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.</li>
                        <li>6. 신이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.</li>
                    </ul>
                    <div>
                        <input name="is_chk" id="is_chk" type="checkbox" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                    </div>
                </div>
            </div>
            <div class="btn NGEB">
                <a href="javascript:void(0);" onclick="javascript:fn_submit();">사립탐정 자격시험 예약하기 ></a>
            </div>
            <div class="mt30 tx16">* 결제는 신광은경찰학원(본원) 현장결제만 가능합니다.</div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2139_01.jpg"  alt="사립탐정사 자격시험" />
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2139_02.jpg"  alt="간단히 알고가는 사립탐정사">
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2139_03.jpg"  alt="간단히 알고가는 사립탐정사">
        </div>

        <div class="evtCtnsBox loadmapBox">
            <div class="loadmap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.7927493090915!2d126.94179831559448!3d37.51280597980801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c9fe8a0a1e2a5%3A0x3bc432e93a6e20c1!2zKOyjvCnsnIzruYTsiqQ!5e0!3m2!1sko!2skr!4v1603420278998!5m2!1sko!2skr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <ul>
                <li>
                    주소 : 서울시 동작구 만양로 105 한성빌딩 2층
                </li>
                <li>
                    문의 : 1544-0336
                </li>
                <li>
                    지하철 이용 시
                    <div>
                    지하철 1호선 1번 출구 도보로 3분<br>
                    지하철 9호선 3번 출구 도보로 4분<br>
                    </div>
                </li>
                <li>
                    버스 이용 시
                    <div>
                        <span class="blue">간선</span> N15, 150, 152, 360, 500, 504, 507, 605, 640, 654, 751, 752<br>
                        <span>지선</span> 5516, 5517, 5531, 5535, 5536, 6211, 6411, 8551<br>
                        <span class="red">지선</span> 9408<br>
                        <span>마을</span> 동작01, 동작03, 동작08, 동작13<br>
                    </div>
                </li>
            </ul>
        </div>
        
    </div>
    <!-- End Container -->
</form>
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
                alert('접수하려는 시험을 선택하세요.');
                return;
            }
            // if ($regi_form_register.find('input[name="register_data2"]').is(':checked') === false) {
            //     alert('직렬을 선택하셔야 합니다.');
            //     return;
            // }

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