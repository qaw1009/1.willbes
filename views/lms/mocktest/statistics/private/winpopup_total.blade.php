@extends('lcms.layouts.master_modal')

@section('layer_title')
    전국모의고사
@stop

@section('layer_header')
    <form class="form-horizontal" id="_sub_refund_check_form" name="_sub_refund_check_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}

    @endsection
    @section('layer_content')
            <div class="form-group mt-20">
                <div class="col-md-11">
                    <ul class="nav nav-pills" role="tablist">
                        <li role="presentation" class="active"><a href="#none">전체 성적 분석</a></li>
                        <li role="presentation" class="act-move" data-idx="{{ $prodcode }}" data-mem="{{ $mem_idx }}"><a href="#">과목별 문항분석</a></li>
                    </ul>
                </div>
                <div class="col-md-1 form-inline">
                    <!-- //tab -->
                    <p><a href="javascript:printPage()" class="btn btn-default" role="button">출력</a></p>
                </div>
            </div>
            <div class="mt-50">
                <table id="list_ajax_table_model" class="table table-striped table-bordered">
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
                        <td>{{ substr($productInfo['SaleStartDatm'],0,10) }}</td>
                        <td>{{ $productInfo['CateName'] }}</td>
                        <td>

                            @foreach($productInfo['MockPartName'] as $key => $row)
                                {{ $row }}<br>
                            @endforeach
                        </td>
                        <td>{{ $productInfo['TakeNumber'] }}</td>
                        <td>{{ $memName }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <h5 class="mt-30 mb-30 bold">종합분석</h5>
                    <table id="list_ajax_table_model" class="table table-striped table-bordered">
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
                            <td>@if($dataOrg) {{ $dataOrg[$mem_idx]['grade'] }} @endif</td>
                            <td>@if($dataAdjust) {{ $dataAdjust[$mem_idx]['grade'] }} @endif</td>
                        </tr>
                        <tr>
                            <td>평균</td>
                            <td>@if($dataOrg) {{ $dataOrg[$mem_idx]['avg'] }} @endif</td>
                            <td>@if($dataAdjust) {{ $dataAdjust[$mem_idx]['avg'] }} @endif</td>
                        </tr>
                        <tr>
                            <td>전체평균</td>
                            <td>@if($dataOrg) {{ $dataOrgAll['tavg'] }} @endif</td>
                            <td>@if($dataAdjust) {{ $dataAdjustAll['tavg'] }} @endif</td>
                        </tr>
                        <tr>
                            <td>석차</td>
                            <td>@if($dataOrg) {{ $dataOrg[$mem_idx]['rank'] }} @endif</td>
                            <td>@if($dataAdjust) {{ $dataAdjust[$mem_idx]['rank'] }} @endif</td>
                        </tr>
                        <tr>
                            <td>상위수준</td>
                            <td>@if($dataOrg) {{  $dataOrg[$mem_idx]['tpct'] }}% @endif</td>
                            <td>@if($dataAdjust) {{ $dataAdjust[$mem_idx]['tpct'] }}% @endif</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <div id="chart_div1" style="width: 450px; height: 265px;"></div>

                    <script type="text/javascript">

                        var tot_avg1 = parseInt("{{ $dataAdjustAll['tsum'] }}");
                        var top_avg1 = parseInt("{{ $dataAdjust[$mem_idx]['admax'] }}");
                        var my_avg1 = parseInt("{{ $dataAdjust[$mem_idx]['grade'] }}");
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
            </div>
            <div class="form-group border-dark">
                <div class="col-md-12">
                @if($dataOrg)
                    <p class="h5 border-dark-blue"><strong>{{ $memName }}</strong>님의 점수는 평균 <strong>{{ $dataAdjust[$mem_idx]['avg'] }}점</strong>으로, 전체 <strong>{{ $dataAdjustAll[0]['COUNT'] }}명</strong>에서 <strong>{{ $dataAdjust[$mem_idx]['rankS'] }}위</strong>이며 상위 수준 <strong>{{ $dataAdjust[$mem_idx]['tpct'] }} %</strong>입니다.</p>
                @endif
                </div>
            </div>
            <!-- 전체 응시자 평균점수 분포표 -->
            <div class="form-group">
                <div class="col-md-12">
                    <h5 class="bold">전체 응시자 평균점수 분포표</h5>
                    <div class="wBx graph-info">
                        <div id="chart_div2" style="width: 900px; height: 365px;"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 900px; height: 365px;"><div aria-label="차트입니다." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="900" height="365" aria-label="차트입니다." style="overflow: hidden;"><defs id="defs"><clipPath id="_ABSTRACT_RENDERER_ID_6"><rect x="133" y="70" width="635" height="226"></rect></clipPath></defs><rect x="0" y="0" width="900" height="365" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><text text-anchor="start" x="133" y="44.9" font-family="Arial" font-size="14" font-weight="bold" stroke="none" stroke-width="0" fill="#000000">조정점수 기준</text><rect x="133" y="33" width="635" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g><g><rect x="782" y="70" width="104" height="37" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><rect x="782" y="70" width="104" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="815" y="81.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">분포도</text></g><path d="M782,77L810,77" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path></g><g><rect x="782" y="93" width="104" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="815" y="104.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">It' you</text></g><rect x="782" y="93" width="28" height="14" stroke="none" stroke-width="0" fill="#dc3912"></rect></g></g><g><rect x="133" y="70" width="635" height="226" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(http://www.willbesgosi.net/mypage/stats/list.html?topMenuType=O&amp;topMenuGnb=OM_009&amp;topMenu=MAIN&amp;menuID=OM_009_004_002&amp;IDENTYID=03001011013&amp;MOCKCODE=E18000001#_ABSTRACT_RENDERER_ID_6)"><g><rect x="133" y="295" width="635" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="133" y="239" width="635" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="133" y="183" width="635" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="133" y="126" width="635" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="133" y="70" width="635" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect></g><g><rect x="235" y="127" width="19" height="168" stroke="none" stroke-width="0" fill="#dc3912"></rect></g><g><rect x="133" y="295" width="635" height="1" stroke="none" stroke-width="0" fill="#333333"></rect></g><g><path d="M149.35,239.25L181.05,295.5L212.75,225.1875L244.45,253.3125L276.15,281.4375L307.85,253.3125L339.54999999999995,281.4375L371.25,267.375L402.95,281.4375L434.65,253.3125L466.34999999999997,197.0625L498.05,239.25L529.75,126.75L561.45,211.125L593.15,267.375L624.8499999999999,267.375L656.55,295.5L688.25,295.5L719.9499999999999,295.5L751.65,295.5" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path></g></g><g></g><g><g><text text-anchor="middle" x="149.35" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">5</text></g><g><text text-anchor="middle" x="181.05" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">10</text></g><g><text text-anchor="middle" x="212.75" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">15</text></g><g><text text-anchor="middle" x="244.45" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">20</text></g><g><text text-anchor="middle" x="276.15" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">25</text></g><g><text text-anchor="middle" x="307.85" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">30</text></g><g><text text-anchor="middle" x="339.54999999999995" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">35</text></g><g><text text-anchor="middle" x="371.25" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">40</text></g><g><text text-anchor="middle" x="402.95" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">45</text></g><g><text text-anchor="middle" x="434.65" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">50</text></g><g><text text-anchor="middle" x="466.34999999999997" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">55</text></g><g><text text-anchor="middle" x="498.05" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">60</text></g><g><text text-anchor="middle" x="529.75" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">65</text></g><g><text text-anchor="middle" x="561.45" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">70</text></g><g><text text-anchor="middle" x="593.15" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">75</text></g><g><text text-anchor="middle" x="624.8499999999999" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">80</text></g><g><text text-anchor="middle" x="656.55" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">85</text></g><g><text text-anchor="middle" x="688.25" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">90</text></g><g><text text-anchor="middle" x="719.9499999999999" y="316.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">95</text></g><g><text text-anchor="middle" x="751.65" y="334.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">100</text></g><g><text text-anchor="end" x="119" y="300.4" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="end" x="119" y="244.15" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">4</text></g><g><text text-anchor="end" x="119" y="187.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">8</text></g><g><text text-anchor="end" x="119" y="131.65" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">12</text></g><g><text text-anchor="end" x="119" y="75.4" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">16</text></g></g></g><g></g></svg><div aria-label="차트의 데이터를 나타낸 표입니다." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Score</th><th>분포도</th><th>It' you</th></tr></thead><tbody><tr><td>5</td><td>4</td><td></td></tr><tr><td>10</td><td>0</td><td></td></tr><tr><td>15</td><td>5</td><td></td></tr><tr><td>20</td><td>3</td><td>12</td></tr><tr><td>25</td><td>1</td><td></td></tr><tr><td>30</td><td>3</td><td></td></tr><tr><td>35</td><td>1</td><td></td></tr><tr><td>40</td><td>2</td><td></td></tr><tr><td>45</td><td>1</td><td></td></tr><tr><td>50</td><td>3</td><td></td></tr><tr><td>55</td><td>7</td><td></td></tr><tr><td>60</td><td>4</td><td></td></tr><tr><td>65</td><td>12</td><td></td></tr><tr><td>70</td><td>6</td><td></td></tr><tr><td>75</td><td>2</td><td></td></tr><tr><td>80</td><td>2</td><td></td></tr><tr><td>85</td><td>0</td><td></td></tr><tr><td>90</td><td>0</td><td></td></tr><tr><td>95</td><td>0</td><td></td></tr><tr><td>100</td><td>0</td><td></td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 375px; left: 910px; white-space: nowrap; font-family: Arial; font-size: 14px;">It' you</div><div></div></div></div>
                        <script type="text/javascript">


                            function drawVisualization2() {
                                var others = 10;
                                var my_avg1 = 20;

                                if(0 <= others && others <= 5)  var val2_5 = others;
                                if(5 < others && others <= 10)  var val2_10 = others;
                                if(10 < others && others <= 15) var val2_15 = others;
                                if(15 < others && others <= 20) var val2_20 = others;
                                if(20 < others && others <= 25) var val2_25 = others;
                                if(25 < others && others <= 30) var val2_30 = others;
                                if(30 < others && others <= 35) var val2_35 = others;
                                if(35 < others && others <= 40) var val2_40 = others;
                                if(40 < others && others <= 45) var val2_45 = others;
                                if(45 < others && others <= 50) var val2_50 = others;
                                if(50 < others && others <= 55) var val2_55 = others;
                                if(55 < others && others <= 60) var val2_60 = others;
                                if(60 < others && others <= 65) var val2_65 = others;
                                if(65 < others && others <= 70) var val2_70 = others;
                                if(70 < others && others <= 75) var val2_75 = others;
                                if(75 < others && others <= 80) var val2_80 = others;
                                if(80 < others && others <= 85) var val2_85 = others;
                                if(85 < others && others <= 90) var val2_90 = others;
                                if(90 < others && others <= 95) var val2_95 = others;
                                if(95 < others && others <= 100) var val2_100 = others;

                                if(0 <= my_avg1 && my_avg1 <= 5)  var g_my_val5 = my_avg1;
                                if(5 <  my_avg1 && my_avg1 <= 10)  var g_my_val10 = my_avg1;
                                if(10 < my_avg1 && my_avg1 <= 15) var g_my_val15 = my_avg1;
                                if(15 < my_avg1 && my_avg1 <= 20) var g_my_val20 = my_avg1;
                                if(20 < my_avg1 && my_avg1 <= 25) var g_my_val25 = my_avg1;
                                if(25 < my_avg1 && my_avg1 <= 30) var g_my_val30 = my_avg1;
                                if(30 < my_avg1 && my_avg1 <= 35) var g_my_val35 = my_avg1;
                                if(35 < my_avg1 && my_avg1 <= 40) var g_my_val40 = my_avg1;
                                if(40 < my_avg1 && my_avg1 <= 45) var g_my_val45 = my_avg1;
                                if(45 < my_avg1 && my_avg1 <= 50) var g_my_val50 = my_avg1;
                                if(50 < my_avg1 && my_avg1 <= 55) var g_my_val55 = my_avg1;
                                if(55 < my_avg1 && my_avg1 <= 60) var g_my_val60 = my_avg1;
                                if(60 < my_avg1 && my_avg1 <= 65) var g_my_val65 = my_avg1;
                                if(65 < my_avg1 && my_avg1 <= 70) var g_my_val70 = my_avg1;
                                if(70 < my_avg1 && my_avg1 <= 75) var g_my_val75 = my_avg1;
                                if(75 < my_avg1 && my_avg1 <= 80) var g_my_val80 = my_avg1;
                                if(80 < my_avg1 && my_avg1 <= 85) var g_my_val85 = my_avg1;
                                if(85 < my_avg1 && my_avg1 <= 90) var g_my_val90 = my_avg1;
                                if(90 < my_avg1 && my_avg1 <= 95) var g_my_val95 = my_avg1;
                                if(95 < my_avg1 && my_avg1 <= 100) var g_my_val100 = my_avg1;

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
                        <h5 class="bold"><span class="tx-deep-blue">과목별 득점분석</span></h5>
                    </div>
                    <table id="list_ajax_table_model" class="table table-striped table-bordered">
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

                            <th>본인 </th>
                            @foreach($pList2 as $key => $row)
                                <td>{{ $dataDetail[$mem_idx][$key]['grade'] }}</td>
                            @endforeach
                            @foreach($sList2 as $key => $row)
                                <td>{{ $dataDetail[$mem_idx][$key]['grade'] }}</td>
                                <td>{{ $dataDetail[$mem_idx][$key]['gradeA'] }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <th>전체</th>
                            @foreach($pList2 as $key => $row)
                                <td>{{ $dataDetail[$mem_idx][$key]['avg'] }}</td>
                            @endforeach
                            @foreach($sList2 as $key => $row)
                                <td>{{ $dataDetail[$mem_idx][$key]['avg'] }}</td>
                                <td>{{ $dataDetail[$mem_idx][$key]['avgA'] }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <th>최고</th>
                            @foreach($pList2 as $key => $row)
                                <td>{{ $dataDetail[$mem_idx][$key]['max'] }}</td>
                            @endforeach
                            @foreach($sList2 as $key => $row)
                                <td>{{ $dataDetail[$mem_idx][$key]['max'] }}</td>
                                <td>{{ $dataDetail[$mem_idx][$key]['maxA'] }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <th>과목석차</th>
                            @foreach($pList2 as $key => $row)
                                <td>{{ $dataDetail[$mem_idx][$key]['orank'] }}</td>
                            @endforeach
                            @foreach($sList2 as $key => $row)
                                <td>{{ $dataDetail[$mem_idx][$key]['orank'] }}</td>
                                <td>{{ $dataDetail[$mem_idx][$key]['arank'] }}</td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                    <form class="form-horizontal" id="url_form" name="url_form" method="POST" action="/classroom/MockExam/winpopupstep2" onsubmit="return false;">
                        {!! csrf_field() !!}
                        <input type="hidden" id='prodcode' name="prodcode" value="{{ $prodcode }}" />
                    </form>
                    <!-- 과목별 점수위치 -->
                    <div class="htit1Wp">
                        <h5 class="bold mt50"><span class="tx-deep-blue">과목별 점수위치</span></h5>
                    </div>
                    <table id="list_ajax_table_model" class="table table-striped table-bordered">
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
                                    var my_avg =  parseInt("{{ $dataDetail[$mem_idx][$key]['grade'] }}");
                                    var tot_avg = parseInt("{{ $dataDetail[$mem_idx][$key]['avg'] }}");
                                    var top_avg = parseInt("{{ $dataDetail[$mem_idx][$key]['max'] }}");

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
                                    var my_avg =  parseInt("{{ $dataDetail[$mem_idx][$key]['grade'] }}");
                                    var tot_avg = parseInt("{{ $dataDetail[$mem_idx][$key]['avg'] }}");
                                    var top_avg = parseInt("{{ $dataDetail[$mem_idx][$key]['max'] }}");

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
            </div>
    <script>
        $(document).ready(function() {

            // 모달창 오픈
            $('.act-move').on('click', function() {

                var uri_param;
                var prodcode = $(this).data('idx');
                var memidx = $(this).data('mem');

                uri_param = 'prodcode=' + prodcode + '&memidx=' + memidx;

                $('.act-move').setLayer({
                    'url' : '{{ site_url() }}' + '/mocktest/statisticsPrivate/winStatSubject?' + uri_param,
                    'width' : 1400
                });
            });

        });

        //인쇄
        function printPage(){
            var initBody;
            window.onbeforeprint = function(){
                initBody = document.body.innerHTML;
                document.body.innerHTML =  $('.modal-body').html();
            };
            window.onafterprint = function(){
                document.body.innerHTML = initBody;
            };
            window.print();
            return false;
        }
    </script>
        @stop
        @section('add_buttons')
        @endsection

        @section('layer_footer')
        </form>
@endsection