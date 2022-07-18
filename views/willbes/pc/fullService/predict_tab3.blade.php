<div class="stage">
    <span class="bold">{{sess_data('mem_name')}}님의 응시 정보</span>
</div>
<table cellspacing="0" cellpadding="0" class="table_type">
    <col width="153" span="4" />
    <tr>
        <td dir="ltr" width="153" class="bold gray">응시번호</td>
        <td dir="ltr" width="153">{{$regi_data['TakeNumber']}}</td>
        <td dir="ltr" width="153" class="bold gray">성명</td>
        <td dir="ltr" width="153">{{$regi_data['MemName']}}</td>
    </tr>
    <tr>
        <td dir="ltr" width="153" class="bold gray">응시직렬</td>
        <td dir="ltr" width="153">{{$regi_data['TakeMockPartName']}}</td>
        <td dir="ltr" width="153" class="bold gray">경쟁률</td>
        <td dir="ltr" width="153">{{$regi_data['CompetitionRateNow']}}</td>
    </tr>
    <tr>
        <td colspan="2" dir="ltr" width="306" class="bold gray">선발인원 / 출원인원</td>
        <td colspan="2" dir="ltr" width="306">{{number_format($regi_data['PickNum'])}}명 / {{number_format($regi_data['TakeNum'])}}명</td>
    </tr>
</table>
<div class="stage">
    <span class="bold">{{$regi_data['MemName']}}님의 성적 분석</span>
</div>
<table cellspacing="0" cellpadding="0" class="table_type">
    <col width="88" span="7" />
    <tr class="bold gray">
        <td dir="ltr" width="88">과목</td>
        <td dir="ltr" width="88">내 점수</td>
        <td dir="ltr" width="88">전체 평균</td>
        <td dir="ltr" width="88">상위 10% 컷</td>
        <td dir="ltr" width="88">상위 20% 컷</td>
        <td dir="ltr" width="88">나의 상위 %</td>
        <td dir="ltr" width="88">과락 여부</td>
    </tr>
    @if(empty($arr_statsForGradesData['list']) === false)
        @foreach($arr_statsForGradesData['list'] as $row)
            <tr>
                <td dir="ltr" width="88" class="bold blue">{{$row['SubjectName']}}</td>
                <td dir="ltr" width="88">{{$row['MyOrgPoint']}}점</td>
                <td dir="ltr" width="88">{{$row['AvgOrgPoint']}}점</td>
                <td dir="ltr" width="88">{{$row['Top10AvgOrgPoint']}}점</td>
                <td dir="ltr" width="88">{{$row['Top20AvgOrgPoint']}}점</td>
                <td dir="ltr" width="88">{{($row['AvgMyRank'])}}%</td>
                <td dir="ltr" width="88" class="{{($row['MyOrgPoint'] <= 40 ? 'wrong' : 'pass')}}">{{($row['MyOrgPoint'] <= 40 ? '과락' : '')}}</td>
            </tr>
        @endforeach
        <tr class="bold">
            <td dir="ltr" width="88" class="gray">합계 평균</td>
            <td dir="ltr" width="88" class="avg">{{$arr_statsForGradesData['stats']['TotalMyOrgPoint']}}점</td>
            <td dir="ltr" width="88" class="avg">{{$arr_statsForGradesData['stats']['TotalAvgOrgPoint']}}점</td>
            <td dir="ltr" width="88" class="avg">{{$arr_statsForGradesData['stats']['TotalTop10AvgOrgPoint']}}점</td>
            <td dir="ltr" width="88" class="avg">{{$arr_statsForGradesData['stats']['TotalTop20AvgOrgPoint']}}점</td>
            <td dir="ltr" width="88" class="avg">{{$arr_statsForGradesData['stats']['TotalAvgMyRank']}}%</td>
            <td dir="ltr" width="88" class="avg {{($arr_statsForGradesData['stats']['TotalMyOrgPoint'] <= 40 ? 'wrong' : 'pass')}}">{{($arr_statsForGradesData['stats']['TotalMyOrgPoint'] <= 40 ? '과락' : '')}}</td>
        </tr>
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
        <div class="bold chart graph_area" id="chart_div1_{{$key}}" style="height: 350px;"></div>

        <table cellspacing="0" cellpadding="0" class="table_type">
            <col width="88" span="4" />
            <tr class="bold gray">
                <td rowspan="2" dir="ltr" width="88">원점수<br>(이상~미만)</td>
                <td rowspan="2" dir="ltr" width="88">구간비율</td>
                <td rowspan="2" dir="ltr" width="88">누적인원</td>
                <td rowspan="2" dir="ltr" width="88">누적비율</td>
            </tr>
            <tr> </tr>
            @if (empty($arr_statsForChartData['total']) === false)
                @if (array_key_exists($key, $arr_statsForChartData['total']) === true)
                    @foreach($arr_statsForChartData['total'][$key] as $g_k => $row)
                        <tr>
                            <td dir="ltr" width="88" class="bold blue">{{$row['title']}}</td>
                            <td dir="ltr" width="88">{{$row['avgCnt']}}%</td>
                            <td dir="ltr" width="88">{{$row['cntCumsum']}}</td>
                            <td dir="ltr" width="88">{{$row['avgCumsum']}}%</td>
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
        <td dir="ltr" width="88">등수</td>
        @foreach($arr_subjectForStats as $key => $val)
            <td dir="ltr" width="88">{{$val}}</td>
        @endforeach
        <td dir="ltr" width="88">상위(%)</td>
    </tr>

    @if(empty($arr_statsForTotalAvgData) === false)
        @foreach($arr_statsForTotalAvgData as $row)
            @php $arr_orgPoint = json_decode($row['jsonOrgPoint'],true); @endphp
            <tr class="{{($regi_data['PrIdx'] == $row['PrIdx'] ? 'current' : '')}}">
                <td dir="ltr" width="88" class="bold">{{$row['UserRank']}}</td>
                <td dir="ltr" width="88">{{$row['avgOrgPoint']}}점</td>
                @foreach($arr_orgPoint as $p_key => $p_row)
                    <td dir="ltr" width="88">{{$p_row['OrgPoint']}}점</td>
                @endforeach
                <td dir="ltr" width="88">{{$row['UserAvgRank']}}</td>
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
                <td rowspan="2" dir="ltr" width="88">원점수<br>(이상~미만)</td>
                <td rowspan="2" dir="ltr" width="88">구간비율</td>
                <td rowspan="2" dir="ltr" width="88">누적인원</td>
                <td rowspan="2" dir="ltr" width="88">누적비율</td>
            </tr>
            <tr> </tr>
            @if (empty($arr_statsForChartData['takemockpart']) === false)
                @if (array_key_exists($key, $arr_statsForChartData['takemockpart']) === true)
                    @foreach($arr_statsForChartData['takemockpart'][$key] as $g_k => $row)
                        <tr>
                            <td dir="ltr" width="88" class="bold blue">{{$row['title']}}</td>
                            <td dir="ltr" width="88">{{$row['avgCnt']}}%</td>
                            <td dir="ltr" width="88">{{$row['cntCumsum']}}</td>
                            <td dir="ltr" width="88">{{$row['avgCumsum']}}%</td>
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
        <td dir="ltr" width="88">등수</td>
        @foreach($arr_subjectForStats as $key => $val)
            <td dir="ltr" width="88">{{$val}}</td>
        @endforeach
        <td dir="ltr" width="88">상위(%)</td>
    </tr>
    @if(empty($arr_statsForTakeMockPartAvgData) === false)
        @foreach($arr_statsForTakeMockPartAvgData as $row)
            @php $arr_orgPoint = json_decode($row['jsonOrgPoint'],true); @endphp
            <tr class="{{($regi_data['PrIdx'] == $row['PrIdx'] ? 'current' : '')}}">
                <td dir="ltr" width="88" class="bold">{{$row['UserRank']}}</td>
                <td dir="ltr" width="88">{{$row['avgOrgPoint']}}점</td>
                @foreach($arr_orgPoint as $p_key => $p_row)
                    <td dir="ltr" width="88">{{$p_row['OrgPoint']}}점</td>
                @endforeach
                <td dir="ltr" width="88">{{$row['UserAvgRank']}}</td>
            </tr>
        @endforeach
    @endif
</table>
<div class="graph_area">
    <div class="markSbtn3 bold">
        <a href="javascript:void(0)">PSAT 체감 난이도는?</a><br>
        <div id="levelSubject1"></div>
        <div id="levelSubject2"></div>
        <div id="levelSubject3"></div>
    </div>
    <div class="markSbtn3 bold">
        <a href="javascript:void(0)">가장 어려웠던 과목은?</a><br>
        <div id="hardSubject"></div>
    </div>
</div>

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
                    colorset: ['#4e67c8', '#a7ea52', "#5dceaf", "#ff8021", "#f14124"],
                    fields: fields
                },
                'donut_width' : 85,
                'core_circle_radius':0,
                'chartDiv': 'levelSubject' + cnt,
                'chartType': 'pie',
                'chartSize': {width:400, height:300}
            };
            Nwagon.chart(options);

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
                colorset: ['#9c1f0a', '#ad4a00', "#ff8021"],
                fields: fields
            },
            'donut_width' : 85,
            'core_circle_radius':0,
            'chartDiv': 'hardSubject',
            'chartType': 'pie',
            'chartSize': {width:700, height:300}
        };
        Nwagon.chart(options);
    }

    function drawVisualization() {
        var arr_total_point = {!! json_encode($arr_statsForChartData['chart_total']) !!};
        var arr_takemockpart_point = {!! json_encode($arr_statsForChartData['chart_takemockpart']) !!};

        $.each(arr_total_point,function(div_key, row) {
            var arr_title = [];
            var arr_line = [];
            $.each(row,function(row_key, row_val) {
                arr_title.push(row_val['title']);
                arr_line.push(parseInt((isNaN(parseInt(row_val['cntCumsum'])) === false ? row_val['cntCumsum'] : 0)));
            });

            var options = {
                'legend': {
                    names: arr_title
                },
                'dataset': {
                    title: 'Playing time per day',
                    values: arr_line,
                    colorset: ['#30a1ce','#DC143C']
                },
                'chartDiv': 'chart_div1_'+div_key,
                'chartType': 'column',
                'chartSize': { width: 700, height: 330 },
                'maxValue': 10,
                'increment': 1
            };
            Nwagon.chart(options);
        });

        $.each(arr_takemockpart_point,function(div_key, row) {
            var arr_title = [];
            var arr_line = [];
            $.each(row,function(row_key, row_val) {
                arr_title.push(row_val['title']);
                arr_line.push(parseInt((isNaN(parseInt(row_val['cntCumsum'])) === false ? row_val['cntCumsum'] : 0)));
            });

            var options = {
                'legend': {
                    names: arr_title
                },
                'dataset': {
                    title: 'Playing time per day',
                    values: arr_line,
                    colorset: ['#30a1ce','#DC143C']
                },
                'chartDiv': 'chart_div2_'+div_key,
                'chartType': 'column',
                'chartSize': { width: 700, height: 330 },
                'maxValue': 10,
                'increment': 1
            };
            Nwagon.chart(options);
        });

    }
</script>