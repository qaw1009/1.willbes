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
            <h4 class="NGR">2019년 선발예정인원 및 시험과목</h4>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col width="15%">
                        <col width="15%">
                        <col width="25%">
                        <col width="25%">
                        <col width="20%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th rowspan="2">직렬<br />
                            (직류)</th>
                            <th rowspan="2">선발예정인원<br />
                            (총330명)</th>
                            <th colspan="2">시험과목</th>
                            <th rowspan="2">주요근무<br />
                            예정기관(예시)</th>
                        </tr>                    
                        <tr>
                            <th>제1차 필기시험(선택형)</th>
                            <th>제2차 필기시험(논문형)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>행정직<br />
                            (일반행정)</th>
                            <td>전국 : 118명<br />
                            지역구분 : 32명<br />
                            *지역별 구분모집표참조　　</td>
                            <td>언어논리영역,자료해석영역,상황판단영역,영어(영어능력검정시험으로 대체),한국사(한국사능력검정시험으로 대체),</td>
                            <td>필수(4):행정법, 행정학, 경제학, 정치학선택(1):민법(친족상속법 제외), 정보체계론,조사방법론(통계분석 제외), 정책학, 국제법, 지방행정론　　　</td>
                            <td>전 부처</td>
                        </tr>
                        <tr>
                            <th>행정직<br />
                            (인사조직)</th>
                            <td>2명</td>
                            <td>&ldquo;</td>
                            <td>필수(5):행정법, 행정학, 경제학, 정치학, 인사?조직론</td>
                            <td>인사혁신처,그 밖의 수요부처</td>
                        </tr>
                        <tr>
                            <th>행정직<br />
                            (법무행정)</th>
                            <td>4명</td>
                            <td>&ldquo;</td>
                            <td>필수(4):행정법, 민법(친족상속법제외), 행정학, 민사소송법선택(1):상법, 노동법, 세법, 사회법, 국제법, 경제학</td>
                            <td>공정거래위원회, 국토교통부, 보건복지부,그 밖의 수요부처</td>
                        </tr>
                        <tr>
                            <th>행정직<br />
                            (재경)</th>
                            <td>75명</td>
                            <td>&ldquo;</td>
                            <td>필수(4):경제학, 재정학, 행정법, 행정학선택(1):상법, 회계학, 경영학, 세법, 국제경제학, 통계학　</td>
                            <td>기획재정부, 금융위원회,국세청,그 밖의 수요부처</td>
                        </tr>
                        <tr>
                            <th>행정직<br />
                            (국제통상)</th>
                            <td>10명</td>
                            <td>&ldquo;</td>
                            <td>필수(4):국제법, 국제경제학,행정법,영어선택(1):경제학, 무역학, 재정학, 경영학, 국제정치학, 행정학, 독어, 불어, 러시아어, 중국어, 일어, 스페인어</td>
                            <td>산업통상자원부,과학기술정보통신부, 그 밖의 수요부처</td>
                        </tr>
                        <tr>
                            <th>행정직<br />
                            (교육행정)</th>
                            <td>12명</td>
                            <td>&ldquo;</td>
                            <td>필수(4):교육학, 행정법, 행정학, 경제학선택(1):조사방법론(통계분석    제외), 재정학, 정책학, 교육철학, 교육심리학, 교육사회학</td>
                            <td>교육부</td>
                        </tr>
                        <tr>
                            <th>사회복지직<br />
                            (사회복지)</th>
                            <td>전국 2명<br />
                            지역구분 1명</td>
                            <td>&ldquo;</td>
                            <td>필수(4):형법, 형사소송법, 심리학, 형사정책<br />
                            선택(1):교육학, 사회학, 사회복지학</td>
                            <td>보건복지부</td>
                        </tr>
                        <tr>
                            <th>보호직<br />
                            (보호)</th>
                            <td>3명</td>
                            <td>&ldquo;</td>
                            <td>필수(4):교정학, 형사소송법, 형법, 행정법선택(1):교육학, 사회학, 심리학</td>
                            <td>법무부</td>
                        </tr>
                        <tr>
                            <th>검찰직<br />
                            (검찰)</th>
                            <td>2명</td>
                            <td>&ldquo;</td>
                            <td>필수(4):형법, 형사소송법, 행정법, 교정학선택(1):행정학, 경제학, 노동법, 사회법,민법(친족상속법제외), 회계학, 법의학</td>
                            <td>검찰청</td>
                        </tr>
                        <tr>
                            <th>출입국관리직<br />
                            (출입국관리)</th>
                            <td>2명</td>
                            <td>&ldquo;</td>
                            <td>필수(4):형사소송법, 국제법, 형법, 행정법선택(1):행정학, 정치학, 경제학, 민법(친족상속법 제외), 독어, 불어, 러시아어, 중국어, 일어, 스페인어, 아랍어, 말레이-인도네시아어</td>
                            <td>법무부</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <ul class="mt20">
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