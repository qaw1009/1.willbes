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

		.evt_top {background:#15334e url(https://static.willbes.net/public/images/promotion/2020/05/1650_top_bg.jpg) no-repeat center top;}	
		.evt_01 {background:#5a7be6;}
		.evt_02 {background:#fff; padding-bottom:50px}
		.tabs {border-bottom:1px solid #2e3044; width:980px; margin:0 auto 30px}
		.tabs li {display:inline; float:left; width:20%;}
		.tabs.tabs4ea li {display:inline; float:left; width:25%;}
		.tabs.tabs6ea li {display:inline; float:left; width:16.66666%;}
		.tabs li a {display:block; color:#fff; background:#9697a1; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:14px}
		.tabs li a:hover,
		.tabs li a.active {background:#2e3044}
		.tabs li:last-child a {margin:0}
		.tabs:after {content:""; display:block; clear:both}

		.evt_02s {background:#163450}


		.evt_03 {background:#1a1b2d; padding-bottom:100px}
		.evt_03 div,
		.evt_03 ul {width:980px; margin:0 auto}
		.evt_03 a {display:block; color:#fff; font-size:30px; background:#3d3461; height:80px; line-height:80px}
		.evt_03 a:hover {background:#a5b2f6; color:#0d0f1b}
		.evt_03 li {display:inline; float:left; width:25%; text-align:left}
		.evt_03 li a {margin-right:15px; font-size:16px; text-align:center; width:230px; margin-bottom:5px; height:50px; line-height:50px}
		.evt_03 li:nth-child(2) a {height:105px; line-height:105px}
		.evt_03 li:last-child a {margin-right:0}
		.evt_03 ul:after {content:""; display:block; clear:both}

		.evt_04 {background:#fff; padding:100px 0; width:1120px; margin:0 auto}
		.evt_04 h3 {font-size:30px; color:#2e3044; margin-bottom:30px}
		.evt_04 ul {width:1120px}
		.evt_04 table {border-top:1px solid #edeeef; border-left:1px solid #edeeef; table-layout: auto;}
		.evt_04 table th,
		.evt_04 table td {padding:15px 5px; border-bottom:1px solid #edeeef; border-right:1px solid #edeeef; text-align: center; font-size:14px}
		.evt_04 table th {background: #2e3044; color:#fff; font-weight: bold;}
		.evt_04 table tbody th {background: #9697a1; color:#fff;} 
		.evt_04 .buyLec {margin-top:30px}
		.evt_04 .buyLec a {display:block; text-align:center; font-size:30px; font-weight:600; background:#e83e3e; color:#fff; padding:20px 0; border-radius:50px}
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
			<img src="https://static.willbes.net/public/images/promotion/2020/05/1650_top.jpg" alt="2021 노무패스" />
		</div>

		<div class="evtCtnsBox evt_01">
			<img src="https://static.willbes.net/public/images/promotion/2020/03/1501_01.jpg" alt="커리큘럼" />
		</div>

		<div class="evtCtnsBox evt_02">
			<img src="https://static.willbes.net/public/images/promotion/2020/03/1501_02.jpg" alt="1차 강의" />
			<ul class="tabs NG">
				<li><a href="#tab01">민법</a></li>
				<li><a href="#tab02">노동법</a></li>
				<li><a href="#tab03">사회보험법</a></li>
				<li><a href="#tab04">경제학원론</a></li>
				<li><a href="#tab05">경영학개론</a></li>
			</ul>
			<div id="tab01">
				<img src="https://static.willbes.net/public/images/promotion/2020/03/1501_02_01.jpg" alt="민법" />
			</div>
			<div id="tab02">
				<img src="https://static.willbes.net/public/images/promotion/2020/03/1501_02_02.jpg" alt="노동법" />
			</div>
			<div id="tab03">
				<img src="https://static.willbes.net/public/images/promotion/2020/03/1501_02_03.jpg" alt="사회보험법" />
			</div>
			<div id="tab04">
				<img src="https://static.willbes.net/public/images/promotion/2020/03/1501_02_04.jpg" alt="경제학원론" />
			</div>
			<div id="tab05">
				<img src="https://static.willbes.net/public/images/promotion/2020/03/1501_02_05.jpg" alt="경영학개론" />
			</div>

			<img src="https://static.willbes.net/public/images/promotion/2020/03/1501_03.jpg" alt="2차 강의" />
			<ul class="tabs tabs6ea NG">
				<li><a href="#tab06">노동법</a></li>
				<li><a href="#tab07">행정쟁송법</a></li>
				<li><a href="#tab08">인사노무관리</a></li>
				<li><a href="#tab09">경영조직론</a></li>
				<li><a href="#tab10">민사소송법</a></li>
				<li><a href="#tab11">노동경제학</a></li>
			</ul>
			<div id="tab06">
				<img src="https://static.willbes.net/public/images/promotion/2020/03/1501_03_01.jpg" alt="노동법" />
			</div>
			<div id="tab07">
				<img src="https://static.willbes.net/public/images/promotion/2020/03/1501_03_02.jpg" alt="행정쟁송법" />
			</div>
			<div id="tab08">
				<img src="https://static.willbes.net/public/images/promotion/2020/03/1501_03_03.jpg" alt="인사노무관리" />
			</div>
			<div id="tab09">
				<img src="https://static.willbes.net/public/images/promotion/2020/03/1501_03_04.jpg" alt="경영조직론" />
			</div>
			<div id="tab10">
				<img src="https://static.willbes.net/public/images/promotion/2020/03/1501_03_05.jpg" alt="민사소송법" />
			</div>
			<div id="tab11">
				<img src="https://static.willbes.net/public/images/promotion/2020/03/1501_03_06.jpg" alt="노동경제학" />
			</div>
		</div>

		<div class="evtCtnsBox evt_02s">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1650_02s.jpg" alt="신청하기" usemap="#Map1650a" border="0" />
            <map name="Map1650a" id="Map1650a">
                <area shape="rect" coords="879,542,1051,715" href="https://job.willbes.net/package/show/cate/309002/pack/648002/prod-code/165306" target="_blank" />
                <area shape="rect" coords="877,744,1051,915" href="https://job.willbes.net/package/show/cate/309002/pack/648002/prod-code/165307" target="_blank" />
                <area shape="rect" coords="879,944,1050,1118" href="https://job.willbes.net/package/show/cate/309002/pack/648002/prod-code/165308" target="_blank" />
                <area shape="rect" coords="878,1149,1049,1319" href="https://job.willbes.net/package/show/cate/309002/pack/648002/prod-code/165309" target="_blank" />
                <area shape="rect" coords="876,1350,1051,1522" href="https://job.willbes.net/package/show/cate/309002/pack/648002/prod-code/165310" target="_blank" />
            </map>
		</div>

		{{--
		<div class="evtCtnsBox evt_03">
			<img src="https://static.willbes.net/public/images/promotion/2019/12/190821_nomu05_01.jpg" alt="한림 노무패스"/>
			<!--div class="NG"><a href="#">한림 노무패스 신청하기 ></a></div-->
			<ul class="NG mt50">
				<li>
					<img src="https://static.willbes.net/public/images/promotion/2019/12/190821_nomu05_02.jpg" alt="1차 노무패스"/>
					<a href="https://job.willbes.net/package/show/cate/309002/pack/648002/prod-code/160457">1차 노무패스 [경영] 신청 ></a>
					<a href="https://job.willbes.net/package/show/cate/309002/pack/648002/prod-code/161017">1차 노무패스 [경제] 신청 ></a>
				</li>
				<li>
					<img src="https://static.willbes.net/public/images/promotion/2019/12/190821_nomu05_03.jpg" alt="2차 노무패스"/>
					<a href="https://job.willbes.net/package/show/cate/309002/pack/648002/prod-code/161015">2차 노무패스 신청 ></a>
				</li>
				<li>
					<img src="https://static.willbes.net/public/images/promotion/2019/12/190821_nomu05_04.jpg" alt="동차 베이직 노무패스"/>
					<a href="https://job.willbes.net/package/show/cate/309002/pack/648002/prod-code/160460">동차 노무패스 베이직 [경영] ></a>
					<a href="https://job.willbes.net/package/show/cate/309002/pack/648002/prod-code/161016">동차 노무패스 베이직 [경제] ></a>
				</li>
				<li>
					<img src="https://static.willbes.net/public/images/promotion/2019/12/190821_nomu05_05.jpg" alt="동차 프리미엄 노무패스"/>
					<a href="https://job.willbes.net/package/show/cate/309002/pack/648002/prod-code/161014">동차 노무패스 프리미엄 [경영] ></a>
					<a href="https://job.willbes.net/package/show/cate/309002/pack/648002/prod-code/160989">동차 노무패스 프리미엄 [경제] ></a>
				</li>
			</ul>
		</div>
		--}}

		{{--
		<div class="evtCtnsBox evt_04 NGR">
			<ul class="tabs tabs4ea NG">
				<li><a href="#tab12">2020 한림1차 노무패스</a></li>
				<li><a href="#tab13">2020 한림2차 노무패스</a></li>
				<li><a href="#tab14">2020 한림 동차 노무패스[베이직]</a></li>
				<li><a href="#tab15">2020 한림 동차 노무패스[프리미엄]</a></li>				
			</ul>
			<form name="form1">
				<div id="tab12">
					<h3 class="NSK-Black">2020 한림 1차 노무패스</h3>
					<div>					
						<table cellspacing="0" cellpadding="0">
							<colgroup>
								<col width="50%" />
								<col width="" />
							</colgroup>
							<thead>
								<tr>
									<th colspan="2">1차 강의 선택하기</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>경영학 선택</th>
									<th>경제학 선택</th>
								</tr>
								<tr>
									<td><input name="mgntno" id="aa1" type="checkbox" value="" />
									<label for="aa1">노동법(김광훈) / 사회보험법(정여울)</label></td>
									<td><input name="mgntno" id="aa2" type="checkbox" value="" />
									<label for="aa2">노동법(김광훈) / 사회보험법(정여울)</label></td>
								</tr>
								<tr>
									<td><input name="mgntno" id="aa3" type="checkbox" value="" />
									<label for="aa3">노동법(김광훈) / 사회보험법(이주현)</label></td>
									<td><input name="mgntno" id="aa4" type="checkbox" value="" />
									<label for="aa4">노동법(김광훈) / 사회보험법(이주현)</label></td>
								</tr>
								<tr>
									<td><input name="mgntno" id="aa5" type="checkbox" value="" />
									<label for="aa5">노동법(박원철) / 사회보험법(정여울)</label></td>
									<td><input name="mgntno" id="aa6" type="checkbox" value="" />
									<label for="aa6">노동법(박원철) / 사회보험법(정여울)</label></td>
								</tr>
								<tr>
									<td><input name="mgntno" id="aa7" type="checkbox" value="" />
									<label for="aa7">노동법(박원철) / 사회보험법(이주현)</label></td>
									<td><input name="mgntno" id="aa8" type="checkbox" value="" />
									<label for="aa8">노동법(박원철) / 사회보험법(이주현)</label></td>
								</tr>
							</tbody>
						</table>
						<div class="buyLec">
							<a href="#none">수강신청 ></a>
						</div>				
					</div>				
				</div>

				<div id="tab13">
					<h3 class="NSK-Black">2020 한림 2차 노무패스</h3>
					<div>
						<table cellspacing="0" cellpadding="0">
							<colgroup>
								<col width="" />
								<col width="" />
								<col width="" />
								<col width="" />
								<col width="" />
								<col width="" />
							</colgroup>
							<thead>
								<tr>
									<th colspan="6">2차 GS0~GS3순환 강의 선택하기</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th colspan="3">필수과목</th>
									<th colspan="3">선택과목(택1)</th>
								</tr>
								<tr>
									<th>노동법</th>
									<th>행정쟁송법</th>
									<th>인사노무관리</th>
									<th>경영조직론</th>
									<th>민사소송법</th>
									<th>노동경제학</th>
								</tr>
								<tr>
									<td><input name="mgntno" id="ba1" type="checkbox" value="" />
									<label for="ba1">강재민</label></td>
									<td><input name="bb" id="bb1" type="checkbox" value="" />
									<label for="bb1">김기홍</label></td>
									<td><input name="bc" id="bc1" type="checkbox" value="" />
									<label for="bc1">김유미</label></td>
									<td><input name="bd" id="bd1" type="checkbox" value="" />
									<label for="bd1">김유미</label></td>
									<td><input name="bd" id="bd2" type="checkbox" value="" />
									<label for="bd2">김춘환</label></td>
									<td><input name="bd" id="bd6" type="checkbox" value="" />
									<label for="bd6">강두성</label></td>
								</tr>
								<tr>
									<td><input name="ba" id="ba2" type="checkbox" value="" />
									<label for="ba2">박원철</label></td>
									<td><input name="bb" id="bb2" type="checkbox" value="" />
									<label for="bb2">김정일</label></td>
									<td><input name="bc" id="bc2" type="checkbox" value="" />
									<label for="bc2">전수환</label></td>
									<td><input name="bd" id="bd3" type="checkbox" value="" />
									<label for="bd3">전수환</label></td>
									<td><input name="bd" id="bd4" type="checkbox" value="" />
									<label for="bd4">이덕훈</label></td>
									<td> </td>
								</tr>
								<tr>
									<td><input name="ba" id="ba3" type="checkbox" value="" />
									<label for="ba3">방강수</label></td>
									<td><input name="bb" id="bb3" type="checkbox" value="" />
									<label for="bb3">이승민</label></td>
									<td><input name="bc" id="bc3" type="checkbox" value="" />
									<label for="bc3">정준모</label></td>
									<td><input name="bd" id="bd5" type="checkbox" value="" />
									<label for="bd5">정준모</label></td>
									<td> </td>
									<td> </td>
								</tr>
								<tr>
									<td><input name="ba" id="ba4" type="checkbox" value="" />
									<label for="ba4">이수진</label></td>
									<td><input name="bb" id="bb4" type="checkbox" value="" />
									<label for="bb4">심민</label></td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
								</tr>
								<tr>
									<td> </td>
									<td><input name="bb" id="bb5" type="checkbox" value="" />
									<label for="bb5">조현</label></td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
								</tr>
							</tbody>
						</table>
						<div class="buyLec">
							<a href="#none">수강신청 ></a>
						</div>					
					</div>	
				</div>

				<div id="tab14">
					<h3 class="NSK-Black">2020 한림 동차 노무패스 [베이직]</h3>
					<div>					
						<table cellspacing="0" cellpadding="0">
						<colgroup>
								<col width="50%" />
								<col width="" />
							</colgroup>
							<thead>
								<tr>
									<th colspan="2">1차 강의 선택하기</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>경영학 선택</th>
									<th>경제학 선택</th>
								</tr>								
								<tr>
									<td><input name="mgntno" id="ce1"type="checkbox" value="" />
									<label for="ce1">노동법(김광훈) / 사회보험법(정여울)</label></td>
									<td><input name="ce" id="ce2"type="checkbox" value="" />
									<label for="ce2">노동법(김광훈) / 사회보험법(정여울</label>)</td>
								</tr>
								<tr>
									<td><input name="ce" id="ce3"type="checkbox" value="" />
									<label for="ce3">노동법(김광훈) / 사회보험법(이주현)</label></td>
									<td><input name="ce" id="ce4"type="checkbox" value="" />
									<label for="ce4">노동법(김광훈) / 사회보험법(이주현</label>)</td>
								</tr>
								<tr>
									<td><input name="ce" id="ce5"type="checkbox" value="" />
									<label for="ce5">노동법(박원철) / 사회보험법(정여울)</label></td>
									<td><input name="ce" id="ce6"type="checkbox" value="" />
									<label for="ce6">노동법(박원철) / 사회보험법(정여울)</label></td>
								</tr>
								<tr>
									<td><input name="ce" id="ce7"type="checkbox" value="" />
									<label for="ce7">노동법(박원철) / 사회보험법(이주현)</label></td>
									<td><input name="ce" id="ce8"type="checkbox" value="" />
									<label for="ce8">노동법(박원철) / 사회보험법(이주현)</label></td>
								</tr>
							</tbody>
						</table>
						<table cellspacing="0" cellpadding="0" class="mt30">
							<colgroup>
								<col width="" />
								<col width="" />
								<col width="" />
								<col width="" />
								<col width="" />
								<col width="" />
							</colgroup>
							<thead>
								<tr>
									<th colspan="6">2차 GS0순환 강의 선택하기</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th colspan="3">필수과목</th>
									<th colspan="3">선택과목(택1)</th>
								</tr>
								<tr>
									<th>노동법</th>
									<th>행정쟁송법</th>
									<th>인사노무관리</th>
									<th>경영조직론</th>
									<th>민사소송법</th>
									<th>노동경제학</th>
								</tr>
								<tr>
									<td><input name="mgntno" id="ca1" type="checkbox" value="" />
									<label for="ca1">강재민</label></td>
									<td><input name="cb" id="cb1" type="checkbox" value="" />
									<label for="cb1">김기홍</label></td>
									<td><input name="cc" id="cc1" type="checkbox" value="" />
									<label for="cc1">김유미</label></td>
									<td><input name="cd" id="cd1" type="checkbox" value="" />
									<label for="cd1">김유미</label></td>
									<td><input name="cd" id="cd2" type="checkbox" value="" />
									<label for="cd2">김춘환</label></td>
									<td><input name="cd" id="cd6" type="checkbox" value="" />
									<label for="cd6">강두성</label></td>
								</tr>
								<tr>
									<td><input name="ca" id="ca2" type="checkbox" value="" />
									<label for="ca2">박원철</label></td>
									<td><input name="cb" id="cb2" type="checkbox" value="" />
									<label for="cb2">김정일</label></td>
									<td><input name="cc" id="cc2" type="checkbox" value="" />
									<label for="cc2">전수환</label></td>
									<td><input name="cd" id="cd3" type="checkbox" value="" />
									<label for="cd3">전수환</label></td>
									<td><input name="cd" id="cd4" type="checkbox" value="" />
									<label for="cd4">이덕훈</label></td>
									<td> </td>
								</tr>
								<tr>
									<td><input name="ca" id="ca3" type="checkbox" value="" />
									<label for="ca3">방강수</label></td>
									<td><input name="cb" id="cb3" type="checkbox" value="" />
									<label for="cb3">이승민</label></td>
									<td><input name="cc" id="cc3" type="checkbox" value="" />
									<label for="cc3">정준모</label></td>
									<td><input name="cd" id="cd5" type="checkbox" value="" />
									<label for="cd5">정준모</label></td>
									<td> </td>
									<td> </td>
								</tr>
								<tr>
									<td><input name="ca" id="ca4" type="checkbox" value="" />
									<label for="ca4">이수진</label></td>
									<td><input name="cb" id="cb4" type="checkbox" value="" />
									<label for="cb4">심민</label></td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
								</tr>
								<tr>
									<td> </td>
									<td><input name="cb" id="cb5" type="checkbox" value="" />
									<label for="cb5">조현</label></td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
								</tr>
							</tbody>
						</table>
						<div class="buyLec">
							<a href="#none">수강신청 ></a>
						</div>				
					</div>					
				</div>

				<div id="tab15">
					<h3 class="NSK-Black">2020 한림 동차 노무패스 [프리미엄]</h3>
					<div>					
						<table cellspacing="0" cellpadding="0">
							<colgroup>
								<col width="50%" />
								<col width="" />
							</colgroup>
							<thead>
								<tr>
									<th colspan="2">1차 강의 선택하기</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>경영학 선택</th>
									<th>경제학 선택</th>
								</tr>								
								<tr>
									<td><input name="mgntno" id="de1" type="checkbox" value="" />
									<label for="de1">노동법(김광훈) / 사회보험법(정여울)</label></td>
									<td><input name="de" id="de2" type="checkbox" value="" />
									<label for="de2">노동법(김광훈) / 사회보험법(정여울)</label></td>
								</tr>
								<tr>
									<td><input name="de" id="de3" type="checkbox" value="" />
									<label for="de3">노동법(김광훈) / 사회보험법(이주현)</label></td>
									<td><input name="de" id="de4" type="checkbox" value="" />
									<label for="de4">노동법(김광훈) / 사회보험법(이주현)</label></td>
								</tr>
								<tr>
									<td><input name="de" id="de5" type="checkbox" value="" />
									<label for="de5">노동법(박원철) / 사회보험법(정여울)</label></td>
									<td><input name="de" id="de6" type="checkbox" value="" />
									<label for="de6">노동법(박원철) / 사회보험법(정여울)</label></td>
								</tr>
								<tr>
									<td><input name="de" id="de7" type="checkbox" value="" />
									<label for="de7">노동법(박원철) / 사회보험법(이주현)</label></td>
									<td><input name="de" id="de8" type="checkbox" value="" />
									<label for="de8">노동법(박원철) / 사회보험법(이주현)</label></td>
								</tr>
							</tbody>
						</table>
						<table cellspacing="0" cellpadding="0" class="mt30">
							<colgroup>
								<col width="" />
								<col width="" />
								<col width="" />
								<col width="" />
								<col width="" />
								<col width="" />
							</colgroup>
							<thead>
								<tr>
									<th colspan="6">2차 GS0순환 강의 선택하기</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input name="mgntno" id="da1" type="checkbox" value="" />
									<label for="da1">강재민</label></td>
									<td><input name="db" id="db1" type="checkbox" value="" />
									<label for="db1">김기홍</label></td>
									<td><input name="dc" id="dc1" type="checkbox" value="" />
									<label for="dc1">김유미</label></td>
									<td><input name="dd" id="dd1" type="checkbox" value="" />
									<label for="dd1">김유미</label></td>
									<td><input name="dd" id="dd2" type="checkbox" value="" />
									<label for="dd2">김춘환</label></td>
									<td><input name="dd" id="dd6" type="checkbox" value="" />
									<label for="de1">강두성</label></td>
								</tr>
								<tr>
									<td><input name="da" id="da2" type="checkbox" value="" />
									<label for="da2">박원철</label></td>
									<td><input name="db" id="db2" type="checkbox" value="" />
									<label for="db2">김정일</label></td>
									<td><input name="dc" id="dc2" type="checkbox" value="" />
									<label for="dc2">전수환</label></td>
									<td><input name="dd" id="dd3" type="checkbox" value="" />
									<label for="dd3">전수환</label></td>
									<td><input name="dd" id="dd4" type="checkbox" value="" />
									<label for="dd4">이덕훈</label></td>
									<td> </td>
								</tr>
								<tr>
									<td><input name="da" id="da3" type="checkbox" value="" />
									<label for="da3">방강수</label></td>
									<td><input name="db" id="db3" type="checkbox" value="" />
									<label for="db3">이승민</label></td>
									<td><input name="dc" id="dc3" type="checkbox" value="" />
									<label for="dc3">정준모</label></td>
									<td><input name="dd" id="dd5" type="checkbox" value="" />
									<label for="dd5">정준모</label></td>
									<td> </td>
									<td> </td>
								</tr>
								<tr>
									<td><input name="da" id="da4" type="checkbox" value="" />
									<label for="da4">이수진</label></td>
									<td><input name="db" id="db4" type="checkbox" value="" />
									<label for="db4">심민</label></td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
								</tr>
								<tr>
									<td> </td>
									<td><input name="db" id="db5" type="checkbox" value="" />
									<label for="db5">조현</label></td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
								</tr>
							</tbody>
						</table>
						<div class="buyLec">
							<a href="#none">수강신청 ></a>
						</div>				
					</div>
				</div>
			</form>
		</div>
		--}}
		
		{{--
		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>1차 상품구성은 2020년 1월부터 2020년 5월까지 진행될 2020년 대비 공인노무사 1차 대비 강좌로 구성됩니다.<br>
					(2019년 기본강의 추가제공, 복수 강사진의 경우 강사 선택을 하셔야 합니다.)</li>
					<li>2차 GS순환 강의는 순환별로 강의가 개설 된 후 순차적으로 업로드 됩니다.<br>
					(GS0순환-2019년 9월, GS1순환-2020년 1월, GS2순환-2020년 4월, GS3순환-2020년 6월)<br>
					강의 업로드는 실강 진행 후 다음날 오후에 업로드(공휴일/주말 제외) 됩니다. </li>
					<li>강사의 개인사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경될 수 있습니다.<br>
					(강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.)</li>
					<li>순환별 강의 중 주말반과 평일반 두 개의 과정이 개설된 경우 한 개의 과정만 제공됩니다.<br>
					(기본 제공은 주말반으로 설정되어 있으며, 평일반으로 듣기 원하시면 게시판에 글을 남겨주시면 변경해드립니다.)</li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 패스 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
					<li>본 패스 상품 강의의 경우 배수 제한 없이 무제한 수강이 가능합니다.</li>
					<li>본 패스 상품 수강기간은 각 패스 상품별로 상이하오니 꼭 확인하시기 바랍니다.</li>
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
		--}}
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