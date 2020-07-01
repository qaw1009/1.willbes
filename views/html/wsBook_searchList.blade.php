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

    <div class="widthAuto p_re">
        {{-- 검색 결과 없을 경우--}}
        <div class="searchZero">
            <span><img src="{{ img_url('common/icon_search_big.png')}}"> </span>
            <h3 class="NG">검색 결과가 없습니다.</h3>
            <p>검색어를 바르게 입력하셨는지 확인해주세요.<br>
            검색어의 띄어쓰기를 다르게 해보세요.<br>
            검색어를 줄이거나 다른 단어로 다시 검색해 보세요.
            </p>
        </div>

        {{-- 검색 결과 있을 경우--}}
        <div class="wsBookWrap"> 
            <div class="bookSearch NG">
                <span>신광은</span>에 대한 강좌 검색결과 <span>30</span>건
            </div>
                     
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

</div>
<!-- End Container -->
@stop