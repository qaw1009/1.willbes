@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">

            <div class="willbes-Mypage-PAYMENTZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 주문/배송조회
                </div>
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                        <tbody>
                        <tr>
                            <td>
                                <div class="Tit">주문/배송조회 안내</div>
                                - 주문/배송상태는 입금대기→결제완료→발송준비→발송완료 단계로 이루어집니다.<br/>
                                - 주문번호 혹은 주문내역을 클릭하시면 주문상세정보를 확인할 수 있습니다.<br/>
                                - 무통장입금(가상계좌)는 주문 번호별 다른 계좌번호가 발급되오니 주문 상세정보에서 계좌번호를 확인해 주시기 바랍니다.<br/>

                                <div class="Tit pt30">배송안내</div>
                                - 배송상품은 당일 오후 1시까지 결제한 상품에 한해 당일 발송처리되므로(토, 일, 공휴일 제외), '발송준비'로 변경된 배송상품의 주문취소/배송지 변경의 경우 고객센터를 통해서만 가능합니다.<br/>
                                - '발송완료'단계부터 배송조회가 가능하며, '배송조회'버튼 클릭시 배송상황을 확인할 수 있습니다.<br/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Mypage-PAYMENTZONE -->

            <div class="willbes-Leclist c_both mt40">
                <div class="willbes-Lec-Selected willbes-Mypage-Selected willbes-Mypage-Selected-Search tx-gray">
                <span class="w-data">
                    기간검색 &nbsp;
                    <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30"> ~&nbsp; 
                    <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30">
                </span>
                    <span class="w-month">
                    <ul>
                        <li><a href="#none">전체</a></li>
                        <li><a href="#none">15일</a></li>
                        <li><a class="on" href="#none">1개월</a></li>
                        <li><a href="#none">3개월</a></li>
                        <li><a href="#none">6개월</a></li>
                    </ul>
                </span>
                    <button type="submit" onclick="" class="search-Btn">
                        <span>검색</span>
                    </button>
                </div>
                <div class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                    <select id="process" name="process" title="process" class="seleProcess f_left">
                        <option selected="selected">과정</option>
                        <option value="헌법">헌법</option>
                        <option value="스파르타반">스파르타반</option>
                        <option value="공직선거법">공직선거법</option>
                    </select>
                    <select id="academy" name="academy" title="academy" class="seleAcad ml10 f_left">
                        <option selected="selected">구분</option>
                        <option value="온라인">온라인</option>
                        <option value="학원">학원</option>
                    </select>
                </div>
                <div class="LeclistTable orderTable">
                    <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                        <colgroup>
                            <col style="width: 80px;">
                            <col style="width: 110px;">
                            <col style="width: 110px;">
                            <col style="width: 250px;">
                            <col style="width: 130px;">
                            <col style="width: 130px;">
                            <col style="width: 130px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>과정<span class="row-line">|</span></li></th>
                            <th>주문일<span class="row-line">|</span></li></th>
                            <th>주문번호<span class="row-line">|</span></li></th>
                            <th>주문내역<span class="row-line">|</span></li></th>
                            <th>결제금액<span class="row-line">|</span></li></th>
                            <th>결제수단<span class="row-line">|</span></li></th>
                            <th>주문/배송상태</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="w-process">임용</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-number"><a href="{{ site_url('/home/html/mypage_payment2_1') }}">20180000</a></td>
                            <td class="w-list"><a href="{{ site_url('/home/html/mypage_payment2_1') }}">2018 정채영(결제완료 페이지로)</a></td>
                            <td class="w-price">92,000</td>
                            <td class="w-method">신용카드</td>
                            <td class="w-state tx-light-blue">결제완료</td>
                        </tr>
                        <tr>
                            <td class="w-process">공무원</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-number"><a href="{{ site_url('/home/html/mypage_payment2_2') }}">20180000</a></td>
                            <td class="w-list"><a href="{{ site_url('/home/html/mypage_payment2_2') }}">2018 정채영(입금대기 페이지로)</a></td>
                            <td class="w-price">92,000</td>
                            <td class="w-method">무통장입금</td>
                            <td class="w-state tx-light-blue">입금대기</td>
                        </tr>
                        <tr>
                            <td class="w-process">경찰</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-number">20180000</td>
                            <td class="w-list">2018 정채영국엉 문학종결자 외1</td>
                            <td class="w-price">92,000</td>
                            <td class="w-method">실시간 계좌이체</td>
                            <td class="w-state">
                                <strong>발송완료</strong><br/>
                                <div class="tBox NSK light-gray"><a href="">배송조회</a></div>
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
            </div>
            <!-- willbes-Leclist -->

        </div>
        <div class="Quick-Bnr ml20">
            <img src="{{ img_url('sample/banner_180605.jpg') }}">
        </div>
    </div>
    <!-- End Container -->
@stop