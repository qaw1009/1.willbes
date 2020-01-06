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

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2019/12/191205_cons_01_bg.jpg) no-repeat center top;}	
		.evt_01 {background:#cba567;}
        .evt_02 {background:#eecb93;}
        .evt_03 {width:1120px; margin:0 auto; padding-bottom:100px}
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
            <img src="https://static.willbes.net/public/images/promotion/2019/12/191205_cons_01.jpg" alt="5급 헌법 진도별 모의고사+집중관리" />
		</div>

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/191205_cons_02.jpg" alt="김유향 헌법" />
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/191205_cons_03.jpg" alt="선동주 헌법" />
		</div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/191205_cons_04.jpg" alt="완벽한 헌법 PASS" />
            <div class="total">
                <span>[정상가] 0원</span> <span>[할인금액] 0원</span> <strong>[최종금액] 0원</strong> 
            </div>
			<div>
                <table cellspacing="0" cellpadding="0">
                    <colgroup>
                        <col width="10%">
                        <col >
                        <col width="8%">
                        <col width="10%">
                        <col width="10%">
                        <col width="12%">                        
                        <col width="12%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>순환</th>
                            <th>강의명</th>
                            <th>선택</th>
                            <th>강사</th>
                            <th>횟수</th>
                            <th>강의소개</th>
                            <th>동영상수강료</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="2">실전모강</th>
                            <td>5급헌법 진도별모의고사+집중정리</td>
                            <td><input name="mgntno" id="aa1" onclick="javascript:choiceSelectCheck(this, 2);" type="checkbox" value="" /></td>
                            <td>김유향 변호사</td>
                            <td>10회</td>
                            <td><a href="#">강의소개 ▶</a></td>
                            <td>207,000원</td>
                        </tr>
                        <tr>
                            <td>5급헌법 진도별모의고사+집중정리</td>
                            <td><input name="aa" id="aa2" onclick="javascript:choiceSelectCheck(this, 2);" type="checkbox" value="" /></td>
                            <td>선동주 교수</td>
                            <td>10회+ 1회</td>
                            <td><a href="#">강의소개 ▶</a></td>
                            <td>207,000원</td>
                        </tr>
                        <tr>
                            <th rowspan="4">기본강의</th>
                            <td rowspan="2">5급 헌법 기본강의</td>
                            <td rowspan="2"><input name="ab" disabled="disabled" id="ab1" onclick="javascript:priceupdate();" type="checkbox" value="" /></td>
                            <td rowspan="2">김유향 변호사</td>
                            <td rowspan="2">15회</td>
                            <td rowspan="2"><a href="#">강의소개 ▶</a></td>
                            <td rowspan="2">297,000원</td>
                        </tr>
                        <tr></tr>
                        <tr>
                            <td rowspan="2">5급 헌법 기본강의</td>
                            <td rowspan="2"><input name="ab" disabled="disabled" id="ab2" onclick="javascript:priceupdate();" type="checkbox" value="" /></td>
                            <td rowspan="2">선동주 교수</td>
                            <td rowspan="2">15회</td>
                            <td rowspan="2"><a href="#">강의소개 ▶</a></td>
                            <td rowspan="2">297,000원</td>
                        </tr>
                        <tr></tr>
                        <tr>
                            <th rowspan="2">핵심강의</th>
                            <td>5급 헌법 핵심강의</td>
                            <td><input name="ac" disabled="disabled" id="ac1" onclick="javascript:priceupdate();" type="checkbox" value="" /></td>
                            <td>김유향 변호사</td>
                            <td>10회</td>
                            <td><a href="#">강의소개 ▶</a></td>
                            <td>198,000원</td>
                        </tr>
                        <tr>
                            <td>5급 헌법 핵심강의</td>
                            <td><input name="ac" disabled="disabled" id="ac2" onclick="javascript:priceupdate();" type="checkbox" value="" /></td>
                            <td>선동주 교수</td>
                            <td>10회</td>
                            <td><a href="#">강의소개 ▶</a></td>
                            <td>198,000원</td>
                        </tr>
                    </tbody>
                </table>
                <div class="buyLec">
                    <a href="#none">수강신청 ></a>
                </div>
			</div>
        </div>

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>5급헌법 진도별모의고사+집중정리(12/09~12/21) 동영상 강의로 이벤트기간 강의결제시 아래와 같은 혜택을 드립니다.
                        - 이벤트기간 강의 신청시 수강료 10% 할인(교재 별도) + 수강기간 2020. 2. 29(토)까지 이 자동 적용됩니다.</li>
                    <li>모의고사 문제와 해설지는 업로드 되지 않고 종강전까지 주 2~3회씩 택배로 발송되며, 배송일정은 공지사항을 참고 부탁드립니다.</li>
                    <li>5급헌법 실전모강 신청후 기본강의 또는 심화강의 추가신청시 신청하신 추가강의에 대해서 25%할인+ 수강기간 2020. 2. 29(토) 됩니다.</li>
                    <li>모의고사 문제와 해설지는 업로드 되지 않고 종강전까지 주 2~3회씩 택배로 발송됩니다.</li>
                    <li>5급헌법 실전모강 동영상강의는 12/11(수)개강하며 실강 다음날 업로드 예정입니다.(월~토)</li>
                    <li>본 상품은 일시 정지 및 강의 수강 연장이 되지 않습니다.</li>
                    <li>이벤트 기간은 ~12/15(일)까지 입니다.</li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>신청하신 강의는 컴퓨터, 스마트기기(m.willbes.net)를 이용하여 수강할 수 있습니다.</li>
                    <li>동영상 강의는 2배수 수강제한 규정이 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>강의교재는 별도로 주문하셔야 합니다.
                    <li>각 강의별 교재는 동영상 강의 개강 후 [내강의실 바로가기] → [강의보기]를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>환불관련</strong></div>
				<ul>
					<li>본상품은 이벤트 진행강의로 강의환불시 동영상 단가 정가금액과 원수강일수기준으로 수강한 횟차를 제외한 수강하지 않은 강의 횟차에 대해 환불이 진행됩니다. 다만, 원수강일수가 지난 강의는 환불이 되지 않습니다.</li>
                    <li>기타 환불규정은 약관의 규정에 따릅니다.</li>
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