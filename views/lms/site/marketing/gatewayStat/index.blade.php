@extends('lcms.layouts.master')
@section('content')
    <h5>- 광고 통계를 확인 할 수 있는 메뉴입니다. </h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_type">통합검색</label>
                    <div class="col-md-5 form-inline">
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:300px;" value="{{element('search_value', $arr_input)}}"> 계약명
                    </div>
                    <label class="control-label col-md-1" for="search_type">계약일</label>
                    <div class="col-md-5 form-inline">
                        <select name="search_date_type" class="form-control mr-10">
                            <option value='StartDate' {{ (element('search_date_type', $arr_input) == 'StartDate') ? 'selected = "selected"' : ''}}>시작일</option>
                            <option value='EndDate' {{ (element('search_date_type', $arr_input) == 'EndDate') ? 'selected = "selected"' : ''}}>종료일</option>
                        </select>
                        <input name="search_sdate"  class="form-control datepicker" id="search_sdate" style="width: 100px;"  type="text"  value="{{element('search_sdate', $arr_input)}}">
                        ~ <input name="search_edate"  class="form-control datepicker" id="search_edate" style="width: 100px;"  type="text"  value="{{element('search_edate', $arr_input)}}">
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>

    <div class="x_panel">
        <div class="x_content">
            <div class="form-group chart_div"></div>
        </div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var cont_idx = [
                    @foreach($contract_data as $row)
                        @if($row['ClickCnt'] > 0 || $row['MemCnt'] > 0 || $row['CartCnt'] > 0 || $row['OrderCnt'] > 0)
                            {{$row['ContIdx']}},
                        @endif
                    @endforeach
                ];
                var contract_options = [
                    @foreach($contract_data as $row)
                        @if($row['ClickCnt'] > 0 || $row['MemCnt'] > 0 || $row['CartCnt'] > 0 || $row['OrderCnt'] > 0)
                            {
                                title : '{{$row['ContName']}} - [ {{$row['ClickCnt']}} ] 회 접속',
                                is3D: true,
                                colors: ['#78C900','#0036EA', '#EAA400', '#CE0600'],
                            },
                        @endif
                    @endforeach
                ];
                var contract_data = [
                    @foreach($contract_data as $row)
                        @if($row['ClickCnt'] > 0 || $row['MemCnt'] > 0 || $row['CartCnt'] > 0 || $row['OrderCnt'] > 0 )
                            [
                                ['계약', '계약단위전체'],
                                ['접속수',   {{$row['ClickCnt']}}],
                                ['회원가입수',   {{$row['MemCnt']}}],
                                ['장바구니수',   {{$row['CartCnt']}}],
                                ['결제건수',    {{$row['OrderCnt']}}]
                            ],
                        @endif
                    @endforeach
                ];

                var gateway_options = [
                    @foreach($contract_data as $row)
                        @if($row['ClickCnt'] > 0 || $row['MemCnt'] > 0 || $row['CartCnt'] > 0 || $row['OrderCnt'] > 0)
                            {
                                vAxis: {title: ''},
                                hAxis: {title: ''},
                                seriesType: 'bars',
                                series: {4: {type: 'line'}},
                                colors: ['#78C900', '#0036EA', '#EAA400', '#CE0600'],
                            },
                        @endif
                    @endforeach
                ];

                var gateway_data = [
                    @foreach($contract_data as $row)
                        @if($row['ClickCnt'] > 0 || $row['MemCnt'] > 0 || $row['CartCnt'] > 0 || $row['OrderCnt'] > 0)
                            @if(empty($gateway_data) != true)
                                [
                                    ['광고명', '접속수', '회원가입수', '장바구니수', '결제건수'],
                                @foreach($gateway_data as $gateway_row)
                                    @if($gateway_row['ContIdx'] == $row['ContIdx'])
                                    ['{{$gateway_row['GwName']}}',  {{$gateway_row['ClickCnt']}},{{$gateway_row['MemCnt']}},{{$gateway_row['CartCnt']}},{{$gateway_row['OrderCnt']}}],
                                    @endif
                                @endforeach
                                ],
                            @endif
                        @endif
                    @endforeach
                ];

                for(i=0;i<contract_data.length;i++) {
                    $( ".chart_div" ).append( " <div id=\"contract"+i+"\" class=\"col-md-3 form-inline\" style=\"width: 500px; height: 350px;\"></div>" +
                        "<div id=\"gateway"+i+"\"  class=\"col-md-7 form-inline cont_idx\" style=\"width: 800px; height: 350px;\" data-idx=\""+cont_idx[i]+"\"></div>" );
                    makeChart(contract_data[i], contract_options[i], 'PieChart', 'contract'+i);
                    makeChart(gateway_data[i], gateway_options[i], 'ComboChart', 'gateway'+i);
                }
            }

            function makeChart(chartData, chartOption, chartType, div)
            {
                var data = google.visualization.arrayToDataTable(chartData);
                var options = {};options = chartOption;
                var obj = eval("google.visualization."+chartType);
                var chart = new obj(document.getElementById(div));
                chart.draw(data, options);
            }

            $(document).on('click', '.cont_idx', function () {
                alert($(this).data('idx'));
                $('.cont_idx').setLayer({
                    'url' : '{{ site_url('/site/marketing/gatewayStat/detail/') }}' + $(this).data('idx'),
                    'width' : 1200,
                    'modal_id' : 'cont_modal'
                });
            });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search_value').on('keyup', function() {
                if (window.event.keyCode === 13) {
                    goSearch();
                }
            });
            $('#btn_search').on('click', function() {
                goSearch();
            });
            var goSearch = function() {
                $url_form.action = '{{site_url('/site/marketing/gatewayStat/')}}';
                $url_form.submit();
            };
        });
    </script>
@stop