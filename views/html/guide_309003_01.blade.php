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
            <span class="depth-Arrow">></span><strong>감정평가사 시험안내</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">감정평가사 시험안내</h3>
            <ul class="guideTab guideTab3ea NGR">
                <li><a href="#tab01" class="on">감정평가사 제도 개관</a></li>
                <li><a href="#tab02">시험안내</a></li>
                <li><a href="#tab03">합격 후 진로 및 전망</a></li>
            </ul>

            <div id="tab01" class="tabCts">
                <h4 class="NGR mt20">개요 및 제도 개관</h4>
                <h5 class="NGR">가. 감정평가사란?</h5>
                <ul class="st01">
                    <li>
                        타인의 의뢰에 의하여 토지, 건물, 동산 등의 경제적 가치를 판정하여 그 결과를 가액으로 표시하는 감정평가를 그 직무로 하는 자를 말한다. (부동산 가격공시 및 감정평가에 관한 법률 제22조 '직무')
                    </li>
                    <li>
                        감정평가사 자격증이 다른 전문자격증과 구별되는 몇 가지 매력을 보면, 업무의 특수성 및 전문성으로 인해 경쟁자의 침입우려가 없다는 점, 
                        법으로 고유 업무영역을 보장하고 있기에 매년 고정적인 수입이 안정적으로 보장된다는 점, 부동산시장개방, 부동산에 대한 인식변화에 따라 단순한 소유개념에서 
                        이용개념으로의 변화과정에 있어 그 업무영역이 점차 확대되어 가고 있다는 점, 업무가 사무실에서 진행되는 것이 아니라 현장에서 능동적으로 역동적으로 진행되는 업무라는 점, 
                        경기의 호황 불황에 영향을 적게 받는 직업 등을 들 수 있다.
                    </li>
                </ul>
                <h5 class="NGR">나. 감정평가사의 업무</h5>
                <ul class="st01">
                    <li>국가의 토지 정책을 위한 표준지 공시지가 평가</li>
                    <li>공공사업에 의한 부동산 매수 및 토시수용, 사용의 손실 보상액 산정</li>
                    <li>자산 재평가법에 의한 자산 재평가</li>
                    <li>금융기관, 보험회사, 신탁회사 등의 담보 평가</li>
                    <li>타인의 의뢰에 의한 감정평가</li>
                    <li>개별 공시지가 검증</li>
                    <li>감정평가 관련 사항 상담 및 자문</li>
                </ul>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="20%">
                            <col>
                        </colgroup>
                        <tr>
                            <th>업무</th>
                            <th>업무 내용</th>
                        </tr>
                        <tr>
                            <th>공시지가 / 
                            공시가격</th>
                            <td>표준지 공시지가의 조사ㆍ평가 / 표준주택 공시가격의 조사ㆍ평가</td>
                        </tr>
                        <tr>
                            <th>보상</th>
                            <td>공공용지의 매수ㆍ수용 등 각종 공공사업과 관련된 보상감정평가ㆍ징발법에 의한 징발토지의 보상감정평가</td>
                        </tr>
                        <tr>
                            <th>조세</th>
                            <td>토지에 관한 국세, 지방세 등의 부과기준가격산정을 위한 감정평가ㆍ개발이익금, 개발부담금 부과 기준가격 산정을 위한 감정평가</td>
                        </tr>
                        <tr>
                            <th>조성용지분양</th>
                            <td>국토의계획 및 이용에 관한 법률 등 관계법령에 의하여 조성된 주거용지, 공업용지, 관광용지 등의 가격산정을 위한 감정평가ㆍ토지구획정리, 경지정리지구 등의 환지청산 또는 체비지매각을 위한 토지의 감정평가</td>
                        </tr>
                        <tr>
                            <th>관리처분</th>
                            <td>재개발을 위한 관리처분계획 수립에 필요한 가격 및 분양가격 산정을 위한 감정평가</td>
                        </tr>
                        <tr>
                            <th>자산관리</th>
                            <td>금융기관, 정부투자 또는 출자기관, 기타 공공단체의 자산매입, 매각, 담보,관리를 위한 감정평가ㆍ사립학교법, 사회복지법 등의 법률에 의한 자산매입, 매각 등을 위한 감정평가</td>
                        </tr>
                        <tr>
                            <th>경매 및 소송</th>
                            <td>법원에 계류중인 경매, 민형사 및 행정소송 등을 위한 재산 감정평가</td>
                        </tr>
                        <tr>
                            <th>담보</th>
                            <td>금융기관, 보험회사, 신탁회사, 상호신용금고, 농ㆍ축ㆍ수협, 시설대여(리스) 회사, 창업투자회사 등의 담보물 감정평가ㆍ기업체의 대리점 개설 및 관리를 위한 담보물의 감정평가</td>
                        </tr>
                        <tr>
                            <th>일반거래</th>
                            <td>법인설립, 합병에 따른 자산감정평가ㆍ각종 인ㆍ허가, 이민수속 등을 위한 재산감정평가ㆍ기타 일반거래 및 재산관리를 위한 부동산 및 공장 등의 감정평가</td>
                        </tr>
                        <tr>
                            <th>기 타</th>
                            <td>부동산컨설팅</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div id="tab02" class="tabCts">
                <h4 class="NGR mt20">시험안내</h4>
                <h5 class="NGR">가. 2015년 시험일정</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
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
                                <th>원서접수기간</th>
                                <th>시험장소 공고</th>
                                <th>시행지역</th>
                                <th>시험일자</th>
                                <th>합격자발표</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1차시험</th>
                                <td rowspan="2">5.11(월) ~ 5.20(수)<br />
                                (1.2차시험동시접수)</td>
                                <td>원서접수 시 수험자 직접선택</td>
                                <td>서울, 부산, 광주, 대전</td>
                                <td>6. 27(토)</td>
                                <td>7. 29(수)</td>
                            </tr>
                            <tr>
                                <th>2차시험</th>
                                <td>추후공지</td>
                                <td>추후공지</td>
                                <td>9. 19(토)</td>
                                <td>12.16(수)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt10">
                    ※ 제2차 시험 응시자(시험의 일부면제자)도 제1차 시험과 동일한 접수기간 내에 원서접수를 하여야 시험응시 가능 
                </div>
                <h5 class="NGR mt20">나. 2016년도 변경사항 안내</h5>
                <ul class="st01">
                    <li>
                        시험 일정 변경 : 2016년도 감정평가사 자격시험부터 시행 일정이 다음과 같이 변경될 예정입니다.
                        <div>
                            <table cellspacing="0" cellpadding="0" class="table-Guided">
                                <colgroup>
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
                                        <th colspan="2">현 행</th>
                                        <th colspan="2">변경 후</th>
                                        <th rowspan="2">비 고</th>
                                    </tr>                                
                                    <tr>
                                        <th>제1차</th>
                                        <th>제2차</th>
                                        <th>제1차</th>
                                        <th>제2차</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>시 기</th>
                                        <td>7월</td>
                                        <td>9월</td>
                                        <td>3월</td>
                                        <td>7월</td>
                                        <td>2016년도 시험부터 적용</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt10">
                            ※ 원서접수, 합격자발표일 등 관련 일정이 시험시행일 변경에 따라 조정되며, 구체적인 시행일정은 2016년도 감정평가사 시행계획(‘15.12월 중 공고)을 참고하시기 바랍니다. 
                        </div>
                    </li>
                    <li>
                        시험과목 변경 : 「부동산 가격공시 및 감정평가에 관한 법」시행령 제55조 개정으로 2016년도부터 시험과목이 다음과 같이 변경됩니다.
                        <div>
                            <table cellspacing="0" cellpadding="0" class="table-Guided">
                                <colgroup>
                                    <col width="20%">
                                    <col>
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>구분</th>
                                        <th>시험과목</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>제1차 시험</th>
                                        <td class="tx-left">
                                        ① [민법] 중 총칙, 물권에 관한 규정<br />
                                        ② 경제학원론<br />
                                        ③ 부동산학원론<br />
                                        ④ 감정평가 관계 법규 (「국토의 계획 및 이용에 관한 법률」,「부동산가격 공시 및 감정평가에 관한 법률」,「국유재산법」,「건축법」,「측량ㆍ수로조사 및 지적에 관한 법률」중 지적에 관한 규정, 「부동산등기법」,「동산ㆍ채권								등의 담보에 관한 법률」,「도시 및 주거환경 정비법」)<br />
                                        ⑤ 회계학<br />
                                        ⑥ 영어 (영어시험성적 제출로 대체)
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt10">
                            ※ ‘경제학원론’ 의 경우 종전 ‘경제원론’ 과 출제범위ㆍ내용은 동일함
                        </div>
                    </li>
                </ul>
                <h5 class="NGR">다. 시험과목</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="15%">
                            <col>
                            <col width="45%">
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>교시</th>
                                <th>과목</th>
                                <th>입실완료</th>
                                <th>시험시간</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th rowspan="2">1차시험<br />
                                (선택형)</th>
                                <td>1교시</td>
                                <td>- 민법(총칙, 물권)
                                - 경제원론</td>
                                <td>09:00</td>
                                <td>09:30 ~ 10:50<br />
                                (80분)</td>
                            </tr>
                            <tr>
                                <td>2교시</td>
                                <td>- 회계학
                                - 부동산관계법규<br />
                                    (국토의 계획 및 이용에 관한 법률, 부동산가격공시 및 감정평가에 관한 법률, 국유재산법, 건축법, 측량ㆍ수로조사 및 지적에 관한 법률 중 지적에 관한 규정,부동산등기법) </td>
                                <td>11:10</td>
                                <td>11:20 ~ 12:40<br />
                                (80분)</td>
                            </tr>
                            <tr>
                                <th rowspan="3">2차시험<br />
                                (주관식 논술형)</th>
                                <td>1교시</td>
                                <td>- 감정평가실무</td>
                                <td>09:00</td>
                                <td>09:30 ~ 11:10<br />
                                (100분)</td>
                            </tr>
                            <tr>
                                <td>2교시</td>
                                <td>- 감정평가이론</td>
                                <td>12:30</td>
                                <td>12:40 ~ 14:20<br />
                                (100분)</td>
                            </tr>
                            <tr>
                                <td>3교시</td>
                                <td>- 감정평가 및 보상법규<br />
                                (공익사업을 위한 토지 등의 취득 및 보상에 관한 법률, 부동산 가격공시 및
                                    감정평가에 관한 법률)</td>
                                <td>14:40</td>
                                <td>14:50 ~ 16:30<br />
                                (100분)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt10">
                    ※ 시험과 관련하여 법령, 회계처리 등을 적용하여 정답을 구하는 문제는 시험시행공고일 현재 시행되는 법령, 회계처리 등을 적용하여 출제<br> 
                    ※ 회계처리 등과 관련된 시험문제는 한국채택국제회계기준(K-IFRS)을 적용하여 출제 
                </div>
                <h5 class="NGR mt20">라. 시험방법</h5>
                <ul class="st01">
                    <li>1차 시험 : 객관식 5지 선택형, 과목당 40분씩, 2교시</li>
                    <li>2차 시험 : 주관식 논술형(기입형 병행가능), 과목당 4문항(필요 시 증감가능) 100분씩, 3교시</li>
                </ul>                
                <h5 class="NGR mt20">마. 응시자격</h5>
                <ul class="st01">
                    <li>공인노무사법 시행령 제7조(시험의 일부면제) 해당자</li>
                </ul>         
                <h5 class="NGR mt20">사. 합격자 결정</h5>
                <ul class="st01">
                    <li>1차 시험 : 영어과목을 제외한 나머지 시험과목의 합격기준은 매과목 100점을 만점으로 매과목 40점 이상, 전과목 평균 60점 이상의 득점으로 함</li>
                    <li>2차 시험 : 매 과목 100점을 만점으로 하여 매 과목 40점 이상, 전 과목 평균 60점 이상을 득점한 자를 합격자로 결정하되, 매 과목 40점 이상, 
                        전 과목 평균 60점 이상을 득점한 자가 최소합격인원에 미달하는 경우에는 최소합격인원의 범위에서 매 과목 40점 이상을 득점한 자 중에서 전 과목 평균득점에 의한 고득점자 순으로 합격자를 결정</li>
                </ul> 
                
                <h5 class="NGR">아. 영어성적 제출</h5>
                <div>
                    제1차시험의 영어과목은 영어능력검정시험 성적표로 대체하며 영어과목 자체의 합격여부만 결정하고, 제1차시험의 총득점에는 산입하지 않음
                </div>
                <ul class="st01 mt10">
                    <li>영어성적표 제출대상 - 제1차시험 응시자 : 1차시험 면제로 2차시험만 응시하는 자는 영어성적표 제출 생략  </li>  
                    <li>영어시험의 종류 및 합격에 필요한 점수
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
                                        <th rowspan="2">시험명</th>
                                        <th colspan="2">TOEFL</th>
                                        <th rowspan="2">TOEIC</th>
                                        <th rowspan="2">TEPS</th>
                                        <th rowspan="2">G-TELP</th>
                                        <th rowspan="2">FLEX</th>
                                    </tr>                            
                                    <tr>
                                        <th>PBT</th>
                                        <th>IBT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>기준점수</th>
                                        <td rowspan="2">530</td>
                                        <td rowspan="2">71</td>
                                        <td rowspan="2">700</td>
                                        <td rowspan="2">625</td>
                                        <td rowspan="2">레벨2의 65점</td>
                                        <td rowspan="2">625</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt10">
                            ※ 응시원서 접수마감일부터 역산하여 2년이 되는 날 이후에 실시된 영어시험에서 취득한 성적표를 제출하여야 함<br>
                            ※ 해당 검정시험기관의 정기시험 성적만 인정하고, 정부기관ㆍ민간회사ㆍ학교 등에서 승진ㆍ연수ㆍ입사ㆍ입학ㆍ졸업 등의 특정목적으로 실시하는 수시ㆍ특별 시험 등은 인정되지 않음 <br>
                            ※ 국외에서 취득한 영어성적표도 인정하나, TOEIC시험에 한해서는 대한민국과 일본에서 시행하는 정기시험의 성적만 인정 <br>
                            ※ 토플(IBT) 성적표 제출자는 성적확인을 위해 성적표 우측하단에 아이디와 패스워드를 기재하여 제출<br>
                            ※ 자세한 정보는 시행처 홈페이지를 참고 하세요. 감정평사가 자격시험 안내 페이지 : http://www.q-net.or.kr/site/value<br>
                        </div>
                    </li>
                    <li>원서접수 / 합격자발표
                        <div>
                            <table cellspacing="0" cellpadding="0" class="table-Guided">
                                <colgroup>
                                    <col width="20%">
                                    <col width="20%">
                                    <col>
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th rowspan="4">원서접수</th>
                                        <td>접수방법</td>
                                        <td class="tx-left">- 인터넷 (http://www.Q-Net.or.kr/site/value) 접수만 가능<br />
                                        - 최근 6개월 이내에 촬영한 탈모 상반신 반명함판 사진을 그림파일(JPG 파일)로 첨부하여 인터넷 회원가입 후 원서접수<br />
                                        ※ 원서접수시 반드시 본인의 사진을 등재하여야 하며, 사진이 상이할 경우 응시에 제한될 수 있음</td>
                                    </tr>
                                    <tr>
                                        <td>원서접수 완료 후<br> 접수내용 변경 방법</td>
                                        <td class="tx-left">원서접수 후 접수내용을 변경해야할 경우 원서접수 기간내에 접수취소 후 재접수 하여야 하며, 원서접수 마감 이후에는 내용변경 및 재접수 불가</td>
                                    </tr>
                                    <tr>
                                        <td>시험장</td>
                                        <td class="tx-left">- 제1차 시험장은 수험자가 원서접수 시 인터넷에서 직접 선택<br />
                                        - 제2차 시험장은 감정평가사 홈페이지에 공고</td>
                                    </tr>
                                    <tr>
                                        <td>수험표 교부</td>
                                        <td class="tx-left">- 원서접수 완료 후 수험표를 직접 출력하여 시험당일 지참<br />
                                        - 수험표는 시험당일까지 재출력 가능</td>
                                    </tr>
                                    <tr>
                                        <th rowspan="2">합격자 발표 및<br>개인점수 안내</th>
                                        <td>1차 시험</td>
                                        <td class="tx-left">- 감정평가사 홈페이지 (http://www.Q-Net.or.kr/site/value) : 60일간<br />
                                        - 전국 대표번호 1666-0100 : 4일간</td>
                                    </tr>
                                    <tr>
                                        <td>2차 시험</td>
                                        <td class="tx-left">- 관보게재 : 명단(수험번호) 공고<br />
                                        - 감정평가사 홈페이지 (http://www.Q-Net.or.kr/site/value) : 60일간<br />
                                        - 전국 대표번호 1666-0100 : 4일간</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
                </ul>  
            </div>

            <div id="tab03" class="tabCts">
                <h4 class="NGR">합격 후 진로 및 전망</h4>
                <div>
                    ① 독립 감정 평가 사무소 설립 (단독 혹은 감정평가사 2~3인이 운영) <br>
                    ② 합동사무소 개설 (감정평가사 5~10인 이상이 운영) <br>
                    ③ 법인 설립 혹은 기존 법인에 가입(감정평가사 10인 이상의 등재시 법인설립 가능 - 기존 법인 가입 희망 시 참여 가능) <br>
                    ④ 국책기관에 취업(한국감정원 ㆍ 한국토지공사 ㆍ 대한주택공사 ㆍ 성업공사 ㆍ 한국주택은행 - 채용 ㆍ 승진시 우선권 부여됨)<br>
                </div>
                <h5 class="NGR">가. 개인사무소 개설</h5>
                <ul class="st01">
                    <li>감정평가사 사무소를 개설, 등록하고자 할 때에는 등록신청서에, 감정평가사의 자격을 증명하는 서류 
                        (인가를 받은 외국감정평가사의 경우에는 인가서의 사본)와 사무실의 보유를 증명하는 서류를 첨부하여 건설교통부장관에게 개설 등록을 하여야 한다.
                    </li>
                </ul>
                <h5 class="NGR mt20">나. 합동사무소 개설</h5>
                <ul class="st01">
                    <li>감정평가사는 그 업무를 효율적으로 수행하고 공신력을 높이기 위하여 필요한 경우 합동사무소를 설치할 수 있다. 
                        합동사무소를 개설하고자 할 때에는 개설등록 신청서에 규약을 첨부하여 건설교통부장관에게 제출하여야 한다. 또한 감정평가사 합동사무소의 구성원의 수는 3인 이상으로 한다.
                    </li>
                </ul>
                <h5 class="NGR">다. 감정평가법인 개설</h5>
                <ul class="st01">
                    <li>감정평가법인은 10인 이상의 감정평가사인 사원으로 구성한다. 다만, 감정평가법인의 대표사원 또는 대표이사는 감정평가사가 아닌 자로 할 수 있으며, 
                        이 경우 감정평가법인의 대표사원 또는 대표이사는 부동산 가격공시 및 감정평가에 관한 법률 제24조 각호의 1에 해당하는 자가 아니어야 한다.
                    </li>
                    <li>감정평가법인 설립인가를 받고자 할 때에는 발기인 전원이 서명날인 한 설립인가 신청서에 다음 서류를 첨부하여 건설교통부장관에게 제출하여야 한다.<br>
                        ① 정 관<br>
                        ② 사원 및 소속 감정평가사의 자격을 증명할 수 있는 서류(법 제25조의 규정에 인가를 받은 외국감정평가사의 경우에는 인가서의 사본을 말한다)<br>
                        ③ 사무실의 보유를 증명하는 서류<br>
                        ④ 기타 건설교통부령으로 정하는 서류
                    </li>
                    <li>감정평가법인은 주사무소 및 분사무소마다 1인 이상의 감정평가사를 두어야 한다.</li>
                    <li>기타 한국감정평가협회 회원사인 감정평가법인(출자 또는 소속감정평가사) 및 한국감정원의 채용기준에 의한 취업</li>
                </ul>
                <h5 class="NGR">라. 감정평가사 전망</h5>
                <h5 class="NGR">전망</h5>
                <ul class="st01">
                    <li>기존의 토지평가사와 공인감정사의 업무를 수행하는 감정평가사는 그 직무범위가 방대하고 전문 직업인으로써 최고의 안정적 수익을 올리는 직업이다.
                    </li>
                    <li>공시지가제도에 따라 매년 정부예산에 의한 수수료가 책정되어서 전국의 토지에 대한 조사와 평가를 실행하는 국책사업의 업무를 담당하고 있어서 매년 안정된 수입을 보장 받는다
                    </li>
                    <li>부동산가격의 적정화와 투명화로 전문직업인으로서의 사회적 위치와 명예를 인정받아 본 업무가 단지 한 개인의 삶의 
                        수단이 아니라 국민경제의 활성화와 투명성 보장을 수호하는 사회의 중요한 일원으로서의 자부심 또한 크다.
                    </li>
                    <li>사회적 ㆍ 경제적 복잡성으로 인하여 현대부동산이 가지는 개념이 소유의 개념에서 이용개념으로 전환됨으로써 컨설팅이란 사업 분야에 대한 확고한 전문인의 위치를 확보하고 있다.</li>
                    <li>개별공시지가 검증의 의무화로 고정수입이 보장된다.</li>
                    <li>최근 금융기관의 이자율 하락 등의 경제여건 변화로 인하여 부동산의 이용을 통한 수익의 창출이 금융기관, 기업체뿐만 아니라 일반인들에게도 
                        각광 받음에 따라 새로운 시장이 개척되고 있어 감정평가사의 사회적 지위ㆍ능력ㆍ수입 또한 높아지고 있다.
                    </li>
                    <li>평가사의 주업무중의 하나인 담보ㆍ경매평가 업무는 경기호황 시에는 담보평가의 비중이 높아지고, 경기불황 시에는 경매평가 업무의 비중이 높아져서 시중경기에 따른 여파를 적게 받는 직업이다.</li>
                    <li>타자격증에 비하여 상당한 고소득이 보장된다. 공시지가평가, 개별지가검증, 경매평가 등은 고정적인 수입과 기타 영업능력에 따른 개인차가 있음에도 불구하고 
                        감정평가사의 연봉(3년차 기준)은 6,000∼8,000만원을 호가하고 있다.
                    </li>
                </ul>
                <h5 class="NGR">기대수입</h5>
                <ul class="st01">
                    <li>감정평가사는 부동산 전문자격증으로 해를 거듭할수록 그 가치와 인기가 급상승하고 있다. 종래의 토지평가사와 공인감정사의 업무를 모두 수행할 수 있는 
                        감정평가사는 그 업무범위가 크다 하겠으나 매년 신규 감정평가사의 진입이 확대되고 있는데 비하여, 신규 시장 개척 등 시장규모 증가의 한계로 인하여 개인별 
                        수입규모 증대 또한 어려움을 겪고 있는 실정이어서 부동산에 관하여 감정평가를 포함한 종합서비스를 제공하는 전문가로서 변화를 꾀하고 있다.
                        앞으로는 지속적으로 변화하는 부동산 시장에 대한 사회적 요구를 파악하고 새로운 업무에 도전하여 신규시장을 개척하여야만 예전의 명예와 부를 얻지 않을까 생각된다.
                    </li>
                </ul>
            </div>
        </div>      
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop