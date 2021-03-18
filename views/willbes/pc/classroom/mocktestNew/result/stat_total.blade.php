@extends('willbes.pc.layouts.master_popup')
<!-- googlechart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="https://www.google.com/uds/?file=visualization&v=1&packages=corechart" type="text/javascript"></script>
<link href="https://www.google.com/uds/api/visualization/1.0/40ff64b1d9d6b3213524485974f36cc0/ui+ko.css" type="text/css" rel="stylesheet">
<script src="https://www.google.com/uds/api/visualization/1.0/342b7b8453344477d252440b6c1305c9/format+en,default,corechart.I.js" type="text/javascript"></script>

@section('content')
    <div class="Popup ExamBox">
        <div class="popTitBox">
            <div class="pop-Tit NG"><img src="{{ img_url('/mypage/logo.gif') }}"> 전국 모의고사</div>
            <div class="pop-subTit">{{ $productInfo['ProdName'] }}</div>
        </div>
        <div class="popupContainer">
            @include('willbes.pc.classroom.mocktestNew.result.stat_tab_menu_partial')
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
                        <td>{{ $productInfo['MemName'] }}</td>
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
                            <td>{{ round($gradeInfo['SumOrgPoint'], 1) }}</td>
                            <td>{{ round($gradeInfo['SumAdjustPoint'], 1) }}</td>
                        </tr>
                        <tr>
                            <td>평균</td>
                            <td>{{ $gradeInfo['AvgOrgPoint'] }}</td>
                            <td>{{ $gradeInfo['AvgAdjustPoint'] }}</td>
                        </tr>
                        <tr>
                            <td>전체평균</td>
                            <td>{{ $gradeInfo['TotalAvgOrgPoint'] }}</td>
                            <td>{{ $gradeInfo['TotalAvgAdjustPoint'] }}</td>
                        </tr>
                        <tr>
                            <td>석차</td>
                            <td>{{ $gradeInfo['OrgRankNum'] }} / {{ $gradeInfo['TotalCount'] }}</td>
                            <td>{{ $gradeInfo['AdjustRankNum'] }} / {{ $gradeInfo['TotalCount'] }}</td>
                        </tr>
                        <tr>
                            <td>상위수준</td>
                            <td>{!! (empty($gradeInfo['TotalCount']) === false ? round(($gradeInfo['OrgRankNum'] / $gradeInfo['TotalCount']) * 100, 2) : '0') !!} %</td>
                            <td>{!! (empty($gradeInfo['TotalCount']) === false ? round(($gradeInfo['AdjustRankNum'] / $gradeInfo['TotalCount']) * 100, 2) : '0') !!} %</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="f_right wBx mt35 mb30">
                    <div id="chart_div1" style="width: 410px; height: 265px;"></div>
                </div>
                <div class="gBx mgB4">
                    <p class="anlyTx">
                        <strong>{{ $gradeInfo['MemName'] }}</strong>님의 점수는
                        평균 <strong>{{ $gradeInfo['AvgAdjustPoint'] }}점</strong>으로,
                        전체 <strong>{{ $gradeInfo['TotalCount'] }}명</strong>에서 <strong>{{ $gradeInfo['AdjustRankNum'] }}위</strong>이며
                        상위 수준 <strong>{!! (empty($gradeInfo['TotalCount']) === false ? round(($gradeInfo['AdjustRankNum'] / $gradeInfo['TotalCount']) * 100, 2) : '0') !!} %</strong>입니다.
                    </p>
                </div>
            </div>
            <!-- 종합분석 -->

            <!-- 전체 응시자 평균점수 분포표 -->
            <div class="htit1Wp">
                <h3 class="htit1 f_left NG"><span class="tx-deep-blue">전체 응시자 평균점수 분포표</span></h3>
            </div>
            <div class="wBx graph-info">
                <div id="chart_div2" style="width: 900px; height: 365px;"></div>
            </div>
            <!-- 전체 응시자 평균점수 분포표 -->

            <!-- 과목별 득점분석 -->
            <div class="htit1Wp">
                <h3 class="htit1 f_left NG"><span class="tx-deep-blue">과목별 득점분석</span></h3>
            </div>
            <table cellspacing="0" cellpadding="0" class="listTb listTb2 mgB4">
                <thead>
                <tr>
                    <th class="valign-middle" rowspan="2" style="width: 15%">구분</th>
                    @foreach($subject_data['arr_subject_e'] as $row)
                        <th class="valign-middle" rowspan="2">{{ $row['subject_name'] }}</th>
                    @endforeach
                    @foreach($subject_data['arr_subject_s'] as $row)
                        <th class="valign-middle" colspan="2">{{ $row['subject_name'] }}</th>
                    @endforeach
                </tr>
                @if(empty($subject_data['arr_subject_s']) === false)
                    <tr>
                        @foreach($subject_data['arr_subject_s'] as $row)
                            <th>원점수</th>
                            <th>조정점수</th>
                        @endforeach
                    </tr>
                @endif
                </thead>

                <tbody>
                @foreach($subject_data['data_e'] as $data_key => $data_row)
                    <tr>
                        <td>{{ $data_key }}</td>
                        @foreach($data_row as $mp_idx => $val)
                            <td class="valign-middle">{{ $val }}</td>
                        @endforeach

                        @if(empty($subject_data['data_s']) === false)
                            @foreach($subject_data['data_s'] as $data_key_s => $data_row_s)
                                @if($data_key == $data_key_s)
                                    @if ($data_key == '과목석차' || $data_key == '백분위')
                                        @foreach($data_row_s as $mp_idx => $val)
                                            <td class="valign-middle" colspan="2">{{ $val['adjust'] }}</td>
                                        @endforeach
                                    @else
                                        @foreach($data_row_s as $mp_idx => $val)
                                            <td>{{ $val['org'] }}</td>
                                            <td>{{ $val['adjust'] }}</td>
                                        @endforeach
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    </tr>
                @endforeach
                @foreach($subject_data['data_default_e'] as $data_key => $data_row)
                    <tr>
                        <td>{{ $data_key }}</td>
                        @foreach($data_row as $mp_idx => $val)
                            <td>{{ $val }}</td>
                        @endforeach

                        @if(empty($subject_data['data_default_s']) === false)
                            @foreach($subject_data['data_default_s'] as $data_key_s => $data_row_s)
                                @if($data_key == $data_key_s)
                                    @foreach($data_row_s as $mp_idx => $val)
                                        <td colspan="2">{{ $val }}</td>
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- 과목별 득점분석 -->

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
                @foreach($subject_graph as $key => $row)
                    <tr class="wBx">
                        <th>{{ $row['SubjectName'] }}</th>
                        <td>
                            <div class="chart_div3" id="chart_div3_{{$key}}" data-my-avg="{{ (empty($row['MyAdjustPoint']) === false ? $row['MyAdjustPoint'] : 0) }}"
                                 data-tot-avg="{{ $row['AvgAdjustPoint'] }}" data-top-avg="{{ $row['MaxAdjustPoint'] }}" style="width: 800px; height: 165px;"></div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- 과목별 점수위치 -->
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            google.charts.load('visualization', {'packages': ['corechart'], 'callback': drawVisualization});
            google.charts.load('visualization',{ packages: ['corechart', 'bar', 'table'], callback: drawVisualization2 });
            google.charts.load('current', {'packages': ['corechart'], 'callback': drawVisualization3});
        });

        function drawVisualization() {
            var tot_avg = parseFloat("{{ (empty($gradeInfo['MrTotalAvgAdjustPoint']) === false ? $gradeInfo['MrTotalAvgAdjustPoint'] : 0) }}");
            var top_avg = parseFloat("{{ (empty($gradeInfo['MaxPoint']) === false ? $gradeInfo['MaxPoint'] : 0) }}");
            var my_sum = parseFloat("{{ (empty($gradeInfo['SumAdjustPoint']) === false ? $gradeInfo['SumAdjustPoint'] : 0) }}");

            // Some raw data (not necessarily accurate)
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', '점수');
            data.addRows([
                ['전체평균', tot_avg],
                ['최고', top_avg],
                ['본인', my_sum]
            ]);
            var options = {
                title : '조정점수 기준'
                ,seriesType: "bars"
                ,vAxis: {minValue:0}
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_div1'));
            chart.draw(data, options);
        }

        function drawVisualization2() {
            var arr_point = {!! json_encode($selectivityInfo) !!};
            var arr_data = [["Score","분포도","내 평균"]];
            $.each(arr_point, function (index, item) {
                arr_data.push([item['p_type'],parseInt(item['cnt']),parseInt(item['MemAvgAdjustPoint'])]);
            });

            var data = google.visualization.arrayToDataTable(arr_data);
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

        function drawVisualization3() {
            $(".chart_div3").each(function (index) {
                var tot_avg = parseFloat($("#chart_div3_"+index).data('tot-avg'));
                var top_avg = parseFloat($("#chart_div3_"+index).data('top-avg'));
                var my_avg = parseFloat($("#chart_div3_"+index).data('my-avg'));

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
                var chart = new google.visualization.BarChart(document.getElementById("chart_div3_"+index));
                chart.draw(view, options);
            });
        }

        function printPage() {
            $.print('#widthFrame');
        }
    </script>
@stop