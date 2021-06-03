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
        .evtContent span {vertical-align:bottom}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

		/************************************************************/ 
		.evt_top {background:#0053a6;}	

        .evt_01 {background:#fff}
        .evt_01 .NSK-Black {font-size:50px; margin-bottom:30px}
        .evt_01 .NSK-Black span {color:#0053a6}

        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}             
        .evtCtnsBox .wrap a {display:block; padding:20px 0; color:#fff; background:#0053a6; border-radius:40px;font-size:30px;font-weight:bold;}   
        .evtCtnsBox .wrap a:hover {background:#1ec575;}   

		.check {letter-spacing:3; color:#fff; margin-top:30px; padding-bottom:100px;}
        .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#0053a6; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        .check a:hover {background:#1ec575}
        
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

		<div class="evtCtnsBox evt_top">
			<img src="https://static.willbes.net/public/images/promotion/2021/06/2232_top.jpg" alt="2022 노무패스" />
		</div>

        <div class="evtCtnsBox evt_01">
			<img src="https://static.willbes.net/public/images/promotion/2021/06/2232_01.jpg" alt="합격의 기준" />
            <div class="NSK-Black"><span>GS3순환</span> 온라인 종합반 강좌</div> 
            <div class="wrap">              
                <a href="javascript:go_PassLecture('182858');" title="노무패스 1차">수강신청바로가기</a>
            </div>
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
				<h4 class="NSK-Black">상품 이용안내</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>				
                    <li>본 상품은 2021년 6월 ~ 8월에 진행되는 [공인노무사 2차 GS3순환 강의] 과정입니다.<br>
                        동영상 강의는 실강 진행 후 다음날 동영상 업로드(공휴일/일요일제외) 됩니다.<br>
                    <li>강사배정 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경하실 수 있습니다.<br>
                        강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.<br>
                        ※ 김우탁 노무사님의 노동경제학은 2019년 사전 제작된 강의이며, 특강 3종이 무료로 제공됩니다.</li>
				</ul>
				<div class="infoTit"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품은 2배수 수강제한이 되어있습니다.</li>
                    <li>본 상품의 수강시작일은 30일 범위 내에서 지정하실 수 있습니다.</li>
                    <li>본 상품은 수강기간 조정 및 일시 정지가 불가합니다.</li>
				</ul>
				<div class="infoTit"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의 별 교재는 별도로 주문하셔야 합니다.</li>
				</ul>
				<div class="infoTit"><strong>결제/환불관련</strong></div>
				<ul>
                    <li>본 패키지 강좌의 환불 시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
                    <li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br>
                    ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br>
                    ② 특별 기획 상품 등 할인이 적용된 상품은 해당 상품의 정가를 기준으로 환불하는 것을 원칙으로 합니다.<br>
                    ③ 최종 완강 되지 않은 강좌의 학습 회차 계산은 공지된 예정 강좌 수를 기준으로 환불 금액을 산출합니다.</li>
				</ul>
				<div class="infoTit"><strong>유의사항</strong></div>
				<ul>
					<li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
					<li>본 상품은 PC 식별코드인 MAC ADDRESS 수집에 동의하셔야 구매 및 수강이 가능합니다.</li>
					<li>[MAC ADDRESS 안내]<br>
						본 상품은 MAC 주소 정보 수집에 동의 후 구매할 수 있습니다.<br>
						윌비스는 정당하게 수강하시는 분들의 권리를 보호하기 위하여 MAC주소를 수집하고 있습니다.<br>
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
        /*수강신청 동의*/ 
            function go_PassLecture(code){
                if($("input[name='ischk']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    return;
                }

                var url = '{{ site_url('/userPackage/show/cate/309002/prod-code/') }}' + code;
                location.href = url;
            }    
    </script>


@stop