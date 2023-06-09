@extends('willbes.pc.layouts.master')
<link href="https://fonts.googleapis.com/css2?family=Niconne&display=swap" rel="stylesheet">

@section('content')    

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
            -webkit-animation:flipInX 2s infinite;
            animation:flipInX 2s infinite;            
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
		    from{transform:scale(1)}
            50%{transform:scale(0.9)}
            to{transform:scale(1)}
        }
        
        .wb_cts07 span.sp02 {left:100px; animation: sp02 1.5s linear infinite; -webkit-animation: sp02 1.5s linear infinite;}
        @@keyframes sp02{
            0%{transform:scale3d(1,1,1); -webkit-transform:scale3d(1,1,1);}
            30%{transform:scale3d(1.25,.75,1); -webkit-transform:scale3d(1.25,.75,1);}
            40%{transform:scale3d(0.75,1.25,1); -webkit-transform:scale3d(0.75,1.25,1);}
            50%{transform:scale3d(1.15,.85,1); -webkit-transform:scale3d(1.15,.85,1);}
            65%{transform:scale3d(.95,1.05,1); -webkit-transform:scale3d(.95,1.05,1);}
            75%{transform:scale3d(1.05,.95,1); -webkit-transform:scale3d(1.05,.95,1);}
            100%{transform:scale3d(1,1,1); -webkit-transform:scale3d(1,1,1);}
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

        .wb_cts08 {font-size:30px; font-weight:bold; color:#000;
            text-shadow: 3px 0 0 #f9fb54, -3px 0 0 #9bfb54;
        }
        .wb_cts08 p {
            box-shadow: 10px 10px 5px #f9fb54, -10px -10px 5px #9bfb54;
            border:1px solid #ccc; padding:20px;
        }
        .wb_cts09 {font-size:200px; font-weight:bold; color:#fff; background:#f4f4f4;padding:100px; margin-top:30px;
            -webkit-animation: text-pop-up-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: text-pop-up-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        @@-webkit-keyframes text-pop-up-top {
            0% {
                -webkit-transform: translateY(0);
                        transform: translateY(0);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                text-shadow: none;
            }
            100% {
                -webkit-transform: translateY(-50px);
                        transform: translateY(-50px);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                text-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3);
            }
        }
        @@keyframes text-pop-up-top {
            0% {
                -webkit-transform: translateY(0);
                        transform: translateY(0);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                text-shadow: none;
            }
            100% {
                -webkit-transform: translateY(-50px);
                        transform: translateY(-50px);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                text-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3);
            }
        }

        .wb_cts10 {font-size:200px; font-weight:bold; color:#fff; padding:100px;
            -webkit-animation: bg-pan-left 8s both;
            animation: bg-pan-left 8s both;
            background: url("https://static.willbes.net/public/images/promotion/main/3094_lecBanner_bg.jpg") ;
        }
        @@-webkit-keyframes bg-pan-left {
            0% {
                background-position: 100% 10%;
            }
            100% {
                background-position: 0% 0%;
            }
        }
        @@keyframes bg-pan-left {
            0% {
                background-position: 100% 100%;
            }
            100% {
                background-position: 0% 0%;
            }
        }

        .wb_cts11 {font-size:200px; font-weight:bold; color:#fff; padding:100px;
            -webkit-animation: color-change-5x 8s linear infinite alternate both;
	        animation: color-change-5x 8s linear infinite alternate both;
        }
        @@-webkit-keyframes color-change-5x {
            0% {
            background: #19dcea;
            }
            25% {
            background: #b22cff;
            }
            50% {
            background: #ea2222;
            }
            75% {
            background: #f5be10;
            }
            100% {
            background: #3bd80d;
            }
        }
        @@keyframes color-change-5x {
            0% {
            background: #19dcea;
            }
            25% {
            background: #b22cff;
            }
            50% {
            background: #ea2222;
            }
            75% {
            background: #f5be10;
            }
            100% {
            background: #3bd80d;
            }
        }
        .wb_cts12 {font-size:200px; font-weight:bold; color:#fff; height:400px; overflow:hidden}
        .wb_cts12 div {-webkit-animation: kenburns-top 5s ease-out both;
	        animation: kenburns-top 5s ease-out both;
            background: url("https://static.willbes.net/public/images/promotion/main/3094_lecBanner_bg.jpg") center top, ;
            padding:100px 0;
        }
        @@-webkit-keyframes kenburns-top {
        0% {
            -webkit-transform: scale(1) translateY(0);
                    transform: scale(1) translateY(0);
            -webkit-transform-origin: 50% 16%;
                    transform-origin: 50% 16%;
        }
        100% {
            -webkit-transform: scale(1.25) translateY(-15px);
                    transform: scale(1.25) translateY(-15px);
            -webkit-transform-origin: top;
                    transform-origin: top;
        }
        }
        @@keyframes kenburns-top {
        0% {
            -webkit-transform: scale(1) translateY(0);
                    transform: scale(1) translateY(0);
            -webkit-transform-origin: 50% 16%;
                    transform-origin: 50% 16%;
        }
        100% {
            -webkit-transform: scale(1.25) translateY(-15px);
                    transform: scale(1.25) translateY(-15px);
            -webkit-transform-origin: top;
                    transform-origin: top;
        }
        }
        .wb_cts13 {font-weight:bold; color:#fff; overflow:hidden}

        @@import url('https://fonts.googleapis.com/css2?family=Niconne&display=swap');
        .wb_cts13 div {
            font-size: 15rem;
	        text-align: center;
            height:90vh;
            line-height: 90vh;
            color: #fcedd8;
            background: #d52e3f;
            font-family: 'Niconne', cursive;
            font-weight: 700;
            text-shadow: 5px 5px 0px #eb452b, 
                  10px 10px 0px #efa032, 
                  15px 15px 0px #46b59b, 
                  20px 20px 0px #017e7f, 
                  25px 25px 0px #052939, 
                  30px 30px 0px #c11a2b, 
                  35px 35px 0px #c11a2b, 
                  40px 40px 0px #c11a2b, 
                  45px 45px 0px #c11a2b;
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
            <span class="sp02">
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

        <div class="evtCtnsBox wb_cts08 NGEB">
            <p>다중 그림자 <span class="NSK-Black">shadow</span></p>
        </div>

        <div class="evtCtnsBox wb_cts09 NGEB">
            willbes<br>윌비스
        </div>

        <div class="evtCtnsBox wb_cts10 NGEB">
            배경
        </div>

        <div class="evtCtnsBox wb_cts11 NGEB">
            배경 컬러
        </div>

        <div class="evtCtnsBox wb_cts12 NGEB">
            <div>
            배경2
            </div>
        </div>

        <div class="evtCtnsBox wb_cts13">
            <div>Roses</div>
        </div>

    </div>
    <!-- End Container -->

@stop