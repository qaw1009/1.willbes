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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {position:fixed; top:250px; right:10px; z-index:1;}
        .skybanner ul li {padding-bottom:10px;}

        .wb_top {background:#D63942 url(https://static.willbes.net/public/images/promotion/2020/06/1687_top_bg.jpg) center top no-repeat}

        .wb_cts01 {background:#fff;}
        
        .wb_cts02 {background:#ECECEC url(https://static.willbes.net/public/images/promotion/2020/06/1687_02_bg.jpg) center top no-repeat}

        .wb_cts03 {background:#383838}

        .wb_cts04 {background:#d63941 url(https://static.willbes.net/public/images/promotion/2020/06/1687_04_bg.jpg) center top no-repeat}

        /* 슬라이드배너 */
        .bannerImg1 {position:relative; width:450px; margin:0 auto;z-index:10;left:50%;margin-left:50px;bottom:980px;}
        .bannerImg1 p {position:absolute;width:65px; z-index:100;}       
        .bannerImg1 p a {cursor:pointer}
        .bannerImg1 p.left_arr {left:-15%;top:40%;width:65px; height:65px;}
        .bannerImg1 p.right_arr {right:-15%;top:40%; width:65px; height:65px;}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">      

        <div class="skybanner">
            <ul>          
                <li><a href="https://pass.willbes.net/pass/support/notice/show?board_idx=278985&" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/2020/06/1577_sky.png"  title="기미진 기특한 국어" /></a></li>
            </ul>
        </div>       

        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1687_top.jpg" alt="왕기초 클라쓰" />            
        </div>    

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1687_01.jpg" alt="불꽃 소방" />         
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1687_02.jpg" title="클라쓰 교수진" />     
            <div class="bannerImg1">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1687_02_comment01.png" title="1"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1687_02_comment02.png" title="2"/></li>
                </ul>
                <p class="left_arr"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2020/06/1687_left.png"></a></p>
                <p class="right_arr"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2020/06/1687_right.png"></a></p>
            </div>  
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1687_03.jpg" alt="기초 클라쓰 스텝" />         
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1687_04.jpg" alt="기초 완성하기" usemap="#Map1687a" border="0" />
            <map name="Map1687a" id="Map1687a">
                <area shape="rect" coords="294,679,820,779" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3050&search_text=UHJvZE5hbWU66riw7LSI#none" target="_blank" />
            </map>          
        </div>

    </div>
    <!-- End Container -->

    <script>
        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg1").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:1210,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
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