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
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_skybn {position:fixed; bottom:80px; right:10px; width:100px; z-index:10}
        .wb_skybn li {margin-bottom:5px}

        .wb_cts01 {background:#5e5e5c url(http://file3.willbes.net/new_gosi/2018/11/EV181120_L1_bg.png) no-repeat center top; position:relative; }
        .wb_cts02 {background:#fff url(http://file3.willbes.net/new_gosi/2018/11/EV181120_L3_bg.jpg) no-repeat center bottom;  }
        .wb_cts02_1 {background:#fff;}
        .wb_cts03 { width:100%; min-width:1210px; text-align:center;}
        .tabContaier7{width:980px; text-align:center; margin:0 auto 95px;}
        .tabContaier01_c {position:relative;}
        .tabContaier7 ul {position:absolute; width:226px; padding-left:1px; z-index:90}
        .tabContaier7 .tabContents7 iframe {position:absolute; width:640px; right:50px; bottom:70px; z-index:1}
        .tabContaier7 a img.off {display:block}
        .tabContaier7 a img.on {display:none}
        .tabContaier7 a.active img.off {display:none}
        .tabContaier7 a.active img.on {display:block}
        .tabContaier7 ul:after {content:""; display:block; clear:both}
        span {padding-left:10px;}

        .wb_cts04 {background:#f3f3f3;}

        /* 탭 */
        .tabContaier{width:100%; text-align:center; padding-bottom:0px;}
        .tabContaier ul {margin:0 auto;}
        .tabContaier li {display:inline; float:left}
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}

        .wb_cts08 {padding:100px 0}
        .wb_cts08Box {width:980px; margin:0 auto; border:1px solid #000; padding:30px; text-align:left}
        .wb_cts08Box > strong {font-size:18px !important; font-weight:bold; color:#000; display:block; margin-bottom:20px}
        .wb_cts08Box p {font-size:14px !important; font-weight:bold; margin:20px 0 10px; color:#000}
        .wb_cts08Box ol li {margin-bottom:10px; line-height:1.3; list-style:decimal; margin-left:15px}
        .wb_cts08Box ul {margin-top:0px}
        .wb_cts08Box ul li {margin-bottom:5px}
        .wb_cts08Box table {width:100%; border-spacing:0px; border:1px solid #c9c7ca; border-top:2px solid #464646; border-bottom:1px solid #464646; table-layout:auto}
        .wb_cts08Box th,
        .wb_cts08Box td {text-align:center; padding:7px 10px; border-bottom:1px solid #e4e4e4; border-right:1px solid #e4e4e4; font-size:100% !important}
        .wb_cts08Box th {font-weight:bold; color:#333}


        /* 유의사항 */
        .tab02 {margin-bottom:20px}
        .tab02 li {display:inline; float:left; width:25%}
        .tab02 li a { display:block; text-align:center; font-size:16px; font-weight:bold; background:#e4e4e4; color:#666; padding:15px 0; border:1px solid #e4e4e4}
        .tab02 li a:hover,
        .tab02 li a.active {background:#fff; color:#000; border:1px solid #000; border-bottom:1px solid #fff}
        .tab02:after {content:""; display:block; clear:both}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <ul class="wb_skybn">
            <li><a href="{{ site_url('/pass/offLecture/index?cate_code=3050&course_idx=1062') }}" target="_blank"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190128_L7.png" alt="실전 모의고사" ></a></li>
        </ul>

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190128_L1_1.png" alt="불꽃소방 9~10월 이론완성 종합반 " />
        </div><!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190128_L1_2.png"  alt="불꽃소방 9~10월 이론완성 종합반 "  usemap="#EV190128_L1_2" border="0" />
            <map name="EV190128_L1_2" id="EV190128_L1_2">
                <area shape="rect" coords="456,1279,759,1352" href="{{ site_url('/pass/offLecture/index?cate_code=3050&course_idx=1062') }}" target="_blank"/>
            </map>
            <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L1_3.png"  alt="불꽃소방 9~10월 이론완성 종합반 " usemap="#EV181120_L1_3" /></li>
            <map name="EV181120_L1_3" id="EV181120_L1_3">
                <area shape="rect" coords="196,690,355,733" href="javascript:fn_AllStartPlayer('R201800439','F201800124','270398','', 'high_Q', '2', 'WIDE');" />
                <area shape="rect" coords="447,690,604,736" href="javascript:fn_AllStartPlayer('R201800663','F201800139','276321','', 'high_Q', '2', 'WIDE');" />
                <area shape="rect" coords="673,690,829,737" href="javascript:fn_AllStartPlayer('R201800664','F201800140','276322','', 'high_Q', '2', 'WIDE');" />
                <area shape="rect" coords="881,690,1041,735" href="javascript:fn_AllStartPlayer('R201800520','D201800621','272286','', 'high_Q', '2', 'WIDE');" />
            </map>
            <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L1_4.png"  alt="불꽃소방 9~10월 이론완성 종합반 " />
        </div><!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" >
            <div class="tabContaier7">
                <div class="tabContaier01_c">
                    <ul>
                        <li>
                            <a class="active" href="#tab_1">
                                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_1off.png" class="off" />
                                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_1on.png" class="on" />
                            </a>
                        </li>
                        <li>
                            <a href="#tab_2">
                                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_2off.png" class="off" />
                                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_2on.png" class="on" />
                            </a>
                        </li>
                        <li>
                            <a href="#tab_3">
                                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_3off.png" class="off" />
                                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_3on.png" class="on" />
                            </a>
                        </li>
                        <li>
                            <a href="#tab_4">
                                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_4off.png" class="off" />
                                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_4on.png" class="on" />
                            </a>
                        </li>
                        <li>
                            <a href="#tab_5">
                                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_5off.png" class="off" />
                                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_5on.png" class="on" />
                            </a>
                        </li>
                        <li>
                            <a href="#tab_6">
                                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_6off.png" class="off" />
                                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_6on.png" class="on" />
                            </a>
                        </li>
                        <li>
                            <a href="#tab_7">
                                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_7off.png" class="off" />
                                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_7on.png" class="on" />
                            </a>
                        </li>
                    </ul>

                    <div class="tabContents7" id="tab_1">
                        <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_1.png" alt=""/>
                    </div>
                    <div class="tabContents7" id="tab_2">
                        <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_2.png" alt=""/>
                    </div>
                    <div class="tabContents7" id="tab_3">
                        <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_3.png" alt=""/>
                    </div>
                    <div class="tabContents7" id="tab_4">
                        <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_4.png" alt=""/>
                    </div>
                    <div class="tabContents7" id="tab_5">
                        <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_5.png" alt=""/>
                    </div>
                    <div class="tabContents7" id="tab_6">
                        <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_6.png" alt=""/>
                    </div>
                    <div class="tabContents7" id="tab_7">
                        <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L4_7.png" alt=""/>
                    </div>
                </div><!--tabContaier01_c//-->
            </div><!--tabContaier//-->
        </div>
        <!--WB_cts03//-->

        <div class="evtCtnsBox wb_cts04" >
            <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L1_5.png"  alt="불꽃소방 9~10월 이론완성 종합반 " /><br><img src="http://file3.willbes.net/new_gosi/2019/01/EV190128_L1_3.png"  alt="불꽃소방 9~10월 이론완성 종합반 "  usemap="#EV190128_L1_3" border="0" />
            <map name="EV190128_L1_3" id="EV190128_L1_3">
                <area shape="rect" coords="189,141,548,228" href="{{ site_url('/pass/offPackage/index?cate_code=3050&course_idx=1062') }}" target="_blank"/>
                <area shape="rect" coords="675,138,1043,228" href="{{ site_url('/pass/offPackage/index?cate_code=3050&course_idx=1062') }}" target="_blank"/>
            </map>
        </div>
        <!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts08">
            <div class="wb_cts08Box">
                <ul class="tab02">
                    <li><a href="#txt1">환불규정</a></li>
                    <li><a href="#txt2">학습 프로그램</a></li>
                    <li><a href="#txt3">수강생 혜택</a></li>
                    <li><a href="#txt5">기타</a></li>
                </ul>
                <div id="txt1">
                    <ol>
                        <li><strong>수강료 환불규정 (학원의 설립 및 과외교습에 관한 법률 시행령 제 18조 제 3항 별표 4)</strong>
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
                                    <td>반환 사유가발생한 당해 월의 반환대상 수강료와 나머지 월의 수강료 전액을 합산한 금액</td>
                                </tr>
                            </table><br /><br />
                            1) 총 교습 시간은 개강달로부터 종강달까지 수업 개월 수를 말하며, 환불은 1개월을 기준으로 합니다.<br />
                            2) 개강 이후 환불 접수는 기간 내 직접 방문해주셔야 합니다. (유선 접수 불가/ 수강증 미반납시 환불 불가) <br />
                            3) 환불 요청 시, 결제 하셨던 카드, 수강증, 영수증을 지참하셔야 결제취소가 가능하며, 현금으로 결제하신 경우, 수강생 본인 명의의 통장으로 입금됩니다.<br />
                            4) 환불 기준일은 실제 수강여부와 상관없이 환불 신청 날짜 (환불 신청서 작성 날짜)를 기준으로 합니다<br />
                            5) 수강 기간 동안 제공받은 사물함, 동영상 강좌, 자습실 등 혜택으로 제공된 서비스는 환불 즉시 이용이 정지 및 회수되며, 기사용된 부분은 환불신청하신<br />
                            해당월의 말일까지 사용한 것으로 간주하고 사용료를 환불금액에서 공제합니다. <br />
                            <span >- 사물함 사용료: 1개월-5,000원 <br /></span>
                            <span >-  동영상 강좌: 1개월-35,000원 <br /></span>
                            <span >-  자습실: 월 150,000원 <br /><br /></span>
                            6) 무료로 제공받은 교재 등 혜택으로 제공된 물품류(전자제품 제외)의 경우 미반환되거나, 기사용흔적/훼손이 있는 경우 환불금액에서 해당 물품류의 정가를 환불금에서 공제합니다.<br />
                            7) 태블릿 PC 등 혜택으로 제공된 전자제품류 개봉/기사용 흔적 있는 경우 환불금액에서 해당 전자제품류의 정가를 환불금에서 공제합니다<br />
                            8) 개강 이후 종합반 과목 수 변경을 원하실 경우, 구매하신 상품을 환불 규정에 의거 환불한 후 재등록하셔야합니다.<br />
                            9) 친구추천할인 이벤트 적용 대상자의 경우 추천/피추천인 환불 시 다른 피추천/추천인이 정상금액으로 재결재 해야 환불이 진행됩니다.<br />
                        </li>
                    </ol>
                </div>
                <div id="txt2">
                    <ol>
                        <li><strong>커리큘럼</strong><br />
                            - 커리큘럼은 시험일정이나 학원사정에 따라 일부 수정될 수 있습니다.<br />
                            - 과목별, 교수님별 강의과정에 따라 정규 커리큘럼과 실제 강의 과정이 상이할 수 있습니다.<br />
                        </li>

                        <li><strong>교수진</strong><br />
                            - 교수진은 교수님 개인사정이나 학원사정에 따라 변경될 수 있습니다.<br />
                        </li>

                        <li><strong>교수님 Q&A</strong><br />
                            - 교수님 Q&A는 교수님에따라 운영시간이 상이합니다. 개강 이후 공지드리겠습니다.<br />
                        </li>

                        <li><strong>자습실 및 학원 운영시간</strong><br />
                            - 학원 운영 시간: 월~일 06:30~23:30<br />
                            - 자습실 운영시간은 학원 운영 시간과 동일합니다. 다만, 1월 1일, 설 당일, 추석 당일은 건물 휴무로 운영되지 않습니다<br />
                        </li>

                        <li><strong>TEST 프로그램(전국 모의고사 포함)</strong><br />
                            - 일일TEST의 경우, 기출분석 과정까지만 제공되며, 교수님의 강의과정에 따라 제공되지않을 수도 있습니다.<br />
                            - 월간TEST(전국모의고사)는 매월 진행될 예정이나, 학원사정이나 시험일정에 따라 진행되지 않을 수도 있습니다.<br />
                        </li>

                        <li><strong>온라인 PASS</strong><br />
                            - 온라인 PASS는 전순환 수강생에게만 무료로 제공됩니다.<br />
                            - 3개월 이하 수강생에게는 7급 PASS 구매혜택을 제공합니다 (월 35,000원/데스크 결제 이후 지급)<br />
                        </li>
                    </ol>
                </div>
                <div id="txt3">
                    <ol>
                        <li><strong>전용자습실</strong><br />
                            - 지정좌석제로 제공되며, 지정된 좌석이외의 좌석은 원칙적으로 사용이 불가능합니다. <br />
                            - 중도 수강 취소 시 지정된 좌석은 회수되며, 잔여 물품은 폐기처리 됩니다. 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
                            - 개인 물품의 관리의 책임은 개인이 지며, 분실/훼손된 개인 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                            - 제공된 책상, 의자는 학원의 재산입니다. 임의 이동 및 분실/훼손 시 수강생에게 배상의 책임이 있습니다.<br />
                            - 개인 사유에 의해 활용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>

                        <li><strong>온라인 PASS</strong><br />
                            1) 전순환을 신청한 수강생에겐 온라인PASS가 지급됩니다.<br />
                            2) 3개월 이하 종합반 수강생은 별도로 월단위 결제해야합니다.<br />
                            - 수강료: 월 35,000원<br />
                            - 수강기간 동안만 수강/구매가 가능한 혜택입니다. 개인 사유에 의해 활용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>

                        <li><strong>전국 모의고사</strong><br />
                            - 윌비스 고시학원에서 진행되는 유료 모의고사가 제공됩니다. 개인 사유에 의해 신청/응시하지 못한 경우에 대해서는 학원에서 보상하지 않습니다.<br />
                        </li>

                        <li><strong>사물함</strong><br />
                            - 지정 사물함으로 제공되며, 지정된 사물함이외의 사물함은 사용이 불가능합니다. <br />
                            - 무단 사용 적발 시, 사용기간에 대한 임대료(월 5,000원)를 지불하셔야 하며, 즉시 회수합니다. <br />잔여 물품은 폐기처리 되며, 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
                            - 중도 수강 취소 시 지정된 사물함은 회수되며, 잔여 물품은 폐기처리 됩니다. 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
                            - 개인 사물함 관리의 책임은 개인이 지며, 분실/훼손된 개인 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                            - 제공된 사물함는 학원의 재산입니다. 사용 부주의에 의한 고장/훼손 시 수강생에게 배상의 책임이 있습니다.<br />
                            - 개인 사유에 의해 활용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>
                    </ol>
                </div>
                <div id="txt5">
                    <ol>
                        <li><strong>강의수강</strong><br />
                            - 반드시 등록한 강좌 및 등록한 수업만 수강하실 수 있으며, 무단 청강 적발 시 전액등록조치 혹은 퇴실 조치가 이루어 질 수 있으며, 추가적인 학원상품 등록이 불가할 수 있습니다.<br />
                            - 등록하신 강좌는 본인만 수강이 가능하며, 타인에게 판매/양도 할 수 없습니다.<br />
                            - 선택과목 변경(전반)은 개강 주에만 가능하며, 이후에는 불가능합니다.<br />
                            - 강의는 학원 사정에 의해 폐강될 수 있으며, 시간과 교수진이 변경 될 수 있으며 폐강될 수도 있습니다. (폐강 시, 환불규정에 의거 환불 진행)<br />
                            - 개인사유로 인하여 결석/조퇴하는 경우, 환불 및 별도의 보강 진행은 불가하며 해당 교습시간을 이월하실 수 없습니다.<br />
                            - 수강확인은 수강증을 통한 검사로 진행되오니 꼭 지참하시고 수강하시기 바랍니다. (수강증 분실 및 미발급으로 발생되는 손해책임은 수강생 본인에게 있습니다.)<br />
                            - 수강료에 교재 비용은 포함되어 있지 않으며, 선생님에 따라 추가 교재를 구매 하실 수 있습니다.<br />
                        </li>
                    </ol>
                </div>
            </div>
        </div><!--wb_cts08//-->


    </div>
    <!-- End Container -->

    <script type="text/javascript">
	//<![CDATA[
		var sp = StarPlayerApp;
		sp.license = "57C52A1F-AC21-4146-A5AC-2960BABEEA0E";
		sp.version = "1.0.0";
		sp.debug = "false";
		var app = function(info_url) {
			sp.executeApp(info_url);
		}
	//]]>

	// 새로운 영상 플레이어
		function fn_AllStartPlayer(brno, lno, mno, uid, flag, player_choice, mode){
			//alert("mode="+mode);
// 			<c:if test="${empty userInfo}">
// 				alert("로그인을 하신 후 이용하여 주시기 바랍니다.");
// 				return;
// 			</c:if>
			if(uid==null||uid==''){
				uid = "ANONYMOUS"; 
			}
			var w = '960';  //가로
			var h = '500'; //세로
			
			if(mode == 'WIDE'){
				if(player_choice == 1){
					//alert(1);
					w = '1575';  //가로1178
					h = '678'; //세로
				} else if(player_choice == 2){
					//alert(2);
					w = '1530';  //가로960 + 570
					h = '540'; //세로
				} else if(player_choice == 3){
					//alert(3);
					w = '916';  //가로960
					h = '405'; //세로
				} else {
					//alert(4);
					w = '960';  //가로
					h = '500'; //세로
				}
			} else {
				//alert(5);
				w = '960';  //가로
				h = '500'; //세로
			}
			
			var scroll = 'no'; //옵션
			var name = "StarPlayer";
			var LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
		    var TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
		    var settings = 'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable=no';
			var url = "<c:url value='/movieLectureInfo/starPlayer.pop2' />?BRIDGE_LECCODE="+brno+"&LECCODE="+lno+"&MOVIE_NO="+mno+"&USER_ID="+uid+"&SAMPLE=Y"+"&FLAG="+flag+"&PLAYER_CHOICE="+player_choice;
			//alert(url);
			//고화질 플레이어
			try {
			   if(pop.name){//저화질 플레이어 팝업이 열려 있는 상태
				   //alert('저화질 플레이어 닫기');
				   pop.close();//저화질 플레이어 닫기
				   pop = null;
			   }
			}catch (exception) {}
			//저화질 플레이어
			try {
				if(pop.name){//저화질 플레이어 팝업이 열려 있는 상태
					mp4pop =  window.open(url,name,settings);
				}
			}catch(e){
				mp4pop =  window.open(url,name,settings);
			}
		}
	</script>

    <script>            
        $(document).ready(function(){
            $(".tabContents").hide(); 
            $(".tabContents:first").show();
            
            $(".tabContaier ul li a").click(function(){ 
                
                var activeTab = $(this).attr("href"); 
                $(".tabContaier ul li a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".tabContents").hide(); 
                $(activeTab).fadeIn(); 
                
                return false; 
            });
        });

        $(document).ready(function(){
            $(".tabContents7").hide(); 
            $(".tabContents7:first").show();
            
            $(".tabContaier7 ul li a").click(function(){ 
                
                var activeTab = $(this).attr("href"); 
                $(".tabContaier7 ul li a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".tabContents7").hide(); 
                $(activeTab).fadeIn(); 
                
                return false; 
            });
        });

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


@stop