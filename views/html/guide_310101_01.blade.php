@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">실무자격증<span class="row-line">|</span></li>
                <li class="subTit">소프트웨어자산관리사</li>
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
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">시험안내</h3>
            <h4 class="NGR">자격명 : 소프트웨어자산관리사</h4>
            <h5 class="NGR mt20">가. 시험일정</h5>
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
                            <th>회차</th>
                            <th>등급</th>
                            <th>접수</th>
                            <th>수험표공고</th>
                            <th>시험일</th>
                            <th>합격자발표</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>10 회 </th>
                            <td>2급 (국가공인) </td>
                            <td>03.19~04.12 </td>
                            <td> 04.17 </td>
                            <td> 04.21 </td>
                            <td>05.03 </td>
                        </tr>
                        <tr>
                            <th>11 회 </th>
                            <td>2급 (국가공인) </td>
                            <td>06.04~06.28 </td>
                            <td> 07.03 </td>
                            <td> 07.07 </td>
                            <td>07.19 </td>
                        </tr>
                        <tr>
                            <th>12 회 </th>
                            <td>2급 (국가공인) </td>
                            <td>10.01~10.25 </td>
                            <td> 10.30 </td>
                            <td> 11.03 </td>
                            <td>11.15 </td>
                        </tr>
                        <tr>
                            <th>35 회 </th>
                            <td>1급 </td>
                            <td>06.04~06.29 </td>
                            <td> 07.03 </td>
                            <td> 07.07 </td>
                            <td>07.19 </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt20">
                일정은 시행처의 사정에 따라 변경될 수 있으니, 정확한 일정은 시행처 홈페이지에서 꼭 확인 부탁드립니다.<br>
                <br>
                <strong>시험시간 및 시험장 안내</strong><br>
                [시험시간] <br>
                - 2급 : 10:00 ~ 11:20 - 1급 : 10:00 ~ 15:20<br>
                [시험장소]<br>
                · 서울 : 성수중학교 (서울시 성동구 서울숲길 18) <br>
                · 대전 : 우송정보대학교[동캠퍼스] (대전광역시 동구 백룡로 59) <br>
                · 부산 : 경성대학교(부산광역시 남구 수영로 309) <br>
                ※ 시험장소는 시험장 사정 및 원활한 시험운영을 위하여 변경될 수 있습니다. <br>
                [문의] 한국소프트웨어저작권협회 자격운영팀 ☎ 070-7709-3726, c-sam@spc.or.kr <br>
            </div>
            <h5 class="NGR mt20">나. 응시대상</h5>
            <ul class="st01">
                <li>기업 내 소프트웨어 자산을 운영하고 관리하는 실무자</li>
                <li>IT/전산 분야 대학생 및 취업준비생</li>
                <li>업무능력을 향상하고자 하는 IT/전산관리자 및 총무/구매담당자</li>
                <li>소프트웨어 등 무형의 지식재산으로 인한 기업 리스트를 관리하는 CTO, CIO 책임자</li>
                <li>1인 창조 및 벤처기업, 창업희망자</li>
            </ul>
            <h5 class="NGR mt20">다. 응시자격 및 응시료</h5>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead>                    
                        <tr>
                            <th>급수</th>
                            <th>응시자격</th>
                            <th>응시료</th>
                        </tr>
                    </thead>

                        <tr>
                            <th>2급(국가공인)</th>
                            <td>- 응시자격 제한 없음</td>
                            <td>5 만원</td>
                        </tr>
                        <tr>
                            <th>1급</th>
                            <td>- 소프트웨어자산관리사 2급 취득 후 2년 이상 실무경력자<br />
                            - 대학교(4년제) 졸업자로서 관련 분야 경력 2년 이상인 자<br />
                            - 대학교(2년제) 졸업자로서 관련 분야 경력 4년 이상인 자</td>
                            <td>10 만원</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <ul class="st01 mt20">
                <li>1급 응시생은 응시자격을 증명할 수 있는 자료를 시험당일 시험실 감독위원에게 반드시 제출해야 합니다.</li>
                <li>응시자격 부적합자일 경우 자격의 합격여부와 상관없이 자동 불합격 처리됩니다.</li>
                <li>증빙서류 제출방법<Br>
                    [오프라인] 시험당일 고사실 감독위원에게 제출<Br>
                    [온 라 인 ] 합격자 발표일 7일 이전까지 이메일발송(c-sam@spc.or.kr)<Br>
                    수험생정보(성명, 수험번호) 기재, 증빙서류 이미지 파일 첨부
                </li>
            </ul>
            <h5 class="NGR mt20">라. 검정방법 및 합격기준</h5>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col>
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead>                    
                        <tr>
                            <th>급수</th>
                            <th>검정방법</th>
                            <th>문항수</th>
                            <th>시험시간</th>
                            <th>합격기준</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>2급(국가공인)</th>
                            <td>객관식</td>
                            <td>80</td>
                            <td>80분</td>
                            <td rowspan="2">100점 기준 60점 이상<br />
                            (단, 과목별 40점 미만은 과락)</td>
                        </tr>
                        <tr>
                            <th rowspan="2">1급</th>
                            <td>객관식</td>
                            <td>100</td>
                            <td>100분</td>
                        </tr>
                        <tr>
                            <td>주관식</td>
                            <td>10</td>
                            <td>80분</td>
                            <td>100점 기준 60점 이상 </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h5 class="NGR mt20">마. 출제 기준</h5>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col>
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead>                    
                        <tr>
                            <th>급수</th>
                            <th>과목</th>
                            <th>주요항목</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="4">1,  2급 공통</th>
                            <th>SW일반</th>
                            <td>1. SW개론 <br />
                            2. SW의 역할 및 투자동향</td>
                        </tr>
                        <tr>
                            <th>SW라이선스</th>
                            <td>1. SW 라이선스 이해<br />
                            2. SW 라이선스 제도 및 정책 <br />
                            3. SW 침해와 방지</td>
                        </tr>
                        <tr>
                            <th>SW관련법</th>
                            <td>1. 지식재산권법<br />
                            2. 저작권의 보호와 이용<br />
                            3. 저작권 보호의 한계<br />
                            4. 저작권의 침해와 구제<br />
                            5. 컴퓨터 프로그램 보호를 위한 특칙</td>
                        </tr>
                        <tr>
                            <th>SW자산관리</th>
                            <td>1. SW 자산관리 일반<br />
                            2. SW 자산관리 프로세스<br />
                            3. SW 자산관리</td>
                        </tr>
                        <tr>
                            <th>1급</th>
                            <th>SW감사</th>
                            <td>1. SW 감사<br />
                            2. 자산관리 통제 활동<br />
                            3. 자산 평가<br />
                            4. SW 자산관리 도구</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt20">
                [문의] 한국소프트웨어저작권협회 자격운영팀 ☎ 070-7709-3726, c-sam@spc.or.kr 
            </div>
        </div>      
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop