@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:1120px; text-align:left; margin:0 auto; position:relative; font-size:18px; padding:20px 0; border-bottom:1px solid #ccc}
        .evtCtnsBox p {margin-bottom:20px}

        /************************************************************/


        .wb_cts01 span {color:#ffda39; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#000}
        50%{color:#a78de6}
        to{color:#000}
        }
        @@-webkit-keyframes upDown{
        from{color:#000}
        50%{color:#a78de6}
        to{color:#000}
        }

        .wb_cts02 {height:300px}
        .wb_cts02 span {position:absolute; left:50%; z-index:1;
            -webkit-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -moz-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -ms-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -o-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
        }
        .wb_cts02 span.img1 {top:30px; margin-left:-858px; width:858px; animation:iptimg1 0.5s ease-in;-webkit-animation:iptimg1 0.5s ease-in;}
        .wb_cts02 span.img2 {top:30px; margin-left:0; width:532px; animation:iptimg2 0.5s ease-in;-webkit-animation:iptimg2 0.5s ease-in;}
        @@keyframes iptimg1{
        from{margin-left:-1200px; opacity: 0;}
        to{margin-left:-858px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
        from{margin-left:-1200px; opacity: 0;}
        to{margin-left:-858px; opacity: 1;}
        }
        
        @@keyframes iptimg2{
        from{margin-left:532px; opacity: 0;}
        to{margin-left:0; opacity: 1;}
        }
        @@-webkit-keyframes iptimg2{
        from{margin-left:532px; opacity: 0;}
        to{margin-left:0; opacity: 1;}
        }

        .wb_cts03 {height:150px}
        .wb_cts03 span {position:absolute; top:20px; left:50px; -webkit-animation:swing 2s linear infinite;animation:swing 2s linear infinite}
        @@keyframes swing{
            0%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            25%{-webkit-transform:rotate3d(0,0,1,10deg);transform:rotate3d(0,0,1,10deg)}
            50%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            75%{-webkit-transform:rotate3d(0,0,1,-10deg);transform:rotate3d(0,0,1,-10deg)}
            100%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
        }

        .wb_cts04 a {position:relative; display:block; width:520px; height:370px; overflow: hidden;}
        .wb_cts04 a img {margin-top:0; animation:downFlip 0.5s forwards;-webkit-animation:downFlip 0.5s forwards}
        @@keyframes downFlip{
        from{margin-top:-370px}
        to{margin-top:0}
        }
        @@-webkit-keyframes downFlip{
        from{margin-top:-370px}
        to{margin-top:0}
        }
        
        .wb_cts04 a:hover img {animation:upFlip 0.5s forwards;-webkit-animation:upFlip 0.5s forwards}
        @@keyframes upFlip{
        from{margin-top:0}
        to{margin-top:-370px}
        }
        @@-webkit-keyframes upFlip{
        from{margin-top:0}
        to{margin-top:-370px}
        } 

        .wb_cts05 {height:150px}
        .wb_cts05 .main_img {
            position:absolute;
            width:722px;
            top:30px;
            left:50%;
            margin-left:-361px;
            z-index:10;
            animation:flipInX 2s infinite;
            -webkit-animation:flipInX 2s infinite;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }
        @@keyframes flipInX {
             from {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;                
             }
             40% {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;
             }
             60% {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;
                
             }
             80% {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -10deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, -10deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;
             }
             to {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, 20deg);  
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;               
             }
         }
         .wb_cts05 .flipInX {
            -webkit-backface-visibility: visible !important;
            backface-visibility: visible !important;
            -webkit-animation-name: flipInX;
            animation-name: flipInX;
        }

        .wb_cts06 a {display:block; text-align:center; background:#363636; color:#fff; padding:15px 0; border-radius:30px; margin:0 10px; font-size:24px;
            -webkit-box-shadow: 10px 10px 30px 1px rgba(0,0,0,0.31);
            -moz-box-shadow: 10px 10px 30px 1px rgba(0,0,0,0.31);
            box-shadow: 10px 10px 30px 1px rgba(0,0,0,0.31);
        }

        .wb_cts07 span.sp01 {left:100px; animation: sp01 1.5s linear infinite;}
        @@keyframes sp01{
		from{transform:scale(1)}50%{transform:scale(0.9)}to{transform:scale(1)}
        }

        .lecBanner {background: url("https://static.willbes.net/public/images/promotion/main/3094_lecBanner_bg.jpg") no-repeat center center fixed; padding:100px 0 90px;}
        .lecBanner li {display: inline; float:left; width:25%; text-align: center; margin-bottom:20px}
        .lecBanner li a {display:block; width:260px; margin:0 auto;
            transition: opacity .4s ease-in-out;
        }
        .lecBanner li a img {width: 100%;}
        .lecBanner li a:hover {
            -webkit-box-shadow: 10px 10px 20px 1px rgba(0,0,0,0.5);
            -moz-box-shadow: 10px 10px 20px 1px rgba(0,0,0,0.5);
            box-shadow: 10px 10px 20px 1px rgba(0,0,0,0.5);
        }
        .lecBanner ul:hover a:not(:hover){    
            opacity: 0.4; 
        }

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_cts01">
            <span>텍스트 컬러 변경</span>
        </div>

        <div class="evtCtnsBox wb_cts02">
            <p>슬라이드</p>
            <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_top_img01.png" alt=" "></span>
            <span class="img2"><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_top_img02.png" alt=" "></span>
        </div>

        <div class="evtCtnsBox wb_cts03">
            <p>스윙좌우</p>
            <span><img src="https://static.willbes.net/public/images/promotion/2020/01/1522_top_img.png" alt="꼭 들어보세요"></span>
        </div>

        <div class="evtCtnsBox wb_cts04">
            <p>플립(마우스 롤오버 반응)</p>
            <a href="#none" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2020/02/banner_20200204092701.jpg" title="평생0원PASS">    
            </a>
        </div>

        <div class="evtCtnsBox wb_cts05">
            <p>스윙상하</p>
            <div class="main_img flipInX">
                <img src="https://static.willbes.net/public/images/promotion/2019/09/1378_top_img01.png" alt="윌비스 7급 외무영사직 PASS" />
            </div>
        </div>

        <div class="evtCtnsBox wb_cts06">
            <p>그림자</p>
            <a href="#none">온라인강의 Coming soon</a>
        </div>

        <div class="evtCtnsBox wb_cts07">
            <p>스케일</p>
            <span class="sp01">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1512_top_01.png">                    
            </span>
        </div>

        <div class="Section lecBanner mt50">
            <div class="widthAuto">
                <ul>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200115095837.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200115102038.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200123131907.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200128152955.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200128153052.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200131165936.jpg" alt="배너명"></a></li>                
                </ul>
            </div>
        </div>

    </div>
    <!-- End Container -->

@stop