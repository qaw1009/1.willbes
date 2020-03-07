 
@extends('html.m.layouts.master')


@section('content')
<!-- Container -->
<style type="text/css">     
    .evtCtnsBox {width:100%; text-align:center; margin:0 auto;}
    .evtCtnsBox img {width:100%; max-width:1120px}

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
 </style>   

    <div id="Container" class="Container NGR c_both">
        <!-- site nav -->
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_top.jpg" title="">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_01.jpg" title="">
        </div>    

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_02.jpg" title="">
        </div>    

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_03.jpg" title="">
        </div>    

        <div class="evtCtnsBox evt04">
            <div class="MainBnrSlider swiper-container swiper-container-arrow">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1564" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_standby_04.jpg" title=""></a></div>
                    <div class="swiper-slide swiper-slide2"><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1566" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_standby_05.jpg" title=""></a></div>
                    <div class="swiper-slide"><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1565" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_standby_06.jpg" title=""></a></div>
                    <div class="swiper-slide swiper-slide2"><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1567" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_standby_07.jpg" title=""></a></div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>    

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_08.jpg" title="">
        </div>    

        <div class="evtCtnsBox evtFooter">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_footer.jpg" title="">
        </div>        
    </div>
<!-- End Container -->

@stop