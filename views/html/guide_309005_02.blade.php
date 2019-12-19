@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">전문자격증<span class="row-line">|</span></li>
                <li class="subTit">관세사</li>
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
            <span class="depth-Arrow">></span><strong>시험안내 및 과목</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">시험안내 및 과목</h3>
            <ul class="guideTab guideTab4ea NGR">
                <li><a href="#tab01" class="on">시험일정</a></li>
                <li><a href="#tab02">시험과목 및 합격기준</a></li>
                <li><a href="#tab03">시험의 일부면제</a></li>
                <li><a href="#tab04">유의사항</a></li>
            </ul>

            <div id="tab01" class="tabCts">
                <h4 class="NGR">시험일정</h4>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="20%">
                            <col>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>접수기간</th>
                                <th>서류제출기간</th>
                                <th>시험일정</th>
                                <th>의견제시기간</th>
                                <th>합격자 발표</th>
                            </tr>
                        </thead>
                        </tbody>
                            <tr>
                                <th>2016년 33회 1차</th>
                                <td>2016.02.22~03.22</td>
                                <td>2016-01-25~02.03</td>
                                <td>2016.04.02</td>
                                <td>2016.04.02~04.08</td>
                                <td>2016.05.18</td>
                            </tr>
                            <tr>
                                <th>2016년 33회 2차</th>
                                <td>2016.02.22~03.02</td>
                                <td>2016-01-25~02.03</td>
                                <td>2016.07.09</td>
                                <td></td>
                                <td>2016.10.19</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt10">
                    1) 시행처 : 산업인력 관리공단<br>
                    2) 응시료 : 20,000원<br>
                    ※ 계산기 지참 가능(단, 공학용계산기 불가)
                </div>
                <h4 class="NGR mt20">시험정보</h4>
                <h5 class="NGR mt20">가. 응시자격</h5>
                <ul class="st01">
                    <li>제한없음</li>
                    <li>단, 제 2차시험 합격자 공고일기준 관세사법 제5조 각호의 결격사유에 해당하는 자는 시험에 응시할 수 없음(결격사유 해당자는 시험에 합격하더라도 원천 무효됨)</li>
                </ul>
                <h5 class="NGR mt20">나. 결격사유</h5>
                <ul class="st01">
                    <li>미성년자</li>
                    <li>금치산자</li>
                    <li>파산선고를 받고 복권되지 아니한 자</li>
                    <li>관세사법 또는 관세법을 위반하여 징역의 실형을 선고받고 그 집행이 종료(집행이 종료된 것으로 보는 경우를 포함한다.)되거나 집행이 면제된 날부터 3년이 경과되지 아니한 자</li>
                    <li>관세사법 또는 관세법을 위반하여 징역형의 집행유예선고를 받고 그 유예기간중에 있는 자</li>
                    <li>관사법 제29조 및 관세법 제269조 내지 제271조 및 제274조의 규정에 의하여 벌금형 또는 통고처분을 받은 자로서 그 벌금형의 선고를 받거나 통고처분을 이행한 후 2년을 경화하지 아니한 자. 
                    다만, 관세사법제 30조 및 관세법 제279조의 규정에 의하여 처벌 된자를 제외한다.</li>
                    <li>징계처분에 의하여 그 직으로부터 파면 또는 해임당한 자로서 파면 또는 해임 후 2년을 경과하지 아니한 자</li>
                </ul>

                <h4 class="NGR mt20">시험과목 및 배점</h4>
                <h5 class="NGR mt20">가. 1차시험</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="15%">
                            <col width="15%">
                            <col>
                            <col width="8%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>교시</th>
                                <th>시험과목</th>
                                <th>문항수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th rowspan="4">제1차 시험<br />객관식(5지선택)<br />
                                - 4/11</th>
                                <th rowspan="2">1교시<br />
                                09:00 ~, 80분</th>
                                <td>관세법개론<br />
                                (자유무역협정 이행을 위한 관세 특례법 및 대한민국정부와 칠레공화국정부 간의 자유무역협정의 이행을 위한 관세법의 특례에 관한 법률을 포함)</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>무역영어</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <th rowspan="2">2교시<br />
                                80분</th>
                                <td>내국소비세법(부가가치세법, 개별소비세법, 주세법에 한함)</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>회계학(회계원리와 회계이론에 한함)</td>
                                <td>40</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <ul class="st01 mt10">
                    <li>과목당 40문제(문제당 2.5점)</li>
                    <li>객관식 5지선택형</li>
                    <li>합격기준 과목당 40이상, 평균 60점 이상</li>
                </ul>
                <h5 class="NGR mt20">나. 2차시험</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="18%">
                            <col width="15%">
                            <col>
                            <col width="8%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>교시</th>
                                <th>시험과목</th>
                                <th>문항수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th rowspan="4">제2차 시험<br />주관식(논술형)<br />
                                - 7/11<br />
                                <br />
                                시험일부과목 면제자는<br />
                                13:30분까지 입실완료</th>
                                <th>1교시(면제)<br />
                                09:00 ~, 80분</th>
                                <td>관세법<br />
                                (관세평가 제외, 수출용원재료에 대한 관세 등 환급에 관한 특례법 포함)</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <th>2교시(면제)<br />
                                11:10 ~, 80분</th>
                                <td>관세율표 및 상품학</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <th>3교시<br />
                                13:40 ~, 80분</th>
                                <td>관세평가</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <th>4교시<br />
                                15:40 ~ , 80분</th>
                                <td>무역실무(대외무역법 및 외국환거래법 포함)</td>
                                <td>6</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <ul class="st01 mt10">
                    <li>과목당 40문제(문제당 2.5점)</li>
                    <li>객관식 5지선택형</li>
                    <li>합격기준 과목당 40이상, 평균 60점 이상</li>
                </ul>
                <h5 class="NGR mt20">다. 접수방법</h5>
                <div>
                    www.q-net.or.kr(인터넷으로만 접수 가능)
                </div>
            </div>

            <div id="tab02" class="tabCts">
                <h4 class="NGR">시험과목 및 배점</h4>
                <h5 class="NGR mt20">가. 1차시험</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="15%">
                            <col width="15%">
                            <col>
                            <col width="8%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>교시</th>
                                <th>시험과목</th>
                                <th>문항수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th rowspan="4">제1차 시험<br />객관식(5지선택)<br />
                                - 4/11</th>
                                <th rowspan="2">1교시<br />
                                09:00 ~, 80분</th>
                                <td>관세법개론<br />
                                (자유무역협정 이행을 위한 관세 특례법 및 대한민국정부와 칠레공화국정부 간의 자유무역협정의 이행을 위한 관세법의 특례에 관한 법률을 포함)</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>무역영어</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <th rowspan="2">2교시<br />
                                80분</th>
                                <td>내국소비세법(부가가치세법, 개별소비세법, 주세법에 한함)</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>회계학(회계원리와 회계이론에 한함)</td>
                                <td>40</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <ul class="st01 mt10">
                    <li>과목당 40문제(문제당 2.5점)</li>
                    <li>객관식 5지선택형</li>
                    <li>합격기준 과목당 40이상, 평균 60점 이상</li>
                </ul>
                <h5 class="NGR mt20">나. 2차시험</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="18%">
                            <col width="15%">
                            <col>
                            <col width="8%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>교시</th>
                                <th>시험과목</th>
                                <th>문항수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th rowspan="4">제2차 시험<br />주관식(논술형)<br />
                                - 7/11<br />
                                <br />
                                시험일부과목 면제자는<br />
                                13:30분까지 입실완료</th>
                                <th>1교시(면제)<br />
                                09:00 ~, 80분</th>
                                <td>관세법<br />
                                (관세평가 제외, 수출용원재료에 대한 관세 등 환급에 관한 특례법 포함)</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <th>2교시(면제)<br />
                                11:10 ~, 80분</th>
                                <td>관세율표 및 상품학</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <th>3교시<br />
                                13:40 ~, 80분</th>
                                <td>관세평가</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <th>4교시<br />
                                15:40 ~ , 80분</th>
                                <td>무역실무(대외무역법 및 외국환거래법 포함)</td>
                                <td>6</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <ul class="st01 mt10">
                    <li>과목당 40문제(문제당 2.5점)</li>
                    <li>객관식 5지선택형</li>
                    <li>합격기준 과목당 40이상, 평균 60점 이상</li>
                </ul>
                <h5 class="NGR mt20">다. 접수방법</h5>
                <div>
                    www.q-net.or.kr(인터넷으로만 접수 가능)
                </div>

                <h4 class="NGR mt20">합격자 결정 미치 발표</h4>
                <ul class="st01 mt10">
                    <li>제 1차 시험에서는 매 과목 100점을 만점으로 하여 매 과목 40점 이상, 전과목 평균 60점 이상을 득점한 자를 합격자로 결정</li>
                    <li>제 2차 시험에서는 매 과목 100점을 만점으로 하여 매 과목 40점 이상, 전과목 평균 60점 이상을 득점한 자를 합격자로 결정
                    다만, 매 과목 40점 이상, 전과목 평균 60점 이상을 득점한 자가 관세사법 시행령 제10조의 제3항의 규정에 의한 최소합격인원에 
                    미달하는 경우에는 동 최소합격인원의 범위안에서 매 과목 40점 이상을 득점한 자 중에서 전 과목 평균득점에 의한 고득점자순으로 합격자를 결정<br>
                    ※ 상기 단서규정에 의하여 합격자를 결정함에 있어서 동점자로 인하여 최소합격인원을 초과하는 경우에는 당해 동점자 모두를 합격자로 결정. 이 경우 동점자의 점수계산은 소수점 이하 둘째자리까지 계산<br>
                    ※ 최소합격인원 : 2014년도 제 31회 제2차 시험 최소 합격인원은 90명임
                    </li>
                </ul>
            </div>

            <div id="tab03" class="tabCts">
                <h4 class="NGR">시험의 일부면제</h4>
                <h5 class="NGR">가. 1차 시험의 면제</h5>
                <ul class="st01 mt10">
                    <li>전년도 관세사 제1차 시험에 합격한 사람</li>
                    <li>일반직 공무원으로 관세행정분야에서 10년 이상 종사한 사람 중 대통령령으로 정하는 분야에서 5젼 이상 종사한 사람</li>
                </ul>
                <h5 class="NGR mt20">나. 제1차시험 및 제2차 시험의 일부 과목면제</h5>
                <ul class="st01 mt10">
                    <li>일반직 공무원으로 관세행정분야에서 10년 이상 종사한 사람 중 5급 이상 공무원 또는 고위공무원단에 속하는 일반직 공무원으로 대통령령으로  정한느 분야에서 5년 이상 종사한 사람</li>
                    <li>일반직 공무원으로 관세행정분야에서 20년 이상 종사한 사람 중 대통령령으로 정하는 분야에서 5년 이상 종사한 사람<br>
                    ※ 관세행정 경력산정 기준일 : 당회 원서접수 마감일 [관세사법시행령 제5조의 2 제2항]
                    </li>
                    <li>면제되는 제2차 시험 과목 [관세사법 시행령 제5조의 2 제3항]<br>
                    * 관세법(관세평가 제외, '수출용원재료에 대한 관세 등 환급에 관한 특례법' 포함)<br>
                    * 관세율표 및 상품학
                    </li>
                </ul>
                <h5 class="NGR">다. 시험과목 중 일부가 면제되는 관세행정분야</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="15%">
                            <col width="15%">
                            <col>
                            <col width="8%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>교시</th>
                                <th>시험과목</th>
                                <th>문항수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th rowspan="4">제1차 시험<br />객관식(5지선택)<br />
                                - 4/11</th>
                                <th rowspan="2">1교시<br />
                                09:00 ~, 80분</th>
                                <td>관세법개론<br />
                                (자유무역협정 이행을 위한 관세 특례법 및 대한민국정부와 칠레공화국정부 간의 자유무역협정의 이행을 위한 관세법의 특례에 관한 법률을 포함)</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>무역영어</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <th rowspan="2">2교시<br />
                                80분</th>
                                <td>내국소비세법(부가가치세법, 개별소비세법, 주세법에 한함)</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>회계학(회계원리와 회계이론에 한함)</td>
                                <td>40</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="NGR mt10">라. 시험과목의 일부면제 대상자 유의사항</h5>
                <ul class="st01 mt10">
                    <li>제출서류<br>
                    - 관세행정 경력증명서(관세청 소정양식)<br>
                    - 공무원인사기록카드(사본 또는 인트라넷 출력본)<br>
                    - 관세사자격시험 서류심사신청서(동단 소정양식)<br>
                    ※ 소속 기관장의 직인이 아닌 실제 날인된 경력증명서 또는 전자관인으로 발급된 경력증명서 가능
                    </li>
                    <li>제출서류<br>
                    - 서류심사신청서는 한국산업인력공단 국가자격관리 관세사 홈페이지(www.q-net.or.kr/site/customs)에서 다운로드
                    </li>
                    <li>제출방법<br>
                    - 방문 또는 등기우편 접수<br>
                    - 시험일부면제 대상자는 경력서류를 먼저 제출하고 관세사 홈페이지(www.q-net.or.kr/site/customs)에서 응시원서 접수<br>
                    - 관세사시험의 시험일부면제를 위한 유효한 서류를 한국산업인력공단에 기 제출한 경우 별도 서류제출없이 응시원서 접수 가능<br>
                    (단, 동일한 면제조건에 해당되는 경우에 한함)<br>
                    - 관세행정 경력 서류 제출자의 시험일부면제 대상여부는 경력심사(한국산업인력광단) 및 확인, 검증(관세청)절차를 거쳐 결정되며, 
                    일부면제 요건 미충족시 시험의 일부면제를 받을 수 없으면, 접수가 취소(수수료 환불 불가 및 제1차 시험 원서접수 불가)
                    </li>
                </ul>
            </div>

            <div id="tab04" class="tabCts">
                <h4 class="NGR">1차, 2차 시험공통 유의사항 </h4>                
                <ul class="st01 mt10">
                    <li>시험 당일 시험장 내에는 주차공간이 협소하므로 대중교통을 이용하여 주시고, 교통 혼잡이 예상되므로 미리 입실할 수 있도록 하시길 바랍니다.</li>
                    <li>시험실에는 벽시계가 구비되지 않을 수 있으므로, 각자 손목시계 등을 준비하시기 바랍니다.<br>
                    ※ 단, 손목시계는 시간만 확인할 수 있는 단순한 것을 사용하여야 하며, 손목시계용 휴대폰 등 부정행위에 할용될 수 있는 일체의 시계 착용을 금함<br>
                    ※ 시험시간은 타종에 의하여 관리되며, 교실에 비치되어 있는 시계 및 감독위원의 시간안내는 단순참고사항이며 시간관리의 책임은 수험자에게 있음
                    </li>
                    <li>시험시간중에는 화장실 출입이 불가하고 종료시까지 퇴실하 수 없으므로 과다한 수분섭취를 자제하는 등 건강관리에 유의하시기 바랍니다.<br>
                    ※ 단, 배탈/설사 등 긴급상황 발생으로 중도퇴실하는 경우 시험실 재입실이 불가하며, 해당교시 종료시까지 시험본부에 대기하여야 함
                    </li>
                    <li>시험 종료 후 감독위원의 답안카드(답안지) 제출지시에 불응한 채 계속 답안카드(답안지)를 작성하는 경우 당해시험은 무효처리하고, 부정 행위자로 처리될 수 있습니다.</li>
                    <li>응시자는 감독위원의 지시에 따라야 하며, 부정한 행위를 한 응시자 및 허위기재한 접수자 (응시원서 접수 시 타인의 사진 등재자 포함)에 대하여는 당해 시험을 무료홀 하고, 그 처분일로부터 5년간 응시자격이 정지될 수 있습니다.</li>
                    <li>최종합격자 발표 후라도 최종합격자 발표일 기준으로 관세사법 제5조 각 호의 결격사유가 발견될 때에는 당해시험을 무효처리 합니다.</li>
                    <li>시험이 시작되면 휴대폰 등 통신장비는 일절 휴대할 수 없으며, 만약 신험 중 휴대폰 등 통신장비를 휴대하고 있다가 적발될 경우 실제 사용 여부와 관계없이 부정해위자로 처리될 수 있음을 유의하시기 바랍니다.<br>
                    ※ 휴대폰은 배터리와 본체를 분리하여야 하며, 분리되지 않는 기종은 전원 OFF하여 가방에 보관(스마트폰의에어플레인 모드 허용안함)
                    </li>
                    <li>제1차 시험과 제2차 시험 모두 계산기는 단순계산가능의 소형 전자계산기 이오에는 사용할 수 없습니다.<br>
                    ※ 공학용/재무용 계싼기 및 저장기능이 있는 계산기 사용금지
                    </li>
                    <li>답안카드 및 제2차 시험 답안지 견본을 '관세사 홈페이지(www.q-net,or.kr/site/customs)' 자료실에 등재하오니 시험 준비에 참고하시기 바랍니다.<br>
                    ※ 관세사 제2차 시험 주관식 논술형 답안지(A4크기, 가로 넘김, 연습지 3쪽, 답안작성 15페이지)는 관세사 홈페이지(www.q-net,or.kr/site/customs)에 등재되어 있음   
                    </li>
                    <li>수험원서 또는 제출서류 등의 허위작성, 위조, 기재오기, 누락 및 연락불능의 경우에 발생하는 불이익은 전적으로 수험자 책임입니다.<br>
                    ※ q-net의 회원정보에 반드시 연락가능한 전화번호로 수정
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