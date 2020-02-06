@extends('lcms.layouts.master')

@section('content')
    <div id="content">
        <h5 class="mt-20">
            - 응시자 기준으로 개별 모의고사성적을 확인하는 메뉴입니다.</br>
            - 채점하기 : 본인 점수가 나오지 않을 경우 시행
            - 조점정수를 반영해야 변경된 답안이 적용됩니다.
        </h5>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <div class="pull-left"><h2>모의고사정보</h2></div>
                    <div class="pull-right text-right form-inline mb-5">
                        <button class="btn btn-sm btn-primary" id="btn_score" data-act-type="{{ ((empty($privateExamInfo['tempCnt']) === true) ? 'N' : 'Y') }}">채점하기</button>
                        <button class="btn btn-sm btn-primary" id="btn_score_make">조정점수반영</button>
                        <button class="btn btn-sm btn-primary act-move" id="btn_detail" data-idx="{{ $arr_base['prod_code'] }}" data-mem="{{ $arr_base['mr_idx'] }}">상세성적확인</button>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <table class="table table-bordered modal-table">
                        <tr class="bg-white-gray">
                            <th>회원명</th>
                            <th>연락처</th>
                            <th>응시번호</th>
                            <th>응시형태</th>
                            <th>연도</th>
                            <th>회차</th>
                            <th>모의고사명</th>
                            <th>카테고리</th>
                            <th>직렬</th>
                            <th>과목</th>
                            <th>응시지역</th>
                            <th>응시일자</th>
                        </tr>
                        <tr>
                            <td>{{$privateExamInfo['MemName']}}</td>
                            <td>{{$privateExamInfo['Phone']}}</td>
                            <td>{{$privateExamInfo['TakeNumber']}}</td>
                            <td>{{$privateExamInfo['TakeFormName']}}</td>
                            <td>{{$privateExamInfo['MockYear']}}</td>
                            <td>{{$privateExamInfo['MockRotationNo']}}</td>
                            <td>[{{$privateExamInfo['ProdCode']}}] {{$privateExamInfo['ProdName']}}</td>
                            <td>{{$privateExamInfo['CateName']}}</td>
                            <td>{{$privateExamInfo['TakeMockPartName']}}</td>
                            <td>{{$privateExamInfo['SubjectNames']}}</td>
                            <td>{{$privateExamInfo['TakeAreaName']}}</td>
                            <td>{{$privateExamInfo['ExamRegDatm']}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <div class="pull-left"><h2>과목별득점분석</h2></div>
                </div>
                <table class="table table-bordered modal-table">
                    <thead>
                    <tr>
                        <th class="valign-middle" rowspan="2" style="width: 15%">과목</th>
                        @foreach($arr_subject_e as $row)
                            <th class="valign-middle" rowspan="2">{{ $row['subject_name'] }}</th>
                        @endforeach
                        @foreach($arr_subject_s as $row)
                            <th class="valign-middle" colspan="2">{{ $row['subject_name'] }}</th>
                        @endforeach
                        <th class="valign-middle" rowspan="2">평균</th>
                    </tr>
                    @if(empty($arr_subject_s) === false)
                        <tr>
                            @foreach($arr_subject_s as $row)
                                <th>원점수</th>
                                <th>조정점수</th>
                            @endforeach
                        </tr>
                    @endif
                    </thead>

                    <tbody>
                    @foreach($data_e as $data_key => $data_row)
                        <tr>
                            <td>{{ $data_key }}{!! ($data_key == '과목석차' ? '<br>(내석차/총석차[총인원])' : '') !!}</td>
                            @foreach($data_row as $mp_idx => $val)
                                <td class="valign-middle">{{ $val }}</td>
                            @endforeach

                            @if(empty($data_s) === false)
                                @foreach($data_s as $data_key_s => $data_row_s)
                                    @if($data_key == $data_key_s)
                                        @if ($data_key == '과목석차' || $data_key == '백분위')
                                            @foreach($data_row_s as $mp_idx => $val)
                                                <td class="valign-middle" colspan="2">{{ $val['adjust'] }}</td>
                                            @endforeach
                                        @else
                                            @foreach($data_row_s as $mp_idx => $val)
                                                <td>{{ $val['org'] }}</td>
                                                <td>{{ $val['adjust'] }}</td>
                                            @endforeach
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                            <td class="valign-middle">{{ ((empty($arr_total_avg[$data_key]) === false) ? $arr_total_avg[$data_key] : '') }}</td>
                        </tr>
                    @endforeach
                    @foreach($data_default_e as $data_key => $data_row)
                        <tr>
                            <td>{{ $data_key }}</td>
                            @foreach($data_row as $mp_idx => $val)
                                <td>{{ $val }}</td>
                            @endforeach

                            @if(empty($data_default_s) === false)
                                @foreach($data_default_s as $data_key_s => $data_row_s)
                                    @if($data_key == $data_key_s)
                                        @foreach($data_row_s as $mp_idx => $val)
                                            <td colspan="2">{{ $val }}</td>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                            <td>{{ ((empty($arr_total_avg[$data_key]) === false) ? $arr_total_avg[$data_key] : '') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        <div class="pull-right text-right form-inline mb-5">
            <button class="btn btn-sm btn-success" id="btn_list">목록</button>
        </div>
    </div>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" id="prod_code" name="prod_code" value="{{ $arr_base['prod_code'] }}">
        <input type="hidden" id="mr_idx" name="mr_idx" value="{{ $arr_base['mr_idx'] }}">
        <input type="hidden" id="mem_idx" name="mem_idx" value="{{ $privateExamInfo['MemIdx'] }}">
    </form>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            $('#btn_list').on('click', function() {
                location.replace('{{ site_url('/mocktestNew/statistics/memberPrivate/') }}' + getQueryString());
            });

            //정답제출
            $('#btn_score').on('click', function() {
                var _url = '{{ site_url('/mocktestNew/statistics/grade/answerSaveAjax') }}';

                if($(this).data('act-type') == 'N') {
                    alert('임시저장 데이터가 없습니다.');
                    return;
                }

                if(!confirm('채점하시겟습니까?')) return;
                ajaxLoadingSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert('채점이 완료 되었습니다. 조정점수반영을 해야 정상 산출됩니다.');
                        location.reload();
                    }
                }, showValidateError, null, 'alert', $regi_form);
            });

            //조정점수반영
            $('#btn_score_make').on('click', function() {
                var _url = '{{ site_url('/mocktestNew/statistics/grade/scoreMakeAjax') }}';

                if(!confirm('조정점수를 반영 하시겠습니까?')) return;
                ajaxLoadingSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.reload();
                    }
                }, showValidateError, null, 'alert', $regi_form);
            });
        });
    </script>
@stop