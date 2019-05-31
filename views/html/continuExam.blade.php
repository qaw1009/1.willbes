@extends('willbes.pc.layouts.master_popup')

@section('content')
<!-- Popup -->
<div class="Popup ExamBox">
    <div class="popTitBox">
		<div class="pop-Tit NG"><img src="{{ img_url('/mypage/logo.gif') }}"> 전국 모의고사</div>
		<div class="pop-subTit">2018 제2회 전국모의고사 (12/03 사행) - 9급 [일행/세무] *선택과목 과학 제외</div>
	</div>
    <div class="popupContainer mg-zero">
        <div class="examSjBx">
            <div class="inner">
                <h3>응시과목 : </h3>
                <ul class="sj">
                    <li><a class="exam-temp" href="" onclick="">국어</a><span class="row-line">|</span></li>    
                    <li><a class="exam-fin" href="" onclick="">영어</a><span class="row-line">|</span></li>
                    <li><a href="" onclick="">한국사</a><span class="row-line">|</span></li>
                    <li><a href="" onclick="">행정법</a><span class="row-line">|</span></li>
                    <li><a class="exam-ing" href="" onclick="">행정학</a></li>
                </ul>
                <div class="countTime">남은시간 : <span id="timer" class="time">01:35:56</span></div>
            </div>
        </div>
        <!-- //응시과목 -->

        <div class="examPaperWp">
            <div class="exam-paper mt50">
                <ul>
                    <li id="que1" name="que1">
                        <a class="strong tx-black underline">01.</a>  
                        <span class="que"><img src="{{ img_url('/sample/imgFileView5.jpg') }}"></span>
                    </li>
                    <li id="que2" name="que2">
                        <a>02.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView6.jpg') }}"></span>
                    </li>
                    <li id="que3" name="que3">
                        <a>03.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView7.jpg') }}"></span>
                    </li>
                    <li id="que4" name="que4">
                        <a>04.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView8.jpg') }}"></span>
                    </li>
                    <li id="que5" name="que5">
                        <a>05.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView5.jpg') }}"></span> 
                    </li>
                    <li id="que6" name="que6">
                        <a>06.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView6.jpg') }}"></span>
                    </li>
                    <li id="que7" name="que7">
                        <a>07.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView7.jpg') }}"></span>
                    </li>
                    <li id="que8" name="que8">
                        <a>08.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView8.jpg') }}"></span>
                    </li>
                    <li id="que9" name="que9">
                        <a>09.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView5.jpg') }}"></span>
                    </li>
                    <li id="que10" name="que10">
                        <a>10.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView6.jpg') }}"></span>  
                    </li>
                    <li id="que11" name="que11">
                        <a>11.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView7.jpg') }}"></span>
                    </li>
                    <li id="que12" name="que12">
                        <a>12.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView8.jpg') }}"></span>
                    </li>
                    <li id="que13" name="que13">
                        <a>13.</a>   
                        <span class="que"><img src="{{ img_url('/sample/imgFileView5.jpg') }}"></span>
                    </li>
                    <li id="que14" name="que14">
                        <a>14.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView6.jpg') }}"></span>
                    </li>
                    <li id="que15" name="que15">
                        <a>15.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView7.jpg') }}"></span>
                    </li>
                    <li id="que16" name="que16">
                        <a>16.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView8.jpg') }}"></span>
                    </li>
                    <li id="que17" name="que17">
                        <a>17.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView5.jpg') }}"></span>
                    </li>
                    <li id="que18" name="que18">
                        <a>18.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView6.jpg') }}"></span>
                    </li>       
                    <li id="que19" name="que19">
                        <a>19.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView7.jpg') }}"></span>
                    </li>
                    <li id="que20" name="que20">
                        <a>20.</a>
                        <span class="que"><img src="{{ img_url('/sample/imgFileView8.jpg') }}"></span>
                    </li>
                </ul>
            </div>
            <div class="answer-sheet">
                <div class="exam-txt">
                    * 모든 과목 & 모든 문항의 답안을 체크하셔야 ‘ 정답제출’ 이 가능합니다.<br/>
                    * 정답제출을 해야만 성적결과를 확인할 수 있습니다.
                </div>
                <table class="answerTb">
                    <colgroup>
                        <col style="width: 60px;"/>
                        <col style="width: 60px;"/>
                        <col style="width: 60px;"/>
                        <col style="width: 60px;"/>
                        <col style="width: 60px;"/>
                        <col style="width: 65px;"/>
                        <col width="*">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="ath1">번호</th>
                            <th>1번</th>
                            <th>2번</th>
                            <th>3번</th>
                            <th>4번</th>
                            <th class="ath6">고민중</th>
                            <th class="ath7">문제보기</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img class="q_img" src="{{ img_url('mypage/icon_question_orange.png') }}"> 1</td>
                            <td><input type="radio" id="ANSWERNUMBER1" name="ANSWERNUMBER1" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER1" name="ANSWERNUMBER1" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER1" name="ANSWERNUMBER1" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER1" name="ANSWERNUMBER1" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER1" name="ANSWERNUMBER1" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que1" class="qv btnlineGray">문제보기 ></a></td>  
                        </tr>
                        <tr>
                            <td><img class="q_img" src="{{ img_url('mypage/icon_question_orange.png') }}"> 2</td>
                            <td><input type="radio" id="ANSWERNUMBER2" name="ANSWERNUMBER2" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER2" name="ANSWERNUMBER2" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER2" name="ANSWERNUMBER2" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER2" name="ANSWERNUMBER2" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER2" name="ANSWERNUMBER2" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que2" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                        <tr>
                            <td><img class="q_img" src="{{ img_url('mypage/icon_question_orange.png') }}"> 3</td>
                            <td><input type="radio" id="ANSWERNUMBER3" name="ANSWERNUMBER3" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER3" name="ANSWERNUMBER3" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER3" name="ANSWERNUMBER3" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER3" name="ANSWERNUMBER3" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER3" name="ANSWERNUMBER3" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que3" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><input type="radio" id="ANSWERNUMBER4" name="ANSWERNUMBER4" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER4" name="ANSWERNUMBER4" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER4" name="ANSWERNUMBER4" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER4" name="ANSWERNUMBER4" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER4" name="ANSWERNUMBER4" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que4" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><input type="radio" id="ANSWERNUMBER5" name="ANSWERNUMBER5" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER5" name="ANSWERNUMBER5" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER5" name="ANSWERNUMBER5" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER5" name="ANSWERNUMBER5" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER5" name="ANSWERNUMBER5" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que5" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><input type="radio" id="ANSWERNUMBER6" name="ANSWERNUMBER6" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER6" name="ANSWERNUMBER6" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER6" name="ANSWERNUMBER6" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER6" name="ANSWERNUMBER6" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER6" name="ANSWERNUMBER6" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que6" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><input type="radio" id="ANSWERNUMBER7" name="ANSWERNUMBER7" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER7" name="ANSWERNUMBER7" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER7" name="ANSWERNUMBER7" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER7" name="ANSWERNUMBER7" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER7" name="ANSWERNUMBER7" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que7" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td><input type="radio" id="ANSWERNUMBER8" name="ANSWERNUMBER8" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER8" name="ANSWERNUMBER8" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER8" name="ANSWERNUMBER8" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER8" name="ANSWERNUMBER8" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER8" name="ANSWERNUMBER8" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que8" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td><input type="radio" id="ANSWERNUMBER9" name="ANSWERNUMBER9" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER9" name="ANSWERNUMBER9" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER9" name="ANSWERNUMBER9" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER9" name="ANSWERNUMBER9" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER9" name="ANSWERNUMBER9" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que9" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td><input type="radio" id="ANSWERNUMBER10" name="ANSWERNUMBER10" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER10" name="ANSWERNUMBER10" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER10" name="ANSWERNUMBER10" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER10" name="ANSWERNUMBER10" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER10" name="ANSWERNUMBER10" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que10" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td><input type="radio" id="ANSWERNUMBER11" name="ANSWERNUMBER11" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER11" name="ANSWERNUMBER11" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER11" name="ANSWERNUMBER11" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER11" name="ANSWERNUMBER11" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER11" name="ANSWERNUMBER11" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que11" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>                  
                        <tr>
                            <td>12</td>
                            <td><input type="radio" id="ANSWERNUMBER12" name="ANSWERNUMBER12" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER12" name="ANSWERNUMBER12" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER12" name="ANSWERNUMBER12" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER12" name="ANSWERNUMBER12" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER12" name="ANSWERNUMBER12" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que12" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td><input type="radio" id="ANSWERNUMBER13" name="ANSWERNUMBER13" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER13" name="ANSWERNUMBER13" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER13" name="ANSWERNUMBER13" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER13" name="ANSWERNUMBER13" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER13" name="ANSWERNUMBER13" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que13" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td><input type="radio" id="ANSWERNUMBER14" name="ANSWERNUMBER14" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER14" name="ANSWERNUMBER14" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER14" name="ANSWERNUMBER14" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER14" name="ANSWERNUMBER14" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER14" name="ANSWERNUMBER14" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que14" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td><input type="radio" id="ANSWERNUMBER15" name="ANSWERNUMBER15" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER15" name="ANSWERNUMBER15" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER15" name="ANSWERNUMBER15" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER15" name="ANSWERNUMBER15" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER15" name="ANSWERNUMBER15" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que15" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>  
                        <tr>
                            <td>16</td>
                            <td><input type="radio" id="ANSWERNUMBER16" name="ANSWERNUMBER16" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER16" name="ANSWERNUMBER16" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER16" name="ANSWERNUMBER16" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER16" name="ANSWERNUMBER16" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER16" name="ANSWERNUMBER16" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que16" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td><input type="radio" id="ANSWERNUMBER17" name="ANSWERNUMBER17" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER17" name="ANSWERNUMBER17" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER17" name="ANSWERNUMBER17" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER17" name="ANSWERNUMBER17" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER17" name="ANSWERNUMBER17" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que17" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td><input type="radio" id="ANSWERNUMBER18" name="ANSWERNUMBER18" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER18" name="ANSWERNUMBER18" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER18" name="ANSWERNUMBER18" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER18" name="ANSWERNUMBER18" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER18" name="ANSWERNUMBER18" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que18" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td><input type="radio" id="ANSWERNUMBER19" name="ANSWERNUMBER19" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER19" name="ANSWERNUMBER19" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER19" name="ANSWERNUMBER19" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER19" name="ANSWERNUMBER19" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER19" name="ANSWERNUMBER19" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que19" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td><input type="radio" id="ANSWERNUMBER20" name="ANSWERNUMBER20" value="1"></td>
                            <td><input type="radio" id="ANSWERNUMBER20" name="ANSWERNUMBER20" value="2"></td>
                            <td><input type="radio" id="ANSWERNUMBER20" name="ANSWERNUMBER20" value="3"></td>
                            <td><input type="radio" id="ANSWERNUMBER20" name="ANSWERNUMBER20" value="4"></td>
                            <td><input type="radio" id="ANSWERNUMBER20" name="ANSWERNUMBER20" value="0"></td>
                            <td class="btnAgR btnc"><a href="#que20" class="qv btnlineGray">문제보기 ></a></td>
                        </tr>
                    </tbody>
                </table>
                <div class="btnAgR btnl c_both NGEB">
                    <a class="f_left btntxtBlack" href="#none">문제 다운로드</a>
                    <a class="f_right btntxtBlack" href="#none">다음과목 ></a>
                </div>
                <div class="btnAgR c_both btns NG">
                    <ul>
                        <li><a class="btnBlue" href="#none" onclick="location.href='{{ site_url('/home/html/endExam') }}'; return false">정답제출</a></li>
                        <li><a class="btnlightGray" href="#none">임시저장</a></li>
                    </ul>
                </div>
            </div>      
        </div>
    </div>
    <!-- //popupContainer -->
</div>
<!-- End Popup -->
<script type="text/javascript">
	$(function() {
        $(".answerTb tr:nth-child(2n)").addClass("nth");
	});
</script>
@stop