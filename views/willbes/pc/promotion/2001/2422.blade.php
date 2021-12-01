@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .skybanner {position:fixed;top:200px; width:120px; right:10px;z-index:1;}        
        .skybanner a {display:block;}

        .evt00 {background:#0a0a0a}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/12/2422_top_bg.jpg) no-repeat center; position:relative}  
        .wb_top .youtube {position:absolute; top:946px; left:50%; width:978px; z-index:1;margin-left:-489px; box-shadow:0 10px 20px rgba(0,0,0,.3);}
        .wb_top .youtube iframe {width:978px; height:505px}      
        
        .wb_01 {background:#5a14d6}
        .wb_02 {position:relative; padding-bottom:150px}
        .wb_02 .youtube {width:717px; margin:0 auto; }
        .wb_02 .youtube iframe {width:717px; height:374px; margin-left:150px; box-shadow:0 10px 20px rgba(0,0,0,.3);}


        .wb_03 {background:#f2f0f0; padding-bottom:150px}
        .slide_con {position:relative; width:944px; margin:0 auto}	
        .slide_con p {position:absolute; top:50%; margin-top:-30px; width:61px; height:61px; z-index:100}
        .slide_con p a {cursor:pointer;  width:61px; height:61px;}
        .slide_con p.leftBtn {left:-30px;}
        .slide_con p.rightBtn {right:-30px;}       

        .wb_05 {padding-bottom:150px; background:#f1f1f1}    
        .wb_05 .youtube {width:717px; margin:0 auto; }
        .wb_05 .youtube iframe {width:717px; height:374px; margin-left:50px; box-shadow:0 10px 20px rgba(0,0,0,.3);}
        .wb_05 .comingsoon {width: 721px; margin:0 auto; padding-left:50px;}    
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">      
        <div class="skybanner" id="QuickMenu">
            <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51146?subject_idx=1049&subject_name=%ED%97%8C%EB%B2%95%2822%EB%85%84%EB%8C%80%EB%B9%84%29" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/11/2422_sky01.jpg" alt="교수소개" ></a>
            <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51146?subject_idx=1049&subject_name=%ED%97%8C%EB%B2%95%2822%EB%85%84%EB%8C%80%EB%B9%84%29&tab=open_lecture" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/11/2422_sky02.jpg" alt="강의확인" ></a>
            <a href="https://police.willbes.net/book/index/cate/3001?cate_code=3001&subject_idx=1049&search_text=d0F1dGhvck5hbWVzOuq5gOybkOyasQ%3D%3D" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/11/2422_sky03.jpg" alt="교재확인" ></a>
            <a href="https://www.youtube.com/channel/UCMVc2RbvQeJ_574VzzpPzpg" class="mt10" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/11/2422_sky04.jpg" alt="유튜브" ></a>
            <a href="https://cafe.naver.com/wonwook2021" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/11/2422_sky05.jpg" alt="카페" ></a>
        </div>  

        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>    

        <div class="evtCtnsBox wb_top" id="main">            
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2422_top.jpg" alt="김원욱 경찰헌법"/>             
		</div>        
        {{--
        <div class="evtCtnsBox wb_01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2422_01.jpg"  alt="딱맞는 플랜"/>            	
		</div>
        
        <div class="evtCtnsBox wb_02" >
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2422_02_01.jpg"  alt="경찰헌법 커리큘럼"/>
            <div class="youtube" data-aos="fade-right">
                <iframe src="https://www.youtube.com/embed/xCaNQU2R_h8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>	
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2422_02_02.jpg"  alt="경찰헌법 커리큘럼"/>
            <div class="youtube" data-aos="fade-right">
                <iframe src="https://www.youtube.com/embed/RGS2dBNNjss?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>	
		</div>
               
        <div class="evtCtnsBox wb_03" >
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2422_03.jpg"  alt="체계적인 합습 컨텐츠"/>	
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2422_03_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2422_03_02.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2021/11/2422_arr_l.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2021/11/2422_arr_r.png"></a></p>
            </div>		
		</div>
        --}}
        <div class="evtCtnsBox wb_04" id="evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2422_04.jpg"  alt="김원욱 헌법 최신강의"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif	
		</div>    
        
        <div class="evtCtnsBox wb_05" >
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2422_05_01.jpg" alt="경찰헌법 기본이론"/>
            <div class="youtube" data-aos="fade-right">
                <iframe src="https://www.youtube.com/embed/UB91DCctYgU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>	
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2422_05_02.jpg" alt="경찰헌법 심화이론"/>
            <div class="youtube" data-aos="fade-right">
                <iframe src="https://www.youtube.com/embed/k2svtoINzm0?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2422_05_03.jpg" alt="경찰헌법 심화기출"/>
            <div class="youtube" data-aos="fade-right">
                <iframe src="https://www.youtube.com/embed/xpxf6BfraTQ?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2422_05_04.jpg"  alt="경찰헌법 문제풀이"/><br>
            <div class="comingsoon"><img src="https://static.willbes.net/public/images/promotion/2021/11/2422_05_05.jpg" alt=""/></div>
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
    </script>
@stop