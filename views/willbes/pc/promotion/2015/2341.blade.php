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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed;top:150px;right:10px;z-index:1;} 
        .sky a {display:block; margin-bottom:10px; box-shadow:0 5px 5px rgba(0,0,0,.1);}
        
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
            position: absolute;left: 34.2%; top: 73.1%; width: 33.39%; height: 12.34%; line-height:2.8; z-index: 2;
            color:#fff; background:#ff49b8; font-size:24px; border-radius:50px; border:4px solid #fff;
        }
        .evt03 .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5); background:#0d182e; color:#ff49b8}

        .evt04 {background:#38304b}
                
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="https://willbesedu.willbes.net/pass/offLecture/index?cate_code=3130&subject_idx=" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2341_sky.png" alt="입실신청" >
            </a>           
        </div>

        <div class="evtCtnsBox evtTop p_re">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2341_top_txt.png" title="윌비스 스파르타 독서실" data-aos="fade-down">     
            </div> 
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2341_top.jpg" title="교수진">                
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2341_01.jpg" title="인천 윌비스 스파르타 독서실 혜택">
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
        
        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2341_02.jpg" title="스파르타 독서실 일과표">     
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2341_03.jpg" title="가격">
                <a href="https://willbesedu.willbes.net/pass/offLecture/index?cate_code=3130&subject_idx=" target="_blank" class="NSK-Black">스파르타 독서실 신청하기 ></a>
            </div>            
        </div>
        
        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2341_04.jpg" title="6개월 할인 패키지">
                <a href="https://willbesedu.willbes.net/pass/offLecture/show/cate/3130/prod-code/202237" target="_blank" title="바로가기" style="position: absolute;left: 33.13%;top: 73.44%;width: 33.73%;height: 11.89%;z-index: 2;"></a>
            </div>
        </div>

    </div>
   <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
    </script>

    <script>        
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