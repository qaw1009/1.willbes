<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>Will Log Viewer</title>
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
    <h1>Will Log Viewer</h1>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form id="search_form" name="search_form" method="GET">
                        <div class="col-xs-1" style="padding-left: 0;">
                            <select class="form-control" id="log_type" name="log_type" required="required">
                                <option value="">TYPE</option>
                                <option value="willbes">willbes</option>
                                <option value="lms">lms</option>
                                <option value="wbs">wbs</option>
                                <option value="cli">cron</option>
                                <option value="pg">PG결제</option>
                                <option value="deposit">PG입금통보</option>
                            </select>
                        </div>
                        <div class="col-xs-1" style="padding-left: 0;">
                            <select class="form-control" id="log_pattern" name="log_pattern" required="required">
                                <option value="">PATTERN</option>
                                <option value="log">log</option>
                                <option value="query">query</option>
                                <option value="slow-query">slow query</option>
                            </select>
                        </div>
                        <div class="col-xs-1" style="padding-left: 0;">
                            <select class="form-control" id="log_level" name="log_level">
                                <option value="">Level</option>
                                <option value="DEBUG">DEBUG</option>
                                <option value="ERROR">ERROR</option>
                            </select>
                        </div>
                        <div class="col-xs-2 input-group">
                            <input type="text" id="log_date" name="log_date" class="form-control datepicker" value="{{ date('Y-m-d') }}" required="required" autocomplete="off"/>
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit" id="btn_search">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
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
                                <th>exec time</th>
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
<script type="text/javascript">
    var $search_form = $('#search_form');
    var $datatable;

    $(document).ready(function() {
        // 검색어 셋팅
        $search_form.find('select[name="log_type"]').val('{{ $log_type }}');
        $search_form.find('select[name="log_pattern"]').val('{{ $log_pattern }}');
        $search_form.find('select[name="log_level"]').val('{{ $log_level }}');
        $search_form.find('input[name="log_date"]').val('{{ $log_date }}');

        // 로그유형 선택 이벤트
        $search_form.on('change', 'select[name="log_pattern"]', function() {
            if ($(this).val() === 'log') {
                $search_form.find('select[name="log_level"]').prop('disabled', false);
            } else {
                $search_form.find('select[name="log_level"]').prop('disabled', true);
            }
        });

        // datatable
        $datatable = $('#log_table').dataTable({
            order: [[0, 'asc']],
            pageLength: 50,
            lengthMenu: [[20, 50, 100, 1000], [20, 50, 100, 1000]],
            paginationType : 'full_numbers'
        });

        $datatable.on('page.dt', function() {
            $('html, body').animate({
                scrollTop: 0
            }, 300);
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