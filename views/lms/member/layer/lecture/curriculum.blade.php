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
                        @if(empty($row['wWD']) == false)<button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodViewUnit('WD',{{$row['wUnitIdx']}})">와이드</button><br/>@endif
                        @if(empty($row['wHD']) == false)<button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodViewUnit('HD',{{$row['wUnitIdx']}})">고화질</button><br/>@endif
                        @if(empty($row['wSD']) == false)<button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodViewUnit('SD',{{$row['wUnitIdx']}})">일반화질</button>@endif
                    </td>
                    <td>{{$row['wBookPage']}} 페이지</td>
                    <td>{{$row['wRuntime']}}분</td>
                    <td>{{$row['limittime']}}</td>
                    <td>
                        {{floor(intval($row['StudyTime'])/60)}}분<br>
                        ( {{floor(intval($row['RealStudyTime'])/60)}}분 / {{$row['remaintime']}} )
                        @if(
                            empty($lec['MultipleApply']) == false && // 배수적용 빈칸 아니고
                            $lec['MultipleApply'] != 1 && // 1은 무제한
                            $lec['MultipleTypeCcd'] == '612001' &&
                            $row['RealStudyTime'] > 0
                        )
                            <br/><button class="btn btn-sm btn-primary border-radius-reset mr-15 btn-danger btn_change"
                                         data-m="{{$row['MemIdx']}}"
                                         data-o="{{$row['OrderIdx']}}"
                                         data-op="{{$row['OrderProdIdx']}}"
                                         data-p="{{$row['ProdCode']}}"
                                         data-ps="{{$row['ProdCodeSub']}}"
                                         data-l="{{$row['wLecIdx']}}"
                                         data-u="{{$row['wUnitIdx']}}"
                                         onclick="fnTime();">배수시간조정</button>
                        @endif
                    </td>
                    <td>
                        @if(empty($row['wUnitAttachFile']) == false)
                            <a href="{{app_url('/member/manage/download/'.$row['OrderIdx'].'/'.$row['ProdCode'].'/'.$row['ProdCodeSub'].'/'.$row['wLecIdx'].'/'.$row['wUnitIdx'], 'lms')}}"><img src="{{ 'https://static.willbes.net/public/images/willbes/prof/icon_file.gif' }}"></a>
                        @endif
                        <div id="modal-{{$row['wUnitIdx']}}" class="modal" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h2>● {{$row['wUnitNum']}}회 {{$row['wUnitLectureNum']}}강
                                            {{$row['wUnitName']}}
                                        </h2>

                                        <table class="table table-striped table-bordered">
                                            <colgroup>
                                                <col width="50%">
                                                <col width="50%">
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th>다운로드시간</th>
                                                <th>다운로드아이피</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $down_count = 0; @endphp
                                            @foreach($lec['down_log'] as $log)
                                                @if($log['wUnitIdx'] == $row['wUnitIdx'])
                                                    <tr>
                                                        <td>{{$log['DownloadDatm']}}</td>
                                                        <td>{{$log['DownloadIp']}}</td>
                                                    </tr>
                                                    @php $down_count++ ; @endphp
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($down_count > 0)
                            <br/><br>
                            총 {{$down_count}} 회 다운로드함<br/>
                            <button class="btn btn-sm btn-primary border-radius-reset mr-15 btn-danger" data-toggle="modal" data-target="#modal-{{$row['wUnitIdx']}}">파일다운로드 이력 보기</button>
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


        function fnAddTime()
        {
            if($('#addmemo').val().trim() == ""){
                alert('추가이유를 입력해주십시요.');
                return;
            }

            if($('#addminutes').val().trim() == 0){
                alert('추가할시간을 입력해주십시요.');
                return;
            }

            if(window.confirm('배수시간을 '+$('#addminutes').val()+'분 추가하시겠습니까?')){
                if($('#addminutes').val().trim() < 0) {
                    if (!window.confirm('배수시간을 빼는것이 맞습니까?')) {
                        return;
                    }
                }

                url = "{{ site_url("/member/manage/setTime/") }}";
                data = $('#time_form').formSerialize();

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


        $(document).ready(function() {
            $('.btn_change').setLayer({
                url: "{{ site_url("member/manage/layerSetTime/") }}",
                add_param_type:'attr_param',
                add_param:[
                    {'id':'m'},{'id':'o'},{'id':'op'},{'id':'p'},{'id':'ps'},{'id':'l'},{'id':'u'},
                ],
                width: 800
            });
        });


    </script>


@stop
