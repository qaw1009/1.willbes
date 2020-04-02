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
        <span class="2depth"><span class="depth-Arrow">></span><strong>추천패키지</strong></span>
    </div>
    <div class="Content p_re">

        <div class="curriWrap c_both">
            <ul class="curriTabs c_both">
                <li><a href="#none">전체</a></li>
                <li><a href="#none">이론과정</a></li>
                <li><a href="#none">심화과정</a></li>
                <li><a href="#none">문제풀이</a></li>
                <li><a href="#none" class="on">특강</a></li>
            </ul>
            <div class="CurriBox">
                <table cellspacing="0" cellpadding="0" class="curriTable">
                    <colgroup>
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                    </colgroup>
                    <tbody>
                        <tr>
                            <th class="tx-gray">대비년도</th>
                            <td colspan="8" class="tx-left">
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
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- curriWrap -->

        <div class="willbes-Bnr">
            <img src="{{ img_url('sample/bnr3.jpg') }}">
        </div>
        <!-- willbes-Bnr -->

        <div class="willbes-Lec-Search p_re mb15">
            <div class="inputBox p_re">
                <div class="selectBox">
                    <select id="select" name="select" title="직접입력" class="">
                        <option selected="selected">직접입력</option>
                        <option value="강좌명">강좌명</option>
                        <option value="과목명">과목명</option>
                        <option value="교수명">교수명</option>
                        <option value="과정명">과정명</option>
                    </select>
                </div>
                <input type="text" id="SEARCH" name="SEARCH" placeholder="강의명" class="labelSearch" maxlength="30">
                <button type="submit" onclick="" class="search-Btn">
                    <span>검색</span>
                </button>
            </div>

            <div class="InfoBtn"><a href="#none" onclick="openWin('requestInfo')">수강신청안내 <span>▶</span></a></div>
            <div id="requestInfo" class="willbes-Layer-requestInfo">
                <a class="closeBtn" href="#none" onclick="closeWin('requestInfo')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black">수강신청 <span class="tx-blue">안내</span></div>
                <div class="Layer-Cont">
                    <div class="Layer-SubTit tx-gray">
                        <ul>
                            <li>
                                <strong>도서구입비 소득공제 시행에 따른 분리결제 적용 안내</strong><br>
                                - 소득공제 대상 상품(교재)와 비대상 상품 (강의)을 함께 주문하실 수 없습니다. <br>
                                (소득공제를 위한 가맹점 분리로 인해 2회 결제 진행)<br>
                                - 반드시 <span class="tx-red">강의와 교재를 각각 결제</span>해주시기 바랍니다. (강좌상품 선구매 후 교재 구매 가능)
                            </li>
                            <li>
                                <strong>아이콘 안내</strong><br>
                                - 강좌리스트에 보여지고 있는 아이콘에 대한 설명입니다. 참고하시어 수강신청해 주세요.
                            </li>
                        </ul>
                    </div>
                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable csTable under-gray upper-black tx-gray">
                            <colgroup>
                                <col style="width: 130px;">
                                <col style="width: auto;">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td><span class="nBox n4">완강</span></td>
                                    <td class="tx-left">모든 강의 제작 및 업데이트가 완료된 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="nBox n2">진행중</span></th>
                                    <td class="tx-left">강의 업데이트가 진행중인 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="nBox n3">예정</span></th>
                                    <td class="tx-left">신규강좌 업데이트가 예정중인 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="nBox n1">2배수</span></th>
                                    <td class="tx-left">공유 방지를 위해 전체강의시간/개별강의시간의 2배까지 수강이 가능한 강좌</td>
                                </tr>
                                <tr>
                                    <th><img src="{{ img_url('sub/icon_detail.gif') }}"></th>
                                    <td class="tx-left">돋보기 아이콘 클릭 시 해당 강좌의 상세정보 팝업 노출</td>    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- requestInfo //-->
        </div>
        <!-- willbes-Lec-Search -->

        <div class="willbes-Lec NG c_both">
            <div class="willbes-Lec-Subject tx-dark-black">추천패키지</div>
            <!-- willbes-Lec-Subject -->

            <div class="willbes-Lec-Line">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Lec-Table d_block">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 95px;">
                        <col style="width: 665px;">
                        <col style="width: 180px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list bg-light-white">이론</td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">
                                    <a href="{{ site_url('/home/html/packagesub1') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info">
                                    <dt class="mr20">
                                        <a href="#none" onclick="openWin('InfoForm')">
                                            <strong>패키지상세정보</strong>
                                        </a>
                                    </dt>
                                    <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="tx-blue">30일</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n2">진행중</span>
                                        <span class="nBox n3">예정</span>
                                        <span class="nBox n4">완강</span>
                                    </dt>
                                </dl>
                            </td>
                            <td class="w-notice">
                                <div class="priceWrap">
                                    <span class="price tx-blue">156,000원</span>
                                    <span class="discount">(↓40%)</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list bg-light-white">이론</td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                <dl class="w-info">
                                    <dt class="mr20">
                                        <a href="#none" onclick="openWin('InfoForm')">
                                            <strong>패키지상세정보</strong>
                                        </a>
                                    </dt>
                                    <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="tx-blue">30일</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n2">진행중</span>
                                        <span class="nBox n3">예정</span>
                                        <span class="nBox n4">완강</span>
                                    </dt>
                                </dl>
                            </td>
                            <td class="w-notice">
                                <div class="priceWrap">
                                    <span class="price tx-blue">156,000원</span>
                                    <span class="discount">(↓40%)</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list bg-light-white">문제풀이</td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">2017 (하반기 지방직 대비) 페트라 출제포인트 패키지</div>
                                <dl class="w-info">
                                    <dt class="mr20">
                                        <a href="#none" onclick="openWin('InfoForm')">
                                            <strong>패키지상세정보</strong>
                                        </a>
                                    </dt>
                                    <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="tx-blue">15일</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n4">완강</span>
                                    </dt>
                                </dl>
                            </td>
                            <td class="w-notice">
                                <div class="priceWrap">
                                    <span class="price tx-blue">72,000원</span>
                                    <span class="discount">(↓60%)</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list bg-light-white">문제풀이</td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">2017 (하반기 지방직 대비) 페트라 출제포인트 패키지</div>
                                <dl class="w-info">
                                    <dt class="mr20">
                                        <a href="#none" onclick="openWin('InfoForm')">
                                            <strong>패키지상세정보</strong>
                                        </a>
                                    </dt>
                                    <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="tx-blue">15일</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n4">완강</span>
                                    </dt>
                                </dl>
                            </td>
                            <td class="w-notice">
                                <div class="priceWrap">
                                    <span class="price tx-blue">72,000원</span>
                                    <span class="discount">(↓60%)</span>
                                </div>
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