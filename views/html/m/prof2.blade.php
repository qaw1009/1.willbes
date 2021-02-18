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
                교수진소개 > 경제학 > 황종휴 강사
            </div>
        </div>
    </div>
    
    <div class="profAreaView">
        <div class="profImg"><img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/prof_detail_50769.png" alt="강사명"></div>
        <div class="profCopy NSK">
            <strong class="NSK-Black"><span>경제학</span> 황종휴</strong> 강사
            <p>
                직관적 이해!<br>
                냉철한 분석과 정리!
            </p>
        </div>
        <div class="profMenu">
            <ul>
                <li><a href="#none" onclick="openWin('LayerProfile'),openWin('Profile')">프로필</a><li>
                <li><a href="#none">맛보기</a><li>
                <li><a href="#none" onclick="openWin('LayerCurriculum'),openWin('Curriculum')">커리큘럼</a><li>
                <li><a href="#none">강사카페</a><li>
            </ul>
        </div>        
    </div>

    <div class="lineTabs lecListTabs c_both">
        <ul class="tabWrap lineWrap rowlineWrap lecListWrap three mt-zero">
            <li><a href="#leclist1" class="on">동영상수강신청</a><span class="row-line">|</span></li>
            <li><a href="#leclist2">학원수강신청</a><span class="row-line">|</span></li>
            <li><a href="#leclist3">무료특강신청</a><span class="row-line">|</span></li>
        </ul>        

        <div class="tabBox lineBox lecListBox">
            {{--동영상수강신청--}}
            <div id="leclist1" class="tabContent">
                <div class="profLecTab">
                    <ul class="tabWrap">
                        <li><a href="#onList1" class="on">단과강좌</a></li>
                        <li><a href="#onList2">추천패키지</a></li>
                        <li><a href="#onList3">선택패키지</a></li>
                    </ul>
                </div>

                {{--단과강좌--}}
                <div class="lineTabs lecListTabs c_both pd-zero" id="onList1">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <tbody>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="oneBox">
                                        <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                        <dl class="w-info">
                                            <dt>심화이론<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현 </dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>학원실강의 : 2020년 1월</dt><br>
                                            <dt>강의수 : <span class="tx-blue">12강/56강</span><span class="row-line">|</span></dt>
                                            <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">무제한</span> <span class="NSK nBox n2">진행중</span></dt>                                
                                        </dl>
                                        <div class="priceWrap">
                                            <input type="checkbox" id="checkA" name="checkA">
                                            PC+모바일 : 
                                            <span class="price">80,000원</span>
                                            <span class="discount">20% ↓</span>
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                        <div class="w-buy">       
                                            <ul class="two">
                                                <li><a href="#none" class="btn_gray">장바구니</a></li>
                                                <li><a href="#none" class="btn_blue">바로결제</a></li>
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="oneBox">
                                        <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                        <dl class="w-info">
                                            <dt>심화이론<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현 </dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>학원실강의 : 2020년 1월</dt><br>
                                            <dt>강의수 : <span class="tx-blue">12강/56강</span><span class="row-line">|</span></dt>
                                            <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">무제한</span> <span class="NSK nBox n2">진행중</span></dt>                                
                                        </dl>
                                        <div class="priceWrap">
                                            <input type="checkbox" id="checkA" name="checkA">
                                            PC+모바일 : 
                                            <span class="price">80,000원</span>
                                            <span class="discount">20% ↓</span>
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                        <div class="w-buy">       
                                            <ul class="two">
                                                <li><a href="#none" class="btn_gray">장바구니</a></li>
                                                <li><a href="#none" class="btn_blue">바로결제</a></li>
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="oneBox">
                                        <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                        <dl class="w-info">
                                            <dt>심화이론<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현 </dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>학원실강의 : 2020년 1월</dt><br>
                                            <dt>강의수 : <span class="tx-blue">12강/56강</span><span class="row-line">|</span></dt>
                                            <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">무제한</span> <span class="NSK nBox n2">진행중</span></dt>                                
                                        </dl>
                                        <div class="priceWrap">
                                            <input type="checkbox" id="checkA" name="checkA">
                                            PC+모바일 : 
                                            <span class="price">80,000원</span>
                                            <span class="discount">20% ↓</span>
                                            <span class="dcprice">64,000원</span>                                          
                                        </div>
                                        <div class="w-buy">       
                                            <ul class="two">
                                                <li><a href="#none" class="btn_gray">장바구니</a></li>
                                                <li><a href="#none" class="btn_blue">바로결제</a></li>
                                            </ul> 
                                        </div>
                                    </div>
                                </td>
                            </tr>                    
                        </tbody>
                    </table>
                </div>

                {{--추천패키지--}}
                <div class="lineTabs lecListTabs c_both pd-zero" id="onList2">
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
                                        <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강일 <span class="tx-blue">2019년 5월</span> <span class="row-line">|</span></dt>
                                        <dt>수강기간 <span class="tx-blue">30일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt>
                                    </dl>
                                    <div class="priceWrap">                                        
                                        <span class="price">80,000원</span>
                                        <span class="discount">20% ↓</span>
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
                                        <span class="discount">20% ↓</span>
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
                                        <span class="discount">20% ↓</span>
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </td>
                            </tr>                    
                        </tbody>
                    </table>
                </div>

                {{--선택패키지--}}
                <div class="lineTabs lecListTabs c_both pd-zero" id="onList3">
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
                                        <a href="#none">2019 일반경찰 선택패키지</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강일 <span class="tx-blue">2019년 5월</span> <span class="row-line">|</span></dt>
                                        <dt>수강기간 <span class="tx-blue">30일</span> <span class="NSK ml10 nBox n1">무제한</span></dt>
                                    </dl>
                                    <div class="priceWrap">                                        
                                        <span class="price">80,000원</span>
                                        <span class="discount">20% ↓</span>
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
                                        <a href="#none">2019 일반경찰 선택패키지</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강일 <span class="tx-blue">2019년 5월</span> <span class="row-line">|</span></dt>
                                        <dt>수강기간 <span class="tx-blue">30일</span> <span class="NSK ml10 nBox n1">무제한</span></dt>
                                    </dl>
                                    <div class="priceWrap">                                        
                                        <span class="price">80,000원</span>
                                        <span class="discount">20% ↓</span>
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
                                        <a href="#none">2019 일반경찰 선택패키지</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강일 <span class="tx-blue">2019년 5월</span> <span class="row-line">|</span></dt>
                                        <dt>수강기간 <span class="tx-blue">30일</span> <span class="NSK ml10 nBox n1">무제한</span></dt>
                                    </dl>
                                    <div class="priceWrap">                                        
                                        <span class="price">80,000원</span>
                                        <span class="discount">20% ↓</span>
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </td>
                            </tr>                    
                        </tbody>
                    </table>
                </div>
            </div>

            {{--학원수강신청--}}
            <div id="leclist2" class="tabContent">
                <div class="profLecTab">
                    <ul class="tabWrap two">
                        <li><a href="#offList1" class="on">단과</a></li>
                        <li><a href="#offList2">종합반</a></li>
                    </ul>
                </div>

                {{--단과--}}
                <div class="lineTabs lecListTabs c_both pd-zero" id="offList1">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <tbody>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="oneBox">
                                        <dl class="w-info">
                                            <dt>신림(본원)<span class="row-line">|</span>GS3순환<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴</dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            <a href="lecture_offline2">20_GS3순환 경제학 황종휴</a>
                                        </div>
                                        <dl class="w-info tx-gray">                                
                                            <dt>개강일~종강일 : <span class="tx-blue">05/19 ~ 06/08</span> 월화수목금토 (19회차)</dt><br>       
                                            <dt>수강형태 : <span class="tx-blue">오전영상</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt>                      
                                        </dl>
                                        <div class="priceWrap">                                        
                                            <span class="price">80,000원</span>
                                            <span class="discount">20% ↓</span>
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
                                    <div class="oneBox">
                                        <dl class="w-info">
                                            <dt>신림(본원)<span class="row-line">|</span>GS3순환<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴</dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            <a href="lecture_offline2">20_GS3순환 경제학 황종휴</a>
                                        </div>
                                        <dl class="w-info tx-gray">                                
                                            <dt>개강일~종강일 : <span class="tx-blue">05/19 ~ 06/08</span> 월화수목금토 (19회차)</dt><br>       
                                            <dt>수강형태 : <span class="tx-blue">오전영상</span> <span class="NSK ml10 nBox n4">방문접수</span> <span class="NSK nBox n2">접수중</span></dt>                          
                                        </dl>
                                        <div class="priceWrap">                                        
                                            <span class="price">80,000원</span>
                                            <span class="discount">20% ↓</span>
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
                        </tbody>
                    </table>                    
                </div>  
                
                {{--종합반--}}
                <div class="lineTabs lecListTabs c_both pd-zero" id="offList2">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <tbody>
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
                                        <dt>수강형태 <span class="tx-blue">실강</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt>
                                    </dl>
                                    <div class="priceWrap">                                        
                                        <span class="price">80,000원</span>
                                        <span class="discount">20% ↓</span>
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
                                        <span class="discount">20% ↓</span>
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
                                        <span class="discount">20% ↓</span>
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </td>
                            </tr>                    
                        </tbody>
                    </table>
                </div> 
            </div>

            {{--무료수강신청--}}
            <div id="leclist3" class="tabContent">
                <div class="lineTabs lecListTabs c_both pd-zero">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <tbody>
                            <tr>
                                <td class="w-data tx-left">
                                    <div>
                                        <dl class="w-info">
                                            <dt>심화이론<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현 </dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>학원실강의 : 2020년 1월</dt><br>
                                            <dt>강의수 : <span class="tx-blue">12강/56강</span><span class="row-line">|</span></dt>
                                            <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">배수</span> <span class="NSK nBox n2">진행중</span></dt>
                                        </dl>
                                        <div class="priceWrap">
                                            PC+모바일 : 
                                            <span class="dcprice">0원</span>                                          
                                        </div>
                                        <div class="w-buy">       
                                            <ul class="two">
                                                <li class="btn_blue"><a href="#none">바로결제</a></li>
                                            </ul> 
                                        </div>
                                    </div>
                                    <div>
                                        <dl class="w-info">
                                            <dt>심화이론<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현 </dt>
                                        </dl>
                                        <div class="w-tit tx-blue">
                                            2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>학원실강의 : 2020년 1월</dt><br>
                                            <dt>강의수 : <span class="tx-blue">12강/56강</span><span class="row-line">|</span></dt>
                                            <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">배수</span> <span class="NSK nBox n2">진행중</span></dt>
                                        </dl>
                                        <div class="priceWrap">
                                            PC+모바일 : 
                                            <span class="dcprice">0원</span>                                          
                                        </div>
                                        <div class="w-buy">       
                                            <ul class="two">
                                                <li class="btn_blue"><a href="#none">바로결제</a></li>
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
            <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">황종휴</span> 강사님 프로필</div>
            <div class="Layer-Cont">
                <div class="Layer-SubTit NG">· 약력</div>
                <div class="Layer-Txt tx-gray">
                    - (현) 윌비스한림법학원 경제학/재정학/국제경제학 전임<br>
                    - 정운찬-김영식 공저 거시경제이론 개정작업 참여<br>
                    - 제44회 행정고등고시 재경직 합격<br>
                    - 제16회 입법고등고시 최연소 및 전체수석합격 <br>
                </div>
                <div class="Layer-SubTit NG">· 저서</div>
                <div class="Layer-Txt tx-gray">
                    - 다이제스트 시리즈(경제학/재정학/국제경제학)(도서출판 윌비스)<br>
                    - Trinity of Macroeconomics(ver 3.0)(도서출판 윌비스)<br>
                    - Trinity of Microeconomics(ver 3.0)(도서출판 윌비스)<br>
                    - 2013 연습책(경제학/재정학/국제경제학)(도서출판 윌비스)<br>
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
            <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">황종휴</span> 강사님 커리큘럼</div>
            <div class="Layer-Cont">
                <img src="http://file1.willbes.net//data/upload/popup/hanlim/POPUPVALUE3510.JPG"/>
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