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
        <span class="depth"><span class="depth-Arrow">&gt;</span><strong>교재구매</strong></span>
    </div>
    <div class="Content p_re">
        
        <div class="curriWrap c_both">
            <ul class="curriTabs c_both">
                <li><a class="on" href="#none">전체</a></li>
                <li><a href="#none">일반경찰</a></li>
                <li><a href="#none">경행경채</a></li>
                <li><a href="#none">경찰승진</a></li>
                <li><a href="#none">해양경찰</a></li>
                <li><a href="#none">해양경찰특채</a></li>
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
                            <th class="tx-gray">과목선택</th>
                            <td colspan="9">
                                <ul class="curriSelect">
                                    <li><a class="on" href="#none">전체</a></li>
                                    <li><a href="#none">사회복지학</a></li>
                                    <li><a href="#none">국어</a></li>
                                    <li><a href="#none">영어</a></li>
                                    <li><a href="#none">한국사</a></li>
                                    <li><a href="#none">행정법</a></li>
                                    <li><a href="#none">행정학</a></li>
                                    <li><a href="#none">교육학</a></li>
                                    <li><a href="#none">수학</a></li>
                                    <li><a href="#none">독일어</a></li>
                                    <li><a href="#none">경영학</a></li>
                                    <li><a href="#none">일본어</a></li>
                                    <li><a href="#none">관세법</a></li>
                                    <li><a href="#none">공직선거법</a></li>
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


        <div class="willbes-Lec-Search p_re mb25 mt25">
            <div class="inputBox p_re">
                <div class="selectBox">
                    <select id="select" name="select" title="직접입력" class="">
                        <option selected="selected">최근등록순</option>
                        <option value="상품명순">상품명순</option>
                        <option value="높은가격순">높은가격순</option>
                        <option value="낮은가격순">낮은가격순</option>
                    </select>
                    <select id="select" name="select" title="직접입력" class="">
                        <option selected="selected">전체</option>
                        <option value="교재명">교재명</option>
                        <option value="출판사">출판사</option>
                        <option value="저자">저자</option>
                    </select>
                </div>
                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" maxlength="30">
                <button type="submit" onclick="" class="search-Btn">
                    <span>검색</span>
                </button>
            </div>
        </div>
        <!-- willbes-Lec-Search -->

        <div class="willbes-Lec NG c_both">
            <div class="mb15">총 <strong class="tx-blue">30</strong>개의 상품이 있습니다. </div>
            <div class="willbes-Lec-Line">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Lec-Table">        
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width:200px;">
                        <col>
                        <col style="width:290px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list">
                                <div class="bookImg">
                                    <img src="{{ img_url('sample/book.jpg') }}">
                                </div>
                            </td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">
                                    2019년 1차대비 신광은 형사소송법 적중예상 문제풀이
                                </div>
                                <div class="w-info">신광은 저 <span class="row-line">|</span> 2019-03-08</div>
                                <dl class="w-info">
                                    <dt class="mr20">
                                        <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                            <strong>교재상세정보</strong>
                                        </a>
                                    </dt>                                    
                                </dl><br>
                                <div class="bookLecBtn">
                                    <a href="#none" onclick="openWin('bookLec')" class="">
                                        <strong>교재로 진행중인 강의 ▼</strong>
                                    </a> 
                                    {{--강의정보--}}
                                    <div id="bookLec" class="willbes-Layer-CScenterBox willbes-Layer-bookLecBox">
                                        <a class="closeBtn" href="#none" onclick="closeWin('bookLec')">
                                            <img src="{{ img_url('prof/close.png') }}">
                                        </a>
                                        <div class="Layer-Cont">
                                            <div class="LeclistTable">
                                                <ul>
                                                    <li>강의명 1</li>
                                                    <li>강의명 2</li>
                                                    <li>강의명 3</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>                                  
                                </div>
                                
                            </td>
                            <td class="w-notice p_re">                                
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                    <span class="select">[판매중]</span>
                                    <span class="price tx-blue">41,000원</span>
                                    <span class="discount">(↓10%)</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->
            </div>
            <!-- willbes-Lec-Table -->
            <div class="willbes-Lec-Table">        
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width:200px;">
                        <col>
                        <col style="width:290px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list">
                                <div class="bookImg">
                                    <img src="{{ img_url('sample/book.jpg') }}">
                                </div>
                            </td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">
                                    2019년 1차대비 신광은 형사소송법 적중예상 문제풀이
                                </div>
                                <div class="w-info">신광은 저 <span class="row-line">|</span> 2019-03-08</div>
                                <dl class="w-info">
                                    <dt class="mr20">
                                        <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                            <strong>교재상세정보</strong>
                                        </a>
                                    </dt>                                    
                                </dl>
                            </td>
                            <td class="w-notice p_re">                                
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                    <span class="select">[판매중]</span>
                                    <span class="price tx-blue">41,000원</span>
                                    <span class="discount">(↓10%)</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->
            </div>
            <!-- willbes-Lec-Table -->

            <div class="willbes-Lec-Table">        
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width:200px;">
                        <col>
                        <col style="width:290px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list">
                                <div class="bookImg">
                                    <img src="{{ img_url('sample/book.jpg') }}">
                                </div>
                            </td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">
                                    2019년 1차대비 신광은 형사소송법 적중예상 문제풀이
                                </div>
                                <div class="w-info">신광은 저 <span class="row-line">|</span> 2019-03-08</div>
                                <dl class="w-info">
                                    <dt class="mr20">
                                        <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                            <strong>교재상세정보</strong>
                                        </a>
                                    </dt>                                    
                                </dl>
                            </td>
                            <td class="w-notice p_re">                                
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                    <span class="select">[판매중]</span>
                                    <span class="price tx-blue">41,000원</span>
                                    <span class="discount">(↓10%)</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->
            </div>
            <!-- willbes-Lec-Table -->




        </div>
        <!-- willbes-Lec -->


        <div class="mb60"></div>
        <div class="willbes-Lec-buyBtn">
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

        <div id="InfoForm" class="willbes-Layer-Box">
            <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">
                교재상세정보
            </div>
            <div class="lecDetailWrap">
                <div class="tabBox">
                    <div class="tabLink book2">
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
                                            <li>교재비 : <strong class="tx-light-blue">20,000원</strong> (↓20%) <strong class="tx-red">[품절]</strong> <strong class="tx-light-blue">[판매중]</strong></li>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Layer-Box -->

    </div>
    <div class="Quick-Bnr f_right">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>

<div class="willbes-Lec-buyBtn-sm NG">
    <div>
        <button type="submit" onclick="openWin('pocketBox')" class="bg-deep-gray">
            <span>장바구니</span>
        </button>
    </div>
    <div>
        <button type="submit" onclick="" class="bg-dark-blue">
            <span>바로결제</span>
        </button>
    </div>
    <div id="pocketBox" class="pocketBox" style="display: none;">
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
    <!-- 팝업노출 다른 내용
    <div id="pocketBox" class="pocketBox" style="display: none;">
        해당 상품이 신청되었습니다.<br/>
        강좌는 내강의실에서 수강가능합니다.
        <ul class="NSK mt20">
            <li class="aBox answerBox_block"><a href="#none">내강의실</a></li>
            <li class="aBox waitBox_block"><a href="#none">교재구매</a></li>
        </ul>
    </div>
    <div id="pocketBox" class="pocketBox" style="display: none;">
        해당 상품이 신청되었습니다.<br/>
        내 강의실로 이동 하시겠습니까.
        <ul class="NSK mt20">
            <li class="aBox answerBox_block"><a href="#none">예</a></li>
            <li class="aBox waitBox_block"><a href="#none">아니오</a></li>
        </ul>
    </div>
    -->
</div>

<!-- End Container -->
@stop