@extends('html.m.layouts.master')

@section('content')

<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div id="Sticky" class="sticky-Title">
        <div class="sticky-Grid sticky-topTit">
            <div class="willbes-Tit NGEB p_re">
                <button type="button" class="goback" onclick="history.back(-1); return false;">
                    <span class="hidden">뒤로가기</span>
                </button>    
                수강신청 > 단강좌
            </div>
        </div>
    </div>

    <div>
        <ul class="Lec-Selected NG tx-gray">
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">9급공무원</option>
                    <option value="">7급공무원</option>
                    <option value="">세무직</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">전체</option>
                    <option value="이론">이론</option>
                    <option value="문제풀이">문제풀이</option>
                    <option value="유료특강">유료특강</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">직렬선택</option>
                    <option value="전체">전체</option>
                    <option value="일반행정직">일반행정직</option>
                    <option value="교육행정직">교육행정직</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">과목선택</option>
                    <option value="전체">전체</option>
                    <option value="국어">국어</option>
                    <option value="영어">영어</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">교수선택</option>
                    <option value="기미진">기미진</option>
                    <option value="권기태">권기태</option>
                    <option value="김세령">김세령</option>
                </select>
            </li>
            <li class="resetBtn2">
                <a href="#none">초기화</a>
            </li>           
        </ul>

        <div class="willbes-Lec-Selected NG c_both tx-gray pb-zero">
            <select id="process" name="process" title="process" class="seleProcess width30p">
                <option selected="selected">과정순</option>
                <option value="과정순">최근등록순</option>
            </select>
            <select id="lecture" name="lecture" title="lecture" class="seleLec width30p ml1p">
                <option selected="selected">강좌명</option>
                <option value="과목명">과목명</option>
                <option value="교수명">교수명</option>
                <option value="과정명">과정명</option>
            </select>
        </div>
        <div class="willbes-Lec-Search NG width100p pl20 pr20 pb20 mt10">
            <div class="inputBox width100p p_re">
                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch width100p" placeholder="제목 및 내용 검색" maxlength="30">
                <button type="submit" onclick="" class="search-Btn">
                    <span class="hidden">검색</span>
                </button>
            </div>
        </div>

        <div class="lineTabs lecListTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                <colgroup>
                    <col style="width: 87%;">
                    <col style="width: 13%;">
                </colgroup>
                <tbody>
                    <tr class="replyList willbes-Open-Table">
                        <td class="w-data tx-left">
                            <div class="w-tit">형사소송법</div>
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr class="willbes-Open-List">
                        <td class="w-data tx-left" colspan="2">
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
                                <ul class="priceWrap">
                                    <li>
                                        <input type="checkbox" id="checkA" name="checkA">
                                        <label for="checkA">
                                            PC+모바일 
                                            <span class="price">90,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">81,000원</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkB" name="checkB">
                                        <label for="checkB">
                                            PC 
                                            <span class="price">90,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">81,000원</span>
                                        </label>
                                    </li>
                                </ul>
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
                                <ul class="priceWrap">
                                    <li>
                                        <input type="checkbox" id="checkA" name="checkA">
                                        <label for="checkA">
                                            PC+모바일 
                                            <span class="price">90,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">81,000원</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkB" name="checkB">
                                        <label for="checkB">
                                            PC 
                                            <span class="price">90,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">81,000원</span>
                                        </label>
                                    </li>
                                </ul>
                                <div class="w-buy">       
                                    <ul class="two">
                                        <li><a href="#none" class="btn_gray">장바구니</a></li>
                                        <li><a href="#none" class="btn_blue">바로결제</a></li>
                                    </ul> 
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="replyList willbes-Open-Table">
                        <td class="w-data tx-left">
                            <div class="w-tit">경찰학개론</div>
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr class="willbes-Open-List">
                        <td class="w-data tx-left" colspan="2">
                            <div class="oneBox">
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
                                <ul class="priceWrap">
                                    <li>
                                        <input type="checkbox" id="checkA" name="checkA">
                                        <label for="checkA">
                                            PC+모바일 
                                            <span class="price">90,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">81,000원</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkB" name="checkB">
                                        <label for="checkB">
                                            PC 
                                            <span class="price">90,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">81,000원</span>
                                        </label>
                                    </li>
                                    <li class="tx-red">※ 바로결제만 가능한 상품입니다. 상세 페이지에서 결제해주세요.</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr class="replyList willbes-Open-Table">
                        <td class="w-data tx-left">
                            <div class="w-tit">형법</div>
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr class="willbes-Open-List">
                        <td class="w-data tx-left" colspan="2">
                            <div class="oneBox">
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
                                <ul class="priceWrap">
                                    <li>
                                        <input type="checkbox" id="checkA" name="checkA">
                                        <label for="checkA">
                                            PC+모바일 
                                            <span class="price">90,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">81,000원</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkB" name="checkB">
                                        <label for="checkB">
                                            PC 
                                            <span class="price">90,000원</span>
                                            <span class="discount">(10%↓)</span> ▶
                                            <span class="dcprice">81,000원</span>
                                        </label>
                                    </li>
                                    <li class="tx-red">※ 바로결제만 가능한 상품입니다. 상세 페이지에서 결제해주세요.</li>
                                </ul>
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