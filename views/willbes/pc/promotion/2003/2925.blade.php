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
            background:url("https://static.willbes.net/public/images/promotion/2023/03/2925_bg.jpg") center top;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;padding:100px 0;}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

    </style>

    <div class="evtContent NSK" id="evtContainer">
        
        <div class="evtCtnsBox evt_top" data-aos="fade-down">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2925_top.png" alt="10일 체험팩"/>              
            </div>
        </div>

        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif

        <div class="evtCtnsBox evt_bt" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2925_bt.png" alt="수강평 남기기" />
                <a href="https://pass.willbes.net/support/qna/index" target="_blank" title="남기기" style="position: absolute;left: 32.11%;top: 74.55%;width: 36.16%;height: 10.22%;z-index: 2;"></a>             
            </div>
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