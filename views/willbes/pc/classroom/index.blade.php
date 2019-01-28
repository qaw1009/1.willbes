@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer">
        <div class="widthAuto c_both">
            @include('willbes.pc.layouts.partial.site_tab_menu')
            <div class="Depth">
                @include('willbes.pc.layouts.partial.site_route_path')
            </div>
        </div>

        <div class="ActIndex MyInfo widthAutoFull">
            <div class="widthAuto p_re">
                <div class="Content p_re">
                    <div class="will-Tit NG">나의 <span class="tx-light-blue">학습</span>/혜택 <span class="tx-light-blue">정보</span></div>
                    <div class="MyLecInfoBox NG">
                        <ul>
                            <li class="line">
                                <div class="Tit tx-light-blue NSK">온라인강좌<br/>현황</div>
                                <div class="TableInfo">
                                    <dl>
                                        <dt><div class="subTit">무한PASS</div><div><a class="tx-blue" href="#none">10</a>개</div></dt>
                                        <dt><div class="subTit">수강중</div><div><a class="tx-blue" href="#none">5</a>개</div></dt>
                                        <dt><div class="subTit">수강대기</div><div><a class="tx-blue" href="#none">10</a>개</div></dt>
                                    </dl>
                                </div>
                            </li>
                            <li class="line sm">
                                <div class="Tit tx-light-blue NSK">학원강좌<br/>현황</div>
                                <div class="TableInfo">
                                    <dl>
                                        <dt><div class="subTit">수강신청</div><div><a class="tx-blue" href="#none">5</a>개</div></dt>
                                    </dl>
                                </div>
                            </li>
                            <li>
                                <div class="Tit tx-light-blue NSK">포인트<br/>현황</div>
                                <div class="TableInfo">
                                    <dl>
                                        <dt><div class="subTit">강좌</div><div><a class="tx-blue" href="#none">410,000</a>P</div></dt>
                                        <dt><div class="subTit">교재</div><div><a class="tx-blue" href="#none">130,000</a>P</div></dt>
                                    </dl>
                                </div>
                            </li>
                            <li class="sm">
                                <div class="Tit tx-light-blue NSK">쿠폰<br/>현황</div>
                                <div class="TableInfo">
                                    <dl>
                                        <dt><div class="subTit">쿠폰</div><div><a class="tx-blue" href="#none">5</a>장</div></dt>
                                    </dl>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="MyInfoBox">
                        <div class="willbes-listTable MyInfoBoxList widthAutoFull">
                            <div class="will-Tit NG">최근 받은 쪽지 <a class="f_right" href="#none"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                            <ul class="List-Table GM tx-gray">
                                <li><a href="#none">쪽지 제목이 노출됩니다.<img src="{{ img_url('mypage/icon_N.png') }}"></a></li>
                                <li>수신된 쪽지가 없습니다.</li>
                            </ul>
                        </div>
                        <div class="willbes-listTable MyInfoBoxList widthAutoFull">
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
                <div class="Quick-Top">
                    {!! banner('내강의실_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
                </div>
            </div>
        </div>
        <div class="widthAuto">
            <div class="Content p_re">
                <div class="Mypage_PASS_Index c_both">
                    <div class="ActIndex ActIndex1 mt70">
                        <div class="willbes-listTable widthAuto940 f_inherit">
                            <div class="will-Tit NG">최근 <span class="tx-light-blue">수강강좌</span> <span class="will-subTit">가장 최근 수강한 <span class="tx-blue">3</span>개의 강좌리스트가 노출됩니다.</span></div>
                            <div class="willbes-Lec-Table NG d_block">
                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                    <colgroup>
                                        <col style="width: 100px;">
                                        <col style="width: 100px;">
                                        <col style="width: 740px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-list NGEB"><a href="#none">무한<br/>PASS<br/>+</a></td>
                                            <td class="w-percent">
                                                <div class="round">
                                                    진도율<br/>
                                                    <span class="tx-blue">77%</span>
                                                </div>
                                            </td>
                                            <td class="w-data tx-left">
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
                                            <td class="w-percent">
                                                <div class="round">
                                                    진도율<br/>
                                                    <span class="tx-blue">5%</span>
                                                </div>
                                            </td>
                                            <td class="w-data tx-left">
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
                                            <td class="w-percent">
                                                <div class="round">
                                                    진도율<br/>
                                                    <span class="tx-blue">9%</span>
                                                </div>
                                            </td>
                                            <td class="w-data tx-left">
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
                    <div class="ActIndex ActIndex2 mt50">
                        <div class="willbes-listTable willbes-info willbes-info widthAuto445 f_left">
                            <div class="will-Tit NSK">나의 <span class="tx-light-blue">상담내역</span> <a class="f_right" href="#none"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                            <ul class="List-Table GM tx-gray">
                                <li><a href="#none">등록기기 초기화</a><span class="aBox answerBox  NSK">답변완료</span><span class="date">2018-04-01</span></li>
                                <li><a href="#none">수강시작일 00/00으로 변경해주...</a><span class="aBox waitBox  NSK">답변대기</span><span class="date">2018-04-01</span></li>
                                <li><a href="#none">교재문의입니다.</a><span class="aBox answerBox  NSK">답변완료</span><span class="date">2018-03-06</span></li>
                                <li>등록된 상담 내용이 없습니다.</li>
                            </ul>
                        </div>
                        <div class="willbes-listTable willbes-info willbes-info widthAuto445 f_left ml50">
                            <div class="will-Tit NSK">나의 <span class="tx-light-blue">학습Q&A</span> <a class="f_right" href="#none"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                            <ul class="List-Table GM tx-gray">
                                <li><a href="#none">등록기기 초기화</a><span class="aBox answerBox  NSK">답변완료</span><span class="date">2018-04-01</span></li>
                                <li><a href="#none">수강시작일 00/00으로 변경해주...</a><span class="aBox waitBox  NSK">답변대기</span><span class="date">2018-04-01</span></li>
                                <li><a href="#none">교재문의입니다.</a><span class="aBox answerBox  NSK">답변완료</span><span class="date">2018-03-06</span></li>
                                <li>등록된 학습 Q&A 내용이 없습니다.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="ActIndex ActIndex3 mt50">
                        <div class="willbes-listTable willbes-info willbes-info860 widthAuto940 f_left">
                            <div class="will-Tit NSK">공지<span class="tx-light-blue">사항</span> <a class="f_right" href="#none"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
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

    <!--
                <script src="/public/js/willbes/player.js"></script>
                <a href="#none" onclick='fnPlayerProf("50004", "OT");'>OT</a><br>
                <a href="#none" onclick='fnPlayerProf("50004", "WS");'>샘플</a><br>
                <a href="#none" onclick='fnPlayerProf("50004", "S1");'>샘플1</a><br>
                <a href="#none" onclick='fnPlayerProf("50004", "S2");'>샘플2</a><br>
                <a href="#none" onclick='fnPlayerProf("50004", "S3");'>샘플3</a><br>
                <br>
                <a href="#none" onclick='fnPlayerSample("200006", "1111344", "SD");'>SD강의 샘플</a><br>
                <a href="#none" onclick='fnPlayerSample("200006", "1111344", "HD");'>HD강의 샘플</a><br>
                <a href="#none" onclick='fnPlayerSample("200006", "1111344", "WD");'>WD강의 샘플</a><br>
                <br>
                <a href="#none" onclick='fnPlayer("200006", "1111344", "WD");'>강의보기</a><br>
    -->

            </div>
        </div>
    </div>
    <!-- End Container -->
@stop