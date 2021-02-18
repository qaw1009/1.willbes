@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">자격증<span class="row-line">|</span></li>
                <li class="subTit">공인노무사</li>
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
        <span class="depth"><span class="depth-Arrow">></span><strong>단과반수강신청</strong></span>
        <span class="depth"><span class="depth-Arrow">></span><strong>공인노무사</strong></span>
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
                                    <li><a href="#none">부산</a></li>
                                    <li><a href="#none">인천</a></li>
                                    <li><a href="#none">대구</a></li>
                                    <li><a href="#none">광주</a></li>
                                    <li><a href="#none">제주</a></li>
                                    <li><a href="#none">경기광주(기숙형)</a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th class="tx-gray">과정선택</th>
                            <td colspan="9">
                                <ul class="curriSelect curriSelect2">
                                    <li><a class="on" href="#none">전체</a></li>
                                    <li><a href="#none">이론과정</a></li>
                                    <li><a href="#none">심화과정</a></li>
                                    <li><a href="#none">문제풀이</a></li>
                                    <li><a href="#none">특강</a></li>
                                    <li><a href="#none">면접</a></li>
                                    <li><a href="#none">문풀1단계 핵심요약/진도별</a></li>
                                    <li><a href="#none">문풀2단계 동형모의고사</a></li>
                                    <li><a href="#none">문풀3단계 파이널모의고사</a></li>
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
                                    <li><a href="#none">통합생활관리반</a></li>
                                    <li><a href="#none">불금모의고사</a></li>
                                    <li><a href="#none">기본튜터링 관리반</a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th class="tx-gray">교수선택</th>
                            <td colspan="9" class="tx-blue tx-left">* 과목 선택시 과목별 교수진을 확인하실 수 있습니다. 과목을 먼저 선택해 주세요!</td> 
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- curriWrap -->

        <div class="willbes-Mypage-TESTZONE c_both mt30">
            <div class="willbes-Cart-Txt willbes-Mypage-Txt NGR p_re pb20">
                <p class="title"><span class="tx-red mr10">[필독!]</span><a href="#none">선접수 수강신청 안내사항 ▼</a></p>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black pb-zero" style="display:none">
                    <tbody>
                        <tr>
                            <td>
                            <strong>1. 선접수 수강신청 대상</strong><br>
                            * GS-1순환 김기홍 행정쟁송법 실강·실영상 수강생<br>
                            * GS-1순환 김유미 인사노무관리 실강·실영상 수강생<br>
                            * GS-1순환 김유미 경영조직 실강/실영상 실강·실영상 수강생<br>
                            <br>
                            <strong>2. 수강신청 기간 : 홈페이지 및 선접수 수강신청 대상자 추후 문자공지 예정</strong><br>
                            <span class="tx-red">* 상기 기간 이후 수강신청은 방문접수로만 가능합니다.</span><br>
                            <br>
                            <strong>3. 수강신청 강의 : GS-2순환 김기홍 행정쟁송법, 김유미 인사노무관리/경영조직</strong><br>
                            <br>
                            <strong>4. 선접수 과목 등록하면서 일반접수 과목 함께 등록하는 경우</strong><br>
                            * 예시1. 김유미T 강의 선접수 대상자 but 김기홍T 강의 일반접수 대상자인 경우<br>
                            ▶ 선접수 기간에 김유미T 강의 + 김기홍T <span class="tx-shadow">실영상반</span> 접수 가능<br>
                            ▶ 선접수 기간에 김기홍T 실강 강의가 마감 안된 경우 <br>
                                일반접수 기간에 김기홍T 실영상반 → 실강반 변경 가능<br>
                            * 예시2. 김기홍T 강의 선접수 대상자 but 김유미T 강의 일반접수 대상자인 경우<br>
                            ▶선접수 기간에 <span class="tx-shadow">김기홍T 강의만 접수 가능</span> + <span class="tx-shadow">일반접수 기간</span>에 <span class="tx-shadow">김유미T 강의 접수 가능</span><br>
                            * 예시3. 김유미 or 김기홍 선접수 대상자가 선접수 기간에 그외 일반접수 과목(ex: 김정일T 행정쟁송) 같이 접수 가능<br>
                            <br>
                            <strong>5. 종합반의 경우 종합반 수강신청 기간에 실강/실영상 마감제한 없이 수강신청 가능</strong><br>
                            (종합반 수강신청 기간 종합반 카페 및 문자 공지 예정)<br>
                            * 종합반의 경우는 GS-2순환 강의 4과목을 선택하셔야 수강신청이 완료됩니다.<br>
                            <strong>6. 기타 선접수 관련 사항</strong><br>
                            * 교차 선접수 가능<br>
                            예시) 김유미T GS1 평일 인사관리 수강 → 김유미T GS2 주말 인사관리 신청 가능<br>
                            * 선접수 대상자 내에서도 실강 경쟁有 (단, 선접수 기간 동안 실영상반은 마감 없이 신청 가능) <br>
                            <br>
                            <strong>7. 수강신청 방법 : 방문신청 가능, 온라인신청 가능(모바일 신청 불가)</strong><br>
                            * 온라인 수강신청 방법 : <span class="tx-red">홈페이지 로그인(필수)</span> → 우측 상단 학원수강신청 > "선접수 수강신청" 메뉴 클릭<br>
                            * 종합반 원서에 작성된 성함/연락처와 동일한 성함/연락처 정보로 홈페이지 회원 가입 및 로그인을 하셔야 합니다.<br>
                            * 3/9(월) 11시부터 "선접수 수강신청" 메뉴가 노출됩니다.<br>
                            <br>
                            <strong>8. 수강신청 완료 여부 및 신청 과목 확인 방법</strong><br>
                            (통합 홈페이지 수강신청 내역 확인 방법_기존 방법 예시입니다.)<br>
                            홈페이지 로그인 → 내 강의실 → 학원강좌 → 수강신청강좌 에서 확인<br>
                            <span class="tx-shadow">* 별도의 수강증을 발급받지 않으셔도 학원 수강정보에서 신청이 확인되시면 수강신청이 확정된 것으로 수강증은 추후 강의실 입장 전까지
                            데스크에서 발급받으시기 바랍니다. <br>
                            * 수강증 발급 순서가 아닌 온라인or방문접수 수강신청 순으로 실강/실영상반 수강신청이 확정됩니다.</span>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>

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
            <div class="willbes-Lec-Subject tx-dark-black">· 국어<span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span></div>
            <!-- willbes-Lec-Subject -->

            <div class="willbes-Lec-Line mt20">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 65px;">
                        <col style="width: 85px;">
                        <col style="width: 85px;">
                        <col width="*">
                        <col style="width: 140px;">
                        <col style="width: 100px;">
                        <col style="width: 140px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-place">노량진</td>
                            <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                            <td class="w-list">이론</td>
                            <td class="w-data tx-left">
                                <div class="w-tit w-acad-tit">
                                    <a href="#none">[지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]</s>
                                </div>
                                <dl class="w-info">
                                    <dt>
                                        <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                            <strong>강좌상세정보</strong>
                                        </a>
                                    </dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                    <dt class="ml15">
                                        <span class="acadBox n3">방문+온라인</span>
                                        <span class="acadBox n7">선접수</span>
                                    </dt>
                                </dl>
                            </td>
                            <td class="w-schedule">
                                <span class="tx-blue">2018-05-20 <br>~ 2018-06-25</span><br/>
                                월화수목 (10회차)
                            </td>
                            <td>
                                <ul class="lecBuyBtns">
                                    <li class="btnCart">
                                        <a onclick="openWin('pocketBox')" >장바구니</a>
                                        <div id="pocketBox" class="pocketBox">
                                            <a class="closeBtn" href="#none" onclick="closeWin('pocketBox')">
                                                <img src="{{ img_url('cart/close.png') }}">
                                            </a>
                                            해당 상품이 장바구니에 담겼습니다.<br/>
                                            장바구니로 이동하시겠습니까?
                                            <ul class="NSK mt20">
                                                <li class="aBox answerBox_block"><a href="#none">예</a></li>
                                                <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                                                <li class="aBox closeBox_block"><a href="#none" onclick="closeWin('pocketBox')">닫기</a></li>
                                            </ul>
                                        </div>
                                    </li>                                    
                                    <li class="btnBuy"><a href="#none">바로결제</a></li>
                                </ul>
                            </td>
                            <td class="w-notice">
                                <div class="acadInfo n2">접수중</div>
                                <div class="priceWrap">
                                    <span class="price">80,000원</span>
                                    <span class="discount">20% ↓</span>
                                    <span class="dcprice">64,000원</span>
                                </div> 
                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>                         
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

                <div class="lecInfoTable bookInfoTable">
                    <ul>
                        <li>
                            <div class="b-obj">
                                <span>수강생 교재</span> 
                                2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)
                            </div>
                            <div class="bookBuyBtns">
                                <a href="#none" class="btnCart">장바구니</a>
                                <a href="#none" class="btnBuy">바로결제</a>
                            </div>
                            <div class="bookbuyInfo">
                                <label>[판매중]</label>
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none">
                                <span class="tx-blue">30,000원</span>
                                <span class="tx-dark-gray">(↓10%)</span>
                            </div>
                        </li>
                        <li>
                            <div class="b-obj">
                                <span>주교재</span> 
                                정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)
                            </div>
                            <div class="bookBuyBtns">
                                <a href="#none" class="btnCart">장바구니</a>
                                <a href="#none" class="btnBuy">바로결제</a>
                            </div>
                            <div class="bookbuyInfo">                                
                                <label class="tx-red">[품절]</label>
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                <span class="tx-blue">20,000원</span>
                                <span class="tx-dark-gray">(↓10%)</span>
                            </div>
                        </li>
                        <li>
                            <div class="b-obj">
                                <span>부교재</span> 
                                2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)
                            </div>
                            <div class="bookBuyBtns">
                                <a href="#none" class="btnCart">장바구니</a>
                                <a href="#none" class="btnBuy">바로결제</a>
                            </div>
                            <div class="bookbuyInfo">
                                <label class="tx-purple-gray ">[출간예정]</label>
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                <span class="tx-blue">0원</span>
                            </div>
                        </li>
                    </ul>
                    <div class="tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>                                
                    <div>
                        <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                    </div>
                </div>
            </div>
            <!-- willbes-Lec-Table -->

            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 65px;">
                        <col style="width: 85px;">
                        <col style="width: 85px;">
                        <col width="*">
                        <col style="width: 140px;">
                        <col style="width: 100px;">
                        <col style="width: 140px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-place">노량진</td>
                            <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                            <td class="w-list">이론</td>
                            <td class="w-data tx-left">
                                <div class="w-tit w-acad-tit">[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</div>
                                <dl class="w-info">
                                    <dt>
                                        <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                            <strong>강좌상세정보</strong>
                                        </a>
                                    </dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                    <dt class="ml15">
                                        <span class="acadBox n3">방문+온라인</span>
                                        <span class="acadBox n7">선접수</span>
                                    </dt>
                                </dl>
                            </td>
                            <td class="w-schedule">
                                <span class="tx-blue mb5">2018-05-20 <br/>~ 2018-06-30</span><br/>
                                월화수 (10회차)
                            </td>
                            <td>
                                <ul class="lecBuyBtns">
                                    <li class="btnCart"><a href="#none">장바구니</a></li>                                    
                                    <li class="btnBuy"><a href="#none">바로결제</a></li>
                                </ul>
                            </td>
                            <td class="w-notice p_re">
                                <div class="acadInfo n1">접수예정</div>
                                <div class="priceWrap">
                                    <span class="price">80,000원</span>
                                    <span class="discount">20% ↓</span>
                                    <span class="dcprice">64,000원</span>
                                </div> 
                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

                <div class="lecInfoTable bookInfoTable">
                    <ul>
                        <li>
                            <div class="b-obj">
                                <span>수강생 교재</span> 
                                2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)
                            </div>
                            <div class="bookBuyBtns">
                                <a href="#none" class="btnCart">장바구니</a>
                                <a href="#none" class="btnBuy">바로결제</a>
                            </div>
                            <div class="bookbuyInfo">
                                <label>[판매중]</label>
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none">
                                <span class="tx-blue">30,000원</span>
                                <span class="tx-dark-gray">(↓10%)</span>
                            </div>
                        </li>
                        <li>
                            <div class="b-obj">
                                <span>주교재</span> 
                                정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)
                            </div>
                            <div class="bookBuyBtns">
                                <a href="#none" class="btnCart">장바구니</a>
                                <a href="#none" class="btnBuy">바로결제</a>
                            </div>
                            <div class="bookbuyInfo">                                
                                <label class="tx-red">[품절]</label>
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                <span class="tx-blue">20,000원</span>
                                <span class="tx-dark-gray">(↓10%)</span>
                            </div>
                        </li>
                        <li>
                            <div class="b-obj">
                                <span>부교재</span> 
                                2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)
                            </div>
                            <div class="bookBuyBtns">
                                <a href="#none" class="btnCart">장바구니</a>
                                <a href="#none" class="btnBuy">바로결제</a>
                            </div>
                            <div class="bookbuyInfo">
                                <label class="tx-purple-gray ">[출간예정]</label>
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                <span class="tx-blue">0원</span>
                            </div>
                        </li>
                    </ul>
                    <div class="tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>                                
                    <div>
                        <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                    </div>
                </div>
                <!-- lecInfoTable -->
            </div>
            <!-- willbes-Lec-Table -->
        </div>
        <!-- willbes-Lec -->

        <div class="willbes-Lec NG c_both">
            <div class="willbes-Lec-Subject tx-dark-black">· 영어<span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span></div>
            <!-- willbes-Lec-Subject -->

            <div class="willbes-Lec-Line mt20">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 65px;">
                        <col style="width: 85px;">
                        <col style="width: 85px;">
                        <col width="*">
                        <col style="width: 140px;">
                        <col style="width: 100px;">
                        <col style="width: 140px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-place">노량진</td>
                            <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                            <td class="w-list">이론</td>
                            <td class="w-data tx-left">
                                <div class="w-tit w-acad-tit">[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</div>
                                <dl class="w-info">
                                    <dt>
                                        <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                            <strong>강좌상세정보</strong>
                                        </a>
                                    </dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강형태 : <span class="tx-blue">라이브</span></dt>
                                    <dt class="ml15">
                                        <span class="acadBox n1">방문접수</span>
                                    </dt>
                                </dl>
                            </td>
                            <td class="w-schedule">
                                <span class="tx-blue">2018-05-20 <br/>~ 2018-06-25</span><br/>
                                월수금 (10회차)
                            </td>
                            <td>
                                <ul class="lecBuyBtns">
                                    <li class="btnVisit"><a href="#none">방문결제</a></li>
                                </ul>
                            </td>
                            <td class="w-notice p_re">
                                <div class="acadInfo n3">마감</div>
                                <div class="priceWrap">
                                    <span class="dcprice">64,000원</span>
                                </div> 
                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

                <div class="lecInfoTable bookInfoTable">
                    <ul>
                        <li>
                            <div class="b-obj">
                                <span>수강생 교재</span> 
                                2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)
                            </div>
                            <div class="bookBuyBtns">
                                <a href="#none" class="btnCart">장바구니</a>
                                <a href="#none" class="btnBuy">바로결제</a>
                            </div>
                            <div class="bookbuyInfo">
                                <label>[판매중]</label>
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none">
                                <span class="tx-blue">30,000원</span>
                                <span class="tx-dark-gray">(↓10%)</span>
                            </div>
                        </li>
                        <li>
                            <div class="b-obj">
                                <span>주교재</span> 
                                정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)
                            </div>
                            <div class="bookBuyBtns">
                                <a href="#none" class="btnCart">장바구니</a>
                                <a href="#none" class="btnBuy">바로결제</a>
                            </div>
                            <div class="bookbuyInfo">                                
                                <label class="tx-red">[품절]</label>
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                <span class="tx-blue">20,000원</span>
                                <span class="tx-dark-gray">(↓10%)</span>
                            </div>
                        </li>
                        <li>
                            <div class="b-obj">
                                <span>부교재</span> 
                                2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)
                            </div>
                            <div class="bookBuyBtns">
                                <a href="#none" class="btnCart">장바구니</a>
                                <a href="#none" class="btnBuy">바로결제</a>
                            </div>
                            <div class="bookbuyInfo">
                                <label class="tx-purple-gray ">[출간예정]</label>
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                <span class="tx-blue">0원</span>
                            </div>
                        </li>
                    </ul>
                    <div class="tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>                                
                    <div>
                        <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                    </div>
                </div>
                {{--
                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 865px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <div class="w-sub">
                                    <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                    <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                    <span class="chk buybtn p_re">
                                        <label>[판매중]</label>
                                        <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                    </span>
                                    <span class="priceWrap">
                                        <span class="price tx-blue">30,000원</span>
                                        <span class="discount">(↓10%)</span>
                                    </span>
                                </div>
                                <div class="w-sub">
                                    <span class="w-obj tx-blue tx11">주교재</span> 
                                    <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                    <span class="chk">
                                        <label class="soldout">[품절]</label>
                                        <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                    </span>
                                    <span class="priceWrap">
                                        <span class="price tx-blue">20,000원</span>
                                        <span class="discount">(↓10%)</span>
                                    </span>
                                </div>
                                <div class="w-sub">
                                    <span class="w-obj tx-blue tx11">부교재</span> 
                                    <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                    <span class="chk">
                                        <label class="press">[출간예정]</label>
                                        <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                    </span>
                                    <span class="priceWrap">
                                        <span class="price tx-blue">0원</span>
                                    </span>
                                </div>
                                <div class="w-sub  tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                <div class="w-sub">
                                    <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                --}}
                <!-- lecInfoTable -->
            </div>
            <!-- willbes-Lec-Table -->
        </div>
        <!-- willbes-Lec -->

        <div id="InfoForm" class="willbes-Layer-Box">
            <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">
                2018 기미진 국어 아침 실전 동형모의고사 특강[국가직 ~서울시] (3-6월)
            </div>
            <div class="lecDetailWrap">
                <ul class="tabWrap tabDepth1 NG">
                    <li><a id="hover1" href="#ch1" class="on">강좌상세정보</a></li>
                    <li><a id="hover2" href="#ch2">교재상세정보 (총 2권)</a></li>
                </ul>
                <div class="tabBox">
                    <div id="ch1" class="tabLink">
                        <div class="classInfo">
                            <dl class="w-info NG">
                                <dt>강의수 : <span class="tx-blue">70강</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>수강기간 : <span class="tx-blue">50일</span></dt>
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
                                            수강대상
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            1. 전직렬 기출문제를 통해 출제 포인트와 최신 경향을 파악하고 싶은 수험생  
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-list bg-light-white">
                                            강좌소개<br/>
                                            (강좌구성)
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            1. 전직렬 기출문제를 풀면서 기출지문의 핵심 포인트를 학습할 수 있는 강좌입니다.<br/>
                                            2. 경찰 간부, 승진문제까지 수록하여 간부시험이나 승진시험까지도 준비할 수 있는 강좌입니다.<br/>
                                            3. 간략한 이론 설명과 기출 지문 분석을 통해 애매하거나 헷갈린 부분까지 완벽하게 정리할 수 있는 강좌입니다. <br/>
                                            4. 강의일정 : 12/2(월)~12/12(토), 총 12회 강의<br/>
                                            5. 강의시간 :  월~토 [09:00~13:00] <br/>
                                            6. 교재 : 형사소송법 신의 한 수 기출총정리 스텝2(전면개정판)<br/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-list bg-light-white">강좌효과</td>
                                        <td class="w-data tx-left pl25">
                                            1. 단순히 기출 원문을 나열한 것이 아닌 신광은 교수님만의 노하우를 바탕으로 모든 지문을 새롭게 다시 구성한 신의 한 수 기출총정리로 학습하는 강의로서, 한 문제를 풀어도 관련 내용이 자연스레 연상되는 학습효과를 볼 수 있습니다.<br/>
                                            2. 최근 시험 경향과 크게 맞지 않는 지문이나 중복되는 지문을 제외함으로써 기출지문을 효율적으로, 하지만 빠짐없이 학습할 수 있습니다.<br/>
                                            3. 문제를 풀기 전 해당 내용과 관련한 이론 설명을 통해 한 번의 강의로 2회독하는 효과를 볼 수 있습니다.<br/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="ch2" class="tabLink book2">
                        <div class="bookWrap">
                            <div class="bookInfo">
                                <div class="bookImg">
                                    <img src="{{ img_url('sample/book.jpg') }}">
                                </div>
                                <div class="bookDetail">
                                    <div class="book-Tit tx-dark-black NG">2018 기특한국어기출문제집 (전2권)</div>
                                    <div class="book-Author tx-gray">
                                        <ul>
                                            <li>분야 : 9급공무원 <span class="row-line">|</span></li>
                                            <li>저자 : 저자명 <span class="row-line">|</span></li>
                                            <li>출판사 : 출판사명 <span class="row-line">|</span></li>
                                            <li>판형/쪽수 : 190*260 / 769</li>
                                        </ul>
                                        <ul>
                                            <li>출판일 : 2018-00-00 <span class="row-line">|</span></li>
                                            <li>교재비 : <strong class="tx-light-blue">20,000원</strong> (↓20%) <strong class="tx-red">[품절]</strong></li>
                                        </ul>
                                    </div>
                                    <div class="bookBoxWrap">
                                        <ul class="tabWrap tabDepth2">
                                            <li><a href="#info1" class="on">교재소개</a></li>
                                            <li><a href="#info2">교재목차</a></li>
                                        </ul>
                                        <div class="tabBox">
                                            <div id="info1" class="tabContent">
                                                <div class="book-TxtBox tx-gray">
                                                    2018년재신정판을내면서..<br/>
                                                    첫째, 2017년에출제된모든기출문제를반영하여수록하였습니다.<br/>
                                                    둘째, 매지문마다해설을충실히달았습니다..<br/>
                                                    셋째, 책분량이너무많아져최근5년간기출문제(2013-2017년)는빠짐없이수록하되, 오래된문제라도<br/>
                                                    기본적이고중요한내용을담고있는부분은유지하되중복된부분은덜어냈습니다.
                                                </div>
                                                <div class="caution-txt tx-red">수강생 교재는 해당 온라인 강좌 수강생에 한해 구매 가능합니다. (교재만 별도 구매 불가능)</div>
                                            </div>
                                            <div id="info2" class="tabContent">
                                                <div class="book-TxtBox tx-gray">
                                                    제1편 현대 문법<br/>
                                                    제2편 고전 문법<br/>
                                                    제3편 국어 생활<br/>
                                                    제4편 현대 문학<br/>
                                                    제5편 고전 문학<br/>
                                                    제1편 현대 문법<br/>
                                                    제2편 고전 문법<br/>
                                                    제3편 국어 생활<br/>
                                                    제4편 현대 문학<br/>
                                                    제5편 고전 문학
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="bookInfo">
                                <div class="bookImg">
                                    <img src="{{ img_url('sample/book.jpg') }}">
                                </div>
                                <div class="bookDetail">
                                    <div class="book-Tit tx-dark-black NG">2018 기특한국어기출문제집2 (전5권)</div>
                                    <div class="book-Author tx-gray">
                                        <ul>
                                            <li>분야 : 7급공무원 <span class="row-line">|</span></li>
                                            <li>저자 : 저자명 <span class="row-line">|</span></li>
                                            <li>출판사 : 출판사명 <span class="row-line">|</span></li>
                                            <li>판형/쪽수 : 190*260 / 348</li>
                                        </ul>
                                        <ul>
                                            <li>출판일 : 2018-12-25 <span class="row-line">|</span></li>
                                            <li>교재비 : <strong class="tx-light-blue">40,000원</strong> (↓15%) <strong class="tx-black">[판매중]</strong></li>
                                        </ul>
                                    </div>
                                    <div class="bookBoxWrap">
                                        <ul class="tabWrap tabDepth2">
                                            <li><a href="#info3" class="on">교재소개</a></li>
                                            <li><a href="#info4">교재목차</a></li>
                                        </ul>
                                        <div class="tabBox">
                                            <div id="info3" class="tabContent">
                                                <div class="book-TxtBox tx-gray">
                                                    2018년재신정판을내면서..<br/>
                                                    첫째, 2017년에출제된모든기출문제를반영하여수록하였습니다.<br/>
                                                    둘째, 매지문마다해설을충실히달았습니다..<br/>
                                                    셋째, 책분량이너무많아져최근5년간기출문제(2013-2017년)는빠짐없이수록하되, 오래된문제라도<br/>
                                                    기본적이고중요한내용을담고있는부분은유지하되중복된부분은덜어냈습니다.
                                                </div>
                                                <div class="caution-txt tx-red">수강생 교재는 해당 온라인 강좌 수강생에 한해 구매 가능합니다. (교재만 별도 구매 불가능)</div>
                                            </div>
                                            <div id="info4" class="tabContent">
                                                <div class="book-TxtBox tx-gray">
                                                    제1편 현대 문법<br/>
                                                    제2편 고전 문법<br/>
                                                    제3편 국어 생활<br/>
                                                    제4편 현대 문학<br/>
                                                    제5편 고전 문학<br/>
                                                    제1편 현대 문법<br/>
                                                    제2편 고전 문법<br/>
                                                    제3편 국어 생활<br/>
                                                    제4편 현대 문학<br/>
                                                    제5편 고전 문학
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Layer-Box --> 

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