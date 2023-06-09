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
                                <div>1기스터디  <span class="row-line">|</span>  감정평가실무  <span class="row-line">|</span>  여지훈 교수님</div>
                                <div class="w-tit mb10">1기스터디 감정평가실무 여지훈</div>
                                <ul>
                                    <li>[강의실명] <span class="tx-light-blue">404호</span> <span class="row-line">|</span> <span class="tx-light-blue">404호</span><li>
                                    <li>[좌석번호] <span class="tx-light-blue">41</span><li>
                                    <li>[좌석선택기간] 2020-00-00 ~ 2020-00-00<li>   
                                </ul>
                                <div class="mt10"><a href="#none" class="btnStfull01">좌석선택 ></a></div>    
                                <div class="mt10"><a href="#none" class="btnStfull02">온라인첨삭 ></a></div>                              
                            </div>
                            <div class="w-info bg-light-gray pd10 mt10 bdb-bright-gray">
                                <div>1기스터디  <span class="row-line">|</span>  감정평가 및 보상법규  <span class="row-line">|</span>  이현진 교수님</div>
                                <div class="w-tit">1기스터디 감정평가 및 보상법규 이현진</div>
                                <ul class="mb10">
                                    <li>[강의실명] <span class="tx-light-blue">404호</span> <span class="row-line">|</span> <span class="tx-light-blue">404호</span><li>
                                    <li>[좌석번호] <span class="tx-light-blue">41</span><li>
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
                                <div class="NG tx14">강좌구성보기 <a href="#none" class="moreBtn">▼</a></div>
                                <ul>
                                    <li>
                                        <div>영어<span class="row-line">|</span>한덕현교수님</div>
                                        <div class="w-tit">
                                            <a href="#none"><span class="tx-blue">실강</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                        </div>
                                        <div class="w-info acad tx-gray">
                                            수강기간 : 2018-00-00~2018-00-00<br>
                                            요일/회차 : 월화수목금 10회차<span class="row-line">|</span>2018-00-00 개강
                                        </div>
                                        <div class="supplementBtn"><a href="mypage_acad1_7">보강/복습동영상 신청 ></a> <a href="mypage_acad1_8" class="type2">수강증 보기 ></a></div> 
                                    </li>
                                    <li>
                                        <div>영어<span class="row-line">|</span>한덕현교수님</div>
                                        <div class="w-tit">
                                            <a href="#none"><span class="tx-blue">실강</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                        </div>
                                        <div class="w-info acad tx-gray">
                                            수강기간 : 2018-00-00~2018-00-00<br>
                                            요일/회차 : 월화수목금 10회차<span class="row-line">|</span>2018-00-00 개강
                                        </div>
                                        <div class="supplementBtn"><a href="mypage_acad1_7">보강/복습동영상 신청 ></a> <a href="mypage_acad1_8" class="type2">수강증 보기 ></a></div>
                                    </li>
                                    <li>
                                        <div>영어<span class="row-line">|</span>한덕현교수님</div>
                                        <div class="w-tit">
                                            <a href="#none"><span class="tx-blue">실강</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                        </div>
                                        <div class="w-info acad tx-gray">
                                            수강기간 : 2018-00-00~2018-00-00<br>
                                            요일/회차 : 월화수목금 10회차<span class="row-line">|</span>2018-00-00 개강
                                        </div>
                                        <div class="supplementBtn"><a href="mypage_acad1_7">보강/복습동영상 신청 ></a> <a href="mypage_acad1_8" class="type2">수강증 보기 ></a></div>
                                    </li>                                   
                                </ul>                            
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

        <div id="leclist2" class="tabContent">
            <div class="tx-center mt20">수강신청한 강좌가 없습니다.</div>

            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable mt20">
                <tbody>
                    <tr>
                        <td class="w-data tx-left">
                            <div class="OTclass mr10"><span class="red">인강전환</span></div>
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

                            <div class="w-info bg-light-gray pd10 pb0 mt10 bdb-bright-gray">
                                <ul class="mb10">
                                    <li>[강의실명] <span class="tx-light-blue">404호</span> <span class="row-line">|</span> <span class="tx-light-blue">404호</span><li>
                                    <li>[좌석번호] <span class="tx-light-blue">41</span><li>
                                    <li>[좌석선택기간] 2020-00-00 ~ 2020-00-00<li>   
                                </ul>
                                <div class="mb10"><a href="#none" class="btnStfull01">좌석선택 ></a></div>    
                                <div class="mb10"><a href="#none" class="btnStfull02">온라인첨삭 ></a></div>                              
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

                            <div class="w-info bg-light-gray pd10 pb0 mt10 bdb-bright-gray">  
                                <div class="mb10"><a href="#none" class="btnStfull02">온라인첨삭 ></a></div>    
                                <div class="mb10"><a href="#none" class="btnStfull03">보강/복습동영상 신청 ></a></div>     
                                <div class="mb10"><a href="mypage_acad1_8" class="btnStfull04">수강증 보기 ></a></div>                       
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