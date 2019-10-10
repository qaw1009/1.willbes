@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">일반경찰</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="{{ site_url('/home/html/prof') }}">교수진소개</a>
                </li>
                <li>
                    <a href="#none">PASS</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/package1') }}">패키지</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                        <li class="Tit">패키지</li>
                            <li><a href="{{ site_url('/home/html/package1') }}">추천 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/package2') }}">선택 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/diypackage') }}">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/list') }}">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mocktest1') }}">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">수험정보</li>
                            <li><a href="{{ site_url('/home/html/mocktest1') }}">시험공고</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest2') }}">수험뉴스</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest3') }}">기출문제</a></li>
                            <li><a href="#none">공무원가이드</a></li>
                            <li><a href="#none">초보합격전략</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest6_1') }}">모의고사</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/event_ing') }}">이벤트</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">이벤트</li>
                            <li><a href="{{ site_url('/home/html/event_ing') }}">진행중인 이벤트</a></li>
                            <li><a href="{{ site_url('/home/html/event_end') }}">마감된 이벤트</a></li>
                        </ul>
                    </div>
                </li>
                <li class="Acad">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth"><span class="depth-Arrow">></span><strong>패키지</strong></span>
        <span class="2depth"><span class="depth-Arrow">></span><strong>DIY패키지</strong></span>
    </div>
    <div class="Content p_re">

        <div class="curriWrap c_both">
            <div class="CurriBox">
                <table cellspacing="0" cellpadding="0" class="curriTable">
                    <colgroup>
                        <col width="*">
                        <col width="*">
                        <col width="*">
                    </colgroup>
                    <tbody>
                        <tr>
                            <th class="tx-gray">대비년도</th>
                            <td class="tx-left">
                                <span>
                                    <input type="radio" id="YEAR_SAVE_ALL" name="YEAR_SAVE_ALL" class="iptSave">
                                    <label for="YEAR_SAVE_ALL" class="yearSave">전체</label>
                                </span>
                                <span>
                                    <input type="radio" id="YEAR_SAVE_2019" name="YEAR_SAVE_2019" class="iptSave">
                                    <label for="YEAR_SAVE_2019" class="yearSave">2019년</label>
                                </span>
                                <span>
                                    <input type="radio" id="YEAR_SAVE_2018" name="YEAR_SAVE_2018" class="iptSave">
                                    <label for="YEAR_SAVE_2018" class="yearSave">2018년</label>
                                </span>
                                <span>
                                    <input type="radio" id="YEAR_SAVE_2017" name="YEAR_SAVE_2017" class="iptSave">
                                    <label for="YEAR_SAVE_2017" class="yearSave">2017년</label>
                                </span>
                            </td>
                            <td class="All-Clear">
                                <a href="#none" onclick="location.href=location.pathname"><img src="/public/img/willbes/sub/icon_clear.gif">전체해제</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- curriWrap -->

        <div class="willbes-Lec NG c_both mt50">
            <div class="willbes-Lec-Line">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Lec-Table d_block">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col>
                        <col style="width: 140px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="tx-left pl25">
                                <div class="w-tit">
                                    <a href="{{ site_url('/home/html/diypackage') }}"> 2020 9급 이론종합 [행정/세무/출관직] 선택형 내맘대로 패키지 1</a>
                                </div>
                            </td>
                            <td class="w-sp btnBlue">
                                <a href="{{ site_url('/home/html/diypackage') }}">강좌선택</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tx-left pl25">
                                <div class="w-tit">
                                    <a href="{{ site_url('/home/html/diypackage') }}"> 2020 9급 이론종합 [행정/세무/출관직] 선택형 내맘대로 패키지 2</a>
                                </div>
                            </td>
                            <td class="w-sp btnBlue">
                            <a href="{{ site_url('/home/html/diypackage') }}">강좌선택</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tx-left pl25">
                                <div class="w-tit">
                                    <a href="{{ site_url('/home/html/diypackage') }}"> 2020 9급 이론종합 [행정/세무/출관직] 선택형 내맘대로 패키지 3</a>
                                </div>
                            </td>
                            <td class="w-sp btnBlue">
                                <a href="{{ site_url('/home/html/diypackage') }}">강좌선택</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->
            </div>
            <!-- willbes-Lec-Table -->

            <div class="TopBtn">
                <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
            </div>
            <!-- TopBtn-->
        </div>
        <!-- willbes-Lec -->

        <div id="InfoForm" class="willbes-Layer-Box d2">
            <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">
                2018 최진우 독한국사 이론강의 (7-8월)[이론/끝장전/주간스포트라이트] 독구다 패키지
            </div>
            <div class="lecDetailWrap">
                <div class="classInfo">
                    <dl class="w-info NG">
                        <dt>개강일 : <span class="tx-blue">2017년 07월 11일</span></dt>
                        <dt><span class="row-line">|</span></dt>
                        <dt>수강기간 : <span class="tx-blue">100일</span></dt>
                        <dt class="NSK ml15">
                            <span class="nBox n1">2배수</span>
                            <span class="nBox n2">진행중</span>
                            <span class="nBox n3">예정</span>
                            <span class="nBox n4">완강</span>
                        </dt>
                    </dl>
                </div>
                <div class="classInfoTable">
                    <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
                        <colgroup>
                            <col style="width: 140px;">
                            <col width="*">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="w-list bg-light-white">
                                    강좌유의사항<br/>
                                    <span class="tx-red">(필독)</span>
                                </td>
                                <td class="w-data tx-left pl25">
                                    LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                    자동출력됩니다. (온라인상품기준)
                                </td>
                            </tr>
                            <tr>
                                <td class="w-list bg-light-white">강좌소개</td>
                                <td class="w-data tx-left pl25">
                                    LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                    자동출력됩니다. (온라인상품기준)
                                </td>
                            </tr>
                            <tr>
                                <td class="w-list bg-light-white">강좌특징</td>
                                <td class="w-data tx-left pl25">
                                    LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                    자동출력됩니다. (온라인상품기준)
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- willbes-Layer-Box -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop