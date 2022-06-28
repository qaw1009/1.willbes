@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
        .evtCtnsBox {width:100%; text-align:center; position:relative; font-size:1.4vh; line-height:1.5; clear:both}
        .evtCtnsBox img {width:100%; max-width:720px;}        
        .wrap {position:relative;}
        /*.wrap a {border:1px solid #000}*/

    /************************************************************/

    .evt_02 {width: calc(100% - 10%); margin:0 5% 5%;}
    .evt_02 .link {} 
    .evt_02 .link a {background-color:#000; color:#fff; margin:3% 0; border-radius:10px; padding:5vh 0; display:block; font-size:2.2vh; line-height:1.2}
    .evt_02 .link:last-child a {background-color:#fd6c38;}
    .evt_02 .link a p {font-size:4vh}
    .evt_02 .link a div {font-size:1.4vh; margin-top:10px}

    .evt_03 {width: calc(100% - 10%); text-align:left;  margin:0 5% 5%; }
    .evt_03 li { margin-bottom:10px; font-size:1.8vh; list-style:disc; margin-left:20px}
    .evt_03 li span {color:#fd6c38}


    .evtInfo {width: calc(100% - 10%); background:#555; color:#fff; border-radius:10px; padding:5%; margin:5%}
    .evtInfoBox {margin:0 auto; text-align:left; line-height:1.4;}
    .evtInfoBox .infoTit {font-size:3vh; margin-bottom:10px;}
    .evtInfoBox ul {margin-bottom:20px}
    .evtInfoBox li {margin-bottom:5px; list-style-type: disc; margin-left:20px; font-size:1.6vh; }
    .evtInfoBox strong {color:#ffe78e}
    .evtInfoBox span {color:#ffc000}

    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {

    }

    
    </style>

    <div id="Container" class="Container NSK c_both">
        <div class="evtCtnsBox" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2704m_00.jpg" alt="경찰학원부분 1위" >        
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2704m_top.jpg" alt="">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2704m_01.jpg" alt="">
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <div class="link">
                <a href="https://www.andar.co.kr/product/list.html?cate_no=2084" target="_blank">
                    <p class="NSK-Black">andar.com</p> 
                    바로가기(회원가입)
                </a>
            </div>
            <div class="link">    
                <a href="https://www.andar.co.kr/myshop/coupon/coupon.html" target="_blank">
                    <p class="NSK-Black">Extra 30% OFF</p> 
                    쿠폰등록
                    <div>
                    ·  안다르 공식 온라인몰에서만 사용 가능합니다.<br>
                    ·  쿠폰은 구매 후 2일 내 장바구니로 넣어드립니다.
                    </div>
                </a>
            </div>
        </div>  
        
        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <ul>
                <li>이벤트 기간 : 2022년 7월 4일(월) ~ 7월 30일(일) </li>
                <li>이벤트 내용 : 경찰온라인 강의상품 구매후 안다르 제품 구매 시 추가 30% 할인</li>
                <li>참여 대상 : 윌비스 경찰 온라인 강의 구매자 대상<br>
                    <span>( ※ 단, 이벤트 상품인 '2023년 대비 신광은 경찰팀 기본이론 종합반' 5만원 상품은 제외)</span>
                <li>아이디(ID)당 쿠폰은 1회만 발급됩니다.</li>
            </ul>
        </div>       


        <div class="evtCtnsBox evtInfo" id="info" data-aos="fade-up">
            <div class="evtInfoBox">
				<div class="infoTit NSK-Black">이벤트 참여방법</div>
				<ul>               
                    <li><strong>STEP1</strong> 윌비스 경찰 온라인 강의 상품 구매</li>
                    <li><strong>STEP2</strong> 2일 이내 내강의실 > 쿠폰 현황 확인</li>
                    <li><strong>STEP3</strong> <span>안다르(www.andar.co.kr)</span> 회원가입 후 30% 할인 쿠폰등록</li>
                </ul>
                <div class="infoTit NSK-Black">쿠폰 이용안내</div>
				<ul>
                    <li>30% 추가 할인 쿠폰 1매당 구매할 수 있는 최대 품목은 30개 입니다.<br>
                    (안다르 상품 장바구니 적용시)</li>
                    <li>아울렛 특가상품 및 1+1세트상품 등 일부 상품은 추가 30% 할인 쿠폰의
                    사용이 불가합니다.</li>
                    <li>30% 추가 할인 쿠폰은 1인 1매, 1회에 한하여 사용 가능합니다.<br>
                    (쿠폰 등록 후 30일 이후 소멸 됩니다 )</li>
				</ul>
			</div>
		</div> 
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
            AOS.init();
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop