@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2023/01/2883_01_bg.jpg) no-repeat center top;}

        .wb_cts05 {background:#E1E9FF;padding-bottom:100px;}
        .wb_cts05 .slide_con {width:1120px; margin:0 auto; position:relative}
        .wb_cts05 .slide_con p {position:absolute; top:35%; width:30px; z-index:90}
        .wb_cts05 .slide_con p a {cursor:pointer}
        .wb_cts05 .slide_con p.leftBtn {left:-115px; top:50%; width:62px; height:62px; margin-top:-30px;}
        .wb_cts05 .slide_con p.rightBtn {right:-85px; top:50%; width:62px; height:62px; margin-top:-30px;}

        .wb_cts06 {background:#2A5DFF}

        .wb_cts03 {background:#F1F1F1;padding:150px 0 100px;}
        .wb_cts03 .tabBox {position:relative; width:1120px; margin:0 auto 40px;}
        .wb_cts03 .tab li {display:inline; float:left; width:25%;}
        .wb_cts03 .tab li a {display:block; text-align:center; font-size:22px; font-weight:600; background:#222; color:#fff; height:60px; line-height:60px;margin-right:1px}
        .wb_cts03 .tab li a:hover,
        .wb_cts03 .tab li a.active {background:#2A5DFF; color:#fff;}
        .wb_cts03 .tab li:last-child a {margin:0}
        .wb_cts03 .tab:after {content:""; display:block; clear:both}

        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
        }
        .b-close {
            position: absolute;
            right: 10px;
            top: 50px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
        }
        .Pstyle .content {height:auto; width:auto;}
        
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_cts01"  data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2883_01.jpg" alt="팀 gs2순환"/>
        </div>

        <div class="evtCtnsBox wb_cts05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2883_05.jpg" alt="커리큘럼"/>  
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2883_05_01.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2883_05_02.jpg" /></li>  
                    <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2883_05_03.jpg" /></li>    
                    <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2883_05_04.jpg" /></li>   
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2023/01/2883_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2023/01/2883_right.png"></a></p>
            </div><br><br><br><br><br>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2883_05s.jpg" alt="학습효과 극대화"/>
                <a href="javascript:go_popup2()" title="프로그램 바로보기" style="position: absolute;left: 29.23%;top: 67.35%;width: 41.48%;height: 13.46%;z-index: 2;"></a>
            </div>
        </div>
        
        <div class="evtCtnsBox wb_cts06" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2883_06.jpg" alt="7급 하격을 위한 초격차 전략"/>
        </div>

        <div class="evtCtnsBox wb_cts07" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2883_07.jpg" alt="학습 프로그램"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
        </div>
        
        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2883_02.jpg" alt="gs2순환"/>
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&campus_ccd=605002" target="_blank" title="7급 2차" style="position: absolute;left: 25.55%;top: 89.85%;width: 49.02%;height: 5.59%;z-index: 2;"></a>               
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03" data-aos="fade-up">        
            <div class="tabBox">
                <ul class="tab">
                    <li><a href="#tab01" class="active">헌법 선동주</a></li>
                    <li><a href="#tab02">행정법 이승민</a></li>
                    <li><a href="#tab03">행정학 김철</a></li>
                    <li><a href="#tab04">경제학 박태천</a></li>
                </ul>
                <div id="tab01">
                    <div class="wrap">
                        <img src="https://static.willbes.net/public/images/promotion/2023/01/2883_03_01.jpg" alt="헌법 선동주">
                        <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/free/prod-code/204778" target="_blank" title="헌법 선동주" style="position: absolute;left: 38.23%;top: 75.95%;width: 51.48%;height: 13.46%;z-index: 2;"></a>
                    </div>
                </div>
                <div id="tab02">
                    <div class="wrap">
                        <img src="https://static.willbes.net/public/images/promotion/2023/01/2883_03_02.jpg" alt="행정법 이승민">
                        <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/free/prod-code/204695" target="_blank" title="행정법 이승민" style="position: absolute;left: 38.23%;top: 75.95%;width: 51.48%;height: 13.46%;z-index: 2;"></a>
                    </div>    
                </div>
                <div id="tab03">
                    <div class="wrap">
                        <img src="https://static.willbes.net/public/images/promotion/2023/01/2883_03_03.jpg" alt="행정학 김철">
                        <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/free/prod-code/204698" target="_blank" title="행정학 김철" style="position: absolute;left: 38.23%;top: 75.95%;width: 51.48%;height: 13.46%;z-index: 2;"></a>
                    </div>     
                </div>
                <div id="tab04">
                    <div class="wrap">
                        <img src="https://static.willbes.net/public/images/promotion/2023/01/2883_03_04.jpg" alt="경제학 박태천">
                        <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/free/prod-code/204762" target="_blank" title="경제학 박태천" style="position: absolute;left: 38.23%;top: 75.95%;width: 51.48%;height: 13.46%;z-index: 2;"></a>
                    </div>    
                </div>
            </div> 
        </div>

        <div class="evtCtnsBox wb_cts04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2883_04.jpg" alt="통합관리 시스템"/>
                <a href="javascript:go_popup1()" title="학습 시간표 자세히 보기" style="position: absolute;left: 31.03%;top: 60.35%;width: 37.48%;height: 5.56%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04s pb100" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2883_04s.jpg" alt="gs순환 프로그램"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif
        </div>

         <!--레이어팝업-->
         <div id="popup1" class="Pstyle">
            <span class="b-close">X</span>
            <div class="content1">                  
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2883_schedule.jpg" class="off" alt="스케줄" />    
            </div> 
        </div>    
        <div id="popup2" class="Pstyle">
            <span class="b-close">X</span>   
            <div class="content2">         
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2883_program.jpg" class="off" alt="프로그램" />  
            </div> 
        </div>

    </div>

   <!-- End Container -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script>
     /*레이어팝업*/   

     function go_popup1() {
            $('#popup1').bPopup();
        }   
        function go_popup2() {
            $('#popup2').bPopup();
        }

        /*탭*/
        $(document).ready(function(){
            $('.tab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})})}
        );        
        /*슬라이드*/
        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
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

    </script>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
    </script>
    
@stop