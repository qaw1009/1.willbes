<div class="content">
    <div class="eventPop NSK">
        <h3 class="NSK-Black">DAILY QUIZ</h3>
        @if(empty($question_data) === true)
            <div>
                <div class="btnSt01 mt20 tx-right"><a href="javascript:void(0);" onclick="list_quiz('{{ $quiz_id }}'); return false;">전체퀴즈</a></div>
                <ul class="evt-pop-box02 bg-light-gray">
                    <li>조회된 퀴즈가 없습니다.</li>
                </ul>
            </div>
        @else
            <div>
                <ul class="evt-pop-box02 bg-light-gray">
                    <li>
                        <span>{{ $unit_num }}회</span>
                        <span>{{ $question_data['EqsStartDate'] }}</span>
                        <span><a hreft="javascript:void(0);">{{ $question_data['EqsGroupTitle'] }}</a></span>
                    </li>
                </ul>
                <div class="btnSt01 mt20 tx-right"><a href="javascript:void(0);" onclick="list_quiz('{{ $quiz_id }}'); return false;">전체퀴즈</a></div>

                <form name="quiz_regi_form" id="quiz_regi_form" method="POST">
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <input type="hidden" name="quiz_id" value="{{ $quiz_id }}">
                    <input type="hidden" name="quiz_set_id" value="{{ $question_data['EqsIdx'] }}">
                    <input type="hidden" name="question_id" value="{{ $question_data['EqsqIdx'] }}">
                    <input type="hidden" name="unit_num" value="{{ $unit_num }}">
                    <input type="hidden" name="page_num" value="{{ $page_num }}">
                    <input type="hidden" name="answer_num" value="">

                    <div class="question">
                        <span>{{ $next_page }}</span>
                        {{ $question_data['EqsqTitle'] }}
                        <ul>
                            @if (empty($question_detail_data) === false)
                                @foreach($question_detail_data as $row)
                                    <li>
                                        <input type="radio" class="btn-answer-num" name="answer_id" id="answer_num_{{ $loop->index }}" value="{{ $row['EqsqdIdx'] }}" data-answer-num="{{ $loop->index }}"
                                                {{ ($loop->index == $question_data['Answer'] ? 'checked=checked' : '') }}>
                                        <label for="answer_num_{{ $loop->index }}">{{ $row['EqsqdQuestion'] }}</label>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </form>
                @if (empty($question_data['QmdIdx']) === true)
                    <div class="btnSt02 mt20 tx-center"><a href="javascript:void(0);" onclick="storAnswer(); return false;">정답 확인</a></div>
                @endif

                @if (empty($question_data['QmdIdx']) === false)
                    <div class="explain {{ $question_data['IsWrong'] == 'Y' ? '' : 'explain-X' }}">
                        <p class="exp-title">
                            <strong>[정답 {{ implode(',',array_values(array_intersect_key($arr_number_icon, array_flip(explode(',', $question_data['RightAnswer']))))) }} ]</strong>
                            {{ $question_data['IsWrong'] == 'Y' ? 'O 정답입니다.' : 'X 오답입니다.' }}</p>
                        <div class="exp-txt">
                            {!! nl2br($question_data['EqsqExplanation']) !!}
                        </div>
                    </div>
                    <div class="btnSt01 mt40 tx-center">
                        @if($question_count == $next_page)
                            @if($question_data['IsFinish'] != 'Y')
                                <div class="btnSt01 mt40 tx-center"><a href="javascript:void(0);" onclick="finish_quiz('{{ $question_data['QmIdx'] }}');">완료</a></div>
                            @endif
                        @else
                            <a href="javascript:void(0);" onclick="show_quiz('1', '{{ $quiz_id }}', '{{ $question_data['EqsIdx'] }}' ,'{{ $unit_num }}', 'N' ,'Y', '1', 'Y', '{{ $next_page }}'); return false;">
                                다음 문제 →
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".btn-answer-num").on('click', function () {
            document.quiz_regi_form.answer_num.value = $(this).data('answer-num');
        });
    });
</script>