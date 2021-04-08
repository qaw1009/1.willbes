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

		.skybanner{position: fixed; top: 280px;right:2px;z-index: 1;}	  

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/04/1544_top_bg.jpg) no-repeat center top;}	

		.evt_01 {background:url(https://static.willbes.net/public/images/promotion/2021/04/1544_01_bg.jpg) no-repeat center top;}
        .evt_01 div {width:1120px; margin:0 auto; position:relative}
        .evt_02 {background:url(https://static.willbes.net/public/images/promotion/2021/04/1544_02_bg.jpg) no-repeat center top;}
        .evt_03 {background:url(https://static.willbes.net/public/images/promotion/2021/04/1544_03_bg.jpg) no-repeat center top;}
        .evt_04 {background:#2a2726}
        
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
            <img src="https://static.willbes.net/public/images/promotion/2021/04/1544_top.jpg" alt="황종휴 경제학" />
		</div>

		<div class="evtCtnsBox evt_01">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/1544_01.jpg" alt="경제학, 어떻게 준비하시겠습니까?" />
                <a href="#evt_04" title="" style="position: absolute; left: 23.13%; top: 66.61%; width: 52.86%; height: 15.14%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/1544_02.jpg" alt="3단계 기본기 완성" />
		</div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/1544_03.jpg" alt="경제학 예비순환" />
        </div>

        <div class="evtCtnsBox evt_04">
            <!--
            @if(empty($__cfg['CateCode']) === false && $__cfg['CateCode'] == '3094')
            <a href="{{ site_url('/lecture/show/cate/' . $__cfg['CateCode'] . '/pattern/only/prod-code/161962') }}" target="_blank">
            @elseif(empty($__cfg['CateCode']) === false && $__cfg['CateCode'] == '3095')
            <a href="{{ site_url('/lecture/show/cate/' . $__cfg['CateCode'] . '/pattern/only/prod-code/161963') }}" target="_blank">
            @else
            <a href="{{ site_url('/package/show/cate/' . $__cfg['CateCode'] . '/pack/648001/prod-code/161969') }}" target="_blank">
            @endif
                <img src="https://static.willbes.net/public/images/promotion/2021/04/1544_04.jpg" alt="특별 이벤트" />
            </a>
            -->
            <img src="https://static.willbes.net/public/images/promotion/2021/04/1544_04.jpg" alt="특별 이벤트" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
        </div>       
        
{{--
		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>2020년 진행된 경제학 예비순환(미시+거시/20년 4월진행) 강의신청시<br>
                    - 수강료 30%할인된 금액인 455,000원으로 자동 결제됩니다.<br>
                    - 무료로 제공되는 교재는 주문하여야 택배발송이 됩니다.<br>
                    - 경제학 11개년 기출해설 특강 및 미시, 거시 교수님 교과서 강제 1회독 특강 동영상 50 할인쿠폰은 강의신청시 자동발급됩니다.(쿠폰 유효기간 2021년 7월 31일까지)</li>
                    <li>해당 강의는 쿠폰 및 다른 이벤트와 중복 적용되지 않습니다.</li>
                    <li>이벤트 기간은 ~ 2021년 2월 28일(일) 24:00까지 입니다.</li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>신청하신 강의는 컴퓨터, 스마트기기(https://willbes.net/m)를 이용하여 수강할 수 있습니다.<br>
                        스마트기기를 이용해 수강시 실시간 재생 또는 다운로드 방식 모두 이용할 수 있습니다.
                    </li>
                    <li>동영상 강의는 강의배수 수강제한 규정이 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>강의는 선택과 집중의 다이제스트 경제학(신/구판모두가능)으로 진행하시며 무료제공 되는 교재도 주문하셔야 합니다.</li>
                    <li>교재는 경제학 예비순환 강의신청 후 『내 강의실 바로가기』 → 강의보기를 클릭하셔도 주문하실 수 있습니다.</li>
                    <li>무료로 제공되는 ~보충+판서 교재(제본)는 주문을 해주셔야 되며, 해당 교재 주문시 별도로 업로드 된 수업자료를 다운받으시거나 출력하실 필요가 없습니다.<br>
                        (업로드된 자료와 100%동일)</li>
				</ul>
				<div class="infoTit NG"><strong>환불관련</strong></div>
				<ul>
					<li>본상품은 이벤트 진행강의로 강의환불시 동영상 단가 정가금액과 원수강일수기준으로 수강한 횟차를 제외한 수강하지 않은 강의 횟차에 대해 환불이 진행됩니다. <br>
                        다만, 원수강일수가 지난 강의는 환불이 되지 않습니다.</li>
                    <li>기타 환불규정은 약관의 규정에 따릅니다.</li>
                </ul>
                <div class="infoTit NG"><strong>기타</strong></div>
				<ul>
					<li>본 이벤트는 복지할인 등 다른 쿠폰과 중복 적용되지 않습니다.</li>
                    <li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
				</ul>
			</div>
		</div>--}}
	</div>
    <!-- End Container -->
@stop