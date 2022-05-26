@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox span { vertical-align:top}   

    /************************************************************/

    .evt_apply {padding-bottom:50px;}

    .dday {font-size:24px !important; padding:10px; background:#ebebeb; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#3a99f0; font-size:14px !important;}

    /* 이용안내 */
    .evtInfo {padding:50px 0 100px; background:#fff; color:#000; line-height:1.5}
    .guide_box{margin:0 auto; padding:50px; text-align:left; word-break:keep-all;border:2px solid #000;}
    .guide_box h2 {font-size:25px; margin-bottom:30px;}
    .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
    .guide_box dd{margin-bottom:50px;}
    .guide_box dd li{margin-bottom:5px; list-style:disc; margin-left:20px;font-size:14px;}
    .guide_box dd li.none {list-style:none; margin-left:0}
    .guide_box dd span {color:#FF1D1D;vertical-align:top;font-weight:bold;}
    .guide_box dd:last-child {margin:0}

    </style>

    <div id="Container" class="Container NSK c_both">
        <div class="evtCtnsBox dday NSK-Thin">
            <strong>5월 31일 마감 <span id="ddayCountText" class="NSK-Black"></span> </strong>
            <a href="#evt01">신청하기 ></a>
        </div>
        
        <div class="evtCtnsBox" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2223m_top.jpg" alt="3순환 온라인 첨삭반">
        </div>

        <div class="evtCtnsBox mb50" data-aos="fade-up" id="evt01">
            <div class="mt80 mb20"><img src="https://static.willbes.net/public/images/promotion/2022/05/2223m_01_01.jpg" alt="예비순환+GS1순환"></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
            @endif
            <div class="mt80 mb20"><img src="https://static.willbes.net/public/images/promotion/2022/05/2223m_01_02.jpg" alt="GS2순환"></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
            @endif
            <div class="mt80 mb20"><img src="https://static.willbes.net/public/images/promotion/2022/05/2223m_01_03.jpg" alt="GS3순환"></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.m.promotion.display_product_partial',array('group_num'=>3))
            @endif
            <div class="mt80 mb20"><img src="https://static.willbes.net/public/images/promotion/2022/05/2223m_01_04.jpg" alt="황종휴 경제학"></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.m.promotion.display_product_partial',array('group_num'=>4))
            @endif
        </div>
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop