@extends('lcms.layouts.master_modal')

@section('layer_title')
    학습량 현황
@stop

@section('layer_content')
    <form class="form-horizontal">
        <div class="form-group-sm">
            @if(empty($chartdata['prod']) == false)
            <div class="form-group">
                <label class="control-label col-md-2">
                    이번달 학습 시간
                </label>
                <div class="col-md-8 form-inline">
                    {{$chartdata['month_sum']['h']}}시간 {{$chartdata['month_sum']['m']}}분 (수강강의 : {{$chartdata['month_sum']['ProdCnt']}}개)
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">
                    오늘 수강 강좌
                </label>
                <div class="col-md-8 form-inline">
                    {{$chartdata['today']['ProdCnt']}}개
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">
                    강좌명
                </label>
                <div class="col-md-8 form-inline">
                    {{$chartdata['prod']['ProdName']}}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">
                    수강기간
                </label>
                <div class="col-md-8 form-inline">
                    <span class="tx-blue">{{str_replace('-', '.', $chartdata['prod']['LecStartDate'])}}~{{str_replace('-', '.', $chartdata['prod']['RealLecEndDate'])}}</span> (잔여기간 <span class="tx-red">{{$chartdata['prod']['remainDays']}}일</span>)
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">
                    수강중인 강좌수
                </label>
                <div class="col-md-8 form-inline">
                    <p><span class="tx-blue">{{$chartdata['prod']['TakeLecNum']}}강좌</span> / {{$chartdata['prod']['LecNum']}}강좌</p>
                </div>
            </div>
            @else
                <div class="form-group">
                    <label class="control-label col-md-2">
                        강좌명
                    </label>
                    <div class="col-md-8 form-inline">
                        수강중인강좌없음
                    </div>
                </div>
            @endif
        </div>
    </form>

    <canvas id="chart_div" width="850" height="500"></canvas>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script type="text/javascript">
        const $colors = ['#ad78b0', '#00496a', '#bd8a5b', '#f88268', '#73b062'];
        const $data = {
            labels: [@foreach($chartdata['month'] as $month_key => $month) '{{$month_key}}', @endforeach],
            datasets: [
                    @php $i = 0 @endphp
                    @foreach($chartdata['all'] as $key => $row)
                {
                    label: '{{$key}}',
                    data: [@foreach($chartdata['month'] as $month_key => $month) {{ empty($month[$key]) == True ? 0 : $month[$key]['Cnt'] }}, @endforeach],
                    backgroundColor: $colors[{{$i}}],
                },
                @php $i++ @endphp
                @endforeach
            ]
        };
        const $config = {
            type: 'bar',
            data: $data,
            options: {
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxHeight:21
                        }
                    }
                },
                responsive: false,
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        };
        var $ctx = document.getElementById('chart_div').getContext('2d');
        var myChart = new Chart($ctx, $config);

        function drawVisualization() {
            var data = google.visualization.arrayToDataTable([
                [ '날짜' @foreach($chartdata['all'] as $key => $row) , '{{$key}}' @endforeach ]
                @foreach($chartdata['month'] as $month_key => $month)
                ,[ '{{$month_key}}' @foreach($chartdata['all'] as $key => $row) , {{ empty($month[$key]) == True ? 0 : $month[$key]['Cnt'] }} @endforeach
                ]
                @endforeach
            ]);

            var options = {
                isStacked: true,
                width:850,
                height:500,
                chartArea:{
                    left:0,
                    top:0,
                    width:'100%',
                    height:'95%'
                },
                legend : {
                    position :'none'
                },
                colors: ['#ad78b0', '#00496a', '#bd8a5b', '#f88268', '#73b062']
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
@stop