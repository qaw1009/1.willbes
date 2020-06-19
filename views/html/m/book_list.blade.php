@extends('html.m.layouts.v2.master')

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
            <option value="">상품명순</option>
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
            <div class="bookImg"><img src="https://pass.willbes.net/public/uploads/wbs/book/2019/304149/book_304149_og.jpg"></div>
            <ul class="bookInfo">
                <li class="bookTitle">2019 기태국어 기본이론(어법, 독해)(세트전2권) </li>
                <li><span class="writer">신광은경찰팀 저</span><br><span class="row-line">|</span> 2020-06-15</li>
                <li><a href="#none" class="bookView" onclick="openWin('viewBook')">교재상세정보</a></li>
                <li>[판매중] <span class="tx-blue">31,500원</span> (↓10%)</li>
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
        <div class="bookList">
            <div class="bookImg"><img src="https://pass.willbes.net/public/uploads/wbs/book/2019/304121/book_304121_og.jpg"></div>
            <ul class="bookInfo">
                <li class="bookTitle">2018 9급 오대혁 국어 백발백중 전범위 동형모의고사 665제 </li>
                <li><span class="writer">서울대학교정치외교학부 교수진 저</span><br><span class="row-line">|</span> 2020-06-15</li>
                <li><a href="#none" class="bookView" onclick="openWin('viewBook')">교재상세정보</a></li>
                <li>[판매중] <span class="tx-blue">31,500원</span> (↓10%)</li>
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
        <div class="bookList">
            <div class="bookImg"><img src="https://gosi.willbes.net/public/uploads/wbs/book/2020/307874/book_307874_og.jpg"></div>
            <ul class="bookInfo">
                <li class="bookTitle">2017 정채영 국어 마무리시리즈(적중문제편) 100문제만 찍어주마! </li>
                <li><span class="writer">강인엽 저<span><br><span class="row-line">|</span> 2020-06-15</li>
                <li><a href="#none" class="bookView" onclick="openWin('viewBook')">교재상세정보</a></li>
                <li>[판매중] <span class="tx-blue">31,500원</span> (↓10%)</li>
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
        <div class="bookList">
            <div class="bookImg"><img src="https://police.willbes.net/public/uploads/wbs/book/2020/305041/book_305041_og.jpg"></div>
            <ul class="bookInfo">
                <li class="bookTitle">2020 강인엽 경찰 면접의 정석2.0</li>
                <li>강인엽 저<br><span class="row-line">|</span> 2020-06-15</li>
                <li><a href="#none" class="bookView" onclick="openWin('viewBook')">교재상세정보</a></li>
                <li>[판매중] <span class="tx-blue">31,500원</span> (↓10%)</li>
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
        <div class="bookList">
            <div class="bookImg"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/303318/book_303318_og.jpg"></div>
            <ul class="bookInfo">
                <li class="bookTitle">2020 강인엽 경찰 면접의 정석2.0</li>
                <li>강인엽 저<br><span class="row-line">|</span> 2020-06-15</li>
                <li><a href="#none" class="bookView" onclick="openWin('viewBook')">교재상세정보</a></li>
                <li>[판매중] <span class="tx-blue">31,500원</span> (↓10%)</li>
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
    <!--bookListWrap//-->

    {{--교재 보기 팝업 --}}
    <div id="viewBook" class="willbes-Layer-Black NG">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h510 fix">
            <a class="closeBtn" href="#none" onclick="closeWin('viewBook')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <h4>2020 장정훈 경찰학개론 최신기출문제 [개정판] 2020 장정훈 경찰학개론 2020</h4>
            <div class="LecDetailBox">
                <h5>교재상세정보</h5>
                <div class="tx-dark-gray">
                    분야 : 일반경찰<br>
                    저자 : 강인엽<br>
                    출판사 : 좋은책<br>
                    판형/쪽수 : 190*260 / 581<br>
                    출판일 : 2020-06-15<br>
                    교재비 : 31,500원 (↓10%) [판매중]<br>
                </div>
                <h5>교재소개</h5>
                <div class="tx-dark-gray">
                    21세기 세계정치경제질서의 진로<br>
                    <br>
                    세계화가 본격화되고 냉정과 이데올로기의 시대가 종식된 지난 20여 년간 세계정치경제질서에는 중대한 구조적 변화들이 진행되고 있다. 
                    문제는 이러한 변화들이 어떻게 이루어지고 있는지 정확히 파악되지 못할 뿐 아니라, 
                    이 현상들이 서로 어떻게 연관되고 있는지, 궁극적으로 어떤 지향점을 향해 가고 있는지, 단계적으로 어떤 변화들을 겪으면서 전개될 것인지, 
                    그리고 이 변화들을 추동하는 요인이 무엇이며 어느 정도까지 영향을 미칠 수 있는지에 대해 체계적 논의가 시작되지 못하고 있다는 점이다.
                    이 책은 이러한 문제의식을 바탕으로 시작해 오랜 공동작업과 논의의 결과물이다. 현장의 필요를 십분 반영하여 
                    21세기 세계정치경제질서를 총괄하는 입문서로 기능하도록 기획되었다.<br>
                    <br>
                    20세기로부터의 유산, 21세기의 진로<br>
                </div>
            </div>
        </div>
        <div class="dim" onclick="closeWin('viewBook')"></div>
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