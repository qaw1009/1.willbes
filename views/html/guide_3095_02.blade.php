@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">고등고시<span class="row-line">|</span></li>
                <li class="subTit">국립외교원</li>
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
            <ul class="st01 mt20">
                <li>일반외교 분야<br>
                    ‣ 제1차시험 : 선택형 필기시험 ‣ 제2차시험 : 논문형 필기시험 ‣ 제3차시험 : 면접시험</li>
                <li>지역외교 분야<br>
                    ‣ 제1차시험 : 선택형 필기시험 ‣ 제2차시험 : 서류전형 ‣ 제3차시험 : 1·2단계 면접시험</li>
            </ul>

            <h4 class="NGR mt20">응시자격</h4>
            <ul class="st01 mt20">
                <li>응시결격사유 등 : 해당 시험의 최종시험 시행예정일(면접시험 최종예정일) 현재를 기준으로 「국가공무원법」 제33조(외무공무원은 「외무 공무원법」
                    제9조)의 결격사유에 해당하거나, 「국가공무원법」 제74조(정년)·「외무공무원법」 제27조(정년)에 해당하는 자 또는 「공무원임용시험령」 등
                    관계법령에 따라 응시자격이 정지된 자는 응시할 수 없습니다.</li>
                <li>응시연령 : 20세 이상(2000. 12. 31. 이전 출생자)</li>
                <li>학력 및 경력<br>
                    ‣ 일반외교 분야 : 제한없음<br>
                    ‣ 지역외교 분야 : 「외무공무원임용령」 제12조제4항 및 별표 2의2에 따라 선발분야별 경력요건 중 1개 이상에 해당하는 사람<br>
                    ※ 지역외교 분야는 경력요건이 없는 경우, 「공무원임용시험령」 별표 3의2에서 정한 외국어능력검정시험의 기준점수 이상을 획득한 자</li>
            </ul>

            <h4 class="NGR mt20">접수시간 및 시험일정</h4>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col>
                        <col width="25%">
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
                            <th colspan="2">구분</th>
                            <th>시험장소 공고일</th>
                            <th>시험일</th>
                            <th>합격자 발표일</th>
                        </tr>
                    <thead>
                    </tbody>
                        <tr>
                            <td rowspan="3">외교관후보자<br />
                            선발시험<br />
                            (일반외교)</td>
                            <td rowspan="3"> 접수기간 : <br />
                            2.4. 09:00~2.6. 21:00<br />
                            (취소마감일 2.9. 21:00)</td>
                            <td colspan="2">제1차시험</td>
                            <td>2.21.</td>
                            <td>2.29.</td>
                            <td>3.31.</td>
                        </tr>
                        <tr>
                            <td colspan="2">제2차시험</td>
                            <td>3.31.</td>
                            <td>6.22.∼6.26.</td>
                            <td>8.7.</td>
                        </tr>
                        <tr>
                            <td colspan="2">제3차시험</td>
                            <td>8.7.</td>
                            <td>8.29.</td>
                            <td>9.9.</td>
                        </tr>
                        <tr>
                            <td rowspan="4">외교관후보자<br />
                            선발시험<br />
                            (지역외교)</td>
                            <td rowspan="4"> 접수기간 : <br />
                            2.4. 09:00~2.6. 21:00<br />
                            (취소마감일 2.9. 21:00)</td>
                            <td colspan="2">제1차시험</td>
                            <td>2.21.</td>
                            <td>2.29.</td>
                            <td>3.31.</td>
                        </tr>
                        <tr>
                            <td colspan="2">제2차시험
                            (서류전형)</td>
                            <td colspan="2">3.31.∼4.9.(서류전형 등록)</td>
                            <td>6.5.</td>
                        </tr>
                        <tr>
                            <td rowspan="2">제3차시험
                            (면접)</td>
                            <td>1단계</td>
                            <td>6.5.</td>
                            <td> 7.18.</td>
                            <td>8.7.</td>
                        </tr>
                        <tr>
                            <td>2단계</td>
                            <td>8.7.</td>
                            <td> 8.29.</td>
                            <td>9.9.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4 class="NGR mt20">영어/한국사/외국어능력검정시험 성적표 제출</h4>
            <h5 class="NGR">가. 영어능력검정시험</h5>
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
                            <th rowspan="2">시험명</th>
                            <th colspan="2">TOEFL</th>
                            <th rowspan="2">TOEIC</th>
                            <th rowspan="2">TEPS<br />
                            ('18.5.12. 전 시험)</th>
                            <th rowspan="2">TEPS<br />
                            ('18.5.12. 이후 시험)</th>
                            <th rowspan="2">G-TELP</th>
                            <th rowspan="2">FLEX</th>
                        </tr>
                        <tr>
                            <th>PBT</th>
                            <th>IBT</th>
                        </tr>
                        <tr>
                            <td>외교관후보자 선발시험</td>
                            <td>590</td>
                            <td>97</td>
                            <td>870</td>
                            <td>800</td>
                            <td>452</td>
                            <td>88(level 2)</td>
                            <td>800</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <ul class="st01 mt10">
                <li>인정범위 : 2017. 1. 1. 이후 국내에서 실시된 시험으로서, 제1차시험 시행예정일 전날까지 점수(등급)가 발표된 시험으로 한정하며 기준점수 이상으로 확인된 시험만 인정됩니다.<br>
                    ※ 청각장애 응시자의 경우 별도 기준이 적용되며, 기준점수 등 구체적인 내용은 「2020년도 국가공무원 공개경쟁채용시험 등 계획 공고」를 확인하시기 바랍니다.</li>
            </ul>

            <h5 class="NGR mt20">나. 한국사능력검정시험</h5>
            <ul class="st01">
                <li>기준점수(등급) : 한국사능력검정시험(국사편찬위원회) 2급 이상</li>
                <li>인정범위 : 2016. 1. 1. 이후 실시된 시험으로서, 제1차시험 시행예정일 전날까지 점수(등급)가 발표된 시험으로 한정하 며 기준점수 이상으로 확인된 시험만 인정됩니다.</li>
            </ul>

            <h5 class="NGR mt20">다. 외국어능력검정시험</h5>
            <ul class="st01">
                <li>대상시험 및 기준점수 : 「2020년도 국가공무원 공개경쟁채용시험 등 계획 공고」 참조</li>
                <li>인정범위 : 2017. 1. 1. 이후 실시된 시험으로서, 제1차시험 시행예정일 전날까지 점수(등급)가 발표된 시험으로 한정하며 기준점수 이상으로 확인된 시험만 인정됩니다.<br>
                    ※ 청각장애 응시자의 경우 별도 기준이 적용되며, 기준점수 등 구체적인 내용은 「2020년도 국가공무원 공개경쟁채용시험 등 계획 공고」를 확인하시기 바랍니다. </li>
            </ul>

            <h5 class="NGR">다. 성적제출</h5>
            <ul class="st01">
                <li>응시자는 사전등록 시 또는 응시원서 접수 시에 해당 검정시험의 등록번호, 인증번호, 시험일자 및 점수(등급) 등을 정확히 표기하여야 합니다.</li>
                <li>응시원서 접수 후 제1차시험 시행예정일 전날까지 발표된 성적은 사이버국가고시센터(www.gosi.kr)를 통해 추가등록을 해야 합니다.<br>
                    [2020. 2. 24.(월) ~ 2. 28.(금)]<br>
                    ※ 자체 유효기간이 2년인 시험(TOEIC, TOEFL, TEPS, G-TELP, SNULT, 신HSK, JPT)의 경우, 반드시 유효기간 만료 전 별도 안내하는 기간에
                    사이버국가고시센터(www.gosi.kr)를 통해 사전등록을 해야 합니다. 사전등록을 하지 않고 유효기간이 경과되어 진위여부 확인이 불가능한
                    성적은 인정되지 않으니 유의하시기 바랍니다.
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