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

		.evt_top {background:#ffecdb;}	
		.evt_01 {background:#fff;}

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
			<img src="https://static.willbes.net/public/images/promotion/2019/12/191227_passhaja_01.jpg" alt="소프트웨어자산관리사 2급 올인원 스피드 합격패키지" />
		</div>

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/191227_passhaja_02.jpg" alt="과정안내" usemap="#Map191227" border="0" />
            <map name="Map191227" id="Map191227">
                <area shape="rect" coords="697,2626,902,2681" href="#" alt="패키지1 수강신청" />
                <area shape="rect" coords="696,2878,902,2932" href="#" alt="패키지2 수강신청" />
                <area shape="rect" coords="696,3129,903,3186" href="#" alt="패키지3 수강신청" />
            </map>
		</div>

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>이론+문제 패키지 상품 구성은 2016년 소프트웨어자산관리사 2급 4과목 『이론+문제』 강의가 제공됩니다. 총 21강으로 과목별 세부 구성은 아래와 같습니다.<Br>
                        - 소프트웨어 일반(이론+문제) 강의 4회<Br>
                        - 소프트웨어 라이선스(이론+문제) 강의 5회<Br>
                        - 소프트웨어 관련법(이론+문제) 강의 6회<Br>
                        - 소프트웨어 자산관리(이론+문제) 강의 6회</li>
                    <li>이론종합 패키지 상품은 총 15강으로 2016년 소프트웨어자산관리사 2급 4과목 이론 강의가 제공됩니다.</li>
                    <li>문제종합 패키지 상품은 총 6강으로 2016년 소프트웨어자산관리사 2급 4과목 이론 강의가 제공됩니다.</li>                        
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 패키지 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 패키지 상품 수강기간은 다음과 같습니다.<Br>
                        이론+문제 패키지 : 60일 / 이론종합 패키지 : 40일 / 문제종합 패키지 : 20일</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
					<li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
					<li>본 패키지 상품은 파격 할인가가 적용된 상품으로 복지할인 등 다른 쿠폰과 중복 적용되지 않습니다. </li>
                    <li>본 패키지 상품 환불시 원 수강료와 수강일수 기준으로 환불이 됩니다. </li>
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
					<li>[상담전화] 1544-5006 or 070-4006-7129</li>
					<li>[상담내용] 공부방법론 및 합격을 위한 수험전략 수립</li>
				</ul>
			</div>
		</div>
	</div>
    <!-- End Container -->
@stop