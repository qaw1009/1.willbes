@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">        
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skyBanner {position:fixed; bottom:50px;right:0;z-index:1;}
        .skyBanner ul li{padding-bottom:10px;}
       
        .top_police{background:#404040}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/10/1440_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#2e2e2e;}
        .evt02 {background:#b69358; padding-bottom:150px} 
        .evt02 .request {width:1000px; margin:50px auto 0; background:#fff; padding:50px; text-align:left}
        .evt02 .request h3 {font-size:17px;}
        .evt02 .request td {padding:10px}
        .evt02 .request input {height:26px;}
        .evt02 .requestL {width:48%; float:left}
        .evt02 .requestR {width:48%; float:right; }
        .evt02 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:241px; overflow-y:scroll }
        .evt02 .requestL li {display:inline-block; margin-right:10px}
        .evt02 .requestR li {margin-bottom:5px}
        .evt02 .request:after {content:""; display:block; clear:both}
        .evt02 .btn {clear:both; width:900px; margin:0 auto;}
        .evt02 .btn a {display:block; text-align:center; font-size:28px; color:#fff; background:#e74e21; padding:20px 0; margin-top:50px; border-radius:50px}
        .evt02 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2); background:#000;}
        .evt02 .NGEBS{font-weight:bold;}
        .evt03 {background:#fff;} 
        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2019/10/1440_04_bg.jpg) no-repeat center top;}

        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_chk[]"  id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>
            <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data2"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="참여캠퍼스"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="직렬"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="register_type" value="promotion"/>
            <!--
            <input type="hidden" name="register_chk_col[]" value="EtcValue"/>
            <input type="hidden" name="register_chk_val[]" value=""/>
            -->

            <div class="skyBanner">
                <a href="#request"><img src="https://static.willbes.net/public/images/promotion/2019/10/1440_skybanner.jpg"></a>                                  
            </div>
            <div class="evtCtnsBox top_police">
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1310_police.jpg" title="경찰학원 1위">
            </div>
            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1440_top.jpg" title="광은 프리 데이">
            </div>

            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1440_01.jpg" title="스케줄">
            </div>

            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1440_02.jpg" title="신청접수">
                <div class="request" id="request">
                    <div class="requestL">
                        <h3 class="NGEBS">* 광은 FREE DAY 신청접수</h3>
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
                                <th>* 참여강의</th>
                                <td>
                                    <ul>
                                        <input type="hidden" name="register_data1" value=""/>
                                        <li><input type="checkbox" name="register_data1_tmp[]" id="lecture1" value="아침특강" /> <label for="lecture1">아침특강</label></li>
                                        <li><input type="checkbox" name="register_data1_tmp[]" id="lecture2" value="영어집중관리반" /> <label for="lecture2">영어집중관리반</label></li>
                                        <li><input type="checkbox" name="register_data1_tmp[]" id="lecture3" value="기본 형소법" /> <label for="lecture3">기본 형소법</label></li>
                                        <li><input type="checkbox" name="register_data1_tmp[]" id="lecture4" value="기본 영어" /> <label for="lecture4">기본 영어</label></li>
                                        <li><input type="checkbox" name="register_data1_tmp[]" id="lecture5" value="심화 형법" /> <label for="lecture5">심화 형법</label></li>
                                        <li><input type="checkbox" name="register_data1_tmp[]" id="lecture6" value="심화 영어" /> <label for="lecture6">심화 영어</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>* 직렬</th>
                                <td>
                                    <ul>
                                        <li><input type="radio" name="register_data2" id="CT1" value="일반남자" /> <label for="CT1">일반남자</label></li>
                                        <li><input type="radio" name="register_data2" id="CT2" value="일반여자" /> <label for="CT2">일반여자</label></li>
                                        <li><input type="radio" name="register_data2" id="CT3" value="101단" /> <label for="CT3">101단</label></li>
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
                        <h3 class="NGEB">* 개인정보 수집 및 이용에 대한 안내</h3>
                        <ul>
                            <li>
                                <strong>1. 개인정보 수집 이용 목적</strong> <br>
                                - 신청자 본인 확인 및 신청 접수 및 문의사항 응대  <br>
                                - 통계분석 및 마케팅 <br> 
                                - 윌비스 신광은경찰학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공 
                            </li>
                            <li>
                                <strong>2. 개인정보 수집 항목</strong> <br>
                                - 필수항목 : 성명, 연락처, 직렬항목
                            </li>
                            <li>
                                <strong>3. 개인정보 이용기간 및 보유기간</strong><br>
                                - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기
                            </li>
                            <li>
                                <strong>4. 신청자의 개인정보 수집 및 활용 동의 거부 시</strong><br>
                                - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.
                            </li>
                            <li>
                                5. 입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.
                            </li>
                            <li>
                             6. 신이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.
                            </li>
                        </ul>
                        <div class="mt10">
                            <input name="is_chk" id="is_chk" type="checkbox" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                        </div>
                    </div>
                </div>
                <div class="btn NGEB">
                    <a href="#none" onclick="javascript:fn_submit();">광은 FREE DAY 신청하기 ></a>
                </div>
            </div>

            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1440_03_01.jpg" usemap="#Map1441A" title="소문내기 이벤트" border="0"/><br>
                <map name="Map1441A" id="Map1441A">
                    <area shape="rect" coords="353,1149,767,1254" href="#none" target="_self" onclick="javascript:giveCheck();" title="실강쿠폰받기" />
                </map>
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1440_03_02.jpg" title="네이버 이벤트"/><br>
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1441_03_01.jpg" usemap="#Map1441" title="" border="0"/>
                <map name="Map1441" id="Map1441">
                    <area shape="rect" coords="701,55,781,160" href="https://www.instagram.com" target="_blank" alt="인스타그램" />
                    <area shape="rect" coords="791,55,873,160" href="https://twitter.com" target="_blank" alt="트위터" />
                    <area shape="rect" coords="883,55,963,160" href="https://www.facebook.com" target="_blank" alt="페이스북" />
                </map>
            </div>

            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial', array('bottom_cafe_type'=>'N'))
            @endif

            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1440_04.jpg" title=""/>
            </div>
        </form>
	</div>
    <!-- End Container -->

    <script>
        var $regi_form_register = $('#regi_form_register');

        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            var _url = '{!! front_url('/event/registerStore') !!}';

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }
            if ($.trim($regi_form_register.find('input[name="register_name"]').val()) == '') {
                alert('이름을 입력하셔야 합니다.');
                return;
            }
            if ($.trim($regi_form_register.find('input[name="register_tel"]').val()) == '') {
                alert('연락처를 입력하셔야 합니다.');
                return;
            }
            if ($regi_form_register.find('input[name="register_data1_tmp[]"]:checked').length == 0) {
                alert('참여강의를 선택하셔야 합니다.');
                return;
            }
            if ($regi_form_register.find('input[name="register_data2"]').is(':checked') === false) {
                alert('직렬을 선택하셔야 합니다.');
                return;
            }

            if (!confirm('저장하시겠습니까?')) { return true; }
            // $regi_form_register.find('input[name="register_chk_val[]"]').val($regi_form_register.find('input:radio[name="register_data2"]:checked').val());//신청자 조건 추가

            var register_data1_value = '';
            $regi_form_register.find('input[name="register_data1_tmp[]"]:checked').each(function(i){
                register_data1_value += (i==0? '' : ',') + $(this).val();
            });
            $regi_form_register.find('input[name="register_data1"]').val(register_data1_value);

            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&regist_chk_yn={{$arr_promotion_params['regist_chk_yn']}}&arr_give_idx_chk={{$arr_promotion_params['arr_give_idx_chk']}}';
                ajaxSubmit($regi_form_register, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                        location.reload();
                        {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
                    }
                }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

    </script>
@stop