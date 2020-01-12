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

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2019/12/190906_nomu01_bg.jpg) no-repeat center top;}	
		.evt_01 {background:#001e96; padding-bottom:100px}

		.tabs {border-bottom:2px solid #57c179; width:980px; margin:0 auto 30px}
		.tabs li {display:inline; float:left; width:16.66666%;}
		.tabs.tabs4ea li {display:inline; float:left; width:25%;}
		.tabs.tabs6ea li {display:inline; float:left; width:16.66666%;}
		.tabs li a {display:block; color:#fff; background:#0032c9; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:16px}
		.tabs li a:hover,
		.tabs li a.active {background:#57c179; color:#0032c9}
		.tabs li:last-child a {margin:0}
		.tabs:after {content:""; display:block; clear:both}

		.evt_01 table {border-top:1px solid #edeeef; border-left:1px solid #edeeef; table-layout: auto;}
		.evt_01 table th,
		.evt_01 table td {padding:15px 5px; border-bottom:1px solid #edeeef; border-right:1px solid #edeeef; text-align: center; font-size:14px}
		.evt_01 table th {background: #2e3044; color:#fff; font-weight: bold;}
		.evt_01 table tbody th {background: #9697a1; color:#fff;} 
		.evt_01 .buyLec {margin-top:30px}
		.evt_01 .buyLec a { display:block; text-align:cetner; font-size:30px; font-weight:600; background:#e83e3e; color:#fff; padding:20px 0; border-radius:50px}
		.evt_01 .buyLec a:hover {background:#e83e3e; box-shadow: 10px 10px 10px rgba(0,0,0,.2);}

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
            <img src="https://static.willbes.net/public/images/promotion/2019/12/190906_nomu01.png" alt="노무2차 T-PASS" usemap="#Map190905A" border="0" />
            <map name="Map190905A" id="Map190905A">
                <area shape="rect" coords="788,874,975,1022" href="#buyLec" alt="바로신청하기" />
            </map>
		</div>

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/190906_nomu02.png" alt="커리큘럼" />
            <ul class="tabs NG" id="buyLec">
				<li><a href="#tab01">노동법</a></li>
				<li><a href="#tab02">행정쟁송</a></li>
				<li><a href="#tab03">인사관리</a></li>
				<li><a href="#tab04">경영조직</a></li>
                <li><a href="#tab05">노동경제</a></li>
                <li><a href="#tab06">민사소송</a></li>
			</ul>
			<div id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/190906_nomu03_1.png" alt="노동법" usemap="#MaplecA" border="0" />
                <map name="MaplecA" id="MaplecA">
                    <area shape="rect" coords="806,353,906,382" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160341" alt="방강수"/>
                    <area shape="rect" coords="807,393,906,421" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160342" />
                    <area shape="rect" coords="806,433,905,461" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160344" />
                    <area shape="rect" coords="806,473,905,502" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160347" />
                    <area shape="rect" coords="806,513,906,541" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160350" />
                    <area shape="rect" coords="806,553,906,582" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160351" />
                    <area shape="rect" coords="806,941,906,970" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160361" alt="강재민"/>
                    <area shape="rect" coords="807,981,906,1009" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160363" />
                    <area shape="rect" coords="806,1021,906,1050" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160364" />
                    <area shape="rect" coords="806,1061,906,1090" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160365" />
                    <area shape="rect" coords="806,1102,906,1130" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160367" />
                    <area shape="rect" coords="806,1141,906,1170" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160369" />
                    <area shape="rect" coords="806,1529,906,1557" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160375" alt="박원철"/>
                    <area shape="rect" coords="806,1569,906,1598" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160385" />
                    <area shape="rect" coords="806,1609,906,1637" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160386" />
                    <area shape="rect" coords="806,1649,905,1678" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160387" />
                    <area shape="rect" coords="806,1689,905,1718" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160389" />
                    <area shape="rect" coords="806,1729,906,1757" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160390" />
                    <area shape="rect" coords="807,2117,905,2145" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160395" alt="이수진"/>
                    <area shape="rect" coords="806,2157,906,2185" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160396" />
                    <area shape="rect" coords="807,2197,906,2225" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160397" />
                    <area shape="rect" coords="806,2237,905,2266" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160398" />
                    <area shape="rect" coords="806,2277,905,2306" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160399" />
                    <area shape="rect" coords="807,2317,905,2346" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160406" />
                </map>
			</div>
			<div id="tab02">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190906_nomu03_2.png" alt="행정쟁송" usemap="#Map2" border="0" />
                <map name="Map2" id="Map2">
                    <area shape="rect" coords="805,353,905,382" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160413" alt="조현"/>
                    <area shape="rect" coords="805,394,905,421" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160414" />
                    <area shape="rect" coords="805,433,904,462" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160415" />
                    <area shape="rect" coords="805,473,904,501" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160416" />
                    <area shape="rect" coords="806,513,905,542" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160417" />
                    <area shape="rect" coords="805,553,905,582" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160418" />
                    <area shape="rect" coords="805,941,904,970" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160420" alt="이승민"/>
                    <area shape="rect" coords="805,981,904,1009" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160421" />
                    <area shape="rect" coords="805,1022,904,1050" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160422" />
                    <area shape="rect" coords="806,1061,904,1089" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160423" />
                    <area shape="rect" coords="805,1101,905,1130" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160424" />
                    <area shape="rect" coords="805,1141,905,1170" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160425" />
                    <area shape="rect" coords="806,1530,904,1557" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160427" alt="심민"/>
                    <area shape="rect" coords="805,1569,905,1598" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160429" />
                    <area shape="rect" coords="805,1609,905,1637" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160430" />
                    <area shape="rect" coords="805,1649,905,1677" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160431" />
                    <area shape="rect" coords="805,1689,905,1718" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160432" />
                    <area shape="rect" coords="806,1730,904,1757" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160433" />
                    <area shape="rect" coords="806,2117,905,2146" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160438" alt="김정일"/>
                    <area shape="rect" coords="805,2157,904,2185" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160439" />
                    <area shape="rect" coords="805,2198,904,2226" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160440" />
                    <area shape="rect" coords="806,2238,904,2266" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160441" />
                    <area shape="rect" coords="806,2277,905,2305" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160442" />
                    <area shape="rect" coords="805,2317,905,2346" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160443" />
                    <area shape="rect" coords="805,2705,905,2734" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160445" alt="김기홍"/>
                    <area shape="rect" coords="805,2745,905,2774" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160446" />
                    <area shape="rect" coords="805,2785,905,2814" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160447" />
                    <area shape="rect" coords="805,2825,904,2854" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160448" />
                    <area shape="rect" coords="805,2865,905,2894" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160449" />
                    <area shape="rect" coords="806,2905,905,2933" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160450" />
                </map>
			</div>
			<div id="tab03">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190906_nomu03_3.png" alt="인사관리" usemap="#Map3" border="0" />
                <map name="Map3" id="Map3">
                    <area shape="rect" coords="805,353,904,382" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160464" alt="김유미"/>
                    <area shape="rect" coords="806,393,905,423" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160465" />
                    <area shape="rect" coords="806,433,905,462" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160466" />
                    <area shape="rect" coords="806,473,905,501" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160467" />
                    <area shape="rect" coords="805,513,904,541" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160468" />
                    <area shape="rect" coords="806,553,905,581" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160469" />
                    <area shape="rect" coords="805,941,905,969" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160426" alt="전수환"/>
                    <area shape="rect" coords="805,982,905,1010" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160428" />
                    <area shape="rect" coords="805,1021,904,1049" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160434" />
                    <area shape="rect" coords="806,1061,905,1091" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160435" />
                    <area shape="rect" coords="806,1101,905,1130" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160436" />
                    <area shape="rect" coords="805,1142,905,1170" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160437" />
                    <area shape="rect" coords="805,1530,905,1558" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160451" alt="정준모"/>
                    <area shape="rect" coords="805,1570,904,1599" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160452" />
                    <area shape="rect" coords="806,1611,904,1638" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160453" />
                    <area shape="rect" coords="806,1650,905,1679" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160454" />
                    <area shape="rect" coords="806,1690,905,1718" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160455" />
                    <area shape="rect" coords="805,1730,905,1759" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160456" />
                </map>
			</div>
			<div id="tab04">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190906_nomu03_4.png" alt="경영조직" usemap="#Map4" border="0" />
                <map name="Map4" id="Map4">
                    <area shape="rect" coords="806,353,905,382" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160464" alt="김유미"/>
                    <area shape="rect" coords="805,393,904,422" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160465" />
                    <area shape="rect" coords="805,434,905,461" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160466" />
                    <area shape="rect" coords="806,473,905,502" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160467" />
                    <area shape="rect" coords="805,513,904,542" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160468" />
                    <area shape="rect" coords="805,554,906,582" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160469" />
                    <area shape="rect" coords="806,941,904,969" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160470" alt="정준모"/>
                    <area shape="rect" coords="806,981,905,1010" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160471" />
                    <area shape="rect" coords="806,1022,905,1050" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160472" />
                    <area shape="rect" coords="806,1062,905,1089" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160473" />
                    <area shape="rect" coords="806,1101,904,1129" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160474" />
                    <area shape="rect" coords="805,1142,904,1169" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160475" />
                    <area shape="rect" coords="806,1529,905,1557" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160478" alt="전수환"/>
                    <area shape="rect" coords="806,1570,905,1598" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160479" />
                    <area shape="rect" coords="806,1610,905,1637" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160480" />
                    <area shape="rect" coords="806,1650,905,1678" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160481" />
                    <area shape="rect" coords="805,1689,905,1717" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160482" />
                    <area shape="rect" coords="806,1730,904,1757" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160483" />
                </map>
			</div>
			<div id="tab05">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190906_nomu03_5.png" alt="노동경제" usemap="#Map5" border="0" />
                <map name="Map5" id="Map5">
                    <area shape="rect" coords="805,353,905,382" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160370" alt="강두성"/>
                    <area shape="rect" coords="805,393,905,422" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160371" />
                    <area shape="rect" coords="805,433,905,462" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160372" />
                    <area shape="rect" coords="805,474,905,502" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160373" />
                    <area shape="rect" coords="805,514,905,542" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160380" />
                    <area shape="rect" coords="805,553,904,581" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160382" />
                </map>
            </div>
            <div id="tab06">
				<img src="https://static.willbes.net/public/images/promotion/2019/12/190906_nomu03_6.png" alt="민사소송" usemap="#Map6" border="0" />
                <map name="Map6" id="Map6">
                    <area shape="rect" coords="806,355,905,383" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160383" alt="김춘환"/>
                    <area shape="rect" coords="805,394,905,423" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160388" />
                    <area shape="rect" coords="805,434,904,463" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160391" />
                    <area shape="rect" coords="805,475,905,503" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160392" />
                    <area shape="rect" coords="806,514,905,542" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160393" />
                    <area shape="rect" coords="805,554,906,582" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160394" />
                    <area shape="rect" coords="805,943,904,970" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160400 " alt="이덕훈"/>
                    <area shape="rect" coords="805,982,905,1011" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160401 " />
                    <area shape="rect" coords="805,1022,905,1051" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160402 " />
                    <area shape="rect" coords="806,1063,904,1091" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160403 " />
                    <area shape="rect" coords="805,1102,905,1131" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160404 " />
                    <area shape="rect" coords="806,1142,905,1170" href="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/160405 " />
                </map>
			</div>
		</div>

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>본 공인노무사 2차 SUCCESS T-PASS 상품은 2019년 9월부터 2020년 7월까지 진행될 과목 교수님별 GS0순환, GS1순환, GS2순환, GS3순환 강좌로 구성됩니다.</li>
					<li>본 상품은 수강신청 시 수강료(교재 제외) 10~20% 할인 혜택이 적용됩니다.  </li>
					<li>강사배정 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경될 수 있습니다. <br>
                        강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 패스 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
					<li>본 상품은 2배수 수강제한이 되어있습니다.</li>
					<li>본 상품 수강기간은 다음과 같습니다.<br>
                        GS0순환 ~ GS3순환 : 2020년 2차 시험일까지 [2020.08.29_예정]<br>
                        GS0순환 ~ GS2순환 : 270일<br>
                        GS1순환 ~ GS3순환 : 210일<br>
                        GS0순환 ~ GS1순환 : 210일<br>
                        GS1순환 ~ GS2순환 : 150일<br>
                        GS2순환 ~ GS3순환 : 120일<br>
                    </li>
					<li>본 패스 상품은 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
					<li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
					<li>회원의 요구 또는 귀책사유로 인하여 계약이 해지되는 경우에는 수강시작일(당일 포함)부터 해지일까지의 이용일수 또는 이용
					회차에 해당하는 금액을 공제 후 환불하며 자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br>
					① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br>
					② PASS 상품 및 특별 기획 상품 등 할인이 적용된 상품은 해당 상품의 정가를 기준으로 환불하는 것을 원칙으로 합니다.<br>
					③ 이용기간 기준의 온라인 강좌 상품(PASS)을 수강한 경우 환불 기준 : 결제금액-(강좌 정상가의 1일 이용대금×이용일수)<br>
					④ 최종 완강 되지 않은 강좌의 학습 회차 계산은 공지된 예정 강좌수를 기준으로 환불 금액을 산출합니다.</li>
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
    </script>


@stop