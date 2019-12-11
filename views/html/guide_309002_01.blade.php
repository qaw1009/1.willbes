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
            <span class="depth-Arrow">></span><strong>공인노무사 시험안내</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">공인노무사 시험안내</h3>
            <ul class="guideTab NGR">
                <li><a href="#tab01" class="on">공인노무사 제도 개관</a></li>
                <li><a href="#tab02">공인노무사 시험일정 및 합격기준</a></li>
            </ul>

            <div id="tab01" class="tabCts">
                <h4 class="NGR">공인노무사란?</h4>
                <div>
                    노동관계법령 및 인사노무관리 분야에 대한 전문적인 지식과 경험을 제공함으로써 사업 또는 사업상의 노동관계업무의 원활한 운영과 노사관계를 자율적이고 합리적으로 개선시키는 전문인력을 의미한다.
                </div>
                <h4 class="NGR mt20">공인노무사의 주요 업무</h4>
                <h5 class="NGR">가. 노동위원회 관련 업무</h5>
                <ul class="st01">
                    <li>
                        부당해고, 징계, 전직, 감봉 등에 대한 구제신청대리
                    </li>
                    <li>
                        노동관계 법령의 규정을 바탕으로 행정기관에 신고, 신청, 보고, 진술, 청구(이의신청이나 심사 및 심판 청구 포함) 및 권리구제 등의 대행 또는 대리 업무를 수행. 
                        노동 관계법령 규정에 의한 모든 서류의 작성 및 확인, 노무관리 상담과 지도, 근로기준법의 적용을 받는 사업 및 사업장에 대한 노무관리 진단 등의 업무를 수행하며 노동쟁의를 조정, 중재하는 업무
                    </li>
                </ul>
                <h5 class="NGR">나. 기업의 인사노무관리의 자문 및 교육업무</h5>
                <ul class="st01">
                    <li>
                        기업의 현실에 맞는 인사 · 노무관리 체계의 설계 및 재조정, 채용에서 퇴직까지의 제반 법률문제에 대한 상담과 자문, 인사노무관리실무 및 노동법교육
                    </li>
                </ul>
                <h5 class="NGR">다. 노동부관련 업무</h5>
                <ul class="st01">
                    <li>취업규칙 등의 작성 · 변경 · 신고</li>
                    <li>노사협의회 규정의 작성 · 변경 · 신고</li>
                    <li>퇴직금과 체불임금 등의 권리구제 업무</li>
                    <li>도산 등 사실인정신청 및 체당금 지급 청구</li>                    
                </ul>
                <h5 class="NGR">라. 근로복지공단 관련 업무</h5>
                <ul class="st01">
                    <li>산업재해요양신청, 휴업급여, 장해보상, 유족급여, 장의비청구절차대리, 고용보험 · 산재보험사무조합의 운영, 고용보험 · 산재보험보험료관련정산업무</li>                    
                </ul>
                <h5 class="NGR">마. 산업재해보상보험심사위원회 관련업무</h5>
                <ul class="st01">
                    <li>산재보험관련 재심사청구 대리업무</li>
                    <li>노동법 상담 · 자문 · 사건해결 : 공인노무사는 근로자와 사용자의 의뢰나 위임에 따라서 노동법률과 이에 관련된 절차 등에 대해서 기본적인 상담 · 자문역할을 수행합니다.</li>
                    <li>인사노무관리 : 공인노무사자격제도는 전문자격사제도로서 현행 인사노무분야관리 국가에서 공인하는 최고의 자격증이자 유일한 자격증입니다.</li>
                    <li>노사분쟁해결<br>
                        ① 공인노무사는 노동조합 및 노동관계조정법상의 사적조정제도의 활성화를 통해서 노사분규에 개입하여 노사분쟁을 합리적으로 조정 · 중재하여 산업평화의 달성을 위해서 기여합니다. <br>
                        ② 공인노무사는 평소 사업주나 노동조합의 의뢰로 노사분쟁예방과 해결을 위해서 노사문제에 관한 상담 · 자문을 통해서 노사분쟁을 예방하고 해결합니다. </li>                                            
                </ul>

                <h4 class="NGR">공인노무사의 VISION</h4>
                <h5 class="NGR">가. 노동법률분야의 최고 전문자격사</h5>
                <ul class="st01">
                    <li>공인노무사는 노동관계법령에 의한 각종 권리구제신청의 대행 및 대리 그리고 인사 · 노무관리분야에 대한 전문적인 지식과 경험을 제공함으로써 
                    사업 또는 사업장에서 노동관계업무의 원활한 운영과 인사노무관리의 합리적 운영 및 개선을 도모하는 노동관계전문가로서 공인노무사법에 따라서 노동부가 인정하는 
                    노동법률 분야의 최고의 전문 자격사를 지칭합니다.</li>                                            
                </ul>
                <h5 class="NGR">나. 자격 취득 후의 진로</h5>
                <ul class="st01">
                    <li>독립된 공인노무사 사무소 설립</li>  
                    <li>합동사무소 개설(2인 이상)</li>  
                    <li>법인설립 혹은 기존법인에 가입(공인노무사 2인 이상시 법인설립가능)</li>  
                    <li>노동관련 각종기관에 특채 가능</li>  
                    <li>노동위원회 조정위원으로 위촉</li>  
                    <li>기업체, 각종 공사 단체 등에 취업 또는 노사관계 고문으로 위촉</li>  
                    <li>각종 인사 · 경영관련(기업의 고용조정, 구조조정, 경영혁신작업 등) 부분에서의 전문 컨설턴트로 활동</li>  
                    <li>노사관련 상담 및 기업체 노동법 및 노사관계 강의 등</li>                                            
                </ul>
                <h5 class="NGR">다. 전망</h5>
                <div>
                    향후 5년 동안 노무사에 대한 고용은 지속적으로 증가할 것으로 전망된다.<br> 
                    사회전반에 걸쳐 각종 기업체 및 공공조직에서의 노조조직과 활동이 활성화되고 있고, 노조의 활동이 활발해지면서 관련 노동쟁의 발생시 분쟁을 조정하거나 법적 절차를 대리하는 노무사의 역할이 증대할 것이다. 또한 기존의 기업체들은 노무법인에 의탁해 사건을 처리하였으나 점차 자체적으로 노무사를 고용하는 추세이다. 
                    또한 현재 산재 · 고용보험만이 노무사의 업무영역이나 향후 4대보험(건강보험 · 국민연금 · 고용보험 · 산재보험)이 통합하게 되면 노무사의 업무영역이 확대될 것으로 전망된다. 또한 현재 노무사는 노동사건의 행정심판 대리인 자격이 있으나 소송대리권 자격이 없어 이를 획득하기 위한 노력이 진행 중이며, 향후 소송대리권이 부여될 때엔 변호사와 같이 노동사건 행정소송에 대리인으로 활동할 수 있을 것이다. 
                    최근 들어 사회전반의 노동복지에 대한 관심이 증대되면서 고용과 임금 등에서 차별이나 부당함 등을 조사하는 ‘노무감사’의 필요성이 제기되고 있다. 이것은 근로기준법을 비롯한 노동법의 준수여부와 비정규직 노동자, 외국인노동자, 여성노동자 등 취약계층의 불평등요소를 감사하는 내용이 될 것이다. 만일 제도가 도입된다면 이를 담당할 인력은 노무사가 될 것으로 고용전망에 긍정적인 요인으로 작용할 것이다. 
                </div>
            </div>

            <div id="tab02" class="tabCts">
                <h4 class="NGR">공인노무사 자격취득 시험</h4>
                <div>
                    노무사가 되기 위해서는 한국산업인력공단에서 시행하는 공인노무사 시험에 합격해야 한다. 시험은 1차, 2차 및 면접시험으로 나뉜다. 
                    일정자격을 갖춘 경우(조합원 100인 이상 노동조합에서 노무전담자로 10년 이상 근무한 경우 등)는 시험의 일부과목을 면제받는다. 
                    공인노무사시험에 합격한 후 개업하고자 할 경우는 소정의 수습기간을 거쳐야 한다. 실무수습기간은 총 6개월로 직무교육(40시간)과 관련단체 실습, 견학과정, 공인노무사 사무소에서의 실제업무 수행으로 이루어진다.
                </div>
                <h4 class="NGR mt20">시험안내</h4>
                <h5 class="NGR">가. 시험일정</h5>
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
                                <th>구분</th>
                                <th>인터넷 원서접수</th>
                                <th>시험일자</th>
                                <th>합격자발표</th>
                                <th>시행지역</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1차시험</th>
                                <td>4.27(월) ~ 5.6(수)</td>
                                <td>6.6(토)</td>
                                <td>7.1(수)</td>
                                <td>7개지역본부 및 지사</td>
                            </tr>
                            <tr>
                                <th>2차시험</th>
                                <td rowspan="2">7.6(월) ~ 7.15(수)<br />
                                (2,3차 동시접수)</td>
                                <td>8.8(토) ~ 8.9(일)</td>
                                <td>10.7(수)</td>
                                <td>2개 지역본부</td>
                            </tr>
                            <tr>
                                <th>3차시험</th>
                                <td>10.17(토)~10.18(일)</td>
                                <td>11.4(수)</td>
                                <td>공단 본부</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h5 class="NGR mt20">나. 시행처 : 한국산업인력공단</h5>
                <h5 class="NGR">다. 응시자격</h5>
                <ul class="st01">
                    <li>공인노무사법 제4조 각 호의 결격 사유에 해당되지 않는 자(제3차시험 합격자 발표일 기준)</li>
                    <li>2차시험은 당해년도 1차시험 합격자 및 전년도 1차시험 합격한 자</li>
                    <li>3차시험은 당해년도 2차시험 합격자 및 전년도 2차시험 합격한 자</li>
                </ul>
                <h5 class="NGR">라. 시험지역</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="15%">
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>시행지역</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1차시험</th>
                                <td>서울지역본부, 서울동부지사, 서울남부지사, 대전지역본부, 대구지역본부, 부산지역본부, 광주지역본부 (7개 기관)</td>
                            </tr>
                            <tr>
                                <th>2차시험</th>
                                <td>서울지역본부, 대전지역본부 (2개 기관)</td>
                            </tr>
                            <tr>
                                <th>3차시험</th>
                                <td>공단 본부</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h5 class="NGR mt20">마. 시험과목</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="10%">
                            <col width="12%">
                            <col width="15%">
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>시험과목</th>
                                <th colspan="2">출제범위</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th rowspan="6">1차시험<br />
                                (6과목)</th>
                                <th rowspan="5">필수과목(5)</th>
                                <td>노동법(1)</td>
                                <td>근로기준법, 산업안전보건법, 직업안정법, 파견근로자보호 등에 관한 법률, 기간제 및 단시간근로자 보호 등에 관한 법률, 남녀고용평등법, 최저임금법, 근로자퇴직급여 보장법, 임금채권 보장법, 근로자복지기본법, 외국인근로자의 고용 등에 관한 법률</td>
                            </tr>
                            <tr>
                                <td>노동법(2)</td>
                                <td>노동조합 및 노동관계조정법, 근로자참여 및 협력증진에 관한 법률, 노동위원회법, 공무원의 노동조합 설립 및 운영에 관한 법률, 교원의 노동조합 설립 및 운영에 관한 법률</td>
                            </tr>
                            <tr>
                                <td>민법</td>
                                <td>총칙편, 채권편</td>
                            </tr>
                            <tr>
                                <td>사회보험법</td>
                                <td>사회보장기본법, 고용보험법, 산업재해보상보험법, 국민연금법, 국민건강보험법, 고용보험 및 산업재해보상보험의 보험료 징수 등에 관한 법률</td>
                            </tr>
                            <tr>
                                <td>영어</td>
                                <td>※ 2010년도 제19회 시험부터 영어과목은 영어능력검정시험 성적으로 대체</td>
                            </tr>
                            <tr>
                                <th>선택 과목</th>
                                <td><p>경제학원론</p>
                                <p> 경영학개론</p>
                                <p>중 택1</p></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th rowspan="4">2차시험<br />
                                (4과목)</th>
                                <th rowspan="3">필수과목(3)</th>
                                <td>노동법</td>
                                <td>근로기준법, 산업안전보건법, 산업재해보상보험법, 고용보험법, 파견근로자보호 등에 관한 법률, 기간제 및 단시간근로자 보호 등에 관한 법률, 노동조합 및 노동관계조정법, 근로자참여 및 협력증진에 관한 법률, 노동위원회법, 공무원의 노동조합설립 및 운영에 관한 법률, 교원의 노동조합설립 및 운영에 관한 법률</td>
                            </tr>
                            <tr>
                                <td>인사노무 관리론</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>행정쟁송법</td>
                                <td>쟁송법의 경우「행정심판법」,「행정소송법」,「민사소송법」중 행정쟁송 관련 부분</td>
                            </tr>
                            <tr>
                                <th>선택 과목</th>
                                <td><p>경영조직론</p>
                                <p> 노동경제학</p>
                                <p> 민사소송법</p>
                                <p>중 택1</p></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>3차시험</th>
                                <th colspan="2">면  접</th>
                                <td>공인노무사법시행령 제4조 제3항의 평정사항</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h5 class="NGR mt20">사. 일부과목 면제</h5>
                <ul class="st01">
                    <li>공인노무사법 시행령 제7조(시험의 일부면제) 해당자</li>
                </ul>
                <h5 class="NGR">아. 영어과목 민간어학시험 대체</h5>
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
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th rowspan="2">시험명</th>
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
                                <th>일반응시자<br>
                                기준점수
                                </th>
                                <td>530</td>
                                <td>197</td>
                                <td>71</td>
                                <td>700</td>
                                <td>625</td>
                                <td>레벨2의 65점</td>
                                <td>625</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <ul class="st01 mt10">
                    <li>자격별 유효점수 적용시점은 해당 자격의 시행계획 공고일부터 역산하여 2년이 되는 날이 속하는 해의 1월 1일 이후에 실시된 영어능력검정시험의 성적표 </li>
                    <li>국외에서 취득한 영어성적표도 인정하나, TOEIC시험에 한해서는 대한민국과 일본에서 시행하는 정규시험의 성적만 인정</li>
                </ul>
                <h5 class="NGR">자. 시험시간</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="15%">
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구 분</th>
                                <th>시험과목</th>
                                <th>시험시간</th>
                                <th>비 고</th>
                            </tr>
                        </thed>
                        <tbody>
                            <tr>
                                <th>1차시험</th>
                                <td>5과목(과목당 25문항)</td>
                                <td>09:30 ~ 11:35(125분)</td>
                                <td>09:00까지 입실완료</td>
                            </tr>
                            <tr>
                                <th rowspan="2">2차시험<br />
                                (양일간 진행)</th>
                                <td>2과목(과목당 3문항)</td>
                                <td>09:30 ~ 10:45(75분)<br />
                                11:05 ~ 12:30(75분)<br />
                                13:50 ~ 15:30(100분)</td>
                                <td>09:00까지 입실완료</td>
                            </tr>
                            <tr>
                                <td>2과목(과목당 3문항)</td>
                                <td>09:30 ~ 11:10(100분)<br />
                                11:40 ~ 13:20(100분)</td>
                                <td>09:00까지 입실완료</td>
                            </tr>
                            <tr>
                                <th>3차시험</th>
                                <td>면 접</td>
                                <td>10분내외</td>
                                <td>시험시행 5일전 국가자격시험 홈페이지<br />
                                (http://www.Q-net.or.kr)공고</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="NGR mt20">합격기준 및 합격자 발표</h4>
                <h5 class="NGR">가. 합격기준</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="15%">
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>합격자 결정기준</th>
                            </tr>
                        </thead>
                        </tboy>
                            <tr>
                                <th>1차시험</th>
                                <td>- 매 과목 100점을 만점으로 하여 매 과목 40점 이상, 전 과목 평균 60점 이상을 득점한 자(제1차시험 과목 중 일부를 면제받는 자는 응시한 매 과목 40점 이상, 응시한 전 과목 평균 60점 이상을 득점한 자)</td>
                            </tr>
                            <tr>
                                <th>2차시험</th>
                                <td><p>- 매 과목 배점의 4할 이상, 전 과목 배점 합계의 6할 이상을 득점한자 (제2차시험 과목 중 일부를 면제받는 자는 응시한 매 과목 배점의 4할 이상, 응시한 전 과목 배점 합계의 6할 이상을 득점한 자)다만, 제2차 시험에서 매 과목 배점의 4할 이상, 전 과목 배점 합계의 6할 이상을 득점한 자가 최소합격인원에 이르지 못한 경우에는 최소합격인원에 미달한 인원수의 범위에서 매 과목 배점의 4할 이상을 득점한 자 중 전 과목 총득점의 고득점자 순으로 추가하여 합격자를 결정 </p>
                                <p>- 위의 단서에 따라 합격자를 결정하는 경우에는 제2차 시험과목 중 일부를 면제받는 자에 대하여 매 과목 배점 4할 이상 득점한 자의 과목별 득점 합계에 1.5를 곱하여 산출한 점수를 전 과목 총득점으로 봄</p>
                                <p>- 제2차시험의 합격자 수가 동점자로 인하여 최소합격인원을 초과하는 경우에는 해당 동점자 모두를 합격자로 결정. 이 경우 동점자의 점수는 소수점 이하 셋째자리에서 반올림하여 둘째자리까지 계산</p></td>
                            </tr>
                            <tr>
                                <th>3차시험</th>
                                <td>- 면접시험 평정요소마다 각각 "상"(3점), "중"(2점), "하"(1점)로구분하고, 총 12점 만점으로 평균 8점이상 취득자. 다만, 위원의과반수가 어느 하나의 평정요소에 대하여 "하" 로 평정한 때에는불합격 처리</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h5 class="NGR mt20">나. 합격자 발표</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="30%">
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>기간</th>
                                <th>방법</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>제1차 시험 가답안 공개및 이의신청</th>
                                <td>시험시행익일부터 7일간</td>
                                <td><a href="http://www.q-net.or.kr/" target="_blank">인터넷 (http://www.Q-net.or.kr)</a></td>
                            </tr>
                            <tr>
                                <th>제1차 시험정답 발표</th>
                                <td>합격자 발표일로부터 7일간</td>
                                <td><a href="http://www.q-net.or.kr/" target="_blank">인터넷 (http://www.Q-net.or.kr)</a></td>
                            </tr>
                            <tr>
                                <th rowspan="2">합격자 발표</th>
                                <td>합격자 발표일로부터 10일간</td>
                                <td><a href="http://www.q-net.or.kr/" target="_blank">인터넷 (http://www.Q-net.or.kr)</a></td>
                            </tr>
                            <tr>
                                <td>합격자 발표일로부터 4일간</td>
                                <td>ARS(자동응답전화) : 060-700-2009(유료)</td>
                            </tr>
                            <tr>
                                <th>제1, 2차 시험 득점공개</th>
                                <td>합격자 발표일로부터 30일간</td>
                                <td><a href="http://www.q-net.or.kr/" target="_blank">인터넷 (http://www.Q-net.or.kr)</a></td>
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