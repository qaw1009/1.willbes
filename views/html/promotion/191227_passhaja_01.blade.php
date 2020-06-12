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

		.evt_top {background:#ffecdb;}	
		.evt_01 {background:#fff;}
        .evt_02 {background:url(https://static.willbes.net/public/images/promotion/2019/12/191227_passhaja_03_bg.jpg) repeat-x center top;}
        .evt_03 {background:#fff; width:1120px; margin:0 auto; padding:100px 0}

        .evtCtnsBox table {border-top:1px solid #edeeef; border-left:1px solid #edeeef; table-layout: auto;}
		.evtCtnsBox table th,
		.evtCtnsBox table td {padding:15px 5px; border-bottom:1px solid #edeeef; border-right:1px solid #edeeef; text-align: center; font-size:14px; line-height:1.5}
		.evtCtnsBox table th {background: #2e3044; color:#fff; font-weight: bold;}
		.evtCtnsBox table tbody th {background: #9697a1; color:#fff;} 
        .evtCtnsBox table tbody td:first-child {text-align:left}
        .evtCtnsBox table tbody td:last-child {color:#e83e3e; font-weight:bold}
		.evtCtnsBox .buyLec {margin-top:30px}
		.evtCtnsBox .buyLec a { display:block; text-align:cetner; font-size:30px; font-weight:600; background:#e83e3e; color:#fff; padding:20px 0; border-radius:50px}
		.evtCtnsBox .buyLec a:hover {background:#e83e3e; box-shadow: 10px 10px 10px rgba(0,0,0,.2);}

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

        <div class="evtCtnsBox">
            <ul class="tabs NG">
                <li><a href="#tab01">합격 패키지</a></li>
                <li><a href="#tab02">단과반</a></li>
            </ul>
        </div>
        <div id="tab01">
            <div class="evtCtnsBox evt_top">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/191227_passhaja_01.jpg" alt="소프트웨어자산관리사 2급 올인원 스피드 합격패키지" />
            </div>

            <div class="evtCtnsBox evt_01">
                <div class="mt50"><img src="https://static.willbes.net/public/images/promotion/2019/12/191227_passhaja_02_1.jpg" alt="소프트웨어자산관리사" /></div>
                <img src="https://static.willbes.net/public/images/promotion/2019/12/191227_passhaja_02.jpg" alt="과정안내" usemap="#Map191227" border="0" />
                <map name="Map191227" id="Map191227">
                    <area shape="rect" coords="697,2626,902,2681" href="#" alt="패키지1 수강신청" />
                    <area shape="rect" coords="696,2878,902,2932" href="#" alt="패키지2 수강신청" />
                    <area shape="rect" coords="696,3129,903,3186" href="#" alt="패키지3 수강신청" />
                </map>
            </div>
        </div>
        <div id="tab02">
            <div class="evtCtnsBox evt_02">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/191227_passhaja_03.jpg" alt="소프트웨어자산관리사 2급 올인원 스피드 합격패키지" />
            </div>

            <div class="evtCtnsBox evt_03">
                <table cellspacing="0" cellpadding="0">
                    <colgroup>
                        <col width="">
                        <col width="15%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>교수명/강의명</th>
                            <th>기간</th>
                            <th>신청</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>유지호 / 소프트웨어 자산관리(이론+문제) 강의 </td>
                            <td>20일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <td>유지호 / 소프트웨어 라이선스(이론+문제) 강의 </td>
                            <td>18일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <td>유지호 / 소프트웨어 일반(이론+문제) 강의</td>
                            <td>15일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <td>유지혜 / 소프트웨어 관련법(이론+문제) 강의</td>
                            <td>20일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
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