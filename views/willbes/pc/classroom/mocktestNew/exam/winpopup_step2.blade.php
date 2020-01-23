@extends('willbes.pc.layouts.master_popup')

@section('content')
    <!-- Popup -->
    <div class="Popup ExamBox">
        <div class="popTitBox">
            <div class="pop-Tit NG"><img src="{{ img_url('/mypage/logo.gif') }}"> 전국 모의고사</div>
            <div class="pop-subTit">{{ $examData['productInfo']['ProdName'] }}</div>
        </div>

        <form id="all_regi_form" name="all_regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" name="mr_idx" value="{{ element('mr_idx',$arr_input) }}"/>
            <input type="hidden" name="prod_code" value="{{ element('prod_code',$arr_input) }}"/>
            <input type="hidden" name="log_idx" value="{{ element('log_idx', $arr_input) }}"/>
            <input type="hidden" name="remain_sec"/>
        </form>
        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field($method) !!}
            <input type="hidden" name="mr_idx" value="{{ element('mr_idx',$arr_input) }}"/>
            <input type="hidden" name="prod_code" value="{{ element('prod_code',$arr_input) }}"/>
            <input type="hidden" name="log_idx" value="{{ element('log_idx', $arr_input) }}"/>
            <input type="hidden" id='mp_idx' name="mp_idx" value="{{ array_key_first($questionData) }}"/>
            <input type="hidden" id='mq_idx' name="mq_idx"/>
            <input type="hidden" id='answer' name="answer"/>
            <input type="hidden" name="remain_sec"/>
            @foreach($examData['qtList'] as $key => $val)
                <input type="hidden" name="q_cnt_{{$key}}" value="{{$val['TCNT']}}"/>
            @endforeach

            <div class="popupContainer mg-zero">
                <div class="examSjBx">
                    <div class="inner">
                        <h3>응시과목 : </h3>
                        <ul class="sj">
                            @foreach($examData['p_subject'] as $key => $val)
                                <li id="button_{{$key}}">
                                    @php
                                        $class = '';
                                        if(empty($examData['qtList'][$key]) === false && ($examData['qtList'][$key]['CNT'] == $examData['qtList'][$key]['TCNT'])) {
                                            $class = 'exam-fin';
                                        } else if (empty($examData['qtList'][$key]) === false && ($examData['qtList'][$key]['CNT'] > 0)) {
                                            $class = 'exam-temp';
                                        }
                                    @endphp
                                    <a href="javascript:void(0);" class="btn-subject {{($loop->first === true) ? 'exam-ing' : ''}} {{$class}}" data-subject-idx="{{$key}}">{{$val}}</a>
                                    @if ($loop->last === false) <span class="row-line">|</span> @endif
                                </li>
                            @endforeach
                            @foreach($examData['s_subject'] as $key => $val)
                                @php
                                    $class = '';
                                    if(empty($examData['qtList'][$key]) === false && ($examData['qtList'][$key]['CNT'] == $examData['qtList'][$key]['TCNT'])) {
                                        $class = 'exam-fin';
                                    } else if (empty($examData['qtList'][$key]) === false && ($examData['qtList'][$key]['CNT'] > 0)) {
                                        $class = 'exam-temp';
                                    }
                                @endphp
                                <li id="button_{{$key}}">
                                    <span class="row-line">|</span>
                                    <a href="javascript:void(0);" class="btn-subject {{$class}}" data-subject-idx="{{$key}}">{{$val}}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="countTime">남은시간 : <span id="timer" class="time">--:--:--</span></div>
                    </div>
                </div>
            </div>

            @foreach($questionData as $subject_key => $subject_data)
                <div class="examPaperWp pb20" id="answer_box_{{$subject_key}}" @if($loop->first !== true) disabled="disabled" style="display: none" @endif>
                    <div class="exam-paper mt50">
                        @if ($examData['productInfo']['PaperType'] == 'I')
                            <ul>
                                {{--문항별이미지--}}
                                @foreach($subject_data as $key => $val)
                                    <li id="que{{$subject_key.'_'.$key}}" name="que{{$subject_key.'_'.$key}}">
                                        <a class="strong tx-black underline">{{ $key }}.</a>
                                        <span class="que"><img src="{{ $val['QFilePath'] }}{{ $val['file'] }}"></span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            {{--문제통파일이미지--}}
                            @if (empty($questionData[$subject_key][key($subject_data)]['PFilePath']) === false && empty($questionData[$subject_key][key($subject_data)]['FrontRealQuestionFile']) === false)
                                <iframe src="{{ $questionData[$subject_key][key($subject_data)]['PFilePath'] . $questionData[$subject_key][key($subject_data)]['FrontRealQuestionFile'] }}" name="frmL" id="frmL" width="99%" height="650px" marginwidth="0" marginheight="0" scrolling="yes" frameborder="0" ></iframe>
                            @endif
                        @endif
                    </div>
                    <div class="answer-sheet">
                        <div class="exam-txt">
                            * 모든 과목 & 모든 문항의 답안을 체크하셔야 ‘ 정답제출’ 이 가능합니다.<br/>
                            * 정답제출을 해야만 성적결과를 확인할 수 있습니다.<br/>
                            * 시험시간이 종료되기 전 답안을 제출해 주세요. 답안을 제출하지 않을 경우 시험 결과를 확인할 수 없습니다.
                            <span style="color:red;">(시험시간 종료 시 답안 제출 불가)</span>
                        </div>
                        <table class="answerTb">
                            <colgroup>
                                <col style="width: 60px;"/>
                                @for($i = 1; $i <= $questionData[array_key_first($questionData)][array_key_first($subject_data)]['AnswerNum']; $i++)
                                    <col style="width: 60px;"/>
                                @endfor
                                <col style="width: 65px;"/>
                                <col width="*">
                            </colgroup>
                            <thead>
                            <tr>
                                <th class="ath1">번호</th>
                                @for($i = 1; $i <= $questionData[array_key_first($questionData)][array_key_first($subject_data)]['AnswerNum']; $i++)
                                    <th>{{ $i }}번</th>
                                @endfor
                                <th class="ath6">고민중</th>
                                @if ($examData['productInfo']['PaperType'] == 'I')
                                    <th class="ath7">문제보기</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            <!-- 정답체크 -->
                            @foreach($subject_data as $key => $row)
                                <tr>
                                    <td>{{$key}}<img class="q_img" id='ko_{{$subject_key.'_'.$key}}' src="/public/img/willbes/mypage/icon_question_orange.png" style="display:@if($row['Answer'] === '0') @else none @endif;"></td>
                                    @for($i = 1; $i <= $row['AnswerNum']; $i++)
                                        <td><input type="radio" class="answer_radio_datas subject_answer_{{$subject_key}}" name="answer_{{$subject_key.'_'.$key}}" onClick="storeRowAnswer('{{$key}}','{{ $i }}', '{{ $row['MqIdx'] }}', '{{$subject_key}}')" value="{{ $i }}" @if($row['Answer'] == $i) checked @endif disabled="disabled"/></td>
                                    @endfor
                                        <td><input type="radio" class="answer_radio_datas subject_answer_{{$subject_key}}" name="answer_{{$subject_key.'_'.$key}}" onClick="storeRowAnswer('{{$key}}','0', '{{ $row['MqIdx'] }}', '{{$subject_key}}')" value="0" @if($row['Answer'] === '0') checked @endif disabled="disabled"/></td>
                                    @if ($examData['productInfo']['PaperType'] == 'I')
                                        <td class="btnAgR btnc"><a href="#que{{$subject_key.'_'.$key}}" class="qv btnlineGray">문제보기 ></a></td>
                                    @endif
                                    <input type="hidden" class="mq_hidden_datas subject_mq_{{$subject_key}}" name="mq_idx_{{$subject_key.'_'.$key}}" value="{{ $row['MqIdx'] }}" disabled="disabled">
                                </tr>
                            @endforeach
                            <!-- 정답체크 -->
                            </tbody>
                        </table>

                        <div class="btnAgR btnl c_both NGEB">
                            @if (empty($questionData[$subject_key][key($subject_data)]['PFilePath']) === false && empty($questionData[$subject_key][key($subject_data)]['filetotal']) === false)
                                <a class="f_left btntxtBlack" href="{{ $questionData[$subject_key][key($subject_data)]['PFilePath'] }}{{ $questionData[$subject_key][key($subject_data)]['filetotal'] }}" target="_blank">
                                    문제 다운로드
                                </a>
                            @else
                                <a class="f_left btntxtBlack" href="javascript:void(0);" onclick="alert('다운로드할 파일이 없습니다.');">문제 다운로드</a>
                            @endif
                            <!-- 다음과목 -->
                                <a href="javascript:void(0);" class="f_right btntxtBlack" id="btn_next_tab">다음과목 > </a>
                            <!-- 다음과목 -->
                        </div>
                        <div class="btnAgR c_both btns NG">
                            <ul>
                                <li><a class="btnBlue" href="javascript:void(0);" onclick="storeAnswer()">정답제출</a></li>
                                <li><a class="btnlightGray" href="javascript:void(0);" onclick="storeAnswerTemp()">임시저장</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </form>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $all_regi_form = $('#all_regi_form');
        var sec = '{{$remain_sec}}';
        var endExamYN = 'N';
        var timer;
        var tempValue;
        var clickDelay = 'N';

        $(document).ready(function() {
            timer = self.setInterval('timeGo()', 1000);
            $(function() {
                $('.answerTb tr:nth-child(2n)').addClass('nth');
            });

            //과목별 문항식별자 초기값 설정
            var this_subject_idx = $('.sj > li:first').find('a').data('subject-idx');
            $('.subject_mq_'+this_subject_idx).prop('disabled', false);
            $('.subject_answer_'+this_subject_idx).prop('disabled', false);


            $('.btn-subject').on('click', function() {
                var subject_idx = $(this).data('subject-idx');
                actionTab(subject_idx);
            });

            $regi_form.on('click', '#btn_next_tab', function() {
                var tab_id = $('.exam-ing').data('subject-idx');
                var next_li = $('#button_'+tab_id).next();
                var next_subject_id = next_li.find('a').data('subject-idx');
                actionTab(next_subject_id);
            });
        });

        //응시과목선택
        function actionTab(target_id)
        {
            if (typeof target_id === 'undefined') {
                target_id = $('.sj > li:first').find('a').data('subject-idx');
            }
            $('.btn-subject').removeClass('exam-ing');
            $('#button_' + target_id + ' > a').addClass('exam-ing');

            $('.examPaperWp').prop('disabled', true);
            $('.examPaperWp').hide();
            $('#answer_box_' + target_id).prop('disabled', false);
            $('#answer_box_' + target_id).show();
            $('#mp_idx').val(target_id);

            $('.mq_hidden_datas').prop('disabled', true);
            $('.subject_mq_'+target_id).prop('disabled', false);

            $('.answer_radio_datas').prop('disabled', true);
            $('.subject_answer_'+target_id).prop('disabled', false);
        }

        function timeGo() {
            sec--;
            $regi_form.find('input[name="remain_sec"]').val(sec);
            $all_regi_form.find('input[name="remain_sec"]').val(sec);

            var hour = parseInt(sec/3600);
            var min  = parseInt((sec%3600)/60);
            var secc = sec%60;

            if(hour < 10) hour = '0'+hour;
            if(min < 10) min = '0'+min;
            if(secc < 10) secc = '0'+secc;

            $('#timer').html(hour + ":" + min + ":" + secc);
            if(sec == 300) alert('종료 5분 전! 시험시간 종료 전 답안을 제출해 주세요 (시간 종료 시 답안 제출 불가)');
            if(sec < 1){
                endExamYN = 'Y';
                timeover();
            }
        }

        // 시간저장
        function timeSaveAjax() {
            var _url = '{{ front_url('/classroom/mocktest/exam/timeSaveAjax') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    //alert(ret.ret_msg);
                }
            }, showValidateError, null, false, 'alert');
        }

        function timeover() {
            clearInterval(timer);
            if (confirm('시험이 종료되어 답안을 제출할 수 없습니다. 응시창을 닫으시겠습니까?')) {
                examEndAjax();
                window.close();
            }
            $('#timer').html("00:00:00");
        }

        function examEndAjax() {
            var _url = '{{ front_url('/classroom/mocktest/exam/examEndAjax') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert('시험이 종료되었습니다.');
                    opener.location.reload();
                    window.close();
                }
            }, showValidateError, null, false, 'alert');
        }

        //개별문항저장
        function storeRowAnswer(qnum, selnum, mqidx, subject_id) {
            var currentValue = qnum+'/'+selnum+'/'+mqidx;

            if (selnum == 0) {
                $('#ko_'+subject_id+'_'+qnum).show();
            } else {
                $('#ko_'+subject_id+'_'+qnum).hide();
            }

            if(isEmpty(selnum) == true){
                window.location.reload();
                return ;
            }
            $('#answer').val(selnum);
            $('#mq_idx').val(mqidx);

            //복수클릭방지
            if(tempValue != currentValue){
                var _url = '{{ front_url('/classroom/mocktest/exam/storeRowAnswer') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        tempValue = qnum+'/'+selnum+'/'+mqidx;
                    }
                }, showValidateError, null, false, 'alert');
            }
        }

        //임시저장
        function storeAnswerTemp(){
            if($('#timer').html() != "--:--:--") {
                if (clickDelay == 'N') {
                    clickDelay = 'Y';
                    var _url = '{{ front_url('/classroom/mocktest/exam/storeAnswerTemp') }}';
                    ajaxSubmit($regi_form, _url, function (ret) {
                        if (ret.ret_cd) {
                            alert(ret.ret_msg);
                        }
                    }, showValidateError, null, false, 'alert');
                }
                setTimeout(function () {
                    clickDelay = 'N'
                }, 2000);
            }
        }

        //시험제출
        function storeAnswer(){
            if($('#timer').html() != "--:--:--"){
                if($('#rSec').val() <= 0){
                    alert('시간이 종료되어 정답제출할 수 없습니다.');
                    return ;
                }

                if (confirm('정답 제출 후 재응시는 불가능합니다. \n정답을 제출하시겠습니까?')) {
                    timeSaveAjax();
                    document.all_regi_form.action = '{{ front_url('/classroom/mocktest/exam/winpopupstep3') }}';
                    document.all_regi_form.submit();
                }
            }
        }

        function isEmpty(str) {
            if(typeof str == "undefined" || str == null || str == "") {
                return true;
            } else {
                return false;
            }
        }

        $(window).on('beforeunload ',function() {
            if ($('#timer').html() != "--:--:--") {
                timeSaveAjax();
            }
            if(endExamYN == 'Y'){
                examEndAjax();
            }
        });
    </script>
@stop