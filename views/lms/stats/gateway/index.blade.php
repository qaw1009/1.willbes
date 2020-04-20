@extends('lcms.layouts.master')

@section('content')
    <h5>- Data Laboratory[광고]</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">운영사이트</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_checkbox('', 'search_site_code', 'search_site_code', '', '운영 사이트', 'required', '', true, false, 7, 'checked', true)!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">검색기간</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="{{date('Y-m-d', strtotime(date('Y-m-d') . ' -14 days'))}}" autocomplete="off">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="{{date('Y-m-d')}}" autocomplete="off">
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="0-days">당일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-weeks">1주일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="15-days">15일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-months">1개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="3-months">3개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="6-months">6개월</button>
                        </div>
                        &nbsp;&nbsp;
                        <input type="radio" class="form-control flat" name="search_date_type" value="%Y-%m-%d" checked="checked"/> 일
                        &nbsp;
                        <input type="radio" class="form-control flat" name="search_date_type" value="%Y-%m" /> 월
                        &nbsp;
                        <input type="radio" class="form-control flat" name="search_date_type" value="%Y" /> 년
                        &nbsp;
                        * 검색기간이 3개월을 초과할 경우 '월'로 2년이 초과할 경우 '년'으로 자동 변환
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">검색</label>
                    <div class="col-md-10 form-inline">
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;" value=""> [계약명, 광고명]
                    </div>
                </div>
                <!--div class="form-group">
                    <label class="control-label col-md-1" for="search_type">조건검색</label>
                    <div class="col-md-11 form-inline">
                        <div class="checkbox">
                            <input type="checkbox" name="search_except_will_ip" id="search_except_will_ip" class="flat" value="Y"> 윌비스 IP 제외 [* 대략적인 영역임으로 정확도를 요하지는 않음]
                        </div>
                    </div>
                </div-->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
            </div>
        </div>
    </form>

    <ul class="tabs-site-code nav nav-tabs bar_tabs mt-30" role="tablist">
        <li class="active" role="presentation" ><a role="tab" href="#chart_view" name="chart_view"><strong>Chart</strong></a></li>
        <li role="presentation"><a role="tab" href="#data_view"><strong>Data</strong></a></li>
    </ul>

    <div class="x_panel form-horizontal" id="chart_view_area">

        <div class="x_content">
            <div class="form-group">
                <div class="col-md-12">
                    <div  id="gateway_count" style="position: relative; width: 100%; height: 430px; border: 1px solid #ccc; align-content: center">
                        <canvas id="gateway_count_stats"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="x_content">
            <p></p>
            <div class="form-group">
                <div class="col-md-12">
                    <div  id="gateway_site" style="position: relative; width: 100%; height: 430px; border: 1px solid #ccc; align-content: center">
                        <canvas id="gateway_site_stats"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <BR><BR>

    <ul class="tabs-site-code nav nav-tabs bar_tabs mt-30" role="tablist">
        <li role="presentation" ><a role="tab" href="#chart_view"><strong>차트보기</strong></a></li>
        <li class="active" role="presentation"><a aria-expanded="true"  role="tab" href="#data_view" name="data_view"><strong>데이터보기</strong></a></li>
    </ul>
    <div class="x_panel form-horizontal" id="data_view_area">
        <div class="x_content">
            <div class="form-group">
                <p></p>
                <div class="col-md-12 form-inline">
                    <strong>[기간별 광고현황]</strong>
                    <div class="x_content">
                        <table id="list_count_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                            <tr>
                                <th width="120" style="text-align: center;" rowspan="2" class="valign-middle">날짜</th>
                                <th width="120"  rowspan="2" class="valign-middle" style="text-align: center;">접속수</th>
                                <th width="120"  rowspan="2" class="valign-middle" style="text-align: center;">회원가입수</th>
                                <th colspan="2" style="text-align: center;">결제</th>
                                <th colspan="2" style="text-align: center;">환불</th>
                                <th width="120"  rowspan="2" class="valign-middle" style="text-align: center;">접속대비<BR>회원가입률</th>
                            </tr>
                            <tr>
                                <th width="100" style="text-align: center;">건수</th>
                                <th style="text-align: center;">금액</th>
                                <th width="100" style="text-align: center;">건수</th>
                                <th style="text-align: center;">금액</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <p></p>
                <div class="col-md-12 form-inline">
                    <strong>[사이트별 광고현황]</strong>
                    <div class="x_content">
                        <table id="list_site_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                            <tr>
                                <th width="120" style="text-align: center;" rowspan="2" class="valign-middle">사이트</th>
                                <th width="120"  rowspan="2" class="valign-middle" style="text-align: center;">접속수</th>
                                <th width="120"  rowspan="2" class="valign-middle" style="text-align: center;">회원가입수</th>
                                <th colspan="2" style="text-align: center;">결제</th>
                                <th colspan="2" style="text-align: center;">환불</th>
                                <th width="120"  rowspan="2" class="valign-middle" style="text-align: center;">접속대비<BR>회원가입률</th>
                            </tr>
                            <tr>
                                <th width="100" style="text-align: center;">건수</th>
                                <th style="text-align: center;">금액</th>
                                <th width="100" style="text-align: center;">건수</th>
                                <th style="text-align: center;">금액</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <!--tr>
                                <th style="text-align: center;">총합</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr//-->
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12 form-inline">
                    <strong>[광고 접속이력]</strong>
                    <div class="x_content">
                        <table id="list_ajax_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="30">NO</th>
                                <th width="120">사이트</th>
                                <th>광고정보</th>
                                <th width="180">광고형태</th>
                                <th width="120">플랫폼</th>
                                <th width="90">사용자IP</th>
                                <th width="120">일자</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            var $search_form = $('#search_form');

            function getStats($type) {
                var data = {
                    '{{ csrf_token_name() }}': $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                };
                data = $.extend($search_form.serializeArray(), {});

                var $result = '';
                sendAjax('{{ site_url('/stats/statsGateway/getData/') }}'+$type, data, function (ret) {
                    $result = ret.data;
                }, showError, false, 'POST');
                return $result;
            }

            {{--각 항목의 데이터 결과 변수--}}
            var $gateway_info=[], $gateway_site=[], $banner_platform=[];

            function chartExe() {

                var chartColors = window.chartColors;
                var color = Chart.helpers.color;

                {{--######################################################  검색현황   ####################################################--}}
                $gateway_info = getStats('Gateway/Count');
                $base_date = [], $gateway_count=[] ,$member_count=[], $order_count=[], $refund_count=[];
                for (key in $gateway_info) {
                    $base_date.push($gateway_info[key]['base_date']);
                    $gateway_count.push($gateway_info[key]['gateway_count']);
                    $member_count.push($gateway_info[key]['member_count']);
                    $order_count.push($gateway_info[key]['order_count']);
                    $refund_count.push($gateway_info[key]['refund_count']);
                }
                var config_count = {
                    type: 'line',
                    data: {
                        labels: $base_date,
                        datasets: [{
                            label: '접속수',
                            fill: false,
                            backgroundColor: color(window.chartColors.orange).alpha(0.5).rgbString(),
                            borderColor: window.chartColors.orange,
                            data: $gateway_count,
                        }, {
                            label: '회원가입수',
                            fill: false,
                            backgroundColor: window.chartColors.green,
                            borderColor: window.chartColors.green,
                            data: $member_count,
                        }, {
                            label: '결제건수',
                            fill: false,
                            backgroundColor: window.chartColors.purple2,
                            borderColor: window.chartColors.purple2,
                            data: $order_count,
                        }, {
                            label: '환불건수',
                            fill: false,
                            backgroundColor: window.chartColors.blue3,
                            borderColor: window.chartColors.blue3,
                            data: $refund_count,
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        title: {
                            display: true,
                            text: '광고 접속현황'
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                            callbacks: {
                                label: function (tooltipItem, data) {
                                    var tooltipLabel = data.datasets[tooltipItem.datasetIndex].label;
                                    var tooltipValue = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                                    return tooltipLabel+' : '+parseInt(tooltipValue).toLocaleString();
                                }
                            }
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: '기간'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: '수'
                                },
                                ticks: {
                                    beginAtZero: true,
                                    callback:
                                        function(value) {
                                            return  value.toLocaleString();
                                        }
                                }
                            }]
                        }
                    }
                };

                {{--######################################################  사이트별   ####################################################--}}
                $gateway_site = getStats('Gateway/Site');
                $base_site=[], $site_gateway_count=[] ,$site_member_count=[],$site_order_count=[],$site_refund_count=[];
                for (key in $gateway_site) {
                    $base_site.push($gateway_site[key]['SiteName']);
                    $site_gateway_count.push($gateway_site[key]['gateway_count']);
                    $site_member_count.push($gateway_site[key]['member_count']);
                    $site_order_count.push($gateway_site[key]['order_count']);
                    $site_refund_count.push($gateway_site[key]['refund_count']);
                }

                var config_site = {
                    labels: $base_site,
                    datasets: [{
                        label: '접속수',
                        backgroundColor: color(window.chartColors.orange).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.orange,
                        borderWidth: 1,
                        data: $site_gateway_count
                    }, {
                        label: '회원가입수',
                        backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.green,
                        borderWidth: 1,
                        data: $site_member_count
                    }, {
                        label: '결제건수',
                        backgroundColor: color(window.chartColors.purple2).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.purple2,
                        borderWidth: 1,
                        data: $site_order_count
                    }, {
                        label: '환불건수',
                        backgroundColor: color(window.chartColors.blue3).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.blue3,
                        borderWidth: 1,
                        data: $site_refund_count
                    }]

                };
                {{--######################################################  사이트별   ####################################################--}}

                canvas_clear('gateway_count');
                var ctx_count = document.getElementById('gateway_count_stats').getContext('2d');
                window.myLine = new Chart(ctx_count, config_count);

                canvas_clear('gateway_site');
                var ctx_site = document.getElementById('gateway_site_stats').getContext('2d');
                window.myBar = new Chart(ctx_site, {
                    type: 'bar',
                    data: config_site,
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: '사이트별 광고현황'
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                            callbacks: {
                                label: function (tooltipItem, data) {
                                    var tooltipLabel = data.datasets[tooltipItem.datasetIndex].label;
                                    var tooltipValue = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                                    return tooltipLabel+' : '+parseInt(tooltipValue).toLocaleString();
                                }
                            }
                        },
                        scales: {
                            yAxes: [{
                                display: true,
                                ticks: {
                                    beginAtZero: true,
                                    callback:
                                        function(value) {
                                            return  value.toLocaleString();
                                        }
                                }
                            }]
                        }
                    }
                });
            }

            function canvas_clear(str_div_id) {
                var $divId = $("#"+str_div_id);
                $divId.empty();
                $divId.append("<canvas id='"+str_div_id+"_stats'></canvas>");
            }

            var $datatable_count_info, $datatable_site, $datatable_list;

            function datatableExe() {
                $datatable_count_info = $("#list_count_table").DataTable({
                    dom: 'Pfrtip',
                    order: [[0, 'asc']],
                    ordering: true,
                    serverSide: false,
                    ajax: false,
                    searching: false,
                    data: $gateway_info,
                    columns: [
                        {'data': 'base_date', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<font color="black">' + data+ '</font>';
                            }},
                        {'data': 'gateway_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (parseInt(data) > 0) ? '<b>' + addComma(data) + '</b>' : '0';
                            }},
                        {'data': 'member_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (parseInt(data) > 0) ? '<b>' + addComma(data) + '</b>' : '0';
                            }},
                        {'data': 'order_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (parseInt(data) > 0) ? '<b>' + addComma(data) + '</b>' : '0';
                            }},
                        {'data': 'order_pay', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (parseInt(data) > 0) ? '<b>' + addComma(data) + '</b>' : '0';
                            }},
                        {'data': 'refund_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (parseInt(data) > 0) ? '<b>' + addComma(data) + '</b>' : '0';
                            }},
                        {'data': 'refund_pay', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (parseInt(data) > 0) ? '<b>' + addComma(data) + '</b>' : '0';
                            }},
                        {'data': null, 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (parseInt(row.gateway_count) > 0 ?'<b>' + (parseInt(row.member_count) / parseInt(row.gateway_count)).toFixed(2)+ '</b>' : '0.00') ;
                            }},
                    ]
                });

                $datatable_site = $("#list_site_table").DataTable({
                    dom: 'Pfrtip',
                    paging : false,
                    serverSide: false,
                    ajax: false,
                    searching: false,
                    info : '',
                    data: $gateway_site,
                    columns: [
                        {'data': 'SiteName', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<font color="black">' + data+ '</font>';
                            }},
                        {'data': 'gateway_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (parseInt(data) > 0) ? '<b>' + addComma(data) + '</b>' : '0';
                            }},
                        {'data': 'member_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (parseInt(data) > 0) ? '<b>' + addComma(data) + '</b>' : '0';
                            }},
                        {'data': 'order_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (parseInt(data) > 0) ? '<b>' + addComma(data) + '</b>' : '0';
                            }},
                        {'data': 'order_pay', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (parseInt(data) > 0) ? '<b>' + addComma(data) + '</b>' : '0';
                            }},
                        {'data': 'refund_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (parseInt(data) > 0) ? '<b>' + addComma(data) + '</b>' : '0';
                            }},
                        {'data': 'refund_pay', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (parseInt(data) > 0) ? '<b>' + addComma(data) + '</b>' : '0';
                            }},
                        {'data': null, 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (parseInt(row.gateway_count) > 0 ? '<b>' +(parseInt(row.member_count) / parseInt(row.gateway_count)).toFixed(2)+ '</b>' : '0.00') ;
                            }},
                    ]
                });

                $datatable_list = $('#list_ajax_table').DataTable({
                    serverSide: true,
                    ajax: {
                        'url' : '{{ site_url('/stats/statsGateway/listAjax') }}',
                        'type' : 'POST',
                        'data' : function(data) {
                            return $search_form.formSerialize()+'&start='+data.start+'&length='+data.length
                        }
                    },
                    columns: [
                        {'data' : null, 'render' : function(data, type, row, meta) {
                                return $datatable_list.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                            }},
                        {'data' : 'SiteName'},
                        {'data' : null, 'render' : function(data, type, row, meta) {
                                return "<b>["+row.ContName + "] "+ row.GwName +"</b>";
                            }},
                        {'data' : 'CcdName'},
                        {'data' : 'UserPlatform'},
                        {'data' : 'RegIp'},
                        {'data' : 'RegDatm'}
                    ]
                });

                $search_form.on('ifChanged','input[name="site_code_all_check"]', function () {
                    var $_name = $('input[name="'+$(this).data("name")+'[]"]');
                    iCheckAll($_name, $(this));
                });
            }

            function datatableReset() {
                $datatable_count_info.destroy();
                $datatable_site.destroy();
                $datatable_list.destroy();
                datatableExe();
            }

            $search_form.on('click', '.btn-search', function() {
                chartExe();
                datatableReset();
            });

            chartExe();
            datatableExe();
        });
    </script>
@stop
