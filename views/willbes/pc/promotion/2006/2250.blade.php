@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

		/************************************************************/ 
		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/06/2250_top_bg.jpg) no-repeat center top;}	

        .evt_01 {background:#fed02b} 
        .evt_02 .btnlec {display:block; background:#fed02b; color:#000; padding:20px 0; text-align:center; font-size:36px; width:1100px; margin:0 auto 30px}       
        .evt_02 .btnlec:hover {background:#000; color:#fff; }

        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}        
        .evtCtnsBox .wrap a:hover {background:rgba(255,255,255,.2);}   
        
		.tabs {border-bottom:2px solid #fed02b; width:1120px; margin:0 auto 30px}
		.tabs li {display:inline; float:left; width:20%;}
        .tabs.four li {width:25%;}
		.tabs li a {display:block; color:#fff; background:#9697a1; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:18px;font-weight:bold;}
		.tabs li a:hover,
		.tabs li a.active {background:#fed02b;color:#fff;}
		.tabs li:last-child a {margin:0}
		.tabs:after {content:""; display:block; clear:both}     
        
        .check {letter-spacing:3; color:#fff; margin-bottom:100px;}
        .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#b59075; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        .check a:hover {background:#000}

		.evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:20px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}

        /************************************************************/      
    </style> 
	<div class="p_re evtContent NSK">

		<div class="evtCtnsBox evt_top">
			<img src="https://static.willbes.net/public/images/promotion/2021/06/2250_top.jpg" alt="감평1차 기본이론 선택형종합반" />
		</div>

        <div class="evtCtnsBox evt_01">
			<img src="https://static.willbes.net/public/images/promotion/2021/06/2250_01.jpg" alt="특별혜택" />
		</div>

        <div class="evtCtnsBox evt_02"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2250_02_top.jpg" alt="학습 커리큘럼" /> 
            <ul class="tabs">
				<li><a href="#tab01">경영학원론</a></li>
                <li><a href="#tab02">민법</a></li>
				<li><a href="#tab03">회계학</a></li>
				<li><a href="#tab04">부동산학원론</a></li>
                <li><a href="#tab05">감정평가관계법규</a></li>
			</ul>
			<div id="tab01" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2250_02_t01.jpg" alt="경영학원론"/>
			</div>
			<div id="tab02" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2250_02_t02.jpg" alt="민법"/>
			</div>
			<div id="tab03" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2250_02_t03.jpg" alt="회계학"/>         
			</div>
            <div id="tab04" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2250_02_t04.jpg" alt="부동산학원론"/>             
			</div>
            <div id="tab05" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2250_02_t05.jpg" alt="감정평가관계법규"/>              
			</div>
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2250_02_bottom.jpg" alt="수험생을 위한 save 혜택" />
            <a href="javascript:go_PassLecture('183202');" title="신청하기" class="btnlec NSK-Black">신청하기</a>
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div> 
            
		</div>         

		<div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">수강안내</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>				
                    <li>본 상품은 2021년 6월 24일(목)부터 9월 14(화)까지 진행되는 감정평가 1차 기본이론 강의가 제공됩니다.<br>
                    이벤트 기간 내 본 상품 결제 시, 최대 수강료 30% 할인 수강혜택이 적용됩니다.</li>
				</ul>
				<div class="infoTit"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품은 2배수 수강제한이 되어있습니다.</li>
                    <li>본 상품의 수강시작일은 30일 범위 내에서 지정하실 수 있습니다.</li>
				</ul>
				<div class="infoTit"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
				</ul>
				<div class="infoTit"><strong>결제/환불관련</strong></div>
				<ul>
                    <li>본 패키지 강좌의 환불 시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
                    <li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br>
                    ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br>
                    ② 특별 기획 상품 등 할인이 적용된 상품은 해당 상품의 정가를 기준으로 환불하는 것을 원칙으로 합니다.<br>
                    ③ 특별 기획 상품 등 수강연장이 적용된 상품은 해당 상품의 정상 수강기간을 기준으로 환불하는 것을 원칙으로 합니다<br>
                    ④ 최종 완강 되지 않은 강좌의 학습 회차 계산은 공지된 예정 강좌 수를 기준으로 환불 금액을 산출합니다.</li>
				</ul>
				<div class="infoTit"><strong>유의사항</strong></div>
				<ul>
					<li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
					<li>본 상품은 PC 식별코드인 MAC ADDRESS 수집에 동의하셔야 구매 및 수강이 가능합니다.</li>
					<li>[MAC ADDRESS 안내]<br>
						본 상품은 MAC 주소 정보 수집에 동의 후 구매할 수 있습니다.<br>
						윌비스는 정당하게 수강하시는 분들의 권리를 보호하기 위하여 MAC주소를 수집하고 있습니다. <br>
						MAC 주소(Media Access Control Address)는 PC마다 존재하는 고유 식별 번호입니다.</li>
				</ul>
				<div class="infoTit"><strong>상담 및 문의</strong></div>
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

                var url = '{{ site_url('/userPackage/show/cate/309003/prod-code/') }}' + code;
                location.href = url;
            }    
    </script>


@stop