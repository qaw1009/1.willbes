@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        일시정지강좌
    </div>

    <div class="lineTabs lecListTabs c_both">
        <ul class="tabWrap lineWrap lecListWrap two mt40">
            <li><a href="#leclist1" class="on">단강좌 <span>3</span></a></li>
            <li><a href="#leclist2">패키지강좌 <span>6</span></a></li>
        </ul>
        <div class="tabBox lineBox lecListBox">
            <div id="leclist1" class="tabContent">
                <div class="willbes-Txt NGR c_both mt30">
                    <div class="willbes-Txt-Tit NG">· 일시정지강좌 <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
                    - 일시정지해제 버튼을 클릭하시면 일시정지 상태가 해제되어 즉시 수강하실 수 있습니다.<br/>
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
                    <select id="prof" name="prof" title="prof" class="seleProf width24p ml1p">
                        <option selected="selected">교수님</option>
                        <option value="교수님1">교수님1</option>
                        <option value="교수님2">교수님2</option>
                        <option value="교수님3">교수님3</option>
                    </select>
                    <select id="Laststudy" name="Laststudy" title="Laststudy" class="seleStudy width25p ml1p">
                        <option selected="selected">최종학습일순</option>
                        <option value="최근추가순">최근추가순</option>
                        <option value="종료임박순">종료임박순</option>
                    </select>
                </div>
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                    <tbody>
                        <tr>
                            <td class="w-data tx-left pb-zero">
                                <dl class="w-info">
                                    <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n2">진행중</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">12강</span><span class="row-line">|</span></dt>
                                    <dt>진도율 : <span class="tx-blue">0%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">50</span>일</dt>
                                </dl>
                                <div class="w-start tx-gray">                        
                                    <span class="w-subtxt">휴학 : 2018-00-00 ~2018-00-00</span>
                                    <ul class="f_right one">
                                        <li class="btn_white f_right"><a href="#none">일시정지해제</a></li>
                                    </ul> 
                                </div>
                                <div class="w-line">-</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left pb-zero">
                                <dl class="w-info">
                                    <dt>경찰<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n1">2배수</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none"><span class="tx-red">[수강연장]</span>2018 한덕현 제니스 영어 실전 동형 모의고사(4~5월) 영어제니스</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">16강</span><span class="row-line">|</span></dt>
                                    <dt>진도율 : <span class="tx-blue">0%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">100</span>일</dt>
                                </dl>
                                <div class="w-start tx-gray">                        
                                    <span class="w-subtxt">휴학 : 2018-00-00 ~2018-00-00</span>
                                    <ul class="f_right one">
                                        <li class="btn_white f_right"><a href="#none">일시정지해제</a></li>
                                    </ul> 
                                </div>
                                <div class="w-line">-</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left pb-zero">
                                <dl class="w-info">
                                    <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n4">완강</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">12강</span><span class="row-line">|</span></dt>
                                    <dt>진도율 : <span class="tx-blue">0%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">50</span>일</dt>
                                </dl>
                                <div class="w-start tx-gray">                        
                                    <span class="w-subtxt">휴학 : 2018-00-00 ~2018-00-00</span>
                                    <ul class="f_right one">
                                        <li class="btn_white f_right"><a href="#none">일시정지해제</a></li>
                                    </ul> 
                                </div>
                                <div class="w-line">-</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left pb-zero">
                                <dl class="w-info">
                                    <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n4">완강</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">12강</span><span class="row-line">|</span></dt>
                                    <dt>진도율 : <span class="tx-blue">0%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">50</span>일</dt>
                                </dl>
                                <div class="w-start tx-gray">                        
                                    <span class="w-subtxt">휴학 : 2018-00-00 ~2018-00-00</span>
                                    <ul class="f_right one">
                                        <li class="btn_white f_right"><a href="#none">일시정지해제</a></li>
                                    </ul> 
                                </div>
                                <div class="w-line">-</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="lecMore">
                    <a href="#none">더보기 (<span class="tx-black">10</span>/20)</a>
                </div>
            </div>
            <div id="leclist2" class="tabContent" style="display: none;">
                <div class="willbes-Txt NGR c_both mt30">
                    <div class="willbes-Txt-Tit NG">· 일시정지강좌 <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
                    - 일시정지해제 버튼을 클릭하시면 일시정지 상태가 해제되어 즉시 수강하실 수 있습니다.<br/>
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
                    <select id="prof" name="prof" title="prof" class="seleProf width24p ml1p">
                        <option selected="selected">교수님</option>
                        <option value="교수님1">교수님1</option>
                        <option value="교수님2">교수님2</option>
                        <option value="교수님3">교수님3</option>
                    </select>
                    <select id="Laststudy" name="Laststudy" title="Laststudy" class="seleStudy width25p ml1p">
                        <option selected="selected">최종학습일순</option>
                        <option value="최근추가순">최근추가순</option>
                        <option value="종료임박순">종료임박순</option>
                    </select>
                </div>
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                    <tbody>
                        <tr>
                            <td class="w-data tx-left pb-zero">
                                <dl class="w-info">
                                    <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n4">완강</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">12강</span><span class="row-line">|</span></dt>
                                    <dt>진도율 : <span class="tx-blue">0%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">50</span>일</dt>
                                </dl>
                                <div class="w-start tx-gray">                        
                                    <span class="w-subtxt">휴학 : 2018-00-00 ~2018-00-00</span>
                                    <ul class="f_right one">
                                        <li class="btn_white f_right"><a href="#none">일시정지해제</a></li>
                                    </ul> 
                                </div>
                                <div class="w-line">-</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left pb-zero">
                                <dl class="w-info">
                                    <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n4">완강</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">12강</span><span class="row-line">|</span></dt>
                                    <dt>진도율 : <span class="tx-blue">0%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">50</span>일</dt>
                                </dl>
                                <div class="w-start tx-gray">                        
                                    <span class="w-subtxt">휴학 : 2018-00-00 ~2018-00-00</span>
                                    <ul class="f_right one">
                                        <li class="btn_white f_right"><a href="#none">일시정지해제</a></li>
                                    </ul> 
                                </div>
                                <div class="w-line">-</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="lecMore">
                    <a href="#none">더보기 (<span class="tx-black">15</span>/20)</a>
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