@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        상담실
    </div>
    <div class="willbes-Lec-Selected NG tx-gray">
        <select id="" name="" title="과정" class="seleProcess width32p">
            <option selected="selected">카테고리</option>
            <option value="경찰온라인">경찰온라인</option>
            <option value="임용온라인">임용온라인</option>
        </select>
        <select id="cate" name="cate" title="카테고리" class="seleProcess width33p ml1p">
            <option selected="selected">카테고리</option>
            <option value="교육학">교육학</option>
            <option value="초등">초등</option>
        </select>
        <select id="type" name="type" title="상담유형" class="seleProcess width33p ml1p">
            <option selected="selected">상담유형</option>
            <option value="수강">수강</option>
            <option value="교재">교재</option>
        </select>
        <div class="willbes-Lec-Search NG width100p mt1p">
            <div class="inputBox width100p p_re">
                <select id="type" name="type" title="과목" class="seleProcess width32p">
                    <option selected="selected">과목</option>
                    <option value="국어">국어</option>
                    <option value="국어">국어</option>
                </select>
                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch width67p ml1p" placeholder="제목 및 내용 검색" maxlength="30">
                <button type="submit" onclick="" class="search-Btn">
                    <span class="hidden">검색</span>
                </button>
            </div>            
            <div class="resetBtn resetBtn02 width10p">
                <a href="#none"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
            </div>
        </div>
    </div>

    <div class="btnBox mb20">
        <ul class="f_left width100p">
            <li class="InfoBtn btn_blue"><a href="#none">문의하기</a></li>
            <li class="InfoBtn btn_white"><a href="#none">나의문의</a></li>
        </ul>
    </div>
    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
        <colgroup>
            <col style="width: 70px;">
            <col width="*">
        </colgroup>
        <tbody>
            <tr class="bg-light-blue">
                <td class="w-data tx-left" colspan="2">
                    <dl class="w-info">
                        <dt>공무원</dt>
                    </dl>
                    <div class="w-tit">
                        <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                    </div>
                    <dl class="w-info tx-gray">
                        <dt>2018-00-00</dt>
                    </dl>
                </td>
            </tr>
            <tr class="bg-light-blue">
                <td class="w-data tx-left" colspan="2">
                    <dl class="w-info">
                        <dt>경찰</dt>
                    </dl>
                    <div class="w-tit">
                        <a href="#none">2018 한덕현 제니스 영어 실전 동형 모의고사(4~5월) 영어제니스</a>
                    </div>
                    <dl class="w-info tx-gray">
                        <dt>2018-00-00</dt>
                    </dl>
                </td>
            </tr>
            <tr>
                <td class="w-info"><span class="NSK lBox n1">대기</span></td>
                <td class="w-data tx-left pl20">
                    <dl class="w-info">
                        <dt>온라인<span class="row-line">|</span><span class="tx-light-blue">수강</span></dt>
                    </dl>
                    <div class="w-tit">
                        <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                    </div>
                    <dl class="w-info tx-gray">
                        <dt>2018-00-00</dt>
                    </dl>
                </td>
            </tr>
            <tr>
                <td class="w-info"><span class="NSK lBox n2">완료</span></td>
                <td class="w-data tx-left pl20">
                    <dl class="w-info">
                        <dt>온라인<span class="row-line">|</span><span class="tx-light-blue">교재</span></dt>
                    </dl>
                    <div class="w-tit">
                        <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                    </div>
                    <dl class="w-info tx-gray">
                        <dt>2018-00-00</dt>
                    </dl>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="Paging">
        <ul>
            <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
            <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
            <li><a href="#none">2</a><span class="row-line">|</span></li>
            <li><a href="#none">3</a><span class="row-line">|</span></li>
            <li><a href="#none">4</a><span class="row-line">|</span></li>
            <li><a href="#none">5</a></li>
            <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
        </ul>
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