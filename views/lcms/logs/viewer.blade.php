<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>Log Viewer</title>
    <!-- Bootstrap -->
    <link href="/public/vendor/bootstrap/v.3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="/public/vendor/bootstrap/datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="/public/vendor/datatables/v.1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        td {
            word-wrap: break-word;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-6">
            <h1>Log Viewer</h1>
        </div>
        <div class="col-xs-6 text-right">
            <h2>{{ $_SERVER['SERVER_NAME'] }} ({{ $_SERVER['SERVER_ADDR'] }})</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" id="search_form" name="search_form" method="GET">
                        <input type="hidden" name="sort_idx" value="{{ $sort_idx }}"/>
                        <input type="hidden" name="sort_dir" value="{{ $sort_dir }}"/>
                        <div class="col-xs-1" style="padding-left: 0;">
                            <select class="form-control" id="log_type" name="log_type" required="required">
                                <option value="">TYPE</option>
                                <option value="willbes">willbes</option>
                                <option value="lms">lms</option>
                                <option value="wbs">wbs</option>
                                <option value="btob">btob</option>
                                <option value="api">api</option>
                                <option value="cron">cron</option>
                                <option value="pg">PG결제</option>
                                <option value="pg_mobile">PG모바일</option>
                                <option value="deposit">PG입금통보</option>
                            </select>
                        </div>
                        <div class="col-xs-1" style="padding-left: 0;">
                            <select class="form-control" id="log_pattern" name="log_pattern" required="required">
                                <option value="">PATTERN</option>
                                <option value="log">log</option>
                                <option value="query">query</option>
                                <option value="slow">slow query</option>
                            </select>
                        </div>
                        <div class="col-xs-1" style="padding-left: 0;">
                            <select class="form-control" id="log_level" name="log_level">
                                <option value="ALL">Level</option>
                                <option value="DEBUG">DEBUG</option>
                                <option value="ERROR">ERROR</option>
                            </select>
                        </div>
                        <div class="col-xs-2">
                            <div class="input-group">
                                <input type="text" id="log_date" name="log_date" class="form-control datepicker" value="{{ date('Y-m-d') }}" required="required" autocomplete="off"/>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit" id="btn_search">Search</button>
                                </span>
                            </div>
                        </div>
                        <div class="col-xs-7 text-right" style="padding-right: 0;">
                            <button class="btn btn-success" type="button" id="btn_download">Download</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    @if(is_array($log_data) === true)
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>{{ $log_type }} > {{ $log_pattern }} > {{ $log_date }}</strong></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="log_table">
                        @if($log_pattern == 'log')
                            <thead>
                            <tr>
                                <th>idx</th>
                                <th>level</th>
                                <th style="width: 120px;">time</th>
                                <th>message</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($log_data as $row)
                                <tr class="{{ $css_classes[$row['level']] }}">
                                    <td>{{ $loop->index }}</td>
                                    <td>{{ $row['level'] }}</td>
                                    <td>{{ $row['time'] }}</td>
                                    <td>{{ $row['message'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        @else
                            <thead>
                            <tr>
                                <th>idx</th>
                                <th style="width: 120px;">time</th>
                                <th class="rowspan">uri</th>
                                <th>seq</th>
                                <th>exec</th>
                                <th>query</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($log_data as $row)
                                <tr class="">
                                    <td>{{ $loop->index }}</td>
                                    <td>{{ $row['time'] }}</td>
                                    <td>/{{ $row['uri'] }}</td>
                                    <td>{{ $row['seq'] }}</td>
                                    <td>{{ $row['exec_time'] }}</td>
                                    <td>{{ $row['query'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-xs-12">
            <div class="alert alert-danger" role="alert">{{ $log_data }}</div>
        </div>
    @endif
    </div>
</div>
<!-- Jquery -->
<script src="/public/vendor/jquery/v.2.2.3/jquery.min.js"></script>
<!-- Moment -->
<script src="/public/vendor/moment/moment.min.js"></script>
<script src="/public/vendor/moment/moment-with-locales.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="/public/vendor/bootstrap/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- Datatables -->
<script src="/public/vendor/datatables/v.1.10.15/js/jquery.dataTables.min.js"></script>
<script src="/public/vendor/datatables/v.1.10.15/js/dataTables.bootstrap.min.js"></script>
<!-- Custom Util -->
<script src="/public/js/util.js"></script>
<script type="text/javascript">
    var $search_form = $('#search_form');
    var $datatable;

    $(document).ready(function() {
        // 검색어 셋팅
        $search_form.find('select[name="log_type"]').val('{{ $log_type }}');
        $search_form.find('select[name="log_pattern"]').val('{{ $log_pattern }}');
        $search_form.find('select[name="log_level"]').val('{{ $log_level }}');
        $search_form.find('input[name="log_date"]').val('{{ $log_date }}');

        if ($search_form.find('select[name="log_pattern"]').val() !== 'log') {
            $search_form.find('select[name="log_level"]').prop('disabled', true);
        }

        // 로그유형 선택 이벤트
        $search_form.on('change', 'select[name="log_pattern"]', function() {
            if ($(this).val() === 'log') {
                $search_form.find('select[name="log_level"]').prop('disabled', false);
            } else {
                $search_form.find('select[name="log_level"]').prop('disabled', true);
            }
        });

        // datatable
        var _arr_order = ['{{ $sort_idx }}', '{{ $sort_dir }}'];
        $datatable = $('#log_table').dataTable({
            order: [_arr_order],
            pageLength: 50,
            lengthMenu: [[20, 50, 100, 1000], [20, 50, 100, 1000]],
            paginationType : 'full_numbers'
        });

        $datatable.on('order.dt', function() {
            var arr_order = $datatable.api().order();

            $search_form.find('input[name="sort_idx"]').val(arr_order[0][0]);
            $search_form.find('input[name="sort_dir"]').val(arr_order[0][1]);
        });

        $datatable.on('page.dt', function() {
            $('html, body').animate({
                scrollTop: 0
            }, 300);
        });

        // 다운로드 버튼 클릭
        $search_form.on('click', '#btn_download', function(event) {
            event.preventDefault();
            if (confirm('정말로 로그파일을 다운로드 하시겠습니까?')) {
                var params = $search_form.serializeArray();
                params.push({ 'name' : '{{ csrf_token_name() }}', 'value' : '{{ csrf_token() }}'});

                formCreateSubmit('{{ site_url('/lcms/logs/viewer/download') }}', params, 'POST');
            }
        });

        // datepicker
        $(document).on('focus', '.datepicker', function() {
            $(this).datetimepicker({
                locale : 'ko',
                format: 'YYYY-MM-DD',
                ignoreReadonly: true,
                allowInputToggle: true
            });
        });
    });
</script>
</body>
</html>