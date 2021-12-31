@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Section widthAuto">
        <div class="wsSearchWrap">
            <div class="wsSearch NSK">
                <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">                
                    <input type="hidden" name="cate" id="unifiedSearch_cate" value="{{$__cfg['CateCode']}}">
                    <select name="search_type">
                        <option value="0">통합검색</option>
                        <option value="1">도서명</option>
                        <option value="2">저자명</option>                            
                        <option value="3">출판사</option>
                    </select>
                    <input type="text" name="" class="d_none">                
                    <input type="text" class='unifiedSearch' data-form="unifiedSearch_form" id="unifiedSearch_text" name="searchfull_text" value="" placeholder="검색어를 입력하세요." maxlength="100"/>
                    <label for="onsearch" class="NSK-Black"><button title="검색" type="button" id="btn_unifiedSearch" class='btn_unifiedSearch' data-form="unifiedSearch_form">Search</button></label>
                </form>
            </div>
            <div class="keyword">
                <strong>윌스토리 인기검색어</strong>										
                <a href="#none">김정일</a>                 
                <a href="#none">김유향</a>                 
                <a href="#none">PSAT</a>                 
                <a href="#none">김동진</a>                
                <a href="#none">NCS</a>                 
                <a href="#none">로스쿨</a>                 
                <a href="#none">나무경영아카데미</a>                 
                <a href="#none">노무사</a>                 
                <a href="#none">황종휴</a> 
            </div>
        </div>
    </div>

    @include('html.wsBook_menu')

    <div class="Depth">
        <a href="#none"><img src="{{ img_url('sub/icon_home.gif') }}"></a>
        <span class="depth"><span class="depth-Arrow">&gt;</span><strong>도서</strong></span>
    </div>

    <div class="Content p_re">        
        <div class="curriWrap c_both">
            <ul class="curriTabs c_both">
                <li><a href="#none" class="on">공무원</a></li>
                <li><a href="#none">고시/로스쿨</a></li>
                <li><a href="#none">경찰</a></li>
                <li><a href="#none">전문자격</a></li>
                <li><a href="#none">취업/자격증</a></li>
                <li><a href="#none">어학</a></li>
                <li><a href="#none">학점/편입/독학사</a></li>
                <li><a href="#none">일반서적</a></li>
            </ul>
            <div class="CurriBox">
                <table cellspacing="0" cellpadding="0" class="curriTable">
                    <colgroup>
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                    </colgroup>
                    <tbody>
                        <tr>
                            <th class="tx-gray">카테고리</th>
                            <td colspan="9">
                                <ul class="curriSelect">
                                    <li><a class="on"href="#none">7/9급</a></li>
                                    <li><a href="#none">법원/등기/검찰</a></li>
                                    <li><a href="#none">군무원/장교/부사관</a></li>
                                    <li><a href="#none">소방</a></li>
                                    <li><a href="#none">기술/기능</a></li>
                                    <li><a href="#none">국회직</a></li>
                                    <li><a href="#none">국가정보원</a></li>
                                    <li><a href="#none">인적성/면접/기타</a></li>
                                    <li><a href="#none">PSAT</a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th class="tx-gray">과목</th>
                            <td colspan="9">
                                <ul class="curriSelect">
                                    <li><a class="on" href="#none">국어</a></li>
                                    <li><a href="#none">영어</a></li>
                                    <li><a href="#none">한국사</a></li>
                                    <li><a href="#none">행정학</a></li>
                                    <li><a href="#none">행정법</a></li>
                                    <li><a href="#none">경제학</a></li>
                                    <li><a href="#none">사회/과학/수학</a></li>
                                    <li><a href="#none">모의고사/기출</a></li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- curriWrap -->

        <div class="willbes-Lec-Search p_re mb15 mt20">
            <div class="inputBox p_re">
                <div class="selectBox">
                    <select id="select" name="select" title="직접입력" class="">
                        <option selected="selected">최근등록순</option>
                        <option value="">상품명↑</option>
                        <option value="">상품명↓</option>
                        <option value="">발행일↑</option>
                        <option value="">발행일↓</option>
                        <option value="">가격↑</option>
                        <option value="">가격↓</option>
                    </select>
                </div>
                <div class="selectBox">
                    <select id="select" name="select" title="직접입력" class="">
                        <option selected="selected">교재명</option>
                        <option value="">저자</option>
                        <option value="">출판사</option>
                    </select>
                </div>
                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강의명" maxlength="30">
                <button type="submit" onclick="" class="search-Btn">
                    <span>검색</span>
                </button>
            </div>
        </div>
        <!-- willbes-Lec-Search -->        

        <div class="wsBookWrap p_re">            
            <div class="amount">총 <span>57</span>개의 상품이 있습니다.</div>
            <div class="wsBook-buyBtn">
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-white bd-light-gray">
                            <span class="tx-black">장바구니</span>
                        </button>
                    </li>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-green bd-green">
                            <span>바로결제</span>
                        </button>
                    </li>
                </ul>
            </div>
            <!-- willbes-Lec-buyBtn -->            

            <div class="wsBookListBox mt20">
                <div class="wsBook">
                    <div class="wsBookImg">
                        <a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/303154/book_303154_og.jpg" alt="교재명" title="교재명" /></a>
                    </div>
                    <div class="wsBookInfo">
                        <ul>
                            <li class="bookTitle NSK">
                                <label><input type="checkbox" name="" id=""></label>
                                <a href="#none">정채영 국어 마무리시리즈 70테마로 끝내주마!</a>
                            </li>
                            <li><strong>[저자]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출판사]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출간일]</strong> 2020.05.20</li>
                            <li><strong class="tx-red">[품절]</strong> <span class="line-through">20,000원</span> → <span class="tx-blue strong">10,800원</span></li>
                            <li>
                                <select id="" name="" title="">
                                    <option selected="selected">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                    <option value="">8</option>
                                    <option value="">9</option>
                                    <option value="">10</option>
                                </select>
                                <div class="buyinfo">
                                    <a href="#none" onclick="openWin('leyerbuyPop')"><span>2개까지</span> 구매가능 ❔</a>
                                    <div class="buyinfoPop" id="leyerbuyPop">
                                        <a href="#none" onclick="closeWin('leyerbuyPop')" class="closeBtn">X</a>
                                        <p>[구매 제한 교재 안내]</p>
                                        해당 교재는 구매 가능 개수가 제한된 교재로 아이디당 안내된 개수까지만 구매 가능합니다. 
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="bookLecBtn mt10">
                            <a href="#none" onclick="openWin('bookLec')" class="lecViewBtn">
                                <strong>교재로 진행중인 강의 ▼</strong>
                            </a> 
                            {{--강의정보--}}
                            <div id="bookLec" class="willbes-Layer-CScenterBox willbes-Layer-bookLecBox">
                                <a class="closeBtn" href="#none" onclick="closeWin('bookLec')">
                                    <img src="{{ img_url('prof/close.png') }}">
                                </a>
                                <div class="Layer-Cont">
                                    <div class="LeclistTable">
                                        <ul>
                                            <li><a href="#none">2022년 과목개편 대비 신광은 형사법 심화기출 (21년 11월)</a></li>
                                            <li><a href="#none">2022년 과목개편 대비 신광은 형사법(수사/증거편) 심화기출 (21년 11월)</a></li>
                                            <li><a href="#none">2022년 과목개편 대비 신광은 형사법 심화기출 (21년 11월)</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>                                  
                        </div> 
                    </div>
                </div>
                <div class="wsBook">
                    <div class="wsBookImg">
                        <a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/304013/book_304013_og.png" alt="교재명" title="교재명" /></a>
                    </div>
                    <div class="wsBookInfo">
                        <ul>
                            <li class="bookTitle NSK">
                                <label><input type="checkbox" name="" id=""></label>
                                <a href="#none">2019 기태국어 실전문제 1340(전2권) </a>
                            </li>
                            <li><strong>[저자]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출판사]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출간일]</strong> 2020.05.20</li>
                            <li><strong>[판매중]</strong> <span class="line-through">20,000원</span> → <span class="tx-blue strong">10,800원</span></li>
                            <li>
                                <select id="" name="" title="">
                                    <option selected="selected">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                    <option value="">8</option>
                                    <option value="">9</option>
                                    <option value="">10</option>
                                </select>
                            </li>
                        </ul>
                        <div class="bookLecBtn mt10">
                            <a href="#none" class="lecViewBtn">
                                <strong>교재로 진행중인 강의 ▼</strong>
                            </a>                                  
                        </div> 
                    </div>
                </div>
                <div class="wsBook">
                    <div class="wsBookImg">
                        <a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/303945/book_303945_og.png" alt="교재명" title="교재명" /></a>
                    </div>
                    <div class="wsBookInfo">
                        <ul>
                            <li class="bookTitle NSK">
                                <label><input type="checkbox" name="" id=""></label>
                                <a href="#none">2019 기태국어 기본이론(어법, 독해)(세트전2권) </a>
                            </li>
                            <li><strong>[저자]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출판사]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출간일]</strong> 2020.05.20</li>
                            <li><strong>[판매중]</strong> <span class="line-through">20,000원</span> → <span class="tx-blue strong">10,800원</span></li>
                            <li>
                                <select id="" name="" title="">
                                    <option selected="selected">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                    <option value="">8</option>
                                    <option value="">9</option>
                                    <option value="">10</option>
                                </select>
                            </li>
                        </ul>
                        <div class="bookLecBtn mt10">
                            <a href="#none" class="lecViewBtn">
                                <strong>교재로 진행중인 강의 ▼</strong>
                            </a>                                  
                        </div> 
                    </div>
                </div>
                <div class="wsBook">
                    <div class="wsBookImg">
                        <a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/303826/book_303826_og.png" alt="교재명" title="교재명" /></a>
                    </div>
                    <div class="wsBookInfo">
                        <ul>
                            <li class="bookTitle NSK">
                                <label><input type="checkbox" name="" id=""></label>
                                <a href="#none">2019 기특한 국어(전3권) </a>
                            </li>
                            <li><strong>[저자]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출판사]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출간일]</strong> 2020.05.20</li>
                            <li><strong>[판매중]</strong> <span class="line-through">20,000원</span> → <span class="tx-blue strong">10,800원</span></li>
                            <li>
                                <select id="" name="" title="">
                                    <option selected="selected">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                    <option value="">8</option>
                                    <option value="">9</option>
                                    <option value="">10</option>
                                </select>
                            </li>
                        </ul>
                        <div class="bookLecBtn mt10">
                            <a href="#none" class="lecViewBtn">
                                <strong>교재로 진행중인 강의 ▼</strong>
                            </a>                                  
                        </div> 
                    </div>
                </div>
                <div class="wsBook">
                    <div class="wsBookImg">
                        <a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/303297/book_303297_og.jpg" alt="교재명" title="교재명" /></a>
                    </div>
                    <div class="wsBookInfo">
                        <ul>
                            <li class="bookTitle NSK">
                                <label><input type="checkbox" name="" id=""></label>
                                <a href="#none">풀면 이론이 정리되는 문제집(풀이정) - 햇살국어 Level 2 </a>
                            </li>
                            <li><strong>[저자]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출판사]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출간일]</strong> 2020.05.20</li>
                            <li><strong>[판매중]</strong> <span class="line-through">20,000원</span> → <span class="tx-blue strong">10,800원</span></li>
                            <li>
                                <select id="" name="" title="">
                                    <option selected="selected">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                    <option value="">8</option>
                                    <option value="">9</option>
                                    <option value="">10</option>
                                </select>
                            </li>
                        </ul>
                        <div class="bookLecBtn mt10">
                            <a href="#none" class="lecViewBtn">
                                <strong>교재로 진행중인 강의 ▼</strong>
                            </a>                                  
                        </div> 
                    </div>
                </div>
                <div class="wsBook">
                    <div class="wsBookImg">
                        <a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/303154/book_303154_og.jpg" alt="교재명" title="교재명" /></a>
                    </div>
                    <div class="wsBookInfo">
                        <ul>
                            <li class="bookTitle NSK">
                                <label><input type="checkbox" name="" id=""></label>
                                <a href="#none">정채영 국어 마무리시리즈 70테마로 끝내주마!</a>
                            </li>
                            <li><strong>[저자]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출판사]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출간일]</strong> 2020.05.20</li>
                            <li><strong>[판매중]</strong> <span class="line-through">20,000원</span> → <span class="tx-blue strong">10,800원</span></li>
                            <li>
                                <select id="" name="" title="">
                                    <option selected="selected">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                    <option value="">8</option>
                                    <option value="">9</option>
                                    <option value="">10</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="wsBook">
                    <div class="wsBookImg">
                        <a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/304013/book_304013_og.png" alt="교재명" title="교재명" /></a>
                    </div>
                    <div class="wsBookInfo">
                        <ul>
                            <li class="bookTitle NSK">
                                <label><input type="checkbox" name="" id=""></label>
                                <a href="#none">2019 기태국어 실전문제 1340(전2권) </a>
                            </li>
                            <li><strong>[저자]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출판사]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출간일]</strong> 2020.05.20</li>
                            <li><strong>[판매중]</strong> <span class="line-through">20,000원</span> → <span class="tx-blue strong">10,800원</span></li>
                            <li>
                                <select id="" name="" title="">
                                    <option selected="selected">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                    <option value="">8</option>
                                    <option value="">9</option>
                                    <option value="">10</option>
                                </select>
                            </li>
                        </ul>
                        <div class="bookLecBtn mt10">
                            <a href="#none" class="lecViewBtn">
                                <strong>교재로 진행중인 강의 ▼</strong>
                            </a>                                  
                        </div> 
                    </div>
                </div>
                <div class="wsBook">
                    <div class="wsBookImg">
                        <a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/303945/book_303945_og.png" alt="교재명" title="교재명" /></a>
                    </div>
                    <div class="wsBookInfo">
                        <ul>
                            <li class="bookTitle NSK">
                                <label><input type="checkbox" name="" id=""></label>
                                <a href="#none">2019 기태국어 기본이론(어법, 독해)(세트전2권) </a>
                            </li>
                            <li><strong>[저자]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출판사]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출간일]</strong> 2020.05.20</li>
                            <li><strong>[판매중]</strong> <span class="line-through">20,000원</span> → <span class="tx-blue strong">10,800원</span></li>
                            <li>
                                <select id="" name="" title="">
                                    <option selected="selected">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                    <option value="">8</option>
                                    <option value="">9</option>
                                    <option value="">10</option>
                                </select>
                            </li>
                        </ul>
                        <div class="bookLecBtn mt10">
                            <a href="#none" class="lecViewBtn">
                                <strong>교재로 진행중인 강의 ▼</strong>
                            </a>                                  
                        </div> 
                    </div>
                </div>
                <div class="wsBook">
                    <div class="wsBookImg">
                        <a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/303826/book_303826_og.png" alt="교재명" title="교재명" /></a>
                    </div>
                    <div class="wsBookInfo">
                        <ul>
                            <li class="bookTitle NSK">
                                <label><input type="checkbox" name="" id=""></label>
                                <a href="#none">2019 기특한 국어(전3권) </a>
                            </li>
                            <li><strong>[저자]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출판사]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출간일]</strong> 2020.05.20</li>
                            <li><strong>[판매중]</strong> <span class="line-through">20,000원</span> → <span class="tx-blue strong">10,800원</span></li>
                            <li>
                                <select id="" name="" title="">
                                    <option selected="selected">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                    <option value="">8</option>
                                    <option value="">9</option>
                                    <option value="">10</option>
                                </select>
                            </li>
                        </ul>
                        <div class="bookLecBtn mt10">
                            <a href="#none" class="lecViewBtn">
                                <strong>교재로 진행중인 강의 ▼</strong>
                            </a>                                  
                        </div> 
                    </div>
                </div>
                <div class="wsBook">
                    <div class="wsBookImg">
                        <a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/303297/book_303297_og.jpg" alt="교재명" title="교재명" /></a>
                    </div>
                    <div class="wsBookInfo">
                        <ul>
                            <li class="bookTitle NSK">
                                <label><input type="checkbox" name="" id=""></label>
                                <a href="#none">풀면 이론이 정리되는 문제집(풀이정) - 햇살국어 Level 2 </a>
                            </li>
                            <li><strong>[저자]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출판사]</strong> <a href="#none">윌비스</a></li>
                            <li><strong>[출간일]</strong> 2020.05.20</li>
                            <li><strong>[판매중]</strong> <span class="line-through">20,000원</span> → <span class="tx-blue strong">10,800원</span></li>
                            <li>
                                <select id="" name="" title="">
                                    <option selected="selected">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                    <option value="">8</option>
                                    <option value="">9</option>
                                    <option value="">10</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="Paging">
                <ul>
                    <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                    <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                    <li><a href="#none">2</a><span class="row-line">|</span></li>
                    <li><a href="#none">3</a><span class="row-line">|</span></li>
                    <li><a href="#none">4</a><span class="row-line">|</span></li>
                    <li><a href="#none">5</a><span class="row-line">|</span></li>
                    <li><a href="#none">6</a><span class="row-line">|</span></li>
                    <li><a href="#none">7</a><span class="row-line">|</span></li>
                    <li><a href="#none">8</a><span class="row-line">|</span></li>
                    <li><a href="#none">9</a><span class="row-line">|</span></li>
                    <li><a href="#none">10</a></li>
                    <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                </ul>
            </div>
        </div>
        <!--wsBookWrap//-->

    </div>
    <!--//Content-->

    <div class="Quick-Bnr ml20">
        <img src="https://static.willbes.net/public/images/promotion/sub/sub_bn_160.jpg">     
    </div>

    {{-- 윌스토리 퀵영역 --}}
    <div id="QuickMenu" class="wsBookQuick">
        <ul>
            <li class="bookimg">
                <div class="lastBook">최근본책<span>(2)개</span></div>
                <div class="QuickSlider">                    
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/304013/book_304013_og.png" title="교재명"></a></div>
                        <div><a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/303945/book_303945_og.png" title="교재명"></a></div>
                    </div>
                </div>
            </li>
            <li class="cart">
                <a href="#none">장바구니 (2)</a>
            </li>
            <li class="order">
                <a href="#none">주문/배송조회</a>
            </li>
            <li class="top">
                <a href="#Container">TOP</a>
            </li>
        </ul>
    </div>  
</div>




<!-- End Container -->
@stop