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
        .skyBanner {position:fixed; top:200px;right:0;z-index:10;}
        .skyBanner ul li{padding-bottom:10px;}
       
        .top_police{background:url(https://static.willbes.net/public/images/promotion/2019/07/1310_police_bg.jpg) no-repeat center top;}
        .evtTop {background:#5d5d5d url(https://static.willbes.net/public/images/promotion/2020/06/1670_top_bg.jpg) no-repeat center top;}
        .top_youtube {background:#e0e0e0;position:relative;}
        .youtubeGod{position:absolute;top:290px;left:50%;margin-left:-351px;}
        .youtubeGod iframe {width:707px;height:398px;}
        .evt01 {background:#e0e0e0;}
        .evt02 {background:#c61330;}        

        .evt03 {background:#fff;}
        .evt03 .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evt03 .request h3 {font-size:17px;}
        .evt03 .request td {padding:10px}
        .evt03 .request input {height:26px;}
        .evt03 .requestL {width:48%; float:left}
        .evt03 .requestR {width:48%; float:right; }
        .evt03 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:241px; overflow-y:scroll }
        .evt03 .requestL li {display:inline-block; margin-right:10px}
        .evt03 .requestR li {margin-bottom:5px}
        .evt03 .request:after {content:""; display:block; clear:both}
        .evt03 .btn {clear:both; width:450px; margin:0 auto;}
        .evt03 .btn a {display:block; text-align:center; font-size:21px;color:#fff; background:#000; padding:20px 0; margin-top:30px; border-radius:50px}
        .evt03 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}
        .evt03 .NGEBS{font-weight:bold;}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1670_04_bg.jpg) no-repeat center top;}

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
                <ul>                  
                    <li>
                        <a href="#request"><img src="https://static.willbes.net/public/images/promotion/2020/06/1670_sky.png" title="무료특강 신청하기"></a>
                    </li>
                </ul>               
            </div>
            <div class="evtCtnsBox top_police">
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1310_police.jpg" title="신광은 경찰팀">
            </div>

            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1670_top.jpg" title="신광은 형사법 무료특강">
            </div>

            <div class="evtCtnsBox top_youtube">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1670_youtube.jpg" usemap="#Map1670c" title="신광은 형사법 무료특강" border="0">
                <map name="Map1670c" id="Map1670c">
                    <area shape="rect" coords="327,796,790,871" href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank" />
                </map>
                <div class="youtubeGod">
                    <iframe src="https://www.youtube.com/embed/bPPX2qZgSBg" frameborder="0" allowfullscreen=""></iframe>        
                </div>              
            </div>

            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1670_01.jpg" usemap="#Map1670b" title="무료특강&질문하기" border="0">
                <map name="Map1670b" id="MaMap1670bp">
                    <area shape="rect" coords="539,338,770,490" href="https://www.hyundai.or.kr/" target="_blank" />
                    <area shape="rect" coords="789,339,1018,489" href="http://www.sehan.ac.kr/main/main.do" target="_blank" />
                    <area shape="rect" coords="538,518,770,668" href="#apply" />
                    <area shape="rect" coords="788,519,1019,668" href="http://www.bu.ac.kr/sites/web/intro/intro.html" target="_blank" />
                    <area shape="rect" coords="539,699,769,849" href="#apply" />
                </map>

                {{--댓글url--}}
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_normal_partial')
                @endif  
            </div>                  

            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1670_02.jpg" usemap="#Map1670a" title="형사법 무료특강 소문내기" border="0">
                <map name="Map1670a" id="Map1670a">
                    <area shape="rect" coords="304,847,723,907" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" />
                </map>
            </div>      
            
            <!-- sns 및 url 남기기 영역 -->
            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial')
            @endif

            
            <div class="evtCtnsBox evt03" id="apply">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1670_03.jpg" title="신광은 형사법 무료특강">
                    <div class="request" id="request">
                        <div class="requestL">
                            <h3 class="NGEBS"> * 무료특강 신청접수 </h3>
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
                                            <input type="hidden" name="register_data1" value=""/>
                                            {{--<li><input type="checkbox" name="register_data1_tmp[]" id="campus3" value="6.21(일) 14시 형사법 무료특강" /> <label for="campus3">1회 - 6.21(일) 14시 형사법 무료특강</label></li>--}}
                                            <li><input type="checkbox" name="register_data1_tmp[]" id="campus4" value="6.28(일) 14시 형사법 무료특강" /> <label for="campus4">2회 - 6.28(일) 14시 형사법 무료특강</label></li>
                                            <li><input type="checkbox" name="register_data1_tmp[]" id="campus5" value="6.28(일) 14시 형사법 무료특강" /> <label for="campus5">3회 - 7.5(일) 14시 형사법 무료특강</label></li>
                                            <li><input type="checkbox" name="register_data1_tmp[]" id="campus6" value="6.28(일) 14시 형사법 무료특강" /> <label for="campus6">4회 - 7.12(일) 14시 형사법 무료특강</label></li>
                                            <li><input type="checkbox" name="register_data1_tmp[]" id="campus7" value="6.28(일) 14시 형사법 무료특강" /> <label for="campus7">5회 - 7.19(일) 14시 형사법 무료특강</label></li>
                                            <li><input type="checkbox" name="register_data1_tmp[]" id="campus8" value="6.28(일) 14시 형사법 무료특강" /> <label for="campus8">6회 - 7.26(일) 14시 형사법 무료특강</label></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>* 참여 캠퍼스</th>
                                    <td>
                                        <ul>
                                            <li><input type="radio" name="register_data2" id="CT1" value="노량진" /> <label for="CT1">노량진</label></li>
                                            <li><input type="radio" name="register_data2" id="CT2" value="인천" /> <label for="CT2">인천</label></li>
                                            <li><input type="radio" name="register_data2" id="CT3" value="대구" /> <label for="CT3">대구</label></li>
                                            <li><input type="radio" name="register_data2" id="CT4" value="부산" /> <label for="CT4">부산</label></li>
                                            <li><input type="radio" name="register_data2" id="CT5" value="광주" /> <label for="CT5">광주</label></li>
                                            &nbsp;&nbsp;<li><input type="radio" name="register_data2" id="CT6" value="제주" /> <label for="CT6">제주</label></li>
                                            <li><input type="radio" name="register_data2" id="CT7" value="전북" /> <label for="CT7">전북</label></li>
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
                                    - 신청자 본인 확인 및 신청 접수 및 문의사항 응대
                                    - 통계분석 및 마케팅
                                    - 윌비스 신광은경찰학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공
                                </li>
                                <li><strong>2. 개인정보 수집 항목</strong> <br>
                                - 필수항목 : 성명, 연락처, 참여캠퍼스, 직렬항목
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
                        <a href="#none" onclick="javascript:fn_submit();">2020년 형사법 무료특강 신청하기  ></a>
                    </div>
            </div>
            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1670_04.jpg" title="학원 위치 및 정보"/>
            </div>           

        </form>
	</div>
    <!-- End Container -->

    <script>
        function fn_submit() {
            var $regi_form_register = $('#regi_form_register');
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
                alert('참여일을 선택하셔야 합니다.');
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
    </script>
@stop