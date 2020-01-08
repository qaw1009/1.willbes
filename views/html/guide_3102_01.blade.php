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
            <h4 class="NGR">공공기관</h4>
            <div class="mt10">
                공공기관은 에너지 · SOC 등의 공공서비스 제공이나 기금관리 등 정부의 위탁사업을 수행하기 위해 설립된 기관입니다. 
                기관의 성격에 따라 공기업, 준정부기관, 기타공공기관으로 구분이 되며, ‘12.1월 현재 288개의 공공기관을 지정 · 운영하고 있습니다.
            </div>
            <div class="mt10">
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
                            <th colspan="2">일반공기업(28개)</th>
                            <th colspan="2">준정부기관(83개)</th>
                            <th rowspan="2">기타공공기관(177개)</th>
                        </tr>
                        <tr>
                            <th>시장형(14)</th>
                            <th>준시장형(14)</th>
                            <th>기금관리형(17)</th>
                            <th>위탁집행형(66)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                한국전력공사,
                                한국가스공사,
                                한국석유공사 등
                            </td>
                            <td>
                                한국관광공사,
                                한국철도공사,
                                한국마사회 등
                            </td>
                            <td>
                                국민연금공단,
                                근로복지공단,
                                예금보험공사 등
                            </td>
                            <td>
                                한국거래소,
                                한국소비자원,
                                도로교통공단 등
                            </td>
                            <td>
                                수출입은행,
                                출연연구기관,
                                국립대병원 등
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt10">
                ※ 공공기관 지정현황 : www.alio.go.kr / 경영공시 / 공공기관 지정현황 
            </div>

            <h4 class="NGR mt20">공공기관 현황</h4>
            <div class="mt10">
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col width="50%">
                        <col>
                    </colgroup>
                    <tbody>
                        <tr>
                            <th>SOC</th>
                            <th>고용보건복지</th>
                        </tr>
                        <tr>
                            <td>한국철도공사, 코레일네트웍스(주), 코레일테크(주), 코레일관광개발(주), 코레일로지스(주), 코레일유통(주), 한국수자원공사, 한국공항공사, 인천국제공항공사, 한국철도시설공단, 한국도로공사, 대한주택보증(주)</td>
                            <td>국민연금공간, 건강보험심사평가단, 사립학교교직원연금공단, 한국고용정보원, 국민건강보험공단, 한국장애인고용공단, 공무원연금공단, 한국보건산업진흥원</td>
                        </tr>
                        <tr>
                            <th>검사검증</th>
                            <th>국민문화생활</th>
                        </tr>
                        <tr>
                            <td>교통안전공단, 선박안전기술공단, 한국소방산업기술원, 대한지적공사, 한국시설안전공단, 한국가스안전공사, 한국산업기술시험원, 한국석유관리원</td>
                            <td>한국관광공사, 국민체육진흥공단, 한국소비자원, 도로교통공단</td>
                        </tr>
                        <tr>
                            <th>금융/관광/무역</th>
                            <th>산업진흥정보화</th>
                        </tr>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>에너지</th>
                            <th>연구교육</th>
                        </tr>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>외교법무</th>
                            <th>농림수산환경</th>
                        </tr>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4 class="NGR mt20">공공기관 인력채용</h4>
            <div>
                공공기관은 자체 인력운영계획에 따라 1~2차례 공개경쟁 절차에 따라 정기채용을 시행하고 있으며, 당초에 예상하지 못했던 인력수요가 발생한 경우에는 수시로 채용을 진행하는 경우도 있습니다.<br>
                <br>
                이러한 공공기관의 채용정보는 주로 당해 공공기관 홈페이지 등을 통해 공고되고 있으며, 정부는 취업 준비생들에게 편의를 제공하기 위하여 잡 알리오(www.alio.go.kr)을 통해 각 공공기관의 채용정보를 통합하여 제공하고있습니다.
            </div>

            <h4 class="NGR mt20">공공기관 채용형태</h4>
            <div>
                공공기관은 매년 주로 공개경쟁을 통해 정규직 인력을 채용하고 있으며, 09년말부터는 청년일자기 확대를 위해 청년인턴도 채용하고 있습니다.<br>
                <br>
                정부는 공공기관에서 청년인턴으로 근무한 청년인턴 경력자 중 우수인턴의 정규직 전환을 지원하기 위해 정규직 신규채용인원의 20%를 청년인턴 경력자 중에서 채용토록 권고하고 있으며, 
                각 공공기관에서는 정규직 채용시가점부여, 서류전형 면제 등 다양한 인센티브를 부여하여 인턴경험자를 정규직으로 채용하고 있습니다.
            </div>

            <h4 class="NGR mt20">공공기관 인재상</h4>
            <div>
                1. 급변하는 외부 환경에 능동적으로 대응할 수 있는 인재 → 대기업 상동 / 기업형 공기업<br>
                2. 기업 설립 목적에 따라 책임감과 사명감, 공익성 갖춘 인재 → 공기업 특색<br>
                3. 범생형에서 벗어나 다양하고 폭넓게 경험한 인재 → 채용 트랜드
            </div>
            <div class="mt20 tx-center">
                <img src="https://static.willbes.net/public/images/promotion/sub/3102_01_01.gif"/>
            </div>

            <h4 class="NGR mt20">공공기관 전형절차</h4>
            <div>
                공공기관은 일반적으로 서류전형, 필기시험, 면접의 순으로 전형이 이루어진다. 주요 평가지표는 성실성(학점, 영어성적, 출신학교), 
                사고력(자체 직무적성시험, 경영/경제/법률/상식 ), 직무능력 (인성/전문성 면접, 영어회화면접, 기타 자격증)으로 평가한다. 
            </div>
            <div class="mt20 tx-center">
                <img src="https://static.willbes.net/public/images/promotion/sub/3102_01_02.gif"/>
            </div>
            <ul class="st01 mt20">
                <li>
                    <strong class="tx-blue">서류전형</strong> : 자기소개서 + 어학성적 + 관련자격증 등의 자격조건을 심사 <br>
                    ① 입사지원서 : 자소서 평가<br>
                    ② 공인어학성적(TOEIC, TOEFL ,TEPS) : 기업별 표준 점수화<br>
                    ③ 각종 자격증 취득(컴퓨터, 한자, 한국어, 금융, 회계, 국제, 보험 등) : 가산점 표준 점수화 합산
                </li>
                <li>
                    <strong class="tx-blue">면접시험</strong> : 기업별 평가 및 특성에 맞는 면접시행 및 유형 상이 <br>
                    ① 면접유형 : 개별면접 / 집단면접 / 역량면접 / 회화면접 / PT면접 / 토론면접 / CEO면접<br>
                    ② 면접질문 : 개인태도 및 신상 / 전공 질문 / 시사 질문 / 회사 질문 등<br>
                    * 에너지/발전 - 토론면접 비중 높음, 경제/관광분야 -회화 및 역량면접 중요도 높음
                </li>
                <li>
                    <strong class="tx-blue">필기시험</strong> : 공공기관시험 난이도 (비금융권 < 금융권) 과목 수 + 수험공부 범위가 좁을 수록 난이도 높음 <br>
                    ① 전공 : 사무직은 경영학, 경제학, 법학, 행정학 중 출제되는 경우가 일반적<br>
                    ② 상식<br>
                    - 일반상식 : 인문, 사회과학, 컴퓨터, 자연, 미디어, 예체능 및 최근 시사 등(난이도 높음)<br>
                    - 시사상식 : 경제시사, 예술·문화부문시사, 우주 · 첨단시사, 정보통신시사, 국제관계 등<br>
                    ③ 논술 : 시사논술, 일반교양논술, 해당 공기업관련논술 등 출제유형 다양
                </li>
            </ul> 

            <h4 class="NGR mt20">분야별 전문가 지원 가능 공공기관</h4>
            <ul class="st01">
                <li>
                    <strong class="tx-blue">법률전문가가 지원할 만한 공공기관</strong><br>
                    특허청, 대한법률구조공단, 한국형사정책연구원, 국민권익위원회, 국가정보원, 중소기업청, 방송통신위원회, 조달청, 국세청, 국가보훈처, 
                    공정거래위원회, 공탁금관리위원회, 서울보증보험, 복권위원회, 한국선원복지고용센터
                </li>
                <li>
                    <strong class="tx-blue">의료분야 출신 전문가가 지원할 만한 공공기관</strong><br>
                    건강보험심사평가원, 국립암센터, 국민건강보험관리공단, 국민연금관리공단, 대한보건사회연구원, 보건복지인력개발원, (재)한국마약퇴치운동본부, 한국보건산업진흥원, (재)한국희귀의약품센터, 식품안전정보센터
                </li>
                <li>
                    <strong class="tx-blue">문화, 예술분야의 공공기관</strong><br>
                    (재)명동,정동극장, (재)한국공연예술센터, (재)에술경영지원센터, 국립박물관문화재단, 예술의전당, 영상물등급위원회, 영화진흥위원회, ㈜강원랜드, 출판문화산업진흥원, 
                    코레일관광개발㈜, 한국공예디자인문화진흥원, 한국관광공사, 한국마사회, 한국문학번역원, 한국문화예술교육진흥원, 한국문화예술위원회, 한국방송광고진흥공사, 한국영상자료원, 
                    한국저작권위원회, 한국콘텐츠진흥원, 한국문화관광연구원
                </li>
            </ul>

            <h4 class="NGR mt20">공기업전형절차</h4>
            <div class="mt10">
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
                            <th rowspan="2">구분</th>
                            <th rowspan="2">기업명</th>
                            <th colspan="5">전형절차</th>
                            <th rowspan="2">비 고</th>
                        </tr>
                        <tr>
                            <th>전공</th>
                            <th>인적성</th>
                            <th>논술</th>
                            <th>상식</th>
                            <th>면접</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="10">금융</th>
                            <td>IBK기업은행</td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                        </tr>
                        <tr>
                            <td>KDB산업은행</td>
                            <td>1과목</td>
                            <td>o</td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>영어논술</td>
                        </tr>
                        <tr>
                            <td>기술보증기금</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>면접(PT, 토론), 한국사검정시험 자격증 필수 </td>
                        </tr>
                        <tr>
                            <td>대한주택보증㈜</td>
                            <td>1과목<br />
                            (통합4)</td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>토익(700이상)은 비중↓, <br />
                            학점 자격증, 어학, 자소서 비중↓</td>
                        </tr>
                        <tr>
                            <td>신용보증기금</td>
                            <td>1과목<br />
                            (4중1택)</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>한국사 자격증 조금 더 가점 비중.</td>
                        </tr>
                        <tr>
                            <td>예금보험공사</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>2014년 스펙초월제 도입예정</td>
                        </tr>
                        <tr>
                            <td>한국무역보험공사</td>
                            <td>1과목<br />
                            (3중1택)</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                        </tr>
                        <tr>
                            <td>한국자산관리공사</td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                        </tr>
                        <tr>
                            <td>한국장학재단</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>o</td>
                            <td>학점, 토익 통과 후 자소서평가.<br />
                            한국사2급 이상 필요. </td>
                        </tr>
                        <tr>
                            <td>한국투자공사</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>자기소개서(영어)</td>
                        </tr>
                        <tr>
                            <th rowspan="5">농림<br />
                            수산환경</th>
                            <td>국립공원관리공단</td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>o</td>
                            <td>o</td>
                            <td>  </td>
                        </tr>
                        <tr>
                            <td>한국농수산식품유통공사</td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>o</td>
                            <td>o</td>
                            <td>  </td>
                        </tr>
                        <tr>
                            <td>한국마사회</td>
                            <td>1과목</td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>면접(영어회화)</td>
                        </tr>
                        <tr>
                            <td>한국환경공단</td>
                            <td>o(전공택1)</td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>토익(800점 이상) - 多대多 면접</td>
                        </tr>
                        <tr>
                            <td>한국환경산업기술원</td>
                            <td>x</td>
                            <td>o</td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>중복자격증 인정. 토익700이상</td>
                        </tr>
                        <tr>
                            <th rowspan="16">에너지</th>
                            <td>에너지관리공단</td>
                            <td>3과목</td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>토익700이상</td>
                        </tr>
                        <tr>
                            <td>㈜한국가스기술공사</td>
                            <td>4과목<br />
                            (통합)</td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>2014년 인적성 시험 도입 예정. 토익800이상</td>
                        </tr>
                        <tr>
                            <td>한국가스공사</td>
                            <td>1과목<br />
                            (3중1택)</td>
                            <td>ㅇ </td>
                            <td>ㅇ</td>
                            <td>  </td>
                            <td>o</td>
                            <td>스펙초월제 도입. 최소토익 300이상</td>
                        </tr>
                        <tr>
                            <td>한국광물자원공사</td>
                            <td>2과목</td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>스펙초월제 도입예정. 서류전형x 토익800이상</td>
                        </tr>
                        <tr>
                            <td>한국남동발전㈜</td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>어학성적 만접은 900이상. 스펙초월제 도입 예정.</td>
                        </tr>
                        <tr>
                            <td>한국남부발전㈜</td>
                            <td>4과목<br />
                            (통합)</td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>스펙초월제 도입<br />
                            (무서류전형(70명) 소셜리크루팅(5명),</td>
                        </tr>
                        <tr>
                            <td>한국동서발전㈜ </td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                        </tr>
                        <tr>
                            <td>한국서부발전㈜</td>
                            <td>4과목<br />
                            (통합)</td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>어학성적(토익900이상), <br />
                            논술시험(시사싱식+회사 관련 상식)</td>
                        </tr>
                        <tr>
                            <td>한국석유공사</td>
                            <td>1과목</td>
                            <td>o</td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                        </tr>
                        <tr>
                            <td>한국수력원자력㈜</td>
                            <td>3과목<br />
                            (통합) </td>
                            <td>o</td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>인성시험, 적성시험 별도 시행. 토익800이상</td>
                        </tr>
                        <tr>
                            <td>한국에너지기술평가원</td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>심층면접진행(전문가) 토익 800이상</td>
                        </tr>
                        <tr>
                            <td>한국원자력환경공단</td>
                            <td>4과목<br />
                            (통합)</td>
                            <td>o</td>
                            <td>o</td>
                            <td>o</td>
                            <td>  </td>
                            <td>인성면접(영어질문포함) 토익500이상</td>
                        </tr>
                        <tr>
                            <td>한국전력공사</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>중복자격증인정. 토익(800이상)</td>
                        </tr>
                        <tr>
                            <td>한국전력기술(KEPKO)</td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>중복자격증인정. 토익(800이상)</td>
                        </tr>
                        <tr>
                            <td>한국중부발전</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>토익(850~900), 한국사자격증 필수(1급)</td>
                        </tr>
                        <tr>
                            <td>한전원자력연료</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>토익 850이상 </td>
                        </tr>
                        <tr>
                            <th rowspan="2">산업진흥<br />
                            정보화</th>
                            <td>중소기업진흥공단</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>2014년 스펙초월제 도입예정</td>
                        </tr>
                        <tr>
                            <td>한국산업기술진흥원</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>토익(750이상) , 자격증 중복(3가지)적용 가능.</td>
                        </tr>
                        <tr>
                            <th rowspan="5">문화<br />
                            국민생활</th>
                            <td>국민체육진흥공단</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>어학시험(JLPT, OPIC), 공인노무사자격증 우대</td>
                        </tr>
                        <tr>
                            <td>도로교통공단</td>
                            <td>1과목<br />
                            (3중1택)</td>
                            <td>o</td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                        </tr>
                        <tr>
                            <td>한국관광공사</td>
                            <td>2과목</td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>영어면접(15분 프리토킹), 어학성적(토익 800이상)</td>
                        </tr>
                        <tr>
                            <td>한국소비자원</td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                        </tr>
                        <tr>
                            <td>한국청소년활동진흥원</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>2014년 스펙초월제 도입예정</td>
                        </tr>
                        <tr>
                            <th rowspan="3">검사검증</th>
                            <td>교통안전공단</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>각 단계별 Zero-base. 토익800이상</td>
                        </tr>
                        <tr>
                            <td>대한지적공사</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>2014년 스펙초월제 도입예정</td>
                        </tr>
                        <tr>
                            <td>한국시설안전공단</td>
                            <td>1과목</td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>토익800이상</td>
                        </tr>
                        <tr>
                            <th rowspan="2">외교법무</th>
                            <td>한국국제교류재단</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>o</td>
                            <td>2013년 인적성x (내년시험 포함은 미정)<br />
                            토익950이상,</td>
                        </tr>
                        <tr>
                            <td>한국국제협력단(KOIKA)</td>
                            <td>1과목</td>
                            <td>o</td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>논술비중 높음. 토익830이상</td>
                        </tr>
                        <tr>
                            <th rowspan="7">고용<br />
                            보건복지</th>
                            <td>공무원연금공단</td>
                            <td>4과목<br />
                            (통합)</td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>2014년 스펙초월제 도입예정, 토익700이상, 학점 3.5이상 자격증 중복적용o</td>
                        </tr>
                        <tr>
                            <td>국민건강보험공단</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>스펙초월제/일반채용 각각 채용</td>
                        </tr>
                        <tr>
                            <td>국민연금공단</td>
                            <td>4과목</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>　</td>
                        </tr>
                        <tr>
                            <td>사립학교교직원 연금공단</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>　</td>
                        </tr>
                        <tr>
                            <td>한국고용정보원</td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>1:多 면접. 스펙초월x, 각 전형 zero-base, 자기소개서 비중↑</td>
                        </tr>
                        <tr>
                            <td>한국산업인력공단</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>　</td>
                        </tr>
                        <tr>
                            <td>한국장애인고용공단</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>　</td>
                        </tr>
                        <tr>
                            <th rowspan="7">SOC</th>
                            <td>여수항만공사</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>신설공사, 토익 800이상, 학점 3.5이상</td>
                        </tr>
                        <tr>
                            <td>인천국제공항공사</td>
                            <td>4과목<br />
                            (통합)</td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>토익 750이상</td>
                        </tr>
                        <tr>
                            <td>한국공항공사</td>
                            <td>1과목</td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>토익750이상</td>
                        </tr>
                        <tr>
                            <td>한국도로공사</td>
                            <td>1과목</td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>토익700이상</td>
                        </tr>
                        <tr>
                            <td>한국수자원공사</td>
                            <td>4과목<br />
                            (통합)</td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>영어면접(원어민과 약 5~10분정도 프리토킹) , 토익750이상</td>
                        </tr>
                        <tr>
                            <td>한국철도공사</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>필기시험(철도공사 규정책자) 면접(1분 스피치) 시행</td>
                        </tr>
                        <tr>
                            <td>기초과학연구원</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>1차 면접(전문성 심화 평가)후 최종 면접, 토익700이상</td>
                        </tr>
                        <tr>
                            <th rowspan="10">연구교육</th>
                            <td>한국고전번역원</td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>인적성 (타기관에 의뢰, SSAT형식)</td>
                        </tr>
                        <tr>
                            <td>한국기술교육대학교</td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>영어면접(원어민, 약 10~15분 진행), 토익900이상</td>
                        </tr>
                        <tr>
                            <td>학교법인한국폴리텍</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>자기소개서(자체 내 직무역량기반서)작성, PT면접(진행 전날 주제 제공)</td>
                        </tr>
                        <tr>
                            <td>한국사학진흥재단</td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>면접 비중 상당히↑</td>
                        </tr>
                        <tr>
                            <td>한국산업기술시험원</td>
                            <td>3과목<br />
                            (통합)</td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>자기소개서(별도의 주제 제공), 토익700이상</td>
                        </tr>
                        <tr>
                            <td>한국생산기술연구원</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>서류전형 + 인적성 동시 시행</td>
                        </tr>
                        <tr>
                            <td>한국조세재정연구원</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>　</td>
                        </tr>
                        <tr>
                            <td>한국직업능력개발원</td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>박사학위 기본</td>
                        </tr>
                        <tr>
                            <td>한국천문연구원</td>
                            <td>  </td>
                            <td>o</td>
                            <td>  </td>
                            <td>  </td>
                            <td>o</td>
                            <td>행정직(경력자 선발), PT면접(과거 업무경력 중심), 인적성(온라인 진행)</td>
                        </tr>
                        <tr>
                            <td>한국표준과학연구원</td>
                            <td>  </td>
                            <td>o</td>
                            <td>o</td>
                            <td>  </td>
                            <td>o</td>
                            <td>인적성은 SSAT형식, 토익 750이상</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>      
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop