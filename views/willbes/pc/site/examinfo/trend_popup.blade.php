{{-- 동향 분석 팝업 willbes-Layer-Trend --}}
<div id="exam" class="willbes-Layer-Trend" style="display: block">
    <a class="closeBtn" href="#none" onclick="closeWin('{{$arr_input['ele_id']}}')"><img src="{{ img_url('prof/close.png') }}"></a>
    <div class="Layer-Tit NG tx-dark-black"><strong class="tx-blue">{{$title}}</strong> 시험정보 : 지역별 응시 인원 및 합격선</div>

    <div class="Layer-Cont">
        <div class="mainPop_con">
            <div class="mainPop_map">
                <img src="https://static.willbes.net/public/images/promotion/main/2018/mainPop_map.jpg" alt="">
                @if ($retake_type == 'retake')
                    @foreach($arr_base['area_list'] as $key => $vals)
                        @php
                            if (empty($arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['1']) === false) {
                                $age_number1 = round(($arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['1']['TakeNumber'] / $arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['1']['NoticeNumber']),2);
                            } else {
                                $age_number1 = '-';
                            }
                            if (empty($arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['2']) === false) {
                                $age_number2 = round(($arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['2']['TakeNumber'] / $arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['2']['NoticeNumber']),2);
                            } else {
                                $age_number2 = '-';
                            }
                            if (empty($arr_base['area_data'][$key][$arr_base['years'][1]['YearTarget']]['1']) === false) {
                                $age_number3 = round(($arr_base['area_data'][$key][$arr_base['years'][1]['YearTarget']]['1']['TakeNumber'] / $arr_base['area_data'][$key][$arr_base['years'][1]['YearTarget']]['1']['NoticeNumber']),2);
                            } else {
                                $age_number3 = '-';
                            }
                        @endphp
                        <div class="{{ explode(':',$vals)[1] }}">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">{{ explode(':',$vals)[0] }}</th>
                                    <th>{{(empty($arr_base['years'][0]['YearTarget']) === true ? '' : $arr_base['years'][0]['YearTarget'])}} 학년도</th>
                                    <th>{{(empty($arr_base['years'][0]['YearTarget']) === true ? '' : $arr_base['years'][0]['YearTarget'])}} 추시</th>
                                    <th>{{(empty($arr_base['years'][1]['YearTarget']) === true ? '' : $arr_base['years'][1]['YearTarget'])}} 학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>{{ (empty($arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['1']) === false ? number_format($arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['1']['NoticeNumber']) : '-') }}</td>
                                    <td>{{ (empty($arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['2']) === false ? number_format($arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['2']['NoticeNumber']) : '-') }}</td>
                                    <td>{{ (empty($arr_base['area_data'][$key][$arr_base['years'][1]['YearTarget']]['1']) === false ? number_format($arr_base['area_data'][$key][$arr_base['years'][1]['YearTarget']]['1']['NoticeNumber']) : '-') }}</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>{{ (empty($arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['1']) === false ? number_format($arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['1']['TakeNumber']) : '-') }}</td>
                                    <td>{{ (empty($arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['2']) === false ? number_format($arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['2']['TakeNumber']) : '-') }}</td>
                                    <td>{{ (empty($arr_base['area_data'][$key][$arr_base['years'][1]['YearTarget']]['1']) === false ? number_format($arr_base['area_data'][$key][$arr_base['years'][1]['YearTarget']]['1']['TakeNumber']) : '-') }}</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>{{$age_number1}}</td>
                                    <td>{{$age_number2}}</td>
                                    <td>{{$age_number3}}</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>
                                    <td>{{ (empty($arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['1']) === false ? $arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['1']['PassLine'] : '-') }}</td>
                                    <td>{{ (empty($arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['2']) === false ? $arr_base['area_data'][$key][$arr_base['years'][0]['YearTarget']]['2']['PassLine'] : '-') }}</td>
                                    <td>{{ (empty($arr_base['area_data'][$key][$arr_base['years'][1]['YearTarget']]['1']) === false ? $arr_base['area_data'][$key][$arr_base['years'][1]['YearTarget']]['1']['PassLine'] : '-') }}</td>
                                </tr>
                                </tbody></table>
                        </div>
                    @endforeach
                @else
                    @foreach($arr_base['area_list'] as $key => $vals)
                        @php
                            if (empty($arr_base['area_data'][$key]) === false) {
                                if (empty($arr_base['area_data'][$key]['TakeNumber1']) === true || empty($arr_base['area_data'][$key]['NoticeNumber1']) === true) {
                                    $avg_number1 = 0;
                                } else {
                                    $avg_number1 = round(($arr_base['area_data'][$key]['TakeNumber1'] / $arr_base['area_data'][$key]['NoticeNumber1']),2);
                                }
                            } else {
                                $avg_number1 = '-';
                            }
                            if (empty($arr_base['area_data'][$key]) === false) {
                                if (empty($arr_base['area_data'][$key]['TakeNumber2']) === true || empty($arr_base['area_data'][$key]['NoticeNumber2']) === true) {
                                    $avg_number2 = 0;
                                } else {
                                    $avg_number2 = round(($arr_base['area_data'][$key]['TakeNumber2'] / $arr_base['area_data'][$key]['NoticeNumber2']),2);
                                }
                            } else {
                                $avg_number2 = '-';
                            }
                            if ($avg_number1 != '-' && $avg_number2 != '-') {
                                $avg_number3 = round($avg_number1 - $avg_number2, 2);
                            } else {
                                $avg_number3 = '-';
                            }
                            if ($avg_number3 == 0) {
                                $avg_updown = '-';
                            } elseif ($avg_number3 > 0) {
                                $avg_updown = 'up';
                            } else {
                                $avg_updown = 'down';
                            }
                        @endphp
                        <div class="{{ explode(':',$vals)[1] }}">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">{{ explode(':',$vals)[0] }}</th>
                                    @foreach($arr_base['years'] as $y_row)
                                        <th>{{ $y_row['YearTarget'] }} 학년도</th>
                                    @endforeach
                                    <th>증감</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>{{ (empty($arr_base['area_data'][$key]['NoticeNumber1']) === false ? number_format($arr_base['area_data'][$key]['NoticeNumber1']) : '-') }}</td>
                                    <td>{{ (empty($arr_base['area_data'][$key]['NoticeNumber2']) === false ? number_format($arr_base['area_data'][$key]['NoticeNumber2']) : '-') }}</td>
                                    <td>
                                        @if(empty($arr_base['area_data'][$key]['UpDownNoticeNumber']) === false)
                                            <span class="{{$arr_base['area_data'][$key]['UpDownNoticeNumber']}}">
                                                @if($arr_base['area_data'][$key]['UpDownNoticeNumber'] == 'up')▲
                                                @elseif($arr_base['area_data'][$key]['UpDownNoticeNumber'] == 'down')▼
                                                @endif
                                            </span>
                                            {{ (empty($arr_base['area_data'][$key]) === false ? number_format($arr_base['area_data'][$key]['NoticeNumber']) : '-') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>{{ (empty($arr_base['area_data'][$key]['TakeNumber1']) === false ? number_format($arr_base['area_data'][$key]['TakeNumber1']) : '-') }}</td>
                                    <td>{{ (empty($arr_base['area_data'][$key]['TakeNumber2']) === false ? number_format($arr_base['area_data'][$key]['TakeNumber2']) : '-') }}</td>
                                    <td>
                                        @if(empty($arr_base['area_data'][$key]['UpDownTakeNumber']) === false)
                                            <span class="{{$arr_base['area_data'][$key]['UpDownTakeNumber']}}">
                                                @if($arr_base['area_data'][$key]['UpDownTakeNumber'] == 'up')▲
                                                @elseif($arr_base['area_data'][$key]['UpDownTakeNumber'] == 'down')▼
                                                @endif
                                            </span>
                                            {{ (empty($arr_base['area_data'][$key]) === false ? number_format($arr_base['area_data'][$key]['TakeNumber']) : '-') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>{{ $avg_number1 }}</td>
                                    <td>{{ $avg_number2 }}</td>
                                    <td>
                                        <span class="{{$avg_updown}}">
                                            @if($avg_updown == 'up')▲
                                            @elseif($avg_updown == 'down')▼
                                            @endif
                                        </span>
                                        {{ $avg_number3 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>
                                    <td>{{ (empty($arr_base['area_data'][$key]['PassLine1']) === false ? $arr_base['area_data'][$key]['PassLine1'] : '-') }}</td>
                                    <td>{{ (empty($arr_base['area_data'][$key]['PassLine2']) === false ? $arr_base['area_data'][$key]['PassLine2'] : '-') }}</td>
                                    <td>
                                        @if(empty($arr_base['area_data'][$key]['UpDownPassLine']) === false)
                                            <span class="{{$arr_base['area_data'][$key]['UpDownPassLine']}}">
                                                @if($arr_base['area_data'][$key]['UpDownPassLine'] == 'up')▲
                                                @elseif($arr_base['area_data'][$key]['UpDownPassLine'] == 'down')▼
                                                @endif
                                            </span>
                                            {{ (empty($arr_base['area_data'][$key]) === false ? $arr_base['area_data'][$key]['PassLine'] : '-') }}
                                        @endif
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="trendView">
                <div class="trendTitle">최근 10 년 모집 동향 분석</div>
                <div class="graph">
                    <div id="chart_div1" style="height: 400px;"></div>
                </div>
                <div class="graph">
                    <div id="chart_div2" style="height: 400px;"></div>
                </div>
                <div class="trendData">
                    <table cellspacing="0">
                        <colgroup>
                            <col width="25%">
                            <col width="25%">
                            <col width="25%">
                            <col width="25%">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>학년도</th>
                            <th>모집</th>
                            <th>지원</th>
                            <th>경쟁률</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($arr_base['graph'] as $row)
                            <tr>
                                <td>{{$row['YearTarget']}}{{($row['TakeType'] == '2') ? ' 추시' : ''}}</td>
                                <td>{{number_format($row['NoticeNumber'])}}</td>
                                <td>{{number_format($row['TakeNumber'])}}</td>
                                <td>{{$row['AvgData']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="LayerTrend" class="willbes-Layer-Black" style="display: block"></div>

<script>
    // 동향 분석 팝업 백그라운드 클릭 닫기
    document.querySelector('.willbes-Layer-Trend .closeBtn').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('.examInfo').scrollIntoView({ behavior: 'smooth' });
    });

    $(document).ready(function() {
        $('#LayerTrend.willbes-Layer-Black').on('click', function(e) {
            e.preventDefault();
            $('.willbes-Layer-Trend').fadeOut();
            $(this).fadeOut();
            document.querySelector('.examInfo').scrollIntoView({ behavior: 'smooth' });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        google.charts.load('current', {packages: ['corechart', 'line']});
        google.charts.setOnLoadCallback(drawVisualization1);

        function drawVisualization1() {
            var data = google.visualization.arrayToDataTable([
                ['학년도', '경쟁률',  {type: 'number', role: 'annotation'},],
                @foreach($arr_base['graph_table_data'] as $key => $val)
                    ['{{$key}}{{($val['TakeType'] == '2' ? ' 추시' : '')}}{{($loop->last === true) ? '\n(학년도)' : ''}}', {v: {{$val['AvgData']}}, f:'{{$val['AvgData']}}'}, {{$val['AvgData']}}],
                @endforeach
            ]);
            var options = {
                title : '(경쟁률)',
                vAxes: {
                    0:{
                        gridlines : { count : 5 },
                        format: '#\':1\''
                    }
                },
                hAxis: {title: ""},
                //isStacked: true,
                seriesType: "bars",
                series: {
                    0: { type: "line"}
                },
                axes: {
                    y: {
                        count: {label: '인원'},
                        ratio: {side: 'right', label: '비율'}
                    }
                },
                annotations: {
                    alwaysOutside: true,
                    textStyle: {
                        fontSize: 12,
                        auraColor: 'none',
                        color: '#555'
                    },
                },
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_div1'));
            chart.draw(data, options);

            var data = google.visualization.arrayToDataTable([
                ['학년도', '모집인원', {type: 'number', role: 'annotation'}, '지원자 수', {type: 'number', role: 'annotation'},],
                    @foreach($arr_base['graph_table_data'] as $key => $val)
                [
                    '{{$key}}{{($val['TakeType'] == '2' ? ' 추시' : '')}}{{($loop->last === true) ? '\n(학년도)' : ''}}'
                    , {{$val['NoticeNumber']}}, {{$val['NoticeNumber']}}, {{$val['TakeNumber']}}, {{$val['TakeNumber']}}
                ],
                @endforeach
            ]);
            var options1 = {
                title : '(명)',
                vAxis: {title: ""},
                hAxis: {title: ""},
                //isStacked: true,
                seriesType: "bars",
                axes: {
                    y: {
                        count: {label: '인원'},
                        ratio: {side: 'right', label: '비율'}
                    }
                },
                annotations: {
                    alwaysOutside: true,
                    textStyle: {
                        fontSize: 12,
                        auraColor: 'none',
                        color: '#555'
                    },
                },
            };
            var colom = new google.visualization.ComboChart(document.getElementById('chart_div2'));
            colom.draw(data, options1);
        }
    });
</script>
