@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">학원<span class="row-line">|</span></li>
                <li class="subTit">윌비스 임용</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">내강의실</a>
                </li>
                <li class="dropdown">
                    <a href="#none">강의안내/신청</a>
                    <div class="drop-Box list-drop-Box list-drop-Box-ic">
                        <ul>
                            <li class="Tit">교육학</li>
                            <li>
                                <a href="#none">김차웅</a>
                                <a href="#none">이인재</a>
                                <a href="#none">홍의일</a>
                            </li>
                            <li class="Tit">유아</li>
                            <li>
                                <a href="#none">민정선</a>
                            </li>
                            <li class="Tit">초등</li>
                            <li>
                                <a href="#none">배재민</a>
                            </li>
                        </ul>
                        <ul>
                            <li class="Tit">중등</li>
                            <li>
                                <span>전공국어</span>
                                <a href="#none">송원영</a>
                                <a href="#none">이원근</a>
                                <a href="#none">권보민</a>
                            </li>
                            <li>
                                <span>전공영어</span>
                                <a href="#none">김유석</a>
                                <a href="#none">김영문</a>
                                <a href="#none">공훈</a>
                            </li>
                            <li>
                                <span>전공수학</span>
                                <a href="#none">김철홍</a>
                            </li>
                            <li>
                                <span>수학교육론</span>
                                <a href="#none">박태영</a>
                            </li>
                            <li>
                                <span>전공생물</span>
                                <a href="#none">강치욱</a>
                            </li>
                            <li>
                                <span>생물교육론</span>
                                <a href="#none">양혜정</a>
                            </li>
                            <li>
                                <span>도덕윤리</span>
                                <a href="#none">김병찬</a>
                            </li>
                            <li>
                                <span>전공역사</span>
                                <a href="#none">최용림</a>
                            </li>
                            <li>
                                <span>전공음악</span>
                                <a href="#none">다이애나</a>
                            </li>
                            <li>
                                <span>전기전자통신</span>
                                <a href="#none">최우영</a>
                            </li>
                            <li>
                                <span>정보컴퓨터</span>
                                <a href="#none">송광진</a>
                            </li>
                            <li>
                                <span>정보교육론</span>
                                <a href="#none">장순선</a>
                            </li>
                            <li>
                                <span>전공중국어</span>
                                <a href="#none">정경미</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">교재안내/신청</a>
                </li>
                <li>
                    <a href="#none">무료강의</a>
                </li>
                <li>
                    <a href="#none">임용정보</a>
                </li>
                <li>
                    <a href="#none">고객센터</a>
                </li>
            </ul>
        </h3>
    </div>

    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="depth">
            <span class="depth-Arrow">></span><strong>임용정보</strong>
        </span>
        <span class="depth">
            <span class="depth-Arrow">></span><strong>임용가이드</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide-Ssam">
            <div class="tabBox NG">
                <ul class="tabShow">
                    <li><a href="#ssam_guide1" class="on">임용시험이란?</a></li>
                    <li><a href="#ssam_guide2">한국사 능력 검정시험 안내</a></li>
                    <li><a href="#ssam_guide3">유아·초등임용시험개요</a></li>
                    <li><a href="#ssam_guide4">중등임용시험개요</a></li>
                </ul>  
                <div class="guideBtn">
                    <a href="#none">유아임용 가이드북</a>
                    <a href="#none">중등임용 가이드북</a>
                </div>              
            </div>
            <div class="tabContent GM">
                <div id="ssam_guide1">
                    <h4 class="NG">임용시험안내</h4>
                    <div>
                        - 유/초/특수 및 중등학교 교원이 되기 위해서는 해당 학교급 임용시험에 합격해야 합니다.
                        <div class="mt20">
                            <strong>1. 조건</strong><br>
                            1) 임용시험에 응시하기 위해서는 <span class="underline">①교원 자격(증)-취득 예정자도 가능, ②3급 이상 한국사능력검정시험 자격(증)</span>이 필요합니다.<br>
                            <br>
                            <span class="underline">① 교원 자격증(2급 정교사 자격증) 취득 방법</span><br>
                            - 2급 정교사 자격증을 취득하기 위해서는 크게 세 가지 방법을 선택할 수 있습니다. <br>
                            ㉠ 교육대학 또는 사범대학(○○교육과) 교육과정 이수 <br>
                            ㉡ 일반대학 교직이수 <br>
                            ㉢ 교육대학원 교원양성과정 진학 후 정해진 학점(전공+교직) 이수 <br>
                            <br>
                            ② 한국사능력검정 자격증 취득 방법<br>
                            - 한국사능력검정시험은 국사편찬위원회 주관으로 1년에 5~6회(2020년 5회, 2021년부터 6회) 진행됩니다. 
                            시험은 기존에는 고급, 중급, 초급, 3종류의 형태로 출제되었으나, 2020년 5월시험(47회)부터는 시험제도가 개편되어 
                            심화(1,2,3급), 기본(4,5,6)으로 출제될 예정입니다. 교원임용시험을 위해서는 시험제도의 개편여부와 상관없이 3급이상 자격증을 준비해야 합니다. <br>
                        </div>

                        <div class="guidebox mt20">
                            <div class="f_left w50">
                                <p class="strong mb10">[현행 시험제도]</p>
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>시험종류</th>
                                            <th>인증등급</th>
                                            <th>합격점수 </th>
                                            <th>문항수(객관식)</th>
                                        </tr>
                                        <tr>
                                            <th rowspan="2">고급 </th>
                                            <td>1급 </td>
                                            <td>만점의 70%이상  </td>
                                            <td rowspan="4">50문항(5지 택1) 　　</td>
                                        </tr>
                                        <tr>
                                            <td>2급 </td>
                                            <td>만점의 60%이상  </td>
                                        </tr>
                                        <tr>
                                        <th rowspan="2">중급 </th>
                                            <td>3급 </td>
                                            <td>만점의 70%이상  </td>
                                        </tr>
                                        <tr>
                                            <td>4급 </td>
                                            <td>만점의 60%이상  </td>
                                        </tr>
                                        <tr>
                                        <th rowspan="2">초급 </th>
                                            <td>5급 </td>
                                            <td>만점의 70%이상  </td>
                                            <td rowspan="2">40문항(4지 택1) </td>
                                        </tr>
                                        <tr>
                                            <td>6급 </td>
                                            <td>만점의 60%이상  </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="f_right">
                                <p class="strong mb10">[(2020년 5월부터) 개편된 시험제도]</p>
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>시험종류</th>
                                            <th>인증등급</th>
                                            <th>합격점수 </th>
                                            <th>문항수(객관식)</th>
                                        </tr>
                                        <tr>
                                            <th rowspan="3">심화 </th>
                                            <td>1급 </td>
                                            <td>만점의 80%이상  </td>
                                            <td rowspan="3">50문항(5지 택1) 　</td>
                                        </tr>
                                        <tr>
                                            <td>2급 </td>
                                            <td>만점의 70%이상  </td>
                                        </tr>
                                        <tr>
                                            <td>3급 </td>
                                            <td>만점의 60%이상  </td>
                                        </tr>
                                        <tr>
                                            <th rowspan="3">기본 </th>
                                            <td>4급 </td>
                                            <td>만점의 80%이상  </td>
                                            <td rowspan="3">50문항(4지 택1) 　</td>
                                        </tr>
                                        <tr>
                                            <td>5급 </td>
                                            <td>만점의 70%이상  </td>
                                        </tr>
                                        <tr>
                                            <td>6급 </td>
                                            <td>만점의 60%이상  </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mt20">                            
                            <strong>2. 시험 구성</strong><br>
                            1) 임용시험은 총 1, 2차로 구성되며, 일부 시도교육청은 2차 시험을 자체적으로 출제하므로 반드시 해당 시도교육청 공고문을 확인해야 합니다.<br>
                            2) 2020학년도 중등학교 교사 임용시험 제1차 시험 변동 사항은 홈페이지 내 공지사항에 안내되어 있으며, 이와 관련한 자세한 내용은 ‘한국교육과정평가원’ 홈페이지를 참조하시기 바랍니다.
                        </div>
                        <ul class="guideBtn02 NG">
                            <li><a href="#none">홈페이지 공지사항<br>확인하기 ></a><li>
                            <li><a href="#none">한국교육과정평가원<br>사이트로 이동하기 ></a><li>
                            <li><a href="#none">'2020학년도 중등임용시험문항유형 및 <br>문항수 조종안내문' 파일 확인하기 ></a><li>
                        </ul>
                    </div>
                </div>   
                <div id="ssam_guide2" class="tabContent"> 
                    <h4 class="NG">한국사 능력 검정 시험이란?</h4>
                    <div>
                        학교 교육에서 한국사의 위상은 날로 추락하고 있는데, 주변 국가들은 역사교과서를 왜곡하고 심지어 역사 전쟁을 도발하고 있습니다.<br>
                        한국사의 위상을 바르게 확립하는 것이 무엇보다 시급한 실정입니다.<br>
                        이러한 현실에서 우리역사에 관한 패러다임의 혁신과 한국사교육의 위상을 강화하기 위하여 국사편찬위원회에서는 한국사능력검정시험을 마련하였습니다.<br>
                        국사편찬위원회는 우리 역사에 대한 관심을 제고하고, 한국사 전반에 걸쳐 역사적 사고력을 평가하는 다양한 유형의 문항을 개발하고 있습니다.<br>
                        이를 통해 한국사 교육의 올바른 방향을 제시하고, 자발적 역사학습을 통해 고차원적 사고력과 문제해결 능력을 배양하고자 합니다.<br>
                    </div>
                    <div class="mt20 strong tx14 NG">2020 시험일정</div>
                    <table>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>접수기간</th>
                                <th>시험일시</th>
                                <th>합격자발표</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>제46회 </td>
                                <td>2020년 01월 07일(화) 09:00 ~ 2020년 01월 16일(목) 18:00 </td>
                                <td>2020년 02월 08일(토) </td>
                                <td>2020년 02월 21일 (금) </td>
                            </tr>
                            <tr>
                                <td>제47회 </td>
                                <td>2020년 04월 21일(화) 09:00 ~ 2020년 04월 30일(목) 18:00 </td>
                                <td>2020년 05월 23일(토) </td>
                                <td>2020년 06월 05일 (금) </td>
                            </tr>
                            <tr>
                                <td>제48회 </td>
                                <td>2020년 07월 07일(화) 09:00 ~ 2020년 07월 16일(목) 18:00 </td>
                                <td>2020년 08월 08일(토) </td>
                                <td>2020년 08월 21일 (금) </td>
                            </tr>
                            <tr>
                                <td>제49회 </td>
                                <td>2020년 08월 18일(화) 09:00 ~ 2020년 08월 27일(목) 18:00 </td>
                                <td>2020년 09월 19일(토) </td>
                                <td>2020년 10월 02일 (금) </td>
                            </tr>
                            <tr>
                                <td>제50회 </td>
                                <td>2020년 10월 06일(화) 09:00 ~ 2020년 10월 12일(월) 18:00 </td>
                                <td>2020년 10월 24일(토) </td>
                                <td>2020년 11월 06일 (금) </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt20 strong tx14 NG">평가내용</div>
                    <table cellspacing="0" cellpadding="0">
                        <col width="10%"/>
                        <col width="10%"/>
                        <col />
                        <thead>
                            <tr>
                                <th>시험구분</th>
                                <th>평가등급</th>
                                <th>평가내용</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>심화</td>
                                <td>1, 2, 3급</td>
                                <td class="tx-left">ㆍ한국사 심화과정으로 차원 높은 역사지식, 통합적 이해력 및 분석능력을 바탕으로 시대의 구조를 파악하고, 현재의 문제를 창의적으로 해결할 수 있는 능력을 평가함.<br />
                                ㆍ개편되는 시험에서는 기존의 &quot;고급&quot;유형보다 평이한 수준으로 난이도가 조정될 예정임. </td>
                            </tr>
                            <tr>
                                <td>중급</td>
                                <td>4, 5, 6 급</td>
                                <td class="tx-left">ㆍ한국사 기본입문과정으로 한국사에 대한 흥미와 관심을 가지고 있으면서 한국사의 흐름을 대략적으로 이해할 수 있는 능력을 평가<br />
                                ㆍ개편되는 시험에서는 기존의 &quot;고급&quot;유형보다 평이한 수준으로 난이도가 조정될 예정임. </td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
                <div id="ssam_guide3" class="tabContent">
                    <h4 class="NG">시험명</h4>
                    <div class="mb20">- 공립 유치원·초등학교·특수학교(유치원·초등)교사 임용후보자 선정경쟁시험</div>
                    <h4 class="NG">시험관리기관</h4>
                    <div class="mb20">
                        - 시·도교육청: 시행 공고, 원서 교부·접수, 문·답지 운송, 시험 실시,합격자 발표<br>
                        - 한국교육과정평가원: 1차 시험 출제 및 채점, 2차 시험 출제<br>
                        ※ 일부 시·도교육청은 2차 시험을 자체적으로 출제하므로 반드시 공고문확인 요망
                    </div>
                    <h4 class="NG">출제방향</h4>
                    <div class="mb20">
                        - 공정하고 객관적이며 신뢰성 있는 출제 및 채점 과정을 통해 초등학교(유치원, 특수학교) 교사로서 전문적인 능력을 갖추었는지를 
                        평가할 수 있는 문항을 출제함.
                    </div>
                    <h4 class="NG">근거법령</h4>
                    <div class="mb20">
                        - 교육공무원법(개정 2016.1.27.) 및 교육공무원임용령(개정 2016.1.6.)<br>
                        - 교육공무원임용후보자선정경쟁시험규칙(개정 2014.8.8.)
                    </div>
                    <h4 class="NG">시험일정</h4>
                    <div class="mb20">- 각 시, 도교육청 홈페이지의 공고문 참조</div>
                    <div class="mt20 strong tx14 NG">시험 과목, 시험 시간, 문항 유형 : 1차 시험 </div>
                    <table>
                        <thead>
                            <tr>
                                <th>선택분야</th>
                                <th>시험과목</th>
                                <th>배점</th>
                                <th>문항수</th>
                                <th>시간 (분)</th>
                                <th>비고</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th rowspan="3">유치원 교사</th>
                                <td>교직논술</td>
                                <td>20</td>
                                <td>1문항</td>
                                <td>60</td>
                                <td>논술<br />
                                (원고지형태 1,200자 이내)</td>
                            </tr>
                            <tr>
                                <td>교육과정</td>
                                <td>80</td>
                                <td>16문항 내외</td>
                                <td>140</td>
                                <td>기입형, 서술형</td>
                            </tr>
                            <tr>
                                <td>한국사</td>
                                <td colspan="4">한국사능력 검정시험으로 대체</td>
                            </tr>
                            <tr>
                                <th rowspan="3">초등학교 교사</th>
                                <td>교직논술</td>
                                <td>20</td>
                                <td>1문항</td>
                                <td>60</td>
                                <td>논술<br />
                                (원고지형태 1,200자 이내)</td>
                            </tr>
                            <tr>
                                <td>교육과정</td>
                                <td>80</td>
                                <td>22문항 내외</td>
                                <td>140</td>
                                <td>기입형, 서술형</td>
                            </tr>
                            <tr>
                                <td>한국사</td>
                                <td colspan="4">한국사능력 검정시험으로 대체</td>
                            </tr>
                            <tr>
                                <th rowspan="3">특수학교(유치원) 교사</th>
                                <td>교직논술</td>
                                <td>20</td>
                                <td>1문항</td>
                                <td>60</td>
                                <td>논술<br />
                                (원고지형태 1,200자 이내)</td>
                            </tr>
                            <tr>
                                <td>교육과정</td>
                                <td>80</td>
                                <td>16문항 내외</td>
                                <td>140</td>
                                <td>기입형, 서술형</td>
                            </tr>
                            <tr>
                                <td>한국사</td>
                                <td colspan="4">한국사능력 검정시험으로 대체</td>
                            </tr>
                            <tr>
                                <th rowspan="3">특수학교(초등) 교사</th>
                                <td>교직논술</td>
                                <td>20</td>
                                <td>1문항</td>
                                <td>60</td>
                                <td>논술<br />
                                (원고지형태 1,200자 이내)</td>
                            </tr>
                            <tr>
                                <td>교육과정</td>
                                <td>80</td>
                                <td>16문항 내외</td>
                                <td>140</td>
                                <td>기입형, 서술형</td>
                            </tr>
                            <tr>
                                <td>한국사</td>
                                <td colspan="4">한국사능력 검정시험으로 대체</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt10">                        
                        ※ 「교육과정」140분은 교육과정A(70분), 교육과정B(70분)로 시간을 나누어 실시함<br>
                        ※ 장애인 응시자의 시험시간은 각 시도교육청 홈페이지 공고문 참고 요망
                    </div>

                    <div class="mt20 strong tx14 NG">시험 과목, 시험 시간, 문항 유형 : 2차 시험 </div>
                    <table>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>시험과목</th>
                                <th>배점</th>
                                <th>문항수</th>
                                <th>시간 (분)</th>
                                <th>비고</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th rowspan="4">2차</th>
                                <td>교직적성<br />
                                심층면접</td>
                                <td rowspan="4" colspan="3" class="tx-left">※ 2차 시험에 대한 과목별 배점,문항 수, 시간, 출제 범위 등<br />
                                세부 사항은 각 시·도교육청 시험 시행 공고문을 반드시 참조</td>
                                <td rowspan="4"  class="tx-left">선발 예정 분야별 1차 시험 합격자<br />
                                초등학교 교사 1차 시험 합격자만 해당함</td>
                            </tr>
                            <tr>
                                <td>교수·학습과정안 작성</td>
                            </tr>
                            <tr>
                                <td>수업실연</td>
                            </tr>
                            <tr>
                                <td>영어수업 및<br />
                                영어수업 실연</td>
                        </tr>
                        </tbody>
                    </table>                    

                    <div class="mt20 strong tx14 NG">출제 : 1차 시험 </div>
                    <table>
                        <thead>
                            <tr>
                                <th>교시</th>
                                <th>시험과목</th>
                                <th>출제 범위 및 내용</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>교직논술</td>
                                <td class="tx-left">모집 분야별 교직·교양 전 영역</td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>교육과정 A</td>
                                <td rowspan="2" class="tx-left">- 유치원: 유치원 교육과정 전 영역<br />
                                    - 초등학교: 초등학교 교육과정 전 영역<br />
                                    - 특수학교(유치원): 특수교육학 전 영역, 특수교육 <br />
                                    교육과정(유치원) 전 영역유치원 교육과정 전 영역- 특수학교(초등): 특수교육학 전 영역, 특수교육 교육과정(초등) 전 영역, 초등학교 교육과정 전 영역</td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>교육과정 B</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt10">                        
                        ※ 출제 범위 적용 교육과정은 시·도교육청 공고문을 반드시 참고하기 바람
                    </div>

                    <div class="mt20 strong tx14 NG">출제 : 2차 시험 </div>
                    <table>
                        <tr>
                            <th>시험과목</th>
                            <th>출제 범위 및 내용</th>
                        </tr>
                        <tr>
                            <th>교직적성 심층면접</th>
                            <td class="tx-left">교사로서의 적성, 교직관, 인격 및 소양</td>
                        </tr>
                        <tr>
                            <th>교수·학슴과정안 작성</th>
                            <td class="tx-left">교과과정의 일정 단원 또는 주제에 대한 교수·학습과정안 작성</td>
                        </tr>
                        <tr>
                            <th>수업실연</th>
                            <td class="tx-left">교사로서의 학습지도 능력과 의사소통 능력</td>
                        </tr>
                        <tr>
                            <th>영어수업실연</th>
                            <td class="tx-left">영어로 진행하는 수업 능력</td>
                        </tr>
                        <tr>
                            <th>영어면접</th>
                            <td class="tx-left">영어 의사소통 능력</td>
                        </tr>
                    </table>
                    <div class="mt10">                        
                        ※ 구체적인 사항은 각 시도교육청의 공고문 참고
                    </div>
                </div>
                <div id="ssam_guide4" class="tabContent">
                    <h4 class="NG">시험명</h4>
                    <div class="mb20">- 공립(국,사립) 중등학교 교사 임용후보자 선정경쟁시험</div>
                    <h4 class="NG">시험관리기관</h4>
                    <div class="mb20">
                        - 시·도교육청: 시행 공고, 원서 교부·접수, 문·답지 운송, 시험 실시, 합격자 발표<br>
                        - 한국교육과정평가원: 1차 시험 출제 및 채점, 2차 시험 출제<br>
                        ※ 일부 시·도교육청은 2차 시험을 자체적으로 출제하므로 반드시 공고문 확인 요망
                    </div>
                    <h4 class="NG">출제방향</h4>
                    <div class="mb20">
                        - 합리적인 방법과 절차를 통하여 수준 높은 양질의 문항을 출제<br>
                        - 교사로서의 전문적인 능력을 측정하는 평가<br>
                        - 공정하고 객관적이며 신뢰성이 있는 중등교사 임용 전형자료를 제공
                    </div>
                    <h4 class="NG">근거법령</h4>
                    <div class="mb20">
                        - 교육공무원법(개정 2016.1.27.) 및 교육공무원임용령(개정 2016.1.6.)<br>
                        - 교육공무원임용후보자선정경쟁시험규칙(개정 2014.8.8.)
                    </div>
                    <h4 class="NG">시험일정</h4>
                    <div class="mb20">- 각 시, 도교육청 홈페이지의 공고문 참조</div>

                    <div class="mt20 strong tx14 NG">시험 과목, 시험 시간, 문항 유형 : 1차 시험 </div>
                    <table>
                        <thead>
                            <tr>
                                <th>교시</th>
                                <th>1교시:교육학</th>
                                <th colspan="2">2교시 : 전공 A</th>
                                <th colspan="3">3교시 : 전공 B</th>
                            </tr>
                        </thead>
                        <tbody>                            
                            <tr>
                                <th>출제분야</th>
                                <td>교육학</td>
                                <td colspan="5">교과교육학(25~35%) 교과내용학(65~75%)</td>
                            </tr>
                            <tr>
                                <th>시험시간</th>
                                <td>60분<br />
                                (09:00 ~ 10:00)</td>
                                <td colspan="2">90분<br />
                                (10:40 ~ 12:10)</td>
                                <td colspan="3">90분<br />
                                (12:50 ~ 14:20)</td>
                            </tr>
                            <tr>
                                <th>문항유형</th>
                                <td>논술형</td>
                                <td>기입형</td>
                                <td>서술형</td>
                                <td colspan="2">서술형</td>
                                <td>논술형</td>
                            </tr>
                            <tr>
                                <th>문항수</th>
                                <td>1문항</td>
                                <td>8문항</td>
                                <td>6문항</td>
                                <td>5문항</td>
                                <td>2문항</td>
                                <td>1문항</td>
                            </tr>
                            <tr>
                                <th>문항당 배점</th>
                                <td>20점</td>
                                <td>2점</td>
                                <td>4점</td>
                                <td>4점</td>
                                <td>5점</td>
                                <td>10점</td>
                            </tr>
                            <tr>
                                <th>교시별 배점</th>
                                <td>20점</td>
                                <td colspan="2">40점</td>
                                <td colspan="3">40점</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt20 strong tx14 NG">시험 과목, 시험 시간, 문항 유형 : 2차 시험 </div>
                    <table>
                        <thead>
                            <tr>
                                <th>시험 과목</th>
                                <th>시험 시간</th>
                            </tr>
                        </thead>
                        <tbody>                            
                            <tr>
                                <td>교직적성 심층면접,<br />
                                교수·학습 지도안 작성,<br />
                                수업능력 평가(수업실연, 실기·실험)</td>
                                <td>시·도교육청 결정</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt10">                        
                        ※ 2차 시험은 시도별, 과목별로 다를 수 있음(시·도교육청 안내 참고)
                    </div>                    

                    <div class="mt20 strong tx14 NG">출제 : 1차 시험 </div>
                    <table>
                        <col width="10%" />
                        <col width="10%" />
                        <col />
                        <thead>
                            <tr>
                                <th>교시</th>
                                <th>시험과목</th>
                                <th>출제 범위 및 내용</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1교시</th>
                                <td>교육학</td>
                                <td class="tx-left"> 교육부 고시 제2015-73호(2015.10.1.)의 [별표 2] &lsquo;교직과목의 세부 이수기준&rsquo;에 제시된 교직이론 과목 중에서 <br />
                                    - 교육학개론, 교육철학 및 교육사, 교육과정, 교육평가, 교육방법 및 교육공학, 교육심리, 교육사회, 교육행정 및 교육경영, 생활지도 및 상담 <br />
                                    ※ 특수(중등) 과목, 비교수 교과도 동일하게 적용 </td>
                            </tr>
                            <tr>
                                <th>2교시</th>
                                <td>전공 A</td>
                                <td rowspan="2" class="tx-left">교육부 고시 제2015-73호(2015.10.1.)의 부칙 제3조(경과조치) 10항에 근거 [교육과학기술부 고시 제2012-27호](2012.11.21.)의 [별표 3]&lsquo;교사자격종별 및 표시과목별 기본이수과목(또는 분야)&rsquo;에 제시된 과목 <br />
                                    - 교과교육학(출제비율 : 25~35%)<br />
                                    표시과목의 교과교육학(론)과 임용시험 시행 공고일 현재 국가(교육부 등)에 의해 고시되어 있는 총론 및 교과 교육과정까지<br />
                                    - 교과내용학(출제비율 : 75~65%)<br />
                                    교과교육학(론)을 제외한 과목※ 외국어 과목은 해당 외국어로 출제<br />
                                    ※ 특수(중등)도 동일하게 적용<br />
                                    ※ 비교수 교과는 교과내용학에서 100% 출제 </td>
                            </tr>
                            <tr>
                                <th>3교시</th>
                                <td>전공 B</td>
                            </tr>
                        </tbody>
                    </table>                    
                    <div class="mt10">                      
                        ※ 중등교사 임용시험 교육과정 관련 문항의 출제 범위<br>
                        기본 원칙 : 임용시험 시행 공고일 현재 국가(교육부 등)에 의해 고시되어 있는 교육과정까지 (단, 금번 임용시험에는 아래의 교육과정까지를 출제 범위로 함) <br>
                        <br>
                        ※ 중등학교교사 표시과목의 교육과정 관련 문항의 출제범위<br>
                        - 총론 : 교육부 고시 제2015-80호(2015.12.1)까지 <br>
                        - 교과 : 교육부 고시 제2015-74호(2015.9.23)까지 <br>
                        <br>
                        ※ 특수학교교사 특수교육 교육과정 관련 문항의 출제범위 <br>
                        - 총론 : 교육부 고시 제2015-81호(2015.12.1)까지 <br>
                        - 교과 : 교육부 고시 제2015-81호(2015.12.1)까지 <br>
                        <br>
                        ※ 구체적인 사항은 각 시도교육청의 공고문 참고 
                    </div>

                    <div class="mt20 strong tx14 NG">출제 : 2차 시험 </div>
                    <table>
                        <tr>
                            <th>시험과목</th>
                            <th>출제 범위 및 내용</th>
                        </tr>
                        <tr>
                            <th>교직적성 심층면접</th>
                            <td class="tx-left">교사로서의 적성, 교직관, 인격 및 소양</td>
                        </tr>
                        <tr>
                            <th>교수·학슴과정안 작성</th>
                            <td class="tx-left">교과과정의 일정 단원 또는 주제에 대한 교수·학습과정안 작성</td>
                        </tr>
                        <tr>
                            <th>수업실연</th>
                            <td class="tx-left">교사로서의 학습지도 능력과 의사소통 능력</td>
                        </tr>
                        <tr>
                            <th>영어수업실연</th>
                            <td class="tx-left">영어로 진행하는 수업 능력</td>
                        </tr>
                        <tr>
                            <th>영어면접</th>
                            <td class="tx-left">영어 의사소통 능력</td>
                        </tr>
                    </table>
                    <div class="mt10">                        
                        ※ 구체적인 사항은 각 시도교육청의 공고문 참고
                    </div>
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