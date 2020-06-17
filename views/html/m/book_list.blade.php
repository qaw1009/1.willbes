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
                교재구매
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
                    <option selected="selected">과목전체</option>
                    <option value="">형소법</option>
                    <option value="">영어</option>
                    <option value="">한국사</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">교수전체</option>
                    <option value="기미진">기미진</option>
                    <option value="권기태">권기태</option>
                    <option value="김세령">김세령</option>
                </select>
            </li>
            <li class="resetBtn2">
                <a href="#none">초기화</a>
            </li>           
        </ul>

        <div class="willbes-Lec-Selected NG c_both tx-gray pb-zero">
            <select id="process" name="process" title="process" class="seleProcess width30p">
                <option selected="selected">최근등록순</option>
                <option value="">과정순</option>
            </select>
            <select id="lecture" name="lecture" title="lecture" class="seleLec width30p ml1p">
                <option selected="selected">교재명</option>
                <option value="">출판사</option>
                <option value="">저자</option>
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

        <div class="tx14 pl20">총 <strong class="tx-blue">108</strong>개의 상품이 있습니다.</div>

        <div class="bookListWrap">
            <div class="bookList">
                <img src="https://pass.willbes.net/public/uploads/wbs/book/2019/304149/book_304149_og.jpg">
                <ul class="lecTable">
                    <li>2020 강인엽 경찰 면접의 정석2.0</li>
                    <li>강인엽 저 <span class="row-line">|</span> 2020-06-15</li>
                    <li>교재상세정보</li>
                    <li>[판매중] 31,500원 (↓10%)</li>
                    <li>
                        <select id="" name="" class="seleLec width30p ml1p">
                            <option selected="selected">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                    </li>
                    <li>
                        <div class="w-buy">       
                            <ul class="two">
                                <li><a href="#none" class="btn_gray">장바구니</a></li>
                                <li><a href="#none" class="btn_blue">바로결제</a></li>
                            </ul> 
                        </div>
                    </li>
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