@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">자격증<span class="row-line">|</span></li>
                <li class="subTit">건설안전(산업)기사</li>
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
            <span class="depth-Arrow">></span><strong>건설안전(산업)기사</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">건설안전(산업)기사</h3>
            <h4 class="NGR">시험안내</h4>
            <ul class="st01">
                <li>자격명 : 건설안전 산업기사</li>
                <li>관련부처 : 고용노동부</li>
                <li>시행기관 : 한국산업인력공단</li>
            </ul>
            <h5 class="NGR">가. 시험일정</h5>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col width="14%">
                        <col>
                        <col width="14%">
                        <col>
                        <col width="14%">
                        <col width="14%">
                        <col width="14%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>구분</th>
                            <th>필기원서접수(인터넷)</th>
                            <th>필기시험</th>
                            <th>필기합격(예정자)발표</th>
                            <th>실기원서접수</th>
                            <th>실기시험</th>
                            <th>최종합격자 발표일</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>2018년 
                            제1회</th>
                            <td>2018.02.02<br />
                            ~2018.02.08</td>
                            <td>2018.03.04</td>
                            <td>2018.03.16</td>
                            <td>2018.03.19<br />
                            ~2018.03.22</td>
                            <td>2018.04.14<br />
                            ~2018.04.27</td>
                            <td>2018.05.04<br />
                            2018.05.25</td>
                        </tr>
                        <tr>
                            <th>2018년 
                            제2회</th>
                            <td>2018.03.30<br />
                            ~2018.04.05</td>
                            <td>2018.04.28</td>
                            <td>2018.05.18</td>
                            <td>2018.05.21/<br />
                            2018.5.23~25</td>
                            <td>2018.06.30<br />
                            ~2018.07.13</td>
                            <td>2018.07.20<br />
                            2018.08.17</td>
                        </tr>
                        <tr>
                            <th>2018년 
                            제3회</th>
                            <td>2018.07.20<br />
                            ~2018.07.26</td>
                            <td>2018.08.19</td>
                            <td>2018.08.31</td>
                            <td>2018.09.03<br />
                            ~2018.09.06</td>
                            <td>2018.10.06<br />
                            ~2018.10.19</td>
                            <td>2018.10.26<br />
                            2018.11.16</td>
                        </tr>
                        <tr>
                            <th>2018년 
                            제4회</th>
                            <td>2018.08.24<br />
                            ~2018.08.30</td>
                            <td>2018.09.15</td>
                            <td>2018.10.12</td>
                            <td>2018.10.15<br />
                            ~2018.10.18</td>
                            <td>2018.11.10<br />
                            ~2018.11.23</td>
                            <td>2018.11.30<br />
                            2018.12.21</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt10">
                - 원서접수시간은 원서접수 첫날 09:00부터 마지막 날 18:00까지 임.<Br>
                - 필기시험 합격예정자 및 최종합격자 발표시간은 해당 발표일 09:00임.<Br>
                ※ 일반인 필기시험 면제자는 응시 불가
            </div>

            <h5 class="NGR mt20">나. 시험수수료</h5>
            <div>
                - 필기 : 19,400원 / 실기 : 34,600원
            </div>

            <h5 class="NGR mt20">다. 실기기관</h5>
            <div>
                - 한국산업인력공단(http://www.q-net.or.kr)
            </div>

            <h5 class="NGR mt20">라. 출제경향</h5>
            <div>
                - 필답형 : 출제기준 참조<br>
                - 작업형 : 영상자료을 이용하여 시행, 건설안전에 관한 이론적 지식과 관련 법령을 바탕으로 일반지식, 전문지식과 응용 및 실무 능력을 평가
            </div>

            <h5 class="NGR mt20">마. 출제기준</h5>
            <div>
                - 건설안전기사 출제기준 적용기간(2011.1.1 ~ 2015.12.31.) → 출제기준 다운로드(파일 있음)
            </div>

            <h5 class="NGR mt20">바. 취득방법</h5>
            <ul class="st01">
                <li>시 행 처 : 한국산업인력공단</li>
                <li>관련학과 : 대학과 전문대학의 산업안전공학, 건설안전공학, 토목공학 건축공학 관련학과</li>
                <li>시험과목 : <br>
                - 필기 : 1. 산업안전관리론, 2. 산업심리 및 교육, 3. 인간공학 및 시스템안전공학, 4. 건설시공학, 5. 건설재료학, 6. 건설안전기술<br>
                - 실기 : 건설안전실무
                </li>
                <li>검정방법 : <br>
                - 필기 : 객관식 4지 택일형 과목당 20문항(과목당 30분)<br>
                - 실기 : 복합형[필답형(1시간 30분) + 작업형(50분 정도)]
                </li> 
                <li>합격기준: <br>
                - 필기 : 100점을 만점으로 하여 과목당 40점 이상, 전과목 평균 60점 이상<br>
                - 실기 : 100점을 만점으로 하여 60점 이상
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