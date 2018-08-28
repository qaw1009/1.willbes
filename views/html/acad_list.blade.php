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
        <span class="1depth"><span class="depth-Arrow">></span><strong>단과</strong></span>
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
                        <tr>
                            <th class="tx-gray">과목선택</th>
                            <td colspan="9">
                                <ul class="curriSelect">
                                    <li><a class="on" href="#none">전체</a></li>
                                    <li><a href="#none">국어</a></li>
                                    <li><a href="#none">영어</a></li>
                                    <li><a href="#none">한국사</a></li>
                                    <li><a href="#none">행정법</a></li>
                                    <li><a href="#none">행정학</a></li>
                                    <li><a href="#none">교육학</a></li>
                                    <li><a href="#none">사회</a></li>
                                    <li><a href="#none">수학</a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th class="tx-gray">교수선택</th>
                            <td colspan="9" class="tx-blue tx-left">* 과목 선택시 과목별 교수진을 확인하실 수 있습니다. 과목을 먼저 선택해 주세요!</td>
                            <!-- 과목선택 시 해당 과목 교수 출력
                            <td colspan="9">
                                <ul class="curriSelect">
                                    <li><a class="on" href="#none">정채영</a></li>
                                    <li><a href="#none">기미진</a></li>
                                    <li><a href="#none">김세령</a></li>
                                    <li><a href="#none">오대혁</a></li>
                                    <li><a href="#none">이현나</a></li>
                                    <li><a href="#none">정채영</a></li>
                                    <li><a href="#none">기미진</a></li>
                                    <li><a href="#none">김세령</a></li>
                                    <li><a href="#none">오대혁</a></li>
                                    <li><a href="#none">이현나</a></li>
                                    <li><a href="#none">정채영</a></li>
                                    <li><a href="#none">기미진</a></li>
                                    <li><a href="#none">김세령</a></li>
                                    <li><a href="#none">오대혁</a></li>
                                    <li><a href="#none">이현나</a></li>
                                </ul>
                            </td>
                            -->
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
            <div class="InfoBtn ml10"><a href="#none">강의시간표 안내 <span>▶</span></a></div>
            <div class="InfoBtn"><a href="#none">학원수강 안내 <span>▶</span></a></div>
        </div>
        <!-- willbes-Lec-Search -->

        <div class="willbes-Lec NG c_both">
            <div class="willbes-Lec-Subject tx-dark-black">· 국어<span class="MoreBtn"><a href="#none">강좌정보 <span>전체보기 ▼</span></a></span></div>
            <!-- willbes-Lec-Subject -->

            <div class="willbes-Lec-Line mt20">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 85px;">
                        <col style="width: 75px;">
                        <col style="width: 355px;">
                        <col style="width: 165px;">
                        <col style="width: 185px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-place">노량진</td>
                            <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                            <td class="w-list">이론</td>
                            <td class="w-data tx-left">
                                <div class="w-tit w-acad-tit">[지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]</div>
                                <dl class="w-info acad">
                                    <dt class="mr20">
                                        <a href="#none"><strong>강좌상세정보</strong></a>
                                    </dt>
                                    <dt class="NSK">
                                        <span class="acadBox n1">방문+온라인</span>
                                    </dt>
                                </dl><br/>
                            </td>
                            <td class="w-schedule">
                                <span class="tx-blue">5/1 ~ 6/30</span> (16회차)<br/>
                                월~금 14:00 ~ 18:00
                            </td>
                            <td class="w-notice p_re">
                                <div class="acadInfo NSK n1">접수중</div>
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="price tx-blue">
                                        <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                        80,000원</span>
                                    <span class="discount">(↓20%)</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

                <table cellspacing="0" cellpadding="0" class="lecInfoTable acadlecInfoTable">
                    <tbody>
                        <tr>
                            <td>
                                <div class="w-tit tx-black">▷ 강좌정보</div>
                                <div class="w-txt">
                                    <strong>[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</strong><br/>
                                    <span class="tx-blue">· 강의일정 :</span> 5.21(월)~6.11(월) 매주월요일08:40~13:00 총4회<br/>
                                    <span class="tx-blue">· 강의교재 :</span> 2018 정채영 국어 필살기 모의고사 특수 제작 프린트 (자체제공)<br/>
                                    <span class="tx-blue">· 강의특징 :</span>실전보다 빠르게 문제를 풀어내는 속도와 정확한 해설과 명쾌한 적중으로 국어 고득점이 자연스럽게 이루어지는 실전모의고사<br/>
                                    <span class="tx-blue">· 강의대상 :</span> 2018 공무원 시험 필기 합격을 위한 준비하는 수험생<br/>
                                    * 강의일정은 학원 사정으로 인하여 추후 변동될 수 있습니다.<br/>
                                </div>            

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecInfoTable -->
            </div>
            <!-- willbes-Lec-Table -->

            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 85px;">
                        <col style="width: 75px;">
                        <col style="width: 355px;">
                        <col style="width: 165px;">
                        <col style="width: 185px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-place">노량진</td>
                            <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                            <td class="w-list">이론</td>
                            <td class="w-data tx-left">
                                <div class="w-tit w-acad-tit">[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</div>
                                <dl class="w-info acad">
                                    <dt class="mr20">
                                        <a href="#none"><strong>강좌상세정보</strong></a>
                                    </dt>
                                    <dt class="NSK">
                                        <span class="acadBox n2">방문접수</span>
                                    </dt>
                                </dl><br/>
                            </td>
                            <td class="w-schedule">
                                <span class="tx-blue">5/3 ~ 6/30</span> (16회차)<br/>
                                월~금 14:00 ~ 18:00
                            </td>
                            <td class="w-notice p_re">
                                <div class="acadInfo NSK n2">접수예정</div>
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="price tx-blue">
                                        <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                        120,000원</span>
                                    <span class="discount">(↓10%)</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

                <table cellspacing="0" cellpadding="0" class="lecInfoTable acadlecInfoTable">
                    <tbody>
                        <tr>
                            <td>
                                <div class="w-tit tx-black">▷ 강좌정보</div>
                                <div class="w-txt">
                                    <strong>[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</strong><br/>
                                    <span class="tx-blue">· 강의일정 :</span> 5.21(월)~6.11(월) 매주월요일08:40~13:00 총4회<br/>
                                    * 강의일정은 학원 사정으로 인하여 추후 변동될 수 있습니다.<br/>
                                </div>            

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecInfoTable -->
            </div>
            <!-- willbes-Lec-Table -->
        </div>
        <!-- willbes-Lec -->

        <div class="willbes-Lec NG c_both mb60">
            <div class="willbes-Lec-Subject tx-dark-black">· 영어<span class="MoreBtn"><a href="#none">강좌정보 <span>전체보기 ▼</span></a></span></div>
            <!-- willbes-Lec-Subject -->

            <div class="willbes-Lec-Line mt20">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 85px;">
                        <col style="width: 75px;">
                        <col style="width: 355px;">
                        <col style="width: 165px;">
                        <col style="width: 185px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-place">노량진</td>
                            <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                            <td class="w-list">이론</td>
                            <td class="w-data tx-left">
                                <div class="w-tit w-acad-tit">[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</div>
                                <dl class="w-info acad">
                                    <dt class="mr20">
                                        <a href="#none"><strong>강좌상세정보</strong></a>
                                    </dt>
                                    <dt class="NSK">
                                        <span class="acadBox n3">온라인 접수</span>
                                    </dt>
                                </dl><br/>
                            </td>
                            <td class="w-schedule">
                                <span class="tx-blue">5/3 ~ 6/30</span> (16회차)<br/>
                                월~금 14:00 ~ 18:00
                            </td>
                            <td class="w-notice p_re">
                                <div class="acadInfo NSK n3">마감</div>
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="price tx-blue">
                                        <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                        120,000원</span>
                                    <span class="discount">(↓10%)</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

                <table cellspacing="0" cellpadding="0" class="lecInfoTable acadlecInfoTable">
                    <tbody>
                        <tr>
                            <td>
                                <div class="w-tit tx-black">▷ 강좌정보</div>
                                <div class="w-txt">
                                    <strong>[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</strong><br/>
                                    <span class="tx-blue">· 강의일정 :</span> 5.21(월)~6.11(월) 매주월요일08:40~13:00 총4회<br/>
                                    <span class="tx-blue">· 강의교재 :</span> 2018 정채영 국어 필살기 모의고사 특수 제작 프린트 (자체제공)<br/>
                                    <span class="tx-blue">· 강의특징 :</span>실전보다 빠르게 문제를 풀어내는 속도와 정확한 해설과 명쾌한 적중으로 국어 고득점이 자연스럽게 이루어지는 실전모의고사<br/>
                                    <span class="tx-blue">· 강의대상 :</span> 2018 공무원 시험 필기 합격을 위한 준비하는 수험생<br/>
                                    * 강의일정은 학원 사정으로 인하여 추후 변동될 수 있습니다.<br/>
                                </div>            

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecInfoTable -->
            </div>
            <!-- willbes-Lec-Table -->
        </div>
        <!-- willbes-Lec -->

        <div class="willbes-Lec-buyBtn">
            <ul>
                <li class="btnAuto180 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                        <span>방문접수</span>
                    </button>
                </li>
                <li class="btnAuto180 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                        <span class="tx-light-blue">바로결제</span>
                    </button>
                </li>
            </ul>
        </div>
        <!-- willbes-Lec-buyBtn -->

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
                        <dt>개강일 : <span class="tx-blue">18/5/1 ~ 18/6/30 (16회차)</span></dt>
                        <dt><span class="row-line">|</span></dt>
                        <dt>월~금 : <span class="tx-blue">14:00 ~ 18:00</span></dt>
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
        <div id="buy_layer" class="willbes-Lec-buyBtn-sm NG">
            <div>
                <button type="submit" onclick="openWin('pocketBox')" class="bg-deep-gray">
                    <span>방문접수</span>
                </button>
            </div>
            <div>
                <button type="submit" onclick="" class="bg-dark-blue">
                    <span>바로결제</span>
                </button>
            </div>
        </div>
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<script src="/public/js/willbes/product_util.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.goods_chk').on('change', function() {
            showBuyLayer('off', $(this), 'buy_layer');
        });
    });
</script>

<!-- End Container -->
@stop