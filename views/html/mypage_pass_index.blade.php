@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-List menu-List-Center">
                <li>
                    <a href="{{ site_url('/home/html/mypage_pass_index') }}">내강의실 HOME</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_pass1') }}">무한PASS존</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_online1') }}">온라인강좌</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">온라인강좌</li>
                            <li><a href="{{ site_url('/home/html/mypage_online1') }}">수강대기강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online2') }}">수강중강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online3') }}">일시정지강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online4') }}">수강종료강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_acad1') }}">학원강좌</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학원강좌</li>
                            <li><a href="{{ site_url('/home/html/mypage_acad1') }}">수강신청강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_acad2') }}">수강종료강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_event') }}">특강&이벤트 신청현황</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_test1') }}">모의고사관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">모의고사관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_test1') }}">접수현황</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_test2') }}">온라인모의고사 응시</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_test3') }}">성적결과</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_payment1') }}">결제관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">결제관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_payment1') }}">주문/배송조회</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_payment3') }}">포인트관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_payment4') }}">쿠폰/수강권관리</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_support1') }}">학습지원관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학습지원관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_support1') }}">쪽지관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_support2') }}">알림관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_support3') }}">상담내역</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">회원정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">회원정보</li>
                            <li><a href="{{ site_url('/home/html/mypage_userinfo1') }}">개인정보관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_userinfo2') }}">비밀번호변경</a></li>
                        </ul>
                    </div>
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
            <div class="ActIndex1 mt10">
                <div class="CSpartner widthAuto940 f_left">
                    <div class="will-Tit NG">나의학습/혜택정보</div>
                    <div class="MyInfoBox NG">
                        <ul>
                            <li>
                                <div class="Tit bg-bright-blue tx-blue NGEB">온라인강좌<br/><span class="NG">현황</span></div>
                                <div class="TableInfo">
                                    <table cellspacing="0" cellpadding="0" class="myTable">
                                        <colgroup>
                                            <col style="width: 100px;"/>   
                                            <col style="width: 40px;"/>
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <td class="subTit">무한PASS</td>
                                                <td><a class="tx-blue" href="#none">10</a>개</td>
                                            </tr>
                                            <tr>
                                                <td class="subTit">수강중</td>
                                                <td><a class="tx-blue" href="#none">5</a>개</td>
                                            </tr>
                                            <tr>
                                                <td class="subTit">수강대기</td>
                                                <td><a class="tx-blue" href="#none">10</a>개</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </li>
                            <li class="sm">
                                <div class="Tit bg-bright-blue tx-blue NGEB">학원강좌<br/><span class="NG">현황</span></div>
                                <div class="TableInfo">
                                    <table cellspacing="0" cellpadding="0" class="myTable">
                                        <colgroup>
                                            <col style="width: 100px;"/>   
                                            <col style="width: 40px;"/>
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <td class="subTit">수강신청</td>
                                                <td><a class="tx-blue" href="#none">5</a>개</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </li>
                            <li>
                                <div class="Tit bg-bright-gray tx-dark-black NGEB">포인트<br/><span class="NG">현황</span></div>
                                <div class="TableInfo">
                                    <table cellspacing="0" cellpadding="0" class="myTable">
                                        <colgroup>
                                            <col style="width: 100px;"/>   
                                            <col style="width: 40px;"/>
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <td class="subTit">강좌</td>
                                                <td><a class="tx-blue" href="#none">410,000</a>P</td>
                                            </tr>
                                            <tr>
                                                <td class="subTit">교재</td>
                                                <td><a class="tx-blue" href="#none">130,000</a>P</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </li>
                            <li class="sm">
                                <div class="Tit bg-bright-gray tx-dark-black NGEB">쿠폰<br/><span class="NG">현황</span></div>
                                <div class="TableInfo">
                                    <table cellspacing="0" cellpadding="0" class="myTable">
                                        <colgroup>
                                            <col style="width: 100px;"/>   
                                            <col style="width: 40px;"/>
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <td class="subTit">쿠폰</td>
                                                <td><a class="tx-blue" href="#none">5</a>장</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="willbes-myinfo">
                        <div class="willbes-listTable willbes-myinfoList widthAutoFull bdb-light-gray">
                            <div class="will-Tit NG">최근 받은 쪽지 <a class="f_right" href="#none"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                            <ul class="List-Table GM tx-gray">
                                <li>- <a href="#none">쪽지 제목이 노출됩니다.<img src="{{ img_url('mypage/icon_N.png') }}"></a></li>
                                <li>수신된 쪽지가 없습니다.</li>
                            </ul>
                        </div>
                        <div class="willbes-listTable willbes-myinfoList widthAutoFull">
                            <div class="will-Tit NG">나의 학습 기기 (무한PASS) <a class="f_right" href="#none"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                            <ul class="List-Table GM myTablet tx-gray">
                                <!-- 리스트 -->
                                <li>PC 1대 <span class="tx-bright-gray">(2018.00.00 등록)</span></li>
                                <li>모바일 1대 <span class="tx-bright-gray">(2018.00.00 등록)</span></li>
                                <!-- 기기없음
                                <li>등록된 기기가 없습니다.</li>
                                <li><span class="tx-bright-gray">( ID당 2개만 등록가능 )</span></li>
                                -->
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- ActIndex2 -->
            <div class="ActIndex2 mt45">
                <div class="willbes-listTable widthAuto940 f_inherit">
                    <div class="will-Tit NG">최근 수강강좌<span class="will-subTit">가장 최근 수강한 <span class="tx-blue">3</span>개의 강좌리스트가 노출됩니다.</span></div>
                    <div class="willbes-Lec-Table NG d_block">
                        <table cellspacing="0" cellpadding="0" class="lecTable">
                            <colgroup>
                                <col style="width: 100px;">
                                <col style="width: 85px;">
                                <col style="width: 755px;">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td class="w-list NGEB"><a href="#none">무한<br/>PASS<br/>+</a></td>
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
                                            <dt>강의수 : <span class="tx-black">12강</span></dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                        </dl>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-list NGEB"><a href="#none">패키지<br/>+</a></td>
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
                                            <dt>강의수 : <span class="tx-black">12강</span></dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                        </dl>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-list NGEB"><a href="#none">단강좌<br/>+</a></td>
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
                                            <dt>강의수 : <span class="tx-black">12강</span></dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
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
            <div class="ActIndex3 mt45">
                <div class="willbes-listTable willbes-info willbes-info widthAuto445 f_left">
                    <div class="will-Tit NG">나의 상담내역 <a class="f_right" href="#none"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                    <ul class="List-Table GM tx-gray">
                        <li><a href="#none">등록기기 초기화</a><span class="aBox answerBox  NSK">답변완료</span><span class="date">2018-04-01</span></li>
                        <li><a href="#none">수강시작일 00/00으로 변경해주...</a><span class="aBox waitBox  NSK">답변대기</span><span class="date">2018-04-01</span></li>
                        <li><a href="#none">교재문의입니다.</a><span class="aBox answerBox  NSK">답변완료</span><span class="date">2018-03-06</span></li>
                        <li>등록된 상담 내용이 없습니다.</li>
                    </ul>
                </div>
                <div class="willbes-listTable willbes-info willbes-info widthAuto445 f_left ml50">
                    <div class="will-Tit NG">나의 학습Q&A <a class="f_right" href="#none"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                    <ul class="List-Table GM tx-gray">
                        <li><a href="#none">등록기기 초기화</a><span class="aBox answerBox  NSK">답변완료</span><span class="date">2018-04-01</span></li>
                        <li><a href="#none">수강시작일 00/00으로 변경해주...</a><span class="aBox waitBox  NSK">답변대기</span><span class="date">2018-04-01</span></li>
                        <li><a href="#none">교재문의입니다.</a><span class="aBox answerBox  NSK">답변완료</span><span class="date">2018-03-06</span></li>
                        <li>등록된 학습 Q&A 내용이 없습니다.</li>
                    </ul>
                </div>
            </div>
            <!-- ActIndex4 -->
            <div class="ActIndex4 mt45">
                <div class="willbes-listTable willbes-info willbes-info860 widthAuto940 f_left">
                    <div class="will-Tit NG">공지사항 <a class="f_right" href="#none"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                    <ul class="List-Table GM tx-gray">
                        <li><a href="#none">3월 무이자카드안내</a><span class="date">2018-04-01</span></li>
                        <li><a href="#none">3월 31일(금) 새벽시스템점검안내</a><span class="date">2018-04-01</span></li>
                        <li><a href="#none">설연휴학원고객센터운영안내</a><span class="date">2018-03-06</span></li>
                        <li>등록된 공지 내용이 없습니다.</li>
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