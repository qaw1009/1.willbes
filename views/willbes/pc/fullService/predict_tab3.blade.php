<div class="stage">
    <span class="bold">{{sess_data('mem_name')}}님의 응시 정보</span>
</div>
<table cellspacing="0" cellpadding="0" class="table_type">
    <col span="4" width="25%"/>
    <tr>
        <th>응시번호</th>
        <td>{{$regi_data['TakeNumber']}}</td>
        <th>성명</th>
        <td>{{$regi_data['MemName']}}</td>
    </tr>
    <tr>
        <th>응시직렬</th>
        <td>{{$regi_data['TakeMockPartName']}}</td>
        <th>경쟁률</th>
        <td>{{$regi_data['CompetitionRateNow']}}</td>
    </tr>
    <tr>
        <th>선발인원 / 출원인원</th>
        <td colspan="3" >{{number_format($regi_data['PickNum'])}}명 / {{number_format($regi_data['TakeNum'])}}명</td>
    </tr>
</table>
<div class="stage">
    <span class="bold">{{$regi_data['MemName']}}님의 성적 분석</span>
    <span class="bold tx-red">(헌법 데이터 미반영)</span>
</div>
<table cellspacing="0" cellpadding="0" class="table_type">
    <col width="88" span="7" />
    <thead>
        <tr>
            <th>과목</th>
            <th>내 점수</th>
            <th>전체 평균</th>
            <th>상위 10% 컷</th>
            <th>상위 20% 컷</th>
            <th>나의 상위 %</th>
            <th>과락 여부</th>
        </tr>
    </thead>
    @if(empty($arr_statsForGradesData['list']) === false)
        @foreach($arr_statsForGradesData['list'] as $row)
        <tbody>
            <tr>
                <th>{{$row['SubjectName']}}</th>
                <td>{{$row['MyOrgPoint']}}점</td>
                <td>{{$row['AvgOrgPoint']}}점</td>
                <td>{{$row['Top10AvgOrgPoint']}}점</td>
                <td>{{$row['Top20AvgOrgPoint']}}점</td>
                <td>{{($row['AvgMyRank'])}}%</td>
                <td class="{{($row['MyOrgPoint'] <= 40 ? 'wrong' : 'pass')}}">{{($row['MyOrgPoint'] <= 40 ? '과락' : '')}}</td>
            </tr>
        </tbody>
        @endforeach
        <tfoot>
            <tr>
                <th>합계 평균</th>
                <td class="avg">{{$arr_statsForGradesData['stats']['TotalMyOrgPoint']}}점</td>
                <td class="avg">{{$arr_statsForGradesData['stats']['TotalAvgOrgPoint']}}점</td>
                <td class="avg">{{$arr_statsForGradesData['stats']['TotalTop10AvgOrgPoint']}}점</td>
                <td class="avg">{{$arr_statsForGradesData['stats']['TotalTop20AvgOrgPoint']}}점</td>
                <td class="avg">{{$arr_statsForGradesData['stats']['TotalAvgMyRank']}}%</td>
                <td class="avg {{($arr_statsForGradesData['stats']['TotalMyOrgPoint'] <= 40 ? 'wrong' : 'pass')}}">{{($arr_statsForGradesData['stats']['TotalMyOrgPoint'] <= 40 ? '과락' : '')}}</td>
            </tr>
        </tfoot>
    @endif
</table>

{{-- 전체 직렬 --}}
<div class="stage">
    <span class="bold">전체 직렬별 나의 성적 위치</span>
</div>
<div class="careful">
    ※ 데이터 집계중일 때는 나의 위치가 수시로 변동될 수 있습니다.<br>
    ※ 직렬 구분 없이 풀서비스 이용자 전체의 과목별 성적 분포입니다.
</div>

<ul class="markTab2">
    @foreach($arr_subjectForPoints as $key => $val)
        <li><a href="#sub1_tab_{{$key}}">{{$val}}</a></li>
    @endforeach
</ul>

@foreach($arr_subjectForPoints as $key => $val)
    <div id="sub1_tab_{{$key}}">
        <div class="bold chart graph_area" id="chart_div1_{{$key}}" style="height: 350px;">
            <span class="titleY">이용자수</span>
            <span class="titleX">점수</span>
        </div>

        <table cellspacing="0" cellpadding="0" class="table_type">
            <col width="88" span="4" />
            <tr class="bold gray">
                <td rowspan="2">원점수<br>(이상~미만)</td>
                <td rowspan="2">구간비율</td>
                <td rowspan="2">누적인원</td>
                <td rowspan="2">누적비율</td>
            </tr>
            <tr> </tr>
            @if (empty($arr_statsForChartData['total']) === false)
                @if (array_key_exists($key, $arr_statsForChartData['total']) === true)
                    @foreach($arr_statsForChartData['total'][$key] as $g_k => $row)
                        <tr>
                            <td class="bold blue">{{$row['title']}}</td>
                            <td>{{$row['avgSection']}}%</td>
                            <td>{{$row['cntCumsum']}}</td>
                            <td>{{$row['avgCumsum']}}%</td>
                        </tr>
                    @endforeach
                @endif
            @endif
        </table>
    </div>
@endforeach

<div class="stage">
    <span class="bold">전체 직렬별 나의 성적 위치</span>
</div>
<table cellspacing="0" cellpadding="0" class="table_type">
    <col width="88" span="6" />
    <tr class="bold">
        <td>등수</td>
        @foreach($arr_subjectForStats as $key => $val)
            <td>{{$val}}</td>
        @endforeach
        <td>상위(%)</td>
    </tr>

    @if(empty($arr_statsForTotalAvgData) === false)
        @foreach($arr_statsForTotalAvgData as $row)
            @php $arr_orgPoint = json_decode($row['jsonOrgPoint'],true); @endphp
            <tr class="{{($regi_data['PrIdx'] == $row['PrIdx'] ? 'current' : '')}}">
                <td class="bold">{{$row['UserRank']}}</td>
                <td>{{$row['avgOrgPoint']}}점</td>
                @foreach($arr_orgPoint as $p_key => $p_row)
                    <td>{{$p_row['OrgPoint']}}점</td>
                @endforeach
                <td>{{$row['UserAvgRank']}}</td>
            </tr>
        @endforeach
    @endif
</table>

{{-- 동일 직렬 --}}
<div class="stage">
    <span class="bold">동일 직렬에서의 내 위치</span>
</div>
<div class="careful">
    ※ 데이터 집계중일 때는 나의 위치가 수시로 변동될 수 있습니다.
</div>
<ul class="markTab2">
    @foreach($arr_subjectForPoints as $key => $val)
        <li><a href="#sub2_tab_{{$key}}">{{$val}}</a></li>
    @endforeach
</ul>
@foreach($arr_subjectForPoints as $key => $val)
    <div id="sub2_tab_{{$key}}">
        <div class="bold chart graph_area" id="chart_div2_{{$key}}" style="height: 350px;"></div>

        <table cellspacing="0" cellpadding="0" class="table_type">
            <col width="88" span="4" />
            <tr class="bold gray">
                <td rowspan="2">원점수<br>(이상~미만)</td>
                <td rowspan="2">구간비율</td>
                <td rowspan="2">누적인원</td>
                <td rowspan="2">누적비율</td>
            </tr>
            <tr> </tr>
            @if (empty($arr_statsForChartData['takemockpart']) === false)
                @if (array_key_exists($key, $arr_statsForChartData['takemockpart']) === true)
                    @foreach($arr_statsForChartData['takemockpart'][$key] as $g_k => $row)
                        <tr>
                            <td class="bold blue">{{$row['title']}}</td>
                            <td>{{$row['avgSection']}}%</td>
                            <td>{{$row['cntCumsum']}}</td>
                            <td>{{$row['avgCumsum']}}%</td>
                        </tr>
                    @endforeach
                @endif
            @endif
        </table>
    </div>
@endforeach

<div class="stage">
    <span class="bold">동일 직렬에서의 내 위치</span>
</div>
<table cellspacing="0" cellpadding="0" class="table_type">
    <col width="88" span="6" />
    <tr class="bold">
        <td>등수</td>
        @foreach($arr_subjectForStats as $key => $val)
            <td>{{$val}}</td>
        @endforeach
        <td>상위(%)</td>
    </tr>
    @if(empty($arr_statsForTakeMockPartAvgData) === false)
        @foreach($arr_statsForTakeMockPartAvgData as $row)
            @php $arr_orgPoint = json_decode($row['jsonOrgPoint'],true); @endphp
            <tr class="{{($regi_data['PrIdx'] == $row['PrIdx'] ? 'current' : '')}}">
                <td class="bold">{{$row['UserRank']}}</td>
                <td>{{$row['avgOrgPoint']}}점</td>
                @foreach($arr_orgPoint as $p_key => $p_row)
                    <td>{{$p_row['OrgPoint']}}점</td>
                @endforeach
                <td>{{$row['UserAvgRank']}}</td>
            </tr>
        @endforeach
    @endif
