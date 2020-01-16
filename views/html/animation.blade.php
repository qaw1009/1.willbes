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
            <p>회전</p>
            <span><img src="https://static.willbes.net/public/images/promotion/2020/01/1522_top_img.png" alt="꼭 들어보세요"></span>
        </div>

        <div class="evtCtnsBox wb_cts04">
            <p>플립(마우스 롤오버 반응)</p>
            <a href="#none" target="_blank">
                <img src="https://police.willbes.net/public/uploads/willbes/banner/2019/1129/banner_20200115095259.jpg" title="평생0원PASS">    
            </a>
        </div>

    </div>
    <!-- End Container -->

@stop