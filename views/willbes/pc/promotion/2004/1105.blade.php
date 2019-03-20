@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            z-index:1;
        }
        .skybanner li {
            margin-bottom:5px;
        }


        .wb_cts01 {position:relative;overflow:hidden; min-width:1210px; text-align:center; margin-top:20px; background:url("http://file3.willbes.net/new_gosi/2019/01/EV190121Y_01_bg.jpg") center top  no-repeat}
        .wb_cts02 {background:#111111 url("http://file3.willbes.net/new_gosi/2019/01/EV190121Y_02_bg.jpg") center top  no-repeat}
        .wb_cts03 {background:#07e9c4}
        .wb_cts04 {background:#f5f5f5}
        .wb_cts05 {background:#282828; padding-bottom:80px}
        .wb_cts06 {width:100%; min-width:1210px; text-align:center; background:#f5f5f5}

        /*학습시스템 TAB*/
        .system {width:980px; margin:0 auto}
        .system img {vertical-align:middle}
        .systab {float:left; width:196px; font-size:13px; letter-spacing:-1px;font-family:"Malgun Gothic","dotum", verdana, Arial, Helvetica, sans-serif; }
        .systab li {height:69px; line-height:69px; margin-bottom:1px}
        .systab a {display:block; background:#ff3a76; border-right:1px solid #282828; color:#fff !important; font-weight:bold}
        .systab a:hover {background:#fff; color:#ff3a76 !important}
        .systab a.active {border-right:1px solid #fff; background:#fff; color:#ff3a76 !important}
        .systab li:last-child {height:70px; line-height:70px; border-bottom:0}
        .sysCts {float:left}
        .system:after {content:""; display:block; clear:both}


        /*유의사항 tab*/
        .tab02 {margin-bottom:20px}
        .tab02 li {display:inline; float:left; width:20%}
        .tab02 li a { display:block; text-align:center; font-size:12px; font-weight:bold; background:#e4e4e4; color:#666; padding:10px 0; border:1px solid #e4e4e4}
        .tab02 li a:hover,
        .tab02 li a.active {background:#fff; color:#000; border:1px solid #666; border-bottom:1px solid #fff}
        .tab02:after {content:""; display:block; clear:both}

        /*유의사항*/
        .wb_tip {width:100%; min-width:1210px; text-align:left; background:#fff; padding:0px 0; }/*font-family :"Malgun Gothic","dotum", verdana, Arial, Helvetica, sans-serif;*/
        .wb_tip {width:1210px; margin:100px auto}
        .wb_tipBox {width:948px; border:1px solid #ccc; padding:30px; margin:0 115px}
        .wb_tipBox > strong {font-size:18px !important; font-weight:bold; color:#000; display:block; margin-bottom:20px}
        .wb_tipBox p {font-size:14px !important; font-weight:bold; margin:20px 0 10px; color:#000}
        .wb_tipBox ol li {margin-bottom:10px; line-height:1.3; list-style:decimal; margin-left:15px}
        .wb_tipBox ul {margin-top:20px}
        .wb_tipBox ul li {margin-bottom:5px}
        .wb_tipBox table {width:100%; border-spacing:0px; border:1px solid #c9c7ca; border-top:2px solid #464646; border-bottom:1px solid #464646; table-layout:auto}
        .wb_tipBox th,
        .wb_tipBox td {text-align:center; padding:7px 10px; border-bottom:1px solid #e4e4e4; border-right:1px solid #e4e4e4; font-size:100% !important}
        .wb_tipBox th {font-weight:bold; color:#333; background:#f6f0ec}
        .wb_tip_orange {font-size:12px; color:#f16a19; letter-spacing:-1px}
        .wb_tip_gray {font-size:12px; color:#888; letter-spacing:-1px}


    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <ul>
                <li><a href="{{ site_url('#none') }}" target="_blank" ><img src="http://file3.willbes.net/new_gosi/2019/01/EV190121Y_sky01.jpg" alt="9급합격완성커리큘럼설명회" ></a></li>
                <li><a href="{{ site_url('#none') }}" target="_blank" ><img src="http://file3.willbes.net/new_gosi/2018/11/EV181115_sky2.png" alt="학원방문상담신청하기" ></a></li>
                <li><a href="http://pf.kakao.com/_kcZIu/chat" target="_blank"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190121Y_sky02.jpg" alt="카카오톡상담"></a></li>
                <li><a href="{{ site_url('#none') }}" target="_blank" ><img src="http://file3.willbes.net/new_gosi/2018/11/EV181115_sky4.png" alt="통합생활관리반자세히보기" ></a></li>
            </ul>
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190121Y_01.jpg" alt="3개월 단기완성 순환반" />
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190121Y_02.jpg" alt="3개월 단기 합격 스토리" />
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190121Y_03.jpg" alt="#" />
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190121Y_04.jpg" alt="9급교수진" />
        </div>
        <!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts05" >
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190121Y_05.jpg" alt="9급학습/생활관리 프로그램" />
            <div class="system">
                <ul class="systab">
                    <li><a href="#sys01">교수님 Q&amp;A</a></li>
                    <li><a href="#sys02">월간 전국 모의고사</a></li>
                    <li><a href="#sys03">17H 순공보장 시스템</a></li>
                    <li><a href="#sys04">지정좌석 전용자습실</a></li>
                    <li><a href="#sys05">TEST 프로그램</a></li>
                    <li><a href="#sys06">철저한 출석체크</a></li>
                    <li><a href="#sys07">온라인PASS 혜택제공</a></li>
                </ul>
                <div id="sys01" class="sysCts"><img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_5_con1_1218.png" alt="교수님Q&A" /></div>
                <div id="sys02" class="sysCts"><img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_5_con2.png" alt="월간전국모의고사" /></div>
                <div id="sys03" class="sysCts"><img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_5_con3.png" alt="17H 순공보장시스템" /></div>
                <div id="sys04" class="sysCts"><img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_5_con4.png" alt="지정좌석전용자습실" /></div>
                <div id="sys05" class="sysCts"><img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_5_con5.png" alt="TEST프로그램" /></div>
                <div id="sys06" class="sysCts"><img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_5_con6.png" alt="철저한 출석체크" /></div>
                <div id="sys07" class="sysCts"><img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_5_con7.png" alt="온라인PASS혜택제공" /></div>
            </div>
        </div>
        <!--wb_cts05//-->

        <div class="evtCtnsBox wb_cts06" >
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190121Y_06_1.jpg" alt="9급수강혜택" /><br />
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190121Y_06_2.gif" alt="최대30%파격할인" /><br />
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190121Y_06_3.jpg" alt="4개월문제풀이순환반/2개월 기출문제분석 종합반" usemap="#Map1900121A" border="0" />
            <map name="Map1900121A" id="Map1900121A">
                <area shape="rect" coords="384,943,821,1007" href="{{ site_url('#none') }}" target="_blank" alt="3월개강반 수강신청하기" />
            </map>
        </div>
        <!--wb_cts06//-->

        <div class="wb_tip">
            <div class="wb_tipBox">
                <ul class="tab02">
                    <li><a href="#txt1">유의사항</a></li>
                    <li><a href="#txt2">학습 프로그램</a></li>
                    <li><a href="#txt3">수강생 혜택</a></li>
                    <li><a href="#txt4">윌비스 장학혜택</a></li>
                    <li><a href="#txt5">기타</a></li>
                </ul>
                <div id="txt1">
                    <p>유의사항</p>
                    <ol>
                        <li><strong>수강료 환불규정<span class="wb_tip_gray"> (학원의 설립 및 과외교습에 관한 법률 시행령 제 18조 제 3항 별표 4)</span></strong><br />
                            <br />
                            <table>
                                <col />
                                <col />
                                <col />
                                <tr>
                                    <th>수강료징수기간</th>
                                    <th>반환 사유발생일</th>
                                    <th>반환금액</th>
                                </tr>
                                <tr>
                                    <td rowspan="4">1개월 이내인 경우</td>
                                    <td>교습개시 이전</td>
                                    <td>이미 납부한 수강료 전액</td>
                                </tr>
                                <tr>
                                    <td>총 교습 시간의 1/3 경과 전</td>
                                    <td>이미 납부한수강료의 2/3 해당</td>
                                </tr>
                                <tr>
                                    <td>총 교습 시간의 1/2 경과 후</td>
                                    <td>이미 납부한수강료의 1/2 해당</td>
                                </tr>
                                <tr>
                                    <td>총 교습 시간의 1/2 경과 수</td>
                                    <td>반환하지아니함</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">1개월 초과인 경우</td>
                                    <td>교습 개시 이전</td>
                                    <td>이미 납부한 수강료 전액</td>
                                </tr>
                                <tr>
                                    <td>교습 개시 이후</td>
                                    <td>반환 사유가발생한 당해 월의 반환대상 수강료와</br />
                                        나머지 월의 수강료 전액을 합산한 금액</td>
                                </tr>
                            </table>
                            <br />
                            - 총 교습 시간은 개강달로부터 종강달까지 수업 개월 수를 말하며, 환불은 1개월을 기준으로 합니다.<br />
                            - 개강 이후 환불 접수는 기간 내 직접 방문해주셔야 합니다. <span class="wb_tip_gray">(유선 접수 불가/ 수강증 미반납시 환불 불가)</span><br />
                            - 환불 요청 시, 결제 하셨던 카드, 수강증, 영수증을 지참하셔야 결제취소가 가능하며, 현금으로 결제하신 경우, 수강생 본인 명의의 통장으로 입금됩니다.<br />
                            - 환불 기준일은 실제 수강여부와 상관없이 환불 신청 날짜 (환불 신청서 작성 날짜)를 기준으로 합니다.<br />
                            - 수강 기간 동안 제공받은 사물함, 동영상 강좌, 자습실 등 혜택으로 제공된 서비스는 환불 즉시 이용이 정지 및 회수되며, 기사용된 부분은 환불신청하신 해당월의 말일까지 사용한 것으로 간주하고 사용료를 환불금액에서 공제합니다.<br />
                            <span class="wb_tip_orange"> - 사물함 사용료: 1개월-5,000원<br />
                        - 동영상 강좌: 1개월-35,000원<br />
                        - 자습실: 월 150,000원<br />
                        </span> - 무료로 제공받은 교재 등 혜택으로 제공된 물품류(전자제품 제외)의 경우 미반환되거나, 기사용흔적/훼손이 있는 경우 환불금액에서 해당 물품류의 정가를 환불금에서 공제합니다.<br />
                            - 태블릿 PC 등 혜택으로 제공된 전자제품류 개봉/기사용 흔적 있는 경우 환불금액에서 해당 전자제품류의 정가를 환불금에서 공제합니다<br />
                            - 개강 이후 종합반 과목 수 변경을 원하실 경우, 구매하신 상품을 환불 규정에 의거 환불한 후 재등록하셔야합니다.<br />
                            - 친구추천할인 이벤트 적용 대상자의 경우 추천/피추천인 환불 시 다른 피추천/추천인이 정상금액으로 재결재 해야 환불이 진행됩니다.<br />
                        </li>
                    </ol>
                </div>
                <div id="txt2">
                    <p>학습프로그램</p>
                    <ol>
                        <li><strong>커리큘럼</strong><br />
                            - 커리큘럼은 시험일정이나 학원사정에 따라 일부 수정될 수 있습니다.<br />
                            - 과목별, 교수님별 강의과정에 따라 정규 커리큘럼과 실제 강의 과정이 상이할 수 있습니다.<br />
                        </li>
                        <li><strong>교수진</strong><br />
                            - 교수진은 교수님 개인사정이나 학원사정에 따라 변경될 수 있습니다..<br />
                        </li>
                        <li><strong>교수님 Q&A </strong><br />
                            - 교수님 Q&A는 교수님에 따라 운영시간이 상이합니다. 개강 이후 공지드리겠습니다.<br />
                        </li>
                        <li><strong>자습실 및 학원 운영시간</strong><br />
                            - 학원 운영 시간: 월~일 06:30~23:30<br />
                            - 자습실 운영시간은 학원 운영 시간과 동일합니다. 다만, 1월 1일, 설 당일, 추석 당일은 건물 휴무로 운영되지 않습니다.<br />
                        </li>
                        <li><strong>TEST 프로그램(전국 모의고사 포함)</strong><br />
                            - TEST 프로그램은 일일, 월간 TEST가 제공됩니다.<br />
                            - 일일TEST의 경우, 기출분석 과정까지만 제공되며, 교수님의 강의과정에 따라 제공되지않을 수도 있습니다.<br />
                            - 월간TEST(전국모의고사)는 매월 진행될 예정이나, 학원사정이나 시험일정에 따라 진행되지 않을 수도 있습니다.<br />
                        </li>
                        <li><strong>온라인 PASS</strong><br />
                            - 온라인 PASS는 전순환 수강생에게만 무료로 제공됩니다.<br />
                            - 3개월 이하 수강생에게는 7급 PASS 구매혜택을 제공합니다.<span class="wb_tip_orange"> (월 35,000원/데스크 결제 이후 지급)</span><br />
                        </li>
                    </ol>
                </div>
                <div id="txt3">
                    <p>수강생 혜택</p>
                    <ol>
                        <li><strong>전용자습실</strong><br />
                            - 지정좌석제로 제공되며, 지정된 좌석이외의 좌석은 원칙적으로 사용이 불가능합니다. <br />
                            - 중도 수강 취소 시 지정된 좌석은 회수되며, 잔여 물품은 폐기처리 됩니다. 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
                            - 개인 물품의 관리의 책임은 개인이 지며, 분실/훼손된 개인 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                            - 제공된 책상, 의자는 학원의 재산입니다. 임의 이동 및 분실/훼손 시 수강생에게 배상의 책임이 있습니다.ㅍ<br />
                            - 개인 사유에 의해 활용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>
                        <li><strong>온라인 PASS</strong><br />
                            - 전순환을 신청한 수강생에겐 온라인PASS가 지급됩니다.<br />
                            - 3개월 이하 종합반 수강생은 별도로 월단위 결제해야합니다.<br />
                            <span class="wb_tip_orange"> · 수강료: 월 35,000원<br />
                        · 수강기간 동안만 수강/구매가 가능한 혜택입니다. 개인 사유에 의해 활용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </span> </li>
                        <li><strong>전국 모의고사</strong><br />
                            윌비스 고시학원에서 진행되는 유료 모의고사가 제공됩니다. 개인 사유에 의해 신청/응시하지 못한 경우에 대해서는 학원에서 보상하지 않습니다.<br />
                        </li>
                        <li><strong>사물함</strong><br />
                            - 지정 사물함으로 제공되며, 지정된 사물함이외의 사물함은 사용이 불가능합니다.<br />
                            - 무단 사용 적발 시, 사용기간에 대한 임대료(월 5,000원)를 지불하셔야 하며, 즉시 회수합니다. 잔여 물품은 폐기처리 되며, 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
                            - 중도 수강 취소 시 지정된 사물함은 회수되며, 잔여 물품은 폐기처리 됩니다. 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
                            - 개인 사물함 관리의 책임은 개인이 지며, 분실/훼손된 개인 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                            - 제공된 사물함는 학원의 재산입니다. 사용 부주의에 의한 고장/훼손 시 수강생에게 배상의 책임이 있습니다.<br />
                            - 개인 사유에 의해 활용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>
                        <li><strong>면접 지원</strong><br />
                            - 제공되는 혜택은 윌비스 면접반 무료수강 입니다.<br />
                            - 지원되는 시험은 7급 국가직 시험입니다. (그 외 다른 시험 해당X)<br />
                            - 중도 수강취소 시 제공되지 않습니다.<br />
                            -  개인 사유에 의해 수강하지 못한 경우에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>
                    </ol>
                </div>
                <div id="txt4">
                    <p>윌비스 장학혜택</p>
                    <ol>
                        <li><strong>사물함</strong><br />
                            - 전순환 수강생에게만 제공되는 혜택입니다.<br />
                            - 중도 수강취소한 수강생에게는 적용되지 않습니다.<br />
                            - 2019년 9급 국가직/지방직/서울시 시험 합격 시 제공되는 혜택입니다.(그 외 다른시험 해당X)<br />
                            - 2019년 9급 국가직/지방직/서울시 시험 중 택1하여 1회만 제공됩니다.<br />
                            - 필기합격 시 제공되는 혜택은 필기합격 인증이 완료되고, 필기합격 수기(A4 2장 이상) 제출 시 제공됩니다.<br />
                            - 최종합격 시 제공되는 혜택은 최종합격 인증이 완료되고, 최종합격 수기(A4 2장 이상, 동영상 인터뷰 참여, 광고활용동의) 제출 시 제공됩니다.<br />
                            - 모든 혜택은 필기/최종합격 발표 시점에서 30일 이내로 인증/수령하셔야 하며, 개인사유로 인해 기한 내에 제공받지 않은 모든 혜택은 취소됩니다.<br />
                        </li>
                        <li><strong>면접반 무료수강권</strong><br />
                            - 윌비스 고시학원에서 진행되는 면접반만 무료수강 가능합니다.<br />
                            - 개인 사유에 의해 수강하지 못한 경우에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>
                        <li><strong>면접용 전장 구입비 지원</strong><br />
                            - 신세계 백화점 상품권 300,000원 상당이 제공되며, 타 상품으로 대체 지급되지 않습니다.<br />
                            - 개인 사유에 의해 사용하지 못한 경우에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>
                        <li><strong>외식상품권</strong><br />
                            - CJ 외식 상품권 200,000원 상당이 제공되며, 타 상품으로 대체 지급되지 않습니다.<br />
                            - 개인 사유에 의해 사용하지 못한 경우에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>
                        <li><strong>영화 예매권</strong><br />
                            - CGV 영화예매권 10매가 제공되며, 타 상품으로 대체 지급되지 않습니다.<br />
                            - 개인 사유에 의해 사용하지 못한 경우에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>
                        <li><strong>문화상품권</strong><br />
                            - 컬쳐랜드 문화상품권 200,000원 상당이 제공되며, 타 상품으로 대체 지급되지 않습니다.<br />
                            - 개인 사유에 의해 사용하지 못한 경우에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>
                    </ol>
                </div>
                <div id="txt5">
                    <p>기타사항</p>
                    <ol>
                        <li>반드시 등록한 강좌 및 등록한 수업만 수강하실 수 있으며, 무단 청강 적발 시 전액등록조치 혹은 퇴실 조치가 이루어 질 수 있으며, <br />
                            추가적인 학원상품 등록이 불가할 수 있습니다.</li>
                        <li>등록하신 강좌는<span class="wb_tip_orange"> 본인만 수강이 가능</span>하며, 타인에게 판매/양도 할 수 없습니다.</li>
                        <li>선택과목 변경(전반)은 개강 주에만 가능하며, 이후에는 불가능합니다.</li>
                        <li>강의는 학원 사정에 의해 폐강될 수 있으며, 시간과 교수진이 변경 될 수 있으며 폐강될 수도 있습니다.<span class="wb_tip_gray">(폐강 시, 환불규정에 의거 환불 진행)</span></li>
                        <li><span class="wb_tip_orange"> 개인사유로 인하여 결석/조퇴하는 경우, 환불 및 별도의 보강 진행은 불가</span>하며 해당 교습시간을 이월하실 수 없습니다. </li>
                        <li>수강확인은 수강증을 통한 검사로 진행되오니 꼭 지참하시고 수강하시기 바랍니다.<span class="wb_tip_gray"> (수강증 분실 및 미발급으로 발생되는 손해책임은 수강생 본인에게 있습니다.)</span></li>
                        <li>수강료에 교재 비용은 포함되어 있지 않으며, 선생님에 따라 추가 교재를 구매 하실 수 있습니다.</li>
                    </ol>
                </div>
            </div>
        </div>
        <!--유의사항//-->

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        /*tab*/
        $(document).ready(function(){
            $('.systab').each(function(){
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

                    e.preventDefault()})})}
        );



        $(document).ready(function(){
            $('.tab02').each(function(){
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

                    e.preventDefault()})})}
        );
    </script>

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        </script>
@stop