@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; font-size:14px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2022/05/2645_top_bg.jpg) no-repeat center top;}
        .event01 {padding-bottom:100px; background:#f8f8f8}
        .event01 .tabs {width:920px; margin:0 auto 10px}
        .event01 .tabs li {display:inline; float:left; width:33.3333%}
        .event01 .tabs a {display:block; text-align:center; background:#fff; color:#3b393c; height:80px; line-height:80px; margin-right:10px; font-size:24px; border:1px solid #3b393c}
        .event01 .tabs a.active,
        .event01 .tabs a:hover {background:#3b393c; color:#fff}
        .event01 .tabs li:last-child a {margin:0}
        .event01 .tabs:after {content:''; display:block; clear:both}
        .event01 .title {color:#383838; font-size:30px; margin-bottom:40px}

        .evt_table {width:980px; margin:50px auto 0; border:1px solid #333; padding:50px}
        .evt_table table{width:100%;border-top:1px solid #e9e9e9;}
        .evt_table table tr {border-bottom:1px solid #e9e9e9}
        .evt_table table th,
        .evt_table table td {margin:10px 0; font-size:16px; color:#666}
        .evt_table table th {background:#f9f9f9; color:#000;}
        .evt_table thead th {background:#d9d9d9; color:#000; font-size:24px; font-weight:bold; padding:20px; border:1px solid #000}
        .evt_table table td{text-align:left; padding:15px 10px}
        .evt_table label {margin-right:10px; line-height:28px;}
        .evt_table input {vertical-align:middle}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; background:#f5f5f5; vertical-align:middle; width:80%; margin-bottom:5px}
        .evt_table td input[type=text]:last-child {margin-bottom:0}
        .evt_table input[type=checkbox] {height:20px; width:20px}
        .evt_table td li {display:inline-block; float:left; width:50%; margin-bottom:10px; letter-spacing:-1px}

        .check {margin:30px auto; text-align:left}
        .check p {margin-bottom:50px;padding-top:75px;}
        .check p a {display:block; width:525px; height:90px; line-height:90px; margin:0 auto; font-size:30px; color:#fff; background:#163C57; text-align:center; border-radius:90px;}
        .check p a:hover {color:#8d0033; background:#eee53b;}
        .check label {cursor:pointer; font-weight:bold;font-size:15px;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#504f4f; background:#ededed; margin-left:50px; border-radius:20px;font-size:15px;font-weight:bold;}

        .evt_table .btns {margin-top:40px}
        .evt_table .btns a {display:inline-block; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#42425b; margin:0 10px; border-radius:40px; padding:0 50px}
        .evt_table .btns a:hover {background:#fe544a}

        .evt_table .popup {position:absolute; top:0; left:0; width:100%; height: 100%; background-color:rgba(0,0,0,.7); display: flex; justify-content: center;
align-items: center;}
        .evt_table .popup span {display:block; font-size:48px; color:#fff; text-shadow: 0 5px 5px rgba(0,0,0,.5);}

        .evt_table .txtinfo {display:flex; text-align:left; margin-bottom:50px; background:#444; color:#fff}
        .evt_table .txtinfo div,
        .evt_table .txtinfo ul {padding:20px;}
        .evt_table .txtinfo div {font-size:16px; font-weight:bold; background:#222; display:flex; justify-content: center; align-items: center; text-align:center; width:15%}
        .evt_table .txtinfo li {list-style: dimical; margin-left:15px}

        .event02 {background:#dcf9f7;}

        .event03 {padding-bottom:100px; line-height:1.3}

        .event04 {background:#05c2b1;}

        .event05 {padding:100px 0}

        .urlWrap {width:1030px; margin:0 auto}
        .urlWrap .urladd {padding:20px; background:#2e2e3c; color:#fff; margin:0 auto 20px; font-size:14px}
        .urlWrap .urladd input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; background:#f5f5f5; vertical-align:middle; width:70%; margin:0 10px; color:#000}
        .urlWrap .urladd a {display:inline-block; height:28px; line-height:28px; color:#2e2e3c; background:#ffc943; padding:0 20px; vertical-align:middle}
        .urlWrap .evt_table {width:100%; background-color:#fff !important; padding:20px 0}
        .urlWrap .evt_table table td {font-size:14px; text-align:center}
        .urlWrap .evt_table table td:nth-child(2) {text-align:left}

        .evtBox {width:1120px; margin:0 auto; position:relative}
        .evtBox a:hover {background:rgba(0,0,0,.2)}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}
        .evtInfoBox li table {margin-top:10px; border:1px solid #ccc}
        .evtInfoBox li tr {border-bottom:1px solid #ccc}
        .evtInfoBox li th,
        .evtInfoBox li td {font-size:12px; padding:8px 2px; text-align:center; border-right:1px solid #ccc;}
        .evtInfoBox li th {font-size:13px; font-weight:bold; background:#111}
        .evtInfoBox li tbody th {background:#222}
    </style>

    @php
        $_arr_product = [
            'type1' => [
                ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194830' : '159829' => [
                    'prof_name' => '이경범'
                    ,'subject_name' => '교육학'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194829' : '159830' => [
                    'prof_name' => '신태식'
                    ,'subject_name' => '교육학'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194828' : '159831' => [
                    'prof_name' => '정현'
                    ,'subject_name' => '교육학'
                ]
            ]
            ,'type2' => [
                ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194783' : '159832' => [
                    'prof_name' => '송원영/권보민'
                    ,'subject_name' => '국어'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194784' : '159833' => [
                    'prof_name' => '구동언'
                    ,'subject_name' => '국어'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194785' : '159834' => [
                    'prof_name' => '김철홍/박태영'
                    ,'subject_name' => '수학'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194786' : '159835' => [
                    'prof_name' => '김현웅/박혜향'
                    ,'subject_name' => '수학'
                ]
                /*,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194787' : '_159836' => [
                    'prof_name' => '김병찬'
                    ,'subject_name' => '도덕/윤리'
                ]*/
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194788' : '_159837' => [
                    'prof_name' => '김민응'
                    ,'subject_name' => '도덕/윤리'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194789' : '_159838' => [
                    'prof_name' => '허역/정인홍/이웅재/김현중'
                    ,'subject_name' => '일반사회'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194790' : '_159839' => [
                    'prof_name' => '김종권'
                    ,'subject_name' => '역사'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194791' : '_159840' => [
                    'prof_name' => '다이애나'
                    ,'subject_name' => '음악'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194792' : '_159841' => [
                    'prof_name' => '최우영'
                    ,'subject_name' => '전기'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194793' : '_159842' => [
                    'prof_name' => '최우영'
                    ,'subject_name' => '전자'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194794' : '_159843' => [
                    'prof_name' => '장영희'
                    ,'subject_name' => '중국어'
                ]
            ]
        ];
    @endphp

    <div class="evtContent NSK">
        <div class="evtCtnsBox eventTop" data-aos="fade-up">
            <div class="wrap">
        	    <img src="https://static.willbes.net/public/images/promotion/2022/05/2645_top.jpg" alt="리얼 모의고사"/>
                <a href="http://naver.me/Ffp78XLz" target="_blank" title="위치" style="position: absolute; left: 65%; top: 75.44%; width: 7.86%; height: 3.11%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox event01" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/05/2645_01.jpg" alt="리얼 모의고사 응시"/>
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2645_01_01.jpg" alt="실전 감각 극대화"/>
            </div>
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2645_01_02.jpg" alt="경쟁자 사이 나의 위치 파악"/>
            </div>
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2645_01_03.jpg" alt="취약점 파악 및 보완"/>
            </div>
        </div>

        <div class="evtCtnsBox event03" data-aos="fade-up">
            @if (empty($arr_base['order_product']) === true)
                {{--접수전 화면--}}
                <div class="evt_table p_re">
                    <div class="txtinfo">
                        <div>온라인<br>모의고사<br>신청 관련<br>안내사항</div>
                        <ul>
                            <li>모의고사 신청을 위해 반드시 로그인을 하셔야 합니다.</li>
                            <li>모의고사 신청은 교육학과 전공과목을 각각 체크하셔야 하며, 출제 교수진을 선택해 주시면 됩니다.</li>
                            <li>모의고사 접수비용은 1만원입니다.</li>
                            <li>모의고사 신청 전 배송지를 다시 한번 확인하시기 바랍니다. (회원정보에서 변경가능)</li>
                            <li>모의고사는 를 응시할 때, 시간 체크 버튼을 클릭하고 시작해 주시기 바랍니다.(시험 시간관리에 도움이 됩니다.)</li>
                        </ul>
                    </div>
                    <table cellspacing="2" cellpadding="2">
                        <col width="12%" />
                        <col/>
                        <col width="12%" />
                        <col />
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{sess_data('mem_id')}}</td>
                                <th>이름</th>
                                <td>{{sess_data('mem_name')}}</td>
                            </tr>
                            <tr>
                                <th>연락처</th>
                                <td colspan="3"><input type="text" placeholder="{{sess_data('mem_phone')}}" readonly></td>
                            </tr>
                            <tr>
                                <th>교육학 선택<br>(택 1)</th>
                                <td colspan="3">
                                    <ul>
                                        <li><label><input class="btn-add-product prod-type-1" data-prod-type="1" type="checkbox" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194830' : '159829' }}" autocomplete="off"/> 교육학논술 (이경범 교수 출제)</label></li>
                                        <li><label><input class="btn-add-product prod-type-1" data-prod-type="1" type="checkbox" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194828' : '159831' }}" autocomplete="off"/> 교육학논술 (정   현 교수 출제)</label></li>
                                        <li><label><input class="btn-add-product prod-type-1" data-prod-type="1" type="checkbox" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194829' : '159830' }}" autocomplete="off"/> 교육학논술 (신태식 교수 출제)</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>전공과목 선택<br>(택 1)</th>
                                <td colspan="3">
                                    <ul>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194783' : '159832' }}" autocomplete="off"/> 국  어 (송원영/권보민 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194784' : '159833' }}" autocomplete="off"/> 국  어 (구동언 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194785' : '159834' }}" autocomplete="off"/> 수  학 (김철홍/박태영 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194786' : '159835' }}" autocomplete="off"/> 수  학 (김현웅/박혜향 교수 출제)</label></li>
                                        {{--<li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194787' : '_159836' }}" autocomplete="off"/> 도덕·윤리 (김병찬 교수 출제)</label></li>--}}
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194788' : '_159837' }}" autocomplete="off"/> 도덕·윤리 (김민응 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194789' : '_159838' }}" autocomplete="off"/> 일반사회 (허역/정인홍/이웅재/김현중 교수팀 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194790' : '_159839' }}" autocomplete="off"/> 역  사 (김종권 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194791' : '_159840' }}" autocomplete="off"/> 음  악 (다이애나 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194792' : '_159841' }}" autocomplete="off"/> 전  기 (최우영 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194793' : '_159842' }}" autocomplete="off"/> 전  자 (최우영 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194794' : '_159843' }}" autocomplete="off"/> 중국어 (장영희 교수 출제)</label></li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="tx-blue tx-right mt20">※  모의고사신청 비용: 10,000원</div>
                    <div class="check" id="chkInfo">
                        <label>
                            <input name="is_chk" id="is_chk" type="checkbox" value="Y" />
                            페이지 하단의 모의고사 관련 유의사항을 모두 확인하였고, 이에 동의합니다.
                        </label>
                        <a href="#careful" class="infotxt" > 이용안내 확인하기 ↓</a>
                    </div>
                    <div class="btns">
                        @if (empty($arr_base['order_product']) === false)
                            <a href="javascript:void(0);" onclick="alert('구매한 상품이 있습니다.'); return false;">신청하기 ></a>
                        @else
                            <a href="javascript:void(0);" onclick="directPay('off'); return false;">신청하기 ></a>
                        @endif
                        {{--<a href="javascript:void(0);">모의고사 마감</a>--}}
                    </div>
                    {{--<div class="popup"><span class="NSK-Black">마감되었습니다.</span></div>--}}
                </div>
            @else
                {{--접수완료 화면--}}
                @php
                    $params_d_day_strtotime = strtotime($arr_promotion_params['d_day']);
                    $order_product_list = array_pluck($arr_base['order_product'], 'OrderProdIdx', 'ProdCode');
                    $search_key_type1 = array_intersect(array_keys($order_product_list), array_keys($_arr_product['type1']));
                    $search_key_type2 = array_intersect(array_keys($order_product_list), array_keys($_arr_product['type2']));
                    $arr_result_1 = (empty($_arr_product['type1'][array_value_first($search_key_type1)]) === false ? $_arr_product['type1'][array_value_first($search_key_type1)] : null);
                    $arr_result_2 = (empty($_arr_product['type2'][array_value_first($search_key_type2)]) === false ? $_arr_product['type2'][array_value_first($search_key_type2)] : null);
                @endphp
                <div class="evt_table">
                    <div class="tx-blue tx-left mb10">※  접수 완료하였습니다. </div>
                    <table cellspacing="2" cellpadding="2">
                        <col width="15%" />
                        <col/>
                        <col width="15%" />
                        <col />
                        <thead>
                            <tr>
                                <th colspan="4">교원임용 Real 모의고사 접수 현황</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>시험명</th>
                                <td colspan="3">2023학년도 대비 중등임용 Real 모의고사 (주관: 윌비스 임용)</td>
                            </tr>
                            <tr>
                                <th>응시과목</th>
                                <td>{{ $arr_result_2['subject_name'] }}</td>
                                <th>출제 교수진</th>
                                <td>{{ $arr_result_1['prof_name'] . ' 교수, ' . $arr_result_2['prof_name'] . ' 교수' }}</td>
                            </tr>
                            <tr>
                                <th>수험번호</th>
                                <td colspan="3">
                                    @if (empty($register_count) === false && $arr_promotion_params['d_day'] <= date('YmdHis'))
                                        {{ $register_count[0]['EtcValue'] }}
                                    @else
                                        {{ '('.date('n', $params_d_day_strtotime) . '월'
                                            . date('j', $params_d_day_strtotime) . '일'
                                            . '(' . $arr_base['yoil'][date('w', $params_d_day_strtotime)] . ') '
                                            . date('H', $params_d_day_strtotime) . ':'
                                            . date('i', $params_d_day_strtotime) . ' 부터 확인 가능)' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>성명</th>
                                <td>{{ sess_data('mem_name') }}</td>
                                <th>연락처</th>
                                <td>{{ substr(sess_data('mem_phone'),0,3).'-'.substr(sess_data('mem_phone'),3,4) . '-'.substr(sess_data('mem_phone'),7,4) }}</td>
                            </tr>
                            <tr>
                                <th>접수일자</th>
                                <td>
                                    {{ date('Y.m.d H:i', strtotime($arr_base['order_product'][0]['OrderDatm'])) }}
                                </td>
                                <th>생년월일</th>
                                <td>
                                    {{  substr($arr_base['member_info']['BirthDay'],0,4) . '.'
                                        . substr($arr_base['member_info']['BirthDay'],4,2) . '.'
                                        . substr($arr_base['member_info']['BirthDay'],6,2) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt50 tx16">2022. 06. 12</div>
                    <div class="mt30 tx16">위와 같이 접수하고, 교원임용 Real 모의고사에 응시하고자 합니다.</div>
                    <div class="mt50"> <img src="https://static.willbes.net/public/images/promotion/2022/05/stamp.png" alt=""/></div>
                    <div class="btns">
                        <a href="{{ front_url('/support/qna/index') }}" target="_blank">모의고사 취소요청 하기</a>
                        @if (empty($register_count) === false && $arr_promotion_params['d_day'] <= date('YmdHis'))
                            <a href="javascript:void(0);" onclick="popup('{{ $arr_base['order_product'][0]['OrderNo'] }}'); return false;">모의고사 응시표 출력하기</a>
                        @endif
                    </div>
                    <div class="mt30">
                        ※ 모의고사 취소기한은 6월 6일(월)까지이며, 1:1상담게시판에 글을 남겨주시면 됩니다.<br>
                        ※ 응시표는 {{ date('m', $params_d_day_strtotime) . '월'
                                    . date('d', $params_d_day_strtotime) . '일'
                                    . '(' . $arr_base['yoil'][date('w', $params_d_day_strtotime)] . ') '
                                    . date('H', $params_d_day_strtotime) . ':'
                                    . date('i', $params_d_day_strtotime) . '부터 출력가능' }}
                    </div>
                </div>
            @endif
        </div>

        <div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">모의고사 접수 시, 유의사항(필독)</h4>
                <ul>
                    <li>본 실전 모의고사는 한 ID별 1회만 신청 가능합니다.</li>
                    <li>본 실전 모의고사 접수비는 1만원입니다. (교육학+전공A,B+답안지)</li>
                    <li>본 실전 모의고사ㄹ 응시를 위해서 6월6일(월)까지 접수(결제)를 완료하셔야 합니다.</li>
                    <li>본 실전 모의고사는 접수시에는 교육학과 전공과목의 출제 교수진을 반드시 선택하셔야 합니다.</li>
                    <li>본 실전 모의고사의 환불은 홈페이지 1:1상담 게시판을 통하여 요청하시면 됩니다.</li>
                    <li>본 실전 모의고사 접수 마감일 이후에는 환불 및 출제교수진 변경이 불가합니다.</li>
                    <li>본 실전 모의고사의 출제 교수진 변경 방법은 환불 후, 재 신청하는 방식이며, 접수 마감일 후에는 변경할 수 없습니다.</li>
                    <li>본 실전 모의고사를 응시할 때에는 본 페이지의 타임을 재생하시고 응시하면 시간관리에 도움이 됩니다.</li>
                    <li>본 실전 모의고사는 별도의 채점 서비스는 실시하지 않습니다.</li>
                    <li>본 실전 모의고사 응시 후, 해설자료와 해설강의를 청강할 수 있습니다. (과목별 확인)
                        <table cellspacing="0" cellpadding="0">
                            <col />
                            <col width="13%"/>
                            <col width="13%"/>
                            <col width="13%"/>
                            <col width="13%"/>
                            <col width="13%"/>
                            <col width="13%"/>
                            <col width="13%"/>
                            <thead>
                                <tr>
                                    <th rowspan="2">구분</th>
                                    <th colspan="3">교육학</th>
                                    <th colspan="2">국어</th>
                                    <th colspan="2">수학</th>
                                </tr>
                                <tr>
                                    <th>이경범</th>
                                    <th>정현</th>
                                    <th>신태식</th>
                                    <th>송원영/권보민</th>
                                    <th>구동언</th>
                                    <th>김철홍/박태영</th>
                                    <th>김현웅/박혜향</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>해설지제공</th>
                                    <td>O</td>
                                    <td>O</td>
                                    <td>O</td>
                                    <td>O</td>
                                    <td>O</td>
                                    <td>O</td>
                                    <td>O</td>
                                </tr>
                                <tr>
                                    <th>해설강의</th>
                                    <td>O</td>
                                    <td>O</td>
                                    <td>O</td>
                                    <td>O</td>
                                    <td>X</td>
                                    <td>O</td>
                                    <td>O</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th rowspan="2">구분</th>
                                    <th colspan="2">일반사회</th>
                                    <th>도덕윤리</th>
                                    <th>역사</th>
                                    <th>음악</th>
                                    <th>전기.전자</th>
                                    <th>중국어</th>
                                </tr>
                                <tr>
                                    <th colspan="2">허역 / 정인홍 / 이웅재 / 김현중</th>
                                    <th>김민웅</th>
                                    <th>김종권</th>
                                    <th>다이애나</th>
                                    <th>최우영</th>
                                    <th>장영희</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>해설지제공</th>
                                    <td colspan="2">O</td>
                                    <td>X</td>
                                    <td>O</td>
                                    <td>O</td>
                                    <td>O</td>
                                    <td>O</td>
                                </tr>
                                <tr>
                                    <th>해설강의</th>
                                    <td colspan="2">X</td>
                                    <td>O</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>O</td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <li>본 실전 모의고사를 응시 후, 해설강의 페이지에서는 하반기 패키지 10%할인권을 다운받을 수 있습니다. (일부과목 제외)</li>
                </ul>
            </div>
        </div>  
    </div>
    <div id="order_div_off" style="display: none"></div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $(document).ready(function(){
        AOS.init();
      });
    </script>

    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);
                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault()
                });
            });
        });

        $(document).ready(function(){
            // 상품클릭
            $(".btn-add-product").on('click', function () {
                var this_prod_type = $(this).data("prod-type");
                var this_learn_pattern = 'off';
                var this_prod_code = $(this).val();
                var param_check = $("#order_div_"+this_learn_pattern).find('#_product_'+this_prod_code).val();

                if ($(".prod-type-"+this_prod_type+":checked").length > 1) {
                    $(".prod-type-"+this_prod_type).prop('checked',false);
                    $(this).prop('checked',true);
                    $("#order_div_"+this_learn_pattern).find(".box-type-"+this_prod_type).remove();
                }

                if (typeof param_check === 'undefined') {
                    $("#order_div_"+this_learn_pattern).append('<input class="box-type-'+this_prod_type+' order-id-'+this_prod_code+'" type="checkbox" name="y_pkg" id="_product_' + this_prod_code + '" value="' + this_prod_code + '" checked="checked"/>');
                }

                // 체크해제
                if ($(this).is(":checked") === false) {
                    $("#order_div_"+this_learn_pattern).find('#_product_'+this_prod_code).remove();
                }
            });
        });

        function directPay(_learn_pattern) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.', 'Y') !!}
            var cnt_1 = $("#order_div_"+_learn_pattern).find(".box-type-1").length;
            var cnt_2 = $("#order_div_"+_learn_pattern).find(".box-type-2").length;

            var cart_type = '', learn_pattern = '', is_direct_pay = '', cart_onoff_type = '';
            if (_learn_pattern == 'off') {
                cart_type = 'off_lecture';
                learn_pattern = 'off_lecture';
                is_direct_pay = 'Y';
                cart_onoff_type = 'off';
            } else {
                cart_type = 'on_lecture'
                learn_pattern = 'adminpack_lecture'
                is_direct_pay = 'Y'
                cart_onoff_type = '';
            }

            if (cnt_1 < 1) { alert('교육학 신청은 필수입니다.'); return; }
            if (cnt_2 < 1) { alert('전공과목 신청은 필수입니다.'); return; }

            if ($("#is_chk").is(':checked') === false) {
                alert('모의고사 관련 유의사항 안내에 동의하셔야 합니다.');
                return;
            }
            //결제하기
            goCartNDirectPay('order_div_'+_learn_pattern, 'y_pkg', cart_type, learn_pattern, is_direct_pay, cart_onoff_type);
        }

        function popup(order_no){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var url = "{{ site_url('/pass/promotion/popup/' . $arr_base['promotion_code']) }}?order_no="+order_no;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=600,height=630');
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop