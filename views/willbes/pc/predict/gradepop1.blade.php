@extends('willbes.pc.layouts.master_popup')
@section('content')
    <link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">
    <!-- Container -->
    <style type="text/css">
        .willbes-Layer-PassBox {height:auto; padding:0}
    </style>

    <div class="willbes-Layer-PassBox NGR">
        <div class="markingTilte">
            <span>일반 채점</span>
            <div class="btns3">
                <a href="javascript:window.close()">닫기</a>
            </div>
        </div>
        <div class="omrWarp">
            <!--문제지-->
            <div class="omrL">
                <ul class="tabSt1 NGEB">
                    @foreach($subject_list as $key => $val)
                    <li><a href="{{ front_url('/predict/popwin1/?PredictIdx=').$PredictIdx.'&ppidx='.$val['PpIdx'].'&pridx='.$pridx }}" @if($val['PpIdx'] == $ppidx) class="active" @endif>{{ $val['CcdName'] }}</a></li>
                    @endforeach
                    <li class="tx-red pt10 pl10">※ 과목별 답안 입력 후 저장 버튼을 꼭 클릭해주세요.</li>
                </ul>
                <div class="paper">
                @if($question_list[0]['file'])
                    @if(strpos($question_list[0]['file'], 'pdf') !== false)
                            <iframe src="{{ $filepath }}{{ $question_list[0]['file'] }}" name="frmL" id="frmL" width="99%" height="650px" marginwidth="0" marginheight="0" scrolling="yes" frameborder="0" ></iframe>
                    @else
                            <img src="{{ $filepath }}{{ $question_list[0]['file'] }}" width="100%"/>
                    @endif
                @else
                    <img src="http://file3.willbes.net/new_cop/2018/12/20181221j_default.jpg" width="100%"/>
                @endif
                </div>
            </div>
            <!--omrL//-->
            <form id="all_regi_form" name="all_regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                <input type="hidden" name="PrIdx"    value="{{ $pridx }}">
                <input type="hidden" name="PredictIdx" value="{{ element('PredictIdx', $arr_input) }}">
                <input type="hidden" name="PpIdx"    value="{{ $ppidx }}">
                <input type="hidden" id='QCnt' name="QCnt"    value="{{ count($question_list) }}">

                <!--답안지-->
                <div class="omrR">
                    <p>왼쪽 문제에 맞춰 실제 시험에서 제출한 문항별 답안지를 체크해 주세요.</p>
                    <div>
                        <table class="boardTypeB">
                            <col width="20%" />
                            @foreach($question_list as $key => $row)
                                @if($key == 0)
                                    @for($i = 1; $i <= $row['AnswerNum']; $i++)
                                        <col style="width: 60px;"/>
                                    @endfor
                                @endif
                            @endforeach
                            <tr>
                                <th scope="col">번호</th>
                                @foreach($question_list as $key => $row)
                                    @if($key == 0)
                                        @for($i = 1; $i <= $row['AnswerNum']; $i++)
                                            <th>{{ $i }}번</th>
                                        @endfor
                                    @endif
                                @endforeach
                            </tr>
                            <!-- 정답체크 -->
                            @foreach($question_list as $key => $row)
                                <tr class="check">
                                    <td>{{ $key + 1 }}<img class="q_img" id='ko{{ $key + 1 }}' src="/public/img/willbes/mypage/icon_question_orange.png" style="display:@if($row['Answer'] === '0') @else none @endif;"></td>
                                    @for($i = 1; $i <= $row['AnswerNum']; $i++)
                                        <td><input type="radio" id="answer{{ $key + 1 }}" name="answer{{ $key + 1 }}" value="{{ $i }}" @if($row['Answer'] == $i) checked @endif />
                                            <input type="hidden" name="PqIdx{{ $key + 1 }}" value="{{ $row['PqIdx'] }}">
                                        </td>
                                    @endfor
                                </tr>
                            @endforeach
                            <!-- 정답체크 -->
                        </table>
                        <div class="btns2">
                            <a href="javascript:tempSaveAjax(1)">저장</a>
                        </div>
                    </div>
                    <div class="btns">
                        <a href="javascript:examSave()">채점완료</a> <a href="javascript:examDeleteAjax()" class="btn2">채점취소</a>
                    </div>
                </div><!--omrR//-->
            </form>
        </div><!--omrWarp//-->
    </div>
    <!--willbes-Layer-PassBox//-->
    <script>
        var qcnt = $('#QCnt').val();
        var clickDelay = 'N';
        var etcALLYN = '{{ $etcALLYN }}';
        var $all_regi_form = $('#all_regi_form');
        //임시저장
        function tempSaveAjax(mode){
            if (clickDelay == 'N') {
                clickDelay = 'Y';
                var _url = '{{ front_url('/predict/tempSaveAjax') }}';
                ajaxSubmit($all_regi_form, _url, function (ret) {
                    if (ret.ret_cd) {
                        if(mode == 1) {
                            alert(ret.ret_msg);
                        } else {
                            lastSave();
                        }
                    }
                }, showValidateError, null, false, 'alert');
            }
            setTimeout(function () {
                clickDelay = 'N'
            }, 2000);
        }

        function lastSave(){
            var _url = '{{ front_url('/predict/examSendAjax') }}';
            ajaxSubmit($all_regi_form, _url, function (ret) {
                if (ret.ret_cd) {
                    alert(ret.ret_msg);
                    opener.location.reload();
                    window.close();
                }
            }, showValidateError, null, false, 'alert');
        }

        function examDeleteAjax() {
            /*if (confirm('채점취소시 기존의 성적모든데이터는 삭제됩니다. \n 채점취소 하시겠습니까?')) {
                var _url = '{{ front_url('/predict/examDeleteAjax') }}';
                ajaxSubmit($all_regi_form, _url, function (ret) {
                    if (ret.ret_cd) {
                        alert(ret.ret_msg);
                        opener.location.reload();
                        window.close();
                    }
                }, showValidateError, null, false, 'alert');
            }*/
            window.close();
        }

        //시험제출
        function examSave(){
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

            if (confirm('정답을 제출하시겠습니까?')) {
                tempSaveAjax(2);
            }
        }
    </script>


@stop