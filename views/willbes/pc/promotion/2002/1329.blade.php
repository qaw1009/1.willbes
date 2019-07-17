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

        .top_police{background:#404040}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/07/1329_top_bg.jpg) no-repeat center top;}
        .evt01 {padding-bottom:120px}               
        .evt01 .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evt01 .request h3 {font-size:18px; color:#000; font-weight:bold}
        .evt01 .request td {padding:10px}
        .evt01 .request input {height:26px;}
        .evt01 .requestL {width:49%; float:left}
        .evt01 .requestR {width:49%; float:right; }
        .evt01 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:241px; overflow-y:scroll }
        .evt01 .requestL li {display:inline-block; margin-right:10px}
        .evt01 .requestR li {margin-bottom:5px}
        .evt01 .request:after {content:""; display:block; clear:both}
        .evt01 .btn {clear:both; width:900px; margin:0 auto;}
        .evt01 .btn a {display:block; text-align:center; font-size:28px; color:#fff; background:#2f3d54; padding:20px 0; margin-top:30px; border-radius:50px; box-shadow:0 10px 10px rgba(0,0,0,.2);}
        .evt01 .btn a:hover {background:#e71833}
        .evt02 {background:#2e3c52 url(https://static.willbes.net/public/images/promotion/2019/07/1329_02_bg.jpg) no-repeat center top; padding-top:100px}         
        .evt03 {background:#fff;} 

        /*라이브영상*/
        #movieFrame1 {position:relative; width:1120px; height:694px; margin:0 auto; padding-top:14px; background:url(https://static.willbes.net/public/images/promotion/live/liveTV.png) no-repeat center top;}
        #movieFrame2 {position:relative; width:1120px; height:694px; margin:0 auto; padding-top:14px; background:url(https://static.willbes.net/public/images/promotion/live/liveTV.png) no-repeat center top;}
        .embedWrap {position:relative; width:980px; height:551px; margin:0 auto}
        .embedWrap {position:relative; width:980px; height:551px; margin:0 auto}
        .embed-container {padding-bottom:46.25%; overflow:hidden; width:100%; min-height:551px; margin:0 auto}
        /*크롬*/
        @@media screen and (-webkit-min-device-pixel-ratio:0) {
        #movieFrame {position:relative; width:1120px; height:694px; margin:0 auto; padding-top:14px; background:url(https://static.willbes.net/public/images/promotion/2019/05/1227_03_liveBg_L.jpg) no-repeat center center;}
        .embedWrap {position:relative; width:980px; height:551px; margin-left:70px; background:url(https://static.willbes.net/public/images/promotion/2019/05/1227_03_live01.jpg) no-repeat center center;}
        .embed-container {padding-bottom:46.25%; overflow:hidden; width:980px; height:auto; margin:0 auto;}
        .mobileCh {position:absolute; left:0; bottom:0; width:980px;}
        .mobileCh li {display:inline; float:left; width:490px;}
        .mobileCh li a {display:block;}
        .mobileCh li a.ch2 {color:#6CF}
        .mobileCh li a:hover {color:#FC0}
        .mobileCh:after {content:""; display:block; clear:both}
        }
        /*모바일*/
        .mobileCh {position:absolute; bottom:0; width:980px;}
        .mobileCh li {display:inline; float:left; width:50%;}
        .mobileCh li a {display:block;}
        .mobileCh li:last-child a {margin:0}
        .mobileCh li a.ch2 {color:#6CF}
        .mobileCh li a:hover {color:#FC0}
        .mobileCh:after {content:""; display:block; clear:both}

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


            <div class="evtCtnsBox top_police">
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1329_00.jpg" title="대한민국 경찰학원 1위">
            </div>
            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1329_top.jpg" title="합격전략 환승 설명회">
            </div>

            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1329_01.jpg" title="출제가능한 문제만 모조리 정리한다">
                <div class="request" id="request">
                    <div class="requestL">
                        <h3>* 장정훈 경찰학 무료특강 신청접수</h3>
                        <table width="0" cellspacing="0" cellpadding="0" class="table_type">
                            <col width="20%" />
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
                                    <input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" placeholder="전화번호 숫자만 입력." maxlength="11">
                                </td>
                            </tr>
                            <tr>
                                <th>* 참여일</th>
                                <td>
                                    <ul>
                                        <li><input type="radio" name="register_data1" id="campus1" value="7.21(일)" /> <label for="campus1">7.21(일)</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>* 캠퍼스</th>
                                <td>
                                    <ul>
                                        <li><input type="radio" name="register_data2" id="campus2" value="노량진" /> <label for="campus2">노량진</label></li>
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
                        <h3>* 개인정보 수집 및 이용에 대한 안내</h3>
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
                    <a href="#none" onclick="javascript:fn_submit();">장정훈 경찰학 무료특강 신청하기 ></a>
                </div>
            </div>

            <div class="evtCtnsBox evt02">
                @include('willbes.pc.promotion.live_video_partial')
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1329_02.jpg" title="라이브 특강 진행 안내">                
            </div>
            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1329_03.jpg" title="무엇이든 물어보세요~">                
            </div>
            {{--url댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif
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

            if (!confirm('저장하시겠습니까?')) { return true; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }
    </script>
@stop