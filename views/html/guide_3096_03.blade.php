@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">고등고시<span class="row-line">|</span></li>
                <li class="subTit">PSAT</li>
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
            <span class="depth-Arrow">></span><strong>수험정보</strong>
            <span class="depth-Arrow">></span><strong>시험일정 및 응시자격</strong>
        </span>
    </div>
        <div class="Content p_re">
            <div class="w-Guide">
                <h3 class="NSK-Black">연간학습계획</h3>
                <ul class="guideTab NGR">
                    <li><a href="#tab01" class="on">국립외교원 2차</a></li>
                    <li><a href="#tab02">PSAT(5급공채 1차)</a></li>
                </ul>

                <div id="tab01" class="tabCts">
                    <h4 class="NGR">국립외교원 2차대비 연간 강좌 소개</h4>
                    <div>
                        <table cellspacing="0" cellpadding="0" class="table-Guided">
                            <colgroup>
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
                            </thead>
                            <tbdoy>
                                <tr>
                                    <td rowspan="2" colspan="2">중요과목<br />
                                        기본강의<br />
                                        (입문단계)</td>
                                    <td colspan="2">GS3순환</td>
                                    <td colspan="2">GS4순환</td>
                                    <td rowspan="2" colspan="3">GS1순환<br />
                                        (중급단계)</td>
                                    <td rowspan="2" colspan="3">GS2순환<br />
                                        (심화단계)</td>
                                </tr>
                                <tr>
                                    <td colspan="4">예비순환(초급단계)</td>
                                </tr>
                                <tr>
                                    <td rowspan="2" colspan="2">기초실력배양<br />
                                        기본서중심학습</td>
                                    <td colspan="2">답안현출능력 배양과<br />약점보완단계<br />
                                        (1일 1시간 모의고사)</td>
                                    <td colspan="2">예상문제/출제포인트 점검/핵심정리<br />
                                        사항을 통한 마무리 점검<br />
                                        (1일 1시간 - 모의고사)</td>
                                    <td rowspan="2" colspan="3">기본이론의 체계적 정리<br />
                                        연습문제/중요사례/논문분석등을<br />통한 심화학습진행<br />
                                        (3일에 1회 모의고사 진행)</td>
                                    <td rowspan="2" colspan="3">이론의 입체적 연결 및<br />
                                        사례/쟁점의 완벽한 정리로<br />답안작성증력강화<br />
                                        (2일에 1회 모의고사 </td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                    <h4 class="NGR mt20">2차 논문형 필기시험</h4>
                    <div>
                        2차 논문형 필기시험은 필수4과목과 선택1과목으로 구성되는데 2시간에 약 10장의 답안지를 작성해야하는 어려운 관문입니다.
                        답안을 작성하기위한 이론 등의 지식은 기본이 되어야 함은 물론이며 그러한 지식을 채점위원이 원하는 방향,
                        즉 고득점 획득을 위한 답안으로 잘 풀어써야 하며 정해진 시간 내에 작성해야 하므로 꾸준한 반복연습이 필요합니다.
                        따라서 본원에서 진행되는 2차관련 수업도 답안작성을 위한 이론의 습득 및 실전연습을 위주로 구성되어 있습니다.
                        그럼 각 순환별 수업의 중요 내용과 특징을 간략히 설명드리겠습니다.
                    </div>
                    <ul class="st01 mt20">
                        <li>
                            <strong><span class="tx-blue">1~2월</span> : 입문강의 <br>
                                “수험에 처음 입문하는 수험생을 위한 기초이론중심의 강의입니다.”</strong><br>
                            답안을 쓸 수 있는 기본이론의 큰 그림을 이해하는 것이 무엇보다 중요합니다. 각 과목의 전문적인 이론을 습득, 응용하기 위한 첫 걸음이 될 수 있는 전체내용에 대한 이해위주의 강의입니다.
                            정평한 기본서를 통한 기존 기본강의보다 쉬운 입문자 강의로 향후 진행되는 예비순환 강의의 전반적인 내용을 이해하고 정리하는데 큰 도움이 됩니다.
                        </li>
                        <li>
                            <strong><span class="tx-blue">3~6월</span> : 예비순환 <br>
                                “기본서를 중심으로 진행되는 이론위주의 강의입니다.”</strong><br>
                            합격생들이 이구동성(異口同聲)으로 강조하는 공부방법론 중 하나가 기본서의 회독입니다.
                            기본서의 회독 수에 따라 수험기간이 정해진다는 말이 있을 정도로 기본서의 중요성은 강조됩니다.
                            각 이론에 대한 논리적이고 체계적 이해를 위함은 물론이고 2차 답안작성시 올바른 문장의 선택과 논리적 전개 등에 많은 도움이 되며 각 이론 전반에 대한 폭넓은 이해를 위해 필수적입니다.
                            따라서 예비순환에서는 정평한 기본서를 중심으로 수업이 진행됩니다. 기본이론의 전반적인 내용들을 이해위주로 학습하는 순환입니다.
                            그리고 1주일에 1회(1시간 50점)의 모의고사를 통해 2차 답안작성의 기초연습이 병행됩니다.
                        </li>
                        <li>
                            <strong><span class="tx-blue">7~10월</span> : GS1순환  <br>
                                “이론의 내용정리 완성과 답안작성(목차정리와 정렬)연습을 시작하는 강의입니다.”</strong><br>
                            기본이론의 반복학습과 심화이론의 정리를 통하여 이론의 전반을 완성하는 단계입니다.
                            예비순환에서 학습한 기본이론의 반복을 통한 확인학습과 2차 답안작성에 필요한 전반적 이론의 체계적 정리와 심화학습이 진행되며 주 2회(1시간50점) 복습모의고사를 통하여 중요논점을 학습합니다.
                        </li>
                        <li>
                            <strong><span class="tx-blue">11~12월</span> : GS2순환 <br>
                                “2회독 정도의 학습이 이루어진 수험생에 적합하며 답안구성능력을 완성하는 단계의 강의입니다.”</strong><br>
                            중요논점들의 핵심정리와 격일(1시간 50점)로 진행되는 복습모의고사, 강평, 기출문제/예상문제풀이 등을 통하여 본격적인 답안작성 연습과 완성을 위한 수업이 진행됩니다.
                            중요문제들을 이용한 핵심이론의 점검과 정리가 이루어지는 순환입니다.
                        </li>
                        <li>
                            <strong><span class="tx-blue">다음해 ~ 3월</span> : GS3순환 <br>
                                “매일 1시간(50점) 모의고사를 통한 실전연습과 이론 전반에 대한 단권화를 위한 강의입니다.”</strong><br>
                            기본기가 확립된 수험생에게 적합한 강의로 1차(PSAT)시험 후 시작됩니다.
                            매일 진행되는 모의고사와 강평으로 실전답안작성 능력을 향상시키고 정리강의를 통하여 핵심내용의 압축과 암기가 병행되는 단계이며(각 과목 수험량을 줄이는데 큰 도움이 되는 순환입니다.),
                            답안작성의 반복적 훈련으로 2차 논문형 필기시험에 대한 실전감각을 유지하고 자신감을 배가시킬 수 있는 강의입니다.
                        </li>
                        <li>
                            <strong><span class="tx-blue">6월</span> : GS4순환  <br>
                                “매일 2시간(100점) 모의고사가 진행되는 실전위주의 최종정리 강의입니다.”</strong><br>
                            답안작성의 반복적 훈련으로 2차 논문형 필기시험에 대한 실전감각을 유지하고 자신감을 배가시킬 수 있는 강의입니다.
                            각종 시사이슈를 반영한 예상문제의 확인 및 출제경향 분석을 통한 암기사항 등의 집중정리로 완벽한 최종점검을 위한 수업이 진행됩니다.
                            (실전문제와 핵심심화이론을 확실하게 정리할 수 있는 순환입니다.)
                        </li>
                    </ul>
                </div>

                <div id="tab02" class="tabCts">
                    <h4 class="NGR">PSAT(5급공채 1차)대비 PSAT 연간 강좌 소개</h4>
                    <div>
                        <table cellspacing="0" cellpadding="0" class="table-Guided">
                            <colgroup>
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
                                <th>7월</th>
                                <th>8월</th>
                                <th>9월</th>
                                <th>10월</th>
                                <th>11월</th>
                                <th>12월</th>
                                <th>1월</th>
                                <th>2월</th>
                            </tr>
                            <thead>
                            <tbody>
                            <tr>
                                <th>강좌</th>
                                <td colspan="3">기출문제강의<br />
                                    (초급단계)</td>
                                <td colspan="3">기본강의<br />
                                    (기본단계)</td>
                                <td colspan="2">심화강의<br />
                                    (중급단계)</td>
                                <td colspan="2">집중+모강<br />
                                    (심화단계)</td>
                                <td>최종정리<br />
                                    (마무리단계)</td>
                            </tr>
                            <tr>
                                <th>강의<br />
                                    특징</th>
                                <td colspan="3">기출문제를 통한<br />
                                    기본이론 이해</td>
                                <td colspan="3">기본이론의<br />이해와 정리</td>
                                <td colspan="2">심화문제를 위주로<br />기본이론 내용<br />마지막 점검</td>
                                <td colspan="2">객관식 문제에 대한<br />적응력 강화,<br />단권화 완성</td>
                                <td>종합적 검토 및<br />최종정리</td>
                            </tr>
                            <tr>
                                <th>수강<br />
                                    대상</th>
                                <td colspan="3">출제경향 검토와<br />자기 위치의<br /> 파악이 필요한 수험생</td>
                                <td colspan="3">기본이론정리를<br />원하는 수험생</td>
                                <td colspan="2">문제를 통한 <br />본이론 점검이<br />필요한 수험생</td>
                                <td colspan="2">이론의 종합적<br />정리를 원하는 수험생,<br />객관식 문제풀이를 원하는 수험생</td>
                                <td>출제 가능성 있는<br />부분에 대한 집중적인<br />최종학습을 원하는 수험생</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <h4 class="NGR mt20">PSAT 선택형 필기시험</h4>
                    <ul class="st01 mt20">
                        <li>
                            <strong><span class="tx-blue">3~4월</span> : 기출문제강의<br>
                                “PSAT 입문시 필수적인 기출문제 강의입니다.”</strong><br>
                            PSAT를 처음 접할시에는 공부방법이 참 막연합니다. 기출문제강의를 통해 자신을 점검하고, 취약한 영역 또는 부분을 보완하기 위한 준비를 할 수 있습니다.
                            또한, 출제유형 및 경향에 맞게 학습방향을 잡아가는 초석이 되는 강의입니다. 강의는 기출문제풀이와 쟁점이론 강의로 이루어집니다.
                        </li>
                        <li>
                            <strong><span class="tx-blue">5월, 7월</span> : 기본강의<br>
                                “영역별 기본이론 습득을 통해 문제를 용이하게 해결할 수 있도록 하는 강의입니다.”</strong><br>
                            기출문제를 통해 자기점검 후 실전문제 풀이에 필요한 기본이론을 습득하는 과정입니다. 이론을 접목시켜 문제의 유형을 파악하고,
                            체계적인 이론의 정립이 이루어질 수 있도록 중요 논점을 정리합니다.
                        </li>
                        <li>
                            <strong><span class="tx-blue">10~12월</span> : 심화/집중강의<br>
                                “기본이론의 정립 후 중요이론 위주로 심화된 내용을 정리하는 강의입니다.”</strong><br>
                            각 영역별 중요논점과 출제 빈도수가 높은 내용을 위주로 정리하는 단계입니다.
                            또한 기본이론을 압축하여 문제풀이과정에서 적재적소에 접목시킬 줄 아는 능력을 배양시킴으로써 실전에 대비할 수 있도록 합니다.
                        </li>
                        <li>
                            <strong><span class="tx-blue">1~2월</span> : 모의고사강의<br>
                                “실제시험과 같은 모의고사와 해설강의를 통해 실전감각을 향상시키는 강의입니다.”</strong><br>
                            실전모의고사를 통해 실전훈련을 하는 과정입니다. 그 동안 축적되어온 기본이론과 문제풀이해결능력을 실전연습하여 스스로의 문제점을 파악하고 보완해야 합니다.
                            그리고 가장 중요한 시간안배연습을 통해 실제시험장에서의 불안요소를 제거할 수 있도록 합니다.
                        </li>
                        <li>
                            <strong><span class="tx-blue">전국모의고사</span><br>
                                “4월부터 다음해 시험 직전까지 자신의 위치를 파악합니다”</strong><br>
                            기본기가 확립된 수험생에게 적합한 강의로 1차(PSAT)시험 후 시작됩니다.
                            <div>
                                <table cellspacing="0" cellpadding="0" class="table-Guided">
                                    <colgroup>
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
                                    <tr>
                                        <th>4월</th>
                                        <th>5월</th>
                                        <th>6월</th>
                                        <th>7월</th>
                                        <th>8월</th>
                                        <th>9월</th>
                                        <th>10월</th>
                                        <th>11월</th>
                                        <th>12월</th>
                                        <th>1월</th>
                                        <th>시험 2주전</th>
                                    </tr>
                                    <tr>
                                        <td colspan="3">기본 전국모의고사</td>
                                        <td colspan="3">심화 전국모의고사</td>
                                        <td colspan="5">실전 전국모의고사</td>
                                    </tr>
                                </table>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="Quick-Bnr ml20">
            <img src="{{ img_url('sample/banner_180605.jpg') }}">     
        </div>
    </div>
@stop