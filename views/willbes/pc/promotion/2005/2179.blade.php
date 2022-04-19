@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/        

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/04/2179_top_bg.jpg) no-repeat center top;}	
        .evtCtnsBox .title {text-align:left; color:#464646; font-size:40px; margin:100px 0 50px}

        .evt_01 {background:#e9e9e9}	
        
        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:14px; margin-top:100px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:30px; margin-bottom:40px}
		.evtInfoBox .infoTit {font-size:18px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#000; border-radius:20px; font-weight:normal !important}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}
        .evtInfoBox span {vertical-align:bottom; color:#fd9999}  
 
        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2179_top.jpg" alt="PSAT 동영산 티패스" />
		</div>

        <div class="evtCtnsBox evt_01">  
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2179_01.jpg" alt="단계별 학습 프로그램" />
        </div>        

        <div class="evtCtnsBox evt_02">  
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2179_02.jpg" alt="티패스" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">윌비스 한림법학원 PSAT T-PASS반 이용안내</h4>
                <div class="infoTit"><strong>이용안내</strong></div>
                <ul>
                    <li>본 상품은 2022년 4월에서 2023년 2월까지 진행이 되는 PSAT 동영상 강의입니다.</li>
                    <li>이벤트 내용<br>
                    [PASS 상품 및 해당과정 수강기간] <br>
                    - PSAT 기초입문+기본강의+심화강의+핵심강의+실전모강 전과정 PASS반, 수강기간 2023년 1차시험일까지<br>
                    - PSAT 기초입문+심화강의+실전모강 PASS반, 수강기간 2023년 1차시험일까지<br>
                    - PSAT 기본강의+심화강의+실전모강 PASS반, 수강기간 2023년 1차시험일까지 <br>
                    - PSAT 기초입문+기본강의+심화강의 PASS반, 수강기간 신청일로부터 240일 <br>
                    <br>
                    [할인율 및 신청방법 : 등록된 PASS 상품 중에서 자유선택] <br>
                    - 1개 PASS 과정 신청 : 15%할인 - 2개이상 PASS 과정 신청 : 추가 10%할인<br>
                    <br>
                    [수강기간-과정별 수강기간 자동 적용]<br>
                    강의신청시 다음날부터 바로 수강시작이 되며 각 PASS상품별 수강기간이 적용됩니다.(일시정지, 강의연장 불가)<br>
                    <br></li>
                    <li>강의배수 제한 : 동영상강의는 강의배수제한 규정이 적용됩니다.</li>
                    <li>강의진행 월 또는 회차는 학원 사정 등에 따라 변동될 수 있습니다.</li>
                    <li>이벤트는 <span>4월 24일 (일) 24:00</span>까지 신청하실 수 있으며, 사정에 의해서 사전공지없이 종료 또는 변경될 수 있습니다</li>
                </ul>
                <div class="infoTit"><strong>교재</strong></div>
                <ul>
                    <li>각 강의수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                </ul>
                <div class="infoTit"><strong>환불</strong></div>
                <ul>
                    <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.(일부강의만의 환불은 불가합니다.)</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, PSAT 온라인 T-PASS반 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.</li>
                </ul>  
                <div class="infoTit"><strong>PASS 수강</strong></div>
                <ul>
                    <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                    <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>PSAT 온라인 T-PASS반은 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                    <li>PSAT 온라인 T-PASS반 수강 시 이용 가능한 <span>기기 대수는 다음과 같이 제한됩니다.</span><br>
                    <span>[ 총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 ]</span> </li>
                    <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 내용확인 후 진행이 가능하오니 고객센터로 문의 부탁드립니다.(수강기간동안 3회 신청가능) </li>
                    <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용될 수 있습니다.</li>
                </ul>               
                <div class="infoTit"><strong>유의사항</strong></div>
                <ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                    <li>PSAT 온라인 T-PASS반 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PSAT 온라인 T-PASS반은 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                </ul>               
            </div>
        </div>
        
	</div>
     <!-- End Container -->

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop