@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰간부<span class="row-line">|</span></li>
                <li class="subTit">간부후보생</li>
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
            <span class="depth-Arrow">></span><strong>시험정보</strong>
            <span class="depth-Arrow">></span><strong>경찰간부후보생은?</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">경찰간부후보생은?</h3>
            <h4 class="NGR">경찰간부 후보생 소개</h4>
            <div>
                해방이후인 1947년 9월 1일 지적수준이 높은 고급경찰간부를 충원하고 경찰의 자질 향상을 통한 식민지 경찰의 잔재를 불식하기 위해 우리나라 최초의 고급경찰간부 양성제도로 탄생하였다.
                <br>
                <br>
                1947년 9월 제 1기생 93명을 모집하여 인천시 북구 부평동 소재 국립경찰 전문학교 캠퍼스에서 교육을 시작하였다. 그 후 2000년 부터는 여자경찰간부후보생 5명씩을 모집하여 고급 여성인력을 
                채용하기시작하는 등 경찰의 핵심적인 역할을 수행해 오고 있다.
                <br>
                <br>
                경찰간부후보생은 다양한 학문적 지식을 갖춘 우수한 인재를 모집하여 1년간 교육을 통한 간부 양성으로 엘리트경찰을 배출하여 국민에 봉사하는 민주경찰상 구현에 크게 기여하였고 
                지식과 참신성을겸비한 중간 간부를 공급하여 조직의 활력 및 청렴성을 제고하였다. 
            </div>
            <h4 class="NGR mt20">경찰간부 후보생 특전</h4>
            <ul class="st01">
                <li>후보생은 정예경찰간부로 거듭나기 위해 최고의 교수진과 강의시설에서 학습하게 된다.</li>
                <li>후보생은 1년간의 교육기간중 소정의 수당을 매월 지급받게 되며 각종 피복류, 침구류, 교과서 등 교육에 필요한 급여품을 지급받는다.</li>
                <li>수상인명구조자격증 취득, 무도단증(태권도, 검도, 유도) 취득, 외국어 및 컴퓨터 숙달 등 다양한 능력을 배우게 된다.</li>
            </ul>
            <h4 class="NGR mt20">경찰간부 후보생 진로</h4>
            <ul class="st01">
                <li>졸업 후 경위로 임용되어 2년간 순환보직 실시 (모집경과에 따라 다소 차이가 있음)<br>
                    경찰서 6월, 수사부서 1년, 지구대 또는 파출소 6월" </li>
                <li>순환보직을 마친 후 적성, 희망, 능력 등을 고려하여 인사배치<br>
                    지방청 근무 또는 조사계 조사관으로 근무할 경우 순환보직을 하지 않을 수도 있음.</li>
                <li>경찰관의 승진은 시험승진과 심사승진으로 이루어지며, 일정한 기간 이상의 승진소요연수 경과 후 승진할 수 있다. <br>
                    경정까지는 시험승진과 심사승진이 병행되며, 총경부터는 심사에 의해서만 승진하게 된다.<br>
                    (승진소요연수 : 경위 → 경감 : 2년, 경감 → 경정 : 3년) 
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