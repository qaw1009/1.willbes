@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 사업 부서별 매출현황을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="search_dept_code" value="{{ $dept_code }}"/>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group no-border-bottom">
                    <label class="control-label col-md-1">결제일/환불일</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="2022-01-01" autocomplete="off" title="조회시작일">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="2023-03-31" autocomplete="off" title="조회종료일">
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="0-mon">당월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-mon">전월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-weeks">1주일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="15-days">15일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-months">1개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="3-months">3개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="6-months">6개월</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset_in_set_search_date">초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <div class="row mt-10 mb-30 ml-0 mr-0">
                <div class="col-md-12 bg-white border-default">
                    <div id="wrap_stats_chart" style="position: relative; width: 100%; height: 430px;">
                        <canvas id="stats_chart"></canvas>
                    </div>
                </div>
            </div>
            <table id="list_ajax_table" class="table table-bordered">
                <thead>
                <tr class="bg-odd">
                    <th class="rowspan">대분류</th>
                    <th>중분류</th>
                    <th>결제</th>
                    <th>환불</th>
                    <th>매출</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                @if($dept_code !== 'all')
                    <tfoot>
                    <tr class="bg-info">
                        <th>합계</th>
                        <th></th>
                        <th id="t_real_pay_price"></th>
                        <th id="t_refund_price" class="red"></th>
                        <th id="t_remain_price" class="blue"></th>
                    </tr>
                    </tfoot>
                @endif
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            // 날짜검색 디폴트 셋팅
            if ($search_form.find('input[name="search_start_date"]').val().length < 1 || $search_form.find('input[name="search_end_date"]').val().length < 1) {
                setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');
            }

            // datatable
            $datatable = $list_table.DataTable({
                serverSide: true,
                paging: false,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/business/mis/deptStats/listAjax?dept=' . $dept_code) }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {});
                    }
                },
                rowsGroup: ['.rowspan'],
                createdRow: function(row, data, dataIndex) {
                    if (data.LgGroupCode === '_LGT') {
                        $(row).addClass('bg-info bold');
                    } else if (data.MdGroupCode === '_MDT') {
                        $(row).addClass('bg-warning bold');
                    }
                },
                columns: [
                    {'data' : '{{ $dept_code == 'all' ? 'LgGroupName' : 'MdGroupName' }}'},
                    {'data' : '{{ $dept_code == 'all' ? 'MdGroupName' : 'SmGroupName' }}'},
                    {'data' : 'RealPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'RefundPrice', 'render' : function(data, type, row, meta) {
                        return '<span class="red no-line-height">' + addComma(data) + '</span>';
                    }},
                    {'data' : 'RemainPrice', 'render' : function(data, type, row, meta) {
                        return '<strong class="blue">' + addComma(data) + '</strong>';
                    }}
                ]
            });

            // 조회된 기간의 합계금액 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                if ($search_form.find('input[name="search_dept_code"]').val() !== 'all') {
                    if (json.sum_data !== null) {
                        $('#t_real_pay_price').html(addComma(json.sum_data.tRealPayPrice));
                        $('#t_refund_price').html(addComma(json.sum_data.tRefundPrice));
                        $('#t_remain_price').html(addComma(json.sum_data.tRemainPrice));
                    } else {
                        $('#t_real_pay_price').html('');
                        $('#t_refund_price').html('');
                        $('#t_remain_price').html('');
                    }
                }

                if ($('#stats_chart').length > 0) {
                    chartExe(json.cht_data);
                }
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/business/mis/deptStats/excel?dept=' . $dept_code) }}', $search_form.serializeArray(), 'POST');
                }
            });

            // chart
            function chartExe(chart_data) {
                // chart init
                $('#wrap_stats_chart').empty().append('<canvas id="stats_chart"></canvas>');

                // chart start
                const canvas = document.getElementById('stats_chart')
                    , ctx = canvas.getContext('2d')
                    , cht_labels = JSON.parse(chart_data.labels)
                    , cht_data = chart_data.data
                    , cht_mode = ($search_form.find('input[name="search_dept_code"]').val() === 'all' ? 'all' : 'dept')
                    , cht_title = '{{ $__menu['CURRENT']['MenuName'] }}' + ' 전체매출 : ' + addComma(chart_data.total)
                    , color = Chart.helpers.color
                    , color_type = (cht_mode === 'dept' ? 1 : 0)
                    , bgcolor = [
                        [
                            color(window.chartColors.blue).alpha(0.7).rgbString(),
                            color(window.chartColors.red).alpha(0.7).rgbString(),
                            color(window.chartColors.green).alpha(0.7).rgbString(),
                            color(window.chartColors.purple).alpha(0.7).rgbString(),
                        ],
                        color(window.chartColors.orange).alpha(0.7).rgbString()
                    ]
                    , bdcolor = [
                        [
                            window.chartColors.blue,
                            window.chartColors.red,
                            window.chartColors.green,
                            window.chartColors.purple,
                        ],
                        window.chartColors.orange
                    ];

                Chart.Tooltip.positioners.custom = function(elements, position) {
                    const { x, y, base } = elements[0]._model;
                    const height = base - y;
                    return { x, y: y + (height / 2) };
                }

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: cht_labels[0],
                        datasets: [{
                            label: '매출',
                            data: cht_data[0],
                            backgroundColor: bgcolor[color_type],
                            borderColor: bdcolor[color_type],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        layout: {
                            padding: 10
                        },
                        title: {
                            display: true,
                            fontSize: '14',
                            text: cht_title,
                        },
                        tooltips: {
                            mode: 'index',
                            position: 'custom',
                            intersect: false,
                            callbacks: {
                                title: function(tooltipItems, data) {
                                    return data.labels[tooltipItems[0].index]['label_name'];
                                },
                                label: function (tooltipItem, data) {
                                    let tooltipLabel = data.datasets[tooltipItem.datasetIndex].label;
                                    let tooltipValue = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                                    return tooltipLabel + ' : ' + parseInt(tooltipValue).toLocaleString();
                                }
                            }
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                ticks: {
                                    callback: function(json) {
                                        return json['label_name'];
                                    }
                                }
                            }],
                            yAxes: [{
                                display: true,
                                ticks: {
                                    beginAtZero: true,
                                    callback: function(value) {
                                        return value.toLocaleString();
                                    }
                                }
                            }]
                        },
                        hover: {
                            animationDuration: 1
                        },
                        animation: {
                            duration: 600,
                            easing: 'linear',
                            onComplete: function() {
                                let cht = this.chart
                                    , ctx = cht.ctx;
                                ctx.textAlign = 'center';
                                ctx.fillStyle = '#333';
                                ctx.textBaseline = 'bottom';

                                this.data.datasets.forEach(function (dataset, i) {
                                    let meta = cht.controller.getDatasetMeta(i);
                                    meta.data.forEach(function (bar, index) {
                                        ctx.fillText(addComma(dataset.data[index]), bar._model.x, bar._model.y - 5);
                                    });
                                });
                            }
                        },
                        onClick: function(e) {
                            if (cht_mode === 'dept') {
                                return false;
                            }

                            const cht = this.chart
                                , ele = this.getElementsAtXAxis(e)
                                , cur_label = ele[0]._model.label
                                , cur_index = ele[0]._index;

                            if ('lg_code' in cur_label) {
                                // 중분류
                                cht.data.labels = cht_labels[1][cur_label['lg_code']];
                                cht.data.datasets[0].data = cht_data[1][cur_label['lg_code']];
                                cht.data.datasets[0].backgroundColor = bgcolor[1];
                                cht.data.datasets[0].borderColor = bdcolor[1];
                                cht.options.title.text = cur_label['label_name'] + ' 전체매출 : ' + addComma(cht_data[0][cur_index]);
                            } else {
                                // 대분류
                                cht.data.labels = cht_labels[0];
                                cht.data.datasets[0].data = cht_data[0];
                                cht.data.datasets[0].backgroundColor = bgcolor[0];
                                cht.data.datasets[0].borderColor = bdcolor[0];
                                cht.options.title.text = cht_title;
                            }

                            cht.update();
                        }
                    }
                });
            }
        });
    </script>
@stop
