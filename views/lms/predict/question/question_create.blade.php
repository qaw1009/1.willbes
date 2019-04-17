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
                <input type="hidden" name="idx" value="{{ ($method == 'PUT') ? $data['PpIdx'] : '' }}">
                <input type="hidden" name="isDeny" value="{{ ($method == 'PUT') ? $isDeny : '' }}">

                <table class="table table-bordered modal-table">
                    <tr>
                        <th colspan="1">합격예측명 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <select id="ProdCode" name="ProdCode">
                                @foreach($productList as $key => $val)
                                    <option value="{{ $val['ProdCode'] }}" @if($data['ProdCode'] == $val['ProdCode']) selected @endif>{{ $val['ProdName'] }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">과목명 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <select id="SubjectCode" name="SubjectCode" onChange="selType(this.value)">
                                <option value="">과목선택</option>
                                @foreach($subjectList as $key => $val)
                                    <option value="{{ $val['Ccd'] }}" @if($data['SubjectCode'] == $val['Ccd']) selected @endif>{{ $val['CcdValue'] }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="sType" name="Type" value="{{ $data['Type'] }}"/>
                            @foreach($subjectList as $key => $val)
                                <input type="hidden" id="sType{{ $val['Ccd'] }}" value="{{ $val['Type'] }}" />
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th style="width:15%;">과목문제지명 <span class="required">*</span></th>
                        <td style="width:35%;">
                            <input type="text" class="form-control" name="PaperName" value="@if($method == 'PUT'){{ $data['PaperName'] }}@endif">
                        </td>
                        <th style="width:15%;">과목문제지코드 <span class="required">*</span></th>
                        <td style="width:35%;">@if($method == 'PUT'){{ $data['PpIdx'] }}@endif</td>
                    </tr>
                    <tr>
                        <th>문제등록옵션 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
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
                                    <a href="{{ $filepath.$data['RealQuestionFile'] }}" target="_blank" class="blue underline-link">{{ $data['QuestionFile'] }}</a>
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
                    </div>
                </div>
                <form class="form-table form-table-sm" id="regi_sub_form" name="regi_sub_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field($method) !!}
                    <input type="hidden" name="idx" value="{{ $data['PpIdx'] }}">
                    <input type="hidden" name="TotalScore" value="{{ $data['TotalScore'] }}">
                    <input type="hidden" name="Info" value="">

                    <table class="table table-bordered modal-table">
                        <thead>
                        <tr>
                            <th class="text-center">문항<br>번호</th>
                            <th class="text-center">정답</th>
                            <th class="text-center" style="min-width:50px; width:50px;">배점</th>
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

                            <td class="text-center right-answer">
                                <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="1"> <label style="margin-right:10px;">1</label>
                                <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="2"> <label style="margin-right:10px;">2</label>
                                <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="3"> <label style="margin-right:10px;">3</label>
                                <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="4"> <label style="margin-right:10px;">4</label>
                                <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="5"> <label>5</label>
                                <input type="hidden" name="RightAnswer[]">
                            </td>
                            <td class="text-center"><input type="text" class="form-control" name="Scoring[]" value=""></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"><span class="addRow-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
                        </tr>
                        {{-- [E] 필드추가을 위한 기본HTML, 로딩후 제거 --}}

                        @foreach($qData as $row)
                            <tr data-chapter-idx="{{ $row['PqIdx'] }}">
                                <td class="text-center form-inline">
                                    <input type="hidden" name="regKind[]" value="">
                                    <input type="text" class="form-control" style="width:45px" name="QuestionNO[]" value="{{$row['QuestionNO']}}">
                                </td>

                                <td class="text-center right-answer">
                                    <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="1" @if(in_array('1', explode(',', $row['RightAnswer']))) checked @endif> <label style="margin-right:10px;">1</label>
                                    <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="2" @if(in_array('2', explode(',', $row['RightAnswer']))) checked @endif> <label style="margin-right:10px;">2</label>
                                    <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="3" @if(in_array('3', explode(',', $row['RightAnswer']))) checked @endif> <label style="margin-right:10px;">3</label>
                                    <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="4" @if(in_array('4', explode(',', $row['RightAnswer']))) checked @endif> <label style="margin-right:10px;">4</label>
                                    <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="5" @if(in_array('5', explode(',', $row['RightAnswer']))) checked @endif> <label>5</label>
                                    <input type="hidden" name="RightAnswer[]" value="{{$row['RightAnswer']}}">
                                </td>
                                <td class="text-center"><input type="text" class="form-control" name="Scoring[]" value="{{$row['Scoring']}}"></td>
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

            // 목록 이동
            $('#goList').on('click', function() {
                location.replace('{{ site_url('/predict/question') }}' + getQueryString());
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


            /*********************************************************************************/

            // 문항정보필드 정답보기 갯수
            var exNum = $regi_form.find('[name="AnswerNum"]').val();
            $regi_sub_form.find('tbody > tr').each(function () {
                $(this).find('.right-answer > div').each(function (i,v) {
                    if(i >= parseInt(exNum)) $(this).remove();
                });
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

                var _url = '{{ site_url('/predict/question/storeQuestion') }}';
                ajaxSubmit($regi_sub_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/predict/question/create/') }}' + ret.ret_data.dt.idx + getQueryString());
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

        function selType(val){
            $('#sType').val($('#sType'+val).val());
        }
    </script>
@stop