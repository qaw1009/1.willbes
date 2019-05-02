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
        
        <div class="curriWrap c_both">
            <ul class="curriTabs c_both">
                <li><a class="on" href="#none">전체</a></li>
                <li><a href="#none">이론과정</a></li>
                <li><a href="#none">심화과정</a></li>
                <li><a href="#none">문풀 1단계 핵심요약/진도별</a></li>
                <li><a href="#none">문풀 2단계 동형 모의고사</a></li>
                <li><a href="#none">문풀 3단계 파이널 모의고사</a></li>
                <li><a href="#none">심화과정</a></li>
                <li><a href="#none">문제풀이</a></li>
                <li><a href="#none">특강</a></li>
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
                            <th class="tx-gray">직렬선택</th>
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
                        <tr>
                            <th class="tx-gray">대비년도</th>
                            <td colspan="8" class="tx-left">
                                <span>
                                    <input type="radio" id="YEAR_SAVE_ALL" name="YEAR_SAVE_ALL" class="iptSave">
                                    <label for="YEAR_SAVE_ALL" class="yearSave">전체</label>
                                </span>
                                <span>
                                    <input type="radio" id="YEAR_SAVE_2019" name="YEAR_SAVE_2019" class="iptSave">
                                    <label for="YEAR_SAVE_2019" class="yearSave">2019년</label>
                                </span>
                                <span>
                                    <input type="radio" id="YEAR_SAVE_2018" name="YEAR_SAVE_2018" class="iptSave">
                                    <label for="YEAR_SAVE_2018" class="yearSave">2018년</label>
                                </span>
                                <span>
                                    <input type="radio" id="YEAR_SAVE_2017" name="YEAR_SAVE_2017" class="iptSave">
                                    <label for="YEAR_SAVE_2017" class="yearSave">2017년</label>
                                </span>
                            </td>
                            <td class="All-Clear">
                                <a href="#none"><img src="{{ img_url('sub/icon_clear.gif') }}" style="margin: -2px 6px 0 0">전체해제</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- curriWrap -->

        <div class="willbes-Bnr">
            <img src="{{ img_url('sample/bnr1.jpg') }}">
        </div>
        <!-- willbes-Bnr -->

        <div class="willbes-Lec-Search p_re mb15">
            <div class="inputBox p_re">
                <div class="selectBox">
                    <select id="select" name="select" title="직접입력" class="">
                        <option selected="selected">직접입력</option>
                        <option value="강좌명">강좌명</option>
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

            <div class="InfoBtn"><a href="#none" onclick="openWin('requestInfo')">수강신청안내 <span>▶</span></a></div>
            <div id="requestInfo" class="willbes-Layer-requestInfo">
                <a class="closeBtn" href="#none" onclick="closeWin('requestInfo')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black">수강신청 <span class="tx-blue">안내</span></div>
                <div class="Layer-Cont">
                    <div class="Layer-SubTit tx-gray">
                        <ul>
                            <li>
                                <strong>도서구입비 소득공제 시행에 따른 분리결제 적용 안내</strong><br>
                                - 소득공제 대상 상품(교재)와 비대상 상품 (강의)을 함께 주문하실 수 없습니다. <br>
                                (소득공제를 위한 가맹점 분리로 인해 2회 결제 진행)<br>
                                - 반드시 <span class="tx-red">강의와 교재를 각각 결제</span>해주시기 바랍니다. (강좌상품 선구매 후 교재 구매 가능)
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
                                    <td><span class="nBox n4">완강</span></td>
                                    <td class="tx-left">모든 강의 제작 및 업데이트가 완료된 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="nBox n2">진행중</span></th>
                                    <td class="tx-left">강의 업데이트가 진행중인 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="nBox n3">예정</span></th>
                                    <td class="tx-left">신규강좌 업데이트가 예정중인 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="nBox n1">2배수</span></th>
                                    <td class="tx-left">공유 방지를 위해 전체강의시간/개별강의시간의 2배까지 수강이 가능한 강좌</td>
                                </tr>
                                <tr>
                                    <th><img src="{{ img_url('sub/icon_detail.gif') }}"></th>
                                    <td class="tx-left">돋보기 아이콘 클릭 시 해당 강좌의 상세정보 팝업 노출</td>    
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
            <div class="willbes-Lec-Subject tx-dark-black">
                · 국어
                <div class="selectBoxForm">
                    <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                    <span class="selectBox ml10">
                        <select id="" name="" title="" class="">
                            <option selected="selected">최근등록순</option>
                            <option value="과정순">과정순</option>
                        </select>
                    </span>
                </div>
            </div>
            <!-- willbes-Lec-Subject -->

            <div class="willbes-Lec-Profdata tx-dark-black">
                <ul>
                    <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                    <li class="ProfDetail">
                        <div class="Obj">
                            공무원 국어종결자<br/>정채영 국어
                        </div>
                        <div class="Name">정채영 교수님</div>
                    </li>
                    <li class="Reply tx-blue">
                        <strong>수강후기</strong>
                        <div class="sliderUp">
                            <div class="sliderVertical roll-Reply tx-dark-black">
                                <div>1국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                <div>2국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                <div>3국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- willbes-Lec-Profdata -->

            <div class="willbes-Lec-Line">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Lec-Table">        
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 95px;">
                        <col>
                        <col style="width: 290px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list">문제풀이</td>
                            <td class="w-name">사전조사서특강<br/><span class="tx-blue">정채영</span></td>
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
        </div>
        <!-- willbes-Lec -->

        <div class="willbes-Lec NG c_both">
            <div class="willbes-Lec-Profdata tx-dark-black">
                <ul>
                    <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                    <li class="ProfDetail">
                        <div class="Obj">
                            국어강의의 뉴 패러다임!<br/>듣기만 해도 암기되는 강의
                        </div>
                        <div class="Name">기미진 교수님</div>
                    </li>
                    <li class="Reply tx-blue">
                        <strong>수강후기</strong>
                        <div class="sliderUp">
                            <div class="sliderVertical roll-Reply tx-dark-black">
                                <div>444국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                <div>555국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                <div>666국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- willbes-Lec-Profdata -->

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
        </div>
        <!-- willbes-Lec -->

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

    </div>
    <div class="Quick-Bnr ml20">
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