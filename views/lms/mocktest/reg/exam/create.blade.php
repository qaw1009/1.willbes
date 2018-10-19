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
                <input type="hidden" name="isCopy" value="@if($method == 'PUT'){{ $isCopy }}@endif">

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
                            <button type="button" class="btn btn-sm btn-primary act-searchCate" {{($method == 'PUT' && !$isCopy) ? 'disabled' : ''}}>카테고리검색</button>
                            <span id="selected_category">
                                @if($method == 'PUT')
                                    @if($isCopy) {{-- 복사 후 첫 이동, 카테고리 변경 가능하게 --}}
                                        @foreach($moCate_name as $code => $name)
                                            <span class="pb-5">
                                                {{ preg_replace('/^(.*?\s>\s)/', '',$name) }}
                                                @if(isset($moCate_isUse[$code]) && $moCate_isUse[$code] == 'N') <span class="ml-5 red">(미사용)</span> @endif
                                                <a href="#none" data-cate-code="{{ $code }}" class="selected-category-delete"><i class="fa fa-times red"></i></a>
                                                <input type="hidden" name="moLink" value="{{ $code }}">
                                            </span>
                                        @endforeach
                                    @else
                                        @foreach($moCate_name as $code => $name)
                                            <span class="pb-5">
                                                {{ preg_replace('/^(.*?\s>\s)/', '',$name) }}
                                                @if(isset($moCate_isUse[$code]) && $moCate_isUse[$code] == 'N') <span class="ml-5 red">(미사용)</span> @endif
                                            </span>
                                        @endforeach
                                    @endif
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
                            <select class="form-control mr-5" name="QuestionOption">
                                <option value="">보기형식</option>
                                @foreach($exOpt as $k => $v)
                                    <option value="{{$k}}" @if($method == 'PUT' && $k == $data['QuestionOption']) selected @endif>{{$v}}</option>
                                @endforeach
                            </select>
                            <select class="form-control mr-5" name="AnswerNum">
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
                            <input type="text" class="form-control" style="width:60px" name="TotalScore" value="@if($method == 'PUT'){{ $data['TotalScore'] }}@endif"> 점
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
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">해설지통파일 <span class="required">*</span></th>
                        <td colspan="3">
                            <input type="file" name="ExplanFile">
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
            <div class="x_content mt-50">
                <div>
                    <div class="pull-left mt-15 mb-10">[ 총 {{ count($qData) }}건 ]</div>
                    <div class="pull-right text-right form-inline mb-5">
                        <select class="form-control">
                            @foreach(range(1, 20) as $n)
                                <option value="{{$n}}" @if($loop->index == '20') selected @endif>{{$n}}개</option>
                            @endforeach
                        </select>
                        <button class="btn btn-sm btn-primary" id="act-addRow">필드추가</button>
                        <button class="btn btn-sm btn-primary" id="act-sortRow">정렬변경</button>
                        <button class="btn btn-sm btn-success" id="act-callRow">문항호출</button>
                    </div>
                </div>
                <form class="form-table" id="regi_sub_form" name="regi_sub_form" method="POST" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field($method) !!}
                    <input type="hidden" name="idx" value="{{ $data['MpIdx'] }}"/>

                    <table class="table table-bordered modal-table">
                        <thead>
                        <tr>
                            <th class="text-center">문항번호</th>
                            <th class="text-center">문제영역</th>
                            <th class="text-center">문제등록옵션</th>
                            <th class="text-center">문제등록(분할이미지)</th>
                            <th class="text-center">해설등록(분할이미지)</th>
                            <th class="text-center">정답</th>
                            <th class="text-center" style="width:75px">배점</th>
                            <th class="text-center">난이도</th>
                            <th class="text-center">문항호출</th>
                            <th class="text-center">등록자<br>수정자</th>
                            <th class="text-center">등록일<br>수정일</th>
                            <th class="text-center">삭제</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- [S] 필드추가을 위한 기본HTML, 로딩후 제거 --}}
                        <tr data-chapter-idx="">
                            <td class="text-center form-inline"><input type="text" class="form-control" style="width:45px" name="" value=""></td>
                            <td class="text-center">
                                <select class="form-control" name="">
                                    <option value=""></option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select class="form-control" name="QuestionOption">
                                    <option value=""></option>
                                </select>
                            </td>
                            <td class="text-center">
                                <input type="file" class="mt-20" name=""><br>
                            </td>
                            <td class="text-center">
                                <input type="file" class="mt-20" name=""><br>
                            </td>
                            <td class="text-center">
                                <input type="checkbox" class="flat" name="RightAnswer" value=""> <span>1</span><br>
                                <input type="checkbox" class="flat" name="RightAnswer" value=""> <span>2</span><br>
                                <input type="checkbox" class="flat" name="RightAnswer" value=""> <span>3</span><br>
                                <input type="checkbox" class="flat" name="RightAnswer" value=""> <span>4</span><br>
                            </td>
                            <td class="text-center"><input type="text" class="form-control" name="Scoring" value=""></td>
                            <td class="text-center">
                                <select class="form-control" name="Difficulty">
                                    <option value="T">상</option>
                                    <option value="M">중</option>
                                    <option value="B">하</option>
                                </select>
                            </td>
                            <td class="text-center"><button class="btn btn-sm btn-success mt-5">호출</button></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"><span class="addRow-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
                        </tr>
                        {{-- [E] 필드추가을 위한 기본HTML, 로딩후 제거 --}}

                        @foreach($qData as $row)
                            <tr data-chapter-idx="{{ $row['MqIdx'] }}">
                                <td class="text-center form-inline"><input type="text" class="form-control" style="width:45px" name="" value=""></td>
                                <td class="text-center">
                                    <select class="form-control" name="">
                                        <option value=""></option>
                                    </select>
                                </td>
                                <td class="text-center">
                                    <select class="form-control" name="QuestionOption">
                                        <option value=""></option>
                                    </select>
                                </td>
                                <td class="text-center">
                                    <input type="file" class="mt-20" name=""><br>
                                </td>
                                <td class="text-center">
                                    <input type="file" class="mt-20" name=""><br>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="flat" name="RightAnswer" value=""> <span>1</span><br>
                                    <input type="checkbox" class="flat" name="RightAnswer" value=""> <span>2</span><br>
                                    <input type="checkbox" class="flat" name="RightAnswer" value=""> <span>3</span><br>
                                    <input type="checkbox" class="flat" name="RightAnswer" value=""> <span>4</span><br>
                                </td>
                                <td class="text-center"><input type="text" class="form-control" name="Scoring" value=""></td>
                                <td class="text-center">
                                    <select class="form-control" name="Difficulty">
                                        <option value="T">상</option>
                                        <option value="M">중</option>
                                        <option value="B">하</option>
                                    </select>
                                </td>
                                <td class="text-center"><button class="btn btn-sm btn-success mt-5">호출</button></td>
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

            // 목록 이동
            $('#goList').on('click', function() {
                location.replace('{{ site_url('/mocktest/regExam') }}' + getQueryString());
            });

            // 기본정보 등록,수정
            $regi_form.submit(function() {
                {{--@if($method == 'POST') if(!confirm("저장하시겠습니까?")) return false; @endif--}}

                var _url = '{{ ($method == 'PUT') ? site_url('/mocktest/regExam/update') : site_url('/mocktest/regExam/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/mocktest/regExam/edit/') }}' + ret.ret_data.dt.idx + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });


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
                    cList.append('<tr>' + addField + '</tr>');
                }

                cList.find('tr').each(function (index) {
                    $(this).find('td:eq(0)').text(++index);
                });
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
                    $(this).find('td:eq(0)').text(++index);
                });
            });

            // 문항정보필드 등록,수정
            $regi_sub_form.submit(function () {
                if( $regi_sub_form.find('tbody tr').length < 1 ) { alert('필드를 먼저 추가해 주세요'); return false; }

                var chapterTotal = [];
                cList.find('tr').each(function () { chapterTotal.push($(this).data('chapter-idx')); });

                var _url = '{{ site_url('/mocktest/baseRange/storeChapter') }}';
                var data = $regi_sub_form.serialize() + '&' + $.param({'chapterTotal':chapterTotal, 'chapterExist':chapterExist, 'chapterDel':chapterDel});
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/mocktest/baseRange/') }}' + getQueryString());
                    }
                }, showValidateError, false, 'POST');
            });
        });
    </script>
@stop