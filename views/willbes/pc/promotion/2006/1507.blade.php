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

		.evt_top {background:#9d003b url(https://static.willbes.net/public/images/promotion/2020/03/1507_top_bg.jpg) no-repeat center top;}	
		.evt_01 {background:#fff;}

        .evt_02 {background:#fed200;}
        .evt_03 {width:1120px; margin:0 auto; padding:100px 0}
        .total {text-align:center; font-size:18px; font-weight:bold; padding:20px 0; border:1px solid #ccc; 
        background:rgba(255,255,255,0.8); margin-bottom:30px}
        .total span {padding:0 10px;}
        .total strong {padding:0 10px; font-size:120%; color:#de3349}
        .fixed {position:fixed; top:0; left:0; width:100%; border:0; border-bottom:1px solid #ccc; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10}/*총합스크롤고정*/

        .evtCtnsBox table {border-top:1px solid #edeeef; border-left:1px solid #edeeef; table-layout: auto;}
		.evtCtnsBox table th,
		.evtCtnsBox table td {padding:15px 5px; border-bottom:1px solid #edeeef; border-right:1px solid #edeeef; text-align: center; font-size:14px; line-height:1.5}
		.evtCtnsBox table th {background: #2e3044; color:#fff; font-weight: bold;}
		.evtCtnsBox table tbody th {background: #9697a1; color:#fff;} 
        .evtCtnsBox table tbody td:last-child {color:#e83e3e; font-weight:bold}
		.evtCtnsBox .buyLec {margin-top:30px}
		.evtCtnsBox .buyLec a { display:block; text-align:cetner; font-size:30px; font-weight:600; background:#9d003b; color:#fff; padding:20px 0; border-radius:50px}
		.evtCtnsBox .buyLec a:hover {background:#e83e3e; box-shadow: 10px 10px 10px rgba(0,0,0,.2);}

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
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1507_top.jpg" alt="감평 2차 기본강의" />
		</div>

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1507_01.jpg" alt="이론 스텝" />
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1507_02.jpg" alt="수강 특전" />
		</div>

        <div class="evtCtnsBox evt_03">
            {{--
            <div class="total">
                <span>[정상가] 0원</span> <span>[할인금액] 0원</span> <strong>[최종금액] 0원</strong> 
            </div>
			<div>
                <table cellspacing="0" cellpadding="0">
                    <colgroup>
                        <col width="5%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="15%">
                        <col >
                        <col width="10%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>선택</th>
                            <th>과목</th>
                            <th>강사</th>
                            <th>횟수</th>
                            <th>실강기간</th>
                            <th>교재</th>
                            <th>수강료</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input name="mgntno" id="aa1" onclick="javascript:choiceSelectCheck(this, 1);" type="checkbox" value="" /></td>
                            <td>감정평가실무<br />
                            [일반평가]</td>
                            <td>여지훈 평가사</td>
                            <td>14회</td>
                            <td>3/11(월)~4/24(수)</td>
                            <td>PASS 감정평가실무 이론편(여지훈 저)</td>
                            <td>227,000원</td>
                        </tr>
                        <tr>
                            <td><input name="ab" id="ab1" onclick="javascript:choiceSelectCheck(this, 1);" type="checkbox" value="" /></td>
                            <td>감정평가실무<br />
                            [보상평가]</td>
                            <td>여지훈 평가사</td>
                            <td>10회</td>
                            <td>5/13(월)~6/12(수)</td>
                            <td>PASS 감정평가실무 이론편(여지훈 저)</td>
                            <td>162,000원</td>
                        </tr>
                        <tr>
                            <td><input name="ac" id="ac1" onclick="javascript:choiceSelectCheck(this, 1);" type="checkbox" value="" /></td>
                            <td>감정평가이론<br />
                            [기본이론]</td>
                            <td>최동진 평가사</td>
                            <td>7+1회(무료)</td>
                            <td>3/10(일)~4/28(일)</td>
                            <td>주교재:감정평가이론 단권화 핵심정리<br />
                            (최동진 著)<br />
                            부교재:부동산학원론(서광채,이용훈 저)<br />
                            + 실무기준 해설서</td>
                            <td>114,000원</td>
                        </tr>
                        <tr>
                            <td><input name="ad" id="ad1" onclick="javascript:choiceSelectCheck(this, 1);" type="checkbox" value="" /></td>
                            <td>감정평가이론<br />
                            [심화이론]</td>
                            <td>최동진 평가사</td>
                            <td>7+1회(무료)</td>
                            <td>5/5(일)~6/23(일)</td>
                            <td>주교재:감정평가이론 단권화 핵심정리<br />
                            (최동진 著)<br />
                            부교재:부동산학원론(서광채,이용훈 저)<br />
                            + 실무기준 해설서</td>
                            <td>114,000원</td>
                        </tr>
                        <tr>
                            <td><input name="ae" id="ae1" onclick="javascript:choiceSelectCheck(this, 2);" type="checkbox" value="" /></td>
                            <td rowspan="2">감평행정법</td>
                            <td>조  현 교수</td>
                            <td>18회</td>
                            <td>3/11(월)~4/18(금)</td>
                            <td>Feel 감평행정법 3판(조현 著)</td>
                            <td>292,000원</td>
                        </tr>
                        <tr>
                            <td><input name="ae" id="ae2" onclick="javascript:choiceSelectCheck(this, 2);" type="checkbox" value="" /></td>
                            <td>김기홍 교수</td>
                            <td>18회</td>
                            <td>5/1(수)~5/24(금)</td>
                            <td>2019 핵심정리 행정법(김기홍 저)</td>
                            <td>292,000원</td>
                        </tr>
                        <tr>
                            <td><input name="af" id="af1" onclick="javascript:choiceSelectCheck(this, 2);" type="checkbox" value="" /></td>
                            <td rowspan="2">감정평가 <br />
                            보상법규</td>
                            <td>조  현 교수</td>
                            <td>14회</td>
                            <td>5/13(월)~6/12(수)</td>
                            <td>Feel 감정평가 및 보상법규 전정2판 (조현 著)</td>
                            <td>227,000원</td>
                        </tr>
                        <tr>
                            <td><input name="af" id="af2" onclick="javascript:choiceSelectCheck(this, 2);" type="checkbox" value="" /></td>
                            <td>김기홍 교수</td>
                            <td>12회</td>
                            <td>7/17(수)~8/1(목)</td>
                            <td>2019 쟁점정리 감정평가 및 보상법규 (자료)</td>
                            <td>195,000원</td>
                        </tr>
                    </tbody>
                </table>                
			</div>
            --}}
            <div class="buyLec">
                <a href="https://job.willbes.net/userPackage/show/cate/309003/prod-code/162741" target="_blank">수강신청 ></a>
            </div>
        </div>

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>본 상품은 2020년 3월 ~ 6월까지 진행되는 감정평가사 2차 감정평가실무, 감정평가이론, 감평 행정법 및 보상법규 기본강의가 제공됩니다.</li>
                    <li>이벤트 기간 내 본 상품 결제 시, 수강료 10~30% 할인 혜택이 적용됩니다.</li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품은 2배수 수강제한이 되어있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
					<li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
					<li>본 상품은 파격 할인가가 적용된 상품으로 복지할인 등 다른 쿠폰과 중복 적용되지 않습니다. 
                    <li>본 상품은 할인 기획 이벤트 상품인 관계로 강의 환불시 할인되기전 정가 금액 기준으로 강의 본 회차를 제외한 수강하지 않은 잔여 회차에 대해 환불이 된다.<br>
                    (단 원 단과강의 수강 기간이 지난 강의는 환불이 되지 않는다.)
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
					<li>상담전화] 1544-5006</li>
					<li>[상담내용] 강의 및 패키지 상품 안내</li>
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