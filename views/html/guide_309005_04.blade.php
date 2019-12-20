@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">전문자격증<span class="row-line">|</span></li>
                <li class="subTit">관세사</li>
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
            <span class="depth-Arrow">></span><strong>연간 커리큘럼</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">연간 커리큘럼</h3>
            <h4 class="NGR">관세사 학습로드맵 1차 수험생 : <span>봄기본</span></h4>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col span="11" />
                        <col />
                        <col />
                        <col />
                        <col span="3" />
                        <col />
                    </colgroup>
                    <thead>
                        <tr>
                            <th>4월</th>
                            <th>5월</th>
                            <th>6월</th>
                            <th>7월</th>
                            <th>8월</th>
                            <th>9월</th>
                            <th>10월</th>
                            <th>11월</th>
                            <th>12월</th>
                            <th>1월</th>
                            <th colspan="2">2월</th>
                            <th colspan="2">3월</th>
                            <th>4월</th>
                            <th>5월</th>
                            <th colspan="2">6월</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4">봄 기본이론 종합반</td>
                            <td colspan="4">심화 종합반</td>
                            <td colspan="3">객관식 종합반</td>
                            <td colspan="2">Final 정리반</td>
                            <td>1차 시험</td>
                            <td colspan="3">2차 커리큘럼 진행</td>
                            <td>2차 시험</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h4 class="NGR mt20">관세사 학습로드맨 1차 수험생 : <span>가을기본</span></h4>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col span="11" />
                        <col />
                        <col />
                        <col />
                        <col span="3" />
                        <col />
                    </colgroup>
                    <thead>
                        <tr>
                            <th>4월</th>
                            <th>5월</th>
                            <th>6월</th>
                            <th>7월</th>
                            <th>8월</th>
                            <th>9월</th>
                            <th>10월</th>
                            <th>11월</th>
                            <th>12월</th>
                            <th>1월</th>
                            <th colspan="2">2월</th>
                            <th colspan="2">3월</th>
                            <th>4월</th>
                            <th>5월</th>
                            <th colspan="2">6월</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="3">가을 기본이론 종합반</td>
                            <td colspan="3">객관식 종합반</td>
                            <td colspan="2">Final 정리반</td>
                            <td>1차 시험</td>
                            <td colspan="3">2차 커리큘럼 진행</td>
                            <td>2차 시험</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h4 class="NGR mt20"><span>봄 기본이론 종합반</span> 4월초 ~ 7월말</h4>
            <div>
                - 관세사 시험을 처음 준비하고 동차합격을 목표로 하는 수험생에게 적합한 과정<br>
                - 관세사 1차 각 과목의 기본이론에 대한 자세한 수업 진행<br>
                - 진도별 모의고사를 통해 현재 학습상태에 대한 피드백과 담임선생님의 상담을 통해 효과적인 학습을 진행<br>
                - 수업과목 : 관세법, 무역영어, 재무회계, 원가관리회계, 내국소비세법<br>
            </div>
            <h4 class="NGR mt20"><span>가을 기본이론 종합반</span> 9월초 ~ 12월말</h4>
            <div>
                - 관세사 시험을 처음 준비하고 동차합격을 목표로 하는 수험생에게 적합한 과정<br>
                - 관세사 1차 각 과목의 기본이론에 대한 자세한 수업 진행<br>
                - 진도별 모의고사를 통해 현재 학습상태에 대한 피드백과 담임선생님의 상담을 통해 효과적인 학습을 진행<br>
                - 수업과목 : 관세법, 무역영어, 재무회계, 원가관리회계, 내국소비세법<br>
            </div>
            <h4 class="NGR mt20"><span>심화 종합반</span> 8월초 ~ 11월말</h4>
            <div>
                - 2차 과목을 1회독 학습하여 관세사 동차 합격을 목표로 하는 수험생에게 적합한 과정<br>
                - 1차와 2차에 연계되는 관세법, 무역실무 과목에 대한 심도있는 학습과, 2차 과목인 관세평가, 관세율표 및 상품학에 대한 기초내용 이해<br>
                - 수업과목 : 관세법, 관세율표 및 상품학, 관세평가, 무역실무<br>
            </div>
            <h4 class="NGR mt20"><span>객관식 종합반</span> 1월초 ~ 2월말</h4>
            <div>
                - 관세사 1차 시험을 대비하여 주요내용을 정리하고 실전 문제풀이를 진행하는 과정<br>
                - 관세사 1차 각 과목에 대한 최종 마무리 단계로 객관식 교재로 기출문제와 연습문제 풀이로 실전 대비 감각을 익히는 과정<br>
                - 과목별 모의고사 문제풀이 후 해설 진행<br>
                - 수업과목 : 관세법, 무역영어, 재무회계, 원가관리회계, 내국소비세법<br>
            </div>
            <h4 class="NGR mt20"><span>Fianl 정리반</span> 3월</h4>
            <div>
                - 총 4주에 걸쳐 매주 각 과목별 실제 시험과 동일한 모의고사 및 이론요약 특강을 실시<br>
                - 정해진 시간동안 문제풀이 경험을 통하여 실전 상황에 대한 적응력을 키우고, 모의고사 후 각 과목별 강평과 이론요약 강의를 통해 최종 마무리 하는 과정<br>
                - 수업과목 : 관세법, 무역영어, 재무회계, 원가관리회계, 내국소비세법<br>
            </div>

            <h4 class="NGR mt20">관세사 학습로드맨 2차 수험생</h4>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col span="11" />
                        <col />
                        <col />
                        <col />
                        <col span="3" />
                        <col />
                    </colgroup>
                    <thead>
                        <tr>
                            <th colspan="2">5월</th>
                            <th>6월</th>
                            <th>7월</th>
                            <th>8월</th>
                            <th>9월</th>
                            <th>10월</th>
                            <th>11월</th>
                            <th>12월</th>
                            <th>1월</th>
                            <th>2월</th>
                            <th>3월</th>
                            <th>4월</th>
                            <th>5월</th>
                            <th>6월</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="2"></td>
                            <td colspan="4" rowspan="2">2차<br> 기본이론 종합반</td>
                            <td colspan="3" rowspan="2">2차<br>심화이론 종합반</td>
                            <td colspan="2" rowspan="2">GS 1단계<br>진도별 모의고사</td>
                            <td colspan="2">GS 2단계<br>누적 진도별 모의고사</td>
                            <td colspan="2" rowspan="2">GS 3단계<br>실전 Final 특강</td>
                            <td rowspan="2">2차시험</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>1차시험</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h4 class="NGR mt20"><span>기본이론 종합반</span> 9월초 ~ 11월중</h4>
            <div>
                - 관세사 2차생들을 대상으로 2차 전과목 기본이론을 정리하는 과정<br>
                - 선생님이 직접 운영 관리하는 그룹스터디와 갭려상담을 통하여 학습에 대한 의욕 고취<br>
                - 수업과목 : 관세법, 관세율표 및 상품학, 관세평가, 무역실무<br>
            </div>
            <h4 class="NGR mt20"><span>심화이론 종합반</span> 11월말 ~ 2월중</h4>
            <div>
                - 관세사 2차생들을 대상으로 2차 전과목 심화이론을 정리하는 과정<br>
                - 심화내용 이론강의와 총 2회에 걸친 진도별 모의고사가 진행되며, 진도별모의고사 종료 후 당일 모의고사 해설 강의 진행<br>
                - 선생님의 1:1맞춤 첨삭과 채점서비스로 2차적 피드백 가능, 우수작성답안지 게시<br>
                - 수업과목 : 관세법, 관세율표 및 상품학, 관세평가, 무역실무<br>
            </div>
            <h4 class="NGR mt20"><span>GS 1단계 진도별 모의고사</span> 2월중 ~ 3월말</h4>
            <div>
                - 관세사 2차 시험 대비 진도별 모의고사(총 6회) 과정<br>
                - 정해진 요일에 과목별 누적 진도(마지막 전범위) 모의고사 진행, 시험종료 후 모의고사 해설 및 핵심정리 강의진행<br>
                - 선생님의 1:1맞춤 첨삭과 채점서비스로 2차적 피드백 가능, 우수작성답안지 게시<br>
                - 수업과목 : 관세법, 관세율표 및 상품학, 관세평가, 무역실무<br>
            </div>
            <h4 class="NGR mt20"><span>GS 2단계 누적 진도별 모의고사</span> 4월중 ~ 5월말</h4>
            <div>
                - 관세사 2차 시험 대비 진도별 모의고사(총 6회) 과정<br>
                - 정해진 요일에 과목별 누적 진도(마지막 전범위) 모의고사 진행, 시험종료 후 모의고사 해설 및 핵심정리 강의진행<br>
                - 선생님의 1:1맞춤 첨삭과 채점서비스로 2차적 피드백 가능, 우수작성답안지 게시<br>
                - 수업과목 : 관세법, 관세율표 및 상품학, 관세평가, 무역실무<br>
            </div>
            <h4 class="NGR mt20"><span>GS 3단계 실전 Final 특강</span> 5월중 ~ 6월말</h4>
            <div>
                - 주말 실제 시험과 동일한 모의고사(총 6회)와 주중 진행되는 특강을 통하여 2차 전과목을 완벽히 정리하는 과정<br>
                - 선생님의 1:1맞춤 첨삭과 채점서비스로 2차적 피드백 가능, 우수작성답안지 게시<br>
                - 수업과목 : 관세법, 관세율표 및 상품학, 관세평가, 무역실무<br>
            </div>
        </div>      
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop