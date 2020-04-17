@extends('lcms.layouts.master')

@section('content')
    <h5>- Data Laboratory[배너]</h5>
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
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;" value=""> [배너명]
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
                    <div  id="banner_count" style="position: relative; width: 100%; height: 430px; border: 1px solid #ccc; align-content: center">
                        <canvas id="banner_count_stats"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="x_content">
            <p></p>
            <div class="form-group">
                <div class="col-md-7">
                    <div  id="banner_site" style="position: relative; width: 100%; height: 430px; border: 1px solid #ccc; align-content: center">
                        <canvas id="banner_site_stats"></canvas>
                    </div>
                </div>
                <div class="col-md-5">
                    <div  id="banner_platform" style="position: relative; width: 100%; height: 430px; border: 1px solid #ccc; align-content: center">
                        <canvas id="banner_platform_stats"></canvas>
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
                <div class="col-md-5 form-inline">
                    <strong>[기간별 클릭현황]</strong>
                    <div class="x_content">
                        <table id="list_count_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                            <tr>
                                <th width="120" style="text-align: center;" >날짜</th>
                                <th style="text-align: center;">로그인-클릭</th>
                                <th style="text-align: center;">비로그인-클릭</th>
                                <th style="text-align: center;">총합</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 form-inline">
                    <strong>[사이트별 클릭현황]</strong>
                    <div class="x_content">
                        <table id="list_site_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="text-align: center;">사이트</th>
                                <th style="text-align: center;">클릭수</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th style="text-align: center;">총합</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-md-3 form-inline">
                    <strong>[플랫폼별 클릭현황]</strong>
                    <div class="x_content">
                        <table id="list_platform_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="text-align: center;">플랫폼</th>
                                <th style="text-align: center;">클릭건수</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th style="text-align: center;">총합</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <p></p>
                <div class="col-md-7 form-inline">
                    <strong>[사이트별 클릭순위]</strong>
                    <div class="x_content">
                        <table id="list_site_rank_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>순위</th>
                                <th width="120">사이트</th>
                                <th>배너명</th>
                                <th width="80">배너정보</th>
                                <th width="80">클릭수</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-5 form-inline">
                    <strong>[전체 클릭순위]</strong>
                    <div class="x_content">
                        <table id="list_rank_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>순위</th>
                                <th>배너명</th>
                                <th width="80">배너정보</th>
                                <th width="80">클릭수</th>
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
                    <strong>[배너 클릭이력]</strong>
                    <div class="x_content">
                        <table id="list_ajax_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="30">NO</th>
                                <th width="120">사이트</th>
                                <th width="150">분류</th>
                                <th >배너명</th>
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
                sendAjax('{{ site_url('/stats/statsBanner/getData/') }}'+$type, data, function (ret) {
                    $result = ret.data;
                }, showError, false, 'POST');
                return $result;
            }

            {{--각 항목의 데이터 결과 변수--}}
            var $banner_count=[], $banner_site=[], $banner_platform=[];

            function chartExe() {

                var chartColors = window.chartColors;
                var color = Chart.helpers.color;

                {{--######################################################  검색현황   ####################################################--}}
                $banner_count = getStats('Banner/Count');
                $base_date = [], $all_count=[] ,$login_count=[], $not_count=[];
                for (key in $banner_count) {
                    $base_date.push($banner_count[key]['base_date']);
                    $all_count.push( parseInt($banner_count[key]['click_count'])+parseInt($banner_count[key]['not_click_count']));
                    $login_count.push($banner_count[key]['click_count']);
                    $not_count.push($banner_count[key]['not_click_count']);
                }
                var config_count = {
                    type: 'line',
                    data: {
                        labels: $base_date,
                        datasets: [{
                            label: '로그인',
                            fill: false,
                            backgroundColor: window.chartColors.purple,
                            borderColor: window.chartColors.purple,
                            data: $login_count,
                        }, {
                            label: '비로그인',
                            fill: false,
                            backgroundColor: window.chartColors.blue2,
                            borderColor: window.chartColors.blue2,
                            data: $not_count,
                        }, {
                            label: '총합',
                            fill: true,
                            backgroundColor: color(window.chartColors.grey).alpha(0.5).rgbString(),
                            borderColor: window.chartColors.grey,
                            data: $all_count,
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        title: {
                            display: true,
                            text: '배너 클릭현황'
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
                $banner_site = getStats('Banner/Site');
                $base_site=[], $site_count=[];
                for (key in $banner_site) {
                    $base_site.push($banner_site[key]['SiteName']);
                    $site_count.push($banner_site[key]['click_count']);
                }
                var config_site = {
                    labels: $base_site,
                    datasets: [{
                        label: '클릭수',
                        backgroundColor: color(window.chartColors.grey2).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.grey2,
                        borderWidth: 1,
                        data: $site_count
                    }]
                };
                {{--######################################################  사이트별   ####################################################--}}

                {{--######################################################  플랫폼별   ####################################################--}}
                $banner_platform = getStats('Banner/Platform');
                $platform=[], $platform_count=[];
                for (key in $banner_platform) {
                    $platform.push($banner_platform[key]['user_platform']);
                    $platform_count.push($banner_platform[key]['click_count']);
                }
                var config_platform = {
                    labels: $platform,
                    datasets: [{
                        label: '클릭수',
                        backgroundColor: color(window.chartColors.grey).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.grey,
                        borderWidth: 1,
                        data: $platform_count
                    }]
                };
                {{--######################################################  플랫폼별   ####################################################--}}

                canvas_clear('banner_count');
                var ctx_count = document.getElementById('banner_count_stats').getContext('2d');
                window.myLine = new Chart(ctx_count, config_count);

                canvas_clear('banner_site');
                var ctx_site = document.getElementById('banner_site_stats').getContext('2d');
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
                            text: '사이트별 클릭현황'
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

                canvas_clear('banner_platform');
                var ctx_platform = document.getElementById('banner_platform_stats').getContext('2d');
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
                            text: '플랫폼별 클릭현황'
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


            var $datatable_count_info, $datatable_site, $datatable_platform, $datatable_site_rank, $datatable_rank, $datatable_list;

            function datatableExe() {
                $datatable_count_info = $("#list_count_table").DataTable({
                    dom: 'Pfrtip',
                    order: [[0, 'asc']],
                    ordering: true,
                    serverSide: false,
                    ajax: false,
                    searching: false,
                    data: $banner_count,
                    columns: [
                        {'data': 'base_date', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<font color="black">' + data+ '</font>';
                            }},
                        {'data': 'click_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<b>' + addComma(data) + '</b>';
                            }},
                        {'data': 'not_click_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<b>' + addComma(data) + '</b>';
                            }},
                        {'data': null, 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<b>' + addComma( parseInt(row.click_count) + parseInt(row.not_click_count)) + '</b>';
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
                    data: $banner_site,
                    columns: [
                        {'data': 'SiteName', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<font color="black">' + data+ '</font>';
                            }},
                        {'data': 'click_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<b>' + addComma(data) + '</b>';
                            }},
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

                $datatable_platform = $("#list_platform_table").DataTable({
                    dom: 'Pfrtip',
                    paging : false,
                    serverSide: false,
                    ajax: false,
                    searching: false,
                    info : '',
                    data: $banner_platform,
                    columns: [
                        {'data': 'user_platform', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<font color="black">' + data+ '</font>';
                            }},
                        {'data': 'click_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return '<b>' + addComma(data) + '</b>';
                            }},
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

                $datatable_site_rank = $("#list_site_rank_table").DataTable({
                    dom: 'Pfrtip',
                    paging : false,
                    serverSide: false,
                    ajax: false,
                    searching: false,
                    info : '',
                    data: getStats('Banner/SiteRank'),
                    columns: [
                        {'data': null, 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (meta.row==0 ? '<b><font color=\'#eb7f36\'>' : '')+(meta.row + 1)+'</font></b>';
                            }},
                        {'data': 'SiteName', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (meta.row==0 ? '<b><font color=\'#eb7f36\'>' : '')+(data)+'</font></b>';
                            }},
                        {'data': 'BannerName', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (meta.row==0 ? '<b><font color=\'#eb7f36\'>' : '')+(data)+'</font></b>';
                            }},
                        {'data': null, 'class': 'text-center', 'render': function (data, type, row, meta) {
                                //return '<a href="javascript:;" class="btn-info btn-sm btn-primary border-radius-reset" data-img="'+ row.BannerImgName + '">확인</a>';
                                return "<a href='"+row.BannerFullPath + row.BannerImgName+"' rel='popup-image'><img class='img_' src='"+row.BannerFullPath + row.BannerImgName+"' height='25px'>";
                            }},
                        {'data': 'click_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (meta.row==0 ? '<b><font color=\'#eb7f36\'>' : '')+addComma(data)+'</font></b>';
                            }},
                    ]
                });

                $datatable_rank = $("#list_rank_table").DataTable({
                    dom: 'Pfrtip',
                    paging : false,
                    serverSide: false,
                    ajax: false,
                    searching: false,
                    info : '',
                    data: getStats('Banner/Rank'),
                    columns: [
                        {'data': null, 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (meta.row==0 ? '<b><font color=\'#eb7f36\'>' : '')+(meta.row + 1)+'</font></b>';
                            }},
                        {'data': 'BannerName', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (meta.row==0 ? '<b><font color=\'#eb7f36\'>' : '')+(data)+'</font></b>';
                            }},
                        {'data': null, 'class': 'text-center', 'render': function (data, type, row, meta) {
                                //return '<a href="javascript:;" class="btn-info btn-sm btn-primary border-radius-reset" data-img="'+ row.BannerImgName + '">확인</a>';
                                return "<a href='"+row.BannerFullPath + row.BannerImgName+"' rel='popup-image'><img class='img_' src='"+row.BannerFullPath + row.BannerImgName+"' height='25px'>";
                            }},
                        {'data': 'click_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                                return (meta.row==0 ? '<b><font color=\'#eb7f36\'>' : '')+addComma(data)+'</font></b>';
                            }},
                    ]
                });

                $datatable_list = $('#list_ajax_table').DataTable({
                    serverSide: true,
                    ajax: {
                        'url' : '{{ site_url('/stats/statsBanner/listAjax') }}',
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
                        {'data' : 'CateName'},
                        {'data' : null, 'render' : function(data, type, row, meta) {
                                return "<b>"+row.BannerName + "</b>";
                            }},
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
                $datatable_platform.destroy();
                $datatable_site_rank.destroy();
                $datatable_rank.destroy();
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
