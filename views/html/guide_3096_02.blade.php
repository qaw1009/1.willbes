@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">고등고시<span class="row-line">|</span></li>
                <li class="subTit">PSAT</li>
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
            <span class="depth-Arrow">></span><strong>수험정보</strong>
            <span class="depth-Arrow">></span><strong>시험일정 및 응시자격</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">시험일정 및 응시자격</h3>
            <h4 class="NGR mt20">2019년 5급공채/외교관후보자 1차시험(PSAT)접수기간 및 시험일정</h4>
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
                            <th>시험명</th>
                            <th>접수 및 취소기간</th>
                            <th>구분</th>
                            <th>시험장소 공고일</th>
                            <th>시험일</th>
                            <th>합격자 발표일</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="2">PSAT</td>
                            <td>접수기간 : 2.10 ~ 2.12</td>
                            <td rowspan="2">제1차시험</td>
                            <td rowspan="2">3.1</td>
                            <td rowspan="2">3.9</td>
                            <td rowspan="2">4.8</td>
                        </tr>
                        <tr>
                            <td>(취소마감일 2.10~2.15)</td>
                        </tr>
                    </tbody>
                    </table>
            </div>
            <div class="mt10 tx-blue">
                ※ 시험장소 공고 등 시험시행과 관련된 사항은 사이버국가고시센터(http://gosi.kr)에만 공고하며, 합격자 명단은 합격자 발표일에 게시합니다.<Br>
                ※ 시험성적 안내 일정은 사이버국가고시센터(http://gosi.kr)에 게시하며, 시험성적은 본인에 한하여 사이버국가고시센터(http://gosi.kr)에서 확인할 수 있습니다.
            </div>

            <h4 class="NGR mt20">응시원서접수(인터넷접수만 가능)</h4>
            <h5 class="NGR">가. 접수방법 및 시간</h5>
            <ul class="st01">
                <li>접수방법 : 사이버국가고시센터(www.gosi.kr)에 접속하여 접수할 수 있습니다.</li>
                <li>접수시간 : 2019.2.10.(일) 09:00 ~ 2019.2.12.(화) 24:00 (기간 중 24시간 접수)  </li>
                <li>기 타 : 응시수수료(10,000원) 외에소정의처리비용(휴대폰?카드결제, 계좌이체비용)이소요됩니다. 
                    <div class="tx-blue">※ 저소득층 해당자( 국민기초생활보장법 에 따른 수급자 또는 한부모가족지원법 에 따른 지원대상자)는 응시수수료가 면제됩니다.<br>
                    ※ 응시원서 접수 시 등록용 사진파일(JPG, PNG)이 필요하며 접수 완료 후 변경이 불가합니다. </div>
                </li>
            </ul>
            <h5 class="NGR">나. 원서접수 유의사항 </h5>
            <ul class="st01">
                <li>응시자는 응시원서에 표기한 응시지역(서울, 부산, 대구, 광주, 대전)에서만 제1차 시험에 응시할 수 있으며, 제2ㆍ3차 시험은 서울ㆍ경기에서만 실시합니다.</li>
                <li>지역별 구분모집 응시자는 반드시 아래의 지역모집 단위별 제1차시험 응시지역을 확인하여 표기하여야 하며, 해당 응시지역에서만 제1차시험에 응시할 수 있습니다.
                    <div>
                        <table cellspacing="0" cellpadding="0" class="table-Guided">
                            <colgroup>
                                <col width="15%">
                                <col>
                                <col>
                                <col>
                                <col>
                                <col>  
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>지역별 모집단윈<br />
                                    (근무예정지역)</th>
                                    <th>서울, 인천,
                                    경기, 강원</th>
                                    <th>부산, 울산, 
                                    경남</th>
                                    <th>대구, 경북</th>
                                    <th>광주, 전남, 
                                    전북, 제주</th>
                                    <th>대전, 충남, 
                                    충북</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>제1차시험 응시지역</td>
                                    <td>서울</td>
                                    <td>부산</td>
                                    <td>대구</td>
                                    <td>광주</td>
                                    <td>대전</td>
                                </tr>
                            </tbody>
                            </table>
                    </div>
                </li>
                <li>선발예정인원이 10명 이상인 모집단위(5급 공채 지역별 구분모집 분야는 제외)에서지방인재채용목표제를 적용 받고자 하는 자는 응시원서에 지방인재 여부를 표기? 확인하고, 본인의 학력사항을 정확하게 기재하여야 합니다.</li>
                <li>장애인 등 응시자는 본인의 장애유형에 맞는 편의지원을 신청할 수 있으며, 장애유형별편의제공 기준 및 절차, 구비서류 등은 응시원서 접수시 사이버국가고시센터 (http://gosi.kr)에서 반드시 확인하시기 바랍니다.</li>
                <li>접수기간에는 기재사항(응시직렬, 응시지역, 선택과목, 지방인재 여부 등)을 수정할 수있으나, 접수기간이 종료된 후에는 수정할 수 없습니다.</li>
                <li>원서접수 취소자에 한하여 응시수수료를 환불해 드립니다.</li>
                <li>인사혁신처에서 동일 날짜에 시행하는 5급 공채 및 외교관후보자 선발시험에는 복수로원서를 제출할 수 없습니다.</li>
            </ul>
            <h4 class="NGR mt20">응시자격</h4>
            <h5 class="NGR">가. 응시결격사유 </h5>
            <div class="mb10">
                해당 시험의 최종시험 시행예정일 현재를 기준으로 국가공무원법 제33조(외무공무원은 외무공무원법 제9조, 검찰직공무원은 검찰청법 제50조)의 결격사유에 해당하거나, 
                국가공무원법 제74조(정년)·외무공무원법 제27조(정년)에 해당하는 자 또는 공무원임용시험령 등 관계법령에 따라 응시자격이 정지된 자는 응시할 수 없습니다.
            </div>
            <h5 class="NGR">나. 응시연령</h5>
            <div class="mb20">20세이상 (1999. 12. 31. 이전 출생자) </div>
            <h5 class="NGR">다. 학력 및 경력</h5>
            <ul class="st01">
                <li>5급 공채시험(행정ㆍ기술), 외교관후보자 선발시험(일반외교) : 제한없음</li>
                <li>외교관후보자 선발시험(지역외교ㆍ외교전문) <br>
                - 외무공무원임용령 제12조 제4항 및 별표2의2에 따라 선발분야별로 아래의 경력요건 중 1개 이상에 해당하는 자<br>
                <span class="tx-blue">※ 지역외교 분야는 경력요건이 없는 경우, 공무원임용시험령 별표3의2에서 정한 외국어능력검정시험의 기준점수 이상을 획득한 자(아래 '8. 외국어능력검정시험 성적표 제출' 참조)</span>
                </li>
                <li>관련분야에서 7년 이상 연구ㆍ근무한 경력이 있는 자</li>
                <li>관련분야에서 관리자로 2년 이상 연구ㆍ근무한 경력이 있는 자 </li>
                <li>관련분야 박사학위 소지자</li>
                <li>관련분야 석사학위 소지 후 2년 이상 연구ㆍ근무한 경력이 있는 자</li> 
                <li>5급 상당 이상의 공무원으로서 관련분야에서 2년 이상 근무한 경력이 있는 자</li>
            </ul>
            <div class="tx-blue">※ 선발분야별 경력요건의 관련분야 및 관련학위은 아래와 같습니다. </div>
            <div class="mb10">
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col width="10%">
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <tr>
                        <th colspan="2">선발분야</th>
                        <th>관련분야</th>
                        <th>관련학위</th>
                    </tr>
                    <tr>
                        <td>지역외교</td>
                        <td>중동, 아프리카, 중남미, 러시아ㆍCIS</td>
                        <td>해당 지역과의 외교ㆍ통상ㆍ국제협력<br />
                        분야</td>
                        <td>지역, 국제관계, 해당언어ㆍ지역관련 학과, 통ㆍ번역 등</td>
                    </tr>
                    <tr>
                        <td rowspan="2">외교전문</td>
                        <td rowspan="2">경제/다자외교</td>
                        <td><strong>&lt;경제외교&gt;</strong><br />
                        국제경제, 국제정치경제, 국제통상, 국제무역,국제금융, 에너지 자원 및 환경(지속가능발전ㆍ녹색성장ㆍ기후변화) 등 관련 국제협력 분야</td>
                        <td>경제, 국제경제, 국제정치경제, 금융, 국제금융, 경영, 국제경영, 국제법(국제통상법 또는 국제환경법 포함), 에너지 자원정책, 자원개발, 환경정책, 환경경제, 환경공학, 환경학, 환경경영, 지속가능발전?녹색성장?기후변화 등</td>
                    </tr>
                    <tr>
                        <td><strong>&lt;다자외교&gt;</strong><br />
                        군축, 다자?동북아 안보, 인권, 한반도 평화, UN 및 전문기구, 국제법, 공적개발원조, 대외 무상원조, 인도적 지원, 기타 안보ㆍ인권ㆍ개발 등 관련 국제협력 분야</td>
                        <td>국제정치, 국제관계, 비교정치, 군축, 평화, 국제분쟁 해결, 국제안보, 인간안보, 사이버안보, 인권, 공공정책, 국제법, 개발, 개발경제, 경제* 등 (*연구분야 또는 논문주제가 개발과 관련된 경우)</td>
                    </tr>
                </table>
            </div>
            <div class="tx-blue">※ 외교전문(경제ㆍ다자외교)분야는 상기 경제외교 또는 다자외교 분야의 경력요건을 갖춘 경우에만 지원이 가능합니다.</div>
            <div class="mt10 strong">외교관후보자 선발시험(지역외교·외교전문) 응시요건 기본사항</div>
            <ul class="st01">
                <li>경력의 계산 및 학위 소지 여부는 면접시험 최종일(2018. 9. 1. 예정) 기준으로 판단함</li>
                <li>경력은 법인(외국법인 포함), [비영리민간단체지원법] 제2조의 규정에 의한 민간단체, 국제기구 또는 국제단체에 소속되어 근무하거나 연구를 수행한 경력을 의미함<Br> 
                - 대학조교 경력과 학위취득에 소요되는 학위과정 경력은 제외하되, 국ㆍ공립대학 및 사립대학에서의 강의 또는 연구 경력은 포함됨</li>
                <li>경력요건에 기재된 ‘관리자’는 법인(외국법인 포함), [비영리민간단체지원법] 제2조의 규정에 의한 민간단체, 국제기구 또는 국제단체의 장 또는 부서단위의 책임자(예 : 본부장, 부장, 차장, 과장, 팀장 등)로 전임 근무한 경우에 해당됨<Br> 
                <span class="tx-blue">※ 직위명이 아닌 실질적인 관리자 역할을 수행한 경우에 한하며 이를 소명하지 못하는 경우 경력요건을 충족하지 못한 것으로 판단될 수 있음</span></li>
                <li>경력요건으로 응시하는 경우, 최종경력을 기준으로 시험공고일 현재(2018. 1. 2.) 퇴직 후 3년이 경과되지 아니하여야 함</li>
                <li>경력직 국가 또는 지방공무원이었던 사람에 대해서는 임용예정직급의 바로 하위 직급 또는 이에 상당하는 직급에서 승진소요최저연수를 초과하여 근무한 경우 그 초과근무기간의 2분의 1을 1년의 범위에서 임용예정직급에 해당하는 근무실적으로 합산할 수 있음</li>
                <li>학위의 경우 '관련분야'는 학위논문 또는 전공분야를 기준으로 함</li>
            </ul>
            <h5 class="NGR">라. 전산직 응시에 필요한 자격증 (해당 시험의 면접시험 최종예정일 현재 유효한 것) </h5>
            <div class="mb20">컴퓨터시스템응용기술사, 정보통신기술사, 정보관리기술사, 전자계산기기사, 정보통신기사, 정보처리기사, 전자계산기조직응용기사, 정보보완기사</div>
            <h5 class="NGR">마. 지역별 구분모집의 거주기간 제한 및 임용안내</h5>
            <ul class="st01">
                <li>5급 공채시험(행정ㆍ기술) 중 지역별 구분모집은 2018. 1. 1. 현재, 주민등록상 해당 응시지역(시ㆍ도)에 거주한 기간이 모두 합하여 1년 이상이거나, 본인의 출신학교가 소재한 지역(시ㆍ도)에서만 응시할 수 있습니다.</li>
                <li>5급 공채시험(행정ㆍ기술)의 지역별 구분모집 합격자는 교육훈련을 마친 후 지방공무원법 제27조 제2항 제7호 및 지방공무원임용령 제27조의3 제3항에 따라 해당 지방자치단체의 지방공무원으로 임용됩니다.</li>
            </ul>
            <h5 class="NGR">바. 복수국적자의 임용제한 </h5>
            <ul class="st01">
                <li>국가공무원법 제26조의3제2항 및 공무원임용령 제4조2항에 따라 복수국적자는 검찰, 교정, 출입국관리및외교등법령에서 규정한 업무 분야에는 임용이 제한될 수 있습니다.<br>
                <span class="tx-blue">※ 외국인의 경우에는 최종시험 시행예정일(면접시험 최종예정일)까지 대한민국 국적을 취득하여야 합니다.</span>
                </li>
            </ul>            
        </div>      
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop