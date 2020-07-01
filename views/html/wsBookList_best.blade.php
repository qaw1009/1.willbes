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
                    <input type="search" class='unifiedSearch' data-form="unifiedSearch_form" id="unifiedSearch_text" name="searchfull_text" value="" placeholder="검색어를 입력하세요." maxlength="100"/>
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
        <div class="wsBook-Subject tx-dark-black NG">
            · 베스트셀러
        </div>          
        <div class="willbes-Lec-Search p_re mb15">
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

        <div class="wsBookWrap">            
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
                                <a href="#none">2019 기태국어 실전문제 1340(전2권) 2019 기태국어 실전문제 1340(전2권) 2019 기태국어 실전문제 1340(전2권)  </a>
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