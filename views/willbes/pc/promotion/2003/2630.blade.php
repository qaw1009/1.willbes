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
            background:#fff url(https://static.willbes.net/public/images/promotion/2022/04/2630_bg.jpg) no-repeat center top;          
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #fff}*/
        /************************************************************/

        .wb_02 {background:#130c05; padding-bottom:150px}         
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" data-aos="fade-down">            
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2630_top.jpg" alt="9급 검찰직 하루 하나!"/>               
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2630_01.jpg"  alt="하루 하나란?"/>
		</div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">            
            <a href="https://www.youtube.com/channel/UC2J41ggwL4CTIJfoVBXsWkg/videos" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/04/2630_02.jpg"  alt="유튜브"/>              
		</div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2630_03.jpg" alt=""/></a>            
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
    
@stop