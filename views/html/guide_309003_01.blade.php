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
                <h4 class="NGR mt20">2020년 시험일정</h4>
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
                                <th>구  분</th>
                                <th>면제서류 접수‧심사</th>
                                <th>원서접수(1,2차 동시접수)</th>
                                <th>시험장소</th>
                                <th>시행지역</th>
                                <th>시험일자</th>
                                <th>합격자발표</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>제1차 시험</th>
                                <td rowspan="2">1. 6.(월)09:00<br>
                                ∼ 1. 17.(금)17:00</td>
                                <td rowspan="2">1. 13.(월)09:00<br>
                                ∼ 1. 17.(금)18:00</td>
                                <td>원서접수 시
                                수험자
                                직접선택</td>
                                <td>서울, 부산, 대구, 광주, 대전</td>
                                <td>3. 7.(토)</td>
                                <td>4. 22.(수)</td>
                            </tr>
                            <tr>
                                <th>제2차 시험</th>
                                <td>5 .25(월) 공지</td>
                                <td>서울, 부산</td>
                                <td>6. 6.(토)</td>
                                <td>9. 9.(수)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt10">
                    ※ 제2차 시험 응시자(시험의 일부면제자)도 제1차 시험과 동일한 접수기간 내에 원서접수를 하여야 시험응시 가능
                </div>

                <h4 class="NGR mt20">2020년 변경사항 안내</h4>
                <h5 class="NGR mt20">2021년도 변경사항(예정)</h5>
                <div class="mt10">
                    ◎ 국가전문자격시험 신분확인 및 전자(통신)기기 관리·운영 변경
                </div>
                <ul class="st01 mt10">
                    <li>시험당일 인정 신분증을 지참하지 않은 경우 당해시험 정지(퇴실) 및 무효 처리</li>
                    <li>전자ㆍ통신기기(전자계산기 등 소지를 허용한 물품 제외)의 시험장 반입 원칙적 금지</li>
                    <li>소지품 정리시간(수험자교육 시 휴대폰 등 전자기기 지정장소 제출) 이후 시험 중 전자ㆍ통신기기 등 소지불가 
                        물품을 소지ㆍ착용하고 있는 경우에는 당해시험 정지(퇴실) 및 무효(0점) 처리</li>
                    <li> 변경기준은 시험일 기준 2021. 1. 1. 이후 실시하는 시험부터 적용</li>
                </ul> 
                <div>
                    ※ 2021. 1. 1. 부터 공단에서 실시하는 37개 국가전문자격시험*에서 아래의 준수사항을 위반한 수험자는 시험정지(퇴실) 및 무효(0점)처리 됨
                </div>
                <h5 class="NGR mt20">2020년도 주요 ⦁ 변경사항</h5>
                <ul class="st01 mt10">
                    <li>원서접수기간 변경 <br>
                        - 기존 : 10일 간 원서접수 시행 > <span class="tx-red">5일 간</span> 원서접수 시행
                    </li>
                    <li>수험자 경력증빙서류 간소화 서비스 실시<br>
                        - 면제서류 심사 시 공단에서 행정정보공동이용시스템을 통해 수험자 경력증빙서류 일부*를 확인하는 것에 동의하는 수험자는 
                        해당 4대 보험 가입증명서를 방문 및 우편제출하지 않아도 됨 <br>
                        * 국민연금가입자가입증명 및 건강보험자격득실확인서</li>
                    <li>제2차 시험 채점평 안내서비스 폐지</li>
                </ul> 

                <h4 class="NGR mt20">시험과목 및 시험시간</h4>
                <h5 class="NGR mt20">가. 시험과목(감정평가 및 감정평가사에 관한 법률 시행령 제9조)</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="120px">
                            <col>
                            <col width="120px">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>시험과목</th>
                                <th>시험방법</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>제1차<br />
                                시 험</th>
                                <td class="tx-left"> - 「민법」 중 총칙, 물권에 관한 규정<br />   
                                -  경제학원론<br />
                                -  부동산학원론<br />
                                -  감정평가 관계 법규(「국토의 계획 및 이용에 관한 법률」,「건축법」,「공간정보의 구축 및 관리 등에 관한 법률」중 지적에 관한 규정,「국유재산법」,「도시 및 주거환경정비법」,「부동산등기법」,「감정평가 및 감정평가사에 관한 법률」,「부동산 가격공시에 관한 법률」및「동산ㆍ채권 등의 담보에 관한 법률」)<br />
                                -  회계학 <br />
                                -  영어(영어시험성적 제출로 대체)</td>
                                <td>객관식
                                <br />
                                5지
                                택일형</td>
                            </tr>
                            <tr>
                                <th>제2차<br />
                                시 험</th>
                                <td class="tx-left">-  감정평가실무<br />
                                -  감정평가이론<br />
                                -  감정평가 및 보상 법규 (「감정평가 및 감정평가사에 관한 법률」,「공익사업을 위한 토지 등의 취득 및 보상에 관한 법률」,「부동산 가격공시에 관한 법률」)</td>
                                <td>주관식
                                <br />
                                논술형<br />
                            (기입형 병행가능)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="NGR mt20">나. 과목별 시험시간</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="120px">
                            <col>
                            <col width="200px">
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>시험구분</th>
                                <th>교시</th>
                                <th>시 험 과 목</th>
                                <th>입실완료</th>
                                <th>시 험 시 간</th>
                                <th>문항수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th rowspan="2">제1차
                                시 험</th>
                                <td>1교시</td>
                                <td class="tx-left">-  민법(총칙, 물권)<br>
                                -  경제학원론<br>
                                -  부동산학원론</td>
                                <td>09:00</td>
                                <td>09:30∼11:30(120분)</td>
                                <td rowspan="2">과목별 40문항</td>
                            </tr>
                            <tr>
                                <td>2교시</td>
                                <td class="tx-left">-  감정평가 관계 법규<br>
                                -  회계학</td>
                                <td>11:50</td>
                                <td>12:00∼13:20(80분)</td>
                            </tr>
                            <tr>
                                <th rowspan="4">제2차
                                시 험</th>
                                <td>1교시</td>
                                <td class="tx-left">-  감정평가실무</td>
                                <td>09:00</td>
                                <td>09:30∼11:10(100분)</td>
                                <td rowspan="4">과목별
                                4문항
                                (필요 시
                                증감가능)</td>
                            </tr>
                            <tr>
                                <td colspan="4">중 식 시 간 11:10 ~ 12:30 (80분)</td>
                            </tr>
                            <tr>
                                <td>2교시</td>
                                <td class="tx-left">-  감정평가이론</td>
                                <td>12:30</td>
                                <td>12:40∼14:20(100분)</td>
                            </tr>
                            <tr>
                                <td>3교시</td>
                                <td class="tx-left">-  감정평가 및 보상 법규</td>
                                <td>14:40</td>
                                <td>14:50∼16:30(100분)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt10">
                    ※ 장애인 등 응시 편의제공으로 시험시간 연장 시 수험인원과 효율적인 시험집행을 고려하여 시행기관에서 휴식 시간 및 중식시간을 조정할 수 있음<br>
                    ▪ 시험과 관련하여 법률ㆍ회계처리기준 등을 적용하여 정답을 구하여야 하는 문제는 시험시행일 현재 시행 중인 법률ㆍ회계처리기준 등을 적용하여 그 정답을 구하여야 함<br>
                    ▪ 회계학 과목의 경우 한국채택국제회계기준(K-IFRS)만 적용하여 출제
                </div>
                <h5 class="NGR mt20">다. 출제영역</h5>
                <div class="mt10">
                    ◎ 큐넷 감정평가사 홈페이지(www.Q-Net.or.kr/site/value) 자료실 게재
                </div>

                <h4 class="NGR mt20">응시자격 및 결격사유</h4>
                <h5 class="NGR mt20">가. 응시자격 : 없음</h5>
                <div>
                    ※ 단, 제2차 시험 합격자 발표일(2020. 9. 9.) 기준, 감정평가 및 감정평가사에 관한 법률 제12조의 결격사유에 해당하는 
                    사람 또는 같은 법 제16조제1항에 따른 처분을 받은 날부터 5년이 지나지 아니한 사람은 시험에 응시할 수 없음
                </div>
                <h5 class="NGR mt20">나. 결격사유 (감정평가 및 감정평가사에 관한 법률 제12조) </h5>
                <div class="mt10">
                    ◎ 다음 각 호의 어느 하나에 해당하는 사람
                </div>
                <ul class="st01 mt10">
                    <li>미성년자 또는 피성년후견인‧피한정후견인</li>
                    <li>파산선고를 받은 사람으로서 복권되지 아니한 사람</li>
                    <li>금고 이상의 실형을 선고받고 그 집행이 종료(집행이 종료된 것으로 보는 경우를 포함한다)되거나 그 집행이 면제된 날부터 3년이 지나지 아니한 사람</li>
                    <li>금고 이상의 형의 집행유예를 받고 그 유예기간이 만료된 날부터 1년이 지나지 아니한 사람</li>
                    <li>금고 이상의 형의 선고유예를 받고 그 선고유예기간 중에 있는 사람</li>
                    <li>같은 법 제13조에 따라 감정평가사 자격이 취소된 후 3년이 경과되지 아니한 사람</li>
                    <li>같은 법 제39조제1항제11호 및 제12호에 따라 자격이 취소된 후 5년이 경과되지 아니한 사람</li>
                </ul> 

                <h4 class="NGR mt20">합격자 결정</h4>
                <h5 class="NGR mt20">가. 합격자 결정 (감정평가 및 감정평가사에 관한 법률 시행령 제10조)</h5>
                <ul class="st01 mt10">
                    <li>제1차 시험<br>
                    - 목을 제외한 나머지 시험과목에서 과목당 100점을 만점으로 하여 모든 과목 40점 이상이고, 전 과목 평균 60점 이상인 사람</li>
                    <li>제2차 시험<br>
                    - 과목당 100점을 만점으로 하여 모든 과목 40점 이상, 전 과목 평균 60점 이상을 득점한 사람<br>
                    - 최소합격인원에 미달하는 경우 최소합격인원의 범위에서 모든 과목 40점 이상을 득점한 사람 중에서 전 과목 평균점수가 높은 순으로 합격자를 결정</li>
                </ul> 
                <div class="mt10">
                    ※ 동점자로 인하여 최소합격인원을 초과하는 경우에는 동점자 모두를 합격자로 결정. 이 경우 동점자의 점수는 소수점 이하 둘째자리까지만 계산하며, 반올림은 하지 아니함
                </div>

                <h5 class="NGR mt20">나. 제2차 시험 최소합격인원 결정(감정평가 및 감정평가사에 관한 법률 시행령 제10조)</h5>
                <div class="mt10">
                    ◎ 2020년도 제31회 감정평가사 제2차 시험 최소합격인원:  180명
                </div>

                <h4 class="NGR mt20">제1차 시험 면제</h4>
                <h5 class="NGR mt20">가. 2019년도 제30회 감정평가사 제1차 시험 합격자(전년도 제1차 시험 합격자의 원서접수)</h5>     
                <ul class="st01 mt10">
                    <li>‘제1차 시험 면제자’ 응시유형으로 원서접수 (2020년도에 한함)<br>
                    - 별도의 서류 제출 없이 인터넷 원서접수</li>
                    <li>‘제1차 시험 재 응시자’ 응시유형으로 접수 및 1차 시험 재응시<br>
                    - 원서접수 시 “재 응시자”로 선택하여 접수<br>
                    - 제1차 시험에 재 응시하여 불합격(결시 포함)하여도 금회 제2차 시험에 응시가능하며, 금회 제2차 시험에 합격하면 합격자 처리<br>
                    - 재 응시자로 접수하는 경우, 유효한 영어성적 입력은 필수<br>
                      (전년도에 입력한 영어성적표 유효기간이 만료된 경우, 유효한 영어성적표를 다시 입력)</li>
                </ul>  
                <h5 class="NGR mt20">나. 감정평가 및 감정평가사에 관한 법률 시행령 제14조에서 정한 다음 기관에서 제2차 시험 시행일 현재 5년 이상 
                감정평가와 관련된 업무에 종사한 사람</h5>     
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided table-Guided2">
                        <colgroup>
                            <col width="33.3333%">
                            <col>
                            <col width="33.3333%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>법정기관</th>
                                <th>면제대상 업무</th>
                                <th>면제대상 기관</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1.감정평가법인
                            <br />
                            2.감정평가사사무소
                            <br />
                            3.한국감정평가사협회</td>
                            <td>- 감정평가에 관한 현장조사, 연구 등 보조업무<br />
                            ※ 단순노무(회계, 전산, 총무, 
                            행정 사무 등은 제외)</td>
                            <td>- 감정평가법인<br />
                            - 감정평가사사무소<br />
                            - 한국감정평가사협회</td>
                        </tr>
                        <tr>
                            <td>4.한국감정원</td>
                            <td>- 감정평가에 관한 현장조사, 연구 등 보조업무<br />
                        ※ 단순노무(회계, 전산, 총무, 
                                행정 사무 등은 제외)
                            <br />
                            - 타당성조사, 평가검토 등 감정평가 관련 업무</td>
                            <td>- 한국감정원</td>
                        </tr>
                        <tr>
                            <td rowspan="2">5.감정평가업무를 지도ㆍ감독하는 기관</td>
                            <td>- 토지수용 및 용지보상<br />
                            - 공시지가 및 감정평가에 관한 제도운영 및 지도ㆍ감독
                            <br />
                            - 택지소유상한제 및 개발부담금제 운영</td>
                            <td>- 국토교통부 : 토지정책관 (구 토지국)<br />
                            - 중앙토지수용위원회<br />
                            - 지방국토관리청 : 보상과<br />
                            - 국토관리사무소 : 운영지원과
                            (구 국도유지사무소 : 관리과)</td>
                        </tr>
                        <tr>
                            <td>- 위 업무에 대한 지도감독</td>
                            <td>- 감사원 : 좌 업무 감사부서</td>
                        </tr>
                        <tr>
                            <td rowspan="2">6.개별공시지가,개별주택가격,공동주택가격을 결정ㆍ공시하는 업무를 수행하거나 그 업무를 지도ㆍ감독하는 기관</td>
                            <td>- 개별공시지가, 개별주택가격, 공동주택가격을 결정ㆍ공시 업무</td>
                            <td>- 시ㆍ도 : 좌 업무 담당부서<br />
                            - 시ㆍ군ㆍ구 : 좌 업무 담당부서
                            - 한국감정원 : 좌 업무 담당부서</td>
                        </tr>
                        <tr>
                            <td>- 위 업무에 대한 지도 감독</td>
                            <td>- 감사원 : 좌 업무 감사부서</td>
                        </tr>
                        <tr>
                            <td>7.토지가격비준표, 주택가격비준표를 작성하는 업무를 수행하는 기관</td>
                            <td>- 토지가격비준표, 주택가격비준표를 작성하는 업무</td>
                            <td>- 한국감정원 : 좌 업무 담당부서</td>
                        </tr>
                        <tr>
                            <td>8.국유재산을 관리하는 기관</td>
                            <td>- 국유재산을 관리하는 업무</td>
                            <td>- 기획재정부 : 국유재산정책과, 국유재산조정과(구 국유재산과)</td>
                        </tr>
                        <tr>
                            <td>9.과세시가표준액을 조사ㆍ결정하는 업무를 수행하거나 그 업무를 지도ㆍ감독하는 기관</td>
                            <td>- 과세시가표준액의 조사ㆍ결정<br />
                            - 기준시가의 조사ㆍ결정<br />
                            - 위 업무에 대한 지도ㆍ감독</td>
                            <td>- 행정안전부 : 지방세정책과, 지방세운영과 (구 도세과, 구 시군세과)<br />
                            - 시ㆍ도 : 좌 업무 담당부서 <br />
                            - 시ㆍ군ㆍ구 : 좌 업무 담당부서<br />
                            - 국세청 및 소속기관 : 재산세 관련과<br />
                            - 감사원 : 좌 업무 감사부서</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="NGR mt20">공인영어성적</h4>
                <h5 class="NGR mt20">가. 제1차 시험 영어 과목은 영어시험성적으로 대체</h5>
                <ul class="st01 mt10">
                    <li>기준점수
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
                                        <th rowspan="3">시 험 명</p></th>
                                        <th colspan="2">TOEFL</th>
                                        <th rowspan="3">TOEIC</th>
                                        <th colspan="2" rowspan="2">TEPS</th>
                                        <th rowspan="3">G-TELP</th>
                                        <th rowspan="3">FLEX</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2">PBT</th>
                                        <th rowspan="2">IBT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>일반응시자</p></th>
                                        <td>530</td>
                                        <td>71</td>
                                        <td>700</td>
                                        <td>625</td>
                                        <td>340</td>
                                        <td>65(level-2)</td>
                                        <td>625</td>
                                    </tr>
                                    <tr>
                                        <th>청각장애인</p></th>
                                        <td>352</td>
                                        <td>-</td>
                                        <td>350</td>
                                        <td>375</td>
                                        <td>204</td>
                                        <td>43(level-2)</td>
                                        <td>375</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li>응시원서 접수마감일부터 역산하여 2년이 되는 날 이후에 실시된 시험으로 제1차 시험 원서접수 마감일까지 
                        성적발표 및 성적표가 교부된 경우에 한해 인정함<br>
                        ※ 2018. 1. 18.  ∼ 2020. 1. 17. 사이에 실시 및 성적표가 교부된 어학시험</li>
                    <li>해당 외국어시험기관의 정기시험 성적만 인정하고, 정부기관ㆍ민간회사ㆍ학교 등에서 승진ㆍ연수ㆍ입사ㆍ입학ㆍ졸업 등의 
                        특정 목적으로 실시하는 수시 또는 특별시험은 인정하지 않음</li>
                    <li>국외에서 취득한 공인어학성적도 인정 ※ 단, 성적표 원본에 대사관 확인(단, 아포스티유 협약 가입국가는 아포스티유     
                        증명서로 대체)후 한국어로 번역․공증 또는 외국어번역행정사가 발급한 번역 확인증명서를 제출한 경우에 한하여 인정함 </li>
                    <li>TOEIC시험에 한해서는 대한민국과 일본에서 시행하는 정기시험 성적만 인정※ 일본에서 취득한 토익성적의 경우 원서접수 마감일까지 성적표 및 성적확인동의서
                        스캔본 1부 전자우편(exam@hrdkorea.or.kr) 제출 및 유선연락 (052-714-8384) (양식은 큐넷 감정평가사 자료실 등재)</li>
                    <li>제출방법 : 원서접수 시 영어성적 입력(TOEIC 및 G-TELP의 경우 온라인(다이렉트) 제출 가능) <br>
                        - 원서접수 시 해당 공인어학시험 종류를 선택하고, 응시일자 및 취득점수 등을 정확히 입력
                        <div class="tx-blue bd-gray mt10 mb10 pd20">
                            [공인어학성적 다이렉트 제출 서비스 이용 방법]<br>
                            - 큐넷 메뉴 : 감정평가사 홈페이지- 마이페이지- 공인어학성적 제출 서비스 <br> 
                            - 승인 내역은 감정평가사 홈페이지-마이페이지-과거 어학성적 제출내역에서 확인<br>
                            - 서비스 무상제공으로 별도의 수수료 없음
                        </div>
                        - 공인어학성적의 위ㆍ변조 또는 부당한 목적으로 영어성적을 허위 입력한 경우 해당시험은 무효처리 되며, 
                        감정평가 및 감정평가사에 관한 법률 제16조에 따라 5년 간 응시자격이 정지될 수 있음
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