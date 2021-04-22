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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

		/************************************************************/ 
		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/04/2187_top_bg.jpg) no-repeat center top;}	
        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2021/04/2187_01_bg.jpg) no-repeat center top;}
        .evt_02 {background:#f0f1ef; padding-bottom:50px}
        .evt_02 > div {width:1120px; margin:0 auto; position:relative}
        
        .check {letter-spacing:3; color:#fff; margin-top:30px}
        .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#000; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}

		.evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:20px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}

        /************************************************************/      
    </style> 
	<div class="evtContent NSK">

		<div class="evtCtnsBox evt_top">
			<img src="https://static.willbes.net/public/images/promotion/2021/04/2187_top.jpg" alt="2022 감평패스" />
		</div>

        <div class="evtCtnsBox evt_01">
			<img src="https://static.willbes.net/public/images/promotion/2021/04/2187_01.jpg" alt="합격의 기준" />
		</div>

        <div class="evtCtnsBox evt_02">
            <div>
			    <img src="https://static.willbes.net/public/images/promotion/2021/04/2187_02.jpg" alt="합격의 기준" />
                <a href="https://job.willbes.net/pass/offPackage/index" title="학원참석 모의고사" target="_blank" style="position: absolute; left: 0.18%; top: 42.43%; width: 30.71%; height: 48.85%; z-index: 2;"></a>
                <a href="https://job.willbes.net/book/index/cate/309002" title="모의고사 문제지주문" target="_blank" style="position: absolute; left: 34.29%; top: 42.43%; width: 30.71%; height: 48.85%; z-index: 2;"></a>
                <a href="https://job.willbes.net/pass/mockTestNew/apply/cate" title="온라인 모의고사" target="_blank" style="position: absolute; left: 69.29%; top: 42.43%; width: 30.71%; height: 48.85%; z-index: 2;"></a>
            </div>
            <div class="check mb100">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>
		</div>        

		<div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">상품 이용안내</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>				
                    <li>1차 실전모의고사 상품구성은 학원참석 모의고사, 모의고사 문제지수령, 온라인 모의고사로 구성됩니다.
                    <li>1차 실전모의고사 신청 시 A/B형의 강사진을 확인 후 신청하시기 바랍니다.<br>
                        A형 : 노동법(김광훈), 민법(황보수정), 사회보험법, 경영학<br>
                        B형 : 노동법(이수진), 민법(김춘환), 사회보험법, 경영학</li>
				</ul>

				<div class="infoTit"><strong>모의고사관련</strong></div>
				<ul>
					<li>학원참석 모의고사의 경우 시간을 엄수해주시기 바랍니다.(4/30(금) 9시까지 입실완료)</li>
                    <li>모의고사 문제지주문(교재) 선택 시 4월 26일(월)부터 순차 배송됩니다.</li>
                    <li>온라인 모의고사는 4월 30일(금) 09:30분부터 응시가 가능합니다.</li>
				</ul>

				<div class="infoTit"><strong>결제/환불관련</strong></div>
				<ul>
					<li>본 모의고사는 환불시 구성 일부 과목만의 환불은 불가하며, 모의고사 전체 환불만 가능합니다.</li>
                    <li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br>
                    ① 모의고사 실시 버튼을 클릭하거나 모의고사 문제를 다운로드 한 경우 환불이 불가합니다.</li>
				</ul>

				<div class="infoTit"><strong>상담 및 문의</strong></div>
				<ul>
					<li>[상담시간] 평일 오전 10시 ~ 오후 5시</li>
					<li>[상담전화] 1566-4770</li>
                    <li>[상담내용] 강의 및 패키지 상품 안내</li>
				</ul>
			</div>
		</div>
	</div>
    <!-- End Container -->

    <script type="text/javascript">
        /*수강신청 동의*/ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/package/show/cate/309003/pack/648002/prod-code/') }}' + code;
            location.href = url;
        }    
    </script>
@stop