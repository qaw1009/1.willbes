<div class="content">
    <div class="eventPop NSK">
        <h3 class="NSK-Black">DAILY QUIZ</h3>
        <div class="mt80">
            <ul class="evt-pop-box01">
                <li>직전 퀴즈에 참여해 주셔야 다음 퀴즈에 참여하실 수 있습니다.</li>
                <li>한번 체크한 답안은 수정할 수 없습니다.</li>
            </ul>
            <ul class="evt-pop-box02">
                @if (empty($list_member) === true && empty($list_quiz) === true)
                    <li>등록된 퀴즈가 없습니다.</li>
                @else
                    @foreach($list_quiz as $row)
                        <li>
                            <span>{{ $loop->index }}회</span>
                            <span>{{ $row['EqsStartDate'] }}</span>
                            <span>
                                <a href="{{front_url('/quiz/show?quiz_id='.$quiz_id.'&quiz_set_id='.$row['EqsIdx'])}}"
                                   onclick="show_quiz('{{ $quiz_id }}', '{{ $row['EqsIdx'] }}', '{{ $loop->index }}'
                                           , '{{ $row['IsQuizMember'] }}', '{{ $row['ShowType'] }}', '{{ $row['RowNum'] }}', '{{ $member_quiz_today_type }}'); return false;">
                                        {{ $row['EqsGroupTitle'] }}
                                    </a>
                            </span>
                            @if ($row['IsQuizMember'] == 'Y')
                                <span>참여완료</span>
                            @else
                                <span class="tx-red">미참여</span>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>