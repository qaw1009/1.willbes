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
            <div>
                <div id="tab01">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black bdb-light-gray">
                            · 단과강좌
                            <div class="selectBoxForm">
                                <span class="selectBox ml10">
                                    <select id="" name="" title="" class="">
                                        <option selected="selected">최근등록순</option>
                                        <option value="과정순">과정순</option>
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
                                            <div class="OTclass"><span>직장인/재학생반</span> <a href="#none" onclick="openWin('OTclassInfo')">?</a></div>
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
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col>
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
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col>
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
                    </div>
                    <!-- willbes-Lec -->
                </div>

                <div id="tab02">
                    <div>
                        <h4 class="NG">무료강좌</h4>
                        <ul>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <dl class="w-info">
                                    <dt>예비순환(기본강의) · 형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · </dt>
                                    <dt class="NSK">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n2">진행중</span>
                                    </dt>
                                    <dt> · 수강료 : [PC+모바일] 0원</dt>
                                </dl> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <dl class="w-info">
                                    <dt>예비순환(기본강의) · 형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · </dt>
                                    <dt class="NSK">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n2">진행중</span>
                                    </dt>
                                    <dt> · 수강료 : [PC+모바일] 0원</dt>
                                </dl> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <dl class="w-info">
                                    <dt>예비순환(기본강의) · 형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · </dt>
                                    <dt class="NSK">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n2">진행중</span>
                                    </dt>
                                    <dt> · 수강료 : [PC+모바일] 0원</dt>
                                </dl> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <dl class="w-info">
                                    <dt>예비순환(기본강의) · 형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · </dt>
                                    <dt class="NSK">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n2">진행중</span>
                                    </dt>
                                    <dt> · 수강료 : [PC+모바일] 0원</dt>
                                </dl> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <dl class="w-info">
                                    <dt>예비순환(기본강의) · 형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · </dt>
                                    <dt class="NSK">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n2">진행중</span>
                                    </dt>
                                    <dt> · 수강료 : [PC+모바일] 0원</dt>
                                </dl> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <dl class="w-info">
                                    <dt>예비순환(기본강의) · 형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · </dt>
                                    <dt class="NSK">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n2">진행중</span>
                                    </dt>
                                    <dt> · 수강료 : [PC+모바일] 0원</dt>
                                </dl> 
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="tab03">
                    <div>
                        <h4 class="NG">추천패키지</h4>
                        <ul>
                            <li>
                                <a href="#none" class="NG">제이슨코치 소방체력 종합 풀패키지(12개월) </a>
                                <dl class="w-info">
                                    <dt>개강일 : 2019년 7월 · 수강기간 : 100일 ·</dt>
                                    <dt class="NSK">
                                        <span class="nBox n1">무제한</span>
                                    </dt>
                                    <dt> · 수강료 : [PC+모바일] 70,000원</dt>
                                </dl> 
                            </li>
                            <li>
                                <a href="#none" class="NG">제이슨코치 소방체력 종합 풀패키지(12개월) </a>
                                <dl class="w-info">
                                    <dt>개강일 : 2019년 7월 · 수강기간 : 100일 ·</dt>
                                    <dt class="NSK">
                                        <span class="nBox n1">무제한</span>
                                    </dt>
                                    <dt> · 수강료 : [PC+모바일] 70,000원</dt>
                                </dl> 
                            </li>
                            <li>
                                <a href="#none" class="NG">제이슨코치 소방체력 종합 풀패키지(12개월) </a>
                                <dl class="w-info">
                                    <dt>개강일 : 2019년 7월 · 수강기간 : 100일 ·</dt>
                                    <dt class="NSK">
                                        <span class="nBox n1">무제한</span>
                                    </dt>
                                    <dt> · 수강료 : [PC+모바일] 70,000원</dt>
                                </dl> 
                            </li>
                            <li>
                                <a href="#none" class="NG">제이슨코치 소방체력 종합 풀패키지(12개월) </a>
                                <dl class="w-info">
                                    <dt>개강일 : 2019년 7월 · 수강기간 : 100일 ·</dt>
                                    <dt class="NSK">
                                        <span class="nBox n1">무제한</span>
                                    </dt>
                                    <dt> · 수강료 : [PC+모바일] 70,000원</dt>
                                </dl> 
                            </li>
                            <li>
                                <a href="#none" class="NG">제이슨코치 소방체력 종합 풀패키지(12개월) </a>
                                <dl class="w-info">
                                    <dt>개강일 : 2019년 7월 · 수강기간 : 100일 ·</dt>
                                    <dt class="NSK">
                                        <span class="nBox n1">무제한</span>
                                    </dt>
                                    <dt> · 수강료 : [PC+모바일] 70,000원</dt>
                                </dl> 
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="tab04">
                    <div>
                        <h4 class="NG">선택패키지</h4>
                        <ul>
                            <li>
                                <a href="#none" class="NG">제이슨코치 소방체력 종합 풀패키지(12개월) </a>
                                <dl class="w-info">
                                    <dt>개강일 : 2019년 7월 · 수강기간 : 100일 ·</dt>
                                    <dt class="NSK">
                                        <span class="nBox n1">무제한</span>
                                    </dt>
                                    <dt> · 수강료 : [PC+모바일] 70,000원</dt>
                                </dl> 
                            </li>
                            <li>
                                <a href="#none" class="NG">제이슨코치 소방체력 종합 풀패키지(12개월) </a>
                                <dl class="w-info">
                                    <dt>개강일 : 2019년 7월 · 수강기간 : 100일 ·</dt>
                                    <dt class="NSK">
                                        <span class="nBox n1">무제한</span>
                                    </dt>
                                    <dt> · 수강료 : [PC+모바일] 70,000원</dt>
                                </dl> 
                            </li>
                            <li>
                                <a href="#none" class="NG">제이슨코치 소방체력 종합 풀패키지(12개월) </a>
                                <dl class="w-info">
                                    <dt>개강일 : 2019년 7월 · 수강기간 : 100일 ·</dt>
                                    <dt class="NSK">
                                        <span class="nBox n1">무제한</span>
                                    </dt>
                                    <dt> · 수강료 : [PC+모바일] 70,000원</dt>
                                </dl> 
                            </li>
                            <li>
                                <a href="#none" class="NG">제이슨코치 소방체력 종합 풀패키지(12개월) </a>
                                <dl class="w-info">
                                    <dt>개강일 : 2019년 7월 · 수강기간 : 100일 ·</dt>
                                    <dt class="NSK">
                                        <span class="nBox n1">무제한</span>
                                    </dt>
                                    <dt> · 수강료 : [PC+모바일] 70,000원</dt>
                                </dl> 
                            </li>
                            <li>
                                <a href="#none" class="NG">제이슨코치 소방체력 종합 풀패키지(12개월) </a>
                                <dl class="w-info">
                                    <dt>개강일 : 2019년 7월 · 수강기간 : 100일 ·</dt>
                                    <dt class="NSK">
                                        <span class="nBox n1">무제한</span>
                                    </dt>
                                    <dt> · 수강료 : [PC+모바일] 70,000원</dt>
                                </dl> 
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>   
    </div>

</div>
<!-- End Container -->
@stop