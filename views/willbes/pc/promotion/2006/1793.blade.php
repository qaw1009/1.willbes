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

		.evt_top {background:#326FE4 url(https://static.willbes.net/public/images/promotion/2020/09/1793_top_bg.jpg) no-repeat center top;}	
        .evt_01 {background:#fff;}
        
		.tabs {border-bottom:2px solid #2e3044; width:980px; margin:0 auto 30px}
		.tabs li {display:inline; float:left; width:20%;}
		.tabs.tabs3ea li {display:inline; float:left; width:16.66666%;}
		.tabs li a {display:block; color:#fff; background:#9697a1; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:14px}
		.tabs li a:hover,
		.tabs li a.active {background:#2e3044}
		.tabs li:last-child a {margin:0}
		.tabs:after {content:""; display:block; clear:both}

		.evt_03 {background:#326FE4;}
        .check {width:980px; margin:0 auto;padding-bottom:50px;letter-spacing:3; color:#fff; margin-top:30px}
        .check label {cursor:pointer; font-size:15px;color:#FFF;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#000; background:#fff; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        .check a:hover {background:#76D2DF; color:#272c42}

		.evt_04 {background:#fff; padding:100px 0; width:1120px; margin:0 auto}
		.evt_04 h3 {font-size:30px; color:#2e3044; margin-bottom:30px}
		.evt_04 ul {width:1120px}
		.evt_04 table {border-top:1px solid #edeeef; border-left:1px solid #edeeef; table-layout: auto;}
		.evt_04 table th,
		.evt_04 table td {padding:15px 5px; border-bottom:1px solid #edeeef; border-right:1px solid #edeeef; text-align: center; font-size:14px}
		.evt_04 table th {background: #2e3044; color:#fff; font-weight: bold;}
		.evt_04 table tbody th {background: #9697a1; color:#fff;} 
		.evt_04 .buyLec {margin-top:30px}
		.evt_04 .buyLec a { display:block; text-align:cetner; font-size:30px; font-weight:600; background:#e83e3e; color:#fff; padding:20px 0; border-radius:50px}
		.evt_04 .buyLec a:hover {background:#e83e3e; box-shadow: 10px 10px 10px rgba(0,0,0,.2);}

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
			<img src="https://static.willbes.net/public/images/promotion/2020/09/1793_top.jpg" alt="2021 노무패스" />
		</div>

		<div class="evtCtnsBox evt_01">
			<img src="https://static.willbes.net/public/images/promotion/2020/09/1793_01.jpg" alt="과정별 커리큘럼" />
		</div>

		<div class="evtCtnsBox evt_01s">
			<img src="https://static.willbes.net/public/images/promotion/2020/09/1793_01s.jpg" alt="1차 강의" />
			<ul class="tabs">
				<li><a href="#tab01">민법</a></li>
				<li><a href="#tab02">노동법</a></li>
				<li><a href="#tab03">사회보험법</a></li>
				<li><a href="#tab04">경제학원론</a></li>
				<li><a href="#tab05">경영학개론</a></li>
			</ul>
			<div id="tab01">
				<img src="https://static.willbes.net/public/images/promotion/2020/09/1793_01s_01.jpg" alt="민법" />
			</div>
			<div id="tab02">
				<img src="https://static.willbes.net/public/images/promotion/2020/09/1793_01s_02.jpg" alt="노동법" />
			</div>
			<div id="tab03">
				<img src="https://static.willbes.net/public/images/promotion/2020/09/1793_01s_03.jpg" alt="사회보험법" />
			</div>
			<div id="tab04">
				<img src="https://static.willbes.net/public/images/promotion/2020/09/1793_01s_04.jpg" alt="경제학원론" />
			</div>
			<div id="tab05">
				<img src="https://static.willbes.net/public/images/promotion/2020/09/1793_01s_05.jpg" alt="경영학개론" />
			</div>
			<img src="https://static.willbes.net/public/images/promotion/2020/09/1793_02.jpg" alt="2차 강의" />
			<ul class="tabs tabs3ea">
				<li><a href="#tab06">노동법</a></li>
				<li><a href="#tab07">행정쟁송법</a></li>
				<li><a href="#tab08">인사노무관리</a></li>
                <li><a href="#tab09">경영조직론</a></li>
				<li><a href="#tab10">노동경제학</a></li>
				<li><a href="#tab11">민사소송법</a></li>
			</ul>
			<div id="tab06">
				<img src="https://static.willbes.net/public/images/promotion/2020/09/1793_02_01.jpg" alt="노동법" />
			</div>
			<div id="tab07">
				<img src="https://static.willbes.net/public/images/promotion/2020/09/1793_02_02.jpg" alt="행정쟁송법" />
			</div>
			<div id="tab08">
				<img src="https://static.willbes.net/public/images/promotion/2020/09/1793_02_03.jpg" alt="인사노무관리" />
			</div>
            <div id="tab09">
				<img src="https://static.willbes.net/public/images/promotion/2020/09/1793_02_04.jpg" alt="경영조직론" />
			</div>
			<div id="tab10">
				<img src="https://static.willbes.net/public/images/promotion/2020/09/1793_02_05.jpg" alt="노동경제학" />
			</div>
			<div id="tab11">
				<img src="https://static.willbes.net/public/images/promotion/2020/09/1793_02_06.jpg" alt="민사소송법" />
			</div>
        </div>
        
        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1793_03.jpg" alt="신청하기" usemap="#Map1793_apply" border="0" />
            <map name="Map1793_apply" id="Map1793_apply">
                <area shape="rect" coords="880,617,1054,791" href="javascript:go_PassLecture('163123');" />
                <area shape="rect" coords="881,810,1054,983" href="javascript:go_PassLecture('163124');" />
                <area shape="rect" coords="879,1002,1055,1175" href="javascript:go_PassLecture('171474');" />
                <area shape="rect" coords="880,1194,1053,1367" href="javascript:go_PassLecture('171513');" />
            </map>
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>      
		</div>

		<div class="evtCtnsBox evtInfo NGR" id="careful">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>1차 상품구성은 2021년 1월부터 2021년 5월까지 진행될 2021년 대비 공인노무사 1차 대비 강좌로 구성됩니다.<br>
                        1차 강의가 포함된 상품(1차 노무패스, 동차 노무패스)의 경우 2020년 1차 기본강의가 추가 제공됩니다.
                    </li>
                    <li>2차 GS순환 강의는 순환별로 강의가 개설 된 후 순차적으로 업로드 됩니다.<br>
                        ＊(GS0순환-2020년 9월, GS1순환-2021년 1월, GS2순환-2021년 4월, GS3순환-2021년 6월)<br>
                        ＊동영상 강의는 실강 진행 후 다음날 동영상 업로드 됩니다. <br>
                        ※ 노동경제학을 선택하시는 분들은 2019년 대비 순환별 강의와 특강이 제공됩니다.<br>
                        (2019년대비 GS0순환 ~ GS3순환 + 2019 기초노동경제학특강 + 2019년 교수著 특강 3종 제공)
                    </li>
                    <li>강사 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경될 수 있습니다.<br>
                        강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.                   
                    </li>
                    <li>순환별 강의 중 주말반과 평일반 두 개의 과정이 개설된 경우 한 개의 과정만 제공됩니다.</li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 패스 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
					<li>본 패스 상품 강의의 경우 배수 제한 없이 무제한 수강이 가능합니다.</li>
					<li>본 패스 상품 수강기간은 각 상품의 시험일까지 입니다.</li>
					<li>본 패스 상품은 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
					<li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
                    <li>본 패키지 강좌의 환불시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
					<li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br/>
                        ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br/>
                        ② 특별 기획 상품 등 할인이 적용된 상품은 해당 상품의 정가를 기준으로 환불하는 것을 원칙으로 합니다.<br/>
                        ③ 최종 완강 되지 않은 강좌의 학습 회차 계산은 공지된 예정 강좌수를 기준으로 환불 금액을 산출합니다.
                    </li>
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
					<li>[상담전화] 1544-5006</li>
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

                var url = '{{ site_url('/package/show/cate/309002/pack/648002/prod-code/') }}' + code;
                location.href = url;
            }    
    </script>


@stop