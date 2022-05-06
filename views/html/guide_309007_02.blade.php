@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">전문자격증<span class="row-line">|</span></li>
                <li class="subTit">손해평가사</li>
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
            <span class="depth-Arrow">></span><strong>시험안내</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">시험안내</h3>
            <ul class="guideTab guideTab2ea NGR">
                <li><a href="#tab01" class="on">시험일정</a></li>
                <li><a href="#tab02">자격증 주요내용</a></li>
            </ul>

            <div id="tab01" class="tabCts">
                <h4 class="NGR">시험일정</h4>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>시험일정</th>
                                <th>합격자발표</th>
                            </tr>
                        </thead>
                        </tbody>
                            <tr>
                                <th>22년 1차</th>
                                <td>22.06.04(토)</td>
                                <td>22.07.06(수)</td>
                            </tr>
                            <tr>
                                <th>22년 2차</th>
                                <td>22.09.03(토)</td>
                                <td>22.11.23(수)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="NGR mt20">시험지역 (예정)</h4>
                <ul class="st01">
                    <li>서울 33개 장소</li>
                    <li>부산 27개 장소</li>
                    <li>대구 24개 장소</li>
                    <li>인천 19개 장소</li>
                    <li>광주 27개장소</li>
                    <li>대전 27개장소</li>
                </ul>
            </div>

            <div id="tab02" class="tabCts">
                <h4 class="NGR">시험과목 및 배점</h4>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="10%">
                            <col>
                            <col width="12%">
                            <col width="12%">
                            <col width="12%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>시험과목</th>
                                <th>문항수</th>
                                <th>시험시간</th>
                                <th>시험방법</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1차</th>
                                <td class="tx-left">
                                    1. 상법(보험편)<br>
                                    2. 농어업재해보험법령<br>
                                    3. 농학개론 중 재배학 및 원예작물학
                                </td>
                                <td>과목별<br>25문항<br>(총 75문항)</td>
                                <td>90분</td>
                                <td>객관식<br>4자 선택형</td>
                            </tr>
                            <tr>
                                <th>1차</th>
                                <td class="tx-left">
                                    1. 농작물재해보험 및 가축재해보험의 이론과 실무<br>
                                    2. 농작물재해보험 및 가축재해보험<br>
                                    3. 손해평가의 이론과 실무
                                </td>
                                <td>과목별<br>10문항</td>
                                <td>120분</td>
                                <td>단답형<br>서술형</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="NGR mt20">응시자격</h4>
                <ul class="st01 mt10">
                    <li>연령, 학력 제한 없음</li>
                    <li>당해 연도 및 직전 년도 1차 합격자 1차 시험 면제 2차 재응시</li>
                </ul>

                <h4 class="NGR mt20">합격기준</h4>
                <ul class="st01 mt10">
                    <li>1차 100점 만점 전 과목 평균 60점(과락 40점)</li>
                    <li>2차 100점 만점 전 과목 평균 60점(과락 40점) (계산 문제)</li>
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