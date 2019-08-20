@extends('willbes.pc.layouts.master_popup')
<!-- googlechart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="https://www.google.com/uds/?file=visualization&v=1&packages=corechart" type="text/javascript"></script>
<link href="https://www.google.com/uds/api/visualization/1.0/40ff64b1d9d6b3213524485974f36cc0/ui+ko.css" type="text/css" rel="stylesheet">
<script src="https://www.google.com/uds/api/visualization/1.0/342b7b8453344477d252440b6c1305c9/format+en,default,corechart.I.js" type="text/javascript"></script>
<!-- End Popup -->
@section('content')

    <!-- Popup -->
    <div id='' class="Popup ExamBox">
        <div class="popTitBox">
            <div class="pop-Tit NG"><img src="{{ img_url('/mypage/logo.gif') }}"> 전국 모의고사</div>
            <div class="pop-subTit">{{ $productInfo['ProdName'] }}</div>
        </div>
        <div class="popupContainer">
            <ul class="tabSty">
                <li class="active"><a href="#none">전체 성적 분석</a></li>
                <li><a href="javascript:goLink(1);">과목별 문항분석</a></li>
                <li><a href="javascript:goLink(2);">오답노트</a></li>
            </ul>
            <!-- //tab -->
            <div class="btnAgR mgT1 mgB1 mb30">
                <a id='printBtn' class="btnlineGray" href="javascript:window.print()">출력</a>
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
                        <th>응시일</th>
                        <th>응시직급</th>
                        <th>응시직렬</th>
                        <th>응시번호</th>
                        <th>성명</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ substr($productInfo['IsDate'],0,10) }}</td>
                        <td>{{ $productInfo['CateName'] }}</td>
                        <td>{{ $productInfo['TakeMockPartName'] }}</td>
                        <td>{{ $productInfo['TakeNumber'] }}</td>
                        <td>{{ $memName }}</td>
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
                            <td>@if($dataOrg) {{ $dataOrg['grade'] }} @endif</td>
                            <td>@if($dataAdjust) {{ $dataAdjust['grade'] }} @endif</td>
                        </tr>
                        <tr>
                            <td>평균</td>
                            <td>@if($dataOrg) {{ round($dataOrg['avg'],2) }} @endif</td>
                            <td>@if($dataAdjust) {{ round($dataAdjust['avg'],2) }} @endif</td>
                        </tr>
                        <tr>
                            <td>전체평균</td>
                            <td>@if($dataOrg) {{ round($dataOrg['tavg'],2) }} @endif</td>
                            <td>@if($dataAdjust) {{ round($dataAdjust['tavg'],2) }} @endif</td>
                        </tr>
                        <tr>
                            <td>석차</td>
                            <td>@if($dataOrg) {{ $dataOrg['rank'] }} @endif</td>
                            <td>@if($dataAdjust) {{ $dataAdjust['rank'] }} @endif</td>
                        </tr>
                        <tr>
                            <td>상위수준</td>
                            <td>@if($dataOrg) {{  $dataOrg['tpct'] }}% @endif</td>
                            <td>@if($dataAdjust) {{ $dataAdjust['tpct'] }}% @endif</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="f_right wBx mt35 mb30">
                    <div id="chart_div1" style="width: 410px; height: 265px;"></div>


                    <script type="text/javascript">

                        var tot_avg1 = parseInt("{{ $dataAdjust['tsum'] }}");
                        var top_avg1 = parseInt("{{ $dataAdjust['admax'] }}");
                        var my_avg1 = parseInt("{{ $dataAdjust['grade'] }}");
                        google.charts.load('visualization', {'packages': ['corechart'], 'callback': drawVisualization});

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

                        </script>

                </div>
                <div class="gBx mgB4">
                    @if($dataOrg)
                    <p class="anlyTx"><strong>{{ $memName }}</strong>님의 점수는 평균 <strong>{{ $dataAdjust['avg'] }}점</strong>으로, 전체 <strong>{{ $dataAdjust['COUNT'] }}명</strong>에서 <strong>{{ $dataAdjust['rankS'] }}위</strong>이며 상위 수준 <strong>{{ $dataAdjust['tpct'] }} %</strong>입니다.</p>
                    @endif
                </div>
            </div>

            <!-- 전체 응시자 평균점수 분포표 -->
            <div class="htit1Wp">
                <h3 class="htit1 f_left NG"><span class="tx-deep-blue">전체 응시자 평균점수 분포표</span></h3>
            </div>
            <div class="wBx graph-info">
                <div id="chart_div2" style="width: 900px; height: 365px;"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 900px; height: 365px;"><div aria-label="차트입니다." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="900" height="365" aria-label="차트입니다." style="overflow: hidden;"><defs id="defs"><clipPath id="_ABSTRACT_RENDERER_ID_6"><rect x="133" y="70" width="635" height="226"></rect></clipPath></defs><rect x="0" y="0" width="900" height="365" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><text text-anchor="start" x="133" y="44.9" font-family="Arial" font-size="14" font-weight="bold" stroke="none" stroke-width="0" fill="#000000">조정점수 기준</text><rect x="133" y="33" width="635" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g><g><rect x="782" y="70" width="104" height="37" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><rect x="782" y="70" width="104" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="815" y="81.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">분포도</text></g><path d="M782,77L810,77" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path></g><g><rect x="782" y="93" width="104" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="815" y="104.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">It' you</text></g><rect x="782" y="93" width="28" height="14" stroke="none" stroke-width="0" fill="#dc3912"></rect></g></g><g><rect x="133" y="70" width="635" height="226" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(http://www.willbesgosi.net/mypage/stats/list.html?topMenuType=O&amp;topMenuGnb=OM_009&amp;topMenu=MAIN&amp;menuID=OM_009_004_002&amp;IDENTYID=03001011013&amp;MOCKCODE=E18000001#_ABSTRACT_RENDERER_ID_6)"><g><rect x="133" y="295" width="635" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="133" y="239" width="635" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="133" y="183" width="635" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="133" y="126" width="635" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="133" y="70" width="635" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect></g><g><rect x="235" y="127" width="19" height="168" stroke="none" stroke-width="0" fill="#dc3912"></rect></g><g><rect x="133" y="295" width="635" height="1" stroke="none" stroke-width="0" fill="#333333"></rect></g><g><path d="M149.35,239.25L181.05,295.5L212.75,225.1875L244.45,253.3125L276.15,281.4375L307.85,253.3125L339.54999999999995,281.4375L371.25,267.375L402.95,281.4375L434.65,253.3125L466.34999999999997,197.0625L498.05,239.25L529.75,126.75L561.45,211.125L593.15,267.375L624.8499999999999,267.375L656.55,295.5L688.25,295.5L719.9499999999999,295.5L751.65,295.5" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path></g></g><g></g><g><g><text text-anchor="middle" x="149.35" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">5</text></g><g><text text-anchor="middle" x="181.05" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">10</text></g><g><text text-anchor="middle" x="212.75" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">15</text></g><g><text text-anchor="middle" x="244.45" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">20</text></g><g><text text-anchor="middle" x="276.15" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">25</text></g><g><text text-anchor="middle" x="307.85" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">30</text></g><g><text text-anchor="middle" x="339.54999999999995" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">35</text></g><g><text text-anchor="middle" x="371.25" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">40</text></g><g><text text-anchor="middle" x="402.95" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">45</text></g><g><text text-anchor="middle" x="434.65" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">50</text></g><g><text text-anchor="middle" x="466.34999999999997" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">55</text></g><g><text text-anchor="middle" x="498.05" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">60</text></g><g><text text-anchor="middle" x="529.75" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">65</text></g><g><text text-anchor="middle" x="561.45" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">70</text></g><g><text text-anchor="middle" x="593.15" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">75</text></g><g><text text-anchor="middle" x="624.8499999999999" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">80</text></g><g><text text-anchor="middle" x="656.55" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">85</text></g><g><text text-anchor="middle" x="688.25" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">90</text></g><g><text text-anchor="middle" x="719.9499999999999" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">95</text></g><g><text text-anchor="middle" x="751.65" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">100</text></g><g><text text-anchor="end" x="119" y="300.4" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="end" x="119" y="244.15" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">4</text></g><g><text text-anchor="end" x="119" y="187.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">8</text></g><g><text text-anchor="end" x="119" y="131.65" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">12</text></g><g><text text-anchor="end" x="119" y="75.4" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">16</text></g></g></g><g></g></svg><div aria-label="차트의 데이터를 나타낸 표입니다." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Score</th><th>분포도</th><th>It' you</th></tr></thead><tbody><tr><td>5</td><td>4</td><td></td></tr><tr><td>10</td><td>0</td><td></td></tr><tr><td>15</td><td>5</td><td></td></tr><tr><td>20</td><td>3</td><td>12</td></tr><tr><td>25</td><td>1</td><td></td></tr><tr><td>30</td><td>3</td><td></td></tr><tr><td>35</td><td>1</td><td></td></tr><tr><td>40</td><td>2</td><td></td></tr><tr><td>45</td><td>1</td><td></td></tr><tr><td>50</td><td>3</td><td></td></tr><tr><td>55</td><td>7</td><td></td></tr><tr><td>60</td><td>4</td><td></td></tr><tr><td>65</td><td>12</td><td></td></tr><tr><td>70</td><td>6</td><td></td></tr><tr><td>75</td><td>2</td><td></td></tr><tr><td>80</td><td>2</td><td></td></tr><tr><td>85</td><td>0</td><td></td></tr><tr><td>90</td><td>0</td><td></td></tr><tr><td>95</td><td>0</td><td></td></tr><tr><td>100</td><td>0</td><td></td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 375px; left: 910px; white-space: nowrap; font-family: Arial; font-size: 14px;">It' you</div><div></div></div></div>
                <script type="text/javascript">


                    function drawVisualization2() {
                        var others = {!! json_encode($dataSet) !!};
                        var my_avg1 = {{ $dataAdjust['avg'] }};

                        var val2_5 = 0; val2_10 = 0; val2_15 = 0; val2_20 = 0; val2_25 = 0; val2_30 = 0; val2_35 = 0; val2_40 = 0; val2_45 = 0; val2_50 = 0; val2_55 = 0; val2_60 = 0; val2_65 = 0; val2_70 = 0; val2_75 = 0; val2_80 = 0; val2_85 = 0; val2_90 = 0; val2_95 = 0; val2_100 = 0;
                        var g_my_val5 = 0; g_my_val10 = 0; g_my_val15 = 0; g_my_val20 = 0; g_my_val25 = 0; g_my_val30 = 0; g_my_val35 = 0; g_my_val40 = 0; g_my_val45 = 0; g_my_val50 = 0; g_my_val55 = 0; g_my_val60 = 0; g_my_val65 = 0; g_my_val70 = 0; g_my_val75 = 0; g_my_val80 = 0; g_my_val85 = 0; g_my_val90 = 0; g_my_val95 = 0; g_my_val100 = 0;

                        for(j=0; j < others.length; j++) {
                            num = parseInt(others[j]);
                            //alert(num);
                            if (0 <= num && num <= 5) val2_5++;
                            if (5 < num && num <= 10) val2_10++;
                            if (10 < num && num <= 15) val2_15++;
                            if (15 < num && num <= 20) val2_20++;
                            if (20 < num && num <= 25) val2_25++;
                            if (25 < num && num <= 30) val2_30++;
                            if (30 < num && num <= 35) val2_35++;
                            if (35 < num && num <= 40) val2_40++;
                            if (40 < num && num <= 45) val2_45++;
                            if (45 < num && num <= 50) val2_50++;
                            if (50 < num && num <= 55) val2_55++;
                            if (55 < num && num <= 60) val2_60++;
                            if (60 < num && num <= 65) val2_65++;
                            if (65 < num && num <= 70) val2_70++;
                            if (70 < num && num <= 75) val2_75++;
                            if (75 < num && num <= 80) val2_80++;
                            if (80 < num && num <= 85) val2_85++;
                            if (85 < num && num <= 90) val2_90++;
                            if (90 < num && num <= 95) val2_95++;
                            if (95 < num && num <= 100) val2_100++;

                            if(j + 1 == others.length){
                                //그래프가 안이뻐서 이쁘게하는 노가다
                                var tempArray = [val2_5, val2_10, val2_15, val2_20, val2_25, val2_30, val2_35, val2_40, val2_45, val2_50, val2_55, val2_60, val2_70, val2_75, val2_80, val2_85, val2_90, val2_95, val2_100];
                                var top = 0;
                                top = Math.max.apply(null, tempArray);

                                if(0 <= my_avg1 && my_avg1 <= 5)  g_my_val5 = top;
                                if(5 <  my_avg1 && my_avg1 <= 10)  g_my_val10 = top;
                                if(10 < my_avg1 && my_avg1 <= 15) g_my_val15 = top;
                                if(15 < my_avg1 && my_avg1 <= 20) g_my_val20 = top;
                                if(20 < my_avg1 && my_avg1 <= 25) g_my_val25 = top;
                                if(25 < my_avg1 && my_avg1 <= 30) g_my_val30 = top;
                                if(30 < my_avg1 && my_avg1 <= 35) g_my_val35 = top;
                                if(35 < my_avg1 && my_avg1 <= 40) g_my_val40 = top;
                                if(40 < my_avg1 && my_avg1 <= 45) g_my_val45 = top;
                                if(45 < my_avg1 && my_avg1 <= 50) g_my_val50 = top;
                                if(50 < my_avg1 && my_avg1 <= 55) g_my_val55 = top;
                                if(55 < my_avg1 && my_avg1 <= 60) g_my_val60 = top;
                                if(60 < my_avg1 && my_avg1 <= 65) g_my_val65 = top;
                                if(65 < my_avg1 && my_avg1 <= 70) g_my_val70 = top;
                                if(70 < my_avg1 && my_avg1 <= 75) g_my_val75 = top;
                                if(75 < my_avg1 && my_avg1 <= 80) g_my_val80 = top;
                                if(80 < my_avg1 && my_avg1 <= 85) g_my_val85 = top;
                                if(85 < my_avg1 && my_avg1 <= 90) g_my_val90 = top;
                                if(90 < my_avg1 && my_avg1 <= 95) g_my_val95 = top;
                                if(95 < my_avg1 && my_avg1 <= 100) g_my_val100 = top;
                            }
                        }

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
                    google.charts.load('visualization',
                        { packages: ['corechart', 'bar', 'table'], callback: drawVisualization2 });

                   //google.charts.setOnLoadCallback(drawVisualization2);

                </script>
            </div>

            <!-- 과목별 득점분석 -->
            <div class="htit1Wp">
                <h3 class="htit1 f_left NG"><span class="tx-deep-blue">과목별 득점분석</span></h3>
            </div>
            <table cellspacing="0" cellpadding="0" class="listTb listTb2 mgB4">
                <colgroup>
                    <col style="width: 20%;"/>
                    @for($i=1; $i<=$pCnt+($sCnt*2); $i++)
                        <col style="width: {{ 80 / ($pCnt+$sCnt*2) }}%;"/>
                    @endfor
                </colgroup>
                <thead>
                <tr>
                    <th rowspan="2">구분</th>
                    @foreach($pList as $key => $row)
                        <th rowspan="2">{{ $row }}</th>
                    @endforeach
                    @foreach($sList as $key => $row)
                        <th colspan="2">{{ $row }}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach($sList as $key => $row)
                        <th>원점수</th>
                        <th>조정점수</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>본인</th>
                    @foreach($pList2 as $key => $row)
                    <td>@if($dataDetail) {{ $dataDetail[$key]['grade'] }} @endif</td>
                    @endforeach
                    @foreach($sList2 as $key => $row)
                    <td>{{ $dataDetail[$key]['grade'] }}</td>
                    <td>{{ $dataDetail[$key]['gradeA'] }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>전체</th>
                    @foreach($pList2 as $key => $row)
                    <td>{{ $dataDetail[$key]['avg'] }}</td>
                    @endforeach
                    @foreach($sList2 as $key => $row)
                    <td>{{ $dataDetail[$key]['avg'] }}</td>
                    <td>{{ $dataDetail[$key]['avgA'] }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>최고</th>
                    @foreach($pList2 as $key => $row)
                        <td>{{ $dataDetail[$key]['max'] }}</td>
                    @endforeach
                    @foreach($sList2 as $key => $row)
                        <td>{{ $dataDetail[$key]['max'] }}</td>
                        <td>{{ $dataDetail[$key]['maxA'] }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>과목석차</th>
                    @foreach($pList2 as $key => $row)
                        <td>{{ $dataDetail[$key]['orank'] }}</td>
                    @endforeach
                    @foreach($sList2 as $key => $row)
                        <td>{{ $dataDetail[$key]['orank'] }}</td>
                        <td>{{ $dataDetail[$key]['arank'] }}</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
            <form class="form-horizontal" id="url_form" name="url_form" method="POST" action="/classroom/MockExam/winpopupstep2" onsubmit="return false;">
                {!! csrf_field() !!}
                <input type="hidden" id='prodcode' name="prodcode" value="{{ $prodcode }}" />
                <input type="hidden" id='mridx' name="mridx" value="{{ $mridx }}" />
            </form>
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
                @foreach($pList2 as $key => $row)
                    <tr class="wBx">
                        <th>{{ $row }}</th>
                        <td>
                            <div id="chart3_div{{$key}}" style="width: 800px; height: 165px;"></div>
                        </td>
                    </tr>
                    <script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var my_avg =  parseInt("{{ $dataDetail[$key]['grade'] }}");
                            var tot_avg = parseInt("{{ $dataDetail[$key]['avg'] }}");
                            var top_avg = parseInt("{{ $dataDetail[$key]['max'] }}");

                            var data = google.visualization.arrayToDataTable([
                                ["Element", "점수", { role: "style" } ],
                                ['전체', tot_avg, "blue"],
                                ['최고', top_avg, "blue"],
                                ['본인', my_avg,"blue"]

                            ]);

                            var view = new google.visualization.DataView(data);

                            var options = {
                                vAxis: {minValue:0}
                            };
                            var chart = new google.visualization.BarChart(document.getElementById("chart3_div{{$key}}"));
                            chart.draw(view, options);
                        }
                    </script>
                @endforeach
                @foreach($sList2 as $key => $row)
                    <tr class="wBx">
                        <th>{{ $row }}</th>
                        <td>
                            <div id="chart3_div{{ $key }}" style="width: 800px; height: 165px;"></div>
                        </td>
                    </tr>
                    <script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart2);
                        function drawChart2() {
                            var my_avg =  parseInt("{{ $dataDetail[$key]['grade'] }}");
                            var tot_avg = parseInt("{{ $dataDetail[$key]['avg'] }}");
                            var top_avg = parseInt("{{ $dataDetail[$key]['max'] }}");

                            var data = google.visualization.arrayToDataTable([
                                ["Element", "점수", { role: "style" } ],
                                ['전체', tot_avg, "blue"],
                                ['최고', top_avg, "blue"],
                                ['본인', my_avg,"blue"]

                            ]);

                            var view = new google.visualization.DataView(data);

                            var options = {
                                vAxis: {minValue:0}
                            };
                            var chart = new google.visualization.BarChart(document.getElementById("chart3_div{{$key}}"));
                            chart.draw(view, options);
                        }
                    </script>
                @endforeach

                </tbody>
            </table>

        </div>
        <!-- //popupContainer -->
    </div>

    <script>
        function goLink(type){
            //값이 세팅되면 시작
            if(type == 1){
                var link = "{{ site_url('/classroom/MockResult/winStatSubject') }}";
                document.url_form.action = link;
            }else{
                var link ="{{ site_url('/classroom/MockResult/winAnswerNote') }}";
                document.url_form.action = link;
            }
            document.url_form.submit();
        }

    </script>
@stop
