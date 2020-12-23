@extends('lcms.layouts.master')

@section('content')
    <h5>- 실전모의고사 문항분석표 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div id='btnarea' class="pull-right text-right form-inline mb-5">
            <button class="btn btn-sm btn-primary" onClick="printPage()">인쇄</button>
            <button class="btn btn-sm btn-success" id="btn_list">목록</button>
        </div>

        <div class="x_content">
            <ul class="nav nav-tabs nav-divider" role="tablist">
                @foreach($base_statistisc['TakeMockPart'] as $key => $val)
                    <li class="mock_part {{($loop->first === true) ? 'active' : ''}}" data-mock-part="{{$key}}"><a data-toggle="tab" href="#takemockpart_{{$key}}">{{$val}}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="x_content tab-content">
            @foreach($base_statistisc['TakeMockPart'] as $key => $val)
                <div id="takemockpart_{{$key}}" class="form-group tab-pane fade {{($loop->first === true) ? 'in active' : ''}}">
                    <ul class="nav nav-tabs nav-divider" role="tablist">
                        @foreach($base_statistisc['MpIdx'] as $subject_key => $subject_val)
                            <li class="subject {{($loop->first === true) ? 'active' : ''}}" data-subject="{{$subject_key}}"><a data-toggle="tab" href="#subject_{{$key}}_{{$subject_key}}">{{$subject_val}}</a></li>
                        @endforeach
                    </ul>
                    <div class="x_content tab-content mt-5">
                        @foreach($base_statistisc['MpIdx'] as $subject_key => $subject_val)
                            <div id="subject_{{$key}}_{{$subject_key}}" class="form-group tab-pane fade {{($loop->first === true) ? 'in active' : ''}}">
                                <div id="print_content_{{$key}}_{{$subject_key}}">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th class="text-center bg-aero" style="width: 8%">모의고사명</th>
                                                    <td class="text-left" style="width: 10%" colspan="3">{{$product_info['ProdName']}}</td>
                                                    <th class="text-center bg-aero" style="width: 8%">직렬 > 과목</th>
                                                    <td class="text-left" style="width: 10%" colspan="5">{{$val}} > {{$subject_val}}</td>
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
                                                    <th class="text-center bg-white-gray" style="width: 8%">문항수</th>
                                                    <td class="text-center" style="width: 10%">
                                                        {{ $base_statistisc['TotalQuestionCount'][$subject_key] }}
                                                    </td>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table-striped table-bordered" style="width: 100%;">
                                                <thead>
                                                <tr style="text-align:center; height: 30px;">
                                                    <th class="text-center" style="vertical-align: middle;" rowspan="2">문항</th>
                                                    <th class="text-center" colspan="4">정답</th>
                                                    <th class="text-center" colspan="3">정답비율</th>
                                                    <th class="text-center" colspan="5">마킹수</th>
                                                    <th class="text-center" colspan="5">마킹률(%)</th>
                                                </tr>
                                                <tr style="text-align-last:center; height: 30px;">
                                                    <th>정답</th>
                                                    <th>배점</th>
                                                    <th>분류</th>
                                                    <th>유형</th>
                                                    <th>10%</th>
                                                    <th>25%</th>
                                                    <th>전체</th>
                                                    <th>①</th>
                                                    <th>②</th>
                                                    <th>③</th>
                                                    <th>④</th>
                                                    <th>⑤</th>
                                                    <th>①</th>
                                                    <th>②</th>
                                                    <th>③</th>
                                                    <th>④</th>
                                                    <th>⑤</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(empty($arr_question_data[$key][$subject_key]) === false)
                                                    @foreach($arr_question_data[$key][$subject_key] as $question_num => $row)
                                                        <tr style="text-align:center; height: 27px; {{ (($loop->index % 5) == 0 && $loop->last == false) ? 'border-bottom: 2px solid #3e3e3e;' : '' }}">
                                                            <td>{{ $question_num }}</td>
                                                            <td>{{ $row['RightAnswer'] }}</td>
                                                            <td>{{ $row['Scoring'] }}</td>
                                                            <td>{{--{{ $row['AreaName'] }}--}}</td>{{-- 분류 --}}
                                                            <td></td>{{-- 유형 --}}
                                                            <td>{{ $row['QAVR_Top10'] }}</td>
                                                            <td>{{ $row['QAVR_Top25'] }}</td>
                                                            <td>{{ $row['QAVR_Total'] }}</td>
                                                            <td>{{ $row['marking_cnt_num_1'] }}</td>
                                                            <td>{{ $row['marking_cnt_num_2'] }}</td>
                                                            <td>{{ $row['marking_cnt_num_3'] }}</td>
                                                            <td>{{ $row['marking_cnt_num_4'] }}</td>
                                                            <td>{{ $row['marking_cnt_num_5'] }}</td>
                                                            <td>{{ ((empty($row['total_marking_cnt']) === true) ? '0' : round(($row['marking_cnt_num_1'] / $row['total_marking_cnt']) * 100,2)) }}</td>
                                                            <td>{{ ((empty($row['total_marking_cnt']) === true) ? '0' : round(($row['marking_cnt_num_2'] / $row['total_marking_cnt']) * 100,2)) }}</td>
                                                            <td>{{ ((empty($row['total_marking_cnt']) === true) ? '0' : round(($row['marking_cnt_num_3'] / $row['total_marking_cnt']) * 100,2)) }}</td>
                                                            <td>{{ ((empty($row['total_marking_cnt']) === true) ? '0' : round(($row['marking_cnt_num_4'] / $row['total_marking_cnt']) * 100,2)) }}</td>
                                                            <td>{{ ((empty($row['total_marking_cnt']) === true) ? '0' : round(($row['marking_cnt_num_5'] / $row['total_marking_cnt']) * 100,2)) }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{--<div class="form-group">
                                        <div class="col-md-6">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th class="text-center" style="vertical-align: middle;" colspan="2" rowspan="2">평균</th>
                                                    <th class="text-center" colspan="3">문항분류</th>
                                                    <th class="text-center" colspan="3">유형분류</th>
                                                </tr>
                                                <tr>
                                                    <th>구분</th>
                                                    <th>문항수</th>
                                                    <th>정답률</th>
                                                    <th>구분</th>
                                                    <th>문항수</th>
                                                    <th>정답률</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>만점</td>
                                                    <td>{{ (empty($data_total_statistics[$key][$subject_key]) === true ? '' : $data_total_statistics[$key][$subject_key]['sum_scoring']) }}</td>
                                                    <td>계</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>계</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>응시인원</td>
                                                    <td>{{ (empty($data_total_statistics[$key][$subject_key]) === true ? '' : $data_total_statistics[$key][$subject_key]['reg_member_cnt']) }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>평균</td>
                                                    <td>{{ (empty($data_total_statistics[$key][$subject_key]) === true ? '' : $data_total_statistics[$key][$subject_key]['avg_scoring']) }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>최고득점</td>
                                                    <td>{{ (empty($data_total_statistics[$key][$subject_key]) === true ? '' : $data_total_statistics[$key][$subject_key]['max_scoring']) }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>--}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script type="text/javascript">
        $('#btn_list').click(function() {
            location.href = '{{ site_url('/mocktestNew/statistics/grade/') }}' + getQueryString();
        });

        //인쇄
        function printPage(){
            var mock_part_code = $('.mock_part.active').data('mock-part');
            var subject_code = $("#takemockpart_"+mock_part_code).find(".subject.active").data("subject");

            var initBody;
            window.onbeforeprint = function(){
                initBody = document.body.innerHTML;
                document.body.innerHTML =  $('#print_content_'+mock_part_code+'_'+subject_code).html();
            };
            window.onafterprint = function(){
                document.body.innerHTML = initBody;
            };
            window.print();
        }

        $(document).ready(function() {


        });
    </script>
@stop