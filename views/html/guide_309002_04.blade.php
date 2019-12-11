@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">전문자격증<span class="row-line">|</span></li>
                <li class="subTit">공인노무사</li>
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
            <span class="depth-Arrow">></span><strong>맞춤형 가이드</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">맞춤형 가이드</h3>
            <h4 class="NGR">공인노무사 1·2차 연간 학사일정</h4>
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
                            <th>7월</th>
                            <th>8월</th>
                            <th>9월</th>
                            <th>10월</th>
                            <th>11월</th>
                            <th>12월</th>
                            <th>1월</th>
                            <th>2월</th>
                            <th>3월</th>
                            <th>4월</th>
                            <th>5월</th>
                            <th>6월</th>
                            <th>7월</th>
                            <th>8월</th>
                        </tr>
                    </theda>
                    <tbody>
                        <tr>
                            <th>1차강의</th>
                            <td colspan="2">기본이론</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td colspan="2">기본이론</td>
                            <td colspan="2">문제풀이</td>
                            <td>최종정리</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <th>2차강의</th>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td colspan="4"> GS0순환<br>(기본강의)</td>
                            <td colspan="3">GS1순환<br>(심화강의)</td>
                            <td colspan="2">GS2순환<br>(핵심&amp;모의고사)</td>
                            <td colspan="2">최종모의고사</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <ul class="guideTab guideTab6ea NGR mt20">
                <li><a href="#tab01" class="on">나는 왕초보</a></li>
                <li><a href="#tab02">직장인 수험생</a></li>
                <li><a href="#tab03">동차 준비생</a></li>
                <li><a href="#tab04">1차시험 경험자</a></li>
                <li><a href="#tab05">1차합격 경험자</a></li>
                <li><a href="#tab06">2차 초시생</a></li>
            </ul>

            <div id="tab01" class="tabCts"> 
                <ul class="st01">
                    <li>9월 이전 입문자 : 공인영어점수 취득 후 위 1~6 단계별 학습</li>
                    <li>12월 이후 입문자 : 공인영어점수 취득 후 위 3,4,5 단계별 학습 후 2차 과정 시작</li>
                </ul>               
                <h4 class="NGR mt20"><span>1 STEP</span> 2차 예비순환 : 9월 ~ 12월</h4>
                <div>
                    <strong>기본강의 : 기본서를 중심으로 한 과목별 체계확립 및 기초개념 정리</strong><br>
                    2차 과목을 어떻게 정복하느냐에 따라 수험기간이 정해진다는 말이 있을 정도로 예비순환(기본강의) 단계는 수험생들에게 2차 과목의 체계를 잡기위한 가장 중요한 시기입니다. 
                    각 과목별 이론에 대한 논리적이고 체계적인 이해를 위함은 물론이고 이론 전반에 대한 폭넓은 이해를 위한 필수적인 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>2 STEP</span> 2차 GS1순환 : 1월 ~ 3월</h4>
                <div>
                    <strong>심화강의 : 기본이론의 반복과 심화이론의 이해/정리 (1차 기본이론강의와 병행함)</strong><br>
                    진도별 기출문제와 예상문제들을 통하여 본격적인 2차 답안작성연습을 연습하는 단계입니다. 매주 진행되는 진도별 모의고사와 강평으로 실전답안작성 능력을 향상시키고 
                    정리강의를 통하여 핵심내용의 압축과 암기가 병행되며, 주요 논점들을 학습하는 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>3 STEP</span> 1차 기본이론강의 : 1월 ~ 3월</h4>
                <div>
                    <strong>1차 합격을 위한 기본이론의 필수이해와 개념정리</strong><br>
                    1차 각 과목별 이론에 대한 논리적이고 체계적인 이해를 위함은 물론이고 이론 전반에 대한 폭넓은 이해를 위한 필수적인 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>4 STEP</span> 1차 문제풀이 : 3월 ~ 4월</h4>
                <div>
                    <strong>동차생을 위한 6주간의 집중 문제풀이 및 핵심 내용 정리 (GS 2순환 병행 가능)</strong><br>
                    각 과목별 중요논점과 출제 빈도수가 높은 내용 위주로 정리하는 강의입니다. 또한 기본이론을 압축하여 문제풀이과정에서 적재적소에 
                    접목시킬 수 있도록 객관식 문제에 대한 해결능력을 배양시킴으로써 실전에 대비할 수 있도록 마련된 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>5 STEP</span> 1차 최종정리 : 5월</h4>
                <div>
                    <strong>출제예상분분을 중심으로 중요이론과 핵심쟁점사항의 단기간 최종 정리</strong><br>
                    1차 과목 마무리 정리를 통하여 취약부분을 최종적으로 확인하고 과목별 빠른 1회독을 확보함으로써 출제예상분분을 중심으로 
                    지금까지 진행된 중요이론과 핵심쟁점사항을 단기간에 최종적으로 정리하는 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>6 STEP</span> 2차 동차반 : 6월 ~ 7월</h4>
                <div>
                    <strong>실전 답안작성 연습과 핵심내용의 압축적 정리 및 암기가 병행 (GS 3순환 병행 가능)</strong><br>
                    답안작성의 반복적인 훈련으로 2차 논문형 필기시험에 대한 실전감각을 유지하고 자신감을 배가시킬 수 있는 강의입니다. 
                    그 동안 축적되어온 중요 논점들을 점검하고 문제풀이해결능력을 실전연습하여 스스로의 문제점을 파악하고 보완해 주며, 
                    가장 중요한 시간안배연습을 통해 실제 시험장에서의 불안요소를 제거할 수 있도록 도와주는 강의입니다. 
                </div>              
            </div>

            <div id="tab02" class="tabCts">
                <ul class="st01">
                    <li>9 ~ 12월 : 토익 등 공인영어 점수를 먼저 취득</li>
                    <li>1월 ~ 5월 : 3,4,5 단계별 학습</li>
                    <li>우선 1차 과목 학습 후 2차 공부 시작 권장</li>
                </ul> 
                <h4 class="NGR mt20"><span>3 STEP</span> 1차 기본이론강의 : 1월 ~ 3월</h4>
                <div>
                    <strong>1차 합격을 위한 기본이론의 필수이해와 개념정리</strong><br>
                    1차 각 과목별 이론에 대한 논리적이고 체계적인 이해를 위함은 물론이고 이론 전반에 대한 폭넓은 이해를 위한 필수적인 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>4 STEP</span> 1차 문제풀이 : 3월 ~ 4월</h4>
                <div>
                    <strong>동차생을 위한 6주간의 집중 문제풀이 및 핵심 내용 정리 (GS 2순환 병행 가능)</strong><br>
                    각 과목별 중요논점과 출제 빈도수가 높은 내용 위주로 정리하는 강의입니다. 또한 기본이론을 압축하여 문제풀이과정에서 적재적소에 
                    접목시킬 수 있도록 객관식 문제에 대한 해결능력을 배양시킴으로써 실전에 대비할 수 있도록 마련된 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>5 STEP</span> 1차 최종정리 : 5월</h4>
                <div>
                    <strong>출제예상분분을 중심으로 중요이론과 핵심쟁점사항의 단기간 최종 정리</strong><br>
                    1차 과목 마무리 정리를 통하여 취약부분을 최종적으로 확인하고 과목별 빠른 1회독을 확보함으로써 출제예상분분을 중심으로 
                    지금까지 진행된 중요이론과 핵심쟁점사항을 단기간에 최종적으로 정리하는 강의입니다.
                </div>
            </div>

            <div id="tab03" class="tabCts">
                <ul class="st01">
                    <li>공인영어점수 취득 후, 1~6 단계별 학습</li>
                    <li>가장 일반적인 학습 진행 방식으로 공인노무사는 1차와 2차를 동시에 준비하는 것이 좋음</li>
                </ul>
                <h4 class="NGR mt20"><span>1 STEP</span> 2차 예비순환 : 9월 ~ 12월</h4>
                <div>
                    <strong>기본강의 : 기본서를 중심으로 한 과목별 체계확립 및 기초개념 정리</strong><br>
                    2차 과목을 어떻게 정복하느냐에 따라 수험기간이 정해진다는 말이 있을 정도로 예비순환(기본강의) 단계는 수험생들에게 2차 과목의 체계를 잡기위한 가장 중요한 시기입니다. 
                    각 과목별 이론에 대한 논리적이고 체계적인 이해를 위함은 물론이고 이론 전반에 대한 폭넓은 이해를 위한 필수적인 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>2 STEP</span> 2차 GS1순환 : 1월 ~ 3월</h4>
                <div>
                    <strong>심화강의 : 기본이론의 반복과 심화이론의 이해/정리 (1차 기본이론강의와 병행함)</strong><br>
                    진도별 기출문제와 예상문제들을 통하여 본격적인 2차 답안작성연습을 연습하는 단계입니다. 매주 진행되는 진도별 모의고사와 강평으로 실전답안작성 능력을 향상시키고 
                    정리강의를 통하여 핵심내용의 압축과 암기가 병행되며, 주요 논점들을 학습하는 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>3 STEP</span> 1차 기본이론강의 : 1월 ~ 3월</h4>
                <div>
                    <strong>1차 합격을 위한 기본이론의 필수이해와 개념정리</strong><br>
                    1차 각 과목별 이론에 대한 논리적이고 체계적인 이해를 위함은 물론이고 이론 전반에 대한 폭넓은 이해를 위한 필수적인 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>4 STEP</span> 1차 문제풀이 : 3월 ~ 4월</h4>
                <div>
                    <strong>동차생을 위한 6주간의 집중 문제풀이 및 핵심 내용 정리 (GS 2순환 병행 가능)</strong><br>
                    각 과목별 중요논점과 출제 빈도수가 높은 내용 위주로 정리하는 강의입니다. 또한 기본이론을 압축하여 문제풀이과정에서 적재적소에 
                    접목시킬 수 있도록 객관식 문제에 대한 해결능력을 배양시킴으로써 실전에 대비할 수 있도록 마련된 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>5 STEP</span> 1차 최종정리 : 5월</h4>
                <div>
                    <strong>출제예상분분을 중심으로 중요이론과 핵심쟁점사항의 단기간 최종 정리</strong><br>
                    1차 과목 마무리 정리를 통하여 취약부분을 최종적으로 확인하고 과목별 빠른 1회독을 확보함으로써 출제예상분분을 중심으로 
                    지금까지 진행된 중요이론과 핵심쟁점사항을 단기간에 최종적으로 정리하는 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>6 STEP</span> 2차 동차반 : 6월 ~ 7월</h4>
                <div>
                    <strong>실전 답안작성 연습과 핵심내용의 압축적 정리 및 암기가 병행 (GS 3순환 병행 가능)</strong><br>
                    답안작성의 반복적인 훈련으로 2차 논문형 필기시험에 대한 실전감각을 유지하고 자신감을 배가시킬 수 있는 강의입니다. 
                    그 동안 축적되어온 중요 논점들을 점검하고 문제풀이해결능력을 실전연습하여 스스로의 문제점을 파악하고 보완해 주며, 
                    가장 중요한 시간안배연습을 통해 실제 시험장에서의 불안요소를 제거할 수 있도록 도와주는 강의입니다. 
                </div>               
            </div>

            <div id="tab04" class="tabCts">
                <ul class="st01">
                    <li>9월 이전 시작 : 1 ~ 6 단계별 학습</li>
                    <li>1차 과목은 어느 정도 실력이 갖추어져 있다는 전제하에 평상시에는 2차 위주로 공부를 하다가 1월 이후부터 1차 시험에 집중</li>
                </ul>
                <h4 class="NGR mt20"><span>1 STEP</span> 2차 예비순환 : 9월 ~ 12월</h4>
                <div>
                    <strong>기본강의 : 기본서를 중심으로 한 과목별 체계확립 및 기초개념 정리</strong><br>
                    2차 과목을 어떻게 정복하느냐에 따라 수험기간이 정해진다는 말이 있을 정도로 예비순환(기본강의) 단계는 수험생들에게 2차 과목의 체계를 잡기위한 가장 중요한 시기입니다. 
                    각 과목별 이론에 대한 논리적이고 체계적인 이해를 위함은 물론이고 이론 전반에 대한 폭넓은 이해를 위한 필수적인 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>2 STEP</span> 2차 GS1순환 : 1월 ~ 3월</h4>
                <div>
                    <strong>심화강의 : 기본이론의 반복과 심화이론의 이해/정리 (1차 기본이론강의와 병행함)</strong><br>
                    진도별 기출문제와 예상문제들을 통하여 본격적인 2차 답안작성연습을 연습하는 단계입니다. 매주 진행되는 진도별 모의고사와 강평으로 실전답안작성 능력을 향상시키고 
                    정리강의를 통하여 핵심내용의 압축과 암기가 병행되며, 주요 논점들을 학습하는 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>3 STEP</span> 1차 기본이론강의 : 1월 ~ 3월</h4>
                <div>
                    <strong>1차 합격을 위한 기본이론의 필수이해와 개념정리</strong><br>
                    1차 각 과목별 이론에 대한 논리적이고 체계적인 이해를 위함은 물론이고 이론 전반에 대한 폭넓은 이해를 위한 필수적인 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>4 STEP</span> 1차 문제풀이 : 3월 ~ 4월</h4>
                <div>
                    <strong>동차생을 위한 6주간의 집중 문제풀이 및 핵심 내용 정리 (GS 2순환 병행 가능)</strong><br>
                    각 과목별 중요논점과 출제 빈도수가 높은 내용 위주로 정리하는 강의입니다. 또한 기본이론을 압축하여 문제풀이과정에서 적재적소에 
                    접목시킬 수 있도록 객관식 문제에 대한 해결능력을 배양시킴으로써 실전에 대비할 수 있도록 마련된 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>5 STEP</span> 1차 최종정리 : 5월</h4>
                <div>
                    <strong>출제예상분분을 중심으로 중요이론과 핵심쟁점사항의 단기간 최종 정리</strong><br>
                    1차 과목 마무리 정리를 통하여 취약부분을 최종적으로 확인하고 과목별 빠른 1회독을 확보함으로써 출제예상분분을 중심으로 
                    지금까지 진행된 중요이론과 핵심쟁점사항을 단기간에 최종적으로 정리하는 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>6 STEP</span> 2차 동차반 : 6월 ~ 7월</h4>
                <div>
                    <strong>실전 답안작성 연습과 핵심내용의 압축적 정리 및 암기가 병행 (GS 3순환 병행 가능)</strong><br>
                    답안작성의 반복적인 훈련으로 2차 논문형 필기시험에 대한 실전감각을 유지하고 자신감을 배가시킬 수 있는 강의입니다. 
                    그 동안 축적되어온 중요 논점들을 점검하고 문제풀이해결능력을 실전연습하여 스스로의 문제점을 파악하고 보완해 주며, 
                    가장 중요한 시간안배연습을 통해 실제 시험장에서의 불안요소를 제거할 수 있도록 도와주는 강의입니다. 
                </div>               
            </div>

            <div id="tab05" class="tabCts">
                <ul class="st01">
                    <li>9월 이전 시작 : 1, 2, 4, 5, 6 단계별 학습</li>
                    <li>1차 과목은 충분히 합격할 실력이 갖추어져 있다는 전제하에 전체적으로 2차 위주로 공부를 하다가 3월 이후부터 1차 시험에 집중</li>
                </ul>
                <h4 class="NGR mt20"><span>1 STEP</span> 2차 예비순환 : 9월 ~ 12월</h4>
                <div>
                    <strong>기본강의 : 기본서를 중심으로 한 과목별 체계확립 및 기초개념 정리</strong><br>
                    2차 과목을 어떻게 정복하느냐에 따라 수험기간이 정해진다는 말이 있을 정도로 예비순환(기본강의) 단계는 수험생들에게 2차 과목의 체계를 잡기위한 가장 중요한 시기입니다. 
                    각 과목별 이론에 대한 논리적이고 체계적인 이해를 위함은 물론이고 이론 전반에 대한 폭넓은 이해를 위한 필수적인 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>2 STEP</span> 2차 GS1순환 : 1월 ~ 3월</h4>
                <div>
                    <strong>심화강의 : 기본이론의 반복과 심화이론의 이해/정리 (1차 기본이론강의와 병행함)</strong><br>
                    진도별 기출문제와 예상문제들을 통하여 본격적인 2차 답안작성연습을 연습하는 단계입니다. 매주 진행되는 진도별 모의고사와 강평으로 실전답안작성 능력을 향상시키고 
                    정리강의를 통하여 핵심내용의 압축과 암기가 병행되며, 주요 논점들을 학습하는 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>3 STEP</span> 1차 기본이론강의 : 1월 ~ 3월</h4>
                <div>
                    <strong>1차 합격을 위한 기본이론의 필수이해와 개념정리</strong><br>
                    1차 각 과목별 이론에 대한 논리적이고 체계적인 이해를 위함은 물론이고 이론 전반에 대한 폭넓은 이해를 위한 필수적인 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>4 STEP</span> 1차 문제풀이 : 3월 ~ 4월</h4>
                <div>
                    <strong>동차생을 위한 6주간의 집중 문제풀이 및 핵심 내용 정리 (GS 2순환 병행 가능)</strong><br>
                    각 과목별 중요논점과 출제 빈도수가 높은 내용 위주로 정리하는 강의입니다. 또한 기본이론을 압축하여 문제풀이과정에서 적재적소에 
                    접목시킬 수 있도록 객관식 문제에 대한 해결능력을 배양시킴으로써 실전에 대비할 수 있도록 마련된 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>5 STEP</span> 1차 최종정리 : 5월</h4>
                <div>
                    <strong>출제예상분분을 중심으로 중요이론과 핵심쟁점사항의 단기간 최종 정리</strong><br>
                    1차 과목 마무리 정리를 통하여 취약부분을 최종적으로 확인하고 과목별 빠른 1회독을 확보함으로써 출제예상분분을 중심으로 
                    지금까지 진행된 중요이론과 핵심쟁점사항을 단기간에 최종적으로 정리하는 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>6 STEP</span> 2차 동차반 : 6월 ~ 7월</h4>
                <div>
                    <strong>실전 답안작성 연습과 핵심내용의 압축적 정리 및 암기가 병행 (GS 3순환 병행 가능)</strong><br>
                    답안작성의 반복적인 훈련으로 2차 논문형 필기시험에 대한 실전감각을 유지하고 자신감을 배가시킬 수 있는 강의입니다. 
                    그 동안 축적되어온 중요 논점들을 점검하고 문제풀이해결능력을 실전연습하여 스스로의 문제점을 파악하고 보완해 주며, 
                    가장 중요한 시간안배연습을 통해 실제 시험장에서의 불안요소를 제거할 수 있도록 도와주는 강의입니다. 
                </div>               
            </div>

            <div id="tab06" class="tabCts">
                <ul class="st01">
                    <li>7월 이후 : 아래 2차 연간 일정 1 ~ 4 단계별 학습</li>
                    <li>지금까지 1차 과목에만 전념했거나 2차 과목의 기본개념이 아직 잡히지 않았다면 기초부터 차근차근</li>
                </ul>
                <h4 class="NGR mt20"><span>1 STEP</span> 2차 예비순환 : 9월 ~ 12월</h4>
                <div>
                    <strong>기본강의 : 기본서를 중심으로 한 과목별 체계확립 및 기초개념 정리</strong><br>
                    2차 과목을 어떻게 정복하느냐에 따라 수험기간이 정해진다는 말이 있을 정도로 예비순환(기본강의) 단계는 수험생들에게 2차 과목의 체계를 잡기위한 가장 중요한 시기입니다. 
                    각 과목별 이론에 대한 논리적이고 체계적인 이해를 위함은 물론이고 이론 전반에 대한 폭넓은 이해를 위한 필수적인 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>2 STEP</span> 2차 GS1순환 : 1월 ~ 3월</h4>
                <div>
                    <strong>심화강의 : 기본이론의 반복과 심화이론의 이해/정리 (1차 기본이론강의와 병행함)</strong><br>
                    진도별 기출문제와 예상문제들을 통하여 본격적인 2차 답안작성연습을 연습하는 단계입니다. 매주 진행되는 진도별 모의고사와 강평으로 실전답안작성 능력을 향상시키고 
                    정리강의를 통하여 핵심내용의 압축과 암기가 병행되며, 주요 논점들을 학습하는 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>3 STEP</span> 1차 기본이론강의 : 1월 ~ 3월</h4>
                <div>
                    <strong>1차 합격을 위한 기본이론의 필수이해와 개념정리</strong><br>
                    1차 각 과목별 이론에 대한 논리적이고 체계적인 이해를 위함은 물론이고 이론 전반에 대한 폭넓은 이해를 위한 필수적인 강의입니다.
                </div>
                <h4 class="NGR mt20"><span>4 STEP</span> 1차 문제풀이 : 3월 ~ 4월</h4>
                <div>
                    <strong>동차생을 위한 6주간의 집중 문제풀이 및 핵심 내용 정리 (GS 2순환 병행 가능)</strong><br>
                    각 과목별 중요논점과 출제 빈도수가 높은 내용 위주로 정리하는 강의입니다. 또한 기본이론을 압축하여 문제풀이과정에서 적재적소에 
                    접목시킬 수 있도록 객관식 문제에 대한 해결능력을 배양시킴으로써 실전에 대비할 수 있도록 마련된 강의입니다.
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