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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/01/191231_value01_bg.jpg) no-repeat center top;}

		.evt_01 {background:#ffd390; padding:100px 0}

        .evt_02 {background:#306350;}
        .evt_03 {width:980px !important; margin:0 auto; padding:100px 0}

        .evt_03 table {border-top:1px solid #edeeef; border-left:1px solid #edeeef; table-layout: auto; width:980px; margin:0 auto; }
		.evt_03 table th,
		.evt_03 table td {padding:15px 5px; border-bottom:1px solid #edeeef; border-right:1px solid #edeeef; text-align: center; font-size:14px; line-height:1.5}
		.evt_03 table th {background: #2e3044; color:#fff; font-weight: bold;}
		.evt_03 table tbody th {background: #9697a1; color:#fff;} 
        .evt_03 table tbody td:last-child {color:#e83e3e; font-weight:bold}
		.evt_03 .buyLec {width:980px; margin:0 auto; margin-top:30px}
		.evt_03 .buyLec a { display:block; text-align:cetner; font-size:30px; font-weight:600; background:#e83e3e; color:#fff; padding:20px 0; border-radius:50px}
        .evt_03 .buyLec a:hover {background:#e83e3e; box-shadow: 10px 10px 10px rgba(0,0,0,.2);}
        
        .total {text-align:center; font-size:18px; font-weight:bold; padding:20px 0; border:1px solid #ccc; 
        background:rgba(255,255,255,0.8); margin-bottom:30px}
        .total span {padding:0 10px;}
        .total strong {padding:0 10px; font-size:120%; color:#de3349}
        .fixed {position:fixed; top:0; left:0; width:100%; border:0; border-bottom:1px solid #ccc; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10}/*총합스크롤고정*/

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
            <img src="https://static.willbes.net/public/images/promotion/2020/01/191231_value01.jpg" alt="감평1차 문제풀이 선택형 종합반" />
		</div>

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/191231_value02.jpg" alt="수강특전" />
            <div class="mt50">
                <a href="https://job.willbes.net/package/show/cate/309003/pack/648001/prod-code/160355"><img src="https://static.willbes.net/public/images/promotion/2020/01/191231_value03.jpg" alt="수강신청" /></a>
            </div>
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/191231_value04.jpg" alt="문제풀이 종합반" />
		</div>

        <div class="evtCtnsBox evt_03">
            <a href="https://job.willbes.net/package/show/cate/309003/pack/648001/prod-code/160355"><img src="https://static.willbes.net/public/images/promotion/2020/01/191231_value05.jpg" alt="수강신청" /></a>
        </div>

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>본 상품은 2019년 11월~ 202년 1월 실강 진행되는 감정평가사 1차 부동산학원론, 회계학(원가, 재무회계), 민법, 경제학, 감정평가관계법규 문제풀이 동영상 강좌가 제공됩니다.</li>
                    <li>이벤트 기간 내 본 상품 결제 시, 수강과목에 따라 10~30% 수강료 할인(교재 제외)을 받으실 수 있으며 + 수강기간 60일 혜택이 적용됩니다.</li>
                    <li>문제풀이 종합반 패키지의 경우 30% 강의 할인이 적용 제공됩니다.</li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품은 2배수 수강제한이 되어있습니다.</li>
                    <li>본 상품의 수강시작일은 30일 범위 내에서 지정하실 수 있고, 수강기간 조정 및 정지가 불가합니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
					<li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
					<li>본 상품은 파격 할인가가 적용된 상품으로 복지할인 등 다른 쿠폰과 중복 적용되지 않습니다. </li>
                    <li>본 상품 환불시 원 수강료와 수강일수 기준으로 환불이 됩니다.</li>
                    <li>기타 환불규정은 약관의 규정에 따릅니다.</li>
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
					<li>[상담전화] 1544-5006 or 070-4006-7129 (자격증 담당자)</li>
					<li>[상담내용] 수강관련 문의</li>
				</ul>
			</div>
		</div>
	</div>
    <!-- End Container -->

	<script type="text/javascript">
        /*합계스크롤고정*/
        $(function() {
            var nav = $('.total');
            var navTop = nav.offset().top+100;
            var navHeight = nav.height()+10;
            var showFlag = false;
            nav.css('top', -navHeight+'px');
            $(window).scroll(function () {
                var winTop = $(this).scrollTop();
                if (winTop >= navTop) {
                    if (showFlag == false) {
                        showFlag = true;
                        nav
                            .addClass('fixed')
                            .stop().animate({'top' : '0px'}, 100);
                    }
                } else if (winTop <= navTop) {
                    if (showFlag) {
                        showFlag = false;
                        nav.stop().animate({'top' : -navHeight+'px'}, 100, function(){
                            nav.removeClass('fixed');
                        });
                    }
                }
            });
        });
    </script>


@stop