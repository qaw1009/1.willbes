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
                            <button type="button" class="btn btn-sm btn-primary act-searchCate" {{($method == 'PUT') ? 'disabled' : ''}}>카테고리검색</button>
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
                            <select class="form-control mr-5" name="QuestionOption" {{($method == 'PUT') ? 'disabled' : ''}}>
                                <option value="">보기형식</option>
                                <option value="S" @if($method == 'PUT' && $data['QuestionOption'] == 'S') selected @endif>객관식(단일정답)</option>
                                <option value="M" @if($method == 'PUT' && $data['QuestionOption'] == 'M') selected @endif>객관식(복수정답)</option>
                                <option value="J" @if($method == 'PUT' && $data['QuestionOption'] == 'J') selected @endif>주관식</option>
                            </select>
                            <select class="form-control mr-5" name="AnswerNum" {{($method == 'PUT') ? 'disabled' : ''}}>
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
                            <input type="text" class="form-control" style="width:60px" name="TotalScore" value="@if($method == 'PUT'){{ $data['TotalScore'] }}@endif"  {{($method == 'PUT') ? 'readonly' : ''}}> 점
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
                        <th colspan="1">문제통파일 <span class="required">*</span></th>
                        <td colspan="3">
                            <input type="file" name="QuestionFile">
                            @if($method == 'PUT' && !empty($data['QuestionFile']))
                                <div class="file-wrap" style="cursor:pointer">
                                    <a href="{{ $upImgUrl.$data['MpIdx'].'/'.$data['RealQuestionFile'] }}" target="_blank" class="blue underline-link">{{ $data['QuestionFile'] }}</a>
                                    {{--<span class="act-fileDel" data-file-idx="{{$data['MpIdx']}}" data-file-type="base" data-file-name="QuestionFile"><i class="fa fa-times red"></i></span>--}}
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">해설지통파일 <span class="required">*</span></th>
                        <td colspan="3">
                            <input type="file" name="ExplanFile">
                            @if($method == 'PUT' && !empty($data['ExplanFile']))
                                <div class="file-wrap" style="cursor:pointer">
                                    <a href="{{ $upImgUrl.$data['MpIdx'].'/'.$data['RealExplanFile'] }}" target="_blank" class="blue underline-link">{{ $data['ExplanFile'] }}</a>
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
                    '문항호출' 클릭시, 이전 회차의 과목별 문제정보에서 등록할 문제를 선택할 수 있습니다.(동일 과목, 교수정보 지난 과목별 문제만 호출)
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
                <form class="form-table form-table-sm" id="regi_sub_form" name="regi_sub_form" method="POST" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field($method) !!}
                    <input type="hidden" name="idx" value="{{ $data['MpIdx'] }}">
                    <input type="hidden" name="TotalScore" value="{{ $data['TotalScore'] }}">

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
                            <th class="text-center">등록자<br>수정자</th>
                            <th class="text-center">등록일<br>수정일</th>
                            <th class="text-center">삭제</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- [S] 필드추가을 위한 기본HTML, 로딩후 제거 --}}
                        <tr data-chapter-idx="">
                            <td class="text-center form-inline"><input type="text" class="form-control" style="width:45px" name="orderNum[]" value=""></td>
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
                            <td class="text-center">
                                <input type="file" class="mt-20" name="UnitQuestionFile[]" style="width:180px"><br>
                            </td>
                            <td class="text-center">
                                <input type="file" class="mt-20" name="UnitExplanFile[]" style="width:180px"><br>
                            </td>
                            <td class="text-center right-answer">
                                <div><input type="checkbox" class="flat" name="RightAnswer[][]" value="1"> <label>1</label></div>
                                <div><input type="checkbox" class="flat" name="RightAnswer[][]" value="2"> <label>2</label></div>
                                <div><input type="checkbox" class="flat" name="RightAnswer[][]" value="3"> <label>3</label></div>
                                <div><input type="checkbox" class="flat" name="RightAnswer[][]" value="4"> <label>4</label></div>
                                <div><input type="checkbox" class="flat" name="RightAnswer[][]" value="5"> <label>5</label></div>
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
                            <td class="text-center"><button class="btn btn-xs btn-success mt-5">호출</button></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"><span class="addRow-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
                        </tr>
                        {{-- [E] 필드추가을 위한 기본HTML, 로딩후 제거 --}}

                        @foreach($qData as $row)
                            <tr data-chapter-idx="{{ $row['MqIdx'] }}">
                                <td class="text-center form-inline"><input type="text" class="form-control" style="width:45px" name="orderNum[]" value=""></td>
                                <td class="text-center">
                                    <select class="form-control" name="MalIdx[]">
                                        <option value="">선택</option>
                                        @foreach($areaList as $it)
                                            <option value="{{$it['MalIdx']}}" @if($method == 'PUT' && $it['MalIdx'] == $row['MalIdx']) selected @endif>{{$it['AreaName']}}</option>
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
                                <td class="text-center">
                                    <input type="file" class="mt-20" name="QuestionFile[]" style="width:180px"><br>
                                </td>
                                <td class="text-center">
                                    <input type="file" class="mt-20" name="ExplanFile[]" style="width:180px"><br>
                                </td>
                                <td class="text-center right-answer">
                                    <div><input type="checkbox" class="flat" name="RightAnswer[][]" value="1" @if($row['RightAnswer'] == '1') checked @endif> <label>1</label></div>
                                    <div><input type="checkbox" class="flat" name="RightAnswer[][]" value="2" @if($row['RightAnswer'] == '2') checked @endif> <label>2</label></div>
                                    <div><input type="checkbox" class="flat" name="RightAnswer[][]" value="3" @if($row['RightAnswer'] == '3') checked @endif> <label>3</label></div>
                                    <div><input type="checkbox" class="flat" name="RightAnswer[][]" value="4" @if($row['RightAnswer'] == '4') checked @endif> <label>4</label></div>
                                    <div><input type="checkbox" class="flat" name="RightAnswer[][]" value="5" @if($row['RightAnswer'] == '5') checked @endif> <label>5</label></div>
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
                                <td class="text-center"><button class="btn btn-xs btn-success mt-5">호출</button></td>
                                <td class="text-center">{{ @$adminName[$row['RegAdminIdx']] }}<br>{{ @$adminName[$row['UpdAdminIdx']] }}</td>
                                <td class="text-center">{{ $row['RegDatm'] }}<br>{{ $row['UpdDatm'] }}</td>
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

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $regi_sub_form = $('#regi_sub_form');

        $(document).ready(function() {
            $('[data-toggle="popover"]').popover();

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


            // 문항정보필드 문제등록옵션
            var exOpt = $regi_form.find('[name="QuestionOption"]').val();
            var exOptS = (exOpt == 'M') ? ['S','M'] : [exOpt];
            $regi_sub_form.find('[name="QuestionOption[]"] option').each(function () {
                if( $.inArray($(this).attr('value'), exOptS) === -1 ) $(this).remove();
            });

            // 문항정보필드 정답보기 갯수
            var exNum = $regi_form.find('[name="AnswerNum"]').val();
            $regi_sub_form.find('.right-answer > div').each(function (i,v) {
                if(i >= exNum) $(this).remove();
            });

            // 문항정보필드 정답보기 오류체크 (객관식(단수) 1개, 객관식(복수) 2개, 주관식 비활성)
            if(exOpt == 'J') {
                $regi_sub_form.find('.right-answer input').each(function () {
                    $(this).prop('disabled', true);
                });
            }
            else {
                $regi_sub_form.on('ifChecked', '[name="RightAnswer[]"]', function () {
                    var subExOpt = $(this).closest('tr').find('[name="QuestionOption"]').val();
                    var rightNum = (subExOpt == 'M') ? 2 : 1;
console.log(1,subExOpt,rightNum);
                    if($(this).closest('.right-answer').find('[name="RightAnswer[]"]:checked').length > rightNum) {
                        $(this).iCheck('uncheck');
                        init_iCheck();

                        alert('객관식'+ ((subExOpt == 'M') ? '(복수)':'(단일)') +' 정답은 '+ rightNum +'개만 선택가능합니다.');
                    }
                });
            }


            // 문항정보필드 처리을 위한 초기화작업
            var chapterExist = [];
            var chapterDel = [];
            var cList = $regi_sub_form.find('tbody');
            var addField = cList.find('tr:eq(0)').html();
            //cList.find('tr:eq(0)').remove();

            cList.find('tr').each(function () {
                var cIDX = $(this).data('chapter-idx');
                if(cIDX) chapterExist.push(cIDX);
            });

            // 문항정보필드 추가
            $('#act-addRow').on('click', function () {
                var i;
                var count = $(this).closest('div').find('select').val();

                for (i=0; i < count; i++) {
                    cList.append('<tr data-chapter-idx="">' + addField + '</tr>');
                }

                cList.find('tr').each(function (index) {
                    $(this).find('td:eq(0)').find('[name="orderNum[]"]').val(++index);
                });

                init_iCheck();
            });

            // 문항정보필드 삭제
            $regi_sub_form.on('click', '.addRow-del', function () {
                if( $(this).closest('tr').find('[name="areaName[]"]').val() ) {
                    if (!confirm("삭제는 저장시 적용됩니다.\n삭제 대기목록에 추가하시겠습니까?")) return false;
                }

                var cIDX = $(this).closest('tr').data('chapter-idx');

                if(cIDX) chapterDel.push(cIDX);
                $(this).closest('tr').remove();

                cList.find('tr').each(function (index) {
                    $(this).find('td:eq(0)').find('[name="orderNum[]"]').val(++index);
                });
            });

            // 문항정보필드 등록,수정
            $regi_sub_form.submit(function () {
                if( $regi_sub_form.find('tbody tr').length < 1 ) { alert('필드를 먼저 추가해 주세요'); return false; }

                // 배점합계 체크
                var totalScore = 0;
                $regi_sub_form.find('[name="Scoring"]').each(function () {
                    totalScore += parseInt($(this).val());
                });
                if(totalScore !== parseInt($regi_form.find('[name="TotalScore"]').val())) {
                    alert('문항별 배점의 합과 총점이 일치하지 않습니다.'); return false;
                }

                var chapterTotal = [];
                cList.find('tr').each(function () { chapterTotal.push($(this).data('chapter-idx')); });

                var _url = '{{ site_url('/mocktest/regExam/storeUnit') }}';
                var data = $regi_sub_form.serialize() + '&' + $.param({'chapterTotal':chapterTotal, 'chapterExist':chapterExist, 'chapterDel':chapterDel});
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/mocktest/regExam/') }}' + getQueryString());
                    }
                }, showValidateError, false, 'POST');
            });


            // 정렬변경
            $('#act-sort').on('click', function () {
                if (!confirm('정렬을 변경하시겠습니까?')) return false;

                var total = [];
                cList.find('tr').each(function () {
                    if($(this).data('chapter-idx')) total.push($(this).data('chapter-idx'));
                });
                if(chapterExist.length == 0 || chapterExist.length != total.length) {
                    alert('저장을 먼저 하시고 정렬변경을 해 주세요');
                    return false;
                }

                var sorting = {};
                cList.find('tr').each(function () {
                    sorting[$(this).data('chapter-idx')] = $(this).find('[name="orderNum[]"]').val();
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
        });
    </script>
@stop