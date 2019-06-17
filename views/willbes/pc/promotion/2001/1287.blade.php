@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:280px;
            right:0;
            z-index:1;
        }

        /*타이머*/
        .time {width:100%; text-align:center; background:#ebebeb}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:20px; color:#000; letter-spacing: -1px; text-align:left}
        .time span {color:#ffda39; font-size:28px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time table td:last-child,
        .time table td:last-child span {font-size:40px}
        @@keyframes upDown{
        from{color:#000}
        50%{color:#a78de6}
        to{color:#000}
        }
        @@-webkit-keyframes upDown{
        from{color:#000}
        50%{color:#a78de6}
        to{color:#000}
        }

        .wb_top {background:#353a41 url(https://static.willbes.net/public/images/promotion/2019/06/1287_top_bg.jpg) no-repeat center top; position:relative}
        .wb_top span {position:absolute; left:50%; z-index:1;
            -webkit-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -moz-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -ms-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -o-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
        }
        .wb_top span.img1 {top:370px; margin-left:-330px; width:560px; animation:iptimg1 0.5s ease-in;-webkit-animation:iptimg1 0.5s ease-in;}
        .wb_top span.img2 {top:430px; margin-left:-285px; width:546px; animation:iptimg2 0.5s ease-in;-webkit-animation:iptimg2 0.5s ease-in;}
        @@keyframes iptimg1{
        from{margin-left:-560px; opacity: 0;}
        to{margin-left:-330px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
        from{margin-left:-560px; opacity: 0;}
        to{margin-left:-330px; opacity: 1;}
        }
        
        @@keyframes iptimg2{
        from{margin-left:0; opacity: 0;}
        to{margin-left:-285px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg2{
        from{margin-left:0; opacity: 0;}
        to{margin-left:-285px; opacity: 1;}
        }

        .wb_00 {background:url(https://static.willbes.net/public/images/promotion/2019/06/1287_00_bg.jpg) no-repeat center top;}
        .wb_01 {background:#343434}
        .wb_02 {background:#24272d url(https://static.willbes.net/public/images/promotion/2019/06/1287_02_bg.jpg) no-repeat center top;}
        .wb_03 {background:#f0c756; padding:150px 0}
        .wb_04 {background:#fff}
        .wb_05 {background:#636363; padding:60px 0 100px}

        /* 슬라이드 */
        .slide_con {position:relative; width:900px; margin:0 auto;}	
        .slide_con p {position:absolute; top:50%; width:30px; height:61px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-60px; top:46%; width:30px; height:61px;}
        .slide_con p.rightBtn {right:-60px;top:46%; width:30px; height:61px;}
    </style>


    <div class="p_re evtContent NGR" id="evtContainer">        
        {{--
        <div class="skybanner" >
            <a href="#wb_04"><img src="https://static.willbes.net/public/images/promotion/2019/06/1287_skybanner.png" alt="스카이배너" ></a>
        </div>       
        --}}

        <div class="evtCtnsBox wb_00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1287_00.jpg" alt="문제풀이" />
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1287_top.jpg" alt="실전 문제풀이 패키지"/>
            <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2019/06/1287_top_img1.png" alt="화살표"></span>
            <span class="img2"><img src="https://static.willbes.net/public/images/promotion/2019/06/1287_top_img2.png" alt="손"></span>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1287_01.jpg" alt="문제풀이과정 커리큘럼" />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1287_02.jpg" alt="교수진" />
        </div>

        <div class="evtCtnsBox wb_03" >
            <div class="slide_con">
                <ul id="slidesImg">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1287_03_01.png" alt="문플특징1" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1287_03_01.png" alt="문플특징2" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1287_03_01.png" alt="문플특징3" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2019/06/1287_arrow_l.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2019/06/1287_arrow_r.png"></a></p>
            </div>   
        </div>

        <div class="evtCtnsBox wb_04" id="wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1287_04.jpg"  alt="이벤트" usemap="#Map1287A" border="0" />
            <map name="Map1287A" id="Map1287A">
                <area shape="rect" coords="124,615,284,661" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/154678" target="_blank" alt="일반경찰 원유철 신청하기" />
                <area shape="rect" coords="481,614,636,661" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/154677" target="_blank" alt="문풀 패키지 오태진" />
                <area shape="rect" coords="837,612,993,663" href="https://police.willbes.net/periodPackage/show/cate/3002/pack/648001/prod-code/154679" target="_blank" alt="문풀패키지" />
            </map>
            <div>
                페이지 하단 신광은경찰PASS 이용안내를 모두 확인하였고, 이에 동의합니다.      이용안내확인하기 ↓ 
                ※ 강의공유, 콘텐츠 부정 사용 적발 시, 회원 자격 박탈 및 환불이 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.
            </div>
        </div>

        <div class="evtCtnsBox wb_05" >
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1287_05.jpg"  alt="유의사항"/>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg = $("#slidesImg").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:980,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,

                });
            
                $("#imgBannerLeft").click(function (){
                    slidesImg.goToPrevSlide();
                });
            
                $("#imgBannerRight").click(function (){
                    slidesImg.goToNextSlide();
                });
        });
    </script>
@stop