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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/


        /************************************************************/

        .sky {position:fixed;top:200px;right:10px;z-index:100;}
        .sky a {display:block; margin-bottom:10px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/11/2825_top_bg.jpg) no-repeat center top; height:1910px}
        .evtTop .mainImg {position:absolute; top:350px; left:50%; margin-left:-362.5px}
        .evtTop a {position:absolute; bottom:500px; left:50%; margin-left:200px}
        .evtTop .btns {position:absolute; bottom:125px; left:50%; margin-left:-400px}
        .evtTop .btns span {width:256px; height:218px; display:inline-block; margin-right:14px; background-position:left top}
        .evtTop .btns span:nth-child(1) {background:url(https://static.willbes.net/public/images/promotion/2022/11/2825_top_img01.png) no-repeat}
        .evtTop .btns span:nth-child(2) {background:url(https://static.willbes.net/public/images/promotion/2022/11/2825_top_img02.png) no-repeat}
        .evtTop .btns span:nth-child(3) {background:url(https://static.willbes.net/public/images/promotion/2022/11/2825_top_img03.png) no-repeat}
        .evtTop .btns span:hover {background-position:right top}

        .evt01 {background:#2D57A3}

        .evt02 {background:#37383A;position:relative;}
        .youtube {position:absolute; top:582px; left:50%;z-index:1;margin-left:-430px}
        .youtube iframe {width:860px; height:484px}

        .evt03 {background:#F5F5F5}

        .evt05 {background:#F5F5F5;}
        .evt05 .infoText {margin-top:50px; color:#fff; font-size:30px}
        /* 슬라이드배너 */
        .slide_con {position:relative ; width:533px; margin:0 auto}
        .slide_con p {position:absolute; top:38%; width:533px; height:82px; margin-top:-41px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-350px}
        .slide_con p.rightBtn {right:-350px}
        #slidesImg4 {width:669px; height:370px; margin:0 auto; overflow:hidden}
        #slidesImg4 li {display:inline; float:left}
        #slidesImg4:after {content::""; display:block; clear:both}

        .evt06 {background:#F5F5F5;}

        .evt07 {padding-bottom:100px; width:1120px; margin:0 auto}
        .evt07 .title {font-size:30px; font-weight:bold; margin-bottom:10px; text-align:left}

        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
        }
        .b-close {
            right: 10px;
            top: 50px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
        }
        .Pstyle .content {height:auto; width:auto;}

    </style>
    
    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#lec"><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_sky.png" alt="경찰학 박살내기 삼총사"></a>          
        </div>
        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_top_img.png"  alt="경찰학 김재규" data-aos="flip-down" class="mainImg"/>
            <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51424?subject_idx=2128&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%2823%EB%85%84%EB%8C%80%EB%B9%84%29" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_top_btn.png" alt="교수홈"  data-aos="fade-left"/></a>     
            <div class="btns">
                <span></span>
                <span></span>
                <span></span>
            </div>  
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_01.jpg"  alt="오리지날 경찰학"/>    
            <div class="youtube">
                {{--<iframe src="https://www.youtube.com/embed/DNmn4xIMyTU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
            </div>          
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_02.jpg"  alt="합격률"/>               
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">      
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_03.jpg"  alt="커리큘럼"/>    
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_04.jpg"  alt="경찰학 교재"/>
                <a href="javascript:go_popup1()" title="핵심 서브노트" style="position: absolute;left: 40.66%;top: 45.25%;width: 14.69%;height: 2.89%;z-index: 2;"></a>
                <a href="javascript:go_popup2()" title="21개년 총알기출 ox" style="position: absolute;left: 40.66%;top: 65.65%;width: 14.69%;height: 2.89%;z-index: 2;"></a>
                <a href="javascript:go_popup3()" title="플러스 100제" style="position: absolute;left: 40.66%;top: 86.05%;width: 14.69%;height: 2.89%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_05.jpg"  alt="리얼 수강후기" />
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment01.png" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment02.png" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment03.png" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment04.png" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment05.png" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment06.png" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment07.png" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment08.png" alt="" /></li>                 
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2022/11/arrow_left.png" alt="left" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2022/11/arrow_right.png" alt="right" /></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt06">      
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_06.jpg"  alt="그레이스 호퍼 명언"/>    
        </div>

        <div class="evtCtnsBox evt07" data-aos="fade-up" id="lec">                     
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_07.jpg"  alt="후회없는 선택"/>
            {{--
            <div class="title">박우찬 경찰학 단과강의 신청 > </div>        
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2737_05_01.jpg"  alt="곧 공개"/>  
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif
            <div class="title mt100">박우찬 경찰학 무료강의 신청 > </div>  
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
            --}}
        </div>

        <!--레이어팝업-->
        <div id="popup1" class="Pstyle">
            <span class="b-close"></span>
            <div class="content1">                  
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_textbook01.png" class="off" alt="" />    
            </div> 
        </div>    
        <div id="popup2" class="Pstyle">
            <span class="b-close"></span>   
            <div class="content2">         
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_textbook02.png" class="off" alt="" />  
            </div> 
        </div>
        <div id="popup3" class="Pstyle">    
            <span class="b-close"></span>
            <div class="content3">            
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_textbook03.png" class="off" alt="" />  
            </div>
        </div>

    </div>

    <!-- End Container -->
    
    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
      /* 슬라이드배너 */
      $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal',
                auto:true,
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

        /*레이어팝업*/     

        function go_popup1() {
            $('#popup1').bPopup();
        }   
        function go_popup2() {
            $('#popup2').bPopup();
        }
        function go_popup3() {
            $('#popup3').bPopup();
        }

    </script>
      
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop