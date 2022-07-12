<div class="stage">
    <span class="bold">합격권 예측</span>
</div>
<table cellspacing="0" cellpadding="0" class="table_type">
    <col width="290" span="2" />
    <tr>
        <td dir="ltr" width="290" class="bold">합격 확실권</td>
        <td dir="ltr" width="290">{{(empty($fullservice_data['StabilityAvrPoint']) === true ? '집계중' : $fullservice_data['StabilityAvrPoint'].'이상')}}</td>
    </tr>
    <tr>
        <td dir="ltr" width="290" class="bold">합격 유력권</td>
        <td dir="ltr" width="290">
            {{(empty($fullservice_data['StrongAvrPoint2']) === true ? '집계중' : $fullservice_data['StrongAvrPoint2'].'이상~'.$fullservice_data['StrongAvrPoint1'].'미만')}}
        </td>
    </tr>
    <tr>
        <td dir="ltr" width="290"class="bold">합격 가능권</td>
        <td dir="ltr" width="290">
            {{(empty($fullservice_data['ExpectAvrPoint2']) === true ? '집계중' : $fullservice_data['ExpectAvrPoint2'].'이상~'.$fullservice_data['ExpectAvrPoint1'].'미만')}}
        </td>
    </tr>
</table>
<div class="stage">
    <span class="bold">나의 합격 여부 예측</span>
</div>
<table cellspacing="0" cellpadding="0" class="table_type">
    <col width="141" span="5" />
    <tr class="bold">
        <td dir="ltr" width="141">2022년 합격컷 예상</td>
        <td dir="ltr" width="141">2021년  합격컷</td>
        <td dir="ltr" width="141">내 점수</td>
        <td dir="ltr" width="141">상위 10%컷</td>
        <td dir="ltr" width="141">합격 여부 예측</td>
    </tr>
    <tr>
        <td dir="ltr" width="141">{{(empty($fullservice_data['StabilityAvrPoint']) === true ? '집계중' : $fullservice_data['StabilityAvrPoint'].'점')}}</td>
        <td dir="ltr" width="141">{{(empty($fullservice_data['PassLineAgo']) === true ? '집계중' : $fullservice_data['PassLineAgo'].'점')}}</td>
        <td dir="ltr" width="141">{{$fullservice_data['TotalMyOrgPoint']}}점</td>
        <td dir="ltr" width="141">{{$fullservice_data['TotalTop10AvgOrgPoint']}}점</td>
        <td dir="ltr" width="141" class="{{($fullservice_data['IsPass'] == 'Y' ? '' : 'wrong')}}">{{($fullservice_data['IsPass'] == 'Y' ? '합격' : '불합격')}}</td>
    </tr>
</table>