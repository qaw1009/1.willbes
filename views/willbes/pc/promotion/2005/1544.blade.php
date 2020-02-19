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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/02/1544_top_bg.jpg) no-repeat center top;}	
        .evt_top span {position:absolute; top:790px; width:217px; z-index:10; left:50%;}
        .evt_top span.img01 {margin-left:-390px; animation: sp01 1.5s linear infinite;}
        @@keyframes sp01{
		from{transform:scale(1)}50%{transform:scale(0.9)}to{transform:scale(1)}
        }
        .evt_top span.img02 {margin-left:-105px; animation: sp02 1.5s linear infinite;} 
        @@keyframes sp02{
		from{transform:scale(0.9)}50%{transform:scale(1)}to{transform:scale(0.9)}
        }
        .evt_top span.img03 {margin-left:167px; animation: sp03 1.5s linear infinite;}
        @@keyframes sp03{
		from{transform:scale(1)}50%{transform:scale(0.9)}to{transform:scale(1)}
        }
		.evt_01 {background:url(https://static.willbes.net/public/images/promotion/2020/02/1544_01_bg.jpg) no-repeat center top;}
        .evt_02 {background:url(https://static.willbes.net/public/images/promotion/2020/02/1544_02_bg.jpg) no-repeat center top;}
        .evt_03 {background:url(https://static.willbes.net/public/images/promotion/2020/02/1544_03_bg.jpg) no-repeat center top;}
        .evt_04 {}
        .evt_05 {}
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

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1544_top.jpg" alt="황종휴 경제학" />
            <span class="img01"><img src="https://static.willbes.net/public/images/promotion/2020/02/1544_top_img1.png" alt="혜택1" /></span>
            <span class="img02"><img src="https://static.willbes.net/public/images/promotion/2020/02/1544_top_img2.png" alt="혜택2" /></span>
            <span class="img03"><img src="https://static.willbes.net/public/images/promotion/2020/02/1544_top_img3.png" alt="혜택3" /></span>
		</div>

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1544_01.jpg" alt="경제학, 어떻게 준비하시겠습니까?" usemap="#Map1544" border="0" />
            <map name="Map1544" id="Map1544">
                <area shape="rect" coords="264,796,861,967" href="#evt_04" />
            </map>
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1544_02.jpg" alt="3단계 기본기 완성" />
		</div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1544_03.jpg" alt="경제학 예비순환" />
        </div>

        <div class="evtCtnsBox evt_04" id="evt_04">
        @if(empty($__cfg['CateCode']) === false && $__cfg['CateCode'] == '3094')
            <a href="{{ site_url('/lecture/show/cate/' . $__cfg['CateCode'] . '/pattern/only/prod-code/161962') }}" target="_blank">
        @elseif(empty($__cfg['CateCode']) === false && $__cfg['CateCode'] == '3095')
            <a href="{{ site_url('/lecture/show/cate/' . $__cfg['CateCode'] . '/pattern/only/prod-code/161963') }}" target="_blank">
        @else
            <a href="{{ site_url('/package/show/cate/' . $__cfg['CateCode'] . '/pack/648001/prod-code/161969') }}" target="_blank">
        @endif
                <img src="https://static.willbes.net/public/images/promotion/2020/02/1544_04.jpg" alt="특별 이벤트" />
            </a>
        </div>     

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>
                        2019년 진행된 경제학 예비순환(미시+거시/19년 4월진행) 강의신청시 <br>
                        - 수강료 30%할인된 금액인 445,900원으로 자동 결제됩니다.<br>
                        - 무료로 제공되는 교재는 강의신청시 무료로 주문 가능합니다.<br>
                        - 2019년 최종합격자자 전하는 합격이야기(합격수기 모음집)는 2월 25일 일괄 발송예정입니다.<br>
                        - 경제학 10% 동영상 할인쿠폰은 경제학, 재정학, 국제경제학 강의 신청시 이용하실 수 있으며 강의신청시 자동발급됩니다.(쿠폰 유효기간 2020년 7월 31일까지)
                    </li>
                    <li>이벤트 기간은 ~ 2020년 2월 23일(일) 24:00까지 입니다.</li>
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
				<div class="infoTit NG"><strong>상담 및 문의</strong></div>
				<ul>
					<li>[상담시간] 평일 오전 10시 ~ 오후 5시</li>
					<li>[상담전화] 1544-5006 or 070-4006-7137</li>
					<li>[상담내용] 공부방법론 및 합격을 위한 수험전략 수립</li>
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