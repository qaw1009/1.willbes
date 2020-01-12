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

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2019/12/190627_value01_bg.png) no-repeat center top;}	
		.evt_01 {background:#0d0d0d;}
		.evt_02 {background:#fff;}
        .evt_03 {background:#f6f6f6; padding:50px 0 100px}

        .tabs {border-bottom:2px solid #2e3044; width:980px; margin:0 auto 30px}
		.tabs li {display:inline; float:left; width:25%;}
		.tabs li a {display:block; color:#fff; background:#9697a1; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:14px}
		.tabs li a:hover,
		.tabs li a.active {background:#2e3044}
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
			<img src="https://static.willbes.net/public/images/promotion/2019/12/190627_value01.png" alt="감평1차 단기합격 프로젝트" />
		</div>

		<div class="evtCtnsBox evt_01">
			<a href="#evt_03"><img src="https://static.willbes.net/public/images/promotion/2019/12/190627_value02.png" alt="특별혜택" /></a>
		</div>

		<div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/190627_value03.png" alt="수강신청"/>
            <ul class="tabs NG">
				<li><a href="#tab01">여지훈 평가사 감정평가실무</a></li>
				<li><a href="#tab02">최동진 평가사 감정평가이론</a></li>
				<li><a href="#tab03">조현 교수 감정평가 및 보상법규</a></li>
				<li><a href="#tab04">이현진 평가사 감정평가 및 보상법규</a></li>
			</ul>
            <div id="tab01">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190627_value03_p_1.png" alt="감정평가실무" />
			</div>
			<div id="tab02">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190627_value03_p_2.png" alt="감정평가이론" />
			</div>
			<div id="tab03">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190627_value03_p_3.png" alt="감정평가 및 보상법규" />
			</div>
			<div id="tab04">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190627_value03_p_4.png" alt="감정평가 및 보상법규" />
			</div>
            <img src="https://static.willbes.net/public/images/promotion/2019/12/190627_value04.png" alt="특별혜택" />
		</div>

        <div class="evtCtnsBox evt_03" id="evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/190627_value05.png" alt="특별혜택" usemap="#Map190627" border="0" />
            <map name="Map190627" id="Map190627">
                <area shape="rect" coords="152,312,366,372" href="https://job.willbes.net/package/show/cate/309003/pack/648001/prod-code/160357" alt="감정평가실무" />
                <area shape="rect" coords="614,311,825,375" href="https://job.willbes.net/package/show/cate/309003/pack/648001/prod-code/160358" alt="감정평가이론" />
                <area shape="rect" coords="155,780,365,839" href="https://job.willbes.net/package/show/cate/309003/pack/648001/prod-code/ 160359" alt="조현 감평 및 보상법규" />
                <area shape="rect" coords="614,777,822,840" href="https://job.willbes.net/package/show/cate/309003/pack/648001/prod-code/160360" alt="이현진 감평 및 보상법규" />
            </map>
		</div>

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>본 감정평가사 2차 SUCCESS T-PASS 상품은 과목 교수님별 GS스터디 0+1+2+3+4기 감정평가사 2차 대비 강좌 묶음으로구성됩니다.<br>
                        1) 여지훈 평가사 SUCCESS T-PASS는 2019년 7월부터 2020년 6월까지 진행되는 2020년 대비 감정평가실무 GS스터디 0+1+2+3+4기 
                        모든 동영상 강의 총 46회 제공으로 구성됩니다.<br>
                        2) 최동진 평가사 SUCCESS T-PASS는 2019년 7월부터 2020년 6월까지 진행되는 2020년 대비 감정평가이론 GS스터디 0+1+2+3+4기 
                        모든 동영상 강의 총 46회 제공으로 구성됩니다.<br>
                        3) 조현 교수 SUCCESS T-PASS는 2019년 7월부터 2020년 6월까지 진행되는 2020년 대비 감정평가 및 보상법규 GS스터디 0+1+2+3+4기 
                        모든 동영상 강의 총 46회 제공으로 구성됩니다.<br>
                        4) 이현진 평가사 SUCCESS T-PASS는 2019년 7월부터 2020년 6월까지 진행되는 2020년 대비 감정평가 및 보상법규 GS스터디 0+1+2+3+4기 
                        모든 동영상 강의 총 46회 제공으로 구성됩니다. </li>
                    <li>본 상품 수강신청 시 최대 수강료 30% 할인 혜택이 적용됩니다.</li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품은 2배수 수강제한이 되어있습니다.</li>
                    <li>본 상품 수강기간은 2020년 2차 시험일(6.30_예정)까지입니다.</li>
                    <li>본 상품은 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 없으며, 프린트 자료가 업로드 됩니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
					<li>본 상품 환불시 원 수강료와 수강일수 기준으로 환불이 됩니다.<br>
                        GS스터디 0기 : 195,000원 / 90일(*40일), GS스터디 1기 : 162,000원 / 70일(*30일) <br>
                        GS스터디 2기 : 130,000원 / 60일(*30일), GS스터디 3기 : 130,000원 / 60일(*30일) <br>
                        GS스터디 4기 : 130,000원 / 60일(*30일) <br>
                        ※ 강의가 완강 된 이후에는 수강기간 단축</li>
                    <li>기타 환불규정은 약관의 규정에 따릅니다. </li>
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