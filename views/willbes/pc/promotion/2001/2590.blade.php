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
            background:#062449 url(https://static.willbes.net/public/images/promotion/2022/04/2590_top_bg.jpg) no-repeat center 102px; background-size:2000px}
            font-size:14px;          
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .evt00 {background:#0A0A0A}

        .evtTop {}

        .evt01 {display:flex; width:1082px; margin:0 auto}    
  
        .evt01 a img.off {display:block}
        .evt01 a img.on {display:none}
        .evt01 a:hover img.off {display:none}
        .evt01 a:hover img.on {display:block}

        .bravo {background:#06254b; padding:90px 0;}
        .bravo p {color:#fff; font-size:35px;}
        .bravo p span {color:#ffda39; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite; vertical-align:top}
        @@keyframes upDown{
            from{color:#b62200}
            50%{color:#FFFD34}
            to{color:#b62200}
        }
        @@-webkit-keyframes upDown{
            from{color:#b62200}
            50%{color:#FFFD34}
            to{color:#b62200}
        }
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/police.jpg" title="경찰학원 1위">
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2590_top.jpg" title="치킨 100마리">
        </div>
                
        <div class="evtCtnsBox">
            <div class="evt01">
                <div data-aos="flip-left">
                    <a href="https://police.willbes.net/promotion/index/cate/3001/code/2583" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/2022/04/2590_t01.jpg" class="off" alt="이국령" />
                        <img src="https://static.willbes.net/public/images/promotion/2022/04/2590_t01_on.jpg" class="on" alt="이국령on"  />
                    </a>
                </div>
                <div data-aos="flip-left">
                    <a href="#none" onclick="javascript:alert('Coming Soon!');">
                        <img src="https://static.willbes.net/public/images/promotion/2022/04/2590_t02.jpg" class="off" alt="장정훈"  />
                        <img src="https://static.willbes.net/public/images/promotion/2022/04/2590_t02_on.jpg" class="on" alt="장정훈on"  />
                    </a>
                </div>
                <div data-aos="flip-left">
                    <a href="https://police.willbes.net/promotion/index/cate/3001/code/2593" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/2022/04/2590_t03.jpg" class="off" alt="신광은"  />
                        <img src="https://static.willbes.net/public/images/promotion/2022/04/2590_t03_on.jpg" class="on" alt="신광은on"  />
                    </a>
                </div>
                <div data-aos="flip-left">
                    <a href="#none" onclick="javascript:alert('Coming Soon!');">
                        <img src="https://static.willbes.net/public/images/promotion/2022/04/2590_t04.jpg" class="off" alt="김원욱"  />
                        <img src="https://static.willbes.net/public/images/promotion/2022/04/2590_t04_on.jpg" class="on" alt="김원욱on"  />
                    </a>
                </div>  
            </div>          
        </div>  

        <div class="evtCtnsBox bravo">         
            <p class="NSK-Black">교수님과 함께!<span> 완벽적중 EVENT</span> 진행중!!</p>  
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2590_brovo.jpg" title="bravo your life">
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