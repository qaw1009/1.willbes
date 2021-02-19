@extends('html.m.layouts.v2.master')

@section('content')

<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div id="Sticky" class="sticky-Title">
        <div class="sticky-Grid sticky-topTit">
            <div class="willbes-Tit NGEB p_re">  
                <button type="button" class="goback" onclick="history.back(-1); return false;">
                    <span class="hidden">뒤로가기</span>
                </button>  
                교수진소개 > 유아 > 민정선 교수
            </div>
        </div>
    </div>
    
    <div class="profAreaView">
        <div class="profImg"><img src="https://static.willbes.net/public/images/promotion/m/2018/prof_348x461.png" alt="강사명"></div>
        <div class="profCopy NSK">
            <strong class="NSK-Black"><span>유아</span> 민정선</strong> 교수
            <p>
                합격을 여는<br>
                유아 임용의 대세
            </p>
        </div>
        <div class="profMenu">
            <ul>
                <li><a href="#none" onclick="openWin('LayerProfile'),openWin('Profile')">프로필</a><li>
                {{--
                <li><a href="#none">홈페이지</a><li>
                <li><a href="#none">카페</a><li>
                <li><a href="#none">블로그</a><li>
                --}}
                <li><a href="#none" onclick="openWin('LayerCurriculum'),openWin('Curriculum')">커리큘럼</a><li>                
            </ul>
        </div>        
    </div>

    <div class="lineTabs lecListTabs c_both">
        <ul class="tabWrap lineWrap rowlineWrap lecListWrap five mt-zero">
            <li><a href="#leclist1" class="on">패키지</a><span class="row-line">|</span></li>
            <li><a href="#leclist2">단과</a><span class="row-line">|</span></li>
            <li><a href="#leclist3">전국라이브</a><span class="row-line">|</span></li>
            <li><a href="#leclist4">특강</a><span class="row-line">|</span></li>
            <li><a href="#leclist5">수강생전용</a></li>
        </ul>        

        <div class="tabBox lineBox lecListBox">
            {{--패키지--}}
            <div id="leclist1" class="tabContent">
                <div class="profLecTab">
                    <ul class="tabWrap two">
                        <li><a href="#pkgList1" class="on">온라인강좌</a></li>
                        <li><a href="#pkgList2">학원강좌</a></li>
                    </ul>
                </div>

                {{--온라인강좌--}}
                <div class="lineTabs lecListTabs c_both pd-zero" id="pkgList1">
                    <div id="pkg01">
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                            <colgroup>
                                <col style="width: 87%;">
                                <col style="width: 13%;">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td class="w-data tx-left">
                                        <dl class="w-info">
                                            <dt>기본이론</dt>
                                        </dl>
                                        <div class="w-tit">
                                            <a href="#none">2020년 (1~11월) 민정선 유아 연간 패키지</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>개강일 <span class="tx-blue">2019년 5월</span> <span class="row-line">|</span></dt>
                                            <dt>수강기간 <span class="tx-blue">365일</span> <span class="NSK ml10 nBox n1">무제한</span></dt>
                                        </dl>
                                        <div class="priceWrap">
                                            <span class="price">80,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-data tx-left">
                                        <dl class="w-info">
                                            <dt>기본이론</dt>
                                        </dl>
                                        <div class="w-tit">
                                            <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>개강일 <span class="tx-blue">2019년 5월</span> <span class="row-line">|</span></dt>
                                            <dt>수강기간 <span class="tx-blue">30일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt>
                                        </dl>
                                        <div class="priceWrap">
                                            <span class="price">80,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-data tx-left">
                                        <dl class="w-info">
                                            <dt>기본이론</dt>
                                        </dl>
                                        <div class="w-tit">
                                            <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>개강일 <span class="tx-blue">2019년 5월</span> <span class="row-line">|</span></dt>
                                            <dt>수강기간 <span class="tx-blue">30일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt>
                                        </dl>
                                        <div class="priceWrap">
                                            <span class="price">80,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                    </td>
                                </tr>                    
                            </tbody>
                        </table>
                    </div>
                </div>

                {{--학원강좌 --}} 
                <div class="lineTabs lecListTabs c_both pd-zero" id="pkgList2">  
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <tbody>
                            <tr>
                                <td class="w-data tx-left">
                                    <dl class="w-info">
                                        <dt>노량진<span class="row-line">|</span>기본이론
                                    </dl>
                                    <div class="w-tit">
                                        <a href="lecture_offline_pkg2">2020년 (1~11월) 민정선 유아 연간 패키지</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강월 <span class="tx-blue">2020년 9월</span> <span class="row-line">|</span></dt>
                                        <dt>수강형태 <span class="tx-blue">실강+인강</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt>
                                    </dl>
                                    <div class="priceWrap">
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <dl class="w-info">
                                        <dt>신림(본원)<span class="row-line">|</span>GS3순환
                                    </dl>
                                    <div class="w-tit">
                                        <a href="lecture_offline_pkg2">20_PSAT종합반_3월반</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강월 <span class="tx-blue">2020년 5월</span> <span class="row-line">|</span></dt>
                                        <dt>수강형태 <span class="tx-blue">실강</span> <span class="NSK ml10 nBox n4">방문접수</span> <span class="NSK nBox n2">접수중</span></dt>
                                    </dl>
                                    <div class="priceWrap">
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <dl class="w-info">
                                        <dt>신림(본원)<span class="row-line">|</span>GS3순환
                                    </dl>
                                    <div class="w-tit">
                                        <a href="lecture_offline_pkg2">20_PSAT종합반_3월반</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강월 <span class="tx-blue">2020년 5월</span> <span class="row-line">|</span></dt>
                                        <dt>수강형태 <span class="tx-blue">실강</span> <span class="NSK ml10 nBox n4">방문접수</span> <span class="NSK nBox n2">접수중</span></dt>
                                    </dl>
                                    <div class="priceWrap">
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </td>
                            </tr>                    
                        </tbody>
                    </table>         
                </div>              
            </div>

            {{--단과--}}
            <div id="leclist2" class="tabContent">
                <div class="profLecTab">
                    <ul class="tabWrap two">
                        <li><a href="#oneList1" class="on">온라인강좌</a></li>
                        <li><a href="#oneList2">학원강좌</a></li>
                    </ul>
                </div>

                {{--온라인--}}
                <div class="lineTabs lecListTabs c_both pd-zero" id="oneList1">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <tbody>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="oneBox">
                                        <dl class="w-info">
                                            <dt>이론반<span class="row-line">|</span>유아<span class="row-line">|</span>민정선 </dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            <a href="#none">2020 (9~10월) 실전 모의고사반 (7주)</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>강의촬영(실강) : 2020년 09월</dt><br>
                                            <dt>강의수 : <span class="tx-blue">44강/60강</span><span class="row-line">|</span></dt>
                                            <dt>수강기간 : <span class="tx-blue">90일</span>
                                                <span class="NSK ml10 nBox n1">무제한</span>
                                                <span class="NSK nBox n3">진행중</span>
                                            </dt>
                                        </dl>
                                        <div class="priceWrap">
                                            <input type="checkbox" id="checkA" name="checkA">
                                            PC+모바일 : 
                                            <span class="price">80,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                        <div class="w-buy">
                                            <ul class="two">
                                                <li><a href="#none" class="btn_gray" name="btn_cart" data-direct-pay="N" data-is-redirect="Y">장바구니</a></li>
                                                <li><a href="#none" class="btn_blue" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y">바로결제</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="oneBox">
                                        <dl class="w-info">
                                            <dt>이론반<span class="row-line">|</span>유아<span class="row-line">|</span>민정선 </dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            <a href="#none">2020 (9~10월) 실전 모의고사반 (7주)</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>강의촬영(실강) : 2020년 09월</dt><br>
                                            <dt>강의수 : <span class="tx-blue">44강/60강</span><span class="row-line">|</span></dt>
                                            <dt>수강기간 : <span class="tx-blue">90일</span>
                                                <span class="NSK ml10 nBox n1">무제한</span>
                                                <span class="NSK nBox n3">진행중</span>
                                            </dt>
                                        </dl>
                                        <div class="priceWrap">
                                            <input type="checkbox" id="checkA" name="checkA">
                                            PC+모바일 : 
                                            <span class="price">80,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                        <div class="w-buy">
                                            <ul class="two">
                                                <li><a href="#none" class="btn_gray" name="btn_cart" data-direct-pay="N" data-is-redirect="Y">장바구니</a></li>
                                                <li><a href="#none" class="btn_blue" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y">바로결제</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>                        
                            </tr>                
                        </tbody>
                    </table>                    
                </div>  
                
                {{--학원--}}
                <div class="lineTabs lecListTabs c_both pd-zero" id="oneList2">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <tbody>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="oneBox">
                                        <dl class="w-info">
                                            <dt>노량진<span class="row-line">|</span>이론반<span class="row-line">|</span>유아<span class="row-line">|</span>민정선</dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            <a href="#none">22020 (9~10월) 실전 모의고사반 (7주)휴</a>
                                        </div>
                                        <dl class="w-info tx-gray">                                
                                            <dt>개강일~종강일 : <span class="tx-blue">11/15 ~ 12/04</span> 월화수목금 (15회차)</dt><br>       
                                            <dt>수강형태 : <span class="tx-blue">라이브</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt>                        
                                        </dl>
                                        <div class="priceWrap"> 
                                            <span class="price">80,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                        <div class="w-buy">       
                                            <ul class="three">
                                                <li><a href="#none" class="btn_white" onclick="openWin('LecBuyMessagePop')">방문결제</a></li>
                                                <li><a href="#none" class="btn_gray">장바구니</a></li>
                                                <li><a href="#none" class="btn_blue">바로결제</a></li>
                                            </ul> 
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="oneBox">
                                        <dl class="w-info">
                                            <dt>노량진<span class="row-line">|</span>이론반<span class="row-line">|</span>유아<span class="row-line">|</span>민정선</dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            <a href="#none">22020 (9~10월) 실전 모의고사반 (7주)휴</a>
                                        </div>
                                        <dl class="w-info tx-gray">                                
                                            <dt>개강일~종강일 : <span class="tx-blue">11/15 ~ 12/04</span> 월화수목금 (15회차)</dt><br>       
                                            <dt>수강형태 : <span class="tx-blue">라이브</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt>                         
                                        </dl>
                                        <div class="priceWrap">
                                            <span class="price">80,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                        <div class="w-buy">       
                                            <ul class="three">
                                                <li><a href="#none" class="btn_white" onclick="openWin('LecBuyMessagePop')">방문결제</a></li>
                                                <li><a href="#none" class="btn_gray">장바구니</a></li>
                                                <li><a href="#none" class="btn_blue">바로결제</a></li>
                                            </ul> 
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <dl class="w-info">
                                        <dt>신림(본원)<span class="row-line">|</span>GS3순환
                                    </dl>
                                    <div class="w-tit">
                                        <a href="lecture_offline_pkg2">20_PSAT종합반_3월반</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강월 <span class="tx-blue">2020년 5월</span> <span class="row-line">|</span></dt>
                                        <dt>수강형태 <span class="tx-blue">실강</span> <span class="NSK ml10 nBox n4">방문접수</span> <span class="NSK nBox n2">접수중</span></dt>
                                    </dl>
                                    <div class="priceWrap">
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </td>
                            </tr>                    
                        </tbody>
                    </table>
                </div> 
            </div>

            {{--전국라이브--}}
            <div id="leclist3" class="tabContent">
                <div class="lineTabs lecListTabs c_both pd-zero">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <tbody>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="oneBox">
                                        <dl class="w-info">
                                            <dt>노량진<span class="row-line">|</span>이론반<span class="row-line">|</span>유아<span class="row-line">|</span>민정선</dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            <a href="#none">22020 (9~10월) 실전 모의고사반 (7주)휴</a>
                                        </div>
                                        <dl class="w-info tx-gray">                                
                                            <dt>개강일~종강일 : <span class="tx-blue">11/15 ~ 12/04</span> 월화수목금 (15회차)</dt><br>       
                                            <dt>수강형태 : <span class="tx-blue">라이브</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt>                          
                                        </dl>
                                        <div class="priceWrap">
                                            <span class="price">80,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                        <div class="w-buy">       
                                            <ul class="three">
                                                <li><a href="#none" class="btn_white" onclick="openWin('LecBuyMessagePop')">방문결제</a></li>
                                                <li><a href="#none" class="btn_gray">장바구니</a></li>
                                                <li><a href="#none" class="btn_blue">바로결제</a></li>
                                            </ul> 
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="oneBox">
                                        <dl class="w-info">
                                            <dt>노량진<span class="row-line">|</span>이론반<span class="row-line">|</span>유아<span class="row-line">|</span>민정선</dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            <a href="#none">22020 (9~10월) 실전 모의고사반 (7주)휴</a>
                                        </div>
                                        <dl class="w-info tx-gray">                                
                                            <dt>개강일~종강일 : <span class="tx-blue">11/15 ~ 12/04</span> 월화수목금 (15회차)</dt><br>       
                                            <dt>수강형태 : <span class="tx-blue">라이브</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt>                           
                                        </dl>
                                        <div class="priceWrap">
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                        <div class="w-buy">       
                                            <ul class="three">
                                                <li><a href="#none" class="btn_white" onclick="openWin('LecBuyMessagePop')">방문결제</a></li>
                                                <li><a href="#none" class="btn_gray">장바구니</a></li>
                                                <li><a href="#none" class="btn_blue">바로결제</a></li>
                                            </ul> 
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <dl class="w-info">
                                        <dt>신림(본원)<span class="row-line">|</span>GS3순환
                                    </dl>
                                    <div class="w-tit">
                                        <a href="lecture_offline_pkg2">20_PSAT종합반_3월반</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강월 <span class="tx-blue">2020년 5월</span> <span class="row-line">|</span></dt>
                                        <dt>수강형태 <span class="tx-blue">실강</span> <span class="NSK ml10 nBox n4">방문접수</span> <span class="NSK nBox n2">접수중</span></dt>
                                    </dl>
                                    <div class="priceWrap">
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </td>
                            </tr>                    
                        </tbody>
                    </table>
                </div>  
            </div>

            {{--특강--}}
            <div id="leclist4" class="tabContent">
                <div class="profLecTab">
                    <ul class="tabWrap two">
                        <li><a href="#specialList1" class="on">온라인강좌</a></li>
                        <li><a href="#specialList2">학원강좌</a></li>
                    </ul>
                </div>

                {{--온라인--}}
                <div class="lineTabs lecListTabs c_both pd-zero" id="specialList1">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <tbody>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="oneBox">
                                        <dl class="w-info">
                                            <dt>특강반<span class="row-line">|</span>유아<span class="row-line">|</span>민정선 </dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            <a href="#none">2020 (9~10월) 실전 모의고사반 (7주)</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>강의촬영(실강) : 2020년 09월</dt><br>
                                            <dt>강의수 : <span class="tx-blue">44강/60강</span><span class="row-line">|</span></dt>
                                            <dt>수강기간 : <span class="tx-blue">90일</span>
                                                <span class="NSK ml10 nBox n1">무제한</span>
                                                <span class="NSK nBox n3">진행중</span>
                                            </dt>
                                        </dl>
                                        <div class="priceWrap">
                                            <input type="checkbox" id="checkA" name="checkA">
                                            PC+모바일 : 
                                            <span class="price">80,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                        <div class="w-buy">
                                            <ul class="two">
                                                <li><a href="#none" class="btn_gray" name="btn_cart" data-direct-pay="N" data-is-redirect="Y">장바구니</a></li>
                                                <li><a href="#none" class="btn_blue" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y">바로결제</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="oneBox">
                                        <dl class="w-info">
                                            <dt>특강반<span class="row-line">|</span>유아<span class="row-line">|</span>민정선 </dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            <a href="#none">2020 (9~10월) 실전 모의고사반 (7주)</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>강의촬영(실강) : 2020년 09월</dt><br>
                                            <dt>강의수 : <span class="tx-blue">44강/60강</span><span class="row-line">|</span></dt>
                                            <dt>수강기간 : <span class="tx-blue">90일</span>
                                                <span class="NSK ml10 nBox n1">무제한</span>
                                                <span class="NSK nBox n3">진행중</span>
                                            </dt>
                                        </dl>
                                        <div class="priceWrap">
                                            <input type="checkbox" id="checkA" name="checkA">
                                            PC+모바일 : 
                                            <span class="price">80,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                        <div class="w-buy">
                                            <ul class="two">
                                                <li><a href="#none" class="btn_gray" name="btn_cart" data-direct-pay="N" data-is-redirect="Y">장바구니</a></li>
                                                <li><a href="#none" class="btn_blue" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y">바로결제</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>                        
                            </tr>                
                        </tbody>
                    </table>                    
                </div>  
                
                {{--학원--}}
                <div class="lineTabs lecListTabs c_both pd-zero" id="specialList2">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <tbody>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="oneBox">
                                        <dl class="w-info">
                                            <dt>노량진<span class="row-line">|</span>특강반<span class="row-line">|</span>유아<span class="row-line">|</span>민정선</dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            <a href="#none">2020 (9~10월) 실전 모의고사반 (7주)휴</a>
                                        </div>
                                        <dl class="w-info tx-gray">                                
                                            <dt>개강일~종강일 : <span class="tx-blue">11/15 ~ 12/04</span> 월화수목금 (15회차)</dt><br>       
                                            <dt>수강형태 : <span class="tx-blue">라이브</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt>                           
                                        </dl>
                                        <div class="priceWrap">
                                            <span class="price">80,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                        <div class="w-buy">       
                                            <ul class="three">
                                                <li><a href="#none" class="btn_white" onclick="openWin('LecBuyMessagePop')">방문결제</a></li>
                                                <li><a href="#none" class="btn_gray">장바구니</a></li>
                                                <li><a href="#none" class="btn_blue">바로결제</a></li>
                                            </ul> 
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="oneBox">
                                        <dl class="w-info">
                                            <dt>노량진<span class="row-line">|</span>특강반<span class="row-line">|</span>유아<span class="row-line">|</span>민정선</dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            <a href="#none">2020 (9~10월) 실전 모의고사반 (7주)휴</a>
                                        </div>
                                        <dl class="w-info tx-gray">                                
                                            <dt>개강일~종강일 : <span class="tx-blue">11/15 ~ 12/04</span> 월화수목금 (15회차)</dt><br>       
                                            <dt>수강형태 : <span class="tx-blue">라이브</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt>                          
                                        </dl>
                                        <div class="priceWrap">
                                            <span class="price">80,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                        <div class="w-buy">       
                                            <ul class="three">
                                                <li><a href="#none" class="btn_white" onclick="openWin('LecBuyMessagePop')">방문결제</a></li>
                                                <li><a href="#none" class="btn_gray">장바구니</a></li>
                                                <li><a href="#none" class="btn_blue">바로결제</a></li>
                                            </ul> 
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <dl class="w-info">
                                        <dt>신림(본원)<span class="row-line">|</span>GS3순환
                                    </dl>
                                    <div class="w-tit">
                                        <a href="lecture_offline_pkg2">20_PSAT종합반_3월반</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강월 <span class="tx-blue">2020년 5월</span> <span class="row-line">|</span></dt>
                                        <dt>수강형태 <span class="tx-blue">실강</span> <span class="NSK ml10 nBox n4">방문접수</span> <span class="NSK nBox n2">접수중</span></dt>
                                    </dl>
                                    <div class="priceWrap">
                                        <input type="checkbox" id="checkA" name="checkA">
                                        PC+모바일 : 
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                    <div class="w-buy">       
                                        <ul class="three">
                                            <li><a href="#none" class="btn_white" onclick="openWin('LecBuyMessagePop')">방문결제</a></li>
                                            <li><a href="#none" class="btn_gray">장바구니</a></li>
                                            <li><a href="#none" class="btn_blue">바로결제</a></li>
                                        </ul> 
                                    </div>
                                </td>
                            </tr>                    
                        </tbody>
                    </table>
                </div> 
            </div>

            {{--수강생전용--}}
            <div id="leclist5" class="tabContent">
                <div class="lineTabs lecListTabs c_both pd-zero" id="offList1">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <tbody>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="oneBox">
                                        <dl class="w-info">
                                            <dt>이론반<span class="row-line">|</span>유아<span class="row-line">|</span>민정선 </dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            <a href="#none">2020 (9~10월) 실전 모의고사반 (7주)</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>강의촬영(실강) : 2020년 09월</dt><br>
                                            <dt>강의수 : <span class="tx-blue">44강/60강</span><span class="row-line">|</span></dt>
                                            <dt>수강기간 : <span class="tx-blue">90일</span>
                                                <span class="NSK ml10 nBox n1">무제한</span>
                                                <span class="NSK nBox n3">진행중</span>
                                            </dt>
                                        </dl>
                                        <div class="priceWrap">
                                            <input type="checkbox" id="checkA" name="checkA">
                                            PC+모바일 : 
                                            <span class="price">80,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                        <div class="w-buy">
                                            <ul class="two">
                                                <li><a href="#none" class="btn_gray" name="btn_cart" data-direct-pay="N" data-is-redirect="Y">장바구니</a></li>
                                                <li><a href="#none" class="btn_blue" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y">바로결제</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="oneBox">
                                        <dl class="w-info">
                                            <dt>이론반<span class="row-line">|</span>유아<span class="row-line">|</span>민정선 </dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            <a href="#none">2020 (9~10월) 실전 모의고사반 (7주)</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>강의촬영(실강) : 2020년 09월</dt><br>
                                            <dt>강의수 : <span class="tx-blue">44강/60강</span><span class="row-line">|</span></dt>
                                            <dt>수강기간 : <span class="tx-blue">90일</span>
                                                <span class="NSK ml10 nBox n1">무제한</span>
                                                <span class="NSK nBox n3">진행중</span>
                                            </dt>
                                        </dl>
                                        <div class="priceWrap">
                                            <input type="checkbox" id="checkA" name="checkA">
                                            PC+모바일 : 
                                            <span class="price">80,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                        <div class="w-buy">
                                            <ul class="two">
                                                <li><a href="#none" class="btn_gray" name="btn_cart" data-direct-pay="N" data-is-redirect="Y">장바구니</a></li>
                                                <li><a href="#none" class="btn_blue" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y">바로결제</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>                        
                            </tr>                
                        </tbody>
                    </table>                    
                </div>  
            </div>
        </div>
    </div>
    <!--lineTabs//-->

    {{--학원방문결제 메세지--}}
    <div id="LecBuyMessagePop" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h250 fix">
            <a class="closeBtn" href="#none" onclick="closeWin('LecBuyMessagePop')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <div class="Message NG">
                <p>해당 상품이<br> 학원방문결제 접수에 담겼습니다.</p>
                <p>학원방문결제 접수로<br> 이동하시겠습니까?<p>
            </div>
            <div class="MessageBtns">
                <a href="#none" class="btn_gray">예</a>
                <a href="#none" class="btn_white">계속구매</a>
            </div>
        </div>
        <div class="dim" onclick="closeWin('LecBuyMessagePop')"></div>
    </div>
    <!-- LecBuyMessagePop //-->

    {{--프로필 팝업--}}
    <div id="LayerProfile" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-ProfileBox fix">
            <a class="closeBtn" href="#none" onclick="closeWin('LayerProfile')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">민정선</span> 교수님 프로필</div>
            <div class="Layer-Cont">
                <div class="Layer-SubTit NG">· 약력</div>
                <div class="Layer-Txt tx-gray">
                    - 現) 윌비스 임용고시학원 유아임용 대표 교수<br>
                    - 現) 교육사랑 교컴 [아동생활지도사] 강의<br>
                    - 現) 배화여자대학교 평생교육원 아동학과 강사<br>
                    - 중앙대학교 유아교육과 박사 과정 <br>
                </div>
                <div class="Layer-SubTit NG">· 저서</div>
                <div class="Layer-Txt tx-gray">
                    - 2020 민쌤의 유아임용 웹지도
                </div>
            </div>
        </div>
        <div class="dim" onclick="closeWin('LayerProfile')"></div>
    </div>
    <!--willbes-Layer-ProfileBox // -->

    {{-- 커리큘럼 팝업--}}
    <div id="LayerCurriculum" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-CurriBox fix">
            <a class="closeBtn" href="#none" onclick="closeWin('LayerCurriculum')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">민정선</span> 교수님 커리큘럼</div>
            <div class="Layer-Cont">
                <img src="https://lms.willbes.net/public/uploads/willbes/board/92/2020/1008/board_297951_01_20201008155552.jpg"/>
            </div>
        </div>
        <div class="dim" onclick="closeWin('LayerCurriculum')"></div>
    </div>
    <!-- // willbes-Layer-CurriBox -->


    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

</div>
<!-- End Container -->
@stop