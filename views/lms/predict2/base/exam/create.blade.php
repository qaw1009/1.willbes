@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 구성을 위해 과목별 문제, 정답, 해설을 등록하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title mb-20">
            <h2>과목별 문제등록</h2>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{$data['PpIdx']}}">
                <input type="hidden" name="isDeny" value="{{ ($method == 'PUT') ? $isDeny : '' }}">

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="siteCode">운영사이트<span class="required">*</span></label>
                    <div class="col-md-10 form-inline item">
                        {!! html_site_select($def_site_code, 'site_code', 'siteCode', '', '운영 사이트', 'required', ($method == 'PUT') ? 'disabled' : '', false) !!}
                        <span class="ml-20">저장 후 운영사이트, 모의고사카테고리 정보는 수정이 불가능합니다.</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">모의고사카테고리<span class="required">*</span></label>
                    <div class="col-md-10 form-inline">
                        <button type="button" class="btn btn-sm btn-primary act-searchCate" >카테고리검색</button>
                        <div id="selected_category" class="row mt-10">
                            @foreach($cate_data as $row)
                                <div class="col-xs-5 pb-5">
                                    {{ preg_replace('/^(.*?\s>\s)/', '',$row['CateRouteName']) }}
                                    {!! (($row['BaseIsUse'] == 'N') ? '<span class="ml-5 red">(미사용)</span>' : '') !!}
                                    <a href="#none" data-cate-code="{{$row['PrsIdx']}}" class="selected-category-delete"><i class="fa fa-times red"></i></a>
                                    <input type="hidden" name="moLink[]" value="{{$row['PrsIdx']}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">문제영역<span class="required">*</span></label>
                    <div class="col-md-10 form-inline">
                        <button type="button" class="btn btn-sm btn-primary act-searchArea" >문제영역검색</button>
                        <span id="selected_area" class="mt-10">
                            @if ($method == 'PUT')
                                {{$data['QuestionArea']}}
                                {!! (($data['AreaIsUse'] == 'N') ? '<span class="ml-5 red">(미사용)</span>' : '') !!}
                                <a href="#none" data-area-code="{{$data['PaIdx']}}" class="selected-area-delete"><i class="fa fa-times red"></i></a>
                                <input type="hidden" name="area_code" value="{{$data['PaIdx']}}">
                            @endif
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="ProfIdx">교수명<span class="required">*</span></label>
                    <div class="col-md-10 form-inline">
                        <button type="button" class="btn btn-sm btn-primary act-searchProfessor">교수검색</button>
                        <span id="selected_professor" class="pl-10">
                        @if($method == 'PUT')
                            @foreach($professor as $it)
                                <span>{!!$it['txt']!!} <input type="hidden" name="ProfIdx" value="{{$it['code']}}"></span>
                            @endforeach
                        @else
                            교수명 | 교수코드 | 아이디 | 사용여부
                        @endif
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="PapaerName">과목문제지명<span class="required">*</span></label>
                    <div class="col-md-4 item">
                        <input type="text" class="form-control" id="PapaerName" name="PapaerName" value="{{$data['PapaerName']}}" title="과목문제지명" required="required">
                    </div>
                    <label class="control-label col-md-1-1" for="">과목문제지코드<span class="required">*</span></label>
                    <div class="col-md-4 form-inline">
                        {{$data['PpIdx']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="Year">연도/회차<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <select class="form-control mr-5" id="Year" name="Year" title="연도" required="required">
                            <option value="">연도</option>
                            @for($i=(date('Y')+1); $i>=2005; $i--)
                                <option value="{{$i}}" @if($method == 'PUT' && $i == $data['Year']) selected @endif>{{$i}}</option>
                            @endfor
                        </select>
                        <select class="form-control mr-5" name="RotationNo" title="회차" required="required">
                            <option value="">회차</option>
                            @foreach(range(1, 20) as $i)
                                <option value="{{$i}}" @if($method == 'PUT' && $i == $data['RotationNo']) selected @endif>{{$i}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="control-label col-md-1-1" for="AnswerNum">문제등록옵션<span class="required">*</span></label>
                    <div class="col-md-4 form-inline">
                        <select class="form-control mr-5 hide" id="QuestionOption" name="QuestionOption" {{($method == 'PUT' && $isDeny) ? 'disabled' : ''}} title="문제등록옵션" required="required">
                            <option value="">보기형식</option>
                            <option value="S" @if($method == 'PUT' && $data['QuestionOption'] == 'S') selected @endif>객관식(단일정답)</option>
                            <option value="M" @if($method == 'PUT' && $data['QuestionOption'] == 'M') selected @endif>객관식(복수정답)</option>
                            <option value="J" @if($method == 'PUT' && $data['QuestionOption'] == 'J') selected @endif>주관식</option>
                        </select>
                        <select class="form-control mr-5" name="AnswerNum" {{($method == 'PUT' && $isDeny) ? 'disabled' : ''}} title="보기갯수" required="required">
                            <option value="">보기갯수</option>
                            @foreach(range(1, 5) as $i)
                                <option value="{{$i}}" @if($method == 'PUT' && $i == $data['AnswerNum']) selected @endif>{{$i}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="TotalScore">총점<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <input type="text" class="form-control" id="TotalScore" name="TotalScore" title="총점" required="required" value="@if($method == 'PUT'){{ $data['TotalScore'] }}@endif" {{($method == 'PUT' && $isDeny) ? 'disabled' : ''}}> 점
                    </div>
                    <label class="control-label col-md-1-1" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="IsUse" class="flat" value="Y" required="required" @if($method == 'POST' || ($method == 'PUT' && $data['IsUse'] == 'Y')) checked="checked" @endif> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="IsUse" class="flat" value="N" @if($method == 'PUT' && $data['IsUse'] == 'N') checked="checked" @endif> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="TotalScore">평균대상여부<span class="required">*</span></label>
                    <div class="col-md-2 form-inline item">
                        <div class="radio">
                            <input type="radio" id="is_avg_y" name="IsAvg" class="flat" value="Y" required="required" @if($method == 'POST' || ($method == 'PUT' && $data['IsAvg'] == 'Y')) checked="checked" @endif> <label for="is_avg_y" class="input-label">사용</label>
                            <input type="radio" id="is_avg_n" name="IsAvg" class="flat" value="N" @if($method == 'PUT' && $data['IsAvg'] == 'N') checked="checked" @endif> <label for="is_avg_n" class="input-label">미사용</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <p class="form-control-static">• '미사용'인 경우 점수평균에서 제외됩니다.</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="FrontQuestionFile">응시화면용문제파일</label>
                    <div class="col-md-4">
                        <input type="file" class="form-control" id="FrontQuestionFile" name="FrontQuestionFile" title="응시화면용문제파일">
                        @if($method == 'PUT' && !empty($data['FrontQuestionFile']))
                            <div class="file-wrap" style="cursor:pointer">
                                <a href="{{ $data['FilePath'].$data['FrontRealQuestionFile'] }}" target="_blank" class="blue underline-link">{{ $data['FrontQuestionFile'] }}</a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="QuestionFile">다운로드용문제파일</label>
                    <div class="col-md-4">
                        <input type="file" class="form-control" id="QuestionFile" name="QuestionFile" title="문제통파일">
                        @if($method == 'PUT' && !empty($data['QuestionFile']))
                            <div class="file-wrap" style="cursor:pointer">
                                <a href="{{ $data['FilePath'].$data['RealQuestionFile'] }}" target="_blank" class="blue underline-link">{{ $data['QuestionFile'] }}</a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="ExplanFile">해설지통파일</label>
                    <div class="col-md-4">
                        <input type="file" class="form-control" id="ExplanFile" name="ExplanFile" title="해설지통파일">
                        @if($method == 'PUT' && !empty($data['ExplanFile']))
                            <div class="file-wrap" style="cursor:pointer">
                                <a href="{{ $data['FilePath'].$data['RealExplanFile'] }}" target="_blank" class="blue underline-link">{{ $data['ExplanFile'] }}</a>
                                {{--<span class="act-fileDel" data-file-idx="{{$data['PpIdx']}}" data-file-type="base" data-file-name="ExplanFile"><i class="fa fa-times red"></i></span>--}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="ExplanFile">문항등록</label>
                    <div class="col-md-4 form-inline">
                        @if($method == 'PUT')
                            <button type="button" class="btn btn-sm btn-success btn-question-modal" data-question-type="1">가형 ({{$arr_question_type_count['QuestionType1']}})</button>
                            <button type="button" class="btn btn-sm btn-success btn-question-modal" data-question-type="2">나형 ({{$arr_question_type_count['QuestionType2']}})</button>
                        @else
                            <span class="form-control-static">기본정보 등록 후 문항등록 가능합니다.</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자</label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{$data['RegAdminName']}}</p>
                    </div>
                    <label class="control-label col-md-1-1">등록일</label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{$data['RegDate']}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자</label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{$data['UpdAdminName']}}</p>
                    </div>
                    <label class="control-label col-md-1-1">최종 수정일</label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{$data['UpdDate']}}</p>
                    </div>
                </div>

                <div class="form-group text-center btn-wrap">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="goList">목록</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var addField;
        var chapterExist = [];
        var chapterDel = [];

        $(document).ready(function() {
            $('body').tooltip({
                selector: '.img-tooltip',
                container: 'body',
                html: true,
                placement: 'right',
            });

            // 카테고리, 교수 검색창 오픈
            $('.act-searchCate, .act-searchArea, .act-searchProfessor').on('click', function() {
                if( !$('[name=siteCode]').val() ) { alert('운영사이트를 먼저 선택해 주세요'); return false; }

                if( $(this).hasClass('act-searchCate') ) {
                    $('.act-searchCate').setLayer({
                        /*'url' : '{{ site_url() }}' + 'predict2/base/code/moCate?reg=Y&single=Y&siteCode=' + $('[name=siteCode]').val(),*/
                        'url' : '{{ site_url() }}' + 'predict2/base/code/moCate?reg=Y&siteCode=' + $('[name=siteCode]').val(),
                        'width': 1100
                    });
                } else if($(this).hasClass('act-searchArea')) {
                    $('.act-searchArea').setLayer({
                        'url' : '{{ site_url() }}' + 'predict2/base/range/searchArea?siteCode=' + $('[name=siteCode]').val(),
                        'width': 900
                    });
                } else if($(this).hasClass('act-searchProfessor')) {
                    $('.act-searchProfessor').setLayer({
                        'url': '{{ site_url('/common/searchProfessor?siteCode=') }}' + $('[name=siteCode]').val(),
                        'width': 900
                    });
                }
            });

            // 선택 카테고리 삭제
            $('#selected_category').on('click', '.selected-category-delete', function () {
                $(this).closest('div').remove();
            });

            $('#selected_area').on('click', '.selected-area-delete', function () {
                $(this).closest('span').remove();
            });

            // 운영사이트 변경시 카테고리, 교수검색 초기화
            $('[name=siteCode]').on('change', function () {
                $('#selected_category').empty();
                $('#selected_area').empty();
                $('#selected_professor').empty();
            });

            // 목록 이동
            $('#goList').on('click', function() {
                location.replace('{{ site_url('/predict2/base/exam/') }}' + getQueryString());
            });

            // 기본정보 등록,수정
            $regi_form.submit(function() {
                var _url = '{{site_url('/predict2/base/exam/store')}}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/predict2/base/exam/create/') }}' + ret.ret_data.dt.idx + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            //가형,나형 호출
            $('.btn-question-modal').on('click', function() {
                var params = '?pp_idx=' + '{{ $data['PpIdx'] }}';
                params += '&pa_idx=' + '{{ $data['PaIdx'] }}';
                params += '&question_type=' + $(this).data("question-type");
                params += '&total_score=' + '{{ $data['TotalScore'] }}';

                $('.btn-question-modal').setLayer({
                    'url': '{{ site_url('/predict2/base/exam/questionListModal') }}' + params,
                    'width': 1400
                });
            });
        });
    </script>
@stop