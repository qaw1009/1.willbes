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

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2019/12/191204_value01_bg.jpg) no-repeat center top;}	
		.evt_01 {background:#f9d064;}
		.evt_02 {background:#1eb8c0;}

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
			<img src="https://static.willbes.net/public/images/promotion/2019/12/191204_value01.png" alt="감평1차 단기합격 프로젝트" />
		</div>

		<div class="evtCtnsBox evt_01">
			<img src="https://static.willbes.net/public/images/promotion/2019/12/191204_value02.png" alt="특별혜택" />
		</div>

		<div class="evtCtnsBox evt_02">
			<img src="https://static.willbes.net/public/images/promotion/2019/12/191204_value03.png" alt="강의안내" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/12/191204_value04.png" alt="수강신청" usemap="#Map191204" border="0" />
            <map name="Map191204" id="Map191204">
                <area shape="rect" coords="115,335,395,407" href="https://job.willbes.net/package/show/cate/309003/pack/648001/prod-code/160346" alt="패키지1 수강신청" />
                <area shape="rect" coords="500,335,785,406" href="https://job.willbes.net/package/show/cate/309003/pack/648001/prod-code/160349" alt="패키지2 수강신청" />
            </map>
		</div>

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>본 상품은 2019년 9월 ~ 2020년 2월 실강 진행되는 감정평가사 1차 회계학, 경제학, 민법, 부동산학원론, 감정평가 관계법규 기본이론, 문제풀이(선택), 모의고사(선택), 최종정리 동영상 강좌가 제공됩니다.</li>
                    <li>이벤트 기간 내 본 상품 결제 시, 최대 60% 할인(교재 제외) 혜택이 적용됩니다.</li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품은 4배수 수강제한이 되어있습니다.</li>
                    <li>본 상품의 수강시작일은 수강과 동시에 시작되며, 수강기간 조정 및 정지가 불가합니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
					<li>회원의 요구 또는 귀책사유로 인하여 계약이 해지되는 경우에는 수강시작일(당일 포함)부터 해지일까지의 이용일수 또는 이용 회차에 해당하는 
                        금액을 공제 후 환불하며 자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<Br>
                        ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<Br>
                        ② 종합반 상품 및 특별 기획 상품 등 할인이 적용된 상품은 해당 상품의 정가를 기준으로 환불하는 것을 원칙으로 합니다.<Br>
                        ③ 이용기간 기준의 온라인 강좌 상품(종합반)을 수강한 경우 환불 기준 : 결제금액-(강좌 정상가의 1일 이용대금×이용일수)<Br>
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
					<li>[상담전화] 1544-5006 or 070-4006-7129</li>
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