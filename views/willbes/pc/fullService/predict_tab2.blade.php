<div class="step">
    시험 보시느라 수고 많으셨습니다.<br>
    나의 합격 여부를 함께 알아볼까요?<br>
    성적채점은 <span class="bold">총 3 단계로 진행</span>됩니다
</div>
<div class="stage"><span class="phase">1단계</span> <span class="bold">기본정보 입력</span><br>
    기본 정보를 입력하시면 합격예측 서비스 이용이 가능합니다.
</div>
<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field($arr_base['method']) !!}

    <input type="hidden" id="GroupCcd" name="GroupCcd" >
    <input type="hidden" name="site_code" value="{{ $__cfg['SiteCode'] }}" />
    <input type="hidden" name="predict_idx" value="{{ $predict_idx }}" />
    <input type="hidden" name="is_question_type" value="{{ $predict_data['IsQuestionType'] }}" />
    <input type="hidden" name="is_add_point" value="{{ $predict_data['IsAddPoint'] }}" />
    <input type="hidden" name="lecture_type" value="4" />
    <input type="hidden" name="Period" value="1" />
    <input type="hidden" name="img_pass" value="Y" />
    <input type="hidden" name="pr_idx" value="{{ $regi_data['PrIdx'] }}" />

    @foreach($regi_subject_data as $row)
        <input type="hidden" class="subject_code" name="subject_p[]" value="{{ $row['SubjectCode'] }}" />
    @endforeach

    <table cellspacing="0" cellpadding="0" class="table_type">
        <col width="30%" />
        <col width="*" />
        <tr>
            <th>이름</th>
            <td><label>{{sess_data('mem_name')}}</label></td>
        </tr>
        <tr>
            <th>연락처</th>
            <td><label>{{ (sess_data('is_login') !== true) ? '' : substr(sess_data('mem_phone'),0,3).'-'.substr(sess_data('mem_phone'),3,4) . '-'.substr(sess_data('mem_phone'),7,4) }}</label></td>
        </tr>
        <tr>
            <th>직렬</th>
            <td>
                <select title="직렬선택" name="take_mock_part" id="take_mock_part">
                    <option value="">직렬선택</option>
                    @foreach($arr_base['arr_mock_part'] as $row)
                        <option value="{{ $row['Ccd'] }}" @if($regi_data['TakeMockPart'] == $row['Ccd']) selected="selected" @endif>{{ $row['CcdName'] }}</option>
                    @endforeach
                </select>

                @foreach($arr_base['arr_subject'] as $row)
                    <input type="hidden" class="_subject_{{ $row['TakeMockPart'] }}" value="{{ $row['Ccd'] }}">
                @endforeach
                <span class="_subject_box"></span>

                @if ($__cfg['SiteCode'] == '2005')
                    <input type="hidden" name="take_area" id="take_area" value="{{array_key_first($arr_base['arr_area'])}}">
                @else
                <select title="지역구분" name="take_area" id="take_area">
                    <option value="">지역</option>
                    @foreach($arr_base['arr_area'] as $key => $val)
                        <option value="{{ $key }}" @if($regi_data['TakeArea'] == $key) selected="selected" @endif>{{ $val }}</option>
                    @endforeach
                </select>
                @endif
            </td>
        </tr>
        <tr>
            <th>시험응시번호</th>
            <td>
                <label><input type="text" name="take_number" id="take_number" maxlength="8" value="{{ $regi_data['TakeNumber'] }}"/></label>
            </td>
        </tr>
        @if($predict_data['IsQuestionType'] == 'Y')
        <tr>
            <th>책형</th>
            <td>
                <ul class="sel_info">
                    @for($i=1; $i<=$predict_data['QuestionTypeCnt']; $i++)
                        <li><input type="radio" name="question_type" id="question_type{{$i}}" value="{{$i}}" @if($regi_data['QuestionType'] == $i) checked="checked" @endif/>
                            <label for="question_type{{$i}}">{{$predict_data['question_type_names']['kor'][$i]}}</label></li>
                    @endfor
                </ul>
            </td>
        </tr>
        @endif
        @if($predict_data['IsAddPoint'] == 'Y')
            <tr>
                <th>가산점</th>
                <td>
                    <ul class="sel_info">
                        <li><input type="radio" name="add_point" id="add_point10" value="10" {{ ($regi_data['AddPoint'] == '10') ? 'checked="checked' : '' }}/> <label for="add_point10">10점</label></li>
                        <li><input type="radio" name="add_point" id="add_point5" value="5" {{ ($regi_data['AddPoint'] == '5') ? 'checked="checked' : '' }}/> <label for="add_point5">5점</label></li>
                        <li><input type="radio" name="add_point" id="add_point3" value="3" {{ ($regi_data['AddPoint'] == '3') ? 'checked="checked' : '' }}/> <label for="add_point3">3점</label></li>
                        <li><input type="radio" name="add_point" id="add_point0" value="0" {{ ($regi_data['AddPoint'] == '0') ? 'checked="checked' : '' }}/> <label for="add_point0">없음</label></li>
                    </ul>
                </td>
            </tr>
        @else
            <input type="hidden" name="add_point" value="0" />
        @endif
    </table>
</form>
<div class="eventPopS3">
    <div class="stage">📣 <span class="bold">이벤트 참여에 따른 사전 동의사항</span></div>
    <ul>
        <li>
            <span class="bold">1. 개인정보 수집 항목(개인정보 보호법 제15조 제2항)</span><br>
            - 성명, 응시번호, 휴대폰 번호, 전자 우편 주소
        </li>
        <li>
            <span class="bold">2. 개인정보 수집 및 이용 목적(개인정보 보호법 제15조 제2항 제1호)</span><br>
            - 성적 이벤트 등의 본인확인<br>
            - 고지사항 전달, 본인 의사 확인 등 원활한 의사소통 경로의 확보<br>
            - 서비스 이용과 관련된 정보 안내 등 편의제공 목적
        </li>
        <li>
            <span class="bold">3. 개인정보 보유 및 이용기간(개인정보 보호법 제15조 제2항 제3호)</span><br>
            - 수집된 개인정보는 상기 2번의 용도 이외의 목적으로는 사용되지 않습니다.
        </li>
        <li>
            <span class="bold">4.개인정보 수집동의 거부 및 거부에 따른 이용제한(개인정보 보호법 제15조 제2항 제4호)</span><br>
            - 고객님은 개인정보의 수집 및 이용에 대하여 동의를 거부할 수 있습니다.<br>
            - 개인정보 수집에 동의하지 않거나, 부정확한 정보를 입력하는 경우, 본 이벤트 관련 서비스 이용이 제한됨을 알려드립니다.
        </li>
    </ul>
    <div class="stage">
        <input name="is_chk" id="is_chk" type="checkbox" value="Y" ><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
    </div>
</div>
<div class="markSbtn1">
    @if($arr_base['method'] == 'POST')
        <a href="javascript:void(0);" onclick="regiSubmit(); return false;">저 장</a>
    @else
        <a href="javascript:void(0);">입력완료</a>
    @endif
</div>

@if ($arr_member_step['survey_type'] == 'on' && empty($ss_idx) === false)
    <div class="stage">
        <span class="phase">2단계</span> <span class="bold">체감난이도 입력</span>
    </div>
    <form id="survey_answer_form" name="survey_answer_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" name="ss_idx" value="{{ $survey_data['survey']['SsIdx'] or '' }}">
        <input type="hidden" name="member_check_count" value="1">

        <table cellspacing="0" cellpadding="0" class="table_type">
            <col width="30%" />
            <col width="*" />
            {{-- 단일선택형 --}}
            @if(empty($survey_data['question']) === false)
                @foreach($survey_data['question'] as $key => $row)
                    <tr>
                        <th>{{ $row['SqTitle'] }}</th>
                        <td>
                            <ul class="sel_info">
                                @if(empty($row['SqJsonData']) === false)
                                    @foreach($row['SqJsonData'] as $k => $v)
                                        @for($i=1; $i<=$row['SqCnt']; $i++)
                                            <li><input type="radio" name="survey_answer[{{$row['SsqIdx']}}][{{$k}}]"
                                                       class="survey_answer_group" id="survey_answer_{{$row['SsqIdx']}}_{{$k}}_{{$i}}" value="{{$i}}"
                                                       @if($member_answer_data['AnswerInfo'][$row['SsqIdx']][$k] == $i) checked="checked" @endif/>
                                                <label for="survey_answer_{{$row['SsqIdx']}}_{{$k}}_{{$i}}">{{ $v['item'][$i] }}</label>
                                            </li>
                                        @endfor
                                    @endforeach
                                @endif
                            </ul>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </form>
    <div class="markSbtn1">
        <a href="javascript:void(0);" onclick="surveyAnswerSubmit(); return false;">설 문 완 료</a>
    </div>
@endif

@if ($arr_member_step['survey_type'] == 'on' && empty($ss_idx2) === false)
    <div class="stage">
        <span class="phase">2단계</span> <span class="bold">헙법 합격여부</span>
    </div>
    <form id="survey_answer_form2" name="survey_answer_form2" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" name="ss_idx" value="{{ $survey_data2['survey']['SsIdx'] or '' }}">
        <input type="hidden" name="member_check_count" value="1">

        <table cellspacing="0" cellpadding="0" class="table_type">
            <col width="30%" />
            <col width="*" />
            {{-- 단일선택형 --}}
            @if(empty($survey_data2['question']) === false)
                @foreach($survey_data2['question'] as $key => $row)
                    <tr>
                        <th>{{ $row['SqTitle'] }}</th>
                        <td>
                            <ul class="sel_info">
                                @if(empty($row['SqJsonData']) === false)
                                    @foreach($row['SqJsonData'] as $k => $v)
                                        @for($i=1; $i<=$row['SqCnt']; $i++)
                                            <li><input type="radio" name="survey_answer[{{$row['SsqIdx']}}][{{$k}}]"
                                                       class="survey_answer_group2" id="survey_answer_{{$row['SsqIdx']}}_{{$k}}_{{$i}}" value="{{$i}}"
                                                       @if($member_answer_data2['AnswerInfo'][$row['SsqIdx']][$k] == $i) checked="checked" @endif/>
                                                <label for="survey_answer_{{$row['SsqIdx']}}_{{$k}}_{{$i}}">{{ $v['item'][$i] }}</label>
                                            </li>
                                        @endfor
                                    @endforeach
                                @endif
                            </ul>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </form>
    <div class="markSbtn1">
        <a href="javascript:void(0);" onclick="surveyAnswerSubmit2(); return false;">설 문 완 료</a>
    </div>
@endif

