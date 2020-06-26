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

		.evt_top {background:#FEB800 url(https://static.willbes.net/public/images/promotion/2020/06/1705_top_bg.jpg) no-repeat center top;}	
        
		.tabs {border-bottom:2px solid #2e3044; width:1120px; margin:0 auto 30px}
		.tabs li {display:inline; float:left; width:20%;}
		.tabs.tabs3ea li {display:inline; float:left; width:33.33333%;}
        .tabs.tabs4ea li {display:inline; float:left; width:25%;}
		.tabs li a {display:block; color:#fff; background:#9697a1; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:14px}
		.tabs li a:hover,
		.tabs li a.active {background:#2e3044}
		.tabs li:last-child a {margin:0}
		.tabs:after {content:""; display:block; clear:both}

        .evtCtnsBox .buyLec {width:1000px; margin:0 auto;padding:30px 0 100px;}
		.evtCtnsBox .buyLec a { display:block; text-align:center; font-size:40px;background:#ffb800; color:#000; padding:20px 0; border-radius:50px;font-weight:bold;}
		.evtCtnsBox .buyLec a:hover {box-shadow: 10px 10px 10px rgba(0,0,0,.2);}

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
		.evtInfoBox h4 {font-size:35px; margin-bottom:30px;}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
			<img src="https://static.willbes.net/public/images/promotion/2020/06/1705_top.jpg" alt="기본이론 선택형 종합반" />
		</div>

		<div class="evtCtnsBox evt_01">
			<img src="https://static.willbes.net/public/images/promotion/2020/06/1705_01.jpg" alt="커리큘럼" />
		</div>

		<div class="evtCtnsBox evt_02">
			<img src="https://static.willbes.net/public/images/promotion/2020/06/1705_02.jpg" alt="이해가 빠른 강의" />
			<ul class="tabs">
				<li><a href="#tab01">경제학원론</a></li>
				<li><a href="#tab02">민법</a></li>
				<li><a href="#tab03">회계학</a></li>
				<li><a href="#tab04">부동산학원론</a></li>
				<li><a href="#tab05">감정평가관계법규</a></li>
			</ul>
			<div id="tab01">
				<img src="https://static.willbes.net/public/images/promotion/2020/06/1705_02_tab01.png" alt="경제학원론" />
			</div>
			<div id="tab02">
				<img src="https://static.willbes.net/public/images/promotion/2020/06/1705_02_tab02.png" alt="민법" />
			</div>
			<div id="tab03">
				<img src="https://static.willbes.net/public/images/promotion/2020/06/1705_02_tab03.png" alt="회계학" />
			</div>
			<div id="tab04">
				<img src="https://static.willbes.net/public/images/promotion/2020/06/1705_02_tab04.png" alt="부동산학원론" />
			</div>
			<div id="tab05">
				<img src="https://static.willbes.net/public/images/promotion/2020/06/1705_02_tab05.png" alt="감정평가관계법규" />
			</div>
        </div>

        <div class="evtCtnsBox evt_03">
			<img src="https://static.willbes.net/public/images/promotion/2020/06/1705_03.jpg" alt="세이브 혜택" />
            <div class="buyLec">
                <a href="https://job.willbes.net/userPackage/show/cate/309003/prod-code/167381" target="_blank">수강신청</a>
            </div>
		</div>

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">수강안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>본 상품은 2020년 6월 26일(금)부터 진행되는 감정평가 1차 기본이론 강의가 제공됩니다.</li>
                    <li>이벤트 기간 내 본 상품 결제 시, 최대 수강료 30% 할인 수강혜택이 적용됩니다.</li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
					<li>본 상품은 2배수 수강 제한이 되어 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
					<li>본 상품 교재는 동영상 강의 신청 시 교재를 확인하시고 선택하신 후 구매하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
					<li>본 패키지 강좌의 환불시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.<br/>
                        자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br/>
                        ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br/>
                        ② 특별 기획 상품 등 할인이 적용된 상품은 해당 상품의 정가를 기준으로 환불하는 것을 원칙으로 합니다.<br/>
                        ③ 최종 완강 되지 않은 강좌의 학습 회차 계산은 공지된 예정 강좌수를 기준으로 환불 금액을 산출합니다.
                    </li>
				</ul>
				<div class="infoTit NG"><strong>유의사항</strong></div>
				<ul>
					<li>해당 패키지 강의는 일시정지 및 연장 신청이 안 됨을 유의해주십시오.</li>
					<li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
                    <li>본 상품은 PC 식별코드인 MAC ADDRESS 수집에 동의하셔야 구매 및 수강이 가능합니다.</li>
					<li>[MAC ADDRESS 안내]<br>
						본 상품은 MAC 주소 정보 수집에 동의 후 구매할 수 있습니다.<br>
						윌비스는 정당하게 수강하시는 분들의 권리를 보호하기 위하여 MAC주소를 수집하고 있습니다.<br>
						MAC 주소(Media Access Control Address)는 PC마다 존재하는 고유 식별 번호입니다.
                    </li>    
				</ul>
				<div class="infoTit NG"><strong>상담 및 문의</strong></div>
				<ul>
					<li>[상담시간] 평일 오전 10시 ~ 오후 5시</li>
					<li>[상담전화] 1544-5006</li>
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