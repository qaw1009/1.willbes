@extends('lcms.layouts.master_popup')

@section('popup_title')
    <b>전환처리</b>
@endsection

@section('add_buttons')
    &nbsp;
@endsection


@section('popup_content')
    <div class="x_content">
        <table class="table table-striped table-bordered">
            @if($lec['LearnPatternCcd'] == '615002' || $lec['LearnPatternCcd'] == '615003')
                <tr>
                    <td width="100">패키지명</td>
                    <td>
                        <b>{{$lec['ProdName']}}</b>
                    </td>
                </tr>
            @elseif($lec['LearnPatternCcd'] == '615007')
                <tr>
                    <td width="100">종합반정보</td>
                    <td>
                        <b>{{$lec['ProdName']}}</b>
                    </td>
                </tr>
            @endif

            @if(in_array($lec['LearnPatternCcd'], ['615001','615002','615003']) == true)
                <tr>
                    <td width="100">강좌정보</td>
                    <td>
                        <b style="color:red">[{{$lec['PayRouteCcdName']}} - {{$lec['SalePatternCcdName']}}]</b>
                        {{$lec['CateName']}}
                        | {{$lec['SchoolYear']}}학년도
                        @if($lec['LecTypeCcd'] == '607003')
                            | <span class="red no-line-height">직장인/재학생반</span>
                        @endif
                        | {{$lec['CourseName']}} | {{$lec['SubjectName']}} | {{$lec['wProfName']}} |
                        <b>{{$lec['subProdName']}}</b><br/>
                        <b>[수강기간]</b> {{$lec['LecStartDate']}} ~ {{$lec['RealLecEndDate']}} ({{$lec['RealLecExpireDay']}}일)</br>
                        <b>[진행상태]</b> {{$lec['wLectureProgressCcdName']}}
                        <b>[배수]</b> {{$lec['MultipleApply'] == '1' ? '무제한' : $lec['MultipleApply'].'배수' }}
                        <b>[진도율]</b> {{$lec['StudyRate']}}%
                        <b>[수강상태]</b>
                        @if($lec['LecStartDate'] > date('Y-m-d'))
                            수강대기
                        @elseif($lec['RealLecEndDate'] < date('Y-m-d'))
                            수강종료
                        @elseif($lec['lastPauseStartDate'] <= date('Y-m-d') && $lec['lastPauseEndDate'] >= date('Y-m-d'))
                            일시중지중
                        @else
                            수강중
                        @endif
                    </td>
                </tr>
            @elseif(in_array($lec['LearnPatternCcd'], ['615006','615007']) == true)
                <tr>
                    <td width="100">강좌정보</td>
                    <td>
                        {{$lec['PayRouteCcdName']}} |
                        {{$lec['CateName']}} |
                        {{$lec['StudyPatternCcdName']}} |
                        {{$lec['StudyApplyCcdName']}} |
                        {{$lec['SchoolStartYear']}}년 {{$lec['SchoolStartMonth']}}월 |
                        {{$lec['CourseName']}}  |
                        {{$lec['SubjectName']}} |
                        {{$lec['wProfName']}} |
                        <b>{{$lec['subProdName']}}</b><br>
                        <b>[수강상태]</b> @if($lec['LecStartDate'] > date('Y-m-d'))
                            수강대기
                        @elseif($lec['RealLecEndDate'] < date('Y-m-d'))
                            수강종료
                        @else
                            수강중
                        @endif
                    </td>
                </tr>
            @endif
            <tr>
                <td width="100">회원정보</td>
                <td>
                    {{$member['MemName']}}({{$member['MemId']}}) | {{$member['Phone']}}
                </td>
            </tr>
        </table>
        @if($lec['PayStatusCcd'] == '676001' || $lec['PayStatusCcd'] == '676007')
        <form name="chg_start_form" id="trans_form">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="memidx" value="{{$member['MemIdx']}}" />
            <input type="hidden" name="orderidx" value="{{$lec['OrderIdx']}}" />
            <input type="hidden" name="orderprodidx" value="{{$lec['OrderProdIdx']}}" />
            <input type="hidden" name="prodcode" value="{{$lec['ProdCode']}}" />
            <input type="hidden" name="prodcodesub" value="{{$lec['ProdCodeSub']}}" />
            <input type="hidden" name="orderprodidx" value="{{$lec['OrderProdIdx']}}" />
            <table class="table table-striped table-bordered">
                <tr>
                    <td width="100">전환처리</td>
                    <td class="w-data tx-left pl15">
                        <div class="col-md-11 form-inline">
                            <div class="input-group mr-10">
                                <div class="radio">
                                    <input type="radio" name="isdisp" value="N" required="required" class="flat" checked="checked">
                                    {{ in_array($lec['LearnPatternCcd'], ['615001','615002','615003','615004','615005']) == true ? '직강전환' : '인강전환' }}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="isdisp" value="Y" required="required" class="flat" > 해제
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    (현재상태 :
                                    @if($lec['TransformCnt'] > 0)
                                        {{$lec['IsDisp'] == 'N' ? (in_array($lec['LearnPatternCcd'], ['615001','615002','615003','615004','615005']) == true ? '직강전환' : '인강전환') : '해제'}}
                                    @else
                                        미설정
                                    @endif
                                    )
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="100">처리사유</td>
                    <td class="w-data tx-left pl15">
                        <div class="col-md-11 form-inline">
                            <div class="input-group mr-10">
                                <input type="text" class="form-control" id="memo" name="memo">
                            </div>
                            <button type="button" class="btn btn-primary btn-search" onclick="fnTransform();">전환처리</button>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
        @endif
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
                <th>No.</th>
                <th>전환상태</th>
                <th>변경일자</th>
                <th>변경자</th>
                <th>처리사유</th>
            </tr>
            </thead>
            <tbody>
            @forelse( $log as $key => $row)
                <tr>
                    <td class="w-num">{{count($log) - $key}}차</td>
                    <td class="w-day">{{$row['IsDisp'] == 'Y' ? '해제' : (in_array($lec['LearnPatternCcd'], ['615001','615002','615003','615004','615005']) == true ? '직강전환' : '인강전환') }}</td>
                    <td class="w-modify-day">{{$row['RegDatm']}}</td>
                    <td class="w-user">{{$row['adminName'] == '' ? '사용자' : '관리자('.$row['adminName'].')' }}</td>
                    <td>{{$row['Memo']}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">전환처리 이력이 없습니다.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

        });

        function fnTransform()
        {
            if($('#memo').val().trim() == ''){
                alert('처리사유를 입력해주십시요.');
                return;
            }

            url = "{{ site_url("/member/manage/setTransForm/") }}";
            data = $('#trans_form').serialize();

            sendAjax(url,
                data,
                function(d){
                    alert("처리되었습니다.");
                    location.reload();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, true, 'POST', 'html');
        }
    </script>
@stop