</table>
@if (empty($arr_surveyChartData['graph1']) === false)
    <div class="graph_area">
        <div class="markSbtn3 bold">
            <a href="javascript:void(0)">PSAT 체감 난이도는?</a><br>
            <div class="markSbtn3_combine" style="text-align: left;">
                @foreach($arr_surveyChartData['graph1'] as $subject_name => $row)
                    <div id="levelSubject{{$loop->index}}" class="subject"><span class="subject_detail">{{$subject_name}}</span></div>
                @endforeach
            </div>
            {{--<div class="level">
                @foreach(array_value_first(array_value_first($arr_surveyChartData['graph1'])) as $level_title => $v)
                    <div><span class="level{{($loop->count - $loop->index) + 1}}"></span>{{$level_title}}</div>
                @endforeach
            </div>--}}
            <div class="level">
                <div><span class="level5"></span>매우 어려움</div>
                <div><span class="level4"></span>어려움</div>
                <div><span class="level3"></span>보통</div>
                <div><span class="level2"></span>쉬움</div>
                <div><span class="level1"></span>매우 쉬움</div>
            </div>
        </div>
    </div>
@endif
@if (empty($arr_surveyChartData['graph2']) === false)
    <div class="graph_area">
        <div class="markSbtn4 bold">
            <a href="javascript:void(0)">가장 어려웠던 과목은?</a><br>
            <div id="hardSubject"></div>
        </div>
    </div>
@endif
@if (empty($arr_surveyChartData2['graph1']) === false)
    <div class="graph_area">
        <div class="markSbtn4 bold">
            <a href="javascript:void(0)">헌법 합격 여부</a><br>
            <div id="subjectIsFail"></div>
        </div>
    </div>
@endif
<script>
    $(document).ready(function() {
        $('.markTab2').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
            $content = $($active[0].hash);
            $links.not($active).each(function(){
                $(this.hash).hide()
            });

            // Bind the click event handler
            $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();
                $active = $(this);
                $content = $(this.hash);
                $active.addClass('active');
                $content.show();
                e.preventDefault();
            });
        });

        drawVisualization();

        // 가장 어려웠던 과목은?
        hardSubject();
        levelSubject();
        subjectIsFail();
    });

    // 체감 난이도는?
    function levelSubject() {
        @if(empty($arr_surveyChartData['graph1']) === false)
            var json_data = {!! json_encode($arr_surveyChartData['graph1']) !!};
        @else
            return;
        @endif

        var title, fields, values;
        var options = [];
        var cnt = 1;
        $.each(json_data, function(key, val) {
            title = key;
            fields = [];
            values = [];
            $.each(val, function(item_k, item_v) {
                $.each(item_v, function(k, v) {
                    fields.push(k);
                    values.push(v);
                });
            });

            options = {
                'dataset':{
                    title: title,
                    values: values,
                    colorset: ['#8faadc', '#f4b183', "#a9d18e", "#ffd966", "#cc99ff"],
                    fields: fields
                },
                /*'donut_width' : 85,
                'core_circle_radius':0,
                'chartDiv': 'levelSubject' + cnt,
                'chartType': 'pie',
                'chartSize': {width:450, height:230}*/
                'donut_width' : 70,
                'core_circle_radius':0,
                'chartDiv': 'levelSubject' + cnt,
                'chartType': 'pie',
                'chartSize': {width:225, height:180}
            };
            Nwagon.chart(options);

            var chartSvg = document.getElementById('levelSubject' + cnt).getElementsByTagName('svg')[0];
            var fields = chartSvg.getElementsByClassName('fields')[0];
            chartSvg.removeChild(fields);
            cnt++;
        });
    }

    // 가장 어려웠단 과목은?
    function hardSubject() {
        @if(empty($arr_surveyChartData['graph2']) === false)
            var json_data = {!! json_encode($arr_surveyChartData['graph2']) !!};
        @else
            return;
        @endif

        var fields = [];
        var values = [];
        var title = '';
        $.each(json_data, function(key, val) {
            title = key;
            $.each(val, function(item_k, item_v) {
                $.each(item_v, function(k, v) {
                    fields.push(k);
                    values.push(v);
                });
            });
        });

        var options = {
            'dataset':{
                title: title,
                values: values,
                colorset: ['#f47aa2', '#4d9ef0', "#9f4ef1"],
                fields: fields
            },
            'donut_width' : 100,
            'core_circle_radius':0,
            'chartDiv': 'hardSubject',
            'chartType': 'pie',
            'chartSize': {width:450, height:250}
        };
        Nwagon.chart(options);
    }

    // 헌법 합격 여부 설문
    function subjectIsFail() {
        @if(empty($arr_surveyChartData2['graph1']) === false)
        var json_data = {!! json_encode($arr_surveyChartData2['graph1']) !!};
        @else
            return;
        @endif

        var fields = [];
        var values = [];
        var title = '';
        $.each(json_data, function(key, val) {
            title = key;
            $.each(val, function(item_k, item_v) {
                $.each(item_v, function(k, v) {
                    fields.push(k);
                    values.push(v);
                });
            });
        });

        var options = {
            'dataset':{
                title: title,
                values: values,
                colorset: ['#65D4C5', '#F17274', "#9f4ef1"],
                fields: fields
            },
            'donut_width' : 100,
            'core_circle_radius':0,
            'chartDiv': 'subjectIsFail',
            'chartType': 'pie',
            'chartSize': {width:550, height:250}
        };
        Nwagon.chart(options);
    }

    function drawVisualization() {
        var arr_total_point = {!! json_encode($arr_statsForChartData['chart_total']) !!};
        var arr_takemockpart_point = {!! json_encode($arr_statsForChartData['chart_takemockpart']) !!};
        var max_value_total = '{{$regi_data['MaxForTotalChart']}}';
        var max_value_takemockpart = '{{$regi_data['MaxForTakeMockPartChart']}}';
        var _temp, increment_total, increment_takemockpart = '';    //그래프 y축 간격 값 초기화

        _temp = (max_value_total / 100);
        increment_total = (_temp <= 1) ? 1 * 10 : Math.floor(_temp) * 10;

        _temp = (max_value_takemockpart / 100);
        increment_takemockpart = (_temp <= 1) ? 1 * 10 : Math.floor(_temp) * 10;

        $.each(arr_total_point,function(div_key, row) {
            var arr_title = [];
            var arr_line = [];
            $.each(row,function(row_key, row_val) {
                arr_title.push(row_val['title']);
                arr_line.push([parseInt((isNaN(parseInt(row_val['cntSection'])) === false ? row_val['cntSection'] : 0)), row_val['my_OrgPoint']]);
            });

            var options = {
                'customizing': {
                    isGuideLineNeeded: 'Y'
                    ,myLineHeight : '233'
                },
                'legend': {
                    names: arr_title,
                },
                'dataset': {
                    title : '전체 직렬별 나의 성적 위치',
                    values: arr_line,
                    colorset: ['#30a1ce','#DC143C'],
                    fields : ['전체', '내평균']
                },
                'chartDiv': 'chart_div1_'+div_key,
                'chartType': 'multi_column',
                'chartSize': { width: 757, height: 330 },
                'maxValue': max_value_total,
                'increment': increment_total
            };
            Nwagon.chart(options);
        });

        $.each(arr_takemockpart_point,function(div_key, row) {
            var arr_title = [];
            var arr_line = [];
            $.each(row,function(row_key, row_val) {
                arr_title.push(row_val['title']);
                arr_line.push([parseInt((isNaN(parseInt(row_val['cntSection'])) === false ? row_val['cntSection'] : 0)), row_val['my_OrgPoint']]);
            });

            var options = {
                'customizing': {
                    isGuideLineNeeded: 'Y'
                    ,myLineHeight : '233'
                },
                'legend': {
                    names: arr_title
                },
                'dataset': {
                    title : '동일 직렬별 나의 성적 위치',
                    values: arr_line,
                    colorset: ['#30a1ce','#DC143C'],
                    fields : ['전체', '내평균']
                },
                'chartDiv': 'chart_div2_'+div_key,
                'chartType': 'multi_column',
                'chartSize': { width: 757, height: 330 },
                'maxValue': max_value_takemockpart,
                'increment': increment_takemockpart
            };
            Nwagon.chart(options);
        });


    }
</script>