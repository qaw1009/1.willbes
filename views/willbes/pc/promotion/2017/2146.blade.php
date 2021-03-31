@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px!important;
            margin-top:20px !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .btnBox {width:100%; text-align:center}


        .eventWrap {width:100%; min-width:1120px; margin:0 auto; text-align:center; font-size:14px; line-height:1.4}
        .eventWrap input[type=checkbox] {width:20px; height:20px; vertical-align:middle}

        .eventTop {background:url("https://static.willbes.net/public/images/promotion/2021/03/2146_top_bg.jpg") repeat-x center top;}

        .event02 {background:#d6e6f6}

        .event03 {padding-bottom:100px}
        .event03Box {width:1050px; margin:0 auto; background:#fff;}
        .event03Box h4 {font-size:64px; font-weight:bold; margin-bottom:50px; text-align:center; color:#474747}
        .event03Box h5 {font-size:24px; color:#202020; text-align:left; padding-bottom:10px; border-bottom:3px solid #000; font-weight:600; margin-bottom:40px}
        .event03Box h5 span {font-size:14px; color:#474747; margin-left:20px; font-weight:normal}
        .event03Box h5 strong {color:#d30000;}
        .event03-txt01 {text-align:left; font-size:14px; width:1050px; margin:20px auto}
        .event03-txt01 ul.info {border:1px solid #e4e4e4; padding:20px; height:150px; overflow-y:auto; margin-bottom:10px}
        .event03-txt01 ul.info li {margin-bottom:10px; list-style-type:decimal; margin-left:20px}

        .event03 .btnBox a {width:360px; margin:0 auto; display:inline-block;color:#fff; background:#1f3b8e; font-size:26px; font-weight:bold; height:70px; line-height:70px; border-radius:40px; text-align:center}
        .event03 .btnBox a:hover {background:#1b233b;}        

        .evt_table{margin-bottom:30px;}
        .evt_table table{width:100%; border:1px solid #c1c1c1}
        .evt_table table tr{border-bottom:1px solid #c1c1c1}
        .evt_table table tr:last-of-type{border-bottom:1px solid #c1c1c1}
        .evt_table table thead th,
        .evt_table table tbody th{background:#f6f6f6; color:#333; font-size:16px; font-weight:300; border-bottom:1px solid #c1c1c1; padding:8px}
        .evt_table table tbody th {text-align:center; border-right:1px solid #c1c1c1;}
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
        .evt_tableA table tbody th{background:#dedede; font-size:16px; font-weight:300; text-align:center; color:#333; padding:10px 0; border-right:1px solid #fff}
        .evt_tableA table thead th {text-align:center}
        .evt_tableA table tbody td {font-size:14px; color:#000; text-align:center; padding:8px; border-right:1px solid #c1c1c1}
        .evt_tableA table tbody td:last-child {border-right:0}
        .evt_tableA table tbody td label {display:block; text-align:left;}
        .evt_tableA table tbody td input {margin-right:5px}
        .evt_tableA table tbody td strong {}
        .evt_tableA table tbody td span {color:#F00; display:block; margin-top:5px}
        .evt_tableA table tbody td a.btn01 {display:block; padding:5px; background:#1b233b; color:#fff; border-radius:4px}
        .evt_tableA table tbody td a.btn02 {display:block; padding:5px; background:#1f3b8e; color:#fff; border-radius:4px}

        .evtInfo {padding:80px 0; background:#eee; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="eventWrap eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/03/2146_top.jpg" alt="합격환승센터"/>
        </div>

        <div class="eventWrap event01">
        	<img src="https://static.willbes.net/public/images/promotion/2021/03/2146_01.jpg" alt="합격할 수 있습니다."/>
        </div>

        <div class="eventWrap event02">
        	<img src="https://static.willbes.net/public/images/promotion/2021/03/2146_02.jpg" alt="윌비스 임용으로 바꾸면 좋은 이유"/>
        </div>

        <div class="eventWrap event03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2146_03_01.jpg" alt="환승이벤트"/>
            <form name="regi_form_register" id="regi_form_register">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <input type="hidden" name="file_chk" value="Y"/>
                <input type="hidden" id="register_name" name="register_name" value="{{ sess_data('mem_name') }}" readonly="readonly"/>

                <div class="event03Box">                   
                    
                    <div class="event03-txt01 mB50">
                        <h5 class="mt50">환승이벤트 참여 <strong>절차</strong> <span>* 안내된 순서대로 진행하면, 수강할인 쿠폰을 발급받을 수 있습니다. </span></h5>
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2146_03_02.jpg" alt="환승이벤트"/>
                        <h5 class="mt100">이벤트참여에 따른 <strong>사전 동의사항</strong> <span>* 윌비스임용의 본 이벤트 참여를 위해서는 아래 명시된 사항을 자세히 읽어보시고 동의를 해주셔야 가능합니다. </span></h5>
                        <ul class="info">
                            <li>
                            개인정보 수집 이용 목적  <br />
                            - 본 이벤트의 대상자(타학원 수강이력이 있는 수험생) 확인 및 각종 문의사항 응대<br />
                            - 통계분석 및 기타 마케팅에 활용<br />
                            - 윌비스 임용고시학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공<br />
                            </li>
                            <li>개인정보 수집 항목<br />
                            - 필수항목 : 성명, 본사ID, 연락처, 타학원의 수강이력 인증파일</li>
                            <li>개인정보 이용기간 및 보유기간<br />
                            - 본사의 이용 목적 달성되었거나, 신청자의 해지요청 및 삭제요청 시 바로 파기 </li>
                            <li>신청자의 개인정보 수집 및 활용 동의 거부 시<br />
                            - 개인정보 수집에 동의하지 않으시는 경우 수강료 할인 및 기타 서비스 이용에 제한이 있을 수 있습니다.</li>
                            <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.</li>
                            <li>이벤트 진행에 따른 저작물에 대한 저작권은 ㈜윌비스에 귀속됩니다.</li>
                        </ul>
                        <input name="is_chk" type="checkbox" value="Y" id="is_chk" onclick="loginCheck();"/> <label for="is_chk"> 이벤트참여에 따른 개인정보 및 마케팅활용 동의하기(필수)</label>

                        <h5 class="mt100">타학원 <strong>수강이력</strong> 인증 <span>* 타학원 수강이력 인증 파일은 수강기간이 명시되어 있는 <strong>수강증과 수강확인증</strong>만 가능합니다.</span></h5>
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
                                            <a href="javascript:del_file();"><img src="https://static.willbes.net/public/images/promotion/2021/03/2146_btn_del.jpg" style="vertical-align:middle !important" alt="삭제"></a> *10MB 이하의 이미지 파일(png, jpg, gif, bmp)
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" id="event_code" name="event_code" value="200429"/>
                        </div>

                        <h5 class="mt100">카카오톡 채널 친구 추가 방법(선택사항)</h5>
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2146_03_03.jpg" alt="환승이벤트"/>

                        <h5 class="mt100">강좌선택<span>* 윌비스임용의 환승할인 이벤트는 인강만 진행하고 있습니다. (강의신청시, 확인해 주시기 바랍니다)</span></h5>


                        <div class="evt_tableA">
                            <table>
                                <col width="8%"/>
                                <col width="8%"/>
                                <col/>
                                <col width="8%"/>
                                <col width="14%"/>
                                <col width="8%"/>
                                <col width="8%"/>
                                <thead>
                                    <tr>
                                        <th>과목</th>
                                        <th>교수</th>
                                        <th>강좌</th>
                                        <th>수강기간</th>
                                        <th>수강료</th>
                                        <th colspan="2">수강신청</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="2">교육학</td>
                                        <td rowspan="2">이인재</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" data-subject-group="edu" value="{{ $arr_base['register_list'][0]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][0]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>90일</td>
                                        <td>350,000원 → <span><strong>175,000원</strong>(50%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('174903','1270724','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3134/pattern/only/prod-code/174903" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" data-subject-group="edu" value="{{ $arr_base['register_list'][1]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][1]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>90일</td>
                                        <td>350,000원 → <span><strong>175,000원</strong>(50%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176772','1282107','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3134/pattern/only/prod-code/176772" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="4">국어</td>
                                        <td rowspan="2">송원영</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][2]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][2]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>90일</td>
                                        <td>380,000원 → <span><strong>323,000원</strong>(15%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176552','1271311','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176552" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][3]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][3]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>90일</td>
                                        <td>380,000원 → <span><strong>323,000원</strong>(15%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176563','1281640','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176563" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">권보민</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][4]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][4]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>90일</td>
                                        <td>200,000원 → <span><strong>160,000원</strong>(20%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176218','1271693','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176218" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][5]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][5]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>90일</td>
                                        <td>200,000원 → <span><strong>160,000원</strong>(20%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176214','1281940','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176214" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">영어</td>
                                        <td rowspan="2">김영문</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][6]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][6]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>60일</td>
                                        <td>140,000원 → <span><strong>98,000원</strong>(30%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176448','1271513','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176448" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][7]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][7]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>60일</td>
                                        <td>140,000원 → <span><strong>98,000원</strong>(30%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176453','1281485','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176453" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="4">수학</td>
                                        <td rowspan="2">김철홍</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][8]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][8]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>90일</td>
                                        <td>380,000원 → <span><strong>226,000원</strong>(30%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176932','1270570','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176932" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][9]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][9]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>90일</td>
                                        <td>340,000원 → <span><strong>240,000원</strong>(30%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176933','1281983','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176933" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">박태영</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][10]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][10]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>90일</td>
                                        <td>300,000원 → <span><strong>226,000원</strong>(30%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176880','1271149','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176880" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][11]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][11]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>90일</td>
                                        <td>300,000원 → <span><strong>226,000원</strong>(30%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176881','1281477','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176881" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>생물</td>
                                        <td>양혜정</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][12]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][12]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>150일</td>
                                        <td>480,000원 → <span><strong>384,000원</strong>(20%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('177761','1281481','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/177761" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">역사</td>
                                        <td rowspan="2">최용림</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][13]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][13]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>90일</td>
                                        <td>280,000원 → <span><strong>168,000원</strong>(40%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176159','1268664','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176159" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][14]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][14]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>90일</td>
                                        <td>280,000원 → <span><strong>168,000원</strong>(40%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176160','1282566','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176160" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="9">음악</td>
                                        <td rowspan="9">다이애나</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][15]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][15]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>90일</td>
                                        <td>360,000원 → <span><strong>252,000원</strong>(30%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176838','1270599','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176838" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][16]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][16]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>80일</td>
                                        <td>360,000원 → <span><strong>252,000원</strong>(30%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176839','1271664','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176839" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][17]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][17]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>150일</td>
                                        <td>190,000원 → <span><strong>152,000원</strong>(20%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176847','1278474','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176847" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][18]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][18]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>150일</td>
                                        <td>290,000원 → <span><strong>232,000원</strong>(20%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176846','1278614','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176846" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][19]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][19]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>150일</td>
                                        <td>190,000원 → <span><strong>152,000원</strong>(20%↓)</span></td>
                                        <td><a href="#none" onclick="javascript:alert('준비중입니다.');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176845" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][20]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][20]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>150일</td>
                                        <td>190,000원 → <span><strong>152,000원</strong>(20%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('[176844','1283265','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176844" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][21]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][21]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>150일</td>
                                        <td>190,000원 → <span><strong>152,000원</strong>(20%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176842','1283264','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176842" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][22]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][22]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>150일</td>
                                        <td>190,000원 → <span><strong>152,000원</strong>(20%↓)</span></td>
                                        <td><a href="#none" onclick="javascript:alert('준비중입니다.');"  class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176841" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][23]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][23]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>150일</td>
                                        <td>190,000원 → <span><strong>152,000원</strong>(20%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176840','1283032','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176840" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="4">전기전자</td>
                                        <td rowspan="4">최우영</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][24]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][24]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>120일</td>
                                        <td>400,000원 → <span><strong>320,000원</strong>(20%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176676','1271941','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176676" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][25]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][25]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>160일</td>
                                        <td>400,000원 → <span><strong>320,000원</strong>(20%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176677','1284998','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176677" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][26]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][26]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>150일</td>
                                        <td>300,000원 → <span><strong>240,000원</strong>(20%↓)</span></td>
                                        <td><a href="#none" onclick="javascript:alert('준비중입니다.');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176678" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][27]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][27]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>110일</td>
                                        <td>250,000원 → <span><strong>200,000원</strong>(20%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('176679','1284705','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176679" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">정보<br />
                                        컴퓨터</td>
                                        <td rowspan="2">송광진</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][28]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][28]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>150일</td>
                                        <td>600,000원 → <span><strong>480,000원</strong>(20%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('175976','1270566','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/175976" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][29]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][29]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>80일</td>
                                        <td>400,000원 → <span><strong>320,000원</strong>(20%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('175978','1281806','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/175978" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">중국어</td>
                                        <td rowspan="2">정경미</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][30]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][30]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>150일</td>
                                        <td>600,000원 → <span><strong>300,000원</strong>(50%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('177140','1270530','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/177140" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][31]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][31]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td>150일</td>
                                        <td>600,000원 → <span><strong>300,000원</strong>(50%↓)</span></td>
                                        <td><a href="javascript:fnPlayerSample('177141','1270545','HD');" class="btn01">미리보기</a></td>
                                        <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/177141" class="btn02" target="_blank">수강신청</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="btnBox mt50">
                            <a href="javascript:fn_submit();">신청하기</a>
                        </div>

                    </div>

                </div>
            </form>
        </div><!--//event04-->

        <div class="eventWrap evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">[필독] 환승할인 이벤트 유의사항</h4>
                <ul>
                    <li>본 이벤트의 참여 대상자는 타 학원에 수강이력이 있고, 윌비스임용에 처음 수강하시는 선생님(수강 이력이 없는 분)만 가능합니다.</li>
                    <li>본 이벤트 참여를 위한 기존강의 환불자는 참여할 수 없습니다.</li>
                    <li>본 이벤트의 참여를 위해서는 타학원에서 수강하였다는 사실을 증명해야 합니다. (온/오프 수강생 모두 참여 가능)<br>
                        - 본 이벤트 페이지의 “타학원 수강이력인증창”에, 인증서류를 스캔하여 전송하는 절차를 진행한 후 참여 가능합니다.<br>
                        - 본 이벤트 참여를 위한 인증서류는 수강학원, 수강생명, 수강과목, 수강기간이 명기되어 있는 수강증, 1개월 이내 발급된 수강확인증 등 입니다.<br>
                        - 인증 서류의 식별이 불가능한 경우 또는 이미지를 도용한 경우에는 할인혜택이 적용이 불가합니다.</li>
                    <li>본 이벤트에서 타학원 수강이 인증되면, 개별 ID로 할인쿠폰이 발급되며, 5일이내 수강하셔야 합니다. (* 5일후 쿠폰소멸) </li>
                    <li>본 이벤트를 통하여 수강한 강의 환불 시에는 할인된 수강료가 아닌, 원수강료에서 환불금액이 계산됩니다.</li>
                    <li>본 이벤트는 교재는 적용되지 않으며, 별도로 구매하셔야 합니다. </li>
                    <li>본 이벤트의 수강할인 쿠폰발급 요청은 교육학 1과목과 전공 두 과목에 한하여 가능합니다. (총3과목까지 가능)</li>
                    <li>본 이벤트로 인한 할인강의는 양도 및 매매가 불가능하며, 위반시 처벌받을 수 있습니다.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script>
        var $regi_form_register = $('#regi_form_register');

        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($register_count) === false)
                alert('등록된 신청자 정보가 있습니다.');
                return;
            @endif

            var _url = '{!! front_url('/event/registerStore') !!}';
            var subject_count = 0;
            var subject_name = '';

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

            $regi_form_register.find("input[name^='register_chk']:checked").each(function(k,v) {
                subject_name = $(this).data('subject-group');
                if(subject_name === 'edu'){
                    subject_count++;
                }
            });

            if(subject_count !== 1){
                alert('강좌는 교육학 1개, 전공강좌 2개 총 3개까지 선택 가능합니다.');
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

        function loginCheck(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                return true;
        }
    </script>
@stop