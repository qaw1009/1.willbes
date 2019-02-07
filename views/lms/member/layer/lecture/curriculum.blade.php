@extends('lcms.layouts.master_popup')

@section('popup_title')
    <b>수강정보</b>
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

        ● 강좌정보
        <table class="table table-striped table-bordered">
            @if( $lec['LearnPatternCcd'] == '615002'
            || $lec['LearnPatternCcd'] == '615003'
            || $lec['LearnPatternCcd'] == '615004' )
                <tr>
                    <th>패키지명</th>
                    <td>{{$lec['ProdName']}}</td>
                </tr>
            @endif
            <tr>
                <th>강좌명</th>
                <td>{{$lec['subProdName']}}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <b>[수강기간]</b> {{str_replace('-', '.', $lec['LecStartDate'])}}~{{str_replace('-', '.', $lec['RealLecEndDate'])}} ({{$lec['RealLecExpireDay']}}일) &nbsp; &nbsp; &nbsp;
                    <b>[남은수강기간]</b>
                    @if(strtotime($lec['LecEndDate']) < strtotime(date("Y-m-d", time())))
                        수강종료
                    @elseif(strtotime($lec['LecStartDate']) > strtotime(date("Y-m-d", time())))
                        {{ intval(strtotime($lec['RealLecEndDate']) - strtotime($lec['LecStartDate']))/86400 +1 }}일
                    @elseif(empty($lec['lastPauseEndDate']) == true)
                        {{ intval(strtotime($lec['RealLecEndDate']) - strtotime(date("Y-m-d", time())))/86400 +1 }}일
                    @elseif(strtotime($lec['lastPauseEndDate']) >= strtotime(date("Y-m-d", time())))
                        {{ intval(strtotime($lec['RealLecEndDate']) - strtotime($lec['lastPauseEndDate']))/86400 }}일
                    @else
                        {{ intval(strtotime($lec['RealLecEndDate']) - strtotime(date("Y-m-d", time())))/86400 +1 }}일
                    @endif &nbsp; &nbsp; &nbsp;
                    <b>[진행상태]</b> {{$lec['wLectureProgressCcdName']}} &nbsp; &nbsp; &nbsp;
                    <b>[배수]</b> {{$lec['MultipleApply'] == '1' ? '무제한' : $lec['MultipleApply'].'배수' }} &nbsp; &nbsp; &nbsp;
                    <b>[진도율]</b> {{$lec['StudyRate']}}%<br>
                </td>
            </tr>
        </table>

        ● 학습이력
        <table class="table table-striped table-bordered">
            <colgroup>
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
            </colgroup>
            <thead>
            <tr>
                <th>회차</th>
                <th>회차제목</th>
                <th>강의보기</th>
                <th>북페이지</th>
                <th>기본강의시간</th>
                <th>배수강의시간</th>
                <th>학습시간/남은시간</th>
                <th>보조자료(다운로드이력)</th>
                <th>최초수강일</th>
                <th>최종수강일</th>
            </tr>
            </thead>
            <tbody>
            @forelse($curriculum as $row)
                <tr>
                    <td>{{$row['wUnitNum']}}회 {{$row['wUnitLectureNum']}}강</td>
                    <td>{{$row['wUnitName']}}</td>
                    <td>
                        @if(empty($row['wWD']) == false)<button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodViewUnit('WD',{{$row['wUnitIdx']}})">와이드</button>@endif
                        @if(empty($row['wHD']) == false)<button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodViewUnit('HD',{{$row['wUnitIdx']}})">고화질</button>@endif
                        @if(empty($row['wSD']) == false)<button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodViewUnit('SD',{{$row['wUnitIdx']}})">일반화질</button>@endif
                    </td>
                    <td>{{$row['wBookPage']}} 페이지</td>
                    <td>{{$row['wRuntime']}}분</td>
                    <td></td>
                    <td> </td>
                    <td>@if(empty($row['wUnitAttachFile']) == false)
                            <a href="{{app_url('/member/manage/download/'.$row['ProdCode'].'/'.$row['ProdCodeSub'].'/'.$row['wLecIdx'].'/'.$row['wUnitIdx'], 'lms')}}"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                        @endif</td>
                    <td>{{$row['FirstStudyDate']}}</td>
                    <td>{{$row['LastStudyDate']}}</td>
                </tr>
            @empty
            @endforelse
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        function vodViewUnit(quility, idx) {
            popupOpen(app_url('/cms/lecture/player/?lecidx={{$lec['wLecIdx']}}&unitidx='+idx+'&quility=' + quility , 'wbs'), 'wbsPlayer', '1000', '600', null, null, 'no', 'no');
        }
    </script>


@stop
