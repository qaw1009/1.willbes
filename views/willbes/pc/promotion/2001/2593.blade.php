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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtContent span {vertical-align:auto}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}*/

        /************************************************************/

        .sky {position:fixed;top:200px;right:10px;z-index:100;}
        .sky a {display:block; margin-bottom:10px}     

        .evtTops {background:#1d2329}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/03/2593_top_bg.jpg) no-repeat center top;position:relative;}
        .youtube {position:absolute; top:614px; left:50%;z-index:1;margin-left:-114px}
        .youtube iframe {width:531px; height:312px}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2022/03/2593_01_bg.jpg) no-repeat center top;}

        /*슬라이드*/
        .slide_con {width:930px; margin:0 auto; position:relative}
        .slide_con p {position:absolute; top:50%; margin-top:-45px; width:39px; height:97px; z-index:90}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-100px;}
        .slide_con p.rightBtn {right:-63px;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51160?subject_idx=2127&subject_name=%ED%98%95%EC%82%AC%EB%B2%95%2822%EB%85%84%EB%8C%80%EB%B9%84%29" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2593_sky01.png" alt="형사법 신광은">
            </a>          
            <a href="https://www.youtube.com/channel/UCz_3g63yWTYjg6_Ko5QRK1g" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2593_sky03.png" alt="신광은 형사법 티비">
            </a>  
        </div>        

        <div class="evtCtnsBox evtTops" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2593_tops.jpg"  alt="신광은 경찰학원"/>
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2593_top.jpg"  alt="적중은 역시"/>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/8EaI2UoeU0g?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2593_01.jpg"  alt="생생 후기"/>            
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2593_02.jpg"  alt="적중 보기"/>
                <a href="https://police.willbes.net/support/notice/show?board_idx=396880&" target="_blank" title="더 많은 적중 보기" style="position: absolute;left: 23.19%;top: 33.25%;width: 53.78%;height: 8.34%;z-index: 2;"></a>
                <div class="slide_con">
                    <ul id="slidesImg4">
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/03/2593_02_01.jpg" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/03/2593_02_02.jpg" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/03/2593_02_03.jpg" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/03/2593_02_04.jpg" /></li>  
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/03/2593_02_05.jpg" /></li>                
                    </ul>
                    <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2022/03/2593_left.png"></a></p>
                    <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2022/03/2593_right.png"></a></p>
                </div>
            </div>                 
        </div>
                
        <div class="evtCtnsBox evt05" data-aos="fade-up">    
            <div class="wrap">          
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2593_05.jpg"  alt="2022 스페셜 단과"/>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운" style="position: absolute;left: 56.29%;top: 68.53%;width: 30.88%;height: 6.34%;z-index: 2;"></a>
            </div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
        </div>  

        <div class="evtCtnsBox evt06" data-aos="fade-up">
            <div class="wrap">                
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2593_06.jpg"  alt="pass"/>             
                <a href="https://police.willbes.net/home/index/cate/3001" target="_blank" title="온라인 인강" style="position: absolute;left: 12.39%;top: 12.73%;width: 36.88%;height: 17.34%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/home/index" target="_blank" title="학원 super" style="position: absolute;left: 50.89%;top: 12.73%;width: 36.88%;height: 17.34%;z-index: 2;"></a>
            </div>
        </div>       

    </div>

    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>    
    <script type="text/javascript">
        $(document).ready(function() {
            AOS.init();

            /*슬라이드*/
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:false,
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
      
{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop   