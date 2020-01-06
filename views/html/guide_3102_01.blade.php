@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">취업<span class="row-line">|</span></li>
                <li class="subTit">공기업</li>
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
            <span class="depth-Arrow">></span><strong>공기업</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">공기업 시험안내</h3>
            <h4 class="NGR">시험안내</h4>

            <div id="tab01" class="tabCts">
                <h5 class="NGR">가. 시험일정</h5>
                <ul class="st01">
                    <li>국가공인급수: 한자실력 사범, 1급, 2급, 3급(이상 4개 급수)</li>
                    <li>교양한자급수: 준3급, 4급, 준4급, 5급, 준5급, 6급, 7급, 8급(이상 8개 급수)</li>
                </ul>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th rowspan="2">구분</th>
                                <th colspan="2">접수기간(인터넷 방문)</th>
                                <th rowspan="2">시험일자</th>
                                <th rowspan="2">발표일자</th>
                            </tr>                        
                            <tr>
                                <th>부터</th>
                                <th>까지</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>제91회</td>
                                <td>18.01.09.(화)</td>
                                <td>18.01.31.(수)</td>
                                <td>18.02.24.(토)</td>
                                <td>18.03.22.(목)</td>
                            </tr>
                            <tr>
                                <td>제92회</td>
                                <td>18.04.10.(화)</td>
                                <td>18.05.02.(수)</td>
                                <td>18.05.26.(토)</td>
                                <td>18.06.21.(목)</td>
                            </tr>
                            <tr>
                                <td>제93회</td>
                                <td>18.07.10.(화)</td>
                                <td>18.08.01.(수)</td>
                                <td>18.08.25.(토)</td>
                                <td>18.09.20.(목)</td>
                            </tr>
                            <tr>
                                <td>제94회</td>
                                <td>18.10.10.(수)</td>
                                <td>18.10.31.(수)</td>
                                <td>18.11.24.(토)</td>
                                <td>18.12.20.(목)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt10">
                    ※ 사정에 따라 시험 일정 및 접수기간은 조정될 수 있습니다.<br>
                    ※ 시험시간 : 매회 전 급수(사범~8급) 오후3시
                </div>

                <h5 class="NGR mt20">나. 한자자격시험 급수현황</h5>
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
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th colspan="2">급수</th>
                                <th>사범</th>
                                <th>1급</th>
                                <th>2급</th>
                                <th>3급</th>
                                <th>준3급</th>
                                <th>4급</th>
                                <th>준4급</th>
                                <th>5급</th>
                                <th>준5급</th>
                                <th>6급</th>
                                <th>7급</th>
                                <th>8급<br>
                                (첫걸음)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="3">평가한자수</td>
                                <td>계</td>
                                <td>5,000자</td>
                                <td>3,500자</td>
                                <td>2,300자</td>
                                <td>1,800자</td>
                                <td>1,350자</td>
                                <td>900자</td>
                                <td>700자</td>
                                <td>450자</td>
                                <td>250자</td>
                                <td>170자</td>
                                <td>120자</td>
                                <td>50자</td>
                            </tr>
                            <tr>
                                <td>선정 
                                한자</td>
                                <td>5,000자</td>
                                <td>3,500자</td>
                                <td>2,300자</td>
                                <td>1,300자</td>
                                <td>1,000자</td>
                                <td>700자</td>
                                <td>500자</td>
                                <td>300자</td>
                                <td>150자</td>
                                <td>70자</td>
                                <td>50자</td>
                                <td>30자</td>
                            </tr>
                            <tr>
                                <td>교과서/실용 <br>
                                한자어</td>
                                <td>고전 및 
                                한시</td>
                                <td>500단어</td>
                                <td>500단어</td>
                                <td>500자<br> 
                                (436단어)</td>
                                <td>350자 <br>
                                (305단어)</td>
                                <td>200자<br> 
                                (156단어)</td>
                                <td>200자 <br>
                                (139단어)</td>
                                <td>150자<br> 
                                (117단어)</td>
                                <td>100자<br> 
                                (62단어)</td>
                                <td>100자 <br>
                                (62단어)</td>
                                <td>70자 <br>
                                (43단어)</td>
                                <td>20자 <br>
                                (13단어)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt10">
                    ※ 한자 자격시험은 사범 ~ 8급까지 총 12개 급수로 구성되어 있습니다.<br>
                    ※ 국가공인 급수는 사범 ~ 3급까지 4개 급수이며, 민간자격법에 의한 교양한자급수는 준3급 ~ 8급까지 8개 급수입니다.<br>
                    ※ 사범은 사서삼경, 명심보감, 고문진보 및 한시에서 널리 통용되는 문장이 출제됩니다.<br>
                    ※ 1급과 2급은 직업분야별 실용한자어, 3급 이하는 교과서 한자어를 뜻합니다. 
                </div>
                
                <h5 class="NGR mt20">다. 급수별 출제 문항수 및 출제기준</h5>
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
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th colspan="2">급수</th>
                                <th>사범</th>
                                <th>1급</th>
                                <th>2급</th>
                                <th>3급</th>
                                <th>준3급</th>
                                <th>4급</th>
                                <th>준4급</th>
                                <th>5급</th>
                                <th>준5급</th>
                                <th>6급</th>
                                <th>7급</th>
                                <th>8급 
                                (첫걸음)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="8">출제기본</td>
                                <td>문항수</td>
                                <td>200</td>
                                <td>150</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>80</td>
                                <td>50</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>주관식</td>
                                <td>75%</td>
                                <td>65%</td>
                                <td>70%</td>
                                <td>70%</td>
                                <td>70%</td>
                                <td>70%</td>
                                <td>70%</td>
                                <td>70%</td>
                                <td>70%</td>
                                <td>60%</td>
                                <td>40%</td>
                                <td>40%</td>
                            </tr>
                            <tr>
                                <td>비율(%) </td>
                                <td>이상</td>
                                <td>이상</td>
                                <td>이상</td>
                                <td>이상</td>
                                <td>이상</td>
                                <td>이상</td>
                                <td>이상</td>
                                <td>이상</td>
                                <td>이상</td>
                                <td>이상</td>
                                <td>이상</td>
                                <td>이상</td>
                            </tr>
                            <tr>
                                <td>주관식</td>
                                <td rowspan="2">150</td>
                                <td rowspan="2">100</td>
                                <td rowspan="2">70</td>
                                <td rowspan="2">70</td>
                                <td rowspan="2">70</td>
                                <td rowspan="2">70</td>
                                <td rowspan="2">70</td>
                                <td rowspan="2">70</td>
                                <td rowspan="2">70</td>
                                <td rowspan="2">50</td>
                                <td rowspan="2">20</td>
                                <td rowspan="2">20</td>
                            </tr>
                            <tr>
                                <td>문항수</td>
                            </tr>
                            <tr>
                                <td>한자쓰기</td>
                                <td>25</td>
                                <td>25</td>
                                <td>25</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>10</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>객관식</td>
                                <td rowspan="2">50</td>
                                <td rowspan="2">50</td>
                                <td rowspan="2">30</td>
                                <td rowspan="2">30</td>
                                <td rowspan="2">30</td>
                                <td rowspan="2">30</td>
                                <td rowspan="2">30</td>
                                <td rowspan="2">30</td>
                                <td rowspan="2">30</td>
                                <td rowspan="2">30</td>
                                <td rowspan="2">30</td>
                                <td rowspan="2">30</td>
                            </tr>
                            <tr>
                                <td>문항수</td>
                            </tr>
                            <tr>
                                <td colspan="2">문항별 배점</td>
                                <td>2</td>
                                <td>2</td>
                                <td>2</td>
                                <td>2</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1.25</td>
                                <td>2</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td colspan="2">만점</td>
                                <td>400</td>
                                <td>300</td>
                                <td>200</td>
                                <td>200</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="NGR mt20">라. 급수별 합격점 기준</h5>
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
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>급수</th>
                                <th>사범</th>
                                <th>1급</th>
                                <th>2급</th>
                                <th>3급</th>
                                <th>준3급</th>
                                <th>4급</th>
                                <th>준4급</th>
                                <th>5급</th>
                                <th>준5급</th>
                                <th>6급</th>
                                <th>7급</th>
                                <th>8급 
                                (첫걸음)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>득점 
                                (%) </td>
                                <td>80% 
                                이상</td>
                                <td>70% 
                                이상</td>
                                <td>70% 
                                이상</td>
                                <td>70% 
                                이상</td>
                                <td>70% 
                                이상</td>
                                <td>70% 
                                이상</td>
                                <td>70% 
                                이상</td>
                                <td>70% 
                                이상</td>
                                <td>70% 
                                이상</td>
                                <td>70% 
                                이상</td>
                                <td>70% 
                                이상</td>
                                <td>70% 
                                이상</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt10">
                    ※ 각 급수별 합격점 기준 이상의 점수를 얻어야 합격할 수 있습니다. 
                </div>

                <h5 class="NGR mt20">마. 급수별 시험시간/출제 유형별 비율</h5>
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
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th colspan="3">급수</th>
                                <th>사범</th>
                                <th>1급</th>
                                <th>2급</th>
                                <th>3급</th>
                                <th>준3급</th>
                                <th>4급</th>
                                <th>준4급</th>
                                <th>5급</th>
                                <th>준5급</th>
                                <th>6급</th>
                                <th>7급</th>
                                <th>8급 
                                (첫걸음)</th>
                            </tr>
                            <tr>
                                <td colspan="3">시험시간</td>
                                <td>120분</td>
                                <td>80분</td>
                                <td>60분</td>
                                <td>60분</td>
                                <td>60분</td>
                                <td>60분</td>
                                <td>60분</td>
                                <td>60분</td>
                                <td>60분</td>
                                <td>60분</td>
                                <td>60분</td>
                                <td>60분</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="10">출제유형 
                                · 
                                비율(%)</td>
                                <td rowspan="5">급수별<br>
                                선정한자</td>
                                <td>훈음</td>
                                <td>25</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>20</td>
                                <td>25</td>
                                <td>25</td>
                            </tr>
                            <tr>
                                <td>독음</td>
                                <td>35</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>20</td>
                                <td>25</td>
                                <td>25</td>
                            </tr>
                            <tr>
                                <td>쓰기</td>
                                <td>25</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <td>10</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>기타</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>소계</td>
                                <td>100</td>
                                <td>65</td>
                                <td>65</td>
                                <td>65</td>
                                <td>65</td>
                                <td>65</td>
                                <td>65</td>
                                <td>65</td>
                                <td>65</td>
                                <td>65</td>
                                <td>65</td>
                                <td>65</td>
                            </tr>
                            <tr>
                                <td rowspan="5">교과서/실용<br>
                                한자어</td>
                                <td>독음</td>
                                <td>-</td>
                                <td>10</td>
                                <td>10</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>용어뜻</td>
                                <td>-</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>쓰기</td>
                                <td>-</td>
                                <td>5</td>
                                <td>5</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>기타</td>
                                <td>-</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>소계</td>
                                <td>-</td>
                                <td>35</td>
                                <td>35</td>
                                <td>35</td>
                                <td>35</td>
                                <td>35</td>
                                <td>35</td>
                                <td>35</td>
                                <td>35</td>
                                <td>35</td>
                                <td>35</td>
                                <td>35</td>
                            </tr>
                            <tr>
                                <td colspan="3">합계</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                                <td>100</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="NGR mt20">바. 한자자격시험 응시료</h5>
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
                        </colgroup>
                        <thead>
                            <tr>
                                <th>응시급수</th>
                                <th>사범</th>
                                <th>1급</th>
                                <th>2급~3급</th>
                                <th>준3굽</th>
                                <th>4굽~준5급</th>
                                <th>6급</th>
                                <th>7급~8급</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>응시료</td>
                                <td>55,000원</td>
                                <td>35,000원</td>
                                <td>21,000원</td>
                                <td>17,000원</td>
                                <td>16,000원</td>
                                <td>15,000원</td>
                                <td>14,000원</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="NGR mt20">사. 자격취득시 우대사항</h5>
                <ul class="st01">
                    <li>자격기본법 제27조에 의거 국가자격 취득자와 동등한 대우 및 혜택을 받습니다.</li>
                    <li>경제5단체, 신입사원 채용 때 국가공인 한자자격시험 응시 권고(3급 응시요건, 3급 이상 가산점)하고 있습니다.</li>
                    <li>2005학년도 대학수학능력시험부터 '漢文'이 선택과목으로 채택되었습니다.</li>
                    <li>(사)한자교육진흥회가 주관하는 국가공인 자격 취득시 아래와 같은 혜택을 받습니다. </li>                                            
                </ul>
                <h5 class="NGR mt10">정부기관</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>기관명</th>
                                <th>내용</th>
                                <th>해당급수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>국가정보원</th>
                                <td>신입사원 채용시 가산점 부여</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th rowspan="2">육군본부</th>
                                <td>육군간부(대위~대령) 및 군무원(2급~5급)의 인사고과 반영</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <td>육군간부(준ㆍ부사관) 및 군무원(6급~8급)의 인사고과 반영</td>
                                <td>4급이상</td>
                            </tr>
                            <tr>
                                <th>한국자산공사</th>
                                <td>신입사원 공채 시 가산점 부여</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th rowspan="2">한국무역협회</th>
                                <td>필기시험 면제(3가지 시험중 한자시험 면제)</td>
                                <td rowspan="2">3급이상</td>
                            </tr>
                            <tr>
                                <td>1차면접시 한자시험 취득점수를 1차전형 총점의 10%내외에서 반영</td>
                            </tr>
                            <tr>
                                <th>평생교육진흥원</th>
                                <td>학점은행제 : 사범 6학점, 1급 5학점</td>
                                <td>1급이상</td>
                            </tr>
                            <tr>
                                <th>근로복지공단</th>
                                <td>한자 자격증 소지자 우대</td>
                                <td>3급이상</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="NGR mt10">민간기업</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>기관명</th>
                                <th>내용</th>
                                <th>해당급수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>삼성그룹</th>
                                <td>전 계열사 신입사원 공개 채용시 급수별 가산점 차등부여</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th>(주)동아제약</th>
                                <td>전 직원 한자자격증 의무적으로 취득하도록 자체연수 실시 중</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th>우리은행</th>
                                <td>신입사원 공개채용 시 한자자격시험 가산점 부여</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th>금호아시아나,SK그룹</th>
                                <td>국가공인 한자자격증 소지자 채용시 우대</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th>현대건설</th>
                                <td>신입사원 채용 시 한자과목 시험 실시 </td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th>쌍용그룹</th>
                                <td>사내 승진심사 시 한자자격 취득 필수</td>
                                <td>3급이상</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="NGR mt10">대학</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>대학명</th>
                                <th>내용</th>
                                <th>해당급수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>가천대학교</th>
                                <td>특기자전형(한국어문학과)</td>
                                <td>2급이상</td>
                            </tr>
                            <tr>
                                <th rowspan="2">건양대학교</th>
                                <td>외국어특기자전형(중국언어문화학과, 일본언어문화학과)</td>
                                <td rowspan="2">5급이상</td>
                            </tr>
                            <tr>
                                <td>관광특기자전형(글로벌관광학부)</td>
                            </tr>
                            <tr>
                                <th>경상대학교</th>
                                <td>특기자전형(한문학과)</td>
                                <td>1급이상</td>
                            </tr>
                            <tr>
                                <th>고려대학교</th>
                                <td>전교생을 대상으로 졸업인증제</td>
                                <td>2급이상</td>
                            </tr>
                            <tr>
                                <th>극동대학교</th>
                                <td>특별전형(중국어학과)</td>
                                <td>5급이상</td>
                            </tr>
                            <tr>
                                <th>김해대학교</th>
                                <td>특별전형(국가공인민간자격소지자)</td>
                                <td>공인급수</td>
                            </tr>
                            <tr>
                                <th>대구산업정보대학교</th>
                                <td>특별전형(부사관과)</td>
                                <td>4급이상</td>
                            </tr>
                            <tr>
                                <th>대구한의대학교</th>
                                <td>특별전형(한국어문학부, 중어중국학부)</td>
                                <td>4급이상</td>
                            </tr>
                            <tr>
                                <th>대전대학교</th>
                                <td>특별전형(서예특기자-한자능력검정시험자격증소지)</td>
                                <td>4급이상</td>
                            </tr>
                            <tr>
                                <th>대전보건대학교</th>
                                <td>특별전형(장례지도과-국가공인민간자격소지자)</td>
                                <td>6급이상</td>
                            </tr>
                            <tr>
                                <th>동덕여자대학교</th>
                                <td>특기자전형(국어국문학과)</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th>동부산대학교</th>
                                <td>어학우수장학금 입학금면제(한자능력자격증소지)</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th>동서울대학교</th>
                                <td>특별전형(국가공인민간자격소지자)</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th>배화여자대학교</th>
                                <td>특별전형(중국어통번역과)</td>
                                <td>2급이상</td>
                            </tr>
                            <tr>
                                <th>부산대학교</th>
                                <td>한의과 전문대학원 입시</td>
                                <td>2급이상</td>
                            </tr>
                            <tr>
                                <th>서울대학교</th>
                                <td>정시모집(학교생활기록부 교과외영역)</td>
                                <td>공인급수</td>
                            </tr>
                            <tr>
                                <th>성결대학교</th>
                                <td>외국어/문학특기자전형(3년이내취득)</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th>세명대학교</th>
                                <td>특기자전형(중국어학과)</td>
                                <td>준4급이상</td>
                            </tr>
                            <tr>
                                <th>신구대학교</th>
                                <td>특별전형(국가공인민간자격소지자)</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th>안동대학교</th>
                                <td>특별전형가산점부여(중어중문학과, 한문학과)</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th>안산1대학교</th>
                                <td>특별전형(외국어특기자, 국가공인민간자격소지자)</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th>신안산대학교</th>
                                <td>특별전형(국가공인민간자격소지자)</td>
                                <td>2급이상</td>
                            </tr>
                            <tr>
                                <th>용인송담대학교</th>
                                <td>특별전형(국가공인민간자격소지자)</td>
                                <td>공인급수</td>
                            </tr>
                            <tr>
                                <th>원광대학교</th>
                                <td>특기자전형(서예/문자예술학전공-3년이내취득)</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th>원광보건대학교</th>
                                <td>특별전형(의무부사관과, 국방정보과)</td>
                                <td>2급이상</td>
                            </tr>
                            <tr>
                                <th>장안대학교</th>
                                <td>특별전형(국가공인민간자격소지자)</td>
                                <td>공인급수</td>
                            </tr>
                            <tr>
                                <th>전주대학교</th>
                                <td>특기자전형(언어문화학부,한문교육과-3년이내취득)</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th>제주산업정보대학교</th>
                                <td>특별전형(국가공인민간자격소지자)</td>
                                <td>공인급수</td>
                            </tr>
                            <tr>
                                <th>제주한라대학교</th>
                                <td>중국어통역학과대상 졸업인증제</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th>경남과학기술대학교</th>
                                <td>특별전형(국가공인민간자격소지자)</td>
                                <td>3급이상</td>
                            </tr>
                            <tr>
                                <th>창원문성대학교</th>
                                <td>특별전형(국가공인민간자격소지자)</td>
                                <td>공인급수</td>
                            </tr>
                            <tr>
                                <th>청운대학교</th>
                                <td>특별전형가산점부여(국가공인민간자격소지자)</td>
                                <td>공인급수</td>
                            </tr>
                            <tr>
                                <th>충남대학교</th>
                                <td>특별전형(한문학과-3년이내취득)</td>
                                <td>1급이상</td>
                            </tr>
                            <tr>
                                <th>한국방송통신대학교</th>
                                <td>국어국문학과 졸업논문 대체</td>
                                <td>1급이상</td>
                            </tr>
                            <tr>
                                <th>한중대학교</th>
                                <td>공인기관인증장학금(등록금50% 혹은 면제)</td>
                                <td>2급이상</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="tab02" class="tabCts">
                <h5 class="NGR">가. 시행일정 및 접수안내</h5>
                <div>
                    2018년도 시행일정(공인등급:준2급, 2급, 준1급, 1급, 사범) 
                </div>
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
                        </colgroup>
                        <thead>
                            <tr>
                                <th rowspan="2">회차</th>
                                <th rowspan="2">시행일</th>
                                <th rowspan="2">시험등급</th>
                                <th rowspan="2">시행시간</th>
                                <th colspan="2">접수기간</th>
                                <th>합격자발표일</th>
                                <th rowspan="2">자격증 교부기간</th>
                            </tr>
                            <tr>
                                <th>방문접수</th>
                                <th>인터넷접수</th>
                                <th>(홈페이지/ARS)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>제78회</td>
                                <td>2.24(토)</td>
                                <td>8급 ~ 대사범</td>
                                <td>오후 1:40</td>
                                <td>17.12.18(월)<br />
                                ~ 18.01.12(금)</td>
                                <td>17.12.18(월)<br />
                                ~ 18.01.17(수)</td>
                                <td>3.26(월)</td>
                                <td>03.26(월)<br />
                                ~03.30(금)</td>
                            </tr>
                            <tr>
                                <td>제79회</td>
                                <td>5.26(토)</td>
                                <td>8급 ~ 대사범</td>
                                <td>오후 1:40</td>
                                <td>3.26(월)<br />
                                ~4.13(금)</td>
                                <td>3.26(월)<br />
                                ~4.18(수)</td>
                                <td>6.25(월)</td>
                                <td>6.25(월)<br />
                                ~ 6.29(금)</td>
                            </tr>
                            <tr>
                                <td>제80회</td>
                                <td>8.25(토)</td>
                                <td>8급 ~ 대사범</td>
                                <td>오후 1:40</td>
                                <td>6.25(월)<br />
                                ~7.13(금)</td>
                                <td>6.25(월)<br />
                                ~7.18(수)</td>
                                <td>9.17(월)</td>
                                <td>9.17(월) <br />
                                ~ 9.21(금)</td>
                            </tr>
                            <tr>
                                <td>제81회</td>
                                <td>11.24(토)</td>
                                <td>8급 ~ 대사범</td>
                                <td>오후 1:40</td>
                                <td>9.17(월)<br />
                                ~10.12(금)</td>
                                <td>9.17(월)<br />
                                ~10.17(수)</td>
                                <td>12.24(월)</td>
                                <td>12.24(월) <br />
                                ~ 12.28(금)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt10">
                    1) 한자급수자격검정 전체급수(15개 등급)의 시험시작은 오후 2시입니다.<br>
                    2) 시행일정은 본 회 사정에 의해 변경될 수 있습니다.<br>
                    ※ 각 지역별 지부 접수 가능
                </div>

                <h5 class="NGR mt20">나. 등급별 선정한자 수 및 출제형식</h5>
                <div class="mt10">
                    ※ 상위 등급의 선정한 자 수는 하위 등급의 선정한자 수가 포함된 것임. <br>
                    ※ 각 급수는 응시 자격 조건이 없음. 
                </div>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>등급</th>
                                <th>선정한자 수</th>
                                <th>검정방법</th>
                                <th>문항수</th>
                                <th>시험시간</th>
                                <th>출제형식</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>사범</th>
                                <td>5,000자</td>
                                <td>필기시험</td>
                                <td>200</td>
                                <td>140분</td>
                                <td>객관식(50),주관식(150)</td>
                            </tr>
                            <tr>
                                <th>준사범</th>
                                <td>5,000자</td>
                                <td>필기시험</td>
                                <td>150</td>
                                <td>90분</td>
                                <td>객관식(50),주관식(150)</td>
                            </tr>
                            <tr>
                                <th>1급</th>
                                <td>3,500자</td>
                                <td>필기시험</td>
                                <td>150</td>
                                <td>90분</td>
                                <td>객관식(50),주관식(100)</td>
                            </tr>
                            <tr>
                                <th>준1급</th>
                                <td>2,500자</td>
                                <td>필기시험</td>
                                <td>150</td>
                                <td>90분</td>
                                <td>객관식(50),주관식(100)</td>
                            </tr>
                            <tr>
                                <th>2급</th>
                                <td>2,000자</td>
                                <td>필기시험</td>
                                <td>100</td>
                                <td>90분</td>
                                <td>객관식(50),주관식(50)</td>
                            </tr>
                            <tr>
                                <th>준2급</th>
                                <td>1,500자</td>
                                <td>필기시험</td>
                                <td>100</td>
                                <td>60분</td>
                                <td>객관식(50),주관식(50)</td>
                            </tr>
                            <tr>
                                <th>3급</th>
                                <td>1,000자</td>
                                <td>필기시험</td>
                                <td>100</td>
                                <td>60분</td>
                                <td>객관식(50),주관식(50)</td>
                            </tr>
                            <tr>
                                <th>준3급</th>
                                <td>800자</td>
                                <td>필기시험</td>
                                <td>100</td>
                                <td>60분</td>
                                <td>객관식(50),주관식(50)</td>
                            </tr>
                            <tr>
                                <th>4급</th>
                                <td>600자</td>
                                <td>필기시험</td>
                                <td>100</td>
                                <td>60분</td>
                                <td>객관식(50),주관식(50)</td>
                            </tr>
                            <tr>
                                <th>준4급</th>
                                <td>400자</td>
                                <td>필기시험</td>
                                <td>100</td>
                                <td>60분</td>
                                <td>객관식(50),주관식(50)</td>
                            </tr>
                            <tr>
                                <th>5급</th>
                                <td>250자</td>
                                <td>필기시험</td>
                                <td>100</td>
                                <td>60분</td>
                                <td>객관식(50),주관식(50)</td>
                            </tr>
                            <tr>
                                <th>준5급</th>
                                <td>100자</td>
                                <td>필기시험</td>
                                <td>50</td>
                                <td>60분</td>
                                <td>객관식(50)</td>
                            </tr>
                            <tr>
                                <th>6급</th>
                                <td>70자</td>
                                <td>필기시험</td>
                                <td>50</td>
                                <td>60분</td>
                                <td>객관식(50)</td>
                            </tr>
                            <tr>
                                <th>7급</th>
                                <td>50자</td>
                                <td>필기시험</td>
                                <td>25</td>
                                <td>60분</td>
                                <td>객관식(25)</td>
                            </tr>
                            <tr>
                                <th>8급</th>
                                <td>30자</td>
                                <td>필기시험</td>
                                <td>25</td>
                                <td>60분</td>
                                <td>객관식(25)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                

                <h5 class="NGR mt20">다. 합격기준</h5>                
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>등급</th>
                                <th colspan="2">합격기준</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>사범</th>
                                <td>80점 이상(1문항당 1/200*100점,100점으로 환산)</td>
                                <td>200문항 중160문항 이상</td>
                            </tr>
                            <tr>
                                <th>준사범</th>
                                <td>70점 이상(1문항당 1/150*100점,100점으로 환산)</td>
                                <td>150문항 중105문항 이상</td>
                            </tr>
                            <tr>
                                <th>1급~준1급</th>
                                <td>70점 이상(1문항당 1/150*100점,100점으로 환산)</td>
                                <td>150문항 중105문항 이상</td>
                            </tr>
                            <tr>
                                <th>2급~5급</th>
                                <td>70점 이상(1문항당 1점)</td>
                                <td>100문항 중70문항 이상</td>
                            </tr>
                            <tr>
                                <th>준5급~6급</th>
                                <td>70점 이상(1문항당 2점)</td>
                                <td>50문항 중 35문항 이상</td>
                            </tr>
                            <tr>
                                <th>7급~8급</th>
                                <td>70점 이상(1문항당 4점)</td>
                                <td>25문항 중 18문항 이상</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="NGR mt20">라. 참가회비</h5>
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
                        </colgroup>
                        <thead>
                            <tr>
                                <th>등급</th>
                                <th>7급~8급</th>
                                <th>6급~준5급</th>
                                <th>5급~준3급</th>
                                <th>3급~2급</th>
                                <th>준1급~1급</th>
                                <th>준사범~사범</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>참가회비</th>
                                <td>14,000원</td>
                                <td>15,000원</td>
                                <td>16,000원</td>
                                <td>21,000원</td>
                                <td>36,000원</td>
                                <td>58,000원</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <h5 class="NGR mt20">마. 한자급수자격증 취득자 우대사항</h5>
                <div>
                    1) 자격기본법 제 27조에 의거 국가 자격 취득자와 동등한 대우 및 혜택.<br>
                    2) 대학 입시 수시 모집, 특별전형 및 학점인정, 졸업인증제에 반영 – 각 대학 입시요강 및 학사 기준 참조.<br>
                    3) 삼성그룹을 비롯한 경제 5단체 신입사원채용 및 인사고과에 한자급수자격증 취득자 우대 및 가산점 부여.<br>
                    4) 한자급수자격검정 3개 등급의 자격증 학점인정!<br>
                    <br>
                    학점인정 심사기관인 국가평생교육진흥원으로부터 대한민국한자교육연구회와 대한검정회가 시행 하는 한자급수자격검정 사범, 1급, 준1급의 3개 등급에 대한 학점인정을 승인하였습니다. 등급별 인정학점은 사범 6학점, 1급 5학점, 준1급 3학점입니다. <br>
                    <br>
                    ※ 해당 자격별 학점 및 전공 연계에 대한 자세한 사항은 국가평생교육진흥원(www.cb.or.kr) -> 게시판 -> 자료실 ->자격학점인정기준을 참고바람. 
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