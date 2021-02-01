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
                수강신청강좌
            </div>
        </div>
    </div>

    <div class="lineTabs lecListTabs c_both">
        <ul class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
            <li><a href="#leclist1" class="on">종합반 <span>6</span></a><span class="row-line">|</span></li>
            <li><a href="#leclist2">단과반 <span>3</span></a></li>            
        </ul>

        <div id="leclist1" class="tabContent">
            <div class="tx-center mt20">수강신청한 강좌가 없습니다.</div>

            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                    <tr>
                        <td class="w-data tx-left">
                            <div class="w-tit">
                                <a href="#none">1기스터디</a>
                            </div>
                            <ul class="w-info acad tx-gray">
                                <li>(수강증번호 : 422140)</li>
                            </ul>

                            <div class="btnblue02 mt5"><a href="#none">강사선택현황보기 ></a></div>

                            <div class="mt10">
                                <a href="#none" class="btnSt01 mr10">강사선택</a>
                                <a href="#none" class="btnSt02 mr10">좌석선택</a>
                                <a href="#none" class="btnSt03">온라인첨삭</a>
                            </div>

                            <div class="w-info bg-light-gray pd10 mt10 bdb-bright-gray">
                                <div>1기스터디  <span class="row-line">|</span>  감정평가실무  <span class="row-line">|</span>  여지훈 교수님</div>
                                <div class="w-tit mb10">1기스터디 감정평가실무 여지훈</div>
                                <ul>
                                    <li>[강의실명] <span class="tx-light-blue">404호</span> <span class="row-line">|</span> <span class="tx-light-blue">404호</span><li>
                                    <li>[좌석번호] <span class="tx-light-blue">41</span><li>
                                    <li>[좌석선택기간] 2020-00-00 ~ 2020-00-00<li>   
                                </ul>
                                <div class="mt10"><a href="#none" class="btnStfull01">좌석선택 ></a></div>    
                                <div class="mt10"><a href="#none" class="btnStfull02">온라인첨삭 ></a></div>                              
                            </div>
                            <div class="w-info bg-light-gray pd10 mt10 bdb-bright-gray">
                                <div>1기스터디  <span class="row-line">|</span>  감정평가 및 보상법규  <span class="row-line">|</span>  이현진 교수님</div>
                                <div class="w-tit">1기스터디 감정평가 및 보상법규 이현진</div>
                                <ul class="mb10">
                                    <li>[강의실명] <span class="tx-light-blue">404호</span> <span class="row-line">|</span> <span class="tx-light-blue">404호</span><li>
                                    <li>[좌석번호] <span class="tx-light-blue">41</span><li>
                                    <li>[좌석선택기간] 2020-00-00 ~ 2020-00-00<li>   
                                </ul>
                                <div class="mb10"><a href="#none" class="btnStfull01">좌석선택 ></a></div> 
                                <div><a href="#none" class="btnStfull02">온라인첨삭 ></a></div>                                
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left">
                            <div class="w-tit">
                                <a href="#none">20_행시종합반(재경)_2차[20/07~21/06]_GS1 경제학,행정법제외(선택제외)</a>
                            </div>
                            <ul class="w-info acad tx-gray">
                                <li>(수강증번호 : 422140)</li>
                                <li>2020.00.00~ 2020.00.00</li>
                            </ul>

                            <div class="btnblue02 mt5"><a href="#none">강사선택현황보기 ></a></div>

                            <div class="mt10">
                                <a href="#none" class="btnSt01 mr10">강사선택</a>
                            </div>
                            <div class="w-lecList mt10">
                                <div class="NG">강좌구성보기 <a href="#none">▼</a></div>
                                <ul>
                                    <li>1기스터디_감정평가실무_여지훈</li>
                                    <li>1기스터디_감정평가및보상법규_이현진</li>
                                    <li>1기스터디_감정평가이론_어정민</li>                                    
                                </ul>                               
                            </div> 
                        </td>
                    </tr>
                    {{--
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
                    --}}
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
            {{--
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
            --}}
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable mt20">
                <tbody>
                    <tr>
                        <td class="w-data tx-left">
                            <dl class="w-info">
                                <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n5">접수중</span></dt>
                            </dl>
                            <div class="w-tit">
                                <a href="#none"><span class="tx-blue">실강</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                            </div>
                            <dl class="w-info acad tx-gray">
                                <dt>수강기간 : 2018-00-00~2018-00-00</dt>
                                <dt>요일/회차 : 월화수목금 10회차<span class="row-line">|</span>2018-00-00 개강</dt>
                            </dl>

                            <div class="w-info bg-light-gray pd10 mt10 bdb-bright-gray">
                                <ul class="mb10">
                                    <li>[강의실명] <span class="tx-light-blue">404호</span> <span class="row-line">|</span> <span class="tx-light-blue">404호</span><li>
                                    <li>[좌석번호] <span class="tx-light-blue">41</span><li>
                                    <li>[좌석선택기간] 2020-00-00 ~ 2020-00-00<li>   
                                </ul>
                                <div class="mb10"><a href="#none" class="btnStfull01">좌석선택 ></a></div>    
                                <div><a href="#none" class="btnStfull02">온라인첨삭 ></a></div>                              
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left">
                            <dl class="w-info">
                                <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n5">접수중</span></dt>
                            </dl>
                            <div class="w-tit">
                                <a href="#none"><span class="tx-blue">실강</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                            </div>
                            <dl class="w-info acad tx-gray">
                                <dt>수강기간 : 2018-00-00~2018-00-00</dt>
                                <dt>요일/회차 : 월화수목금 10회차<span class="row-line">|</span>2018-00-00 개강</dt>
                            </dl>

                            <div class="w-info bg-light-gray pd10 mt10 bdb-bright-gray">  
                                <div><a href="#none" class="btnStfull02">온라인첨삭 ></a></div>                              
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left">
                            <dl class="w-info">
                                <dt>경찰<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n4">마감</span></dt>
                            </dl>
                            <div class="w-tit">
                                <a href="#none"><span class="tx-blue">라이브+인강</span> 2018 한덕현 제니스 영어 실전 동형 모의고사(4~5월) 영어제니스</a>                                
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
                                <a href="#none"><span class="tx-blue">라이브+인강</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
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