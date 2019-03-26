@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 구성을 위해 과목별 문제, 정답, 해설을 등록하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title mb-20">
            <h2>과목별 문제등록</h2>
        </div>
        <div class="x_content">
            <form class="form-table" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ ($method == 'PUT') ? $data['MpIdx'] : '' }}">
                <input type="hidden" name="isDeny" value="{{ ($method == 'PUT') ? $isDeny : '' }}">

                <table class="table table-bordered modal-table">
                    <tr>
                        <th colspan="1">운영사이트 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            {!! html_site_select($siteCodeDef, 'site_code', 'siteCode', '', '운영 사이트', 'required', ($method == 'PUT') ? 'disabled' : '') !!}
                            <span class="ml-20">저장 후 운영사이트, 모의고사카테고리 정보는 수정이 불가능합니다.</span>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">모의고사카테고리 <span class="required">*</span></th>
                        <td colspan="3">
                            <button type="button" class="btn btn-sm btn-primary act-searchCate" >카테고리검색</button>
                            <span id="selected_category">
                                @if($method == 'PUT')
                                    @foreach($moCate_name as $code => $name)
                                        <span class="pb-5">
                                            {{ preg_replace('/^(.*?\s>\s)/', '',$name) }}
                                            @if(isset($moCate_isUse[$code]) && $moCate_isUse[$code] == 'N') <span class="ml-5 red">(미사용)</span> @endif
                                            <a href="#none" data-cate-code="{{ $code }}" class="selected-category-delete"><i class="fa fa-times red"></i></a>
                                            <input type="hidden" name="moLink" value="{{ $code }}">
                                        </span>
                                    @endforeach
                                @endif
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">교수명 <span class="required">*</span></th>
                        <td colspan="3">
                            <button type="button" class="btn btn-sm btn-primary act-searchProfessor">교수검색</button>
                            <span id="selected_professor" class="pl-10">
                                @if($method == 'PUT')
                                    @foreach($professor as $it)
                                        <span>
                                            {!! $it['txt'] !!}
                                            <input type="hidden" name="ProfIdx" value="{{ $it['code'] }}">
                                        </span>
                                    @endforeach
                                @else
                                    교수명 | 교수코드 | 아이디 | 사용여부
                                @endif
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th style="width:15%;">과목문제지명 <span class="required">*</span></th>
                        <td style="width:35%;">
                            <input type="text" class="form-control" name="PapaerName" value="@if($method == 'PUT'){{ $data['PapaerName'] }}@endif">
                        </td>
                        <th style="width:15%;">과목문제지코드 <span class="required">*</span></th>
                        <td style="width:35%;">@if($method == 'PUT'){{ $data['MpIdx'] }}@endif</td>
                    </tr>
                    <tr>
                        <th>연도/회차 <span class="required">*</span></th>
                        <td class="form-inline">
                            <select class="form-control mr-5" name="Year">
                                <option value="">연도</option>
                                @for($i=(date('Y')+1); $i>=2005; $i--)
                                    <option value="{{$i}}" @if($method == 'PUT' && $i == $data['Year']) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                            <select class="form-control mr-5" name="RotationNo">
                                <option value="">회차</option>
                                @foreach(range(1, 20) as $i)
                                    <option value="{{$i}}" @if($method == 'PUT' && $i == $data['RotationNo']) selected @endif>{{$i}}</option>
                                @endforeach
                            </select>
                        </td>
                        <th>문제등록옵션 <span class="required">*</span></th>
                        <td class="form-inline">
                            <select class="form-control mr-5 hide" name="QuestionOption" {{($method == 'PUT' && $isDeny) ? 'disabled' : ''}}>
                                <option value="">보기형식</option>
                                <option value="S" @if($method == 'PUT' && $data['QuestionOption'] == 'S') selected @endif>객관식(단일정답)</option>
                                <option value="M" @if($method == 'PUT' && $data['QuestionOption'] == 'M') selected @endif>객관식(복수정답)</option>
                                <option value="J" @if($method == 'PUT' && $data['QuestionOption'] == 'J') selected @endif>주관식</option>
                            </select>
                            <select class="form-control mr-5" name="AnswerNum" {{($method == 'PUT' && $isDeny) ? 'disabled' : ''}}>
                                <option value="">보기갯수</option>
                                @foreach(range(1, 5) as $i)
                                    <option value="{{$i}}" @if($method == 'PUT' && $i == $data['AnswerNum']) selected @endif>{{$i}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>총점 <span class="required">*</span></th>
                        <td class="form-inline">
                            <input type="text" class="form-control" style="width:60px" name="TotalScore" value="@if($method == 'PUT'){{ $data['TotalScore'] }}@endif"  {{($method == 'PUT' && $isDeny) ? 'disabled' : ''}}> 점
                        </td>
                        <th>사용여부 <span class="required">*</span></th>
                        <td>
                            <div>
                                <input type="radio" name="IsUse" class="flat" value="Y" required="required" @if($method == 'POST' || ($method == 'PUT' && $data['IsUse'] == 'Y')) checked="checked" @endif> <span class="flat-text mr-20">사용</span>
                                <input type="radio" name="IsUse" class="flat" value="N" @if($method == 'PUT' && $data['IsUse'] == 'N') checked="checked" @endif> <span class="flat-text">미사용</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">문제통파일</th>
                        <td colspan="3">
                            <input type="file" name="QuestionFile">
                            @if($method == 'PUT' && !empty($data['QuestionFile']))
                                <div class="file-wrap" style="cursor:pointer">
                                    <a href="{{ $data['FilePath'].$data['RealQuestionFile'] }}" target="_blank" class="blue underline-link">{{ $data['QuestionFile'] }}</a>
                                    {{--<span class="act-fileDel" data-file-idx="{{$data['MpIdx']}}" data-file-type="base" data-file-name="QuestionFile"><i class="fa fa-times red"></i></span>--}}
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">해설지통파일</th>
                        <td colspan="3">
                            <input type="file" name="ExplanFile">
                            @if($method == 'PUT' && !empty($data['ExplanFile']))
                                <div class="file-wrap" style="cursor:pointer">
                                    <a href="{{ $data['FilePath'].$data['RealExplanFile'] }}" target="_blank" class="blue underline-link">{{ $data['ExplanFile'] }}</a>
                                    {{--<span class="act-fileDel" data-file-idx="{{$data['MpIdx']}}" data-file-type="base" data-file-name="ExplanFile"><i class="fa fa-times red"></i></span>--}}
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>등록자</th>
                        <td>@if($method == 'PUT'){{ @$adminName[$data['RegAdminIdx']] }}@endif</td>
                        <th>등록일</th>
                        <td>@if($method == 'PUT'){{ $data['RegDate'] }}@endif</td>
                    </tr>
                    <tr>
                        <th>최종수정자</th>
                        <td>@if($method == 'PUT'){{ @$adminName[$data['UpdAdminIdx']] }}@endif</td>
                        <th>최종수정일</th>
                        <td>@if($method == 'PUT'){{ $data['UpdDate'] }}@endif</td>
                    </tr>
                </table>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" style="position:absolute; right:0;" type="button" id="goList">목록</button>
                </div>
            </form>
        </div>

        @if($method == 'PUT')
            <div class="x_content mt-50" style="overflow-x: auto; overflow-y: hidden;">
                <h5 class="mb-20">
                    <span class="required">*</span>
                    '문항호출' 클릭시, 이전 회차의 과목별 문제정보에서 등록할 문제를 선택할 수 있습니다. (동일 과목, 교수정보 지난 과목별 문제만 호출)
                </h5>
                <div>
                    <div class="pull-left mt-15 mb-10">[ 총 {{ count($qData) }}건 ]</div>
                    <div class="pull-right text-right form-inline mb-5">
                        <select class="form-control">
                            @foreach(range(1, 20) as $n)
                                <option value="{{$n}}" @if($loop->index == '20') selected @endif>{{$n}}개</option>
                            @endforeach
                        </select>
                        <button class="btn btn-sm btn-primary" id="act-addRow">필드추가</button>
                        <button class="btn btn-sm btn-primary" id="act-sort">정렬변경</button>
                        <button class="btn btn-sm btn-success" id="act-call">문항호출</button>
                    </div>
                </div>
                <form class="form-table form-table-sm" id="regi_sub_form" name="regi_sub_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field($method) !!}
                    <input type="hidden" name="idx" value="{{ $data['MpIdx'] }}">
                    <input type="hidden" name="TotalScore" value="{{ $data['TotalScore'] }}">
                    <input type="hidden" name="Info" value="">

                    <table class="table table-bordered modal-table">
                        <thead>
                        <tr>
                            <th class="text-center">문항<br>번호</th>
                            <th class="text-center" style="min-width:130px">문제영역</th>
                            <th class="text-center" style="min-width:120px">문제등록옵션</th>
                            <th class="text-center">문제등록(분할이미지)</th>
                            <th class="text-center">해설등록(분할이미지)</th>
                            <th class="text-center" style="min-width:60px; width:60px;">정답</th>
                            <th class="text-center" style="min-width:50px; width:50px;">배점</th>
                            <th class="text-center">난이도</th>
                            <th class="text-center">호출</th>
                            <th class="text-center">등록자</th>
                            <th class="text-center">등록일</th>
                            <th class="text-center">삭제</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- [S] 필드추가을 위한 기본HTML, 로딩후 제거 --}}
                        <tr data-chapter-idx="">
                            <td class="text-center form-inline">
                                <input type="hidden" name="regKind[]" value="">
                                <input type="text" class="form-control" style="width:45px" name="QuestionNO[]" value="">
                            </td>
                            <td class="text-center">
                                <select class="form-control" name="MalIdx[]">
                                    <option value="">선택</option>
                                    @foreach($areaList as $it)
                                        <option value="{{$it['MalIdx']}}">{{$it['AreaName']}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="text-center">
                                <select class="form-control" name="QuestionOption[]">
                                    <option value="S">객관식(단일정답)</option>
                                    <option value="M">객관식(복수정답)</option>
                                    <option value="J">주관식</option>
                                </select>
                            </td>
                            <td>
                                <input type="file" name="QuestionFile[]" style="width:180px">
                                <input type="hidden" name="callIdx[]" value="">
                                <input type="hidden" name="callQuestionFile[]" value="">
                                <input type="hidden" name="callRealQuestionFile[]" value="">
                                <div class="file-wrap" style="cursor:pointer"></div>
                            </td>
                            <td>
                                <input type="file" name="ExplanFile[]" style="width:180px">
                                <input type="hidden" name="callExplanFile[]" value="">
                                <input type="hidden" name="callRealExplanFile[]" value="">
                                <div class="file-wrap" style="cursor:pointer"></div>
                            </td>
                            <td class="text-center right-answer">
                                <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="1"> <label>1</label></div>
                                <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="2"> <label>2</label></div>
                                <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="3"> <label>3</label></div>
                                <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="4"> <label>4</label></div>
                                <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="5"> <label>5</label></div>
                                <input type="hidden" name="RightAnswer[]">
                            </td>
                            <td class="text-center"><input type="text" class="form-control" name="Scoring[]" value=""></td>
                            <td class="text-center">
                                <select class="form-control" name="Difficulty[]" style="padding:0">
                                    <option value="">선택</option>
                                    <option value="T">상</option>
                                    <option value="M">중</option>
                                    <option value="B">하</option>
                                </select>
                            </td>
                            <td class="text-center"><button type="button" class="btn btn-xs btn-success mt-5 act-call-unit">호출</button></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"><span class="addRow-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
                        </tr>
                        {{-- [E] 필드추가을 위한 기본HTML, 로딩후 제거 --}}

                        @foreach($qData as $row)
                            <tr data-chapter-idx="{{ $row['MqIdx'] }}">
                                <td class="text-center form-inline">
                                    <input type="hidden" name="regKind[]" value="">
                                    <input type="text" class="form-control" style="width:45px" name="QuestionNO[]" value="{{$row['QuestionNO']}}">
                                </td>
                                <td class="text-center">
                                    <select class="form-control" name="MalIdx[]">
                                        <option value="">선택</option>
                                        @foreach($areaList as $it)
                                            <option value="{{$it['MalIdx']}}" @if($it['MalIdx'] == $row['MalIdx']) selected @endif>{{$it['AreaName']}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="text-center">
                                    <select class="form-control" name="QuestionOption[]">
                                        <option value="S" @if($row['QuestionOption'] == 'S') selected @endif>객관식(단일정답)</option>
                                        <option value="M" @if($row['QuestionOption'] == 'M') selected @endif>객관식(복수정답)</option>
                                        <option value="J" @if($row['QuestionOption'] == 'J') selected @endif>주관식</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="file" name="QuestionFile[]" style="width:180px" multiple>
                                    <input type="hidden" name="callIdx[]" value="">
                                    <input type="hidden" name="callQuestionFile[]" value="">
                                    <input type="hidden" name="callRealQuestionFile[]" value="">
                                    @if(!empty($row['QuestionFile']))
                                        <div class="file-wrap" style="cursor:pointer">
                                            <span class="blue underline-link img-tooltip" data-title="<img src='{{ $row['FilePath'].$row['RealQuestionFile'] }}'>">{{ $row['QuestionFile'] }}</span>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <input type="file" name="ExplanFile[]" style="width:180px" multiple>
                                    <input type="hidden" name="callExplanFile[]" value="">
                                    <input type="hidden" name="callRealExplanFile[]" value="">
                                    @if(!empty($row['ExplanFile']))
                                        <div class="file-wrap" style="cursor:pointer">
                                            <span class="blue underline-link img-tooltip" data-title="<img src='{{ $row['FilePath'].$row['RealExplanFile'] }}'>">{{ $row['ExplanFile'] }}</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center right-answer">
                                    <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="1" @if(in_array('1', explode(',', $row['RightAnswer']))) checked @endif> <label>1</label></div>
                                    <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="2" @if(in_array('2', explode(',', $row['RightAnswer']))) checked @endif> <label>2</label></div>
                                    <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="3" @if(in_array('3', explode(',', $row['RightAnswer']))) checked @endif> <label>3</label></div>
                                    <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="4" @if(in_array('4', explode(',', $row['RightAnswer']))) checked @endif> <label>4</label></div>
                                    <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="5" @if(in_array('5', explode(',', $row['RightAnswer']))) checked @endif> <label>5</label></div>
                                    <input type="hidden" name="RightAnswer[]" value="{{$row['RightAnswer']}}">
                                </td>
                                <td class="text-center"><input type="text" class="form-control" name="Scoring[]" value="{{$row['Scoring']}}"></td>
                                <td class="text-center">
                                    <select class="form-control" name="Difficulty[]" style="padding:0">
                                        <option value="">선택</option>
                                        <option value="T" @if($row['Difficulty'] == 'T') selected @endif>상</option>
                                        <option value="M" @if($row['Difficulty'] == 'M') selected @endif>중</option>
                                        <option value="B" @if($row['Difficulty'] == 'B') selected @endif>하</option>
                                    </select>
                                </td>
                                <td class="text-center"><button type="button" class="btn btn-xs btn-success mt-5 act-call-unit">호출</button></td>
                                <td class="text-center">{{ @$adminName[$row['RegAdminIdx']] }}</td>
                                <td class="text-center">{{ $row['RegDatm'] }}</td>
                                <td class="text-center"><span class="addRow-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success mr-10">저장</button>
                    </div>
                </form>
            </div>
        @endif
    </div>

    <style>
        .tooltip-inner { max-width: 100%; padding: 2px; background: #555; }
        .tooltip-arrow { display: none; }
    </style>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $regi_sub_form = $('#regi_sub_form');
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
            $('.act-searchCate, .act-searchProfessor').on('click', function() {
                if( !$('[name=siteCode]').val() ) { alert('운영사이트를 먼저 선택해 주세요'); return false; }

                if( $(this).hasClass('act-searchCate') ) {
                    $('.act-searchCate').setLayer({
                        'url': '{{ site_url() }}' + 'mocktest/baseCode/moCate?reg=Y&single=Y&siteCode=' + $('[name=siteCode]').val(),
                        'width': 1100
                    });
                }
                else if( $(this).hasClass('act-searchProfessor') ) {
                    $('.act-searchProfessor').setLayer({
                        'url': '{{ site_url('/common/searchProfessor/?siteCode=') }}' + $('[name=siteCode]').val(),
                        'width': 900
                    });
                }
            });

            // 선택 카테고리 삭제
            $('#selected_category').on('click', '.selected-category-delete', function () {
                $(this).closest('span').remove();
            });

            // 운영사이트 변경시 카테고리, 교수검색 초기화
            $('[name=siteCode]').on('change', function () {
                $('#selected_category').empty();
                $('#selected_professor').empty();
            });

            // 업로드파일 삭제
            {{--$('#regi_form, #regi_sub_form').on('click', '.act-fileDel', function () {--}}
            {{--var that = $(this);--}}
            {{--var _url = '{{ site_url("/mocktest/regExam/fileDel") }}';--}}
            {{--var data = {--}}
            {{--'{{ csrf_token_name() }}' : $regi_form.find('[name="{{ csrf_token_name() }}"]').val(),--}}
            {{--'_method' : 'PUT',--}}
            {{--'type' : $(this).data('file-type'),--}}
            {{--'idx' : $(this).data('file-idx'),--}}
            {{--'name' : $(this).data('file-name')--}}
            {{--};--}}

            {{--sendAjax(_url, data, function(ret) {--}}
            {{--if (ret.ret_cd) {--}}
            {{--that.closest('.file-wrap').remove();--}}
            {{--notifyAlert('success', '알림', ret.ret_msg);--}}
            {{--}--}}
            {{--}, showValidateError, false, 'POST');--}}
            {{--});--}}

            // 목록 이동
            $('#goList').on('click', function() {
                location.replace('{{ site_url('/mocktest/regExam') }}' + getQueryString());
            });

            // 기본정보 등록,수정
            $regi_form.submit(function() {
                var _url = '{{ ($method == 'PUT') ? site_url('/mocktest/regExam/update') : site_url('/mocktest/regExam/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/mocktest/regExam/edit/') }}' + ret.ret_data.dt.idx + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });


            /*********************************************************************************/

            // 문항정보필드 정답보기 갯수
            var exNum = $regi_form.find('[name="AnswerNum"]').val();
            $regi_sub_form.find('tbody > tr').each(function () {
                $(this).find('.right-answer > div').each(function (i,v) {
                    if(i >= parseInt(exNum)) $(this).remove();
                });
            });

            // 문항정보필드 문제등록옵션 변경시 정답 초기화
            $regi_sub_form.find('[name="QuestionOption[]"]').each(function () {
                if($(this).val() == 'J')
                    $(this).closest('tr').find('[name="RightAnswerTmp[]"]').prop('disabled', true);
            });
            $regi_sub_form.on('change', '[name="QuestionOption[]"]', function () {
                $(this).closest('tr').find('[name="RightAnswerTmp[]"]').iCheck('uncheck');
                $(this).closest('tr').find('[name="RightAnswer[]"]').val('');

                if($(this).val() == 'J') { // 주관식
                    $(this).closest('tr').find('[name="RightAnswerTmp[]"]').prop('disabled', true);
                }
                else {
                    $(this).closest('tr').find('[name="RightAnswerTmp[]"]').prop('disabled', false);
                }
                $(this).closest('tr').find('[name="RightAnswerTmp[]"]').iCheck('update');
            });

            // 문항정보필드 문제등록옵션 오류체크 (객관식(단수) 1개, 객관식(복수) 2개, 주관식 비활성)
            $regi_sub_form.on('ifChanged', '[name="RightAnswerTmp[]"]', function () {
                var wrap = $(this).closest('.right-answer');
                var subExOpt = $(this).closest('tr').find('[name="QuestionOption[]"]').val();

                if(subExOpt == 'S') {
                    if(wrap.find('[name="RightAnswerTmp[]"]:checked').length > 1) {
                        $(this).iCheck('uncheck');
                        init_iCheck();

                        alert('객관식(단일) 정답은 1개만 선택가능합니다.');
                        return false;
                    }
                }

                // 정답 저장
                var right = [];
                wrap.find('[name="RightAnswerTmp[]"]:checked').each(function () {
                    right.push($(this).val());
                });
                wrap.find('[name="RightAnswer[]"]').val(right.join(','));
            });


            // 문항정보필드 처리을 위한 초기화작업
            var cList = $regi_sub_form.find('tbody');
            addField = cList.find('tr:eq(0)').html();
            cList.find('tr:eq(0)').remove();

            cList.find('tr').each(function () {
                var cIDX = $(this).data('chapter-idx');
                if(cIDX) chapterExist.push(cIDX);
            });

            // 문항정보필드 추가
            $('#act-addRow').on('click', function () {
                var i;
                var count = $(this).closest('div').find('select').val();
                var rowLen = cList.find('tr').length;

                for (i=0; i < count; i++) {
                    cList.append('<tr data-chapter-idx="">' + addField + '</tr>');
                }

                cList.find('tr').each(function (index) {
                    if(index >= rowLen) $(this).find('[name="QuestionNO[]"]').val(++index);
                });

                init_iCheck();
            });

            // 문항정보필드 삭제
            $regi_sub_form.on('click', '.addRow-del', function () {
                if( $(this).closest('tr').data('chapter-idx') ) {
                    if (!confirm("삭제는 저장시 적용됩니다.\n삭제 대기목록에 추가하시겠습니까?")) return false;
                }

                var cIDX = $(this).closest('tr').data('chapter-idx');

                if(cIDX) chapterDel.push(cIDX);
                $(this).closest('tr').remove();
            });

            // 문항정보필드 등록,수정
            $regi_sub_form.submit(function () {
                if( $regi_sub_form.find('tbody tr').length < 1 ) { alert('필드를 먼저 추가해 주세요'); return false; }

                var chapterTotal = [];
                cList.find('tr').each(function () { chapterTotal.push($(this).data('chapter-idx')); });

                $regi_sub_form.find('[name="Info"]').val( JSON.stringify({'chapterTotal':chapterTotal, 'chapterExist':chapterExist, 'chapterDel':chapterDel}) );

                var _url = '{{ site_url('/mocktest/regExam/storeQuestion') }}';
                ajaxSubmit($regi_sub_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/mocktest/regExam/edit/') }}' + ret.ret_data.dt.idx + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });


            // 정렬변경 허용여부(변경된 내역이 있는 경우 불허)
            $regi_sub_form.on('change ifChanged', 'input:not([name="QuestionNO[]"]), select', function () {
                $('#act-sort').prop('disabled', true);
            });
            $regi_sub_form.on('click', '.addRow-del, .act-call-unit', function () {
                $('#act-sort').prop('disabled', true);
            });
            $('#act-call, #act-addRow').on('click', function () {
                $('#act-sort').prop('disabled', true);
            });

            // 정렬변경
            $('#act-sort').on('click', function () {
                if (!confirm('저장되지 않은 정보는 제거됩니다. 정렬을 변경하시겠습니까?')) return false;

                var sorting = {};
                cList.find('tr').each(function () {
                    if($(this).data('chapter-idx')) {
                        sorting[$(this).data('chapter-idx')] = $(this).find('[name="QuestionNO[]"]').val();
                    }
                });
                var _url = '{{ site_url("/mocktest/regExam/sort") }}';
                var data = {
                    '{{ csrf_token_name() }}' : $regi_sub_form.find('[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'idx' : $regi_sub_form.find('[name="idx"]').val(),
                    'sorting' : JSON.stringify(sorting),
                };

                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/mocktest/regExam/edit/') }}' + ret.ret_data.dt.idx + getQueryString());
                    }
                }, showValidateError, false, 'POST');
            });

            // 호출
            $('#act-call').on('click', function() {
                $('#act-call').setLayer({
                    'url': '{{ site_url('/mocktest/regExam/callIndex') }}',
                    'width': 1100
                });
            });
            $regi_sub_form.on('click', '.act-call-unit', function() {
                $('.act-call-unit').setLayer({
                    'url': '{{ site_url('/mocktest/regExam/callIndex') }}',
                    'width': 1100
                });
            });
        });
    </script>
@stop