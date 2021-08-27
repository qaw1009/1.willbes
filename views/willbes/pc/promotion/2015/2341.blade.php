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


        /************************************************************/  

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2341_top_bg.jpg) no-repeat center top;}
        .evtTop div {position:absolute; top:130px; left:0; width:100%; z-index: 1;}

        .evt01 .acadview {position:relative; height:234px; width:1120px; margin: 0 auto;}
        .evt01 .acadview .avslider {height:180px; overflow: hidden;}
        .evt01 .acadview .avslider li {display:inline; float:left; width: 25%;}
        .evt01 .acadview .avslider li a {display:block;} 
        .evt01 .acadview .avslider:after {content: ""; display: block; clear:both}
        .evt01 .acadview p {position:absolute; top:40%; margin-top:-22px; width:44px; height:45px; z-index:10}
        .evt01 .acadview p.leftBtn {left:-50px}
        .evt01 .acadview p.rightBtn {right:-50px}

        .evt03 .wrap {width:1120px; margin:0 auto; position:relative}
        .evt03 .wrap a {
            position: absolute;left: 34.2%; top: 71.1%; width: 33.39%; height: 12.34%; line-height:2.8; z-index: 2;
            color:#fff; background:#ff49b8; font-size:24px; border-radius:50px; border:4px solid #fff;
        }
        .evt03 .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5); background:#0d182e; color:#ff49b8}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop p_re">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2341_top_txt.png" title="윌비스 스파르타 독서실" data-aos="fade-down">     
            </div> 
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2341_top.jpg" title="">                
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2341_01.jpg" title="인천 윌비스 스파르타 독서실 혜택" data-aos="fade-right">
            <div class="acadview">
                <ul class="avslider">
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_01.jpg">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_02.jpg">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_03.jpg">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_04.jpg">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_05.jpg">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_06.jpg">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_07.jpg">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_08.jpg">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_09.jpg">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_10.jpg">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_11.jpg">
                    </li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>
            </div>
        </div>
        
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2341_02.jpg" title="스파르타 독서실 일과표"  data-aos="fade-left">     
        </div>

        <div class="evtCtnsBox evt03">
            <div class="wrap" data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2341_03.jpg" title="가격">
                <a href="https://willbesedu.willbes.net/pass/offLecture/index?cate_code=3130&subject_idx=" target="_blank" class="NSK-Black">스파르타 독서실 신청하기 ></a>
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

        $(function() {
            var slidesImg1 = $(".avslider").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:4,
                maxSlides:4,
                slideWidth: 280,
                slideMargin:12,
                autoHover: true,
                moveSlides:1,
                pager:true,
            });
            $("#imgBannerLeft1").click(function (){
                slidesImg1.goToPrevSlide();
            });
            $("#imgBannerRight1").click(function (){
                slidesImg1.goToNextSlide();
            });
        });
    </script>

@stop