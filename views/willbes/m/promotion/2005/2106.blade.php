@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; position:relative; font-size:14px; line-height:1.3; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;} 

    /************************************************************/
    .dday {font-size:24px !important; padding:10px; background:#f5f5f5; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#cf1425; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#000; font-size:14px !important;}

    /* 이용안내 */
    .evtInfo {padding:40px 20px; background:#666; color:#fff; font-size:14px; margin-top:100px}
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:26px; margin-bottom:30px}
    .evtInfoBox .infoTit {font-size:16px; margin-bottom:15px}
    .evtInfoBox .infoTit strong {padding:5px 15px; background:#000; border-radius:20px; font-weight:normal !important}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}
    .evtInfoBox li span {color:#c4ebfd}
    .evtInfoBox span {vertical-align:bottom}  

    
    @@media only screen and (max-width: 374px)  {
        .dday {font-size:18px !important;}
        .dday a {padding:5px 10px;}  
        .event04 .tabs a {font-size:12px; padding:10px 0}
    }

    </style>

    <div id="Container" class="Container NSK c_both">
        <div class="evtCtnsBox dday NSK-Thin">
            <strong class="NSK-Black">이벤트 마감 <span id="ddayCountText"></span> </strong>
            <a href="#lecbuy">수강신청 ></a>
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2106m_top.jpg" alt="5급/국립외교원 T-PASS">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2106m_01.jpg" alt="단계별 학습 프로그램">
        </div>

		<div class="evtCtnsBox">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
            @endif
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">윌비스 한림법학원 동영상 T-PASS반 상품이용안내</h4>
                <div class="infoTit"><strong>이용안내</strong></div>
                <ul>
                    <li>본 상품은 2023년 3월 ~ 2024년 6월까지 진행이 되는 신규 예비순환 ~ GS3순환 동영상 과정입니다.</li>
                    <li>이벤트 내용 <br>
                    [PASS 상품 및 해당과정 수강기간]<br>
                    - 예비순환 + GS1순환 필수과목 PASS반<br> : 수강기간 210일<br>
                    - 예비순환 + GS1순환 + GS2순환 필수과목 PASS반 : 수강기간 365일<br>
                    - 예비순환 + GS1순환 + GS3순환 필수과목 PASS반 : 수강기간 450일<br>
                    <br>
                    [할인율 및 신청방법 : 등록된 PASS 상품 중에서 자유선택]<br>
                    - 2개 PASS 과정 신청 : 10%할인 + 동영상강의 15%할인쿠폰<br>
                    - 3개 PASS 과정 신청 : 20%할인 + 동영상강의 15%할인쿠폰<br>
                    - 4개 PASS 과정 신청 : 40%할인 + 동영상강의 15%할인쿠폰<br>
                    <br>
                    <span>[수강기간-과정별 수강기간 자동 적용] : 강의신청시 다음날부터 바로 수강시작이 되며 일시정지, 강의연장이 적용되지 않습니다.</span></li>
                    <li>강의배수 제한 : 동영상강의는 1.5배수제한 규정이 적용됩니다.</li>
                    <li>강의진행 월 또는 회차는 학원 사정 등에 따라 변동될 수 있습니다.</li>
                    <li>동영상 PASS반은 3월 31일까지 신청하실 수 있으며, 사정에 의해서 신청기간이 변경될 수 있습니다.</li>
                    <li>동영상강의 할인쿠폰(1아이디당 2개발행) : 15%할인쿠폰은 4월 3일(월) 일괄발행됩니다.(5급, 외교원, PSAT, 5급헌법 동영상강의에 적용, 유효기간 : 2023년 12월 31일까지)</li>
                </ul>
                <div class="infoTit"><strong>교재</strong></div>
                <ul>
                    <li>각 강의수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 해당 강의 개강일에 등록이 될 예정입니다.</li>
                </ul>
                <div class="infoTit"><strong>환불</strong></div>
                <ul>
                    <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.(일부강의만의 환불은 불가합니다.)</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, PASS반 정가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.</li>
                    <li>기타 약관에 규정에 따릅니다.</li>
                </ul>
                <div class="infoTit"><strong>PASS 수강</strong></div>
                <ul>
                    <li>로그인 후 <span>[내강의실] 에서 [무한PASS존]으로 접속</span>합니다.</li>
                    <li>구매한 PASS 상품 선택 후 <span>[강좌추가]</span> 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>PASS반은 <span>일시 정지, 수강 연장, 재수강 불가</span>합니다.</li>
                    <li>PASS반 수강 시 이용 가능한 <span>기기 대수는 다음과 같이 제한</span>됩니다.<br>
                        [ <span>총 수강 기기 대수 2대</span> : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 ] </li>
                    <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 내용확인 후 진행이 가능하오니 고객센터로 문의 부탁드립니다.(수강기간동안 3회 신청가능) </li>
                    <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용될 수 있습니다.</li>
                </ul>
                <div class="infoTit"><strong>유의사항</strong></div>
                <ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                    <li>PASS반 과정 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공이 될 예정입니다.</li>
                    <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS반은 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                </ul>
                <div class="infoTit">※ 이용 문의 : 윌비스 고객만족센터 1566-4770</div>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
            dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop