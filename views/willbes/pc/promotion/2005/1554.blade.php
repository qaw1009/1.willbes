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

        .evt_top {background:#006bff url(https://static.willbes.net/public/images/promotion/2020/02/1554_top_bg.jpg) no-repeat center top;}	
		.evt_01 {background:#fff;}
        .evt_02 {background:#eee;}
        .evt_03 {background:#fff;}

        .total {text-align:center; font-size:18px; font-weight:bold; padding:20px 0; border:1px solid #ccc; 
        background:rgba(255,255,255,0.8); margin-bottom:30px}
        .total span {padding:0 10px;}
        .total strong {padding:0 10px; font-size:120%; color:#de3349}
        .fixed {position:fixed; top:0; left:0; width:100%; border:0; border-bottom:1px solid #ccc; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10}/*총합스크롤고정*/
        
        .lecTable { width:1000px; margin:0 auto; padding-bottom:100px}
        .evtCtnsBox table {border-top:1px solid #edeeef; border-left:1px solid #edeeef; table-layout:auto;}
		.evtCtnsBox table th,
		.evtCtnsBox table td {padding:15px 5px; border-bottom:1px solid #edeeef; border-right:1px solid #edeeef; text-align: center; font-size:14px; line-height:1.5}
		.evtCtnsBox table th {background: #2e3044; color:#fff; font-weight: bold;}
		.evtCtnsBox table tbody th {background: #9697a1; color:#fff;} 
        .evtCtnsBox table tbody td:last-child {color:#e83e3e; font-weight:bold}
		.evtCtnsBox .buyLec {margin-top:30px}
		.evtCtnsBox .buyLec a { display:block; text-align:cetner; font-size:30px; font-weight:600; background:#886224; color:#fff; padding:20px 0; border-radius:50px}
		.evtCtnsBox .buyLec a:hover {background:#624310; box-shadow: 10px 10px 10px rgba(0,0,0,.2);}

		.evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:20px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}

        .red{color:red;}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1554_top.jpg" alt="" />
		</div>

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1554_01.jpg" alt="" />
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1554_02.jpg" alt="" />
		</div>    

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1554_03.jpg" alt="" usemap="#Map1554a" border="0" />
            <map name="Map1554a" id="Map1554a">
                <area shape="rect" coords="735,348,1016,456" href="https://gosi.willbes.net/lecture/show/cate/3094/pattern/only/prod-code/162404" target="_blank" />
                <area shape="rect" coords="734,576,1012,688" href="https://gosi.willbes.net/lecture/show/cate/3094/pattern/only/prod-code/162407" target="_blank" />
                <area shape="rect" coords="735,814,1018,931" href="https://gosi.willbes.net/lecture/show/cate/3094/pattern/only/prod-code/162408" target="_blank" />
            </map>
		</div>    

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>
                        1. 본 상품은 5급행정/국립외교원 2차 대비 황종휴 경제학, 재정학, 국제경제학 GS2순환 동영상 강의 특별이벤트입니다.<br>
                        - 수강료 할인 : 이벤트기간 등록된 GS2순환 강의신청시 <span class="red">수강료 40% 특별할인</span><br>
                        - 강의배수 : <span class="red">1.2 배수 적용</span><br>
                        - 이벤트기간 : <span class="red">~ 3/4(수) 24:00 결제시까지</span><br>
                        - 경제학 9개년 기출해설특강 50%할인쿠폰은 강의신청시 발행되며, 유효기간은 2020년 8월 31일까지입니다.<br>
                        - 강의배부자료는 업로드된 자료와 동일하며, 강의신청시 주문하실 수 있습니다.
                    </li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>1. 신청하신 강의는 컴퓨터, 스마트기기(https://willbes.net/m)를 이용하여 수강할 수 있습니다.<br></li>
                    <li>2. 이벤트기간 신청하신 GS2순환 강의는 1.2배수 제한 규정이 적용됩니다.</li>
                    <li>3. 본 상품의 수강시작일은 30일 범위 내에서 지정하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>1. 강의교재는 별도로 주문하셔야 합니다.</li>
                    <li>2. 각 강의별 교재는 동영상 강의개강 후 『내 강의실 바로가기』 → 강의보기를 클릭하셔도 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>환불관련</strong></div>
				<ul>
					<li>1. 본상품은 이벤트 진행강의로 강의환불시 동영상 단가 정가금액과 원수강일수기준으로 수강한 횟차를 제외한 수강하지 않은 강의 횟차에 대해 환불이 진행됩니다.<br>
                        다만, 원수강일수가 지난 강의는 환불이 되지 않습니다.</li>
                    <li>2. 기타 환불규정은 약관의 규정에 따릅니다.</li>
                </ul>
                <div class="infoTit NG"><strong>기타</strong></div>
				<ul>
					<li>1. 본 이벤트는 복지할인 등 다른 쿠폰과 중복 적용되지 않습니다.</li>
                    <li>2. 아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다</li>
				</ul>

			</div>
		</div>
	</div>
    <!-- End Container -->
@stop