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
        .skyBanner {position:fixed; width:162px; top:200px; right:10px; z-index:10;}
        .skyBanner a {display:block; margin-bottom:5px}

       
        .evt00 {background:#404040}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/11/1450_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#f1f1f1;}
        .evt02 {background:#fff;}        

        .evt03 {background:#fff;}
        .evt03 .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evt03 .request h3 {font-size:17px;}
        .evt03 .request td {padding:10px}
        .evt03 .request input {height:26px;}
        .evt03 .requestL {width:48%; float:left}
        .evt03 .requestR {width:48%; float:right; }
        .evt03 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:147px; overflow-y:scroll }
        .evt03 .requestL li {display:inline-block; margin-right:10px}
        .evt03 .requestR li {margin-bottom:5px}
        .evt03 .request:after {content:""; display:block; clear:both}
        .evt03 .btn {clear:both; width:800px; margin:0 auto;}
        .evt03 .btn a {display:block; text-align:center; font-size:28px; color:#fff; background:#173896; padding:20px 0; margin-top:30px; border-radius:50px}
        .evt03 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}
        .evt03 .NGEBS{font-weight:bold;}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2019/11/1450_04_bg.jpg) no-repeat center top;}

        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <form name="regi_form_register" id="regi_form_register" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <input type="hidden" name="event_idx" id ="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" name="file_chk" value="Y"/>
            <input type="hidden" name="register_chk[]"  id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>
{{--            <input type="hidden" name="target_params[]" value="register_data1"/> --}}{{-- 체크 항목 전송 --}}
{{--            <input type="hidden" name="target_params[]" value="register_data2"/> --}}{{-- 체크 항목 전송 --}}
{{--            <input type="hidden" name="target_param_names[]" value="수강생정보"/> --}}{{-- 체크 항목 전송 --}}
{{--            <input type="hidden" name="target_param_names[]" value="수강생정보"/> --}}{{-- 체크 항목 전송 --}}


            <div class="evtCtnsBox evt00">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1443_00.jpg" title="신광은 경찰팀">
            </div>

            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2019/11/1450_top.jpg" title="수능 인증샷 이벤트">
            </div>

            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2019/11/1450_01.jpg" title="경찰합격! 지금이 기회다!">
            </div>

            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2019/11/1450_02.jpg" title="수능 인증샷 이벤트">
                <div class="request" id="request">
                    <div class="requestL">
                        <h3 class="NGEBS">* 수능 인증샷 이벤트 참여</h3>
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
                                <th>* 수험표 등록</th>
                                <td>
                                    <input type="file" name="attach_file" id="attach_file"/>
                                </td>
                            </tr>
                        </table>
                        <p>* 수험표 이미지 (jpg, gif, png 파일만 등록 가능)</p>
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
                    <a href="#none" onclick="javascript:fn_submit();">2020학년도 수능 수험표 등록하기 ></a>
                </div>
                <img src="https://static.willbes.net/public/images/promotion/2019/11/1450_03.jpg" usemap="#Map1450" title="인증샷 소문내기 이벤트" border="0">
                <map name="Map1450" id="Map1450">
                    <area shape="rect" coords="706,930,768,994" href="https://www.instagram.com" target="_blank" alt="인스타그램" />
                    <area shape="rect" coords="776,930,840,994" href="https://twitter.com" target="_blank" alt="트위터" />
                    <area shape="rect" coords="845,930,910,994" href="https://www.facebook.com" target="_blank" alt="페이스북" />
                </map>             
                <div class="btn NGEB mb40">
                    <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="전국모의고사 이미지 다운받기">수능 인증샷 이벤트 이미지 다운받기 ></a>
                </div>
            </div>
        </form>
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial', array('bottom_cafe_type'=>'N'))
        @endif
	</div>
    <!-- End Container -->

    <script>
        function fn_submit() {
            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            var is_login = '{{sess_data('is_login')}}';
            if (is_login != true) {
                alert('로그인 후 이용해 주세요.');
                return;
            }

            var files = $('#attach_file')[0].files[0];
            if (files === undefined || files == null || files == '') {
                alert('수험표를 등록해 주세요.');
                return;
            } else {
                var ext = $('#attach_file').val().split('.').pop().toLowerCase();
                if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                    alert('등록 할수 없는 파일 확장자입니다.');
                    return;
                }
            }

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            if (!confirm('신청하시겠습니까?')) { return true; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    window.close();
                }
            }, showValidateError, null, false, 'alert');
        }
    </script>


@stop