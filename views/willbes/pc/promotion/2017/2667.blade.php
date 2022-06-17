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
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2022/05/2667_top_bg.jpg) no-repeat center top;}
        .eventTop span {position: absolute; top:350px; left:50%; width:810px; z-index: 10;}
        .event01 {background:#f4f4f4}

        .event01 .title {color:#383838; font-size:30px; margin-bottom:40px}

        .event02 {background:#ffc227; padding-bottom:100px}
        .event02 .youtubeWrap {width:980px; margin:0 auto; background:none}
        .event02 .youtubetab {display:flex; margin-bottom:30px}
        .event02 .youtubetab li {width:33.3333%}
        .event02 .youtubetab a {display:block; text-align:center; background:#d3a01d; color:#2e2e2e; height:80px; line-height:80px; margin-right:10px; font-size:24px; border-radius:60px; font-weight:bold}
        .event02 .youtubetab a.active,
        .event02 .youtubetab a:hover {background:#1b1b1b; color:#fff}
        .event02 .youtubetab li:last-child a {margin:0}
        .event02 .youtubeBox {position:relative; padding-bottom:56.25%; overflow: hidden; max-width: 100%; }
        .event02 .youtubeBox iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

        .event03 {padding:150px 0; line-height:1.3;}
        .event03 .tabBtns {width:980px; margin:0 auto; display:block; font-size:30px; border:2px solid #000; padding:20px; background:#000; color:#fff }
        .event03 .tabBtns strong {color:#ffc227}

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

        .evt_table {width:980px; margin:0 auto; border:1px solid #000; padding:50px}
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

        .evt_table .popup {position:absolute; top:0; left:0; width:100%; height: 100%; background-color:rgba(0,0,0,.7); display: flex; justify-content: center; align-items: center;}
        .evt_table .popup span {display:block; font-size:48px; color:#fff; text-shadow: 0 5px 5px rgba(0,0,0,.5);}

        .evt_table .txtinfo {display:flex; text-align:left; margin-bottom:50px; background:#444; color:#fff}
        .evt_table .txtinfo div,
        .evt_table .txtinfo ul {padding:20px;}
        .evt_table .txtinfo div {font-size:16px; font-weight:bold; background:#222; display:flex; justify-content: center; align-items: center; text-align:center; width:15%}
        .evt_table .txtinfo li {list-style: dimical; margin-left:15px}
        .evt_table .txtinfo li a {display:inline-block; font-size:12px; color:#ffff00; border:1px solid #ffff00; border-radius:20px; padding:2px 10px}
    </style>

    @php
        $_arr_product = [
            'type1' => [
                ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196788' : '159829' => [
                    'prof_name' => '이경범'
                    ,'subject_name' => '교육학'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196789' : '159830' => [
                    'prof_name' => '신태식'
                    ,'subject_name' => '교육학'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196790' : '159831' => [
                    'prof_name' => '정현'
                    ,'subject_name' => '교육학'
                ]
            ]
            ,'type2' => [
                ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196791' : '159832' => [
                    'prof_name' => '송원영/권보민'
                    ,'subject_name' => '국어'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196792' : '159833' => [
                    'prof_name' => '구동언'
                    ,'subject_name' => '국어'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196795' : '159834' => [
                    'prof_name' => '김철홍/박태영'
                    ,'subject_name' => '수학'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196796' : '159835' => [
                    'prof_name' => '김현웅/박혜향'
                    ,'subject_name' => '수학'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196797' : '_159837' => [
                    'prof_name' => '김민응'
                    ,'subject_name' => '도덕/윤리'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196798' : '_159838' => [
                    'prof_name' => '허역 교수팀 출제'
                    ,'subject_name' => '일반사회'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196799' : '_159839' => [
                    'prof_name' => '김종권'
                    ,'subject_name' => '역사'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196800' : '_159840' => [
                    'prof_name' => '다이애나'
                    ,'subject_name' => '음악'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196801' : '_159841' => [
                    'prof_name' => '최우영'
                    ,'subject_name' => '전기'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196802' : '_159842' => [
                    'prof_name' => '최우영'
                    ,'subject_name' => '전자'
                ]
                ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196803' : '_159843' => [
                    'prof_name' => '장영희'
                    ,'subject_name' => '중국어'
                ]
            ]
        ];
    @endphp

    <div class="evtContent NSK">
        <div class="evtCtnsBox eventTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2667_top.jpg" alt="온라인 모의고사"/>
            <span data-aos="fade-left" data-aos-offset="500"><img src="https://static.willbes.net/public/images/promotion/2022/05/2667_top_img.png" alt=""/></span>
        </div>

        <div class="evtCtnsBox event01" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/05/2667_01.jpg" alt="온라인 모의고사 응시"/>
        </div>

        <div class="evtCtnsBox event02" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/05/2667_02.jpg" alt="온라인 모의고사 응시"/>
            <div class="youtubeWrap">
                <ul class="youtubetab">
                    <li><a href="#tab1" class="active">1교시 : 교육학 60분</a></li>
                    <li><a href="#tab2">2교시 : 전공A 90분</a></li>
                    <li><a href="#tab3">3교시 : 전공B 90분</a></li>
                </ul>
                <div id="tab1" class="youtubeBox"><iframe src='https://www.youtube.com/embed/cC3v33lSAIk' frameborder='0' allowfullscreen></iframe></div>
                <div id="tab2" class="youtubeBox">2교시 타이머 영상</div>
                <div id="tab3" class="youtubeBox">3교시 타이머 영상</div>
            </div>
        </div>

        <div class="evtCtnsBox event03" data-aos="fade-up">
            <div class="tabBtns NSK-Black">
                윌비스 임용 <strong>실전 모의고사 </strong> 접수
            </div>
            @if (empty($arr_base['order_product']) === true)
                {{--접수전 화면--}}
                <div class="evt_table p_re">
                    <div class="txtinfo">
                        <div>실전<br>모의고사<br>신청 관련<br>안내사항</div>
                        <ul>
                            <li>모의고사 신청을 위해 반드시 로그인을 하셔야 합니다.</li>
                            <li>모의고사 과목별, 출제교수별 중복선택이 가능합니다.</li>
                            <li>모의고사 접수비용은 과목별 5천원입니다.</li>
                            <li>모의고사 신청 전 배송지를 다시 한번 확인하시기 바랍니다. <a href="{{ app_url('/member/change/index/info', 'www') }}" target="_blank">배송지 변경 ></a></li>
                            <li>모의고사는 를 응시할 때, 시간 체크 버튼을 클릭하고 시작해 주시기 바랍니다.(시험 시간관리에 도움이 됩니다.)</li>
                        </ul>
                    </div>
                    <table cellspacing="2" cellpadding="2">
                        <col width="14%" />
                        <col/>
                        <col width="14%" />
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
                                <th>배송지</th>
                                <td colspan="3">
                                    <input type="hidden" id="addr_type" value="{{ (empty($arr_base['member_info']['Addr1']) === false ? 'Y' : 'N') }}">
                                    {{ (sess_data('is_login') == true) ? $arr_base['member_info']['Addr1'] . ' ' . $arr_base['member_info']['Addr2'] : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>교육학 선택<br>(중복선택 가능)</th>
                                <td colspan="3">
                                    <ul>
                                        <li><label><input class="btn-add-product prod-type-1" data-prod-type="1" type="checkbox" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196788' : '159829' }}" autocomplete="off"/> 교육학논술 (이경범 교수 출제)</label></li>
                                        <li><label><input class="btn-add-product prod-type-1" data-prod-type="1" type="checkbox" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196789' : '159831' }}" autocomplete="off"/> 교육학논술 (정   현 교수 출제)</label></li>
                                        <li><label><input class="btn-add-product prod-type-1" data-prod-type="1" type="checkbox" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196790' : '159830' }}" autocomplete="off"/> 교육학논술 (신태식 교수 출제)</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>전공과목 선택<br>(중복선택 가능)</th>
                                <td colspan="3">
                                    <ul>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196791' : '159832' }}" autocomplete="off"/> 국  어 (송원영/권보민 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196792' : '159833' }}" autocomplete="off"/> 국  어 (구동언 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196795' : '159834' }}" autocomplete="off"/> 수  학 (김철홍/박태영 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196796' : '159835' }}" autocomplete="off"/> 수  학 (김현웅/박혜향 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196797' : '_159837' }}" autocomplete="off"/> 도덕·윤리 (김민응 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196798' : '_159838' }}" autocomplete="off"/> 일반사회 (허역 교수팀 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196799' : '_159839' }}" autocomplete="off"/> 역  사 (김종권 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196800' : '_159840' }}" autocomplete="off"/> 음  악 (다이애나 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196801' : '_159841' }}" autocomplete="off"/> 전  기 (최우영 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196802' : '_159842' }}" autocomplete="off"/> 전  자 (최우영 교수 출제)</label></li>
                                        <li><label><input type="checkbox" class="btn-add-product prod-type-2" data-prod-type="2" name="prod_code" value="{{ ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '196803' : '_159843' }}" autocomplete="off"/> 중국어 (장영희 교수 출제)</label></li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
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
                                <th colspan="4">교원임용 모의고사 접수 현황</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>시험명</th>
                                <td colspan="3">2023학년도 대비 중등임용 모의고사 (주관: 윌비스 임용)</td>
                            </tr>
                            <tr>
                                <th>응시과목</th>
                                <td>{{ $arr_result_2['subject_name'] }}</td>
                                <th>출제 교수진</th>
                                <td>{{ $arr_result_1['prof_name'] . ' 교수, ' . $arr_result_2['prof_name'] . ' 교수' }}</td>
                            </tr>
                            <tr>
                                <th>배송지</th>
                                <td colspan="3">{{ $arr_base['member_info']['Addr1'] . ' ' . $arr_base['member_info']['Addr2'] }}</td>
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
                    <div class="mt30 tx16">위와 같이 접수하고, 교원임용 Real 모의고사에 응시하고자 합니다.</div>
                    <div class="mt50"> <img src="https://static.willbes.net/public/images/promotion/2022/05/stamp.png" alt=""/></div>
                    <div class="btns">
                        <a href="{{ front_url('/support/qna/index') }}" target="_blank">모의고사 취소요청 하기</a>
                    </div>
                    <div class="mt30">※ 모의고사 취소기한은 6월 6일(월)까지이며, 1:1상담게시판에 글을 남겨주시면 됩니다.</div>
                </div>
            @endif
        </div>

        <div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">[필독] 실전 모의고사 접수 시, 유의사항</h4>
                <ul>
                    <li>본 실전 모의고사는 한 ID별 1회만 신청 가능합니다.</li>
                    <li>본 실전 모의고사 접수비는 과목별 5천원이며, 중복접수가 가능합니다.(배송비 포함)</li>
                    <li>본 실전 모의고사의 접수기간(결제완료)은 6월27일(월)까지 입니다.</li>
                    <li>본 실전 모의고사의 환불은 홈페이지 1:1상담 게시판을 통하여 요청하시면 됩니다.</li>
                    <li>본 실전 모의고사 접수 마감일  (6월27일) 이후에는 환불이 불가합니다. </li>
                    <li>본 실전 모의고사를 응시할 때에는 본 페이지의 타임을 재생하시고 응시하면 시간관리에 도움이 됩니다.</li>
                    <li>본 실전 모의고사는 별도의 채점 서비스는 실시하지 않습니다.</li>
                    <li>본 실전 모의고사 응시 후, 해설자료와 해설강의를 청강할 수 있습니다. (신청자 ID로 지급)<br>
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
        /*
        $(document).ready(function(){
            $('.youtubeBox').each(function(){
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
        });*/

        var tab1_url = "https://www.youtube.com/embed/cC3v33lSAIk?rel=0&modestbranding=1&showinfo=0";
        var tab2_url = "https://www.youtube.com/embed/vGoMjM8GEPk?rel=0&modestbranding=1&showinfo=0";        
        var tab3_url = "https://www.youtube.com/embed/7tNxcCSe-WA?rel=0&modestbranding=1&showinfo=0";

        $(function() {
        $(".youtubeBox").hide(); 
        $(".youtubeBox:first").show();
        $(".youtubetab li a").click(function(){ 
                var activeTab = $(this).attr("href"); 
                var html_str = "";
                if(activeTab == "#tab1"){
                    html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab2"){
                    html_str = "<iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab3"){
                    html_str = "<iframe src='"+tab3_url+"' frameborder='0' allowfullscreen></iframe>";                   
                }
                $(".youtubetab a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".youtubeBox").hide(); 
                $(".youtubeBox").html(''); 
                $(activeTab).html(html_str);
                $(activeTab).fadeIn(); 
                return false; 
                });
            });

        $(document).ready(function(){
            // 상품클릭
            $(".btn-add-product").on('click', function () {
                var this_prod_type = $(this).data("prod-type");
                var this_learn_pattern = 'off';
                var this_prod_code = $(this).val();
                var param_check = $("#order_div_"+this_learn_pattern).find('#_product_'+this_prod_code).val();

                /*if ($(".prod-type-"+this_prod_type+":checked").length > 1) {
                    $(".prod-type-"+this_prod_type).prop('checked',false);
                    $(this).prop('checked',true);
                    $("#order_div_"+this_learn_pattern).find(".box-type-"+this_prod_type).remove();
                }*/

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

            if ($("#addr_type").val() == 'N') {
                alert('배송지 주소가 없습니다.\n개인정보에서 배송지 저장 후 진행하시기 바랍니다.');
                return;
            }

            /*if (cnt_1 < 1) { alert('교육학 신청은 필수입니다.'); return; }
            if (cnt_2 < 1) { alert('전공과목 신청은 필수입니다.'); return; }*/

            if ($("#is_chk").is(':checked') === false) {
                alert('모의고사 관련 유의사항 안내에 동의하셔야 합니다.');
                return;
            }
            //결제하기
            goCartNDirectPay('order_div_'+_learn_pattern, 'y_pkg', cart_type, learn_pattern, is_direct_pay, cart_onoff_type);
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop