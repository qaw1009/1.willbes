@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">자격증<span class="row-line">|</span></li>
                <li class="subTit">건설안전(산업)기사</li>
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
            <span class="depth-Arrow">></span><strong>건설안전(산업)기사</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">건설안전(산업)기사</h3>
            <h4 class="NGR">자격정보</h4>
            <h5 class="NGR">가. 시험일정</h5>
            <div class="mt10">
                건설업은 공사기간단축, 비용절감 등의 이유로 사업주와 건축주들이 근로자의 보호를 소 홀히 할 수 있기 때문에 
                건설현장의 재해요인을 예측하고 재해를 예방하기 위하여 건설 안전 분야에 대한 전문지식을 갖춘 전문인력을 양성하고자 자격제도 제정.
            </div>             

            <h5 class="NGR mt20">나. 변천과정</h5>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead>
                        <tr>
                            <th>74.10.16. 대통령령 제7283호</th>
                            <th>98.05.09. 대통령령 제15794호</th>
                            <th>현재</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>건설안전기사1급</td>
                            <td>건설안전기사</td>
                            <td>건설안전기사</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h5 class="NGR mt20">다. 수행직무</h5>
            <div>
                건설재해예방계획 수립, 작업환경의 점검 및 개선, 유해 위험방지 등의 안전에 관한 기 술적인 사항을 관리하며 건설물이나 설비작업의 위험에 따른 응급조치, 안전장치 및 보 호구의 정기점검, 정비 등의 직무 수행. 
            </div>

            <h5 class="NGR mt20">라. 진로 및 전망</h5>
            <div>
                - 종합 또는 전문건설업체의 현장 안전관리자 및 기타 정부기관의 안전관련 부서로 진출 할 수 있다. <br>
                - 건설재해는 다른 산업재해에 비해 빈번히 발생할 뿐 아니라 다양한 위험요소가 상호 연관 복합적인 상태에서 발생하기 때문에 전문적인 안전관리자를 필요로 한다. 
                또한 건설경기 회복에 따른 건설재해의 증가, 구조조정으로 인한 안전관리자의 감소, 「산업안전보건법」에 의한 채용의무 규정, 경제성(재해에 따른 손실비용은 안전관리에 따른 
                비용에 몇 배의 간접비가 따름)등 증가용인으로 인하여 건설안전기사의 인력수요는 증가할 것이다.
            </div>

            <h5 class="NGR mt20">마. 종목별 검정현황</h5>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col>
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead>
                        <tr>
                            <th rowspan="2">종목명</th>
                            <th rowspan="2">연도</th>
                            <th colspan="3">필기</th>
                            <th colspan="3">실기</th>
                        </tr>
                        <tr>
                            <th>응시 </th>
                            <th>합격 </th>
                            <th>합격률(%)</th>
                            <th>응시 </th>
                            <th>합격 </th>
                            <th>합격률(%)</th>
                        </tr>
                    </thead>
                    </tbody>
                        <tr>
                            <th>건설안전산업기사 </th>
                            <th>2014</th>
                            <td>4,241</td>
                            <td>813</td>
                            <td>19.20%</td>
                            <td>1,191</td>
                            <td>694</td>
                            <td>58.30%</td>
                        </tr>
                        <tr>
                            <th>건설안전산업기사 </th>
                            <th>2013</th>
                            <td>4,801</td>
                            <td>783</td>
                            <td>16.30%</td>
                            <td>1,719</td>
                            <td>637</td>
                            <td>37.10%</td>
                        </tr>
                        <tr>
                            <th>건설안전산업기사 </th>
                            <th>2012</th>
                            <td>6,023</td>
                            <td>1,131</td>
                            <td>18.80%</td>
                            <td>1,958</td>
                            <td>512</td>
                            <td>26.10%</td>
                        </tr>
                        <tr>
                            <th>건설안전산업기사 </th>
                            <th>2011</th>
                            <td>6,373</td>
                            <td>1,242</td>
                            <td>19.50%</td>
                            <td>2,227</td>
                            <td>586</td>
                            <td>26.30%</td>
                        </tr>
                        <tr>
                            <th>건설안전산업기사 </th>
                            <th>2010</th>
                            <td>7,299</td>
                            <td>1,365</td>
                            <td>18.70%</td>
                            <td>2,182</td>
                            <td>910</td>
                            <td>41.70%</td>
                        </tr>
                        <tr>
                            <th>건설안전산업기사 </th>
                            <th>2009</th>
                            <td>7,955</td>
                            <td>1,160</td>
                            <td>14.60%</td>
                            <td>2,363</td>
                            <td>549</td>
                            <td>23.20%</td>
                        </tr>
                        <tr>
                            <th>건설안전산업기사 </th>
                            <th>2008</th>
                            <td>8,290</td>
                            <td>1,527</td>
                            <td>18.40%</td>
                            <td>3,292</td>
                            <td>802</td>
                            <td>24.40%</td>
                        </tr>
                        <tr>
                            <th>건설안전산업기사 </th>
                            <th>2007</th>
                            <td>8,307</td>
                            <td>2,399</td>
                            <td>28.90%</td>
                            <td>3,868</td>
                            <td>884</td>
                            <td>22.90%</td>
                        </tr>
                        <tr>
                            <th>건설안전산업기사 </th>
                            <th>2006</th>
                            <td>9,643</td>
                            <td>3,032</td>
                            <td>31.40%</td>
                            <td>3,409</td>
                            <td>1,939</td>
                            <td>56.90%</td>
                        </tr>
                        <tr>
                            <th>건설안전산업기사 </th>
                            <th>2005</th>
                            <td>6,130</td>
                            <td>1,983</td>
                            <td>32.30%</td>
                            <td>2,262</td>
                            <td>1,318</td>
                            <td>58.30%</td>
                        </tr>
                        <tr>
                            <th>건설안전산업기사 </th>
                            <th>2004</th>
                            <td>5,430</td>
                            <td>991</td>
                            <td>18.30%</td>
                            <td>1,416</td>
                            <td>782</td>
                            <td>55.20%</td>
                        </tr>
                        <tr>
                            <th>건설안전산업기사 </th>
                            <th>2003</th>
                            <td>4,421</td>
                            <td>970</td>
                            <td>21.90%</td>
                            <td>1,319</td>
                            <td>321</td>
                            <td>24.30%</td>
                        </tr>
                        <tr>
                            <th>건설안전산업기사 </th>
                            <th>2002</th>
                            <td>3,917</td>
                            <td>641</td>
                            <td>16.40%</td>
                            <td>947</td>
                            <td>368</td>
                            <td>38.90%</td>
                        </tr>
                        <tr>
                            <th>건설안전산업기사 </th>
                            <th>2001</th>
                            <td>2,917</td>
                            <td>802</td>
                            <td>27.50%</td>
                            <td>831</td>
                            <td>327</td>
                            <td>39.40%</td>
                        </tr>
                        <tr>
                            <th>건설안전산업기사 </th>
                            <th>1977~2000</th>
                            <td>46,963</td>
                            <td>13,589</td>
                            <td>28.90%</td>
                            <td>13,725</td>
                            <td>5,990</td>
                            <td>43.60%</td>
                        </tr>
                        <tr>
                            <th width="188" colspan="2">소 계</th>
                            <td>132,710</td>
                            <td>32,428</td>
                            <td>24.40%</td>
                            <td>42,709</td>
                            <td>16,619</td>
                            <td>38.90%</td>
                        </tr>
                    </tbody>
                </table>
            </div>            

            <h5 class="NGR mt20">바. 우대현황 : 위 자격취득자에 대한 법령상 우대현황</h5>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col width="4%">
                        <col width="32%">
                        <col width="32%">
                        <col width="32%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>순번</th>
                            <th>법령명</th>
                            <th>조문내역</th>
                            <th>활용내용</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>건설기술진흥법시행규칙</td>
                            <td>제50조품질시험및검사의실시(별표5)</td>
                            <td>건설공사 품질관리를 위한 품질관리자의 배치기준</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>건설기술진흥법시행규칙</td>
                            <td>제5조건설기술연구·개발사업의협약체결대상기관등</td>
                            <td>국토해양부령이 정하는 기관·협회·학회</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>건설기술진흥법시행령</td>
                            <td>제4조 건설기술자의 범위(별표1)</td>
                            <td>건설기술자의 범위</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>건설산업기본법 시행령</td>
                            <td>제13조 건설업의 등록기준(별표2)</td>
                            <td>건설업의 등록기준</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>건설산업기본법 시행령</td>
                            <td>제35조 건설기술자의 현장배치기준등(별표5)</td>
                            <td>공사예정금액의 규모별 건설기술자 배치기준</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>건축사법</td>
                            <td>제2조 정의</td>
                            <td>건축사보의 정의</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>경찰공무원임용령</td>
                            <td>제16조 특별채용의 요건</td>
                            <td>특별채용의 자격</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>고등학교 졸업학력 검정고시 규칙</td>
                            <td>제12조 과목면제</td>
                            <td>고시합격자로 가늠 또는 과목면제</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>공무원수당 등에 관한 규정</td>
                            <td>제14조 특수업무수당(별표11)</td>
                            <td>특수업무수당지급</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>공무원임용시험령</td>
                            <td>제27조 특별채용시험의 응시자격 등(별표7, 8)</td>
                            <td>특별채용시험에 응시</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>공무원임용시험령</td>
                            <td>제31조 채용시험의 특전(별표12)</td>
                            <td>6급 이하    공무원 및 기능직공무원 채용시험 가산대상 자격증</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>공연법 시행령</td>
                            <td>제10조의4무대예술전문인자격검정의응시기준(별표2)</td>
                            <td>무대예술전문인 자격검정의 등급별 응시기준</td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>공연법 시행규칙</td>
                            <td>제6조의4무대예술전문인자격검정의응시</td>
                            <td>무대예술전문인의 자격검정에 응시하고자 하는 자의 자격</td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>공직자윤리법 시행령</td>
                            <td>제34조 취업승인</td>
                            <td>관할 공직자윤리위원회가 취업승인을 하는 경우</td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>공직자윤리법의 시행에 관한 대법원규칙</td>
                            <td>제37조취업승인신청</td>
                            <td>퇴직공직자의 취업승인 요건</td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>공직자윤리법의 시행에 관한 헌법재판소규칙</td>
                            <td>제20조 취업승인</td>
                            <td>퇴직공직자의 취업승인 요건</td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>교원자격검정령 시행규칙</td>
                            <td>제9조 무시험검정의 신청</td>
                            <td>실기교사무시험검정인 때에는 국가기술자격증 사본(해당과목에 한한다)을 첨부하여야 무시험자격</td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td>교육감 소속 지방공무원 평정규칙</td>
                            <td>제23조 자격증 등의 가점</td>
                            <td>5급 이하 공무원, 연구사·지도사 및 기능직공무원이 자격증을 소지한 경우 점수 가점 평정</td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>국가공무원법</td>
                            <td>제36조의2 채용시험의    가점</td>
                            <td>채용시험의 가점</td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>국가과학기술 경쟁력강화를 위한 이공계지원특별법 시행령</td>
                            <td>제2조 이공계인력의 범위 등</td>
                            <td>이공계인력의 정의</td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td>국가과학기술 경쟁력강화를 위한 이공계지원특별법 시행령</td>
                            <td>제20조 연구기획평가사의 자격시험</td>
                            <td>연구기획평가사 자격시험 일부 면제</td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td>국가기술자격법</td>
                            <td>제14조 국가기술자격 취득자에 대한 우대</td>
                            <td>국가기술자격 취득자를 우대</td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td>국가기술자격법 시행령</td>
                            <td>제12조의2국가기술자격의등급과응시자격(별표1의2)</td>
                            <td>기술·기능분야 국가기술자격의 응시자격</td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td>국가기술자격법 시행령</td>
                            <td>제27조 국가기술자격취득자의 취업 등에 대한 우대</td>
                            <td>채용·보수 및 승진 등에 있어 해당 직무분야의 국가기술자격취득자를 우대</td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td>국가기술자격법 시행규칙</td>
                            <td>제21조 시험위원의 자격 등(별표16)</td>
                            <td>시험위원의 자격</td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td>국가를 당사자로 하는 계약에 관한 법률 시행규칙</td>
                            <td>제7조 원가계산을 할 때 단위당 가격의 기준</td>
                            <td>가격을 적용함에 있어 해당 노임단가에 그 노임단가의 100분의 15 이하에 해당하는 금액을 가산</td>
                        </tr>
                        <tr>
                            <td>27</td>
                            <td>국외유학에 관한 규정</td>
                            <td>제5조 자비유학자격</td>
                            <td>자비유학을 할수 있는자</td>
                        </tr>
                        <tr>
                            <td>28</td>
                            <td>국회인사규칙</td>
                            <td>제20조경력경쟁채용등의요건</td>
                            <td>동종직무에 관한 자격증소지자를 특별채용하는 경우</td>
                        </tr>
                        <tr>
                            <td>29</td>
                            <td>군무원인사법 시행령</td>
                            <td>제10조 특별채용 요건</td>
                            <td>특별채용시험에 의하여 신규채용할 수 있는 자격</td>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td>군무원인사법 시행규칙</td>
                            <td>제16조 시험과목의 일부 면제 등</td>
                            <td>국가에서 실시한 각종 자격·면허시험에 합격한 사람의 자격이 임용예정 직급과 관련이 있는 경우에는 그 자격·면허시험에 이미 응시한 시험과목에 대한 시험은 면제</td>
                        </tr>
                        <tr>
                            <td>31</td>
                            <td>군무원인사법 시행규칙</td>
                            <td>제27조 가산점(별표4)</td>
                            <td>승진후보자 명부작성시 자격증 및 면허증 소지자 가산</td>
                        </tr>
                        <tr>
                            <td>32</td>
                            <td>군인사법 시행령</td>
                            <td>제44조 전역보류(별표2, 5)</td>
                            <td>정밀장비기술자, 군의 필수기술분야에 종사하는 자의 범위</td>
                        </tr>
                        <tr>
                            <td>33</td>
                            <td>군인사법 시행규칙</td>
                            <td>제14조 부사관의 임용</td>
                            <td>부사관의 자격</td>
                        </tr>
                        <tr>
                            <td>34</td>
                            <td>근로자직업능력 개발법 시행령</td>
                            <td>제27조 직업능력개발훈련을 위하여 근로자를 가르칠 수 있는 사람</td>
                            <td>직업능력개발훈련교사의 정의</td>
                        </tr>
                        <tr>
                            <td>35</td>
                            <td>근로자직업능력 개발법 시행령</td>
                            <td>제28조직업능력개발훈련교사의자격취득(별표2)</td>
                            <td>직업능력개발훈련교사의자격</td>
                        </tr>
                        <tr>
                            <td>36</td>
                            <td>근로자직업능력 개발법 시행령</td>
                            <td>제38조 다기능기술자과정의 학생선발방법</td>
                            <td>정원 내 특별전형대상자</td>
                        </tr>
                        <tr>
                            <td>37</td>
                            <td>근로자직업능력 개발법 시행령</td>
                            <td>제44조 교원 등의 임용</td>
                            <td>교원을 임용할 때 자격증 소지자 우대</td>
                        </tr>
                        <tr>
                            <td>38</td>
                            <td>기술사법 시행령</td>
                            <td>제19조 합동기술사사무소의 등록기준 등</td>
                            <td>합동사무소구성원의 요건</td>
                        </tr>
                        <tr>
                            <td>39</td>
                            <td>독학에 의한 학위취득에 관한 법률 시행령</td>
                            <td>제9조 시험과목면제 대상</td>
                            <td>시험과목의 전부 또는 일부를 면제받을 수 있는 자</td>
                        </tr>
                        <tr>
                            <td>40</td>
                            <td>독학에 의한 학위취득에 관한 법률 시행규칙</td>
                            <td>제4조 국가기술자격취득자에 대한 시험면제범위등</td>
                            <td>자격취득분야와 동일한 분야의 시험에 응시하는 자에 대하여는 해당 과정별 인정시험 면제</td>
                        </tr>
                        <tr>
                            <td>41</td>
                            <td>병역법</td>
                            <td>제53조 전시근로소집 대상 등</td>
                            <td>전시근로소집 대상</td>
                        </tr>
                        <tr>
                            <td>42</td>
                            <td>병역법 시행령</td>
                            <td>제79조 기간산업 분야 종사자 등의 산업기능요원 편입(별표2)</td>
                            <td>기간산업분야종사자등의 산업기능요원 편입</td>
                        </tr>
                        <tr>
                            <td>43</td>
                            <td>병역법 시행령</td>
                            <td>제83조 전문연구요원 및 산업기능요원이 종사할 해당 분야 등</td>
                            <td>분야에 종사해야할 전문연구요원 및 산업기능요원</td>
                        </tr>
                        <tr>
                            <td>44</td>
                            <td>비상대비자원 관리법</td>
                            <td>제2조 대상자원의 범위</td>
                            <td>대상자원의 범위</td>
                        </tr>
                        <tr>
                            <td>45</td>
                            <td>산업안전보건법 시행령</td>
                            <td>제12조 안전관리자의 선임 등(별표3)</td>
                            <td>안전관리자를 두어야 할 사업의 종류·규모, 안전관리자의  수 및 선임방법</td>
                        </tr>
                        <tr>
                            <td>46</td>
                            <td>산업안전보건법 시행령</td>
                            <td>제14조 안전관리자의 자격(별표4)</td>
                            <td>안전관리자의 자격</td>
                        </tr>
                        <tr>
                            <td>47</td>
                            <td>산업안전보건법 시행규칙</td>
                            <td>제32조의2재해예방전문지도기관의인력·시설및장비기준(별표6의4)</td>
                            <td>재해예방 전문지도기관의 인력기준</td>
                        </tr>
                        <tr>
                            <td>48</td>
                            <td>산업안전보건법 시행규칙</td>
                            <td>제32조의4재해예방전문지도기관의지정신청등(별표6의4)</td>
                            <td>재해예방 전문지도기관의 인력기준</td>
                        </tr>
                        <tr>
                            <td>49</td>
                            <td>산업안전보건법 시행규칙</td>
                            <td>제120조 대상 사업장의 종류 등</td>
                            <td>고용노동부령으로 정하는 자격을 갖춘 자</td>
                        </tr>
                        <tr>
                            <td>50</td>
                            <td>산업안전보건법 시행규칙</td>
                            <td>제127조 진단기관의 인력·시설    및 장비기준(별표16)</td>
                            <td>안전·보건진단기관의 인력기준</td>
                        </tr>
                        <tr>
                            <td>51</td>
                            <td>선거관리위원회 공무원규칙</td>
                            <td>제21조경력경쟁채용등의요건(별표4)</td>
                            <td>동종직무에 관한 자격증소지자를 특별채용</td>
                        </tr>
                        <tr>
                            <td>52</td>
                            <td>선거관리위원회 공무원규칙</td>
                            <td>제29조전직시험의면제(별표12)</td>
                            <td>전직시험의 면제</td>
                        </tr>
                        <tr>
                            <td>53</td>
                            <td>선거관리위원회 공무원규칙</td>
                            <td>제85조 전직시험이 면제되는 직급별 자격증    구분(별표13)</td>
                            <td>전직시험이 면제되는 당해직급에 상응하는 자격증</td>
                        </tr>
                        <tr>
                            <td>54</td>
                            <td>선거관리위원회 공무원규칙</td>
                            <td>제89조 채용시험의 특전(별표14, 15)</td>
                            <td>자격증의 소지자가 6급이하 공무원채용시험에 응시하는    경우 점수 가산</td>
                        </tr>
                        <tr>
                            <td>55</td>
                            <td>선거관리위원회 공무원평정규칙</td>
                            <td>제23조자격증의가점(별표5)</td>
                            <td>자격증의 가점평정</td>
                        </tr>
                        <tr>
                            <td>56</td>
                            <td>선박직원법 시행령</td>
                            <td>제11조 시험과목</td>
                            <td>필기시험의 해당 과목을 면제</td>
                        </tr>
                        <tr>
                            <td>57</td>
                            <td>소방공무원임용령</td>
                            <td>제15조 특별채용의 요건등</td>
                            <td>특별채용의 요건</td>
                        </tr>
                        <tr>
                            <td>58</td>
                            <td>에너지이용 합리화법 시행령</td>
                            <td>제39조 진단기관의 지정기준(별표4)</td>
                            <td>진단기관이보유하여야하는기술인력</td>
                        </tr>
                        <tr>
                            <td>59</td>
                            <td>엔지니어링산업진흥법시행규칙</td>
                            <td>제7조 엔지니어링사업자 신고(별표3)</td>
                            <td>엔지니어링사업자의신고기술인력</td>
                        </tr>
                        <tr>
                            <td>60</td>
                            <td>여성과학기술인육성및지원에관한법률시행령</td>
                            <td>제2조 정의</td>
                            <td>여성과학기술인의 자격</td>
                        </tr>
                        <tr>
                            <td>61</td>
                            <td>연구직 및 지도직공무원의 임용 등에 관한 규정</td>
                            <td>제26조의2 채용시험의    특전(별표5, 7)</td>
                            <td>연구사 및 지도사공무원 채용시험 응시하는 경우 점수 가산</td>
                        </tr>
                        <tr>
                            <td>62</td>
                            <td>유해·위험작업의 취업제한에 관한 규칙</td>
                            <td>제4조 자격취득등을 위한 교육기관(별표1의2)</td>
                            <td>지정교육기관의 인력기준</td>
                        </tr>
                        <tr>
                            <td>63</td>
                            <td>장애인 등에 대한 특수교육법 시행령</td>
                            <td>제17조 전문인력의 자격 기준 등</td>
                            <td>자격이 있는 진로 및 직업교육을 담당하는 전문인력</td>
                        </tr>
                        <tr>
                            <td>64</td>
                            <td>중소기업인력지원 특별법</td>
                            <td>제28조 근로자의 창업지원 등</td>
                            <td>당해 직종과 관련된 분야에서 신기술에 기반한 창업을 하고자 하는 경우 지원</td>
                        </tr>
                        <tr>
                            <td>65</td>
                            <td>중소기업제품 구매촉진 및 판로지원에 관한 법률 시행규칙</td>
                            <td>제12조시험연구원의지정등(별표3)</td>
                            <td>시험연구원의 지정기준</td>
                        </tr>
                        <tr>
                            <td>66</td>
                            <td>중소기업진흥에 관한 법률</td>
                            <td>제48조 1차 시험의 면제</td>
                            <td>1차 시험을 면제</td>
                        </tr>
                        <tr>
                            <td>67</td>
                            <td>지방공무원법</td>
                            <td>제34조의2 신규임용시험의 가점</td>
                            <td>공무원 신규임용시험시 점수 가산</td>
                        </tr>
                        <tr>
                            <td>68</td>
                            <td>지방공무원 임용령</td>
                            <td>제17조경력경쟁임용시험등을통한임용의요건</td>
                            <td>특별임용 하려는 경우</td>
                        </tr>
                        <tr>
                            <td>69</td>
                            <td>지방공무원 임용령</td>
                            <td>제55조의3 자격증 소지자에 대한 신규임용시험의 특전</td>
                            <td>6급 이하 공무원 및 기능직공무원 신규임용시험 시 필기시험 점수 가산</td>
                        </tr>
                        <tr>
                            <td>70</td>
                            <td>지방공무원 평정규칙</td>
                            <td>제23조 자격증 등의 가점</td>
                            <td>5급 이하 공무원, 연구사·지도사 및 기능직공무원이 자격증을 소지한 경우 점수 가점 평정</td>
                        </tr>
                        <tr>
                            <td>71</td>
                            <td>지방자치단체를당사자로하는계약에관한법률시행령</td>
                            <td>제57조 주민참여감독자의 자격</td>
                            <td>주민대표자의추천을받을수있는사람의자격기준</td>
                        </tr>
                        <tr>
                            <td>72</td>
                            <td>지방자치단체를 당사자로 하는 계약에 관한 법률 시행령</td>
                            <td>제106조 계약심의위원회의 구성</td>
                            <td>계약심의위원회의 위원</td>
                        </tr>
                        <tr>
                            <td>73</td>
                            <td>지방자치단체를 당사자로 하는 계약에 관한 법률 시행규칙</td>
                            <td>제7조 원가계산을 할 때 단위당 가격의    기준</td>
                            <td>지방자치단체의 장 또는 계약담당자는 가격을 적용함에 있어 당해 노임단가에 동 노임단가의 100분의    15이하에 해당하는 금액을 가산</td>
                        </tr>
                        <tr>
                            <td>74</td>
                            <td>지역균형개발 및 지방중소기업 육성에 관한 법률 시행령</td>
                            <td>제59조 인력의 지역정착지원</td>
                            <td>인력의 지역정착지원</td>
                        </tr>
                        <tr>
                            <td>75</td>
                            <td>해양경찰청소속경찰공무원승진임용규정시행규칙</td>
                            <td>제15조 가점평정(별표7)</td>
                            <td>가점평정</td>
                        </tr>
                        <tr>
                            <td>76</td>
                            <td>해양환경관리법 시행규칙</td>
                            <td>제23조 오염물질저장시설의 설치ㆍ운영기준(별표10)</td>
                            <td>오염물질저장시설의 설치기준</td>
                        </tr>
                        <tr>
                            <td>77</td>
                            <td>헌법재판소 공무원 규칙</td>
                            <td>제21조 전직시험의 면제(별표7)</td>
                            <td>전직시험의 면제</td>
                        </tr>
                        <tr>
                            <td>78</td>
                            <td>헌법재판소공무원수당등에관한규칙</td>
                            <td>제6조 특수업무수당(별표2)</td>
                            <td>특수업무수당지급</td>
                        </tr>
                        <tr>
                            <td>79</td>
                            <td>헌법재판소 공무원 평정 규칙</td>
                            <td>제23조 자격증가점(별표4)</td>
                            <td>5급이하 및 기능직공무원 자격증 취득자 가점 평정</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt10">
                ※ 한국산업인력공단에서는 국민 알권리 충족 및 정보 공개의 확대를 위하여 위 정보를 제공하고 있습니다. 
                단, 세부 법령에 대한 유권해석 및 적용 관련 사항에 대한 정확한 안내는 관련법을 제정한 소관부처에서 가능하니 참고하시기 바랍니다. 업데이트 일자: '14.7.13
            </div>

            <h5 class="NGR mt20">사. 합격자 통계</h5>
            <div class="mt10">
                1) 필기시험
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
                    </colgroup>
                    <thead>
                        <tr>
                            <th>필기</th>
                            <th>분류</th>
                            <th>접수자</th>
                            <th>응시자</th>
                            <th>응시율(%)</th>
                            <th>합격자</th>
                            <th>합격률(%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td nowrap="nowrap" rowspan="2">2014</td>
                            <td>남자</td>
                            <td>5,047</td>
                            <td>3,481</td>
                            <td>69</td>
                            <td>703</td>
                            <td>20.2</td>
                        </tr>
                        <tr>
                            <td>여자</td>
                            <td>1,016</td>
                            <td>721</td>
                            <td>71</td>
                            <td>108</td>
                            <td>15</td>
                        </tr>
                        <tr>
                            <td nowrap="nowrap" rowspan="2">2013</td>
                            <td>남자</td>
                            <td>5,318</td>
                            <td>3466</td>
                            <td>65.2</td>
                            <td>601</td>
                            <td>17.3</td>
                        </tr>
                        <tr>
                            <td>여자</td>
                            <td>1009</td>
                            <td>717</td>
                            <td>71.1</td>
                            <td>107</td>
                            <td>14.9</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt10">
                2) 실기시험
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
                    </colgroup>
                    <thead>
                        <tr>
                            <th>실기</th>
                            <th>분류</th>
                            <th>접수자</th>
                            <th>응시자</th>
                            <th>응시율(%)</th>
                            <th>합격자</th>
                            <th>합격률(%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td nowrap="nowrap" rowspan="2">2014</td>
                            <td>남자</td>
                            <td>1,269</td>
                            <td>1,022</td>
                            <td>80.5</td>
                            <td>581</td>
                            <td>56.8</td>
                        </tr>
                        <tr>
                            <td>여자</td>
                            <td>181</td>
                            <td>162</td>
                            <td>89.5</td>
                            <td>108</td>
                            <td>66.7</td>
                        </tr>
                        <tr>
                            <td nowrap="nowrap" rowspan="2">2013</td>
                            <td>남자</td>
                            <td>1,721</td>
                            <td>1366</td>
                            <td>79.4</td>
                            <td>497</td>
                            <td>36.4</td>
                        </tr>
                        <tr>
                            <td>여자</td>
                            <td>327</td>
                            <td>287</td>
                            <td>87.8</td>
                            <td>117</td>
                            <td>40.8</td>
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