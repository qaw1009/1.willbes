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

		.evt_top {background:#CE4A19 url(https://static.willbes.net/public/images/promotion/2020/09/1800_top_bg.jpg) no-repeat center top;}	
        .evt_tops {background:#fff;}
        .evt_01,.evt_02,.evt_03 {background:#F7F7F7;}
        .evt_agree {background:#F7F7F7;}
        
		.tabs {border-bottom:2px solid #D24F1A; width:980px; margin:0 auto 30px}
		.tabs li {display:inline; float:left; width:16.666666%;}
		.tabs li a {display:block; color:#fff; background:#9697a1; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:14px}
		.tabs li a:hover,
		.tabs li a.active {background:#D24F1A}
		.tabs li:last-child a {margin:0}
        .tabs:after {content:""; display:block; clear:both}
        
        .check {width:980px; margin:0 auto;padding-bottom:50px;letter-spacing:3; color:#fff; margin-top:30px}
        .check label {cursor:pointer; font-size:16px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#D24F19; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        .check a:hover {background:#76D2DF; color:#272c42}

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
			<img src="https://static.willbes.net/public/images/promotion/2020/09/1800_top.jpg" alt="" />
		</div>

		<div class="evtCtnsBox evt_tops">
			<img src="https://static.willbes.net/public/images/promotion/2020/09/1800_tops.jpg" alt="" />
        </div>
        
        <div class="evtCtnsBox evt_01">
			<img src="https://static.willbes.net/public/images/promotion/2020/09/1800_01.jpg" alt="" />
        </div>
        
        <div class="evtCtnsBox evt_02">
			<img src="https://static.willbes.net/public/images/promotion/2020/09/1800_02.jpg" alt="" />
		</div>

		<div class="evtCtnsBox evt_03">
			<img src="https://static.willbes.net/public/images/promotion/2020/09/1800_03.jpg" alt="" />
			<ul class="tabs">
				<li><a href="#tab01">노동법</a></li>
				<li><a href="#tab02">행정쟁송</a></li>
				<li><a href="#tab03">인사관리</a></li>
				<li><a href="#tab04">경영조직</a></li>
                <li><a href="#tab05">노동경제</a></li>
                <li><a href="#tab06">민사소송</a></li>
			</ul>
			<div id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1800_03_01.jpg" alt="노동법" usemap="#Map1800_tab01" border="0" />
                <map name="Map1800_tab01" id="Map1800_tab01">
                    <area shape="rect" coords="935,321,1033,360" href="javascript:go_PassLecture('171765');" />
                    <area shape="rect" coords="935,371,1033,410" href="javascript:go_PassLecture('171766');" />
                    <area shape="rect" coords="935,422,1033,459" href="javascript:go_PassLecture('171767');" />
                    <area shape="rect" coords="935,471,1033,510" href="javascript:go_PassLecture('171769');" />
                    <area shape="rect" coords="935,522,1032,559" href="javascript:go_PassLecture('171770');" />
                    <area shape="rect" coords="934,572,1033,609" href="javascript:go_PassLecture('171772');" />
                    <area shape="rect" coords="936,622,1033,659" href="javascript:go_PassLecture('171774');" />
                    <area shape="rect" coords="934,671,1033,710" href="javascript:go_PassLecture('171776');" />
                    <area shape="rect" coords="935,722,1033,760" href="javascript:go_PassLecture('171778');" />
                    <area shape="rect" coords="935,772,1033,809" href="javascript:go_PassLecture('171779');" />
                    <area shape="rect" coords="934,822,1034,860" href="javascript:go_PassLecture('171780');" />
                    <area shape="rect" coords="934,1230,1033,1269" href="javascript:go_PassLecture('171781');" />
                    <area shape="rect" coords="935,1280,1034,1318" href="javascript:go_PassLecture('171782');" />
                    <area shape="rect" coords="935,1331,1033,1369" href="javascript:go_PassLecture('171783');" />
                    <area shape="rect" coords="935,1382,1034,1418" href="javascript:go_PassLecture('171784');" />
                    <area shape="rect" coords="935,1430,1033,1467" href="javascript:go_PassLecture('171785');" />
                    <area shape="rect" coords="936,1481,1034,1518" href="javascript:go_PassLecture('171786');" />
                    <area shape="rect" coords="934,1530,1035,1568" href="javascript:go_PassLecture('171787');" />
                    <area shape="rect" coords="934,1580,1034,1619" href="javascript:go_PassLecture('171790');" />
                    <area shape="rect" coords="934,1631,1033,1668" href="javascript:go_PassLecture('171794');" />
                    <area shape="rect" coords="935,1680,1033,1718" href="javascript:go_PassLecture('171798');" />
                    <area shape="rect" coords="934,1730,1034,1769" href="javascript:go_PassLecture('171801');" />
                </map>
			</div>
			<div id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1800_03_02.jpg" alt="행정쟁송" usemap="#Map1800_tab02" border="0" />
                <map name="Map1800_tab02" id="Map1800_tab02">
                    <area shape="rect" coords="867,314,965,352" href="javascript:go_PassLecture('171826');" />
                    <area shape="rect" coords="867,364,966,401" href="javascript:go_PassLecture('171873');" />
                    <area shape="rect" coords="867,413,965,452" href="javascript:go_PassLecture('171874');" />
                    <area shape="rect" coords="867,464,965,502" href="javascript:go_PassLecture('171875');" />
                    <area shape="rect" coords="867,514,965,552" href="javascript:go_PassLecture('171876');" />
                    <area shape="rect" coords="866,564,966,601" href="javascript:go_PassLecture('171878');" />
                    <area shape="rect" coords="867,971,965,1009" href="javascript:go_PassLecture('171879');" />
                    <area shape="rect" coords="867,1021,965,1060" href="javascript:go_PassLecture('171880');" />
                    <area shape="rect" coords="867,1072,965,1109" href="javascript:go_PassLecture('171910');" />
                    <area shape="rect" coords="867,1122,966,1159" href="javascript:go_PassLecture('171911');" />
                    <area shape="rect" coords="867,1171,965,1209" href="javascript:go_PassLecture('171912');" />
                    <area shape="rect" coords="867,1222,966,1260" href="javascript:go_PassLecture('171913');" />
                    <area shape="rect" coords="868,1272,965,1310" href="javascript:go_PassLecture('171914');" />
                    <area shape="rect" coords="866,1321,966,1360" href="javascript:go_PassLecture('171915');" />
                    <area shape="rect" coords="867,1372,965,1409" href="javascript:go_PassLecture('171916');" />
                    <area shape="rect" coords="868,1422,966,1459" href="javascript:go_PassLecture('171917');" />
                    <area shape="rect" coords="868,1471,964,1510" href="javascript:go_PassLecture('171918');" />
                    <area shape="rect" coords="867,1880,965,1918" href="javascript:go_PassLecture('171919');" />
                    <area shape="rect" coords="867,1930,966,1969" href="javascript:go_PassLecture('171920');" />
                    <area shape="rect" coords="867,1981,965,2018" href="javascript:go_PassLecture('171921');" />
                    <area shape="rect" coords="867,2031,966,2068" href="javascript:go_PassLecture('171922');" />
                    <area shape="rect" coords="867,2080,965,2119" href="javascript:go_PassLecture('171923');" />
                    <area shape="rect" coords="867,2131,965,2168" href="javascript:go_PassLecture('171929');" />
                    <area shape="rect" coords="868,2540,965,2577" href="javascript:go_PassLecture('171932');" />
                    <area shape="rect" coords="866,2590,965,2626" href="javascript:go_PassLecture('171934');" />
                    <area shape="rect" coords="868,2640,965,2678" href="javascript:go_PassLecture('171936');" />
                    <area shape="rect" coords="868,2689,966,2728" href="javascript:go_PassLecture('171938');" />
                    <area shape="rect" coords="867,2739,966,2777" href="javascript:go_PassLecture('171939');" />
                    <area shape="rect" coords="866,2790,965,2827" href="javascript:go_PassLecture('171940');" />
                    <area shape="rect" coords="866,2840,965,2877" href="javascript:go_PassLecture('171941');" />
                    <area shape="rect" coords="868,2889,967,2928" href="javascript:go_PassLecture('171942');" />
                    <area shape="rect" coords="866,2940,966,2977" href="javascript:go_PassLecture('171944');" />
                    <area shape="rect" coords="867,2989,965,3027" href="javascript:go_PassLecture('171945');" />
                    <area shape="rect" coords="867,3039,966,3078" href="javascript:go_PassLecture('171947');" />
                </map>
			</div>
			<div id="tab03">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1800_03_03.jpg" alt="인사관리" usemap="#Map1800_tab03" border="0" />
                <map name="Map1800_tab03" id="Map1800_tab03">
                    <area shape="rect" coords="867,314,965,351" href="javascript:go_PassLecture('171948');" />
                    <area shape="rect" coords="867,364,965,401" href="javascript:go_PassLecture('171949');" />
                    <area shape="rect" coords="867,414,965,451" href="javascript:go_PassLecture('171953');" />
                    <area shape="rect" coords="867,464,965,501" href="javascript:go_PassLecture('171954');" />
                    <area shape="rect" coords="866,513,966,551" href="javascript:go_PassLecture('171955');" />
                    <area shape="rect" coords="867,563,965,601" href="javascript:go_PassLecture('171956');" />
                    <area shape="rect" coords="866,613,966,652" href="javascript:go_PassLecture('171957');" />
                    <area shape="rect" coords="866,663,966,701" href="javascript:go_PassLecture('171958');" />
                    <area shape="rect" coords="866,713,966,751" href="javascript:go_PassLecture('171959');" />
                    <area shape="rect" coords="867,764,966,801" href="javascript:go_PassLecture('171960');" />
                    <area shape="rect" coords="867,814,965,851" href="javascript:go_PassLecture('171961');" />>
                    <area shape="rect" coords="867,1230,965,1267" href="javascript:go_PassLecture('171973');" />
                    <area shape="rect" coords="866,1280,966,1317" href="javascript:go_PassLecture('171974');" />
                    <area shape="rect" coords="866,1330,965,1367" href="javascript:go_PassLecture('171975');" />
                    <area shape="rect" coords="866,1380,965,1418" href="javascript:go_PassLecture('171976');" />
                    <area shape="rect" coords="866,1429,966,1468" href="javascript:go_PassLecture('171978');" />
                    <area shape="rect" coords="867,1480,966,1517" href="javascript:go_PassLecture('171980');" />
                    <area shape="rect" coords="867,1891,966,1928" href="javascript:go_PassLecture('171982');" />
                    <area shape="rect" coords="867,1941,966,1978" href="javascript:go_PassLecture('171984');" />
                    <area shape="rect" coords="866,1991,966,2029" href="javascript:go_PassLecture('171985');" />
                    <area shape="rect" coords="867,2041,965,2079" href="javascript:go_PassLecture('171986');" />
                    <area shape="rect" coords="866,2090,965,2128" href="javascript:go_PassLecture('171987');" />
                    <area shape="rect" coords="867,2141,966,2178" href="javascript:go_PassLecture('171988');" />
                </map>
			</div>
			<div id="tab04">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1800_03_04.jpg" alt="경영조직" usemap="#Map1800_tab04" border="0" />
                <map name="Map1800_tab04" id="Map1800_tab04">
                    <area shape="rect" coords="867,314,965,352" href="javascript:go_PassLecture('172035');" />
                    <area shape="rect" coords="867,363,966,402" href="javascript:go_PassLecture('172036');" />
                    <area shape="rect" coords="867,413,965,452" href="javascript:go_PassLecture('172037');" />
                    <area shape="rect" coords="867,464,965,502" href="javascript:go_PassLecture('172038');" />
                    <area shape="rect" coords="866,513,965,551" href="javascript:go_PassLecture('172039');" />
                    <area shape="rect" coords="866,564,965,601" href="javascript:go_PassLecture('172040');" />
                    <area shape="rect" coords="868,975,967,1014" href="javascript:go_PassLecture('172041');" />
                    <area shape="rect" coords="867,1025,966,1064" href="javascript:go_PassLecture('172042');" />
                    <area shape="rect" coords="867,1075,967,1113" href="javascript:go_PassLecture('172043');" />
                    <area shape="rect" coords="868,1126,966,1163" href="javascript:go_PassLecture('172044');" />
                    <area shape="rect" coords="868,1175,967,1213" href="javascript:go_PassLecture('172045');" />
                    <area shape="rect" coords="868,1225,966,1263" href="javascript:go_PassLecture('172046');" />
                    <area shape="rect" coords="867,1635,966,1674" href="javascript:go_PassLecture('172047');" />
                    <area shape="rect" coords="866,1685,966,1724" href="javascript:go_PassLecture('172048');" />
                    <area shape="rect" coords="868,1736,964,1773" href="javascript:go_PassLecture('172049');" />
                    <area shape="rect" coords="867,1785,966,1823" href="javascript:go_PassLecture('172052');" />
                    <area shape="rect" coords="867,1836,965,1873" href="javascript:go_PassLecture('172054');" />
                    <area shape="rect" coords="867,1886,964,1923" href="javascript:go_PassLecture('172055');" />
                </map>
			</div>
			<div id="tab05">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1800_03_05.jpg" alt="노동경제" usemap="#Map1800_tab05" border="0" />
                <map name="Map1800_tab05" id="Map1800_tab05">
                    <area shape="rect" coords="867,313,965,352" href="javascript:go_PassLecture('172124');" />
                    <area shape="rect" coords="867,364,965,401" href="javascript:go_PassLecture('172125');" />
                    <area shape="rect" coords="866,414,965,451" href="javascript:go_PassLecture('172126');" />
                    <area shape="rect" coords="866,463,965,501" href="javascript:go_PassLecture('172127');" />
                    <area shape="rect" coords="866,514,966,552" href="javascript:go_PassLecture('172128');" />
                    <area shape="rect" coords="867,564,965,601" href="javascript:go_PassLecture('172129');" />
                </map>
            </div>
            <div id="tab06">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1800_03_06.jpg" alt="민사소송" usemap="#Map1800_tab06" border="0" />
                <map name="Map1800_tab06" id="Map1800_tab06">
                    <area shape="rect" coords="866,313,966,352" href="javascript:go_PassLecture('172056');" />
                    <area shape="rect" coords="866,364,965,402" href="javascript:go_PassLecture('172057');" />
                    <area shape="rect" coords="866,414,965,452" href="javascript:go_PassLecture('172058');" />
                    <area shape="rect" coords="867,464,966,502" href="javascript:go_PassLecture('172059');" />
                    <area shape="rect" coords="865,514,965,551" href="javascript:go_PassLecture('172063');" />
                    <area shape="rect" coords="866,563,966,601" href="javascript:go_PassLecture('172064');" />
                    <area shape="rect" coords="867,613,965,652" href="javascript:go_PassLecture('172066');" />
                    <area shape="rect" coords="868,664,965,701" href="javascript:go_PassLecture('172069');" />
                    <area shape="rect" coords="866,713,965,752" href="javascript:go_PassLecture('172074');" />
                    <area shape="rect" coords="867,763,965,801" href="javascript:go_PassLecture('172077');" />
                    <area shape="rect" coords="867,813,965,852" href="javascript:go_PassLecture('172081');" />
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
					<li>본 공인노무사 2차 SUCCESS T-PASS 상품은 2020년 9월부터 2021년 7월까지 진행될 과목 교수님별 GS0순환, GS1순환, GS2순환, GS3순환 강좌로 구성됩니다.<br>
                        ※ 노동경제학을 선택하시는 분들은 2019년 대비 순환별 강의와 특강이 제공됩니다.<br>
                        (GS0순환+GS2순환+GS2순환+GS3순환 : 2019 기초노동경제학 특강 + 2019년 교수著 특강 3종 제공)<br>
                        (기타 패키지 수강자 : 2019 기초노동경제학 특강 제공)_강의 수강신청 후 게시판에 글을 남겨주세요.
                    </li>
                    <li>본 상품은 수강신청 시 수강료(교재 제외) 10~20% 할인 혜택이 적용됩니다.</li>
                    <li>강사배정 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경될 수 있습니다. <br>
                        강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.                   
                    </li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
					<li>본 상품은 2배수 수강제한이 되어있습니다.</li>
					<li>본 상품 수강기간은 다음과 같습니다.<br>
                        GS0순환 ~ GS3순환 : 2021년 2차 시험일까지 [2021.08.28_예정]<br>
                        GS0순환 ~ GS2순환 : 250일<br>
                        GS1순환 ~ GS3순환 : 210일<br>
                        GS0순환 ~ GS1순환 : 190일<br>
                        GS1순환 ~ GS2순환 : 150일<br>
                        GS2순환 ~ GS3순환 : 120일 <br>
                    </li>
					<li>본 상품은 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.</li>
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

                var url = '{{ site_url('/package/show/cate/309002/pack/648001/prod-code/') }}' + code;
                location.href = url;
            }    
    </script>


@stop