@if ($arr_member_step[2] == 'on')
    <div class="stage">
        <span class="phase">3단계</span> <span class="bold">답안 입력</span>
    </div>
    <form id="answer_form" name="answer_form" method="POST" onsubmit="return false;" novalidate>
        <div class="grading_result">
            {!! csrf_field() !!}
            <input type="hidden" name="pr_idx" value="{{$regi_data['PrIdx']}}">
            <input type="hidden" name="predict_idx" value="{{ $predict_idx }}">
            @php $_id=1; @endphp
            @foreach($regi_subject_data as $row)
                <input type="hidden" name="pp_idx[]" value="{{ $row['PpIdx'] }}" />
                <div class="marking">
                    <h5>{{$row['CcdName']}}</h5>
                    <ul>
                        <li>
                            <div>
                                <label>번호</label>
                                <input value="" name="답안입력" id="" placeholder="답안입력" disabled>
                            </div>
                        </li>
                        @foreach($list_question['question_no'][$row['PpIdx']] as $no_key => $no_val)
                            <li>
                                <div>
                                    <label>{{$no_val}}번</label>
                                    <input type="number" class="txt-answer" id="target_{{$_id}}" data-input-id="{{$_id}}" name="answer[{{$row['PpIdx']}}][]" maxlength="5"
                                           oninput="answerDataMaxLengthCheck(this)" value="{{ $list_question['answer'][$row['PpIdx']][$no_key] }}" {{ ($arr_member_step[4] == 'on' ? 'disabled' : '') }}>
                                </div>
                            </li>
                            @php $_id++; @endphp
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </form>
    <div class="markSbtn1 mb35">
        @if ($arr_member_step['answer_submit_type'] == 'on')
            <a href="javascript:void(0)" onclick="answerSubmit(); return false;">채 점 하 기</a>
        @endif
    </div>
@endif

@if ($arr_member_step[3] == 'on')
    <div class="stage">
        <span class="phase">3단계</span> <span class="bold">채점결과 확인</span>
    </div>
    <div>
        <ul class="markTab">
            @foreach($regi_subject_data as $row)
                <li><a href="#tab{{$loop->index}}">{{$row['CcdName']}}</a></li>
            @endforeach
        </ul>
    </div>
    @foreach($regi_subject_data as $row)
        <div id="tab{{$loop->index}}">
            <table cellspacing="0" cellpadding="0" class="table_type">
                <col width="15%" />
                <col width="15%" />
                <col width="15%" />
                <col width="15%" />
                <col width="20%" />
                <col width="20%" />
                <tr class="total">
                    <td dir="ltr" width="88">내점수</td>
                    <td dir="ltr" width="88">{{$row['MyScore']}}점</td>
                    <td dir="ltr" width="88">정답수/총문항</td>
                    <td dir="ltr" width="88">{{$row['MyRightAnswerCnt']}}/{{$row['QuestionCnt']}}</td>
                    <td dir="ltr" width="88">정답률</td>
                    <td dir="ltr" width="88">{{$row['MyRightAnswerAvg']}}%</td>
                </tr>
            </table>

            <table cellspacing="0" cellpadding="0"class="table_type">
                <col width="72" span="10" />
                <tr class="first">
                    <td rowspan="2" dir="ltr" width="72">NO</td>
                    <td rowspan="2" dir="ltr" width="72">정답</td>
                    <td rowspan="2" dir="ltr" width="72">답안</td>
                    <td rowspan="2" dir="ltr" width="72">정오</td>
                    <td rowspan="2" dir="ltr" width="72">정답률</td>
                    <td colspan="5" dir="ltr" width="360">전체 응시자 문항별 선택비율</td>
                </tr>
                <tr class="first">
                    <td dir="ltr" width="72">1</td>
                    <td dir="ltr" width="72">2</td>
                    <td dir="ltr" width="72">3</td>
                    <td dir="ltr" width="72">4</td>
                    <td dir="ltr" width="72">5</td>
                </tr>
                @if (array_key_exists($row['PpIdx'], $regi_question_data) === true)
                    @foreach($regi_question_data[$row['PpIdx']] as $q_row)
                        <tr>
                            <td>{{$q_row['QuestionNO']}}</td>
                            <td>{{$q_row['RightAnswer']}}</td>
                            <td>{{$q_row['Answer']}}</td>
                            <td class="{{($q_row['IsWrong'] == 'Y' ? '' : 'wrong')}}">{{($q_row['IsWrong'] == 'Y' ? 'O' : 'X')}}</td>
                            <td>{{$q_row['rightAnswerAvg']}}%</td>
                            <td class="{{($q_row['max'] == $q_row['answer_1']) ? 'bold' : ''}}">{{$q_row['answer_1']}}%</td>
                            <td class="{{($q_row['max'] == $q_row['answer_2']) ? 'bold' : ''}}">{{$q_row['answer_2']}}%</td>
                            <td class="{{($q_row['max'] == $q_row['answer_3']) ? 'bold' : ''}}">{{$q_row['answer_3']}}%</td>
                            <td class="{{($q_row['max'] == $q_row['answer_4']) ? 'bold' : ''}}">{{$q_row['answer_4']}}%</td>
                            <td class="{{($q_row['max'] == $q_row['answer_5']) ? 'bold' : ''}}">{{$q_row['answer_5']}}%</td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    @endforeach
    <div class="recheck_area">
        <div class="markSbtn2">
            <a href="javascript:void(0);" class="btn-open-tab4">나의 합격예측 바로가기 ></a>
        </div>
        <div class="markSbtn2">
            <a href="javascript:void(0)" onclick="examDeleteAjax();">재채점하기 ></a>
        </div>
    </div>
