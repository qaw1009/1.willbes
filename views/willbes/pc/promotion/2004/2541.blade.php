@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/02/2541_top_bg.jpg) no-repeat center;}    

        .evt01 {}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2022/02/2541_02_bg.jpg) no-repeat center;}

                      
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop" data-aos="fade-up">             
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2541_top.jpg" alt="" />  
        </div>       

        <div class="evtCtnsBox evt01">
            <div data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2022/02/2541_01_01.jpg" alt="" /></div>
            <div data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2022/02/2541_01_02.jpg" alt="" /></div>
            <div data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2022/02/2541_01_03.jpg" alt="" /></div>
        </div>  

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2541_02.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2541_03_01.jpg" alt="" />  
            <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" target="_blank">지금 바로 신규 개강 과정 신청하기 ></a>
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2541_03_02.jpg" alt="" />  
        </div>
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>

@stop