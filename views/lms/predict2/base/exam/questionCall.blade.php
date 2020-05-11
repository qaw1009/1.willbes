@extends('lcms.layouts.master_modal')

@section('layer_title')
    문항호출
@stop

@section('layer_header')
    <form class="form-table form-horizontal" id="modal_reg_form" name="modal_reg_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field($method) !!}
@endsection

@section('layer_content')
            <div class="mt-15 mb-5">
                <span class="required">*</span> 시험지정보
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="">운영사이트</label>
                <div class="col-md-10 form-control-static" id="_site_code"></div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="">카테고리</label>
                <div class="col-md-10 form-control-static" id="_cate_code"></div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="">과목별 문제지정보</label>
                <div class="col-md-10 form-control-static" id="_exam_info"></div>
            </div>

            <div class="mt-50">
                <div id="addrow-wrap">
                    <div class="pull-left mt-15 mb-10"></div>
                    <div class="pull-right text-right form-inline mb-5">
                        <select class="form-control">
                            @foreach(range(1, 20) as $n)
                                <option value="{{$n}}" @if($loop->index == '20') selected @endif>{{$n}}개</option>
                            @endforeach
                        </select>
                        <button class="btn btn-sm btn-primary" id="act-call-addRow">필드추가</button>
                    </div>
                </div>
                <table class="table table-bordered" id="modal_reg_table">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 360px">연도/회차/문항번호</th>
                        <th class="text-center">문제영역</th>
                        <th class="text-center">문제등록옵션</th>
                        <th class="text-center">문제미리보기</th>
                        <th class="text-center">해설미리보기</th>
                        <th class="text-center">정답</th>
                        <th class="text-center">난이도</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- [S] 필드추가을 위한 기본HTML, 로딩후 제거 --}}
                    <tr data-order-no="">
                        <td class="text-center form-inline">
                            <select class="form-control mr-5" name="qu_year">
                                <option value="">연도</option>
                                @for($i=(date('Y')+1); $i>=2005; $i--)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            <select class="form-control mr-5" name="qu_round">
                                <option value="">회차</option>
                                @foreach(range(1, 20) as $i)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endforeach
                            </select>
                            <select class="form-control mr-5" name="qu_no">
                                <option value="">문항번호</option>
                                @foreach(range(1, 20) as $i)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-sm btn-primary act-getQuestion">조회</button>
                        </td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                    </tr>
                    {{-- [E] 필드추가을 위한 기본HTML, 로딩후 제거 --}}
                    </tbody>
                </table>
            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    var quInfo2 = $regi_form.find('#selected_category').text().trim().replace(/\[.+/, '');
                    var quInfo3 = /*$regi_form.find('#selected_category').text().trim().replace(/^.+>\s*!/, '').replace(/\s*\[.+$/, '') + ' | ' +*/
                        $regi_form.find('#selected_professor').text().trim().replace(/\s*\|.+/, '') + ' | ' +
                        $regi_form.find('[name="Year"] option:selected').text() + ' | ' +
                        $regi_form.find('[name="RotationNo"] option:selected').text() + '회차 | ' +
                        /*$regi_form.find('[name="QuestionOption"] option:selected').text() + ' | 보기 ' +*/
                        $regi_form.find('[name="AnswerNum"] option:selected').text() + '개';

                    $('#_site_code').text($regi_form.find('[name="siteCode"] option:selected').text());
                    $('#_cate_code').text( quInfo2 );
                    $('#_exam_info').text( quInfo3 );

                    // 초기화
                    var orderNo = 1;
                    var callList = $('#modal_reg_table').find('tbody');
                    var callAddField = callList.find('tr:eq(0)').html();
                    callList.find('tr:eq(0)').remove();

                    // 필드 추가
                    $('#act-call-addRow').on('click', function () {
                        var i;
                        var count = $(this).closest('div').find('select').val();

                        for (i=0; i < count; i++) {
                            callList.append('<tr data-order-no="'+ orderNo +'">' + callAddField + '</tr>');
                            orderNo++;
                        }
                    });

                    // ROW속 호출버튼 클릭시 필드 1개만 입력할 수 있게 필드추가 제거
                    var eTarget = (event.target) ? event.target : event.srcElement;
                    var unit = $(eTarget).hasClass('act-call-unit') ? $(eTarget) : '';
                    if(unit) {
                        $('#addrow-wrap').find('select').val('1');
                        $('#act-call-addRow').trigger('click');
                        $('#addrow-wrap').remove();
                    }

                    // 조회
                    var callData = {};
                    $('#modal_reg_form').on('click', '.act-getQuestion', function() {
                        var that = $(this).closest('tr');
                        var _url = '{{ site_url("/predict2/base/exam/callData") }}';
                        var data = {
                            '{{ csrf_token_name() }}' : $('#modal_reg_form').find('[name="{{ csrf_token_name() }}"]').val(),
                            '_method' : 'POST',
                            'qu_year' : that.find('[name="qu_year"]').val(),
                            'qu_round' : that.find('[name="qu_round"]').val(),
                            'qu_no' : that.find('[name="qu_no"]').val(),
                            'siteCode' : $regi_form.find('[name="siteCode"]').val(),
                            'nowIdx' : $regi_form.find('[name="idx"]').val(),
                            'area_code' : $regi_form.find('[name="area_code"]').val(),
                            'ProfIdx' : $regi_form.find('[name="ProfIdx"]').val(),
                            'QuestionOption' : $regi_form.find('[name="QuestionOption"]').val(),
                            'AnswerNum' : $regi_form.find('[name="AnswerNum"]').val(),
                        };

                        sendAjax(_url, data, function(ret) {
                            if (ret.ret_cd) {
                                var rt = ret.ret_data.dt;
                                var QuestionOption = Difficulty = '';

                                if(!rt) { alert('일치하는 데이터가 없습니다.'); return false; }
                                if(!rt.RealQuestionFile || !rt.RealExplanFile) { alert('선택하신 문항에 이미지가 없습니다.'); return false; }
                                if(!rt.optSame) { alert('정답의 보기갯수가 일치하지 않습니다.'); return false; }

                                if(rt.QuestionOption == 'S') QuestionOption = '객관식(단일)';
                                else if(rt.QuestionOption == 'M') QuestionOption = '객관식(복수)';
                                else if(rt.QuestionOption == 'J') QuestionOption = '주관식';

                                if(rt.Difficulty == 'T') Difficulty = '상';
                                else if(rt.Difficulty == 'M') Difficulty = '중';
                                else if(rt.Difficulty == 'B') Difficulty = '하';

                                that.find('td:eq(1)').html(rt.AreaName);
                                that.find('td:eq(2)').html(QuestionOption);
                                that.find('td:eq(3)').html('<span class="blue underline-link img-tooltip" data-title="<img src=\''+rt.upImgUrlQ+rt.RealQuestionFile+'\'>">'+rt.QuestionFile+'</span>');
                                that.find('td:eq(4)').html('<span class="blue underline-link img-tooltip" data-title="<img src=\''+rt.upImgUrlQ+rt.RealExplanFile+'\'>">'+rt.ExplanFile+'</span>');
                                that.find('td:eq(5)').html(rt.RightAnswer);
                                that.find('td:eq(6)').html(Difficulty);

                                callData[that.data('order-no')] = rt;
                                @if(in_array(ENVIRONMENT, ['local','development'])) console.log(1, callData); @endif

                            }
                        }, showValidateError, false, 'POST');
                    });

                    // 적용
                    $("#act-qApply").on('click', function () {
                        $.each(callData, function (i,v) {
                            var target, right, callChangeIdx;

                            if(unit) {
                                unit.closest('tr').after('<tr data-chapter-idx="">' + addField + '</tr>');
                                target = unit.closest('tr').next();

                                callChangeIdx = unit.closest('tr').data('chapter-idx');
                                if(callChangeIdx) {
                                    chapterExist.splice(chapterExist.indexOf(callChangeIdx), 1);
                                    chapterDel.push(callChangeIdx);
                                }
                            }
                            else {
                                $regi_sub_form.find('tbody').append('<tr data-chapter-idx="">' + addField + '</tr>');
                                target = $regi_sub_form.find('tbody > tr').last();
                            }

                            target.find('[name="regKind[]"]').val('call');
                            target.find('[name="MalIdx[]"]').val(v.MalIdx);
                            target.find('[name="QuestionOption[]"]').val(v.QuestionOption);
                            target.find('[name="Scoring[]"]').val(v.Scoring);
                            target.find('[name="Difficulty[]"]').val(v.Difficulty);
                            target.find('[name="RightAnswer[]"]').val(v.RightAnswer);
                            //target.find('td:eq(9)').text(v.wAdminName);
                            //target.find('td:eq(10)').text(v.RegDatm);

                            target.find('[name="RightAnswerTmp[]"]').each(function () {
                                $(this).iCheck('uncheck');
                            });
                            target.find('[name="RightAnswerTmp[]"]').each(function () {
                                right = v.RightAnswer.split(',');
                                if( $.inArray($(this).val(), right) !== -1 ) {
                                    $(this).iCheck('check');
                                }
                                if(v.QuestionOption == 'J') {
                                    $(this).iCheck('disable');
                                }
                            });

                            if(v.QuestionFile) {
                                target.find('[name="QuestionFile[]"]').hide();
                                target.find('td:eq(3) .file-wrap').append('<div>[호출]</div><span class="blue underline-link img-tooltip" data-title="<img src=\''+v.upImgUrlQ+v.RealQuestionFile+'\'>">'+v.QuestionFile+'</span>');
                                target.find('[name="callIdx[]"]').val(v.MpIdx);
                                target.find('[name="callQuestionFile[]"]').val(v.QuestionFile);
                                target.find('[name="callRealQuestionFile[]"]').val(v.RealQuestionFile);
                            }
                            if(v.ExplanFile) {
                                target.find('[name="ExplanFile[]"]').hide();
                                target.find('td:eq(4) .file-wrap').append('<div>[호출]</div><span class="blue underline-link img-tooltip" data-title="<img src=\''+v.upImgUrlQ+v.RealExplanFile+'\'>">'+v.ExplanFile+'</span>');
                                target.find('[name="callExplanFile[]"]').val(v.ExplanFile);
                                target.find('[name="callRealExplanFile[]"]').val(v.RealExplanFile);
                            }

                            if(unit) {
                                target.find('[name="QuestionNO[]"]').val( unit.closest('tr').find('[name="QuestionNO[]"]').val() );
                                unit.closest('tr').remove();
                            }
                            else {
                                target.find('[name="QuestionNO[]"]').val( target.closest('tbody').find('tr').length );
                            }
                        });
                        init_iCheck();

                        $("#pop_modal").modal('toggle');

                        @if(in_array(ENVIRONMENT, ['local','development'])) console.log(2, callData); @endif
                    });
                });
            </script>
@stop

@section('add_buttons')
    <button type="button" class="btn btn-success" id="act-qApply">저장</button>
@endsection

@section('layer_footer')
    </form>
@endsection