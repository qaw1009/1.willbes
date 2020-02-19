@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">전문자격증<span class="row-line">|</span></li>
                <li class="subTit">감정평가사</li>
            </ul>
            <ul class="menu-List">
                <li class="dropdown">
                    <a href="#none">교수진소개</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">교수진소개 메인</li>
                            <li><a href="#none">신규강좌게시판</li>
                            <li><a href="#none">경제학</a></li>
                            <li><a href="#none">행정법</a></li>
                            <li><a href="#none">행정학</a></li>
                            <li><a href="#none">정치학</a></li>
                            <li><a href="#none">국제법</a></li>
                            <li><a href="#none">재정학</a></li>
                            <li><a href="#none">정책학</a></li>
                            <li><a href="#none">정보체계론</a></li>
                            <li><a href="#none">국제경제학</a></li>
                            <li><a href="#none">교육학</a></li>
                            <li><a href="#none">PSAT</a></li>
                            <li><a href="#none">영어</a></li>
                            <li><a href="#none">한국사능력검정시험</a></li>
                            <li class="Tit">교수님 홈</li>
                            <li><a href="#none">개설강좌</a></li>
                            <li><a href="#none">무료강좌</a></li>
                            <li><a href="#none">공지사항</a></li>
                            <li><a href="#none">학습자료실</a></li>
                            <li><a href="#none">수강후기</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">학원강의신청</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">학원강의신청</a></li>
                            <li><a href="#none">방문결제접수</a></li>
                            <li><a href="#none">학원공지사항</a></li>
                            <li><a href="#none">강의실배정표</a></li>
                            <li><a href="#none">강의시간표</a></li>
                            <li><a href="#none">강의자료실</a></li>
                            <li><a href="#none">강의계획서</a></li>
                            <li><a href="#none">전국모의고사</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">온라인수강신청</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">단강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="#none">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">수험정보</a></li>
                            <li><a href="#none">학습가이드</a></li>
                            <li><a href="#none">시험통계</a></li>
                            <li><a href="#none">수험 FAQ</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">교재구매</a>
                </li>
                <li class="dropdown">
                    <a href="#none">고객센터</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">고객센터 HOME</a></li>
                            <li><a href="#none">자주하는 질문</a></li>
                            <li><a href="#none">공지사항</a></li>
                            <li><a href="#none">1:1 상담</a></li>
                            <li class="Tit">수강지원</li>
                            <li><a href="#none">PC원격지원</a></li>
                            <li><a href="#none">학습프로그램설치</a></li>
                        </ul>
                    </div>
                </li>
                <li class="hanlim3094">
                    <a href="#none" target="_self">
                        학원 방문 결제 
                        <span class="arrow-Btn">></span>
                    </a>
                </li>
            </ul>
        </h3>
    </div>

    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>시험안내</strong>
            <span class="depth-Arrow">></span><strong>입문가이드</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">입문가이드</h3>
            <ul class="guideTab NGR">
                <li><a href="#tab01" class="on">입문자를 위한 안내</a></li>
                <li><a href="#tab02">공부방법론 안내</a></li>
            </ul>

            <div id="tab01" class="tabCts">
                <h4 class="NGR">1차, 2차 연간 정규커리큘럼</h4>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="10%">
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>3월</th>
                                <th>4월</th>
                                <th>5월</th>
                                <th>6월 </th>
                                <th>7월</th>
                                <th>8월</th>
                                <th>9월</th>
                                <th>10월</th>
                                <th>11월</th>
                                <th>12월</th>
                                <th>1월</th>
                                <th>2월</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1차 과정</th>
                                <td colspan="3">
                                
                                </td>
                                <td>입문강의</td>
                                <td colspan="2">기본이론</td>
                                <td colspan="2">핵심이론</td>
                                <td colspan="2">문제풀이</td>
                                <td>진도별 
                                모의고사</td>
                                <td>최종
                                마무리</td>
                            </tr>
                            <tr>
                                <th rowspan="2">2차 과정</th>
                                <td colspan="4">기본이론</td>
                                <td colspan="3">0기 스터디<br />
                                ＊기본서 정리 <br />
                                및 답안 작성 연습</td>
                                <td colspan="3">1기 스터디<br />
                                ＊진도별 모의고사 <br />
                                및 단권화</td>
                                <td colspan="2">2기 스터디<br />
                                ＊진도별 심화<br />
                                모의고사</td>
                            </tr>
                            <tr>
                                <td colspan="2">3기 스터디<br />
                                ＊전범위 실전 모의고사Ⅰ</td>
                                <td colspan="2">4기 스터디<br />
                                ＊전범위 실전  모의고사Ⅱ</td>
                                <td colspan="8"> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="NGR mt20">1차 대비</h4>
                <h5 class="NGR">- 0단계 : 기본이론(3월~6월)</h5>
                <div>
                    <strong>수험에 처음 입문하는 수험생을 위한 기본강의 </strong><br>
                    감정평가사 자격증 취득에 가장 근본이 되는 단계<br>
                    각 과목별 이론에 대한 논리적이고 체계적인 이해를 위한 필수 단계
                </div>
                <h5 class="NGR mt10">- 1단계 : 0기 스터디(6월~8월) </h5>
                <div>
                    <strong>2차 과목들의 이론 정리 완성과 답안작성(목차정리와 정렬)연습을 시작하는 강의</strong><br>
                    기본이론의 반복학습과 심화이론의 정리를 통해 각 과목별 이론의 전반을 완성하는 단계<br>
                    2차 답안작성에 필요한 전반적 이론의 체계적 정리와 심화학습이 진행되며, 과목별 답안작성(목차정리와 정렬)연습을 시작하는 단계
                </div>
                <h5 class="NGR mt10">- 2단계 : 1기 스터디(9월~12월)</h5>
                <div>
                    <strong>매주 과목별 50~80점 진도별 실전 모의고사를 통해 실전연습과 과목별 단권화를 위한 강의</strong><br>
                    진도별 기출문제와 예상문제들을 통하여 본격적인 2차 답안작성(실전답안)을 연습하는 단계<br>
                    매주 진행되는 진도별 50~80점 모의고사와 강평으로 실전답안작성 능력을 향상시키고 강평을 통해  핵심내용의 압축과 암기가 병행되며, 중요 논점들을 학습하는 단계
                </div>
                <h5 class="NGR mt10">- 3단계 : 2기 스터디(12월~2월)</h5>
                <div>
                    <strong>매주 과목별 100점 진도별 실전 모의고사를 통해 실전연습과 중요 논점들을 정리하는 강의</strong><br>
                    2단계에서 진행된 내용을 다시 한번 점검하고 진도별 예상문제들을 통하여 2차 답안작성을 완성하는 단계<br>
                    매주 진행되는 진도별 100점 실전모의고사와 강평으로 실전답안작성 능력을 완성시키고 정리강의를 통해  핵심내용과 중요 논점들을 정리하는 단계
                </div>
                <h5 class="NGR mt10">- 4단계 : 3기 스터디(3월~4월)</h5>
                <div>
                    <strong>매주 100점 모의고사가 진행되는 실전 감각을 향상시키는 강의</strong><br>
                    답안작성의 반복적인 훈련으로 2차 논술형 필기시험에 대한 실전감각을 유지하고 자신감과 실력을 증진 시키는 단계
  2단계, 3단계를 통해 축적한 중요 논점들을 재점검하고 문제풀이해결능력을 실전 연습하여 스스로의 문제점을 파악하고 
  보완하는 단계
  실제 시험에서 가장 중요한 시간안배연습을 도와주는 단계
                </div>
                <h5 class="NGR mt10">- 5단계 : 최종 마무리(2월)</h5>
                <div>
                    <strong>시험 전 빠르게 내용을 정리하는 핵심체크 강의</strong><br>
                    시험 전 핵심쟁점사항과 중요이론을 빠르게 1회독 하는 단계<br>
                    취약부분을 최종적으로 확인하고 출제예상부분을 중심으로 단기간에 최종적으로 정리하는 단계
                </div>

                <h4 class="NGR mt20">2차 대비</h4>
                <h5 class="NGR">- 0단계 : 입문강의 - 회계원리(6월) </h5>
                <div>
                    <strong>5과목 중 과락률이 제일 높은 회계학의 기초를 다지는 필수 과정</strong><br>
                    1차 시험 응시를 위한 첫 입문 단계<br>
                    중급회계인 회계학을 공부하기 위한 필수 요소인 초급회계에 해당하는 과정
                </div>
                <h5 class="NGR mt10">- 1단계 : 기본이론(7월~8월) </h5>
                <div>
                    <strong>과목별 기본을 다지고 수험에 필요한 내용을 정립하는 첫 강의</strong><br>
                    1차 시험을 본격적으로 시작하며 합격의 기반이 되는 필수 단계<br>    
                    각 과목별 이론에 대한 논리적이고 체계적인 이해를 위한 단계
                </div>
                <h5 class="NGR mt10">- 2단계 : 핵심이론(9월~10월) </h5>
                <div>
                    <strong>6개월 단기반의 첫 시작이며, 이론을 빠르게 정리하는 강의</strong><br>
                    핵심이론 과정을 통해 기존 수강생은 이론을 더 탄탄하게 다지고, 6개월 단기 합격을 노리는 수험생들은 이론을 빠르게 정리해볼 수 있는 최적의 단계<br>
                    각 과목별 중요 논점과 출제 빈도수가 높은 내용 위주로 이론을 빠르게 정리하는 단계 
                </div>
                <h5 class="NGR mt10">- 3단계 : 문제풀이(11월~12월) </h5>
                <div>
                    <strong>중요 이론위주로 심화된 내용을 정리+기출·예상문제를 통해 객관식 문제의 적응력을 키워주는 강의</strong><br>
                    각 과목별 중요 논점과 출제 빈도수가 높은 내용들 위주로 정리하는 단계 <br>
                    객관식 문제를 푸는데 있어 이론을 적재적소에 접목시킬 수 있는 해결 능력을 배양시키는 단계
                </div>
                <h5 class="NGR mt10">- 4단계 : 진도별 모의고사(1월)</h5>
                <div>
                    <strong>실제 시험과 같은 모의고사를 진도별로 확인하고 해설 강의를 통해 실전감각을 향상시키는 강의</strong><br>
                    진도별 모의고사를 통해 실전훈련과 약점을 파악하는 단계 <br>
                    축적된 기본이론과 문제풀이 해결능력으로 진도별 모의고사를 풀어봄으로써, 실제 시험과 같은 긴장을 유지하면서, 시간배분까지 컨트롤하는 연습을 하는 단계
                </div>
                <h5 class="NGR mt10">- 5단계 : 최종 마무리(2월)</h5>
                <div>
                    <strong>시험 전 빠르게 내용을 정리하는 핵심체크 강의</strong><br>
                    시험 전 핵심쟁점사항과 중요이론을 빠르게 1회독 하는 단계<br>
                    취약부분을 최종적으로 확인하고 출제예상부분을 중심으로 단기간에 최종적으로 정리하는 단계
                </div>
            </div>

            <div id="tab02" class="tabCts">
                <h4 class="NGR">판례 학습 방법</h4>
                <div>
                    다수의견과 소수의견의 대립선상에서 학설의 경향까지 안다면 금상첨화일 것이며, 평소 스터디를 통해서나 또는 나만의 암기노트를 만들어 정리를 해놓는 방법이 좋을 것입니다. 
                    그러나 해선 안 될 것이 모든 판례를 다보고가겠다는 것입니다. 너무 많은 판례를 공부하기보다는 수험가에서 가장 많이 보는 판례교재나 각 학원에서 언급하는 핵심판례위주로 
                    학습하면서 최신 판례를 보충함이 더욱 경제적이면서 효율적이리라 봅니다. 
                </div>
                <h4 class="NGR mt20">스터디 활용 방법</h4>
                <div>
                    혼자서 할 것인가, 스터디를 할 것인가에 대해서 많은 수험생들이 문의를 하곤 합니다. 이에 대한 정설은 없지만 많은 합격생들의 조언을 종합해 보면 처음에는 
                    혼자서 공부하는 방법이 좋을 듯 하고, 어느 정도 실력이 쌓인 후에는 스터디를 권장하고 싶습니다. 
                </div>
                <h4 class="NGR mt20">오답노트</h4>
                <div>
                    객관식 문제는 정확성과 다양한 지식을 요하므로 오답노트의 활용이 중요한데 문제를 풀 때 틀린 문제는 간략한 핵심단어위주로 재구성하여 마지막 점검할 때 도움이 
                    되도록 하였는데 주로 출제 가능한 지문을 오답으로 작성하였습니다. 특히 기본서의 중요논점위주로 오답노트를 만들어 재빨리 훑어보면 시험장에서 큰 효과를 보게 됩니다. 
                </div>
                <h4 class="NGR mt20">양 줄이기</h4>
                <div>
                    시험에서 나오는 부분과 거의 나오지 않는 부분이 있습니다. 그런데 그 짧은 수험기간동안 모든 부분을 놓치지 않으려고 하다가 막상 시험 결과에서는 불합격의 쓴맛을 보는 경우가 많습니다. 
                    물론 내용에 대한 정확한 숙지와 이해를 전체로 해야겠지만 시험이 점점 다가올수록 양을 줄여나가는 공부가 필요합니다. 
                    key-word를 중심으로 정리하는 것도 양을 줄일 수 있는 방법입니다. 중요한 내용은 깊이 있게 공부하고 나머지는 불의타를 대비해 간략하게 체크하면서 넘어가는 과감성이 필요한 것입니다. 
                </div>
                <h4 class="NGR mt20">단권화 방법</h4>
                <div>
                    단권화가 좋을지 서브노트가 좋을지에 대한 왕도는 없고 시간적 여유가 있는가의 여부도 고려하여 판단해야 할 텐데 굳이 예를 들자면, 학습량이 상대적으로 적고, 고득점이 가능한 과목은 서브노트를 작성하고, 
                    점수얻기가 쉽지 않거나 정리가 잘 안 되는 과목은 단권화를 해보는 것도 좋을 듯합니다. 
                </div>
                <h4 class="NGR mt20">모의고사</h4>
                <div>
                    시험과 관련해서 강조 드리고 싶은 것 중의 하나는 모의고사의 절대중요성입니다. 그 이유는 매번 시험에 응시하여 예습과 복습을 행하고, 
                    그 진도에 맞추어 성실히 준비해나가는 과정에서 성큼 합격은 다가오는 것이기 때문입니다. 그러나 모의고사를 풀면서 끊임없이 엄청난 스트레스와 싸워내야 한다는 
                    점에서 이것이 생각만큼 쉽지는 않았던 것 같습니다. 특히, 실전에서의 훈련이 부족하거나 잦은 실수로 원하는 만큼의 결과를 올리지 못하는 수험생의 경우 실전문제와 
                    유사한 형식의 모의고사 풀이 통한 실전적응 훈련을 통해 단기간에 실력을 비약적으로 행상시킬 수 있는 가장 효율적인 학습방법이 바로 모의고사의 활용이라고 말씀드리고 싶습니다.
                </div>
                <h4 class="NGR mt20">암기의 중요성</h4>
                <div>
                    중요한 것은 멋진 서브나 단권화노트를 만드는 것이 아닙니다. 교재를 이해한 후 그것을 정리한 내용이 시험장에서 문제지를 받고 푸는 그 순간에 내 머리 속에 있는가 하는 것입니다. 
                    대부분 수험생이 시험 막판 한 달까지 멋진 서브를 만드느라 혼신의 힘을 다하려고 노력하지만 요즘 시험 출제경향상 결코 공부량이 적지 않기에 대충 내용 정리만 하는 데에 급급할 뿐 
                    효과적인 암기는 자연히 소홀히 할 수밖에 없는 것이 현실입니다. 따라서 각 과목 서브를 한번 밖에 못보고 들어가게 되어 시험장에서 눈물짓는 일이 생기곤 합니다. 
                    암기가 중요하다는 점 잊지 마시길 바랍니다. 결국 시험을 치르는 그 순간에는 ‘자기 자신’과 ‘시험지’ 그리고 ‘필기구’밖에 없습니다. 
                </div>
                <h4 class="NGR mt20">막판 정리 방법</h4>
                <div>
                    - 어느 시험이든지 막판 정리가 제일 중요할 텐데 특히 객관식시험에서는 시험전날 한번이라도 전체를 훑고 들어갈 수 있느냐가 합격여부를 좌우 할 수 있는 것 같습니다. 
                    그러나 시험 과목을 모두 보고 간다는 것이 쉽지는 않기 때문에 중요하다고 생각되는 부분과 그동안 공부하면서 체크해놓은 부분을 중심으로 하여 읽고 들어갔습니다.<br>
                    - 시험 전 날 밤 전체적으로 한번 스크린해야만 선명한 답안을 작성할 수 있기에 막판정리는 그야말로 시험이라는 전투에서 날쌘 무기와도 같다고 불 수 있습니다. 
                </div>
            </div>
        </div>      
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop