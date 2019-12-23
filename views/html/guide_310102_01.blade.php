@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">실무자격증<span class="row-line">|</span></li>
                <li class="subTit">경제교육지도사</li>
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
            <span class="depth-Arrow">></span><strong>자격정보</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">자격정보</h3>
            <h4 class="NGR mt20">경제교육지도사란?</h4>
            <h5 class="NGR mt20">가. 자격소개</h5>
            <div>
                (주)이코노아이(어린이경제신문)에서 개발한 수준별 경제교육 프로그램을 이수하여 어린이와 청소년들에게 경제를 쉽고 재미있게 가르치는 전문강사입니다.
            </div>
            <h5 class="NGR mt20">나. 주요활동분야</h5>
            <h5 class="NGR mt10">학교영역</h5>
            <ul class="st01">
                <li><strong class="tx-blue">초등학교 "방화후 학교"</strong><br>
                    - 1~2학년, 3~4학년, 5~6학년 3과정으로 구분하여 최대 주 1회 운영<br>
                    - 회당 교육시간은 2시간, 1년 과정으로 진행<br>
                    - 학년별 과정을 모두 진행할 경우 연 48회차 가능<br>
                </li>
                <li><strong class="tx-blue">중학교 "특별활동"</strong><br>
                    - 중학교 특별활동 시간에 경제개념 교육<br>
                    - 회당 교육시간은 2시간, 주 1회 운영하여 최대 24회차 진행
                </li>
                <li><strong class="tx-blue">초/중등 "수련회", "경제 수학여행"</strong><br>
                    - 테마가 있는 외부활동으로 증가추세<br>
                    - 1박 2일, 2박 3일, 3박 4일 일정으로 가능<br>
                    - 경제 전문 테마, 경제/문화/관광/나눔 활동과 접목한 프로그램 진행 가능
                </li>
                <li><strong class="tx-blue">학부모 교육</strong><br>
                    - 학부모 대상 기초 경제 상식, 개념 교육<br>
                    - 자녀 교육을 위한 어머니 교육
                </li>
                <li><strong class="tx-blue">체험학습 운영</strong><br>
                    - 놀토 경제교실 운영<br>
                    - 학교, 청소년 단체 대상의 체험학습을 통해 경제체험 프로그램 운영
                </li>
            </ul>
            <ul class="st01">
                <li><strong class="tx-blue">가정 및 단체</strong><br>
                    - 방문 학습, 홈스쿨 운영<br>
                    - 부모와 자녀가 함께 하는 경제캠프, 경제교실 등 프로그램<br>
                    - 기업이나 단체의 위탁프로그램 현지 진행<br>
                    - 복지관, 사회복지시설의 경제/올바른 소비 교육<br>
                    - 지역별 경제교육센터 강사 활동
                </li>
                <li><strong class="tx-blue">어린이 경제신문사</strong><br>
                    - 상시 진행하는 교육이나 방학 중 캠프에서 멘토(보조교사) 활동<br>
                    - 인력 충원 시 우선입사기회 제공
                </li>
            </ul>

            <h4 class="NGR mt20">과정소개</h4>
            <h5 class="NGR mt10">별도의 자격시험 없이 이수 후 바로 취업이 가능한 자격증</h5>
            <ul class="st01">
                <li>(주)이코노아이가 만든 국내 최고의 경제양성 과정 (2016년 현재 2,000명 배출, 전국에서 활동중)</li>
                <li>10여년 간의 운영노하우를 통한 체계적인 커리큘럼으로 별도의 시험 없이 이수 후 바로 현장투입</li>
                <li>기본과정 이수 후 “어린이경제신문”의 독자적인 경제교육교재 “어린이 경제리더”와 교구를 이용하여 즉시 지도</li>
                <li>(주)이코노아이와 진행하는 경제교육활동으로 실질적인 소득활동과 연계</li>
            </ul>
            <h5 class="NGR mt20">건강한 경제관념을 심어주는 실용적인 교육</h5>
            <ul class="st01">
                <li>어렵고 딱딱한 경제를 쉽고 재미있게 설명하는 교육</li>
                <li>단편적이거나 일회적인 교육이 아닌 지속적인 교육으로 실생활에 적용하는 실용경제교육</li>
                <li>현 교육과정에 반영된 똑똑한 소비자-창의적인 생산자로서의 성장교육</li>
                <li>단순 숫자 개념이 아닌, “합리적 선택”과 “합리적 경제활동”을 배우고 이를 통해 건전한 경제개념을 심어주는 교육</li>
            </ul>

            <h4 class="NGR mt20">과정 이수 후 특전</h4>
            <h5 class="NGR mt10">교구재를 이용한 오프라인 교육 진행(지역별로 모여 1일 8시간 무상 진행)</h5>
            <h5 class="NGR mt10">인근 지역별 교육생 연계로 공동 활동 기회 마련</h5>            
            <ul class="st01">
                <li>조합, 사회적기업 창업으로 연계</li>
                <li>지역별 이코노아이 사업 책임자 지정으로 다양한 관련 활동 보장</li>
                <li>별도의 비용없이 지역별(시군구 단위) 교육 책임자 지정으로 방과후 학교, 자유학기제, 문화센터 등 다양한 현지 교육 활동 전개 지원</li>
                <li>어린이 경제신문 등 연관 사업권 제공</li>
            </ul>
            <h5 class="NGR mt10">(주)이코노아이 사업 확보 후 현지 교육 진행시 기회 보장</h5>  
            <h5 class="NGR mt10">지역별 사업 전개를 위한 다양한 지원과 공동 사업 전개</h5>  
            <h5 class="NGR mt10">우수 강사 대상으로 오프라인 교육 위촉</h5>  
            <h5 class="NGR mt10">교구재 저가 공급(일반 판매가격의 80% 수준)</h5>  
        </div>      
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop