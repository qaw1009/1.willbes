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
            <ul class="guideTab guideTab3ea NGR">
                <li><a href="#tab01" class="on">입문자를 위한 안내</a></li>
                <li><a href="#tab02">동차합격 스파르타반 관리 프로그램</a></li>
                <li><a href="#tab03">공부방법론 안내</a></li>
            </ul>

            <div id="tab01" class="tabCts">
                <h4 class="NGR">수험 단계별 강의내용과 특징</h4>
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
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>1월</th>
                                <th>2월</th>
                                <th>3월</th>
                                <th>4월</th>
                                <th>5월</th>
                                <th>6월</th>
                                <th>7월</th>
                                <th>8월</th>
                                <th>9월</th>
                                <th>10월</th>
                                <th>11월</th>
                                <th>12월</th>
                            </tr>
                        </theda>
                        <tbody>
                            <tr>
                                <th>1차강의</th>
                                <td>6단계<br />
                                  진도별 모의고사<br /></td>
                                <td>7단계<br />
                                최종마무리</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td colspan="2">3단계<br />
                                기본강의</td>
                                <td>5단계<br />
                                문제풀이</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <th rowspan="2">2차강의</th>
                              <td colspan="3">2기 스터디</td>
                              <td colspan="3">1단계<br />
                              기본강의</td>
                              <td colspan="3">2단계<br />
                              0기 스터디(문제풀이)</td>
                              <td>&nbsp;</td>
                              <td colspan="2">4단계<br />
                              1기 스터디</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td colspan="2">3기 스터디</td>
                                <td colspan="2">8단계<br />
                                4기 스터디</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h4 class="NGR mt20"><span>1 STEP</span> 2차 기본강의 : 4월 ~ 6월</h4>
                <div>
                    <strong>수험에 처음 입문하는 수험생을 위한 2차 첫 기본강의</strong><br>
                    감정평가사 자격증 취득을 위해 공부량을 100%로 봤을 때 2차 과목의 비중이 약 70~80% 정도 된다고 합격생들은 강조를 합니다. 
                    그만큼 2차 과목을 어떻게 정복하느냐에 따라 수험기간이 정해진다는 말이 있을 정도로 7월은 수험생들에게 2차 과목의 체계를 잡기위한 가장 중요한 시기입니다. 
                    각 과목별 이론에 대한 논리적이고 체계적인 이해를 위함은 물론이고 이론 전반에 대한 폭넓은 이해를 위한 필수적인 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>2 STEP</span> 2차 0기 스터디 : 7월 ~ 9월 </h4>
                <div>
                    <strong>2차 이론의 내용정리 완성과 답안작성(목차정리와 정렬) 연습을 시작하는 강의</strong><br>
                    기본이론의 반복학습과 심화이론의 정리를 통하여 각 과목별 이론의 전반을 완성하는 단계입니다. 
                    기본강의에서 학습한 기본이론의반복을 통한 학인학습과 2차 답안작성에 필요한 전반적 이론의 체계적 정리와 심화학습이 진행되며, 과목별 답안작성(목차정리와 정렬) 연습을 시작하는 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>3 STEP</span> 1차 기본강의 : 9월 ~ 10월</h4>
                <div>
                    <strong>1차 이론의 기본개념 정립과 내용정리를 위한 첫 기본강의</strong><br>
                    1차 각 과목별 이론에 대한 논리적이고 체계적인 이해를 위함은 물론이고 이론 전반에 대한 폭넓은 이해를 위한 필수적인 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>4 STEP</span> 2차 1기 스터디 : 10월 ~ 12월</h4>
                <div>
                    <strong>매주 과목별 50~100점 진도별 실전모의고사를 통해 실전연습과 기본 및 심화이론의 단권화를 위한 강의</strong><br>
                    진도별 기출문제와 예상문제들을 통하여 본격적인 2차 답안작성연습을 연습하는 단계입니다. 
                    매주 진행되는 진도별 모의고사와강평으로 실전답안작성 능력을 향상시키고 정리강의를 통하여 핵심내용의 압축과 암기가 병행되며, 주용 논점들을 학습하는강의입니다.
                </div>
                <h4 class="NGR mt20"><span>4 STEP</span> 2차 2기 스터디 : 1월 ~ 3월</h4>
                <div>
                    <strong>매주 과목별 100점 진도별 실전모의고사를 통해 실전연습과 중요 논점들을 정리하는 강의</strong><br>
                    1기에서 진행된 내용을 다시한번 점검하고 진도별 예상문제들을 통하여 2차 답안작성연습을 완성하는 단계입니다. 
                    매주 진행되는진도별 100점 실전모의고사와 강평으로 실전답안작성 능력을 완성시키고 정리강의를 통하여 핵심내용과 중요 논점들을 정리하는강의입니다.
                </div>
                <h4 class="NGR mt20"><span>4 STEP</span> 2차 3기 스터디 : 3월 ~ 4월</h4>
                <div>
                    <strong>매주 100점 모의고사가 진행되는 실전감각을 향상시키는 강의”</strong><br>
                    답안작성의 반복적인 훈련으로 2차 논문형 필기시험에 대한 실전감각을 유지하고 자신감을 배가시킬 수 있는 강의입니다. 
                    1기와 2기에서그 동안 축적되어온 중요 논점들을 점검하고 문제풀이해결능력을 실전연습하여 스스로의 문제점을 파악하고 보완해 주며, 
                    가장 중요한시간안배연습을 통해 실제 시험장에서의 불안요소를 제거할 수 있도록 도와주는 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>5 STEP</span> 1차 집중+기출예상문제 : 4월 ~ 6월</h4>
                <div>
                    <strong>1차 기본이론의 정립 후 중요 이론위주로 심화된 내용을 정리 + 기출, 예상문제를 통해 객관식 문제의 적응력을 키워주고 해결책을 마련해 주는 강의</strong><br>
                    각 과목별 중요논점과 출제 빈도수가 높은 내용 위주로 정리하는 강의입니다. 
                    또한 기본이론을 압축하여 문제풀이과정에서 적재적소에 접목시킬 수 있도록 객관식 문제에 대한 해결능력을 배양시킴으로써 실전에 대비할 수 있도록 마련된 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>6 STEP</span> 1차 진도별 모강 : 1월 ~ 2월</h4>
                <div>
                    <strong>실제 1차 시험과 같은 모의고사와 해설강의를 통해 실전감각을 향상시키는 강의</strong><br>
                    진도별 실전모의고사를 통해 실전훈련을 하는 강의입니다. 
                    그 동안 축적되어온 기본이론과 문제풀이 해결능력을 실전연습하여 스스로의 문제점을 파악하고 보완하며, 
                    가장 중요한 시간안배연습을 통해 실제 시험장에서 불안요소를 제거할 수 있도록 하기 위한 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>7 STEP</span> 1차 최종마무리 : 2월</h4>
                <div>
                    <strong>1차 마무리 정리를 위한 핵심체크 강의</strong><br>
                    1차 과목 마무리 정리를 통하여 취약부분을 최종적으로 확인하고 과목별 빠른 1회독을 확보함으로써 
                    출제예상분분을 중심으로 지금까지 진행된 중요이론과 핵심쟁점사항을 단기간에 최종적으로 정리하는 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>8 STEP</span> 2차 4기 스터디 : 5월 ~ 6월</h4>
                <div>
                    <strong>매주 100점 모의고사가 진행되는 실전위주의 최종정리 강의</strong><br>
                    답안작성의 반복적인 훈련으로 2차 논문형 필기시험에 대한 실전감각을 유지하고 자신감을 배가시킬 수 있는 강의입니다. 
                    감정평가사업계 각종 시사이슈를 반영한 예상문제의 확인 및 출제경향 분석을 통한 암기사항 등의 집중정리로 완벽한 최종점검을 위한강평과 강의가 진행됩니다. 
                    실전문제와 업계 이슈를 확실히 정리할 수 있는 강의입니다.
                </div>               
            </div>

            <div id="tab02" class="tabCts">
                <h4 class="NGR tx-red">오프라인 학원실강에 한함(상담전화 : 1544-4774)</h4>
                <h5 class="NGR mt20">합격 보장반 - 1차는 최종합격시까지 무한책임</h5>
                <ul class="st01">
                    <li>감정평가사 시험 "최종합격시"까지 1차 전강의 무료제공</li>
                </ul>
                <h5 class="NGR mt20">통제식 전용독서실 - 독서실 출결관리</h5>
                <ul class="st01">
                    <li>독서실에 출석체크기를 비치하여 매일 입/퇴실시 체크하도록 함</li>
                    <li>1주 단위로 담당자가 확인하고 출석 불성실자에 한해 개별상담</li>
                    <li>매월 출결상황를 게시판에 공지하여 출석률를 높이도록 함</li>
                </ul>
                <h5 class="NGR mt20">스터디 매니저</h5>
                <ul class="st01">
                    <li>풍부한 수험경험자에게 시행착오를 줄이고 안정된 수험계획을 수립, 실천하도록 그간의 경험을 나누어 드립니다.</li>
                    <li>수시로 상담을 통해 학습 및 생활에 대한 관리를 도와주며, 수험에 전반적인 내용에 대해 공유함</li>
                </ul>
                <h5 class="NGR mt20">동차합격 스파르타반 혜택</h5>
                <ul class="st01">
                    <li>복습용 동영상 무료제공 : 스파르타반 수강생에 한하여 무료제공</li>
                    <li>기타 특수 수강시 20% 특별할인 적용</li>
                    <li>스터디매니저를 통해 개별스터디 구성</li>
                </ul>
            </div>

            <div id="tab03" class="tabCts">
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