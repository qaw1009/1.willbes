@extends('lcms.layouts.master')

@section('content')
    <h5>- Data Analysis [주문]</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">운영사이트</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_checkbox('', 'search_site_code', 'search_site_code', '', '운영 사이트', 'required', '', false, false, 7, 'checked', true)!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">검색기간</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="{{date('Y-m-d', strtotime(date('Y-m-d') . ' -30 days'))}}" autocomplete="off">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="{{date('Y-m-d')}}" autocomplete="off">
                        </div>
                        &nbsp;&nbsp;
                        <input type="radio" class="form-control flat" name="search_date_type" value="%Y-%m-%d" checked="checked"/> 일
                        &nbsp;
                        <input type="radio" class="form-control flat" name="search_date_type" value="%Y-%m" /> 월
                        &nbsp;
                        <input type="radio" class="form-control flat" name="search_date_type" value="%Y" /> 년
                        &nbsp;
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건검색</label>
                    <div class="col-md-10 form-inline">
                        <select class="form-control mr-10" id="search_pay_channel" name="search_pay_channel">
                            <option value=""> [ 결제채널 ]</option>
                            @foreach($code_pay_channel as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <select class="form-control mr-10" id="search_pay_route" name="search_pay_route">
                            <option value=""> [ 결제루트 ]</option>
                            @foreach($code_pay_route as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <select class="form-control mr-10" id="search_pay_method" name="search_pay_method">
                            <option value=""> [ 결제수단 ]</option>
                            @foreach($code_pay_method as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <!--<select class="form-control mr-10" id="search_interest" name="search_interest">
                            <option value=""> [ 결제상태 ]</option>
                            <option value="">결제완료</option>
                            <option value="">환불완료</option>
                        </select>//-->
                    </div>
                </div>
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
                    <div  id="order_pay" style="position: relative; width: 100%; height: 430px; border: 1px solid #ccc; align-content: center">
                        <canvas id="order_pay_stats"></canvas>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 form-inline">
                    <div  id="order_count" style="position: relative; width: 100%; height: 430px; border: 1px solid #ccc; align-content: center">
                        <canvas id="order_count_stats"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="x_content">
            <p></p>
            <div class="form-group">
                <div class="col-md-4 form-inline">
                    <div id="order_sex" style="width: 100%; height: 320px; border: 1px solid #ccc;">
                        <canvas id="order_sex_stats"></canvas>
                    </div>
                </div>

                <div class="col-md-4 form-inline">
                    <div id="order_channel" style="width: 100%; height: 320px; border: 1px solid #ccc;">
                        <canvas id="order_channel_stats"></canvas>
                    </div>
                </div>
                <div class="col-md-4 form-inline">
                    <div id="" style="width: 100%; height: 320px; border: 1px solid #ccc;">
                        <canvas id=""></canvas>
                    </div>
                </div>
            </div>
        </div>


        <div class="x_content">
            <p></p>
            <div class="form-group">
                <div class="col-md-12">
                    <div  id="order_site" style="position: relative; width: 100%; height: 430px; border: 1px solid #ccc; align-content: center">
                        <canvas id="order_site_stats"></canvas>
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
        <div class="x_content ">
            <div class="form-group">
                <p>
                <div class="col-md-6 form-inline">
                    <strong>[회원현황]</strong>
                    <div class="x_content">
                        <table id="list_member_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="100">날짜</th>
                                <th width="80">가입수</th>
                                <th width="80">탈퇴수</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 form-inline">
                    <strong>[로그인현황]</strong>
                    <div class="x_content">
                        <table id="list_login_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="100">날짜</th>
                                <th width="80">로그인수</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                </p>
            </div>

            <div class="form-group">
                <p>
                <div class="col-md-6 form-inline">
                    <strong>[연령대]</strong>
                    <div class="x_content">
                        <table id="list_age_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="50">구분</th>
                                <th width="80">10대</th>
                                <th width="80">20대</th>
                                <th width="80">30대</th>
                                <th width="80">40대</th>
                                <th width="80">50대</th>
                                <th width="80">60대</th>
                                <th width="80">기타</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 form-inline">
                    <strong>[성별]</strong>
                    <div class="x_content">
                        <table id="list_sex_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="50" style="text-align: center;">구분</th>
                                <th width="100">남자</th>
                                <th width="100">여자</th>
                                <th width="100">성별없음</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                </p>
            </div>

            <div class="form-group">
                <p>
                <div class="col-md-6 form-inline">
                    <strong>[관심분야]</strong>
                    <div class="x_content">
                        <table id="list_interest_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="150">관심항목</th>
                                <th width="100">선택수</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                </p>
            </div>
        </div>
    </div>

    <style>

    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            var $search_form = $('#search_form');

            function getStats($type) {
                var data = {
                    '{{ csrf_token_name() }}': $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                };
                data = $.extend($search_form.serializeArray(), {});

                var $result = '';
                sendAjax('{{ site_url('/stats/statsOrder/') }}'+$type, data, function (ret) {
                    $result = ret.data;
                }, showError, false, 'POST');
                return $result;
            }

             {{--각 항목의 데이터 결과 변수--}}
            var $order_info=[], $order_sex=[], $order_site=[], $order_channel=[];

            function chartExe() {

                var chartColors = window.chartColors;
                var color = Chart.helpers.color;

                {{--######################################################  주문현황   ####################################################--}}
                $order_info = getStats('order/Count');
                $base_date = [], $order_count=[] ,$refund_count=[], $order_pay=[], $refund_pay=[] , $real_count=[] , $real_pay=[];
                for (key in $order_info) {
                    $base_date.push($order_info[key]['base_date']);
                    $order_count.push($order_info[key]['order_count']);
                    $refund_count.push($order_info[key]['refund_count']);
                    $order_pay.push($order_info[key]['order_pay']);
                    $refund_pay.push($order_info[key]['refund_pay']);
                    $real_count.push($order_info[key]['real_count']);
                    $real_pay.push($order_info[key]['real_pay']);
                }
                var config_order_pay = {
                    type: 'line',
                    data: {
                        labels: $base_date,
                        datasets: [{
                            label: '결제금액',
                            fill: false,
                            backgroundColor: window.chartColors.orange2,
                            borderColor: window.chartColors.orange2,
                            data: $order_pay,
                        }, {
                            label: '환불금액',
                            fill: false,
                            backgroundColor: window.chartColors.green,
                            borderColor: window.chartColors.green,
                            data: $refund_pay,
                        }, {
                            label: '매출금액',
                            fill: true,
                            backgroundColor: color(window.chartColors.yellow).alpha(0.5).rgbString(),
                            borderColor: window.chartColors.yellow,
                            data: $real_pay,
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        title: {
                            display: true,
                            text: '주문금액 현황'
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
                                    labelString: '금액'
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
                var config_order_count = {
                    type: 'line',
                    data: {
                        labels: $base_date,
                        datasets: [{
                            label: '결제건수',
                            fill: false,
                            backgroundColor: window.chartColors.orange2,
                            borderColor: window.chartColors.orange2,
                            data: $order_count,
                        }, {
                            label: '환불건수',
                            fill: false,
                            backgroundColor: window.chartColors.green,
                            borderColor: window.chartColors.green,
                            data: $refund_count,
                        }, {
                            label: '매출건수',
                            fill: true,
                            backgroundColor: color(window.chartColors.yellow).alpha(0.5).rgbString(),
                            borderColor: window.chartColors.yellow,
                            data: $real_count,
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        title: {
                            display: true,
                            text: '주문건수 현황'
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
                                    labelString: '건수'
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
                {{--######################################################  주문현황   ####################################################--}}

                {{--######################################################  성별   ####################################################--}}
                $order_sex = getStats('order/Sex');
                $pay_sex=[], $refund_sex=[];
                $pay_sex.push($order_sex[0]['m_pay'],$order_sex[0]['f_pay'],$order_sex[0]['not_pay']);
                $refund_sex.push($order_sex[1]['m_pay'],$order_sex[1]['f_pay'],$order_sex[1]['not_pay']);
                var config_sex = {
                    labels: ['남자', '여자', '성별없음'],
                    datasets: [{
                        label: '결제금액',
                        backgroundColor: color(window.chartColors.orange2).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.orange2,
                        borderWidth: 1,
                        data: $pay_sex
                    }, {
                        label: '환불금액',
                        backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.green,
                        borderWidth: 1,
                        data: $refund_sex
                    }]
                };
                {{--######################################################  성별    ####################################################--}}

                {{--######################################################  사이트별   ####################################################--}}
                $order_site = getStats('order/Site');
                $base_site = [], $site_order_pay=[], $site_refund_pay=[], $site_real_pay=[];
                for (key in $order_site) {
                    $base_site.push($order_site[key]['SiteName']);
                    $site_order_pay.push($order_site[key]['order_pay']);
                    $site_refund_pay.push($order_site[key]['refund_pay']);
                    $site_real_pay.push($order_site[key]['real_pay']);
                }
                var config_site = {
                    labels: $base_site,
                    datasets: [{
                        label: '결제금액',
                        backgroundColor: color(window.chartColors.orange2).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.orange2,
                        borderWidth: 1,
                        data: $site_order_pay
                    }, {
                        label: '환불금액',
                        backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.green,
                        borderWidth: 1,
                        data: $site_refund_pay
                    }, {
                        label: '매출금액',
                        backgroundColor: color(window.chartColors.yellow).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.yellow,
                        borderWidth: 1,
                        data: $site_real_pay
                    }]
                };
                {{--######################################################  사이트별   ####################################################--}}

                {{--######################################################  결제채널    ####################################################--}}
                $order_channel = getStats('order/Channel');
                var $channel_name = [], $channel_order = [], $channel_color = [];
                var $util_color = Object.keys(chartColors).map(function(i) {
                    return chartColors[i];
                });
                $i=0;
                for (key in $order_channel) {
                    $channel_name.push($order_channel[key]['CcdName']);
                    $channel_order.push($order_channel[key]['order_count']);
                    $channel_color.push(color($util_color[$i]).alpha(0.5).rgbString());
                    $i++
                }

                var config_channel = {
                    data: {
                        datasets: [{
                            data:$channel_order,
                            backgroundColor: $channel_color,
                            label: '결제채널별'
                        }],
                        labels: $channel_name
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            position: 'right',
                        },
                        title: {
                            display: true,
                            text: '결제채널별 결제건수'
                        },
                        tooltips: {
                            callbacks: {
                                label: function (tooltipItem, data) {
                                    var tooltipLabel = data.labels[tooltipItem.index];
                                    var tooltipValue = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                                    return tooltipLabel+' : '+parseInt(tooltipValue).toLocaleString()+'건';
                                }
                            }
                        },
                        scale: {
                            ticks: {
                                beginAtZero: true
                            },
                            reverse: false,
                        },
                        animation: {
                            animateRotate: false,
                            animateScale: true
                        }
                    }
                };
                {{--######################################################  결제채널    ####################################################--}}


                canvas_clear('order_pay');
                var ctx_order_pay = document.getElementById('order_pay_stats').getContext('2d');
                window.myLine = new Chart(ctx_order_pay, config_order_pay);

                canvas_clear('order_count');
                var ctx_order_count = document.getElementById('order_count_stats').getContext('2d');
                window.myLine = new Chart(ctx_order_count, config_order_count);

                canvas_clear('order_sex');
                var ctx_sex = document.getElementById('order_sex_stats').getContext('2d');
                window.myBar = new Chart(ctx_sex, {
                    type: 'bar',
                    data: config_sex,
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: '성별'
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

                canvas_clear('order_channel');
                var ctx_channel = document.getElementById('order_channel_stats').getContext('2d');
                window.myPolarArea = Chart.PolarArea(ctx_channel, config_channel);

                canvas_clear('order_site');
                var ctx_site = document.getElementById('order_site_stats').getContext('2d');
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
                            text: '사이트별 주문금액 현황'
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

            $search_form.on('click', '.btn', function() {
                chartExe();
                datatableReset();
            });

            chartExe();

            return;

            var $datatable_member, $datatable_login, $datatable_age, $datatable_sex, $datatable_interest;

            function datatableExe() {
                $datatable_member = $("#list_member_table").DataTable({
                    order: [[0, 'asc']],
                    ordering: true,
                    serverSide: false,
                    ajax: false,
                    searching: false,
                    data: $member_count,
                    columns: [
                        {'data': 'base_date', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<font color="black">' + data+ '</font>';
                            }},
                        {'data': 'join_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (data > 0) ? '<font color=\'red\'>' + addComma(data) + '</font>' : data;
                            }},
                        {'data': 'out_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (data > 0) ? '<font color=\'blue\'>' + addComma(data) + '</font>' : data;
                            }}
                    ]
                });

                $datatable_login = $("#list_login_table").DataTable({
                    order: [[0, 'asc']],
                    ordering: true,
                    serverSide: false,
                    ajax: false,
                    searching: false,
                    data: $member_login,
                    columns: [
                        {'data': 'base_date', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<font color="black">' + data + '</font>';
                            }},
                        {'data': 'login_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (data > 0) ? '<font color=\'#4bc0c0\'>' + addComma(data) + '</font>' : data;
                            }}
                    ]
                });

                $datatable_age = $("#list_age_table").DataTable({
                    serverSide: false,
                    paging: false,
                    ajax: false,
                    searching: false,
                    data: $member_age,
                    columns: [
                        {'data': 'mem_status', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<font color="black">' + data + '</font>';
                            }},
                        {'data' : '10s', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                return (data > 0) ? '<font color=\'black\'>' + addComma(data) + '</font>' : data;
                            }},
                        {'data' : '20s', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                return (data > 0) ? '<font color=\'black\'>' + addComma(data) + '</font>' : data;
                            }},
                        {'data' : '30s', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                return (data > 0) ? '<font color=\'black\'>' + addComma(data) + '</font>' : data;
                            }},
                        {'data' : '40s', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                return (data > 0) ? '<font color=\'black\'>' + addComma(data) + '</font>' : data;
                            }},
                        {'data' : '50s', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                return (data > 0) ? '<font color=\'black\'>' + addComma(data) + '</font>' : data;
                            }},
                        {'data' : '60s', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                return (data > 0) ? '<font color=\'black\'>' + addComma(data) + '</font>' : data;
                            }},
                        {'data' : 'etc', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                return (data > 0) ? '<font color=\'black\'>' + addComma(data) + '</font>' : data;
                            }},
                    ]
                });

                $datatable_sex = $("#list_sex_table").DataTable({
                    serverSide: false,
                    paging: false,
                    ajax: false,
                    searching: false,
                    data: $member_sex,
                    columns: [
                        {'data': 'mem_status', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<font color="black">' + data + '</font>';
                            }},
                        {'data' : 'm', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                return (data > 0) ? '<font color=\'black\'>' + addComma(data) + '</font>' : data;
                            }},
                        {'data' : 'f', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                return (data > 0) ? '<font color=\'black\'>' + addComma(data) + '</font>' : data;
                            }},
                        {'data' : 'not', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                return (data > 0) ? '<font color=\'black\'>' + addComma(data) + '</font>>' : data;
                            }},
                    ]
                });

                $datatable_interest = $("#list_interest_table").DataTable({
                    order: [[0, 'asc']],
                    ordering: true,
                    serverSide: false,
                    paging: false,
                    ajax: false,
                    searching: false,
                    data: $member_interest,
                    columns: [
                        {'data': 'interest_name', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<font color="black">' + data + '</font>';
                            }},
                        {'data': 'count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (data > 0) ? '<font color=\'black\'>' + addComma(data) + '</font>' : data;
                            }}
                    ]
                });

                $('#site_code_all_check').on('ifChanged', function() {
                    var $_name = $('input[name="'+$(this).data("name")+'[]"]');
                    iCheckAll($_name, $(this));
                });
            }

            function datatableReset() {
                $datatable_member.destroy();
                $datatable_login.destroy();
                $datatable_age.destroy();
                $datatable_sex.destroy();
                $datatable_interest.destroy();
                datatableExe();
            }

            datatableExe();
        });
    </script>
@stop
