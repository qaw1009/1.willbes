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
                수강신청 > 단강좌
            </div>
        </div>
    </div>

    <div>
        <div class="passProfTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                    <tr>
                        <td>
                            <div class="w-prof p_re">
                                <img src="{{ img_url('m/sample/prof2.jpg') }}">
                                <div class="cover"><img src="{{ img_url('m/mypage/profImg-cover.png') }}"></div>
                            </div>
                            <div class="w-data tx-left">
                                <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                <dl class="w-info pt-zero">
                                    <dt>심화이론<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현</dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 한덕현 제니스 영어 실전 동형 모의고사 (4-5월)</a>
                                </div>
                                <div class="w-info tx-gray">
                                    <dl>
                                        <dt><strong>학원실강의</strong>2020년 1월</dt>
                                        <dt><strong>강의수</strong>32강 / 55강</dt>
                                        <dt><strong>수강기간</strong><span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">무제한</span> <span class="NSK nBox n2">진행중</span></dt>
                                        <dt><strong>강의계획서</strong>황종휴 원론강의.pdf</dt>
                                        <dt><strong>수강가능기간</strong>2020.01.01~2020.01.31</dt>
                                        <dt>
                                            <strong>맛보기</strong><a href="#none" class="tBox black NSK">HIGH</a> <a href="#none" class="tBox gray NSK">LOW</a>
                                        </dt>
                                    </dl>
                                </div>
                            </div>                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="lec-info">
            <h4 class="NGEB">강좌신청</h4>
            <ul class="priceWrap f_none">
                <li>
                    <input type="checkbox" id="checkA" name="checkA">
                    <label for="checkA">
                        PC+모바일 
                        <span class="price">90,000원</span>
                        <span class="discount">(10%↓)</span> ▶
                        <span class="dcprice">81,000원</span>
                    </label>
                </li>
                <li>
                    <input type="checkbox" id="checkB" name="checkB">
                    <label for="checkB">
                        PC 
                        <span class="price">90,000원</span>
                        <span class="discount">(10%↓)</span> ▶
                        <span class="dcprice">81,000원</span>
                    </label>
                </li>
            </ul>
            <div class="automatic">
                <div>자동지급강의</div>
                <p>2021학년도 전공음악 기출문제 해설 및 적중 비교 강의 1</p>
                <p>2021학년도 전공음악 기출문제 해설 및 적중 비교 강의 2</p>
                <p>2021학년도 전공음악 기출문제 해설 및 적중 비교 강의 3</p>   
                <p>2021학년도 전공음악 기출문제 해설 및 적중 비교 강의 4</p>
            </div>
        </div>

        <div class="lec-info">
            <h4 class="NGEB">교재신청</h4>
            <ul>
                <li>
                    <span class="chk">
                        <label>[판매]</label>
                        <input type="checkbox" id="" name="">
                    </span>
                    <div class="priceWrap NG">
                        주교재  <span class="NGR">신광은 형사소송법 신정8판</span><br>
                        <p class="NGR">[판매] <span class="tx-blue">42,000원</span>(↓10%)</p>
                    </div>
                </li>
                <li>
                    <span class="chk">
                        <label>[품절]</label>
                        <input type="checkbox" id="" name="" disabled>
                    </span>
                    <div class="priceWrap NG">
                        부교재  <span class="NGR">신광은 형사소송법 신정8판</span><br>
                        <p class="NGR">[품절] <span class="tx-blue">42,000원</span>(↓10%)</p>
                    </div>
                </li>
                <li class="tx-red NGR">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능합니다.</li>
            </ul>
        </div>

        <div class="priceBox">
            <ul>
                <li><strong>강좌</strong> 0원</li>
                <li><strong>교재</strong> 0원</li>
                <li class="NGEB"><strong>총 주문금액</strong> <span class="tx-blue">150,000원</span></li>
            </ul>
        </div>

        <div class="lec-info-tab NGR">
            <ul class="tabWrap">
                <li><a href="#tab01" class="on">강좌정보</a></li>
                <li><a href="#tab02">교재정보</a></li>
                <li><a href="#tab03">강의목차</a></li>
                <li><a href="#tab04">수강후기</a></li>
            </ul>
            <div class="tabBox tabBox2">
                <div id="tab01"> 
                    <h4 class="NGEB">강좌소개</h4>
                    - 2019대비 신광은 형사소송법 기본이론<br>
                    - 강의일정: 2019.5.30(목) 학원개강 / 동영상업로드 2019.5.30<br>
                    - 교재안내: 신광은 형사소송법 (신정9판)<br>
                    <h4 class="NGEB">강좌특징</h4>
                    <strong>[수강대상]</strong><br>
                    1. 형사소송법을 처음 접하는 수험생으로서 형사소송법의 기초를 튼튼히 하고 싶은 수험생<br>
                    2. 형사소송법의 전반적인 흐름을 이해하고, 체계를 잡고 싶은 수험생<br>
                    3. 형사소송법을 단기간에 효율적으로 공부하는 방법을 알고 싶은 수험생<br>
                    <br>
                    <strong>[강좌기본]</strong><br>
                    1. 신광은 교수님의 형사실무경험을 바탕으로 한 생동감 넘치는 설명을 통해 형사소송의 전반적인 절차를 파악할 수 있는 강좌입니다.<br>
                    2. 형사소송의 기초이론, 판례를 학습할 수 있는 강좌입니다.<br>
                    <br>
                    <strong>[강좌효과]</strong><br>
                    1. 처음 공부하는 수험생들에게는 다소 어려울 수 있는 형사소송 절차를 한눈에 파악할 수 있습니다.<br>
                    2. 낯설고 어려운 법률용어를 쉽게 이해할 수 있습니다.<br>
                    3. 매일매일 O·X 복습자료를 통해 기본기를 다잡을 수 있습니다.<br>
                </div>

                <div id="tab02" class="book-info"> 
                    <img src="{{ img_url('m/sample/book.jpg') }}" alt="교재명">
                    <ul>
                        <li class="NGEB">신광은 형사소송법 (신정9판)</li>
                        <li><span>분야</span> 일반경찰</li>
                        <li><span>저자</span> 신광은</li>
                        <li><span>출판사</span> 웅비출판사</li>
                        <li><span>판형/쪽수</span> 190260 / 1120</li>
                        <li><span>출판일</span> 2019-05-24</li>
                        <li><span>교재비</span> <strong class="tx-blue">42,300원</strong> (↓10%) <strong>[판매중]</strong></li>
                    </ul>
                </div>

                <div id="tab03" class="lec-list"> 
                    <ul>
                        <li>
                            1강 <span class="tx-blue">60분</span><br>
                            4월 21일 : 형사소송법 파이널 실전모의고사 1회
                            <ul class="NGEB mt10">
                                <li><a href="#none" class="btn_black_line">WIDE</a></li>
                                <li><a href="#none" class="btn_blue">HIGH</a></li>
                                <li><a href="#none" class="btn_gray">LOW</a></li>
                                <li><a href="#none" class="f_right"><img src="{{ img_url('m/mypage/icon_lec.png') }}" class="dataIcon"> <span class="underline">강의자료</span></a></li>
                            </ul>
                        </li>
                        <li>
                            2강 <span class="tx-blue">60분</span><br>
                            4월 21일 : 형사소송법 파이널 실전모의고사 1회
                            <ul class="NGEB mt10">
                                <li><a href="#none" class="btn_black_line">WIDE</a></li>
                                <li><a href="#none" class="btn_blue">HIGH</a></li>
                                <li><a href="#none" class="btn_gray">LOW</a></li>
                                <li><a href="#none" class="f_right"><img src="{{ img_url('m/mypage/icon_lec.png') }}" class="dataIcon"> <span class="underline">강의자료</span></a></li>
                            </ul>
                        </li>
                        <li>
                            3강 <span class="tx-blue">60분</span><br>
                            4월 21일 : 형사소송법 파이널 실전모의고사 1회
                            <ul class="NGEB mt10">
                                <li><a href="#none" class="btn_black_line">WIDE</a></li>
                                <li><a href="#none" class="btn_blue">HIGH</a></li>
                                <li><a href="#none" class="btn_gray">LOW</a></li>
                                <li><a href="#none" class="f_right"><img src="{{ img_url('m/mypage/icon_lec.png') }}" class="dataIcon"> <span class="underline">강의자료</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div id="tab04" class="lec-reply"> 
                    해당 강좌 총 수강후기 [<strong>15</strong>건]
                    <p class="tx-red">※ 수강후기는 내강의실에서 등록 가능합니다.</p>
                    <div class="reply">
                        정리하기 좋습니다.정리하기 좋습니다.정리하기 좋습니다.
                        정리하기 좋습니다.정리하기 좋습니다.
                        <p class="mt10">김인* 2019-05-22</p>
                    </div>
                    <div class="reply">
                        정리하기 좋습니다.정리하기 좋습니다.정리하기 좋습니다.
                        정리하기 좋습니다.정리하기 좋습니다.
                        <p class="mt10">김인* 2019-05-22</p>
                    </div>
                    <div class="reply">
                        정리하기 좋습니다.정리하기 좋습니다.정리하기 좋습니다.
                        정리하기 좋습니다.정리하기 좋습니다.
                        <p class="mt10">김인* 2019-05-22</p>
                    </div>
                    <div class="reply">
                        정리하기 좋습니다.정리하기 좋습니다.정리하기 좋습니다.
                        정리하기 좋습니다.정리하기 좋습니다.
                        <p class="mt10">김인* 2019-05-22</p>
                    </div>
                    <div class="reply">
                        정리하기 좋습니다.정리하기 좋습니다.정리하기 좋습니다.
                        정리하기 좋습니다.정리하기 좋습니다.
                        <p class="mt10">김인* 2019-05-22</p>
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
            </div>
        </div>
        
        <div class="lec-btns">
            <ul>
                <li><a href="#none" onClick='alert("강좌 또는 교재를 선택하세요.")' class="btn_black_line">강좌목록</a></li>
                <li><a href="#none" onclick="openWin('LecBuyMessagePop')" class="btn-purple">장바구니</a></li>
                <li><a href="#none" onClick='alert("도서구입비 소득공제 ...")' class="btn-purple-line">바로결제</a></li>
            </ul>
        </div>
    </div>

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

    <div id="LecBuyMessagePop" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h250 fix">
            <a class="closeBtn" href="#none" onclick="closeWin('LecBuyMessagePop')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <div class="Message NG">
                해당 상품이 장바구니에 담겼습니다.<br>
                장바구니로 이동하시겠습니까?
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
<!-- End Container -->
@stop