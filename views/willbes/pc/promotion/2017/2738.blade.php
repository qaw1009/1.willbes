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
        .evt_tableA table tr{border-bottom:1px solid #c1c1c1}
        .evt_tableA table tr:last-of-type{border-bottom:1px solid #c1c1c1}
        .evt_tableA table thead th,
        .evt_tableA table tbody th{background:#dedede; font-size:16px; font-weight:300; text-align:center; color:#333; padding:10px 0; border-right:1px solid #fff}
        .evt_tableA table thead th {text-align:center}
        .evt_tableA table tbody td {font-size:14px; color:#000; text-align:center; padding:8px; border-right:0}
        .evt_tableA table tbody td:last-child {border-right:0; color:#005180}
        .evt_tableA table tbody td:nth-last-child(5) {text-decoration: line-through; text-align:right; border-right:0}
        .evt_tableA table tbody td:nth-last-child(4) {border-right:0}
        .evt_tableA table tbody td:nth-last-child(3) {text-align:right; font-weight:bold; color:red; border-right:0}
        .evt_tableA table tbody td:nth-last-child(2) span {color:blue; border:1px solid blue; display:block}
        .evt_tableA table tbody td:nth-last-child(6) {text-align:left;}
        .evt_tableA table tbody td:nth-last-child(1) a,
        .evt_tableA table tbody td a.btn02 {display:block; padding:5px; background:#ff5200; color:#fff; border-radius:4px; font-size:12px;}
        .evt_tableA table tbody td a:hover {background:#000}
        .evt_tableA table tbody td p {color:#666}

        
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
                        <input name="y_pkg1" type="checkbox" value="188978" checked="checked">
                        <input name="y_pkg2" type="checkbox" value="191210" checked="checked">
                        <input name="y_pkg3" type="checkbox" value="189385" checked="checked">
                        <input name="y_pkg4" type="checkbox" value="189065" checked="checked">
                        <input name="y_pkg5" type="checkbox" value="190684" checked="checked">
                        <input name="y_pkg6" type="checkbox" value="188964" checked="checked">
                        <input name="y_pkg7" type="checkbox" value="191389" checked="checked">
                        <input name="y_pkg8" type="checkbox" value="189121" checked="checked">
                        <input name="y_pkg9" type="checkbox" value="191234" checked="checked">
                        <input name="y_pkg10" type="checkbox" value="188929" checked="checked">
                        <input name="y_pkg11" type="checkbox" value="188685" checked="checked">
                        <input name="y_pkg12" type="checkbox" value="188686" checked="checked">
                        <input name="y_pkg13" type="checkbox" value="189518" checked="checked">
                        <input name="y_pkg14" type="checkbox" value="188984" checked="checked">
                        <input name="y_pkg15" type="checkbox" value="191400" checked="checked">
                        <input name="y_pkg16" type="checkbox" value="189046" checked="checked">
                        <input name="y_pkg17" type="checkbox" value="188803" checked="checked">
                        <input name="y_pkg18" type="checkbox" value="189215" checked="checked">
                        <input name="y_pkg19" type="checkbox" value="188948" checked="checked">
                        <input name="y_pkg20" type="checkbox" value="191214" checked="checked">
                        <input name="y_pkg21" type="checkbox" value="189330" checked="checked">
                        <input name="y_pkg22" type="checkbox" value="189044" checked="checked">
                        <input name="y_pkg23" type="checkbox" value="191904" checked="checked">
                        <input name="y_pkg24" type="checkbox" value="191903" checked="checked">
                    </div>

                    <div class="evt_tableA">
                        <table>
                            <col width="8%"/>
                            <col width="8%"/>
                            <col/>
                            <col width="10%"/>
                            <col width="3%"/>
                            <col width="10%"/>
                            <col width="12%"/>
                            <col width="8%"/>
                            <thead>
                            <tr>
                                <th>과목</th>
                                <th>교수</th>
                                <th>과정명</th>
                                <th colspan="4">환승 & 재도전 할인 수강료</th>
                                <th>수강신청</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td rowspan="5">교육학</td>
                                <td rowspan="2">이경범</td>
                                <td>2022(1~4월) 교육학 필수 이론 PASS
                                    <p>기본이론 / 심화이론</p> 
                                </td>
                                <td>880,000원</td>
                                <td>→</td>
                                <td>440,000원</td>
                                <td><span>50% 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/188978" onclick="goCartNDirectPay('lecture_box', 'y_pkg1', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>2022(1~6월) 교육학 막판정리 이론 PASS
                                <p>기본이론 / 심화이론 / 기출분석</p>
                                </td>
                                <td>1,092,000원</td>
                                <td>→</td>
                                <td>982,000원</td>
                                <td><span>10% 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/191210" onclick="goCartNDirectPay('lecture_box', 'y_pkg2', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>정 현</td>
                                <td>2022(1~6월) VZONEdu 정현 교육학 상반기종합반</td>
                                <td>610,000원</td>
                                <td>→</td>
                                <td>549,000원</td>
                                <td><span>61,000원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/189385" onclick="goCartNDirectPay('lecture_box', 'y_pkg3', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td rowspan="2">신태식</td>
                                <td>2022(01~11월) 신태식 교육학 연간 Full 패키지</td>
                                <td>1,275,000원</td>
                                <td>→</td>
                                <td>1,147,500원</td>
                                <td><span>127,500원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/189065" onclick="goCartNDirectPay('lecture_box', 'y_pkg4', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>2022(03~04월 & 07~11월) 신태식 교육학 심화이론 + 문풀 패키지</td>
                                <td>840,000원</td>
                                <td>→</td>
                                <td>756,000원</td>
                                <td><span>84,000원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/190684" onclick="goCartNDirectPay('lecture_box', 'y_pkg5', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td rowspan="4">국어</td>
                                <td rowspan="2">송원영/권보민</td>
                                <td>2022(1~11월) 전공국어 완전정복 연간 Full 패키지 </td>
                                <td>1,670,000원</td>
                                <td>→</td>
                                <td>1,503,000원</td>
                                <td><span>167,000원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/188964" onclick="goCartNDirectPay('lecture_box', 'y_pkg6', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>2022(3~11월) 전공국어 완전정복 패키지</td>
                                <td>1,450,000원</td>
                                <td>→</td>
                                <td>1,305,000원</td>
                                <td><span>145,000원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/191389" onclick="goCartNDirectPay('lecture_box', 'y_pkg7', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td rowspan="2">구동언</td>
                                <td>2022(1~11월) 구동언 전공국어 연간 Full 패키지</td>
                                <td>1,749,000원</td>
                                <td>→</td>
                                <td>1,574,100원</td>
                                <td><span>174,900원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/189121" onclick="goCartNDirectPay('lecture_box', 'y_pkg8', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>2022(3~11월) 구동언 전공국어 Core 패키지</td>
                                <td>1,331,000원</td>
                                <td>→</td>
                                <td>1,197,900원</td>
                                <td><span>133,100원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/191234" onclick="goCartNDirectPay('lecture_box', 'y_pkg9', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>영어</td>
                                <td>김영문</td>
                                <td>2022 김영문 영어학 연간 패키지</td>
                                <td>532,000원</td>
                                <td>→</td>
                                <td>478,800원</td>
                                <td><span>53,200원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/188929" onclick="goCartNDirectPay('lecture_box', 'y_pkg10', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td rowspan="6">수학</td>
                                <td rowspan="2">김철홍</td>
                                <td>2022(1~11월) 김철홍 전공수학 내용학 All-In-One 패키지</td>
                                <td>1,449,000원</td>
                                <td>→</td>
                                <td>1,304,100원</td>
                                <td><span>144,900원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/188685" onclick="goCartNDirectPay('lecture_box', 'y_pkg11', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>2022(1~6월) 김철홍 전공수학 내용학 상반기 패키지</td>
                                <td>945,000원</td>
                                <td>→</td>
                                <td>850,500원</td>
                                <td><span>94,500원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/188686" onclick="goCartNDirectPay('lecture_box', 'y_pkg12', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>김현웅</td>
                                <td>2022(1~11월) 김현웅 전공수학 연간 패키지</td>
                                <td>1,400,000원</td>
                                <td>→</td>
                                <td>1,260,000원</td>
                                <td><span>140,000원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/189518" onclick="goCartNDirectPay('lecture_box', 'y_pkg13', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td rowspan="2">박태영</td>
                                <td>2022(1~11월) 박태영 수학교육론 All-In-One 패키지</td>
                                <td>1,118,000원</td>
                                <td>→</td>
                                <td>1,006,200원</td>
                                <td><span>111,800원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/188984" onclick="goCartNDirectPay('lecture_box', 'y_pkg14', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>2022(3~11월) 박태영 수학교육론 core 패키지</td>
                                <td>973,000원</td>
                                <td>→</td>
                                <td>875,700원</td>
                                <td><span>97,300원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/191400" onclick="goCartNDirectPay('lecture_box', 'y_pkg15', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>박혜향</td>
                                <td>2022(1~11월) 박혜향 수학교육론 연간 패키지</td>
                                <td>777,000원</td>
                                <td>→</td>
                                <td>699,300원</td>
                                <td><span>77,700원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/189046" onclick="goCartNDirectPay('lecture_box', 'y_pkg16', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>도덕윤리</td>
                                <td>김민응</td>
                                <td>2022(1~11월) 김민응 도덕윤리 연간 Full 패키지</td>
                                <td>1,104,000원</td>
                                <td>→</td>
                                <td>993,600원</td>
                                <td><span>110,400원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/188803" onclick="goCartNDirectPay('lecture_box', 'y_pkg17', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>일반사회</td>
                                <td>허역팀</td>
                                <td>2022(1~11월) 일반사회 허역팀 연간 FULL 패키지</td>
                                <td>1,992,000원</td>
                                <td>→</td>
                                <td>1,792,800원</td>
                                <td><span>199,200원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/189215" onclick="goCartNDirectPay('lecture_box', 'y_pkg18', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td rowspan="2">역사</td>
                                <td rowspan="2">김종권</td>
                                <td>2022(1~11월) 김종권 전공역사 연간 패키지</td>
                                <td>2,304,000원</td>
                                <td>→</td>
                                <td>2,073,600원</td>
                                <td><span>230,400원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/188948" onclick="goCartNDirectPay('lecture_box', 'y_pkg19', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>2022(3~11월) 김종권 전공역사 Core 패키지</td>
                                <td>1,872,000원</td>
                                <td>→</td>
                                <td>1,684,800원</td>
                                <td><span>187,200원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/191214" onclick="goCartNDirectPay('lecture_box', 'y_pkg20', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>체육</td>
                                <td>최규훈</td>
                                <td>2022(1~6월) VZONE 최규훈 전공체육 상반기 종합반</td>
                                <td>1,690,000원</td>
                                <td>→</td>
                                <td>1,521,000원</td>
                                <td><span>169,000원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/189330" onclick="goCartNDirectPay('lecture_box', 'y_pkg21', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td rowspan="3">중국어</td>
                                <td rowspan="3">장영희</td>
                                <td>2022(1~11월) 장영희 중국어 연간 종합반</td>
                                <td>3,496,000원</td>
                                <td>→</td>
                                <td>3,146,400원</td>
                                <td><span>349,600원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/189044" onclick="goCartNDirectPay('lecture_box', 'y_pkg22', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>2022(3~11월) 장영희 중국어 N수 트랙 종합반</td>
                                <td>1,864,000원</td>
                                <td>→</td>
                                <td>1,677,600원</td>
                                <td><span>186,400원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/191904" onclick="goCartNDirectPay('lecture_box', 'y_pkg23', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>2022(3~11월) 장영희 중국어 초수 트랙 종합반 </td>
                                <td>2,552,000원</td>
                                <td>→</td>
                                <td>2,296,800원</td>
                                <td><span>225,200원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/191903" onclick="goCartNDirectPay('lecture_box', 'y_pkg24', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
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
                    <li>본 패키지는 구매하신 상품은 온라인으로 수강할 수 있는 상품입니다.</li>
                    <li>본 패키지의 제공되는 기간 및 배수 등을 꼼꼼히 확인하기 바랍니다. (과목별 상이합니다.)</li>
                    <li>본 패키지의 수강 기간 중 “일시중지” 및 “(유료)연장＂은 할 수 없습니다.</li>
                    <li>본 패키지 강의는 양도 및 매매가 불가하며, 위반 시 처벌 받을 수 있습니다.</li>
                </ul>
                <h5>[환불 규정]</h5>
                <ul>
                    <li>본 패키지 강의의 환불은 수강기간, 수강 여부, 자료 다운 유무 등에 따라 금액을 공제하며, 강좌의 원 수강료 기준으로 공제가 됩니다.</li>
                    <li>본 패키지 강의 환불 신청은 홈페이지 1:1게시판을 통하여 가능합니다.</li>
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