@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')

    <!-- Container -->
    <style type="text/css">
    .evtContent { 
        position:relative;            
        width:100% !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }	
    .evtContent span {vertical-align:auto}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
    /*****************************************************************/ 
    .skybanner {position:fixed; top:225px; width:170px; right:10px;z-index:1;}
    .skybanner a {display:block; margin-bottom:10px}

    .evt00 {background:#0a0a0a}
    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/11/1926_top_bg.jpg) no-repeat center top;}  
    .evt_top .youtube {width:726px; position:absolute; top:1566px; left:50%; margin-left:-363px; z-index:5}
    .evt_top .youtube iframe {width:726px; height:380px;} 

    .evt01 {background:#fff; padding-bottom:150px}   
    /**/
    .roll_starwars {width:1120px; margin:-150px auto 0; 
        transform-origin: 50% 100%; transform:perspective(45px) rotateX(4deg);}
    .wr_starwars {width:100%; height:400px;}
    .wr_starwars .slide {font-size:30px; color:#000; text-align:center; height:100px; line-height:100px}

    .evt02 {background:#e7e7e8;}
    .slide_con {position:absolute; width:911px; left:50%; top:544px; margin-left:-455px; z-index:10}
    .slideBox {position:relative}
    .slide_con p {position:absolute; top:50%; width:56px; height:56px; margin-top:-28px; z-index:20}
    .slide_con p a {cursor:pointer}
    .slide_con p.leftBtn {left:-100px}
    .slide_con p.rightBtn {right:-100px}

    .evt03 {background:#fff} 
    .evt03 .youtube {width:622px; position:absolute; top:644px; left:50%; margin-left:-494px; z-index:5}
    .evt03 .youtube.youtube2 {top:1227px; margin-left:-130px}
    .evt03 .youtube.youtube3 {top:1810px;}
    .evt03 .youtube iframe {width:622px; height:348px;}     

    .evt04 {background:#323b6d}     
    .evt04 .youtube {width:695px; position:absolute; top:463px; left:50%; margin-left:-347px; z-index:5}
    .evt04 .youtube iframe {width:695px; height:380px;} 

    .evt05 {background:#e7e7e8} 

    </style>

    <div class="evtContent NGR" id="evtContainer"> 
        <div class="skybanner">
            <a href="#evt06"><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_sky01.jpg" alt="소문내고 쿠폰받자"/></a>
            <a href="#evt07"><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_sky02.jpg" alt="형사법"/></a>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div> 

        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_top.jpg" alt="신광은 형사법 신세계" usemap="#Map1926_01" border="0">
            <map name="Map1926_01">
                <area shape="rect" coords="226,1452,434,1517" href="https://police.willbes.net/professor/show/cate/3001/prof-idx/50547?subject_idx=1004" target="_blank" alt="교수님 ">
            </map>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/hwTmR3domFU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_01.jpg" alt="이미 준비된 신광은 형사법">  
            <div class="roll_starwars NSK-Black">
                <div class="wr_roll wr_starwars">
                    <div class="slide">경찰대학 졸업 제 47회 사법고시 합격, 사법연수원 37기 수료 </div>
                    <div class="slide">前) 형사반장, 조사반장, 폭력주임, 형사계장</div>
                    <div class="slide">前) 경찰대학, 중앙경찰학교, 경찰수사연수원, 해양경찰청 외래교수</div>
                    <div class="slide">前) 청와대 22경호대(대통령경호대) 서울기동단 등 초빙교수</div>
                    <div class="slide">前) 인천지방검찰청 검사(시보)</div>
                </div>
            </div>     
        </div>

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02.jpg" alt="신광은 이름이 곧 실력">
            <div class="slide_con">
                <div class="slideBox">
                    <ul id="slidesImg4">
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_01.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_02.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_03.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_04.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_05.png" alt="" /></li>
                    </ul>
                    <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_l_arr.png" alt="left" /></a></p>
                    <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_r_arr.png" alt="right" /></a></p>
                </div>
            </div>           
        </div>

        <div class="evtCtnsBox evt03" id="evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_03.jpg" alt="신광은 형사법은 차원이 다르다!">
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/hwTmR3domFU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube youtube2">
                <iframe src="https://www.youtube.com/embed/hwTmR3domFU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube youtube3">
                <iframe src="https://www.youtube.com/embed/hwTmR3domFU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>  

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_04.jpg" alt="신광은 형사법"> 
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/hwTmR3domFU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>           
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_05_01.jpg" alt="형사법 미리 예습이 필요하다면!"> 
            {{--프로모션 동영상 강의 불러오기--}}
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_05_02.jpg" alt="형사법 미리 예습이 필요하다면!" usemap="#Map1926_02" border="0">
            <map name="Map1926_02">
                <area shape="rect" coords="269,435,461,497" href="#evt06" alt="추첨50명">
                <area shape="rect" coords="656,438,840,493" href="https://police.willbes.net/promotion/index/cate/3001/code/1864" target="_blank" alt="0원 PASS">
            </map>  
        </div>

        <div class="evtCtnsBox evt06" id="evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_06_01.jpg" alt="형사법 런칭 소문내기" usemap="#Map1926_03" border="0">
            <map name="Map1926_03">
                <area shape="rect" coords="331,505,785,581" href="@if($file_yn[1] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="이미지다운로드">
                <area shape="rect" coords="317,734,474,823" href="http://cafe.daum.net/policeacademy" target="_blank" alt="경시모">
                <area shape="rect" coords="532,733,702,823" href="https://cafe.naver.com/polstudy" target="_blank" alt="경꿈사">
                <area shape="rect" coords="748,736,916,821" href="https://cafe.naver.com/kts9719" target="_blank" alt="닥공사">
            </map> 
        </div>
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif

        <div class="evtCtnsBox evt07" id="evt07">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_06_02.jpg" alt="신광은 이름이 곧 실력">
        </div>
        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif                      
    </div>
    <!-- End Container --> 

    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg4").bxSlider({
                mode:'horizontal',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:2000,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });

        $(function() {
            //Count the number of li elements
            var bx_num01 = $(".roll_starwars").length;
            var ticker01 = $('.wr_starwars').bxSlider({
                minSlides: 4,
                maxSlides: 4,
                slideMargin: 10,
                ticker: true,
                mode: 'vertical',
                speed:10000*bx_num01
            });
        });
        
    </script>

@stop