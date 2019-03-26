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
                    <b>[진도율]</b> {{$lec['StudyRate']}}% &nbsp; &nbsp; &nbsp;
                    <b>[인쇄용진도율]</b> <input type="text" name="txtrate" id="txtrate" value="{{$lec['StudyRatePrint']}}" size="3" maxlength="3" />% <button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="fnSetRate();">변경</button>
                </td>
            </tr>
        </table>

        ● 학습이력
        <table class="table table-striped table-bordered">
            <colgroup>
                <col width="5%">
                <col width="">
                <col width="10%">
                <col width="10%">
                <col width="5%">
                <col width="5%">
                <col width="10%">
                <col width="10%">
                <col width="5%">
                <col width="5%">
            </colgroup>
            <thead>
            <tr>
                <th>회차</th>
                <th>회차제목</th>
                <th>강의보기</th>
                <th>북페이지</th>
                <th>강의시간</th>
                <th>배수시간</th>
                <th>진도시간<br>(배수시간/남은시간)</th>
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
                    <td>{{$row['limittime']}}</td>
                    <td>
                        {{floor(intval($row['StudyTime'])/60)}}분<br>
                        ( {{floor(intval($row['RealStudyTime'])/60)}}분 / {{$row['remaintime']}} )
                    </td>
                    <td>
                        @if(empty($row['wUnitAttachFile']) == false)
                            <a href="{{app_url('/member/manage/download/'.$row['OrderIdx'].'/'.$row['ProdCode'].'/'.$row['ProdCodeSub'].'/'.$row['wLecIdx'].'/'.$row['wUnitIdx'], 'lms')}}"><img src="{{ 'https://static.willbes.net/public/images/willbes/prof/icon_file.gif' }}"></a>
                        @endif
                        <div id="log-{{$row['wUnitIdx']}}" class=".downlog" style="display:none;">
                            <a href="javascript:;" onclick="$('.downlog').hide();">닫기</a><br/><br/>
                            @php $isLog = false; @endphp
                            @foreach($lec['down_log'] as $log)
                                @if($log['wUnitIdx'] == $row['wUnitIdx'])
                                    {{$log['DownloadDatm']}} - {{$log['DownloadIp']}}<br>
                                    @php $isLog = true; @endphp
                                @endif
                            @endforeach
                        </div>
                        @if($isLog == true)
                            <span><a href="javascript:;" onclick="fnViewLog('{{$row['wUnitIdx']}}');">파일다운로드 이력 보기</a></span>
                        @endif
                    </td>
                    <td>{{$row['FirstStudyDate']}}</td>
                    <td>{{$row['LastStudyDate']}}</td>
                </tr>
            @empty
            @endforelse
            </tbody>
        </table>
    </div>
    <form name="ajax_form" id="ajax_form" method="post">
        <input type="hidden" name="memidx" value="{{$lec['MemIdx']}}" />
        <input type="hidden" name="orderidx" value="{{$lec['OrderIdx']}}" />
        <input type="hidden" name="prodcode" value="{{$lec['ProdCode']}}" />
        <input type="hidden" name="prodcodesub" value="{{$lec['ProdCodeSub']}}" />
        <input type="hidden" name="rate" id="rate" value="" />
    </form>
    <script type="text/javascript">
        function vodViewUnit(quility, idx) {
            popupOpen(app_url('/cms/lecture/player/?lecidx={{$lec['wLecIdx']}}&unitidx='+idx+'&quility=' + quility , 'wbs'), 'wbsPlayer', '1000', '600', null, null, 'no', 'no');
        }

        function fnSetRate(){
            $('#rate').val($('#txtrate').val());
            if(window.confirm('인쇄용 진도율을 '+$('#rate').val()+'%로 변경하시겠습니까?')){

                url = "{{ site_url("/member/manage/setrate/") }}";
                data = $('#ajax_form').formSerialize();

                sendAjax(url,
                    data,
                    function(ret){
                        alert(ret.ret_msg);
                        location.reload();
                    },
                    function(ret, status){
                        alert(ret.ret_msg);
                    }, false, 'GET', 'json');

            }
        }

        function fnViewLog(id){
            $('.downlog').hide();
            $('#log-'+id).show();
        }
    </script>


@stop
