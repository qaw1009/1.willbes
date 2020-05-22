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
        <div class="passProfTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                    <tr>
                        <td>
                            <div class="w-prof p_re">
                                <img src="{{ img_url('m/sample/prof2.jpg') }}">
                                <div class="cover"><img src="{{ img_url('m/mypage/profImg-cover.png') }}"></div>
                            </div>
                            <div class="w-data tx-left pl15">
                                <dl class="w-info pt-zero">
                                    <dt>신림(본원)<span class="row-line">|</span>GS3순환<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴</dt>
                                </dl>
                                <div class="w-tit">
                                    2018 한덕현 제니스 영어 실전 동형 모의고사 (4-5월)
                                </div>
                                <div class="w-info tx-gray">
                                    <dl>
                                        <dt class="h22"><strong>개강일~종강일</strong><span class="tx-blue">05/19 ~ 06/08</span></dt><br/>
                                        <dt class="h22">월화수목금토 (19회차)</dt><br/>
                                        <dt class="h22"><strong>수강형태</strong><span class="tx-blue">오전영상</span> </dt><br>
                                        <dt class="h22"><span class="NSK nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt>
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
            <ul>
                <li>
                    <span class="chk">
                        <label>[판매]</label>
                        <input type="checkbox" id="" name="">
                    </span>
                    <div class="priceWrap NG">
                        456,000원 (↓0%) ▶<span class="tx-blue">456,000원</span>                        
                    </div>
                </li>
            </ul>
        </div>

        <div class="lec-info">
            <h4 class="NGEB">교재신청</h4>
            <ul>
                <li>※ 별도 구매 가능한 교재가 없습니다.</li>
                {{--교재 있을 경우--}}
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
            <ul class="tabWrap two">
                <li><a href="#tab01" class="on">강좌정보</a></li>
                <li><a href="#tab02">교재정보</a></li>
            </ul>
            <div class="tabBox tabBox2">
                <div id="tab01"> 
                    <h4 class="NGEB">강좌소개</h4>
                    “수험이론 전반에 대한 핵심요약(단권화) 및 매일 실전모의고사와 문제풀이가 병행되는 최종정리를 위한 강의”<br>
                    - 중요논점에 대한 요약정리와 핵심이슈의 점검으로 각 과목의 매일 진행되는 신작모의고사로 문제적용능력을 높이고, 
                      자세한 강평으로 답안지 현출능력을 향상 시킬 수 있는 강의<br>
                    - 실제 2차 논문형 시험의 난이도를 반영한 엄선된 연습문제풀이를 통하여 응용력을 향상시키고, 중요내용에 대한 암기가 병행되는과정으로 
                      각 과목에 대한 효과적인 정리에 중점을 둔 강의<br>
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
            </div>
        </div>
        
        <div class="lec-btns w25p">
            <ul>
                <li><a href="#none" onClick='lecture_offline1' class="btn_black_line">강좌목록</a></li>
                <li><a href="#none" onclick="openWin('LecBuyMessagePop')" class="btn_gray">방문결제</a></li>
                <li><a href="#none" onclick="openWin('LecBuyMessagePop')" class="btn-purple">장바구니</a></li>
                <li><a href="#none" onclick="openWin('LecBuyMessagePop')" class="btn-purple-line">바로결제</a></li>
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
            {{--체크 안했을 경우--}}
            <div class="Message NG">
                상품을 선택해주세요.
            </div>
            <div class="MessageBtns">
                <a href="#none" class="btn_gray f_none">확인</a>
            </div>
            {{--체크 했을 경우--}}
            <div class="Message NG">
                방문접수를 신청하겠습니까?
            </div>
            <div class="MessageBtns">
                <a href="#none" class="btn_gray">확인</a>
                <a href="#none" class="btn_white">취소</a>
            </div>
            {{--접수 완료 시--}}
            <div class="Message NG">
                접수가 완료되었습니다.<br>
                * 학원으로 방문해주시기 바랍니다.
            </div>
            <div class="MessageBtns">
                <a href="#none" class="btn_gray f_none">확인</a>
            </div>
        </div>
        <div class="dim" onclick="closeWin('LecBuyMessagePop')"></div>
    </div><!-- 방문결제  -->
</div>
<!-- End Container -->
@stop