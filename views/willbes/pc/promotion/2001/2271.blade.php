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
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,1);}

        /************************************************************/
        .skybanner {position:fixed;top:200px;right:10; width:133px; z-index:100;}

        .evt00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/07/2271_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#f0f3f7;}
        .evt03 {background:#6990cd; padding:100px 0}
        

        .form_area{width:980px; background:#fff; margin:0 auto;padding:65px;}
        .form_area h4{height:60px;line-height:60px;font-size:30px; background:#344963; color:#fff;}
        .form_area h5{font-size:16px;margin-bottom:10px;font-weight:bold; color:#344963;}
        .form_area strong {display:inline-block; width:120px; color:#344963}
        .form_area .star {color:#344963; margin-right:5px;font-size:7px; vertical-align:middle}
        .privacy {text-align:left; margin-top:30px; font-size:16px;}
        .privacy p {margin-bottom:15px}

        .form_area label{font-weight:bold;font-size:14px;display:inline-block; margin-left:5px; margin-right:10px}
        .form_area label.username{letter-spacing:10px;letter-spacing:3.5px;}
        .form_area input[type=text],
        .form_area input[type=tel] { height:30px; line-height:30px}
        .form_area input[type=checkbox],
        .form_area input[type=radio]{padding-left:15px; width:18px; height:18px}
        .form_area .check_contact .check{font-weight:normal;}
        .form_area .check_contact strong {font-weight:bold; width:100%}
        .form_area #look {width:100px;height:30px;}
        .form_area #userId {vertical-align:bottom;}
        .area li {display:inline !important; float:left; width:16.66666%; line-height:1.5; margin-bottom:5px}
        .area:after {content:""; display:block; clear:both}
        input:checked + label {color:#1087ef;}

        .privacy .info{padding:20px; border:1px solid #e4e4e4;margin-top:20px}
        .privacy .info li{font-size:12px; list-style:decimal; margin-left:15px; line-height:1.5; margin-bottom:10px}
        .detail{line-height:20px;}
        .accept{text-align: center;padding: 20px 0 50px 0;font-size: 17px;font-weight: bold;}

        .form_area .btn a {font-size:30px; display:block; border-radius:50px; background:#344963; color:#fff; padding:20px 0}
        .form_area .btn a:hover {background:#000;}


        .evt04 {background:#344963; padding-bottom:100px;}
        .evt04 > div {width:700px; margin:0 auto}
        .evt04 div table {table-layout: auto; border-top:1px solid #757578;}
        .evt04 div table th,
        .evt04 div table td {padding:10px 5px; border-bottom:1px solid #757578; border-right:1px solid #757578; text-align: center; font-weight: 600; font-size:20px}
        .evt04 div table th {background: #252525; color:#fff;}
        .evt04 div table td {font-size:18px; color:#fff;}
        .evt04 div table td div {position:relative}
        .evt04 div table td span {position:absolute; width:100%; top:0; left:0; z-index:5}
        .evt04 div table td span.first_come {position:absolute;width:100%;left:48%;margin-left:-59px;margin-top:-59px;}
        .evt04 div table td span.bubble {position:absolute;width:100%;left:125%;margin-left:-59px;margin-top:-69px;}
        .evt04 div table tbody th {background: #f9f9f9; color:#555;}
        .evt04 div table tbody th:last-child,
        .evt04 div table tbody td:last-child {border-right:0;}
        

        .evt05 {background:#061e36;}

        .evtInfo {padding:80px 0; background:#333; color:#f0f0f0; font-size:16px;}
        .evtInfoBox {width:980px; margin:0 auto; text-align:left; line-height:1.5}
        .evtInfoBox li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px;}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
        .evtInfoBox ul {margin-bottom:30px}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#to_go"><img src="https://static.willbes.net/public/images/promotion/2021/07/2271_sky.jpg" alt="신청하기" ></a>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg" title="신광은 경찰팀">
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2271_top.jpg" title="봉투모의고사">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2271_01.jpg" title="모의고사와 비교불가">            
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2271_02.jpg" title="모의고사와 비교불가">            
        </div>

        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" name="register_chk_el_idx" value="{{ $data['ElIdx'] }}"/> {{-- 하나수강만 선택 가능할시 --}}
            <input type="hidden" name="target_params[]" value="register_data1[]"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="희망지원청"/> {{-- 체크 항목 전송 --}}

            <input type="hidden" name="register_chk[]" id="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>
            <div class="evtCtnsBox evt03">
                <div id="apply">
                    <div class="form_area" id="to_go">
                        <h4 class="NSK-Black">신광은경찰팀 봉투 모의고사 이벤트</h4>
                        <div class="privacy">
                            <div class="contacts NSK">
                                <p><strong><span class="star">▶</span>이름</strong><input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" readonly /></p>
                                <p><strong><span class="star">▶</span>연락처</strong><input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" title="연락처" maxlength="11" readonly/></p>
                                <p class="check_contact">
                                    <strong><span class="star">▶</span>21년 2차 응시지원청</strong><br>
                                <ul class="area">
                                    <li><input type="checkbox" name="register_data1[]" id="aa1" value="서울청"><label for="aa1"> 서울청</label></li>
                                    <li><input type="checkbox" name="register_data1[]" id="aa2" value="대구청"><label for="aa2"> 대구청</label></li>
                                    <li><input type="checkbox" name="register_data1[]" id="aa3" value="인천청"><label for="aa3"> 인천청</label></li>
                                    <li><input type="checkbox" name="register_data1[]" id="aa4" value="광주청"><label for="aa4"> 광주청</label></li>
                                    <li><input type="checkbox" name="register_data1[]" id="aa5" value="대전청"><label for="aa5"> 대전청</label></li>
                                    <li><input type="checkbox" name="register_data1[]" id="aa6" value="울산청"><label for="aa6"> 울산청</label></li>
                                    <li><input type="checkbox" name="register_data1[]" id="aa7" value="경기남부"><label for="aa7"> 경기남부</label></li>
                                    <li><input type="checkbox" name="register_data1[]" id="aa8" value="경기북부"><label for="aa8"> 경기북부</label></li>
                                    <li><input type="checkbox" name="register_data1[]" id="aa9" value="강원청"><label for="aa9"> 강원청</label></li>
                                    <li><input type="checkbox" name="register_data1[]" id="aa10" value="충북청"><label for="aa10"> 충북청</label></li>
                                    <li><input type="checkbox" name="register_data1[]" id="aa11" value="충남청"><label for="aa11"> 충남청</label></li>
                                    <li><input type="checkbox" name="register_data1[]" id="aa12" value="전북청"><label for="aa12"> 전북청</label></li>
                                    <li><input type="checkbox" name="register_data1[]" id="aa13" value="전남청"><label for="aa13"> 전남청</label></li>
                                    <li><input type="checkbox" name="register_data1[]" id="aa14" value="경북청"><label for="aa14"> 경북청</label></li>
                                    <li><input type="checkbox" name="register_data1[]" id="aa15" value="경남청"><label for="aa15"> 경남청</label></li>
                                    <li><input type="checkbox" name="register_data1[]" id="aa16" value="부산청"><label for="aa16"> 부산청</label></li>
                                    <li><input type="checkbox" name="register_data1[]" id="aa17" value="제주청"><label for="aa17"> 제주청</label></li>
                                </ul>
                                </p>
                            </div>
                            {{--
                            <div class="formfield">
                                <select id="look" name="register_data2[]">
                                    <option value="">응시직렬</option>
                                    <option value="일반남자">일반남자</option>
                                    <option value="일반여자">일반여자</option>
                                    <option value="101단">101단</option>
                                    <option value="경행경채">경행경채</option>
                                </select>
                                <input type="text" id="userId" name="register_data3[]" maxlength="5" placeholder="응시번호 입력">
                            </div>
                            <div class="mt30 mb30 tx14">
                                * 이름 및 연락처 수정은 로그인 후 회원정보 수정을 통해 가능합니다.
                            </div>
                            --}}
                            <div class="info">
                                <h5><span class="star">▶</span>개인정보 수집 및 이용에 대한 안내</h5>
                                <ul>
                                    <li>개인정보 수집 이용 목적<br/>
                                        - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대<br/>
                                        - 이벤트 참여에 따른 강의 수강자 목록에 활용
                                    </li>
                                    <li>개인정보 수집 항목<br/>
                                        - 신청인의 이름,연락처, 희망청
                                    </li>
                                    <li>개인정보 이용기간 및 보유기간<br/>
                                        - 본 수집, 활용목적 달성 후 바로 파기
                                    </li>
                                    <li>개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br/>
                                        - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p class="accept">
                            <input type="checkbox" name="is_chk" id="is_chk" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                        </p>
                        <div class="btn NSK-Black">
                            <a onclick="javascript:fn_submit();">
                                7월 봉투 모의고사 이벤트 참여하기 >
                            </a>
                        </div>
                    </div>
                </div>
            </div>            
        </form>


        <form id="add_apply_form" name="add_apply_form">
            <div class="evtCtnsBox evt04" id="evt">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <input type="hidden" name="apply_chk_el_idx" value="{{ $data['ElIdx'] }}"/>
                @foreach($arr_base['add_apply_data'] as $row)
                    {{--<input type="radio" name="add_apply_chk[]" id="add_apply_{{ $row['EaaIdx'] }}" value="{{$row['EaaIdx']}}" />
                    <label for="register_chk_{{ $row['EaaIdx'] }}">{{ $row['Name'] }}</label>--}}
                    {{--                    @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyStartDatm']))--}}
                    @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyEndDatm']))
                        <input type="hidden" name="add_apply_chk[]" value="{{$row['EaaIdx']}}" />
                        @break;
                    @endif
                @endforeach

                <img src="https://static.willbes.net/public/images/promotion/2021/07/2271_03.jpg" title="봉투모의고사 선착순 증정">
                <div>
                    <table cellspacing="0" cellpadding="0">
                        <colgroup>
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                        </colgroup>
                        <tbody>
                        @if(empty($arr_base['add_apply_data']) === false)
                            @php $col_cnt = 5; @endphp
                            @for($i=0; $i < count($arr_base['add_apply_data']); $i++)
                                @if($i==0 || $i%$col_cnt == 0)
                                    @php $tr_i = $i; @endphp
                                    <tr>
                                        @endif
                                        <td>{{$arr_base['add_apply_data'][$i]['Name']}}</td>
                                        @if($i==($tr_i+$col_cnt-1) || $i == (count($arr_base['add_apply_data']))-1)
                                            @if($i == (count($arr_base['add_apply_data']))-1) {{-- 마지막일때 --}}
                                            @php
                                                $remain_cnt = $col_cnt - (count($arr_base['add_apply_data'])%$col_cnt);
                                                if($remain_cnt == $col_cnt) $remain_cnt = 0;
                                            @endphp
                                            @if($remain_cnt != 0)
                                                @for($r=0; $r < $remain_cnt; $r++)
                                                    <td></td>
                                                @endfor
                                            @endif
                                            @endif
                                    </tr>
                                    @php $temp_j = 0; @endphp
                                    @for($j=($i-$col_cnt+1+(empty($remain_cnt)? 0 : $remain_cnt)); $j <= $i; $j++)
                                        @if($j==0 || ($j%$col_cnt == 0  && $temp_j == 0) || ($i == (count($arr_base['add_apply_data']))-1 && $temp_j == 0) )
                                            <tr>
                                                @endif
                                                <td>
                                                    <div>
                                                        @if(time() >= strtotime($arr_base['add_apply_data'][$j]['ApplyEndDatm']) || $arr_base['add_apply_data'][$j]['PersonLimit'] <= $arr_base['add_apply_data'][$j]['MemberCnt'])
                                                            <span><img src="https://static.willbes.net/public/images/promotion/2021/07/2271_02_img02.png" alt="마감"></span>
                                                        @endif
                                                        <img src="https://static.willbes.net/public/images/promotion/2021/07/2271_02_img01.png" alt="">
                                                    </div>
                                                </td>
                                                @if($j==($tr_i+$col_cnt-1) || $j == (count($arr_base['add_apply_data']))-1)
                                                    @if(empty($remain_cnt) === false && $remain_cnt != 0)
                                                        @for($r=0; $r < $remain_cnt; $r++)
                                                            <td></td>
                                                        @endfor
                                                    @endif
                                            </tr>
                                        @endif
                                        @php $temp_j++; @endphp
                                    @endfor
                                @endif

                            @endfor
                        @endif

                        </tbody>
                    </table>
                </div>
                <div class="mt50">
                    <a onclick="javascript:fn_add_apply_submit();" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/07/2271_03_btn.png"  alt="이벤트신청"/></a>
                </div>
            </div>
        </form>


        <div class="evtCtnsBox evt05">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2271_04.jpg" title="봉투모의고사">
                <a href="#none" title="경찰학" style="position: absolute; left: 9.29%; top: 39.74%; width: 17.95%; height: 2.99%; z-index: 2;"></a>
                <a href="#none" title="형법" style="position: absolute; left: 41.16%; top: 39.74%; width: 17.95%; height: 2.99%; z-index: 2;"></a>
                <a href="#none" title="신광은/김원욱 특강" style="position: absolute; left: 72.86%; top: 39.74%; width: 17.95%; height: 2.99%; z-index: 2;"></a>
                <a href="#none" title="빅매치2" style="position: absolute; left: 29.73%; top: 87.91%; width: 40.63%; height: 3.95%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evtInfo" id="careful">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">유의사항</h4>
                <div class="infoTit"><strong>봉투모의고사 구성안내(자료)</strong></div>
                <ul>
                    <li>봉투 모의고사 구성은 한국사,영어,형법,형소법,경찰학개론,수사,행정법<br>
                        과목별 3회분 봉투모의고사 및 OMR카드 프린트 출력(2회제한)으로 제공됩니다. (강의X)</li>
                    <li>이벤트 상품은 비매품으로 자료는 절대 판매할수 없습니다.</li>
                </ul>
                <div class="infoTit"><strong>봉투모의고사 이벤트 신청안내</strong></div>
                <ul>
                    <li>신청기간 : 2021년 7월 19일~7월 30일까지 ,매일 19시부터 선착순 200명(주말제외)</li>
                    <li>신청방법<br>
                        - 로그인 이후 이벤트 페이지에서 신청가능합니다(희망응시청 필수 체크)<br>
                        - 한ID 당 매일 1회  , 총 10번 신청하기 가능(200명 이벤트 당첨시 중복참여불가)<br>
                        - 당첨시 로그인 > 내강의실 > 관리자 부여강좌 >단과확인</li>
                </ul>
                <div class="infoTit"><strong>이벤트 봉투모의고사</strong></div>
                <div>
                    - 무료이벤트  진행 : 매일 19시 선착순 200권 , 단 10일, 총 2,000명 </br>
                    - 자료파일로 제공하며 2회 출력제한이 있습니다.</br>
                    - 봉투모의고사 문제및 해설의 소유권 및 판권은㈜윌비스 신광은경찰학원에 있습니다.</br>
                    - 무단복사 및 판매시 저작권법에 의거 경고조치 없이 고발하여 민.형사상 책임을 지게 됩니다.
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        // 무료 당첨
        function fn_add_apply_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            @if(ENVIRONMENT == 'production')
                @if(date('YmdHi') < '202102102000')
                    alert('2월10일 20:00 부터 이벤트 참여 가능합니다.');
                    return;
                @endif
            @endif

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
                ['신청 되었습니다.','당첨을 축하합니다. 내강의실에서 확인해 주세요.'],
                //['이벤트 신청후 이용 가능합니다.','봉투모의고사 신청후 이용 가능합니다.'],
                ['마감되었습니다.','내일 20시에 다시 도전해 주세요.']
            ];
            for (var i = 0; i < arr_apply_msg.length; i++) {
                if(arr_apply_msg[i][0] == ret_msg) {
                    apply_msg = arr_apply_msg[i][1];
                }
            }
            if(apply_msg == '') apply_msg = ret_msg;
            return apply_msg;
        }

        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            if ($regi_form_register.find('input[name="register_data1[]"]:checked').length == 0) {
                alert('희망지원청을 선택 해주세요.');
                return;
            }

            if ($regi_form_register.find('input[name="register_data1[]"]:checked').length > 1) {
                alert('희망지원청은 1개까지만 선택 가능합니다.');
                return;
            }

            if (!confirm('신청하시겠습니까?')) { return; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop