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
                    <a href="#none">교수진소개</a>
                </li>
                <li>
                    <a href="#none">PASS</a>
                </li>
                <li>
                    <a href="#none">패키지</a>
                </li>
                <li>
                    <a href="#none">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li>
                    <a href="#none">수험정보</a>
                </li>
                <li>
                    <a href="#none">이벤트</a>
                </li>
                <li class="Acad">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth"><span class="depth-Arrow">></span><strong>고객센터</strong></span>
    </div>
    <div class="Content p_re">

        <div class="lecDetailWrap">
            <ul class="tabWrap tabCsDepth1 NSK">
                <li><a href="#cs1">자주하는 질문</a></li>
                <li><a href="#cs2">공지사항</a></li>
                <li><a href="#cs3">1:1 상담</a></li>
                <li><a href="#cs4">사이트 이용가이드</a></li>
                <li><a href="#cs5">모바일 서비스안내</a></li>
                <li><a href="#cs6">수강지원</a></li>
                <li><a href="#cs7">부정사용자 규제</a></li>
            </ul>
            <div class="tabBox">
                <div id="cs1">
                ㅁㅁㅁ

                530 / 45 / 365
                </div>
                <div id="cs2">
                공지사항
                </div>
                <div id="cs3">
                1:1 상담  
                </div>
                <div id="cs4">
                사이트 이용가이드
                </div>
                <div id="cs5">
                모바일 서비스안내
                </div>
                <div id="cs6">
                수강지원
                </div>
                <div id="cs7">
                부정사용자 규제   
                </div>

                <div id="ch2" class="tabLink">
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
                                    <li><a href="#info1">교재소개</a></li>
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
                                        <div class="caution-txt tx-red">수강생교재는해당온라인강좌수강생에한해구매가능합니다. (교재만별도구매불가능)</div>
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
        <!--
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
        -->
        <!-- willbes-Lec-buyBtn -->

        <div id="InfoForm" class="willbes-Layer-Box">
            <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">
                2018 기미진 국어 아침 실전 동형모의고사 특강[국가직 ~서울시] (3-6월)
            </div>
            <div class="lecDetailWrap">
                <ul class="tabWrap tabDepth1 NG">
                    <li><a id="hover1" href="#ch1">강좌상세정보</a></li>
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
                    <div id="ch2" class="tabLink">
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
                                        <li><a href="#info1">교재소개</a></li>
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
                                            <div class="caution-txt tx-red">수강생교재는해당온라인강좌수강생에한해구매가능합니다. (교재만별도구매불가능)</div>
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
        <!-- willbes-Layer-Box -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop