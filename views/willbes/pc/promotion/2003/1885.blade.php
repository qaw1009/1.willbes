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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        
        .evt_04 {padding-bottom:100px;}
        .evt_04 .slide_con {width:954px; margin:0 auto; position:relative}
        .evt_04 .slide_con p {position:absolute; top:35%; width:30px; z-index:90}
        .evt_04 .slide_con p a {cursor:pointer}
        .evt_04 .slide_con p.leftBtn {left:-115px; top:50%; width:62px; height:62px; margin-top:-30px;}
        .evt_04 .slide_con p.rightBtn {right:-85px; top:50%; width:62px; height:62px; margin-top:-30px;}

    </style>    

    <div class="p_re evtContent NSK" id="evtContainer"> 
        <div class="evtCtnsBox evt_04" >
            <img src="https://static.willbes.net/public/images/promotion/main/2003/3103_04.jpg" alt="psat to easy" id="to_go">
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/main/2003/3103_cts01.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/main/2003/3103_cts02.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/main/2003/3103_cts03.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/main/2003/3103_cts04.png" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/main/2003/3103_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/main/2003/3103_right.png"></a></p>
            </div>
        </div>

    </div>

    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
        });        
    </script>
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop