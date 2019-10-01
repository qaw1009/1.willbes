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
                수강종료강좌
            </div>
        </div>
    </div>

    <div class="lineTabs lecListTabs c_both">
        <ul class="tabWrap lineWrap rowlineWrap lecListWrap four mt-zero">
            <li><a href="#leclist1" class="on">단강좌 <span>3</span></a><span class="row-line">|</span></li>
            <li><a href="#leclist2">패키지강좌 <span>6</span></a><span class="row-line">|</span></li>
            <li><a href="#leclist3">무료강좌 <span>6</span></a><span class="row-line">|</span></li>
            <li><a href="#leclist4">관리자부여 <span>6</span></a></li>
        </ul>
        <div class="tabBox lineBox lecListBox">
            <div id="leclist1" class="tabContent">
                <div class="willbes-Txt NGR c_both mt20">
                    <div class="willbes-Txt-Tit NG">· 수강종료강좌 <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
                    - 수강종료된 강좌는 재수강 신청만 가능합니다.(수강연장 신청 불가)<br>
                    - 재수강시, 20% 할인된 가격으로 수강할 수 있습니다.<br>
                    - 폐강된 강좌는 재수강신청이 제공되지 않습니다.<br>
                    - 수강기간은 개별 강좌에 따라 다르게 책정되며 수정 될 수 있습니다.
                </div>

                <div class="paymentWrap">
                    <div class="paymentDate">
                        <div class="payLecList NGR">
                            <strong>기간검색</strong>  
                            <span href="#none" onclick="openWin('DATAPICKERPASS')"><input type="text" id="S-DATE" name="S-DATE" maxlength="15" style="width:120px" >
                            ~ <input type="text" id="E-DATE" name="E-DATE" maxlength="15" style="width:120px"></span>                
                        </div>
                        <ul class="c_both">
                            <li><a href="#none">전체</a></li>
                            <li><a href="#none">15일</a></li>
                            <li><a href="#none">1개월</a></li>
                            <li><a href="#none">3개월</a></li>
                            <li><a href="#none">6개월</a></li>
                        </ul>
                        <div class="btnSearch">
                            <a href="#none">검색</a>
                        </div>
                    </div>
                </div>

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
                            <td class="w-data tx-left pb-zero">
                                <dl class="w-info">
                                    <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n2">진행중</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>수강기간 : <span class="tx-black">2018-00-00 ~ 2018-00-00</span></dt>
                                </dl>
                                <div class="w-start tx-gray">                        
                                    <ul class="f_left two">
                                        <li class="btn_white"><a href="#none">재수강불가</a></li>
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
                                    <a href="#none"><span class="tx-red">[재수강]</span> 2018 한덕현 제니스 영어 실전 동형 모의고사(4~5월) 영어제니스</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>수강기간 : <span class="tx-black">2018-00-00 ~ 2018-00-00</span></dt>
                                </dl>
                                <div class="w-start tx-gray">                        
                                    <ul class="f_left two">
                                        <li class="btn_white"><a href="#none">후기등록</a></li>
                                        <li class="btn_blue"><a href="#none">재수강신청</a></li>
                                    </ul> 
                                </div>
                                <div class="w-line">-</div>
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
            <div id="leclist2" class="tabContent" style="display: none;">
                <div class="willbes-Txt NGR c_both mt20">
                    <div class="willbes-Txt-Tit NG">· 패키지강좌수강 유의사항 <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
                    - 패키지 강좌는 수강일변경, 일시정지, 수강연장기능이 제공되지 않습니다.<br/>
                </div>

                <div class="paymentWrap">
                    <div class="paymentDate">
                        <div class="payLecList NGR">
                            <strong>기간검색</strong>  
                            <span href="#none" onclick="openWin('DATAPICKERPASS')"><input type="text" id="S-DATE" name="S-DATE" maxlength="15" style="width:120px" >
                            ~ <input type="text" id="E-DATE" name="E-DATE" maxlength="15" style="width:120px"></span>                
                        </div>
                        <ul class="c_both">
                            <li><a href="#none">전체</a></li>
                            <li><a href="#none">15일</a></li>
                            <li><a href="#none">1개월</a></li>
                            <li><a href="#none">3개월</a></li>
                            <li><a href="#none">6개월</a></li>
                        </ul>
                        <div class="btnSearch">
                            <a href="#none">검색</a>
                        </div>
                    </div>
                </div>

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
                <div class="willbes-Open-Table">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                        <tbody>
                            <tr class="bg-light-blue">
                                <td class="w-data tx-left pb-zero">
                                    <div class="w-tit">
                                        <a href="#none">2018 한덕현 제니스 영어실전 동형 모의고사 Pack 강좌명 최대 2줄 노출</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>수강기간 : <span class="tx-black">2018-00-00 ~ 2018-00-00</span></dt>
                                    </dl>
                                    <div class="w-start tx-gray">                      
                                        <ul class="f_left two">
                                            <li class="btn_white"><a href="#none">재수강불가</a></li>
                                        </ul> 
                                        <div class="MoreBtn f_right tx-right">
                                            <a href="#none"><img src="{{ img_url('m/mypage/icon_arrow_on.png') }}"></a>
                                        </div>  
                                    </div>
                                    <div class="w-line">-</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable openTable">
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
                                        <dt>수강기간 : <span class="tx-black">2018-00-00 ~ 2018-00-00</span></dt>
                                    </dl>
                                    <div class="w-start tx-gray">                        
                                        <ul class="f_left two">
                                            <li class="btn_white"><a href="#none">후기등록</a></li>
                                        </ul> 
                                    </div>
                                    <div class="w-line">-</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left pb-zero">
                                    <dl class="w-info">
                                        <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n1">2배수</span></dt>
                                    </dl>
                                    <div class="w-tit">
                                        <a href="#none">2018 기미진 국어 아침 실전 동형모의고사 특강[국가직~서울시](3-6개월)</a>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>수강기간 : <span class="tx-black">2018-00-00 ~ 2018-00-00</span></dt>
                                    </dl>
                                    <div class="w-start tx-gray">                        
                                        <ul class="f_left two">
                                            <li class="btn_white"><a href="#none">후기등록</a></li>
                                        </ul> 
                                    </div>
                                    <div class="w-line">-</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
            <div id="leclist3" class="tabContent" style="display: none;">
                <div class="willbes-Txt NGR c_both mt20">
                    <div class="willbes-Txt-Tit NG">· 무료강좌수강 유의사항 <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
                    - 무료강좌는 수강일변경, 일시정지, 수강연장기능이 제공되지 않습니다.<br/>
                </div>

                <div class="paymentWrap">
                    <div class="paymentDate">
                        <div class="payLecList NGR">
                            <strong>기간검색</strong>  
                            <span href="#none" onclick="openWin('DATAPICKERPASS')"><input type="text" id="S-DATE" name="S-DATE" maxlength="15" style="width:120px" >
                            ~ <input type="text" id="E-DATE" name="E-DATE" maxlength="15" style="width:120px"></span>                
                        </div>
                        <ul class="c_both">
                            <li><a href="#none">전체</a></li>
                            <li><a href="#none">15일</a></li>
                            <li><a href="#none">1개월</a></li>
                            <li><a href="#none">3개월</a></li>
                            <li><a href="#none">6개월</a></li>
                        </ul>
                        <div class="btnSearch">
                            <a href="#none">검색</a>
                        </div>
                    </div>
                </div>

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
                            <td class="w-data tx-left pb-zero">
                                <dl class="w-info">
                                    <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n2">진행중</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>수강기간 : <span class="tx-black">2018-00-00 ~ 2018-00-00</span></dt>
                                </dl>
                                <div class="w-start tx-gray">                        
                                    <ul class="f_left two">
                                        <li class="btn_white"><a href="#none">후기등록</a></li>
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
                                    <a href="#none"><span class="tx-red">[수강연장]</span> 2018 한덕현 제니스 영어 실전 동형 모의고사(4~5월) 영어제니스</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>수강기간 : <span class="tx-black">2018-00-00 ~ 2018-00-00</span></dt>
                                </dl>
                                <div class="w-start tx-gray">                        
                                    <ul class="f_left two">
                                        <li class="btn_white"><a href="#none">후기등록</a></li>
                                    </ul> 
                                </div>
                                <div class="w-line">-</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left pb-zero">
                                <dl class="w-info">
                                    <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n2">진행중</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>수강기간 : <span class="tx-black">2018-00-00 ~ 2018-00-00</span></dt>
                                </dl>
                                <div class="w-start tx-gray">                        
                                    <ul class="f_left two">
                                        <li class="btn_white"><a href="#none">후기등록</a></li>
                                    </ul> 
                                </div>
                                <div class="w-line">-</div>
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
            <div id="leclist4" class="tabContent" style="display: none;">
                <div class="willbes-Txt NGR c_both mt20">
                    <div class="willbes-Txt-Tit NG">· 관리자부여강좌 수강 유의사항 <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
                    - 관리자부여강좌는 무상 혜택으로 지급된 강좌이므로 수강일변경, 일시정지, 수강연장기능이 제공되지 않습니다.<br/>
                </div>

                <div class="paymentWrap">
                    <div class="paymentDate">
                        <div class="payLecList NGR">
                            <strong>기간검색</strong>  
                            <span href="#none" onclick="openWin('DATAPICKERPASS')"><input type="text" id="S-DATE" name="S-DATE" maxlength="15" style="width:120px" >
                            ~ <input type="text" id="E-DATE" name="E-DATE" maxlength="15" style="width:120px"></span>                
                        </div>
                        <ul class="c_both">
                            <li><a href="#none">전체</a></li>
                            <li><a href="#none">15일</a></li>
                            <li><a href="#none">1개월</a></li>
                            <li><a href="#none">3개월</a></li>
                            <li><a href="#none">6개월</a></li>
                        </ul>
                        <div class="btnSearch">
                            <a href="#none">검색</a>
                        </div>
                    </div>
                </div>

                
                <div class="willbes-Lec-Selected NG c_both tx-gray">
                    <select id="lecture" name="lecture" title="lecture" class="seleLec width49p">
                        <option selected="selected">단강좌</option>
                        <option value="패키지">패키지</option>
                    </select>
                    <select id="process" name="process" title="process" class="seleProcess width49p ml1p">
                        <option selected="selected">과정</option>
                        <option value="헌법">헌법</option>
                        <option value="스파르타반">스파르타반</option>
                        <option value="공직선거법">공직선거법</option>
                    </select>
                    <select id="lecture" name="lecture" title="lecture" class="seleLec width45p mt1p">
                        <option selected="selected">과목</option>
                        <option value="헌법">헌법</option>
                        <option value="스파르타반">스파르타반</option>
                        <option value="공직선거법">공직선거법</option>
                    </select>
                    <select id="prof" name="prof" title="prof" class="seleProf width45p ml1p mt1p">
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
                                <div class="w-line mt20">-</div>
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
                                <div class="w-line mt20">-</div>
                            </td>
                        </tr>
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
                                <div class="w-line mt20">-</div>
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