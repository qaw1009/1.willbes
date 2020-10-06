@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; position:relative}
        .evtCtnsBox img {width:100%; max-width:720px;}

        .evtTop {position:relative; }
        .evtTop .txt01 {padding:10px 0; font-size:20px; background:#f4f4f4}
        .slide_con {height:auto; max-height:700px; overflow:hidden}
        .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0;}     
        .slide_con .bx-wrapper .bx-pager {        
            width: auto;
            top: 0px;
            left:0;
            right:0;
            text-align: center;
            z-index:99;
        }   
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
            background: #ccc;
            width: 14px;
            height: 14px;
            margin: 0 4px;
            border-radius:10px;
        }
        
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover, 
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
            background: #000;
        }
        .slide_con p {position:absolute; top:50%; margin-top:-35px; width:47px; height:70px; z-index:110}
        .slide_con p img {width:100%}
        .slide_con p.leftBtn {left:10px}
        .slide_con p.rightBtn {right:10px}

        /* 폰 가로, 태블릿 세로*/
        @@media only all and (min-width: 320px)  {        
            .slide_con p {margin-top:-15px; width:20px;}
        }

        /* 태블릿 세로 */
        @@media only all and (min-width: 768px) {
            .slide_con p {margin-top:-35px; width:47px;}       
        }
        

        /************************************************************/
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox evtTop">
            <div class="slide_con">
                <ul id="slidesImg1" class="bSlider">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1837m_01.jpg" alt="김정환"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1837m_02.jpg" alt="정문진"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1837m_03.jpg" alt="황채영"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1837m_04.jpg" alt="안혜빈"/></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2020/10/1837_arrowL2.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2020/10//1837_arrowR2.png"></a></p>
            </div> 
            <div class="NSK-Black txt01">성공스토리 with 1억뷰 N잡</div>
        </div> 
        
        <div class="evtCtnsBox mt50">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1837m_05.jpg" alt="리얼한 성공사례" >     
        </div>

        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1837m_06.jpg" alt="" >
        </div>

        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1837m_07.jpg" alt="" usemap="#Map1837" border="0" >
            <map name="Map1837">
                <area shape="rect" coords="100,1134,619,1212" href="https://www.willbes.net/member/join/?ismobile=1&sitecode=2014" alt="회원가입">
            </map>
        </div>
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
    <script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg1").bxSlider({
                auto: true, 
                speed: 500, 
                pause: 4000, 
                mode:'fade', 
                autoControls: false, 
                controls:false,
                pager:true,
                onSliderLoad: function(){
                    $(".bSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
            $("#imgBannerLeft").click(function (){
                slidesImg1.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg1.goToNextSlide();
            });            
        });
    </script>
@stop