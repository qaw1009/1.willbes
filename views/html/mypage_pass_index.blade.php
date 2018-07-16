@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-List menu-List-Center">
                <li>
                    <a href="#none">무한PASS존</a>
                </li>
                <li>
                    <a href="#none">온라인강좌</a>
                </li>
                <li>
                    <a href="#none">학원강좌</a>
                </li>
                <li>
                    <a href="#none">특강&이벤트 신청현황</a>
                </li>
                <li>
                    <a href="#none">모의고사관리</a>
                </li>
                <li>
                    <a href="#none">결제관리</a>
                </li>
                <li>
                    <a href="#none">학습지원관리</a>
                </li>
                <li>
                    <a href="#none">회원정보</a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth"><span class="depth-Arrow">></span><strong>내강의실</strong></span>
    </div>
    <div class="Content p_re">

        <div class="Mypage_PASS_Index willbes-listTable c_both">
            <!-- ActIndex1 -->
            <div class="ActIndex1 mt65" style="height: 50px;">
                <div class="CSpartner widthAuto940 f_left">
                    <div class="will-Tit NG">나의학습/혜택정보</div>
                </div>
            </div>
            <!-- ActIndex2 -->
            <div class="ActIndex2 mt60">
                <div class="willbes-listTable widthAuto940 f_inherit">
                    <div class="will-Tit NG">최근 수강강좌<span class="will-subTit">가장 최근 수강한 <span class="tx-blue">3</span>개의 강좌리스트가 노출됩니다</span></div>
                    <div class="willbes-Lec-Table NG d_block">
                        <table cellspacing="0" cellpadding="0" class="lecTable">
                            <colgroup>
                                <col style="width: 100px;">
                                <col style="width: 85px;">
                                <col style="width: 755px;">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td class="w-list">무한<br/>PASS<br/>+</td>
                                    <td class="w-percent">진도율<br/>
                                        <span class="tx-blue">77%</span>
                                    </td>
                                    <td class="w-data tx-left pl25">
                                        <dl class="w-info">
                                            <dt>
                                                경찰<span class="row-line">|</span>
                                                영어<span class="row-line">|</span>
                                                한덕현교수님
                                                <span class="NSK ml15 nBox n2">진행중</span>
                                            </dt>
                                        </dl><br/>
                                        <div class="w-tit">
                                            <a href="{{ site_url('/home/html/mypage_pass1') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>강의수 : <span class="tx-black">12강</span></dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                        </dl>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-list">패키지<br/>+</td>
                                    <td class="w-percent">진도율<br/>
                                        <span class="tx-blue">5%</span>
                                    </td>
                                    <td class="w-data tx-left pl25">
                                        <dl class="w-info">
                                            <dt>
                                                공무원<span class="row-line">|</span>
                                                수학<span class="row-line">|</span>
                                                한덕현교수님
                                                <span class="NSK ml15 nBox n2">진행중</span>
                                            </dt>
                                        </dl><br/>
                                        <div class="w-tit">
                                            <a href="#none">[재수강] 2018(교육행정대비) 한덕현 제니스 영어 실전 동형모의고사(4-5월)</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>강의수 : <span class="tx-black">12강</span></dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                        </dl>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-list">단강좌<br/>+</td>
                                    <td class="w-percent">진도율<br/>
                                        <span class="tx-blue">9%</span>
                                    </td>
                                    <td class="w-data tx-left pl25">
                                        <dl class="w-info">
                                            <dt>
                                                공무원<span class="row-line">|</span>
                                                수학<span class="row-line">|</span>
                                                한덕현교수님
                                                <span class="NSK ml15 nBox n4">완강</span>
                                            </dt>
                                        </dl><br/>
                                        <div class="w-tit">
                                            <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>강의수 : <span class="tx-black">12강</span></dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                        </dl>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- lecTable -->
                    </div>
                    <!--willbes-Lec-Table -->
                </div>
            </div>
            <!-- ActIndex3 -->
            <div class="ActIndex3 mt60">
                <div class="willbes-listTable willbes-info willbes-info300 widthAuto445 f_left">
                    <div class="will-Tit NG">나의 상담내역 <a class="f_right" href="#none"><img src="/public/img/willbes/prof/icon_add.png"></a></div>
                    <ul class="List-Table GM tx-gray">
                        <li><a href="#none">등록기기 초기화</a><span class="aBox answerBox_block NSK">답변완료</span><span class="date">2018-04-01</span></li>
                        <li><a href="#none">수강시작일 00/00으로 변경해주...</a><span class="aBox waitBox_block NSK">답변대기</span><span class="date">2018-04-01</span></li>
                        <li><a href="#none">교재문의입니다.</a><span class="aBox answerBox_block NSK">답변완료</span><span class="date">2018-03-06</span></li>
                        <li><a href="#none">교재문의입니다.</a><span class="aBox waitBox_block NSK">답변대기</span><span class="date">2018-03-06</span></li>
                    </ul>
                </div>
                <div class="willbes-listTable willbes-info willbes-info300 widthAuto445 f_left ml50">
                    <div class="will-Tit NG">나의 학습Q&A <a class="f_right" href="#none"><img src="/public/img/willbes/prof/icon_add.png"></a></div>
                    <ul class="List-Table GM tx-gray">
                        <li><a href="#none">등록기기 초기화</a><span class="aBox answerBox_block NSK">답변완료</span><span class="date">2018-04-01</span></li>
                        <li><a href="#none">수강시작일 00/00으로 변경해주...</a><span class="aBox waitBox_block NSK">답변대기</span><span class="date">2018-04-01</span></li>
                        <li><a href="#none">교재문의입니다.</a><span class="aBox answerBox_block NSK">답변완료</span><span class="date">2018-03-06</span></li>
                        <li><a href="#none">교재문의입니다.</a><span class="aBox waitBox_block NSK">답변대기</span><span class="date">2018-03-06</span></li>
                    </ul>
                </div>
            </div>
            <!-- ActIndex4 -->
            <div class="ActIndex4 mt60">
                <div class="willbes-listTable willbes-info willbes-info870 widthAuto940 f_left">
                    <div class="will-Tit NG">공지사항 <a class="f_right" href="#none"><img src="/public/img/willbes/prof/icon_add.png"></a></div>
                    <ul class="List-Table GM tx-gray">
                        <li><a href="#none">3월 무이자카드안내</a><span class="date">2018-04-01</span></li>
                        <li><a href="#none">3월 31일(금) 새벽시스템점검안내</a><span class="date">2018-04-01</span></li>
                        <li><a href="#none">설연휴학원고객센터운영안내</a><span class="date">2018-03-06</span></li>
                        <li><a href="#none">추석교재배송및고객센터휴무안내</a><span class="date">2018-03-06</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Mypage_PASS_Index -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop