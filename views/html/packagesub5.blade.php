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
        <span class="1depth"><span class="depth-Arrow">></span><strong>PASS</strong></span>
        <span class="2depth"><span class="depth-Arrow">></span><strong>무한 PASS</strong></span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Package-Detail NG tx-black">
            <table cellspacing="0" cellpadding="0" class="packageDetailTable">
                <colgroup>
                    <col style="width: 135px;"/>
                    <col style="width: 1px;"/>
                    <col style="width: 804px;"/>
                </colgroup>
                <tbody>
                    <tr>
                        <td class="pl30">
                            <div class="w-tit">2017 이현나 국어 문제풀이 패키지</div>
                            <dl class="w-info">
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
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- willbes-Package-Detail -->

        <div class="willbes-Lec-Package-Price p_re">
            <div class="total-PriceBox NG">
                <span class="price-tit">총 주문금액</span>
                <span class="row-line">|</span>
                <span>
                    <span class="price-txt">패키지</span>
                    <span class="tx-light-blue">188,600원</span>
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

        <div class="willbes-Lec NG c_both">
            <div class="willbes-Lec-Subject tx-dark-black">교수선택</div>
            <!-- willbes-Lec-Subject -->

            <div class="willbes-Lec-Line">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Buy-List willbes-Buy-PackageList">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 760px;">
                        <col style="width: 180px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-lectit tx-left" colspan="2">
                                <span class="w-obj NSK"><div class="pBox p2">패키지</div></span>
                                <span class="MoreBtn"><a href="#Info">패키지정보 보기 ▼</a></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left">
                                <div class="w-tit">2017 이현나 국어 문제풀이 패키지</div>
                            </td>
                            <td class="w-notice p_re">
                                <div class="priceWrap">
                                    <span class="price tx-blue">80,000원</span>
                                    <span class="discount">(↓20%)</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->
            </div>
            <!-- willbes-Buy-PackageList -->

            <div class="willbes-Lec-Table-Overflow">
                <div class="willbes-Lec-Table bdb-none">
                    <table cellspacing="0" cellpadding="0" class="lecTable under-gray">
                        <colgroup>
                            <col style="width: 75px;">
                            <col style="width: 85px;">
                            <col style="width: 780px;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="w-list">국어</td>
                                <td class="w-img"><img src="{{ img_url('sample/prof3.jpg') }}"></td>
                                <td class="w-data tx-left pl25">
                                    <dl class="w-info">
                                        <dt class="w-name">이현나</dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt class="w-tit">2017 이현나 국어 기출문제(11-12월)</dt>
                                    </dl>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-list">국어</td>
                                <td class="w-img"><img src="{{ img_url('sample/prof3-1.jpg') }}"></td>
                                <td class="w-data tx-left pl25">
                                    <dl class="w-info">
                                        <dt class="w-name">이현나</dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt class="w-tit">2017 이현나 국어 기출문제(11-12월)</dt>
                                    </dl>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-list">국어</td>
                                <td class="w-img"><img src="{{ img_url('sample/prof3-2.jpg') }}"></td>
                                <td class="w-data tx-left pl25">
                                    <dl class="w-info">
                                        <dt class="w-name">이현나</dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt class="w-tit">2017 이현나 국어 실전 동형모의고사(3월)</dt>
                                    </dl>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-list">국어</td>
                                <td class="w-img"><img src="{{ img_url('sample/prof3-3.jpg') }}"></td>
                                <td class="w-data tx-left pl25">
                                    <dl class="w-info">
                                        <dt class="w-name">이현나</dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt class="w-tit">2017 이현나 국어 실전 동형모의고사(3월)</dt>
                                    </dl>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-list">국어</td>
                                <td class="w-img"><img src="{{ img_url('sample/prof3-4.jpg') }}"></td>
                                <td class="w-data tx-left pl25">
                                    <dl class="w-info">
                                        <dt class="w-name">이현나</dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt class="w-tit">2017 이현나 국어 실전 동형모의고사(3월)</dt>
                                    </dl>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- willbes-Lec-Table -->
            </div>

            <div class="TopBtn">
                <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
            </div>

            <a name="Info"></a>
            <div class="willbes-Class c_both">
                <div class="willbes-Lec-Tit NG tx-black">패키지정보</div>
                <div class="classInfoTable GM">
                    <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
                        <colgroup>
                            <col style="width: 140px;">
                            <col width="*">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="w-list bg-light-white">
                                    패키지유의사항<br/>
                                    <span class="tx-red">(필독)</span>
                                </td>
                                <td class="w-data tx-left pl25">
                                    LMS > 상품관리> [온라인]상품관리> 운영자패키지메뉴의‘패키지유의사항(필독)’ 항목에입력된정보가<br/>
                                    자동출력됩니다. (온라인상품기준)
                                </td>
                            </tr>
                            <tr>
                                <td class="w-list bg-light-white">패키지소개</td>
                                <td class="w-data tx-left pl25">
                                    LMS > 상품관리> [온라인]상품관리> 운영자패키지메뉴의‘패키지소개’ 항목에입력된정보가<br/>
                                    자동출력됩니다. (온라인상품기준)
                                </td>
                            </tr>
                            <tr>
                                <td class="w-list bg-light-white">패키지특징</td>
                                <td class="w-data tx-left pl25">
                                    LMS > 상품관리> [온라인]상품관리> 운영자패키지메뉴의‘패키지특징’ 항목에입력된정보가<br/>
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
        </div>
        <!-- willbes-Lec -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop