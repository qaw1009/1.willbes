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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/12/1987_top_bg.jpg) no-repeat center top;}	

        .evt_03 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1987_03_bg.jpg) no-repeat center top;}	
        
        .evt_04 {background:#fff}
        .evt_04 .title {width:1120px; font-size:25px;  margin:0 auto 20px; text-align:left; color:#0342AB}
        .evt_04 .evt04_box {width:1120px; padding:20px 0; margin:0 auto 50px; background:#fff;} 	

        .evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:20px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}
        .evtInfoBox span {color:#ff6d6d;vertical-align:bottom}        
    
        /************************************************************/      
    </style> 

	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1987_top.jpg" alt="" />
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1987_01.jpg" alt="" />
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1987_02.jpg" alt="" />
		</div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1987_03.jpg" alt="" />
		</div>

		<div class="evtCtnsBox evt_04">
            <div class="title NSK-Black" style="padding-top:50px;">[PSAT] 단과 특강</div>
            <div class="evt04_box">                
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif  
            <div class="title NSK-Black" style="padding:75px 0 25px;">[PSAT] 사용자패키지</div>    
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                @endif                    
            </div>
		</div>

        <div class="evtCtnsBox evtInfo mt100" id="notice">
            <div class="evtInfoBox">
                <h4 class="NGEB">PSAT 기출해설 특강 이벤트 안내</h4>
                <div class="infoTit NG"><strong>이용안내</strong></div>
                <ul>
                    <li>본 상품은 2021년 12월 31일(목)까지 진행되는 이벤트 상품입니다. </li>
                    <li>이벤트 내용</li>
                    <li><span>단과강의 자유선택 : 수강료 30%할인</span>(수강시작일 30일 범위내 자유선택)</li>
                    <li><span>사용자패키지를 통한 3과목 이상 자유선택 : 수강료 50%할인 + 수강기간 2021년 3월 6일까지</span> 제공</li>
                </ul>
                <div class="infoTit NG"><strong>교재</strong></div>
                <ul>
                    <li>각 강의수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                </ul>
                <div class="infoTit NG"><strong>강의수강</strong></div>
                <ul>
                    <li>강의배수 제한 : 강의는 2배수 제한 규정이 적용됩니다.</li>
                    <li>사용자패키지를 통한 3강좌 이상 수강시 2021년 3월 6일까지 수강하실 수 있습니다.(일시정지, 강의연장 불가)</li>
                </ul>
                <div class="infoTit NG"><strong>환불</strong></div>
                <ul>
                    <li>결제일로부터 7일 이내 전액 환불 가능합니다. 단, 맛보기 강좌를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                    <li>강의 자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                    <li>본 상품은 특별 기획 강좌로 환불 시에는 수강하신 상품의 정가를 기준으로 이용기간을 공제하고 환불됩니다.<br>
                        (환불시 무료로 제공된 기본서는 반납 또는 교재비 차감 후 환불됩니다.)                
                    </li>
                    <li>사용자패키지를 통한 3과목 이상 수강시 일부과목만의 환불은 불가합니다.</li>
                    <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>
                </ul>
                <div class="infoTit NG"><strong>유의사항</strong></div>
                <ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                </ul>
                <div class="infoTit NG"><strong>※ 이용 문의 : 윌비스 고객만족센터 1566-4770</strong></div>
            </div>
        </div>

	</div>
    <!-- End Container -->
@stop