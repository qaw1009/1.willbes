@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NGR c_both">
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

        <div class="willbes-Lec-Search p_re mb15">
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
                                    <dt>
                                        <a href="#none"><strong>강좌상세정보</strong></a>
                                    </dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="acadBox n3">방문+온라인</span>
                                    </dt>
                                </dl><br/>
                            </td>
                            <td class="w-schedule">
                                <span class="tx-blue">2018-05-20 ~ 2018-06-25</span><br/>
                                월화수목 (10회차)
                            </td>
                            <td class="w-notice p_re">
                                <div class="acadInfo NSK n2">접수중</div>
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="price tx-blue">
                                        <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                        80,000원</span>
                                    <span class="discount">(↓20%)</span>                                    
                                </div> 
                                <div class="visitBuy"><a href="#none">방문결제</a></div>                          
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
                                    <dt>
                                        <a href="#none"><strong>강좌상세정보</strong></a>
                                    </dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="acadBox n2">온라인 접수</span>
                                    </dt>
                                </dl><br/>
                            </td>
                            <td class="w-schedule">
                                <span class="tx-blue">2018-05-20 ~ 2018-06-30</span><br/>
                                월화수 (10회차)
                            </td>
                            <td class="w-notice p_re">
                                <div class="acadInfo NSK n1">접수예정</div>
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

        <div class="willbes-Lec NG c_both">
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
                                    <dt>
                                        <a href="#none"><strong>강좌상세정보</strong></a>
                                    </dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강형태 : <span class="tx-blue">라이브</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="acadBox n1">방문접수</span>
                                    </dt>
                                </dl><br/>
                            </td>
                            <td class="w-schedule">
                                <span class="tx-blue">2018-05-20 ~ 2018-06-25</span><br/>
                                월수금 (10회차)
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

        <div class="mb60"></div>

        <div class="willbes-Lec-buyBtn">
            <ul>
                <li class="btnAuto180 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                        <span class="tx-light-blue">바로결제</span>
                    </button>
                </li>
            </ul>
        </div>

        <div id="buy_layer" class="willbes-Lec-buyBtn-sm NG">
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