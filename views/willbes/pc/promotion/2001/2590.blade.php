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
            background:#fff;
        }
        .evtContent span {vertical-align:top;}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000} */

        /************************************************************/

        .evt00 {background:#0A0A0A}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/03/2590_top_bg.jpg) no-repeat center top;}

        .evt_pro {background:#06254b}
        .pro_wrap {position:relative;width:1500px;margin:0 auto;}
        .pro_area {position:absolute;left:200px;top:-850px;}     
        .pro_area li {display:inline; float:left;}
        .pro_area li:last-child {margin:0}       
        .pro_area li a img.off {display:block}
        .pro_area li a img.on {display:none}
        .pro_area li a:hover img.off {display:none}
        .pro_area li a:hover img.on {display:block}

        .event_ing {font-size:35px;padding:100px;background:#06254b;}
        .event_ing p {color:#fff;}
        .event_ing p span,
        .event_ing span {color:#ffda39; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite;}
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

        .bravo {background:#06254b;padding-bottom:50px;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/police.jpg" title="경찰학원 1위">
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2590_top.jpg" title="">
        </div>

        <div class="evtCtnsBox evt_pro">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2590_pro.jpg" title="">
            <div class="pro_wrap">
                <div class="pro_area">
                    <ul>
                        <li>
                            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2583" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/2022/03/2590_01.png" class="off" alt="원유철 경찰한국사"  />
                                <img src="https://static.willbes.net/public/images/promotion/2022/03/2590_01_on.png" class="on" alt="원유철 경찰한국사"  />
                            </a>
                        </li>
                        <li>
                            <a href="#none" onclick="javascript:alert('Coming Soon!');">
                                <img src="https://static.willbes.net/public/images/promotion/2022/03/2590_02.png" class="off" alt="오태진 경찰한국사"  />
                                <img src="https://static.willbes.net/public/images/promotion/2022/03/2590_02_on.png" class="on" alt="오태진 경찰한국사"  />
                            </a>
                        </li>
                        <li>
                            <a href="#none" onclick="javascript:alert('Coming Soon!');">
                                <img src="https://static.willbes.net/public/images/promotion/2022/03/2590_03.png" class="off" alt="김원욱 형법"  />
                                <img src="https://static.willbes.net/public/images/promotion/2022/03/2590_03_on.png" class="on" alt="김원욱 형법"  />
                            </a>
                        </li>
                        <li>
                            <a href="#none" onclick="javascript:alert('Coming Soon!');">
                                <img src="https://static.willbes.net/public/images/promotion/2022/03/2590_04.png" class="off" alt="신광은 형소법"  />
                                <img src="https://static.willbes.net/public/images/promotion/2022/03/2590_04_on.png" class="on" alt="신광은 형소법"  />
                            </a>
                        </li>                      
                    </ul>
                </div>   
            </div>            
        </div>

        <div class="evtCtnsBox">
            <div class="event_ing NSK-Black"> 
                <div>         
                    <p>교수님과 함께!<span> 적중 소문내기 EVENT 진행중</span></p>      
                </div>         
            </div>
        </div>

        <div class="evtCtnsBox bravo">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2590_brovo.jpg" title="">
        </div>            

	</div>

    <!-- End Container -->

    
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $( document ).ready( function() {
        AOS.init();
    } );
    </script>      
@stop 