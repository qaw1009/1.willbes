@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰간부<span class="row-line">|</span></li>
                <li class="subTit">간부후보생</li>
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
            <span class="depth-Arrow">></span><strong>시험정보</strong>
            <span class="depth-Arrow">></span><strong>시험방법</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">시험방법</h3>
            <h4 class="NGR">선발 분야 및 인원 <span class="tx14 tx-bright-gray normal">※ 연 1회 남·녀 성별 구분 없이 선발함</span></h4>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col />
                        <col />
                        <col />
                        <col />
                        <col />
                        <col />
                    </colgroup>
                    <thead>
                        <tr>
                            <th>분야</th>
                            <th>계</th>
                            <th>일반전형</th>
                            <th>세무회계</th>
                            <th>사이버</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>인원</td>
                            <td>50</td>
                            <td>40</td>
                            <td>5</td>
                            <td>5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h4 class="NGR mt20">응시자격 <span class="tx14 tx-bright-gray normal">※ 병역/학력 제한 없음</span></h4>
            <ul class="st01">
                <li>연령: 21세 이상 ~ 40세 이하 (군복무 기간 1년 미만은 1세, 1년 이상~2년 미만은 2세, 2년 이상은 3세 각각 연장)</li>
                <li>1종 보통 운전면허 이상 소지해야 함 (원서 접수일부터 면접시험 최종일까지 유효하여야 함)</li>
                <li>영어·한국사 과목 대체 검정시험 종류와 기준점수 및 유효기간</li>
            </ul> 
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided mt10">
                    <col span="4" />
                    <thead>
                        <tr>
                            <th>구분</th>
                            <th>과목</th>
                            <th>검정시험 종류 및 기준점수</th>
                            <th>유효기간</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="2">경찰간부 후보생 선발시험</td>
                            <td>영어</td>
                            <td>▶토익: 625점 이상<br />
                            ▶토플: PBT 490점 이상 IBT 58점 이상<br />
                            ▶텝스: 280점 이상<br />
                            ▶지텔프: Level 2 50점 이상</td>
                            <td>3년</td>
                        </tr>
                        <tr>
                            <td>한국사</td>
                            <td>한국사 능력 검정시험 2급 이상</td>
                            <td>4년</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt10">
                ※ 영어시험은 영어능력 검정시험의 종류 및 기준점수에 의거, 기준점수 이상이면 합격한 것으로 간주한다. 
            </div>
            <div class="mt10" style="border:2px solid #ccc; padding:20px">
                <p class="strong">2022년 시행 예정인 제72기 경찰간부후보생 선발시험 영어능력 검정시험 유효기간 3년 적용 관련 안내</p>
                자체 유효기간이 2년인 시험(TOEIC, TOFEL, TEPS, G-TELP)의 경우에는 유효 기간이경과되면  시행기관으로부터 성적을 조회 할 수 없어 지위 여부가 확인되지 않습니다. 따라서 해당 능력검정시험의 유효기간이 만료될 예정인 경우 반드시 유효기간 만료 전 인사혁신처 사이버국가 고시센터에 사전등록을 하시기 바랍니다.  
                <p>※ 사전등록: 토플(TOEFL), 토익(TOEIC), 텝스(TEPS), 지텔프(G-TELP)</p>
            </div>

            <h4 class="NGR mt20">시험방법 <span class="tx14 tx-bright-gray normal">※ 직무수행에 필요한 적성과 자질 등 종합검정</span></h4>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <col span="2" />
                    <thead>
                        <tr>
                            <th>시험구분</th>
                            <th>시험내용</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>제1차 시험(필기시험)</td>
                            <td>개관식 필수 4과목 / 선택 1과목</td>
                        </tr>
                        <tr>
                            <td rowspan="3">제2차 시험<br />
                            (신체·체력·적성검사)</td>
                            <td>직무수행에 필요한 신체조건 및 건강상태 등 검정</td>
                        </tr>
                        <tr>
                            <td>50m달리기, 왕복오래달리기, 윗몸일으키기, 팔굽혀펴기, 좌·우 악력(총 5개 종목)</td>
                        </tr>
                        <tr>
                            <td>직무수행에 필요한 적성과 자질 등 종합검정</td>
                        </tr>
                        <tr>
                            <td>제3차 시험(면접시험)</td>
                            <td>직무수행에 필요한 능력, 발전성 및 적격성 등 검정</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
            <div class="mt10">※ 시험방법은 72기 개편에 따라 변경될 수 있으며, 변경 사항이 있을시 별도 공지예정</div>

            <h4 class="NGR mt20">경찰간부후보생 공개경쟁선발시험 체력검사 평가기준</h4>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <thead>
                        <tr>
                            <th colspan="2">구분</th>
                            <th>10</th>
                            <th>9</th>
                            <th>8</th>
                            <th>7</th>
                            <th>6</th>
                            <th>5</th>
                            <th>4</th>
                            <th>3</th>
                            <th>2</th>
                            <th>1</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="5">남자</th>
                            <td>50m달리기<br />
                            (초)</td>
                            <td>7.0
                            이하</td>
                            <td>7.01~
                            7.21</td>
                            <td>7.22~
                            7.42</td>
                            <td>7.43~
                            7.63</td>
                            <td>7.64~
                            7.84</td>
                            <td>7.85~
                            8.05</td>
                            <td>8.06~
                            8.26</td>
                            <td>8.27~
                            8.47</td>
                            <td>8.48~
                            8.68</td>
                            <td>8.69
                            이상</td>
                        </tr>
                        <tr>
                            <td>왕복오래달리기<br />(회)</td>
                            <td>77 이상</td>
                            <td>76~72</td>
                            <td>71~67</td>
                            <td>66~62</td>
                            <td>61~57</td>
                            <td>56~52</td>
                            <td>51~47</td>
                            <td>46~41</td>
                            <td>40~35</td>
                            <td>34 이하</td>
                        </tr>
                        <tr>
                            <td>윗몸일으키기<br />
                            (회/1분)</td>
                            <td>58 이상</td>
                            <td>57~55</td>
                            <td>54~52</td>
                            <td>51~49</td>
                            <td>48~46</td>
                            <td>45~43</td>
                            <td>42~40</td>
                            <td>39~36</td>
                            <td>35~32</td>
                            <td>31 이하</td>
                        </tr>
                        <tr>
                            <td>좌우 악력<br />(kg)</td>
                            <td>64 이상</td>
                            <td>63~61</td>
                            <td>60~58</td>
                            <td>57~55</td>
                            <td>54~52</td>
                            <td>51~49</td>
                            <td>48~46</td>
                            <td>45~43</td>
                            <td>42~40</td>
                            <td>39 이하</td>
                        </tr>
                        <tr>
                            <td>팔굽혀펴기<br />(회/1분)</td>
                            <td>61 이상</td>
                            <td>60~56</td>
                            <td>55~51</td>
                            <td>50~46</td>
                            <td>45~40</td>
                            <td>39~34</td>
                            <td>33~28</td>
                            <td>27~22</td>
                            <td>21~16</td>
                            <td>15 이하</td>
                        </tr>
                        <tr>
                            <th rowspan="5">여자</th>
                            <td>50m달리기<br />
                            (초)</td>
                            <td>8.23
                            이하</td>
                            <td>8.24~
                            8.47</td>
                            <td>8.48~
                            8.71</td>
                            <td>8.72~
                            8.95</td>
                            <td>8.96~
                            9.19</td>
                            <td>9.20~
                            9.43</td>
                            <td>9.44~
                            9.67</td>
                            <td>9.68~
                            9.91</td>
                            <td>9.92~
                            10.15</td>
                            <td>10.16
                            이상</td>
                        </tr>
                        <tr>
                            <td>왕복오래달리기<br />(회)</td>
                            <td>51 이상</td>
                            <td>50~47</td>
                            <td>46~44</td>
                            <td>43~41</td>
                            <td>40~38</td>
                            <td>37~35</td>
                            <td>34~32</td>
                            <td>31~28</td>
                            <td>27~24</td>
                            <td>23 이하</td>
                        </tr>
                        <tr>
                            <td>윗몸일으키기<br />
                            (회/1분)</td>
                            <td>55 이상</td>
                            <td>54~51</td>
                            <td>50~47</td>
                            <td>46~43</td>
                            <td>42~39</td>
                            <td>38~35</td>
                            <td>34~31</td>
                            <td>30~27</td>
                            <td>26~23</td>
                            <td>22 이하</td>
                        </tr>
                        <tr>
                            <td>좌우 악력<br />(kg)</td>
                            <td>44 이상</td>
                            <td>43~42</td>
                            <td>41~40</td>
                            <td>39~38</td>
                            <td>37~36</td>
                            <td>35~34</td>
                            <td>33~31</td>
                            <td>30~28</td>
                            <td>27~25</td>
                            <td>24 이하</td>
                        </tr>
                        <tr>
                            <td>팔굽혀펴기<br />(회/1분)</td>
                            <td>31 이상</td>
                            <td>30~28</td>
                            <td>27~25</td>
                            <td>24~22</td>
                            <td>21~19</td>
                            <td>18~16</td>
                            <td>15~13</td>
                            <td>12~10</td>
                            <td>9~7</td>
                            <td>6 이하</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
            <div class="mt10">
                <p class="strong">※ 평가방법</p>
                - 체력검사의 평가종목 중 1종목이상 1점을 받은 경우에는 불합격으로 한다. <br>
                - 50미터 달리기의 경우에는 측정된 수치 중 소수점 셋째자리 이하는 버리고, 좌우 악령의 경우에는 소수 첫 번째자리에서 반올림 한다. <br>
                - 체력검사의 평가종목별 구체적인 측정방법은 경찰청장이 정한다.
            </div>


            <h4 class="NGR mt20">수험생들이 많이 취득하는 가산점</h4>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <thead>
                        <tr>
                            <th rowspan="2">분야</th>
                            <th colspan="3">관련 자격증 및 가산점</th>
                        </tr>  
                        <tr>
                            <th>5</th>
                            <th>4</th>
                            <th>2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>정보처리</td>
                            <td>
                            -
                            </td>
                            <td>
                            -
                            </td>
                            <td>컴퓨터활용능력1·2급<br />
                            워드프로세서1급</td>
                        </tr>
                        <tr>
                            <td>국어</td>
                            <td>한국실용글쓰기검정 750점 이상</td>
                            <td>한국실용글쓰기검정 630점 이상</td>
                            <td>한국실용글쓰기검정 550점 이상</td>
                        </tr>
                        <tr>
                            <td>영어</td>
                            <td>TOEIC 900이상<br />
                            G-TELP Level 2 89 이상</td>
                            <td>TOEIC 800이상<br />
                            G-TELP Level 2 75 이상</td>
                            <td>TOEIC 600이상<br />
                            G-TELP Level 2 48 이상</td>
                        </tr>
                        <tr>
                            <td>무도</td>
                            <td rowspan="2">
                            -
                            </td>
                            <td>무도 4단 이상</td>
                            <td>무도 2·3단</td>
                        </tr>
                        <tr>
                            <td>재난·안전관리</td>
                            <td>경비지도사</td>
                            <td>1종대형면허</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
            <div class="mt10">
                ※ 「경찰공무원 채용시험에 관한 규칙」 제23조 제3항 (별표6)
            </div>

           
            <h4 class="NGR mt20">선발필기시험 과목개편</h4>
            <div class="mt10">
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <col width="12%">
                    <col width="10%">
                    <col>
                    <theady>
                        <tr>
                            <th colspan="2">구 분</th>
                            <th>현 행</th>
                            <th>개정안</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="6">간부후보생</td>
                            <td rowspan="2">일반</td>
                            <td class="tx-left">▶ 1차 객관식: 5개 과목<br />
                            ▶ 영어(검정제), 한국사, 형법, 행정학,경찰학개론</td>
                            <td rowspan="2" class="tx-left">▶ 1차 + 2차 → 7개 객관식<br />
                            ▶ 필수: 영어(검정제), 한국사(검정제),형사법, 헌법, 경찰학, 범죄학<br />
                            ▶ 선택: 행정법, 행정학, 민법총칙 중 택1</td>
                        </tr>
                        <tr>
                            <td class="tx-left">▶ 2차 주관식: 필수 1개 + 선택 1개<br />
                            ▶ 필수: 형사소송법<br />
                            ▶ 선택: 행정법, 경제학, 민법총칙, 형사정책 중 택1</td>
                        </tr>
                        <tr>
                            <td rowspan="2">세무회계</td>
                            <td class="tx-left">▶ 영어(검정제), 한국사, 형법, 형사소송법, 세법개론</td>
                            <td rowspan="2" class="tx-left">▶ 1차+2차 → 7개 객관식<br />
                            ▶ 필수: 영어(검정제), 한국사(검정제), 형사법, 헌법, 세법, 회계학<br />
                            ▶ 선택: 상법총칙, 경제학, 통계학, 재정학 중 택1</td>
                        </tr>
                        <tr>
                            <td class="tx-left">▶필수: 회계학<br />
                            ▶선택: 상법총칙, 경제학, 통계학 재정학 중 택1</td>
                        </tr>
                        <tr>
                            <td rowspan="2">사이버</td>
                            <td class="tx-left">▶ 영어(검정제), 한국사, 형법, 형사소송법, 정보보호론</td>
                            <td rowspan="2" class="tx-left">▶ 1차+2차 → 7개 객관식<br />
                            ▶ 필수: 영어(검정제), 한국사(검정제), 형사법, 헌법, 정보보호론, 시스템, 네트워크 보안<br />
                            ▶ 선택: 데이터베이스론, 통신이론, 소프트웨어공학 중 택1</td>
                        </tr>
                        <tr>
                            <td class="tx-left">▶ 필수: 시스템, 네트워크 보안<br />
                            ▶ 선택: 데이터베이스론, 통신이론, 소프트웨어공학 중 택1</td>
                        </tr>
                    </tbody>
                </table>
            </div> 

            <h5 class="NGR mt20 tx-blue">과목 간 비중 및 출제비율</h4>

            <div class="mt10">
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <thead>
                        <tr>
                            <th>분야</th>
                            <th>출제비율</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>일반</td>
                            <td>형사법·경찰학개론 각 30%, 헌법·범죄학 각 15%, 선택과목 10%</td>
                        </tr>
                        <tr>
                            <td>세무회계</td>
                            <td>형사법 30%, 세법개론·회계학 각 20%, 헌법·선택과목 각 15%</td>
                        </tr>
                        <tr>
                            <td>사이버</td>
                            <td>형사법 30%, 시스템보안·정보보호론 각 20%, 헌법·선택과목 각 15%</td>
                        </tr>
                    <tbody>
                </table>
            </div>
            <div class="mt10">
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <thead>
                        <tr>
                            <th>과목</th>
                            <th>출제비율</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>경찰학<br />
                            배점 3점 120점</td>
                            <td>경찰행정법 35% 내외, 경찰학의 기초이론 30% 내외, 경찰행정학 15% 내외, 분야별 경찰활동 15% 내외, 한국경찰의 역사와 비교경찰 5% 내외</td>
                        </tr>
                        <tr>
                            <td>형사법<br />
                            배점 3점 120점</td>
                            <td>형법총론 35% 내외, 형법각론 35% 내외, 형사소송법 30% 내외
                            (수사·증거 각 15% 내외)</td>
                        </tr>
                        <tr>
                            <td>헌법<br />
                            배점 1.5점 60점</td>
                            <td>기본권 총론·각론 80% 내외, 헌법총론·한국 헌법의 기본질서 20% 내외</td>
                        </tr>
                        <tr>
                            <td>범죄학<br />
                            배점 1.5점 60점</td>
                            <td>범죄원인론 50% 내외, 범죄대책혼 30% 내외, 
                            범죄유형론·범죄학 일반 각 10% 내외</td>
                        </tr>
                    <tbody>
                </table>
            </div>

            <div class="mt10">
                ※ 선택과목 배점 1문제당 1점 40점
            </div>

            <h5 class="NGR mt20 tx-blue">합격자 처우 및 임용</h5>
            <ul class="st01">
                <li>최종합격자는 경찰대학에서 1년간 간부후보생과정 교육 수료 후 경위로 임용됩니다.</li>
                <li>경찰대학 재학 중 피복 및 숙식을 제공하여 매월 소정의 수당을 지급합니다.</li>
                <li>임용 후 지구대 또는 파출소 6개월, 경찰서 수사부서(경제팀)2년 등 총 2년 6개월간 필수현장보직에서  근무하여야 합니다.(경찰공무원 인사운영규칙 제32조 제1항). 또한, 세무회계, 사이버 분야는 필수현장보직기간 만료 후 3년간 다음 각 호 중 어느 하나의 부서에서 근무하여야 합니다(경찰공무원 인사운영규칙 제35조).<br>
                1)세무회계: 수사,재정,감사 관련 부사<br>
                2)사이버: 사이버,수사,정보통신 관련 부서</li>
            </ul> 
            <div class="mt10">
                ※ 자세한 사항은 경찰인재개발원 교무과 교육지원센터(041-536-2452, 2454)로 문의 바랍니다.
            </div>
        </div>      
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop