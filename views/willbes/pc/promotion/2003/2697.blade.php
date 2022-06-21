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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/06/2697_top_bg.jpg) no-repeat center top;}
        
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2697_top.jpg" alt="101가지 대표 문제 최종정리 특강"/>                         
        </div>

        <div class="evtCtnsBox wb_01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2697_01.jpg" alt="" data-aos="fade-up"/>
                <a href="https://pass.willbes.net/pass/offLecture/show/cate/3143/prod-code/198724" title="수강신청" style="position: absolute; left: 70.45%; top: 92.04%; width: 28.3%; height: 3.46%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox wb_02">            
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2697_02.jpg" alt="" data-aos="fade-up"/>              
		</div>
    </div>

    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function(){AOS.init();});
    </script>   
    
@stop