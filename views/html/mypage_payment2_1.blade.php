@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-List menu-List-Center">
                <li>
                    <a href="{{ site_url('/home/html/mypage_pass_index') }}">내강의실 HOME</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_pass1') }}">무한PASS존</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_online1') }}">온라인강좌</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">온라인강좌</li>
                            <li><a href="{{ site_url('/home/html/mypage_online1') }}">수강대기강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online2') }}">수강중강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online3') }}">일시정지강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online4') }}">수강종료강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_acad1') }}">학원강좌</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학원강좌</li>
                            <li><a href="{{ site_url('/home/html/mypage_acad1') }}">수강신청강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_acad2') }}">수강종료강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_event') }}">특강&이벤트 신청현황</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_test1') }}">모의고사관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">모의고사관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_test1') }}">접수현황</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_test2') }}">온라인모의고사 응시</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_test3') }}">성적결과</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_payment1') }}">결제관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">결제관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_payment1') }}">주문/배송조회</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_payment3') }}">포인트관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_payment4') }}">쿠폰/수강권관리</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_support1') }}">학습지원관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학습지원관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_support1') }}">쪽지관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_support2') }}">알림관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_support3') }}">상담내역</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">회원정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">회원정보</li>
                            <li><a href="{{ site_url('/home/html/mypage_userinfo1') }}">개인정보관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_userinfo2') }}">비밀번호변경</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>내강의실</strong>
            <span class="depth-Arrow">></span><strong>결제관리</strong>
            <span class="depth-Arrow">></span><strong>주문/배송조회</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Delivery-Info c_both">
            <div class="willbes-Lec-Tit NG tx-black pt-zero">결제정보</div>
            <table cellspacing="0" cellpadding="0" class="finTable under-gray tx-gray tx-center">
                <colgroup>
                    <col style="width: 140px;"/>
                    <col style="width: 330px;"/>
                    <col style="width: 140px;"/>
                    <col style="width: 330px;"/>
                </colgroup>
                <tbody>
                    <tr>
                        <td class="bg-light-white">결제번호</td>
                        <td><strong>1246258742</strong></td>
                        <td class="bg-light-white">결제일</td>
                        <td><strong>2018-04-20 12:22:11</strong></td>
                    </tr>
                    <tr>
                        <td class="bg-light-white">결제금액</td>
                        <td><strong class="tx-light-blue">188,600원</strong></td>
                        <td class="bg-light-white">결제수단</td>
                        <td><strong class="tx-light-blue">신용카드(현대)</strong></td>
                    </tr>
                    <tr>
                        <td class="bg-light-white">결제상태</td>
                        <td>결제완료</td>
                        <td class="bg-light-white">영수증출력</td>
                        <td><span class="btnAll NSK"><a href="#none">확인</a></span></td>
                    </tr>
                    <!-- 결제수단 무통장일때만 보임 -->
                    <tr>
                        <td class="bg-light-white">무통장 입금정보</td>
                        <td class="" colspan="3">
                            가상계좌신청일 : 2018-07-21 09:33
                            <span class="row-line">|</span>
                            가상계좌정보 : [우리은행] 12345678912345
                            <span class="row-line">|</span>
                            입금자명 : 홍길동
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- willbes-Delivery-Info -->

        <div class="willbes-Buylist-Price Fin mt30 p_re">
            <ul class="cart-PriceBox NG">
                <li class="price-list p_re">
                    <dl class="priceBox">
                        <dt>
                            <div>상품주문금액</div>
                            <div class="price tx-light-blue">140,000원</div>
                        </dt>
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="{{ img_url('sub/icon_minus_black.gif') }}">
                        </dt>
                        <dt>
                            <div>쿠폰할인금액</div>
                            <div class="price tx-light-pink">180,000원</div>
                        </dt>
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="{{ img_url('sub/icon_minus_black.gif') }}">
                        </dt>
                        <dt>
                            <div>포인트 차감금액</div>
                            <span class="price tx-light-pink">13,000원</span>
                        </dt>
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="{{ img_url('sub/icon_plus.gif') }}">
                        </dt>
                        <dt>
                            <div>배송료</div>
                            <span class="price tx-light-blue">2,500원</span>
                        </dt>
                    </dl>
                </li>
                <li class="price-total">
                    <div>최종결제금액</div>
                    <span class="price tx-light-blue">188,600원</span>
                </li>
            </ul>
        </div>
        <!-- willbes-Buylist-Price -->

        <div class="willbes-Cartlist-Fin c_both">
            <div class="willbes-Lec-Tit NG tx-black">상품정보</div>
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray tx-gray">
                    <colgroup>
                        <col>
                        <col style="width: 80px;">
                        <col style="width: 100px;">
                        <col style="width: 120px;">
                        <col style="width: 100px;">
                        <col style="width: 100px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>상품정보<span class="row-line">|</span></li></th>
                            <th>수강기간<span class="row-line">|</span></li></th>
                            <th>정가(할인율)<span class="row-line">|</span></li></th>
                            <th>실 결제금액<span class="row-line">|</span></li></th>
                            <th>사용쿠폰<span class="row-line">|</span></th>
                            <th>주문/배송상태</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-list tx-left p_re pl20">
                                <span class="pBox p1 mb3">강좌</span><br>2018 정채영 국어 [현대]문학 종결자 문학집중강의(5-6월)
                            </td>
                            <td class="w-day">40일</td>
                            <td>75,000원<br><span class="tx-light-blue">(↓77%)</span></td>
                            <td class="w-price tx-light-blue">75,000원</td>
                            <td class="w-coupon">20% 할인권</td>
                            <td>결제완료</td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left p_re pl20">
                                <span class="pBox p1 mb3">강좌</span><br>2018 김용철행정법총론실전동형모의고사(3월)
                            </td>
                            <td class="w-day">40일</td>
                            <td>75,000원<br><span class="tx-light-blue">(↓77%)</span></td>
                            <td class="w-price tx-light-blue">80,000원</td>
                            <td class="w-coupon">20% 할인권</td>
                            <td>결제완료</td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left p_re pl20">
                                <span class="pBox p2 mb3">패키지</span><br>2017 9급공무원이론선택형종합패키지-30일완성
                            </td>
                            <td class="w-day">140일</td>
                            <td>75,000원<br><span class="tx-light-blue">(↓77%)</span></td>
                            <td class="w-price tx-light-blue">2,180,000원</td>
                            <td class="w-coupon">20% 할인권</td>
                            <td>결제완료</td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left p_re pl20">
                                <span class="pBox p3 mb3">교재</span><br>2017 정채영국어서울시문제를알려주마!1
                            </td>
                            <td class="w-day">&nbsp;</td>
                            <td>75,000원<br><span class="tx-light-blue">(↓77%)</span></td>
                            <td class="w-price tx-light-blue">7,000원</td>
                            <td class="w-coupon">20% 할인권</td>
                            <td>결제완료</td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left p_re pl20">
                                <span class="pBox p3 mb3">교재</span><br>2017정채영국어서울시문제를알려주마!2
                            </td>
                            <td class="w-day">&nbsp;</td>
                            <td>75,000원<br><span class="tx-light-blue">(↓77%)</span></td>
                            <td class="w-price tx-light-blue">5,000원</td>
                            <td class="w-coupon">20% 할인권</td>
                            <td>결제완료</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Cartlist-Fin -->

        <div class="willbes-Delivery-Info-Fin p_re c_both">
            <div class="willbes-Lec-Tit NG tx-black">배송정보</div>
            <div class="deliveryInfoTable pb60 GM">
                <table cellspacing="0" cellpadding="0" class="classTable deliveryTable upper-gray tx-gray">
                    <colgroup>
                        <col style="width: 140px;">
                        <col style="width: 140px;">
                        <col width="*">
                    </colgroup>
                    <tbody>
                        <tr class="u-from">
                            <th class="w-list" rowspan="3">구매자<br/>정보</th>
                            <td class="w-tit bg-light-white tx-left pl20">이름</td>
                            <td class="w-info tx-left pl20">홍길동</td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">휴대폰번호</td>
                            <td class="w-info tx-left pl20">010-1234-5678</td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">이메일</td>
                            <td class="w-info tx-left pl20">willbes@willbes.com</td>
                        </tr>

                        <tr class="u-to">
                            <th class="w-list" rowspan="5">받는사람<br/>정보</th>
                            <td class="w-tit bg-light-white tx-left pl20">이름<span class="tx-light-blue">(*)</span></td>
                            <td class="w-info tx-left pl20">홍길동</td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">주소<span class="tx-light-blue">(*)</span></td>
                            <td class="w-info tx-left pl20">
                                [258445]<br/>
                                서울시 동작구 만양로 105 한성빌딩<br/>
                                2층 (동작구 노량진동) ㈜윌비스
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">휴대폰번호<span class="tx-light-blue">(*)</span></td>
                            <td class="w-info tx-left pl20">010-1234-5678</td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">전화번호</td>
                            <td class="w-info tx-left pl20">02-1234-5678</td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">배송시 요청사항</td>
                            <td class="w-info tx-left pl20">부재 시 경비실에 맡겨주세요.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="willbes-Lec-buyBtn">
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick='window.location.href="{{ site_url('/home/html/mypage_pass_index') }}"' class="mem-Btn bg-white bd-dark-gray">
                            <span class="tx-purple-gray">내강의실 바로가기</span>
                        </button>
                    </li>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick='window.location.href="{{ site_url('/home/html/mypage_payment1') }}"' class="mem-Btn bg-purple-gray bd-dark-gray">
                            <span>주문/배송 조회목록</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- willbes-Delivery-Info-Fin -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop