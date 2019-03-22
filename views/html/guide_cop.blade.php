@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">일반경찰</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="{{ site_url('/home/html/prof') }}">교수진소개</a>
                </li>
                <li>
                    <a href="#none">PASS</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/package1') }}">패키지</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                        <li class="Tit">패키지</li>
                            <li><a href="{{ site_url('/home/html/package1') }}">추천 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/package2') }}">선택 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/diypackage') }}">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/list') }}">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mocktest1') }}">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">수험정보</li>
                            <li><a href="{{ site_url('/home/html/mocktest1') }}">시험공고</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest2') }}">수험뉴스</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest3') }}">기출문제</a></li>
                            <li><a href="{{ site_url('/home/html/guide_cop') }}">경찰가이드</a></li>
                            <li><a href="{{ site_url('/home/html/guide_success_cop') }}">초보합격전략</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest6_1') }}">모의고사</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/event_ing') }}">이벤트</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">이벤트</li>
                            <li><a href="{{ site_url('/home/html/event_ing') }}">진행중인 이벤트</a></li>
                            <li><a href="{{ site_url('/home/html/event_end') }}">마감된 이벤트</a></li>
                        </ul>
                    </div>
                </li>
                <li class="Acad">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>수험정보</strong>
            <span class="depth-Arrow">></span><strong>경찰가이드</strong>
        </span>
    </div>
    <div class="Content p_re">
        <div class="willbes-Leclist c_both">
            <div class="w-cop-Guide">
                <div class="willbes-cop-guide GM">
                    <ul class="tabWrap tabcsDepth2 tab_cop_Guide p_re NG">
                        <li class="w-cop-guide1"><a class="qBox on" href="#cop_guide1"><span>경찰공무원안내</span></a></li>
                        <li class="w-cop-guide2"><a class="qBox" href="#cop_guide2"><span>경찰시험안내</span></a></li>
                        <li class="w-cop-guide3"><a class="qBox" href="#cop_guide3"><span>가산점</span></a></li>
                        <li class="w-cop-guide4"><a class="qBox" href="#cop_guide4"><span>최종합격관리</span></a></li>
                    </ul>
                    <div class="tabBox mt20">
                        <div id="cop_guide1" class="tabContent"> 
                            <div class="examInfoGu1 mgTop pb50">          
                                <h4 class="hTy4">경찰공무원의 임무</h4>
                                <div class="mgB2">
                                    <p>경찰관으로 임용되면 일반적으로 본청 지방청 및 경찰서나 파출소에서 "국민의 생명 신체 및 재산의 보호와 범죄의 예방과 진압,수사와 교통의 단속 기타 공공의 안녕과 질서유지를 목적으로 하는 업무에 종사하게 된다." 그리고 경찰서나 파출소에서 일정기간 동안 근무를 하고 나면 교통경찰관이나 수사형사 등 경과 별로 근무할 기회가 주어진다. 또한 다음에서 설명하는 바와 같이 능력에 따라 일정한 근무연한이 지나면 자동 혹은 시험승진할 수 있는 구조가 확실하게 보장되어 있고, 신분보장이 철저한 가장 안전한 직업이라 할 수 있다.</p>
                                </div>
                                <!-- toggle -->
                                <div class="toggleCont">
                                    <div class="toggleContList">
                                        <h5 class="tTitle">경찰공무원 분야별 업무</h5>
                                        <div class="tContWp">
                                            <table class="basicTb">
                                                <colgroup>
                                                    <col width="20%">
                                                    <col width="*">
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th>구분</th>
                                                        <th>업무</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>경무</th>
                                                        <td class="txtL">경찰조직,인사 재무등을 관리하는 업무로 일반기업체의 총무와 비슷한기능이다.</td>
                                                    </tr>
                                                    <tr>
                                                        <th>생활안전</th>
                                                        <td class="txtL">풍속,방범(범죄예방),외근경찰(경찰서나 파출소활동),소년경찰(청소년보호, 단속)활동을 한다.</td>
                                                    </tr>
                                                    <tr>
                                                        <th>교통</th>
                                                        <td class="txtL">도로에서 발생하는 위해의 예방과 단속,교통정리(운전면허,사이카,고속도로 순찰대 활동포함)등이다.</td>
                                                    </tr>
                                                    <tr>
                                                        <th>경비</th>
                                                        <td class="txtL">사회공공의 안녕,질서를 위태롭게 하는 각종사태를 예방,진압하는 활동등이다.   </td>
                                                    </tr>
                                                    <tr>
                                                        <th>작전</th>
                                                        <td class="txtL">대간첩작전,전투경찰대운영,예비군동원 등이다.</td>
                                                    </tr>
                                                    <tr>
                                                        <th>수사</th>
                                                        <td class="txtL">범죄를 수사하고 증거를 수집하는 경찰활동(형사근무,피의자조사,감식,컴퓨터운용) 등이다. </td>
                                                    </tr>
                                                    <tr>
                                                        <th>정보</th>
                                                        <td class="txtL">국가사회의 기본질서를 파괴하는 행위를 예방,단속하는 경찰활동(국가안보에 관련된 정보수집)등이다.  </td>
                                                    </tr>
                                                    <tr>
                                                        <th>보안</th>
                                                        <td class="txtL">대간첩 용공분자색출 및 검거,반국가적,반사회적사범에 대한첩보 수집 및 이의 예방활동이다.  </td>
                                                    </tr>
                                                    <tr>
                                                        <th>외사</th>
                                                        <td class="txtL">외국인범죄 외국인동향조사 밀항단속등의 활동이다. </td>
                                                    </tr>
                                                    <tr>
                                                        <th>통신</th>
                                                        <td class="txtL">경찰의 유선,무선통신 전송업무 등을 수행하는 특수분야이다. </td>
                                                    </tr>
                                                    <tr>
                                                        <th>해양</th>
                                                        <td class="txtL">해양경찰청에 소속되어 해상경비,해상범죄단속 등의 업무를 수행하는 특수분야이다.  </td>
                                                    </tr>
                                                    <tr>
                                                        <th>항공</th>
                                                        <td class="txtL">경찰항공기 운항, 정비업무등의 업무를 수행하는 특수분야이다.   </td>
                                                    </tr>
                                                    <tr>
                                                        <th>운전</th>
                                                        <td class="txtL">경찰차량의 운행, 정비업무등의 업무를 수행하는 특수분야이다.  </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- //list -->			            	 
                                </div>
                                <!-- // toggle  -->	

                                <h4 class="hTy4">경찰공무원의 혜택</h4>	
                                <!-- toggle -->
                                <div class="toggleCont">
                                    <div class="toggleContList">
                                        <h5 class="tTitle">인사제도는</h5>
                                        <div class="tContWp">
                                            <h6>인사 제도</h6>
                                            <div class="inner_txt">
                                                <p class="tit1">다양한 보직기회 제공</p>
                                                <p>경찰은 타 직종과는 달리 그 업무기회가 경무,방범,수사,교통,정비,보안,전산통신 등 다방면에 걸쳐있는 매우 방대한 조직으로 되어있다. 이에 따라 모든 경찰관은 자신의 전공분야,근무경력,적성 등에 따라 적재적소에서 능력을 발휘할 수 있으며 다양한 업무를 경험할 수 있다.</p>
                                                <p class="tit1">승진의 문호개방</p>
                                                <p>승진제도 승진이란 하위직에서 상위 직으로 올라가는 것을 말하는데, 이는 신규채용과 더불어 인사제도의 2대 초석이며 실적주의 인사의 성패를 가름하는 관건이다. </p>
                                                <p>승진제도는 직업공무원의 능력발전을 위한 중요한 수단으로서 승진의 기회는 인간 의 능력을 최고도로 발휘하는 기회를 주는 것이며,그들의 사기와 용기의 원천이 되기도 한다.</p>
                                            </div>
                                            <h6>승진의 구분</h6>
                                            <div class="inner_txt">
                                                <p><span class="tit1">심사승진 :</span>경찰 공무원의 승진심사는 계급별로 실시하지만, 경찰청장이 필요하다고 인정할 때에는 계급별, 직무분야별로 실시할 수 있다.</p>
                                                <p><span class="tit1">시험승진 :</span>승진소요 최저 근무연수를 지낸 경정 이하의 경찰관에 한해서 필기시험, 면접시험, 교육훈련 성적 등을 합산해서 고득점 순에 의해 합격자를 결정하는 제도이다.</p>
                                                <p class="tit1">경찰승진시험 합격자결정</p>
                                                <ul>
                                                    <li>㉠ 제1차 성적 3할 (3%)</li>
                                                    <li>㉡ 제2차 성적 3할 (3%)</li>
                                                    <li>㉢ 당해 계급 근무성적 2.5할(2.5%및 교육훈련성적 1.5할(1.5%) 비율로 합산한 성적으로 고득점 순으로 결정한다. </li>
                                                </ul>
                                                <p><span class="tit1">특별승진 :</span>경찰직무에 특별히 공이 있는 자를 승진시키는 제도인데 연3회(6월30일,10월 21일,12월31일)정기적으로 실시하되 행정자치부장관이 필요할 때는 수시로 행 할 수 있다.</p>

                                                <p class="tit1">승진소요 최저근무연수</p>
                                                <table class="basicTb mgB1">
                                                    <thead>
                                                    <tr>
                                                        <th>계급</th>
                                                        <th>근무년수</th>
                                                        <th>계급</th>
                                                        <th>근무년수</th>
                                                        <th>계급</th>
                                                        <th>근무년수</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="agC">
                                                        <td>총경</td>
                                                        <td>4년</td>
                                                        <td>경정</td>
                                                        <td>3년</td>
                                                        <td>경감</td>
                                                        <td>3년</td>
                                                    </tr>
                                                    <tr class="agC">
                                                        <td>경위</td>
                                                        <td>2년</td>
                                                        <td>경사</td>
                                                        <td>2년</td>
                                                        <td>경장</td>
                                                        <td>1년</td>
                                                    </tr>
                                                    <tr class="agC">
                                                        <td>순경</td>
                                                        <td>1년</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                                <p class="mgB1">기간산업의 배제 : 징계처분기간,휴직기간 → 직위 해제기간은 위의 최저근무연수에 삽입하지 않는다. </p>

                                                <p class="tit1">승진임용의 제한</p>
                                                <ul>
                                                    <li>㉠ 징계의결요구,징계처분,직위해제, 휴직 또는 시보임용 기간 중에 있는자.</li>
                                                    <li>㉡ 징계처분의 집행이 종료된 날로부터 정직은18월,감봉은 12월,견책은 6월이 경과 되지 않은자</li>
                                                </ul>
                                                <p><strong>승진심사 대상자에서의 제외 :경찰공무원 교육훈련 규정에 의한 교육을 받지 아니하였거나 당해 교육 성적이 만점의 6할미만 인자 기타 등등 )</strong></p>
                                            </div>
                                        </div>
                                    </div>
                
                                    <!-- //list -->	
                                    <div class="toggleContList">
                                        <h5 class="tTitle">근무제도, 신분보장</h5>
                                        <div class="tContWp">
                                            <h6>근무제도</h6>
                                            <div class="inner_txt">
                                                신임경찰은 임용 후 국민과의 접점인 일선파출소에 배치되어 주민들과 호흡하며 생생한 현장근무를 하게 된다. 현재 파출소의 근무는 서울 등 6대 도시에서부터 파출소 3부제 근무를 실시하고 있다. 파출소 근무 이후에는 본인의 희망이나 전문성, 적성에 따라 수사, 형사, 정보, 보안, 교통 등 전문 분야에서 근무를 할 수 있으며, 이를 통해 자신의 잠재된 능력을 마음껏 발휘 할 수 있다.
                                            </div>
                                            <h6>경찰교육기관교육</h6>
                                            <div class="inner_txt">
                                                최종 합격자는 경찰 교육기관에서 24주간의 신임 교육을 이수하게 되며, 시험을 응시한 지방 경찰청으로 배치 된다. 한편 재직 경찰공무원에 대해서는 수사 실무과정 등 전문 분야별 실무 교육이나 경찰관으로서 필요한 소양중심의 기본교육을 일정기간 이수 토록하여 개개인의 지속적인 능력 발전을 도모하게 된다. 
                                            </div>
                                            <h6>국내 위탁 교육</h6>
                                            <div class="inner_txt">
                                                한국 방송대학에 연간 300여명 특별 전형으로 입학하고 있으며, 성적 우수자에게는 장학금이 지급된다. 국내 각 대학원에도 현재 총 30명이 석, 박사과정을 이수하고 있다. 
                                            </div>
                                            <h6>해외연수</h6>
                                            <div class="inner_txt">
                                                어학능력 우수자는 미국, 일본, 영국, 프랑스, 캐나다 등 선진국 경찰기관 및 대학에서 장단기 해외연수 할 수 있는 기회가 있다. 해외 유학 중에는 통상 급여 외에도 별도의 체제비가 지급 된다.
                                            </div>
                                            <h6>후생복지제도</h6>
                                            <div class="inner_txt">
                                                
                                            </div>
                                            <h6>노후 생활보장</h6>
                                            <div class="inner_txt">
                                                <ul class="listBar5">
                                                    <li>퇴직연금 : 재직 기간별로 누진 장기근속자 우대
                                                        <p>㉠ 5~20년 미만 : 퇴직 일시금으로 지급(보수월액의 7.5~33배)</p>
                                                        <p>㉡ 20~33년 : 퇴직연금지급(보수월액의 50~76%)이나 퇴직연금일시금으로 지급(보수월액의 33~58.74배)</p>
                                                    </li>
                                                    <li>퇴직수당 : 퇴직연금의 수당
                                                        <p>㉠보수월액 x 재직연수 x (재직 연수에 따라 10~60%)</p>
                                                    </li>
                                                    <li>경찰공채 : 월10구좌(5만원)까지 적립→ 퇴직시일시금 지급(월2만원씩 불입하여 30년 후1억2백60만원 수령예상)</li>
                                                </ul>
                                            </div>
                                            <h6>주거안정</h6>
                                            <div class="inner_txt">
                                                <ul class="listBar5">
                                                    <li>국립경찰병원을 무료로 이용</li>
                                                    <li>금융기관 등을 통한 신용대출알선</li>
                                                    <li>중,고자녀 학자금전액보조</li>
                                                    <li>대학자녀 국고대여장학금 무이자대여 및 자체장학금 지급</li>
                                                    <li>근속년수에 따라 연간7일 이상 23일까지 본인이 필요한 시기에 휴가실시</li>
                                                </ul>
                                            </div>
                                            
                                        </div>	
                                    </div>
                                    <!-- //list -->	    
                                </div>
                                <!-- // toggle  -->

                                <h4 class="hTy4">경찰계급과 역할</h4>
                                <!-- toggle -->
                                <div class="toggleCont">
                                    <div class="toggleContList">
                                        <h5 class="tTitle">순경~경사의 역할</h5>
                                        <div class="tContWp">
                                            <table class="basicTb mgB1">
                                                <colgroup>
                                                    <col width="10%">
                                                    <col width="120px">
                                                    <col width="*">
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th>계급별</th>
                                                        <th>형태</th>
                                                        <th>업무</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>순경</th>
                                                        <td class="agC">
                                                        <img src="{{ img_url('cop/guide/img22.gif') }}"><img src="{{ img_url('cop/guide/img22.gif') }}">
                                                        </td>
                                                        <td rowspan="3" class="txtL">"巡警, 警長, 警査"는 일선 지구대와 경찰서·기동대 등에서 치안실무자로서국민과 가장 밀접한 임무를 수행하고 있으며 '경찰의 뿌리'라고 할 수 있습니다. </td>
                                                    </tr>
                                                    <tr>
                                                        <th>경장</th>
                                                        <td class="agC">
                                                        <img src="{{ img_url('cop/guide/img22.gif') }}"><img src="{{ img_url('cop/guide/img22.gif') }}"><img src="{{ img_url('cop/guide/img22.gif') }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>경사</th>
                                                        <td class="agC">
                                                        <img src="{{ img_url('cop/guide/img22.gif') }}"><img src="{{ img_url('cop/guide/img22.gif') }}"><img src="{{ img_url('cop/guide/img22.gif') }}"><img src="{{ img_url('cop/guide/img22.gif') }}">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <p>순경~경사 계급장은 하단부 태극장 위에 2개의 무궁화잎으로 싸여있는 무궁화 봉우리의 수(2개~4개)로 구분하고 있습니다. <br>하단부의 태극장은 만물의 근원으로서 '大韓民國과 國民'을 상징하고 꽃잎으로 쌓여있는 무궁화 봉오리는 곧 무궁화 꽃으로 피어날 수 있는 '希望과 可能性'을 표현한것으로 치안 최일선에서 국민의 생명과 재산을 보호하는 경찰 기본 임무를 성실히 수행하면서도 끊임없는 노력을 통해 무궁화 꽃으로 활짝피어날수 있는 희망과 가능성을 지닌 경찰관을 의미합니다. </p>
                                            
                                        </div>
                                    </div>
                                    <!-- //list -->	
                                    <div class="toggleContList">
                                        <h5 class="tTitle">경위~총경의 역할</h5>
                                        <div class="tContWp">
                                            <table class="basicTb mgB1">
                                                <colgroup>
                                                    <col width="10%">
                                                    <col width="120px">
                                                    <col width="*">
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th>계급별</th>
                                                        <th>형태</th>
                                                        <th>업무</th>
                                                    </tr>
                                                </thead>
                                                <tbody><tr>
                                                    <th>경위</th>
                                                    <td class="agC">
                                                    <img src="{{ img_url('cop/guide/img23.gif') }}">
                                                    </td>
                                                    <td class="txtL">지구대 사무소장, 특수파출소장, 경찰서 계장급, 경찰청·지방청 실무자 </td>
                                                </tr>
                                                <tr>
                                                    <th>경감</th>
                                                    <td class="agC">
                                                    <img src="{{ img_url('cop/guide/img23.gif') }}"><img src="{{ img_url('cop/guide/img23.gif') }}">
                                                    </td>
                                                    <td class="txtL">"警監"은 '지구대장, 경찰서 주요계장 (형사, 정보2 등), 경찰청·지방청 반장'급 </td>
                                                </tr>
                                                <tr>
                                                    <th>경정</th>
                                                    <td class="agC">
                                                    <img src="{{ img_url('cop/guide/img23.gif') }}"><img src="{{ img_url('cop/guide/img23.gif') }}"><img src="{{ img_url('cop/guide/img23.gif') }}">
                                                    </td>
                                                    <td class="txtL">"警正"은 '경찰서 과장, 경찰청·지방청 계장' 급 </td>
                                                </tr>
                                                <tr>
                                                    <th>총경</th>
                                                    <td class="agC">
                                                    <img src="{{ img_url('cop/guide/img23.gif') }}"><img src="{{ img_url('cop/guide/img23.gif') }}"><img src="{{ img_url('cop/guide/img23.gif') }}"><img src="{{ img_url('cop/guide/img23.gif') }}">
                                                    </td>
                                                    <td class="txtL">"總警"은 '경찰서장, 경찰청·지방청 과장' 급으로 근무</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p>경위~총경 계급장은 중앙에 태극장을 배치한 무궁화의 수(1개~4개)로 구분하고 있습니다.<br>중앙의 태극장은 만물의 근원으로서 '大韓民國과 國民'을 상징하고, 이를 감싸고 있는 무궁화는 조직내에서 가장 중추적인 위치에 있는 "중견경찰간부"를 의미하는 것으로 경찰조직의 중간 위치에서 국가를 수호하고 국민에게 봉사하는 경찰임무를 가장 능동적.활동적으로 수행하면서 경찰조직의 중심적인 역할을 하고 있는 경찰을 의미합니다. </p>
                                            
                                        </div>
                                    </div>
                                    <!-- //list -->	
                                    <div class="toggleContList">
                                        <h5 class="tTitle">경무관-치안총감의 역할</h5>
                                        <div class="tContWp">
                                            <table class="basicTb mgB1">
                                                <colgroup>
                                                    <col width="10%">
                                                    <col width="130px">
                                                    <col width="*">
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th>계급별</th>
                                                        <th>형태</th>
                                                        <th>업무</th>
                                                    </tr>
                                                </thead>
                                                <tbody><tr>
                                                    <th>경무관</th>
                                                    <td class="agC">
                                                    <img src="{{ img_url('cop/guide/img24.gif') }}">
                                                    </td>
                                                    <td class="txtL">지방청차장, 서울·경기지방청부장, 경찰청 심의관 급 </td>
                                                </tr>
                                                <tr>
                                                    <th>치안감</th>
                                                    <td class="agC">
                                                    <img src="{{ img_url('cop/guide/img24.gif') }}"><img src="{{ img_url('cop/guide/img24.gif') }}">
                                                    </td>
                                                    <td class="txtL">지방경찰청장, 경찰종합학교장, 중앙경찰학교장, 경찰청 국장 급</td>
                                                </tr>
                                                <tr>
                                                    <th>치안정감</th>
                                                    <td class="agC">
                                                    <img src="{{ img_url('cop/guide/img24.gif') }}"><img src="{{ img_url('cop/guide/img24.gif') }}"><img src="{{ img_url('cop/guide/img24.gif') }}">
                                                    </td>
                                                    <td class="txtL">찰청 차장, 서울·경기지방경찰청장, 경찰대학장 급</td>
                                                </tr>
                                                <tr>
                                                    <th>치안총감</th>
                                                    <td class="agC">
                                                    <img src="{{ img_url('cop/guide/img24.gif') }}"><img src="{{ img_url('cop/guide/img24.gif') }}"><img src="{{ img_url('cop/guide/img24.gif') }}"><img src="{{ img_url('cop/guide/img24.gif') }}">
                                                    </td>
                                                    <td class="txtL">경찰의 총수인 경찰청장</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p>경무관~치안총감의 계급장은 중앙에 태극장을 배치한 무궁화? 둘레에 같은 무궁화 5개를 5각으로 연결한 태극무궁화의 수(1개~4개)로 구분하고 있습니다.<br>
                                        태극무궁화의 중앙에 있는 태극장은 만물의 근원으로서 '大韓民國과 國民'을 상징하고 이를 감싸고 있는 5개의무궁화는 5각으로 배치되어 하나의 큰 모양의 무궁화로 승화된것으로 경찰조직의 최상위 계급을 표현하고 있습니다. 태극무궁화의 오각은 '忠,信,勇,義,仁' 다섯가지의 경찰이 지향하는 가치개념을 의미하여 이를 바탕으로 위로는국가와 국민을 받들고, 아래로는 경찰조직을 이끌어 나가는 경찰의 수뇌부를 의미합니다. </p>
                                            
                                        </div>
                                    </div>
                                    <!-- //list -->			            	 
                                </div>
                                <!-- // toggle  -->	

                                <h4 class="hTy4">경찰서의 조직</h4>
                                <!-- toggle -->
                                <div class="toggleCont">
                                    <div class="toggleContList">
                                        <h5 class="tTitle">경찰서의 조직</h5>
                                        <div class="tContWp">				            		
                                            <p class="agC"><img src="{{ img_url('cop/guide/img25.png') }}" class="police" alt="경찰서 조직도"></p>
                                        </div>
                                    </div>
                                    <!-- //list -->				            		            	 
                                </div>
                                <!-- // toggle  -->	

                            </div>
                        </div>
                        <div id="cop_guide2" class="tabContent">
                            <div class="examInfoGu1 mgTop">
                                <h4 class="hTy4">응시자격요건</h4>
                                <!-- toggle -->
                                <div class="toggleCont">
                                    <div class="toggleContList">
                                        <h5 class="tTitle">응시자격요건</h5>
                                        <div class="tContWp">
                                            <table class="basicTb">
                                                <colgroup>
                                                    <col width="10%">
                                                    <col width="40px">
                                                    <col width="*">
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">구분</th>
                                                        <th>응시자격요건</th>
                                                    </tr>
                                                </thead>
                                                <tbody><tr>
                                                    <th colspan="2" rowspan="3">연령</th>
                                                    <td class="txtL">일반공채 : 18세이상~40세이하</td>
                                                </tr>
                                                <tr>
                                                    <td class="txtL">※ 제대군인은 군복무기간 1년미만은 1세, 1년이상 2년미만은 2세</td>
                                                </tr>
                                                <tr>
                                                    <td class="txtL">2년 이상은 3세씩 상한 응시연령 연장</td>
                                                </tr>
                                                <tr>
                                                <th colspan="2" rowspan="2">학력</th>
                                                <td class="txtL">일반공채 : 학력제한 없음</td>
                                            </tr>
                                                <tr>
                                                    <td class="txtL">
                                                        경행특채 : 2년제 이상 대학의 경찰행정 관련 학과 졸업자 또는<br>
                                                        4년제 대학의 경찰행정관련 학과 재학중이거나 휴학중인 <br>
                                                        사람으로서 경찰행정학전공 이수로 인정될 수 있는 과목을 <br>
                                                        45학점 이상 이수한자
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">병역</th>
                                                    <td class="txtL">남자는 병역을 필하였거나 면제된 자</td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="5">신체조건</th>
                                                    <td>체격</td>
                                                    <td class="txtL">
                                                        국· 공립병원 또는 종합병원에서 실시한 경찰공무원채용신체검사 및 약물검사 결과 건강상태가 양호하고 사지가<br>
                                                        완전하며 가슴·배·입·구강·내장의 질환이 없어야 함<br>
                                                        (101 경비단 : 신장 170cm이상 / 체중 60kg이상 / 흉위 신장의 1/2이상)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>시력</td>
                                                    <td class="txtL">
                                                        좌· 우 각각 0.8 이상(교정시력포함)<br>
                                                        (101 경비단 : 좌.우 각각 1.0이상(교정시력불가)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>색신</td>
                                                    <td class="txtL">
                                                        색신이상이 아니어야 함. 단, 종합병원· 국공립병원의 검사결과 약도색신이상으로 판정된 경우 응시자격 인정<br>
                                                        (101 경비단 : 색맹,색약,사시가 아닌자)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>청력</td>
                                                    <td class="txtL">
                                                        청력이 정상(40dB이하)이어야 함
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>혈압</td>
                                                    <td class="txtL">
                                                        고혈압· 저혈압이 아니어야 함(확장기 : 90&shy;60mmHg, 수축기 : 145&shy;90mmHg)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">운전면허</th>
                                                    <td class="txtL">
                                                        운전면허 1종 보통이상을 소지하여야 함
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                            
                                        </div>
                                    </div>
                                    <!-- //list -->				            		            	 
                                </div>
                                <!-- // toggle  -->	

                                <h4 class="hTy4">원서접수</h4>
                                <!-- toggle -->
                                <div class="toggleCont">
                                    <div class="toggleContList">
                                        <h5 class="tTitle">원서접수 방법은</h5>
                                        <div class="tContWp" style="display: none;">
                                            <p class="tit1">응시자 구비서류</p>
                                            <ul>
                                                <li>(1)경찰청 인터넷 원서접수 사이트(http://gosi.police.go.kr)에서 접수</li>
                                                <li>(2)접수시 최근 3개월 이내에 촬영한 상반신 칼라사진(3cm×4cm)을 업로드</li>
                                                <li>(3)수험표(응시번호 포함)는 인터넷 원서접수 사이트에서 출력 가능하며 칼라로 출력하셔야 합니다.</li>
                                                <li>(4)원서 수정은 원서접수 기간 내에만 가능합니다.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- //list -->				            		            	 
                                </div>
                                <!-- // toggle  -->	

                                <h4 class="hTy4">필기시험 과목</h4>
                                <!-- toggle -->
                                <div class="toggleCont">
                                    <div class="toggleContList">
                                        <h5 class="tTitle">필기시험 과목</h5>
                                        <div class="tContWp" style="display: none;">
                                            <table class="basicTb">
                                                    <colgroup>
                                                        <col width="15%">
                                                        <col width="*">
                                                    </colgroup>
                                                    <thead>
                                                        <tr>
                                                            <th>구분</th>
                                                            <th>과목</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody><tr>
                                                        <th>일반공채</th>
                                                        <td class="txtL"><ul>
                                                        <li>필수과목 : 한국사, 영어
                                                        </li>
                                                        <li> 선택과목 : 형법, 형사소송법, 경찰학개론, 국어, 사회, 수학, 과학</li>
                                                        </ul>													      </td>
                                                    </tr>
                                                    <tr>
                                                        <th>경행특채</th>
                                                        <td class="txtL">경찰학개론, 수사Ⅰ, 행정법, 형법, 형사소송법</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                    </div>
                                    <!-- //list -->				            		            	 
                                </div>
                                <!-- // toggle  -->	

                                <h4 class="hTy4">신체검사 및 체력검사</h4>
                                <!-- toggle -->
                                <div class="toggleCont">
                                    <div class="toggleContList">
                                        <h5 class="tTitle">신체검사</h5>
                                        <div class="tContWp" style="display: none;">
                                            <table class="basicTb">
                                                <colgroup>
                                                    <col width="15%">
                                                    <col width="*">
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th>구분</th>
                                                        <th>남자</th>
                                                    </tr>
                                                </thead>
                                                <tbody><tr>
                                                    <th>체격</th>
                                                    <td class="txtL">
                                                        국립ㆍ공립병원 또는 종합병원에서 실시한 경찰공무원 채용시험 신체검사 및 약물검사의 결과 건강상태가<br>
                                                        양호하고, 사지가 완전하며, 가슴ㆍ배ㆍ입ㆍ구강 및 내장의 질환이 없어야 한다.<br>
                                                        (101 경비단 : 신장 170cm이상 / 체중 60kg이상 / 흉위 신장의 1/2이상) 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>시력</th>
                                                    <td class="txtL">
                                                        시력(교정시력을 포함한다)은 양쪽 눈이 각각 0.8 이상이어야 한다.<br>
                                                        (101 경비단 : 좌.우 각각 1.0이상(교정시력불가)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>색신</th>
                                                    <td class="txtL">
                                                        색신이상(약도 색신이상은 제외한다)이 아니어야 한다.<br>
                                                        (101 경비단 : 색맹,색약,사시가 아닌자)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>청력</th>
                                                    <td class="txtL">
                                                        청력이 정상[좌우 각각 40데시벨(dB) 이하의 소리를 들을 수 있는 경우를 말한다]이어야 한다.
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>혈압</th>
                                                    <td class="txtL">
                                                        고혈압[수축기혈압이 145수은주밀리미터(mmHg)을 초과하거나 확장기혈압이 90수은주밀리미터(mmHg)을<br>
                                                        초과하는 경우를 말한다] 또는 저혈압[수축기혈압이 90수은주밀리미터(mmHg) 미만이거나 확장기혈압이<br>
                                                        60수은주밀리미터(mmHg) 미만인 경우를 말한다]이 아니어야 한다.
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>사시</th>
                                                    <td class="txtL">
                                                        검안기 측정 결과 수평사위 20프리즘 이상이거나 수직사위 10프리즘 이상이 아니어야 한다.<br>
                                                        다만, 안과전문의의 정상 판단을 받은 경우에는 그러하지 아니하다
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>문신</th>
                                                    <td class="txtL">시술동기, 의미 및 크기가 경찰공무원의 명예를 훼손할 수 있다고 판단되는 문신이 없어야 한다.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                            
                                        </div>
                                    </div>
                                    <!-- //list -->	
                                    <div class="toggleContList">
                                        <h5 class="tTitle">체력검사</h5>
                                        <div class="tContWp" style="display: none;">
                                            <table class="basicTb mgB1">
                                                <colgroup>
                                                    <col width="15%">
                                                    <col width="*">
                                                    <col width="6.5%">
                                                    <col width="6.5%">
                                                    <col width="6.5%">
                                                    <col width="6.5%">
                                                    <col width="6.5%">
                                                    <col width="6.5%">
                                                    <col width="6.5%">
                                                    <col width="6.5%">
                                                    <col width="6.5%">
                                                    <col width="6.5%">
                                                    <col width="6.5%">
                                                </colgroup>
                                                <thead>
                                                <tr>
                                                    <th>구분</th>
                                                    <th></th>
                                                    <th>10점</th>
                                                    <th>9점</th>
                                                    <th>8점</th>
                                                    <th>7점</th>
                                                    <th>6점</th>
                                                    <th>5점</th>
                                                    <th>4점</th>
                                                    <th>3점</th>
                                                    <th>2점</th>
                                                    <th>1점</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th rowspan="5">남자</th>
                                                        <td>100m 달리기(초)</td>
                                                        <td>13.0<br>이내</td>
                                                        <td>13.1<br>~13.5</td>
                                                        <td>13.6<br>~14.0</td>
                                                        <td>14.1<br>~14.5</td>
                                                        <td>14.5<br>~15.0</td>
                                                        <td>15.1<br>~15.5</td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td>1,000m 달리기(초)</td>
                                                        <td>230<br>이내</td>
                                                        <td>231<br>~236</td>
                                                        <td>237<br>~242</td>
                                                        <td>243<br>~248</td>
                                                        <td>249<br>~254</td>
                                                        <td>255<br>~260</td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td>윗몸일으키기(회/1분)</td>
                                                        <td>58<br>이상</td>
                                                        <td>57<br>~55</td>
                                                        <td>54<br>~51</td>
                                                        <td>50<br>~46</td>
                                                        <td>45<br>~40</td>
                                                        <td>39<br>~36</td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td>좌우 악력(kg)</td>
                                                        <td>61<br>이상</td>
                                                        <td>60<br>~59</td>
                                                        <td>58<br>~56</td>
                                                        <td>55<br>~54</td>
                                                        <td>53<br>~51</td>
                                                        <td>50<br>~48</td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td>팔굽혀 펴기(회/1분)</td>
                                                            <td>58<br>이상</td>
                                                        <td>57<br>~52</td>
                                                        <td>51<br>~46</td>
                                                        <td>45<br>~40</td>
                                                        <td>39<br>~34</td>
                                                        <td>33<br>~28</td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <th rowspan="5">여자</th>
                                                        <td>100m 달리기(초)</td>
                                                        <td>15.5<br>이내</td>
                                                        <td>15.6<br>~16.3</td>
                                                        <td>16.4<br>~17.1</td>
                                                        <td>17.2<br>~17.9</td>
                                                        <td>18.0<br>~18.7</td>
                                                        <td>18.8<br>~19.4</td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td>1,000m 달리기(초)</td>
                                                        <td>290<br>이내</td>
                                                        <td>291<br>~297</td>
                                                        <td>298<br>~304</td>
                                                        <td>305<br>~311</td>
                                                        <td>312<br>~318</td>
                                                        <td>319<br>~325</td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td>윗몸일으키기(회/1분)</td>
                                                        <td>55<br>이상</td>
                                                        <td>49<br>~45</td>
                                                        <td>44<br>~38</td>
                                                        <td>37<br>~33</td>
                                                        <td>32<br>~28</td>
                                                        <td>27<br>~23</td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td></tr>
                                                    <tr>
                                                        <td>좌우 악력(kg)</td>
                                                        <td>40<br>이상</td>
                                                        <td>39<br>~38</td>
                                                        <td>37<br>~36</td>
                                                        <td>35<br>~34</td>
                                                        <td>33<br>~31</td>
                                                        <td>30<br>~29</td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td></tr>
                                                    <tr>
                                                        <td>팔굽혀 펴기(회/1분)</td>
                                                            <td>50<br>이상</td>
                                                        <td>49<br>~45</td>
                                                        <td>44<br>~40</td>
                                                        <td>39<br>~35</td>
                                                        <td>34<br>~30</td>
                                                        <td>29<br>~26</td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td>
                                                        <td><br></td></tr>
                                                </tbody>
                                            </table>
                                            <div class="ps">
                                                <strong>비고</strong>
                                                <p>1.체력검사의 평가종목 중 한 종목 이상 1점을 받은 경우에는 불합격으로 한다.<br>
                                                    2.체력검사의 평가종목에 대한 구체적인 측정방법은 경찰청장이 정한다.<br>
                                                    3.100m 달리기의 경우에는 측정된 수치 중 소수점 둘째자리 이하는 버리고, 1,000미터 달리기의 경우에는 소수점 첫째자리 이하는 버리며, 좌우 악력의 경우에는 소수점 첫째자리에서 반올림한다.</p>
                                            </div>				            		
                                        </div>
                                    </div>
                                    <!-- //list -->				            		            	 
                                </div>
                                <!-- // toggle  -->	

                                <h4 class="hTy4">적성검사 및 면접시험</h4>
                                <!-- toggle -->
                                <div class="toggleCont">
                                    <div class="toggleContList">
                                        <h5 class="tTitle">적성검사</h5>
                                        <div class="tContWp" style="display: none;">
                                            <p>경찰관으로서의 적성을 종합검정</p>
                                            <p>※ 적성검사 비점수화, 면접자료로 활용</p>
                                        </div>
                                    </div>
                                    <!-- //list -->
                                    <div class="toggleContList">
                                        <h5 class="tTitle">면접시험</h5>
                                        <div class="tContWp" style="display: none;">
                                            <table class="basicTb">
                                                    <colgroup>
                                                        <col width="10%">
                                                        <col width="110px">
                                                        <col width="*">
                                                    </colgroup>
                                                    <thead>
                                                        <tr>
                                                            <th>구분</th>
                                                            <th>면접방식</th>
                                                            <th>면접내용</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody><tr>
                                                        <th>1단계</th>
                                                        <td>집단면접</td>
                                                        <td>의사발표의 정확성ㆍ논리성ㆍ전문지식</td>
                                                    </tr>
                                                    <tr>
                                                        <th>2단계</th>
                                                        <td>개별면접</td>
                                                        <td>품행ㆍ예의ㆍ봉사성ㆍ정직성ㆍ성실성ㆍ발전가능성</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                    </div>
                                    <!-- //list -->					            		            	 
                                </div>
                                <!-- // toggle  -->	

                                <h4 class="hTy4">최종합격자결정</h4>
                                <div class="mgB2">		
                                    <p><strong>필기시험(50%)+체력검사(25%)+면접시험(20%)+가산점(5%)를 합산한 성적의 고득점 순으로 선발예정인원을 최종합격자로 결정</strong></p>
                                    <p>* 단, 경찰특공대 - 체력(45%)+필기(30%)+면접(20%)+가산점(5%)</p>
                                    <p>* 2011년 7월부터 적성검사 비점수화, 면접자료로 활용</p>
                                </div>
                            </div>
                        </div>
                        <div id="cop_guide3" class="tabContent">
                            <div class="examInfoGu1_1 mgTop pb50">          
                                <h4 class="hTy4">가산점안내</h4>
                                <p class="mgB1_1">
                                    자격증 등의 가산점 기준표<br/>
                                    &nbsp; - [관련 근거] 경찰공무원 채용시험 시행규칙 제 15조의 2 제 4항 관련 (2010.7.1)
                                </p>
                                <p class="mgB1"><a href="https://public.jinhakapply.com/PoliceV2/data/testdata_list.aspx?ReturnSite=SC&ServiceID=19&CategoryID=13&CurrentPage=1" target="_blank"><strong>무도 인증단체 현황 다운받기 ></strong></a></p>
                                <table class="basicTb">
                                    <colgroup>
                                        <col style="width: 82px;"/>
                                        <col style="width: 251px;"/>
                                        <col style="width: 251px;"/>
                                        <col style="width: 251px;"/>
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th width="10%" rowspan="2" colspan="2">분 야</th>
                                            <th colspan="3">관련 자격증 및 가산점</th>
                                        </tr>
                                        <tr>
                                            <th>5점</th>
                                            <th>4점</th>
                                            <th>2점</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <tr>
                                        <th colspan="2">학위</th>
                                        <th>박사학위</th>
                                        <th>석사 학위</th>
                                        <th>- </th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">정보처리</th>
                                        <td>- 정보관리기술사<br>
                                        - 전자계산기조직응용기술사</td>
                                        <td>- 정보처리기사<br>
                                        - 전자계산기조직응용기사</td>
                                        <td>- 정보처리산업기사<br>
                                        - 전자계산기산업기사<br>
                                        - 사무자동화산업기사<br>
                                        - 컴퓨터활용능력1 / 2급<br>
                                        - 워드프로세서1급</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">전자<br>
                                        /통신</th>
                                        <td>- 정보통신기술사<br>
                                        - 전자계산기기술사</td>
                                        <td>- 무선설비 / 전파통신 / 전파전자 / 
                                        정보통신 / 전자 / 전자계산기기사<br>
                                        - 통신설비기능장</td>
                                        <td>- 무선설비 / 전파통신 / 전파전자 / 정보통신 / 통신선로 / 전자 / 전자계산기산업기사</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">국어</th>
                                        <td>- 한국실용글쓰기검정 750점 이상<br>
                                        - 한국어능력시험 770점 이상<br>
                                        - 국어능력인증시험 162점 이상</td>
                                        <td>- 한국실용글쓰기검정 630점 이상<br>
                                        - 한국어능력시험 670점 이상<br>
                                        - 국어능력인증시험 147점 이상</td>
                                        <td>- 한국실용글쓰기검정 550점 이상<br>
                                        - 한국어능력시험 570점 이상<br>
                                        - 국어능력인증시험 130점 이상</td>
                                    </tr>
                                    <tr>
                                        <th rowspan="3">외국어</th>
                                        <td class="agC">영어</td>
                                        <td>- TOEIC 900 이상<br>
                                        - TEPS 850 이상<br>
                                        - IBT 102 이상 <br>
                                        - PBT 608 이상<br>
                                        - TOSEL(advanced) 880 이상<br>
                                        - FLEX 790 이상<br>
                                        - PELT(main) 446 이상</td>
                                        <td>- TOEIC 800 이상<br>
                                        - TEPS 720 이상<br>
                                        - IBT 88 이상<br>
                                        - PBT 570 이상<br>
                                        - TOSEL(advanced) 780 이상<br>
                                        - FLEX 714 이상<br>
                                        - PELT(main) 304 이상</td>
                                        <td>- TOEIC 600 이상<br>
                                        - TEPS 500 이상<br>
                                        - IBT 57 이상<br>
                                        - PBT 489 이상<br>
                                        - TOSEL(advanced) 580 이상<br>
                                        - FLEX 480 이상<br>
                                        - PELT(main) 242 이상</td>
                                    </tr>
                                    <tr>
                                        <th>일어</th>
                                        <td>- JLPT 1급(N1)<br>
                                        - JPT 850 이상</td>
                                        <td>- JLPT 2급(N2)<br>
                                        - JPT 650 이상</td>
                                        <td>- JLPT 3급(N3, N4)<br>
                                        - JPT 550 이상</td>
                                    </tr>
                                    <tr>
                                        <th>중국어</th>
                                        <td>- HSK 9급이상 (新 HSK 6급)</td>
                                        <td>- HSK 8급 (新 HSK 5급- 210점 이상)</td>
                                        <td>- HSK 7급 (新 HSK 4급- 195점 이상)</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">노동</th>
                                        <td>- 공인노무사</td>
                                        <td class="agC">- </td>
                                        <td class="agC">- </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">무도</th>
                                        <td class="agC">- </td>
                                        <td>- 무도4단 이상</td>
                                        <td>- 무도2 / 3단</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">부동산</th>
                                        <td>- 감정평가사</td>
                                        <td class="agC">- </td>
                                        <td>-  공인중개사</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">교육</th>
                                        <td>- 청소년상담사 1급</td>
                                        <td>- 정교사 2급 이상<br>
                                        - 청소년지도사 1급<br>
                                        - 청소년상담사 2급</td>
                                        <td>- 청소년지도사 2·3급<br>
                                        - 청소년상담사 3급</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">재난<br>
                                        /안전관리</th>
                                        <td>- 건설안전 / 전기안전 / 소방 / 
                                        가스기술사</td>
                                        <td>- 건설안전 / 산업안전 / 소방설비 / 
                                        가스 / 원자력기사<br>
                                        - 위험물기능장<br>
                                        - 핵연료물질취급감독자면허<br>
                                        - 방사선취급감독자면허<br>
                                        - 경비지도사</td>
                                        <td>- 산업안전 / 건설안전 / 소방설비 / 
                                        가스 / 위험물산업기사<br>
                                        - 1종 대형면허<br>
                                        - 특수면허(트레일러,레커)<br>
                                        - 조종면허(기중기,불도우저)<br>
                                        - 응급구조사<br>
                                        - 핵연료물질취급자면허</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">화약</th>
                                        <td>- 화약류관리기술사</td>
                                        <td>- 화약류제조기사<br>
                                        - 화약류관리기사</td>
                                        <td>- 화약류제조산업기사<br>
                                        - 화약류관리산업기사</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">교통</th>
                                        <td>- 교통기술사<br>
                                        - 도시계획기술사</td>
                                        <td>- 교통기사<br>
                                        - 도시계획기사<br>
                                        - 교통사고분석사<br>
                                        - 도로교통사고감정사</td>
                                        <td>- 교통산업기사</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">토목</th>
                                        <td>- 토목시공기술사<br>
                                        - 토목구조기술사<br>
                                        - 토목품질시험기술사</td>
                                        <td>- 토목기사</td>
                                        <td>- 토목산업기사</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">법무</th>
                                        <td>- 변호사</td>
                                        <td>- 법무사</td>
                                        <td class="agC">- </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">세무회계</th>
                                        <td>- 공인회계사</td>
                                        <td>- 세무사<br>
                                        - 관세사</td>
                                        <td>- 전산세무 1·2급<br>
                                        - 전산회계 1급</td>
                                    </tr>
                                    <tr>
                                        <th rowspan="2" colspan="2">의료</th>
                                        <td>- 의사</td>
                                        <td>- 약사</td>
                                        <td>- 임상병리사, 물리치료사, 방사선사, 
                                        간호사, 의무기록사, 치과기공사</td>
                                    </tr>
                                    <tr>
                                        <td>- 상담심리사 1급</td>
                                        <td>- 정신보건임상심리사 1급<br>
                                        - 임상심리사 1급<br>
                                        - 상담심리사 2급</td>
                                        <td>- 정신보건임상심리사 2급<br>
                                        - 임상심리사 2급<br>
                                        - 작업치료사</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">특허</th>
                                        <td>- 변리사</td>
                                        <td class="agC">- </td>
                                        <td class="agC">- </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">건축</th>
                                        <td>- 건축구조 / 건축기계설비 / 건축시공 / 
                                        건축품질시험기술사</td>
                                        <td>- 건축, 건축설비기사</td>
                                        <td>- 건축 / 건축설비 / 
                                        건축일반시공산업기사</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">전기</th>
                                        <td>- 건축전기설비 / 전기응용기술사</td>
                                        <td>- 전기 / 전기공사기사</td>
                                        <td>- 전기 / 전기기기 / 전기공사산업기사</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">식품위생</th>
                                        <td>- 식품기술사</td>
                                        <td>- 식품기사</td>
                                        <td>- 식품산업기사</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">환경</th>
                                        <td>- 폐기물처리기술사<br>
                                        - 화공기술사<br>
                                        - 수질관리기술사<br>
                                        - 농화학기술사<br>
                                        - 대기관리기술사</td>
                                        <td>- 폐기물처리기사<br>
                                        - 화공기사<br>
                                        - 수질환경기사<br>
                                        - 농화학기사<br>
                                        - 대기환경기사</td>
                                        <td>- 폐기물처리산업기사<br>
                                        - 화공산업기사<br>
                                        - 수질환경산업기사<br>
                                        - 대기환경산업기사</td>
                                    </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                        <div id="cop_guide4" class="tabContent">
                            <div class="examInfoGu1_1 mgTop pb80">          
                                <h4 class="hTy4">필기합격자 제출서류</h4>
                                
                                <p class="hColor1">모든 제출서류는 적성, 신체, 체력 검사 시 제출 함</p>
                                <p class="mgB2">단, 가산점 대상 자격증 사본은 적성검사종료일까지 제출가능</p>

                                <ul class="list mgB2">	
                                    <li><strong>1. 기본증명서</strong> (동사무소발행) - 1부<br>
                                    &nbsp;* 주민번호 13자리가 정확히 표시된 것</li>
                                    <li><strong>2. 가족관계증명서</strong> (동사무소발행-본인명의) - 1부<br>
                                    &nbsp;* 주민번호 13자리가 정확히 표시된 것</li>
                                    <li><a href="http://public.jinhak.com/PoliceV2/public/public_4.aspx" target="_blank"><strong>3. 신원진술서</strong></a>- 4부<br>
                                    &nbsp;* 각 장마다 사진부착, 서명 또는 날인을 반드시 할 것</li>
                                    <li><strong>4. 개인신용정보서</strong>- 2부</li>
                                    <li><strong>5. 고등학교 생활기록부</strong> (검정고시 출신자는 중학교 생활기록부) - 2부<br>
                                    &nbsp;* “人秘” 상태로 제출 (개봉 / 人秘처리가 안된 서류는 반려)</li>
                                    <li><strong>6. 공무원채용신체검사서</strong> (간이약물검사포함) - 1부<br>
                                    &nbsp;* 청력검사결과는 수치로 기재 (합격기준 : 20db 이하)<br>
                                    &nbsp;* 병원장의 “人秘” 상태로 제출 (개봉 / 人秘처리가 안된 서류는 반려)<br>
                                    &nbsp;* 공무원채용신체검사(약물검사 포함)는 2010. 11. 07 이후에 발행된 것부터 유효함</li>
                                    <li><strong>7. 병적증명서</strong> (병적확인용) - 1부<br>
                                    &nbsp;* 현역 복무중인 자는 부대장 발행 전역예정증명서 제출</li>
                                    <li><a href="http://public.jinhak.com/PoliceV2/public/public_4.aspx" target="_blank"><strong>8. 신원조회서</strong></a>- 1부<br>
                                    &nbsp;* 경찰관서에서 우수무지 지문 채취 후 우측상단에 채취 경찰관의 확인 날인</li>
                                    <li><strong>9. 최종학력증명서</strong> (졸업, 휴학, 재학, 제적 포함) - 1부</li>
                                    <li><a href="http://public.jinhak.com/PoliceV2/public/public_4.aspx" target="_blank"><strong>10. 자기소개서</strong></a> - 1부</li>
                                    <li><strong>11. 제출서류 목록표</strong>- 1부</li>
                                    <li><strong>12. 가산점 대상 자격증 사본</strong> - 각1부<br>
                                    &nbsp;*  A4용지 1장에 자격증 1개만 복사 (ex 자격증이 2개이면 A4용지 2장 제출)<br>
                                    &nbsp;* 3.25까지 제출한 것만 인정 단, 외국어분야는 ’09. 4. 22 이후 취득한 성적표만 인정</li>
                                    <li><strong>13. 표창장, 감사장 사본</strong> (해당자에 한함) - 1부<br>
                                    &nbsp;*  중요범인 검거 등을 통해 경찰관서장의 상훈을 수상한 경력이 있는 자</li>
                                    <li><strong>14. 취업보호대상자 증명서</strong> (보훈처장 발행, 해당자에 한함) - 1부<br>
                                    &nbsp;*  중요범인 검거 등을 통해 경찰관서장의 상훈을 수상한 경력이 있는 자</li>
                                </ul>
                                <p>
                                제출서류 매장 하단에 응시번호 및 성명 기재 (例 10123 홍길동)<br>단 인비서류(생활기록부, 신체검사서)는 봉투 겉면에 기재</p>  
                            </div>
                        </div>
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