@extends('lcms.layouts.master_popup')

@section('popup_title')
    <b>수강시작일 변경</b>
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
                    @endif<br>
                    @if($lec['LearnPatternCcd'] == '615003' || $lec['LearnPatternCcd'] == '615004')
                    @else
                        <b>[진행상태]</b> {{$lec['wLectureProgressCcdName']}} &nbsp; &nbsp; &nbsp;
                        <b>[배수]</b> {{$lec['MultipleApply'] == '1' ? '무제한' : $lec['MultipleApply'].'배수' }} &nbsp; &nbsp; &nbsp;
                        <b>[진도율]</b> {{$lec['StudyRate']}}%<br>
                    @endif
                </td>
            </tr>
            <tr>
                <th class="w-tit bg-light-white strong">수강 시작일 변경</th>
                <td class="w-data tx-left pl15">
                    <form name="chg_start_form" id="chg_start_form">
                        {!! csrf_field() !!}
                        {!! method_field('POST') !!}
                        <input type="hidden" name="memidx" value="{{$member['MemIdx']}}" />
                        <input type="hidden" name="orderidx" value="{{$lec['OrderIdx']}}" />
                        <input type="hidden" name="prodcode" value="{{$lec['ProdCode']}}" />
                        <input type="hidden" name="prodcodesub" value="{{empty($lec['ProdCodeSub']) == true ? '' : $lec['ProdCodeSub'] }}" />
                        <input type="hidden" name="orderprodidx" value="{{$lec['OrderProdIdx']}}" />
                        <input type="hidden" name="prodtype" value="@if($lec['LearnPatternCcd'] == '615003' || $lec['LearnPatternCcd'] == '615004'){{'P'}}@else{{'S'}}@endif" />
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
                                <input type="text" class="form-control" id="enddate" readonly>
                            </div>
                            <button type="button" class="btn btn-primary btn-search" onclick="change_date();">변경</button>
                        </div>
                    </form>

                </td>
            </tr>
        </table>

        ● 변경이력
        <table class="table table-striped table-bordered">
            <colgroup>
                <col width="10%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="10%">
                <col width="20%">
            </colgroup>
            <thead>
            <tr>
                <th>회차</th>
                <th>이전시작일</th>
                <th>수강시작일</th>
                <th>변경일자</th>
                <th>아이피</th>
                <th>변경자</th>
            </tr>
            </thead>
            <tbody>
            @forelse( $log as $key => $row)
                <tr>
                    <td class="w-num">{{$key+1}}차</td>
                    <td class="w-day">{{$row['BeforeStartDate']}} ~ {{$row['BeforeEndDate']}}</td>
                    <td class="w-day">{{$row['UpdStudyStartDate']}} ~ {{$row['UpdStudyEndDate']}}</td>
                    <td class="w-modify-day">{{$row['UpdDatm']}}</td>
                    <td >{{$row['UpdIp']}}</td>
                    <td class="w-user">{{$row['adminName'] == '' ? '사용자' : '관리자('.$row['adminName'].')' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">수강시작일 변경 이력이 없습니다.</td>
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

            $('#startdate').on('dp.change', function(){
                var $cdate = $(this).val();

                /*
                if($cdate > '{{ date("Y-m-d", strtotime(substr($lec['OrderDate'], 10).'+30day')) }}'){
                    $(this).val('');
                    $('#enddate').val('');
                    alert("수강시작일은 주문일로부터 30일 이내만 변경 가능합니다.");
                    return;
                }

                if($cdate < '{{ date("Y-m-d", time()) }}'){
                    $(this).val('');
                    $('#enddate').val('');
                    alert("시작일은 오늘 이전 날짜는 불가능합니다.");
                    return;
                } */

                $('#enddate').val(moment($(this).val()).add({{$lec['RealLecExpireDay'] -1}}, 'days').format('YYYY-MM-DD'));

            });
        });

        function change_date()
        {
            if($("#startdate").val() == ""){
                alert("시작일을 선택해주십시요.");
                return;
            }

            if(window.confirm('시작일을 '+ $("#startdate").val() +'로 설정하시겠습니까?') == false){
                return;
            }

            url = "{{ site_url("/member/manage/setStart/") }}";
            data = $('#chg_start_form').serialize();

            sendAjax(url,
                data,
                function(d){
                    alert("시작일이 "+ $("#startdate").val() +" 로 설정되었습니다.");
                    location.reload();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, true, 'POST', 'html');
        }
    </script>
@stop