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
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

		/************************************************************/ 

		.skybanner{position: fixed; top: 280px;right:2px;z-index: 1;}	  

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2019/12/190802_value01_bg.jpg) no-repeat center top;}	
		.evt_01 {background:#1d1d1d;}
		.evt_02 {background:#fff;}
		.tabs {border-bottom:2px solid #2e3044; width:980px; margin:0 auto 30px}
		.tabs li {display:inline; float:left; width:20%;}
		.tabs.tabs3ea li {display:inline; float:left; width:33.33333%;}
        .tabs.tabs4ea li {display:inline; float:left; width:25%;}
		.tabs li a {display:block; color:#fff; background:#9697a1; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:14px}
		.tabs li a:hover,
		.tabs li a.active {background:#2e3044}
		.tabs li:last-child a {margin:0}
		.tabs:after {content:""; display:block; clear:both}

		.evt_03 {background:#0065cf;}

		.evt_04 {background:#fff; padding:100px 0; width:1120px; margin:0 auto}
		.evt_04 h3 {font-size:30px; color:#2e3044; margin-bottom:30px}
		.evt_04 ul {width:1120px}
		.evt_04 table {border-top:1px solid #edeeef; border-left:1px solid #edeeef; table-layout: auto;}
		.evt_04 table th,
		.evt_04 table td {padding:15px 5px; border-bottom:1px solid #edeeef; border-right:1px solid #edeeef; text-align: center; font-size:14px}
		.evt_04 table th {background: #2e3044; color:#fff; font-weight: bold;}
		.evt_04 table tbody th {background: #9697a1; color:#fff;} 
		.evt_04 .buyLec {margin-top:30px}
		.evt_04 .buyLec a { display:block; text-align:cetner; font-size:30px; font-weight:600; background:#e83e3e; color:#fff; padding:20px 0; border-radius:50px}
		.evt_04 .buyLec a:hover {background:#e83e3e; box-shadow: 10px 10px 10px rgba(0,0,0,.2);}

		.evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:20px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
			<img src="https://static.willbes.net/public/images/promotion/2019/12/190802_value01.png" alt="2020 감평패스" />
		</div>

		<div class="evtCtnsBox evt_01">
			<img src="https://static.willbes.net/public/images/promotion/2019/12/190802_value02.png" alt="커리큘럼" />
		</div>

		<div class="evtCtnsBox evt_02">
			<img src="https://static.willbes.net/public/images/promotion/2019/12/190802_value03.png" alt="1차 강의" />
			<ul class="tabs">
				<li><a href="#tab01">민법</a></li>
				<li><a href="#tab02">감정평가관계법규</a></li>
				<li><a href="#tab03">부동산학원론</a></li>
				<li><a href="#tab04">경제학원론</a></li>
				<li><a href="#tab05">회계학</a></li>
			</ul>
			<div id="tab01">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190802_value_p_01_1.png" alt="민법" />
			</div>
			<div id="tab02">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190802_value_p_01_2.png" alt="노동법" />
			</div>
			<div id="tab03">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190802_value_p_01_3.png" alt="사회보험법" />
			</div>
			<div id="tab04">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190802_value_p_01_4.png" alt="경제학원론" />
			</div>
			<div id="tab05">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190802_value_p_01_5.png" alt="경영학개론" />
			</div>
			<img src="https://static.willbes.net/public/images/promotion/2019/12/190802_value04.png" alt="2차 강의" />
			<ul class="tabs tabs3ea">
				<li><a href="#tab06">감정평가이론</a></li>
				<li><a href="#tab07">감정평가실무</a></li>
				<li><a href="#tab08">감평행정법 및 보상법규</a></li>
			</ul>
			<div id="tab06">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190802_value_p_02_1.png" alt="노동법" />
			</div>
			<div id="tab07">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190802_value_p_02_2.png" alt="행정쟁송법" />
			</div>
			<div id="tab08">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190802_value_p_02_3.png" alt="인사노무관리" />
			</div>
		</div>

		<div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/190802_value05.png" alt="수강신청" usemap="#Map190802" border="0" />
			<map name="Map190802" id="Map190802">
				<area shape="rect" coords="5,1176,223,1228" href="https://job.willbes.net/package/show/cate/309003/pack/648001/prod-code/160343" alt="1차감평패스" />
				<area shape="rect" coords="253,1176,476,1228" href="https://job.willbes.net/package/show/cate/309003/pack/648001/prod-code/160345" alt="2차감평패스" />
				<area shape="rect" coords="504,1177,724,1227" href="https://job.willbes.net/package/show/cate/309003/pack/648001/prod-code/160348" alt="동차감평패스" />
				<area shape="rect" coords="755,1178,972,1227" href="https://job.willbes.net/package/show/cate/309003/pack/648001/prod-code/160352" alt="동차감평패스 프리미엄" />
			</map>
		</div>
        {{--
		<div class="evtCtnsBox evt_04 NGR">
			<ul class="tabs tabs4ea NG">
				<li><a href="#tab12">2020 한림1차 감평패스</a></li>
				<li><a href="#tab13">2020 한림2차 감평패스</a></li>
				<li><a href="#tab14">2020 한림 동차 감평패스[베이직]</a></li>
				<li><a href="#tab15">2020 한림 동차 감평패스[프리미엄]</a></li>				
			</ul>
			<form name="form1">
				<div id="tab12">
					<h3 class="NSK-Black">2020 한림 1차 감평패스</h3>
					<div>					
						<table cellspacing="0" cellpadding="0">
							<colgroup>
								<col width="20%" />
								<col width="" />
                                <col width="" />
                                <col width="" />
                                <col width="" />
                                <col width="" />
							</colgroup>
							<thead>
                                <tr>
                                    <th>과목</th>
                                    <th>강사</th>
                                    <th colspan="4">과정</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>민법</th>
                                    <td>김춘환</td>
                                    <td>기본강의</td>
                                    <td>문제풀이</td>
                                    <td>모의고사</td>
                                    <td>최종정리</td>
                                </tr>
                                <tr>
                                    <th>감정평가관계법규</th>
                                    <td>조민수</td>
                                    <td>기본강의</td>
                                    <td>문제풀이</td>
                                    <td>모의고사</td>
                                    <td>최종정리</td>
                                </tr>
                                <tr>
                                    <th>부동산학원론</th>
                                    <td>송우석</td>
                                    <td>기본강의</td>
                                    <td>문제풀이</td>
                                    <td>모의고사</td>
                                    <td>최종정리</td>
                                </tr>
                                <tr>
                                    <th>경제학원론</th>
                                    <td>황정빈</td>
                                    <td>기본강의</td>
                                    <td>문제풀이</td>
                                    <td>모의고사</td>
                                    <td>최종정리</td>
                                </tr>
                                <tr>
                                    <th>회계학</th>
                                    <td>김승철</td>
                                    <td>기본강의</td>
                                    <td>문제풀이</td>
                                    <td>모의고사</td>
                                    <td>최종정리</td>
                                </tr>
							</tbody>
						</table>
						<div class="buyLec">
							<a href="#none">수강신청 ></a>
						</div>				
					</div>				
				</div>

				<div id="tab13">
					<h3 class="NSK-Black">2020 한림 2차 감평패스</h3>
					<div>
						<table cellspacing="0" cellpadding="0">
							<colgroup>
								<col width="20%" />
								<col width="" />
								<col width="" />
								<col width="" />
								<col width="" />
								<col width="" />
							</colgroup>
							<thead>
                                <tr>
                                    <th>과목</th>
                                    <th>강사</th>
                                    <th colspan="3">과정</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th rowspan="3">감정평가실무</th>
                                    <td rowspan="3">여지훈</td>
                                    <td>일반평가 기본강의</td>
                                    <td rowspan="3">GS0~4기 스터디</td>
                                    <td>PASS 감정평가실무 문제풀이1 (초급) </td>
                                </tr>
                                <tr>
                                    <td rowspan="2">보상평가 기본강의</td>
                                    <td>PASS 감정평가실무 문제풀이2 (중급)</td>
                                </tr>
                                <tr>
                                    <td>PASS 감정평가실무 기출문제분석 강의</td>
                                </tr>
                                <tr>
                                    <th>감정평가이론</th>
                                    <td>최동진<br />
                                    (어정민)</td>
                                    <td>기본강의<br />
                                    심화강의</td>
                                    <td>GS0~4기 스터디</td>
                                    <td>기출문제분석 강의(어정민)</td>
                                </tr>
                                <tr>
                                    <th rowspan="6">감평행정법 및<br />
                                    보상법규</th>
                                    <td rowspan="2">김기홍</td>
                                    <td>감평행정법 기본강의</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>보상법규 기본강의</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">조 현</td>
                                    <td>감평행정법 기본강의</td>
                                    <td rowspan="2">GS0~4기 스터디</td>
                                    <td>행정법 기출논점 및 최신판례</td>
                                </tr>
                                <tr>
                                    <td>보상법규 기본강의</td>
                                    <td>보상법규 논점 사례연습 특강</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">이현진</td>
                                    <td>-</td>
                                    <td rowspan="2">GS0~4기 스터디</td>
                                    <td rowspan="2">감정평가 및 보상법규 핵심 논점 정리 특강</td>
                                </tr>
                                <tr>
                                    <td>-</td>
                                </tr>
							</tbody>
						</table>
						<div class="buyLec">
							<a href="#none">수강신청 ></a>
						</div>					
					</div>	
				</div>

				<div id="tab14">
					<h3 class="NSK-Black">2020 한림 동차 감평패스 1차 [베이직]</h3>
					<div>					
						<table cellspacing="0" cellpadding="0">
						<colgroup>
								<col width="20%" />
								<col width="" />
                                <col width="" />
                                <col width="" />
                                <col width="" />
                                <col width="" />
							</colgroup>
							<thead>
                                <tr>
                                    <th>과목</th>
                                    <th>강사</th>
                                    <th colspan="4">과정</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>민법</th>
                                    <td>김춘환</td>
                                    <td>기본강의</td>
                                    <td>문제풀이</td>
                                    <td>모의고사</td>
                                    <td>최종정리</td>
                                </tr>
                                <tr>
                                    <th>감정평가관계법규</th>
                                    <td>조민수</td>
                                    <td>기본강의</td>
                                    <td>문제풀이</td>
                                    <td>모의고사</td>
                                    <td>최종정리</td>
                                </tr>
                                <tr>
                                    <th>부동산학원론</th>
                                    <td>송우석</td>
                                    <td>기본강의</td>
                                    <td>문제풀이</td>
                                    <td>모의고사</td>
                                    <td>최종정리</td>
                                </tr>
                                <tr>
                                    <th>경제학원론</th>
                                    <td>황정빈</td>
                                    <td>기본강의</td>
                                    <td>문제풀이</td>
                                    <td>모의고사</td>
                                    <td>최종정리</td>
                                </tr>
                                <tr>
                                    <th>회계학</th>
                                    <td>김승철</td>
                                    <td>기본강의</td>
                                    <td>문제풀이</td>
                                    <td>모의고사</td>
                                    <td>최종정리</td>
                                </tr>
							</tbody>
						</table>				
					</div>

                    <h3 class="NSK-Black mt30">2020 한림 동차 감평패스 2차 [베이직]</h3>
					<div>					
						<table cellspacing="0" cellpadding="0">
						    <colgroup>
								<col width="20%" />
								<col width="" />
                                <col width="" />
                                <col width="" />
                                <col width="" />     
							</colgroup>
							<thead>
                                <tr>
                                    <th>과목</th>
                                    <th>강사</th>
                                    <th>과정</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th rowspan="2">감정평가실무</th>
                                    <td rowspan="2">여지훈</td>
                                    <td>일반평가 기본강의</td>
                                </tr>
                                <tr>
                                    <td>보상평가 기본강의</td>
                                </tr>
                                <tr>
                                    <th rowspan="2">감평행정법</th>
                                    <td>김기홍</td>
                                    <td>기본강의</td>
                                </tr>
                                <tr>
                                    <td>조  현</td>
                                    <td>기본강의</td>
                                </tr>
                                <tr>
                                    <th rowspan="2">보상법규</th>
                                    <td>김기홍</td>
                                    <td>기본강의</td>
                                </tr>
                                <tr>
                                    <td>조  현</td>
                                    <td>기본강의</td>
                                </tr>
							</tbody>
						</table>
						<div class="buyLec">
							<a href="#none">수강신청 ></a>
						</div>				
					</div>					
				</div>

				<div id="tab15">
					<h3 class="NSK-Black">2020 한림 동차 감평패스 1차 [프리미엄]</h3>
					<div>					
						<table cellspacing="0" cellpadding="0">
							<colgroup>
								<col width="20%" />
								<col width="" />
                                <col width="" />
                                <col width="" />
                                <col width="" />
							</colgroup>
							<thead>
                                <tr>
                                    <th>과목</th>
                                    <th>강사</th>
                                    <th colspan="4">과정</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>민법</th>
                                    <td>김춘환</td>
                                    <td>기본강의</td>
                                    <td>문제풀이</td>
                                    <td>모의고사</td>
                                    <td>최종정리</td>
                                </tr>
                                <tr>
                                    <th>감정평가관계법규</th>
                                    <td>조민수</td>
                                    <td>기본강의</td>
                                    <td>문제풀이</td>
                                    <td>모의고사</td>
                                    <td>최종정리</td>
                                </tr>
                                <tr>
                                    <th>부동산학원론</th>
                                    <td>송우석</td>
                                    <td>기본강의</td>
                                    <td>문제풀이</td>
                                    <td>모의고사</td>
                                    <td>최종정리</td>
                                </tr>
                                <tr>
                                    <th>경제학원론</th>
                                    <td>황정빈</td>
                                    <td>기본강의</td>
                                    <td>문제풀이</td>
                                    <td>모의고사</td>
                                    <td>최종정리</td>
                                </tr>
                                <tr>
                                    <th>회계학</th>
                                    <td>김승철</td>
                                    <td>기본강의</td>
                                    <td>문제풀이</td>
                                    <td>모의고사</td>
                                    <td>최종정리</td>
                                </tr>
							</tbody>
						</table>
                    </div>
                    <h3 class="NSK-Black mt30">2020 한림 동차 감평패스 2차 [프리미엄]</h3>
                    <div>
						<table cellspacing="0" cellpadding="0">
							<colgroup>
								<col width="" />
								<col width="" />
								<col width="" />
								<col width="" />
								<col width="" />
								<col width="" />
							</colgroup>
							<thead>
                                <tr>
                                    <th>과목</th>
                                    <th>강사</th>
                                    <th colspan="3">과정</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th rowspan="3">감정평가실무</th>
                                    <td rowspan="3">여지훈</td>
                                    <td>일반평가 기본강의</td>
                                    <td rowspan="3">GS0~4기 스터디</td>
                                    <td>PASS 감정평가실무 문제풀이1 (초급) </td>
                                </tr>
                                <tr>
                                    <td rowspan="2">보상평가 기본강의</td>
                                    <td>PASS 감정평가실무 문제풀이2 (중급)</td>
                                </tr>
                                <tr>
                                    <td>PASS 감정평가실무 기출문제분석 강의</td>
                                </tr>
                                <tr>
                                    <th>감정평가이론</th>
                                    <td>최동진<br />
                                    (어정민)</td>
                                    <td>기본강의<br />
                                    심화강의</td>
                                    <td>GS0~4기 스터디</td>
                                    <td>기출문제분석 강의(어정민)</td>
                                </tr>
                                <tr>
                                    <th rowspan="6">감평행정법 및<br />
                                    보상법규</th>
                                    <td rowspan="2">김기홍</td>
                                    <td>감평행정법 기본강의</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>보상법규 기본강의</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">조 현</td>
                                    <td>감평행정법 기본강의</td>
                                    <td rowspan="2">GS0~4기 스터디</td>
                                    <td>행정법 기출논점 및 최신판례</td>
                                </tr>
                                <tr>
                                    <td>보상법규 기본강의</td>
                                    <td>보상법규 논점 사례연습 특강</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">이현진</td>
                                    <td>-</td>
                                    <td rowspan="2">GS0~4기 스터디</td>
                                    <td rowspan="2">감정평가 및 보상법규 핵심 논점 정리 특강</td>
                                </tr>
                                <tr>
                                    <td>-</td>
                                </tr>
							</tbody>
						</table>
						<div class="buyLec">
							<a href="#none">수강신청 ></a>
						</div>				
					</div>
				</div>
			</form>
		</div>
        --}}
		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>1차 상품구성은 2019년 9월부터 2021년 2월까지 진행될 2020년/2021년 대비 감정평가사 1차 대비 강좌로 구성됩니다.</li>
                    <li>2차 상품구성은 2019년 3월부터 2021년 5월까지 진행될 2020년/2021년 대비 감정평가사 2차 대비 강좌로 구성됩니다.<br>
                    ＊GS1~4기 스터디 - 2019 10월 ~ 2021년 5월<br>
                    ＊기본강의 - 2019/2020년 3~5월<br>
                    ＊문제풀이 - 2019/2020년 3~5월<br>
                     동영상 강의는 실강 진행 후 다음날 동영상 업로드(공휴일/주말 제외) 됩니다.</li>
                    <li>강사 및 개설과정은 학원사정에 따라 변경될 수 있습니다.<br>
                        강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 패스 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
					<li>본 패스 상품 강의의 경우 배수 제한 없이 무제한 수강이 가능합니다.</li>
					<li>본 패스 상품 수강기간은 각 패스 상품별로 상이하오니 꼭 확인하시기 바랍니다.</li>
					<li>본 패스 상품은 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
					<li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
					<li>본 패스 상품은 파격 할인가가 적용된 상품으로 복지할인 등 다른 쿠폰과 중복 적용되지 않습니다. </li>
                    <li>본 패스 상품 환불시 원 수강료와 수강일수 기준으로 환불이 됩니다. </li>
                    <li>기타 환불규정은 약관의 규정에 따릅니다.</li>
				</ul>
				<div class="infoTit NG"><strong>유의사항</strong></div>
				<ul>
					<li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
					<li>본 상품은 PC 식별코드인 MAC ADDRESS 수집에 동의하셔야 구매 및 수강이 가능합니다.</li>
					<li>[MAC ADDRESS 안내]<br>
						본 상품은 MAC 주소 정보 수집에 동의 후 구매할 수 있습니다.<br>
						윌비스는 정당하게 수강하시는 분들의 권리를 보호하기 위하여 MAC주소를 수집하고 있습니다. <br>
						MAC 주소(Media Access Control Address)는 PC마다 존재하는 고유 식별 번호입니다.</li>
				</ul>
				<div class="infoTit NG"><strong>상담 및 문의</strong></div>
				<ul>
					<li>[상담시간] 평일 오전 10시 ~ 오후 5시</li>
					<li>[상담전화] 1544-5006</li>
					<li>[상담내용] 강의 및 패키지 상품 안내</li>
				</ul>
			</div>
		</div>
	</div>
    <!-- End Container -->

	<script type="text/javascript">
        $(document).ready(function(){
            $('.tabs').each(function(){
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