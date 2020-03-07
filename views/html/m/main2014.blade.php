 
@extends('html.m.layouts.master')


@section('content')
<!-- Container -->
<style type="text/css">     
    .evtCtnsBox {width:100%; text-align:center; max-width:720px; margin:0 auto;}
    .evtCtnsBox img {width:100%; max-width:720px}

    .skybanner {
        position:fixed;
        bottom:20px;
        right:10px;
        z-index:1;
    }

    .evtTop {}
    .evt01 {}
    .evt02 {}
    .evt03 {}
    .evt04 {max-width:720px; margin:0 auto}
    .evt05 {}
    .evtFooter {}
    .swiper-button-next,
    .swiper-button-prev {background-color:#fff !important; border-radius:30px; width:30px !important; height:30px !important; margin:0 10px; }
    .btnbuy {position:fixed; width:100%; bottom:10px; left:0; z-index:100; text-align:center; }    
    .btnbuy a {display:block; font-size:1rem; color:#fff; background:#000; border-radius:50px; line-height:1.4; padding:20px 0; width:720px; margin:0 auto; font-size:1rem;}
    .btnbuy span {color:#3a99f0;}
    .btnbuy p {font-size:1.2rem;}
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
            <img src="https://static.willbes.net/public/images/promotion/main/3114m_standby_01.jpg" title="">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/main/3114m_standby_02.jpg" title="">
        </div>    

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/main/3114m_standby_03.jpg" usemap="#Map3114M" title="" border="0">
            <map name="Map3114M" id="Map3114M">
                <area shape="rect" coords="156,715,347,895" href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1564" target="_blank" />
                <area shape="rect" coords="363,717,571,895" href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1566" target="_blank"/>
                <area shape="rect" coords="155,899,348,1074" href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1565" target="_blank"/>
                <area shape="rect" coords="362,902,572,1074" href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1567" target="_blank" />
            </map>
            </div>    

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/main/3114m_standby_04.jpg" title="">
        </div>    

        <div class="evtCtnsBox evt04" id="evt04">
            <div class="MainBnrSlider swiper-container swiper-container-arrow">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1564" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114m_standby_06.jpg" title=""></a></div>
                    <div class="swiper-slide swiper-slide2"><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1566" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114m_standby_07.jpg" title=""></a></div>
                    <div class="swiper-slide"><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1565" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114m_standby_08.jpg" title=""></a></div>
                    <div class="swiper-slide swiper-slide2"><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1567" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114m_standby_09.jpg" title=""></a></div>
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
            <img src="https://static.willbes.net/public/images/promotion/main/3114m_standby_footer.jpg" title="">
        </div>
        
        <div class="btnbuy NSK">
            <a href="#evt04" class="NSK">
                미리 신청하면 특별 <span>할인과 혜택!</span>
                <p class="NSK-Black">사전예약 수강신청 ></p>
            </a>
        </div>
    </div>
<!-- End Container -->

@stop