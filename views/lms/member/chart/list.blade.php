@extends('lcms.layouts.master')

@section('content')
    <h5>- 가입/탈퇴현황을 년도별/월별/주별로 확인할 수 있습니다.    </h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">검색기준</label>
                    <div class="col-md-5  form-inline form-inline" >
                        <label class="control-label"><input type="radio" class="form-control flat" id="search_type" name="search_type" value="Y" {{$search_type == 'Y' ? 'Checked="Checked" ' : ''}} /> 년도별</label>&nbsp;&nbsp;&nbsp;
                        <label class="control-label"><input type="radio" class="form-control flat" id="search_type" name="search_type" value="M" {{$search_type == 'M' ? 'Checked="Checked" ' : ''}} /> 월별</label>&nbsp;&nbsp;&nbsp;
                        <label class="control-label"><input type="radio" class="form-control flat" id="search_type" name="search_type" value="W" {{$search_type == 'W' ? 'Checked="Checked" ' : ''}} /> 주별</label>
                    </div>
                    <label class="control-label col-md-1">조건검색</label>
                    <div class="col-md-3 form-inline">
                        <div class="input-group mr-20">
                            <select name="search_interest" class="form-control">
                                <option value="">관심분야</option>
                                @foreach($InterestCcd as $key => $value)
                                    <option value="{{$key}}" {{$search_interest == $key ? 'Selected ' : ''}}>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mr-20">
                            <select name="sex" class="form-control">
                                <option value="">성별</option>
                                <option value="M" {{$Sex == 'M' ? 'Selected ' : ''}}>남</option>
                                <option value="F" {{$Sex == 'F' ? 'Selected ' : ''}}>여</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1">날짜검색</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mr-20">
                            <div class="input-group-addon no-border no-bgcolor"></div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="{{$search_start_date}}">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="{{$search_end_date}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset" onclick="location.href='/member/chart/'">초기화</button>
            </div>
        </div>
    </form>

    <div class="x_panel mt-10">
        <div id="list_ajax_table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="clear"></div>
            <div>
                <div class="pull-left">
                    <div class="dataTables_length" style="width:100%">
                        검색정보 - [관심분야] {{ $search_interest == '' ? '전체' : $InterestCcd[$search_interest] }} &nbsp; &nbsp;
                        [성별] {{$Sex == '' ? '전체' : ($Sex == 'M' ? '남자' : '여자')}} &nbsp; &nbsp;
                        [날짜] {{$search_start_date}} ~ {{$search_end_date}}
                    </div>
                </div>
                <div class="pull-right">
                    <div class="dt-buttons btn-group">
                        <a class="btn btn-default btn-sm btn-success border-radius-reset mr-15 btn-excel" tabindex="0" aria-controls="list_ajax_table" href="#"><span><i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="x_content">
            <div class="col-md-6">
                <table id="list_ajax_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>구분</th>
                        <th>가입회원수</th>
                        <th>탈퇴회원수</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $join = 0; $withdraw = 0; @endphp
                    @foreach($data as $key => $row)
                        @php $join += $row['join']; $withdraw += $row['withdraw']; @endphp
                        <tr>
                            <td style="text-align: center;">{{ $loop->remaining }}</td>
                            <td style="text-align: center;">{{ $key }}</td>
                            <td style="text-align: right;">{{ $row['join'] }}</td>
                            <td style="text-align: right;">{{ $row['withdraw'] }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" style="text-align: center;">합계</td>
                        <td style="text-align: right;">{{ $join}}</td>
                        <td style="text-align: right;">{{ $withdraw }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6" id="chart_div1">
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="https://www.google.com/uds/?file=visualization&v=1&packages=corechart" type="text/javascript"></script>
    <link href="https://www.google.com/uds/api/visualization/1.0/40ff64b1d9d6b3213524485974f36cc0/ui+ko.css" type="text/css" rel="stylesheet">
    <script src="https://www.google.com/uds/api/visualization/1.0/342b7b8453344477d252440b6c1305c9/format+en,default,corechart.I.js" type="text/javascript"></script>
    <script>

        $(document).ready(function(){
            $('#search_form').on('submit', function(){
                $startDateArr = $('#search_start_date').val().split('-');
                $endDateArr = $('#search_end_date').val().split('-');

                var startDateCompare = new Date($startDateArr[0], $startDateArr[1], $startDateArr[2]);
                var endDateCompare = new Date($endDateArr[0], $endDateArr[1], $endDateArr[2]);

                if(startDateCompare.getTime() > endDateCompare.getTime()) {
                    alert("시작날짜와 종료날짜를 확인해 주세요.");
                    return false;
                }

                /*
                if(((endDateCompare.getTime() - startDateCompare.getTime()) / 1000 / 60 / 60 / 24) > 365){
                    alert("검색은 1년 단위로 가능합니다.");
                    return false;
                }
                */

                return true;
            });

            $('.btn-excel').on('click', function() {
                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/member/chart/excel/') }}', $('#search_form').serializeArray(), 'POST');
                }
            });

            google.charts.load('visualization', {'packages': ['corechart'], 'callback': drawVisualization});

            function drawVisualization() {
                var data = new google.visualization.DataTable([
                    ['날짜','가입','탈퇴'],
                ]);
                data.addColumn('string', '날짜');
                data.addColumn('number', '가입');
                data.addColumn('number', '탈퇴');
                data.addRows([
                        @foreach($data as $key => $row)
                    ['{{$key}}', {{$row['join']}}, {{$row['withdraw']}}]@if($loop->last == false) , @endif
                    @endforeach
                ]);

                var options = {
                    title:  '{{$search_type_name}} 가입/탈퇴 회원수',
                    fontSize: '15',
                    width: '100%',
                    height: '{{(count($data) * 30)+150}}' ,
                    chartArea: {
                        left: '120',
                        top: '50',
                        height: '{{(count($data) * 30)}}',
                        width: '670'
                    },
                    hAxis: {
                        minValue: 0,
                    },
                    bars: 'horizontal',
                    legend: {
                        position: 'bottom'
                    }
                };
                var chart = new google.visualization.BarChart(document.getElementById('chart_div1'));
                chart.draw(data, options);
            }

        });

    </script>
@stop