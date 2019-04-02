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
        <span class="1depth"><span class="depth-Arrow">></span><strong>단강좌</strong></span>
    </div>
    <div class="Content p_re">
        
        <div class="willbes-Prof-Detail NG tx-black">
            <div class="prof-profile p_re">
                <div class="Name">
                    <strong>정채영</strong><br/>
                    교수님
                </div>
                <div class="ProfImg">
                    <img src="{{ img_url('sample/prof2-1.png') }}">
                </div>
                <div class="prof-home subBtn NSK"><a href="#none"><img src="{{ img_url('sub/icon_profhome.gif') }}" style="margin-top: -4px; margin-right: 4px">교수홈</a></div>
            </div>
            <div class="lec-profile p_re">
                <div class="w-list">문제풀이 / 국어</div>
                <div class="w-tit tx-blue">2018 [지방직/서울시] 정채영 국어 [문학집중강의]137 작품을 알려주마!(4-6월)</div>
                <dl class="w-info tx-dark-gray">
                    <dt>강의수 : <span class="tx-black">70강</span></dt>
                    <dt><span class="row-line">|</span></dt>
                    <dt>수강기간 : <span class="tx-black">50일</span></dt>
                    <dt class="NSK ml15">
                        <span class="nBox n1">2배수</span>
                        <span class="nBox n2">진행중</span>
                        <span class="nBox n3">예정</span>
                        <span class="nBox n4">완강</span>
                    </dt>
                </dl>
                <div class="view-wrap"> 
                    <div class="w-notice p_re">
                        <div class="w-sp one">
                            <a href="#none" onclick="openWin('viewBox')">맛보기</a>
                        </div>
                        <div id="viewBox" class="viewBox">
                            <a class="closeBtn" href="#none" onclick="closeWin('viewBox')"><img src="{{ img_url('cart/close.png') }}"></a>
                            <dl class="NSK">
                                <dt class="Tit NG">맛보기1</dt>
                                <dt class="tBox t1 black"><a href="">HIGH</a></dt>
                                <dt class="tBox t2 gray"><a href="">LOW</a></dt>
                            </dl>
                            <dl class="NSK">
                                <dt class="Tit NG">맛보기2</dt>
                                <dt class="tBox t1 black"><a href="">HIGH</a></dt>
                                <dt class="tBox t2 gray"><a href="">LOW</a></dt>
                            </dl>
                        </div>
                    </div>
                    <div class="all-view subBtn NSK"><a href="#none" class="NSK">개설강좌 전체보기 ></a></div>
                </div>
            </div>
        </div>
        <!-- willbes-Prof-Detail -->

        <div class="willbes-Lec mb100 NG c_both">
            <div class="willbes-Buy-Table p_re mt20">
                <div class="willbes-Buy-List">
                    <table cellspacing="0" cellpadding="0" class="lecTable profTable">
                        <colgroup>
                            <col style="width: 445px;">
                            <col style="width: 265px;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="w-lectit tx-left" colspan="3">
                                    <span class="w-obj NSK"><div class="pBox p1">강좌</div></span>
                                    <span class="MoreBtn"><a href="#Class">강좌정보 보기 ▼</a></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="w-tit">2017 (지방직/서울시) 정채영 국어 필살기 모의고사 시즌Ⅲ-Ⅳ(4-6월)</div>
                                </td>
                                <td class="w-notice p_re tx-right">
                                    <div class="priceWrap p_re">
                                        <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                        <span class="select">[PC+모바일]</span>
                                        <span class="price tx-blue">80,000원</span>
                                        <span class="discount">(↓10%)</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- lecTable -->

                    <div class="lecInfoTable" style="display: block">
                        <div class="w-lectit tx-left" colspan="3">
                            <span class="w-obj NSK"><div class="pBox p3">교재</div></span>
                            <span class="MoreBtn"><a href="#BookInfo">교재정보 보기 ▼</a></span>
                        </div>
                        <div class="w-grid">
                            <div class="w-sub overflow">※ 별도 구매 가능한 교재가 없습니다.</div>
                            <div class="w-sub overflow">
                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을...</span>
                                <span class="chk"> 
                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                    <label>[판매중]</label>
                                </span>
                                <span class="priceWrap">
                                    <span class="price tx-blue">30,000원</span>
                                    <span class="discount">(↓10%)</span>
                                </span>
                            </div>
                            <div class="w-sub overflow">
                                <span class="w-obj tx-blue tx11">주교재</span> 
                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로...</span>
                                <span class="chk">
                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                    <label class="soldout">[품절]</label>
                                </span>
                                <span class="priceWrap">
                                    <span class="price tx-blue">20,000원</span>
                                    <span class="discount">(↓10%)</span>
                                </span>
                            </div>
                            <div class="w-sub overflow">
                                <span class="w-obj tx-blue tx11">부교재</span> 
                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편)...</span>
                                <span class="chk">
                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                    <label class="press">[출간예정]</label>
                                </span>
                                <span class="priceWrap">
                                    <span class="price tx-blue">0원</span>
                                </span>
                            </div>
                            <div class="w-sub overflow">
                                <span class="w-obj tx-blue tx11">부교재</span> 
                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편)...</span>
                                <span class="chk">
                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                    <label class="press">[출간예정]</label>
                                </span>
                                <span class="priceWrap">
                                    <span class="price tx-blue">0원</span>
                                </span>
                            </div>
                            <div class="w-sub overflow">
                                <span class="w-obj tx-blue tx11">부교재</span> 
                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편)...</span>
                                <span class="chk">
                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                    <label class="press">[출간예정]</label>
                                </span>
                                <span class="priceWrap">
                                    <span class="price tx-blue">0원</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- lecInfoTable -->
                </div>
                <div class="willbes-Buy-Price">
                    <table cellspacing="0" cellpadding="0" class="priceTable">
                        <colgroup>
                            <col style="width: 60px;"/>
                            <col style="width: 140px;"/>
                        </colgroup>
                        <thead>
                            <tr>
                                <th colspan="2">총 주문금액</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tx-center tx-black">강좌</td>
                                <td class="price tx-right tx-light-blue">63,000원</td>
                            </tr>
                            <tr>
                                <td class="tx-center tx-black">교재</td>
                                <td class="price tx-right tx-light-blue">10,800원</td>
                            </tr>
                            <tr>
                                <td class="total-price tx-right tx-light-blue" colspan="2">218,000원</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="willbes-Lec-buyBtn GM">
                    <ul>
                        <li class="btnAuto180 h36">
                            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                                <span>장바구니</span>
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
            </div>
            <!-- willbes-Buy-Table -->

        </div>
        <!-- willbes-Lec -->

        <div id="Sticky" class="sticky-Wrap">
            <div class="sticky-Grid sticky-menu NG">
                <ul>
                    <li><a href="#none" onclick="movePos('#Class');">강좌정보 ▼</a></li>
                    <li class="row-line">|</li>
                    <li><a href="#none" onclick="movePos('#BookInfo');">교재정보 ▼</a></li>
                    <li class="row-line">|</li>
                    <li><a href="#none" onclick="movePos('#Leclist');">강의목차 ▼</a></li>
                    <li class="row-line">|</li>
                    <li><a href="#none" onclick="movePos('#Reply');">수강후기 ▼</a></li>
                </ul>
            </div>
        </div>
        <!-- sticky-menu -->
   
        <div class="willbes-Class p_re c_both">
            <a id="Class" name="Class" class="sticky-top"></a>
            <div class="willbes-Lec-Tit NG tx-black">강좌정보</div>
            <div class="classInfoTable GM">
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
        <!-- willbes-Class -->

        <div class="TopBtn">
            <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
        </div>
        <!-- TopBtn-->

        <div class="willbes-BookInfo p_re c_both">
            <a id="BookInfo" name="BookInfo" class="sticky-top"></a>
            <div class="willbes-Lec-Tit NG tx-black">교재정보</div>
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
        </div>
        <!-- willbes-BookInfo -->

        <div class="TopBtn">
            <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
        </div>
        <!-- TopBtn-->

        <div class="willbes-Leclist p_re c_both">
            <a id="Leclist" name="Leclist" class="sticky-top"></a>   
            <div class="willbes-Lec-Tit NG tx-black">강의목차</div>
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable under-gray tx-gray">
                    <colgroup>
                        <col style="width: 100px;">
                        <col>
                        <col style="width: 200px;">
                        <col style="width: 80px;">
                        <col style="width: 130px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>No<span class="row-line">|</span></li></th>
                            <th>강의명<span class="row-line">|</span></li></th>
                            <th>무료보기<span class="row-line">|</span></li></th>
                            <th>자료<span class="row-line">|</span></li></th>
                            <th>강의시간</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-no">1강</td>
                            <td class="w-list tx-left pl20">1강 03월 05일 : 모의고사 1회</td>
                            <td class="w-free">
                                <span class="w-sp NG"><a href="#none">OT</a></span>
                            </td>
                            <td class="w-file">
                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                            </td>
                            <td class="w-time">50분</td>
                        </tr>
                        <tr>
                            <td class="w-no">2강</td>
                            <td class="w-list tx-left pl20">2강 03월 05일 : 모의고사 2회</td>
                            <td class="w-free">
                            <span class="tBox NSK t3 white"><a href="">WIDE</a></span>
                                <span class="tBox NSK t1 black"><a href="">HIGH</a></span>
                                <span class="tBox NSK t2 gray"><a href="">LOW</a></span>
                            </td>
                            <td class="w-file"></td>
                            <td class="w-time">40분</td>
                        </tr>
                        <tr>
                            <td class="w-no">3강</td>
                            <td class="w-list tx-left pl20">3강 03월 05일 : 모의고사 3회</td>
                            <td class="w-free"></td>
                            <td class="w-file"></td>
                            <td class="w-time">30분</td>
                        </tr>
                        <tr>
                            <td class="w-no">4강</td>
                            <td class="w-list tx-left pl20">4강 03월 12일 : 모의고사 4회</td>
                            <td class="w-free"></td>
                            <td class="w-file"></td>
                            <td class="w-time">20분</td>
                        </tr>
                        <tr>
                            <td class="w-no">5강</td>
                            <td class="w-list tx-left pl20">5강 03월 12일 : 모의고사 5회</td>
                            <td class="w-free"></td>
                            <td class="w-file"></td>
                            <td class="w-time">10분</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Leclist -->

        <div class="TopBtn">
            <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
        </div>
        <!-- TopBtn-->

        <div class="willbes-Reply p_re c_both">
            <a id="Reply" name="Reply" class="sticky-top"></a>
            <div class="willbes-Lec-Tit NG tx-black">수강후기</div>
            <div class="ReplylistTable tx-gray">
                <div class="replyBox">
                    <div class="w-reply-teaser">
                        <ul>
                            <li class="w-tit tx-light-blue">2017 기미진 국어 아침특강(5-6월)</li>
                            <li class="w-name tx-center">홍길동</li>
                            <li class="row-line">|</li>
                            <li class="w-date tx-center">2018-03-24</li>
                        </ul>
                        <ul>
                            <li class="w-star"><img src="{{ img_url('sub/star4.gif') }}"></li>
                            <li class="w-subtit">강의 잘 들었습니다.</li>
                        </ul>
                    </div>
                    <div class="w-reply">
                        군더더기없는 깔끔한 강의입니다 강의시간이나 분량이 부담이 없어서 마음에 들었습니다~~ 군더더기없는 깔끔한 강의입니다 강의시간이나 분량이 부담이
                        없어서 마음에 들었습니다~~ 
                    </div>
                </div>
                <div class="replyBox">
                    <div class="w-reply-teaser">
                        <ul>
                            <li class="w-tit tx-light-blue">2018 신광은 형사소송법 기본이론(3월)</li>
                            <li class="w-name tx-center">홍진경</li>
                            <li class="row-line">|</li>
                            <li class="w-date tx-center">2018-03-24</li>
                        </ul>
                        <ul>
                            <li class="w-star"><img src="{{ img_url('sub/star5.gif') }}"></li>
                            <li class="w-subtit">역시 신광은교수님 강의 재미있게 잘 들었습니다.</li>
                        </ul>
                    </div>
                    <div class="w-reply">
                        체포는 48시간을 초과하면 안된다고 했는데 법관이 48시간 이내에 구속영장을 발부 해주지 않으면 피의자를 석방을 한 상태로 기다려야되는게 맞나요??
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Reply -->

        <div class="willbes-Leclist c_both">
            <div class="willbes-LecreplyList tx-gray">
                → 해당 강좌 총 수강후기 [ <a class="num tx-light-blue underline" href="#none">2건</a> ]
                <ul>
                    <li class="subBtn blue NSK"><a href="#none">수강후기 작성하기 ></a></li>
                    <li class="subBtn NSK"><a href="#none">수강후기 전체보기 ></a></li>
                </ul>
            </div>
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable upper-black under-gray tx-gray">
                    <colgroup>
                        <col style="width: 100px;">
                        <col style="width: 590px;">
                        <col style="width: 120px;">
                        <col style="width: 130px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>No<span class="row-line">|</span></li></th>
                            <th>제목<span class="row-line">|</span></li></th>
                            <th>작성자<span class="row-line">|</span></li></th>
                            <th>등록일</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-no">2</td>
                            <td class="w-list tx-left pl20"><a href="#none">시험에 나올 쟁점들을 꼭꼭 짚어주셔서 좋습니다. 수험생의 눈높이에 맞춰 주셔서 강의를...</a></td>
                            <td class="w-name">홍길동</td>
                            <td class="w-date">2018-04-22</td>
                        </tr>
                        <tr>
                            <td class="w-no">1</td>
                            <td class="w-list tx-left pl20"><a href="#none">서울시 7급, 국가직 7급 합격생입니다.</a></td>
                            <td class="w-name">홍길순</td>
                            <td class="w-date">2018-04-22</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Leclist -->

        <div class="TopBtn">
            <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
        </div>
        <!-- TopBtn-->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop