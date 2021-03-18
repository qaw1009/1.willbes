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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2132_top_bg.jpg) no-repeat center top;}      

        .evt_02 {background:#fce9e6;}     

        .evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.7;}
		.evtInfoBox h4 {font-size:25px; margin-bottom:25px;padding-left:10px;}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; margin-left:20px; list-style:disc}

        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2132_top.jpg" alt="기본강의 특별할인 이벤트"/>           
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2132_01.jpg" alt="과목별 강사진" />            
        </div>  
        
        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2132_02.jpg" alt="수강신청 바로가기" usemap="#Map2132_apply" border="0"/>
            <map name="Map2132_apply" id="Map2132_apply">
                <area shape="rect" coords="1,435,1120,589" href="https://job.willbes.net/lecture/index/cate/309003/pattern/only?search_order=regist&course_idx=1247" target="_blank" />
                <area shape="rect" coords="3,620,1121,772" href="https://job.willbes.net/lecture/index/cate/309003/pattern/only?search_order=regist&course_idx=1251" target="_blank" />
            </map>          
        </div>

		<div class="evtCtnsBox evtInfo">
			<div class="evtInfoBox" id="careful">
				<h4 class="NSK-Black">상품 이용안내</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>
                    <li>본 상품은 2019년 3월부터 2020년 9월까지 진행된 감정평가사 1,2차 기본강의 입니다.</li>
				</ul>
                <div class="infoTit"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품은 2배수 수강제한이 되어있습니다.</li>
                </ul>
                <div class="infoTit"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
                    <li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit"><strong>결제/환불관련</strong></div>
				<ul>
                    <li>회사는 회원의 요구 또는 귀책사유로 인하여 계약이 해지되는 경우에는 수강시작일(당일 포함)부터 해지일까지의 이용일수<br> 
                        또는 이용회차에 해당하는 금액을 공제 후 환불하며 자세한 환불규정은 다음의 각 호의 규정에 따릅니다.
                    </li>
                    <li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br>
                    - 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br>
                    - 학습회차 기준의 온라인 강좌 상품(단강좌, 패키지 상품)를 수강한 경우 환불 기준 :<br>
                    ＊ 결제금액 - (전체 강좌 수 대비 강좌 정상가의 1회 이용대금×이용회수)
                    </li>            
				</ul>
				<div class="infoTit"><strong>유의사항</strong></div>
				<ul>
					<li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
                    <li>본 이벤트 상품은 PC 식별코드인 MAC ADDRESS 수집에 동의하셔야 구매 및 수강이 가능합니다.</li>     
                    <li>
                        [MAC ADDRESS 안내]<br>
                        본 이벤트 상품은 MAC 주소 정보 수집에 동의 후 구매할 수 있습니다.<br>
                        윌비스는 정당하게 수강하시는 분들의 권리를 보호하기 위하여 MAC주소를 수집하고 있습니다. <br>
                        MAC 주소(Media Access Control Address)는 PC마다 존재하는 고유 식별 번호입니다.
                    </li>      
                </ul>            
				<div class="infoTit"><strong>상담 및 문의</strong></div>
				<ul>
					<li>[상담시간] 평일 오전 10시 ~ 오후 5시</li>
					<li>[상담전화] 1544-4770</li>
                    <li>[상담내용] 강의 및 패키지 상품 안내</li>
                </ul>               
			</div>
		</div> 
	</div>
    <!-- End Container -->

    <script type="text/javascript">
       
    </script>
@stop