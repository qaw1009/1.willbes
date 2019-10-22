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
        <a href="#none"><img src="{{ img_url('sub/icon_home.gif') }}"> </a>
        <span class="depth"><span class="depth-Arrow">></span><strong>수강신청</strong></span>
        <span class="depth"><span class="depth-Arrow">></span><strong>단과/특강</strong></span>
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
                <div class="mt20">
                    개강일~종강일 : <span class="tx-blue">12.01 ~ 12.14</span> 월화수목금토(12회)           
                </div>
                <div class="mt10 w-info">
                    수강형태 : 
                    <span class="tx-blue mr10">실강</span>
                    {{--
                    <span class="acadBox n1">방문접수</span>
                    <span class="acadBox n2">온라인접수</span>
                    --}}
                    <span class="acadBox n3">방문+온라인</span>
                    
                    <span class="acadBox n4">접수중</span>
                    {{--
                    <span class="acadBox n5">접수예정</span>
                    <span class="acadBox n6">마감</span>
                    --}}
                </div>
                <div class="view-wrap"> 
                    <div class="all-view subBtn NSK"><a href="#none">개설강좌 전체보기 ></a></div>
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
                                <td class="tx-left">
                                    <div class="pl10">
                                        <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                        <label for="goods_chk" class="pl10 d_inblock">
                                            <span>80,000원</span>
                                            <span class="discount">(↓10%) ▶ </span>
                                            <span class="tx-blue">72,000원</span>
                                        </label>
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
                        <li class="btnAuto130 h36">
                            <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                                <span class="tx-light-blue">방문결제</span>
                            </button>
                        </li>
                        <li class="btnAuto130 h36">
                            <button type="submit" onclick="" class="mem-Btn bg-heavy-gray bd-dark-gray">
                                <span>장바구니</span>
                            </button>
                        </li>                        
                        <li class="btnAuto130 h36">
                            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                                <span class="tx-white">바로결제</span>
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
                                수강대상
                            </td>
                            <td class="w-data tx-left pl25">
                                LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                자동출력됩니다. (온라인상품기준)
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list bg-light-white">
                                강좌소개<br>
                                (강좌구성)
                            </td>
                            <td class="w-data tx-left pl25">
                                LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                자동출력됩니다. (온라인상품기준)
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list bg-light-white">강좌효과</td>
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
    </div>
    <div class="Quick-Bnr">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop