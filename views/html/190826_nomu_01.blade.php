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

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2019/12/190826_nomu_01_bg.jpg) no-repeat center top;}	
		.evt_01 {background:#d6d6d6;}

        .evt_02 {background:#fff; padding:100px 0; width:1120px; margin:0 auto}
        .total {text-align:center; font-size:18px; font-weight:bold; padding:20px 0; border:1px solid #ccc; 
        background:rgba(255,255,255,0.8); margin-bottom:30px}
        .total span {padding:0 10px;}
        .total strong {padding:0 10px; font-size:120%; color:#de3349}
        .fixed {position:fixed; top:0; left:0; width:100%; border:0; border-bottom:1px solid #ccc; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10}/*총합스크롤고정*/

        .evtCtnsBox table {border-top:1px solid #edeeef; border-left:1px solid #edeeef; table-layout: auto;}
		.evtCtnsBox table th,
		.evtCtnsBox table td {padding:15px 5px; border-bottom:1px solid #edeeef; border-right:1px solid #edeeef; text-align: center; font-size:14px}
		.evtCtnsBox table th {background: #2e3044; color:#fff; font-weight: bold;}
		.evtCtnsBox table tbody th {background: #9697a1; color:#fff;} 
        .evtCtnsBox table tbody tr.lec td:last-child {color:#de3349; font-weight:bold}
		.evtCtnsBox .buyLec {margin-top:30px}
		.evtCtnsBox .buyLec a { display:block; text-align:cetner; font-size:30px; font-weight:600; background:#e83e3e; color:#fff; padding:20px 0; border-radius:50px}
		.evtCtnsBox .buyLec a:hover {background:#e83e3e; box-shadow: 10px 10px 10px rgba(0,0,0,.2);}

        .tabs {border-bottom:2px solid #de3349; margin:0 auto 30px}
		.tabs li {display:inline; float:left; width:50%;}
		.tabs li a {display:block; color:#fff; background:#9697a1; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:16px}
		.tabs li a:hover,
		.tabs li a.active {background:#de3349;}
		.tabs li:last-child a {margin:0}
		.tabs:after {content:""; display:block; clear:both}

		.evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:20px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}

        /************************************************************/      
    </style> 
	<div class="evtContent">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/190826_nomu_01.png" alt="노무2차 GS0순환" usemap="#Map190905A" border="0" />
            <map name="Map190905A" id="Map190905A">
                <area shape="rect" coords="788,874,975,1022" href="#buyLec" alt="바로신청하기" />
            </map>
		</div>

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/190826_nomu_02.png" alt="GS0순환 특징" />
		</div>

        <div class="evtCtnsBox evt_02 NGR">
            <div class="total">
                <span>[정상가] 0원</span> <span>[할인금액] 0원</span> <strong>[최종금액] 0원</strong> 
            </div>
            <ul class="tabs NG" id="buyLec">
				<li><a href="#tab01">필수과목 강좌</a></li>
				<li><a href="#tab02">선택과목 강좌</a></li>
			</ul>
			<div id="tab01">
                <table cellspacing="0" cellpadding="0">
                    <colgroup>
                        <col width="12%">
                        <col width="5%">
                        <col width="12%">
                        <col>
                        <col width="8%">
                        <col width="10%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>구분</th>
                            <th>선택</th>
                            <th>교수</th>
                            <th>일정</th>
                            <th>횟수</th>
                            <th>수강료</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="lec">
                            <th rowspan="10">노동법</th>
                            <td rowspan="2"><input name="mgntno" id="aa1" onclick="javascript:choiceSelectCheck(this, 5);" type="checkbox" value="" /></td>
                            <td rowspan="2">방강수 노무사</td>
                            <td>[평일반] 2019. 9/16 ~ 10/15</td>
                            <td>22회</td>
                            <td>347,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">통합노동법 10판(출간예정)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="aa" id="aa2" onclick="javascript:choiceSelectCheck(this, 5);" type="checkbox" value="" /></td>
                            <td rowspan="2">강재민 노무사</td>
                            <td>[평일반] 2019. 9/16 ~ 10/15</td>
                            <td>22회</td>
                            <td>347,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">쟁점노동법 10판(출간예정)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="aa" id="aa3" onclick="javascript:choiceSelectCheck(this, 5);" type="checkbox" value="" /></td>
                            <td rowspan="2">박원철 노무사</td>
                            <td>[평일반] 2019. 9/16 ~ 10/15</td>
                            <td>22회</td>
                            <td>347,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">실전 노동법 제4판(출간예정)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="aa" id="aa4" onclick="javascript:choiceSelectCheck(this, 5);" type="checkbox" value="" /></td>
                            <td rowspan="2">박원철 노무사</td>
                            <td>[주말반] 2019. 9/29 ~ 12/8</td>
                            <td>22회</td>
                            <td>347,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">실전 노동법 제4판(출간예정)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="aa" id="aa5" onclick="javascript:choiceSelectCheck(this, 5);" type="checkbox" value="" /></td>
                            <td rowspan="2">이수진 노무사</td>
                            <td>[주말반] 2019. 9/22 ~ 11/17</td>
                            <td>18회</td>
                            <td>284,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">통합노동법 10판(방강수 著, 출간예정)+법전+기타 프린트물</td>
                        </tr>
                        <tr class="lec">
                            <th rowspan="18">행정쟁송법</th>
                            <td rowspan="2"><input name="ab" id="ab1" onclick="javascript:choiceSelectCheck(this, 9);" type="checkbox" value="" /></td>
                            <td rowspan="2">조  현 교수</td>
                            <td>[평일반] 2019. 10/17 ~ 11/1</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">통합행정쟁송법 7판+보충자료</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="ab" id="ab2" onclick="javascript:choiceSelectCheck(this, 9);" type="checkbox" value="" /></td>
                            <td rowspan="2">이승민 교수</td>
                            <td>[평일반] 2019. 10/17 ~ 11/1</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">콕 행정쟁송법 11판(이승민 著 / 구판도 수강가능)+특수프린트</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="ab" id="ab3" onclick="javascript:choiceSelectCheck(this, 9);" type="checkbox" value="" /></td>
                            <td rowspan="2">심  민 교수</td>
                            <td>[평일반] 2019. 10/17 ~ 11/1</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">MAGIC 통합 실전연습 행정쟁송법 7판(심민 編著, 출간예정)+MAGIC 하루 30분 행쟁하라(단문연습)+수험용 법전</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="ab" id="ab4" onclick="javascript:choiceSelectCheck(this, 9);" type="checkbox" value="" /></td>
                            <td rowspan="2"><p>김정일 변호사</p></td>
                            <td>[평일반] 2019. 10/17 ~ 11/1</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">트리니티 노무사 행정쟁송법+행정쟁송법 행정심판법 전체개관(특수프린트)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="ab" id="ab5" onclick="javascript:choiceSelectCheck(this, 9);" type="checkbox" value="" /></td>
                            <td rowspan="2">김기홍 교수</td>
                            <td>[평일반] 2019. 10/17 ~ 11/1</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">2020대비 공인노무사 핵심정리 행정쟁송법(김기홍 著, 출간예정)+시험장용 법전</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="ab" id="ab6" onclick="javascript:choiceSelectCheck(this, 9);" type="checkbox" value="" /></td>
                            <td rowspan="2"><p>조  현 교수</p></td>
                            <td>[주말반] 2019. 9/21 ~ 12/7</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">통합행정쟁송법 7판+보충자료</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="ab" id="ab7" onclick="javascript:choiceSelectCheck(this, 9);" type="checkbox" value="" /></td>
                            <td rowspan="2">이승민 교수</td>
                            <td>[주말반] 2019. 9/21 ~ 12/7</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">콕 행정쟁송법 11판(이승민 著 / 구판도 수강가능)+특수프린트</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="ab" id="ab8" onclick="javascript:choiceSelectCheck(this, 9);" type="checkbox" value="" /></td>
                            <td rowspan="2">심  민 교수</td>
                            <td>[주말반] 2019. 9/21 ~ 12/7</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">MAGIC 통합 실전연습 행정쟁송법 7판(심민 編著, 출간예정)+MAGIC 암기장 필기노트(심민 著)+수험용 법전</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="ab" id="ab9" onclick="javascript:choiceSelectCheck(this, 9);" type="checkbox" value="" /></td>
                            <td rowspan="2">김정일 변호사</td>
                            <td>[주말반] 2019. 9/21 ~ 12/7</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">트리니티 노무사 행정쟁송법+행정쟁송법 행정심판법 전체개관(특수프린트)</td>
                        </tr>
                        <tr class="lec">
                            <th rowspan="8">인사노무관리</th>
                            <td rowspan="2"><input name="ac" id="ac1" onclick="javascript:choiceSelectCheck(this, 4);" type="checkbox" value="" /></td>
                            <td rowspan="2">김유미 노무사</td>
                            <td>[평일반] 2019. 11/4 ~ 11/19</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">인사노무관리 전략노트 6판(출간예정)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="ac" id="ac2" onclick="javascript:choiceSelectCheck(this, 4);" type="checkbox" value="" /></td>
                            <td rowspan="2">전수환 교수</td>
                            <td>[평일반] 2019. 11/4 ~ 11/19</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">공인노무사 인사노무관리 7판(출간예정)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="ac" id="ac3" onclick="javascript:choiceSelectCheck(this, 4);" type="checkbox" value="" /></td>
                            <td rowspan="2">김유미 노무사</td>
                            <td>[주말반] 2019. 9/21 ~ 12/7</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">신인사관리 6판(박경규 著)+조직 이론과 설계 12판(Daft 著)+정리 프린트</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="ac" id="ac4" onclick="javascript:choiceSelectCheck(this, 4);" type="checkbox" value="" /></td>
                            <td rowspan="2">정준모 노무사</td>
                            <td>[주말반] 2019. 9/21 ~ 12/7</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">신인적자원관리 3판(김영재 外)</td>
                        </tr>
                    </tbody>
                </table>
                <div class="buyLec">
                    <a href="#none">수강신청 ></a>
                </div>
			</div>
			<div id="tab02">
                <table cellspacing="0" cellpadding="0">
                    <colgroup>
                        <col width="12%">
                        <col width="5%">
                        <col width="12%">
                        <col>
                        <col width="8%">
                        <col width="10%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>구분</th>
                            <th>선택</th>
                            <th>교수</th>
                            <th>일정</th>
                            <th>횟수</th>
                            <th>수강료</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="lec">
                            <th rowspan="8">경영조직론</th>
                            <td rowspan="2"><input name="mgntno" id="ad1" onclick="javascript:choiceSelectCheck(this, 4);" type="checkbox" value="AL19000326" /></td>
                            <td rowspan="2">김유미 노무사</td>
                            <td>[평일반] 2019. 11/21 ~ 12/6</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">경영조직 전략노트 4판(출간예정)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="ad" id="ad2" onclick="javascript:choiceSelectCheck(this, 4);" type="checkbox" value="AL19000327" /></td>
                            <td rowspan="2">정준모 노무사</td>
                            <td>[평일반] 2019. 11/21 ~ 12/6</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">조직행동론(Robbins 著)+조직이론과 설계 12판(Daft 著)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="ad" id="ad3" onclick="javascript:choiceSelectCheck(this, 4);" type="checkbox" value="AL19000328" /></td>
                            <td rowspan="2">전수환 교수</td>
                            <td>[평일반] 2019. 11/21 ~ 12/6</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">공인노무사 경영조직 6판(출간예정)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="ad" id="ad4" onclick="javascript:choiceSelectCheck(this, 4);" type="checkbox" value="AL19000336" /></td>
                            <td rowspan="2">김유미 노무사</td>
                            <td>[주말반] 2019. 9/21 ~ 12/7</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">조직행동연구 6판(백기복 著)+조직이론과 설계 12판(Daft 著)</td>
                        </tr>
                        <tr class="lec">
                            <th rowspan="4">민사소송법</th>
                            <td rowspan="2"><input name="ae" id="ae1" onclick="javascript:choiceSelectCheck(this, 2);" type="checkbox" value="AL19000329" /></td>
                            <td rowspan="2">김춘환 교수</td>
                            <td>[평일반] 2019. 11/21 ~ 12/6</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">테마 민사소송법 단문사례+시험용 법전</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><input name="ae" id="ae2" onclick="javascript:choiceSelectCheck(this, 2);" type="checkbox" value="AL19000337" /></td>
                            <td rowspan="2">이덕훈 박사</td>
                            <td>[주말반] 2019. 9/21 ~ 12/7</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">이덕훈 민사소송법+시험용 법전</td>
                        </tr>
                        <tr class="lec">
                            <th rowspan="2">노동경제학</th>
                            <td rowspan="2"><input name="af" id="af1" onclick="javascript:choiceSelectCheck(this, 1);" type="checkbox" value="AL19000456" /></td>
                            <td rowspan="2">강두성 교수</td>
                            <td>[평일반] 2019. 11/21 ~ 12/6</td>
                            <td>12회</td>
                            <td>189,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">노동경제학 10판(김우탁 著)</td>
                        </tr>
                    </tbody>
                </table>
                <div class="buyLec">
                    <a href="#none">수강신청 ></a>
                </div>
			</div>
        </div>

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>본 상품은 2019년 9월~12월에 진행되는 [공인노무사 2차 GS0순환 강의] 과정입니다.<Br>
                        동영상 강의는 실강 진행 후 다음날 동영상 업로드(주말/공휴일/일요일 제외) 됩니다.</li>
					<li>강사배정 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경하실 수 있습니다.<Br>
                        강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품은 2배수 수강제한이 되어있습니다.</li>
                    <li>본 상품의 수강시작일은 60일 범위 내에서 지정하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
					<li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
					<li>회원의 요구 또는 귀책사유로 인하여 계약이 해지되는 경우에는 수강시작일(당일 포함)부터 해지일까지의 이용일수 또는 이용
					회차에 해당하는 금액을 공제 후 환불하며 자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br>
					① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br>
					② 종합반 상품 및 특별 기획 상품 등 할인이 적용된 상품은 해당 상품의 정가를 기준으로 환불하는 것을 원칙으로 합니다.<br>
					③ 이용기간 기준의 온라인 강좌 상품(PASS)을 수강한 경우 환불 기준 : 결제금액-(강좌 정상가의 1일 이용대금×이용일수)<br>
					④ 최종 완강 되지 않은 강좌의 학습 회차 계산은 공지된 예정 강좌수를 기준으로 환불 금액을 산출합니다.</li>
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
        /*합계스크롤고정*/
        $(function() {
            var nav = $('.total');
            var navTop = nav.offset().top+100;
            var navHeight = nav.height()+10;
            var showFlag = false;
            nav.css('top', -navHeight+'px');
            $(window).scroll(function () {
                var winTop = $(this).scrollTop();
                if (winTop >= navTop) {
                    if (showFlag == false) {
                        showFlag = true;
                        nav
                            .addClass('fixed')
                            .stop().animate({'top' : '0px'}, 100);
                    }
                } else if (winTop <= navTop) {
                    if (showFlag) {
                        showFlag = false;
                        nav.stop().animate({'top' : -navHeight+'px'}, 100, function(){
                            nav.removeClass('fixed');
                        });
                    }
                }
            });
        });

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