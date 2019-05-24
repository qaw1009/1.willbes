@extends('lcms.layouts.master_popup')

@section('popup_title')
    <b>수강기간 연장</b>
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
        <form name="extenForm" id="extenForm">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="memidx" value="{{$member['MemIdx']}}" />
            <input type="hidden" name="orderidx" value="{{$lec['OrderIdx']}}" />
            <input type="hidden" name="prodcode" value="{{$lec['ProdCode']}}" />
            <input type="hidden" name="prodcodesub" value="{{empty($lec['ProdCodeSub']) == true ? '' : $lec['ProdCodeSub'] }}" />
            <input type="hidden" name="orderprodidx" value="{{$lec['OrderProdIdx']}}" />
            <input type="hidden" name="prodtype" value="@if($lec['LearnPatternCcd'] == '615003' || $lec['LearnPatternCcd'] == '615004'){{'P'}}@else{{'S'}}@endif" />
            <input type="hidden" name="extentype" value="D" />
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
                    <th class="w-tit bg-light-white strong">기간연장</th>
                    <td class="w-data tx-left pl15">
                        <div class="col-md-11 form-inline">
                            <div class="input-group mr-5">
                                <input type="text" class="form-control" id="extenday" name="extenday" maxlength="4">
                                <div class="input-group-addon no-border no-bgcolor">일</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="w-tit bg-light-white strong">사유</th>
                    <td class="w-data tx-left pl15">
                        <div class="col-md-11 form-inline">
                            <div class="input-group mr-10">
                                <input type="text" class="form-control" id="extenmemo" name="extenmemo">
                            </div>
                            <button type="button" class="btn btn-primary btn-search" onclick="fnExtend();">강의연장</button>
                        </div>

                    </td>
                </tr>
            </table>
        </form>
        ● 연장이력
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>회차</th>
                <th>구분</th>
                <th>연장기간</th>
                <th>사유</th>
                <th>등록일</th>
                <th>등록자</th>
            </tr>
            </thead>
            <tbody>
            @php $i = count($log); @endphp
            @forelse( $log as $key => $row)
                <tr>
                    <td class="w-num">{{$i.'차'}}</td>
                    <td class="w-day">{{$row['ExtenType'] == 'D' ? '기간연장' : ''}}</td>
                    <td class="w-modify-day">{{$row['ExtenDay']}}일</td>
                    <td class="w-user">{{$row['ExtenMemo'] }}</td>
                    <td class="w-modify-day">{{$row['RegDatm']}}</td>
                    <td class="w-modify-day">{{$row['adminName']}} ({{$row['RegIp']}})</td>
                </tr>
                @php $i = $i - 1; @endphp
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

        });

        function fnExtend()
        {
            if($("#extenday").val() == ""){
                alert("연장할 기간을 입력하십시요.");
                return;
            }

            if($.isNumeric($("#extenday").val()) == false){
                alert("연장일은 숫자만 가능합니다.");
                return;
            }

            if($("#extenday").val() > 365){
                alert("연장은 365일까지만 가능합니다.");
                return;
            }

            if($("#extenmemo").val() == ""){
                alert("연장사유를 입력하십시요.");
                return;
            }

            if(window.confirm($('#extenday').val() +' 일을 연장 하시겠습니까?') == false){
                return;
            }

            url = "{{ site_url("/member/manage/setExtend/") }}";
            data = $('#extenForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    alert('연장처리가 완료되었습니다.');
                    location.reload();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, true, 'POST', 'html');
        }
    </script>
@stop