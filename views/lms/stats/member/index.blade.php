@extends('lcms.layouts.master')

@section('content')
    <h5>- Data Laboratory[회원]</h5>
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
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="{{date('Y-m-d', strtotime(date('Y-m-d') . ' -1 months'))}}" autocomplete="off">
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
                    <label class="control-label col-md-1" for="search_is_use">조건검색</label>
                    <div class="col-md-10 form-inline">
                        <select class="form-control mr-10" id="search_age" name="search_age">
                            <option value=""> [ 연령 ]</option>
                            @for($i=10;$i<70;$i+=10)
                                <option value="{{$i}}">{{$i}}대</option>
                            @endfor
                            <option value="etc"> 기타연령 </option>
                        </select>
                        &nbsp;
                        <select class="form-control mr-10" id="search_sex" name="search_sex">
                            <option value=""> [ 성별 ]</option>
                            <option value="M">남성</option>
                            <option value="F">여성</option>
                        </select>
                        &nbsp;
                        <select class="form-control mr-10" id="search_interest" name="search_interest">
                            <option value=""> [ 관심분야 ]</option>
                            @foreach($code_interest as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
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
                <div class="col-md-12 form-inline">
                    <div  id="member_count" style="position: relative; width: 100%; height: 430px; border: 1px solid #ccc; align-content: center">
                       <canvas id="member_count_stats"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="x_content">
            <p></p>
            <div class="form-group">
                <div class="col-md-4 form-inline">
                    <div  id="member_age" style="width: 100%; height: 320px; border: 1px solid #ccc;">
                        <canvas id="member_age_stats"></canvas>
                    </div>
                </div>
                <div class="col-md-4 form-inline">
                    <div id="member_sex" style="width: 100%; height: 320px; border: 1px solid #ccc;">
                        <canvas id="member_sex_stats"></canvas>
                    </div>
                </div>
                <div class="col-md-4 form-inline">
                    <div  id="member_interest" style="width: 100%; height: 320px; border: 1px solid #ccc;">
                        <canvas id="member_interest_stats"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="x_content">
            <p></p>
            <div class="form-group">
                <div class="col-md-12 form-inline">
                    <div id="member_login"  style="width: 100%; height: 430px; border: 1px solid #ccc;">
                        <canvas id="member_login_stats"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <BR><BR>
    <ul class="tabs-site-code nav nav-tabs bar_tabs mt-30" role="tablist">
        <li role="presentation" ><a role="tab" href="#chart_view"><strong>Chart</strong></a></li>
        <li class="active" role="presentation"><a aria-expanded="true"  role="tab" href="#data_view" name="data_view"><strong>Data</strong></a></li>
    </ul>
    <div class="x_panel form-horizontal" id="data_view_area">
        <div class="x_content ">
            <div class="form-group">
                <p></p>
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
            </div>

            <div class="form-group">
                <p></p>
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
            </div>

            <div class="form-group">
                <p></p>
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
            sendAjax('{{ site_url('/stats/statsMember/getData/') }}'+$type, data, function (ret) {
                $result = ret.data;
            }, showError, false, 'POST');
            return $result;
        }

        {{--각 항목의 데이터 변수--}}
        var $member_count=[] ,$member_age=[], $member_sex=[], $member_login=[];

        function chartExe() {

            var chartColors = window.chartColors;
            var color = Chart.helpers.color;

            {{--######################################################  가입/탈퇴수    ####################################################--}}
            $member_count = getStats('Member/Count');
            var $base_date = [], $join_count = []; $out_count = [];
            for (key in $member_count) {
                $base_date.push($member_count[key]['base_date']);
                $join_count.push($member_count[key]['join_count']);
                $out_count.push($member_count[key]['out_count']);
            }
            var config_member_count = {
                type: 'line',
                data: {
                    labels: $base_date,
                    datasets: [{
                        label: '가입',
                        fill: false,
                        backgroundColor: window.chartColors.red,
                        borderColor: window.chartColors.red,
                        data:$join_count,
                    }, {
                        label: '탈퇴',
                        fill: false,
                        backgroundColor: window.chartColors.blue,
                        borderColor: window.chartColors.blue,
                        data: $out_count,
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    title: {
                        display: true,
                        text: '회원현황'
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
            {{--######################################################  가입/탈퇴    ####################################################--}}

            {{--######################################################  연령대    ####################################################--}}
            $member_age = getStats('Member/Age');
            $join_age = Object.keys($member_age[0]).map(function(i) {
                return $member_age[0][i];
            });
            $join_age.splice(0,1);

            $out_age = Object.keys($member_age[1]).map(function(i) {
                return $member_age[1][i];
            });
            $out_age.splice(0,1);
            var config_age = {
                labels: ['10대', '20대', '30대', '40대', '50대', '60대', '기타'],
                datasets: [{
                    label: '가입',
                    backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                    borderColor: window.chartColors.red,
                    borderWidth: 1,
                    data: $join_age
                }, {
                    label: '탈퇴',
                    backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                    borderColor: window.chartColors.blue,
                    borderWidth: 1,
                    data: $out_age
                }],
            };
            {{--######################################################  연령대    ####################################################--}}

            {{--######################################################  성별   ####################################################--}}
            $member_sex = getStats('Member/Sex');
            $join_sex = Object.keys($member_sex[0]).map(function(i) {
                return $member_sex[0][i];
            });
            $join_sex.splice(0,1);
            $out_sex = Object.keys($member_sex[1]).map(function(i) {
                return $member_sex[1][i];
            });
            $out_sex.splice(0,1);
            var config_sex = {
                labels: ['남자', '여자', '성별없음'],
                datasets: [{
                    label: '가입',
                    backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                    borderColor: window.chartColors.red,
                    borderWidth: 1,
                    data: $join_sex
                }, {
                    label: '탈퇴',
                    backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                    borderColor: window.chartColors.blue,
                    borderWidth: 1,
                    data: $out_sex
                }]
            };
            {{--######################################################  성별    ####################################################--}}

            {{--######################################################  관심분야    ####################################################--}}
            $member_interest = getStats('Member/Interest');
            var $interest_name = [], $interest_count = [], $interest_color = [];
            var $util_color = Object.keys(chartColors).map(function(i) {
                return chartColors[i];
            });
            $i=0;
            for (key in $member_interest) {
                $interest_name.push($member_interest[key]['interest_name']);
                $interest_count.push($member_interest[key]['count']);
                $interest_color.push(color($util_color[$i]).alpha(0.5).rgbString());
                $i++
            }

            var config_interest = {
                    data: {
                        datasets: [{
                            data:$interest_count,
                            backgroundColor: $interest_color,
                            label: '관심분야' // for legend
                        }],
                        labels: $interest_name
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            position: 'right',
                        },
                        title: {
                            display: true,
                            text: '관심분야'
                        },
                        tooltips: {
                            callbacks: {
                                label: function (tooltipItem, data) {
                                    var tooltipLabel = data.labels[tooltipItem.index];
                                    var tooltipValue = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                                    return tooltipLabel+' : '+parseInt(tooltipValue).toLocaleString();
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
            {{--######################################################  관심분야    ####################################################--}}

            {{--######################################################  로그인수    ####################################################--}}
            $member_login = getStats('Member/Login');
            var $base_date_login = [], $login_count = [];
            for (key in $member_login) {
                $base_date_login.push($member_login[key]['base_date']);
                $login_count.push($member_login[key]['login_count']);
            }
            var config_login_count = {
                    type: 'line',
                    data: {
                        labels: $base_date_login,
                        datasets: [{
                            label: '로그인 수',
                            backgroundColor: window.chartColors.green,
                            borderColor: window.chartColors.green,
                            data:$login_count,
                            fill: false,
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        title: {
                            display: true,
                            text: '로그인 현황'
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
            {{--######################################################  로그인수    ####################################################--}}

            canvas_clear('member_count');
            var ctx_member_count = document.getElementById('member_count_stats').getContext('2d');
            window.myLine = new Chart(ctx_member_count, config_member_count);

            canvas_clear('member_interest');
            var ctx_interest = document.getElementById('member_interest_stats').getContext('2d');
            window.myPolarArea = Chart.PolarArea(ctx_interest, config_interest);

            canvas_clear('member_age');
            var ctx_age = document.getElementById('member_age_stats').getContext('2d');
            window.myBar = new Chart(ctx_age, {
                type: 'bar',
                data: config_age,
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: '연령대'
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

            canvas_clear('member_sex');
            var ctx_sex = document.getElementById('member_sex_stats').getContext('2d');
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

            canvas_clear('member_login');
            var ctx_member_login = document.getElementById('member_login_stats').getContext('2d');
            window.myLine = new Chart(ctx_member_login, config_login_count);
        }

        function canvas_clear(str_div_id) {
            var $divId = $("#"+str_div_id);
            $divId.empty();
            $divId.append("<canvas id='"+str_div_id+"_stats'></canvas>");
        }


        var $datatable_member, $datatable_login, $datatable_age, $datatable_sex, $datatable_interest;

        function datatableExe() {
            $datatable_member = $("#list_member_table").DataTable({
                dom: 'T<"clear">rtip',
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
                            return (data > 0) ? '<b><font color=\'red\'>' + addComma(data) + '</font></b>' : data;
                    }},
                    {'data': 'out_count', 'class': 'text-center', 'render': function (data, type, row, meta) {
                            return (data > 0) ? '<b><font color=\'blue\'>' + addComma(data) + '</font></b>' : data;
                    }}
                ]
            });

            $datatable_login = $("#list_login_table").DataTable({
                dom: 'T<"clear">rtip',
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
                            return (data > 0) ? '<b><font color=\'#4bc0c0\'>' + addComma(data) + '</font></b>' : data;
                    }}
                ]
            });

            $datatable_age = $("#list_age_table").DataTable({
                dom: 'T<"clear">rtip',
                serverSide: false,
                paging: false,
                ajax: false,
                searching: false,
                info : '',
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
                dom: 'T<"clear">rtip',
                serverSide: false,
                paging: false,
                ajax: false,
                searching: false,
                info : '',
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
                            return (data > 0) ? '<font color=\'black\'>' + addComma(data) + '</font>' : data;
                        }},
                ]
            });

            $datatable_interest = $("#list_interest_table").DataTable({
                dom: 'T<"clear">rtip',
                order: [[0, 'asc']],
                ordering: true,
                serverSide: false,
                paging: false,
                ajax: false,
                searching: false,
                info : '',
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

            $search_form.on('ifChanged','input[name="site_code_all_check"]', function () {
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

        $search_form.on('click', '.btn-search', function() {
            chartExe();
            datatableReset();
        });

        chartExe();
        datatableExe();
    });
    </script>
@stop
