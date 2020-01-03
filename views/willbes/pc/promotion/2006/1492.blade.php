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

        .tabs {width:1120px; margin:0 auto}
		.tabs li {display:inline; float:left; width:50%;}
		.tabs li a {display:block; color:#fff; background:#9697a1; height:60px; line-height:60px; text-align:center; margin-right:1px; font-size:20px}
		.tabs li a:hover,
		.tabs li a.active {background:#ffecdb; color:#d5181f}
		.tabs li:last-child a {margin:0}
		.tabs:after {content:""; display:block; clear:both}  

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2019/12/160817_passhaja_01_bg.jpg) no-repeat center top;}	
		.evt_01 {background:#000;}
        .evt_02 {background:#fff; padding:30px 0 100px}
        .evt_02 ul {width:1000px; margin:0 auto}
        .evt_02 li {display:inline; float:left; width:50%; text-align:center}
        .evt_02 ul:after {content:""; display:block; clear:both}
        .evt_03 {background:#000; padding:50px 0}

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
            <img src="https://static.willbes.net/public/images/promotion/2019/12/160817_passhaja_01.png" alt="경제교육지도사" />
        </div>

        <div class="evtCtnsBox evt_01">
            <a href="#buyLec"><img src="https://static.willbes.net/public/images/promotion/2019/12/160817_passhaja_02.png" alt="양성과정 바로가기" /></a>
        </div>

        <div class="evtCtnsBox evt_02">
            <div class="mt20"><img src="https://static.willbes.net/public/images/promotion/2019/12/160817_passhaja_04_1.jpg" alt="경제교육지도사" /></div>
            <img src="https://static.willbes.net/public/images/promotion/2019/12/160817_passhaja_04.png" alt="커리큘럼" />
            <ul>                
				<li><iframe width="450" height="315" src="https://www.youtube.com/embed/SVi818pT4aE" frameborder="0" allowfullscreen></iframe></li>
                <li><iframe width="450" height="315" src="https://www.youtube.com/embed/g7Y0en8wLj8" frameborder="0" allowfullscreen></iframe></li>
            </ul>
        </div>

        <div class="evtCtnsBox evt_03" id="buyLec">
            <a href="#"><img src="https://static.willbes.net/public/images/promotion/2019/12/160817_passhaja_05.png" alt="수강신청" /></a>
        </div>

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>경제교육지도사 강의는 총 22강이 제공됩니다. </li>                        
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품 수강기간은 60일 입니다.</li>
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
			</div>
		</div>
	</div>
    <!-- End Container -->
@stop