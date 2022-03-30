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
        .eventTop span {position: absolute; top:1100px; left:50%; margin-left:-520px; width:661px; z-index: 2;}

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
        .evt_tableA table tbody td {font-size:14px; color:#000; text-align:center; padding:8px; border-right:0}
        .evt_tableA table tbody td:last-child {border-right:0; color:#005180}
        .evt_tableA table tbody td:nth-last-child(5) {text-decoration: line-through; text-align:right; border-right:0}
        .evt_tableA table tbody td:nth-last-child(4) {border-right:0}
        .evt_tableA table tbody td:nth-last-child(3) {text-align:left; font-weight:bold; color:red; border-right:0}
        .evt_tableA table tbody td:nth-last-child(2) span {color:blue; border:1px solid blue; display:block}
        .evt_tableA table tbody td:nth-last-child(6) {text-align:left;}
        .evt_tableA table tbody td:nth-last-child(1) a,
        .evt_tableA table tbody td a.btn02 {display:block; padding:5px; background:#ff5200; color:#fff; border-radius:4px; font-size:12px;}
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
            <div class="event03Box">
                <div class="btnBox mt50">
                    <a href="javascript:certOpen();">타학원 수강이력 인증하기</a>
                </div>

                <img src="https://static.willbes.net/public/images/promotion/2022/03/2581_03_03.jpg" alt="환승이벤트"/>
                <div class="event03-txt01 mb50">
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
                                <th>강좌</th>
                                <th colspan="4">환승& 재도전 할인 수강료</th>
                                <th>수강신청</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td rowspan="5">교육학</td>
                                <td rowspan="2">이경범</td>
                                <td>2022(1~11월) 교육학 연간 Full 패키지</td>
                                <td>1,330,000원</td>
                                <td>→</td>
                                <td>1,197,000원</td>
                                <td><span>133,000원 할인</span></td>
                                <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/188978" onclick="goCartNDirectPay('lecture_box', 'y_pkg1', 'on_lecture', 'adminpack_lecture', 'Y'); return false;">결제하기</a></td>
                            </tr>
                            <tr>
                                <td>2022(3~11월) 이경범 교육학 Core 패키지</td>
                                <td>1,092,000원</td>
                                <td>→</td>
                                <td>982,800원</td>
                                <td><span>109,200원 할인</span></td>
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
                                <td rowspan="2">중국어</td>
                                <td rowspan="2">장영희</td>
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
                            </tbody>
                        </table>
                    </div>
                    {{--
                    <div class="btnBox mt50">
                        <a href="javascript:fn_submit();">신청하기</a>
                    </div>
                    --}}
                </div>
            </div>
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
                    <li>본 이벤트로 인한 할인강의는 양도 및 매매가 불가능하며, 위반 시 처벌받을 수 있습니다.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            AOS.init();
        });
    </script>

    <script>
        var $regi_form_register = $('#regi_form_register');
        function loginCheck(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
        }

        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
                    @if(empty($arr_promotion_params) === false)
                var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
    </script>
@stop