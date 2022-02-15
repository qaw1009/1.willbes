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

    .event_apply {margin-bottom:50px;}    
    .event_apply .NSK-Black {font-size:40px; text-align:left; padding:20px 0; color:#331780}

     /* 폰 가로, 태블릿 세로*/     
     @@media only screen and (max-width: 374px)  {
        .dday {font-size:18px !important;}
        .dday a {padding:5px 10px;}
        .event_apply .NSK-Black {font-size:20px;padding:20px;}
    }
    /* 태블릿 세로 */
        @@media only screen and (min-width: 375px) and (max-width: 640px) {       
        .event_apply .NSK-Black {font-size:25px;padding:25px;}
        }
    /* 태블릿 가로, PC */
        @@media only screen and (min-width: 641px) {
        .event_apply .NSK-Black {font-size:30px;padding:30px;}
        }

    </style>
    
    <div id="Container" class="Container NSK c_both">

        <div class="evtCtnsBox dday NSK-Thin"  data-aos="fade-down">
            <strong class="NSK-Black">이벤트 마감 <span id="ddayCountText"></span> </strong>
            <a href="#lec_buy">수강신청 ></a>
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2540_mtop.jpg" alt="여러분의 합격을 응원합니다">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2540_m01.jpg" alt="특별할인 프로모션">
        </div>

        <div class="evtCtnsBox mb50 event_apply" data-aos="fade-up" id="lec_buy">
            <div class="NSK-Black">노동법</div>
            <div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif
            </div>
            <div class="NSK-Black">행정쟁송법</div>
            <div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                @endif
            </div>
            <div class="NSK-Black">인사노무관리</div>
            <div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
                @endif
            </div>
            <div class="NSK-Black">선택과목(경영조직론/민사소송법)</div>
            <div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>4))
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