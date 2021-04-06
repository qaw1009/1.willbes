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
		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/04/2163_top_bg.jpg) no-repeat center top;}	

        .boardD {width:1085px; border-spacing:0px; border:1px solid #dedede; table-layout:auto; color:#666; margin:0 auto} 
        .boardD caption {display:none}
        .boardD th,
        .boardD td {font-size:14px}
        .boardD th {padding:15px 5px; background:#f5f5f5; border-right:1px solid #dedede; border-bottom:1px solid #dedede; color:#333}
        .boardD thead th {background:#eee; color:#333}
        .boardD td {padding:15px 5px; margin:0; border:none; text-align:center; border-right:1px solid #fff; border-bottom:1px solid #fff;font-weight:bold;}
        .boardD tr.gray th,
        .boardD tr.gray td {background:#f6f6f6}
        .boardD th a {display:inline; padding:5px 10px; color:#333; background:#fff; border:1px solid #ccc; border-radius:4px; margin:0 auto}
        .boardD th a:hover {background:#e50001; color:#fff}
        .careful {color:#f72739;padding-bottom:100px;font-size:18px;font-weight:bold;}
       

        .evt_05 {background:#ECECEC;}
		.evt_05 .check{position:absolute;width: 800px;left:42%;top:1025px;margin-left:-250px;z-index:1;font-size:16px; text-align:center;line-height:1.5;
					  letter-spacing:-1px;font-weight:bold;}
		.evt_05 .check label{color:#000}
		.evt_05 .check input {border: 2px solid #000;margin-right: 8px;height: 20px; width: 20px;} 
		.evt_05 .check a {display: inline-block; padding:5px 20px; color: #fff;background: #000;border-radius:20px; margin-left:20px}
        
		.tabs {border-bottom:2px solid #2766f7; width:1120px; margin:0 auto 30px}
		.tabs li {display:inline; float:left; width:33.3333%;}
		.tabs li a {display:block; color:#fff; background:#9697a1; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:18px;font-weight:bold;}
		.tabs li a:hover,
		.tabs li a.active {background:#2766f7;color:#fff;}
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
	<div class="evtContent NGR">

		<div class="evtCtnsBox evt_top">
			<img src="https://static.willbes.net/public/images/promotion/2021/04/2163_top.jpg" alt="2022 얼리버드 티패스" />
		</div>

        <div class="evtCtnsBox evt_01">
			<img src="https://static.willbes.net/public/images/promotion/2021/04/2163_01.jpg" alt="필요한 분들" />
		</div>

        <div class="evtCtnsBox evt_02">
			<img src="https://static.willbes.net/public/images/promotion/2021/04/2163_02.jpg" alt="커리큘럼" />
		</div>

        <div class="evtCtnsBox evt_03">
			<img src="https://static.willbes.net/public/images/promotion/2021/04/2163_03.jpg" alt="수험전략 강의" />
            <ul class="tabs">
				<li><a href="#tab01" >감정평가실무</a></li>
				<li><a href="#tab02" >감정평가이론</a></li>
				<li><a href="#tab03" >감평행정법 및 보상법규</a></li>
			</ul>
			<div id="tab01" class="pb100">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2163_03_01.png" alt="감정평가실무" usemap="#2163_03_01" border="0" class="pb30" />
                <map name="2163_03_01" id="2163_03_01">
                    <area shape="rect" coords="1,226,300,285" href="javascript:fnPlayerSample('161446', '1228538', 'HD');">
                    <area shape="rect" coords="309,226,608,284" href="https://job.willbes.net/support/gosiNotice/show/cate/309003?board_idx=330143&s_cate_code=309003&s_cate_code_disabled=Y" target="_blank" />
                </map>
                <table cellspacing="0" cellpadding="0" class="boardD">
                    <col width="114" />
                    <col width="169" />
                    <col width="84" span="2" />
                    <col width="137" />
                    <col width="111" />
                    <tr style="background:#2766f7;color:#fff">
                        <td rowspan="4" width="114">여지훈 T-PASS</td>
                        <td width="169">강의구성</td>
                        <td width="84">수강기간</td>
                        <td width="84">할인률</td>
                        <td width="137">금액</td>
                        <td width="111">신청</td>
                    </tr>
                    <tr style="background:#e3e3e3;color:#696969">
                        <td>기본강의 패키지</td>
                        <td>150일</td>
                        <td style="color:#f72739">20%</td>
                        <td width="137"><span style="text-decoration: line-through;">454,000원</span><br />
                        <span style="color:#f72739">363,200원</span></td>
                        <td style="color:#2766f7" onclick="location.href='http://job.willbes.net/periodPackage/show/cate/309003/pack/648001/prod-code/180933';" style="cursor:pointer;">신청하기</td>
                    </tr>
                    <tr style="background:#e3e3e3;color:#696969">
                        <td>문제풀이 패키지</td>
                        <td>180일</td>
                        <td style="color:#f72739">25%</td>
                        <td width="137"><span style="text-decoration: line-through;">583,000원</span><br />
                        <span style="color:#f72739">437,250원</span></td>
                        <td style="color:#2766f7" onclick="location.href='http://job.willbes.net/periodPackage/show/cate/309003/pack/648001/prod-code/180938';" style="cursor:pointer;">신청하기</td>
                    </tr>
                    <tr style="background:#e3e3e3;color:#696969">
                        <td>기본+문풀 패키지</td>
                        <td>300일</td>
                        <td style="color:#f72739">30%</td>
                        <td width="137"><span style="text-decoration: line-through;">1,037,000원</span><br />
                        <span style="color:#f72739">725,900원</span></td>
                        <td style="color:#2766f7" onclick="location.href='http://job.willbes.net/periodPackage/show/cate/309003/pack/648001/prod-code/180942';" style="cursor:pointer;">신청하기</td>
                    </tr>
                </table>
			</div>
			<div id="tab02" class="pb100">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2163_03_02.png" alt="감정평가이론" usemap="#2163_03_02" border="0" class="pb30" />
                <map name="2163_03_02" id="2163_03_02">
                    <area shape="rect" coords="1,226,300,285" href="javascript:fnPlayerSample('159375', '1206850', 'HD');">
                    <area shape="rect" coords="309,226,608,284" href="https://job.willbes.net/support/gosiNotice/show/cate/309003?board_idx=330144&s_cate_code=309003&s_cate_code_disabled=Y" target="_blank" />
                </map>
                <table cellspacing="0" cellpadding="0" class="boardD">
                    <col width="114" />
                    <col width="169" />
                    <col width="84" span="2" />
                    <col width="137" />
                    <col width="111" />
                    <tr style="background:#2766f7;color:#fff">
                        <td rowspan="4" width="114">최동진 T-PASS</td>
                        <td width="169">강의구성</td>
                        <td width="84">수강기간</td>
                        <td width="84">할인률</td>
                        <td width="137">금액</td>
                        <td width="111">신청</td>
                    </tr>
                    <tr style="background:#e3e3e3;color:#696969">
                        <td>기본강의 패키지</td>
                        <td>150일</td>
                        <td style="color:#f72739">20%</td>
                        <td width="137"><span style="text-decoration: line-through;">454,000원</span><br />
                        <span style="color:#f72739">363,200원</span></td>
                        <td style="color:#2766f7" onclick="location.href='http://job.willbes.net/periodPackage/show/cate/309003/pack/648001/prod-code/180946';" style="cursor:pointer;">신청하기</td>
                    </tr>
                    <tr style="background:#e3e3e3;color:#696969">
                        <td>문제풀이 패키지</td>
                        <td>120일</td>
                        <td style="color:#f72739">25%</td>
                        <td width="137"><span style="text-decoration: line-through;">389,000원</span><br />
                        <span style="color:#f72739">291,750원</span></td>
                        <td style="color:#2766f7" onclick="location.href='http://job.willbes.net/periodPackage/show/cate/309003/pack/648001/prod-code/180947';" style="cursor:pointer;">신청하기</td>
                    </tr>
                    <tr style="background:#e3e3e3;color:#696969">
                        <td>기본+문풀 패키지</td>
                        <td>270일</td>
                        <td style="color:#f72739">30%</td>
                        <td width="137"><span style="text-decoration: line-through;">843,000원</span><br />
                        <span style="color:#f72739">590,100원</span></td>
                        <td style="color:#2766f7" onclick="location.href='http://job.willbes.net/periodPackage/show/cate/309003/pack/648001/prod-code/180948';" style="cursor:pointer;">신청하기</td>
                    </tr>
                </table>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2163_03_03.png" alt="감정평가이론" usemap="#2163_03_03" border="0" class="pb30" />
                <map name="2163_03_03" id="2163_03_03">
                    <area shape="rect" coords="2,257,301,316" href="javascript:fnPlayerSample('161460', '1226467', 'HD');">
                    <area shape="rect" coords="307,259,606,317" href="https://job.willbes.net/pass/offinfo/boardInfo/index/109?on_off_link_cate_code=309003&s_cate_code_disabled=Y&s_cate_code=3112&s_campus=&s_keyword=어정민" target="_blank" />
                </map>
                <table cellspacing="0" cellpadding="0" class="boardD">
                    <col width="114" />
                    <col width="169" />
                    <col width="84" span="2" />
                    <col width="137" />
                    <col width="111" />
                    <tr style="background:#2766f7;color:#fff">
                        <td rowspan="4" width="114">어정민 T-PASS</td>
                        <td width="169">강의구성</td>
                        <td width="84">수강기간</td>
                        <td width="84">할인률</td>
                        <td width="137">금액</td>
                        <td width="111">신청</td>
                    </tr>
                    <tr style="background:#e3e3e3;color:#696969">
                        <td>기본강의</td>
                        <td>90일</td>
                        <td style="color:#f72739">0%</td>
                        <td width="137"><span style="text-decoration: line-through;">146,000원</span><br />
                        <span style="color:#f72739">146,000원</span></td>
                        <td style="color:#2766f7" onclick="location.href='http://job.willbes.net/periodPackage/show/cate/309003/pack/648001/prod-code/180949';" style="cursor:pointer;">신청하기</td>
                    </tr>
                    <tr style="background:#e3e3e3;color:#696969">
                        <td>문제풀이 패키지</td>
                        <td>150일</td>
                        <td style="color:#f72739">20%</td>
                        <td width="137"><span style="text-decoration: line-through;">389,000원</span><br />
                        <span style="color:#f72739">311,200원</span></td>
                        <td style="color:#2766f7" onclick="location.href='http://job.willbes.net/periodPackage/show/cate/309003/pack/648001/prod-code/180951';" style="cursor:pointer;">신청하기</td>
                    </tr>
                    <tr style="background:#e3e3e3;color:#696969">
                        <td>기본+문풀 패키지</td>
                        <td>240일</td>
                        <td style="color:#f72739">25%</td>
                        <td width="137"><span style="text-decoration: line-through;">535,000원</span><br />
                        <span style="color:#f72739">401,250원</span></td>
                        <td style="color:#2766f7" onclick="location.href='http://job.willbes.net/periodPackage/show/cate/309003/pack/648001/prod-code/180952';" style="cursor:pointer;">신청하기</td>
                    </tr>
                </table>
			</div>
			<div id="tab03" class="pb100">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2163_03_04.png" alt="감평행정법 및 보상법규" usemap="#2163_03_04" border="0" class="pb30"/>
                <map name="2163_03_04" id="2163_03_04">
                    <area shape="rect" coords="1,226,300,285" href="javascript:fnPlayerSample('165632', '1237919', 'HD');">
                    <area shape="rect" coords="309,226,608,284" href="https://job.willbes.net/support/gosiNotice/show/cate/309003?board_idx=330145&s_cate_code=309003&s_cate_code_disabled=Y" target="_blank" />
                </map>
                <table cellspacing="0" cellpadding="0" class="boardD">
                    <col width="114" />
                    <col width="169" />
                    <col width="84" span="2" />
                    <col width="137" />
                    <col width="111" />
                    <tr style="background:#2766f7;color:#fff">
                        <td rowspan="4" width="114">이현진 T-PASS</td>
                        <td width="169">강의구성</td>
                        <td width="84">수강기간</td>
                        <td width="84">할인률</td>
                        <td width="137">금액</td>
                        <td width="111">신청</td>
                    </tr>
                    <tr style="background:#e3e3e3;color:#696969">
                        <td>기본강의 패키지</td>
                        <td>210일</td>
                        <td style="color:#f72739">20%</td>
                        <td width="137"><span style="text-decoration: line-through;">454,000원</span><br />
                        <span style="color:#f72739">363,200원</span></td>
                        <td style="color:#2766f7" onclick="location.href='http://job.willbes.net/periodPackage/show/cate/309003/pack/648001/prod-code/180954';" style="cursor:pointer;">신청하기</td>
                    </tr>
                    <tr style="background:#e3e3e3;color:#696969">
                        <td>문제풀이</td>
                        <td>90일</td>
                        <td style="color:#f72739">0%</td>
                        <td width="137"><span style="text-decoration: line-through;">162,000원</span><br />
                        <span style="color:#f72739">162,000원</span></td>
                        <td style="color:#2766f7" onclick="location.href='http://job.willbes.net/periodPackage/show/cate/309003/pack/648001/prod-code/180955';" style="cursor:pointer;">신청하기</td>
                    </tr>
                    <tr style="background:#e3e3e3;color:#696969">
                        <td>기본+문풀 패키지</td>
                        <td>300일</td>
                        <td style="color:#f72739">25%</td>
                        <td width="137"><span style="text-decoration: line-through;">616,000원</span><br />
                        <span style="color:#f72739">462,000원</span></td>
                        <td style="color:#2766f7" onclick="location.href='http://job.willbes.net/periodPackage/show/cate/309003/pack/648001/prod-code/180956';" style="cursor:pointer;">신청하기</td>
                    </tr>
                </table>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2163_03_05.png" alt="감평행정법 및 보상법규" usemap="#2163_03_05" border="0" class="pb30"/>
                <map name="2163_03_05" id="2163_03_05">
                    <area shape="rect" coords="0,256,299,315" href="javascript:fnPlayerSample('161490', '1230129', 'HD');">
                    <area shape="rect" coords="309,256,608,314" href="https://job.willbes.net/pass/offinfo/boardInfo/index/109?on_off_link_cate_code=309003&s_cate_code_disabled=Y&s_cate_code=3112&s_campus=&s_cate_code=3112&s_campus=&s_keyword=김기홍" target="_blank" />
                </map>
                <table cellspacing="0" cellpadding="0" class="boardD">
                    <col width="114" />
                    <col width="169" />
                    <col width="84" span="2" />
                    <col width="137" />
                    <col width="111" />
                    <tr style="background:#2766f7;color:#fff">
                        <td rowspan="4" width="114">김기홍 T-PASS</td>
                        <td width="169">강의구성</td>
                        <td width="84">수강기간</td>
                        <td width="84">할인률</td>
                        <td width="137">금액</td>
                        <td width="111">신청</td>
                    </tr>
                    <tr style="background:#e3e3e3;color:#696969">
                        <td>기본강의 패키지</td>
                        <td>150일</td>
                        <td style="color:#f72739">20%</td>
                        <td width="137"><span style="text-decoration: line-through;">487,000원</span><br />
                        <span style="color:#f72739">389,600원</span></td>
                        <td style="color:#2766f7" onclick="location.href='http://job.willbes.net/periodPackage/show/cate/309003/pack/648001/prod-code/180957';" style="cursor:pointer;">신청하기</td>
                    </tr>
                    <tr style="background:#e3e3e3;color:#696969">
                        <td>문제풀이 패키지</td>
                        <td>60일</td>
                        <td style="color:#f72739">0%</td>
                        <td width="137"><span style="text-decoration: line-through;">150,000원</span><br />
                        <span style="color:#f72739">150,000원</span></td>
                        <td style="color:#2766f7" onclick="location.href='http://job.willbes.net/periodPackage/show/cate/309003/pack/648001/prod-code/180958';" style="cursor:pointer;">신청하기</td>
                    </tr>
                    <tr style="background:#e3e3e3;color:#696969">
                        <td>기본+문풀 패키지</td>
                        <td>210일</td>
                        <td style="color:#f72739">25%</td>
                        <td width="137"><span style="text-decoration: line-through;">617,000원</span><br />
                        <span style="color:#f72739">462,750원</span></td>
                        <td style="color:#2766f7" onclick="location.href='http://job.willbes.net/periodPackage/show/cate/309003/pack/648001/prod-code/180959';" style="cursor:pointer;">신청하기</td>
                    </tr>
                </table>               
			</div>
            <p class="careful">★ 강사의 사정에 따라 강의가 진행되지 않을 경우 다른 강사의 강의로 변경될 수 있습니다.</p>
		</div>       

		<div class="evtCtnsBox evtInfo NGR" id="tip">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>				
                    <li>2차 상품구성은 2021년 5월부터 2021년 12월까지 진행될 2022년 대비 감정평가사 2차 대비 기본이론, 문제풀이 강좌로 구성됩니다.<br>
                        ∙기본이론 – 2021년 5월 ~ 2021년 9월<br>
                        ∙문제풀이 - 2021년 8월 ~ 2021년 12월<br>
                        동영상 강의는 실강 진행 후 다음날 동영상 업로드(공휴일/주말 제외) 됩니다. 
                    </li>
                    <li>강사 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경될 수 있습니다.<br>
                        강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.<br>
                        ※ 감정평가이론(어정민), 감정평가 및 보상법규(김기홍) 강의는 2021 대비 강의임을 알려드립니다.            
                    </li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 티패스 상품은 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
					<li>본 티패스 상품 강의의 경우 2배수 제한이 되어 있습니다.</li>
					<li>본 티패스 상품 수강기간은 각 패스 상품별로 상이하오니 꼭 확인하시기 바랍니다.</li>
					<li>본 티패스상품은 수강신청후 바로 수강이 진행되며(일부강의 제외), 수강시작일 변경, 일시정지, 연장신청이 불가합니다.</li>
                    <li>본 티패스상품은 재수강신청이 가능합니다.</li>
                    <li>본 티패스 상품의 강의별 수강기간 및 수강시작일은 해당 상품의 유의사항을 확인하세요.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
					<li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
                    <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
					<li>본 패키지 강좌의 환불시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
					<li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br/>
						① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br/>
                        ② 고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 패스상품 정가 기준으로 계산하여 사용일수만큼 차감 후 환불 됩니다.<br/>
                        ③ 강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.<br/>
                        ## 증정용 강의는 환불시 단과강의의 정가 기준으로 계산하여 사용일수만큼 차감 후 환불 됩니다.
                    </li>
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
					<li>[상담전화] 1566-4770</li>
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

        /*수강신청 동의*/ 
            function go_PassLecture(code){
                if($("input[name='ischk']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    return;
                }

                var url = '{{ site_url('/periodPackage/show/cate/309003/pack/648001/prod-code/') }}' + code;
                location.href = url;
            }    
    </script>


@stop