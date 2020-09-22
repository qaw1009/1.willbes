@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/09/1839_top_bg.jpg) no-repeat center top; height:1800px; overflow:hidden}  
        .wb_top span {position:absolute; left:50%; z-index:10}

        .wb_top span.img1 {width:477px; margin-left:-400px; animation:iptimg1 0.5s ease-in;-webkit-animation:iptimg1 0.5s ease-in;}
        .wb_top span.img2 {width:340px; margin-left:20px; top:205px; animation:iptimg2 0.5s ease-in;-webkit-animation:iptimg2 0.5s ease-in;}
        @@keyframes iptimg1{
            from{top:-500px; opacity: 0;}
            to{top:0; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
            from{top:-500px; opacity: 0;}
            to{top:0; opacity: 1;}
        }
        
        @@keyframes iptimg2{
            from{margin-left:532px; opacity: 0;}
            to{margin-left:0; opacity: 1;}
        }
        @@-webkit-keyframes iptimg2{
            from{margin-left:532px; opacity: 0;}
            to{margin-left:0; opacity: 1;}
        }

        .wb_03 {width:1120px; margin:0 auto; position:relative}
        .wb_03 ul {position:absolute; width:215px; top:380px; left:710px; z-index:10}
        .wb_03 li {display:inline-block; float:left; width:58px; height:240px; margin-right:13px; cursor: pointer;}
        .wb_03 span {font-size:0; text-indent: -9999px;}
        .wb_03 li div {display:none; position:absolute; top:300px; left:50%; width:700px; margin-left:-600px; z-index:15}
        .wb_03 li:hover div {display:block}

        .wb_04 {} 
        .wb_05 {background:#5d57f6;} 

        /* 슬라이드배너 */
        .slide_con {position:relative; width:1120px; margin:30px auto}	
        .slide_con p {position:absolute; top:50%; width:52px; height:52px; margin-top:-26px; z-index:50}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:0;}
        .slide_con p.rightBtn {right:0;}
        .slide_con li {font-size:22px; height:52px; line-height:52px;}

        

        /*유의사항*/
        .wb_ctsInfo {background:#fff; width:1120px; margin:100px auto; display:block; 
            border:17px solid #555; padding:80px; line-height:1.5;}  
        .wb_ctsInfo h3 {font-size:36px !important; letter-spacing:-1px; margin-bottom:40px; color:#000;}        
        .wb_ctsInfo .big {font-size:18px; font-weight:bold; color:#000; margin-bottom:10px} 
        .wb_ctsInfo ul {margin-bottom:30px}       
		.wb_ctsInfo li {list-style:disc; margin-left:20px}

    </style>

    <div class="evtContent NSK" id="evtContainer">      
        <div class="evtCtnsBox wb_top">
            <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2020/09/1839_top01.png"  alt="사원증" /></span>
            <span class="img2"><img src="https://static.willbes.net/public/images/promotion/2020/09/1839_top02.png"  alt="전략이 보인다." /></span>
        </div>
        
        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1839_01_01.jpg"  alt=""  />
            <div class="slide_con NSK-Black">
                <ul id="slidesImg3">
                    <li>토익기준 550점 이상 (3년 유효)</li>
                    <li>영어 검정시험의 경우 토플(TOEFL), 텝스(TEPS), 지텔프(G-TELP), 플렉스(FLEX), 토셀(TOSEL)도 인정</li>
                    <li>한능검 3급 이상 (4년 유효)</li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2020/09/1805_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2020/09/1805_right.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1839_01_02.jpg"  alt=""  />
            <div class="slide_con NSK-Black">
                <ul id="slidesImg4">
                    <li>경행경채는 영어(검정제), 필기시험은 경찰학, 형사법, 범죄학으로 진행됩니다.</li>
                    <li>토익기준 550점 이상 (3년유효)</li>
                    <li>영어 검정시험의 경우 토플(TOEFL), 텝스(TEPS), 지텔프(G-TELP), 플렉스(FLEX), 토셀(TOSEL)도 인정</li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2020/09/1805_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2020/09/1805_right.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1839_01_03.gif"  alt=""  />   
            <ul>
                <li>
                    <span>경찰학</span>
                    <div><img src="https://static.willbes.net/public/images/promotion/2020/09/1839_01_03_img1.png"></div>
                </li>
                <li>
                    <span>형사법</span>
                    <div><img src="https://static.willbes.net/public/images/promotion/2020/09/1839_01_03_img2.png"></div>
                </li>
                <li>
                    <span>헌법</span>
                    <div><img src="https://static.willbes.net/public/images/promotion/2020/09/1839_01_03_img3.png"></div>
                </li>
            </ul>         
        </div> 

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1839_01_04.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1839_02.jpg"  alt=""  />
        </div>              
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:1120,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
                });
            
                $("#imgBannerLeft3").click(function (){
                    slidesImg3.goToPrevSlide();
                });
            
                $("#imgBannerRight3").click(function (){
                    slidesImg3.goToNextSlide();
                });
        });
        
        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:1120,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
                });
            
                $("#imgBannerLeft4").click(function (){
                    slidesImg4.goToPrevSlide();
                });
            
                $("#imgBannerRight4").click(function (){
                    slidesImg4.goToNextSlide();
                });
        });
    </script>
@stop