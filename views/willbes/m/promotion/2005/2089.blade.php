@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox ul:after {content:""; display:block; clear:both}    

    /************************************************************/

    .evt_top {}

    .evt01 {background:#eee}
    
    .evtInfo {padding:80px 20px; background:#333; color:#fff; font-size:16px;}
    .evtInfoBox {text-align:left; line-height:1.5}
    .evtInfoBox li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px; color:#ccc}
    .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
    .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox .only {color:#E80000;vertical-align:top;}

    /**/
    input[type=radio],
    input[type=checkbox] {width:16px; height:16px;}
    select,
    input[type=email],
    input[type=tel],
    input[type=number],
    input[type=text] {padding:2px; margin-right:10px; height:26px; vertical-align: middle}
    input[type=file]:focus,
    input[type=text]:focus {border:1px solid #1087ef}
    label {margin:0 10px 0 5px}
    input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}

    .boardTypeB {width:100%; margin:0 auto; border-top:#464646 1px solid; border-bottom:#464646 1px solid; border-left:#cdcdcd 1px solid; background:#fff; line-height: 1.5}
    .boardTypeB caption {display:none}
    .boardTypeB thead th,
    .boardTypeB tbody th {color:#464646; font-weight:bold; border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; text-align:center; padding:15px 8px;}
    .boardTypeB tbody td {letter-spacing:normal; padding:10px 8px;}
    .boardTypeB thead th {background:#e9e8e8;}
    .boardTypeB tbody th {background:#f3f3f3;}
    .boardTypeB tbody td {border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; vertical-align:middle; color:#464646; text-align:center}
    .boardTypeB tbody tr.bg01 th {background:#e5f2fe}
    .boardTypeB tbody td input {margin:0 auto}
    .boardTypeB tbody td label {margin-right:10px}
    .boardTypeB tbody td span {vertical-align:text-top}

    .q_type li {margin:5px 0}
    .q_type li span {display:inline-block; width:70px}

    .btns {text-align:center; margin:30px 0}
    .btns span,
    .btns a {display:inline-block; padding:8px 16px; background:#1087ef; color:#fff !important; font-size:18px; border:1px solid #1087ef}
    .btns a.btn2 {background:#464646; color:#fff !important; border:1px solid #464646}
    .btns a:hover {background:#fff; color:#1087ef !important}
    .btns a.btn2:hover {background:#fff; color:#464646 !important}

    .txtinfo {border:1px solid #464646; padding:20px; height:150px; overflow-y:scroll}
    .txtinfo li {margin-left:20px; list-style-type: decimal;}

    .sub_warp {margin:0 auto; padding:50px 10px; font-size:14px; line-height:1.5}
    .sub_warp h2 {clear:both; font-size:24px; font-weight:bold; padding-left:30px; margin-bottom:1em; color:#464646; background:url(https://static.willbes.net/public/images/promotion/2019/04/1211_passcop_icon1.png) no-repeat left center}
    .sub_warp h2 div {position:absolute; top:5px; right:0; font-size:12px; color:#adadad; letter-spacing:normal}
    .sub_warp h2 span {color:#C03}
    .sub_warp h2 select {padding:5px}

    .markingtitle {font-size:16px; font-weight:bold; padding:10px 0; text-align:center; background:#f4f4f4; border:1px solid #000}
    .markingBox {padding:30px 0; border-top:2px solid #000; border-bottom:2px solid #000}
    .markingBox h3 {font-size:16px; background:#444; color:#fff; height:40px; line-height:40px; padding:0 20px; margin-bottom:10px; border-radius:15px 15px 0 0}
    .markingBox .number li {display:inline; float:left; margin-right:30px}
    .markingBox .number:after {content:""; display:block; clear:both}

    .omrWarp {padding:1em 0}
    .omrL {float:left; width:77%;}
    .omrL .paper {width:100%; height:690px; overflow-y: scroll; background:#F0F0F0}
    .omrR {float:right; width:22%; padding-left:15px; border-left:1px solid #ccc;}

    .omrR p {margin-bottom:1em}
    .omrWarp th,
    .omrWarp td {text-align:center; padding:4px !important}
    .omrWarp tr.check {background:#eefafd}

    .omrWarp input[type=text] {width:80%; letter-spacing:5px; text-align:center}
    .omrWarp h4 {margin-bottom:0.5em; color:#000; font-size: 14px}
    .qMarking {margin-bottom:1em;}
    .qMarking h4 span {color:#666; vertical-align:bottom}

    .selfMarking input[type=text] {width:50%; margin:0 auto; letter-spacing:0}
    .selfMarking p {margin-top:1em}

    .errata {padding:0 10px}
    .errata li {display:inline; float:left; width:20%; padding-right:20px}
    .errata li:last-child {padding:0}
    .errata p {background:#333; color:#fff; text-align:center; padding:10px 0; margin-bottom:10px}
    .errata .boardTypeB tr td:nth-last-child(3) {color:#09F !important}
    .errata td:first-child {color:#09F !important}
    .mypoint {text-align:left !important}
    .mypoint input[type=text] {width:50px; margin:0 !important; text-align:right}
    .mypoint span {vertical-align: bottom}
    .omrWarp:after {content:""; display:block; clear:both}
</style>

    <div id="Container" class="Container NSK c_both">            
        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2089m_top.jpg" alt="psat 합격을 예측하다">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2089m_01.jpg" alt="이벤트">
        </div>

        <div class="sub_warp NSK">
            <form class="form-table" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate="">            
                <input type="hidden" name="_csrf_token" value="19f339eb945ff003f1a9c54334296c9b">
                <input type="hidden" name="predict_idx" value="100001">
                <input type="hidden" name="PrIdx" value="">
                <input type="hidden" name="SiteCode" value="2005">
                <input type="hidden" name="mode" value="INS">
                <input type="hidden" name="research_type" id="research_type" value="Research2">
                <input type="hidden" name="take_mock_part_val" value="">
                
                <div class="sub3_1">
                    <h2>기본정보 입력 </h2>
                    <table class="boardTypeB">
                        <colgroup>
                            <col width="20%">
                            <col width="">
                        </colgroup>
                        <tbody>
                            <tr>
                                <th>직렬 / 응시번호</th>
                                <td class="tx-left">
                                    <select name="take_mock_part" id="take_mock_part">
                                        <option value="">응시직렬</option>
                                        <option value="686001">일반행정</option>
                                        <option value="686035">재경</option>
                                        <option value="686036">국립외교원</option>
                                    </select>
                                    <input type="text" name="take_num" id="take_num" maxlength="8" oninput="maxLengthCheck(this)" style="width:150px" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>책형</th>
                                <td class="tx-left">
                                    <ul class="q_type">
                                        <li>
                                            <span>헌법</span>
                                            <input type="radio" name="" id="ka_a" value=""><label for="ka_a">가형</label>
                                            <input type="radio" name="" id="da_a" value=""><label for="da_a">다형</label>
                                        <li>
                                        <li>
                                            <span>언어논리</span>
                                            <input type="radio" name="" id="ka_b" value=""><label for="ka_b">가형</label>
                                            <input type="radio" name="" id="da_b" value=""><label for="da_b">다형</label>
                                        <li>
                                        <li>
                                            <span>자료해석</span>
                                            <input type="radio" name="" id="ka_c" value=""><label for="ka_c">가형</label>
                                            <input type="radio" name="" id="da_c" value=""><label for="da_c">다형</label>
                                        <li>
                                        <li>
                                            <span>상황판단</span>
                                            <input type="radio" name="" id="ka_d" value=""><label for="ka_d">가형</label>
                                            <input type="radio" name="" id="da_d" value=""><label for="da_d">다형</label>
                                        <li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>이름</th>
                                <td class="tx-left">
                                    홍길동
                                </td>
                            </tr>
                            <tr>
                                <th>이메일 </th>
                                <td class="tx-left">
                                    <input type="email" id="register_email" name="register_email" maxlength="30" placeholder="이메일" value="winmir@willbes.com" style="width:250px">
                                </td>
                            </tr>
                            <tr>
                                <th>연락처</th>
                                <td class="tx-left">
                                    <input type="tel" id="register_tel" name="register_tel" maxlength="11" placeholder="연락처" value="01056703208" style="width:150px">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <h2 class="mt50">개인정보 수집 및 이용에 대한 안내 </h2>
                    <div class="txtinfo">
                        <ul>
                            <li>개인정보 수집 항목(개인정보 보호법 제15조 제2항)<br>
                            - 성명, 응시번호, 휴대폰 번호, 전자 우편 주소</li>
                            <li>개인정보 수집 및 이용 목적(개인정보 보호법 제15조 제2항 제1호)<br>
                            - 성적 이벤트 등의 본인확인<br>
                            - 고지사항 전달, 본인 의사 확인 등 원활한 의사소통 경로의 확보<br>
                            - 서비스 이용과 관련된 정보 안내 등 편의제공 목적</li>
                            <li>개인정보 보유 및 이용기간(개인정보 보호법 제15조 제2항 제3호)<br>
                            - 수집된 개인정보는 상기 2번의 용도 이외의 목적으로는 사용되지 않습니다.</li>
                            <li>개인정보 수집동의 거부 및 거부에 따른 이용제한(개인정보 보호법 제15조 제2항 제4호)<br>
                            - 고객님은 개인정보의 수집 및 이용에 대하여 동의를 거부할 수 있습니다. <br>
                            - 개인정보 수집에 동의하지 않거나, 부정확한 정보를 입력하는 경우, 본 이벤트 관련 서비스 이용이 제한됨을 알려드립니다.</li>
                        </ul>
                    </div>
                    <div class="mt10"><input type="checkbox" name="is_chk" id="is_chk"><label for="is_chk">윌비스에 개인정보제공 동의하기(필수)</label></div>

                    <div class="btns NGR">
                        <a href="#none">등록</a>
                    </div>

                    {{--Research 1--}}
                    <div class="markingtitle mt50">Research 1<br>(2020.05.16[토] 18: 00 ~ 2020.05.16[토] 20 : 00까지 )<br>※ 2사간만 제공 - 빠른 채점 제공</div>
                    <div class="markingBox">
                        <h3>응시횟수</h3>
                        <ul class="number">
                            <li><input type="radio" name="take_cnt" id="one" value="1"><label for="one">1회</label></li>
                            <li><input type="radio" name="take_cnt" id="two" value="2"><label for="two">2회</label></li>
                            <li><input type="radio" name="take_cnt" id="three" value="3"><label for="three">3회</label></li>
                            <li><input type="radio" name="take_cnt" id="four" value="4"><label for="four">4회 이상</label></li>
                        </ul>

                        <h3 class="mt30">본인 점수 입력</h3>
                        
                        <div class="omrWarp">
                            <div class="qMarking">
                                <h4>헌법<span> | 원점수: 100점</span></h4>
                                <table class="boardTypeB">
                                    <tr>
                                        <th>1~5</th>
                                        <th>6~10</th>
                                        <th>11~15</th>
                                        <th>16~20</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>21~25</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="qMarking">
                                <h4>언어논리<span> | 원점수: 100점</span></h4>
                                <table class="boardTypeB">
                                    <tr>
                                        <th>1~5</th>
                                        <th>6~10</th>
                                        <th>11~15</th>
                                        <th>16~20</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>21~25</th>
                                        <th>26~30</th>
                                        <th>31~35</th>
                                        <th>36~40</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="qMarking">
                                <h4>자료해석<span> | 원점수: 100점</span></h4>
                                <table class="boardTypeB">
                                    <tr>
                                        <th>1~5</th>
                                        <th>6~10</th>
                                        <th>11~15</th>
                                        <th>16~20</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>21~25</th>
                                        <th>26~30</th>
                                        <th>31~35</th>
                                        <th>36~40</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="qMarking">
                                <h4>상황판단<span> | 원점수: 100점</span></h4>
                                <table class="boardTypeB">
                                    <tr>
                                        <th>1~5</th>
                                        <th>6~10</th>
                                        <th>11~15</th>
                                        <th>16~20</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>21~25</th>
                                        <th>26~30</th>
                                        <th>31~35</th>
                                        <th>36~40</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                        <td>
                                            <input class="txt-answer" id="" type="text" name="" maxlength="5" oninput="" data-input-id="" value="" placeholder="답안입력">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <h3 class="mt30">과목별 체감난이도</h3>
                        <table class="boardTypeB">
                            <colgroup>
                                <col>
                                <col width="80%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>과목</th>
                                    <th>난이도</th>
                                </tr>
                                <tr>
                                    <th>헌법</th>
                                    <td>
                                        <ul class="number">
                                            <li><input type="radio" name="take_level_9" class="take-level" id="top_9" data-take-level-ppidx="9" value="H">
                                                <label for="top_9">상</label>
                                            </li>
                                            <li><input type="radio" name="take_level_9" class="take-level" id="middle_9" data-take-level-ppidx="9" value="M">
                                                <label for="middle_9">중</label>
                                            </li>
                                            <li><input type="radio" name="take_level_9" class="take-level" id="bottom_9" data-take-level-ppidx="9" value="L">
                                                <label for="bottom_9">하</label>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>언어논리</th>
                                    <td>
                                        <ul class="number">
                                            <li><input type="radio" name="take_level_10" class="take-level" id="top_10" data-take-level-ppidx="10" value="H">
                                                <label for="top_10">상</label>
                                            </li>
                                            <li><input type="radio" name="take_level_10" class="take-level" id="middle_10" data-take-level-ppidx="10" value="M">
                                                <label for="middle_10">중</label>
                                            </li>
                                            <li><input type="radio" name="take_level_10" class="take-level" id="bottom_10" data-take-level-ppidx="10" value="L">
                                                <label for="bottom_10">하</label>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>자료해석</th>
                                    <td>
                                        <ul class="number">
                                            <li><input type="radio" name="take_level_11" class="take-level" id="top_11" data-take-level-ppidx="11" value="H">
                                                <label for="top_11">상</label>
                                            </li>
                                            <li><input type="radio" name="take_level_11" class="take-level" id="middle_11" data-take-level-ppidx="11" value="M">
                                                <label for="middle_11">중</label>
                                            </li>
                                            <li><input type="radio" name="take_level_11" class="take-level" id="bottom_11" data-take-level-ppidx="11" value="L">
                                                <label for="bottom_11">하</label>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>상황판단</th>
                                    <td>
                                        <ul class="number">
                                            <li><input type="radio" name="take_level_12" class="take-level" id="top_12" data-take-level-ppidx="12" value="H">
                                                <label for="top_12">상</label>
                                            </li>
                                            <li><input type="radio" name="take_level_12" class="take-level" id="middle_12" data-take-level-ppidx="12" value="M">
                                                <label for="middle_12">중</label>
                                            </li>
                                            <li><input type="radio" name="take_level_12" class="take-level" id="bottom_12" data-take-level-ppidx="12" value="L">
                                                <label for="bottom_12">하</label>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="btns NGR">
                        <a href="#none" onclick="javascript:js_submit();">수정</a>
                    </div>


                    {{--Research 2--}}
                    <div class="markingtitle mt50">Research 2<br>(2020.05.16[토] 20: 00 이후 ~ 2020.05.22[금] 20 : 00 )<br>※ 약 일주일간 제공</div>
                    <div class="markingBox">
                        <h3>응시횟수</h3>
                        <ul class="number">
                            <li><input type="radio" name="take_cnt" id="one" value="1"><label for="one">1회</label></li>
                            <li><input type="radio" name="take_cnt" id="two" value="2"><label for="two">2회</label></li>
                            <li><input type="radio" name="take_cnt" id="three" value="3"><label for="three">3회</label></li>
                            <li><input type="radio" name="take_cnt" id="four" value="4"><label for="four">4회 이상</label></li>
                        </ul>

                        <h3 class="mt30">본인 점수 입력</h3>

                        <table class="boardTypeB">
                            <colgroup>
                                <col>
                                <col width="80%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>과목</th>
                                    <th>점수입력</th>
                                </tr>
                                <tr>
                                    <th>헌법</th>
                                    <td class="mypoint">
                                        <input type="text" class="txt-answer2" name="Score[]" maxlength="4" oninput="maxLengthCheck(this)" data-max-num="100" value=""> 점
                                        <input type="hidden" name="PpIdx[]" value="9">
                                        (합격/불합격 여부 : <span class="tx-red">불합격</span>)
                                    </td>
                                </tr>
                                <tr>
                                    <th>언어논리</th>
                                    <td class="mypoint">
                                        <input type="text" class="txt-answer2" name="Score[]" maxlength="4" oninput="maxLengthCheck(this)" data-max-num="100" value=""> 점
                                        <input type="hidden" name="PpIdx[]" value="10">
                                    </td>
                                </tr>
                                <tr>
                                    <th>자료해석</th>
                                    <td class="mypoint">
                                        <input type="text" class="txt-answer2" name="Score[]" maxlength="4" oninput="maxLengthCheck(this)" data-max-num="100" value=""> 점
                                        <input type="hidden" name="PpIdx[]" value="11">
                                    </td>
                                </tr>
                                <tr>
                                    <th>상황판단</th>
                                    <td class="mypoint">
                                        <input type="text" class="txt-answer2" name="Score[]" maxlength="4" oninput="maxLengthCheck(this)" data-max-num="100" value=""> 점
                                        <input type="hidden" name="PpIdx[]" value="12">
                                    </td>
                                </tr>
                                <tr>
                                    <th>▶ 내 점수 평균 </th>
                                    <td class="mypoint">
                                        <span class="tx-blue">25.3</span> 점
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <h3 class="mt30">과목별 체감난이도</h3>
                        <table class="boardTypeB">
                            <colgroup>
                                <col>
                                <col width="80%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>과목</th>
                                    <th>난이도</th>
                                </tr>
                                <tr>
                                    <th>헌법</th>
                                    <td>
                                        <ul class="number">
                                            <li><input type="radio" name="take_level_9" class="take-level" id="top_9" data-take-level-ppidx="9" value="H">
                                                <label for="top_9">상</label>
                                            </li>
                                            <li><input type="radio" name="take_level_9" class="take-level" id="middle_9" data-take-level-ppidx="9" value="M">
                                                <label for="middle_9">중</label>
                                            </li>
                                            <li><input type="radio" name="take_level_9" class="take-level" id="bottom_9" data-take-level-ppidx="9" value="L">
                                                <label for="bottom_9">하</label>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>언어논리</th>
                                    <td>
                                        <ul class="number">
                                            <li><input type="radio" name="take_level_10" class="take-level" id="top_10" data-take-level-ppidx="10" value="H">
                                                <label for="top_10">상</label>
                                            </li>
                                            <li><input type="radio" name="take_level_10" class="take-level" id="middle_10" data-take-level-ppidx="10" value="M">
                                                <label for="middle_10">중</label>
                                            </li>
                                            <li><input type="radio" name="take_level_10" class="take-level" id="bottom_10" data-take-level-ppidx="10" value="L">
                                                <label for="bottom_10">하</label>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>자료해석</th>
                                    <td>
                                        <ul class="number">
                                            <li><input type="radio" name="take_level_11" class="take-level" id="top_11" data-take-level-ppidx="11" value="H">
                                                <label for="top_11">상</label>
                                            </li>
                                            <li><input type="radio" name="take_level_11" class="take-level" id="middle_11" data-take-level-ppidx="11" value="M">
                                                <label for="middle_11">중</label>
                                            </li>
                                            <li><input type="radio" name="take_level_11" class="take-level" id="bottom_11" data-take-level-ppidx="11" value="L">
                                                <label for="bottom_11">하</label>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>상황판단</th>
                                    <td>
                                        <ul class="number">
                                            <li><input type="radio" name="take_level_12" class="take-level" id="top_12" data-take-level-ppidx="12" value="H">
                                                <label for="top_12">상</label>
                                            </li>
                                            <li><input type="radio" name="take_level_12" class="take-level" id="middle_12" data-take-level-ppidx="12" value="M">
                                                <label for="middle_12">중</label>
                                            </li>
                                            <li><input type="radio" name="take_level_12" class="take-level" id="bottom_12" data-take-level-ppidx="12" value="L">
                                                <label for="bottom_12">하</label>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <h3 class="mt30">본인 예상하는 실제 PSAT 커트라인</h3>
                        <div class="mypoint">평균 <input type="text" name="cut_point" id="cut_point" maxlength="4" data-max-num="100" oninput="maxLengthCheck(this)" value=""> 점 </div>
                    </div>
                    
                    <div class="btns NGR">
                        <a href="#none" onclick="javascript:js_submit();">수정</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">이벤트 유의사항</h4>
				<ul>
                    <li>본 이벤트는 5급공채(일반행정·재경), 국립외교원 시험 응시자만 참여 가능합니다.</li>
                    <li>설문조사 + 정답 또는 점수까지 입력이 완료된 이용자에 한하여 지급 및 추첨합니다.</li>
                    <li>이벤트 2의 경우 중복당첨되지 않습니다.</li>
                    <li>개인정보 수집 및 이용에 동의하지 않으신 분은 이벤트 참여가 불가능합니다.</li>
                    <li>경품은 모바일 쿠폰(기프티콘) 형태로 발송되며, 발송은 1회로 제한합니다.</li>
                    <li>기프티콘은 이벤트 참여시 기재된 전화번호로 발송됩니다.</li>
                    <li>휴대폰번호 오류 시 기프티콘은 재발송 되지 않습니다.</li>
                    <li>휴대전화 단말기의 MMS 수신상태가 양호하지 않은 경우, 기프티콘 수신이 불가할 수 있습니다.</li>
                    <li>이벤트 참여 전 회원정보(휴대폰 번호)를 정확히 수정해주시기 바랍니다.</li>
                    <li>기프티콘을 수신한 이후 개인사정에 의해 유효기간이 지나 사용하지 못한 경우 사용하지 않은 혜택에 대해서는 별도로 보상하지 않습니다.</li>
                </ul>
                <div>※ 유의사항을 읽지 않고 발생한 모든 상황에 대해서 한림법학원은 책임지지 않습니다.</div>
			</div>
		</div> 

    </div>
    <!-- End Container -->


<script type="text/javascript">
    $(document).ready(function(){
        loginAlert();   {{-- 비로그인시 로그인 메세지 --}}
    });

    {{-- 초기 로그인 얼럿 --}}
    function loginAlert() {
        {!! login_check_inner_script('로그인 후 이벤트에 참여해주세요.','Y') !!}
    }
</script>
@stop