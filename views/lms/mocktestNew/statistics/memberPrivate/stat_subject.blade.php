@extends('lcms.layouts.master_popup')

@section('popup_title')
@stop

@section('popup_header')
@endsection

@section('popup_content')
    <script src="/public/vendor/jquery/print/jquery.print.min.js"></script>
    <form class="form-horizontal">
        <div class="form-group">
            <div class="col-md-11">
                <ul class="nav nav-pills" role="tablist">
                    <li role="presentation" class="act-move"><a href="{{ site_url('/mocktestNew/statistics/memberPrivate/winStatTotal?prod_code='.$productInfo['ProdCode'].'&mr_idx='.$productInfo['MrIdx']) }}">전체 성적 분석</a></li>
                    <li role="presentation" class="active"><a href="#none">과목별 문항분석</a></li>
                </ul>
            </div>
            <div class="col-md-1 form-inline">
                <!-- //tab -->
                <p><a href="javascript:printPage()" class="btn btn-default" role="button">출력</a></p>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="row">
                    @foreach($subject_detail_data as $subject_name => $row)
                        <h5 class="bold">{{ $subject_name }}</span> 문항별 분석</h5>
                        <div class="text-right mt20 mb20">
                            <div style="float:left;border:2px solid red; width:15px; height:15px; background-color:red;"></div><div style="float:left;"><em>붉은</em>색은 틀린부분표시</div>
                        </div>
                        <table id="list_ajax_table_model" class="table table-striped table-bordered">
                            <colgroup>
                                <col style="width: 70px;"/>
                                @foreach($row['right_answer'] as $key2 => $row2)
                                    <col width="*">
                                @endforeach
                            </colgroup>
                            <thead>
                            <tr>
                                <th>구분</th>
                                @foreach($row['right_answer'] as $key2 => $row2)
                                    <th>{{ $key2 + 1 }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th style="border-top: 1px solid #e3e3e3;">정답</th>
                                @foreach($row['right_answer'] as $key2 => $row2)
                                    <td>{{ $row2 }}</td>
                                @endforeach

                            </tr>
                            <tr>
                                <th style="border-top: 1px solid #e3e3e3;">마킹</th>
                                @foreach($row['answer'] as $key2 => $row2)
                                    <td><span class="@if($row['is_wrong'][$key2] == 'N') red bold glyphicon glyphicon-ok @endif">{{ $row2 }}</span></td>
                                @endforeach

                            </tr>
                            <tr>
                                <th style="border-top: 1px solid #e3e3e3;">정답률</th>
                                @foreach($row['QAVR'] as $key2 => $row2)
                                    <td>{{ $row2 }}%</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="border-top: 1px solid #e3e3e3;">난이도</th>
                                @foreach($row['difficulty'] as $key2 => $row2)
                                    <td>{{ $row2 }}</td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="tab-content mt-30">
            @foreach($area_data as $key => $row)
                <div id="btn_subject_area{{ $key }}">
                    <h5 class="bold">{{ $subject_data[$key] }} 영역 및 학습요소</h5>
                    <table id="list_ajax_table_model" class="table table-striped table-bordered">
                        <colgroup>
                            <col style="width: 170px;"/>
                            <col style="width: 65px;"/>
                            <col style="width: 95px;"/>
                            <col style="width: 340px;">
                            <col width="*">
                        </colgroup>
                        <thead>
                        <tr>
                            <th class="sh1">구분</th>
                            <th class="sh2">개수</th>
                            <th class="sh3">평균</th>
                            <th class="sh4">관련문항</th>
                            <th class="sh5">오답문항</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($row as $s_key => $val)
                            <tr>
                                <td>{{ $val['area_name'] }}</td>
                                <td>{{ $val['cnt'] }}</td>
                                <td>{{ $val['avg'] }}</td>
                                <td>
                                    @php
                                        $arr_question_no = explode(',',$val['question_no']);
                                        sort($arr_question_no);
                                        foreach ($arr_question_no as $q_no_key => $q_no_val) {
                                            echo '('.$q_no_val.') ';
                                        }
                                    @endphp
                                </td>
                                <td class="red">
                                    @php
                                        $arr_n_question_no = explode(',',$val['n_question_no']);
                                        sort($arr_n_question_no);
                                        foreach ($arr_n_question_no as $q_n_no_key => $q_n_no_val) {
                                            echo '('.$q_n_no_val.') ';
                                        }
                                    @endphp
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </form>

    <script type="text/javascript">
        function printPage() {
            $.print('#widthFrame');
        }
    </script>
@stop

@section('popup_footer')
@endsection