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
            background:url(https://static.willbes.net/public/images/promotion/2021/07/2273_bg.jpg) no-repeat center top;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtCtnsBox .txt01 {padding-top:254px}
        .evtCtnsBox .txt02 {padding-top:210px}
        .evtCtnsBox .txt03 {padding-top:310px}
        .txt04Box {position:relative; padding-bottom:200px; height:100Vh}
        .evtCtnsBox .txt04 {position:absolute; top:500px; left:50%; margin-left:-370px}


    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox">
            <div data-aos="flip-left" class="txt01">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2273_txt01.png" alt=""/>
            </div>
        </div>

        <div class="evtCtnsBox">
            <div data-aos="flip-right" class="txt02">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2273_txt02.png" alt=""/>
            </div>
        </div>

        <div class="evtCtnsBox">
            <div data-aos="flip-left" class="txt03">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2273_txt03.png" alt=""/>
            </div>
        </div>

        <div class="evtCtnsBox txt04Box">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2273_img.png" alt=""/> 
            <div data-aos="flip-right" class="txt04">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2273_txt04.png" alt=""/>
            </div>                       
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