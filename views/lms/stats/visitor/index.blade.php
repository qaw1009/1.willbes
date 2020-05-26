@extends('lcms.layouts.master')

@section('content')
    <h5>- Data Laboratory[접속]</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;" novalidate>
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
                        <input type="radio" class="form-control flat" name="search_date_type" value="day" checked="checked"/> 일
                        &nbsp;
                        <input type="radio" class="form-control flat" name="search_date_type" value="month"/> 월
                        &nbsp;
                        <input type="radio" class="form-control flat" name="search_date_type" value="year"/> 년
                        &nbsp;
                        * 검색기간이 3개월을 초과할 경우 '월'로 2년이 초과할 경우 '년'으로 자동 변환
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

    {{-- 차트보기 --}}
    <a name="chart_view"></a>
    <ul class="nav nav-tabs bar_tabs mt-50" role="tablist">
        <li class="active" role="presentation"><a href="#chart_view" role="tab"><strong>차트보기</strong></a></li>
        <li role="presentation"><a href="#data_view" role="tab"><strong>데이터보기</strong></a></li>
    </ul>

    <div class="x_panel form-horizontal" id="chart_view_area">
        <div class="x_content">
            <div class="form-group no-border-bottom">
                <div class="col-md-12">
                    <div id="visitor_count" style="position: relative; width: 100%; height: 430px; border: 1px solid #ccc; align-content: center">
                        <canvas id="visitor_count_stats"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="x_content mt-20">
            <div class="form-group no-border-bottom">
                <div class="col-md-12">
                    <div id="visitor_app_count" style="position: relative; width: 100%; height: 430px; border: 1px solid #ccc; align-content: center">
                        <canvas id="visitor_app_count_stats"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="x_content mt-20">
            <div class="form-group no-border-bottom">
                <div class="col-md-7">
                    <div id="visitor_site" style="position: relative; width: 100%; height: 430px; border: 1px solid #ccc; align-content: center">
                        <canvas id="visitor_site_stats"></canvas>
                    </div>
                </div>
                <div class="col-md-5">
                    <div id="visitor_platform" style="position: relative; width: 100%; height: 430px; border: 1px solid #ccc; align-content: center">
                        <canvas id="visitor_platform_stats"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 데이터보기 --}}
    <a name="data_view"></a>
    <ul class="tabs-site-code nav nav-tabs bar_tabs mt-50" role="tablist">
        <li role="presentation"><a href="#chart_view" role="tab"><strong>차트보기</strong></a></li>
        <li class="active" role="presentation"><a href="#data_view" role="tab"><strong>데이터보기</strong></a></li>
    </ul>

    <div class="x_panel form-horizontal" id="data_view_area">
        <div class="x_content">
            <div class="form-group no-border-bottom">
                <div class="col-md-3 form-inline pl-0">
                    <strong>[기간별 회원/비회원 접속현황]</strong>
                    <div class="x_content">
                        <table id="list_count_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">날짜</th>
                                <th class="text-center">회원</th>
                                <th class="text-center">비회원</th>
                                <th class="text-center">합계</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-3 form-inline pl-0">
                    <strong>[기간별 PC/모바일 접속현황]</strong>
                    <div class="x_content">
                        <table id="list_app_count_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">날짜</th>
                                <th class="text-center">PC</th>
                                <th class="text-center">모바일</th>
                                <th class="text-center">합계</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-3 form-inline pr-0">
                    <strong>[사이트별 접속현황]</strong>
                    <div class="x_content">
                        <table id="list_site_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">사이트</th>
                                <th class="text-center">접속수</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="text-center">총합</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-md-3 form-inline pr-0">
                    <strong>[플랫폼별 접속현황]</strong>
                    <div class="x_content">
                        <table id="list_platform_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">플랫폼</th>
                                <th class="text-center">접속수</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="text-center">총합</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var $search_form = $('#search_form');
            var $data_count = [], $data_site = [], $data_platform = [];   // 각 항목의 데이터 결과 변수
            var $datatable_count, $datatable_app_count, $datatable_site, $datatable_platform;

            function getStats($type) {
                var data = $.extend($search_form.serializeArray(), {});
                var $result = '';

                sendAjax('{{ site_url('/stats/statsVisitor/getData/') }}' + $type, data, function(ret) {
                    $result = ret.data;
                }, showError, false, 'POST');
                return $result;
            }

            function chartExe() {
                var chartColors = window.chartColors;
                var color = Chart.helpers.color;
                var $base_date = [], $visitor_cnt = [], $mem_cnt = [], $guest_cnt = [], $pc_cnt = [], $mobile_cnt = [];
                var $site_name = [], $site_cnt = [];
                var $platform_name = [], $platform_cnt = [];

                {{--###################################################### 기간별 현황 ####################################################--}}
                $data_count = getStats('Visitor/Count');
                $.each($data_count, function(i, item) {
                    $base_date.push(item.BaseDate);
                    $visitor_cnt.push(item.VisitorCnt);
                    $mem_cnt.push(item.MemCnt);
                    $guest_cnt.push(item.GuestCnt);
                    $pc_cnt.push(item.PcCnt);
                    $mobile_cnt.push(item.MobileCnt);
                });

                // 회원/비회원 접속 현황
                var config_count = {
                    type: 'line',
                    data: {
                        labels: $base_date,
                        datasets: [{
                            label: '회원',
                            fill: false,
                            backgroundColor: window.chartColors.red,
                            borderColor: window.chartColors.red,
                            data: $mem_cnt,
                        }, {
                            label: '비회원',
                            fill: false,
                            backgroundColor: window.chartColors.blue,
                            borderColor: window.chartColors.blue,
                            data: $guest_cnt,
                        }, {
                            label: '총합',
                            fill: true,
                            backgroundColor: color(window.chartColors.grey).alpha(0.5).rgbString(),
                            borderColor: window.chartColors.grey,
                            data: $visitor_cnt,
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        title: {
                            display: true,
                            text: '기간별 회원/비회원 접속현황'
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
                                    labelString: '접속수'
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

                // PC/모바일 사이트 접속 현황
                var config_app_count = {
                    type: 'line',
                    data: {
                        labels: $base_date,
                        datasets: [{
                            label: 'PC',
                            fill: false,
                            backgroundColor: window.chartColors.orange,
                            borderColor: window.chartColors.orange,
                            data: $pc_cnt,
                        }, {
                            label: '모바일',
                            fill: false,
                            backgroundColor: window.chartColors.green,
                            borderColor: window.chartColors.green,
                            data: $mobile_cnt,
                        }, {
                            label: '총합',
                            fill: true,
                            backgroundColor: color(window.chartColors.grey).alpha(0.5).rgbString(),
                            borderColor: window.chartColors.grey,
                            data: $visitor_cnt,
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        title: {
                            display: true,
                            text: '기간별 PC/모바일 접속현황'
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
                                    labelString: '접속수'
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

                {{--###################################################### 사이트별 ####################################################--}}
                $data_site = getStats('Visitor/Site');
                $.each($data_site, function(i, item) {
                    $site_name.push(item.SiteName);
                    $site_cnt.push(item.VisitorCnt);
                });

                var config_site = {
                    labels: $site_name,
                    datasets: [{
                        label: '접속수',
                        backgroundColor: color(window.chartColors.grey2).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.grey2,
                        borderWidth: 1,
                        data: $site_cnt
                    }]
                };

                {{--######################################################  플랫폼별   ####################################################--}}
                $data_platform = getStats('Visitor/Platform');
                $.each($data_platform, function(i, item) {
                    $platform_name.push(item.UserPlatform);
                    $platform_cnt.push(item.VisitorCnt);
                });

                var config_platform = {
                    labels: $platform_name,
                    datasets: [{
                        label: '접속수',
                        backgroundColor: color(window.chartColors.grey).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.grey,
                        borderWidth: 1,
                        data: $platform_cnt
                    }]
                };

                canvas_clear('visitor_count');
                var ctx_count = document.getElementById('visitor_count_stats').getContext('2d');
                window.myLine = new Chart(ctx_count, config_count);

                canvas_clear('visitor_app_count');
                var ctx_app_count = document.getElementById('visitor_app_count_stats').getContext('2d');
                window.myLine = new Chart(ctx_app_count, config_app_count);

                canvas_clear('visitor_site');
                var ctx_site = document.getElementById('visitor_site_stats').getContext('2d');
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
                            text: '사이트별 접속현황'
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

                canvas_clear('visitor_platform');
                var ctx_platform = document.getElementById('visitor_platform_stats').getContext('2d');
                window.myBar = new Chart(ctx_platform, {
                    type: 'bar',
                    data: config_platform,
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: '플랫폼별 접속현황'
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

            function datatableExe() {
                $datatable_count = $("#list_count_table").DataTable({
                    dom: 'Pfrtp',
                    order: [[0, 'asc']],
                    ordering: true,
                    serverSide: false,
                    ajax: false,
                    searching: false,
                    data: $data_count,
                    columns: [
                        {'data': 'BaseDate', 'class': 'text-center', 'render': function (data, type, row, meta) {
                            return '<span class="black">' + data + '</span>';
                        }},
                        {'data': 'MemCnt', 'class': 'text-center', 'render': function (data, type, row, meta) {
                            return '<strong>' + addComma(data) + '</strong>';
                        }},
                        {'data': 'GuestCnt', 'class': 'text-center', 'render': function (data, type, row, meta) {
                            return '<strong>' + addComma(data) + '</strong>';
                        }},
                        {'data': 'VisitorCnt', 'class': 'text-center', 'render': function (data, type, row, meta) {
                            return '<strong>' + addComma(data) + '</strong>';
                        }}
                    ]
                });

                $datatable_app_count = $("#list_app_count_table").DataTable({
                    dom: 'Pfrtp',
                    order: [[0, 'asc']],
                    ordering: true,
                    serverSide: false,
                    ajax: false,
                    searching: false,
                    data: $data_count,
                    columns: [
                        {'data': 'BaseDate', 'class': 'text-center', 'render': function (data, type, row, meta) {
                            return '<span class="black">' + data + '</span>';
                        }},
                        {'data': 'PcCnt', 'class': 'text-center', 'render': function (data, type, row, meta) {
                            return '<strong>' + addComma(data) + '</strong>';
                        }},
                        {'data': 'MobileCnt', 'class': 'text-center', 'render': function (data, type, row, meta) {
                            return '<strong>' + addComma(data) + '</strong>';
                        }},
                        {'data': 'VisitorCnt', 'class': 'text-center', 'render': function (data, type, row, meta) {
                            return '<strong>' + addComma(data) + '</strong>';
                        }}
                    ]
                });

                $datatable_site = $("#list_site_table").DataTable({
                    dom: 'Pfrtip',
                    paging : false,
                    serverSide: false,
                    ajax: false,
                    searching: false,
                    info : '',
                    data: $data_site,
                    columns: [
                        {'data': 'SiteName', 'class': 'text-center', 'render': function (data, type, row, meta) {
                            return '<span class="black">' + data + '</span>';
                        }},
                        {'data': 'VisitorCnt', 'class': 'text-center', 'render': function (data, type, row, meta) {
                            return '<strong>' + addComma(data) + '</strong>';
                        }}
                    ], footerCallback: function( tfoot, data, start, end, display ) {
                        var api = this.api();
                        $(api.column(1).footer()).html(
                            addComma(
                                api.column(1).data().reduce(function ( a, b ) {
                                    return (parseInt(a) + parseInt(b));
                                }, 0)
                            )
                        );
                    }
                });

                $datatable_platform = $("#list_platform_table").DataTable({
                    dom: 'Pfrtip',
                    paging : false,
                    serverSide: false,
                    ajax: false,
                    searching: false,
                    info : '',
                    data: $data_platform,
                    columns: [
                        {'data': 'UserPlatform', 'class': 'text-center', 'render': function (data, type, row, meta) {
                            return '<span class="black">' + data + '</span>';
                        }},
                        {'data': 'VisitorCnt', 'class': 'text-center', 'render': function (data, type, row, meta) {
                            return '<strong>' + addComma(data) + '</strong>';
                        }}
                    ],footerCallback: function( tfoot, data, start, end, display ) {
                        var api = this.api();
                        $(api.column(1).footer()).html(
                            addComma(
                                api.column(1).data().reduce(function ( a, b ) {
                                    return (parseInt(a) + parseInt(b));
                                }, 0)
                            )
                        );
                    }
                });
            }

            function datatableReset() {
                $datatable_count.destroy();
                $datatable_app_count.destroy();
                $datatable_site.destroy();
                $datatable_platform.destroy();
                datatableExe();
            }

            $search_form.on('click', '.btn-search', function() {
                chartExe();
                datatableReset();
            });

            $search_form.on('ifChanged','input[name="site_code_all_check"]', function () {
                var $_name = $('input[name="'+$(this).data("name")+'[]"]');
                iCheckAll($_name, $(this));
            });

            chartExe();
            datatableExe();
        });
    </script>
@stop
