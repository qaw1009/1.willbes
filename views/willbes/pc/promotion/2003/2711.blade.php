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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .wb_top {background:#ff8aad url(https://static.willbes.net/public/images/promotion/2022/07/2711_top_bg.jpg) no-repeat center top; height: 1304px;}
        .wb_top div {padding-top:480px}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">            
            <div><img src="https://static.willbes.net/public/images/promotion/2022/07/2711_top.png" alt="한승아 언어논리" data-aos="fade-down"/></div>                      
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/07/2711_01.jpg" alt="">
                <a href="https://pass.willbes.net/pass/offLecture/show/cate/3143/prod-code/199385" target="_blank" title="수강신청" style="position: absolute; left: 70%; top: 92.2%; width: 28.93%; height: 4.48%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2711_02.jpg" alt="">              
		</div>
    </div>

    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>
    
@stop