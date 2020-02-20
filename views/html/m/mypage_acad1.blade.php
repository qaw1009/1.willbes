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

    <div class="lineTabs lecListTabs c_both">
        <ul class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
            <li><a href="#leclist1" class="on">단과반 <span>3</span></a><span class="row-line">|</span></li>
            <li><a href="#leclist2">종합반 <span>6</span></a></li>
        </ul>

        <div id="leclist1" class="tabContent">
            <div class="tx-center mt20">수강신청한 강좌가 없습니다.</div>

            <div class="willbes-Lec-Selected NG c_both tx-gray">
                <select id="process" name="process" title="process" class="seleProcess width21p">
                    <option selected="selected">과정</option>
                    <option value="헌법">헌법</option>
                    <option value="스파르타반">스파르타반</option>
                    <option value="공직선거법">공직선거법</option>
                </select>
                <select id="lecture" name="lecture" title="lecture" class="seleLec width21p ml1p">
                    <option selected="selected">과목</option>
                    <option value="헌법">헌법</option>
                    <option value="스파르타반">스파르타반</option>
                    <option value="공직선거법">공직선거법</option>
                </select>
                <select id="prof" name="prof" title="prof" class="seleProf width45p ml1p">
                    <option selected="selected">교수님</option>
                    <option value="교수님1">교수님1</option>
                    <option value="교수님2">교수님2</option>
                    <option value="교수님3">교수님3</option>
                </select>
                <div class="resetBtn width10p ml1p">
                    <a href="#none"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
                </div>
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
                                <dt>요일/회차 : 월화수목금 10회차<span class="row-line">|</span>2018-00-00 개강</dt>
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
                                <dt>요일/회차 : 월화수목금 10회차<span class="row-line">|</span>2018-00-00 개강</dt>
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
                                <dt>요일/회차 : 월화수목금 10회차<span class="row-line">|</span>2018-00-00 개강</dt>
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
        </div>

        <div id="leclist2" class="tabContent">
            <div class="tx-center mt20">수강신청한 강좌가 없습니다.</div>

            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                    <tr>
                        <td class="w-data tx-left">
                            <div class="w-tit">
                                <a href="#none">기본종합(오)[1/6~3/6]-강사배정</a>
                            </div>
                            <dl class="w-info acad tx-gray">
                                <dt>수강기간 : 2018-00-00 ~ 2018-00-00</dt>
                                <dt class="tx-red">※ 강사 선택하기는 PC버전에서만 가능합니다.</dt>
                            </dl>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left">
                            <div class="w-tit">
                                <a href="#none">[인천] 사전접수 할인 이벤트(11월29일까지) 20년 1차대비 문풀 1+2+3단계 3법 종합</a>
                            </div>
                            <dl class="w-info acad tx-gray">
                                <dt>수강기간 : 2018-00-00~2018-00-00</dt>
                            </dl>
                            <div class="w-lecList">
                                <div class="NG">강좌구성보기 <a href="#none">▼</a></div>
                                <ul>
                                    <li>[인천] 1+2+3단계 경찰학 문제풀이(장정훈)</li>
                                    <li>[인천] 1+2+3단계 형소법 문제풀이(신광은)</li>
                                    <li>[인천] 1+2+3단계 형법 문제풀이(김원욱)</li>                                    
                                </ul>                               
                            </div>
                            
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left">
                            <div class="w-tit">
                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                            </div>
                            <dl class="w-info acad tx-gray">
                                <dt>수강기간 : 2018-00-00~2018-00-00</dt>
                                <dt class="tx-red">※ 강사 선택하기는 PC버전에서만 가능합니다.</dt>
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