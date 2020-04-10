@extends('lcms.layouts.master')

@section('content')
    <h5>- Data Analysis [검색어]</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">운영사이트</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_checkbox($def_site_code, 'search_site_code', 'search_site_code', '', '운영 사이트', 'required', '', true, $arr_site_code, '', 'checked', true)!!}
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
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">검색</label>
                    <div class="col-md-10 form-inline">
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;" value=""> [검색어]
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_type">조건검색</label>
                    <div class="col-md-11 form-inline">
                        <div class="checkbox">
                            <input type="checkbox" name="search_except_will_ip" id="search_except_will_ip" class="flat" value="Y"> 윌비스 IP 제외 [* 대략적인 영역임으로 정확도를 요하지는 않음]
                        </div>
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
                    <div  id="search_count" style="position: relative; width: 100%; height: 430px; border: 1px solid #ccc; align-content: center">
                        <canvas id="search_count_stats"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="x_content">
            <p></p>
            <div class="form-group">
                <div class="col-md-7">
                    <div  id="search_site" style="position: relative; width: 100%; height: 430px; border: 1px solid #ccc; align-content: center">
                        <canvas id="search_site_stats"></canvas>
                    </div>
                </div>
                <div class="col-md-5">
                    <div  id="search_platform" style="position: relative; width: 100%; height: 430px; border: 1px solid #ccc; align-content: center">
                        <canvas id="search_platform_stats"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="x_content">
            <p></p>
            <div class="col-md-12 form-inline">
                <b><font color="#000000">[Word Cloud]</font></b>
                <div id="search_cloud_words" style="width: 100%; height: 300px; border: 1px solid #ccc;"></div>
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
                    <strong>[검색현황]</strong>
                    <div class="x_content">
                        <table id="list_search_info_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                            <tr>
                                <th width="120" style="text-align: center;"  rowspan="2" class="valign-middle">날짜</th>
                                <th colspan="2" style="text-align: center;">로그인</th>
                                <th colspan="2" style="text-align: center;">비로그인</th>
                                <th colspan="2" style="text-align: center;">총합</th>
                            </tr>
                            <tr>
                                <th style="text-align: center;">건수</th>
                                <th style="text-align: center;">검색결과수</th>
                                <th style="text-align: center;">건수</th>
                                <th style="text-align: center;">검색결과수</th>
                                <th style="text-align: center;">건수</th>
                                <th style="text-align: center;">검색결과수</th>
                            </tr>
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
                <div class="col-md-6 form-inline">
                    <strong>[사이트별 검색현황]</strong>
                    <div class="x_content">
                        <table id="list_site_search_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>사이트</th>
                                <th>검색건수</th>
                                <th>검색결과수</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>총합</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 form-inline">
                    <strong>[플랫폼별 검색현황]</strong>
                    <div class="x_content">
                        <table id="list_platform_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>플랫폼</th>
                                <th>검색건수</th>
                                <th>검색결과수</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td>총합</td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <p></p>
                <div class="col-md-7 form-inline">
                    <strong>[사이트별 검색어 순위]</strong>
                    <div class="x_content">
                        <table id="list_site_search_word_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>순위</th>
                                <th>사이트</th>
                                <th>검색어</th>
                                <th>검색건수</th>
                                <th>검색결과수</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-5 form-inline">
                    <strong>[전체 검색어 순위]</strong>
                    <div class="x_content">
                        <table id="list_search_word_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>순위</th>
                                <th>검색어</th>
                                <th>검색건수</th>
                                <th>검색결과수</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12 form-inline">
                    <strong>[검색 이력]</strong>
                    <div class="x_content">
                        <table id="list_ajax_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="30">NO</th>
                                <th width="120">사이트</th>
                                <!--th width="150">분류</th//-->
                                <th >검색어</th>
                                <th width="120">플랫폼</th>
                                <th width="90">검색결과</th>
                                <th width="230">결과정보 </th>
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
    <script src="/public/vendor/jqcloud/jqcloud-1.0.4.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/vendor/jqcloud/jqcloud.css" />
    <script type="text/javascript">
        $(document).ready(function(){
            var $search_form = $('#search_form');

            function getStats($type) {
                var data = {
                    '{{ csrf_token_name() }}': $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                };
                data = $.extend($search_form.serializeArray(), {});

                var $result = '';
                sendAjax('{{ site_url('/stats/statsSearch/getData/') }}'+$type, data, function (ret) {
                    $result = ret.data;
                }, showError, false, 'POST');
                return $result;
            }

            {{--각 항목의 데이터 결과 변수--}}
            var $search_count=[], $search_site=[], $search_platform=[];

            function chartExe() {

                var chartColors = window.chartColors;
                var color = Chart.helpers.color;

                {{--######################################################  검색현황   ####################################################--}}
                $search_count = getStats('Search/Count');
                $base_date = [], $all_search_count=[] ,$login_search_count=[], $not_search_count=[];
                for (key in $search_count) {
                    $base_date.push($search_count[key]['base_date']);
                    $all_search_count.push( parseInt($search_count[key]['login_search_count'])+parseInt($search_count[key]['not_search_count']));
                    $login_search_count.push($search_count[key]['login_search_count']);
                    $not_search_count.push($search_count[key]['not_search_count']);
               }
                var config_count = {
                    type: 'line',
                    data: {
                        labels: $base_date,
                        datasets: [{
                            label: '로그인',
                            fill: false,
                            backgroundColor: window.chartColors.red2,
                            borderColor: window.chartColors.red2,
                            data: $login_search_count,
                        }, {
                            label: '비로그인',
                            fill: false,
                            backgroundColor: window.chartColors.green2,
                            borderColor: window.chartColors.green2,
                            data: $not_search_count,
                        }, {
                            label: '총합',
                            fill: true,
                            backgroundColor: color(window.chartColors.yellow2).alpha(0.5).rgbString(),
                            borderColor: window.chartColors.yellow2,
                            data: $all_search_count,
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        title: {
                            display: true,
                            text: '검색현황'
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
                                    labelString: '검색건수'
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
                $search_site = getStats('Search/Site');
                $base_site=[], $site_count=[];
                for (key in $search_site) {
                    $base_site.push($search_site[key]['SiteName']);
                    $site_count.push($search_site[key]['search_count']);
                }
                var config_site = {
                    labels: $base_site,
                    datasets: [{
                        label: '검색건수',
                        backgroundColor: color(window.chartColors.green2).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.green2,
                        borderWidth: 1,
                        data: $site_count
                    }]
                };
                {{--######################################################  사이트별   ####################################################--}}

                {{--######################################################  플랫폼별   ####################################################--}}
                $search_platform = getStats('Search/Platform');
                $platform=[], $platform_count=[];
                for (key in $search_platform) {
                    $platform.push($search_platform[key]['user_platform']);
                    $platform_count.push($search_platform[key]['search_count']);
                }
                var config_platform = {
                    labels: $platform,
                    datasets: [{
                        label: '검색건수',
                        backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.green,
                        borderWidth: 1,
                        data: $platform_count
                    }]
                };
                {{--######################################################  플랫폼별   ####################################################--}}

                canvas_clear('search_count');
                var ctx_search_count = document.getElementById('search_count_stats').getContext('2d');
                window.myLine = new Chart(ctx_search_count, config_count);

                canvas_clear('search_site');
                var ctx_site = document.getElementById('search_site_stats').getContext('2d');
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
                            text: '사이트별 검색현황'
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

                canvas_clear('search_platform');
                var ctx_platform = document.getElementById('search_platform_stats').getContext('2d');
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
                            text: '플랫폼별 검색현황'
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

            function wordCloud() {
                $("#search_cloud_words").empty();
                $search_cloud = getStats('Search/Cloud');
                var word_list = $search_cloud;
                $("#search_cloud_words").jQCloud(word_list);
            }

            var $datatable_search_info, $datatable_site, $datatable_platform, $datatable_site_word, $datatable_word;

            function datatableExe() {
                $datatable_search_info = $("#list_search_info_table").DataTable({
                    order: [[0, 'asc']],
                    ordering: true,
                    serverSide: false,
                    ajax: false,
                    searching: false,
                    data: $search_count,
                    columns: [
                        {'data': 'base_date', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<font color="black">' + data+ '</font>';
                            }},
                        {'data': 'login_search_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<b><font color=\'#eb7f36\'>' + addComma(data) + '</font></b>';
                            }},
                        {'data': 'login_search_result_sum', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<font color=\'#eb7f36\'>' + addComma(data) + '</font>';
                            }},
                        {'data': 'not_search_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<b><font color=\'#4bc0c0\'>' + addComma(data) + '</font></b>';
                            }},
                        {'data': 'not_search_result_sum', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<font color=\'#4bc0c0\'>' + addComma(data) + '</font>';
                            }},
                        {'data': null, 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<b><font color=\'#537bc4\'>' + addComma( parseInt(row.login_search_count) + parseInt(row.not_search_count)) + '</font></b>';
                            }},
                        {'data': null, 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<font color=\'#537bc4\'>' + addComma( parseInt(row.login_search_result_sum) + parseInt(row.not_search_result_sum)) + '</font>';
                            }}
                    ]
                });
                $datatable_site = $("#list_site_search_table").DataTable({
                    dom: 'T<"clear">rtip',
                    serverSide: false,
                    paging: false,
                    ajax: false,
                    searching: false,
                    info : '',
                    data: $search_site,
                    columns: [
                        {'data': 'SiteName', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return  '<font color="black">'  + data+ '</font>';
                            }},
                        {'data': 'search_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<b><font color=\'#537bc4\'>' + addComma(data) + '</font></b>';
                            }},
                        {'data': 'search_result_sum', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<font color=\'#537bc4\'>' + addComma(data) + '</font>';
                            }},
                    ],
                    footerCallback: function( tfoot, data, start, end, display ) {
                        var api = this.api();
                        $(api.column(1).footer()).html(
                            addComma(
                                api.column(1).data().reduce(function ( a, b ) {
                                    return (parseInt(a) + parseInt(b));
                                }, 0)
                            )
                        );
                        $(api.column(2).footer()).html(
                            addComma(
                                api.column(2).data().reduce(function ( a, b ) {
                                    return (parseInt(a) + parseInt(b));
                                }, 0)
                            )
                        );
                    }
                });

                $datatable_platform = $("#list_platform_table").DataTable({
                    dom: 'T<"clear">rtip',
                    order: [[0, 'asc']],
                    ordering: true,
                    serverSide: false,
                    paging: false,
                    ajax: false,
                    searching: false,
                    info : '',
                    data: $search_platform,
                    columns: [
                        {'data': 'user_platform', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return  '<font color="black">'  + data+ '</font>';
                            }},
                        {'data': 'search_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<b><font color=\'#537bc4\'>' + addComma(data) + '</font></b>';
                            }},
                        {'data': 'search_result_sum', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<font color=\'#537bc4\'>' + addComma(data) + '</font>';
                            }},
                    ],
                    footerCallback: function( tfoot, data, start, end, display ) {
                        var api = this.api();
                        $(api.column(1).footer()).html(
                            addComma(
                                api.column(1).data().reduce(function (a, b) {
                                    return (parseInt(a) + parseInt(b));
                                }, 0)
                            )
                        );
                        $(api.column(2).footer()).html(
                            addComma(
                                api.column(2).data().reduce(function (a, b) {
                                    return (parseInt(a) + parseInt(b));
                                }, 0)
                            )
                        );
                    }
                });

                $datatable_site_word = $("#list_site_search_word_table").DataTable({
                    dom: 'T<"clear">rtip',
                    order: [[0, 'asc']],
                    ordering: true,
                    serverSide: false,
                    paging: false,
                    ajax: false,
                    searching: false,
                    info : '',
                    data: getStats('Search/SiteWord'),
                    columns: [
                        {'data': null, 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (meta.row==0 ? '<b><font color=\'#eb7f36\'>' : '')+(meta.row + 1)+'</font></b>';
                            }},
                        {'data': 'SiteName', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (meta.row==0 ? '<b><font color=\'#eb7f36\'>' : '')+ data + '</font></b>';
                            }},
                        {'data': 'SearchWord', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (meta.row==0 ? '<b><font color=\'#eb7f36\'>' : '')+ data + '</font></b>';
                            }},
                        {'data': 'search_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (meta.row==0 ? '<b><font color=\'#eb7f36\'>' : '') + addComma(data) + '</font></b>';
                            }},
                        {'data': 'search_result_sum', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (meta.row==0 ? '<b><font color=\'#eb7f36\'>' : '') + addComma(data) + '</font></b>';
                            }},
                    ]
                });

                $datatable_word = $("#list_search_word_table").DataTable({
                    dom: 'T<"clear">rtip',
                    order: [[0, 'asc']],
                    ordering: true,
                    serverSide: false,
                    paging: false,
                    ajax: false,
                    searching: false,
                    info : '',
                    data: getStats('Search/Word'),
                    columns: [
                        {'data': null, 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (meta.row==0 ? '<b><font color=\'#eb7f36\'>' : '')+(meta.row + 1)+'</font></b>';
                            }},
                        {'data': 'SearchWord', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (meta.row==0 ? '<b><font color=\'#eb7f36\'>' : '')+ data + '</font></b>';
                            }},
                        {'data': 'search_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (meta.row==0 ? '<b><font color=\'#eb7f36\'>' : '') + addComma(data) + '</font></b>';
                            }},
                        {'data': 'search_result_sum', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (meta.row==0 ? '<b><font color=\'#eb7f36\'>' : '') + addComma(data) + '</font></b>';
                            }},
                    ]
                });

                $datatable_list = $('#list_ajax_table').DataTable({
                    serverSide: true,
                    ajax: {
                        'url' : '{{ site_url('/stats/statsSearch/listAjax') }}',
                        'type' : 'POST',
                        'data' : function(data) {
                            return $search_form.formSerialize()+'&start='+data.start+'&length='+data.length;
                        }
                    },
                    columns: [
                        {'data' : null, 'render' : function(data, type, row, meta) {
                                return $datatable_list.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                            }},
                        {'data' : 'SiteName'},
                        {'data' : null, 'render' : function(data, type, row, meta) {
                                return "<b>"+row.SearchWord + "</b>";
                            }},
                        {'data' : 'UserPlatform'},
                        {'data' : 'ResultCount', 'render' : function(data, type, row, meta) {
                                return addComma(data);
                            }},
                        {'data' : 'ResultInfo'},
                        {'data' : 'UserIp'},
                        {'data' : 'RegDatm'}
                    ]
                });

                $('#site_code_all_check').on('ifChanged', function() {
                    var $_name = $('input[name="'+$(this).data("name")+'[]"]');
                    iCheckAll($_name, $(this));
                });
            }

            function datatableReset() {
                $datatable_search_info.destroy();
                $datatable_site.destroy();
                $datatable_platform.destroy();
                $datatable_site_word.destroy();
                $datatable_word.destroy();
                $datatable_list.destroy();
                datatableExe();
            }

            $search_form.on('click', '.btn-search', function() {
                chartExe();
                wordCloud();
                datatableReset();
            });

            chartExe();
            wordCloud();
            datatableExe();
        });
    </script>
@stop
