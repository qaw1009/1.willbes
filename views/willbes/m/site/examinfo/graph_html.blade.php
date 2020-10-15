<div id="chart_div1_{{$subject_ccd}}" {{--style="width: 100%"--}}></div>
<div id="chart_div2_{{$subject_ccd}}" {{--style="width: 100%"--}}></div>

<script type="text/javascript">
    $(document).ready(function() {
        google.charts.load('current', {packages: ['corechart', 'line']});
        google.charts.setOnLoadCallback(drawVisualization1);

        function drawVisualization1() {
            var data = google.visualization.arrayToDataTable([
                ['학년도', '경쟁률',  {type: 'number', role: 'annotation'},],
                    @foreach($arr_base['graph_table_data'] as $key => $val)
                ['{{$key}}{{($val['TakeType'] == '2' ? ' 추시' : '')}}{{($loop->last === true) ? '\n(학년도)' : ''}}', {v: {{$val['AvgData']}}, f:'{{$val['AvgData']}}'}, {{$val['AvgData']}}],
                @endforeach
            ]);
            var chart_width = $('#trend_area').width();
            var options = {
                title : '(경쟁률)',
                width : chart_width,
                chartArea: { width : chart_width },
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
                        fontSize: 12,
                        auraColor: 'none',
                        color: '#555'
                    },
                },
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_div1_'+{{$subject_ccd}}));
            chart.draw(data, options);

            var data = google.visualization.arrayToDataTable([
                ['학년도', '모집인원', {type: 'number', role: 'annotation'}, '지원자 수', {type: 'number', role: 'annotation'},],
                    @foreach($arr_base['graph_table_data'] as $key => $val)
                [
                    '{{$key}}{{($val['TakeType'] == '2' ? ' 추시' : '')}}{{($loop->last === true) ? '\n(학년도)' : ''}}'
                    , {{$val['NoticeNumber']}}, {{$val['NoticeNumber']}}, {{$val['TakeNumber']}}, {{$val['TakeNumber']}}
                ],
                @endforeach
            ]);
            var options1 = {
                title : '(명)',
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
                        fontSize: 12,
                        auraColor: 'none',
                        color: '#555'
                    },
                },
            };
            var colom = new google.visualization.ComboChart(document.getElementById('chart_div2_'+{{$subject_ccd}}));
            colom.draw(data, options1);
        }
    });
</script>