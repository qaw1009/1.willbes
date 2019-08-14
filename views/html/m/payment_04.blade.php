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
                주문/배송조회
            </div>
        </div>
    </div>
   

    <div class="paymentWrap">      
        <div class="paymentCtsEnd pt20">
            <h4>결제정보</h4>
            <table>
                <col width="90px"/>
                <col width=""/>
                <tr>
                    <th scope="row">주문번호</th>
                    <td>20190531111934400000</td>
                </tr>
                <tr>
                    <th scope="row">결제일</th>
                    <td>2019-05-31 11:19:34</td>
                </tr>
                <tr>
                    <th scope="row">결제금액</th>
                    <td>150,000원</td>
                </tr>
                <tr>
                    <th scope="row">결제수단</th>
                    <td>신용카드</td>
                </tr>
            </table>

            <div class="priceBox">
                <ul>
                    <li><strong>상품주문금액</strong> <span class="tx-blue">150,000원</span></li>
                    <li><strong>쿠폰할인금액</strong> <span class="tx-red">0원</span></li>
                    <li><strong>포인트 차감금액</strong> <span class="tx-red">0원</span></li>
                    <li><strong>배송료</strong> <span class="tx-blue">0원</span></li>
                    <li class="NGEB">
                        <strong>결제금액</strong> <span class="tx-blue">312,000원</span>
                    </li>
                </ul>                
            </div>

            <h4>상품정보</h4>
            <ul class="payLecList">
                <li><span>강좌</span></li>
                <li>2019 신광은 형사소송법 기본이론 (19년 6월)</li>
                <li><strong>수강기간</strong> 80일</li>
                <li><strong>정가(할인율)</strong> <span>90,000원(↓0%)</span></li>
                <li><strong>실 결제금액</strong> <span class="tx-blue">90,000원</span></li>
                <li><strong>사용쿠폰</strong> <span>-</span></li> 
                <li><strong>주문/배송상태</strong> <span>결제완료</span></li>         
            </ul>             

            <h4 class="mt20">배송정보</h4>
            <table>
                <col width="90px"/>
                <col width=""/>
                <tr>
                    <th scope="row">받는분</th>
                    <td>홍길동</td>
                </tr>
                <tr>
                    <th scope="row">주소</th>
                    <td>[07209] 서울 관악구 신림동 111-22</td>
                </tr>
                <tr>
                    <th scope="row">휴대폰번호</th>
                    <td>01012341234</td>
                </tr>
                <tr>
                    <th scope="row">전화번호</th>
                    <td>02-4532-5555</td>
                </tr>
                <tr>
                    <th scope="row">배송시요청사항</th>
                    <td>경비실에 맡겨주세요.</td>
                </tr>
            </table>
        </div>

        <div class="lec-btns w50p">
            <ul>
                <li><a href="#none" class="btn-purple-line">내강의실 바로가기</a></li>
                <li><a href="#none" class="btn-purple">주문/배송 조회목록</a></li>
            </ul>
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