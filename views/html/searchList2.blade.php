@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Section widthAuto mt50">
        <div class="onSearch onSearchBig NG">
            <input type="search" id="onsearch" name="" value="" placeholder="온라인강의 검색" title="온라인강의 검색" />
            <label for="onsearch"><button title="검색">검색</button></label>
            {{--
            <span>
                <input type="checkbox" id="research" name="" value="" />
                <label for="research">결과 내 재검색</label>
            </span>
            --}}
            <div><strong>신광은</strong>에 대한 강좌 검색결과 <strong>30</strong>건</div>
        </div>
    </div>

    <div class="widthAuto p_re">
        {{-- 검색 결과 없을 경우--}}
        <div class="searchZero">
            <span><img src="{{ img_url('common/icon_search_big.png')}}"> </span>
            <h3 class="NG">검색 결과가 없습니다.</h3>
            <p>검색어를 바르게 입력하셨는지 확인해주세요.<br>
            검색어의 띄어쓰기를 다르게 해보세요.<br>
            검색어를 줄이거나 다른 단어로 다시 검색해 보세요.
            </p>
        </div>

        {{-- 검색 결과 있을 경우--}}
        <div class="searchList">
            <ul class="searchListTap NG">
                <li><a href="#tab01" class="on">단과강좌 [<span>20</span>]</a></li>
                <li><a href="#tab02">무료강좌 [<span>6</span>]</a></li>
                <li><a href="#tab03">추천패키지 [<span>5</span>]</a></li>
                <li><a href="#tab04">선택패키지 [<span>5</span>]</a></li>
            </ul>
            <div class="p_re">
                <div id="tab01">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black bdb-light-gray">
                            · 단과강좌
                            <div class="selectBoxForm">
                                <span class="selectBox ml10">
                                    <select id="" name="" title="" class="">
                                        <option selected="selected">최근등록순</option>
                                        <option value="최근개강순">최근개강순</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <!-- willbes-Lec-Subject --> 

                        <div class="willbes-Lec-Table">        
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 100px;">
                                    <col style="width: 100px;">
                                    <col width="*">
                                    <col style="width: 250px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">문제풀이</td>
                                        <td class="w-name">사전조사서특강<br/><span class="tx-blue">정채영</span></td>
                                        <td class="w-data tx-left pl20 p_re">
                                            <div class="OTclass"><span>직장인/재학생반</span> <a href="#none" onclick="openWin('OTclassInfo')">?</a> 일반경찰</div>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/listsub') }}">2018 [지방직/서울시] 정채영 국어 [문학집중강의]137작품을 알려주마!(4-6월)</a>
                                            </div>
                                            <dl class="w-info">
                                                <dt>학원실강의 : 2020년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">70강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">50일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">진행중</span>
                                                </dt>
                                                <br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                            <div class="tx-red">※ 바로결제만 가능한 상품입니다.</div>

                                            {{--직장인/재학생 반 안내 팝업--}}
                                            <div id="OTclassInfo" class="willbes-Layer-requestInfo2">
                                                <a class="closeBtn" href="#none" onclick="closeWin('OTclassInfo')">
                                                    <img src="{{ img_url('prof/close.png') }}">
                                                </a>
                                                <div class="Layer-Tit NG tx-dark-black">직장인/재학생반  <span class="tx-blue">수강 안내</span></div>
                                                <div class="Layer-Cont">
                                                    <div class="Layer-SubTit tx-gray">
                                                        <ul>
                                                            <li>
                                                                <strong>예) 40일 강좌 수강시</strong><br>
                                                                - 수강 시간 : 평일 19~03시만 수강 / 주말, 공휴일 24시간 수강 가능<br>
                                                                - 수강 기간 : 원래 수강 기간 X 1.4배수(40일 X 1.4 = 56일)<br>
                                                                - 수강 중지 : 3회. 3회의 합은 56일까지<br>
                                                                - 수강 연장 : 3회. 1일 연장 수강료는 원래 수강 기간 40일 기준(강의 종료일까지만 연장 가능)<br>
                                                                - 수강 환불 : 환불일수는 원래 수강 기간 40일 기준(수강 중지시 환불 불가)<br>
                                                                <br>
                                                                <span class="tx-red">※ 주말반은 일반강의로 변경이 안됩니다.</span>
                                                            </li>                        
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="w-notice p_re">
                                            <div class="w-sp100">
                                                보강동영상 비밀번호 입력
                                                <div>
                                                    <input type="text" id="" name="" placeholder="****" maxlength="10">
                                                    <button type="submit" onclick="">
                                                        <span>확인</span>
                                                    </button>
                                                </div>
                                            </div>                                
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <tbody>
                                    <tr>
                                        <td class="pl100">
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
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
                                    <col style="width: 100px;">
                                    <col style="width: 100px;">
                                    <col width="*">
                                    <col style="width: 250px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">문제풀이</td>
                                        <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                                        <td class="w-data tx-left pl20">
                                            <div class="OTclass">일반경찰</div>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/listsub') }}">2018 [지방직/서울시] 정채영 국어 [문학집중강의]137작품을 알려주마!(4-6월)</a>
                                            </div>
                                            <dl class="w-info">
                                                <dt>학원실강의 : 2020년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>                                    
                                                <dt>강의수 : <span class="tx-blue">70강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">50일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n3">예정</span>
                                                </dt>
                                                <br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                            <div class="tx-red">※ 바로결제만 가능한 상품입니다.</div>
                                        </td>
                                        <td class="w-notice p_re">
                                            <div class="w-sp"><a href="#none" class="bg-black tx-white bd-none">보강동영상 보기</a></div>
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <tbody>
                                    <tr>
                                        <td class="pl100">
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">0원</span>
                                                </span>
                                            </div>
                                            <div class="w-sub tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
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
                                    <col style="width: 100px;">
                                    <col style="width: 100px;">
                                    <col width="*">
                                    <col style="width: 250px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">문제풀이</td>
                                        <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                                        <td class="w-data tx-left pl20">
                                            <div class="OTclass">일반경찰</div>
                                            <div class="w-tit">2018 [지방직/서울시] 정채영 국어 [문학집중강의]137작품을 알려주마! 작품을 알려주마!(4-6월)</div>
                                            <dl class="w-info">
                                                <dt>학원실강의 : 2020년 1월</dt>
                                                <dt><span class="row-line">|</span></dt> 
                                                <dt>강의수 : <span class="tx-blue">70강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">50일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n4">완강</span>
                                                </dt>
                                                <br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice p_re">
                                            <div class="w-sp"><a href="#none">맛보기</a></div>
                                            <ul class="priceWrap">
                                                <li>
                                                    <span class="select">[PC]</span>
                                                    <span class="price tx-blue">7,000원</span>
                                                    <span class="discount">(↓20%)</span>
                                                </li>
                                                <li> 
                                                    <span class="select">[모바일]</span>
                                                    <span class="price tx-blue">80,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </li>
                                                <li> 
                                                    <span class="select">[PC+모바일]</span>
                                                    <span class="price tx-blue">121,000원</span>
                                                    <span class="discount">(↓15%)</span>
                                                </li>
                                            </ul>
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <tbody>
                                    <tr>
                                        <td class="pl100">
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
                    </div>
                    <!-- willbes-Lec -->
                </div>

                <div id="tab02">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black bdb-light-gray">
                            · 무료강좌
                            <div class="selectBoxForm">
                                <span class="selectBox ml10">
                                    <select id="" name="" title="" class="">
                                        <option selected="selected">최근등록순</option>
                                        <option value="최근개강순">최근개강순</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <!-- willbes-Lec-Subject --> 

                        <div class="willbes-Lec-Table">        
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 100px;">
                                    <col style="width: 100px;">
                                    <col width="*">
                                    <col style="width: 250px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">문제풀이</td>
                                        <td class="w-name">사전조사서특강<br/><span class="tx-blue">정채영</span></td>
                                        <td class="w-data tx-left pl20 p_re">
                                            <div class="OTclass"><span>직장인/재학생반</span> <a href="#none" onclick="openWin('OTclassInfo')">?</a> 일반경찰</div>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/listsub') }}">2018 [지방직/서울시] 정채영 국어 [문학집중강의]137작품을 알려주마!(4-6월)</a>
                                            </div>
                                            <dl class="w-info">
                                                <dt>학원실강의 : 2020년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">70강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">50일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">진행중</span>
                                                </dt>
                                                <br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                            <div class="tx-red">※ 바로결제만 가능한 상품입니다.</div>

                                            {{--직장인/재학생 반 안내 팝업--}}
                                            <div id="OTclassInfo" class="willbes-Layer-requestInfo2">
                                                <a class="closeBtn" href="#none" onclick="closeWin('OTclassInfo')">
                                                    <img src="{{ img_url('prof/close.png') }}">
                                                </a>
                                                <div class="Layer-Tit NG tx-dark-black">직장인/재학생반  <span class="tx-blue">수강 안내</span></div>
                                                <div class="Layer-Cont">
                                                    <div class="Layer-SubTit tx-gray">
                                                        <ul>
                                                            <li>
                                                                <strong>예) 40일 강좌 수강시</strong><br>
                                                                - 수강 시간 : 평일 19~03시만 수강 / 주말, 공휴일 24시간 수강 가능<br>
                                                                - 수강 기간 : 원래 수강 기간 X 1.4배수(40일 X 1.4 = 56일)<br>
                                                                - 수강 중지 : 3회. 3회의 합은 56일까지<br>
                                                                - 수강 연장 : 3회. 1일 연장 수강료는 원래 수강 기간 40일 기준(강의 종료일까지만 연장 가능)<br>
                                                                - 수강 환불 : 환불일수는 원래 수강 기간 40일 기준(수강 중지시 환불 불가)<br>
                                                                <br>
                                                                <span class="tx-red">※ 주말반은 일반강의로 변경이 안됩니다.</span>
                                                            </li>                        
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="w-notice p_re">
                                            <div class="w-sp100">
                                                보강동영상 비밀번호 입력
                                                <div>
                                                    <input type="text" id="" name="" placeholder="****" maxlength="10">
                                                    <button type="submit" onclick="">
                                                        <span>확인</span>
                                                    </button>
                                                </div>
                                            </div>                                
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <tbody>
                                    <tr>
                                        <td class="pl100">
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
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
                                    <col style="width: 100px;">
                                    <col style="width: 100px;">
                                    <col width="*">
                                    <col style="width: 250px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">문제풀이</td>
                                        <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                                        <td class="w-data tx-left pl20">
                                            <div class="OTclass">일반경찰</div>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/listsub') }}">2018 [지방직/서울시] 정채영 국어 [문학집중강의]137작품을 알려주마!(4-6월)</a>
                                            </div>
                                            <dl class="w-info">
                                                <dt>학원실강의 : 2020년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>                                    
                                                <dt>강의수 : <span class="tx-blue">70강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">50일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n3">예정</span>
                                                </dt>
                                                <br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                            <div class="tx-red">※ 바로결제만 가능한 상품입니다.</div>
                                        </td>
                                        <td class="w-notice p_re">
                                            <div class="w-sp"><a href="#none" class="bg-black tx-white bd-none">보강동영상 보기</a></div>
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <tbody>
                                    <tr>
                                        <td class="pl100">
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">0원</span>
                                                </span>
                                            </div>
                                            <div class="w-sub tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
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
                                    <col style="width: 100px;">
                                    <col style="width: 100px;">
                                    <col width="*">
                                    <col style="width: 250px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">문제풀이</td>
                                        <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                                        <td class="w-data tx-left pl20">
                                            <div class="OTclass">일반경찰</div>
                                            <div class="w-tit">2018 [지방직/서울시] 정채영 국어 [문학집중강의]137작품을 알려주마! 작품을 알려주마!(4-6월)</div>
                                            <dl class="w-info">
                                                <dt>학원실강의 : 2020년 1월</dt>
                                                <dt><span class="row-line">|</span></dt> 
                                                <dt>강의수 : <span class="tx-blue">70강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">50일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n4">완강</span>
                                                </dt>
                                                <br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice p_re">
                                            <div class="w-sp"><a href="#none">맛보기</a></div>
                                            <ul class="priceWrap">
                                                <li>
                                                    <span class="select">[PC]</span>
                                                    <span class="price tx-blue">7,000원</span>
                                                    <span class="discount">(↓20%)</span>
                                                </li>
                                                <li> 
                                                    <span class="select">[모바일]</span>
                                                    <span class="price tx-blue">80,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </li>
                                                <li> 
                                                    <span class="select">[PC+모바일]</span>
                                                    <span class="price tx-blue">121,000원</span>
                                                    <span class="discount">(↓15%)</span>
                                                </li>
                                            </ul>
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <tbody>
                                    <tr>
                                        <td class="pl100">
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
                    </div>
                    <!-- willbes-Lec -->
                </div>

                <div id="tab03">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black bdb-light-gray">
                            · 추천패키지
                        </div>
                        <!-- willbes-Lec-Subject --> 

                        <div class="willbes-Lec-Table d_block">
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col>
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list bg-light-white">이론</td>
                                        <td class="w-data tx-left pl25">
                                            <div class="OTclass">일반경찰</div>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/packagesub1') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info">
                                                <dt class="mr20">
                                                    <a href="#none" onclick="openWin('InfoFormPkg')">
                                                        <strong>패키지상세정보</strong>
                                                    </a>
                                                </dt>
                                                <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">30일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">진행중</span>
                                                    <span class="nBox n3">예정</span>
                                                    <span class="nBox n4">완강</span>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice">
                                            <div class="priceWrap">
                                                <span class="price tx-blue">156,000원</span>
                                                <span class="discount">(↓40%)</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-list bg-light-white">이론</td>
                                        <td class="w-data tx-left pl25">
                                            <div class="OTclass">일반경찰</div>
                                            <div class="w-tit">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                            <dl class="w-info">
                                                <dt class="mr20">
                                                    <a href="#none" onclick="openWin('InfoFormPkg')">
                                                        <strong>패키지상세정보</strong>
                                                    </a>
                                                </dt>
                                                <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">30일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">진행중</span>
                                                    <span class="nBox n3">예정</span>
                                                    <span class="nBox n4">완강</span>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice">
                                            <div class="priceWrap">
                                                <span class="price tx-blue">156,000원</span>
                                                <span class="discount">(↓40%)</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-list bg-light-white">문제풀이</td>
                                        <td class="w-data tx-left pl25">
                                            <div class="OTclass">일반경찰</div>
                                            <div class="w-tit">2017 (하반기 지방직 대비) 페트라 출제포인트 패키지</div>
                                            <dl class="w-info">
                                                <dt class="mr20"><strong>패키지상세정보</strong></dt>
                                                <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">15일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n4">완강</span>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice">
                                            <div class="priceWrap">
                                                <span class="price tx-blue">72,000원</span>
                                                <span class="discount">(↓60%)</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-list bg-light-white">문제풀이</td>
                                        <td class="w-data tx-left pl25">
                                            <div class="OTclass">일반경찰</div>
                                            <div class="w-tit">2017 (하반기 지방직 대비) 페트라 출제포인트 패키지</div>
                                            <dl class="w-info">
                                                <dt class="mr20">
                                                    <a href="#none" onclick="openWin('InfoFormPkg')">
                                                        <strong>패키지상세정보</strong>
                                                    </a>
                                                </dt>
                                                <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">15일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n4">완강</span>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice">
                                            <div class="priceWrap">
                                                <span class="price tx-blue">72,000원</span>
                                                <span class="discount">(↓60%)</span>
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
                </div>                

                <div id="tab04">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black bdb-light-gray">
                            · 선택패키지
                        </div>
                        <!-- willbes-Lec-Subject --> 

                        <div class="willbes-Lec-Table d_block">
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col>
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list bg-light-white">이론</td>
                                        <td class="w-data tx-left pl25">
                                            <div class="OTclass">일반경찰</div>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/packagesub1') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info">
                                                <dt class="mr20">
                                                    <a href="#none" onclick="openWin('InfoFormPkg')">
                                                        <strong>패키지상세정보</strong>
                                                    </a>
                                                </dt>
                                                <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">30일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">진행중</span>
                                                    <span class="nBox n3">예정</span>
                                                    <span class="nBox n4">완강</span>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice">
                                            <div class="priceWrap">
                                                <span class="price tx-blue">156,000원</span>
                                                <span class="discount">(↓40%)</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-list bg-light-white">이론</td>
                                        <td class="w-data tx-left pl25">
                                            <div class="OTclass">일반경찰</div>
                                            <div class="w-tit">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                            <dl class="w-info">
                                                <dt class="mr20">
                                                    <a href="#none" onclick="openWin('InfoFormPkg')">
                                                        <strong>패키지상세정보</strong>
                                                    </a>
                                                </dt>
                                                <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">30일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">진행중</span>
                                                    <span class="nBox n3">예정</span>
                                                    <span class="nBox n4">완강</span>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice">
                                            <div class="priceWrap">
                                                <span class="price tx-blue">156,000원</span>
                                                <span class="discount">(↓40%)</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-list bg-light-white">문제풀이</td>
                                        <td class="w-data tx-left pl25">
                                            <div class="OTclass">일반경찰</div>
                                            <div class="w-tit">2017 (하반기 지방직 대비) 페트라 출제포인트 패키지</div>
                                            <dl class="w-info">
                                                <dt class="mr20"><strong>패키지상세정보</strong></dt>
                                                <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">15일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n4">완강</span>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice">
                                            <div class="priceWrap">
                                                <span class="price tx-blue">72,000원</span>
                                                <span class="discount">(↓60%)</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-list bg-light-white">문제풀이</td>
                                        <td class="w-data tx-left pl25">
                                            <div class="OTclass">일반경찰</div>
                                            <div class="w-tit">2017 (하반기 지방직 대비) 페트라 출제포인트 패키지</div>
                                            <dl class="w-info">
                                                <dt class="mr20">
                                                    <a href="#none" onclick="openWin('InfoFormPkg')">
                                                        <strong>패키지상세정보</strong>
                                                    </a>
                                                </dt>
                                                <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">15일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n4">완강</span>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice">
                                            <div class="priceWrap">
                                                <span class="price tx-blue">72,000원</span>
                                                <span class="discount">(↓60%)</span>
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
                </div>

                <div class="TopBtn">
                    <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                </div>
                <!-- TopBtn-->

                {{--단과정보 팝업--}}
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
                                        <dt>학원실강의 : 2020년 1월</dt>
                                        <dt><span class="row-line">|</span></dt>
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
                                                <td class="w-data tx-left pl20">
                                                    LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                                    자동출력됩니다. (온라인상품기준)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-list bg-light-white">강좌소개</td>
                                                <td class="w-data tx-left pl20">
                                                    LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                                    자동출력됩니다. (온라인상품기준)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-list bg-light-white">강좌특징</td>
                                                <td class="w-data tx-left pl20">
                                                    LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                                    자동출력됩니다. (온라인상품기준)
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

                {{--패키지정보 팝업--}}
                <div id="InfoFormPkg" class="willbes-Layer-Box d2">
                    <a class="closeBtn" href="#none" onclick="closeWin('InfoFormPkg')">
                        <img src="{{ img_url('sub/close.png') }}">
                    </a>
                    <div class="Layer-Tit tx-dark-black NG">
                        2018 최진우 독한국사 이론강의 (7-8월)[이론/끝장전/주간스포트라이트] 독구다 패키지
                    </div>
                    <div class="lecDetailWrap">
                        <div class="classInfo">
                            <dl class="w-info NG">
                                <dt>개강일 : <span class="tx-blue">2017년 07월 11일</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>수강기간 : <span class="tx-blue">100일</span></dt>
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
                </div>
                <!-- willbes-Layer-Box -->
            </div>

            
        </div>   
    </div>

</div>
<!-- End Container -->
@stop