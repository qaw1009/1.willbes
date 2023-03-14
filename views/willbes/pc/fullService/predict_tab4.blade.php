<div class="stage">
    <span class="bold">과목별 점수 및 과락 여부</span>
</div>
<table cellspacing="0" cellpadding="0" class="table_type">
    <col width="88" span="3" />
    <thead>
    <tr>
        <th>과목</th>
        <th>내 점수</th>
        <th>과락 여부</th>
    </tr>
    </thead>
    @if(empty($arr_statsForGradesData['list']) === false)
        <tbody>
            <tr>
                <th>헌법</th>
                <td>{{($isFailForSurvey == 1) ? 'PASS (60점 이상)' : 'FAIL (60점 미만)'}}</td>
                <td class="{{($isFailForSurvey == 1) ? 'pass' : 'wrong'}}">{{($isFailForSurvey == 1) ? '통과' : '과락'}}</td>
            </tr>
        @foreach($arr_statsForGradesData['list'] as $row)
            <tr>
                <th>{{$row['SubjectName']}}</th>
                <td>{{$row['MyOrgPoint']}}점</td>
                <td class="{{($row['MyOrgPoint'] <= 40 ? 'wrong' : 'pass')}}">{{($row['MyOrgPoint'] <= 40 ? '과락' : '통과')}}</td>
            </tr>
        @endforeach
        </tbody>
    @endif
</table>

@if(empty($resultComment) === false)
    <div class="fail_info">
        <p class="fail">{!! $resultComment !!}</p>
    </div>
@endif

<div class="stage">
    <span class="bold">{{date('Y')}}년 합격권 예측 기준</span>
</div>
<table cellspacing="0" cellpadding="0" class="table_type">
    <col width="290" span="2" />
    <tr>
        <td dir="ltr" width="290" class="bold">합격 유력권</td>
        <td dir="ltr" width="290">{{(empty($fullservice_data['StabilityAvrPoint']) === true ? '집계중' : $fullservice_data['StabilityAvrPoint'].'이상')}}</td>
    </tr>
    <tr>
        <td dir="ltr" width="290" class="bold">합격 가능권</td>
        <td dir="ltr" width="290">
            {{(empty($fullservice_data['StrongAvrPoint2']) === true ? '집계중' : $fullservice_data['StrongAvrPoint2'].'점 ~ '.$fullservice_data['StrongAvrPoint1'].'점')}}
        </td>
    </tr>
    <tr>
        <td dir="ltr" width="290"class="bold">합격 유보권</td>
        <td dir="ltr" width="290">
            {{(empty($fullservice_data['ExpectAvrPoint2']) === true ? '집계중' : $fullservice_data['ExpectAvrPoint2'].'점 ~ '.$fullservice_data['ExpectAvrPoint1'].'점')}}
        </td>
    </tr>
</table>
<div class="stage">
    <span class="bold">합격 컷 현황</span>
</div>
<table cellspacing="0" cellpadding="0" class="table_type">
    <col width="141" span="3"/>
    <tr class="bold">
        <td dir="ltr" width="141">{{date('Y')}}년 합격컷 예상</td>
        <td dir="ltr" width="141">{{date('Y')-1}}년 합격컷</td>
        {{--<td dir="ltr" width="141">내 점수</td>--}}
        <td dir="ltr" width="141">상위 20%컷</td>
        {{--<td dir="ltr" width="141">합격 여부 예측</td>--}}
    </tr>
    <tr>
        <td dir="ltr" width="141">{{(empty($fullservice_data['StabilityAvrPoint']) === true ? '집계중' : $fullservice_data['StabilityAvrPoint'].'점')}}</td>
        <td dir="ltr" width="141">{{(empty($fullservice_data['PassLineAgo']) === true ? '집계중' : $fullservice_data['PassLineAgo'].'점')}}</td>
        {{--<td dir="ltr" width="141">{{$fullservice_data['TotalMyOrgPoint']}}점</td>--}}
        <td dir="ltr" width="141">{{$fullservice_data['TotalTop20AvgOrgPoint']}}점</td>
        {{--<td dir="ltr" width="141" class="{{($fullservice_data['IsPass'] == 'Y' ? '' : 'wrong')}}">{{($fullservice_data['IsPass'] == 'Y' ? '합격' : '불합격')}}</td>--}}
    </tr>
</table>