@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="onSearch">
        <input type="search" id="onsearch" name="" value="" placeholder="온라인강의 검색" title="온라인강의 검색" />
        <label for="onsearch"><button title="검색">검색</button>
    </div>

    {{--검색 결과 있을 경우--}}
    <div class="searchAmount">  
        <strong>경제학</strong>에 대한 강좌 검색결과 <strong>30</strong>건       
    </div>

    {{--검색 결과 없을 경우--}}
    <div class="searchZero">
        <span><img src="{{ img_url('common/icon_search_big.png')}}"></span>
        <h3>검색 결과가 없습니다. </h3>
        <p>
        검색어를 바르게 입력하셨는지 확인해주세요.<br>
        검색어의 띄어쓰기를 다르게 해보세요.<br>
        검색어를 줄이거나 다른 단어로 다시 검색해 보세요.
        </p>
    </div>

    <div class="lineTabs pd-zero c_both">
        <ul class="tabWrap lineWrap rowlineWrap four mt-zero">
            <li><a href="#leclist1" class="on">단과강좌 [<span>3</span>]</a><span class="row-line">|</span></li>
            <li><a href="#leclist2">무료강좌 [<span>6</span>]</a><span class="row-line">|</span></li>
            <li><a href="#leclist3">추천패키지 [<span>6</span>]</a><span class="row-line">|</span></li>
            <li><a href="#leclist4">선택패키지 [<span>6</span>]</a></li>
        </ul>
    </div>
    
    <div class="tabBox c_both pt20">
        <div id="leclist1" class="searchContent">
            <h5>
                · 단과강좌 
                <select id="process" name="process" title="process" class="seleProcess width30p">
                    <option value="최근등록순" selected="selected">최근등록순</option>    
                    <option value="과정순" >과정순</option>                    
                </select>
            </h5>
            <div class="lineTabs lecListTabs c_both">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                    <colgroup>
                        <col>
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-data tx-left">
                                <div class="oneBox">
                                    <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                    <dl class="w-info">
                                        <dt>5급행정(입법고시)<span class="row-line">|</span>원론강의<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴 </dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        <a href="#none">경제학 원론강의(미시+거시)</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>강의촬영(실강) : 2020년 1월</dt><br>
                                        <dt>강의수 : <span class="tx-blue">39강</span><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="tx-blue">30일</span> <span class="NSK ml10 nBox n1">1.5배수</span> <span class="NSK nBox n2">완강</span></dt>                                
                                    </dl>
                                    <div class="priceWrap">
                                        PC+모바일 : 
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </div>
                                <div class="oneBox">
                                    <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                    <dl class="w-info">
                                        <dt>5급행정(입법고시)<span class="row-line">|</span>심화이론<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현 </dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>강의촬영(실강) : 2020년 1월</dt><br>
                                        <dt>강의수 : <span class="tx-blue">12강/56강</span><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">무제한</span> <span class="NSK nBox n2">진행중</span></dt>                                
                                    </dl>
                                    <div class="priceWrap">
                                        PC+모바일 : 
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </div>
                                <div class="oneBox">
                                    <dl class="w-info">
                                        <dt>5급행정(입법고시)<span class="row-line">|</span>심화이론<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현 </dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>강의촬영(실강) : 2020년 1월</dt><br>
                                        <dt>강의수 : <span class="tx-blue">12강/56강</span><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">무제한</span> <span class="NSK nBox n2">진행중</span></dt>                                
                                    </dl>
                                    <div class="priceWrap">
                                        PC+모바일 : 
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </div>
                                <div class="oneBox">
                                    <dl class="w-info">
                                        <dt>5급행정(입법고시)<span class="row-line">|</span>심화이론<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현 </dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>강의촬영(실강) : 2020년 1월</dt><br>
                                        <dt>강의수 : <span class="tx-blue">12강/56강</span><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">무제한</span> <span class="NSK nBox n2">진행중</span></dt>                                
                                    </dl>
                                    <div class="priceWrap">
                                        PC+모바일 : 
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </div>
                            </td>
                        </tr>                   
                    </tbody>
                </table>
            </div>
        </div>

        <div id="leclist2" class="searchContent">
            <h5>
                · 무료강좌 
                <select id="process" name="process" title="process" class="seleProcess width30p">
                    <option value="최근등록순" selected="selected">최근등록순</option>    
                    <option value="과정순" >과정순</option>                    
                </select>
            </h5>
            <div class="lineTabs lecListTabs c_both">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                    <colgroup>
                        <col>
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-data tx-left">
                                <div class="oneBox">
                                    <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                    <dl class="w-info">
                                        <dt>5급행정(입법고시)<span class="row-line">|</span>원론강의<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴 </dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        <a href="#none">경제학 원론강의(미시+거시)</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>강의촬영(실강) : 2020년 1월</dt><br>
                                        <dt>강의수 : <span class="tx-blue">39강</span><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="tx-blue">30일</span> <span class="NSK ml10 nBox n1">1.5배수</span> <span class="NSK nBox n2">완강</span></dt>                                
                                    </dl>
                                    <div class="priceWrap">
                                        PC+모바일 : 
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </div>
                                <div class="oneBox">
                                    <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                    <dl class="w-info">
                                        <dt>5급행정(입법고시)<span class="row-line">|</span>심화이론<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현 </dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>강의촬영(실강) : 2020년 1월</dt><br>
                                        <dt>강의수 : <span class="tx-blue">12강/56강</span><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">무제한</span> <span class="NSK nBox n2">진행중</span></dt>                                
                                    </dl>
                                    <div class="freeLecPass">       
                                        <p>보강동영상 비밀번호 입력</p>
                                        <input type="password" id="" name="" placeholder="비밀번호" maxlength="30">
                                        <a href="#none">확인</a>    
                                        <a href="#none">보강동영상 보기</a>                             
                                    </div>
                                </div>
                                <div class="oneBox">
                                    <dl class="w-info">
                                        <dt>5급행정(입법고시)<span class="row-line">|</span>심화이론<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현 </dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>강의촬영(실강) : 2020년 1월</dt><br>
                                        <dt>강의수 : <span class="tx-blue">12강/56강</span><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">무제한</span> <span class="NSK nBox n2">진행중</span></dt>                                
                                    </dl>
                                    <div class="priceWrap">
                                        PC+모바일 : 
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </div>
                                <div class="oneBox">
                                    <dl class="w-info">
                                        <dt>5급행정(입법고시)<span class="row-line">|</span>심화이론<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현 </dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>강의촬영(실강) : 2020년 1월</dt><br>
                                        <dt>강의수 : <span class="tx-blue">12강/56강</span><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">무제한</span> <span class="NSK nBox n2">진행중</span></dt>                                
                                    </dl>
                                    <div class="priceWrap">
                                        PC+모바일 : 
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </div>
                            </td>
                        </tr>                   
                    </tbody>
                </table>
            </div>
        </div>

        <div id="leclist3" class="searchContent">
            <h5>
                · 추천패키지 
            </h5>
            <div class="lineTabs lecListTabs c_both">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                    <colgroup>
                        <col>
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-data tx-left">
                                <div class="oneBox">
                                    <dl class="w-info">
                                        <dt>5급행정(입법고시)<span class="row-line">|</span>새벽모고/테마/파이널특강</dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        <a href="#none">2020 [국가직대비] 파이널 특강 패키지(국어/영어/한국사)</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강일 : <span class="tx-blue">2020년 3월</span><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt>                                
                                    </dl>
                                    <div class="priceWrap">
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </div>
                                <div class="oneBox">
                                    <dl class="w-info">
                                        <dt>5급행정(입법고시)<span class="row-line">|</span>새벽모고/테마/파이널특강</dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        <a href="#none">2020 [국가직대비] 파이널 특강 패키지(국어/영어/한국사)</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강일 : <span class="tx-blue">2020년 3월</span><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt>                                
                                    </dl>
                                    <div class="priceWrap">
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </div>
                                <div class="oneBox">
                                    <dl class="w-info">
                                        <dt>5급행정(입법고시)<span class="row-line">|</span>새벽모고/테마/파이널특강</dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        <a href="#none">2020 [국가직대비] 파이널 특강 패키지(국어/영어/한국사)</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강일 : <span class="tx-blue">2020년 3월</span><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt>                                
                                    </dl>
                                    <div class="priceWrap">
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </div>
                                <div class="oneBox">
                                    <dl class="w-info">
                                        <dt>5급행정(입법고시)<span class="row-line">|</span>새벽모고/테마/파이널특강</dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        <a href="#none">2020 [국가직대비] 파이널 특강 패키지(국어/영어/한국사)</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강일 : <span class="tx-blue">2020년 3월</span><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt>                                
                                    </dl>
                                    <div class="priceWrap">
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </div>
                            </td>
                        </tr>                  
                    </tbody>
                </table>
            </div>
        </div>

        <div id="leclist4" class="searchContent">
            <h5>
                · 선택패키지 
            </h5>
            <div class="lineTabs lecListTabs c_both">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                    <colgroup>
                        <col>
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-data tx-left">
                                <div class="oneBox">
                                    <dl class="w-info">
                                        <dt>5급행정(입법고시)<span class="row-line">|</span>새벽모고/테마/파이널특강</dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        <a href="#none">2020 [국가직대비] 파이널 특강 패키지(국어/영어/한국사)</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강일 : <span class="tx-blue">2020년 3월</span><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt>                                
                                    </dl>
                                    <div class="priceWrap">
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </div>
                                <div class="oneBox">
                                    <dl class="w-info">
                                        <dt>5급행정(입법고시)<span class="row-line">|</span>새벽모고/테마/파이널특강</dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        <a href="#none">2020 [국가직대비] 파이널 특강 패키지(국어/영어/한국사)</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강일 : <span class="tx-blue">2020년 3월</span><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt>                                
                                    </dl>
                                    <div class="priceWrap">
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </div>
                                <div class="oneBox">
                                    <dl class="w-info">
                                        <dt>5급행정(입법고시)<span class="row-line">|</span>새벽모고/테마/파이널특강</dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        <a href="#none">2020 [국가직대비] 파이널 특강 패키지(국어/영어/한국사)</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강일 : <span class="tx-blue">2020년 3월</span><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt>                                
                                    </dl>
                                    <div class="priceWrap">
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
                                    </div>
                                </div>
                                <div class="oneBox">
                                    <dl class="w-info">
                                        <dt>5급행정(입법고시)<span class="row-line">|</span>새벽모고/테마/파이널특강</dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        <a href="#none">2020 [국가직대비] 파이널 특강 패키지(국어/영어/한국사)</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>개강일 : <span class="tx-blue">2020년 3월</span><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt>                                
                                    </dl>
                                    <div class="priceWrap">
                                        <span class="price">80,000원</span>
                                        <span class="discount">(10%↓)</span> ▶
                                        <span class="dcprice">64,000원</span>                                          
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

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

</div>
<!-- End Container -->
@stop