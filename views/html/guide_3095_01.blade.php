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
            <span class="depth-Arrow">></span><strong>선발예정인원 및 과목</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">선발예정인원 및 과목</h3>
            <h4 class="NGR">2019년 국립외교원 선발예정인원 및 시험</h4>
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
                    </colgroup>
                    <tr>
                        <th rowspan="3" colspan="2">선발분야</th>
                        <th rowspan="3">선발예정인원</th>
                        <th colspan="4">시험과목</th>
                    </tr>
                    <tr>
                        <th colspan="2">제1차 시험</th>
                        <th colspan="2">제2차 시험</th>
                    </tr>
                    <tr>
                        <th>필수</th>
                        <th>선택</th>
                        <th>전공평가</th>
                        <th>통합논술</th>
                    </tr>
                    <tr>
                        <td colspan="2">일반외교</td>
                        <td>32</td>
                        <td>언어논리영역, <br />
                        자료해석영역,<br />
                        상황판단영역,<br />
                        영어(영어능력검정시험으로 대체),<br />
                        한국사(한국사능력검정시험으로 대체)</td>
                        <td>독어, 불어, 러시아어, <br />중국어, 일어, 스페인어 중 1과목<br />
                        (외국어능력검정시험으로 대체)</td>
                        <td>국제정치학, <br />
                        국제법, <br />
                        경제학</td>
                        <td>학제통합논술시험Ⅰ,<br />
                        학제통합논술시험Ⅱ</td>
                    </tr>
                    <tr>
                        <td rowspan="4">지역<br />
                        외교</td>
                        <td>중동</td>
                        <td>2</td>
                        <td>〃</td>
                        <td>아랍어<br />
                        (어학검증시험으로 대체)</td>
                        <td rowspan="4">없음</td>
                        <td rowspan="4">학제통합논술시험Ⅰ,<br />
                        학제통합논술시험Ⅱ</td>
                    </tr>
                    <tr>
                        <td>아프리카</td>
                        <td>1</td>
                        <td>〃</td>
                        <td>불어<br />
                        (외국어능력검정시험으로 대체)</td>
                    </tr>
                    <tr>
                        <td>중남미</td>
                        <td>1</td>
                        <td>〃</td>
                        <td>스페인어<br />
                        (외국어능력 검정시험으로 대체)</td>
                    </tr>
                    <tr>
                        <td>러시아/CIS</td>
                        <td>2</td>
                        <td>〃</td>
                        <td>러시아어<br />
                        (외국어능력검정시험으로 대체)</td>
                    </tr>
                    <tr>
                        <td>외교<br />
                        전문</td>
                        <td><p>경제/다자외교</p></td>
                        <td>2</td>
                        <td>〃</td>
                        <td>없음</td>
                        <td>없음</td>
                        <td>없음</td>
                    </tr>
                </table>
            </div>
            <ul class="st01 mt20">
                <li>제1차 필기시험(선택형)의 헌법과목에서 100점 만점(25문항)에 60점 이상을 득점하지 못하면 불합격 처리됩니다. (제1차시험 합격선 결정 시 헌법과목 점수는 합산하지 않음)</li>
                <li>지방행정론에 도시행정, 교정학에 형사정책 및 행형학, 경제학에 국제경제학, 국제법에 국제경제법, 국제정치학에 외교사 및 군축 안보분야, 회계학에 정부회계가 포함됩니다.</li>
                <li>외교관후보자 선발시험(일반외교)의 학제통합논술시험은 국제정치학, 국제법 및 경제학의 범위 내에서 출제됩니다. </li>
                <li>인사·조직론은 인사행정론 및 조직론에서 출제되며, 만점은 다른 필수과목 만점의 50%입니다. </li>
                <li>방재안전 직류의 재난관리론은 자연재난, 사회재난(인적재난 포함), 위기관리 범위에서, 안전관리론은 안전관리제도, 안전윤리 및 심리(취약계층안전 포함), 분야별 안전(교통, 시설, 생활, 소방, 식품, 테러대비 등)에서 출제되며, 도시계획은 시설직렬의 도시계획 출제범위에 도시방재학이 포함됩니다.</li>
                <li>5급 공채시험(행정)의 제2차시험은 법률과목(국제법 제외)에 한하여 법전이 배부되고, 5급 공채 시험(기술) 및 외교관후보자 선발시험(일반외교)의 제2차시험은 법전이 배부되지 않습니다.</li>
                <li>5급공채시험(기술)의 제2차시험은 직류와 상관없이 시험장에 계산기를 지참하시기 바라며, 계산기 사용여부는 시험 당일 오전 교육시간에 안내합니다. </li>
                <li>외교관후보자(지역외교·외교전문)의 인력은 2021년부터 5등급 외무공무원 경력경쟁 채용시험 등으로 선발할 예정입니다.</li>
            </ul>
            <h4 class="NGR mt20">지역별 구분 모집표</h4>
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
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead>
                        <tr>
                            <th>직렬(직류)</th>
                            <th>계</th>
                            <th>서울</th>
                            <th>부산</th>
                            <th>대구</th>
                            <th>인천</th>
                            <th>광주</th>
                            <th>대전</th>
                            <th>울산</th>
                            <th>세종</th>
                            <th>경기</th>
                        </tr>
                        <tr>
                            <th>계</th>
                            <th>42</th>
                            <th>9</th>
                            <th>2</th>
                            <th>2</th>
                            <th>3</th>
                            <th>3</th>
                            <th>2</th>
                            <th>-</th>
                            <th>2</th>
                            <th>2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>행정직
                            (일반행정)</th>
                            <td>32</td>
                            <td>5</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>-</td>
                            <td>1</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <th>행정직
                            (사회복지)</th>
                            <td>1</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>공업직
                            (화공)</th>
                            <td>1</td>
                            <td>1</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>농업직
                            (일반농업)</th>
                            <td>1</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>임업직
                            (산림자원)</th>
                            <td>1</td>
                            <td>1</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>환경직
                            (일반환경)</th>
                            <td>1</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>1</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>시설직
                            (일반토목)</th>
                            <td>3</td>
                            <td>1</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>1</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>시설직
                            (건축)</th>
                            <td>2</td>
                            <td>1</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>1</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>      
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop