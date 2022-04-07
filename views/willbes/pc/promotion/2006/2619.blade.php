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

		.evt_top {background:#ff6505;}       

        .evt_01 , .evt_02 , .evt_03 , .evt_04{background:#6de7ff;}

        .evt_04 {padding-bottom:100px;}

        .evtCtnsBox .p_re {width:1120px; margin:0 auto;}
        .evtCtnsBox .p_re a {position:absolute; bottom:80px; right:170px; padding:15px 30px; border-radius:30px; color:#fff; background-color:#CC0000; font-size:14px}
        .evtCtnsBox .p_re a:hover {background-color:#6de7ff; color:#000}

        /* 유의사항 */
		.evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.75}
		.evtInfoBox h4 {font-size:22px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; list-style:disc;}
        .evtInfoBox li span {color:#fff100; vertical-align:top}

        /************************************************************/

    </style>

	<div class="evtContent NSK">

		<div class="evtCtnsBox evt_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2619_top.jpg" alt="단기완성 미라클 100일" />
		</div>

		<div class="evtCtnsBox evt_01" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/04/2619_01.jpg" alt="수강 대상" />            
        </div>        

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2619_02.jpg" alt="수강 일정" />        
		</div>

         <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2619_03.jpg" alt="실강 수강 혜택" />        
		</div>

         <div class="evtCtnsBox evt_04" data-aos="fade-up">        
            <div class="p_re">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2619_04_01.jpg" alt="김동휸 평가사" />
                <a href="javascript:fnPlayerSample('193560', '1349170', 'HD');">샘플강의 보기</a>
            </div>
            <div class="p_re">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2619_04_02.jpg" alt="박아리 평가사"/>
                <a href="javascript:fnPlayerSample('193561', '1349186', 'HD');">샘플강의 보기</a>
            </div>			   
		</div>

         <div class="evtCtnsBox evt_05" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2619_05.jpg" alt="신청하기" />
                <a href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/193562" target="_blank" title="동영상 강의" style="position: absolute;left: 11.06%;top: 72.63%;width: 31.57%;height: 8.62%;z-index: 2;"></a>
                <a href="https://job.willbes.net/pass/offPackage/show/prod-code/193449" target="_blank" title="학원 실강" style="position: absolute;left: 57.36%;top: 72.63%;width: 31.57%;height: 8.62%;z-index: 2;"></a>
            </div>     
		</div>  

		<div class="evtCtnsBox evtInfo" data-aos="fade-up">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">상품 이용안내</h4>

				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>
					<li>4/4(월) ~ 7/15(금)까지 진행될 감정평가사 2차 대비 이론+문풀+스터디 강좌로 구성됩니다.</li>
                    <li>강의는 강의 순서에 따라 순차적으로 업로드 됩니다.</li>
				</ul>

				<div class="infoTit"><strong>수강관련</strong></div>
				<ul>
                    <li>본 패키지 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 패키지 상품 강의의 경우 배수 제한 없이 무제한 수강이 가능합니다.(기기대수 제한_2대)</li>
                    <li>본 패키지 상품 수강기간은 150일 입니다.(실강은 수강기간이 상이할 수 있습니다.)</li>
                    <li>본 패키지 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.</li>
				</ul>

                <div class="infoTit"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의 별 교재는 별도로 주문하셔야 합니다.</li>
                    <li>본 상품 강의 별 교재는 동영상 강의 신청 후 내 강의실 바로 가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>

                <div class="infoTit"><strong>결제/환불관련</strong></div>
				<ul>
                    <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                    <li>본 패키지 강좌의 환불 시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
                    <li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.</li>
                    ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br>
                    ② 고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 패스상품 정가 기준으로 계산하여 사용일수만큼 차감 후 환불 됩니다.<br>
                    ③ 강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.</li>
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
                    <li>[상담내용] 패키지 상품 안내</li>
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

@stop