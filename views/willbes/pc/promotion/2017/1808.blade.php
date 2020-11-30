@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1278px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1278px; position:relative;}

        /************************************************************/
        .btnBox {width:100%; text-align:center}
        .btnBox a {width:420px; margin:0 auto; display:inline-block; color:#fff; background:#b9689d; font-size:24px; font-weight:bold; height:60px; line-height:60px; border-radius:30px; border-bottom:3px solid #682c53; text-align:center}
        .btnBox a:hover {background:#682c53;}

        .eventWrap {width:100%; min-width:1278px; margin:0 auto; text-align:center; font-size:14px; line-height:1.4}
        .eventWrap input[type=checkbox] {width:20px; height:20px; vertical-align:middle}

        .eventTop {background:url("https://static.willbes.net/public/images/promotion/2020/09/200608_top_bg.jpg") repeat-x center top;}

        .event01 {background:url("https://static.willbes.net/public/images/promotion/2020/09/200608_01_bg.jpg") repeat-x center top;}

        .event02 {background:url("https://static.willbes.net/public/images/promotion/2020/09/200608_02_bg.jpg") repeat-x center top;}

        .event03 {background:#633aa6; padding:80px 0;}
        .event03Box {width:1197px; margin:0 auto; background:#fff; padding:50px 0; border-radius:50px}
        .event03Box h4 {font-size:64px; font-weight:bold; margin-bottom:50px; text-align:center; color:#474747}
        .event03Box h5 {font-size:24px; color:#633aa6; text-align:left; padding-bottom:10px; border-bottom:1px solid #633aa6; margin-bottom:20px}
        .event03Box h5 span {font-size:14px; color:#474747; margin-left:20px; font-weight:normal}
        .event03Box h5 strong {color:#633aa6;}
        .event03-txt01 {text-align:left; font-size:14px; width:1050px; margin:20px auto}
        .event03-txt01 ul.info {border:1px solid #e4e4e4; padding:20px; height:150px; overflow-y:auto; margin-bottom:10px}
        .event03-txt01 ul.info li {margin-bottom:10px; list-style-type:decimal; margin-left:20px}

        .event03Box .tabs li {display:inline; float:left; width:50%;}
        .event03Box .tabs li a {display:block; font-size:20px; font-weight:bold; height:60px; line-height:60px; text-align:center; border-bottom:4px solid #fff; background:#bbb; color:#633aa6}
        .event03Box .tabs li:nth-child(1) a {border-right:2px solid #fff}
        .event03Box .tabs li:nth-child(2) a {border-left:2px solid #fff}
        .event03Box .tabs li a:hover,
        .event03Box .tabs li a.active {background:#633aa6; color:#fff; border-bottom:4px solid #633aa6}
        .event03Box .tabs:after {content:""; display:block; clear:both}

        .event03 .btnBox a {width:300px; margin:0 auto; color:#fff; background:#633aa6; font-size:24px; font-weight:bold; height:70px; line-height:70px; border-radius:40px; border-bottom:5px solid #4d2d81; text-align:center}
        .event03 .btnBox a:hover {background:#53abc8;}

        .event04 {background:#232664;}

        .evt_table{margin-bottom:30px;}
        .evt_table table{width:100%; border:1px solid #c1c1c1}
        .evt_table table tr{border-bottom:1px solid #c1c1c1}
        .evt_table table tr:last-of-type{border-bottom:1px solid #c1c1c1}
        .evt_table table thead th,
        .evt_table table tbody th{background:#f6f6f6; color:#333; font-size:16px; font-weight:300; border-bottom:1px solid #c1c1c1; padding:8px}
        .evt_table table tbody td{font-size:14px; color:#000; font-weight:300; text-align:left; padding:8px; border-right:1px solid #c1c1c1;}
        .evt_table table tbody td:last-of-type{border-right:0}
        .evt_table table tbody td.num{color:#999; font-weight:200}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; vertical-align:middle}
        .evt_table input[type=file] {height:30px; color:#494a4d; vertical-align:middle}

        .evt_tableA {margin-bottom:30px;}
        .evt_tableA table{width:100%;}
        .evt_tableA table tr{border-bottom:1px solid #c1c1c1}
        .evt_tableA table tr:last-of-type{border-bottom:1px solid #c1c1c1}
        .evt_tableA table thead th,
        .evt_tableA table tbody th{background:#633aa6; font-size:16px; font-weight:300; text-align:center; color:#fff; padding:10px 0;}
        .evt_tableA table tbody td{font-size:14px; color:#000; text-align:center; padding:8px; border-right:1px solid #c1c1c1}
        .evt_tableA table tbody td:last-child {text-align:left; border-right:0}
        .evt_tableA table tbody td.tx-left {text-align:left}
        .evt_tableA table tbody td strong {color:#F00}
        .evt_tableA table tbody td span {border:1px solid #633aa6; color:#633aa6; padding:3px 0; display:block; margin-top:5px}

        .tabCts {padding:30px; background:#fff; font-size:14px}
        .tabCts div {color:#000; font-size:18px; font-weight:bold; margin-bottom:10px}
        .tabCts li { list-style:decimal; margin-left:20px; margin-bottom:10px}

        .programPage a {background:#fff; color:#343434}
        .programPage a:hover,
        .programPage a.active{background:#333; color:#fff}   
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="eventWrap eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2020/09/200608_top.jpg" alt="환승이벤트"/>
        </div>

        <div class="eventWrap event01">
        	<img src="https://static.willbes.net/public/images/promotion/2020/09/200608_01.jpg" alt="환승이벤트"/>
        </div>

        <div class="eventWrap event02">
        	<img src="https://static.willbes.net/public/images/promotion/2020/09/200608_02.jpg" alt="환승이벤트"/>
        </div>

        <div class="eventWrap event03">
            <form name="regi_form_register" id="regi_form_register">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <input type="hidden" name="file_chk" value="Y"/>
                <input type="hidden" id="register_name" name="register_name" value="{{ sess_data('mem_name') }}" readonly="readonly"/>

                <div class="event03Box">
                    <img src="https://static.willbes.net/public/images/promotion/2020/09/200608_03.jpg" alt="환승이벤트"/>
                    <div class="event03-txt01 mB50">
                        <ul class="info">
                            <li>
                            개인정보 수집 이용 목적  <br />
                            - 본 이벤트의 대상자(타학원 수강이력이 있는 수험생) 확인 및 각종 문의사항 응대<br />
                            - 통계분석 및 기타 마케팅에 활용<br />
                            - 윌비스 임용고시학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공<br />
                            </li>
                            <li>개인정보 수집 항목<br />
                            - 필수항목 : 성명, 윌비스 임용 ID, 연락처, 타학원의 수강이력 인증파일 </li>
                            <li>개인정보 이용기간 및 보유기간<br />
                            - 본사의 이용 목적 달성되었거나, 신청자의 해지요청 및 삭제요청 시 바로 파기 </li>
                            <li>신청자의 개인정보 수집 및 활용 동의 거부 시<br />
                            - 개인정보 수집에 동의하지 않으시는 경우 수강료 할인 및 기타 서비스 이용에 제한이 있을 수 있습니다.</li>
                            <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.</li>
                            <li>이벤트 진행에 따른 저작물에 대한 저작권은 ㈜윌비스에 귀속됩니다.</li>
                        </ul>
                        <input name="is_chk" type="checkbox" value="Y" id="is_chk"/> <label for="is_chk"> 이벤트참여에 따른 개인정보 및 마케팅활용 동의하기(필수)</label>

                        <h5 class="mt50">타학원 수강이력 인증 <span>* 타학원 수강이력 인증 파일은 수강기간이 명시되어 있는 <strong>수강증과 수강확인증</strong>만 가능합니다.</span></h5>
                        <div class="evt_table">
                            <table>
                                <col width="190" />
                                <col width="180" />
                                <col width="150" />
                                <col width="200" />
                                <col width="150" />
                                <col width="180" />
                                <tbody>
                                    <tr>
                                        <th>이름</th>
                                        <td>{{ sess_data('mem_name') }}</td>
                                        <th>윌비스ID</th>
                                        <td>{{ sess_data('mem_id') }}</td>
                                        <th>연락처</th>
                                        <td><input type="text" id="register_tel" name="register_tel" value="{{ sess_data('mem_phone') }}" maxlength="11" /></td>
                                    </tr>
                                    <tr>
                                        <th>타학원 수강이력<br> 인증파일</th>
                                        <td colspan="5">
                                            <input type="file" id="attach_file" name="attach_file" style="width:60%"/>&nbsp;&nbsp;
                                            <a href="javascript:del_file();"><img src="https://static.willbes.net/public/images/promotion/2020/09/200608_btn_del.png" style="vertical-align:middle !important" alt="삭제"></a> *10MB 이하의 이미지 파일(png, jpg, gif, bmp)
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" id="event_code" name="event_code" value="200429"/>
                        </div>

                        <h5 class="mT50">강좌선택<span>* 윌비스임용의 환승할인 이벤트는 인강만 진행하고 있습니다. (강의신청시, 확인해 주시기 바랍니다)</span></h5>

                        <div id="tab01">
                            <div class="evt_tableA">
                                <table>
                                    <col width="8%">
                                    <col width="7%">
                                    <col width="5%">
                                    <col/>
                                    <col width="6%">
                                    <col width="16%">
                                    <col width="24%">
                                    <thead>
                                        <tr>
                                            <th>과목명</th>
                                            <th>교수명</th>
                                            <th>선택</th>
                                            <th>강좌명</th>
                                            <th>기간</th>
                                            <th>수강료</th>
                                            <th>교재명</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td rowspan="6">교육학</td>
                                        <td rowspan="3">김차웅</td>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][0]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][0]['Name'] or ''}}</td>
                                        <td>80일</td>
                                        <td>330,000 → <strong>264,000원</strong>    <span>66,000원 할인</span></td>
                                        <td>프린트 파일제공 </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][1]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][1]['Name'] or ''}}</td>
                                        <td>80일</td>
                                        <td>330,000 → <strong>264,000원</strong>    <span>66,000원 할인</span></td>
                                        <td>프린트 파일제공 </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][2]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][2]['Name'] or ''}}</td>
                                        <td>80일</td>
                                        <td>330,000 → <strong>264,000원</strong>    <span>66,000원 할인</span></td>
                                        <td>프린트 파일제공 </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3">이인재</td>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][3]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][3]['Name'] or ''}}</td>
                                        <td>80일</td>
                                        <td>330,000 → <strong>165,000원</strong>  <span>165,000원 할인</span></td>
                                        <td>모둠 이인재 교육학논술 [이론편]</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][4]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][4]['Name'] or ''}}</td>
                                        <td>80일</td>
                                        <td>330,000 → <strong>165,000원</strong>  <span>165,000원 할인</span></td>
                                        <td>모둠 이인재 교육학논술 [이론편]</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][5]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][5]['Name'] or ''}}</td>
                                        <td>80일</td>
                                        <td>
                                            330,000 → <strong>165,000원</strong>  <span>165,000원 할인</span></td>
                                        <td>모둠 이인재 교육학논술+기출프린트</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="6">전공국어</td>
                                        <td rowspan="3">송원영</td>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][6]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][6]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>380,000 → <strong>323,000원</strong>    <span>57,000원 할인</span></td>
                                        <td>송원영 국어교육론/문학교육론 <br>
                                            송원영 국어교육론/문학교육론 기출해설(배움출판)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][7]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][7]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>380,000 → <strong>323,000원</strong>    <span>57,000원 할인</span></td>
                                        <td>송원영 국어교육론 교육과정    분석 및 정리<br>
                                            송원영 국어교육론/문학교육론 기출해설(배움출판)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][8]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][8]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>
                                             380,000 → <strong>323,000원</strong>    <span>57,000원 할인</span></td>
                                        <td>송원영 국어교육론/문학교육론 프린트   <br>
                                            송원영 국어교육론/문학교육론 기출해설(배움출판)</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3">권보민</td>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][9]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][9]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>200,000 → <strong>160,000원</strong>    <span>40,000원 할인</span></td>
                                        <td>현대국어문법 프린트(제공)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][10]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][10]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>
                                             200,000 → <strong>160,000원</strong>    <span>40,000원 할인</span></td>
                                        <td>중세국어문법 프린트(제공)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][11]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][11]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>200,000 → <strong>160,000원</strong>    <span>40,000원 할인</span></td>
                                        <td>현대문법&amp;중세문법 프린트 (제공)</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="11">전공영어</td>
                                        <td rowspan="3">김영문</td>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][12]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][12]['Name'] or ''}}</td>
                                        <td>60일</td>
                                        <td>140,000 →  <strong>98,000원</strong>    <span>42,000원 할인</span></td>
                                        <td>2020 김영문 영어학개론</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][13]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][13]['Name'] or ''}}</td>
                                        <td>60일</td>
                                        <td>140,000 →  <strong>98,000원</strong>    <span>42,000원 할인</span></td>
                                        <td>2020 김영문 영어학개론 </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][14]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][14]['Name'] or ''}}</td>
                                        <td>60일</td>
                                        <td>140,000 →  <strong>98,000원</strong>    <span>42,000원 할인</span></td>
                                        <td>English Syntax and Argumentation by    Bas Aarts, 4th</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="8">공훈</td>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][15]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][15]['Name'] or ''}}</td>
                                        <td>60일</td>
                                        <td>140,000 →  <strong>98,000원</strong>    <span>42,000원 할인</span></td>
                                        <td>Principles of Language Learning    and Teaching (6판)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][16]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][16]['Name'] or ''}}</td>
                                        <td>60일</td>
                                        <td>140,000 →  <strong>98,000원</strong>    <span>42,000원 할인</span></td>
                                        <td>공감 영어학 기본이론</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][17]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][17]['Name'] or ''}}</td>
                                        <td>60일</td>
                                        <td>140,000 →  <strong>98,000원</strong>    <span>42,000원 할인</span></td>
                                        <td>Teacher's Grammar of English (Ron    Cowen)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][18]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][18]['Name'] or ''}}</td>
                                        <td>60일</td>
                                        <td>140,000 →  <strong>98,000원</strong>    <span>42,000원 할인</span></td>
                                        <td>Teaching By Principles</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][19]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][19]['Name'] or ''}}</td>
                                        <td>60일</td>
                                        <td>140,000 →  <strong>98,000원</strong>    <span>42,000원 할인</span></td>
                                        <td>Appliend English Phonology</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][20]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][20]['Name'] or ''}}</td>
                                        <td>60일</td>
                                        <td>140,000 →  <strong>98,000원</strong>    <span>42,000원 할인</span></td>
                                        <td>Transformational Grammar</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][21]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][21]['Name'] or ''}}</td>
                                        <td>60일</td>
                                        <td>140,000 →  <strong>98,000원</strong>    <span>42,000원 할인</span></td>
                                        <td>영어학 기출 프린트(제공)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][22]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][22]['Name'] or ''}}</td>
                                        <td>60일</td>
                                        <td>140,000 →  <strong>98,000원</strong>    <span>42,000원 할인</span></td>
                                        <td>영어교육론 기출 프린트(제공)</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="6">전공수학</td>
                                        <td rowspan="6">김철홍</td>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][23]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][23]['Name'] or ''}}</td>
                                        <td>60일</td>
                                        <td>200,000 → <strong>140,000원</strong>    <span>60,000원 할인</span></td>
                                        <td>김철홍 위상수학(윌비스,제본)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][24]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][24]['Name'] or ''}}</td>
                                        <td>40일</td>
                                        <td>120,000 → <strong>84,000원</strong>    <span>36,000원 할인</span></td>
                                        <td>프린트 파일제공 </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][25]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][25]['Name'] or ''}}</td>
                                        <td>100일</td>
                                        <td>400,000 → <strong>280,000원</strong>  <span>120,000원 할인</span></td>
                                        <td>김철홍 대수학</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][26]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][26]['Name'] or ''}}</td>
                                        <td>80일</td>
                                        <td>320,000 → <strong>224,000원</strong>   <span>96,000원 할인</span></td>
                                        <td>김철홍 해석학</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][27]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][27]['Name'] or ''}}</td>
                                        <td>60일</td>
                                        <td>240,000 → <strong>168,000원</strong>   <span>72,000원 할인</span></td>
                                        <td>김철홍 위상수학</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][28]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][28]['Name'] or ''}}</td>
                                        <td>50일</td>
                                        <td>200,000 → <strong>140,000원</strong>   <span>60,000원 할인</span></td>
                                        <td>김철홍 복소해석학</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3">수학교육론</td>
                                        <td rowspan="3">박태영</td>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][29]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][29]['Name'] or ''}}</td>
                                        <td>80일</td>
                                        <td>200,000 → <strong>140,000원</strong>   <span>60,000원 할인</span></td>
                                        <td>수학교육신론1, 2&nbsp;(문음사, 2019 개정증보판)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][30]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][30]['Name'] or ''}}</td>
                                        <td>80일</td>
                                        <td>200,000 → <strong>140,000원</strong>   <span>60,000원 할인</span></td>
                                        <td>수학교육과정과 교재연구 (경문사)+프린트&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][31]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][31]['Name'] or ''}}</td>
                                        <td>80일</td>
                                        <td>200,000 → <strong>140,000원</strong>   <span>60,000원 할인</span></td>
                                        <td>박태영 수학교육론 기출 100선 교재 및 자료</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">생물교육론</td>
                                        <td rowspan="2">양혜정</td>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][32]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][32]['Name'] or ''}}</td>
                                        <td>80일</td>
                                        <td>360,000 → <strong>288,000원</strong>   <span>72,000원 할인</span></td>
                                        <td>2020 생물교육론 심화과정</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][33]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][33]['Name'] or ''}}</td>
                                        <td>80일</td>
                                        <td>360,000 → <strong>288,000원</strong>   <span>72,000원 할인</span></td>
                                        <td>생명과학교육론 2판 (개별구매)</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3">전공역사</td>
                                        <td rowspan="3">최용림</td>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][34]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][34]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>280,000 → <strong>168,000원</strong>   <span>112,000원 할인</span></td>
                                        <td>2021학년도 대비 교재</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][35]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][35]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>280,000 → <strong>168,000원</strong>   <span>112,000원 할인</span></td>
                                        <td>2021학년도 대비 교재</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][36]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][36]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>280,000 → <strong>168,000원</strong>   <span>112,000원 할인</span></td>
                                        <td>2021학년도 대비 교재</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="10">전공음악</td>
                                        <td rowspan="10">다이애나</td>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][37]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][37]['Name'] or ''}}</td>
                                        <td>80일</td>
                                        <td>360,000 → <strong>252,000원</strong>   <span>108,000원 할인</span></td>
                                        <td>다이애나 종.음.셋 / 한.끝.맵</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][38]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][38]['Name'] or ''}}</td>
                                        <td>80일</td>
                                        <td>360,000 → <strong>252,000원</strong>   <span>108,000원 할인</span></td>
                                        <td>연주자를 위한 조성음악 분석 1,2</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][39]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][39]['Name'] or ''}}</td>
                                        <td>160일</td>
                                        <td>190,000 → <strong>133,000원</strong>   <span>57,000원 할인</span></td>
                                        <td>음악교육학 총론/음악교육 기초</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][40]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][40]['Name'] or ''}}</td>
                                        <td>160일</td>
                                        <td>190,000 → <strong>133,000원</strong>   <span>57,000원 할인</span></td>
                                        <td>서양음악사 1,2</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][41]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][41]['Name'] or ''}}</td>
                                        <td>160일</td>
                                        <td>190,000 → <strong>133,000원</strong>   <span>57,000원 할인</span></td>
                                        <td>전통음악개론</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][42]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][42]['Name'] or ''}}</td>
                                        <td>160일</td>
                                        <td>190,000 → <strong>133,000원</strong>   <span>57,000원 할인</span></td>
                                        <td>다이애나 한줄정리 서양 1,2,3(전3권)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][43]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][43]['Name'] or ''}}</td>
                                        <td>160일</td>
                                        <td>190,000 → <strong>133,000원</strong>   <span>57,000원 할인</span></td>
                                        <td>다이애나 한줄정리 국악 1,2,3(전3권)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][44]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][44]['Name'] or ''}}</td>
                                        <td>160일</td>
                                        <td>190,000 → <strong>133,000원</strong>   <span>57,000원 할인</span></td>
                                        <td>다이애나 종합음악세트(총4권)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][45]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][45]['Name'] or ''}}</td>
                                        <td>160일</td>
                                        <td>190,000 → <strong>133,000원</strong>   <span>57,000원 할인</span></td>
                                        <td>다이애나 종합음악세트(총4권)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][46]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][46]['Name'] or ''}}</td>
                                        <td>160일</td>
                                        <td>190,000 → <strong>133,000원</strong>   <span>57,000원 할인</span></td>
                                        <td>다이애나 종합음악세트(총4권)</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3">전기/전자/통신</td>
                                        <td rowspan="3">최우영</td>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][47]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][47]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>360,000 → <strong>288,000원</strong>    <span>72,000원 할인</span></td>
                                        <td>전기자기학</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][48]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][48]['Name'] or ''}}</td>
                                        <td>150일</td>
                                        <td>400,000 → <strong>320,000원</strong>   <span>80,000원 할인</span></td>
                                        <td>무선공학 통신공학 통신이론 공통이론</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][49]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][49]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>400,000 → <strong>320,000원</strong>   <span>80,000원 할인</span></td>
                                        <td>유레카 전자공학개론</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="4">정보컴퓨터</td>
                                        <td rowspan="4">송광진</td>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][50]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][50]['Name'] or ''}}</td>
                                        <td>60일</td>
                                        <td>200,000 → <strong>160,000원</strong>    <span>40,000원 할인</span></td>
                                        <td>알기 쉽게 풀어가는 C언어 &amp; JAVA</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][51]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][51]['Name'] or ''}}</td>
                                        <td>150일</td>
                                        <td>600,000 → <strong>480,000원</strong>   <span>120,000원 할인</span></td>
                                        <td>알기 쉽게 풀어가는 정보컴퓨터 일반과정 Ⅰ,Ⅱ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][52]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][52]['Name'] or ''}}</td>
                                        <td>80일</td>
                                        <td>400,000 → <strong>320,000원</strong>    <span>80,000원 할인</span></td>
                                        <td>정보컴퓨터 기출문제 분석집 (2020년 개정판</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][53]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][53]['Name'] or ''}}</td>
                                        <td>150일</td>
                                        <td>600,000 → <strong>480,000원</strong>   <span>120,000원 할인</span></td>
                                        <td>알기 쉽게 풀어가는 정보컴퓨터 심화과정</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="8">전공중국어</td>
                                        <td rowspan="8">정경미</td>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][54]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][54]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>340,000 → <strong>170,000원</strong>    <span>170,000원 할인</span></td>
                                        <td>2020 중국어 어학 기본이론서</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][55]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][55]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>340,000 → <strong>170,000원</strong>    <span>170,000원 할인</span></td>
                                        <td>중국현당대문학사교정[제본교재]</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][56]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][56]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>340,000 → <strong>170,000원</strong>    <span>170,000원 할인</span></td>
                                        <td>2020 중국어 어학 기본이론서</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][57]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][57]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>340,000 → <strong>170,000원</strong>    <span>170,000원 할인</span></td>
                                        <td>특수 프린트</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][58]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][58]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>340,000 → <strong>170,000원</strong>    <span>170,000원 할인</span></td>
                                        <td>중국고대문학작품해설[제본교재]</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][59]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][59]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>340,000 → <strong>170,000원</strong>    <span>170,000원 할인</span></td>
                                        <td>2020 중국어 어학 기본이론서</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][60]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][60]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>340,000 → <strong>170,000원</strong>    <span>170,000원 할인</span></td>
                                        <td>중국현당대문학사교정[제본교재]</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][61]['ErIdx'] or ''}}"></td>
                                        <td class="tx-left">{{ $arr_base['register_list'][61]['Name'] or ''}}</td>
                                        <td>90일</td>
                                        <td>250,000 → <strong>125,000원</strong>    <span>125,000원 할인</span></td>
                                        <td>2020 전공중국어 기출문제해설서 (전3권)[개정판]</td>
                                    </tr>

