@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="willbes-Leclist c_both">
                <div class="w-gpgosi-Guide">
                    <div class="willbes-gpgosi-guide GM">
                        <ul class="tabShow tabcsDepth2 tab_gpgosi_Guide p_re NGEB">
                            <li class="w-gpgosi-guide1"><a class="qBox on" href="#gpgosi_guide1"><span>군무원 안내</span></a></li>
                            <li class="w-gpgosi-guide2"><a class="qBox" href="#gpgosi_guide2"><span>군무원 시험의 모든것</span></a></li>
                            <li class="w-gpgosi-guide3"><a class="qBox" href="#gpgosi_guide3"><span>경쟁률 및 합격선 (2019)</span></a></li>
                            <li class="w-gpgosi-guide4"><a class="qBox" href="#gpgosi_guide4"><span>직렬별 주요 업무내용</span></a></li>
                        </ul>
                        <div class="tabBox mt30">
                            <div id="gpgosi_guide1" class="tabContent">
                                <div class="examInfoGu4">
                                    <h4 class="hTy4 hTy">군무원 안내</h4>
                                    <div class="hTy">
                                        <dl class="gd_txt">
                                            <dt>
                                                <h2>군무원이란</h2>
                                            </dt>
                                            <dd>
                                                <ul>
                                                    <li> 군 부대에서 군인과 함께 근무하는 공무원으로서 신분은 국가공무원법상 특정직 공무원으로 분류된다.<br>
                                                        군무원은 군부대에서 군인과 함께 근무하는 공무원을 말한다. 국가공무원법상 경찰이나 소방공무원, 국가정보원 직원 등과 함께 특정직공무원으로 규정돼 있다.<br>
                                                        합동참모본부, 육·해·공군본부와 예하 부대, 국방부 직할부대인 기무사, 정보사, 의무사 등에서 근무한다. <br>
                                                        군무원이 활약하는 분야는 행정, 국방정책, 군사정보,  토목·건축·환경, 전기·전자·통신, 총포·탄약·전차, 병리·재활치료, 항해나 항공지원, 군 범죄 수사에 이르기까지 다양하다.<br>
                                                    </li>
                                                </ul>
                                            </dd>
                                        </dl>
                                        <dl class="gd_txt">
                                            <dt>
                                                <h2>일반직 공무원과 큰 차이 없어</h2>
                                            </dt>
                                            <dd>
                                                <ul>
                                                    <li>
                                                        국방부에는 군무원이 없다. <span class="tx-red"><strong>국방부는 정부 부처 중 하나이기 때문에 민간인이라 해도 모두 일반직 공무원</strong></span>이다.<br>
                                                        군무원은 군부대에서만 근무한다. 그러나 이런 점 이외에 군무원은 기본적으로 일반직 공무원과 대우에 있어 큰 차이가 없다. 급여체계도 공무원보수규정을 따르는 일반직공무원과 같다.
                                                    </li>
                                                    <li>
                                                        2014년 현재 공무원보수규정에 따르면 5급 군무원 초봉이 월 209만원, 7급이 154만 원 가량 된다. <br>
                                                        군무원은 공무원에 적용되는 혜택과 더불어 군인에게 주어지는 다양한 복지 혜택을 함께 제공받을 수 있다는 장점이 있다.<br>
                                                        예를 들어 군 휴양시설 및 골프장을 이용할 수 있고, 생필품 구입 시 면세품을 취급하는 영내 매점(PX)을 이용할 수 있다.<br>
                                                        군무원은 군복을 착용하지 않으며 평상복이나 정장, 기술직 군무원들의 경우 정비복을 입고 근무한다. <br>
                                                        훈련 및 비상시에는 일반 공무원들도 입는 노란색 민방위복을 착용하기도 한다.
                                                    </li>
                                                    <li>
                                                        다만 군무원은 군 관련 사무를 보는 만큼 군 형법의 적용을 받으며 일반 법원이 아니라 군사법원에서 재판을 받는다.<br>
                                                        또한 근무지가 전·후방 각지에 흩어져 있는 군부대인 만큼 특성상 거주지와 상관없이 격오지에 위치한 부대에 발령을 받는 경우가 생긴다.  때문에 일반직 공무원보다는 지방 근무 가능성이 높다.<br>
                                                        5년마다 순환 근무를 하도록 규정돼 있기도 하다.  다만 꼭 부대를 옮기는 것은 아니며 보직 변경만 할 수 있다. <br>
                                                        진급했는데 본래 근무하던 부대에 해당 직급에 맞는 마땅한 자리가 없으면 타 부대로 옮겨야 하는 경우도 생긴다.
                                                    </li>
                                                </ul>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div id="gpgosi_guide2" class="tabContent">
                                <div class="examInfoGu4">
                                    <div class="sliderGuide cSliderTM">
                                        <div class="sliderControlsTM">
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">시험안내</h4>
                                                <div class="hTy">
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>시험일정</h2>
                                                        </dt>
                                                        <dd>
                                                            <ul>
                                                                <li>
                                                                    1년에 한 번 6월 마지막 토요일이나, 7월의 첫째 토요일에 시행<br>
                                                                    (* 2018년에는 한국사능력검정시험 도입으로 8월11일 시행함)
                                                                </li>
                                                            </ul>
                                                        </dd>
                                                    </dl>
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>시험방법</h2>
                                                        </dt>
                                                    </dl>
                                                    <div class="mgB3">
                                                        <table cellspacing="0" cellpadding="0" class="basicTb basicWd gd_table mt20">
                                                            <colgroup><col span="2">
                                                            </colgroup><thead><tr>
                                                                <th>구    분</th>
                                                                <th>시 험 방 법</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td class="td_13">공개경쟁채용</td>
                                                                <td>필기시험(1차) ⇒ 면접시험(2차)</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">경력경쟁채용</td>
                                                                <td>서류전형(1차) ⇒ 필기시험(2차) ⇒ 면접시험(3차)</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>필기시험</h2>
                                                        </dt>
                                                        <dd>
                                                            <ul>
                                                                <li>
                                                                    ① 문제형식 및 문항 수: <br>&nbsp; - 객관식 선택형, 과목당 25문항 <br>
                                                                    ② 시험시간: <br>&nbsp; - 과목당 25분 <br>
                                                                    ③ 합격자 선발: <br>&nbsp; - 선발예정인원의 1.3배수(130%) 범위 내 <br>
                                                                    <span class="tx-red">
                                                                    (단, 선발예정인원이 6명 이하인 경우, 선발예정인원에 2명을 합한 인원의 범위)<br>
                                                                    (합격 기준에 해당하는 동점자는 합격처리)
                                                                </span>
                                                                </li>
                                                            </ul>
                                                        </dd>
                                                    </dl>
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>면접시험 &lt;평가요소&gt;</h2>
                                                        </dt>
                                                        <dd>
                                                            <ul>
                                                                <li>
                                                                    ① 군무원으로서의 정신자세 <br>
                                                                    ② 전문지식과 그 응용능력 <br>
                                                                    ③ 의사표현의 정확성‧논리성 <br>
                                                                    ④ 창의력‧의지력‧발전가능성 <br>
                                                                    ⑤ 예의‧품행‧성실
                                                                </li>
                                                            </ul>
                                                        </dd>
                                                    </dl>
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>자격요건</h2>
                                                        </dt>
                                                        <dd>
                                                            <ul>
                                                                <li>
                                                                    ① 응시연령: <br>
                                                                    &nbsp; - 7급 만 20세 이상 / 8급 이하(9급) 만 18세 이상 <br>
                                                                    &nbsp; <span class="tx-red">※ 상한 연령은 두고 있지 않으며 정년(60세) 전에는 자유롭게 응시 가능.</span> <br>
                                                                    &nbsp; (단, 20년 미만 근무 시 공무원연금 대상이 아님)<br>
                                                                    ② 자격조건<br>
                                                                    &nbsp; - 행정직 및 기술직은 관련 자격증 또는 면허증 소지자에 한해 응시 가능<br>
                                                                    <span class="tx-red">
                                                                &nbsp; * 행정직 - 사서 <br>
                                                                &nbsp; * 기술직 - 환경, 전산, 항해, 약무, 병리, 방사선, 치무, 재활치료, 의무기록, 영양관리
                                                                </span><br>
                                                                    &nbsp; - 한국사능력검정시험 / 어학능력검정시험은 계급별 합격 기준 점수 필요<br>
                                                                    &nbsp; <span class="tx-red">(* 자세한 사항은 시험과목 (다음페이지) 에서 확인)</span>
                                                                </li>
                                                            </ul>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">시험안내</h4>
                                                <div class="hTy">
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>영어능력검정시험</h2>
                                                        </dt>
                                                    </dl>
                                                    <div class="mgB3">
                                                        <table cellspacing="0" cellpadding="0" class="basicTb basicWd gd_table mt20">
                                                            <colgroup><col width="23%">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                            </colgroup><thead><tr>
                                                                <th>시험종류</th>
                                                                <th>5급</th>
                                                                <th>7급</th>
                                                                <th>9급</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td class="td_13">지텔프</td>
                                                                <td>Level 2 <br>
                                                                    65점 이상&nbsp;</td>
                                                                <td>Level 2 <br>
                                                                    47점 이상&nbsp;</td>
                                                                <td>Level 2 <br>
                                                                    47점 이상&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">토익</td>
                                                                <td>700점 이상</td>
                                                                <td>570점 이상</td>
                                                                <td>470점 이상</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13" rowspan="3">토플</td>
                                                                <td>PBT <br>
                                                                    530점 이상</td>
                                                                <td>PBT <br>
                                                                    480점 이상&nbsp;</td>
                                                                <td>PBT <br>
                                                                    440점 이상</td>
                                                            </tr>
                                                            <tr>
                                                                <td>CBT <br>
                                                                    197점 이상</td>
                                                                <td>CBT <br>
                                                                    157점 이상&nbsp;</td>
                                                                <td>CBT <br>
                                                                    123점 이상</td>
                                                            </tr>
                                                            <tr>
                                                                <td>IBT <br>
                                                                    71점 이상</td>
                                                                <td>IBT <br>
                                                                    54점 이상&nbsp;</td>
                                                                <td>IBT <br>
                                                                    41점 이상</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13" rowspan="2">펠트</td>
                                                                <td>PEL 2급 <br>
                                                                    125점 이상</td>
                                                                <td>PELT 3급 <br>
                                                                    120점 이상</td>
                                                                <td>PELT 3급 <br>
                                                                    100점 이상</td>
                                                            </tr>
                                                            <tr>
                                                                <td>PELTmain <br>
                                                                    303점 이상&nbsp;</td>
                                                                <td>PELTmain <br>
                                                                    224점 이상&nbsp;</td>
                                                                <td>IBT <br>
                                                                    171점 이상&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">텝스</td>
                                                                <td>625점 이상</td>
                                                                <td>500점 이상</td>
                                                                <td>400점 이상</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">플렉스</td>
                                                                <td>625점이상</td>
                                                                <td>500점 이상</td>
                                                                <td>400점 이상</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="hTy">
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>한국사능력검정시험</h2>
                                                        </dt>
                                                    </dl>
                                                    <div class="mgB3">
                                                        <table cellspacing="0" cellpadding="0" class="basicTb basicWd gd_table mt20">
                                                            <colgroup><col width="15%">
                                                                <col width="8%">
                                                                <col width="">
                                                                <col width="">
                                                            </colgroup><thead><tr>
                                                                <th>급수&nbsp;</th>
                                                                <th>기준점수</th>
                                                                <th>평가등급</th>
                                                                <th>평가내용</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td class="td_13">5급&nbsp;</td>
                                                                <td class="gd_txt_bg td_14">
                                                                    2급<br>
                                                                    이상
                                                                </td>
                                                                <td>고급    <br>
                                                                    (50문항 5지 택1형) <br>
                                                                    1급 - 70점 이상 <br>
                                                                    2급 – 60점~69점&nbsp;</td>
                                                                <td class="td_l">한국사 심화 과정으로 차원 높은 역사 지식, <br>
                                                                    통합적 이해력 및 분석력을 바탕으로    시대의 구조를 파악하고, <br>
                                                                    현재의 문제를 창의적으로 해결할 수 있는 능력 평가</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">7급&nbsp;</td>
                                                                <td class="gd_txt_bg td_14">
                                                                    3급<br>
                                                                    이상
                                                                </td>
                                                                <td>중급<br>(50문항 5지 택1형) <br>
                                                                    3급 -  70점 이상 <br>
                                                                    4급 – 60점~69점&nbsp;</td>
                                                                <td class="td_l">한국사 기초 심화과정으로 한국사에 대한 기본적인 이해를 바탕으로<br>
                                                                    한국사의 흐름을 대략적으로 이해할 수 있는 능력과,<br>
                                                                    전반적인 이해를 바탕으로 한국사의 개념과 전개 과정을 <br>
                                                                    체계적으로 파악할 수 있는 능력 평가&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">9급</td>
                                                                <td class="gd_txt_bg td_14">
                                                                    4급<br>
                                                                    이상
                                                                </td>
                                                                <td>초급<br>(40문항 4지 택1형) <br>
                                                                    5급 -  70점 이상 <br>
                                                                    6급 – 60점~69점&nbsp;</td>
                                                                <td class="td_l">한국사 입문과정으로 한국사에 대한 흥미와 관심을 가지고 있으면 <br>
                                                                    누구나 이해할 수 있는 기초적인 역사 상식을 평가</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">직렬별 시험과목</h4>
                                                <div class="hTy">
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>직렬별 시험과목</h2>
                                                        </dt>
                                                    </dl>
                                                    <div class="mgB3">
                                                        <table cellspacing="0" cellpadding="0" class="basicTb basicWd gd_table mt20">
                                                            <colgroup><col width="15%">
                                                                <col width="8%">
                                                                <col width="">
                                                            </colgroup><thead><tr>
                                                                <th>직렬</th>
                                                                <th>계급</th>
                                                                <th>시 험 과 목</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">행정</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 행정법, 행정학, 경제학, 헌법</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 행정법, 행정학, 경제학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 행정법, 행정학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">사서</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 자료조직론, 도서관경영론, 정보학개론, 참고봉사론</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 자료조직론, 도서관경영론, 정보봉사론</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 자료조직론, 정보봉사론</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">군수</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 행정법, 행정학, 경제학, 경영학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 행정법, 행정학, 경영학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 행정법, 경영학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">군사정보</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 국가정보학, 정보사회론, 정치학, 심리학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 국가정보학, 정보사회론, 심리학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 국가정보학, 정보사회론</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">기술정보</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 국가정보학, 정보사회론, 정보체계론, 암호학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 국가정보학, 정보사회론, 암호학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 국가정보학, 정보사회론</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">수사</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 형법, 형사소송법, 행정법, 교정학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 형법, 형사소송법, 행정법</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 형법, 형사소송법</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">토목</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 응용역학, 측량학, 토질역학, 재료역학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 응용역학, 측량학, 토질역학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 응용역학, 토목설계</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">건축</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 건축계획학, 건축구조학, 구조역학, 건축시공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 건축계획학, 건축구조학, 건축시공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 건축계획학, 건축구조학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">시설</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 공기조화, 냉동공학, 기계열역학, 전기제어공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 공기조화, 냉동공학, 기계열역학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 공기조화, 냉동공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">환경</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 환경계획, 환경화학, 상하수도공학,    폐기물처리</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 환경공학, 환경계획, 생태학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 환경공학, 환경화학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">전기</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 전기자기학, 전기기기, 회로이론, 전력계통공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 전기자기학, 전기기기, 회로이론</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 전기공학, 전기기기</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">전자</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 전기자기학, 전자회로, 회로이론, 디지털공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 전기자기학, 전자회로, 디지털공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 전자공학, 전자회로</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">통신</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 통신공학, 전기자기학, 전자회로, 디지털공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 통신공학, 전기자기학, 디지털공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 통신공학, 전자공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">전산</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 운영체제론, 데이터베이스론, 자료구조론, 컴퓨터네트워크</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 자료구조론, 데이터베이스론, 정보보호론</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 컴퓨터일반, 정보보호론</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">지도</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 지리정보학(GIS), 측지학, 사진측량학, 응용측량학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 지리정보학(GIS), 측지학, 응용측량학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 지리정보학(GIS), 측지학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">영상</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 사진학, 영상학, 디지털방송기술, 칼라사진론</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 사진학, 영상학, 디지털방송기술</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 사진학, 영상학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">일반기계</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 기계설계, 기계공작법, 재료역학, 동력학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 기계설계, 기계공작법, 재료역학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 기계설계, 기계공작법</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">금속</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 금속재료, 금속가공, 주조공학, 재료역학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 금속재료, 금속가공, 주조공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 금속재료, 주조공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">용접</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 용접야금, 기계설계, 기계공작법, 재료역학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 용접야금, 기계설계, 재료역학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 용접야금, 기계설계</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">물리분석</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 비파괴검사, 금속재료, 용접야금, 디지털공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 비파괴검사, 금속재료, 용접야금</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 비파괴검사, 금속재료</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">화학분석</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 분석화학, 공업화학, 화공양론, 기기분석</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 분석화학, 공업화학, 화공양론</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 일반화학, 분석화학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">유도무기</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 디지털공학, 재료역학, 레이저광학, 기하광학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 디지털공학, 재료역학, 레이저광학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 전자공학, 기계공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">총포</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 재료역학, 디지털공학, 레이저광학, 광학기기</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 재료역학, 디지털공학, 레이저광학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 전자공학, 기계공학</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">직렬별 시험과목</h4>
                                                <div class="hTy">
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>직렬별 시험과목</h2>
                                                        </dt>
                                                    </dl>
                                                    <div class="mgB3">
                                                        <table cellspacing="0" cellpadding="0" class="basicTb basicWd gd_table mt20">
                                                            <colgroup><col width="15%">
                                                                <col width="8%">
                                                                <col width="">
                                                            </colgroup><thead><tr>
                                                                <th>직렬</th>
                                                                <th>계급</th>
                                                                <th>시 험 과 목</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">탄약</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 일반화약학, 화공열역학, 공업화학, 화공양론</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 일반화약학, 화공열역학, 화공양론</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 일반화약학, 화공열역학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">전차</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 자동차정비, 자동차공학, 기계열역학, 내연기관</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 자동차정비, 자동차공학, 내연기관</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 자동차정비, 자동차공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">차량</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 자동차정비, 자동차공학, 내연기관, 기계열역학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 자동차정비, 자동차공학, 내연기관</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 자동차정비, 자동차공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">인쇄</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 인쇄공학, 인쇄재료, 인쇄기계, 특수인쇄</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 인쇄공학, 인쇄재료, 인쇄기계</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 인쇄공학, 인쇄재료</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">선체</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 조선공학, 선박구조역학, 선박설계, 유체역학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 조선공학, 선박구조역학, 선박설계</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 조선공학, 선박구조역학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">선거</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 조선공학, 선박구조역학, 선박운용학, 보조기계</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 조선공학, 선박구조역학, 선박운용학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 조선공학, 선박구조역학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">항해</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 항해학, 선박운용학, 해상안전론, 선박기관학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 항해학, 선박운용학, 해상안전론</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 항해학, 선박운용학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">함정기관</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 선박기관학, 전기공학, 선박구조역학,    보조기계</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 선박기관학, 전기공학, 선박구조역학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 선박기관학, 전기공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">잠수</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 잠수작업, 잠수물리, 잠수장비, 잠수의학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 잠수작업, 잠수물리, 잠수장비</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 잠수작업, 잠수물리</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">기체</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 항공역학, 항공기기체, 항공기정비, 항공기제어장치</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 항공역학, 항공기기체, 항공기정비</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 항공기기체, 항공기정비</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">항공기관</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 항공기동력장치, 항공역학, 항공기구조, 항공기정비</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 항공기동력장치, 항공역학, 항공기구조</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 항공기동력장치, 항공기정비</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">항공보기</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 항공제어공학, 항공기기체, 디지털공학, 항공역학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 항공제어공학, 항공기기체, 디지털공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 항공역학, 항공기기체</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">항공지원</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 자동차정비, 자동차공학, 항공기장비, 항공기정비</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 자동차정비, 자동차공학, 항공기장비</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 자동차정비, 항공기장비</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">기상</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 전자회로, 운영체제론, 기상측기 및 관측법, 디지털공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 전자회로, 운영체제론, 기상측기 및 관측법</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 전자회로, 컴퓨터일반</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">기상예보</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 일기분석 및 예보법, 기상역학, 물리기상학, 기후학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 일기분석 및 예보법, 기상역학, 물리기상학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 일기분석 및 예보법, 기상역학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">약무</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 약제학, 약물학, 약전학, 생약학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 약제학, 약물학, 약전학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 약제학, 약물학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">병리</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, <br>
                                                                    임상병리(조직병리학/임상화학/혈액학/임상미생물학/임상생리학), <br>
                                                                    공중보건학, 해부생리학, 의료관계법규</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, <br>
                                                                    임상병리(조직병리학/임상화학/혈액학/임상미생물학/임상생리학), <br>
                                                                    공중보건학, 해부생리학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, <br>
                                                                    임상병리(조직병리학/임상화학/혈액학/임상미생물학/임상생리학), <br>
                                                                    공중보건학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">방사선</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 방사선이론과 응용, 영상진단기술학, <br>
                                                                    공중보건학, 핵의학기술학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 방사선이론과 응용, 영상진단기술학, 공중보건학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 방사선이론과 응용, 영상진단기술학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">치무</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 치과보철학, 구강외과학, 예방치과학, 치과교정학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 치과보철학, 구강외과학, 예방치과학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 치과보철학, 구강외과학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">재활치료</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 물리치료학, 운동치료학, 공중보건학, 해부생리학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 물리치료학, 운동치료학, 공중보건학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 물리치료학, 공중보건학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">의무기록</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 의무기록관리, 공중보건학, 의료관계법규,의학용어</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 의무기록관리, 공중보건학, 의료관계법규</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 의무기록관리, 공중보건학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">의공</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 의공학, 디지털공학, 공중보건학, 전자회로</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 의공학, 디지털공학, 전자회로</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 의공학, 전자공학</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="td_13">영양관리</td>
                                                                <td class="gd_txt_bg">5급</td>
                                                                <td>국어, 한국사, 영어, 영양학, 단체급식관리, 식품학 및 조리원리, 공중보건학</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">7급</td>
                                                                <td>국어, 한국사, 영어, 영양학, 단체급식관리, 식품학 및    조리원리</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gd_txt_bg">9급</td>
                                                                <td>국어, 한국사, 영어, 영양학, 단체급식관리</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">시험안내</h4>
                                                <div class="hTy">
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>필수자격증</h2>
                                                        </dt>
                                                        <dd>
                                                            <ul>
                                                                <li>
                                                                    아래 직렬은 관련 자격증 또는 면허증 소지자에 한해 응시 가능<br>
                                                                    <span class="tx-red">* 행정직 - 사서<br>
                                                                * 기술직 - 환경, 전산, 항해, 약무, 병리, 방사선, 치무, 재활치료, 의무기록, 영양관리<br></span>
                                                                </li>
                                                            </ul>
                                                        </dd>
                                                    </dl>
                                                    <div class="mgB3">
                                                        <table cellspacing="0" cellpadding="0" class="basicTb basicWd gd_table mt20">
                                                            <colgroup><col width="15%">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                            </colgroup><thead><tr>
                                                                <th></th>
                                                                <th>기술사</th>
                                                                <th>기능장</th>
                                                                <th>기사</th>
                                                                <th>산업기사</th>
                                                                <th>기능사</th>
                                                            </tr>
                                                            <tr>
                                                                <th>사 서</th>
                                                                <th>1급정사서</th>
                                                                <th>　</th>
                                                                <th>2급정사서</th>
                                                                <th>준사서</th>
                                                                <th></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td class="td_13">토 목</td>
                                                                <td>토질및기초,<br>
                                                                    토목품질시험,<br>
                                                                    토목구조,항만및해안,<br>
                                                                    도로및공항,토목시공,<br>
                                                                    측량및지형공간정보,<br>
                                                                    측량및지형공간정보,<br>
                                                                    농어업토목,<br>
                                                                    도시계획,조경,<br>
                                                                    지질    및 지반,<br>
                                                                    지적,건설안전</td>
                                                                <td></td>
                                                                <td>건설재료시험, <br>
                                                                    토목,<br>
                                                                    측량및지형공간정보,<br>
                                                                    도시계획,조경,<br>
                                                                    지적,건설안전,<br>
                                                                    콘크리트</td>
                                                                <td>건설재료시험, 토목,<br>
                                                                    측량및지형공간정보,<br>
                                                                    건설안전, 조경,지적, <br>
                                                                    콘크리트</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">건    축</td>
                                                                <td>건축구조,<br>
                                                                    건축기계설비,<br>
                                                                    건축시공, 건설안전,<br>
                                                                    건축품질시험,<br>
                                                                    소방, 건축사<br></td>
                                                                <td>건축일반시공,<br>
                                                                    건축목재시공<br></td>
                                                                <td>건축설비, 건축,<br>
                                                                    실내건축, 건설안전,<br>
                                                                    소방설비(기계 분야),<br>
                                                                    소방설비(전기 분야)<br></td>
                                                                <td>건축설비, 건축,<br>
                                                                    건축일반시공,<br>
                                                                    건축목공, 실내건축,<br>
                                                                    건설안전,<br>
                                                                    소방설비(기계 분야),<br>
                                                                    소방설비(전기 분야)<br></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">시    설</td>
                                                                <td>공조냉동기계</td>
                                                                <td>보일러</td>
                                                                <td>공조냉동기계,<br>
                                                                    에너지관리<br></td>
                                                                <td>공조냉동기계, <br>
                                                                    보일러, <br>
                                                                    에너지관리</td>
                                                                <td>공조냉동기계,<br>
                                                                    보일러<br></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">환    경</td>
                                                                <td>대기관리, 수질관리,<br>
                                                                    소음진동, 폐기물처리,<br>
                                                                    자연환경관리,<br>
                                                                    토양환경<br></td>
                                                                <td></td>
                                                                <td>대기환경, 수질환경,<br>
                                                                    소음진동, <br>
                                                                    폐기물처리,<br>
                                                                    자연생태복원,<br>
                                                                    생물분류(동물),<br>
                                                                    생물분류(식물),<br>
                                                                    토양환경<br></td>
                                                                <td>대기환경, 수질환경,<br>
                                                                    소음진동, <br>
                                                                    폐기물처리,<br>
                                                                    자연생태복원</td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">전    기</td>
                                                                <td>발송배전,<br>
                                                                    건축전기설비,<br>
                                                                    전기응용, 전기안전<br></td>
                                                                <td>전기</td>
                                                                <td>전기, 전기공사,<br>
                                                                    산업안전<br></td>
                                                                <td>전기, 전기공사,<br>
                                                                    산업안전<br></td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">전 자</td>
                                                                <td>산업계측제어,<br>
                                                                    전자응용, 정보통신<br></td>
                                                                <td>전자기기</td>
                                                                <td>전자,    반도체설계,<br>
                                                                    정보통신,<br>
                                                                    전파전자통신,<br>
                                                                    무선설비, 방송통신,<br>
                                                                    전자계산기<br></td>
                                                                <td>전자, <br>
                                                                    전자계산기제어,<br>
                                                                    반도체설계, <br>
                                                                    정보통신,<br>
                                                                    통신선로, 정밀측정,<br>
                                                                    전파전자통신,<br>
                                                                    무선설비, 방송통신<br></td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">통    신</td>
                                                                <td>정보통신,<br>
                                                                    전자응용</td>
                                                                <td>통신설비,<br>
                                                                    전자기기</td>
                                                                <td>정보통신,<br>
                                                                    전파전자통신,<br>
                                                                    무선설비,<br>
                                                                    방송통신, 전자,<br>
                                                                    반도체설계</td>
                                                                <td>정보통신,    통신선로,<br>
                                                                    전파전자통신,<br>
                                                                    무선설비,<br>
                                                                    방송통신, 전자,<br>
                                                                    전자계산기제어,<br>
                                                                    반도체설계</td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">전    산</td>
                                                                <td>컴퓨터시스템응용,<br>
                                                                    정보관리</td>
                                                                <td>　</td>
                                                                <td>전자계산기,    정보처리,<br>
                                                                    전자계산기조직응용, <br>
                                                                    정보보안</td>
                                                                <td>전자계산기제어,<br>
                                                                    정보처리, 사무자동화, <br>
                                                                    정보보안<br></td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">지    도</td>
                                                                <td>지적,<br>
                                                                    측량및지형공간정보<br></td>
                                                                <td>　</td>
                                                                <td>지적,<br>
                                                                    측량및지형공간정보<br></td>
                                                                <td>지적,<br>
                                                                    측량및지형공간정보<br></td>
                                                                <td>지적, 측량,    도화,<br>
                                                                    지도제작, 항공사진<br></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">영    상</td>
                                                                <td>측량및지형공간정보</td>
                                                                <td>　</td>
                                                                <td>측량및지형공간정보</td>
                                                                <td>영사,<br>
                                                                    측량및지형공간정</td>
                                                                <td>사진,    영사,<br>
                                                                    항공사진</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">일반기계</td>
                                                                <td>기계, 금형,    항공기체</td>
                                                                <td>기계가공, <br>
                                                                    금형제작,<br>
                                                                    판금제관<br></td>
                                                                <td>일반기계,<br>
                                                                    메카트로닉스,<br>
                                                                    기계설계,<br>
                                                                    프레스금형설계,<br>
                                                                    사출금형설계,<br>
                                                                    항공, 항공정비사<br></td>
                                                                <td>컴퓨터응용가공,<br>
                                                                    기계조립, 생산자동화,<br>
                                                                    기계설계, 기계정비,<br>
                                                                    사출금형, 프레스금형,<br>
                                                                    치공구설계,<br>
                                                                    판금제관, 항공<br></td>
                                                                <td>컴퓨터응용선반, <br>
                                                                    연삭,<br>
                                                                    컴퓨터응용밀링,<br>
                                                                    기계조립, 기계정비,<br>
                                                                    생산자동화, 금형,<br>
                                                                    전산응용기계제도,<br>
                                                                    공유압, 판금제관,<br>
                                                                    항공기체정비<br></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">금    속</td>
                                                                <td>금속재료,    금속가공,<br>
                                                                    금속제련, 표면처리<br></td>
                                                                <td>금속재료, <br>
                                                                    주조, 압연,<br>
                                                                    제선, 제강,<br>
                                                                    표면처리<br></td>
                                                                <td>금속</td>
                                                                <td>금속재료,    주조,<br>
                                                                    표면처리</td>
                                                                <td>금속재료시험,<br>
                                                                    열처리,<br>
                                                                    주조, 원형, 압연,<br>
                                                                    제선, 축로, 제강,<br>
                                                                    표면처리<br></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">용    접</td>
                                                                <td>용접</td>
                                                                <td>용접</td>
                                                                <td>용접</td>
                                                                <td>용접</td>
                                                                <td>용접, 특수용접</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">물리분석</td>
                                                                <td>비파괴검사, 금속재료</td>
                                                                <td>금속재료</td>
                                                                <td>방사선비파괴검사,<br>
                                                                    초음파비파괴검사,<br>
                                                                    자기비파괴검사,<br>
                                                                    침투비파괴검사,<br>
                                                                    와전류비파괴검사,<br>
                                                                    누설비파괴검사<br></td>
                                                                <td>금속재료,<br>
                                                                    방사선비파괴검사,<br>
                                                                    초음파비파괴검사,<br>
                                                                    자기비파괴검사,<br>
                                                                    침투비파괴검사<br></td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">화학분석</td>
                                                                <td>화공,    수질관리,<br>
                                                                    토양환경, <br>
                                                                    방사선관리,<br>
                                                                    방사성동위원소<br>
                                                                    취급자특수면허,<br>
                                                                    방사선취급<br>
                                                                    감독자면허<br></td>
                                                                <td>위험물</td>
                                                                <td>화학류제조,    화공,<br>
                                                                    화학분석, 수질환경,<br>
                                                                    토양환경, 생물공학,<br>
                                                                    방사성동위원소<br>
                                                                    취급자일반면허, <br>
                                                                    원자력<br></td>
                                                                <td>화약류제조,    위험물,<br>
                                                                    수질환경, 방사선사<br></td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">유도무기</td>
                                                                <td>산업계측제어,<br>
                                                                    전기응용, 전자응용<br></td>
                                                                <td>전기, <br>
                                                                    전자기기<br></td>
                                                                <td>메카트로닉스,    전기,<br>
                                                                    전자, 반도체설계,<br>
                                                                    광학, 무선설비<br></td>
                                                                <td>생산자동화, <br>
                                                                    정밀측정,<br>
                                                                    전기, 전자, 광학기기,<br>
                                                                    전자계산기제어,<br>
                                                                    무선설비, <br>
                                                                    반도체설계<br></td>
                                                                <td>생산자동화, <br>
                                                                    정밀측정,<br>
                                                                    전자기기, 전기,<br>
                                                                    광학, 무선설비<br></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">총    포</td>
                                                                <td>기계, 산업계측제어, <br>
                                                                    전자응용, 화공,<br>
                                                                    화공안전, <br>
                                                                    화약류관리</td>
                                                                <td>기계가공, <br>
                                                                    전자기기,<br>
                                                                    위험물<br></td>
                                                                <td>일반기계, 기계설계,<br>
                                                                    메카트로닉스, 전자,<br>
                                                                    화약류제조, 화공,<br>
                                                                    화학분석, <br>
                                                                    화약류관리<br></td>
                                                                <td>기계조립, 기계설계,<br>
                                                                    기계정비, 생산자동화,<br>
                                                                    정밀측정, 전자,<br>
                                                                    화약류제조, 위험물,<br>
                                                                    화약류관리</td>
                                                                <td>기계조립,<br>
                                                                    전산응용기계제도,<br>
                                                                    기계정비, <br>
                                                                    생산자동화,<br>
                                                                    정밀측정, 전자기기<br></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">탄    약</td>
                                                                <td>화공,    화약류관리,<br>
                                                                    화공안전,<br>
                                                                    산업계측제어,<br>
                                                                    컴퓨터시스템응용,<br>
                                                                    전자응용, 전기응용<br></td>
                                                                <td>위험물, <br>
                                                                    전자기기,<br>
                                                                    전기<br></td>
                                                                <td>화약류제조,    화공,<br>
                                                                    화약류관리, 화학분석,<br>
                                                                    소방설비(기계 분야),<br>
                                                                    전자, 전자계산기,<br>
                                                                    메카트로닉스,<br>
                                                                    무선설비, 전기</td>
                                                                <td>화약류제조,    위험물,<br>
                                                                    화약류관리, 전자,<br>
                                                                    소방설비(기계 분야),<br>
                                                                    전자계산기제어,<br>
                                                                    전기, 생산자동화,<br>
                                                                    무선설비</td>
                                                                <td>화학분석,<br>
                                                                    화약취급, 위험물</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">전    차</td>
                                                                <td>차량</td>
                                                                <td>자동차정비,<br>
                                                                    건설기계정비</td>
                                                                <td>자동차정비,<br>
                                                                    궤도장비정비,<br>
                                                                    건설기계,<br>
                                                                    건설기계정비</td>
                                                                <td>자동차정비,<br>
                                                                    궤도장비정비,<br>
                                                                    건설기계,<br>
                                                                    건설기계정비<br></td>
                                                                <td>자동차정비,<br>
                                                                    자동차차체수리,<br>
                                                                    궤도장비정비,<br>
                                                                    건설기계정비,<br>
                                                                    자동차보수도장</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">차    량</td>
                                                                <td>건설기계,    차량</td>
                                                                <td>건설기계정비,<br>
                                                                    자동차정비<br></td>
                                                                <td>건설기계,<br>
                                                                    건설기계정비,<br>
                                                                    자동차정비<br></td>
                                                                <td>건설기계,<br>
                                                                    건설기계정비,<br>
                                                                    자동차정비</td>
                                                                <td>자동차정비,<br>
                                                                    자동차차체수리,<br>
                                                                    건설기계정비,<br>
                                                                    자동차보수도장</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">인    쇄</td>
                                                                <td>　</td>
                                                                <td>　</td>
                                                                <td>인쇄,    시각디자인,<br>
                                                                    컬러리스트<br></td>
                                                                <td>인쇄,    시각디자인,<br>
                                                                    컬러리스트</td>
                                                                <td>인쇄,    전자출판,<br>
                                                                    사진제판,<br>
                                                                    컴퓨터그래픽스운용</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">선    체</td>
                                                                <td>조선, 용접</td>
                                                                <td>판금제관, <br>
                                                                    용접, 배관, <br>
                                                                    건축목재시공<br></td>
                                                                <td>조선, 용접</td>
                                                                <td>조선,    판금제관,<br>
                                                                    용접, 배관,<br>
                                                                    건축목공<br></td>
                                                                <td>전산응용조선제도,<br>
                                                                    선체건조, 판금제관,<br>
                                                                    동력기계정비,<br>
                                                                    용접, 특수용접,<br>
                                                                    건축목공, 배관</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">선    거</td>
                                                                <td>조선</td>
                                                                <td>　</td>
                                                                <td>조선</td>
                                                                <td>조선</td>
                                                                <td>금속도장,<br>
                                                                    건축도장,<br>
                                                                    선체건조<br></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">항    해</td>
                                                                <td>1～2급항해사</td>
                                                                <td>　</td>
                                                                <td>3～4급항해사</td>
                                                                <td>5～6급항해사,<br>
                                                                    소형선박조종사<br>
                                                                    <br></td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">함정기관</td>
                                                                <td>조선,    차량,<br>
                                                                    1～2급기관사<br></td>
                                                                <td>자동차정비</td>
                                                                <td>조선,    자동차정비,<br>
                                                                    3～4급기관사</td>
                                                                <td>조선,    자동차정비,<br>
                                                                    3～4급기관사</td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">잠    수</td>
                                                                <td>　</td>
                                                                <td>　</td>
                                                                <td>　</td>
                                                                <td>잠수</td>
                                                                <td>잠수</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">기 체</td>
                                                                <td>항공기체, 항공기관</td>
                                                                <td>　</td>
                                                                <td>항공, 항공정비사,<br>
                                                                    항공기관사, <br>
                                                                    헬기정비사1급</td>
                                                                <td>항공, <br>
                                                                    헬기정비사2급<br></td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">항공기관</td>
                                                                <td>항공기관</td>
                                                                <td>　</td>
                                                                <td>항공, 항공정비사,<br>
                                                                    항공기관사, <br>
                                                                    헬기정비사1급</td>
                                                                <td>항공, <br>
                                                                    헬기정비사2급</td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">항공보기</td>
                                                                <td>산업계측제어,<br>
                                                                    항공기관</td>
                                                                <td>　</td>
                                                                <td>항공, 항공정비사, <br>
                                                                    헬기정비사1급</td>
                                                                <td>항공, <br>
                                                                    헬기정비사2급<br></td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">항공지원</td>
                                                                <td>표면처리,<br>
                                                                    금속재료, 차량</td>
                                                                <td>표면처리, <br>
                                                                    금속재료,<br>
                                                                    위험물, <br>
                                                                    자동차정비</td>
                                                                <td>금속, 항공정비사,<br>
                                                                    침투비파괴검사,<br>
                                                                    화학분석, <br>
                                                                    자동차정비</td>
                                                                <td>표면처리, 금속재료,<br>
                                                                    위험물, <br>
                                                                    자동차정비<br>
                                                                    침투비파괴검사<br></td>
                                                                <td>금속도장,<br>
                                                                    금속재료시험,<br>
                                                                    표면처리, 열처리,<br>
                                                                    위험물, 화학분석,<br>
                                                                    침투비파괴검사</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">기    상</td>
                                                                <td>컴퓨터시스템응용,<br>
                                                                    정보통신</td>
                                                                <td>전자기기, <br>
                                                                    통신설비</td>
                                                                <td>전자, 전자계산기,<br>
                                                                    반도체설계,<br>
                                                                    정보처리,<br>
                                                                    전자계산기조직응용,<br>
                                                                    정보통신,<br>
                                                                    전파전자통신,<br>
                                                                    무선설비, 방송통신</td>
                                                                <td>전자, <br>
                                                                    전자계산기제어,<br>
                                                                    정보처리, 정보통신,<br>
                                                                    전파전자통신,<br>
                                                                    무선설비,<br>
                                                                    반도체설계,<br>
                                                                    방송통신</td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">기상예보</td>
                                                                <td>기상예보</td>
                                                                <td>　</td>
                                                                <td>기상</td>
                                                                <td>　</td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">약 무</td>
                                                                <td>약사</td>
                                                                <td>　</td>
                                                                <td>　</td>
                                                                <td>　</td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">병 리</td>
                                                                <td>　</td>
                                                                <td>　</td>
                                                                <td>　</td>
                                                                <td>임상병리사</td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">방사선</td>
                                                                <td>방사선취급<br>
                                                                    감독자면허</td>
                                                                <td>　</td>
                                                                <td>방사성동위원소<br>
                                                                    취급자일반면</td>
                                                                <td>방사선사</td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">치    무</td>
                                                                <td>　</td>
                                                                <td>　</td>
                                                                <td>　</td>
                                                                <td>치과기공사,<br>
                                                                    치과위생사<br></td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">재활치료</td>
                                                                <td>　</td>
                                                                <td>　</td>
                                                                <td>　</td>
                                                                <td>물리치료사,<br>
                                                                    작업치료사<br></td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">의무기록</td>
                                                                <td>　</td>
                                                                <td>　</td>
                                                                <td>　</td>
                                                                <td>의무기록사</td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">의 공</td>
                                                                <td>전자응용</td>
                                                                <td>전자기기</td>
                                                                <td>전자, 의공</td>
                                                                <td>전자, <br>
                                                                    전자계산기제어,<br>
                                                                    의공, 의지․보조기사</td>
                                                                <td>　</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td_13">영양관리</td>
                                                                <td>식품</td>
                                                                <td>　</td>
                                                                <td>식품</td>
                                                                <td>영양사, 식품</td>
                                                                <td>　</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <dl class="gd_txt">
                                                        <dd>
                                                            <ul>
                                                                <li>
                                                                <span class="tx-red">
                                                                    ※ 폐지된 자격증으로서 국가기술자격법령 등에 의해 그 자격이 계속 인정되는 경우에는 응시 및 가산 자격증으로 인정한다.<br>
                                                                    ※ 응시계급별 자격등급 적용기준은 다음과 같으며, 응시 자격증은 필기시험 전일까지 취득하여야 한다.<br>
                                                                </span>
                                                                    - 5급 및 7급 : 기사 이상, 9급 : 산업기사 이상<br>
                                                                    - 단, 9급에 기능사 자격증을 적용하는 경우에 7급을 산업기사 자격증 이상으로 적용 가능<br>
                                                                </li>
                                                            </ul>
                                                        </dd>
                                                    </dl>
                                                </div>
                                                <div class="hTy">
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>가산점</h2>
                                                        </dt>
                                                    </dl>
                                                    <div class="mgB3">
                                                        <table cellspacing="0" cellpadding="0" class="basicTb basicWd gd_table mt20">
                                                            <colgroup><col width="72" span="4">
                                                            </colgroup><thead><tr>
                                                                <th colspan="2">6·7급　</th>
                                                                <th colspan="2">8·9급　</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>기술사,기능사,기사</td>
                                                                <td>산업기사</td>
                                                                <td>기술사,기능사,기사,산업기사</td>
                                                                <td>기능사</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5%</td>
                                                                <td>3%</td>
                                                                <td>5%</td>
                                                                <td>3%</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="hTy">
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>가산특전</h2>
                                                        </dt>
                                                        <dd>
                                                            <ul>
                                                                <li>
                                                                    취업지원 대상자 <br>
                                                                    필기시험 각 과목별 득점에 각 과목별 만점의 5% 또는 10%를 가산<br>
                                                                    독립유공자 예우에 관한 법률 제 16조 및 국가유공자 등 예우 및 지원에 관한 법률 제 29조에 의한 취업보호<br>
                                                                    대상자와 광주민주유공자 예우에 관한 법률 제 20조에 의한 취업지원 대상자(구비서류 : 취업보호(지원) 대상자 증명서)<br>
                                                                    <span class="tx-red">
                                                                    ※ 취업지원대상자 가점을 받아 합격하는 사람은 선발예정인원의 30%를 초과할 수 없음. (4명이상 모집직위만 해당됨)<br>
                                                                    ※ 가산점은 매 과목 4할 이상 득점자에게만 지원
                                                                </span>
                                                                </li>
                                                            </ul>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="gpgosi_guide3" class="tabContent">
                                <div class="examInfoGu4">
                                    <h4 class="hTy4 hTy">경쟁률 및 합격선 (2018)</h4>
                                    <div class="sliderGuide cSliderTM">
                                        <div class="sliderControlsTM">
                                            <div class="guide_slider">
                                                <div class="hTy">
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>국방부 - 공채 7급</h2>
                                                        </dt>
                                                    </dl>
                                                    <div class="mgB3">
                                                        <table cellspacing="0" cellpadding="0" class="basicTb basicWd gd_table mt20">
                                                            <colgroup>
                                                                <col width="20%">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                            </colgroup>
                                                            <tr>
                                                                <th>직렬 </th>
                                                                <th>채용인원 </th>
                                                                <th>응시인원 </th>
                                                                <th>경쟁률 </th>
                                                                <th>합격선(점) </th>
                                                            </tr>
                                                            <tr>
                                                                <th>행정 </th>
                                                                <td>1</td>
                                                                <td>176</td>
                                                                <td>176.0:1 </td>
                                                                <td>90</td>
                                                            </tr>
                                                            <tr>
                                                                <th>군사정보 </th>
                                                                <td>10</td>
                                                                <td>243</td>
                                                                <td>24.3:1 </td>
                                                                <td>75</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전기 </th>
                                                                <td>2</td>
                                                                <td>62</td>
                                                                <td>31.0:1 </td>
                                                                <td>62</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전자 </th>
                                                                <td>1</td>
                                                                <td>14</td>
                                                                <td>14.0:1 </td>
                                                                <td>52</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전산 </th>
                                                                <td>14</td>
                                                                <td>179</td>
                                                                <td>12.79:1 </td>
                                                                <td>74</td>
                                                            </tr>
                                                        </table> 
                                                    </div>
                                                </div>
                                                <div class="hTy">
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>국방부 - 공채 9급</h2>
                                                        </dt>
                                                    </dl>
                                                    <div class="mgB3">
                                                        <table cellspacing="0" cellpadding="0" class="basicTb basicWd gd_table mt20">
                                                            <colgroup>
                                                                <col width="20%">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                            </colgroup>
                                                            <tr>
                                                                <th>직렬 </th>
                                                                <th>채용인원 </th>
                                                                <th>응시인원 </th>
                                                                <th>경쟁률 </th>
                                                                <th>합격선(점) </th>
                                                            </tr>
                                                            <tr>
                                                                <th>행정 </th>
                                                                <td>31</td>
                                                                <td>4076</td>
                                                                <td>131.48:1 </td>
                                                                <td>86</td>
                                                            </tr>
                                                            <tr>
                                                                <th>행정(장애) </th>
                                                                <td>27</td>
                                                                <td>76</td>
                                                                <td>2.81:1 </td>
                                                                <td>60</td>
                                                            </tr>
                                                            <tr>
                                                                <th>기술정보 </th>
                                                                <td>13</td>
                                                                <td>338</td>
                                                                <td>26.0:1 </td>
                                                                <td>69.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>기술정보(장애) </th>
                                                                <td>5</td>
                                                                <td>9</td>
                                                                <td>1.8:1 </td>
                                                                <td>62</td>
                                                            </tr>
                                                            <tr>
                                                                <th>토목 </th>
                                                                <td>3</td>
                                                                <td>113</td>
                                                                <td>37.67:1 </td>
                                                                <td>69</td>
                                                            </tr>
                                                            <tr>
                                                                <th>건축 </th>
                                                                <td>5</td>
                                                                <td>173</td>
                                                                <td>34.6:1 </td>
                                                                <td>69</td>
                                                            </tr>
                                                            <tr>
                                                                <th>시설 </th>
                                                                <td>12</td>
                                                                <td>105</td>
                                                                <td>8.75:1 </td>
                                                                <td>61</td>
                                                            </tr>
                                                            <tr>
                                                                <th>환경 </th>
                                                                <td>1</td>
                                                                <td>57</td>
                                                                <td>57.0:1 </td>
                                                                <td>66.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전기 </th>
                                                                <td>8</td>
                                                                <td>222</td>
                                                                <td>27.75:1 </td>
                                                                <td>71.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전자 </th>
                                                                <td>4</td>
                                                                <td>69</td>
                                                                <td>17.25:1 </td>
                                                                <td>61.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>통신 </th>
                                                                <td>11</td>
                                                                <td>130</td>
                                                                <td>11.82:1 </td>
                                                                <td>58.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전산 </th>
                                                                <td>8</td>
                                                                <td>315</td>
                                                                <td>39.38:1 </td>
                                                                <td>78.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>지도 </th>
                                                                <td>2</td>
                                                                <td>54</td>
                                                                <td>27.0:1 </td>
                                                                <td>81</td>
                                                            </tr>
                                                            <tr>
                                                                <th>일반기계 </th>
                                                                <td>1</td>
                                                                <td>36</td>
                                                                <td>36.0:1 </td>
                                                                <td>53.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>차량 </th>
                                                                <td>1</td>
                                                                <td>52</td>
                                                                <td>52.0:1 </td>
                                                                <td>46.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>인쇄 </th>
                                                                <td>5</td>
                                                                <td>56</td>
                                                                <td>11.2:1 </td>
                                                                <td>77</td>
                                                            </tr>
                                                            <tr>
                                                                <th>병리 </th>
                                                                <td>5</td>
                                                                <td>69</td>
                                                                <td>13.8:1 </td>
                                                                <td>65.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>방사선 </th>
                                                                <td>4</td>
                                                                <td>47</td>
                                                                <td>11.75:1 </td>
                                                                <td>74.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>치무 </th>
                                                                <td>3</td>
                                                                <td>138</td>
                                                                <td>46.0:1 </td>
                                                                <td>70.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>치무 </th>
                                                                <td>1</td>
                                                                <td>29</td>
                                                                <td>29.0:1 </td>
                                                                <td>69.3</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="guide_slider">
                                                <div class="hTy">
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>육군 - 공채 7급</h2>
                                                        </dt>
                                                    </dl>
                                                    <div class="mgB3">
                                                        <table cellspacing="0" cellpadding="0" class="basicTb basicWd gd_table mt20">
                                                            <colgroup>
                                                                <col width="20%">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                            </colgroup>
                                                            <tr>
                                                                <th>직렬 </th>
                                                                <th>채용인원 </th>
                                                                <th>응시인원 </th>
                                                                <th>경쟁률 </th>
                                                                <th>합격선(점) </th>
                                                            </tr>
                                                            <tr>
                                                                <th>행정 </th>
                                                                <td>35</td>
                                                                <td>306</td>
                                                                <td>8.7:1 </td>
                                                                <td>80</td>
                                                            </tr>
                                                            <tr>
                                                                <th>군수 </th>
                                                                <td>2</td>
                                                                <td>12</td>
                                                                <td>6:01</td>
                                                                <td>62</td>
                                                            </tr>
                                                            <tr>
                                                                <th>군사정보 </th>
                                                                <td>1</td>
                                                                <td>12</td>
                                                                <td>15:01</td>
                                                                <td>71</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전기 </th>
                                                                <td>1</td>
                                                                <td>7</td>
                                                                <td>7:01</td>
                                                                <td>54</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전자 </th>
                                                                <td>4</td>
                                                                <td>10</td>
                                                                <td>2.5:1 </td>
                                                                <td>46</td>
                                                            </tr>
                                                            <tr>
                                                                <th>토목 </th>
                                                                <td>5</td>
                                                                <td>35</td>
                                                                <td>7:01</td>
                                                                <td>56</td>
                                                            </tr>
                                                            <tr>
                                                                <th>총포 </th>
                                                                <td>6</td>
                                                                <td>7</td>
                                                                <td>1.2:1 </td>
                                                                <td>69</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전차 </th>
                                                                <td>2</td>
                                                                <td>3</td>
                                                                <td>1.5:1 </td>
                                                                <td>70</td>
                                                            </tr>
                                                            <tr>
                                                                <th>수사 </th>
                                                                <td>3</td>
                                                                <td>135</td>
                                                                <td>45:01:00</td>
                                                                <td>72</td>
                                                            </tr>
                                                            <tr>
                                                                <th>기체 </th>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1:01</td>
                                                                <td>55</td>
                                                            </tr>
                                                            <tr>
                                                                <th>항공기관 </th>
                                                                <td>2</td>
                                                                <td>6</td>
                                                                <td>3:01</td>
                                                                <td>64</td>
                                                            </tr>
                                                            <tr>
                                                                <th>환경 </th>
                                                                <td>1</td>
                                                                <td>10</td>
                                                                <td>10:01</td>
                                                                <td>58</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="hTy">
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>육군 - 공채 9급</h2>
                                                        </dt>
                                                    </dl>
                                                    <div class="mgB3">
                                                        <table cellspacing="0" cellpadding="0" class="basicTb basicWd gd_table mt20">
                                                            <colgroup>
                                                                <col width="20%">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                            </colgroup>
                                                            <col/>
                                                            <tr>
                                                                <th>직렬 </th>
                                                                <th>채용인원 </th>
                                                                <th>응시인원 </th>
                                                                <th>경 쟁 률 </th>
                                                                <th>합격선(점) </th>
                                                            </tr>
                                                            <tr>
                                                                <th>행정 </th>
                                                                <td>197</td>
                                                                <td>5340</td>
                                                                <td>27.1:1 </td>
                                                                <td>82.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>군수 </th>
                                                                <td>161</td>
                                                                <td>2276</td>
                                                                <td>14.1:1 </td>
                                                                <td>70.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>군사정보 </th>
                                                                <td>23</td>
                                                                <td>302</td>
                                                                <td>13.1:1 </td>
                                                                <td>66.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전기 </th>
                                                                <td>26</td>
                                                                <td>372</td>
                                                                <td>14.3:1 </td>
                                                                <td>67.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전자 </th>
                                                                <td>36</td>
                                                                <td>225</td>
                                                                <td>6.3:1 </td>
                                                                <td>42.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>통신 </th>
                                                                <td>46</td>
                                                                <td>246</td>
                                                                <td>5.3:1 </td>
                                                                <td>53.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>총포 </th>
                                                                <td>83</td>
                                                                <td>218</td>
                                                                <td>2.6:1 </td>
                                                                <td>41.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>유도무기 </th>
                                                                <td>57</td>
                                                                <td>195</td>
                                                                <td>3.4:1 </td>
                                                                <td>51</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전산 </th>
                                                                <td>51</td>
                                                                <td>662</td>
                                                                <td>13:01</td>
                                                                <td>77.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>병리 </th>
                                                                <td>13</td>
                                                                <td>40</td>
                                                                <td>1.1:1 </td>
                                                                <td>64</td>
                                                            </tr>
                                                            <tr>
                                                                <th>사서 </th>
                                                                <td>1</td>
                                                                <td>103</td>
                                                                <td>103:01:00</td>
                                                                <td>84</td>
                                                            </tr>
                                                            <tr>
                                                                <th>건축 </th>
                                                                <td>10</td>
                                                                <td>175</td>
                                                                <td>17.5:1 </td>
                                                                <td>67.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>화학분석 </th>
                                                                <td>4</td>
                                                                <td>93</td>
                                                                <td>23.3:1 </td>
                                                                <td>79.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전차 </th>
                                                                <td>47</td>
                                                                <td>182</td>
                                                                <td>3.9:1 </td>
                                                                <td>59.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>기체 </th>
                                                                <td>44</td>
                                                                <td>67</td>
                                                                <td>1.5:1 </td>
                                                                <td>50.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>시설 </th>
                                                                <td>27</td>
                                                                <td>153</td>
                                                                <td>5.7:1 </td>
                                                                <td>69</td>
                                                            </tr>
                                                            <tr>
                                                                <th>인쇄 </th>
                                                                <td>1</td>
                                                                <td>18</td>
                                                                <td>18:01</td>
                                                                <td>58.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>방사선 </th>
                                                                <td>2</td>
                                                                <td>14</td>
                                                                <td>7:01</td>
                                                                <td>65.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>차량 </th>
                                                                <td>97</td>
                                                                <td>302</td>
                                                                <td>3.1:1 </td>
                                                                <td>57.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>용접 </th>
                                                                <td>7</td>
                                                                <td>53</td>
                                                                <td>7.6:1 </td>
                                                                <td>48.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>항공기관 </th>
                                                                <td>22</td>
                                                                <td>30</td>
                                                                <td>1.4:1 </td>
                                                                <td>52</td>
                                                            </tr>
                                                            <tr>
                                                                <th>일반기계 </th>
                                                                <td>39</td>
                                                                <td>361</td>
                                                                <td>9.3:1 </td>
                                                                <td>62.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>환경 </th>
                                                                <td>13</td>
                                                                <td>308</td>
                                                                <td>23.7:1 </td>
                                                                <td>73.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>의공 </th>
                                                                <td>8</td>
                                                                <td>26</td>
                                                                <td>3.3:1 </td>
                                                                <td>53</td>
                                                            </tr>
                                                            <tr>
                                                                <th>금속 </th>
                                                                <td>6</td>
                                                                <td>24</td>
                                                                <td>4:01</td>
                                                                <td>55.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>영상 </th>
                                                                <td>12</td>
                                                                <td>5</td>
                                                                <td>4.7:1 </td>
                                                                <td>72</td>
                                                            </tr>
                                                            <tr>
                                                                <th>탄약 </th>
                                                                <td>34</td>
                                                                <td>205</td>
                                                                <td>6:01</td>
                                                                <td>63.6</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="guide_slider">
                                                <div class="hTy">
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>공군 - 공채 7급</h2>
                                                        </dt>
                                                    </dl>
                                                    <div class="mgB3">
                                                        <table cellspacing="0" cellpadding="0" class="basicTb basicWd gd_table mt20">
                                                            <colgroup>
                                                                <col width="20%">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                            </colgroup>
                                                            <col/>
                                                            <tr>
                                                                <th>직렬 </th>
                                                                <th>채용인원 </th>
                                                                <th>응시인원 </th>
                                                                <th>경 쟁 률 </th>
                                                                <th>합격선(점) </th>
                                                            </tr>
                                                            <tr>
                                                                <th>수사 </th>
                                                                <td>2</td>
                                                                <td>128</td>
                                                                <td>64:01:00</td>
                                                                <td>75</td>
                                                            </tr>
                                                            <tr>
                                                                <th>건축 </th>
                                                                <td>1</td>
                                                                <td>28</td>
                                                                <td>28:01:00</td>
                                                                <td>76</td>
                                                            </tr>
                                                            <tr>
                                                                <th>금속 </th>
                                                                <td>1</td>
                                                                <td>11</td>
                                                                <td>11:01</td>
                                                                <td>61</td>
                                                            </tr>
                                                            <tr>
                                                                <th>물리분석 </th>
                                                                <td>1</td>
                                                                <td>15</td>
                                                                <td>15:01</td>
                                                                <td>68</td>
                                                            </tr>
                                                            <tr>
                                                                <th>항해 </th>
                                                                <td>3</td>
                                                                <td>13</td>
                                                                <td>4.3:1 </td>
                                                                <td>67</td>
                                                            </tr>
                                                            <tr>
                                                                <th>기상 </th>
                                                                <td>3</td>
                                                                <td>9</td>
                                                                <td>3:01</td>
                                                                <td>53</td>
                                                            </tr>
                                                            <tr>
                                                                <th>물리분석 </th>
                                                                <td>1</td>
                                                                <td>15</td>
                                                                <td>15:01</td>
                                                                <td>68</td>
                                                            </tr>
                                                            <tr>
                                                                <th>금속 </th>
                                                                <td>1</td>
                                                                <td>11</td>
                                                                <td>11:01</td>
                                                                <td>61</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="hTy">
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>공군 - 공채 9급</h2>
                                                        </dt>
                                                    </dl>
                                                    <div class="mgB3">
                                                        <table cellspacing="0" cellpadding="0" class="basicTb basicWd gd_table mt20">
                                                            <colgroup>
                                                                <col width="20%">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                            </colgroup>
                                                            <tr>
                                                                <th>직렬 </th>
                                                                <th>채용인원 </th>
                                                                <th>응시인원 </th>
                                                                <th>경 쟁 률 </th>
                                                                <th>합격선(점) </th>
                                                            </tr>
                                                            <tr>
                                                                <th>행정 </th>
                                                                <td>43</td>
                                                                <td>2,648</td>
                                                                <td>61.5:1 </td>
                                                                <td>84</td>
                                                            </tr>
                                                            <tr>
                                                                <th>행정(장애) </th>
                                                                <td>18</td>
                                                                <td>49</td>
                                                                <td>2.7:1 </td>
                                                                <td>60</td>
                                                            </tr>
                                                            <tr>
                                                                <th>군수 </th>
                                                                <td>29</td>
                                                                <td>1,004</td>
                                                                <td>34.6:1 </td>
                                                                <td>73.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>군수(장애) </th>
                                                                <td>11</td>
                                                                <td>11</td>
                                                                <td>1:01</td>
                                                                <td>64</td>
                                                            </tr>
                                                            <tr>
                                                                <th>군사정보 </th>
                                                                <td>18</td>
                                                                <td>351</td>
                                                                <td>19.5:1 </td>
                                                                <td>69.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>시설 </th>
                                                                <td>21</td>
                                                                <td>130</td>
                                                                <td>6.1:1 </td>
                                                                <td>59.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전기 </th>
                                                                <td>2</td>
                                                                <td>85</td>
                                                                <td>42.5:1 </td>
                                                                <td>71.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전자 </th>
                                                                <td>43</td>
                                                                <td>251</td>
                                                                <td>5.8:1 </td>
                                                                <td>45.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>통신 </th>
                                                                <td>24</td>
                                                                <td>196</td>
                                                                <td>8.1:1 </td>
                                                                <td>49.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전산 </th>
                                                                <td>14</td>
                                                                <td>383</td>
                                                                <td>27.3:1 </td>
                                                                <td>76</td>
                                                            </tr>
                                                            <tr>
                                                                <th>일반기계 </th>
                                                                <td>17</td>
                                                                <td>258</td>
                                                                <td>15.1:1 </td>
                                                                <td>66.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>용접 </th>
                                                                <td>6</td>
                                                                <td>58</td>
                                                                <td>9.6:1 </td>
                                                                <td>54.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>유도무기 </th>
                                                                <td>17</td>
                                                                <td>100</td>
                                                                <td>5.8:1 </td>
                                                                <td>49.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>기체 </th>
                                                                <td>70</td>
                                                                <td>156</td>
                                                                <td>2.2:1 </td>
                                                                <td>41.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>항공기관 </th>
                                                                <td>26</td>
                                                                <td>40</td>
                                                                <td>1.5:1 </td>
                                                                <td>41.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>항공보기 </th>
                                                                <td>39</td>
                                                                <td>91</td>
                                                                <td>2.3:1 </td>
                                                                <td>42.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>항공보기(장애) </th>
                                                                <td>3</td>
                                                                <td>1</td>
                                                                <td>0.3:1 </td>
                                                                <td>74.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>항공지원 </th>
                                                                <td>9</td>
                                                                <td>27</td>
                                                                <td>3:01</td>
                                                                <td>52</td>
                                                            </tr>
                                                            <tr>
                                                                <th>기상예보 </th>
                                                                <td>3</td>
                                                                <td>38</td>
                                                                <td>12.6:1 </td>
                                                                <td>82.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>병리 </th>
                                                                <td>1</td>
                                                                <td>15</td>
                                                                <td>15:01</td>
                                                                <td>58.6</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="guide_slider">
                                                <div class="hTy">
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>해군 - 9급</h2>
                                                        </dt>
                                                    </dl>
                                                    <div class="mgB3">
                                                        <table cellspacing="0" cellpadding="0" class="basicTb basicWd gd_table mt20">
                                                            <colgroup>
                                                                <col width="20%">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                            </colgroup>
                                                            <tr>
                                                                <th>직렬 </th>
                                                                <th>채용인원 </th>
                                                                <th>응시인원 </th>
                                                                <th>경 쟁 률 </th>
                                                                <th>합격선(점) </th>
                                                            </tr>
                                                            <tr>
                                                                <th>행정 </th>
                                                                <td>22</td>
                                                                <td>1,107</td>
                                                                <td>50.3 : 1 </td>
                                                                <td>82.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>행정(장애인) </th>
                                                                <td>10</td>
                                                                <td>23</td>
                                                                <td>2.3 : 1 </td>
                                                                <td>60</td>
                                                            </tr>
                                                            <tr>
                                                                <th>군수 </th>
                                                                <td>32</td>
                                                                <td>898</td>
                                                                <td>28.1 : 1 </td>
                                                                <td>72</td>
                                                            </tr>
                                                            <tr>
                                                                <th>군수(장애인) </th>
                                                                <td>11</td>
                                                                <td>11</td>
                                                                <td>1.0 : 1 </td>
                                                                <td>64</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전기 </th>
                                                                <td>30</td>
                                                                <td>343</td>
                                                                <td>11.4 : 1 </td>
                                                                <td>65</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전자 </th>
                                                                <td>13</td>
                                                                <td>75</td>
                                                                <td>5.8 : 1 </td>
                                                                <td>44</td>
                                                            </tr>
                                                            <tr>
                                                                <th>통신 </th>
                                                                <td>13</td>
                                                                <td>82</td>
                                                                <td>6.3 : 1 </td>
                                                                <td>51.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전산 </th>
                                                                <td>19</td>
                                                                <td>277</td>
                                                                <td>14.6 : 1 </td>
                                                                <td>73.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>유도무기 </th>
                                                                <td>12</td>
                                                                <td>135</td>
                                                                <td>11.3 : 1 </td>
                                                                <td>54.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>일반기계 </th>
                                                                <td>13</td>
                                                                <td>190</td>
                                                                <td>14.6 : 1 </td>
                                                                <td>70.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>건축 </th>
                                                                <td>7</td>
                                                                <td>87</td>
                                                                <td>12.4 : 1 </td>
                                                                <td>62.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>토목 </th>
                                                                <td>3</td>
                                                                <td>57</td>
                                                                <td>19.0 : 1 </td>
                                                                <td>64</td>
                                                            </tr>
                                                            <tr>
                                                                <th>차량 </th>
                                                                <td>10</td>
                                                                <td>121</td>
                                                                <td>12.1 : 1 </td>
                                                                <td>59.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>기체 </th>
                                                                <td>2</td>
                                                                <td>2</td>
                                                                <td>1.0 : 1 </td>
                                                                <td>66.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>선거 </th>
                                                                <td>23</td>
                                                                <td>76</td>
                                                                <td>3.3 : 1 </td>
                                                                <td>58.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>선체 </th>
                                                                <td>9</td>
                                                                <td>25</td>
                                                                <td>2.8 : 1 </td>
                                                                <td>53.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>시설 </th>
                                                                <td>13</td>
                                                                <td>72</td>
                                                                <td>5.5 : 1 </td>
                                                                <td>63.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>영양관리 </th>
                                                                <td>4</td>
                                                                <td>185</td>
                                                                <td>46.3 : 1 </td>
                                                                <td>80</td>
                                                            </tr>
                                                            <tr>
                                                                <th>용접 </th>
                                                                <td>5</td>
                                                                <td>50</td>
                                                                <td>10.0 : 1 </td>
                                                                <td>43</td>
                                                            </tr>
                                                            <tr>
                                                                <th>탄약 </th>
                                                                <td>33</td>
                                                                <td>251</td>
                                                                <td>7.6 : 1 </td>
                                                                <td>62.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>잠수 </th>
                                                                <td>6</td>
                                                                <td>6</td>
                                                                <td>1.0 : 1 </td>
                                                                <td>67</td>
                                                            </tr>
                                                            <tr>
                                                                <th>함정기관 </th>
                                                                <td>22</td>
                                                                <td>74</td>
                                                                <td>3.4 : 1 </td>
                                                                <td>49.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>항공기관 </th>
                                                                <td>6</td>
                                                                <td>14</td>
                                                                <td>2.3 : 1 </td>
                                                                <td>49.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>항공보기 </th>
                                                                <td>3</td>
                                                                <td>14</td>
                                                                <td>4.7 : 1 </td>
                                                                <td>63.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>환경 </th>
                                                                <td>2</td>
                                                                <td>58</td>
                                                                <td>29.0 : 1 </td>
                                                                <td>68</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="hTy">
                                                    <dl class="gd_txt">
                                                        <dt>
                                                            <h2>해병대 - 9급</h2>
                                                        </dt>
                                                    </dl>
                                                    <div class="mgB3">
                                                        <table cellspacing="0" cellpadding="0" class="basicTb basicWd gd_table mt20">
                                                            <colgroup>
                                                                <col width="20%">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                                <col width="">
                                                            </colgroup>
                                                            <tr>
                                                                <th>직렬 </th>
                                                                <th>채용인원 </th>
                                                                <th>응시인원 </th>
                                                                <th>경 쟁 률 </th>
                                                                <th>합격선(점) </th>
                                                            </tr>
                                                            <tr>
                                                                <th>행정 </th>
                                                                <td>14</td>
                                                                <td>182</td>
                                                                <td>13.0 : 1 </td>
                                                                <td>78.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>군수 </th>
                                                                <td>2</td>
                                                                <td>31</td>
                                                                <td>15.5 : 1 </td>
                                                                <td>62.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전기 </th>
                                                                <td>1</td>
                                                                <td>17</td>
                                                                <td>17.0 : 1 </td>
                                                                <td>49.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>통신 </th>
                                                                <td>6</td>
                                                                <td>13</td>
                                                                <td>2.2 : 1 </td>
                                                                <td>45.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전산 </th>
                                                                <td>6</td>
                                                                <td>38</td>
                                                                <td>6.3 : 1 </td>
                                                                <td>70.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>전차 </th>
                                                                <td>4</td>
                                                                <td>31</td>
                                                                <td>7.8 : 1 </td>
                                                                <td>60</td>
                                                            </tr>
                                                            <tr>
                                                                <th>차량 </th>
                                                                <td>1</td>
                                                                <td>11</td>
                                                                <td>11.0 : 1 </td>
                                                                <td>57.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>탄약 </th>
                                                                <td>1</td>
                                                                <td>7</td>
                                                                <td>7.0 : 1 </td>
                                                                <td>57</td>
                                                            </tr>
                                                            <tr>
                                                                <th>건축 </th>
                                                                <td>1</td>
                                                                <td>20</td>
                                                                <td>20.0 : 1 </td>
                                                                <td>58.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>기체 </th>
                                                                <td>3</td>
                                                                <td>3</td>
                                                                <td>1.0 : 1 </td>
                                                                <td>78.3</td>
                                                            </tr>
                                                            <tr>
                                                                <th>시설 </th>
                                                                <td>2</td>
                                                                <td>9</td>
                                                                <td>4.5 : 1 </td>
                                                                <td>54.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>항공기관 </th>
                                                                <td>1</td>
                                                                <td>4</td>
                                                                <td>4.0 : 1 </td>
                                                                <td>46.6</td>
                                                            </tr>
                                                            <tr>
                                                                <th>환경 </th>
                                                                <td>1</td>
                                                                <td>8</td>
                                                                <td>8.0 : 1 </td>
                                                                <td>64</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="gpgosi_guide4" class="tabContent">
                                <div class="examInfoGu4">
                                    <h4 class="hTy4 hTy">직렬별 주요 업무내용</h4>
                                    <div class="hTy">
                                        <dl class="gd_txt">
                                            <dt>
                                                <h2>직렬별 주요 업무내용</h2>
                                            </dt>
                                        </dl>
                                        <div class="mgB3">
                                            <table class="basicTb basicWd gd_table mt20">
                                                <colgroup>
                                                    <col width="10%">
                                                    <col width="20%">
                                                    <col width="">
                                                </colgroup>
                                                <thead>
                                                <tr>
                                                    <th width="">직군</th>
                                                    <th width="10%">직렬</th>
                                                    <th width="">업무내용&nbsp;</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td rowspan="6" class="td_13">행정<br>
                                                        (6)</td>
                                                    <td class="gd_txt_bg">행정</td>
                                                    <td class="td_l txtL"> - 국방정책,군사전략, 체계분석, 평가, 제도, 계획, 연구업무<br>
                                                        - 일반행정, 정훈, 심리업무<br>
                                                        - 법제, 송무, 행정소송업무<br>
                                                        - 세입, 세출결산, 재정금융 조사분석, 계산증명, 급여업무<br>
                                                        - 국유재산, 부동산관리유지·처분에 관한 업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">군수</td>
                                                    <td class="td_l txtL">-  수품 소요, 조달, 보급, 재고관리, 정비계획, 장비관리, 물자수불업무<br>
                                                        - 군수품 생산, 공정, 품질, 안전관리, 자원활용업무<br>
                                                        - 작업계획, 생산시설유지, 생산품 처리업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">사서</td>
                                                    <td class="td_l txtL">- 도서의 수집, 선택, 분류, 목록작성, 보관, 열람에 관한 업무&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">수사</td>
                                                    <td class="td_l txtL">-   범죄수사, 비위조사, 범죄예방, 계몽활동 등에 관한 업무&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">군사정보</td>
                                                    <td class="td_l txtL">-  주변국 및 대북 군사정보 수집, 생산관리, 부대전파 및 군사 보안업무&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">기술정보</td>
                                                    <td class="td_l txtL">-  외국정보 및 산업, 경제, 과학기술 정보의 수집, 생산관리 보안업무 <br>
                                                        - 정보용 장비, 기기 등에 의한 정보수집 업무&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="4" class="td_13">시설<br>
                                                        (4)</td>
                                                    <td class="gd_txt_bg">토목</td>
                                                    <td class="td_l txtL">-  토목공사에 관한 계획, 설계, 시공 및 감독업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">건축</td>
                                                    <td class="td_l txtL">-  건축공사에 관한계획, 설계, 시공 및 감독업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">시설</td>
                                                    <td class="td_l txtL">-  건물에 시설된 각종 냉, 난방장치의 설비, 시공, 검사, 정비, 수리업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">환경</td>
                                                    <td class="td_l txtL">-  대기수질, 폐기물, 오염검사, 및 소음진동 측정, 시설물 시공 평가에 관한 업무</td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="7" class="td_13">정보통신<br>
                                                        (6)&nbsp;</td>
                                                    <td class="gd_txt_bg">전산</td>
                                                    <td class="td_l txtL">-  소프트웨어 개발, 프로그램작성 업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">　</td>
                                                    <td class="td_l txtL">-  시스템 구조 설계, 전산통신 분석, 체계개발 업무&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">통신</td>
                                                    <td class="td_l txtL">-  유,무선 통신장비, 기기 조작운용 등 통신 전반에 관한 정비, 수리업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">전기</td>
                                                    <td class="td_l txtL">-  전기설계, 전도기, 발전기, 전원부하, 송배전 및 변전, 전기에너지, <br>
                                                        -  압추기구,전자기기 ,전기시설 등 전기    전반에 관한 정비, 수리업무&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">전자</td>
                                                    <td class="td_l txtL">-  전기설계, 전도기, 발전기, 전원부하, 송배전 및 변전, 전기에너지, <br>
                                                        -  압추기구,전자기기 ,전기시설 등 전기 전반에    관한 정비, 수리업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">지도</td>
                                                    <td class="td_l txtL">-  각종 지도 측량, 편집, 지도제작 업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">영상</td>
                                                    <td class="td_l txtL">-  각종 사진 촬영, 현상,인화, 확대편집, 필름보관 관리 업무<br>
                                                        - 각종 사진기, 영사기 조작, 관리 업무<br>
                                                        - 항공사진 제작 분석, 판독 및 항고표적 분석, 자료생산 업무<br>
                                                        - 항공사진 인화, 확대, 현상, 필름보관 관리 업무</td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="11" class="td_13">공업<br>
                                                        (11)</td>
                                                    <td class="gd_txt_bg">일반기계</td>
                                                    <td class="td_l txtL">-  각종 기계 및 장비 부속품의 설계업무 <br>
                                                        - 각종 공작기계.공구 등을 조작하여 금속류의 가공.제작.조립 업무 <br>
                                                        - 각종 장비의 기골.외피의 금속부분 제작, 정비, 수리업무<br></td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">금속</td>
                                                    <td class="td_l txtL">-  금형제작, 주물생산, 금속 및 비금속 성분의 용해로 운용업무<br>
                                                        - 금속의 탄소밀도 변화처리<br>
                                                        - 금속 표면의 산화 및 마모 방지를 위한 각종 도금업무<br></td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">용접</td>
                                                    <td class="td_l txtL">-  전기, 단조저항, 가수, 특수용접 등 각종 용접업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">물리분석</td>
                                                    <td class="td_l txtL">-  물리학적 감식,검출업무 <br>
                                                        - 방사선 및 전자파 등을 이용 금속의 결함 탐지, 검사업무&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">화학분석</td>
                                                    <td class="td_l txtL">-  각종 금속, 비금속 재료에 대한 화학적 성분 검사업무<br>
                                                        - 각종 연료 분광, 분석 검사업무<br>
                                                        - 화학물질의 성질과 상호간 화학적 반응 개발업무<br>
                                                        - 생체 구성분 결정, 생체 성분간 화학적 변화 및 생화학 연구개발업무&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">유도무기</td>
                                                    <td class="td_l txtL">-  포 및 유도무기, 사격통제장치, 각종 축적기계 장비의 정비, 수리업무<br>
                                                        - 각종 광학장비 정비.수리업무<br>
                                                        - 함정, 항공기 탑재 무장장비 및 관련 장비 재생, 설치, 정비, 수리업무<br></td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">총포</td>
                                                    <td class="td_l txtL">-  유도장치가 있는 무기를 제외한 각종 총포, 화포, 특수무기 생산, 제작, 정비,수리업무<br>
                                                        - 각종 화학병기 및 장비의 제작, 관리, 정비 ,수리업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">탄약</td>
                                                    <td class="td_l txtL"> -  탄약의 제조, 분해, 품질검사, 성능검사, 저장.안전관리, 정비수리,재고통제,적송 업무<br>
                                                        - 비파괴시험을 통한 탄약의 결함 검출 및 판독 업무<br>
                                                        - 각종 유도탄, 수중탄 발사장치 및 관계되는 장비 분해, 조립, 설치, 정비, <br>
                                                        수리업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">전차</td>
                                                    <td class="td_l txtL">-  전차, 장갑차량의 부품제작, 조립, 정비, 수리업무<br>
                                                        - 내.외연기관 및 엔진부품의 생산, 조립, 정비, 수리업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">차 량</td>
                                                    <td class="td_l txtL">-  건설장비(중장비.경장비.컴프레서) 및 연계된 장비 정비.수리 및 관리업무<br>
                                                        - 육상용 차량 분해, 조립, 부품대체, 정비, 수리업무<br>
                                                        - 내.외연기관 및 엔진부품의 생산, 조립, 정비, 수리업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">인쇄</td>
                                                    <td class="td_l txtL">-  인쇄기기 조작, 운용, 정비, 수리업무<br>
                                                        - 편집, 교정, 교열, 화공 등에 관한 업무 <br>
                                                        - 원판, 조판, 연마, 제판, 제본 등에 관한 업무</td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="5" class="td_13">함정<br>
                                                        (5)</td>
                                                    <td class="gd_txt_bg">선체</td>
                                                    <td class="td_l txtL">-  선체골격, 늑골 접합, 의장, 설계, 제작 및 정비, 수리업무<br>
                                                        - 선목의 골격, 늑골 접합, 선체의 목재부분 의장, 설계, 제작, 정비, 수리업무<br>
                                                        - 대.소형 선박용 보일러 제작.설치.실험 및 각종 파이프 가공제작.정비.수리업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">함정기관</td>
                                                    <td class="td_l txtL">-  주 추진기관, 선박용 발전기, 원동기 및 관련되는 보조장비정비, 수리업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">항해</td>
                                                    <td class="td_l txtL">-  함정 입,출거지 도선 및 기타 항해업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">선거</td>
                                                    <td class="td_l txtL">-  입거 함정의 선저(수면하 선체), 장비이동 및 관계되는 업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">잠수</td>
                                                    <td class="td_l txtL">-  수면하 선체보수, 수로 장애물 제거, 수중폭파, 용접, 절단, 탐색에 관한 업무</td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="5" class="td_13">항공<br>
                                                        (4)</td>
                                                    <td class="gd_txt_bg">기체</td>
                                                    <td class="td_l txtL">-  항공기 기체, 제작, 분해, 조립, 정비, 수리업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">항공기관</td>
                                                    <td class="td_l txtL">-  항공기 엔진 및 관련되는 보조장비 분해, 조립, 정비, 수리업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">항공보기</td>
                                                    <td class="td_l txtL">-  보조기기 및 관련된 보조장비 분해, 조립, 제작, 정비, 수리업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">항공도장</td>
                                                    <td class="td_l txtL">-  항공기 내,외부 도장 및 각종 특수도장 업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">항공지원</td>
                                                    <td class="td_l txtL">-  지원되는 소방차, 급유차, 견인차, 특수차량, 운전, 정비, 수리, 검사업무</td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="8" class="td_13">보건<br>
                                                        (8)</td>
                                                    <td class="gd_txt_bg">약무</td>
                                                    <td class="td_l txtL"><p>- 각종 의약품 획득, 투약, 분배, 저장관리 업무</p></td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">병리</td>
                                                    <td class="td_l txtL">-  병리 임상검사, 원인분석, 임상관찰, 환자치료에 관계되는 자료관리 업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">방사선</td>
                                                    <td class="td_l txtL">-  방사선 이용 질병진단, 환부투시, 촬영, 치료 및 자료관리 업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">치무</td>
                                                    <td class="td_l txtL">-  각종 의치설계, 제작업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">재활치료</td>
                                                    <td class="td_l txtL">-  질병 및 신체장애를 예방하기 위해 전기, 광선, 물,<br>
                                                        -  냉온열 등을 이용한 치료적 마사지와 운동치료를 포함한 치료 업무&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">의무기록</td>
                                                    <td class="td_l txtL">-  진료전반에 대한 통계와 의무기록의 분석 및 미비기록 관리,의무기록 재검토, 질병색인,<br>
                                                        수술색인 등의 색인 업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">의공</td>
                                                    <td class="td_l txtL">-  의지, 의안 설계, 제작업무<br>
                                                        - 각종 의료장비, 기기 제작 및 정비, 수리업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">영양관리</td>
                                                    <td class="td_l txtL">-  식품저장, 가공, 영양분석, 식단작성업무</td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="2" class="td_13">기상<br>
                                                        (2)</td>
                                                    <td class="gd_txt_bg">기상정보</td>
                                                    <td class="td_l txtL">-  각종 기상장비, 기기 및 관계된 장비 조작, 운용관리 업무</td>
                                                </tr>
                                                <tr>
                                                    <td class="gd_txt_bg">기상예보</td>
                                                    <td class="td_l txtL">-  기상관측, 예보, 분석, 통계관리 등에 관한 업무</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
@stop