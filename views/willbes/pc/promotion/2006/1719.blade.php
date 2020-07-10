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
        
        .evt_top {background:#25D6DC url(https://static.willbes.net/public/images/promotion/2020/07/1719_top_bg.jpg) no-repeat center top;}
        
        .evt_01 {background:#25D6DC}

        .evt_02 {background:#25D6DC}

		.evtCtnsBox .buyLec {width:1120px; margin:0 auto;padding:30px 0 100px;}
		.evtCtnsBox .buyLec a { display:block; text-align:center; font-size:35px;background:#fff; color:#000; padding:20px 0; border-radius:50px;font-weight:bold;border:4px solid #000;}
		.evtCtnsBox .buyLec a:hover {background:#fff; box-shadow: 10px 10px 10px rgba(0,0,0,.2);}

		.evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.7;}
		.evtInfoBox h4 {font-size:25px; margin-bottom:25px;padding-left:10px;}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px;margin-left:20px}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1719_top.jpg" alt="기본이론 종합반"/>
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1719_01.jpg" alt="커리큘럼" />
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1719_02.jpg" alt="정상급 교수진" />
            <div class="buyLec">
                <a href="https://job.willbes.net/package/show/cate/309005/pack/648001/prod-code/168876" target="_blank">수 강 신 청</a>
            </div>
		</div>

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">강의 안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>본 상품은 관세사 1차 관세법개론, 무역영어, 회계학, 내국소비세법 기본강의가 제공됩니다.</li>
                    <li>종합반 수강기간은 200일이며, 3배수 수강 가능합니다.</li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품의 수강시작일은 자동 시작됩니다.</li>
				</ul>
                <div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 패키지 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
                    <li>본 상품 교재는 동영상 강의 신청 시 교재를 확인하시고 선택하신 후 구매하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
                    <li>본 패키지 강좌의 환불시 패키지 구성 일부 과목만의 환불은 불가하며,패키지 전체 환불만 가능합니다.</li>
					<li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br/>  
                    ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br /> 
                    ② 특별 기획 상품 등 할인이 적용된 상품은 해당 상품의 정가를 기준으로 환불하는 것을 원칙으로 합니다.
                    </li>            
				</ul>
				<div class="infoTit NG"><strong>유의사항</strong></div>
				<ul>
					<li>해당 패키지 강의는 일시정지 및 연장 신청이 안 됨을 유의해주십시오.</li>
                    <li>수강신청과 동시에 강의가 시작됩니다.</li>     
                    <li>
                        [MAC ADDRESS 안내]<br>
                        본 이벤트 상품은 MAC 주소 정보 수집에 동의 후 구매할 수 있습니다.<br>
                        윌비스는 정당하게 수강하시는 분들의 권리를 보호하기 위하여 MAC주소를 수집하고 있습니다. <br>
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

    </script>
@stop