{{--                                        @php $prof_idx = ''; @endphp--}}
{{--                                        @if(empty($arr_base['register_prof_group_data']) === false)--}}
{{--                                            @foreach($arr_base['register_prof_group_data'] as $subject_idx => $group_data)--}}
{{--                                                @if(empty($group_data) === false)--}}
{{--                                                    @foreach($group_data as $key => $row)--}}
{{--                                                        <tr>--}}
{{--                                                            @if($key == 0)--}}
{{--                                                                <td rowspan="{{ count($group_data) }}">{{ $row['SubjectName'] }}</td>--}}
{{--                                                            @endif--}}
{{--                                                            @if($prof_idx != $row['ProfIdx'])--}}
{{--                                                                <td rowspan="{{ $row['prod_count'] }}">{{ $row['ProfNickName'] }}</td>--}}
{{--                                                                @php $prof_idx = $row['ProfIdx']; @endphp--}}
{{--                                                            @endif--}}
{{--                                                            <td><input type="checkbox" name="register_chk[]" value="{{ $row['ErIdx'] }}"></td>--}}
{{--                                                            <td class="tx-left">{{ $row['ProdName'] }}</td>--}}
{{--                                                            <td>{{ $row['StudyPeriod'] }}일</td>--}}
{{--                                                            <td>--}}
{{--                                                                @if(empty($row['ProdPriceData']) === false)--}}
{{--                                                                    @foreach($row['ProdPriceData'] as $price_row)--}}
{{--                                                                        {{ number_format($price_row['SalePrice'], 0) }} →--}}
{{--                                                                        <strong>{{ number_format($price_row['RealSalePrice'], 0) }}원</strong>   --}}
{{--                                                                        <span>{{ number_format($price_row['SalePrice'] - $price_row['RealSalePrice'], 0) }}원 할인</span>--}}
{{--                                                                    @endforeach--}}
{{--                                                                @endif--}}
{{--                                                            </td>--}}
{{--                                                            <td>--}}
{{--                                                                @if(empty($row['ProdBookData']) === false)--}}
{{--                                                                    @foreach($row['ProdBookData'] as $book_row)--}}
{{--                                                                        {{ $book_row['ProdBookName'] }} <br/>--}}
{{--                                                                    @endforeach--}}
{{--                                                                @endif--}}
{{--                                                            </td>--}}
{{--                                                        </tr>--}}
{{--                                                    @endforeach--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        @endif--}}
                                    </tbody>
                                </table>
                            </div>
                            <div class="btnBox">
                                <a href="javascript:fn_submit();">신청하기</a>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div><!--//event04-->

        <div class="eventWrap event04">
        	<img src="https://static.willbes.net/public/images/promotion/2020/09/200608_04.jpg" alt="인강무료체험"/>
        </div>
    </div>
    <!-- End Container -->

    <script>
        var $regi_form_register = $('#regi_form_register');

        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            @if(empty($register_count) === false)
                alert('등록된 신청자 정보가 있습니다.');
                return;
            @endif

            var _url = '{!! front_url('/event/registerStore') !!}';

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('이벤트참여에 따른 개인정보 및 마케팅 활용에 동의하셔야 합니다.');
                $regi_form_register.find('input[name="is_chk"]').focus();
                return;
            }

            if (!$regi_form_register.find('input[name="register_tel"]').val()) {
                alert('연락처를 입력해 주세요.');
                $regi_form_register.find('input[name="register_tel"]').focus();
                return;
            }

            if (!$regi_form_register.find('input[name="attach_file"]').val()) {
                alert('재학생 인증 파일을 첨부해 주세요.');
                $regi_form_register.find('input[name="attach_file"]').focus();
                return;
            }

            if ($regi_form_register.find('input[name="register_chk[]"]:checked').length == 0) {
                alert('강좌를 선택해 주세요.');
                return;
            }

            if ($regi_form_register.find('input[name="register_chk[]"]:checked').length > 3) {
                alert('강좌를 3개까지 선택해 주세요.');
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

        function del_file(){
            if(confirm("첨부파일을 삭제 하시겠습니까?")) {
                $("#attach_file").val("");
                return;
            }
        }
    </script>
@stop