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
            margin-bottom:-215px;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /*****************************************************************/

    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/05/2649_top_bg.jpg) no-repeat center top;}
    .evt_top .ani{position:absolute;left:50%;top:275px;margin-left:-310px} 
    /**/
    .evt_top .roll_wave {position:relative;overflow:hidden;width:1120px;margin:-100px auto 0;left:275px;bottom:975px;}       
	.evt_top .wr_waves .slide {padding:25px 0;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2649_top.jpg" alt="김동진 법원팀">
            <div class="ani">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2649_title.png" alt="티패스" data-aos="zoom-in">
            </div>
            <div class="roll_wave">
                <div class="wr_waves NSK-Black">                  
                    <div class="slide">
                        <img src="https://static.willbes.net/public/images/promotion/2022/05/2649_wave01.png" alt=""> 
                    </div>
                    <div class="slide">
                        <img src="https://static.willbes.net/public/images/promotion/2022/05/2649_wave02.png" alt=""> 
                    </div>
                    <div class="slide">
                        <img src="https://static.willbes.net/public/images/promotion/2022/05/2649_wave03.png" alt=""> 
                    </div>
                    <div class="slide">
                        <img src="https://static.willbes.net/public/images/promotion/2022/05/2649_wave04.png" alt=""> 
                    </div>
                    <div class="slide">
                        <img src="https://static.willbes.net/public/images/promotion/2022/05/2649_wave05.png" alt=""> 
                    </div>
                    <div class="slide">
                        <img src="https://static.willbes.net/public/images/promotion/2022/05/2649_wave06.png" alt=""> 
                    </div>
                </div>              
            </div>   
        </div>

    </div>
   <!-- End Container -->

   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );      
    </script>

    <link rel="stylesheet" type="text/css" href="/public/vendor/jquery/slick/slick.css">
    <script src="/public/vendor/jquery/slick/jquery.slick.min.js"></script>
    <script type="text/javascript">
        $ ('.wr_waves').slick({
            dots: false,
            arrows: true,
            infinite: true,
            autoplay:true,
            autoplaySpeed:0,
            speed: 2500,
            slidesToShow: 5,
            slidesToScroll: 1,
            adaptiveHeight: true,
            draggable: false,
            cssEase: 'linear',
            pauseOnHover:false,
            vertical:true
        });       
    </script>

@stop