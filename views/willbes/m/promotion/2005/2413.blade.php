@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;} 

    /************************************************************/
    .evtInfo {padding:60px 20px; background:#333; color:#fff; font-size:14px; margin-top:50px}
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:30px; margin-bottom:40px}
    .evtInfoBox h4 strong {color:#94f2fa}
    .evtInfoBox .infoTit {font-size:18px; margin-bottom:20px}
    .evtInfoBox .infoTit strong {padding:8px 20px; background:#000; border-radius:20px; font-weight:normal !important}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}
    .evtInfoBox span {vertical-align:bottom}
    </style>

    <div id="Container" class="Container NSK c_both">
        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2413m_top.jpg" alt="psat 합격을 예측하다">
        </div>
        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2413m_01.jpg" alt="이벤트">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
            @endif 
        </div>       


        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">윌비스 한림법학원 <strong>5급행정/국립외교원대비 GS2순환 합격</strong> 이벤트 안내</h4>
                <div class="infoTit"><strong>이벤트 내용</strong></div>
                <ul>
                    <li>2021년 11월 11일부터 진행되는 GS2순환 강의 자유 선택<br>
                    - 2과목결제 : 10%할인<br>
                    - 3과목결제 : 15%할인<br>
                    - 4과목결제 : 25%할인</li> 
                    <li>이벤트 기간 : 11월 21일(일) 24:00까지</li>
                    <li>수강시작일은 30일 범위내에서 설정하실 수 있으며 2과목 이상 신청하시고 수강시작일 변경을 원하실 경우 동영상게시판에 글을 남겨주시면 수정하여 드리겠습니다.(신청일로부터 90일 범위내)</li>
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
                    <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 정가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.</li>
                    <li>기타 약관에 규정에 따릅니다.</li>
                </ul>
                <div class="infoTit"><strong>유의사항</strong></div>
                <ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                    <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 강의는 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                </ul>

            </div>
        </div> 
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
        $( document ).ready( function() {
            AOS.init();
        } );
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop