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
                수강신청 > 선택패키지
            </div>
        </div>
    </div>

    <div>
        <ul class="Lec-Selected NG tx-gray">
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">일반경찰</option>
                    <option value="">경행경채</option>
                    <option value="">경찰승진</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">기본이론</option>
                    <option value="이론">이론</option>
                    <option value="문제풀이">문제풀이</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">2020년</option>
                    <option value="2019년">2019년</option>
                    <option value="2018년">2018년</option>
                    <option value="2017년">2017년</option>
                </select>
            </li>
            <li class="resetBtn2">
                <a href="#none">초기화</a>
            </li>           
        </ul>

        <div class="willbes-Lec-Selected NG c_both tx-gray pb-zero">
            <select id="process" name="process" title="process" class="seleProcess width30p">
                <option selected="selected">최근등록순</option>
                <option value="과정순">과정순</option>
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
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <dl class="w-info">
                                <dt>기본이론</dt>
                            </dl>
                            <div class="w-tit">
                                <a href="#none">2019 일반경찰 선택패키지</a>
                            </div>
                            <div class="priceWrap">
                                <span class="price">80,000원</span>
                                <span class="discount">20% ↓</span> ▶
                                <span class="dcprice">64,000원</span>                                          
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
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
                                <span class="discount">20% ↓</span> ▶
                                <span class="dcprice">64,000원</span>                                          
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
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
                                <span class="discount">20% ↓</span> ▶
                                <span class="dcprice">64,000원</span>                                          
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