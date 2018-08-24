@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        동영상 상담실
    </div>
    <div class="willbes-Lec-Selected NG tx-gray">
        <select id="process" name="process" title="process" class="seleProcess width24p">
            <option selected="selected">과정</option>
            <option value="헌법">헌법</option>
            <option value="스파르타반">스파르타반</option>
            <option value="공직선거법">공직선거법</option>
        </select>
        <select id="acad" name="acad" title="구분" class="seleAcad width24p ml1p">
            <option selected="selected">구분</option>
            <option value="학원">학원</option>
            <option value="온라인">온라인</option>
        </select>
        <select id="A" name="A" title="A" class="seleLecA width50p ml1p">
            <option selected="selected">상담유형</option>
            <option value="기타">기타</option>
            <option value="강좌내용">강좌내용</option>
            <option value="학습상담">학습상담</option>
        </select>
        <div class="willbes-Lec-Search NG width100p mt1p">
            <div class="inputBox width74p p_re">
                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch width100p" placeholder="제목 및 내용 검색" maxlength="30">
                <button type="submit" onclick="" class="search-Btn">
                    <span class="hidden">검색</span>
                </button>
            </div>
            <div class="reset-Btn f_right width25p ml1p"><a href="#none">초기화</a></div>
        </div>
    </div>

    <div class="btnBox mt20 mb20">
        <ul class="f_left width100p">
            <li class="InfoBtn btn_blue"><a href="#none">문의하기</a></li>
            <li class="InfoBtn btn_white"><a href="#none">나의문의</a></li>
        </ul>
    </div>
    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
        <colgroup>
            <col style="width: 13%;">
            <col style="width: 87%;">
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
                        <dt>관리자<span class="row-line">|</span></dt>
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
                        <dt>관리자<span class="row-line">|</span></dt>
                        <dt>2018-00-00</dt>
                    </dl>
                </td>
            </tr>
            <tr>
                <td class="w-info"><span class="NSK lBox n1">대기</span></td>
                <td class="w-data tx-left pl2p">
                    <dl class="w-info">
                        <dt>온라인</dt>
                    </dl>
                    <div class="w-tit">
                        <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                    </div>
                    <dl class="w-info tx-gray">
                        <dt>관리자<span class="row-line">|</span></dt>
                        <dt>2018-00-00</dt>
                    </dl>
                </td>
            </tr>
            <tr>
                <td class="w-info"><span class="NSK lBox n2">완료</span></td>
                <td class="w-data tx-left pl2p">
                    <dl class="w-info">
                        <dt>온라인</dt>
                    </dl>
                    <div class="w-tit">
                        <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                    </div>
                    <dl class="w-info tx-gray">
                        <dt>관리자<span class="row-line">|</span></dt>
                        <dt>2018-00-00</dt>
                    </dl>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="lecMore">
        <a href="#none">더보기 (<span class="tx-black">10</span>/20)</a>
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