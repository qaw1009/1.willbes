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
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
    /*****************************************************************/ 
    .skybanner {position:fixed; top:225px; width:150px; right:10px;z-index:1;}
    .skybanner a {display:block; margin-bottom:10px}

    .evt00 {background:#0a0a0a}
    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/11/1926_top_bg.jpg) no-repeat center top;}  
    .evt_top .youtube {width:726px; position:absolute; top:1566px; left:50%; margin-left:-363px; z-index:5}
    .evt_top .youtube iframe {width:726px; height:380px;} 

    .evt01 {background:#2c2c2c url(https://static.willbes.net/public/images/promotion/2020/11/1926_01_bg.jpg) no-repeat center bottom;}   
    /**/
    .evt01 .roll_starwars {position:relative;overflow:hidden;width:1120px;margin:-100px auto 0;text-align:left;
        transform-origin: 50% 100%;transform:perspective(45px) rotateX(4deg)}
	.evt01 .wr_starwars .slide {padding:15px 0; text-align:center; font-size:30px; color:#fff; line-height:1.5}

    .evt02 {background:#454545;}
    .slide_con {position:absolute; width:911px; left:50%; top:544px; margin-left:-455px; z-index:10}
    .slideBox {position:relative}
    .slide_con p {position:absolute; top:50%; width:56px; height:56px; margin-top:-28px; z-index:20}
    .slide_con p a {cursor:pointer}
    .slide_con p.leftBtn {left:-100px}
    .slide_con p.rightBtn {right:-100px}
    .evt02 .reply {position:absolute; top:1156px; left:50%; margin-left:-441px; width:882px; z-index:1}

    .evt03 {background:#262626} 
    .evt03 .youtube {width:622px; position:absolute; top:644px; left:50%; margin-left:-494px; z-index:5}
    .evt03 .youtube.youtube2 {top:1227px; margin-left:-130px}
    .evt03 .youtube.youtube3 {top:1810px;}
    .evt03 .youtube iframe {width:622px; height:348px;}     

    .evt04 {background:#323232 url(https://static.willbes.net/public/images/promotion/2020/11/1926_04_bg.jpg) no-repeat center bottom;}     
    .evt04 .youtube {width:695px; position:absolute; top:463px; left:50%; margin-left:-347px; z-index:5}
    .evt04 .youtube iframe {width:695px; height:380px;} 

    .evt05 {background:#e7e7e8; padding-bottom:100px} 

    </style>

    <div class="evtContent NGR" id="evtContainer"> 
        <div class="skybanner">
            <a href="#evt05"><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_sky01.jpg" alt="형사법 시작부터 제대로"/></a>
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
                <iframe src="https://www.youtube.com/embed/fdzMRbzjJbU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_01.jpg" alt="이미 준비된 신광은 형사법">  
            <div class="roll_starwars">
                <div class="wr_roll wr_starwars NSK-Black">
                    <div class="slide">
                        경찰대학 졸업 제 47회 사법고시 합격, 사법연수원 37기 수료
                    </div>
                    <div class="slide">
                        前) 경찰종합학교(현, 경찰교육원) 수사학과 교수
                    </div>

                    <div class="slide">
                        前) 경찰대학, 중앙경찰학교, 경찰수사연수원, 해양경찰청 외래교수
                    </div>

                    <div class="slide">
                        前) 청와대 22경호대(대통령경호대) 서울기동단 등 초빙교수
                    </div>

                    <div class="slide">
                        前) 인천지방검찰청 검사(시보)
                    </div>

                    <div class="slide">
                        前) 서울 디지털대학 경찰학과 교수
                    </div>

                    <div class="slide">
                        前) 경찰청 채용시험 출제위원
                    </div>

                    <div class="slide">
                        前) 경찰공제회 경찰실무종합, 경찰실무Ⅱ 저자
                    </div>

                    <div class="slide">
                        前) 전국 공무원교육발전연구대회(강의대회)대통령상 수상(행정자치부 중앙공무원교육원 주관)
                    </div>
                    <div class="slide">
                        前) 2014 대한민국 50대 스타강사 선정(時事매거진)
                    </div>
                    <div class="slide">
                        前) 2014 대한민국 가치경영대상 수상(헤럴드경제)
                    </div>
                    <div class="slide">
                        前) 2014 올해의 新한국인 대상 교육인 대상 수상(시사투데이)
                    </div>
                    <div class="slide">
                        前) 2015 대한민국 문화경영대상 교육부문 수상(헤럴드경제)
                    </div>
                    <div class="slide">
                        現) 수사연수원 형사법 교수
                    </div>
                    <div class="slide">
                        現) 경찰청 법학교육컨텐츠 형사소송법 담당
                    </div>
                    <div class="slide">
                        現) 한남대학교 경찰행정학과 객원교수
                    </div>
                    <div class="slide">
                        現) 신림동 프라임 법학원 경찰간부/로스쿨 형사소송법 전임
                    </div>
                    <div class="slide">
                        現) 중앙경찰학교 형사법 교수
                    </div>
                    <div class="slide">
                        現) 경찰교육원 형사법 교수
                    </div>
                    <div class="slide">
                        現) 윌비스 신광은 경찰학원 형법/형사소송법/수사 전임
                    </div>
                    <div class="slide">
                        경찰 생활 : 157,680 시간 <br>
                        검사 시보 : 4,320 시간<br>
                        판사 시보 : 4,320 시간<br>
                        강의 시간 :  105,120 시간<br>
                        <br>
                        진행중 271,440시간 (계속 진행 중) <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="slide">
                        <br>
                    </div>
                    <div class="slide">
                        <br>
                    </div>
                </div>
            </div>    
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_01_bottom.jpg" alt="이미 준비된 신광은 형사법"> 
        </div>

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02.jpg" alt="신광은 이름이 곧 실력">
            <div class="slide_con">
                <div class="slideBox">
                    <ul id="slidesImg3">
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_01.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_02.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_03.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_04.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_05.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_06.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_07.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_08.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_09.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_10.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_11.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_12.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_13.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_02_14.png" alt="" /></li>
                    </ul>
                    <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_l_arr.png" alt="" /></a></p>
                    <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_r_arr.png" alt="" /></a></p>                    
                </div>
            </div>
            <div class="reply"><img src="https://static.willbes.net/public/images/promotion/2020/11/1926_reply.gif" alt="후기"></div>         
        </div>

        <div class="evtCtnsBox evt03" id="evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_03.jpg" alt="신광은 형사법은 차원이 다르다!">
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/dx4dJ9iEU3c?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube youtube2">
                <iframe src="https://www.youtube.com/embed/cgsX8mR01WM?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube youtube3">
                <iframe src="https://www.youtube.com/embed/-MxsOn8FKr4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>  

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_04.jpg" alt="신광은 형사법"> 
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/55o7INyZzG4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>           
        </div>

        <div class="evtCtnsBox evt05" id="evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_05_01.jpg" alt="형사법 미리 예습이 필요하다면!"> 
            {{--프로모션 동영상 강의 불러오기--}}
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
        </div>

        {{--
        <div class="evtCtnsBox evt06" id="evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_06_01.jpg" alt="형사법 런칭 소문내기" usemap="#Map1926_03" border="0">
            <map name="Map1926_03">
                <area shape="rect" coords="331,505,785,581" href="@if($file_yn[1] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="이미지다운로드">
                <area shape="rect" coords="317,734,474,823" href="http://cafe.daum.net/policeacademy" target="_blank" alt="경시모">
                <area shape="rect" coords="532,733,702,823" href="https://cafe.naver.com/polstudy" target="_blank" alt="경꿈사">
                <area shape="rect" coords="748,736,916,821" href="https://cafe.naver.com/kts9719" target="_blank" alt="닥공사">
            </map> 
        </div>
        --}}
        {{--홍보url
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif--}}

        {{--
        <div class="evtCtnsBox evt07" id="evt07">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1926_06_02.jpg" alt="신광은 이름이 곧 실력">
        </div>
        --}}
        {{--기본댓글
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif --}}                     
    </div>
    <!-- End Container --> 
    <link rel="stylesheet" type="text/css" href="/public/vendor/jquery/slick/slick.css">
    <script src="/public/vendor/jquery/slick/jquery.slick.min.js"></script>
    <script type="text/javascript">
        $ ('.wr_starwars').slick({
            dots: false,
            arrows: true,
            infinite: true,
            autoplay:true,
            autoplaySpeed:0,
            speed: 700,
            slidesToShow: 5,
            slidesToScroll: 1,
            adaptiveHeight: true,
            draggable: false,
            cssEase: 'linear',
            pauseOnHover:false,
            vertical:true
        });

        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:3,
                maxSlides:3,
                slideWidth:2000,
                slideMargin:10,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });        
    </script>   

@stop