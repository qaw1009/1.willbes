@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

		/************************************************************/ 
		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/07/2716_top_bg.jpg) no-repeat center top; overflow: hidden;}	
        .evt_top span {position: absolute; top:-200px; left:-200px; z-index: 1;}
        .evt_01 {background:#000}
        
        .evtCtnsBox .p_re {width:1120px; margin:0 auto;}
        .evtCtnsBox .p_re a {position:absolute; bottom:20px; right:30px; padding:15px 50px; border-radius:30px; color:#fff; background:#ff4e00; font-size:14px; display:none}
        .evtCtnsBox .p_re a:hover {background:#000;}

		.tabs {border-bottom:2px solid #ff4e00; width:1120px; margin:0 auto; display:flex}
		.tabs li {width:20%;}
		.tabs li a {display:block; color:#fff; background:#000; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:18px;font-weight:bold;}
		.tabs li a:hover,
		.tabs li a.active {background:#ff4e00;}     
        

        .evt_apply {padding:50px 0 75px;}  
        .evt_apply > a {display:block; font-size:34px; width:1000px; margin:auto; background:#191919; padding:20px 0; color:#fff; border-radius:50px; margin:0 auto 50px} 
        .evt_apply > a:hover {background:#ff4e00}   

		.check {letter-spacing:3; color:#fff; margin-top:30px;}
        .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#2f3241; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        .check a:hover {background:#ff4e00}

		.evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:20px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}

        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
		<div class="evtCtnsBox evt_top" >
			<img src="https://static.willbes.net/public/images/promotion/2022/07/2716_top.jpg" alt="감평1차 기본이론 선택형 종합반" data-aos="fade-up"/>
            <span data-aos="fade-down-right" data-aos-duration="1500"><img src="https://static.willbes.net/public/images/promotion/2022/07/2716_top_img.png" alt="" /></span>
		</div>

		<div class="evtCtnsBox evt_01" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/07/2716_01.jpg" alt="" />			  
		</div>

        <div class="evtCtnsBox" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/07/2716_02.jpg" alt="" />			  
		</div>
        
        <div class="evtCtnsBox evt_03" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/07/2716_03.jpg" alt="수험전략 수립 1차" />
            <ul class="tabs">
				<li><a href="#tab01">경제학개론</a></li>
				<li><a href="#tab02">민법</a></li>
				<li><a href="#tab03">회계학</a></li>
				<li><a href="#tab04">부동산학원론</a></li>
				<li><a href="#tab05">감정평가관계법규</a></li>
			</ul>
			<div id="tab01" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2022/07/2716_03_01.jpg" alt="경제학개론" />
			</div>
			<div id="tab02" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2022/07/2716_03_02.jpg" alt="민법"/>
			</div>
			<div id="tab03" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2022/07/2716_03_03.jpg" alt="회계학"/>
			</div>
			<div id="tab04" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2022/07/2716_03_04.jpg" alt="부동산학원론"/>
			</div>
			<div id="tab05" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2022/07/2716_03_05.jpg" alt="감정평가관계법규"/>
			</div>
		</div>

		<div class="evtCtnsBox" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/07/2716_04.jpg" alt="" />			  
		</div>

        <div class="evtCtnsBox evt_apply" data-aos="fade-up">             
            <a href="javascript:void(0);" data-url="https://job.willbes.net/userPackage/show/cate/309003/prod-code/199282" 
               class="NSK-Black" onclick="go_PassLecture(this)" >감평 1차 기본이론 선택형 종합반 수강신청  ▶
            </a>
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div> 
        </div> 

		<div class="evtCtnsBox evtInfo NGR" id="careful">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>본 상품은 2022년 6월 27일(월)부터 9월 15(목)까지 진행되는 감정평가 1차 기본이론 강의가 제공됩니다.</li>
                    <li>이벤트 기간 내 본 상품 결제 시, 최대 수강료 30% 할인 수강혜택이 적용됩니다.</li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품은 2배수 수강제한이 되어있습니다.</li>
                    <li>본 상품의 수강시작일은 30일 범위 내에서 지정하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
                    <li>본 패키지 강좌의 환불 시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
                    <li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br>
                    ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br>
                    ② 특별 기획 상품 등 할인이 적용된 상품은 해당 상품의 정가를 기준으로 환불하는 것을 원칙으로 합니다.<br>
                    ③ 특별 기획 상품 등 수강연장이 적용된 상품은 해당 상품의 정상 수강기간을 기준으로 환불하는 것을 원칙으로 합니다<br>
                    ④ 최종 완강 되지 않은 강좌의 학습 회차 계산은 공지된 예정 강좌 수를 기준으로 환불 금액을 산출합니다.</li>
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

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

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
        function go_PassLecture(obj){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }else{
                var _url = $(obj).data('url');
                window.open(_url);
            }
        }    
    </script>


@stop