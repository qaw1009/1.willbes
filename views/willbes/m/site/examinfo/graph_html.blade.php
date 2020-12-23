<div id="chart_div1" style="width: 100%; height: 400px;"></div>
<div id="chart_div2" style="width: 100%; height: 400px;"></div>

<script type="text/javascript">
    $(document).ready(function() {
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawVisualization1);

        function drawVisualization1() {
            var chart_width = $('#trend_area').width();
            var charArea_width = (chart_width * 65) / 100
            var data = google.visualization.arrayToDataTable([
                ['학년도', '경쟁률',  {type: 'number', role: 'annotation'},],
                    @foreach($arr_base['graph_table_data'] as $key => $val)
                ['{{$val['YearTarget']}}{{($val['TakeType'] == '2' ? ' 추시' : '')}}', {v: {{$val['AvgData']}}, f:'{{$val['AvgData']}}'}, {{$val['AvgData']}}],
                @endforeach
            ]);
            var options = {
                title : '(경쟁률)',
                width : chart_width,
                chartArea: { width : charArea_width},
                vAxes: {
                    0:{
                        gridlines : { count : 5 },
                        format: '#\':1\''
                    }
                },
                hAxis: {title: ""},
                //isStacked: true,
                seriesType: "bars",
                series: {
                    0: { type: "line"}
                },
                axes: {
                    y: {
                        count: {label: '인원'},
                        ratio: {side: 'right', label: '비율'}
                    }
                },
                annotations: {
                    alwaysOutside: true,
                    textStyle: {
                        fontSize: 9,
                        auraColor: 'none',
                        color: '#555'
                    },
                },
                fontSize: 9
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_div1'));
            chart.draw(data, options);

            var data = google.visualization.arrayToDataTable([
                ['학년도', '모집', {type: 'number', role: 'annotation'}, '지원', {type: 'number', role: 'annotation'},],
                    @foreach($arr_base['graph_table_data'] as $key => $val)
                [
                    '{{$val['YearTarget']}}{{($val['TakeType'] == '2' ? ' 추시' : '')}}'
                    , {{$val['NoticeNumber']}}, {{$val['NoticeNumber']}}, {{$val['TakeNumber']}}, {{$val['TakeNumber']}}
                ],
                @endforeach
            ]);
            var options1 = {
                title : '(명)',
                width : chart_width,
                chartArea: { width : charArea_width},
                vAxis: {title: ""},
                hAxis: {title: ""},
                //isStacked: true,
                seriesType: "bars",
                axes: {
                    y: {
                        count: {label: '인원'},
                        ratio: {side: 'right', label: '비율'}
                    }
                },
                annotations: {
                    alwaysOutside: true,
                    textStyle: {
                        fontSize: 9,
                        auraColor: 'none',
                        color: '#555'
                    },
                },
                fontSize: 9
            };
            var colom = new google.visualization.ComboChart(document.getElementById('chart_div2'));
            colom.draw(data, options1);
        }
    });
</script>