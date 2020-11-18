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
            background:#F7F7F7;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

		/************************************************************/ 

		.skybanner{position: fixed; top: 280px;right:2px;z-index: 1;}	  

		.evt_top {background:#FF3F76 url(https://static.willbes.net/public/images/promotion/2020/09/1843_top_bg.jpg) no-repeat center top;}	
        .evt_tops {background:#fff;}
        .evt_01,.evt_02,.evt_03 {background:#F7F7F7;}
        .evt_agree {background:#F7F7F7;}
        
		.tabs {border-bottom:2px solid #fa3a71; width:980px; margin:0 auto 30px}
		.tabs li {display:inline; float:left; width:33.3333%;}
		.tabs li a {display:block; color:#fff; background:#9697a1; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:14px}
		.tabs li a:hover,
		.tabs li a.active {background:#fa3a71}
		.tabs li:last-child a {margin:0}
        .tabs:after {content:""; display:block; clear:both}
        
        .check {width:980px; margin:0 auto;padding-bottom:50px;letter-spacing:3; color:#fff; margin-top:30px}
        .check label {cursor:pointer; font-size:16px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#fa3a71; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}

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
			<img src="https://static.willbes.net/public/images/promotion/2020/09/1843_top.jpg" alt="" />
		</div>

		<div class="evtCtnsBox evt_tops">
			<img src="https://static.willbes.net/public/images/promotion/2020/09/1843_tops.jpg" alt="" />
        </div>
        
        <div class="evtCtnsBox evt_01">
			<img src="https://static.willbes.net/public/images/promotion/2020/09/1843_01.jpg" alt="" />
        </div>
        
        <div class="evtCtnsBox evt_02">
			<img src="https://static.willbes.net/public/images/promotion/2020/09/1843_02.jpg" alt="" />
		</div>

		<div class="evtCtnsBox evt_03">
			<img src="https://static.willbes.net/public/images/promotion/2020/09/1843_03.jpg" alt="" />
			<ul class="tabs">
				<li><a href="#tab01">감정평가실무</a></li>
				<li><a href="#tab02">감정평가이론</a></li>
				<li><a href="#tab03">감정평가 및 보상법규</a></li>
			</ul>
			<div id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1843_03_01.jpg" alt="감정평가실무" usemap="#Map1843a" border="0" />
                <map name="Map1843a" id="Map1843a">
                    <area shape="rect" coords="867,529,966,566" href="javascript:go_PassLecture('172507');" />
                    <area shape="rect" coords="866,579,966,617" href="javascript:go_PassLecture('172508');" />
                    <area shape="rect" coords="866,629,965,666" href="javascript:go_PassLecture('172515');" />
                    <area shape="rect" coords="867,679,965,716" href="javascript:go_PassLecture('172516');" />
                    <area shape="rect" coords="866,729,966,767" href="javascript:go_PassLecture('172521');" />
                </map>
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1843_03_01s.jpg" usemap="#Map1843aa" border="0"/>
                <map name="Map1843aa" id="Map1843aa">
                    <area shape="rect" coords="865,528,966,566" href="javascript:go_PassLecture('175054');" />
                </map>
			</div>
			<div id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1843_03_02.jpg" alt="감정평가이론" usemap="#Map1843b" border="0" />
                <map name="Map1843b" id="Map1843b">
                    <area shape="rect" coords="867,528,966,566" href="javascript:go_PassLecture('172522');" />
                    <area shape="rect" coords="867,578,965,617" href="javascript:go_PassLecture('172523');" />
                    <area shape="rect" coords="867,629,966,666" href="javascript:go_PassLecture('172524');" />
                    <area shape="rect" coords="867,679,966,717" href="javascript:go_PassLecture('172525');" />
                    <area shape="rect" coords="867,728,966,767" href="javascript:go_PassLecture('172526');" />
                </map>
			</div>
			<div id="tab03">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1843_03_03.jpg" alt="감정평가 및 보상법규" usemap="#Map1843c" border="0" />
                <map name="Map1843c" id="Map1843c">
                    <area shape="rect" coords="867,528,966,567" href="javascript:go_PassLecture('172527');" />
                    <area shape="rect" coords="867,579,965,616" href="javascript:go_PassLecture('172529');" />
                    <area shape="rect" coords="867,629,966,667" href="javascript:go_PassLecture('172530');" />
                    <area shape="rect" coords="867,678,966,717" href="javascript:go_PassLecture('172531');" />
                    <area shape="rect" coords="867,729,965,767" href="javascript:go_PassLecture('172532');" />
                    <area shape="rect" coords="867,1350,965,1388" href="javascript:go_PassLecture('172533');" />
                    <area shape="rect" coords="867,1400,965,1439" href="javascript:go_PassLecture('172534');" />
                    <area shape="rect" coords="867,1450,965,1489" href="javascript:go_PassLecture('172539');" />
                    <area shape="rect" coords="867,1501,965,1538" href="javascript:go_PassLecture('172540');" />
                    <area shape="rect" coords="867,1550,965,1589" href="javascript:go_PassLecture('172541');" />
                    <area shape="rect" coords="867,2173,965,2210" href="javascript:go_PassLecture('172558');" />
                    <area shape="rect" coords="866,2223,966,2261" href="javascript:go_PassLecture('172564');" />
                    <area shape="rect" coords="867,2273,966,2310" href="javascript:go_PassLecture('172568');" />
                    <area shape="rect" coords="866,2900,965,2937" href="javascript:go_PassLecture('172569');" />
                    <area shape="rect" coords="867,2949,965,2988" href="javascript:go_PassLecture('172570');" />
                    <area shape="rect" coords="867,2999,966,3038" href="javascript:go_PassLecture('172571');" />
                    <area shape="rect" coords="866,3049,966,3088" href="javascript:go_PassLecture('172572');" />
                    <area shape="rect" coords="866,3100,965,3137" href="javascript:go_PassLecture('172574');" />
                </map>
			</div>
        </div>
        
        <div class="evtCtnsBox evt_agree">
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
					<li>본 감정평가사 2차 SUCCESS T-PASS 상품은 2016년 10월부터 2021년 7월까지 진행될 과목 교수님별 기본강의, 문제풀이, GS스터디 강좌로 구성됩니다.<br>
                        ※ 김선희 평가사 기본강의의 경우 일부 교재가 품절상태이므로 강의 수강 시 이점 참조하시기 바랍니다.<br>
                    </li>
                    <li>본 상품은 수강신청 시 수강료(교재 제외) 10~20% 할인 혜택이 적용됩니다.</li>
                    <li>강사배정 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경될 수 있습니다.<br>
                        강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.                   
                    </li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
					<li>본 상품은 2배수 수강제한이 되어있습니다.</li>
					<li>본 상품 수강기간은 다음과 같습니다.<br>
                        기본이론+문제풀이+스터디 패키지 : 2021년 2차 시험일까지 [2021.06.26_예정]<br>
                        기본이론+문제풀이 패키지 : 200일<br>
                        스터디 패키지 : 2021년 2차 시험일까지 [2021.06.26_예정]<br>
                        문제풀이 패키지 : 150일<br>
                        기본이론 패키지 : 150일
                    </li>
					<li>본 상품은 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.<br>
                        ※ 기본이론+문제풀이+스터디 패키지 및 스터디 패키지의 경우 2차 시험일이 예정일보다 늦어지면 자동으로 수강연장 처리됩니다.
                    </li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
					<li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
                    <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
					<li>본 패키지 강좌의 환불시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
					<li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br/>
						① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br/>
                        ② 고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 패스상품 정가 기준으로 계산하여 사용일수만큼 차감 후 환불 됩니다.<br/>
                        ③ 강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.
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