@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        수강신청강좌
    </div>

    <div class="willbes-Lec-Selected NG c_both tx-gray">
        <select id="process" name="process" title="process" class="seleProcess width24p">
            <option selected="selected">과정</option>
            <option value="헌법">헌법</option>
            <option value="스파르타반">스파르타반</option>
            <option value="공직선거법">공직선거법</option>
        </select>
        <select id="lecture" name="lecture" title="lecture" class="seleLec width24p ml1p">
            <option selected="selected">과목</option>
            <option value="헌법">헌법</option>
            <option value="스파르타반">스파르타반</option>
            <option value="공직선거법">공직선거법</option>
        </select>
        <select id="prof" name="prof" title="prof" class="seleProf width50p ml1p">
            <option selected="selected">교수님</option>
            <option value="교수님1">교수님1</option>
            <option value="교수님2">교수님2</option>
            <option value="교수님3">교수님3</option>
        </select>
    </div>
    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
        <tbody>
            <tr>
                <td class="w-data tx-left">
                    <dl class="w-info">
                        <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n5">접수중</span></dt>
                    </dl>
                    <div class="w-tit">
                        <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                    </div>
                    <dl class="w-info acad tx-gray">
                        <dt>수강기간 : 2018-00-00~2018-00-00</dt>
                        <dt>요일/회차 : 월~금 10회차<span class="row-line">|</span>2018-00-00 개강</dt>
                    </dl>
                </td>
            </tr>
            <tr>
                <td class="w-data tx-left">
                    <dl class="w-info">
                        <dt>경찰<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n4">마감</span></dt>
                    </dl>
                    <div class="w-tit">
                        <a href="#none">2018 한덕현 제니스 영어 실전 동형 모의고사(4~5월) 영어제니스</a>
                    </div>
                    <dl class="w-info acad tx-gray">
                        <dt>수강기간 : 2018-00-00~2018-00-00</dt>
                        <dt>요일/회차 : 월~금 10회차<span class="row-line">|</span>2018-00-00 개강</dt>
                    </dl>
                </td>
            </tr>
            <tr>
                <td class="w-data tx-left">
                    <dl class="w-info">
                        <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n6">접수예정</span></dt>
                    </dl>
                    <div class="w-tit">
                        <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                    </div>
                    <dl class="w-info acad tx-gray">
                        <dt>수강기간 : 2018-00-00~2018-00-00</dt>
                        <dt>요일/회차 : 월~금 10회차<span class="row-line">|</span>2018-00-00 개강</dt>
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