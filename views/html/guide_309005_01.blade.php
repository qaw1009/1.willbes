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
            <span class="depth-Arrow">></span><strong>관세사 시험안내</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">관세사 시험안내</h3>
            <h4 class="NGR mt20">관세사란?</h4>
            <div>
                관세사란 무역 및 통관관련분야에 전문지식을 가진 자에게 국가가 시험을 거쳐 관세사 자격을 부여하며, 관세사는 화주로부터
                위탁을 받아 수출입업체를 대리하여 다음과 같은 관세사의 직무를 대행합니다.<br>
                수출입의 신고는 하주가 직접 신고하는 것이 바림직하나 시시각각으로 변하는 수출입 관련 법령을 알기 어렵고, 국가간 무역에서는 HS분류체계를 이용하여
                상품을 분류하나 일반인의 입장에서는 이에 대한 분류가 쉽지 않으며, 세관의 입장에서도 수출입 신고서 등 관계서류의 작성과 구비 서류의 정확을 기할 수 있어 업무의 능률성을 기할 수 있습니다.
            </div>
            <h4 class="NGR mt20">수행직무</h4>
            <ul class="st01 mt10">
                <li>수출입물품에 대한 세번/세율의 분류, 과게가겨의 확인과 세액의 계산</li>
                <li>관세법 제38조 제 3항의 자율심사 및 그데 따른 자율심사 보고서의 작성</li>
                <li>관세법이나 그 밖에 관세에 관한 법률에 따른 물품의 수출, 수입, 반출, 반입 또는 반송의 신고 등과 이와 관련되는 절차의 이행</li>
                <li>관세법 제226조에 따라 수출입하려는 물품의 허가, 승인, 표시나 그 밖의 조건을 갖추었음을 증명하기 위하여 하는 증명 또는 확인의 신청</li>
                <li>관세법에 따른 이의신청, 심사청구 및 심판청구의 대리</li>
                <li>관세에 관한 상담 또는 자문에 대한 조언</li>
                <li>관세법 제241조 및 제 244조에 따른 수출입신과와 관련된 상담 또는 자문에 대한 조언</li>
                <li>관세법 및 수출용원재료에 대한 관세등 환급에 관한 특례법에 따른 환급청구의 대리</li>
                <li>세관의 조사 또는 처분 등과 관련된 화주를 위한 의견진술의 대리</li>
                <li>제3호, 제4호 및 제5호 외에 관세법에 따른 신고, 보고 또는 신청 등과 이와 관련되는 절차의 이행</li>
            </ul>
            <h4 class="NGR mt20">진로 및 전망</h4>
            <ul class="st01 mt10">
                <li>개인 관세사무소의 개설</li>
                <li>합동 관세사 사무소에 참여</li>
                <li>관세법인 취업</li>
                <li>통관취급법인에 취업</li>
                <li>개인(합동)관세사 또는 관세법인에 취업 등</li>
            </ul>
            <h4 class="NGR mt20">소관부처명</h4>
            <div>
                관세청 통관기획과 042-481-7843
            </div>
        </div>      
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop