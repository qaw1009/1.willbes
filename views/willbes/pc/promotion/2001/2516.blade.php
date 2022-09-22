@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/     

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/01/2516_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2022/01/2516_01_bg.jpg) no-repeat center top; height:870px}
        .evt_01 span {position: absolute; bottom:0; left:50%; margin-left:-177px; z-index: 2;}
        .evt_03 {padding-bottom:100px}
        .evt_03 span {position: absolute; top:-150px; left:50%; margin-left:85px; z-index: 2;}
    </style>

    <div class="evtContent NSK" id="evtContainer">      

        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2516_top.jpg" alt="설공합경" />
        </div>

        <div class="evtCtnsBox evt_01">
            <span data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2516_01.png" alt="가족이 모이는 명절" />
            </span>
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2516_02.jpg" alt="불안감" />
        </div>

        <div class="evtCtnsBox evt_03">
            <span data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2516_03_gift.png"  alt="이벤트 경품" />
            </span>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2516_03.jpg"  alt="열공댓글 이벤트" /> 
                <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" title="회원가입" style="position: absolute; left: 13.84%; top: 38.59%; width: 26.52%; height: 8.18%;  z-index: 2;"></a>
            </div> 
            
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial', array('login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www')))
            @endif
        </div>


    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $(document).ready(function() {
        AOS.init();
      });
    </script>

@stop