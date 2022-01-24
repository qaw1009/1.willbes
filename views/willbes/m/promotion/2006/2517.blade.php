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

    .evtInfo {padding:60px 20px; background:#424396; color:#fff;}
    .evtInfo {text-align:left; line-height:1.4}
    .evtInfo li {margin-bottom:8px; list-style:disc; margin-left:20px}
    .evtInfo strong {color:#ffff00}

    .event04 {margin-bottom:50px;}
    .event04 .NSK-Black {font-size:40px; text-align:center; padding:20px 0; color:#08083f }

    
    @@media only screen and (max-width: 374px)  {
        .dday {font-size:18px !important;}
        .dday a {padding:5px 10px;}
    }

    </style>

    <div id="Container" class="Container NSK c_both">
        <div class="evtCtnsBox dday NSK-Thin">
            <strong class="NSK-Black">이벤트 마감 <span id="ddayCountText"></span> </strong>
            <a href="#lecbuy">수강신청 ></a>
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2517m_01.jpg" alt="psat 합격을 예측하다">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2517m_02.jpg" alt="psat 합격을 예측하다">
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <ul>
                <li><strong>이벤트 페이지</strong>에서 등록된 강의를 이벤트 기간 동안 결제시 자동할인 적용됩니다.</li>
                <li>본 상품은 이벤트 진행강의로 강의 환불 시 동영상 단가 정가금액과 원 수강일수 기준으로 수강한 횟차를 제외한 수강하지 않은 강의 횟차에 대해 환불이 진행됩니다. <br>
                    다만, 원 수강일수가  지난 강의는 환불이 되지 않습니다. 기타 환불규정은 약관의 규정에 따릅니다.<br>
                * 본 이벤트는 복지할인쿠폰 등 다른 쿠폰과 중복 적용되지 않습니다.<br>
                * [수강시작일관련] 수강시작일은 30일 범위내에서 설정 가능합니다.</li>
                <li>본 이벤트는 내부사정에 의해 사전공지없이 종료 또는 변경될 수 있습니다.</li>
            </ul>
        </div>

        <div class="evtCtnsBox mb50 event04" data-aos="fade-up" id="lecbuy">
            <div class="NSK-Black">감정평가사</div>

            <div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
                @endif 
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