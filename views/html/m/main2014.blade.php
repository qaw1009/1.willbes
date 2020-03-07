 
@extends('html.m.layouts.master')


@section('content')
<!-- Container -->
<style type="text/css">     
    .evtCtnsBox {width:100%; text-align:center; margin:0 auto;}
    .evtCtnsBox img {width:100%; max-width:940px}

    .skybanner {
        position:fixed;
        bottom:20px;
        right:10px;
        z-index:1;
    }

    .evtTop {background:url(https://static.willbes.net/public/images/promotion/main/3114_standby_top_bg.jpg) no-repeat center top; background-size: auto;}
    .evt01 {background:url(https://static.willbes.net/public/images/promotion/main/3114_standby_01_bg.jpg) no-repeat center top;}
    .evt02 {background:url(https://static.willbes.net/public/images/promotion/main/3114_standby_02_bg.jpg) no-repeat center top;}
    .evt03 {background:url(https://static.willbes.net/public/images/promotion/main/3114_standby_03_bg.jpg) no-repeat center top;}
    .evt04 {background:#8e959b}
    .evt05 {background:url(https://static.willbes.net/public/images/promotion/main/3114_standby_08_bg.jpg) no-repeat center top;}
    .evtFooter {background:#252525}
    .swiper-slide {background:#8e959b}
    .swiper-slide2 {background:#7c8389}
    .swiper-button-next,
    .swiper-button-prev {background-color:#fff !important; border-radius:30px; width:30px !important; height:30px !important; margin:0 10px}

    .btnbuy {width:100%; position:fixed; bottom:0; z-index:100; text-align:center; background:#000; color:#fff; line-height:1.4; padding:20px 0; font-size:1rem;}
    .btnbuy span {color:#3a99f0; font-size:1rem}
    .btnbuy a {display:inline-block; font-size:1.1rem; background:#000; color:#fff; background:#3a99f0; padding:3px 20px; margin:0 10px; border-radius:10px;}
    .btnbuy a:hover {background:#fff; color:#3a99f0;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    @@-webkit-keyframes shadow-drop-2-center {
        0% {
            -webkit-transform: translateZ(0);
                    transform: translateZ(0);
            -webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
                    box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
        }
        100% {
            -webkit-transform: translateZ(50px);
                    transform: translateZ(50px);
            -webkit-box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
                    box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
        }
    }
    @@keyframes shadow-drop-2-center {
        0% {
            -webkit-transform: translateZ(0);
                    transform: translateZ(0);
            -webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
                    box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
        }
        100% {
            -webkit-transform: translateZ(50px);
                    transform: translateZ(50px);
            -webkit-box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
                    box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
        }
    }
 </style>   

    <div id="Container" class="Container NGR c_both">
        <!-- site nav -->
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_top_m.jpg" title="">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_01m.jpg" title="">
        </div>    

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_02m.jpg" title="">
        </div>    

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_03m.jpg" title="">
        </div>    

        <div class="evtCtnsBox evt04" id="evt04">
            <div class="MainBnrSlider swiper-container swiper-container-arrow">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1564" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_standby_04m.jpg" title=""></a></div>
                    <div class="swiper-slide swiper-slide2"><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1566" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_standby_05m.jpg" title=""></a></div>
                    <div class="swiper-slide"><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1565" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_standby_06m.jpg" title=""></a></div>
                    <div class="swiper-slide swiper-slide2"><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1567" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_standby_07m.jpg" title=""></a></div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>    

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_08m.jpg" title="">
        </div>    

        <div class="evtCtnsBox evtFooter">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_footer_m.jpg" title="">
        </div>
        
        <div class="btnbuy NSK">
            미리 신청하면 <span>특별</span> 할인과 혜택! <a href="#evt04" class="NSK-Black">사전예약 수강신청</a>
        </div>
    </div>
<!-- End Container -->

@stop