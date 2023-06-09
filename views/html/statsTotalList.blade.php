@extends('willbes.pc.layouts.master_popup')

@section('content')
<!-- Popup -->
<div class="Popup ExamBox">
    <div class="popTitBox">
		<div class="pop-Tit NG"><img src="{{ img_url('/mypage/logo.gif') }}"> 전국 모의고사</div>
		<div class="pop-subTit">2018 제2회 전국모의고사 (12/03 사행) - 9급 [일행/세무] *선택과목 과학 제외</div>
	</div>
	<div class="popupContainer">
		<ul class="tabSty">
			<li class="active"><a href="#none">전체 성적 분석</a></li>
			<li><a href="{{ site_url('/home/html/statsSubjectList') }}">과목별 문항분석</a></li>
			<li><a href="{{ site_url('/home/html/answerNote') }}">오답노트</a></li>
		</ul>
        <!-- //tab -->
        <div class="btnAgR mgT1 mgB1 mb30">
            <a class="btnlineGray"href="#none">출력</a>
        </div>
        <div class="cartBx mgB4">
            <table cellspacing="0" cellpadding="0" class="whtInfoTb">
                <colgroup>
                    <col width="20%">
                    <col width="20%">
                    <col width="20%">
                    <col width="20%">
                    <col width="20%">
                </colgroup>
                <thead>
                    <tr>
                        <th>시행일</th>
                        <th>응시직급</th>
                        <th>응시직렬</th>
                        <th>응시번호</th>
                        <th>성명</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12월 3일 10시 00분</td>
                        <td>9급공무원</td>
                        <td>일반행정직</td>
                        <td>1011013</td>
                        <td>권선희</td>
                    </tr>                
                </tbody>
            </table>
        </div>

        <!-- 종합분석 -->
        <div class="anlyWp">
            <div class="f_left aBx mb30">
                <div class="htit1Wp">
                    <h3 class="htit1 f_left NG"><span class="tx-deep-blue">종합분석</span></h3>
                </div>
                <table cellspacing="0" cellpadding="0" class="listTb">
                    <colgroup>
                        <col width="33.33333333%">
                        <col width="33.33333333%">
                        <col width="33.33333333%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>구분</th>
                            <th>원점수</th>
                            <th>조정점수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>총점</td>
                            <td>90</td>
                            <td>90</td>
                        </tr>
                        <tr>
                            <td>평균</td>
                            <td>18</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>전체평균</td>
                            <td>47</td>
                            <td>47</td>
                        </tr>
                        <tr>
                            <td>석차</td>
                            <td>45 / 56</td>
                            <td>45 / 56</td>
                        </tr>
                        <tr>
                            <td>상위수준</td>
                            <td>80%</td>
                            <td>80%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="f_right wBx mt35 mb30">
                <div id="chart_div1" style="width: 450px; height: 265px;"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 450px; height: 265px;"><div aria-label="차트입니다." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="450" height="265" aria-label="차트입니다." style="overflow: hidden;"><defs id="defs"><clipPath id="_ABSTRACT_RENDERER_ID_5"><rect x="83" y="51" width="284" height="164"></rect></clipPath></defs><rect x="0" y="0" width="450" height="265" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><text text-anchor="start" x="83" y="31.35" font-family="Arial" font-size="11" font-weight="bold" stroke="none" stroke-width="0" fill="#000000">조정점수 기준</text><rect x="83" y="22" width="284" height="11" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g><g><rect x="378" y="51" width="61" height="11" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><rect x="378" y="51" width="61" height="11" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="404" y="60.35" font-family="Arial" font-size="11" stroke="none" stroke-width="0" fill="#222222">점수</text></g><rect x="378" y="51" width="22" height="11" stroke="none" stroke-width="0" fill="#3366cc"></rect></g></g><g><rect x="83" y="51" width="284" height="164" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(http://www.willbesgosi.net/mypage/stats/list.html?topMenuType=O&amp;topMenuGnb=OM_009&amp;topMenu=MAIN&amp;menuID=OM_009_004_002&amp;IDENTYID=03001011013&amp;MOCKCODE=E18000001#_ABSTRACT_RENDERER_ID_5)"><g><rect x="83" y="214" width="284" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="83" y="173" width="284" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="83" y="133" width="284" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="83" y="92" width="284" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="83" y="51" width="284" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect></g><g><rect x="102" y="138" width="58" height="76" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="196" y="78" width="58" height="136" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="290" y="186" width="58" height="28" stroke="none" stroke-width="0" fill="#3366cc"></rect></g><g><rect x="83" y="214" width="284" height="1" stroke="none" stroke-width="0" fill="#333333"></rect></g></g><g></g><g><g><text text-anchor="middle" x="130.66666666666666" y="231.35" font-family="Arial" font-size="11" stroke="none" stroke-width="0" fill="#222222">전체</text></g><g><text text-anchor="middle" x="225" y="231.35" font-family="Arial" font-size="11" stroke="none" stroke-width="0" fill="#222222">최고</text></g><g><text text-anchor="middle" x="319.3333333333333" y="231.35" font-family="Arial" font-size="11" stroke="none" stroke-width="0" fill="#222222">본인</text></g><g><text text-anchor="end" x="72" y="218.35" font-family="Arial" font-size="11" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="end" x="72" y="177.6" font-family="Arial" font-size="11" stroke="none" stroke-width="0" fill="#444444">25</text></g><g><text text-anchor="end" x="72" y="136.85" font-family="Arial" font-size="11" stroke="none" stroke-width="0" fill="#444444">50</text></g><g><text text-anchor="end" x="72" y="96.10000000000001" font-family="Arial" font-size="11" stroke="none" stroke-width="0" fill="#444444">75</text></g><g><text text-anchor="end" x="72" y="55.35" font-family="Arial" font-size="11" stroke="none" stroke-width="0" fill="#444444">100</text></g></g></g><g></g></svg><div aria-label="차트의 데이터를 나타낸 표입니다." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Topping</th><th>점수</th></tr></thead><tbody><tr><td>전체</td><td>47</td></tr><tr><td>최고</td><td>84</td></tr><tr><td>본인</td><td>18</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 275px; left: 460px; white-space: nowrap; font-family: Arial; font-size: 11px;">점수</div><div></div></div></div>
                <script type="text/javascript">
                    var tot_avg1 = parseInt("47");
                    var top_avg1 = parseInt("84");
                    var my_avg1 = parseInt("18");
                    google.load('visualization', '1', {packages: ['corechart']});
                    function drawVisualization() {
                        // Some raw data (not necessarily accurate)
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Topping');
                        data.addColumn('number', '점수');
                        data.addRows([
                            ['전체', tot_avg1],
                            ['최고', top_avg1],
                            ['본인', my_avg1]
                        ]);
                        var options = {
                            title : '조정점수 기준'
                            ,seriesType: "bars"
                            ,vAxis: {minValue:0}
                        };
                        var chart = new google.visualization.ComboChart(document.getElementById('chart_div1'));
                        chart.draw(data, options);
                    }
                    google.setOnLoadCallback(drawVisualization);
                </script><script src="https://www.google.com/uds/?file=visualization&amp;v=1&amp;packages=corechart" type="text/javascript"></script><link href="https://www.google.com/uds/api/visualization/1.0/40ff64b1d9d6b3213524485974f36cc0/ui+ko.css" type="text/css" rel="stylesheet"><script src="https://www.google.com/uds/api/visualization/1.0/40ff64b1d9d6b3213524485974f36cc0/format+ko,default+ko,ui+ko,corechart+ko.I.js" type="text/javascript"></script>
            </div>
            <div class="gBx mgB4">
                <p class="anlyTx"><strong></strong>님의 점수는 평균 <strong>18점</strong>으로, 전체 <strong>56명</strong>에서 <strong>45위</strong>이며 상위 수준 <strong>80</strong>입니다.</p>
            </div>
        </div>

        <!-- 전체 응시자 평균점수 분포표 -->
        <div class="htit1Wp">
            <h3 class="htit1 f_left NG"><span class="tx-deep-blue">전체 응시자 평균점수 분포표</span></h3>
        </div>
        <div class="wBx graph-info">
            <div id="chart_div2" style="width: 900px; height: 365px;"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 900px; height: 365px;"><div aria-label="차트입니다." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="900" height="365" aria-label="차트입니다." style="overflow: hidden;"><defs id="defs"><clipPath id="_ABSTRACT_RENDERER_ID_6"><rect x="133" y="70" width="635" height="226"></rect></clipPath></defs><rect x="0" y="0" width="900" height="365" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><text text-anchor="start" x="133" y="44.9" font-family="Arial" font-size="14" font-weight="bold" stroke="none" stroke-width="0" fill="#000000">조정점수 기준</text><rect x="133" y="33" width="635" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g><g><rect x="782" y="70" width="104" height="37" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><rect x="782" y="70" width="104" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="815" y="81.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">분포도</text></g><path d="M782,77L810,77" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path></g><g><rect x="782" y="93" width="104" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="815" y="104.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">It' you</text></g><rect x="782" y="93" width="28" height="14" stroke="none" stroke-width="0" fill="#dc3912"></rect></g></g><g><rect x="133" y="70" width="635" height="226" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(http://www.willbesgosi.net/mypage/stats/list.html?topMenuType=O&amp;topMenuGnb=OM_009&amp;topMenu=MAIN&amp;menuID=OM_009_004_002&amp;IDENTYID=03001011013&amp;MOCKCODE=E18000001#_ABSTRACT_RENDERER_ID_6)"><g><rect x="133" y="295" width="635" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="133" y="239" width="635" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="133" y="183" width="635" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="133" y="126" width="635" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="133" y="70" width="635" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect></g><g><rect x="235" y="127" width="19" height="168" stroke="none" stroke-width="0" fill="#dc3912"></rect></g><g><rect x="133" y="295" width="635" height="1" stroke="none" stroke-width="0" fill="#333333"></rect></g><g><path d="M149.35,239.25L181.05,295.5L212.75,225.1875L244.45,253.3125L276.15,281.4375L307.85,253.3125L339.54999999999995,281.4375L371.25,267.375L402.95,281.4375L434.65,253.3125L466.34999999999997,197.0625L498.05,239.25L529.75,126.75L561.45,211.125L593.15,267.375L624.8499999999999,267.375L656.55,295.5L688.25,295.5L719.9499999999999,295.5L751.65,295.5" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path></g></g><g></g><g><g><text text-anchor="middle" x="149.35" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">5</text></g><g><text text-anchor="middle" x="181.05" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">10</text></g><g><text text-anchor="middle" x="212.75" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">15</text></g><g><text text-anchor="middle" x="244.45" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">20</text></g><g><text text-anchor="middle" x="276.15" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">25</text></g><g><text text-anchor="middle" x="307.85" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">30</text></g><g><text text-anchor="middle" x="339.54999999999995" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">35</text></g><g><text text-anchor="middle" x="371.25" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">40</text></g><g><text text-anchor="middle" x="402.95" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">45</text></g><g><text text-anchor="middle" x="434.65" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">50</text></g><g><text text-anchor="middle" x="466.34999999999997" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">55</text></g><g><text text-anchor="middle" x="498.05" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">60</text></g><g><text text-anchor="middle" x="529.75" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">65</text></g><g><text text-anchor="middle" x="561.45" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">70</text></g><g><text text-anchor="middle" x="593.15" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">75</text></g><g><text text-anchor="middle" x="624.8499999999999" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">80</text></g><g><text text-anchor="middle" x="656.55" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">85</text></g><g><text text-anchor="middle" x="688.25" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">90</text></g><g><text text-anchor="middle" x="719.9499999999999" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">95</text></g><g><text text-anchor="middle" x="751.65" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">100</text></g><g><text text-anchor="end" x="119" y="300.4" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="end" x="119" y="244.15" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">4</text></g><g><text text-anchor="end" x="119" y="187.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">8</text></g><g><text text-anchor="end" x="119" y="131.65" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">12</text></g><g><text text-anchor="end" x="119" y="75.4" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">16</text></g></g></g><g></g></svg><div aria-label="차트의 데이터를 나타낸 표입니다." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Score</th><th>분포도</th><th>It' you</th></tr></thead><tbody><tr><td>5</td><td>4</td><td></td></tr><tr><td>10</td><td>0</td><td></td></tr><tr><td>15</td><td>5</td><td></td></tr><tr><td>20</td><td>3</td><td>12</td></tr><tr><td>25</td><td>1</td><td></td></tr><tr><td>30</td><td>3</td><td></td></tr><tr><td>35</td><td>1</td><td></td></tr><tr><td>40</td><td>2</td><td></td></tr><tr><td>45</td><td>1</td><td></td></tr><tr><td>50</td><td>3</td><td></td></tr><tr><td>55</td><td>7</td><td></td></tr><tr><td>60</td><td>4</td><td></td></tr><tr><td>65</td><td>12</td><td></td></tr><tr><td>70</td><td>6</td><td></td></tr><tr><td>75</td><td>2</td><td></td></tr><tr><td>80</td><td>2</td><td></td></tr><tr><td>85</td><td>0</td><td></td></tr><tr><td>90</td><td>0</td><td></td></tr><tr><td>95</td><td>0</td><td></td></tr><tr><td>100</td><td>0</td><td></td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 375px; left: 910px; white-space: nowrap; font-family: Arial; font-size: 14px;">It' you</div><div></div></div></div>
            <script type="text/javascript">
                var g_my_size = 0;
                function drawVisualization2() {
                    var val2_5 = parseInt("4");
                    var val2_10 = parseInt("0");
                    var val2_15 = parseInt("5");
                    var val2_20 = parseInt("3");
                    var val2_25 = parseInt("1");
                    var val2_30 = parseInt("3");
                    var val2_35 = parseInt("1");
                    var val2_40 = parseInt("2");
                    var val2_45 = parseInt("1");
                    var val2_50 = parseInt("3");
                    var val2_55 = parseInt("7");
                    var val2_60 = parseInt("4");
                    var val2_65 = parseInt("12");
                    var val2_70 = parseInt("6");
                    var val2_75 = parseInt("2");
                    var val2_80 = parseInt("2");
                    var val2_85 = parseInt("0");
                    var val2_90 = parseInt("0");
                    var val2_95 = parseInt("0");
                    var val2_100 = parseInt("0");

                    if(g_my_size < val2_5) g_my_size = val2_5;
                    if(g_my_size < val2_10) g_my_size = val2_10;
                    if(g_my_size < val2_15) g_my_size = val2_15;
                    if(g_my_size < val2_20) g_my_size = val2_20;
                    if(g_my_size < val2_25) g_my_size = val2_25;
                    if(g_my_size < val2_30) g_my_size = val2_30;
                    if(g_my_size < val2_35) g_my_size = val2_35;
                    if(g_my_size < val2_40) g_my_size = val2_40;
                    if(g_my_size < val2_45) g_my_size = val2_45;
                    if(g_my_size < val2_50) g_my_size = val2_50;
                    if(g_my_size < val2_55) g_my_size = val2_55;
                    if(g_my_size < val2_60) g_my_size = val2_60;
                    if(g_my_size < val2_65) g_my_size = val2_65;
                    if(g_my_size < val2_70) g_my_size = val2_70;
                    if(g_my_size < val2_75) g_my_size = val2_75;
                    if(g_my_size < val2_80) g_my_size = val2_80;
                    if(g_my_size < val2_85) g_my_size = val2_85;
                    if(g_my_size < val2_90) g_my_size = val2_90;
                    if(g_my_size < val2_95) g_my_size = val2_95;
                    if(g_my_size < val2_100) g_my_size = val2_100;

                    if(0 <= my_avg1 && my_avg1 <= 5) var g_my_val5 = g_my_size;
                    if(5 < my_avg1 && my_avg1 <= 10) var g_my_val10 = g_my_size;
                    if(10 < my_avg1 && my_avg1 <= 15) var g_my_val15 = g_my_size;
                    if(15 < my_avg1 && my_avg1 <= 20) var g_my_val20 = g_my_size;
                    if(20 < my_avg1 && my_avg1 <= 25) var g_my_val25 = g_my_size;
                    if(25 < my_avg1 && my_avg1 <= 30) var g_my_val30 = g_my_size;
                    if(30 < my_avg1 && my_avg1 <= 35) var g_my_val35 = g_my_size;
                    if(35 < my_avg1 && my_avg1 <= 40) var g_my_val40 = g_my_size;
                    if(40 < my_avg1 && my_avg1 <= 45) var g_my_val45 = g_my_size;
                    if(45 < my_avg1 && my_avg1 <= 50) var g_my_val50 = g_my_size;
                    if(50 < my_avg1 && my_avg1 <= 55) var g_my_val55 = g_my_size;
                    if(55 < my_avg1 && my_avg1 <= 60) var g_my_val60 = g_my_size;
                    if(60 < my_avg1 && my_avg1 <= 65) var g_my_val65 = g_my_size;
                    if(65 < my_avg1 && my_avg1 <= 70) var g_my_val70 = g_my_size;
                    if(70 < my_avg1 && my_avg1 <= 75) var g_my_val75 = g_my_size;
                    if(75 < my_avg1 && my_avg1 <= 80) var g_my_val80 = g_my_size;
                    if(80 < my_avg1 && my_avg1 <= 85) var g_my_val85 = g_my_size;
                    if(85 < my_avg1 && my_avg1 <= 90) var g_my_val90 = g_my_size;
                    if(90 < my_avg1 && my_avg1 <= 95) var g_my_val95 = g_my_size;
                    if(95 < my_avg1 && my_avg1 <= 100) var g_my_val100 = g_my_size;


                    // Some raw data (not necessarily accurate)
                    var data = google.visualization.arrayToDataTable([
                        ["Score",  "분포도",  "It' you"],
                        ['5',  val2_5,  g_my_val5],
                        ['10',  val2_10,  g_my_val10],
                        ['15',  val2_15,  g_my_val15],
                        ['20',  val2_20,  g_my_val20],
                        ['25',  val2_25,  g_my_val25],
                        ['30',  val2_30,  g_my_val30],
                        ['35',  val2_35,  g_my_val35],
                        ['40',  val2_40,  g_my_val40],
                        ['45',  val2_45,  g_my_val45],
                        ['50',  val2_50,  g_my_val50],
                        ['55',  val2_55,  g_my_val55],
                        ['60',  val2_60,  g_my_val60],
                        ['65',  val2_65,  g_my_val65],
                        ['70',  val2_70,  g_my_val70],
                        ['75',  val2_75,  g_my_val75],
                        ['80',  val2_80,  g_my_val80],
                        ['85',  val2_85,  g_my_val85],
                        ['90',  val2_90,  g_my_val90],
                        ['95',  val2_95,  g_my_val95],
                        ['100',  val2_100,  g_my_val100]
                    ]);
                    var options = {
                        title : '조정점수 기준',
                        vAxis: {minValue:0 },
                        hAxis: {minValue:0, },
                        seriesType: "line"
                        ,series: {1: {type: "bars"}}
                    };
                    var chart = new google.visualization.ComboChart(document.getElementById('chart_div2'));
                    chart.draw(data, options);
                }
                google.setOnLoadCallback(drawVisualization2);
            </script>
        </div>

        <!-- 과목별 득점분석 -->
        <div class="htit1Wp">
            <h3 class="htit1 f_left NG"><span class="tx-deep-blue">과목별 득점분석</span></h3>
        </div>
        <table cellspacing="0" cellpadding="0" class="listTb listTb2 mgB4">
            <colgroup>             
                <col style="width: 12.5%;"/>
                <col style="width: 12.5%;"/>
                <col style="width: 12.5%;"/>
                <col style="width: 12.5%;"/>
                <col style="width: 12.5%;"/>
                <col style="width: 12.5%;"/>
                <col style="width: 12.5%;"/>
                <col style="width: 12.5%;"/>
            </colgroup>
            <thead>
                <tr>
                    <th rowspan="2">구분</th>
                    <th rowspan="2">국어</th>
                    <th rowspan="2">영어</th>
                    <th rowspan="2">한국사</th>
                    <th colspan="2">행정법</th>
                    <th colspan="2">행정학</th>
                </tr>
                <tr>
                    <th>원점수</th>
                    <th>조정점수</th>
                    <th>원점수</th>
                    <th>조정점수</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>본인</th>
                    <td>30</td>
                    <td>25</td>
                    <td>0</td>
                    <td>10</td>
                    <td>10</td>
                    <td>25</td>
                    <td>25</td>
                </tr>
                <tr>
                    <th>전체</th>
                    <td>51</td>
                    <td>44</td>
                    <td>52</td>
                    <td>36</td>
                    <td>45</td>
                    <td>42</td>
                    <td>49</td>
                </tr>
                <tr>
                    <th>최고</th>
                    <td>95</td>
                    <td>95</td>
                    <td>90</td> 
                    <td>95</td>
                    <td>80</td>
                    <td>90</td>  
                    <td>90</td>
                </tr>
                <tr>
                    <th>과목석차</th>
                    <td>38/56</td>
                    <td>37/53</td>
                    <td>46/55</td>
                    <td>29/37</td>
                    <td>33/37</td>
                    <td>15/34</td>
                    <td>30/34</td>
                </tr>
            </tbody>
        </table>

        <!-- 과목별 점수위치 -->
        <div class="htit1Wp">
            <h3 class="htit1 f_left NG"><span class="tx-deep-blue">과목별 점수위치</span></h3>
        </div>
        <table cellspacing="0" cellpadding="0" class="viewTb graphTb mgB4">
            <colgroup>
                <col style="width: 130px;"/>
                <col width="*">
            </colgroup>
            <tbody>
                <tr class="wBx">
                    <th>국어</th>
                    <td>
                        <div id="chart3_div0" style="width: 800px; height: 165px;"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 800px; height: 165px;"><div aria-label="차트입니다." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="800" height="165" aria-label="차트입니다." style="overflow: hidden;"><defs id="defs"><clipPath id="_ABSTRACT_RENDERER_ID_0"><rect x="85" y="32" width="630" height="102"></rect></clipPath></defs><rect x="0" y="0" width="800" height="165" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="727" y="32" width="61" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><rect x="727" y="32" width="61" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="756" y="42.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">점수</text></g><rect x="727" y="32" width="24" height="12" stroke="none" stroke-width="0" fill="#3366cc"></rect></g></g><g><rect x="85" y="32" width="630" height="102" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(http://www.willbesgosi.net/mypage/stats/list.html?topMenuType=O&amp;topMenuGnb=OM_009&amp;topMenu=MAIN&amp;menuID=OM_009_004_002&amp;IDENTYID=03001011013&amp;MOCKCODE=E18000001#_ABSTRACT_RENDERER_ID_0)"><g><rect x="85" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="242" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="400" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="557" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="714" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect></g><g><rect x="86" y="39" width="320" height="21" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="86" y="73" width="597" height="20" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="86" y="106" width="188" height="21" stroke="none" stroke-width="0" fill="#3366cc"></rect></g><g><rect x="85" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#333333"></rect></g></g><g></g><g><g><text text-anchor="middle" x="85.5" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="middle" x="242.75" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">25</text></g><g><text text-anchor="middle" x="400" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">50</text></g><g><text text-anchor="middle" x="557.25" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">75</text></g><g><text text-anchor="middle" x="714.5" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">100</text></g><g><text text-anchor="end" x="73" y="53.53333333333333" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">전체</text></g><g><text text-anchor="end" x="73" y="87.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">최고</text></g><g><text text-anchor="end" x="73" y="120.86666666666666" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">본인</text></g></g></g><g></g></svg><div aria-label="차트의 데이터를 나타낸 표입니다." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Topping</th><th>점수</th></tr></thead><tbody><tr><td>전체</td><td>51</td></tr><tr><td>최고</td><td>95</td></tr><tr><td>본인</td><td>30</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 175px; left: 810px; white-space: nowrap; font-family: Arial; font-size: 12px;">점수</div><div></div></div></div>
                    </td>
                    <script type="text/javascript">
                        my_avg = parseInt("30");
                        tot_avg = parseInt("51");
                        top_avg = parseInt("95");
                    </script>
                </tr>
                <script type="text/javascript">
                    // Some raw data (not necessarily accurate)
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Topping');
                    data.addColumn('number', '점수');
                    data.addRows([
                        ['전체', tot_avg],
                        ['최고', top_avg],
                        ['본인', my_avg]
                    ]);
                    var options = {
                        vAxis: {minValue:0}
                    };
                    var chart = new google.visualization.BarChart(document.getElementById("chart3_div0"));
                    chart.draw(data, options);
                </script>
            
                <tr class="wBx">
                    <th>영어</th>
                    <td>
                        <div id="chart3_div1" style="width: 800px; height: 165px;"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 800px; height: 165px;"><div aria-label="차트입니다." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="800" height="165" aria-label="차트입니다." style="overflow: hidden;"><defs id="defs"><clipPath id="_ABSTRACT_RENDERER_ID_1"><rect x="85" y="32" width="630" height="102"></rect></clipPath></defs><rect x="0" y="0" width="800" height="165" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="727" y="32" width="61" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><rect x="727" y="32" width="61" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="756" y="42.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">점수</text></g><rect x="727" y="32" width="24" height="12" stroke="none" stroke-width="0" fill="#3366cc"></rect></g></g><g><rect x="85" y="32" width="630" height="102" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(http://www.willbesgosi.net/mypage/stats/list.html?topMenuType=O&amp;topMenuGnb=OM_009&amp;topMenu=MAIN&amp;menuID=OM_009_004_002&amp;IDENTYID=03001011013&amp;MOCKCODE=E18000001#_ABSTRACT_RENDERER_ID_1)"><g><rect x="85" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="242" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="400" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="557" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="714" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect></g><g><rect x="86" y="39" width="276" height="21" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="86" y="73" width="597" height="20" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="86" y="106" width="156" height="21" stroke="none" stroke-width="0" fill="#3366cc"></rect></g><g><rect x="85" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#333333"></rect></g></g><g></g><g><g><text text-anchor="middle" x="85.5" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="middle" x="242.75" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">25</text></g><g><text text-anchor="middle" x="400" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">50</text></g><g><text text-anchor="middle" x="557.25" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">75</text></g><g><text text-anchor="middle" x="714.5" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">100</text></g><g><text text-anchor="end" x="73" y="53.53333333333333" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">전체</text></g><g><text text-anchor="end" x="73" y="87.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">최고</text></g><g><text text-anchor="end" x="73" y="120.86666666666666" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">본인</text></g></g></g><g></g></svg><div aria-label="차트의 데이터를 나타낸 표입니다." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Topping</th><th>점수</th></tr></thead><tbody><tr><td>전체</td><td>44</td></tr><tr><td>최고</td><td>95</td></tr><tr><td>본인</td><td>25</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 175px; left: 810px; white-space: nowrap; font-family: Arial; font-size: 12px;">점수</div><div></div></div></div>
                    </td> 
                    <script type="text/javascript">
                        my_avg = parseInt("25");
                        tot_avg = parseInt("44");
                        top_avg = parseInt("95");
                    </script>
                </tr>
                <script type="text/javascript">
                    // Some raw data (not necessarily accurate)
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Topping');
                    data.addColumn('number', '점수');
                    data.addRows([
                        ['전체', tot_avg],
                        ['최고', top_avg],
                        ['본인', my_avg]
                    ]);
                    var options = {
                        vAxis: {minValue:0}
                    };
                    var chart = new google.visualization.BarChart(document.getElementById("chart3_div1"));
                    chart.draw(data, options);
                </script>
            
                <tr class="wBx">
                    <th>한국사</th>
                    <td>
                        <div id="chart3_div2" style="width: 800px; height: 165px;"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 800px; height: 165px;"><div aria-label="차트입니다." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="800" height="165" aria-label="차트입니다." style="overflow: hidden;"><defs id="defs"><clipPath id="_ABSTRACT_RENDERER_ID_2"><rect x="85" y="32" width="630" height="102"></rect></clipPath></defs><rect x="0" y="0" width="800" height="165" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="727" y="32" width="61" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><rect x="727" y="32" width="61" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="756" y="42.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">점수</text></g><rect x="727" y="32" width="24" height="12" stroke="none" stroke-width="0" fill="#3366cc"></rect></g></g><g><rect x="85" y="32" width="630" height="102" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(http://www.willbesgosi.net/mypage/stats/list.html?topMenuType=O&amp;topMenuGnb=OM_009&amp;topMenu=MAIN&amp;menuID=OM_009_004_002&amp;IDENTYID=03001011013&amp;MOCKCODE=E18000001#_ABSTRACT_RENDERER_ID_2)"><g><rect x="85" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="242" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="400" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="557" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="714" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect></g><g><rect x="86" y="39" width="326" height="21" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="86" y="73" width="565" height="20" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="85" y="106" width="0.5" height="21" stroke="none" stroke-width="0" fill="#3366cc"></rect></g><g><rect x="85" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#333333"></rect></g></g><g></g><g><g><text text-anchor="middle" x="85.5" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="middle" x="242.75" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">25</text></g><g><text text-anchor="middle" x="400" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">50</text></g><g><text text-anchor="middle" x="557.25" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">75</text></g><g><text text-anchor="middle" x="714.5" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">100</text></g><g><text text-anchor="end" x="73" y="53.53333333333333" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">전체</text></g><g><text text-anchor="end" x="73" y="87.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">최고</text></g><g><text text-anchor="end" x="73" y="120.86666666666666" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">본인</text></g></g></g><g></g></svg><div aria-label="차트의 데이터를 나타낸 표입니다." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Topping</th><th>점수</th></tr></thead><tbody><tr><td>전체</td><td>52</td></tr><tr><td>최고</td><td>90</td></tr><tr><td>본인</td><td>0</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 175px; left: 810px; white-space: nowrap; font-family: Arial; font-size: 12px;">점수</div><div></div></div></div>
                    </td>
                    <script type="text/javascript">
                        my_avg = parseInt("0");
                        tot_avg = parseInt("52");
                        top_avg = parseInt("90");
                    </script>
                </tr>
                <script type="text/javascript">
                    // Some raw data (not necessarily accurate)
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Topping');
                    data.addColumn('number', '점수');
                    data.addRows([
                        ['전체', tot_avg],
                        ['최고', top_avg],
                        ['본인', my_avg]
                    ]);
                    var options = {
                        vAxis: {minValue:0}
                    };
                    var chart = new google.visualization.BarChart(document.getElementById("chart3_div2"));
                    chart.draw(data, options);
                </script>
            
                <tr class="wBx">
                    <th>행정법</th>
                    <td>
                        <div id="chart3_div3" style="width: 800px; height: 165px;"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 800px; height: 165px;"><div aria-label="차트입니다." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="800" height="165" aria-label="차트입니다." style="overflow: hidden;"><defs id="defs"><clipPath id="_ABSTRACT_RENDERER_ID_3"><rect x="85" y="32" width="630" height="102"></rect></clipPath></defs><rect x="0" y="0" width="800" height="165" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="727" y="32" width="61" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><rect x="727" y="32" width="61" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="756" y="42.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">점수</text></g><rect x="727" y="32" width="24" height="12" stroke="none" stroke-width="0" fill="#3366cc"></rect></g></g><g><rect x="85" y="32" width="630" height="102" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(http://www.willbesgosi.net/mypage/stats/list.html?topMenuType=O&amp;topMenuGnb=OM_009&amp;topMenu=MAIN&amp;menuID=OM_009_004_002&amp;IDENTYID=03001011013&amp;MOCKCODE=E18000001#_ABSTRACT_RENDERER_ID_3)"><g><rect x="85" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="242" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="400" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="557" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="714" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect></g><g><rect x="86" y="39" width="225" height="21" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="86" y="73" width="597" height="20" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="86" y="106" width="62" height="21" stroke="none" stroke-width="0" fill="#3366cc"></rect></g><g><rect x="85" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#333333"></rect></g></g><g></g><g><g><text text-anchor="middle" x="85.5" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="middle" x="242.75" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">25</text></g><g><text text-anchor="middle" x="400" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">50</text></g><g><text text-anchor="middle" x="557.25" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">75</text></g><g><text text-anchor="middle" x="714.5" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">100</text></g><g><text text-anchor="end" x="73" y="53.53333333333333" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">전체</text></g><g><text text-anchor="end" x="73" y="87.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">최고</text></g><g><text text-anchor="end" x="73" y="120.86666666666666" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">본인</text></g></g></g><g></g></svg><div aria-label="차트의 데이터를 나타낸 표입니다." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Topping</th><th>점수</th></tr></thead><tbody><tr><td>전체</td><td>36</td></tr><tr><td>최고</td><td>95</td></tr><tr><td>본인</td><td>10</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 175px; left: 810px; white-space: nowrap; font-family: Arial; font-size: 12px;">점수</div><div></div></div></div>
                    </td>
                    <script type="text/javascript">
                        my_avg = parseInt("10");
                        tot_avg = parseInt("36");
                        top_avg = parseInt("95");
                    </script> 
                </tr>
                <script type="text/javascript">
                    // Some raw data (not necessarily accurate)
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Topping');
                    data.addColumn('number', '점수');
                    data.addRows([
                        ['전체', tot_avg],
                        ['최고', top_avg],
                        ['본인', my_avg]
                    ]);
                    var options = {
                        vAxis: {minValue:0}
                    };
                    var chart = new google.visualization.BarChart(document.getElementById("chart3_div3"));
                    chart.draw(data, options);
                </script>
            
                <tr class="wBx">
                    <th>행정학</th>
                    <td>
                        <div id="chart3_div4" style="width: 800px; height: 165px;"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 800px; height: 165px;"><div aria-label="차트입니다." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="800" height="165" aria-label="차트입니다." style="overflow: hidden;"><defs id="defs"><clipPath id="_ABSTRACT_RENDERER_ID_4"><rect x="85" y="32" width="630" height="102"></rect></clipPath></defs><rect x="0" y="0" width="800" height="165" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="727" y="32" width="61" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><rect x="727" y="32" width="61" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="756" y="42.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">점수</text></g><rect x="727" y="32" width="24" height="12" stroke="none" stroke-width="0" fill="#3366cc"></rect></g></g><g><rect x="85" y="32" width="630" height="102" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(http://www.willbesgosi.net/mypage/stats/list.html?topMenuType=O&amp;topMenuGnb=OM_009&amp;topMenu=MAIN&amp;menuID=OM_009_004_002&amp;IDENTYID=03001011013&amp;MOCKCODE=E18000001#_ABSTRACT_RENDERER_ID_4)"><g><rect x="85" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="242" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="400" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="557" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="714" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#cccccc"></rect></g><g><rect x="86" y="39" width="307" height="21" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="86" y="73" width="565" height="20" stroke="none" stroke-width="0" fill="#3366cc"></rect><rect x="86" y="106" width="156" height="21" stroke="none" stroke-width="0" fill="#3366cc"></rect></g><g><rect x="85" y="32" width="1" height="102" stroke="none" stroke-width="0" fill="#333333"></rect></g></g><g></g><g><g><text text-anchor="middle" x="85.5" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="middle" x="242.75" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">25</text></g><g><text text-anchor="middle" x="400" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">50</text></g><g><text text-anchor="middle" x="557.25" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">75</text></g><g><text text-anchor="middle" x="714.5" y="151.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">100</text></g><g><text text-anchor="end" x="73" y="53.53333333333333" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">전체</text></g><g><text text-anchor="end" x="73" y="87.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">최고</text></g><g><text text-anchor="end" x="73" y="120.86666666666666" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">본인</text></g></g></g><g></g></svg><div aria-label="차트의 데이터를 나타낸 표입니다." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Topping</th><th>점수</th></tr></thead><tbody><tr><td>전체</td><td>49</td></tr><tr><td>최고</td><td>90</td></tr><tr><td>본인</td><td>25</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 175px; left: 810px; white-space: nowrap; font-family: Arial; font-size: 12px;">점수</div><div></div></div></div>
                    </td>
                    <script type="text/javascript">
                        my_avg = parseInt("25"); 
                        tot_avg = parseInt("49");
                        top_avg = parseInt("90");
                    </script>
                </tr>
                <script type="text/javascript">
                    // Some raw data (not necessarily accurate)
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Topping');
                    data.addColumn('number', '점수');
                    data.addRows([
                        ['전체', tot_avg],
                        ['최고', top_avg],
                        ['본인', my_avg]
                    ]);
                    var options = {
                        vAxis: {minValue:0}
                    };
                    var chart = new google.visualization.BarChart(document.getElementById("chart3_div4"));
                    chart.draw(data, options);
                </script>
            </tbody>
        </table>

	</div>
	<!-- //popupContainer -->
</div>
<!-- End Popup -->
@stop