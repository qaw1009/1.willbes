@extends('lcms.layouts.master')

@section('content')
    <h5>- 합격예측서비스 과목별 시험지 및 정답 정보를 관리합니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>과목별 문제등록</h2>
        </div>

        <div class="x_content">
            <form class="form-horizontal" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                {!! html_site_select($search_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                <input type="hidden" name="idx" value="{{ ($method == 'PUT') ? $data['PpIdx'] : '' }}">
                <input type="hidden" id="sType" name="Type" @if($method == 'PUT') value="{{ $data['Type'] }}" @endif/>
                <input type="hidden" name="isDeny" value="{{ $isDeny }}">
                <select id="temp_subject_code" style="display: none;">
                    @if($method == 'PUT')
                        <option value="{{$data['PredictIdx'].'_'.$data['TakeMockPart']}}"></option>
                    @endif
                </select>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="PredictIdx">합격예측<span class="required">*</span></label>
                    <div class="form-inline col-md-4 item">
                        <select class="form-control" id="PredictIdx" name="PredictIdx" required="required" title="합격예측">
                            <option value="">합격예측서비스명</option>
                            @foreach($productList as $key => $row)
                                <option class="{{$row['SiteCode']}}" data-question-type-cnt="{{$row['QuestionTypeCnt']}}" value="{{ $row['PredictIdx'] }}" @if($method == 'PUT' && $data['PredictIdx'] == $row['PredictIdx']) selected @endif>{{ $row['ProdName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="control-label col-md-1-1" for="">과목문제지코드<span class="required">*</span></label>
                    <div class="form-control-static col-md-4">
                        {{ $data['PpIdx'] }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="take_mock_part">합격예측에 귀속된 직렬<span class="required">*</span></label>
                    <div class="form-inline col-md-4 item">
                        <select class="form-control" name="take_mock_part" required="required" title="직렬">
                            <option value="">직렬선택</option>
                            @foreach($arr_take_mock_part_list as $row)
                                <option class="{{$row['PredictIdx']}}" value="{{$row['TakeMockPart']}}" @if($row['TakeMockPart'] == $data['TakeMockPart']) selected @endif>{{$row['CcdName']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="control-label col-md-1-1" for="SubjectCode">합격예측에 귀속된 과목<span class="required">*</span></label>
                    <div class="form-inline col-md-4 item">
                        <select class="form-control" id="SubjectCode" name="SubjectCode" required="required" title="과목">
                            <option value="">과목선택</option>
                            @foreach($arr_subject_list as $key => $row)
                                <option class="{{$row['PredictIdx'].'_'.$row['TakeMockPart']}}" data-subject-type="{{$row['Type']}}" value="{{$row['SubjectCode']}}" @if($row['SubjectCode'] == $data['SubjectCode']) selected @endif>{{$row['CcdName']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="PaperName">과목문제지명<span class="required">*</span></label>
                    <div class="form-inline col-md-4 item">
                        <input type="text" class="form-control" name="PaperName" value="{{ $data['PaperName'] }}" required="required" style="width: 70%" title="과목문제지명">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="AnswerNum">문제등록옵션<span class="required">*</span></label>
                    <div class="form-inline col-md-4 item">
                        <select class="form-control mr-5" name="AnswerNum" {{($method == 'PUT' && $isDeny) ? 'disabled' : 'required=required'}} title="문제등록옵션">
                            <option value="">보기갯수</option>
                            @foreach(range(1, 5) as $i)
                                <option value="{{$i}}" @if($i == $data['AnswerNum']) selected @endif>{{$i}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="control-label col-md-1-1" for="TotalScore">총점<span class="required">*</span></label>
                    <div class="form-inline col-md-4 item">
                        <input type="text" class="form-control" style="width:60px" name="TotalScore" value="{{ $data['TotalScore'] }}" {{($method == 'PUT' && $isDeny) ? 'disabled' : 'required=required'}} title="총점"> 점
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="RegistAvgPoint">입력-평균<span class="required">*</span></label>
                    <div class="form-inline col-md-4 item">
                        <input type="text" class="form-control" style="width:60px" name="RegistAvgPoint" value="{{ $data['RegistAvgPoint'] }}" required="required" title="입력-평균"> 점
                    </div>
                    <label class="control-label col-md-1-1" for="RegistStandard">입력-표준편차<span class="required">*</span></label>
                    <div class="form-inline col-md-4 item">
                        <input type="text" class="form-control" style="width:60px" name="RegistStandard" value="{{ $data['RegistStandard'] }}" required="required" title="입력-표준편차">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="PredictIdx">문제통파일</label>
                    <div class="form-inline col-md-4">
                        <input type="file" name="QuestionFile">
                        @if($method == 'PUT' && !empty($data['QuestionFile']))
                            <div class="file-wrap" style="cursor:pointer">
                                <a href="{{ $filepath.$data['RealQuestionFile'] }}" target="_blank" class="blue underline-link">{{ $data['QuestionFile'] }}</a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="IsUse" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="IsUse" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="question_box">문항등록</label>
                    <div class="col-md-4 form-inline">
                        @if($method == 'PUT')
                            <div class="question-box"></div>
                        @else
                            <span class="form-control-static">기본정보 등록 후 문항등록 가능합니다.</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자</label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['wAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-1-1">등록일</label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegDate'] }}@endif</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['wAdminName2'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdDate'] }}</p>
                    </div>
                </div>
                <div class="text-center mt-20">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="goList">목록</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var method = '{{ $method }}';
        var addField;
        var chapterExist = [];
        var chapterDel = [];

        $(document).ready(function() {
            var arr_question_type_count = {!! json_encode($arr_question_type_count) !!};

            // 합격예측서비스명 자동 변경
            $regi_form.find('select[name="PredictIdx"]').chained("#search_site_code");
            // 직렬
            $regi_form.find('select[name="take_mock_part"]').chained("#PredictIdx");
            // 과목
            $regi_form.find('select[name="SubjectCode"]').chained("#temp_subject_code");

            $regi_form.find('select[name="take_mock_part"]').on('change', function () {
                var p_idx = $regi_form.find('select[name="PredictIdx"]').val();
                $("#temp_subject_code option").remove();
                $("#temp_subject_code").append('<option value="'+p_idx+'_'+this.value+'">과목코드</option>');
                $("#temp_subject_code option").trigger('change');
            });

            $regi_form.find('select[name="SubjectCode"]').on('change', function () {
                var subject_type = $(this).find("option:selected").data("subject-type");
                $("#sType").val(subject_type);
            });

            //문제유형 수만큼 버튼생성
            $regi_form.on('change', 'select[name="PredictIdx"]', function() {
                $(".question-box").html('');
                var i, qCnt;
                var font_style;
                for(i=1; i<=$(this).find("option:selected").data("question-type-cnt"); i++) {
                    qCnt = arr_question_type_count['QuestionType'+i];
                    font_style = '';
                    if (typeof arr_question_type_count['QuestionType'+i] === 'undefined') {
                        font_style = 'red bold';
                        qCnt = 0;
                        alert('합격예측의 문제유형수가 다릅니다. 확인해주세요.');
                    }

                    $(".question-box").append('<button type="button" class="btn btn-sm btn-success btn-question-modal '+font_style+'" data-question-type="'+i+'">문제유형'+i+' ('+qCnt+')</button>');
                }
            });
            $("#PredictIdx option").trigger('change');

            // 목록 이동
            $('#goList').on('click', function() {
                location.replace('{{ site_url('/predict/question/') }}' + getQueryString());
            });

            // 기본정보 등록,수정
            $regi_form.submit(function() {
                var _url = '{{ ($method == 'PUT') ? site_url('/predict/question/update') : site_url('/predict/question/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/predict/question/create/') }}' + ret.ret_data.dt.idx + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            //문제유형1,문제유형2 호출
            $regi_form.on('click', '.btn-question-modal', function() {
                var question_type_cnt = $regi_form.find('select[name="PredictIdx"] option:selected').data("question-type-cnt");

                var params = '?pp_idx=' + '{{ $data['PpIdx'] }}';
                params += '&question_type=' + $(this).data("question-type");
                params += '&total_score=' + '{{ $data['TotalScore'] }}';
                params += '&question_type_cnt=' + question_type_cnt;
                $('.btn-question-modal').setLayer({
                    'url': '{{ site_url('/predict/question/questionListModal') }}' + params,
                    'width': 1400
                });
            });
        });
    </script>
@stop