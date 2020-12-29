@extends('lcms.layouts.master')

@section('content')
    <style>
        .board_gray { border:1px solid gray }
    </style>

    <h5>- 모의고사 성적분석표 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div id='btnarea' class="pull-right text-right form-inline mb-5">
            <button class="btn btn-sm btn-primary" onClick="printPage()">인쇄</button>
            <button class="btn btn-sm btn-success" id="btn_list">목록</button>
        </div>
        <div class="x_content">
            <ul class="nav nav-tabs nav-divider" role="tablist">
                @foreach($base_statistisc['TakeMockPart'] as $key => $val)
                    <li class="mock_part {{($loop->first === true) ? 'active' : ''}}" data-mock-part="{{$key}}"><a data-toggle="tab" id="takemockpart_tab_{{$key}}" href="#takemockpart_{{$key}}">{{$val}}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="x_content tab-content">
            @foreach($base_statistisc['TakeMockPart'] as $key => $val)
                <div id="takemockpart_{{$key}}" class="form-group tab-pane fade {{($loop->first === true) ? 'in active' : ''}}">
                    <ul class="nav nav-tabs nav-divider" role="tablist">
                        @foreach($base_statistisc['MpIdx'] as $subject_key => $subject_val)
                            <li class="subject {{($loop->first === true) ? 'active' : ''}}" data-subject="{{$subject_key}}"><a data-toggle="tab" id="subject_tab_{{$key}}_{{$subject_key}}" href="#subject_{{$key}}_{{$subject_key}}">{{$subject_val}}</a></li>
                        @endforeach
                    </ul>
                    <div class="x_content tab-content mt-5">
                        @foreach($base_statistisc['MpIdx'] as $subject_key => $subject_val)
                            <div id="subject_{{$key}}_{{$subject_key}}" class="form-group tab-pane fade {{($loop->first === true) ? 'in active' : ''}}">
                                <div id="print_content_{{$key}}_{{$subject_key}}">
                                    <div class="form-group">
                                        <div class="col-md-11">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th class="text-center bg-aero" style="width: 8%">모의고사명</th>
                                                    <td class="text-left" style="width: 10%" colspan="3">{{$product_info['ProdName']}}</td>
                                                    <th class="text-center bg-aero" style="width: 8%">직렬 > 과목</th>
                                                    <td class="text-left" style="width: 10%" colspan="3">{{$val}} > {{$subject_val}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-center bg-white-gray" style="width: 8%">만점</th>
                                                    <td class="text-center" style="width: 10%">
                                                        {{ (empty($data_total_statistics[$key][$subject_key]) === true ? '' : $data_total_statistics[$key][$subject_key]['sum_scoring']) }}
                                                    </td>
                                                    <th class="text-center bg-white-gray" style="width: 8%">응시인원</th>
                                                    <td class="text-center" style="width: 10%">
                                                        {{ (empty($data_total_statistics[$key][$subject_key]) === true ? '' : $data_total_statistics[$key][$subject_key]['reg_member_cnt']) }}
                                                    </td>
                                                    <th class="text-center bg-white-gray" style="width: 8%">평균</th>
                                                    <td class="text-center" style="width: 10%">
                                                        {{ (empty($data_total_statistics[$key][$subject_key]) === true ? '' : $data_total_statistics[$key][$subject_key]['avg_scoring']) }}
                                                    </td>
                                                    <th class="text-center bg-white-gray" style="width: 8%">최고득점</th>
                                                    <td class="text-center" style="width: 10%">
                                                        {{ (empty($data_total_statistics[$key][$subject_key]) === true ? '' : $data_total_statistics[$key][$subject_key]['max_scoring']) }}
                                                    </td>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <table id="list_ajax_table" class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>점수분포</th>
                                                    <th>인원</th>
                                                    <th>누계</th>
                                                    <th>백분율(%)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(empty($data_total_point_statistics[$key][$subject_key]) === false)
                                                    @foreach($data_total_point_statistics[$key][$subject_key] as $point_key => $point_row)
                                                        <tr style="{{ ((($loop->index+3) % 5) == 0) ? 'border-top: 2px solid #3e3e3e;' : '' }}">
                                                            <td>{{ $point_row['t_point'] }}</td>
                                                            <td>{{ $point_row['cnt'] }}</td>
                                                            <td>{{ $point_row['sumCnt'] }}</td>
                                                            <td>{{ $point_row['tavg'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-md-7">
                                            <div class="col-md-12 pt-15 board_gray">
                                                <h4 class="text-center"><strong>전체 응시자 점수분포표</strong></h4>
                                                <div id="spread_all_{{$key}}_{{$subject_key}}" class="text-center"></div>
                                            </div>

                                            <div class="col-md-12 pt-15 mt-20 board_gray">
                                                <h4 class="text-center"><strong>상위10% 응시자 정답률(%)</strong></h4>
                                                <div id="answers_rank10_{{$key}}_{{$subject_key}}" class="text-center"></div>
                                            </div>

                                            <div class="col-md-12 pt-15 mt-20 board_gray">
                                                <h4 class="text-center"><strong>상위25% 응시자 정답률(%)</strong></h4>
                                                <div id="answers_rank25_{{$key}}_{{$subject_key}}" class="text-center"></div>
                                            </div>

                                            <div class="col-md-12 pt-15 mt-20 board_gray">
                                                <h4 class="text-center"><strong>전체 응시자 정답률(%)</strong></h4>
                                                <div id="answers_all_{{$key}}_{{$subject_key}}" class="text-center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="/public/vendor/Nwagon/Nwagon.js"></script>
    <link rel="stylesheet" href="/public/vendor/Nwagon/Nwagon.css">
    <script>
        $('#btn_list').click(function() {
            location.href = '{{ site_url('/mocktestNew/statistics/grade/') }}' + getQueryString();
        });

        //인쇄
        function printPage(){
            var mock_part_code = $(".mock_part.active").data('mock-part');
            var subject_code = $("#takemockpart_"+mock_part_code).find(".subject.active").data("subject");
            var initBody;
            window.onbeforeprint = function(){
                $(".accessibility").hide();
                initBody = document.body.innerHTML;
                document.body.innerHTML = $('#print_content_'+mock_part_code+'_'+subject_code).html();
            };
            window.onafterprint = function(){
                $(".accessibility").show();
                document.body.innerHTML = initBody;
            };
            window.print();
        }

        $(document).ready(function () {
            //전체 응시자 정답률
            @foreach($data_total_point_chart as $takemock_key => $takemock_row)
                @foreach($takemock_row as $subject_key => $subject_row)
                    var base_core = {{ (empty($base_statistisc['BaseScoring'][$subject_key]) === true ? '2.5' : $base_statistisc['BaseScoring'][$subject_key]) }};
                    console.log(base_core);
                    var increment = '5';
                    if ({{$data_total_statistics[$takemock_key][$subject_key]['reg_member_cnt']}} <= 10) {
                        increment = 1;
                    }
                    if ({{$data_total_statistics[$takemock_key][$subject_key]['reg_member_cnt']}} > 10 && {{$data_total_statistics[$takemock_key][$subject_key]['reg_member_cnt']}} <= 20) {
                        increment = 2;
                    }

                    if (base_core == 4)
                    {
                        var count1 = {!! (empty($subject_row[0]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[0]),true)) !!}
                        var count2 = {!! (empty($subject_row[1]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[1]),true)) !!}
                        var count3 = {!! (empty($subject_row[2]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[2]),true)) !!}
                        var count4 = {!! (empty($subject_row[3]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[3]),true)) !!}
                        var count5 = {!! (empty($subject_row[4]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[4]),true)) !!}
                        var count6 = {!! (empty($subject_row[5]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[5]),true)) !!}
                        var count7 = {!! (empty($subject_row[6]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[6]),true)) !!}
                        var dataset_values = [count1, count2, count3, count4, count5, count6, count7];
                        var legend_names = ['~12', '~28', '~44', '~60', '~76', '~96', '100'];
                    } else if (base_core == 5) {
                        var count1 = {!! (empty($subject_row[0]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[0]),true)) !!}
                        var count2 = {!! (empty($subject_row[1]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[1]),true)) !!}
                        var count3 = {!! (empty($subject_row[2]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[2]),true)) !!}
                        var count4 = {!! (empty($subject_row[3]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[3]),true)) !!}
                        var count5 = {!! (empty($subject_row[4]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[4]),true)) !!}
                        var count6 = {!! (empty($subject_row[5]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[5]),true)) !!}
                        var dataset_values = [count1, count2, count3, count4, count5, count6];
                        var legend_names = ['~15', '~35', '~55', '~75', '~95', '100'];
                    } else {
                        var count1 = {!! (empty($subject_row[0]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[0]),true)) !!}
                        var count2 = {!! (empty($subject_row[1]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[1]),true)) !!}
                        var count3 = {!! (empty($subject_row[2]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[2]),true)) !!}
                        var count4 = {!! (empty($subject_row[3]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[3]),true)) !!}
                        var count5 = {!! (empty($subject_row[4]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[4]),true)) !!}
                        var count6 = {!! (empty($subject_row[5]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[5]),true)) !!}
                        var count7 = {!! (empty($subject_row[6]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[6]),true)) !!}
                        var count8 = {!! (empty($subject_row[7]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[7]),true)) !!}
                        var count9 = {!! (empty($subject_row[8]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[8]),true)) !!}
                        var count10 = {!! (empty($subject_row[9]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[9]),true)) !!}
                        var count11 = {!! (empty($subject_row[10]) === true ? json_encode(['0']) : json_encode(array_values($subject_row[10]),true)) !!}
                        var dataset_values = [count1, count2, count3, count4, count5, count6, count7, count8, count9, count10, count11];
                        var legend_names = ['~7.5', '~17.5', '~27.5', '~37.5', '~47.5', '~57.5', '~67.5', '~77.5', '~87.5', '97.5', '100'];
                    }

                    var spread_all_{{$takemock_key}}_{{$subject_key}} = {
                        'legend': {
                            names: legend_names,
                            hrefs: []
                        },
                        'dataset': {
                            title: '전체 응시자 정답률(%)',
                            values: dataset_values,
                            colorset: ['#DC143C', '#FF8C00', "#30a1ce", '#DC143C', '#FF8C00'],
                            fields: ['(명)', '', '', '', '']
                        },
                        'chartDiv': 'spread_all_{{$takemock_key}}_{{$subject_key}}',
                        'chartType': 'multi_column',
                        'chartSize': {width: 900, height: 300},
                        'minValue': 0,
                        'maxValue': ({{$data_max_cnt[$takemock_key][$subject_key]}} >= 100) ? 100 : {{$data_max_cnt[$takemock_key][$subject_key]}},
                        'increment': increment,
                        /*'isGuideLineNeeded' : true*/
                    };
                    Nwagon.chart(spread_all_{{$takemock_key}}_{{$subject_key}});
                @endforeach
            @endforeach

            @foreach($data_avg_score_10 as $takemock_key => $takemock_row)
                @foreach($takemock_row as $subject_key => $subject_row)
                    @for($i=0; $i<count($subject_row); $i++)
                        var count_R10_{{$i}} = {!! json_encode(array_values($subject_row[$i]),true) !!};
                    @endfor

                    var legend_names_R10_{{$takemock_key}}_{{$subject_key}} = ['1~5'];
                    var dataset_values_R10_{{$takemock_key}}_{{$subject_key}} = [count_R10_0];
                    if ({{count($subject_row)}} == 2) {
                        legend_names_R10_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10'];
                        dataset_values_R10_{{$takemock_key}}_{{$subject_key}} = [count_R10_0,count_R10_1];
                    }
                    if ({{count($subject_row)}} == 3) {
                        legend_names_R10_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15'];
                        dataset_values_R10_{{$takemock_key}}_{{$subject_key}} = [count_R10_0,count_R10_1,count_R10_2];
                    }
                    if ({{count($subject_row)}} == 4) {
                        legend_names_R10_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15','16~20'];
                        dataset_values_R10_{{$takemock_key}}_{{$subject_key}} = [count_R10_0,count_R10_1,count_R10_2,count_R10_3];
                    }
                    if ({{count($subject_row)}} == 5) {
                        legend_names_R10_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15','16~20','21~25'];
                        dataset_values_R10_{{$takemock_key}}_{{$subject_key}} = [count_R10_0,count_R10_1,count_R10_2,count_R10_3,count_R10_4];
                    }
                    if ({{count($subject_row)}} == 6) {
                        legend_names_R10_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15','16~20','21~25','26~30'];
                        dataset_values_R10_{{$takemock_key}}_{{$subject_key}} = [count_R10_0,count_R10_1,count_R10_2,count_R10_3,count_R10_4,count_R10_5];
                    }
                    if ({{count($subject_row)}} == 7) {
                        legend_names_R10_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15','16~20','21~25','26~30','31~35'];
                        dataset_values_R10_{{$takemock_key}}_{{$subject_key}} = [count_R10_0,count_R10_1,count_R10_2,count_R10_3,count_R10_4,count_R10_5,count_R10_6];
                    }
                    if ({{count($subject_row)}} == 8) {
                        legend_names_R10_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15','16~20','21~25','26~30','31~35','36~40'];
                        dataset_values_R10_{{$takemock_key}}_{{$subject_key}} = [count_R10_0,count_R10_1,count_R10_2,count_R10_3,count_R10_4,count_R10_5,count_R10_6,count_R10_7];
                    }

                    var answers_rank10_{{$takemock_key}}_{{$subject_key}} = {
                        'legend': {
                            names: legend_names_R10_{{$takemock_key}}_{{$subject_key}},
                            hrefs: []
                        },
                        'dataset': {
                            title: '전체 응시자 정답률(%)',
                            values: dataset_values_R10_{{$takemock_key}}_{{$subject_key}},
                            colorset: ['#DC143C', '#FF8C00', "#30a1ce", '#DC143C', '#FF8C00'],
                            fields: ['(명)', '', '', '', '']
                        },
                        'chartDiv': 'answers_rank10_{{$takemock_key}}_{{$subject_key}}',
                        'chartType': 'multi_column',
                        'chartSize': {width: 900, height: 300},
                        'minValue': 0,
                        'maxValue': 100,
                        'increment': 20
                    };
                    Nwagon.chart(answers_rank10_{{$takemock_key}}_{{$subject_key}});
                @endforeach
            @endforeach

            @foreach($data_avg_score_25 as $takemock_key => $takemock_row)
                @foreach($takemock_row as $subject_key => $subject_row)
                    @for($i=0; $i<count($subject_row); $i++)
                        var count_R25_{{$i}} = {!! json_encode(array_values($subject_row[$i]),true) !!};
                    @endfor

                    var legend_names_R25_{{$takemock_key}}_{{$subject_key}} = ['1~5'];
                    var dataset_values_R25_{{$takemock_key}}_{{$subject_key}} = [count_R25_0];
                    if ({{count($subject_row)}} == 2) {
                        legend_names_R25_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10'];
                        dataset_values_R25_{{$takemock_key}}_{{$subject_key}} = [count_R25_0,count_R25_1];
                    }
                    if ({{count($subject_row)}} == 3) {
                        legend_names_R25_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15'];
                        dataset_values_R25_{{$takemock_key}}_{{$subject_key}} = [count_R25_0,count_R25_1,count_R25_2];
                    }
                    if ({{count($subject_row)}} == 4) {
                        legend_names_R25_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15','16~20'];
                        dataset_values_R25_{{$takemock_key}}_{{$subject_key}} = [count_R25_0,count_R25_1,count_R25_2,count_R25_3];
                    }
                    if ({{count($subject_row)}} == 5) {
                        legend_names_R25_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15','16~20','21~25'];
                        dataset_values_R25_{{$takemock_key}}_{{$subject_key}} = [count_R25_0,count_R25_1,count_R25_2,count_R25_3,count_R25_4];
                    }
                    if ({{count($subject_row)}} == 6) {
                        legend_names_R25_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15','16~20','21~25','26~30'];
                        dataset_values_R25_{{$takemock_key}}_{{$subject_key}} = [count_R25_0,count_R25_1,count_R25_2,count_R25_3,count_R25_4,count_R25_5];
                    }
                    if ({{count($subject_row)}} == 7) {
                        legend_names_R25_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15','16~20','21~25','26~30','31~35'];
                        dataset_values_R25_{{$takemock_key}}_{{$subject_key}} = [count_R25_0,count_R25_1,count_R25_2,count_R25_3,count_R25_4,count_R25_5,count_R25_6];
                    }
                    if ({{count($subject_row)}} == 8) {
                        legend_names_R25_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15','16~20','21~25','26~30','31~35','36~40'];
                        dataset_values_R25_{{$takemock_key}}_{{$subject_key}} = [count_R25_0,count_R25_1,count_R25_2,count_R25_3,count_R25_4,count_R25_5,count_R25_6,count_R25_7];
                    }

                    var answers_rank25_{{$takemock_key}}_{{$subject_key}} = {
                        'legend': {
                            names: legend_names_R25_{{$takemock_key}}_{{$subject_key}},
                            hrefs: []
                        },
                        'dataset': {
                            title: '전체 응시자 정답률(%)',
                            values: dataset_values_R25_{{$takemock_key}}_{{$subject_key}},
                            colorset: ['#DC143C', '#FF8C00', "#30a1ce", '#DC143C', '#FF8C00'],
                            fields: ['(명)', '', '', '', '']
                        },
                        'chartDiv': 'answers_rank25_{{$takemock_key}}_{{$subject_key}}',
                        'chartType': 'multi_column',
                        'chartSize': {width: 900, height: 300},
                        'minValue': 0,
                        'maxValue': 100,
                        'increment': 20
                    };
                    Nwagon.chart(answers_rank25_{{$takemock_key}}_{{$subject_key}});
                @endforeach
            @endforeach

            @foreach($data_avg_score_total as $takemock_key => $takemock_row)
                @foreach($takemock_row as $subject_key => $subject_row)
                    @for($i=0; $i<count($subject_row); $i++)
                        var count_{{$i}} = {!! json_encode(array_values($subject_row[$i]),true) !!};
                    @endfor

                    var legend_names_{{$takemock_key}}_{{$subject_key}} = ['1~5'];
                    var dataset_values_{{$takemock_key}}_{{$subject_key}} = [count_0];
                    if ({{count($subject_row)}} == 2) {
                        legend_names_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10'];
                        dataset_values_{{$takemock_key}}_{{$subject_key}} = [count_0,count_1];
                    }
                    if ({{count($subject_row)}} == 3) {
                        legend_names_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15'];
                        dataset_values_{{$takemock_key}}_{{$subject_key}} = [count_0,count_1,count_2];
                    }
                    if ({{count($subject_row)}} == 4) {
                        legend_names_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15','16~20'];
                        dataset_values_{{$takemock_key}}_{{$subject_key}} = [count_0,count_1,count_2,count_3];
                    }
                    if ({{count($subject_row)}} == 5) {
                        legend_names_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15','16~20','21~25'];
                        dataset_values_{{$takemock_key}}_{{$subject_key}} = [count_0,count_1,count_2,count_3,count_4];
                    }
                    if ({{count($subject_row)}} == 6) {
                        legend_names_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15','16~20','21~25','26~30'];
                        dataset_values_{{$takemock_key}}_{{$subject_key}} = [count_0,count_1,count_2,count_3,count_4,count_5];
                    }
                    if ({{count($subject_row)}} == 7) {
                        legend_names_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15','16~20','21~25','26~30','31~35'];
                        dataset_values_{{$takemock_key}}_{{$subject_key}} = [count_0,count_1,count_2,count_3,count_4,count_5,count_6];
                    }
                    if ({{count($subject_row)}} == 8) {
                        legend_names_{{$takemock_key}}_{{$subject_key}} = ['1~5','6~10','11~15','16~20','21~25','26~30','31~35','36~40'];
                        dataset_values_{{$takemock_key}}_{{$subject_key}} = [count_0,count_1,count_2,count_3,count_4,count_5,count_6,count_7];
                    }

                    var answers_all_{{$takemock_key}}_{{$subject_key}} = {
                        'legend': {
                            names: legend_names_{{$takemock_key}}_{{$subject_key}},
                            hrefs: []
                        },
                        'dataset': {
                            title: '전체 응시자 정답률(%)',
                            values: dataset_values_{{$takemock_key}}_{{$subject_key}},
                            colorset: ['#DC143C', '#FF8C00', "#30a1ce", '#DC143C', '#FF8C00'],
                            fields: ['(명)', '', '', '', '']
                        },
                        'chartDiv': 'answers_all_{{$takemock_key}}_{{$subject_key}}',
                        'chartType': 'multi_column',
                        'chartSize': {width: 900, height: 300},
                        'minValue': 0,
                        'maxValue': 100,
                        'increment': 20
                    };
                    Nwagon.chart(answers_all_{{$takemock_key}}_{{$subject_key}});
                @endforeach
            @endforeach

            $(".fields").hide();
        });
    </script>
@stop