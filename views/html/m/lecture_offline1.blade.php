@extends('html.m.layouts.master')

@section('content')

<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="onSearch">
        <input type="search" id="onsearch" name="" value="" placeholder="온라인강의 검색" title="온라인강의 검색" />
        <label for="onsearch"><button title="검색">검색</button></label>
    </div>

    <div id="Sticky" class="sticky-Title">
        <div class="sticky-Grid sticky-topTit">
            <div class="willbes-Tit NGEB p_re">  
                학원수강신청 > 단과반
            </div>
        </div>
    </div>

    <div>
        <ul class="Lec-Selected NG tx-gray">
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">9급공무원</option>
                    <option value="">7급공무원</option>
                    <option value="">세무직</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">캠퍼스전체</option>
                    <option value="">캠퍼스1</option>
                    <option value="">캠퍼스2</option>
                    <option value="">캠퍼스2</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">과정전체</option>
                    <option value="">과정1</option>
                    <option value="">과정2</option>
                    <option value="">과정3</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">과목전체</option>
                    <option value="">과목1</option>
                    <option value="">과목2</option>
                    <option value="">과목3</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">교수전체</option>
                    <option value="">교수1</option>
                    <option value="">교수2</option>
                    <option value="">교수3</option>
                </select>
            </li>
            <li class="resetBtn2">
                <a href="#none">초기화</a>
            </li>           
        </ul>

        <div class="willbes-Lec-Selected NG c_both tx-gray pb-zero">
            <select id="process" name="process" title="process" class="seleProcess width30p">
                <option selected="selected">과정순</option>
                <option value="과정순">최근등록순</option>
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
                    <tr class="replyList willbes-Open-Table">
                        <td class="w-data tx-left">
                            <div class="w-tit">경제학</div>
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr class="willbes-Open-List">
                        <td class="w-data tx-left" colspan="2">
                            <div class="oneBox">
                                <dl class="w-info">
                                    <dt>신림(본원)<span class="row-line">|</span>GS3순환<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴</dt>
                                </dl>
                                <div class="w-tit tx-blue">
                                    <a href="lecture_offline2">20_GS3순환 경제학 황종휴</a>
                                </div>
                                <dl class="w-info tx-gray">                                
                                    <dt>개강일~종강일 : <span class="tx-blue">05/19 ~ 06/08</span> 월화수목금토 (19회차)</dt><br>       
                                    <dt>수강형태 : <span class="tx-blue">오전영상</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt><br>    
                                    <dt><span class="tx-blue">90,000원</span>(↓0%)</dt>                            
                                </dl>
                                <div class="w-buy">       
                                    <ul class="three">
                                        <li><a href="#none" class="btn_white" onclick="openWin('LecBuyMessagePop')">방문결제</a></li>
                                        <li><a href="#none" class="btn_gray">장바구니</a></li>
                                        <li><a href="#none" class="btn_blue">바로결제</a></li>
                                    </ul> 
                                </div>
                            </div>
                            <div class="oneBox">
                                <dl class="w-info">
                                    <dt>신림(본원)<span class="row-line">|</span>GS3순환<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴</dt>
                                </dl>
                                <div class="w-tit tx-blue">
                                    <a href="lecture_offline2">20_GS3순환 경제학 황종휴</a>
                                </div>
                                <dl class="w-info tx-gray">                                
                                    <dt>개강일~종강일 : <span class="tx-blue">05/19 ~ 06/08</span> 월화수목금토 (19회차)</dt><br>       
                                    <dt>수강형태 : <span class="tx-blue">오전영상</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt><br>    
                                    <dt><span class="tx-blue">90,000원</span>(↓0%)</dt>                            
                                </dl>
                                <div class="w-buy">       
                                    <ul class="three">
                                        <li><a href="#none" class="btn_white" onclick="openWin('LecBuyMessagePop')">방문결제</a></li>
                                        <li><a href="#none" class="btn_gray">장바구니</a></li>
                                        <li><a href="#none" class="btn_blue">바로결제</a></li>
                                    </ul> 
                                </div>
                            </div>
                        </td>                        
                    </tr>
                    
                    <tr class="replyList willbes-Open-Table">
                        <td class="w-data tx-left">
                            <div class="w-tit">경찰학개론</div>
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr class="willbes-Open-List">
                        <td class="w-data tx-left" colspan="2">
                        <div class="oneBox">
                                <dl class="w-info">
                                    <dt>신림(본원)<span class="row-line">|</span>GS3순환<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴</dt>
                                </dl>
                                <div class="w-tit tx-blue">
                                    <a href="lecture_offline2">20_GS3순환 경제학 황종휴</a>
                                </div>
                                <dl class="w-info tx-gray">                                
                                    <dt>개강일~종강일 : <span class="tx-blue">05/19 ~ 06/08</span> 월화수목금토 (19회차)</dt><br>       
                                    <dt>수강형태 : <span class="tx-blue">오전영상</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt><br>    
                                    <dt><span class="tx-blue">90,000원</span>(↓0%)</dt>                            
                                </dl>
                                <div class="w-buy">       
                                    <ul class="three">
                                        <li><a href="#none" class="btn_white" onclick="openWin('LecBuyMessagePop')">방문결제</a></li>
                                        <li><a href="#none" class="btn_gray">장바구니</a></li>
                                        <li><a href="#none" class="btn_blue">바로결제</a></li>
                                    </ul> 
                                </div>
                            </div>
                            <div class="oneBox">
                                <dl class="w-info">
                                    <dt>신림(본원)<span class="row-line">|</span>GS3순환<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴</dt>
                                </dl>
                                <div class="w-tit tx-blue">
                                    <a href="lecture_offline2">20_GS3순환 경제학 황종휴</a>
                                </div>
                                <dl class="w-info tx-gray">                                
                                    <dt>개강일~종강일 : <span class="tx-blue">05/19 ~ 06/08</span> 월화수목금토 (19회차)</dt><br>       
                                    <dt>수강형태 : <span class="tx-blue">오전영상</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt><br>    
                                    <dt><span class="tx-blue">90,000원</span>(↓0%)</dt>                            
                                </dl>
                                <div class="w-buy">       
                                    <ul class="three">
                                        <li><a href="#none" class="btn_white" onclick="openWin('LecBuyMessagePop')">방문결제</a></li>
                                        <li><a href="#none" class="btn_gray">장바구니</a></li>
                                        <li><a href="#none" class="btn_blue">바로결제</a></li>
                                    </ul> 
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="replyList willbes-Open-Table">
                        <td class="w-data tx-left">
                            <div class="w-tit">형법</div>
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr class="willbes-Open-List">
                        <td class="w-data tx-left" colspan="2">
                            <div class="oneBox">
                                <dl class="w-info">
                                    <dt>신림(본원)<span class="row-line">|</span>GS3순환<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴</dt>
                                </dl>
                                <div class="w-tit tx-blue">
                                    <a href="lecture_offline2">20_GS3순환 경제학 황종휴</a>
                                </div>
                                <dl class="w-info tx-gray">                                
                                    <dt>개강일~종강일 : <span class="tx-blue">05/19 ~ 06/08</span> 월화수목금토 (19회차)</dt><br>       
                                    <dt>수강형태 : <span class="tx-blue">오전영상</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt><br>    
                                    <dt><span class="tx-blue">90,000원</span>(↓0%)</dt>                            
                                </dl>
                                <div class="w-buy">       
                                    <ul class="three">
                                        <li><a href="#none" class="btn_white" onclick="openWin('LecBuyMessagePop')">방문결제</a></li>
                                        <li><a href="#none" class="btn_gray">장바구니</a></li>
                                        <li><a href="#none" class="btn_blue">바로결제</a></li>
                                    </ul> 
                                </div>
                            </div>
                            <div class="oneBox">
                                <dl class="w-info">
                                    <dt>신림(본원)<span class="row-line">|</span>GS3순환<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴</dt>
                                </dl>
                                <div class="w-tit tx-blue">
                                    <a href="lecture_offline2">20_GS3순환 경제학 황종휴</a>
                                </div>
                                <dl class="w-info tx-gray">                                
                                    <dt>개강일~종강일 : <span class="tx-blue">05/19 ~ 06/08</span> 월화수목금토 (19회차)</dt><br>       
                                    <dt>수강형태 : <span class="tx-blue">오전영상</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt><br>    
                                    <dt><span class="tx-blue">90,000원</span>(↓0%)</dt>                            
                                </dl>
                                <div class="w-buy">       
                                    <ul class="three">
                                        <li><a href="#none" class="btn_white" onclick="openWin('LecBuyMessagePop')">방문결제</a></li>
                                        <li><a href="#none" class="btn_gray">장바구니</a></li>
                                        <li><a href="#none" class="btn_blue">바로결제</a></li>
                                    </ul> 
                                </div>
                            </div>
                        </td>
                    </tr>                    
                </tbody>
            </table>

            <div id="LecBuyMessagePop" class="willbes-Layer-Black">
                <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h250 fix">
                    <a class="closeBtn" href="#none" onclick="closeWin('LecBuyMessagePop')">
                        <img src="{{ img_url('m/calendar/close.png') }}">
                    </a>
                    <div class="Message NG">
                        <p>해당 상품이<br> 학원방문결제 접수에 담겼습니다.</p>
                        <p>학원방문결제 접수로<br> 이동하시겠습니까?<p>
                    </div>
                    <div class="MessageBtns">
                        <a href="#none" class="btn_gray">예</a>
                        <a href="#none" class="btn_white">계속구매</a>
                    </div>
                </div>
                <div class="dim" onclick="closeWin('LecBuyMessagePop')"></div>
            </div>
            <!-- willbes-Layer-PassBox : 쪽지 -->

     
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