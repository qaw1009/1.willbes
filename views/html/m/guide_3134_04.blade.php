@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        지열별 공고문
    </div>

    <div class="w-Guide-Ssam mt20">
        <div class="NG ssamInfoMenu">
            <ul>
                <li><a href="guide_3134_01">임용<br>시험제도</a><li>
                <li><a href="guide_3134_02">최근<br>10년동향</a><li>
                <li class="one"><a href="guide_3134_03">자료실</a><li>
                <li><a href="guide_3134_04" class="on">지역별<br>공고문</a><li>
            </ul>
        </div>
    </div>

    <div class="willbes-Lec-Selected NG tx-gray pt-zero">
        <select id="process" name="process" title="process" class="seleProcess width40p">
            <option selected="selected">연도</option>
            <option value="">2020</option>
            <option value="">2019</option>
            <option value="">2018</option>
        </select>
        <select id="campus" name="campus" title="campus" class="seleCampus width40p ml1p">
            <option selected="selected">전체</option>
            <option value="">교육학</option>
            <option value="">전공국어</option>
            <option value="">전공영어</option>
        </select>
    </div>

    <div class="lineTabs lecListTabs c_both">
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
            <tbody>
                <tr>
                    <td class="w-data file">
                        <dl class="w-info">
                            <dt>2020<span class="row-line">|</span>교육학</dt>
                        </dl>
                        <div class="w-tit">
                            <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="w-data file">
                        <dl class="w-info">
                            <dt>2020<span class="row-line">|</span>전공국어</dt>
                        </dl>
                        <div class="w-tit">
                            <a href="#none">2018 한덕현 제니스 영어 실전 동형 모의고사(4~5월) 영어제니스</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="w-data file">
                        <dl class="w-info">
                            <dt>2020<span class="row-line">|</span>전공영어</dt>
                        </dl>
                        <div class="w-tit">
                            <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="w-data file">
                        <dl class="w-info">
                            <dt>2020<span class="row-line">|</span>전공수학</dt>
                        </dl>
                        <div class="w-tit">
                            <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                        </div>
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