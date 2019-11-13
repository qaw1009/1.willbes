@extends('willbes.pc.layouts.master_popup')

@section('content')
<!-- Popup -->
<div class="Popup ExamBox">
    <div class="popTitBox">
        <div class="pop-Tit NG"><img src="/public/img/willbes//mypage/logo.gif"> 전국 모의고사</div>
        <div class="pop-subTit">{{ $productInfo['ProdName'] }}</div>
    </div>
    <div class="popupContainer">
        <ul class="tabSty">
            <li><a href="javascript:goLink(1);">전체 성적 분석</a></li>
            <li class="active"><a href="#none">과목별 문항분석</a></li>
            @if($productInfo['PaperType'] == 'I')<li><a href="javascript:goLink(2);">오답노트</a></li>@endif
        </ul>
        <!-- //tab -->
        <div class="btnAgR mgT1 mgB1 mb-zero">
            <a class="btnlineGray"href="javascript:window.print()">출력</a>
        </div>

        @foreach($pList as $key => $row)

        <!-- 문항별 분석 -->
        <div class="htit2Wp">
            <h3 class="htit2 f_left NG"><span class="tx-deep-blue">{{ $row }}</span> 문항별 분석</h3>
            <span class="f_right markerTx"><em>붉은</em>색은 틀린부분표시</span>
        </div>
        <table cellspacing="0" cellpadding="0" class="sheetTb mgB4">
            <colgroup>
                <col style="width: 90px;"/>
                @foreach($dataSubject[$key] as $key2 => $row2)
                    <col width="*">
                @endforeach
            </colgroup>
            <thead>
            <tr>
                <th>구분</th>
                @foreach($dataSubject[$key]['RightAnswer'] as $key2 => $row2)
                    <th>{{ $key2 + 1 }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>정답</td>
                @foreach($dataSubject[$key]['RightAnswer'] as $key2 => $row2)
                    <td>{{ $row2 }}</td>
                @endforeach

            </tr>
            <tr>
                <td>마킹</td>
                @foreach($dataSubject[$key]['Answer'] as $key2 => $row2)
                    <td><span class="@if($dataSubject[$key]['IsWrong'][$key2] == 'N') mis @endif">{{ $row2 }}</span></td>
                @endforeach

            </tr>
            <tr>
                <td>정답률</td>
                @foreach($dataSubject[$key]['QAVR'] as $key2 => $row2)
                    <td>{{ $row2 }}%</td>
                @endforeach
            </tr>
            <tr>
                <td>난이도</td>
                @foreach($dataSubject[$key]['Difficulty'] as $key2 => $row2)
                    <td>{{ $row2 }}</td>
                @endforeach
            </tr>
            </tbody>
        </table>
        @endforeach

        <!-- 학습요소 -->
        @foreach($dataSubjectV2 as $key => $row)
        <div class="htit2Wp mt60">
            <h3 class="htit2 NG"><span class="tx-deep-blue">{{ $row['MP'] }}</span> 영역 및 학습요소</h3>
        </div>
        <table cellspacing="0" cellpadding="0" class="sheetTb2 mgB4">
            <colgroup>
                <col style="width: 170px;"/>
                <col style="width: 65px;"/>
                <col style="width: 95px;"/>
                <col style="width: 240px;">
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
            <tr>
                <td>{{ $row['areaName'] }}</td>
                <td>@if(empty($row['OCNT'])===false) {{ COUNT($row['OCNT']) }} / {{ COUNT($row['QuestionNO']) }} @else 0 / {{ COUNT($row['QuestionNO']) }}@endif</td>
                <td>{{ $row['AVR'] }}</td>
                <td>@if(empty($row['QuestionNO'])===false) @foreach($row['QuestionNO'] as $key => $row2) ({{ $row2 }}) @endforeach @endif</td>
                <td class="aMis">@if(empty($row['XCNT'])===false) @foreach($row['XCNT'] as $key => $row2) ({{ $row2 }}) @endforeach @endif</td>
            </tr>
            </tbody>
        </table>
        @endforeach

        <!-- End 학습요소 -->

    </div>

    <!-- //popupContainer -->
    <form class="form-horizontal" id="url_form" name="url_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" id='prodcode' name="prodcode" value="{{ $prodcode }}" />
        <input type="hidden" id='mridx' name="mridx" value="{{ $mridx }}" />
    </form>
</div>
<!-- End Popup -->
<script>
    function goLink(type){
        //값이 세팅되면 시작
        if(type == 1){
            var link = "{{ site_url('/classroom/MockResult/winStatTotal') }}";
            document.url_form.action = link;
        }else{
            var link ="{{ site_url('/classroom/MockResult/winAnswerNote') }}";
            document.url_form.action = link;
        }
        document.url_form.submit();
    }
</script>
@stop
