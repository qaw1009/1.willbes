@extends('lcms.layouts.master')
@section('content')
    <h5>- 사용자가 검색한 내용을 확인하는 메뉴입니다. </h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs(element('search_site_code',$arr_input), 'tabs_site_code', 'tab', true, [], false) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_type">분류</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select(element('search_site_code',$arr_input), 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control" id="search_category" name="search_category">
                            <option value="">대분류</option>
                            @foreach($arr_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}" @if(element('search_category',$arr_input) === $row['CateCode']) selected @endif>{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_md_category" name="search_md_category">
                            <option value="">중분류</option>
                            @foreach($arr_m_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}" @if(element('search_md_category',$arr_input) === $row['CateCode']) selected @endif>{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">검색어</label>
                    <div class="col-md-11 form-inline">
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;" value="{{element('search_value',$arr_input)}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">검색일</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="{{element('search_start_date',$arr_input)}}">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="{{element('search_end_date',$arr_input)}}">
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="0-days">당일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-weeks">1주일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="15-days">15일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-months">1개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="3-months">3개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="6-months">6개월</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_type">제외조건</label>
                    <div class="col-md-11 form-inline">
                        <div class="checkbox">
                            <input type="checkbox" name="search_except_will_ip" id="search_except_will_ip" class="flat" value="Y" @if(element('search_except_will_ip',$arr_input) === "Y") checked @endif> 윌비스 IP 제외
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset" onclick="location.href=location.pathname">초기화</button>
            </div>
        </div>
    </form>

        <div class="x_panel form-horizontal">
            <div class="x_content">
                <div class="form-group">
                    <div class="col-md-5 form-inline">
                        <b><font color="#871B47">[사이트 + 분류 + 검색어]</font></b>
                        <font color="#703593"><div id="cate_div"></div></font>
                        <br>
                    </div>
                    <div class="col-md-4 form-inline">
                        <b><font color="#871B47">[사이트 + 검색어]</font></b>
                        <font color="#703593"><div id="site_div"></div></font>
                        <br>
                    </div>
                    <div class="col-md-3 form-inline">
                        <b><font color="#871B47">[검색어]</font></b>
                        <font color="#703593"><div id="word_div"></div></font>
                        <br>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-md-6 form-inline">
                        <b><font color="#871B47">[OS Platform]</font></b>
                        <div id="os_div" ></div>
                    </div>
                    <div class="col-md-6 form-inline">
                        <b><font color="#871B47">[검색어 Cloud]</font></b>
                        <div id="my_favorite_latin_words" style="width: 100%; height: 270px; border: 1px solid #ccc;"></div>
                    </div>
                </div>

            </div>
        </div>

    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="30">NO</th>
                    <th width="120">사이트</th>
                    <th width="150">분류</th>
                    <th >검색어</th>
                    <th width="120">플랫폼</th>
                    <th width="90">검색갯수</th>
                    <th width="320">검색결과 </th>
                    <th width="90">사용자IP</th>
                    <th width="150">검색일</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        var $datatable_none;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

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
                $search_form[0].action = '{{site_url('/site/search/searchList/')}}';
                $search_form[0].submit();
            };

            $search_form.find('select[name="search_category"]').chained("#search_site_code");
            $search_form.find('select[name="search_md_category"]').chained("#search_category");

            if ($search_form.find('input[name="search_start_date"]').val().length < 1 || $search_form.find('input[name="search_end_date"]').val().length < 1) {
                setDefaultDatepicker(0, 'days', 'search_start_date', 'search_end_date');
            }

            $datatable_none = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    //{ text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn btn-default btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                ],
                ajax: {
                    'url' : '{{ site_url('/site/search/searchList/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return $datatable_none.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'SiteName'},
                    {'data' : 'CateName'},
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

        });
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['table','corechart']});
        google.charts.setOnLoadCallback(drawCateTable);
        google.charts.setOnLoadCallback(drawSiteTable);
        google.charts.setOnLoadCallback(drawWordTable);
        google.charts.setOnLoadCallback(drawOsChart);

        function drawCateTable() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', '사이트');
            data.addColumn('string', '분류');
            data.addColumn('string', '검색어');
            data.addColumn('number', '검색수');
            data.addRows([
                @if(empty($data['cate']) === false)
                    @foreach($data['cate'] as $row)
                        ['{{$row['SiteName']}}', '{{$row['CateName']}}', '{{$row['SearchWord']}}', {v: {{$row['cnt']}}, f: '{{number_format($row['cnt'],0)}}'}],
                    @endforeach
                @endif
            ]);
            var table = new google.visualization.Table(document.getElementById('cate_div'));
            table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
        }

        function drawSiteTable() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', '사이트');
            data.addColumn('string', '검색어');
            data.addColumn('number', '검색수');
            data.addRows([
                @if(empty($data['site']) === false)
                    @foreach($data['site'] as $row)
                        ['{{$row['SiteName']}}', '{{$row['SearchWord']}}', {v: {{$row['cnt']}}, f: '{{number_format($row['cnt'],0)}}'}],
                    @endforeach
                @endif
            ]);

            var table = new google.visualization.Table(document.getElementById('site_div'));
            table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
        }

        function drawWordTable() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', '검색어');
            data.addColumn('number', '검색수');
            data.addRows([
                @if(empty($data['word']) === false)
                    @foreach($data['word'] as $row)
                         ['{{$row['SearchWord']}}', {v: {{$row['cnt']}}, f: '{{number_format($row['cnt'],0)}}'}],
                    @endforeach
                @endif
            ]);

            var table = new google.visualization.Table(document.getElementById('word_div'));
            table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
        }

        function drawOsChart() {
            var option = [
                            ''
                            ,'color: #e5e4e2'
                            , 'color: #76A7FA'
                            , 'opacity: 0.2'
                            ,'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'
                            ,'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2'
                            , 'color: #b87333'];
            var data = google.visualization.arrayToDataTable([
                ['OS', '검색수', { role: 'style' } ],
                @if(empty($data['os']) === false)
                    @foreach($data['os'] as $row)
                            ['{{$row['UserPlatform']}}', {{$row['cnt']}}, option[{{$loop->index}}]],
                    @endforeach
                @else
                    ['결과없음', 0, 'color: #e5e4e2'],
                @endif
            ]);
            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);
            var options = {
                title: "사용자 OS 플랫폼",
                width: 700,
                height: 280,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("os_div"));
            chart.draw(view, options);
        }
    </script>
    <script src="/public/vendor/jqcloud/jqcloud-1.0.4.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/vendor/jqcloud/jqcloud.css" />
    <script type="text/javascript">
        var word_list = [
            @if(empty($data['cloud']) === false)
                @foreach($data['cloud'] as $row)
                    {text: "{{$row['SearchWord']}}", weight: {{$row['cnt']}}},
                @endforeach
            @else
                {text: "결과없음", weight: 30},
            @endif
        ];
        $(function() {
            $("#my_favorite_latin_words").jQCloud(word_list);
        });
    </script>
@stop