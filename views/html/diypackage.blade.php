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
        <span class="2depth"><span class="depth-Arrow">></span><strong>DIY패키지</strong></span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Package-Detail NG tx-black">
            <table cellspacing="0" cellpadding="0" class="packageDetailTable packageDetailTableDiy">
                <colgroup>
                    <col/>
                </colgroup>
                <tbody>
                    <tr>
                        <td class="w-list pl25">2020 9급 이론종합 [행정/세무/출관직] 선택형 내맘대로 패키지 </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- willbes-Package-Detail -->
        <div class="willbes-Cartlist">
            <div class="willbes-Cart-Txt p_re pt15">
                <span class="MoreBtn underline NG" style="top: 30px;"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-gray">
                    <tbody>
                        <tr>
                            <td>
                                • DIY패키지 유의사항이 출력됩니다. DIY패키지 유의사항이 출력됩니다. DIY패키지 유의사항이 출력됩니다.<br/>
                                • DIY패키지 유의사항이 출력됩니다. DIY패키지 유의사항이 출력됩니다.<br/>
                                • DIY패키지 유의사항이 출력됩니다. DIY패키지 유의사항이 출력됩니다.<br/>
                                • DIY패키지 유의사항이 출력됩니다. DIY패키지 유의사항이 출력됩니다.<br/>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>

        <div id="Sticky" class="sticky-Package mt20">
            <div class="sticky-Grid sticky-total NG">
                <div class="willbes-Lec-Package-Price p_re">
                    <div class="total-PriceBox NG">
                        <span class="price-tit">총 주문금액</span>
                        <span class="row-line">|</span>
                        <span>
                            <span class="price-txt">패키지</span>
                            <span class="tx-light-blue">140,000원</span>
                        </span>
                        <span class="price-img">
                            <img src="{{ img_url('sub/icon_plus.gif') }}">
                        </span>
                        <span>
                            <span class="price-txt">교재</span>
                            <span class="tx-light-blue">48,600원</span>
                        </span>
                        <span class="price-img">
                            <img src="{{ img_url('sub/icon_minus.gif') }}">
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
                                <span class="delete"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></span>
                            </span>
                        </div>
                        <div class="w-package">
                            <span class="w-obj NSK"><div class="pBox p2">패키지</div></span> 
                            <span class="w-tit">2018 9급공무원 기출문제 선택형 종합 Master패키지</span>
                            <span class="priceWrap">
                                <span class="price tx-blue">200,000원</span>
                                <span class="delete"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></span>
                            </span>
                        </div>
                        <div class="w-package">
                            <span class="w-obj NSK"><div class="pBox p2">패키지</div></span>
                            <span class="w-tit">2017 [하반기 국가직 추가 시험대비] 실전 동형문풀 패키지</span>
                            <span class="priceWrap">
                                <span class="price tx-blue">60,000원</span>
                                <span class="delete"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></span>
                            </span>
                        </div>
                        <div class="w-package">
                            <span class="w-obj NSK"><div class="pBox p3">교재</div></span>
                            <span class="w-tit">2017 [하반기 지방직 추가시험 대비] 실전 동형모의고사 선택형 종합패키지</span>
                            <span class="priceWrap">
                                <span class="price tx-blue">99,000원</span>
                                <span class="delete"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></span>
                            </span>
                        </div>
                        <div class="w-package">
                            <span class="w-obj NSK"><div class="pBox p2">패키지</div></span>
                            <span class="w-tit">2018 9급공무원 단원별문제풀이 선택형 종합 Plus 패키지</span>
                            <span class="priceWrap">
                                <span class="price tx-blue">200,000원</span>
                                <span class="delete"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></span>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- willbes-Lec-Package -->
            </div>
        </div>
        <!-- sticky-menu -->

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
                        <col style="width: 290px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list">문제풀이</td>
                            <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">
                                    <a href="{{ site_url('/home/html/listsub') }}">2018 [지방직/서울시] 정채영 국어 [문학집중강의]137작품을 알려주마!(4-6월)</a>
                                </div>
                                <dl class="w-info">
                                    <dt class="mr20">
                                        <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                            <strong>강좌상세정보</strong>
                                        </a>
                                    </dt>
                                    <dt>강의수 : <span class="tx-blue">70강</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="tx-blue">50일</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n2">진행중</span>
                                        <span class="nBox n3">예정</span>
                                        <span class="nBox n4">완강</span>
                                    </dt>
                                </dl><br/>
                                <div class="tx-red">※ 바로결제만 가능한 상품입니다.</div>
                            </td>
                            <td class="w-notice p_re">
                                <div class="w-sp one"><a href="#none" onclick="openWin('viewBox')">맛보기</a></div>
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
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                    <span class="select">[PC]</span>
                                    <span class="price tx-blue">7,000원</span>
                                    <span class="discount">(↓20%)</span>
                                </div>
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                    <span class="select">[모바일]</span>
                                    <span class="price tx-blue">80,000원</span>
                                    <span class="discount">(↓10%)</span>
                                </div>
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                    <span class="select">[PC+모바일]</span>
                                    <span class="price tx-blue">123,000원</span>
                                    <span class="discount">(↓15%)</span>
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
                <!-- lecInfoTable -->
            </div>
            <!-- willbes-Lec-Table -->

            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 85px;">
                        <col style="width: 490px;">
                        <col style="width: 290px;">
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
                            <td class="w-notice p_re">
                                <div class="w-sp one"><a href="#none">맛보기</a></div>
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                    <span class="select">[PC]</span>
                                    <span class="price tx-blue">6,000원</span>
                                    <span class="discount">(↓12%)</span>
                                </div>
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                    <span class="select">[모바일]</span>
                                    <span class="price tx-blue">90,000원</span>
                                    <span class="discount">(↓50%)</span>
                                </div>
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                    <span class="select">[PC+모바일]</span>
                                    <span class="price tx-blue">154,000원</span>
                                    <span class="discount">(↓5%)</span>
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
                        <col style="width: 290px;">
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
                            <td class="w-notice p_re">
                                <div class="w-sp one"><a href="#none">맛보기</a></div>
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
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
                        <col style="width: 290px;">
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
                            <td class="w-notice p_re">
                                <div class="w-sp one"><a href="#none">맛보기</a></div>
                                <div class="priceWrap chk buybtn p_re">
                                    <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
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
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop