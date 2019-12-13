@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">전문자격증<span class="row-line">|</span></li>
                <li class="subTit">변리사</li>
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
            <span class="depth-Arrow">></span><strong>변리사 시험안내</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">변리사 시험안내</h3>
            <ul class="guideTab NGR">
                <li><a href="#tab01" class="on">변리사 제도 개관</a></li>
                <li><a href="#tab02">취득방법</a></li>
            </ul>

            <div id="tab01" class="tabCts">
                <h4 class="NGR mt20">개요 및 제도 개관</h4>
                <h5 class="NGR">변리사란?</h5>
                <div>
                    변리사란 개인이나 법인의 기술개발 및 권리화를 돕기 위하여 출원을 대리하고, 분쟁이 생겼을 때 그 분쟁을 해결하여 발명자의 권리를 관리해 주는 전문가를 말한다. 
                    또한 물품에 관한 디자인의 보호 및 상품의 브랜드명인 상표의 선택과 분쟁해결에 관한 컨설팅을 해 주는 전문가이다. 
                    다시 말해서 변리사는 기술분야, 디자인분야 및 상품 이나 서비스업의 표장에 관한 지식과 이러한 지식재산권에 대한 법률적 소양을 겸비하여 의뢰인의 권리를 찾아주고 보호해주는 전문 법조인이다.
                </div>
                <h5 class="NGR mt20">변리사란 제도의 개요</h5>
                <div>
                    우리나라 공업소유권 제도의 창설과 함께 제정·유지되어 온 제도로서, 새로이 개발되는 신기술에 대해서 발명자와 출원인의 권리 보호를 위한 업무가 늘어나고 있고 
                    사회의 다양화에 따른 권리분쟁이 확대되고 있어 이를 전문적으로 담당할 전문인력의 필요성이 대두됨 
                </div>
                <h5 class="NGR mt20">변리사의 수행직무</h5>
                <div>
                    변리사는 산업재산권에 관한 상담 및 권리 취득이나 분쟁해결에 관련된 제반업무를 수행하는 산업재산권에 관한 전문자격사로서, 산업재산권의 출원에서 등록까지의 모든 절차 대리 
                </div>
                <ul class="st01 mt10">
                    <li>
                        산업재산권 분쟁사건 대리<br>
                        무효심판 · 취소심판·권리범위확인심판 · 정정심판 · 통상실시권허여심판·거절(취소) 결정불복심판 등
                    </li>
                    <li>심판의 심결에 대해 특허법원 및 대법원에 소제기하는 경우 그 대리</li>
                    <li>권리의 이전 · 명의변경 · 실시권 · 사용권 설정 대리</li>
                    <li>기업 등에 대한 산업재산권 자문 또는 관리업무 등 담당</li>
                </ul>
                <h5 class="NGR">변리사의 진로 및 전망</h5>
                <div>
                    특허법률사무소, 개업, 특허청 심사관(5급 공무원), 특허부서가 있는 기업체, 학계, 지적소유권 관련 유학 등
                </div>
                <h5 class="NGR">소관부처명</h5>
                <div>
                    특허청 산업재산인력과
                </div>
            </div>

            <div id="tab02" class="tabCts">
                <h4 class="NGR mt20">선발예정인원</h4>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="15%">
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <tbody>
                        <tr>
                            <th width="100" rowspan="2">일반응시자</th>
                            <td>제1차 시험</td>
                            <td>최소합격인원의 3배수</td>
                            <td width="120" rowspan="3">동점자는 합격처리</td>
                        </tr>
                        <tr>
                            <td>제2차 시험</td>
                            <td>최소합격인원 200명</td>
                        </tr>
                        <tr>
                            <th>특허청경력자</th>
                            <td colspan="2">변리사법시행령 제4조제3항의 합격자 결정방법에 의하여 합격자로 결정되는 인원</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="NGR mt20">시험과목 및 시험방법</h4>
                <h5 class="NGR mt20">가. 제1차 시험(4과목) : 객관식 5지택일형</h5>
                <ul class="st01">
                    <li>산업재산권법(특허법,실용신안법,상표법,디자인보호법 및 조약포함</li>
                    <li>민법개론(친족편 및 상속편 제외)</li>
                    <li>자연과학개론(물리, 화학, 생물, 지구과학 포함)</li>
                    <li>영어(민간어학능력검정시험으로 대체)</li>
                </ul>
                <h5 class="NGR">나. 제2차 시험(4과목 : 필수3, 선택1) : 주관식 논술형</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="20%">
                            <col>
                            <col>
                        </colgroup>
                        <tbody>
                            <tr>
                                <th>필수과목 (3과목)</th>
                                <td colspan="3">특허법(조약포함), 상표법(조약포함), 민사소송법</td>
                            </tr>
                            <tr>
                                <th>선택과목 (1과목)</th>
                                <td>디자인보호법(조약포함),<br />
                                산업디자인,<br />
                                열역학,<br />
                                유기화학,<br />
                                전기자기학,<br />
                                반도체공학,<br />
                                데이터구조론</td>
                                <td>분자생물학,<br />
                                약품제조화학,<br />
                                콘크리트 및 철근콘크리트공학,<br />
                                저작권법,<br />
                                기계설계,<br />
                                금속재료</td>
                                <td>화학반응공학,<br />
                                회로이론,<br />
                                제어공학,<br />
                                발효공학,<br />
                                약제학,<br />
                                섬유재료학</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="NGR mt20">다. 시험 과목별 시험시간 - 제1차 시험</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="20%">
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>시 험 일</th>
                                <th>교시</th>
                                <th>과 목</th>
                                <th>시 간</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th rowspan="3">2.28(일)</th>
                                <td>1</td>
                                <td>산업재산권법</td>
                                <td>10:00 ~ 11:10 (70분)</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>민법개론</td>
                                <td>11:50 ~ 13:00 (70분)</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>자연과학개론</td>
                                <td>14:30 ~ 15:30 (60분)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="NGR mt20">합격자 결정 방법</h4>
                <h5 class="NGR mt20">가. 1차 시험</h5>
                <ul class="st01">
                    <li>영어능력검정시험의 해당 기준점수 이상 취득자로서, 영어과목을 제외한 나머지 과목에 대하여 매과목 100점을 만점으로 하여 매과목 40점 이상, 
                        전과목 평균 60점 이상을 득점한 자 중에서 전과목 총득점에 의한 고득점자 순으로 결정(변리사법시행령 제4조 제1항)
                    </li>
                </ul>         
                <h5 class="NGR mt20">나. 2차 시험</h5>
                <ul class="st01">
                    <li>일반 응시자<br>
                        매과목 100점을 만점으로 하여 매과목 40점 이상,전과목 평균 60점 이상을 득점한 자를 합격자로 결정하되, 
                        전과목 평균 60점 이상을 득점한 자가 최소합격인원에 미달하는 경우에는 매과목 40점 이상을 득점한 자 중에서 전과목 평균득점에 의한 고득점자순으로 결정(변리사법시행령 제4조제2항)
                    </li>
                    <li>특허청 경력자<br>
                        매과목 100점을 만점으로 하여 매과목 40점 이상을 득점한 자 중 응시과목 평균득점이 일반응시자 최종 순위 합격자의 합격점수 이상 득점한 자를 합격자로 결정(변리사법시행령 제4조제3항
                    </li>
                </ul>  

                <h4 class="NGR mt20">변리사 결격사유(변리사법 제4조)</h4>
                <div>
                    다음 각호의 1에 해당하는 자는 변리사가 되지 못함                    
                </div>
                <ul class="st01 mt10">
                    <li>금고이상의 실형을 선고받고 그 집행이 종료(집행이 종료된 것으로 보는 경우를 포함한다)되거나 집행이 면제된 날부터 3년이 경과되지 아니한 자</li>
                    <li>금고이상의 형의 집행유예선고를 받고 그 유예기간 중에 있는 자</li>
                    <li>미성년자 · 금치산자 또는 한정치산자</li>
                    <li>파산선고를 받은 자로서 복권되지 아니한 자</li>
                    <li>탄핵 또는 징계처분에 의하여 면직되거나 이 법 또는 변호사 법에 의하여 등록취소 또는 제명된 자로서 면직·등록취소 또는 제명된 후 2년을 경과하지 아니한 자</li>
                </ul> 

                <h4 class="NGR mt20">시험의 일부 면제</h4>
                <ul class="st01">
                    <li>2009년도 제46회 변리사 제1차 시험에 합격한 자는 2010년도 제47회 변리사 제1차 시험 면제</li>
                    <li>2007년도 제44회 변리사 제1차 시험 추가합격자는 2010년도 제47회 및 2011년도 제48회 변리사 제1차 시험 면제 
                        → 특허청 공고 제2009-148호 '2007년도 제44회 변리사 1차시험 불합격처분 취소 및 추가합격처분 공고'에 따른 추가합격자는 2010년도 제47회 및 2011년도 제48회 변리사 2차시험의 응시 기회가 부여됨
                    </li>
                    <li>특허청소속의 7급이상 공무원으로서 10년이상 특허행정사무에 종사한 경력이 있는 자(기준일 : 제2차 시험 초일)는 2010년도 제47회 변리사 제1차 시험 면제</li>
                    <li>특허청의 5급 이상 공무원 또는 고위공무원단에 속하는 일반직공무원으로서 5년 이상 특허행정 사무에 종사한 경력이 있는 자(기준일 : 
                        제2차 시험 초일)는 2010년도 제47회 변리사 제1차 시험의 전 과목 및 제2차 시험 과목 중 일부를 면제
                    </li>
                </ul> 
                
                <h4 class="NGR mt20">영어능력검정시험</h4>
                <div>
                    제1차 시험과목 중 영어시험은 아래의 영어능력검정시험으로 대체
                </div>
                <h5 class="NGR mt10">가. 기준점수</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="15%">
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th rowspan="2">시 험 명</th>
                                <th colspan="3">TOEFL</th>
                                <th rowspan="2">TOEIC</th>
                                <th rowspan="2">TEPS</th>
                                <th rowspan="2">G-TELP</th>
                                <th rowspan="2">FLEX</th>
                            </tr>
                            <tr>
                                <th>PBT</th>
                                <th>CBT</th>
                                <th>IBT</th>
                            </tr>
                        </thead>
                        <tbody>                            
                            <tr>
                                <th>기준점수</th>
                                <td>560</td>
                                <td>220</td>
                                <td>83</td>
                                <td>775</td>
                                <td>700</td>
                                <td>77(level-2)</td>
                                <td>700</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h5 class="NGR mt20">나. 청각장애인 기준점수</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="15%">
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th rowspan="2">시 험 명</th>
                                <th colspan="3">TOEFL</th>
                                <th rowspan="2">TOEIC</th>
                                <th rowspan="2">TEPS</th>
                                <th rowspan="2">G-TELP</th>
                                <th rowspan="2">FLEX</th>
                            </tr>
                            <tr>
                                <th>PBT</th>
                                <th>CBT</th>
                                <th>IBT</th>
                            </tr>
                        </thead>
                        <tbody>                            
                            <tr>
                                <th>기준점수</th>
                                <td>373</td>
                                <td>146</td>
                                <td>41</td>
                                <td>387</td>
                                <td>420</td>
                                <td>51(level-2)</td>
                                <td>350</td>
                            </tr>
                        </tbody>
                    </table>
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