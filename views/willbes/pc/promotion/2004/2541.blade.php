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
        
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2022/02/2541_02_bg.jpg) no-repeat center;}
        .evt03 a {display:block; width:800px; margin:0 auto;
            color: #fff;
            font-weight: bold;
            letter-spacing: 1px;
            display: block;
            font-size: 30px;
            padding: 15px 0;
            border-radius: 30px;
            position: relative;
            overflow: hidden;
            text-indent: 18px;
            background-color:#000;
        }
        .evt03 a:hover {animation: upup 1s ease-in-out infinite both;}
        .evt03 a:after{
            content:'';
            position: absolute;
            top:0;
            left:0;
            background-color: #fff;
            width: 100px;
            height: 100%;
            z-index: 1;
            transform: skewY(129deg) skewX(-60deg);
        }
        .evt03 a:after{animation:shinyBtn 3s ease-in-out infinite;}
        @@keyframes shinyBtn {
            0% { transform: scale(0) rotate(45deg); opacity: 0; }
            80% { transform: scale(0) rotate(45deg); opacity: 0.3; }
            81% { transform: scale(4) rotate(45deg); opacity: 0.7; }
            100% { transform: scale(50) rotate(45deg); opacity: 0; }
        }
        @@keyframes upup {
        from {
            transform: scale(1);
            transform-origin: center center;
            animation-timing-function: ease-out;
        }
        17% {
            transform: scale(1.1);
            animation-timing-function: ease-out;
        }
        33% {
            transform: scale(0.9);
            animation-timing-function: ease-in;
        }
        45% {
            transform: scale(1);
            animation-timing-function: ease-out;
        }
    }

                      
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
            <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&campus_ccd=605006&course_idx=1063" target="_blank">지금 바로 신규 개강 과정 신청하기 ></a>
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