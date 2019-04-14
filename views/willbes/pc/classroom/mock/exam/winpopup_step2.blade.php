@extends('willbes.pc.layouts.master_popup')
@section('content')
<!-- Popup -->
<div class="Popup ExamBox">
    <div class="popTitBox">
        <div class="pop-Tit NG"><img src="/public/img/willbes/mypage/logo.gif"> 전국 모의고사</div>
        <div class="pop-subTit">{{ $productInfo['ProdName'] }}</div>
    </div>
    <div class="popupContainer mg-zero">
        <div class="examSjBx">
            <div class="inner">
                <h3>응시과목 : </h3>
                <ul class="sj"> <!-- exam-temp / exam-fin / exam-ing -->
                    @foreach($pList as $key => $row)
                        @if($key == 0)
                            <li>
                                <a class="@if($pMpIdx[$key] == element('s_mpidx', $arr_input) || empty(element('s_mpidx', $arr_input))===true) exam-ing @endif
                                @if($qtList[$pMpIdx[$key]]['CNT'] == $qtList[$pMpIdx[$key]]['TCNT']) exam-fin @elseif($qtList[$pMpIdx[$key]]['CNT'] > 0) exam-temp @endif"
                                href="javascript:blinkTab('{{ $pMpIdx[$key] }}')" onclick="">{{ $row }}</a>
                            </li>
                        @else
                            <li>
                                <span class="row-line">|</span>
                                <a class="@if($pMpIdx[$key] == element('s_mpidx', $arr_input)) exam-ing @endif
                                @if($qtList[$pMpIdx[$key]]['CNT'] == $qtList[$pMpIdx[$key]]['TCNT']) exam-fin @elseif($qtList[$pMpIdx[$key]]['CNT'] > 0) exam-temp @endif"
                                href="javascript:blinkTab('{{ $pMpIdx[$key] }}')" onclick="">{{ $row }}</a>
                            </li>
                        @endif
                    @endforeach
                    @if($sList)
                        @foreach($sList as $key => $row)
                            <li>
                                <span class="row-line">|</span>
                                <a class="@if($sMpIdx[$key] == element('s_mpidx', $arr_input)) exam-ing @endif
                                @if($qtList[$sMpIdx[$key]]['CNT'] == $qtList[$sMpIdx[$key]]['TCNT']) exam-fin @elseif($qtList[$sMpIdx[$key]]['CNT'] > 0) exam-temp @endif"
                                href="javascript:blinkTab('{{ $sMpIdx[$key] }}')" onclick="">{{ $row }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div class="countTime">남은시간 : <span id="timer" class="time">--:--:--</span></div>
            </div>
        </div>
        <!-- //응시과목 -->

        <div class="examPaperWp">
            <div class="exam-paper mt50">
                <ul>
                    <!-- 문제이미지 -->
                    @foreach($question_list as $key => $row)
                    <li id="que{{ $key + 1 }}" name="que{{ $key + 1 }}">
                        <a>{{ $key + 1 }}.</a>
                        <span class="que"><img src="{{ $row['QFilePath'] }}{{ $row['file'] }}"></span>
                    </li>
                    @endforeach
                    <!-- 문제이미지 -->
                </ul>
            </div>
            <form class="form-horizontal" id="url_form" name="url_form" method="POST" action="/classroom/MockExam/winpopupstep2" onsubmit="return false;">
                {!! csrf_field() !!}
                <input type="hidden" name="prodcode" value="{{ element('prodcode', $arr_input) }}" />
                <input type="hidden" name="mridx" value="{{ element('mridx', $arr_input) }}" />
                <input type="hidden" name="logidx" value="{{ element('logidx', $arr_input) }}" />
                <input type="hidden" id="rSec" name="RemainSec" value="444" />
                <input type="hidden" id="mpidx" name="s_mpidx" value="{{ $s_mpidx }}" />
            </form>
            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                <input type="hidden" name="MrIdx"    value="{{ $MrIdx }}">
                <input type="hidden" name="ProdCode" value="{{ element('prodcode', $arr_input) }}">
                <input type="hidden" name="LogIdx"   value="{{ element('logidx', $arr_input) }}" />
                <input type="hidden" name="MpIdx"    value="{{ $s_mpidx }}">

                <input type="hidden" id='mqidx' name="MqIdx" value="">
                <input type="hidden" id='answer' name="Answer" value="">
                <input type="hidden" id="rSec2" name="RemainSec" value="" />
            </form>
            <form id="all_regi_form" name="all_regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                <input type="hidden" name="MrIdx"    value="{{ $MrIdx }}">
                <input type="hidden" name="ProdCode" value="{{ element('prodcode', $arr_input) }}">
                <input type="hidden" name="LogIdx"   value="{{ element('logidx', $arr_input) }}" />
                <input type="hidden" name="MpIdx"    value="{{ $s_mpidx }}">
                <input type="hidden" id='QCnt' name="QCnt"    value="{{ count($question_list) }}">
                <input type="hidden" id="rSec3" name="RemainSec" value="" />

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
                            @foreach($question_list as $key => $row)
                                @if($key == 0)
                                    @for($i = 1; $i <= $row['AnswerNum']; $i++)
                                    <col style="width: 60px;"/>
                                    @endfor
                                @endif
                            @endforeach
                            <col style="width: 65px;"/>
                            <col width="*">
                        </colgroup>
                        <thead>
                        <tr>
                            <th class="ath1">번호</th>
                            @foreach($question_list as $key => $row)
                                @if($key == 0)
                                    @for($i = 1; $i <= $row['AnswerNum']; $i++)
                                        <th>{{ $i }}번</th>
                                    @endfor
                                @endif
                            @endforeach
                            <th class="ath6">고민중</th>
                            <th class="ath7">문제보기</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 정답체크 -->
                        @foreach($question_list as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}<img class="q_img" id='ko{{ $key + 1 }}' src="/public/img/willbes/mypage/icon_question_orange.png" style="display:@if($row['Answer'] === '0') @else none @endif;"></td>
                            @for($i = 1; $i <= $row['AnswerNum']; $i++)
                            <td><input type="radio" id="answer{{ $key + 1 }}" name="answer{{ $key + 1 }}" onClick="answerAjax('{{ $key + 1 }}','{{ $i }}', {{ $row['MqIdx'] }})" value="{{ $i }}" @if($row['Answer'] == $i) checked @endif /></td>
                            @endfor
                            <td><input type="radio" id="answer{{ $key + 1 }}" name="answer{{ $key + 1 }}" onClick="answerAjax('{{ $key + 1 }}','0', {{ $row['MqIdx'] }})" value="0" @if($row['Answer'] === '0') checked @endif /></td>
                            <td class="btnAgR btnc"><a href="#que{{ $key + 1 }}" class="qv btnlineGray">문제보기 ></a>
                                <input type="hidden" name="MqIdx{{ $key + 1 }}" value="{{ $row['MqIdx'] }}">
                            </td>
                        </tr>
                        @endforeach
                        <!-- 정답체크 -->
                        </tbody>
                    </table>
                    <div class="btnAgR btnl c_both NGEB">
                        <a class="f_left btntxtBlack" href="{{ $row['PFilePath'] }}{{ $row['filetotal'] }}" target="_blank">문제 다운로드</a>
                        <!-- 다음과목 -->
                        @foreach($tMpIdx as $key => $row)
                            @if(count($tMpIdx) == $key + 1)
                                @if($tMpIdx[$key] == element('s_mpidx', $arr_input)) <a class="f_right btntxtBlack" href="javascript:blinkTab('{{ $tMpIdx[0] }}')">다음과목 > </a> @endif
                            @else
                                @if($tMpIdx[$key] == element('s_mpidx', $arr_input) || (empty(element('s_mpidx', $arr_input))===true&&$key==0)) <a class="f_right btntxtBlack" href="javascript:blinkTab('{{ $tMpIdx[$key+1] }}')">다음과목 > </a> @endif
                            @endif
                        @endforeach
                        <!-- 다음과목 -->
                    </div>
                    <div class="btnAgR c_both btns NG">
                        <ul>
                            <li><a class="btnBlue" href="#none" onclick="examSave()">정답제출</a></li>
                            <li><a class="btnlightGray" href="javascript:tempSaveAjax()">임시저장</a></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- //popupContainer -->
</div>
<!-- End Popup -->
<script>
    var sec = {{ $RemainSec }};
    var etcALLYN = '{{ $etcALLYN }}';
    var $regi_form = $('#regi_form');
    var $all_regi_form = $('#all_regi_form');
    var qcnt = $('#QCnt').val();

    var timer;
    var tempValue;
    var clickDelay = 'N';
    var endExamYN = 'N';

    //남은시간
    $(document).ready(function() {
        timer = self.setInterval('timeGo()', 1000);
    });

    function timeGo(){
        sec--;
        $('#rSec').val(sec);
        $('#rSec2').val(sec);
        $('#rSec3').val(sec);

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

    function blinkTab(mpidx){
        if($('#timer').html() != "--:--:--") {
            $('#mpidx').val(mpidx);
            if (confirm('이동하시겠습니까?')) {
                document.url_form.submit();
            }
        }
        //location.href(url);
    }

    /////////////////////////////////////////////////////////////////////////////////////////
    //개별문항 저장
    /////////////////////////////////////////////////////////////////////////////////////////
    function answerAjax(qnum, selnum, mqidx){
        var currentValue = qnum+'/'+selnum+'/'+mqidx;

        if(selnum == 0) $('#ko'+qnum).show();
        else            $('#ko'+qnum).hide();


        if(selnum == null){
            window.location.reload();
            return ;
        }
        
        $('#answer').val(selnum);
        $('#mqidx').val(mqidx);

        //광클릭방지
        if(tempValue != currentValue){

            var _url = '{{ front_url('/classroom/MockExam/answerAjax') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    tempValue = qnum+'/'+selnum+'/'+mqidx;
                }
            }, errorReload, null, false, 'alert');

        }
    }

    function errorReload(){
        window.location.reload();
    }

    // 시간저장
    function timeSaveAjax(){
        var _url = '{{ front_url('/classroom/MockExam/timeSaveAjax') }}';
        ajaxSubmit($regi_form, _url, function(ret) {
            if(ret.ret_cd) {
                //alert(ret.ret_msg);
            }
        }, showValidateError, null, false, 'alert');
    }

    //임시저장
    function tempSaveAjax(){

        if($('#timer').html() != "--:--:--") {
            if (clickDelay == 'N') {
                clickDelay = 'Y';
                var _url = '{{ front_url('/classroom/MockExam/tempSaveAjax') }}';
                ajaxSubmit($all_regi_form, _url, function (ret) {
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
    function examSave(){
        if($('#timer').html() != "--:--:--"){
            if($('#rSec').val() <= 0){
                alert('시간이 종료되어 제출이 불가능합니다.');
                return ;
            }

            if(etcALLYN == 'NO'){
                alert('다른 과목에 고민중이거나 풀지 않은 문항이 있습니다.');
                return ;
            }
            for(var i = 1; i <= qcnt; i++){
                var tname = "answer"+i;

                if($("input[name="+tname+"]:checked").val() == 0 || $("input[name="+tname+"]:checked").val() == null){
                    alert('고민중이거나 풀지 않은 문항이 있습니다.');
                    return ;
                }
            }

            if (confirm('정답 제출 후 재응시는 불가능합니다. \n 정답을 제출하시겠습니까?')) {
                timeSaveAjax();
                document.all_regi_form.action = '/classroom/MockExam/winpopupstep3';
                document.all_regi_form.submit();
            }
        }
    }

    function timeover(){
        clearInterval(timer);
        if (confirm('시험이 종료되어 답안을 제출할 수 없습니다. 응시창을 닫으시겠습니까?')) {
            examEndAjax();
            window.close();
        }
        $('#timer').html("00:00:00");
    }

    function examEndAjax(){
        var _url = '{{ front_url('/classroom/MockExam/examEndAjax') }}';
        ajaxSubmit($regi_form, _url, function(ret) {
            if(ret.ret_cd) {
                alert('시험이 종료되었습니다.');
                opener.location.reload();
                window.close();
            }
        }, showValidateError, null, false, 'alert');
    }

    $(window).on('beforeunload ',function() {
        if ($('#timer').html() != "--:--:--") {
            timeSaveAjax();
        }
        if(endExamYN == 'Y'){
            examEndAjax();
        }
    });

    $(function() {
        $(".answerTb tr:nth-child(2n)").addClass("nth");
    });
</script>

@stop
