@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">경찰학원</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">교수진소개</a>
                </li>
                <li>
                    <a href="#none">종합반</a>
                </li>
                <li>
                    <a href="#none">단과</a>
                </li>
                <li>
                    <a href="#none">수험정보</a>
                </li>
                <li>
                    <a href="#none">학원소개</a>
                </li>
                <li class="Acad">
                    <a href="#none">신광은경찰 온라인 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth"><span class="depth-Arrow">></span><strong>종합반</strong></span>
    </div>
    <div class="Content p_re">

        <div class="curriWrap c_both">
            <ul class="curriTabs c_both">
                <li><a class="on" href="#none">전체</a></li>
                <li><a href="#none">9/7급 공무원</a></li>
                <li><a href="#none">세무/관세</a></li>
                <li><a href="#none">법원직</a></li>
                <li><a href="#none">소방/방재</a></li>
                <li><a href="#none">기술직</a></li>
                <li><a href="#none">군무원</a></li>
                <li><a href="#none">부사관/장교</a></li>
                <li><a href="#none">부평경찰</a></li>
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
                            <th class="tx-gray">캠퍼스선택</th>
                            <td colspan="9">
                                <ul class="curriSelect">
                                    <li><a class="on" href="#none">노량진</a></li>
                                    <li><a href="#none">신림</a></li>
                                    <li><a href="#none">인천</a></li>
                                    <li><a href="#none">대구</a></li>
                                    <li><a href="#none">광주</a></li>
                                    <li><a href="#none">제주</a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th class="tx-gray">과정선택</th>
                            <td colspan="9">
                                <ul class="curriSelect">
                                    <li><a class="on" href="#none">전체</a></li>
                                    <li><a href="#none">이론과정</a></li>
                                    <li><a href="#none">심화과정</a></li>
                                    <li><a href="#none">문제풀이</a></li>
                                    <li><a href="#none">특강</a></li>
                                    <li><a href="#none">면접</a></li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- curriWrap -->

        <div class="willbes-Bnr">
            <img src="{{ img_url('sample/bnr6.jpg') }}">
        </div>
        <!-- willbes-Bnr -->

        <div class="willbes-Lec-Search mb15">
            <div class="inputBox p_re">
                <div class="selectBox">
                    <select id="select" name="select" title="강좌명" class="">
                        <option selected="selected">강좌명</option>
                        <option value="과목명">과목명</option>
                        <option value="교수명">교수명</option>
                        <option value="과정명">과정명</option>
                    </select>
                </div>
                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강의명" maxlength="30">
                <button type="submit" onclick="" class="search-Btn">
                    <span>검색</span>
                </button>
            </div>

            <div class="InfoBtnOff"><a href="pass/offinfo/boardInfo/index">강의시간표 안내 <span>▶</span></a></div>
            <div class="InfoBtn mr10"><a href="#none" onclick="openWin('requestInfo')">학원수강 안내 <span>▶</span></a></div>             
            
            <div id="requestInfo" class="willbes-Layer-requestInfo">
                <a class="closeBtn" href="#none" onclick="closeWin('requestInfo')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black">수강신청 <span class="tx-blue">안내</span></div>
                <div class="Layer-Cont">
                    <div class="Layer-SubTit tx-gray">
                        <ul>
                            <li>
                                <strong>학원강좌 수강신청 안내</strong><br>
                                - 학원에서 직접 수강할 수 있는 강좌입니다. (온라인>내강의실에서 수강 불가)  <br>
                                - 학원강좌는 장바구니 담기 없이 바로결제만 가능합니다.<br>
                                - <span class="tx-red">수강신청 후 정정신청이 불가능</span>합니다. 강의 구성을 꼼꼼히 살핀 후 수강신청해 주세요.
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
                                    <td><span class="acadBox n4">접수중</span></td>
                                    <td class="tx-left">강좌가 개설되었으며 현재 수강신청을 받고 있는 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="acadBox n5">접수예정</span></th>
                                    <td class="tx-left">신규강좌 개설되었으나 아직 수강신청을 받지 않는 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="acadBox n2">온라인접수</span></th>
                                    <td class="tx-left">온라인에서만 수강신청 및 결제가 가능한 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="acadBox n1">방문접수</span></th>
                                    <td class="tx-left">학원에 방문해야만 수강신청 및 결제가 가능한 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="acadBox n3">방문+온라인</span></th>
                                    <td class="tx-left">온라인에서 수강신청 및 결제, 학원방문 후 수강신청 및 결제가 모두 가능한 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="tx-blue">라이브</span></th>
                                    <td class="tx-left">실시간으로 송출되는 영상으로 수강할 수 있는 강좌 (영상반)</td>
                                </tr>
                                <tr>
                                    <th><span class="tx-blue">실강</span></th>
                                    <td class="tx-left">교수님이 수업하는 강의실에서 직접 수강할 수 있는 강좌</td>
                                </tr>
                                <tr>
                                    <th><img src="{{ img_url('sub/icon_detail.gif') }}"></th>
                                    <td class="tx-left">돋보기 아이콘 클릭 시 하단으로 해당 강좌의 상세정보 열림</td>    
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
            <div class="willbes-Lec-Subject tx-dark-black">· 종합반</div>
            <!-- willbes-Lec-Subject -->

            <div class="willbes-Lec-Line mt20">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Lec-Table p_re">
                <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 90px;">
                        <col style="width: 590px;">
                        <col style="width: 185px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-place bg-light-white">노량진</td>
                            <td class="w-list">문제<br/>풀이</td>
                            <td class="w-data tx-left pl15">
                                <div class="w-tit w-acad-tit"><a href="{{ site_url('/home/html/acad_list_packagesub_new') }}">[지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]</a></div>
                                <dl class="w-info acad">
                                    <dt>
                                        <a href="#none" onclick="openWin('InfoForm')">
                                            <strong>종합반 상세정보</strong>
                                        </a>
                                    </dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>개강월 : <span class="tx-blue">2018-02</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="acadBox n1">방문+온라인</span>
                                    </dt>
                                </dl><br/>
                            </td>
                            <td class="w-notice p_re">
                                <div class="acadInfo NSK n2">접수중</div>
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="price tx-blue">80,000원</span>
                                    <span class="discount">(↓20%)</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->
            </div>
            <!-- willbes-Lec-Table -->

            <div class="willbes-Lec-Table p_re">
                <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 90px;">
                        <col style="width: 590px;">
                        <col style="width: 185px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-place bg-light-white">노량진</td>
                            <td class="w-list">문제<br/>풀이</td>
                            <td class="w-data tx-left pl15">
                                <div class="w-tit w-acad-tit"><a href="{{ site_url('/home/html/acad_list_packagesub_new') }}">[지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]</a></div>
                                <dl class="w-info acad">
                                    <dt>
                                        <a href="#none" onclick="openWin('InfoForm')">
                                            <strong>종합반 상세정보</strong>
                                        </a>
                                    </dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>개강월 : <span class="tx-blue">2018-02</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강형태 : <span class="tx-blue">라이브</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="acadBox n2">방문접수</span>
                                    </dt>
                                </dl><br/>
                            </td>
                            <td class="w-notice p_re">
                                <div class="acadInfo NSK n1">접수예정</div>
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="price tx-blue">120,000원</span>
                                    <span class="discount">(↓20%)</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->
            </div>
            <!-- willbes-Lec-Table -->

            <div class="willbes-Lec-Table p_re">
                <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 90px;">
                        <col style="width: 590px;">
                        <col style="width: 185px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-place bg-light-white">노량진</td>
                            <td class="w-list">문제<br/>풀이</td>
                            <td class="w-data tx-left pl15">
                                <div class="w-tit w-acad-tit"><a href="{{ site_url('/home/html/acad_list_packagesub_new') }}">[지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]</a></div>
                                <dl class="w-info acad">
                                    <dt>
                                        <a href="#none" onclick="openWin('InfoForm')">
                                            <strong>종합반 상세정보</strong>
                                        </a>
                                    </dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>개강월 : <span class="tx-blue">2018-02</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강형태 : <span class="tx-blue">라이브</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="acadBox n2">방문접수</span>
                                    </dt>
                                </dl><br/>
                            </td>
                            <td class="w-notice p_re">
                                <div class="acadInfo NSK n3">마감</div>
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="price tx-blue">120,000원</span>
                                    <span class="discount">(↓20%)</span>
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

        <div id="InfoForm" class="willbes-Layer-Box d3">
            <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">
                2018 국가직대비 실전 동형모의고사 선택형 패키지
            </div>
            <div class="lecDetailWrap">
                <div class="classInfo">
                    <dl class="w-info NG">
                        <dt>개강일 : <span class="tx-blue">18/5/1</span></dt>
                        <dt><span class="row-line">|</span></dt>
                        <dt>종료일 : <span class="tx-blue">18/6/30</span></dt>
                    </dl>
                </div>
                <div class="classInfoTable">
                    <table cellspacing="0" cellpadding="0" class="classTable under-black tx-gray">
                        <colgroup>
                            <col style="width: 140px;">
                            <col width="*">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="w-list bg-light-white">강좌정보</td>
                                <td class="w-data tx-left pl25">
                                    LMS > 상품관리> [학원]상품관리> 단강좌 메뉴의 ‘강좌정보’ 항목에 입력된 정보가 자동 출력됩니다
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