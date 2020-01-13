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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/01/1517_01_bg.png) no-repeat center top;}

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
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1517_01.png" alt="관세사 올패스 맴버쉽" usemap="#Map1517A" border="0" />
            <map name="Map1517A" id="Map1517A">
                <area shape="rect" coords="320,931,659,1019" href="#evtlec" />
            </map>
		</div>

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1517_02.png" alt="올패스 맴버쉽 혜택" />
		</div>

        <div class="evtCtnsBox evt_02" id="evtlec">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1517_03.png" alt="올패스 맴버쉽 신청" usemap="#Map1517B" border="0" />
            <map name="Map1517B" id="Map1517B">
                <area shape="rect" coords="286,368,450,440" href="#" alt="프리미엄 무한수강" />
                <area shape="rect" coords="760,367,925,445" href="#" alt="프리미엄 슈퍼세이브" />
                <area shape="rect" coords="284,626,450,699" href="#" alt="베이직 무한수강" />
                <area shape="rect" coords="763,622,925,700" href="#" alt="베이직 슈퍼 세이브" />
                <area shape="rect" coords="285,885,449,957" href="#" alt="기본이론 무한수강" />
                <area shape="rect" coords="761,883,925,958" href="#" alt="기본이론 슈퍼세이브" />
            </map>
		</div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1517_04.png" alt="수강신청" />
            <ul class="tabs">
                <li><a href="#tab01">관세법개론</a></li>
                <li><a href="#tab02">무역영어</a></li>
                <li><a href="#tab03">내국소비세법</a></li>
                <li><a href="#tab04">회계학</a></li>
            </ul>
            <div id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1517_t1_img_01.png" alt="관세법개론" />
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
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1517_07.png" alt="" /><br>
            <a href="#evtlec"><img src="https://static.willbes.net/public/images/promotion/2020/01/1517_08.png" alt="수강신청" /></a>
        </div>

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>
                        관세사 1차 올패스 멤버십 상품은 관세사 1차 대비 전 과목(관세법(FTA 특례법 포함), 무역영어, 내국소비세법, 회계학)의 1차 기본이론, 
                        1차 객관식, 1차 Final 동영상 강의를 아래와 같은 구성으로 묶어 판매하는 상품입니다.<br>
                        ① 프리미엄 All Pass : 1차 대비 4과목(관세법개론(FTA특례법 포함), 무역영어, 내국소비세법, 회계학)의 『기본이론+객관식+Final 정리』동영상 강좌 제공<br>
                        ② 베이직 All Pass : 1차 대비 4과목(관세법개론(FTA특례법 포함), 무역영어, 내국소비세법, 회계학)의 『기본이론+객관식』 동영상 강좌 제공<br>
                        ③ 기본이론 All Pass : 1차 대비 4과목(관세법개론(FTA특례법 포함), 무역영어, 내국소비세법, 회계학)의 『기본이론』 동영상 강좌 제공
                    </li>
                    <li>
                        무한수강 모드와 슈퍼 세이브 모드는 아래와 같은 혜택이 적용됩니다. 
                        ① 무한수강 모드 : 수강 기간 2020년 1차 시험일까지 + 수강 배수 무제한 수강 + 모바일 무료 수강
                        ② 슈퍼 세이브 모드 : 수강기간 2020년 1차 시험일까지 + 수강 배수 2배수 제한 + 모바일 무료 수강
                    </li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>현재 미진행된 강의는 실강 일정에 따라 업로드 됩니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
					<li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
					<li>본 상품은 파격 할인가가 적용된 상품으로 복지할인 등 다른 쿠폰과 중복 적용되지 않습니다. </li>
                    <li>본 상품 환불시 원 수강료와 수강일수 기준으로 환불이 됩니다.</li>
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
					<li>[상담전화] 070-4006-7129(자격증 담당자)</li>
					<li>[상담내용] 강의관련 문의</li>
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