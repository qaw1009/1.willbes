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
		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/04/2165_top_bg.jpg) no-repeat center top;}	
        .evt_02 {background:#ececec}

        .careful {color:#f72739;padding-bottom:100px;font-size:18px;font-weight:bold;} 
        .evt_02 > div,
        .evt_03 > div {width:1120px; margin:0 auto; position:relative}

		.check {padding-bottom:50px;letter-spacing:3; color:#fff; margin-top:30px}
        .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#6f22c5; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        
		.tabs {border-bottom:2px solid #6f22c5; width:1120px; margin:0 auto 30px}
		.tabs li {display:inline; float:left; width:20%;}
		.tabs li a {display:block; color:#fff; background:#9697a1; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:18px;font-weight:bold;}
		.tabs li a:hover,
		.tabs li a.active {background:#6f22c5;color:#fff;}
		.tabs li:last-child a {margin:0}
        .tabs.three li {display:inline; float:left; width:33.33333%;}
		.tabs:after {content:""; display:block; clear:both}        

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
			<img src="https://static.willbes.net/public/images/promotion/2021/04/2165_top.jpg" alt="2022 감평패스" />
		</div>

        <div class="evtCtnsBox evt_01">
			<img src="https://static.willbes.net/public/images/promotion/2021/04/2165_01.jpg" alt="합격의 기준" />
		</div>

        <div class="evtCtnsBox evt_02">
			<img src="https://static.willbes.net/public/images/promotion/2021/04/2165_02.jpg" alt="수험전략 수립 1차" />
            <ul class="tabs">
				<li><a href="#tab01">민법</a></li>
				<li><a href="#tab02">감정평가관계법규</a></li>
				<li><a href="#tab03">부동산학원론</a></li>
                <li><a href="#tab04">경제학원론</a></li>
                <li><a href="#tab05">회계학</a></li>
			</ul>
			<div id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2165_02_t01.jpg" alt="민법"/>
                <a href="javascript:fnPlayerSample('161390', '1239343', 'HD');" title="" style="position: absolute; left: 78.11%; top: 39.74%; width: 17.69%; height: 7.21%; z-index: 2;"></a>
                <a href="javascript:alert('준비중입니다.');" title="" style="position: absolute; left: 78.02%; top: 89.9%; width: 17.69%; height: 7.21%; z-index: 2;"></a>
			</div>
			<div id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2165_02_t02.jpg" alt="감정평가관계법규"/>
                <a href="javascript:fnPlayerSample('161410', '1240103', 'HD');" title="" style="position: absolute; left: 78.02%; top: 79.47%; width: 17.69%; height: 14.9%; z-index: 2;"></a>               
			</div>
			<div id="tab03">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2165_02_t03.jpg" alt="부동산학원론"/>
                <a href="javascript:fnPlayerSample('161415', '1238926', 'HD');" title="" style="position: absolute; left: 78.02%; top: 81.37%; width: 17.69%; height: 13.98%; z-index: 2;"></a>            
			</div>
            <div id="tab04">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2165_02_t04.jpg" alt="경제학원론"/>
                <a href="javascript:alert('준비중입니다.');" title="" style="position: absolute; left: 77.84%; top: 79.11%; width: 17.69%; height: 13.98%; z-index: 2;"></a>                
			</div>
            <div id="tab05">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2165_02_t05.jpg" alt="회계학"/>
                <a href="javascript:fnPlayerSample('180699', '1284894', 'HD');" title="" style="position: absolute; left: 77.84%; top: 79.11%; width: 17.69%; height: 13.98%; z-index: 2;"></a>               
			</div>

            <img src="https://static.willbes.net/public/images/promotion/2021/04/2165_02_01.jpg" alt="수험전략 수립 2차" />

            <ul class="tabs three">
				<li><a href="#tab06">감정평가실무</a></li>
				<li><a href="#tab07">감정평가이론</a></li>
				<li><a href="#tab08">감평행정법 및 보상법규</a></li>
			</ul>
            <div id="tab06">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2165_02_t06.jpg" alt="감정평가실무"/>
                <a href="javascript:fnPlayerSample('161446', '1228538', 'HD');" title="" style="position: absolute; left: 77.84%; top: 79.11%; width: 17.69%; height: 13.98%; z-index: 2;"></a>                
			</div>
            <div id="tab07">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2165_02_t07.jpg" alt="감정평가이론"/>
                <a href="javascript:fnPlayerSample('159575', '1206886', 'HD');" title="" style="position: absolute; left: 77.84%; top: 79.11%; width: 17.69%; height: 13.98%; z-index: 2;"></a>               
			</div>
            <div id="tab08">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2165_02_t08.jpg" alt="감정행정법 및 보상법규"/>
                <a href="javascript:fnPlayerSample('165632', '1237919', 'HD');" title="" style="position: absolute; left: 77.84%; top: 79.11%; width: 17.69%; height: 13.98%; z-index: 2;"></a>              
			</div>            
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2165_02_02.jpg" alt="2차 과정별 커리큘럼" />
		</div>

        <div class="evtCtnsBox evt_03">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2165_03.jpg" alt="감평패스 신청하기" />
                <a href="javascript:go_PassLecture('181405');" title="감평패스1차" style="position: absolute; left: 0%; top: 87.27%; width: 23.75%; height: 8.92%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('181410');" title="감평패스2차" style="position: absolute; left: 25.27%; top: 87.27%; width: 23.75%; height: 8.92%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('181411');" title="감평패스 동차 베이직" style="position: absolute; left: 50.8%; top: 87.27%; width: 23.75%; height: 8.92%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('181413');" title="감평패스 동차 프리미엄" style="position: absolute; left: 76.25%; top: 87.27%; width: 23.75%; height: 8.92%; z-index: 2;"></a>                
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
                    <li>1차 상품구성은 2021년 6월부터 2022년 3월까지 진행될 2022년 대비 감정평가사 1차 대비 강좌로 구성됩니다.</li>
                    <li>2차 상품구성은 2021년 5월부터 2022년 5월까지 진행될 2022년 대비 감정평가사 2차 대비 강좌로 구성됩니다.<br>
                    ∙ 이론강의 – 2021년 5월 ~ 2021년 9월<br>
                    ∙ GS0~4기 스터디 - 2021년 8월 ~ 2022년 6월<br>
                    ∙ 문제풀이(단과) - 2021년 8월 ~ 2021년 12월<br>
                    동영상 강의는 실강 진행 후 다음날 동영상 업로드(공휴일/주말 제외) 됩니다.</li>
                    <li>강사 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경될 수 있습니다.<br>
                    강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.</li>
				</ul>
				<div class="infoTit"><strong>수강관련</strong></div>
				<ul>
					<li>본 패스 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 패스 상품 강의의 경우 배수 제한 없이 무제한 수강이 가능합니다.</li>
                    <li>본 패스 상품 수강기간은 각 패스 상품별로 상이하오니 꼭 확인하시기 바랍니다.</li>
                    <li>본 패스 상품은 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.</li>
				</ul>
				<div class="infoTit"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
					<li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit"><strong>결제/환불관련</strong></div>
				<ul>
                    <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
					<li>본 패키지 강좌의 환불시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
					<li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br/>
						① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br/>
                        ② 고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 패스상품 정가 기준으로 계산하여 사용일수만큼 차감 후 환불 됩니다.<br/>
                        ③ 강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.
                    </li>
				</ul>
				<div class="infoTit"><strong>유의사항</strong></div>
				<ul>
					<li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
					<li>본 상품은 PC 식별코드인 MAC ADDRESS 수집에 동의하셔야 구매 및 수강이 가능합니다.</li>
					<li>[MAC ADDRESS 안내]<br>
						본 상품은 MAC 주소 정보 수집에 동의 후 구매할 수 있습니다.<br>
						윌비스는 정당하게 수강하시는 분들의 권리를 보호하기 위하여 MAC주소를 수집하고 있습니다. <br>
						MAC 주소(Media Access Control Address)는 PC마다 존재하는 고유 식별 번호입니다.</li>
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
        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
            
                $content = $($active[0].hash);
            
                $links.not($active).each(function () {
                $(this.hash).hide()});
            
                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();
            
                $active = $(this);
                $content = $(this.hash);
            
                $active.addClass('active');
                $content.show();
            
                e.preventDefault()})})}
        );

        /*수강신청 동의*/ 
            function go_PassLecture(code){
                if($("input[name='ischk']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    return;
                }

                var url = '{{ site_url('/package/show/cate/309003/pack/648001/prod-code/') }}' + code;
                location.href = url;
            }    
    </script>


@stop