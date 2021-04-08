@extends('lcms.layouts.master_popup')

@section('popup_title')
    <b>보강신청정보</b>
@endsection

@section('add_buttons')
    &nbsp;
@endsection


@section('popup_content')
    <div class="x_content">
        ● 기본정보
        <table class="table table-striped table-bordered">
            <colgroup>
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
            </colgroup>
            <thead>
            <tr>
                <th>회원번호</th>
                <th>생년월일</th>
                <th>이름(아이디)</th>
                <th>전화번호</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$member['MemIdx']}}</td>
                <td>{{$member['BirthDay']}}</td>
                <td>{{$member['MemName']}}({{$member['MemId']}})</td>
                <td>{{$member['Phone']}}</td>
            </tr>
            </tbody>
        </table>

        ● 학원강좌정보

            <table class="table table-striped table-bordered">
                    <tr>
                        <th>종합반명</th>
                        <td>
                            @if($lec['LearnPatternCcd'] == '615007')
                                [종합반명] {{$lec['ProdName']}} <br>
                            @endif
                            {{$lec['SiteName']}} |
                            {{$lec['CateName']}} |
                            {{$lec['SchoolStartYear']}}년 {{$lec['SchoolStartMonth']}}월 |
                            {{$lec['CourseName']}}  |
                            {{$lec['SubjectName']}} |
                            {{$lec['StudyPatternCcdName']}} |
                            {{$lec['wProfName']}} |
                            {{$lec['subProdName']}}</td>
                    </tr>
            </table>

        ● 보강신청이력
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>회차</th>
                <th>신청일</th>
                <th>신청자</th>
                <th>불참사유</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4" style="text-align: center;">
                        [총 신청 가능 개수] {{$lec['SuppAbleCnt']}}개  |  [사용개수] {{count($log)}}개     [남은개수] {{$lec['SuppAbleCnt'] - count($log)}}개
                    </td>
                </tr>
            @php $i = count($log); @endphp
            @forelse( $log as $key => $row)
                <tr>
                    <td class="w-num">{{$i.'차'}}</td>
                    <td class="w-day">{{$row['OrderDate']}}</td>
                    <td class="w-modify-day">{{$member['MemName']}}</td>
                    <td class="w-user">{{$row['AdminEtcReason'] }}</td>
                </tr>
                @php $i = $i - 1; @endphp
            @empty
                <tr>
                    <td colspan="6">보강신청 이력이 없습니다.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@stop