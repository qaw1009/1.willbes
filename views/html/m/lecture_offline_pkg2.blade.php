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
                학원수강신청 > 종합반
            </div>
        </div>
    </div>

    <div>
        <div class="passProfTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                    <tr>
                        <td>
                            <div class="w-data tx-left widthAutoFull">
                                <dl class="w-info pt-zero">
                                    <dt>신림(본원)<span class="row-line">|</span>GS3순환
                                </dl>
                                <div class="w-tit tx-blue">
                                    20_PSAT종합반_3월반
                                </div>
                                <div class="w-info tx-gray">
                                    <dl>
                                        <dt class="h27"><strong>수강형태</strong>실강 <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt><br/>
                                        <dt class="h27"><strong>접수기간</strong><span class="tx-blue">2020.05.13 ~ 2020.07.30</span> </dt>
                                    </dl>
                                </div>
                            </div>                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="priceBox">
            <ul>
                <li><strong>종합반</strong> 350,000원<span class="tx-red">(↓0%)</span> ▶ <span class="tx-blue">350,000원</span></li>
                <li class="NGEB"><strong>총 주문금액</strong> <span class="tx-blue">350,000원</span></li>
            </ul>
        </div>

        <div class="lec-info">
            <h4 class="NGEB">강좌구성</h4>
            <h5>· 필수과목</h5>
            <div class="lec-choice-pkg">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <colgroup>
                        <col style="width: 87%;">
                        <col style="width: 13%;">
                    </colgroup>
                    <tbody>
                        <tr class="replyList willbes-Open-Table">
                            <td>
                                한국사
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>
                        <tr class="willbes-Open-List">
                            <td class="w-data tx-left" colspan="2">
                                <div class="w-data-pkg">
                                    <div class="w-info">
                                        <span class="chk">
                                            <label>[판매]</label>
                                            <input type="checkbox" id="" name="">
                                        </span>
                                        <span class="ml10 tx14">조민주 </span>
                                    </div>
                                    <div class="w-tit">
                                        [20.05] 조민주 한국사 지방직 대비 최종모고
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt><strong>수강형태</strong><span class="tx-blue">실강</span> <span class="NSK nBox n2 ml10">접수중</span></dt>
                                        <dt><span class="tx-blue">2020.05.19 ~ 2020.06.02 화 (3회차)</span></dt>
                                        <dt><strong>수강가능기간</strong>2020.01.01~2020.01.31</dt>
                                        <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a></dt>
                                    </dl>
                                </div>
                                <div class="w-data-pkg">
                                    <div class="w-info">
                                        <span class="chk">
                                            <label>[판매]</label>
                                            <input type="checkbox" id="" name="">
                                        </span>
                                        <span class="ml10 tx14">조민주 </span>
                                    </div>
                                    <div class="w-tit">
                                        [20.05] 조민주 한국사 지방직 대비 최종모고
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt><strong>수강형태</strong><span class="tx-blue">실강</span> <span class="NSK nBox n2 ml10">접수중</span></dt>
                                        <dt><span class="tx-blue">2020.05.19 ~ 2020.06.02 화 (3회차)</span></dt>
                                        <dt><strong>수강가능기간</strong>2020.01.01~2020.01.31</dt>
                                        <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a></dt>
                                    </dl>
                                </div>
                            </td>
                        </tr>

                        <tr class="replyList willbes-Open-Table">
                            <td>
                                기초영어
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>
                        <tr class="willbes-Open-List">
                            <td class="w-data tx-left" colspan="2">
                                <div class="w-data-pkg">
                                    <div class="w-info">
                                        <span class="chk">
                                            <label>[판매]</label>
                                            <input type="checkbox" id="" name="">
                                        </span>
                                        <span class="ml10 tx14">조민주 </span>
                                    </div>
                                    <div class="w-tit">
                                        [20.05] 조민주 한국사 지방직 대비 최종모고
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt><strong>수강형태</strong><span class="tx-blue">실강</span> <span class="NSK nBox n2 ml10">접수중</span></dt>
                                        <dt><span class="tx-blue">2020.05.19 ~ 2020.06.02 화 (3회차)</span></dt>
                                        <dt><strong>수강가능기간</strong>2020.01.01~2020.01.31</dt>
                                        <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a></dt>
                                    </dl>
                                </div>
                                <div class="w-data-pkg">
                                    <div class="w-info">
                                        <span class="chk">
                                            <label>[판매]</label>
                                            <input type="checkbox" id="" name="">
                                        </span>
                                        <span class="ml10 tx14">조민주 </span>
                                    </div>
                                    <div class="w-tit">
                                        [20.05] 조민주 한국사 지방직 대비 최종모고
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt><strong>수강형태</strong><span class="tx-blue">실강</span> <span class="NSK nBox n2 ml10">접수중</span></dt>
                                        <dt><span class="tx-blue">2020.05.19 ~ 2020.06.02 화 (3회차)</span></dt>
                                        <dt><strong>수강가능기간</strong>2020.01.01~2020.01.31</dt>
                                        <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a></dt>
                                    </dl>
                                </div>
                            </td>
                        </tr>

                        <tr class="replyList willbes-Open-Table">
                            <td>
                                영어
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>
                        <tr class="willbes-Open-List">
                            <td class="w-data tx-left" colspan="2">
                                <div class="w-data-pkg">
                                    <div class="w-info">
                                        <span class="chk">
                                            <label>[판매]</label>
                                            <input type="checkbox" id="" name="">
                                        </span>
                                        <span class="ml10 tx14">조민주 </span>
                                    </div>
                                    <div class="w-tit">
                                        [20.05] 조민주 한국사 지방직 대비 최종모고
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt><strong>수강형태</strong><span class="tx-blue">실강</span> <span class="NSK nBox n2 ml10">접수중</span></dt>
                                        <dt><span class="tx-blue">2020.05.19 ~ 2020.06.02 화 (3회차)</span></dt>
                                        <dt><strong>수강가능기간</strong>2020.01.01~2020.01.31</dt>
                                        <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a></dt>
                                    </dl>
                                </div>
                                <div class="w-data-pkg">
                                    <div class="w-info">
                                        <span class="chk">
                                            <label>[판매]</label>
                                            <input type="checkbox" id="" name="">
                                        </span>
                                        <span class="ml10 tx14">조민주 </span>
                                    </div>
                                    <div class="w-tit">
                                        [20.05] 조민주 한국사 지방직 대비 최종모고
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt><strong>수강형태</strong><span class="tx-blue">실강</span> <span class="NSK nBox n2 ml10">접수중</span></dt>
                                        <dt><span class="tx-blue">2020.05.19 ~ 2020.06.02 화 (3회차)</span></dt>
                                        <dt><strong>수강가능기간</strong>2020.01.01~2020.01.31</dt>
                                        <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a></dt>
                                    </dl>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h5>· 선택과목(선택과목 중 2개 선택) </h5>
            <div class="lec-choice-pkg">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <colgroup>
                        <col style="width: 87%;">
                        <col style="width: 13%;">
                    </colgroup>
                    <tbody>
                        <tr class="replyList willbes-Open-Table">
                            <td>
                                형사소송법
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>
                        <tr class="willbes-Open-List">
                            <td class="w-data tx-left" colspan="2">
                                <div class="w-data-pkg">
                                    <div class="w-info">
                                        <span class="chk">
                                            <label>[판매]</label>
                                            <input type="checkbox" id="" name="">
                                        </span>
                                        <span class="ml10 tx14">조민주 </span>
                                    </div>
                                    <div class="w-tit">
                                        [20.05] 조민주 한국사 지방직 대비 최종모고
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt><strong>수강형태</strong><span class="tx-blue">실강</span> <span class="NSK nBox n2 ml10">접수중</span></dt>
                                        <dt><span class="tx-blue">2020.05.19 ~ 2020.06.02 화 (3회차)</span></dt>
                                        <dt><strong>수강가능기간</strong>2020.01.01~2020.01.31</dt>
                                        <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a></dt>
                                    </dl>
                                </div>
                                <div class="w-data-pkg">
                                    <div class="w-info">
                                        <span class="chk">
                                            <label>[판매]</label>
                                            <input type="checkbox" id="" name="">
                                        </span>
                                        <span class="ml10 tx14">조민주 </span>
                                    </div>
                                    <div class="w-tit">
                                        [20.05] 조민주 한국사 지방직 대비 최종모고
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt><strong>수강형태</strong><span class="tx-blue">실강</span> <span class="NSK nBox n2 ml10">접수중</span></dt>
                                        <dt><span class="tx-blue">2020.05.19 ~ 2020.06.02 화 (3회차)</span></dt>
                                        <dt><strong>수강가능기간</strong>2020.01.01~2020.01.31</dt>
                                        <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a></dt>
                                    </dl>
                                </div>
                            </td>
                        </tr>

                        <tr class="replyList willbes-Open-Table">
                            <td>
                                영어
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>
                        <tr class="willbes-Open-List">
                            <td class="w-data tx-left" colspan="2">
                                <div class="w-data-pkg">
                                    <div class="w-info">
                                        <span class="chk">
                                            <label>[판매]</label>
                                            <input type="checkbox" id="" name="">
                                        </span>
                                        <span class="ml10 tx14">조민주 </span>
                                    </div>
                                    <div class="w-tit">
                                        [20.05] 조민주 한국사 지방직 대비 최종모고
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt><strong>수강형태</strong><span class="tx-blue">실강</span> <span class="NSK nBox n2 ml10">접수중</span></dt>
                                        <dt><span class="tx-blue">2020.05.19 ~ 2020.06.02 화 (3회차)</span></dt>
                                        <dt><strong>수강가능기간</strong>2020.01.01~2020.01.31</dt>
                                        <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a></dt>
                                    </dl>
                                </div>
                                <div class="w-data-pkg">
                                    <div class="w-info">
                                        <span class="chk">
                                            <label>[판매]</label>
                                            <input type="checkbox" id="" name="">
                                        </span>
                                        <span class="ml10 tx14">조민주 </span>
                                    </div>
                                    <div class="w-tit">
                                        [20.05] 조민주 한국사 지방직 대비 최종모고
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt><strong>수강형태</strong><span class="tx-blue">실강</span> <span class="NSK nBox n2 ml10">접수중</span></dt>
                                        <dt><span class="tx-blue">2020.05.19 ~ 2020.06.02 화 (3회차)</span></dt>
                                        <dt><strong>수강가능기간</strong>2020.01.01~2020.01.31</dt>
                                        <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a></dt>
                                    </dl>
                                </div>
                            </td>
                        </tr>

                        <tr class="replyList willbes-Open-Table">
                            <td>
                                한국사
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>
                        <tr class="willbes-Open-List">
                            <td class="w-data tx-left" colspan="2">
                                <div class="w-data-pkg">
                                    <div class="w-info">
                                        <span class="chk">
                                            <label>[판매]</label>
                                            <input type="checkbox" id="" name="">
                                        </span>
                                        <span class="ml10 tx14">조민주 </span>
                                    </div>
                                    <div class="w-tit">
                                        [20.05] 조민주 한국사 지방직 대비 최종모고
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt><strong>수강형태</strong><span class="tx-blue">실강</span> <span class="NSK nBox n2 ml10">접수중</span></dt>
                                        <dt><span class="tx-blue">2020.05.19 ~ 2020.06.02 화 (3회차)</span></dt>
                                        <dt><strong>수강가능기간</strong>2020.01.01~2020.01.31</dt>
                                        <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a></dt>
                                    </dl>
                                </div>
                                <div class="w-data-pkg">
                                    <div class="w-info">
                                        <span class="chk">
                                            <label>[판매]</label>
                                            <input type="checkbox" id="" name="">
                                        </span>
                                        <span class="ml10 tx14">조민주 </span>
                                    </div>
                                    <div class="w-tit">
                                        [20.05] 조민주 한국사 지방직 대비 최종모고
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt><strong>수강형태</strong><span class="tx-blue">실강</span> <span class="NSK nBox n2 ml10">접수중</span></dt>
                                        <dt><span class="tx-blue">2020.05.19 ~ 2020.06.02 화 (3회차)</span></dt>
                                        <dt><strong>수강가능기간</strong>2020.01.01~2020.01.31</dt>
                                        <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a></dt>
                                    </dl>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>        

        <div class="lec-info NGR">
            <h4 class="NGEB">종합반 상세정보</h4>
            <div class="lec-info-pkg">                    
                <strong>종합반 상세정보</strong><br>
                [20.05 9급 일행] 지방직 대비 최종 모의고사반(국어,영어,한국사) - 3과목 <br>
                <br>
                개강일 : 2020년 5월 18일 (월)<br>
                <br>
                강의일정 : 실전 동형 최종모의고사(3주)
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
            <div class="Message NG">
                해당 상품이 장바구니에 담겼습니다.<br>
                장바구니로 이동하시겠습니까?
            </div>
            <div class="MessageBtns">
                <a href="#none" class="btn_gray">예</a>
                <a href="#none" class="btn_white">계속구매</a>
            </div>
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
    </div>

    <div id="InfoForm" class="willbes-Layer-Black NG">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h510 fix">
            <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <h4>[20.05] 조민주 한국사 지방직 대비 최종모고</h4>
            <div class="LecDetailBox">
                <h5>강좌상세정보</h5>
                <dl class="w-info tx-gray">
                    <dt>수강기간 <br>
                    <span class="tx-blue">2020.07.06 ~ 2020.07.24 </span> <span class="tx-blue">월화수목금</span> (15회차)</dt>
                </dl>
                <h5>수강대상</h5>
                <div class="tx-dark-gray">
                    1. 형소법을 처음 접하는 수험생<br>
                    2. 형소법의 전반적인 흐름을 이해하고 싶은 수험생<br>
                    3. 형소법을 단기간에 효율적으로 공부하는 방법을 알고 싶은 수험생<br>
                </div>
                <h5>강좌소개</h5>
                <div class="tx-dark-gray">
                    1. 매일매일 O·X 강의자료와 함께 복습을 할 수 있는 강좌입니다.<br>
                    2. 교수님의 형사실무경험을 바탕으로, 실제 사건과 관련한 설명과 함께 형사소송절차를 생동감 있게 이해할 수 있는 강좌입니다.<br>
                    3. 형소법의 전반적인 흐름을 파악하고 쉽게 접근할 수 있는 강좌입니다.<br>
                    4. 강의일정 : 7/6(월)~7/24(금),  총 15회 강의<br>
                    5. 강의시간 : 매주 월~금 [09:00~13:00]<br>
                    6. 교재 : 신광은 형사소송법(신정 9판)                    
                </div>
                <h5>강좌효과</h5>
                <div class="tx-dark-gray">
                    1. 어려운 법률용어를 쉽게 이해시켜주는 효과가 있습니다.<br>
                    2. 매일매일 O·X 강의자료를 통해 복습의 효과를 극대화 하는 효과가 있습니다.<br>
                    3. 어머! 이건 꼭 들어야 하는 강좌의 효과가 있습니다.
                </div>
            </div>
        </div>
        <div class="dim" onclick="closeWin('InfoForm')"></div>
    </div>


</div>
<!-- End Container -->
@stop