@endif

@if ($arr_member_step['guide_box_onoff'] == 'on')
    <div class="data_info">
        <p class="data">
            <span class="tx-red guide">[안내]</span><br>현재 데이터를 집계 중이며, 집계 후 공개될 예정입니다. 단, 신뢰할 수 있는 데이터가 부족할 경우 합격예측 서비스 제공이 어려울 수 있습니다.
        </p>
    </div>
@endif

<script type="text/javascript">
    var $regi_form = $('#regi_form');
    var $answer_form = $('#answer_form');
    var $survey_answer_form = $('#survey_answer_form');
    var $survey_answer_form2 = $('#survey_answer_form2');
    var pr_idx = $regi_form.find('input[name="pr_idx"]').val();
    var step_3 = '{{$arr_member_step[3]}}';
    var step_4 = '{{$arr_member_step[4]}}';

    $(document).ready(function() {
        parent.document.getElementById('_pr_id').value = pr_idx;

        //성적확인 및 분석 탭 호출
        if (step_3 == 'on') {
            parent.document.getElementById('_tab3').value = 'Y';
            ajaxHtml3('{{$predict_idx}}', pr_idx, '{{$ss_idx}}', '{{$ss_idx2}}');
        }

        if (step_4 == 'on') {
            parent.document.getElementById('_tab4').value = 'Y';
            ajaxHtml4('{{$predict_idx}}', pr_idx, '{{$ss_idx2}}');
        }

        $('.markTab').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
            $content = $($active[0].hash);
            $links.not($active).each(function () {
                $(this.hash).hide()
            });

            // Bind the click event handler
            $(this).on('click', 'a', function(e){
                /*$active.removeClass('active');*/
                $links.removeClass('active');
                $content.hide();
                $active = $(this);
                $content = $(this.hash);
                $active.addClass('active');
                $content.show();
                e.preventDefault();
            });
        });

        $('.btn-open-tab4').on('click', function (e) {
            if (step_4 != 'on') {
                alert('집계중입니다.');
                return false;
            }
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[1] || $links[1]);
                $content = $($active[0].hash);
                $content.hide();
                $active.removeClass('active');

                $active = $($links.filter('[href="'+location.hash+'"]')[3] || $links[3]);
                $active.addClass('active');
                $content = $($active[0].hash);
                $content.show();

                e.preventDefault();
            });
        });

        $("#take_mock_part").change(function () {
            addSubject($(this).val());
        });

        $(".txt-answer").keyup(function() {
            if (this.value.length == this.maxLength) {
                var id = $(this).data("input-id") + 1;
                $('#target_'+id).focus();
            }
        });
    });

    //직렬별 과목 파라미터 셋팅
    function addSubject(obj) {
        $(".subject_code").remove();
        var html = '';
        if (obj != '') {
            $('._subject_'+obj).each(function() {
                html += '<input type="hidden" class="subject_code" name="subject_p[]" value="'+$(this).val()+'">';
            });
            $("._subject_box").html(html);
        }
    }

    /**
     * 기본정보 저장
     * */
    function regiSubmit() {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.') !!}
        var takenum = $('#take_number').val();
        if ($("#take_mock_part").val() == '') { alert('직렬을 선택해 주세요.'); return false; }
        if ($("#take_area").val() == '') { alert('지역을 선택해 주세요.'); return false; }
        if ($("#take_number").val() == '') { alert('응시번호를 입력해 주세요.'); return false; }
        if (takeNumChk($("#take_mock_part").val(), takenum) != true) { alert('올바른 응시번호가 아닙니다.'); return false; }
        if ($regi_form.find('input[name="is_question_type"]').val() == 'Y' && $("input:radio[name='question_type']").is(':checked') == false) { alert('책형을 선택해 주세요.'); return false; }
        if ($regi_form.find('input[name="is_add_point"]').val() == 'Y' && $("input:radio[name='add_point']").is(':checked') == false) { alert('가산점을 선택해 주세요.'); return false; }
        if($("input:checkbox[id='is_chk']").is(":checked") == false){ alert('개인정보 제공 동의는 필수입니다.'); return false; }

        var _url = '{{ site_url('/fullService/storeRegister') }}';
        ajaxSubmit($regi_form, _url, function(ret) {
            if(ret.ret_cd) {
                alert(ret.ret_msg);
                ajaxHtml2('{{$predict_idx}}', '{{$ss_idx}}', '{{$ss_idx2}}');
            }
        }, showValidateError, null, false, 'alert');
    }

    /**
     * 직렬별 응시번호 체크
     * 체크길이가 0인경우 응시번호 미체크
     * */
    function takeNumChk(take_mock_part, takenum) {
        var number = (isNaN(takenum)) ? 0 : takenum;
        var arrItem = {!! json_encode($arr_base['arr_mock_part_takenum']) !!}

        if (takenum.length != '8') { return false; }
        if (typeof arrItem[take_mock_part] !== 'undefined') {
            if (arrItem[take_mock_part]['ValidateLengthTakeNum'] > 0) {
                var ch = String(number).substr(0, arrItem[take_mock_part]['ValidateLengthTakeNum']);
                if (arrItem[take_mock_part]['ValidateGroupTakeNum'] != ch) {
                    return false;
                }
            }
        } else {
            return false;
        }
        return true;
    }

    //설문
    function surveyAnswerSubmit() {
        var vali_msg = '';

        $('.survey_answer_group').each(function() {
            if($(this).is(':visible')){
                if($('input:radio[name="' + $(this).prop('name') + '"]').is(':checked') === false){
                    /*alert($(this).prop('name'));*/
                    vali_msg = '응답하지 않은 설문이 있습니다.';
                }
            }else{
                $(this).prop("checked",false);
            }
        });

        if(vali_msg){ alert(vali_msg); return; }

        if (confirm('설문을 제출하시겠습니까?')) {
            var _url = '{{ front_url('/fullService/storeSurveyAnswer') }}';
            ajaxSubmit($survey_answer_form, _url, function (ret) {
                if (ret.ret_cd) {
                    alert(ret.ret_msg);
                    ajaxHtml2('{{$predict_idx}}', '{{$ss_idx}}', '{{$ss_idx2}}');
                }
            }, showValidateError, null, false, 'alert');
        }
    }

    function surveyAnswerSubmit2() {
        var vali_msg = '';

        $('.survey_answer_group2').each(function() {
            if($(this).is(':visible')){
                if($('input:radio[name="' + $(this).prop('name') + '"]').is(':checked') === false){
                    /*alert($(this).prop('name'));*/
                    vali_msg = '응답하지 않은 설문이 있습니다.';
                }
            }else{
                $(this).prop("checked",false);
            }
        });

        if(vali_msg){ alert(vali_msg); return; }

        if (confirm('설문을 제출하시겠습니까?')) {
            var _url = '{{ front_url('/fullService/storeSurveyAnswer') }}';
            ajaxSubmit($survey_answer_form2, _url, function (ret) {
                if (ret.ret_cd) {
                    alert(ret.ret_msg);
                    ajaxHtml2('{{$predict_idx}}', '{{$ss_idx}}', '{{$ss_idx2}}');
                }
            }, showValidateError, null, false, 'alert');
        }
    }

    /**
     * 채점
     */
    function answerSubmit() {
        var max = {{(empty($regi_subject_data[0]) === false ? $regi_subject_data[0]['AnswerNum'] : 'null')}};
        var regex = '^[1-' + max + ']+$';
        var chk = '', vali_msg = '', focus_num = 0;
        $('input[name="pp_idx[]"]').each(function(){
            var pp_idx = $(this).val();
            $('input[name="answer['+pp_idx+'][]"]').each(function(){
                focus_num += 1;
                chk = new RegExp(regex, 'gi');
                var val = $(this).val();

                if (val == '') {
                    vali_msg = '답안을 모두 입력해 주세요.';
                    $('#target_'+focus_num).focus();
                    return false;
                }

                if (val.length < 5) {
                    vali_msg = '정답을 모두 입력해주세요.';
                    return false;
                }

                if (!chk.test(val)) {
                    vali_msg = '허용되지 않은 답안입니다.';
                    $('#target_'+focus_num).focus();
                    return false;
                }
            });
            if(vali_msg){ return false; }
        });
        if(vali_msg){ alert(vali_msg); return; }

        if (confirm('정답을 제출하시겠습니까?')) {
            var _url = '{{ front_url('/fullService/storeAnswerPaper') }}';
            ajaxSubmit($answer_form, _url, function (ret) {
                if (ret.ret_cd) {
                    alert(ret.ret_msg);
                    ajaxHtml2('{{$predict_idx}}', '{{$ss_idx}}', '{{$ss_idx2}}');
                }
            }, showValidateError, null, false, 'alert');
        }
    }

    /**
     * 재채점
     */
    function examDeleteAjax() {
        if (confirm('답안을 재입력하실 경우 기존에 입력한 모든 성적데이터는 삭제됩니다.\n답안을 다시 입력하시겠습니까?')) {
            var _url = '{{ front_url('/fullService/examDeleteAjax') }}';
            ajaxSubmit($regi_form, _url, function (ret) {
                if (ret.ret_cd) {
                    alert(ret.ret_msg);
                    /*ajaxHtml2('{{$predict_idx}}', '{{$ss_idx}}');*/
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }
    }

    function answerDataMaxLengthCheck(object) {
        if($(object).prop('type') == 'number') {
            object.value = object.value.replace(/[^1-5.]/g, "");
        }
        if (object.value.length > object.maxLength) {
            object.value = object.value.slice(0, object.maxLength);
        }
    }

    //성적확인 및 분석 탭
    function ajaxHtml3(predict_idx, pr_idx, ss_idx, ss_idx2) {
        var data = {
            'predict_idx' : predict_idx
            ,'pr_idx' : pr_idx
            ,'ss_idx' : ss_idx
            ,'ss_idx2' : ss_idx2
        };
        if (pr_idx == '') { return false; }

        sendAjax('{{front_url('/fullService/ajaxHtml3')}}', data, function(d) {
            $("#tab03").html(d);
        }, showAlertError, false, 'GET', 'html');
    }

    //합격예측 탭
    function ajaxHtml4(predict_idx, pr_idx, ss_idx2) {
        var data = {
            'predict_idx' : predict_idx
            ,'pr_idx' : pr_idx
            ,'ss_idx2' : ss_idx2
        };
        if (pr_idx == '') { return false; }

        sendAjax('{{front_url('/fullService/ajaxHtml4')}}', data, function(d) {
            $("#tab04").html(d);
        }, showAlertError, false, 'GET', 'html');
    }
</script>