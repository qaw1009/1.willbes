@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
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
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; font-size:14px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/
        .btnBox {width:100%; text-align:center}


        .eventWrap {width:100%; min-width:1120px; margin:0 auto; text-align:center; font-size:14px; line-height:1.4}
        .eventWrap input[type=checkbox] {width:20px; height:20px; vertical-align:middle}

        .eventTop {background:url("https://static.willbes.net/public/images/promotion/2022/03/2581_top_bg.jpg") no-repeat center top;}
        .eventTop span {position: absolute; top:1030px; left:50%; margin-left:-520px; width:661px; z-index: 2;}

        .event01 {background:url("https://static.willbes.net/public/images/promotion/2022/03/2581_01_bg.jpg") no-repeat center top;}
        .event02 {background:#ff707c}

        .event03 {padding-bottom:100px; width:1120px; margin:0 auto;}
        .event03Box h4 {font-size:64px; font-weight:bold; margin-bottom:50px; text-align:center; color:#474747}
        .event03Box h5 {font-size:24px; color:#202020; text-align:left; padding-bottom:10px; border-bottom:3px solid #000; font-weight:600; margin-bottom:40px}
        .event03Box h5 span {font-size:14px; color:#474747; margin-left:20px; font-weight:normal}
        .event03Box h5 strong {color:#d30000;}
        .event03-txt01 {text-align:left; font-size:14px; margin:20px 33px 10px}
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
        .evt_tableA table tbody td:last-child {border-right:0; color:#005180}
        .evt_tableA table tbody td:nth-last-child(4) {text-decoration: line-through; text-align:right}
        .evt_tableA table tbody td:nth-last-child(3) {text-align:right; font-weight:bold; color:red}
        .evt_tableA table tbody td:nth-last-child(2) {text-align:right; color:blue }
        .evt_tableA table tbody td label {display:block; text-align:left;}
        .evt_tableA table tbody td input {margin-right:5px}
        .evt_tableA table tbody td span {color:#F00; display:block; margin-top:5px}        
        .evt_tableA table tbody td a.btn01 {display:block; padding:5px; background:#1b233b; color:#fff; border-radius:4px}
        .evt_tableA table tbody td:nth-last-child(1) a,
        .evt_tableA table tbody td a.btn02 {display:block; padding:5px; background:#ff5200; color:#fff; border-radius:20px; font-size:12px;}
        .evt_tableA table tbody td a:hover {background:#000}

        .evtInfo {padding:80px 0; background:#eee; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="eventWrap eventTop" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/03/2581_top.jpg" alt="합격환승센터"/>
            <span data-aos="fade-down"><img src="https://static.willbes.net/public/images/promotion/2022/03/2581_top_img.png" alt=""/></span>
        </div>

        <div class="eventWrap event01" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/03/2581_01.jpg" alt="합격할 수 있습니다."/>
        </div>

        <div class="eventWrap event02" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/03/2581_02.jpg" alt="윌비스 임용으로 바꾸면 좋은 이유"/>
        </div>

        <div class="eventWrap event03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2581_03_01.jpg" alt="환승이벤트"/>
            <form name="regi_form_register" id="regi_form_register">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <input type="hidden" name="file_chk" value="Y"/>
                <input type="hidden" id="register_name" name="register_name" value="{{ sess_data('mem_name') }}" readonly="readonly"/>

                <div class="event03Box">                 
                    <div class="event03-txt01 mb100">                      
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
                    </div>
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2581_03_02.jpg" alt="환승이벤트"/>
                    <div class="event03-txt01 mb100">
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
                    </div>
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2581_03_03.jpg" alt="환승이벤트"/>
                    <div class="event03-txt01 mb50">
                        <div class="evt_tableA">
                            <table>
                                <col width="8%"/>
                                <col width="8%"/>
                                <col/>
                                <col width="10%"/>
                                <col width="10%"/>
                                <col width="12%"/>
                                <col width="8%"/>
                                <thead>
                                    <tr>
                                        <th>과목</th>
                                        <th>교수</th>
                                        <th>강좌</th>
                                        <th colspan="3">환승& 재도전 할인 수강료</th>
                                        <th>수강신청</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td rowspan="5">교육학</td>
                                      <td rowspan="2">이경범</td>
                          				<td>
                                          <label>
                                              <input type="checkbox" name="register_chk[]" data-subject-group="edu" value="{{ $arr_base['register_list'][0]['ErIdx'] or ''}}"/>
                                              {{ $arr_base['register_list'][0]['Name'] or ''}}
                                              2022(1~11월) 교육학 연간 Full 패키지
                                          </label>
                                        </td>
                          				<td width="72">1,330,000원</td>
                          				<td align="right" width="83">1,197,000 원</td>
                          				<td align="right" width="72">133,000원 할인</td>
                                        <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                      <td>
                                          <label>
                                              <input type="checkbox" name="register_chk[]" data-subject-group="edu" value="{{ $arr_base['register_list'][0]['ErIdx'] or ''}}"/>
                                              {{ $arr_base['register_list'][0]['Name'] or ''}}
                                              2022(3~11월) 이경범 교육학 Core 패키지
                                          </label>
                                        </td>
                                      <td width="72">1,092,000원</td>
                                      <td align="right">982,800 원</td>
                                      <td align="right">109,200원 할인</td>
                                        <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                      <td>정 현</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" data-subject-group="edu" value="{{ $arr_base['register_list'][1]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][1]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td width="72">610,000원</td>
                                        <td align="right">549,000 원</td>
                                        <td align="right">61,000원 할인</td>
                                        <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                      <td rowspan="2">신태식</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" data-subject-group="edu" value="{{ $arr_base['register_list'][32]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][32]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td width="72">1,275,000원</td>
                                        <td align="right">1,147,500 원</td>
                                        <td align="right">127,500원 할인</td>
                                        <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                      <td>
                                          <label>
                                              <input type="checkbox" name="register_chk[]" data-subject-group="edu" value="{{ $arr_base['register_list'][33]['ErIdx'] or ''}}"/>
                                              {{ $arr_base['register_list'][33]['Name'] or ''}}
                                          </label>
                                        </td>
                                      <td width="72">840,000원</td>
                                      <td align="right">756,000 원</td>
                                      <td align="right">84,000원 할인</td>
                                        <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="4">국어</td>
                                        <td rowspan="2">송원영/권보민</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][2]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][2]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td width="72">1,670,000원</td>
                                        <td align="right">1,503,000 원</td>
                                        <td align="right">167,000원 할인</td>
                                        <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][3]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][3]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td width="72">1,450,000원</td>
                                        <td align="right">1,305,000 원</td>
                                        <td align="right">145,000원 할인</td>
                                        <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">구동언</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][4]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][4]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td width="72">1,749,000원</td>
                                        <td align="right">1,574,100 원</td>
                                        <td align="right">174,900원 할인</td>
                                        <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][5]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][5]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td width="72">1,331,000원</td>
                                        <td align="right">1,197,900 원</td>
                                        <td align="right">133,100원 할인</td>
                                        <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                        <td>영어</td>
                                        <td>김영문</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][6]['ErIdx'] or ''}}"/>
                                                {{ $arr_base['register_list'][6]['Name'] or ''}}
                                            </label>
                                        </td>
                                        <td width="72">532,000원</td>
                                        <td align="right">478,800 원</td>
                                        <td align="right">53,200원 할인</td>
                                        <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="6">수학</td>
                                        <td rowspan="2">김철홍</td>
                                        <td><label>
                                          <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][7]['ErIdx'] or ''}}"/>
                                          {{ $arr_base['register_list'][7]['Name'] or ''}} </label></td>
                                        <td width="72">1,449,000원</td>
                                        <td align="right">1,304,100 원</td>
                                        <td align="right">144,900원 할인</td>
                                        <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                      <td><label>
                                        <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][8]['ErIdx'] or ''}}"/>
                                        {{ $arr_base['register_list'][8]['Name'] or ''}} </label></td>
                                      <td width="72">945,000원</td>
                                      <td align="right">850,500 원</td>
                                      <td align="right">94,500원 할인</td>
                                      <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                      <td>김현웅</td>
                                      <td><label>
                                        <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][9]['ErIdx'] or ''}}"/>
                                        {{ $arr_base['register_list'][9]['Name'] or ''}} </label></td>
                                      <td width="72">1,400,000원</td>
                                      <td align="right">1,260,000 원</td>
                                      <td align="right">140,000원 할인</td>
                                      <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                      <td rowspan="2">박태영</td>
                                      <td><label>
                                        <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][9]['ErIdx'] or ''}}"/>
                                        {{ $arr_base['register_list'][9]['Name'] or ''}} </label></td>
                                      <td width="72">1,118,000원</td>
                                      <td align="right">1,006,200 원</td>
                                      <td align="right">111,800원 할인</td>
                                      <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                      <td><label>
                                        <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][9]['ErIdx'] or ''}}"/>
                                        {{ $arr_base['register_list'][9]['Name'] or ''}} </label></td>
                                      <td width="72">973,000원</td>
                                      <td align="right">875,700 원</td>
                                      <td align="right">97,300원 할인</td>
                                      <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                      <td>박혜향</td>
                                      <td><label>
                                        <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][10]['ErIdx'] or ''}}"/>
                                        {{ $arr_base['register_list'][10]['Name'] or ''}} </label></td>
                                      <td width="72">777,000원</td>
                                      <td align="right">699,300 원</td>
                                      <td align="right">77,700원 할인</td>
                                      <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                        <td>도덕윤리</td>
                                        <td>김민응</td>
                                        <td><label>
                                          <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][11]['ErIdx'] or ''}}"/>
                                          {{ $arr_base['register_list'][11]['Name'] or ''}} </label></td>
                                        <td width="72">1,104,000원</td>
                                        <td align="right">993,600 원</td>
                                        <td align="right">110,400원 할인</td>
                                        <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                        <td>일반사회</td>
                                        <td>허역팀</td>
                                        <td><label>
                                          <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][12]['ErIdx'] or ''}}"/>
                                          {{ $arr_base['register_list'][12]['Name'] or ''}} </label></td>
                                        <td width="72">1,992,000원</td>
                                        <td align="right">1,792,800 원</td>
                                        <td align="right">199,200원 할인</td>
                                        <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                      <td rowspan="2">역사</td>
                                      <td rowspan="2">김종권</td>
                                      <td><label>
                                        <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][13]['ErIdx'] or ''}}"/>
                                        {{ $arr_base['register_list'][13]['Name'] or ''}} </label></td>
                                      <td width="72">2,304,000원</td>
                                      <td align="right">2,073,600 원</td>
                                      <td align="right">230,400원 할인</td>
                                      <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                      <td><label>
                                        <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][14]['ErIdx'] or ''}}"/>
                                        {{ $arr_base['register_list'][14]['Name'] or ''}} </label></td>
                                      <td width="72">1,872,000원</td>
                                      <td align="right">1,684,800 원</td>
                                      <td align="right">187,200원 할인</td>
                                      <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                      <td>체육</td>
                                      <td>최규훈</td>
                                      <td><label>
                                        <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][15]['ErIdx'] or ''}}"/>
                                        {{ $arr_base['register_list'][15]['Name'] or ''}} </label></td>
                                      <td width="72">1,690,000원</td>
                                      <td align="right">1,521,000 원</td>
                                      <td align="right">169,000원 할인</td>
                                      <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                      <td rowspan="2">중국어</td>
                                      <td rowspan="2">장영희</td>
                                      <td><label>
                                        <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][16]['ErIdx'] or ''}}"/>
                                        {{ $arr_base['register_list'][16]['Name'] or ''}} </label></td>
                                      <td width="72">3,496,000원</td>
                                      <td align="right">3,146,400 원</td>
                                      <td align="right">349,600원 할인</td>
                                      <td><a href="#none">결제하기</a></td>
                                    </tr>
                                    <tr>
                                      <td>
                                          <label>
                                              <input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][17]['ErIdx'] or ''}}"/>
                                              {{ $arr_base['register_list'][17]['Name'] or ''}}
                                          </label>
                                        </td>
                                        <td width="72">1,864,000원</td>
                                        <td align="right">1,677,600 원</td>
                                        <td align="right">186,400원 할인</td>
                                        <td><a href="#none">결제하기</a></td>
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

        <div class="eventWrap evtInfo" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">환승&재도전 이벤트 유의사항 [필독]</h4>
                <ul>
                    <li>본 이벤트의 대상자는 타 학원 또는 윌비스 임용에 수강 이력이 있어야 참여 가능합니다.</li>
                    <li>본 이벤트의 참여를 위해서는 타 학원에서 수강 이력자는 수강사실을 증명해야 합니다.<br>
                    - 본 이벤트 페이지의 <strong>"타학원 수강이력인증창"</strong>에, 인증서류를 스캔하여 전송하는 절차를 진행한 후 참여 가능니다.<br>
                    - 본 이벤트 참여를 위한 인증서류는 수강기간이 명기되어 있는 <strong>수강증</strong>, 1개월 이내 발급된 수강확인증 등 입니다.<br>
                    - 인증 서류의 식별이 불가능한 경우 또는 이미지를 도용한 경우에는 할인혜택이 적용이 불가합니다.</li>
                    <li>본 이벤트 참여를 위한 윌비스 임용의 수강생은 별도의 인증 절차를 거치지 않으셔도 됩니다. (신청 시, 자체 검증 가능)</li>
                    <li>본 이벤트는 5월31일(일)까지 진행됩니다. (5월31일까지 신청할 수 있음)</li>
                    <li>본 이벤트에서 타학원 수강이 인증되면, 개별 ID로 할인쿠폰이 발급되며, 7일이내 수강하셔야 합니다. (* 7일후 쿠폰소멸)</li>
                    <li>본 이벤트를 통하여 수강하고, 환불시에는 할인된 수강료가 아니고, 원수강료에서 기산됩니다. </li>
                    <li>본 이벤트는 교재가 필요하다고 판단되면, 별도로 구매하셔야 합니다. </li>
                    <li>본 이벤트로 인한 할인강의는 양도 및 매매가 불가능하며, 위반시 처벌받을 수 있습니다.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            AOS.init();
            fnReviewList(1);
        });
    </script>

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
                alert('타학원 수강이력 인증 파일을 첨부해 주세요.');
                $regi_form_register.find('input[name="attach_file"]').focus();
                return;
            }

            if ($regi_form_register.find('input[name="register_chk[]"]:checked').length === 0) {
                alert('강좌를 선택해 주세요.');
                return;
            }

            // 강좌 총 3개까지 선택 가능
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

            // 교육학은 한번만 선택 가능
            if (subject_count > 1) {
                alert('강좌는 교육학 1개, 전공강좌 2개 총 3개까지 선택 가능합니다.');
                return;
            }

            // 강좌 3개 선택시 추가 검증
            if ($regi_form_register.find('input[name="register_chk[]"]:checked').length === 3) {
                if (subject_count !== 1) {
                    alert('강좌는 교육학 1개, 전공강좌 2개 총 3개까지 선택 가능합니다.');
                    return;
                }
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