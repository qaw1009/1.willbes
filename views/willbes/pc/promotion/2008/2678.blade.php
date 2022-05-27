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
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/05/2678_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:#aec8d7}     

        .evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:15px;}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.75;}
		.evtInfoBox h4 {font-size:25px; margin-bottom:25px;padding-left:10px;}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; margin-left:20px; list-style:none;}
        .pl {padding-left:18px;}

        /************************************************************/

    </style>

	<div class="evtContent NGR">

		<div class="evtCtnsBox evt_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2678_top.jpg" alt="73기 합격기원"/>
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2678_01.jpg" alt="교수진"/>
        </div>
     
        <div class="evtCtnsBox evt_02 pb50" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2678_02.jpg" alt="혜택받기"/>
                <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2008" title="회원가입" target="_blank" style="position: absolute; left: 0.09%; top: 83.81%; width: 99.98%; height: 12.24%; z-index: 2;"></a>
            </div>   
        </div>

		<div class="evtCtnsBox evtInfo NGR" data-aos="fade-up">
			<div class="evtInfoBox" id="careful">
				<h4 class="NGEB">신규회원가입 이벤트 이용안내</h4>
				<div class="infoTit NG"><strong>쿠폰구성 및 이용기간</strong></div>
				<ul>
                    <li>신규회원가입 이벤트에 참여하시면, 아래 3종의 쿠폰이 자동 발급됩니다.<br><br>
                        1. 패스할인쿠폰<br>
                        <span class="pl">가입 즉시 사용 가능한 온라인 동행PASS 10% 할인쿠폰 제공</span><br>
                        ＊10% 할인쿠폰은 73기 패스 상품에만 적용 가능합니다. <br>
                        ＊패스 할인쿠폰 유효기간은 6/30(목)까지 입니다.<br><br>

                        2. 단과 20% 할인쿠폰<br>
                        <span class="pl">가입 즉시 사용 가능한 동행팀 단과 20% 할인쿠폰 제공</span><br>
                        ＊이론 / 문제풀이 등 단과에 해당하는 모든 강좌 구매 시 사용 가능합니다.<br>
                        ＊단과 할인쿠폰 유효기간은 지급일로부터 1년입니다.<br><br> 

                        3. 73기 실강 종합반 10만원 할인쿠폰<br>
                        <span class="pl">73기 대비 경위공채 시험 대비 종합반 할인쿠폰 제공</span><br>
                        ＊8월 개강하는 73기 대비 실강 종합반 등록 시 사용 가능합니다.<br>
                        ＊타 할인 쿠폰과 중복사용 불가<br>
                        ＊실강 종합반 할인쿠폰 유효기간은 8/31(수)까지 입니다.
                    </li>
				</ul>               
                <div class="infoTit NG"><strong>상담 및 문의</strong></div>
				<ul>
					<li>[상담시간] 평일 오전 10시 ~ 오후 5시</li>
					<li>[상담전화] 1566-4770</li>
				</ul> 
			</div>
		</div> 
	</div>
        
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            AOS.init();
        });      
    </script>
@stop