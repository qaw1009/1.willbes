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

        .evt_top {background:#D9D8D6 url(https://static.willbes.net/public/images/promotion/2020/06/1695_top_bg.jpg) no-repeat center top;}

		.evt_01 {background:#fff;}

        .evt_02 {background:#fff;}
        .evt_03 {width:980px !important; margin:0 auto; padding:100px 0}

        .tabs {border-bottom:2px solid #aa1722; width:980px; margin:0 auto 30px}
		.tabs li {display:inline; float:left; width:25%;}
		.tabs li a {display:block; color:#fff; background:#666; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:16px; font-weight:bold}
		.tabs li a:hover,
		.tabs li a.active {background:#aa1722}
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
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1695_top.jpg" alt="관세사 올패스 맴버쉽" usemap="#Map1695a" border="0" />
            <map name="Map1695a" id="Map1695a">
                <area shape="rect" coords="406,966,712,1025" href="https://job.willbes.net/package/show/cate/309005/pack/648001/prod-code/166720" target="_blank" />
            </map>
		</div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1517_04.png" alt="수강신청" />
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1517_05.png" alt="전문 교수진" />
            <ul class="tabs">
                <li><a href="#tab01">관세법개론</a></li>
                <li><a href="#tab02">무역영어</a></li>
                <li><a href="#tab03">내국소비세법</a></li>
                <li><a href="#tab04">회계학</a></li>
            </ul>
            <div id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1695_t1_img_01.png" alt="관세법개론" />
            </div>
            <div id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1517_t1_img_02.png" alt="무역영어" />
            </div>
            <div id="tab03">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1517_t1_img_03.png" alt="내국소비세법" />
            </div>
            <div id="tab04">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1517_t1_img_04.png" alt="회계학" />
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1517_06.png" alt="" />
            <ul class="tabs">
                <li><a href="#tab05">관세법개론</a></li>
                <li><a href="#tab06">무역영어</a></li>
                <li><a href="#tab07">내국소비세법</a></li>
                <li><a href="#tab08">회계학</a></li>
            </ul>
            <div id="tab05">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1517_t1_img_05.png" alt="관세법개론" />
            </div>
            <div id="tab06">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1517_t1_img_06.png" alt="무역영어" />
            </div>
            <div id="tab07">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1517_t1_img_07.png" alt="내국소비세법" />
            </div>
            <div id="tab08">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1517_t1_img_08.png" alt="회계학" />
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1695_07.png" alt="" /><br>
            <a href="https://job.willbes.net/package/show/cate/309005/pack/648001/prod-code/166720" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/01/1517_08.png" alt="수강신청" /></a>
        </div>

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>
                        관세사 1차 올패스 멤버십 상품은 관세사 1차 대비 전 과목(관세법(FTA 특례법 포함), 무역영어, 내국소비세법, 회계학)의 1차 기본이론, 1차 객관식, 1차 Final 동영상
                        강의를 아래와 같은 구성으로 묶어 판매하는 상품입니다.
                    </li>
                    <li>
                        수강 기간 : 2021년 1차 시험일까지 + 수강 배수 무제한 수강 + 모바일 무료 수강 
                    </li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
					<li>본 상품 강의별 교재는 동영상 강의 신청 시 「교재보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
					<li>회원의 요구 또는 귀책사유로 인하여 계약이 해지되는 경우에는 수강시작일(당일 포함)부터 해지일까지의 이용일수에 해당하는 금액을 공제 후 환불하며
                        자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br>
                        ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br>
                        ② PASS 상품 및 특별 기획 상품 등 할인이 적용된 상품은 해당 상품의 정가를 기준으로 환불하는 것을 원칙으로 합니다.<br>
                        ③ 이용기간 기준의 온라인 강좌 상품(PASS)을 수강한 경우 환불 기준 : 결제금액-(강좌 정상가의 1일 이용대금×이용일수)<br>
                        ④ 최종 완강 되지 않은 강좌의 학습 회차 계산은 공지된 예정 강좌수를 기준으로 환불 금액을 산출합니다.
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