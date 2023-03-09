@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">   
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;padding:100px 0;}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        .evt_top {background:url("https://static.willbes.net/public/images/promotion/2023/03/2924_top_bg.jpg") center top;}
        .evt_top span {position: absolute; top:380px; left:50%; margin-left:-200px; z-index: 2;}
        .evt01 {background:#fb8a03; padding-bottom:150px}
        .evt02 {margin-bottom:100px}
        .evt03 {background:#c71f25; padding-bottom:150px}

        .btn a {display:block; width:850px; margin:0 auto; background:#000; color:#fff; font-size:30px; border-radius:10px; padding:20px}
        .btn a:hover {background:#192b5c}

        /************************************************************/

    </style>

    <div class="evtContent NSK" id="evtContainer">
        
        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2924_top.jpg" alt="경찰합격"/>
            <span data-aos="zoom-in" data-aos-duration="1000"><img src="https://static.willbes.net/public/images/promotion/2023/03/2924_top_img.png" alt="영광"/></span>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2924_01.jpg" alt=""/>
            <div class="btn"><a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2000" target="_blank">3월25일(토) 경찰 합격의 영광 설명회 참가 신청하기 ></a></div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2924_02.jpg" alt=""/>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2924_03.jpg" alt=""/>
            <div class="btn"><a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank">윌비스 경찰 유튜브 채널 바로가기 ></a></div>
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2924_04.jpg" alt=""/>
        </div>
    </div>
   <!-- End Container -->

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready(function() {
        AOS.init();
    });
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop