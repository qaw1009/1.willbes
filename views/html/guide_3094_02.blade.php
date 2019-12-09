@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">고등고시<span class="row-line">|</span></li>
                <li class="subTit">5급행정(입법고시)</li>
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
            <h4 class="NGR">시험방법</h4>
            <ul class="mt20">
                <li>제1차시험 : 선택형 필기시험</li>
                <li>제2차시험 : 논문형 필기시험 </li>
                <li>제3차시험 : 면접시험</li>
            </ul>
            <h4 class="NGR mt20">2019년도 응시원서 접수기간 및 시험일정</h4>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col>
                        <col width="15%">
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
                            <th>합격자발표일</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th rowspan="3">5급(행정)</th>
                        <td rowspan="3">접수기간 : 2.10 ~ 2.12<br />
                        (취소기간 : 2.10 ~ 2.15)</td>
                        <td>제1차시험</td>
                        <td>3.1</td>
                        <td>3.9</td>
                        <td>4.8</td>
                    </tr>
                    <tr>
                        <td>제2차시험</td>
                        <td>4.8</td>
                        <td>6.22 ~ 6.27</td>
                        <td>9.2</td>
                    </tr>
                    <tr>
                        <td>제3차시험</td>
                        <td>9.2</td>
                        <td>9.21 ~ 9.24</td>
                        <td>10.2</td>
                    </tr>
                    <tr>
                        <th rowspan="3">5급(기술)</th>
                        <td rowspan="3">&quot;</td>
                        <td>제1차시험</td>
                        <td>3.1</td>
                        <td>3.9</td>
                        <td>4.8</td>
                    </tr>
                    <tr>
                        <td>제2차시험</td>
                        <td>4.8</td>
                        <td>7.2 ~ 7.6</td>
                        <td>9.2</td>
                    </tr>
                    <tr>
                        <td>제3차시험</td>
                        <td>9.2</td>
                        <td>9.21 ~ 9.24</td>
                        <td>10.2</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <ul class="st01 mt20">
                <li>시험장소 공고 등 시험시행과 관련된 사항은 사이버국가고시센터(http://gosi.kr)에 공고하며, 시험운영상 합격자 발표일 등은 변경될 수 있습니다. </li>
                <li>시험성적 안내 일정은 사이버국가고시센터(http://gosi.kr)에 게시하며, 시험성적은 본인에 한하여 사이버국가고시센터(http://gosi.kr)에서 확인할 수 있습니다.</li>
            </ul>
            <h4 class="NGR mt20">응시원서 접수</h4>
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
            <div>
                해당 시험의 최종시험 시행예정일 현재를 기준으로 국가공무원법 제33조(외무공무원은 외무공무원법 제9조, 검찰직공무원은 검찰청법 제50조)의 결격사유에 해당하거나, 국가공무원법 제74조(정년)ㆍ외무공무원법 제27조(정년)에 해당하는 자 또는 공무원임용시험령 등 관계법령에 따라 응시자격이 정지된 자는 응시할 수 없습니다. 
            </div>
            <ul class="st01">
                <li><strong>국가공무원법 제33조(결격사유)</strong><br>
                금치산자 또는 한정치산자<br>
                파산선고를 받고 복권되지 아니한 자<br>
                금고 이상의 실형을 선고받고 그 집행이 종료되거나 집행을 받지 아니하기로 확정된 후 5년이 지나지 아니한 자<br>
                금고 이상의 형을 선고받고 그 집행유예 기간이 끝난 날부터 2년이 지나지 아니한 자<br>
                금고 이상의 형의 선고유예를 받은 경우에 그 선고유예 기간 중에 있는 자<br>
                법원의 판결 또는 다른 법률에 따라 자격이 상실되거나 정지된 자<br>
                공무원으로 재직기간 중 직무와 관련하여[형법]제355조 및 제356조에 규정된 죄를 범한 자로서 300만원 이상의 벌금형을 선고받고 그 형이 확정된 후 2년이 지나지 아니한 자<br>
                형법 제 303조 또는 성폭력범죄의 처벌 등에 관한 특례법 제 10조에 규정된 죄를 범한사람으로서 300만원 이상의 벌금형을 선고받고 그 형이 확정된 후 2년이 지나지 아니한 사람<br>
                징계로 파면처분을 받은 때부터 5년이 지나지 아니한 자<br>
                징계로 해임처분을 받은 때부터 3년이 지나지 아니한 자<br>              
                </li>
                <li><strong>외무공무원법 제9조제2항(외무공무원)</strong><br>
                [국가공무원법]제33조 각 호의 어느 하나에 해당하는 사람<br>
                대한민국 국적을 가지지 아니한 사람<br>
                </li>
                <li><strong>검찰청법 제50조제3항(검찰청 직원)</strong><br>
                [국가공무원법]제33조 각 호의 어느 하나에 해당하는 사람<br>
                금고 이상의 형을 선고받은 사람<br>
                </li>
            </ul>
            <h5 class="NGR">나. 응시연령</h5>
            <div class="mb20">20세이상 (1998. 12. 31. 이전 출생자) </div>
            <h5 class="NGR">다. 학력 및 경력</h5>
            <div class="mb20">5급 공채시험(행정ㆍ기술), 외교관후보자 선발시험(일반외교) : 제한없음 </div>
            <h5 class="NGR">라. 전산직 응시에 필요한 자격증 (해당 시험의 면접시험 최종예정일 현재 유효한 것) </h5>
            <div class="mb20">컴퓨터시스템응용기술사, 정보통신기술사, 정보관리기술사, 전자계산기기사, 정보통신기사, 정보처리기사, 전자계산기조직응용기사, 정보보안기사 </div>
            <h5 class="NGR">마. 지역별 구분모집의 거주기간 제한 및 임용안내</h5>
            <ul class="st01">
                <li>응시자는 응시원서에 표기한 응시지역(서울, 부산, 대구, 광주, 대전)에서만 제1차 시험에 응시할 수 있으며, 제2ㆍ3차 시험은 서울ㆍ경기에서만 실시합니다.</li>
                <li>선발예정인원이 10명 이상인 모집단위(5급 공채 지역별 구분모집 분야는 제외)에서지방인재채용목표제를 적용 받고자 하는 자는 응시원서에 지방인재 여부를 표기? 확인하고, 본인의 학력사항을 정확하게 기재하여야 합니다.</li>
                <li>장애인 등 응시자는 본인의 장애유형에 맞는 편의지원을 신청할 수 있으며, 장애유형별편의제공 기준 및 절차, 구비서류 등은 응시원서 접수시 사이버국가고시센터 (http://gosi.kr)에서 반드시 확인하시기 바랍니다.</li>
                <li>접수기간에는 기재사항(응시직렬, 응시지역, 선택과목, 지방인재 여부 등)을 수정할 수있으나, 접수기간이 종료된 후에는 수정할 수 없습니다.</li>
                <li>원서접수 취소자에 한하여 응시수수료를 환불해 드립니다.</li>
                <li>인사혁신처에서 동일 날짜에 시행하는 5급 공채 및 외교관후보자 선발시험에는 복수로원서를 제출할 수 없습니다.</li>
            </ul>
            <h5 class="NGR">바. 복수국적자의 임용제한 </h5>
            <ul class="st01">
                <li>국가공무원법 제26조의3제2항 및 공무원임용령 제4조2항에 따라 복수국적자는 검찰, 교정, 출입국관리및외교등법령에서 규정한 업무 분야에는 임용이 제한될 수 있습니다.<br>
                ※ 외국인의 경우에는 최종시험 시행예정일(면접시험 최종예정일)까지 대한민국 국적을 취득하여야 합니다.
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