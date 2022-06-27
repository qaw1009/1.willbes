@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /*****************************************************************/

        .evt00 {background:#0a0a0a}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/04/2625_top_bg.jpg) no-repeat center top;}   

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2022/04/2625_01_bg.jpg) no-repeat center top;}

        .evt02 {background:#f6f6f6}

        .evt03 {background:#f6f6f6; padding-bottom:100px;}
        .evt03 a {display:block; height:64px; line-height:64px; color:#fff; font-size:28px; font-weight:bold; text-align:center; border-radius:50px; 
            background:#000; width:460px; margin:50px auto}
        .evt03 a:hover {background:#80AE40}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt00"  data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div> 

        <div class="evtCtnsBox evt_top"  data-aos="fade-up">  
            <div><img src="https://static.willbes.net/public/images/promotion/2022/04/2625_top.jpg" alt="경찰 합격수기 공모"></div>
        </div>

        <div class="evtCtnsBox evt01"  data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2625_01.jpg" alt="합격을 진심으로 축하드립니다.">
        </div>

        <div class="evtCtnsBox evt02"  data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2625_02.jpg" alt="합격수기 공모전">
        </div>

        <div class="evtCtnsBox evt03"  data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2625_03.jpg" alt="합격수기 참여하는 방법">
            <a href="javascript:void(0);" onclick="javascript:popup(); return false;">내 합격수기 등록하기  ></a>
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

    <script type="text/javascript">
        function popup(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params['cert']) === false)
                var url = "{{ front_url('/promotion/popup/' . $arr_base['promotion_code'] .'?cert='. $arr_promotion_params['cert'], true) }}";
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=868,height=630');
            @else
                alert('인증 정보를 찾을 수 없습니다.');
                return;
            @endif
        }
    </script>
@stop