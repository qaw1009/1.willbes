@extends('lcms.layouts.master_popup')

@section('popup_title')
    <b>일시중지 설정</b>
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
            @if( $lec['LearnPatternCcd'] == '615001'
               || $lec['LearnPatternCcd'] == '615002' )
                <tr>
                    <th>강좌명</th>
                    <td>{{$lec['subProdName']}}</td>
                </tr>
            @endif
            <tr>
                <td colspan="2">
                    <b>[최초수강기간]</b> {{$lec['LecStartDate']}} ~ {{$lec['LecEndDate']}} ({{$lec['LecExpireDay']}}일)  &nbsp; &nbsp; &nbsp;
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
                    @endif &nbsp; &nbsp; &nbsp;<br>
                    @if($lec['LearnPatternCcd'] == '615003' || $lec['LearnPatternCcd'] == '615004')
                    @else
                        <b>[진행상태]</b> {{$lec['wLectureProgressCcdName']}} &nbsp; &nbsp; &nbsp;
                        <b>[배수]</b> {{$lec['MultipleApply'] == '1' ? '무제한' : $lec['MultipleApply'].'배수' }} &nbsp; &nbsp; &nbsp;
                        <b>[진도율]</b> {{$lec['StudyRate']}}%<br>
                    @endif
                </td>
            </tr>
            <tr>
                <th class="w-tit bg-light-white strong">일시중지 설정</th>
                <td class="w-data tx-left pl15">
                    <form name="pauseForm" id="pauseForm">
                        {!! csrf_field() !!}
                        {!! method_field('POST') !!}
                        <input type="hidden" name="lphidx" id="lphidx" value="" />
                        <input type="hidden" name="memidx" value="{{$member['MemIdx']}}" />
                        <input type="hidden" name="orderidx" value="{{$lec['OrderIdx']}}" />
                        <input type="hidden" name="prodcode" value="{{$lec['ProdCode']}}" />
                        <input type="hidden" name="prodcodesub" value="{{empty($lec['ProdCodeSub']) == true ? '' : $lec['ProdCodeSub'] }}" />
                        <input type="hidden" name="orderprodidx" value="{{$lec['OrderProdIdx']}}" />
                        <input type="hidden" name="prodtype" value="@if($lec['LearnPatternCcd'] == '615003' || $lec['LearnPatternCcd'] == '615004'){{'P'}}@else{{'S'}}@endif" />
                        @if(strtotime($lec['LecStartDate']) > strtotime(date("Y-m-d", time())))
                            <b style="color:red">수강을 시작하지 않은 강의는 일시 중지가 불가능합니다.</b>
                        @elseif(strtotime($lec['lastPauseEndDate']) >= strtotime(date("Y-m-d", time())))
                            <b style="color:red">일시중지 중에는 일시중지가 불가능합니다.</br>이전 일시중지내역을 삭제후 다시 설정해야합니다.</b>
                        @else

                            <div class="col-md-11 form-inline">
                                <div class="input-group mr-10">
                                    <div class="input-group-addon no-border no-bgcolor"></div>
                                    <div class="input-group-addon no-border-right">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" id="startdate" name="startdate" value="">
                                    <div class="input-group-addon no-border no-bgcolor">~</div>
                                    <div class="input-group-addon no-border-right">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" id="enddate" name="enddate">
                                </div>
                                <button type="button" class="btn btn-primary btn-search" onclick="fnSetPause();">일시정지적용</button>
                            </div>
                        @endif
                    </form>
                </td>
            </tr>
        </table>

        ● 변경이력
        <table class="table table-striped table-bordered">
            <colgroup>
                <col width="5%">
                <col width="25%">
                <col width="15%">
                <col width="15%">
                <col width="15%">
                <col width="15%">
                <col width="10%">
            </colgroup>
            <thead>
            <tr>
                <th>회차</th>
                <th>일지중지날짜</th>
                <th>등록일</th>
                <th>등록자(IP)</th>
                <th>취소일</th>
                <th>취소자(IP)</th>
                <th>취소</th>
            </tr>
            </thead>
            <tbody>
            @php $i = $lec['PauseCount']+1; @endphp
            @forelse( $log as $key => $row)
                @php if($row['IsDel'] == 'N'){ $i = $i-1;} @endphp
                <tr>
                    <td class="w-num">{{$row['IsDel'] == 'Y' ? '취소' : $i.'차'}}</td>
                    <td class="w-day">{{$row['PauseStartDate']}} ~ {{$row['PauseEndDate']}} ({{$row['PauseDays']}}일)</td>
                    <td class="w-modify-day">{{$row['PauseRegDate']}}</td>
                    <td class="w-user">{{$row['PauseAdminName'] == '' ? '사용자' : '관리자('.$row['PauseAdminName'].')' }}
                        ({{$row['PauseRegIp']}})</td>
                    @if($row['IsDel'] == 'Y')
                        <td class="w-modify-day">{{$row['DelDate']}}</td>
                        <td class="w-user">{{$row['DelAdminName'] == '' ? '사용자' : '관리자('.$row['DelAdminName'].')' }}
                            ({{$row['DelIp']}})</td>
                        <td></td>
                    @else
                        <td class="w-modify-day"></td>
                        <td class="w-user"></td>
                        <td><button type="button" class="btn btn-primary btn-search" onclick="fnCancel({{$row['LphIdx']}});">취소</button></td>
                    @endif

                </tr>
            @empty
                <tr>
                    <td colspan="6">일시정지 이력이 없습니다.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#startdate').datetimepicker({
                locale : 'ko',
                format: 'YYYY-MM-DD',
                ignoreReadonly: true,
                allowInputToggle: true
            });

            $('#enddate').datetimepicker({
                locale : 'ko',
                format: 'YYYY-MM-DD',
                ignoreReadonly: true,
                allowInputToggle: true
            });

            $('#enddate').on('dp.change', function(){
                var $cdate = $(this).val();

/*                if($cdate < '{{ date("Y-m-d", time()) }}'){
                    $(this).val('');
                    $('#chgdate').html('{{ date("Y-m-d", time()) }} ~ {{$lec['RealLecEndDate']}}');
                    alert("일시중지 종료일은 오늘 이후 날짜만 가능합니다.");
                }

                if($cdate > '{{ date("Y-m-d", strtotime(date("Y-m-d", time()).'+'.($lec['PauseRemain']-1).'day')) }}'){
                    $(this).val('');
                    $('#chgdate').html('{{ date("Y-m-d", time()) }} ~ {{$lec['RealLecEndDate']}}');
                    alert("일지중지는 남은 기간 안에서만 가능합니다.");
                }

                if($cdate > '{{ $lec['RealLecEndDate'] }}'){
                    $(this).val('');
                    $('#chgdate').html('{{ date("Y-m-d", time()) }} ~ {{$lec['RealLecEndDate']}}');
                    alert("일지중지는 수강 종료일을 초과할수 없습니다.");
                } */

                $('#chgdate').html(moment($('#enddate').val()).add(1, 'days').format('YYYY-MM-DD')
                    +' ~ '+
                    moment($('#enddate').val()).add('{{$lec['remainDays']}}', 'days').format('YYYY-MM-DD'));
            });
        });

        function fnSetPause()
        {
            if($("#startdate").val() == ""){
                alert("일시중지 종료일을 선택해주십시요.");
                return;
            }

            if($("#enddate").val() == ""){
                alert("일시중지 종료일을 선택해주십시요.");
                return;
            }

            if(window.confirm($('#startdate').val() +' 부터 ' + $('#enddate').val() + '까지 일시중지 하시겠습니까?') == false){
                return;
            }

            url = "{{ site_url("/member/manage/setPause/") }}";
            data = $('#pauseForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    alert($('#startdate').val() +' 부터 ' + $('#enddate').val() + '까지 일시중지 되었습니다.');
                    location.reload();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, true, 'POST', 'html');
        }

        function fnCancel(lphidx)
        {
            $('#lphidx').val(lphidx);
            url = "{{ site_url("/member/manage/cancelPause/") }}";
            data = $('#pauseForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    alert('일시중지가 취소되었습니다.');
                    location.reload();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, true, 'POST', 'html');
        }
    </script>
@stop