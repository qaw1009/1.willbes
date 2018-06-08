@extends('html.layouts.master')

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
        <img src="/public/img/front/sub/icon_home.gif"> 
        <span class="1depth"><span class="depth-Arrow">></span><strong>패키지</strong></span>
        <span class="2depth"><span class="depth-Arrow">></span><strong>DIY패키지</strong></span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Pm">
            <img src="/public/img/front/sample/bnr2.jpg">
        </div>
        <!-- willbes-Bnr -->

        <div class="willbes-Lec-Package-Price p_re">
            <div class="total-PriceBox NG">
                <span class="price-tit">총 주문금액</span>
                <span class="row-line">|</span>
                <span>
                    <span class="price-txt">패키지</span>
                    <span class="tx-light-blue">140,000원</span>
                </span>
                <span class="price-img">
                    <img src="/public/img/front/sub/icon_plus.gif">
                </span>
                <span>
                    <span class="price-txt">교재</span>
                    <span class="tx-light-blue">48,600원</span>
                </span>
                <span class="price-img">
                    <img src="/public/img/front/sub/icon_minus.gif">
                </span>
                <span>
                    <span class="price-txt">강좌할인금액</span>
                    <span class="tx-pink">15,000원</span>
                </span>
                <span class="price-total tx-light-blue">188,600원</span>
            </div>
            <div class="willbes-Lec-buyBtn">
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                            <span class="tx-light-blue">바로결제</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- willbes-Lec-Package-Price -->

        <div class="willbes-Lec-Package NG c_both">
            <div class="packageTable">
                <div class="w-package">
                    <span class="w-obj NSK"><div class="pBox p1">강좌</div></span> 
                    <span class="w-tit">2018 9급공무원 단원별문제풀이 선택형 종합 Plus 패키지</span>
                    <span class="priceWrap">
                        <span class="price tx-blue">200,000원</span>
                        <span class="delete"><a href="#none"><img src="/public/img/front/sub/icon_delete.gif"></a></span>
                    </span>
                </div>
                <div class="w-package">
                    <span class="w-obj NSK"><div class="pBox p2">패키지</div></span> 
                    <span class="w-tit">2018 9급공무원 기출문제 선택형 종합 Master패키지</span>
                    <span class="priceWrap">
                        <span class="price tx-blue">200,000원</span>
                        <span class="delete"><a href="#none"><img src="/public/img/front/sub/icon_delete.gif"></a></span>
                    </span>
                </div>
                <div class="w-package">
                    <span class="w-obj NSK"><div class="pBox p2">패키지</div></span>
                    <span class="w-tit">2017 [하반기 국가직 추가 시험대비] 실전 동형문풀 패키지</span>
                    <span class="priceWrap">
                        <span class="price tx-blue">60,000원</span>
                        <span class="delete"><a href="#none"><img src="/public/img/front/sub/icon_delete.gif"></a></span>
                    </span>
                </div>
                <div class="w-package">
                    <span class="w-obj NSK"><div class="pBox p3">교재</div></span>
                    <span class="w-tit">2017 [하반기 지방직 추가시험 대비] 실전 동형모의고사 선택형 종합패키지</span>
                    <span class="priceWrap">
                        <span class="price tx-blue">99,000원</span>
                        <span class="delete"><a href="#none"><img src="/public/img/front/sub/icon_delete.gif"></a></span>
                    </span>
                </div>
                <div class="w-package">
                    <span class="w-obj NSK"><div class="pBox p2">패키지</div></span>
                    <span class="w-tit">2018 9급공무원 단원별문제풀이 선택형 종합 Plus 패키지</span>
                    <span class="priceWrap">
                        <span class="price tx-blue">200,000원</span>
                        <span class="delete"><a href="#none"><img src="/public/img/front/sub/icon_delete.gif"></a></span>
                    </span>
                </div>
            </div>
        </div>
        <!-- willbes-Lec-Package -->

        <div class="willbes-Lec NG c_both">
            <div class="willbes-Lec-Subject tx-dark-black">· 국어<span class="MoreBtn"><a href="#none">교재정보 전체보기 ▼</a></span></div>
            <!-- willbes-Lec-Subject -->

            <div class="willbes-Lec-Line">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 85px;">
                        <col style="width: 490px;">
                        <col style="width: 110px;">
                        <col style="width: 180px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list">문제풀이</td>
                            <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">2018 [지방직/서울시] 정채영 국어 [문학집중강의]137작품을 알려주마!(4-6월)</div>
                                <dl class="w-info">
                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
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
                            </td>
                            <td class="chk">
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                            </td>
                            <td class="w-notice">
                                <ul class="w-sp">
                                    <li><a href="#none">OT</a></li>
                                    <li><a href="#none">맛보기</a></li>
                                </ul>
                                <div class="priceWrap">
                                    <span class="price tx-blue">80,000원</span>
                                    <span class="discount">(↓20%)</span>
                                </div>
                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

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
                                    <span class="chk">
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
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecInfoTable -->
            </div>
            <!-- willbes-Lec-Table -->

            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 85px;">
                        <col style="width: 490px;">
                        <col style="width: 110px;">
                        <col style="width: 180px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list">문제풀이</td>
                            <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">2018 [지방직/서울시] 정채영 국어 [문학집중강의]137작품을 알려주마!(4-6월)</div>
                                <dl class="w-info">
                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
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
                            </td>
                            <td class="chk">
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                            </td>
                            <td class="w-notice">
                                <ul class="w-sp">
                                    <li><a href="#none">OT</a></li>
                                    <li><a href="#none">맛보기</a></li>
                                </ul>
                                <div class="priceWrap">
                                    <span class="price tx-blue">80,000원</span>
                                    <span class="discount">(↓20%)</span>
                                </div>
                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

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
                                    <span class="w-subtit none">※ 별도 구매 가능한 교재가 없습니다.</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecInfoTable -->
            </div>
            <!-- willbes-Lec-Table -->

            <div class="TopBtn">
                <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
            </div>
        </div>
        <!-- willbes-Lec -->

        <div class="willbes-Lec NG c_both">
            <div class="willbes-Lec-Subject tx-dark-black">· 영어<span class="MoreBtn"><a href="#none">교재정보 전체보기 ▼</a></span></div>
            <!-- willbes-Lec-Subject -->

            <div class="willbes-Lec-Line">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 85px;">
                        <col style="width: 490px;">
                        <col style="width: 110px;">
                        <col style="width: 180px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list">유료특강</td>
                            <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">2018 기미진 국어 아침 실전 동형모의고사 특강[국가직~서울시](3-6개월)</div>
                                <dl class="w-info">
                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                    <dt>강의수 : <span class="tx-blue">48강 (예정)</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="tx-blue">100일</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n2">진행중</span>
                                    </dt>
                                </dl>
                            </td>
                            <td class="chk">
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                            </td>
                            <td class="w-notice">
                                <ul class="w-sp">
                                    <li><a href="#none">OT</a></li>
                                    <li><a href="#none">맛보기</a></li>
                                </ul>
                                <div class="priceWrap">
                                    <span class="price tx-blue">0원</span>
                                </div>
                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

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
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecInfoTable -->
            </div>
            <!-- willbes-Lec-Table -->

            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 85px;">
                        <col style="width: 490px;">
                        <col style="width: 110px;">
                        <col style="width: 180px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list">문제풀이</td>
                            <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">2018 [서울시대비] 기미진 기특한 국어 아침 실전동형모의고사 (5-6월)</div>
                                <dl class="w-info">
                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                    <dt>강의수 : <span class="tx-blue">16강 (예정)</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="tx-blue">40일</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n3">예정</span>
                                    </dt>
                                </dl>
                            </td>
                            <td class="chk">
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                            </td>
                            <td class="w-notice">
                                <ul class="w-sp">
                                    <li><a href="#none">OT</a></li>
                                    <li><a href="#none">맛보기</a></li>
                                </ul>
                                <div class="priceWrap">
                                    <span class="price tx-blue">0원</span>
                                </div>
                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

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
                                    <span class="w-subtit none">※ 별도 구매 가능한 교재가 없습니다.</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecInfoTable -->
            </div>
            <!-- willbes-Lec-Table -->

            <div class="TopBtn">
                <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
            </div>
        </div>
        <!-- willbes-Lec -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="/public/img/front/sample/banner_180605.jpg">     
    </div>
</div>
<!-- End Container -->
@stop