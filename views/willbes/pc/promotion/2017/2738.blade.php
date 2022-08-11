@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative; font-size:14px; line-height:1.4}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .eventTop {background:url("https://static.willbes.net/public/images/promotion/2022/08/2738_top_bg.jpg") no-repeat center top;}

        .event03 {padding-bottom:100px; width:1120px; margin:0 auto;}
        .event03Box h5 {font-size:24px; color:#202020; text-align:left; padding-bottom:10px; border-bottom:3px solid #000; font-weight:600; margin-bottom:40px}
        .event03Box h5 span {font-size:14px; color:#474747; margin-left:20px; font-weight:normal; vertical-align:bottom}
        .event03Box h5 strong {color:#d30000;}
        .event03-txt01 {text-align:left; font-size:14px; margin:20px 0 10px}

        .event03 .btnBox a {width:360px; margin:0 auto; display:inline-block;color:#fff; background:#1f3b8e; font-size:26px; font-weight:bold; height:70px; line-height:70px; border-radius:40px; text-align:center}
        .event03 .btnBox a:hover {background:#1b233b;}

        .evt_tableA {margin-bottom:30px;}
        .evt_tableA table{width:100%;}
        .evt_tableA table tr{border-bottom:1px solid #e6e6e8}
        .evt_tableA table tr:last-of-type{border-bottom:1px solid #e6e6e8}
        .evt_tableA table thead th,
        .evt_tableA table tbody th{background:#dedede; font-size:16px; font-weight:300; text-align:center; color:#333; padding:10px 0; border-right:1px solid #fff}
        .evt_tableA table thead th {text-align:center}
        .evt_tableA table tbody td {font-size:14px; color:#555; text-align:left; padding:10px; border-right:0; }
        .evt_tableA table tbody td strong {color:red; font-size:16px;}
        .evt_tableA table tbody td span {font-size:12px; vertical-align:bottom}
        .evt_tableA table tbody td:nth-last-child(1) a,
        .evt_tableA table tbody td a.btn02 {display:block; padding:5px; background:#ff5200; color:#fff; border-radius:4px; font-size:12px; text-align:center;}
        .evt_tableA table tbody td a:hover {background:#000}
        .evt_tableA table tbody td .profImg {position:relative; border:1px solid #000}
        .evt_tableA table tbody td p {color:#000; font-size:16px;}        
        .evt_tableA table tbody td img {width:140px}
        .evt_tableA table tbody td .subject {position: absolute; bottom:0; left:0; width:100%; background:rgba(0,0,0,.5); color:#fff; padding:5px; text-align:center; z-index: 10;}
        .evt_tableA table tbody td:nth-last-child(3), 
        .evt_tableA table tbody td:nth-last-child(2) {text-align:center}

        
        .event04 {background:#c6e6f4}

        .evtInfo {padding:100px 0; background:#1b1a1f; font-size:16px; color:#fff}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal; margin-left:20px; margin-bottom:10px}
        .evtInfoBox li:last-child {margin-bottom:0}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2738_top.jpg" alt="막판정리 이론 패스"/>
        </div>

        <div class="evtCtnsBox event01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2738_01.jpg" alt="방대한 이론, 핵심 개념"/>
        </div>

        <div class="evtCtnsBox event02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2738_02.jpg" alt="반복, 정리, 준비"/>
        </div>

        <div class="evtCtnsBox event03" data-aos="fade-up">

            <div class="event03Box">
                <h5>강좌선택 <span>윌비스 임용 막판정리 이론PASS는 <strong>인강만 진행</strong>하고 있습니다. (모든 강의는 1.1배수로 제공 되며, 강의 중 일시정지 및 연장은 불가합니다)</span></h5>
                <div class="event03-txt01">
                    <div id="lecture_box" style="display: none;">
                        <input name="y_pkg1" type="checkbox" value="200356" checked="checked">
                        <input name="y_pkg2" type="checkbox" value="200357" checked="checked">
                        <input name="y_pkg3" type="checkbox" value="200358" checked="checked">
                        <input name="y_pkg4" type="checkbox" value="200363" checked="checked">
                        <input name="y_pkg5" type="checkbox" value="200364" checked="checked">
                        <input name="y_pkg6" type="checkbox" value="200365" checked="checked">
                        <input name="y_pkg7" type="checkbox" value="200367" checked="checked">
                        <input name="y_pkg8" type="checkbox" value="200368" checked="checked">
                        <input name="y_pkg9" type="checkbox" value="200372" checked="checked">
                        <input name="y_pkg10" type="checkbox" value="200374" checked="checked">
                        <input name="y_pkg11" type="checkbox" value="200375" checked="checked">
                        <input name="y_pkg12" type="checkbox" value="200376" checked="checked">
                        <input name="y_pkg13" type="checkbox" value="200377" checked="checked">
                        <input name="y_pkg14" type="checkbox" value="200378" checked="checked">
                        <input name="y_pkg15" type="checkbox" value="200379" checked="checked">
                        <input name="y_pkg16" type="checkbox" value="200380" checked="checked">
                        <input name="y_pkg17" type="checkbox" value="200382" checked="checked">
                        <input name="y_pkg18" type="checkbox" value="200381" checked="checked">
                        <input name="y_pkg19" type="checkbox" value="200383" checked="checked">
                        <input name="y_pkg20" type="checkbox" value="200384" checked="checked">
                        <input name="y_pkg21" type="checkbox" value="200385" checked="checked">
                        <input name="y_pkg22" type="checkbox" value="200390" checked="checked">
                        <input name="y_pkg23" type="checkbox" value="200392" checked="checked">
                        <input name="y_pkg24" type="checkbox" value="200393" checked="checked">
                        <input name="y_pkg25" type="checkbox" value="200391" checked="checked">
                        <input name="y_pkg26" type="checkbox" value="200389" checked="checked">
                        <input name="y_pkg27" type="checkbox" value="200388" checked="checked">
                        <input name="y_pkg28" type="checkbox" value="200387" checked="checked">
                        <input name="y_pkg29" type="checkbox" value="200386" checked="checked">
                        <input name="y_pkg30" type="checkbox" value="200371" checked="checked">
                        <input name="y_pkg31" type="checkbox" value="200370" checked="checked">
                        <input name="y_pkg32" type="checkbox" value="200369" checked="checked">
                    </div>

                    <div class="evt_tableA">
                        <table>
                            <col width="140px"/>
                            <col />
                            <col width="8%"/>
                            <col width="23%"/>
                            <col width="8%"/>
                            <thead>
                                <tr>
                                    <th>과목 / 교수</th>
                                    <th>과정명 / 포함강좌</th>
                                    <th>수강기간</th>
                                    <th>수강료</th>
                                    <th>수강신청</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="2">
                                        <div class="profImg">
                                            <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51312/prof_detail_51312.png">
                                            <div class="subject">교육학 이경범</div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>2022 1-4월 이경범 교육학 필수이론 PASS</p>
                                        1. 기본이론반<br />
                                        2. 통합 기출분석(New 논객)반
                                    </td>
                                    <td>100일</td>
                                    <td>680,000원 → <strong>306,000원<span>(55%↓)</span></></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200356" onclick="goCartNDirectPay('lecture_box', 'y_pkg1', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>2022 1~6월 이경범 교육학 막판정리 이론 PASS</p>
                                        1. 기본이론반<br />
                                    2. 통합 기출분석(New 논객)반<br />
                                    3. 핵심 THEME 이론 및 실제</td>
                                    <td>100일</td>
                                    <td>1,020,000원 → <strong>408,000원<span>(60%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200357" onclick="goCartNDirectPay('lecture_box', 'y_pkg2', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">
                                        <div class="profImg">
                                            <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51336/prof_detail_51336.png">
                                            <div class="subject">교육학 신태식</div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>2022 1-4월 신태식 교육학 필수 이론 PASS</p>
                                        1. 기본이론(개념이해)반<br />
                                    2. 심화이론(개념심화)반</td>
                                    <td>100일</td>
                                    <td>700,000원 → <strong>315,000원<span>(55%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200358" onclick="goCartNDirectPay('lecture_box', 'y_pkg3', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>2022 1~6월 신태식 교육학 막판정리 이론 PASS</p>
                                        1. 기본이론(개념이해)반<br />
                                    2. 심화이론(개념심화)반<br />
                                    3. 기출분석(단권화)반</td>
                                    <td>100일</td>
                                    <td>1,000,000원 → <strong>400,000원<span>(60%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200363" onclick="goCartNDirectPay('lecture_box', 'y_pkg4', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">
                                        <div class="profImg">
                                            <img src="https://ssam.stage.willbes.net/public/uploads/willbes/professor/51078/prof_detail_51078.png">
                                            <div class="subject">전공국어 송원영</div>
                                        </div>
                                    </td>
                                    <td><p>2022 1-4월 송원영 국어교육론 막판정리 이론 PASS</p>
                                        1. 국어교육론 이론정리반<br />
                                    2. 국어교육론 교육과정의 체계적 이해</td>
                                    <td>100일</td>
                                    <td>380,000원 → <strong>190,000원<span>(50%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200364" onclick="goCartNDirectPay('lecture_box', 'y_pkg5', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td><p>2022 3-6월 송원영 문학교육론 막판정리 이론 PASS</p>
                                        1. 문학교육론 변환 문제풀이 및 작품 분석반(현대문학분석)<br />
                                    2. 문학 교과서 학습 활동 밑 작품분석반(고전문학)</td>
                                    <td>100일</td>
                                    <td>380,000원 → <strong>171,000원<span>(55%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200365" onclick="goCartNDirectPay('lecture_box', 'y_pkg6', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">
                                        <div class="profImg">
                                            <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51080/prof_detail_51080.png">
                                            <div class="subject">전공국어 권보민</div>
                                        </div>
                                    </td>
                                    <td><p>2022 1-4월 권보민 국어문법 막판정리 이론 PASS</p>
                                        1. 현대문법 기초 다지기<br />
                                    2. 중세문법 기초 다지기<br />
                                    3. 현대문법+중세문법 강화하기(심화)</td>
                                    <td>100일</td>
                                    <td>600,000원 → <strong>240,000(60%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200367" onclick="goCartNDirectPay('lecture_box', 'y_pkg7', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td><p>2022 1-6월 권보민 중세국어 자료강독 PASS</p>
                                        1. 중세 국어 문법 개론서 예문 분석 1<br />
                                    2. 중세 국어 문법 개론서 예문 분석 2 및 자료 강독 1<br />
                                    3. 중세 국어 원전 자료 강독 2</td>
                                    <td>100일</td>
                                    <td>150,000원 → <strong>75,000원<span>(50%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200368" onclick="goCartNDirectPay('lecture_box', 'y_pkg8', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td><p>2022 1-4월 권보민 국어문법 기출분석 PASS</p>
                                        1. 기출문제 분석 및 응용반 1<br />
                                    2. 기출문제 분석 및 응용반 2</td>
                                    <td>100일</td>
                                    <td>100,000원 → <strong>50,000원<span>(50%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200372" onclick="goCartNDirectPay('lecture_box', 'y_pkg9', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">
                                        <div class="profImg">
                                            <img src="https://ssam.stage.willbes.net/public/uploads/willbes/professor/51313/prof_detail_51313.png">
                                            <div class="subject">전공국어 구동언</div>
                                        </div>
                                    </td>
                                    <td><p>2022 1-6월 구동언 국어교육론 막판정리 이론 PASS</p>
                                        1. 국어교육의 이해(개념+체계)<br />
                                    2. 국어교육 개론서 읽기<br />
                                    3. 국어교육 교과서(화작) 분석</td>
                                    <td>100일</td>
                                    <td>600,000원 → <strong>240,000원<span>(60%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200374" onclick="goCartNDirectPay('lecture_box', 'y_pkg10', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td><p>2022 1-6월 구동언 문학교육론 막판정리 이론 PASS</p>
                                        1. 문학교육의 이해 1(현대시)<br />
                                    2. 문학교육의 이해 2(현대소설)<br />
                                    3. 문학교육의 이해 3(고전시가, 고전산문)</td>
                                    <td>100일</td>
                                    <td>600,000원 → <strong>240,000원<span>(60%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200375" onclick="goCartNDirectPay('lecture_box', 'y_pkg11', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td><p>2022 1-6월 구동언 국어문법 막판정리 이론 PASS</p>
                                        1. 학교문법의 이해(현대국어 체계)<br />
                                    2. 현대국어(심화)+중세국어(기초)<br />
                                    3. 중세국어(심화)+현대국어</td>
                                    <td>100일</td>
                                    <td>540,000원 → <strong>216,000원<span>(60%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200376" onclick="goCartNDirectPay('lecture_box', 'y_pkg12', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="profImg">
                                            <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51082/prof_detail_51082.png">
                                            <div class="subject">전공영어 김영문</div>
                                        </div>
                                    </td>
                                    <td><p>2022 1-6월 김영문 영어학 막판정리 이론 PASS</p>
                                        1. 영어학 기본이론반 I<br />
                                    2. 영어학 기본이론반 II<br />
                                    3. 영어학 Transformational Grammar(Radford) 원서특강</td>
                                    <td>100일</td>
                                    <td>420,000원    → <strong>168,000원<span>(60%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200377" onclick="goCartNDirectPay('lecture_box', 'y_pkg13', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">
                                        <div class="profImg">
                                            <img src="https://ssam.stage.willbes.net/public/uploads/willbes/professor/51084/prof_detail_51084.png">
                                            <div class="subject">전공수학 김철홍</div>
                                        </div>
                                    </td>
                                    <td><p>2022 김철홍 대수학 중심 막판정리 이론 PASS</p>
                                        1. 대수학과 정수론(인강전용+집중관리반)<br />
                                    2. 선형대수학(인강전용)</td>
                                    <td>100일</td>
                                    <td>630,000원 → <strong>189,000원<span>(70%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200378" onclick="goCartNDirectPay('lecture_box', 'y_pkg14', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td><p>2022 김철홍 해석학 중심 막판정리 이론 PASS</p>
                                        1. 해석학(인강전용+집중관리반)<br />
                                    2. 복소해석학(인강전용+집중관리반)</td>
                                    <td>100일</td>
                                    <td>720,000원 → <strong>180,000원<span>(75%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200379" onclick="goCartNDirectPay('lecture_box', 'y_pkg15', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td><p>2022 김철홍 미분기하학 중심 막판정리 이론 PASS</p>
                                        1. 미분기하학(인강전용+집중관리반)<br />
                                    2. 위상수학(인강전용)</td>
                                    <td>100일</td>
                                    <td>390,000원 → <strong>117,000원<span>(70%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200380" onclick="goCartNDirectPay('lecture_box', 'y_pkg16', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="profImg">
                                            <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51338/prof_detail_51338.png">
                                            <div class="subject">전공수학 김현웅</div>
                                        </div>
                                    </td>
                                    <td><p>2022 1-6월 김현웅 전공수학 막판정리 이론 PASS</p>
                                        1. 이론 및 연습문제반 _ 위상수학<br />
                                    2. 이론 및 연습문제반 _ 실해석학<br />
                                    3. 이론 및 연습문제반 _ 복소해석학<br />
                                    4. 이론 및 연습문제반 _ 정수론<br />
                                    5. 이론 및 연습문제반 _ 현대대수학<br />
                                    6. 이론 및 연습문제반 _ 선형대수학<br />
                                    7. 이론 및 연습문제반 _ 미분기하학<br />
                                    8. 이론 및 연습문제반 _이산수학<br />
                                    9. 이론 및 연습문제반 _ 일반통계학</td>
                                    <td>100일</td>
                                    <td>960,000원    → <strong>576,000원<span>(40%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200382" onclick="goCartNDirectPay('lecture_box', 'y_pkg17', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="profImg">
                                            <img src="https://ssam.stage.willbes.net/public/uploads/willbes/professor/51085/prof_detail_51085.png">
                                            <div class="subject">전공수학 박태영</div>
                                        </div>
                                    </td>
                                    <td><p>2022 1-6월 박태영수학교육론 막판정리 이론 PASS</p>
                                        1. 신기한(신론과 기출을 결합한) 이론반<br />
                                    2. 수학교육과정과 교재연구<br />
                                    3. 수학교육론 기출 100선</td>
                                    <td>100일</td>
                                    <td>930,000원 → <strong>279,000원<span>(70%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200381" onclick="goCartNDirectPay('lecture_box', 'y_pkg18', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">
                                        <div class="profImg">
                                            <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51314/prof_detail_51314.png">
                                            <div class="subject">전공수학 박혜향</div>
                                        </div>
                                    </td>
                                    <td><p>2022 1-2월 박혜향 수학교육론 필수 이론 PASS</p>
                                        1. 수학교육론 기본이론반<br />
                                    2. 수학교육론 교직수학반</td>
                                    <td>100일</td>
                                    <td>540,000원 → <strong>189,000원<span>(65%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200383" onclick="goCartNDirectPay('lecture_box', 'y_pkg19', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td><p>2022 1-6월 박혜향수학교육론 막판정리 이론 PASS</p>
                                        1. 수학교육론 기본이론반<br />
                                    2. 수학교육론 교직수학반<br />
                                    3. 수학교육론 각론서반</td>
                                    <td>100일</td>
                                    <td>640,000원 → <strong>224,000원<span>(65%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200384" onclick="goCartNDirectPay('lecture_box', 'y_pkg20', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td><p>2022 1-6월 박혜향 수학교육론 막판정리 이론+글쓰기 PASS</p>
                                        1. 수학교육론 기본이론반<br />
                                    2. 수학교육론 교직수학반<br />
                                    3. 수학교육론 각론서반<br />
                                    4. 수학교육론 기초 글쓰기반<br />
                                    5. 수학교육론 심화 글쓰기반</td>
                                    <td>100일</td>
                                    <td>940,000원 → <strong>282,000원<span>(70%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200385" onclick="goCartNDirectPay('lecture_box', 'y_pkg21', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="profImg">
                                            <img src="https://ssam.stage.willbes.net/public/uploads/willbes/professor/51310/prof_detail_51310.png">
                                            <div class="subject">전공화학 강철</div>
                                        </div>
                                    </td>
                                    <td><p>2022 1-8월 강철 전공화학 막판정리 이론 PASS</p>
                                        1. 유기화학 이론&amp;유기화학 기출문제풀이반<br />
                                    2. 무기화학 이론&amp;유기화학 기출문제풀이반<br />
                                    3. 물리화학 이론&amp;무기화학 기출문제풀이반<br />
                                    4. 분석화학 이론&amp; 물리화학 기출문제 풀이반</td>
                                    <td>100일</td>
                                    <td>1,200,000원 → <strong>360,000원<span>(70%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200390" onclick="goCartNDirectPay('lecture_box', 'y_pkg22', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="profImg">
                                            <img src="https://ssam.stage.willbes.net/public/uploads/willbes/professor/51088/prof_detail_51088.png">
                                            <div class="subject">도덕윤리 김병찬</div>
                                        </div>
                                    </td>
                                    <td><p>2022 1-6월 김병찬 도덕윤리 막판정리 이론 PASS</p>
                                        1. 교과내용학 I(서양ㆍ동양ㆍ한국윤리)<br />
                                    2. 교과내용학 II(응용윤리ㆍ정치ㆍ사회사상)<br />
                                    3. 교과교육론</td>
                                    <td>100일</td>
                                    <td>990,000원 → <strong>495,000원<span>(50%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200392" onclick="goCartNDirectPay('lecture_box', 'y_pkg23', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">
                                        <div class="profImg">
                                            <img src="https://ssam.stage.willbes.net/public/uploads/willbes/professor/51317/prof_detail_51317.png">
                                            <div class="subject">도덕윤리 김민응</div>
                                        </div>
                                    </td>
                                    <td><p>2022 1-4월 김민응 도덕윤리 필수 이론 PASS</p>
                                        1. 서양윤리사상 및 윤리학(이론ㆍ응용)<br />
                                    2. 정치ㆍ사회사상 및 통일교육<br />
                                    3. 동양ㆍ한국윤리<br />
                                    4. 교과교육론</td>
                                    <td>100일</td>
                                    <td>680,000원    → <strong>238,000원<span>(65%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200393" onclick="goCartNDirectPay('lecture_box', 'y_pkg24', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td><p>2022 1-6월 김민응 도덕윤리 막판정리 이론 PASS</p>
                                        1. 서양윤리사상 및 윤리학(이론ㆍ응용)<br />
                                    2. 정치ㆍ사회사상 및 통일교육<br />
                                    3. 동양ㆍ한국윤리<br />
                                    4. 교과교육론<br />
                                    5. 영역별 기출문제 풀이 및 분석</td>
                                    <td>100일</td>
                                    <td>1,020,000원    → <strong>306,000원<span>(70%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200391" onclick="goCartNDirectPay('lecture_box', 'y_pkg25', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="profImg">
                                            <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51316/prof_detail_51316.png">
                                            <div class="subject">전공일반사회 허역팀</div>
                                        </div>
                                    </td>
                                    <td><p>2022 1-4월 허역팀 일반사회 막판정리 이론집중 PASS</p>
                                        1. 이론집중반 사회과교육론(이웅재)<br />
                                    2. 이론집중반 정치(김현중)<br />
                                    3. 이론집중반 법(정인홍)<br />
                                    4. 이론집중반 사회문화(이웅재)<br />
                                    5. 이론집중반 경제(허역)</td>
                                    <td>100일</td>
                                    <td>930,000원 → <strong>558,000원<span>(40%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200389" onclick="goCartNDirectPay('lecture_box', 'y_pkg26', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">
                                        <div class="profImg">
                                            <img src="https://ssam.stage.willbes.net/public/uploads/willbes/professor/51315/prof_detail_51315.png">
                                            <div class="subject">전공역사 김종권</div>
                                        </div>
                                    </td>
                                    <td><p>2022 1-4월 김종권 전공역사 이론완성 PASS</p>
                                        1. 전공서 발췌 강독 수업반<br />
                                    2. 개념 구조화 수업반</td>
                                    <td>100일</td>
                                    <td>1,080,000원 → <strong>432,000원<span>(60%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200388" onclick="goCartNDirectPay('lecture_box', 'y_pkg27', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td><p>2022 1-6월 김종권 전공역사 막판정리 이론 PASS</p>
                                        1. 전공서 발췌 강독 수업반<br />
                                    2. 개념 구조화 수업반<br />
                                    3. 기변하라(기출문제 및 변형 풀이반)</td>
                                    <td>100일</td>
                                    <td>1,620,000원 → <strong>567,000(65%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200387" onclick="goCartNDirectPay('lecture_box', 'y_pkg28', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="profImg">
                                            <img src="https://ssam.stage.willbes.net/public/uploads/willbes/professor/51090/prof_detail_51090_1606459468.png">
                                            <div class="subject">전공음악 다이애나</div>
                                        </div>
                                    </td>
                                    <td><p>2022 3-6월 다이애나 전공음악 필수 이론 PASS</p>
                                        1. 전공음악 개.강.총.회.반(한줄정리)</td>
                                    <td>100일</td>
                                    <td>500,000원 → <strong>250,000(50%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200386" onclick="goCartNDirectPay('lecture_box', 'y_pkg29', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">
                                        <div class="profImg">
                                            <img src="https://ssam.stage.willbes.net/public/uploads/willbes/professor/51318/prof_detail_51318.png">
                                            <div class="subject">전공중국어 장영희</div>
                                        </div>
                                    </td>
                                    <td><p>022 1-6월 장영희 전공중국어 막판정리 이론 PASS</p>
                                        1. 이론 입문반<br />
                                    2. 이론 실력강화반 I<br />
                                    3. 이론 실력강화반 II(실력완성반)</td>
                                    <td>100일</td>
                                    <td>1,020,000원 → <strong>306,000원<span>(70%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200371" onclick="goCartNDirectPay('lecture_box', 'y_pkg30', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td><p>2022 1-6월 장영희 전공중국어 막판정리 독해 PASS</p>
                                        1. 독해 입문반<br />
                                    2. 독해 실력강화반 I<br />
                                    3. 독해 실력강화반 II(실력완성반)</td>
                                    <td>100일</td>
                                    <td>1,020,000원 → <strong>306,000원<span>(70%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200370" onclick="goCartNDirectPay('lecture_box', 'y_pkg31', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                                <tr>
                                    <td><p>2022 3-6월 장영희 전공중국어 막판정리 첨삭 PASS</p>
                                        1. 고급첨삭반 I<br />
                                    2. 고급첨삭반 II</td>
                                    <td>100일</td>
                                    <td>500,000원 → <strong>200,000원<span>(60%↓)</span></strong></td>
                                    <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/200369" onclick="goCartNDirectPay('lecture_box', 'y_pkg32', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">신청하기</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="evtCtnsBox event04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2738_03.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">막판정리 이론 PASS 상품 이용안내 및 유의사항</h4>
                <ul>
                    <li>본 강좌는 구매하신 상품은 상반기에 진행된 이론 및 심화(기출)강의를 기간 안에 온라인으로 수강할 수 있는 상품입니다. <br>
                    (과목별로 상품구성이 상이할 수 있습니다. )</li>
                    <li>본 강좌는 할인율이 큰 강좌로 모든 강의는 1.1배수로  제공됩니다. </li>
                    <li>본 강좌에 필요한 교재는 별도로 구매하셔야 합니다. </li>
                    <li>본 강좌는 수강 기간 중 "일시중지" 및 "(유료)연장"은 할 수 없습니다.</li>
                    <li>본 강좌의 강의는 양도 및 매매가 불가하며, 위반 시 처벌 받을 수 있습니다.</li>
                </ul>
                <h5>[환불 규정]</h5>
                <ul>
                    <li>본 강좌의 강의 환불은 경과된 수강기간(수강 및 자료 다운로드 여부도 확인)에 따라 일할 계산된 금액을 공제하며, 강좌의 원 수강료 기준으로 공제가 됩니다. (신중하게 결정하시기 바랍니다.)
                    <li>본 강좌 강의 환불 신청은 홈페이지 1:1게시판을 통하여 가능합니다.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
    </script>
@stop