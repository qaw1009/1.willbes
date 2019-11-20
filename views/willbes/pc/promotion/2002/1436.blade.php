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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}


        /************************************************************/
        
        .skybanner2{position:fixed;top:350px;right:0;z-index:1;}

        .evt_police{background:#404040 url("https://static.willbes.net/public/images/promotion/2019/07/1328_police_bg.jpg") center top  no-repeat}

        .evt_top{background:#181818 url("https://static.willbes.net/public/images/promotion/2019/11/1436_top_bg.jpg") center top  no-repeat}

        .evt_01{background:#ececec;padding-bottom:100px}

        .wb_cts01s{padding-bottom:150px;}
       /* .evt01 .slide_con {position:relative; width:900px; margin:0 auto}
        .evt01 .slide_con p {position:absolute; top:50%; margin-top:-22px; width:44px; height:45px; z-index:10}
        .evt01 .slide_con p.leftBtn {left:-80px}
        .evt01 .slide_con p.rightBtn {right:-80px}*/

        .slide_con {position:relative; width:1090px;height:290px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; margin-top:-30px; width:67px; height:67px; z-index:10}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:0}
        .slide_con p.rightBtn {right:0} 

        .slide_con2 {position:relative; width:1090px;height:290px; margin:0 auto;padding-left:4px;}
        .slide_con2 p {position:absolute; top:50%; margin-top:-30px; width:67px; height:67px; z-index:10}
        .slide_con2 p a {cursor:pointer}
        .slide_con2 p.leftBtn {left:0}
        .slide_con2 p.rightBtn {right:0} 
    


        .wb_04 {background:#ececec; padding-bottom:100px;}		
        .wb_04_con2 {position:relative; width:1120px; margin:0 auto;left:100px;}	
        .wb_04_con2 p {position:absolute; top:67%; width:67px; height:67px; margin-top:-33px; z-index:100}
        .wb_04_con2 p a {cursor:pointer}
        .wb_04_con2 p.leftBtn {left:-70px;}
        .wb_04_con2 p.rightBtn {right:70px}

        .wb_cts03{background:#0B1522 url("https://static.willbes.net/public/images/promotion/2019/11/1436_03_bg.jpg") center top  no-repeat;position:relative;}
        .wb_cts04{background:#E2E2E2}
        .wb_cts05{background:#f3f3f3;}

        /*탭(이미지)*/
        .tabs{padding-bottom:20px;position:absolute;top:400px;left:50%;margin-left:-400px;}
        .tabs ul {width:1020px;margin:0 auto;}		
        .tabs li {display:inline; float:left;width:430px;}	
        .tabs a img.off {display:block}
        .tabs a img.on {display:none}
        .tabs a.active img.off {display:none}
        .tabs a.active img.on {display:block}
        .tabs ul:after {content:""; display:block; clear:both}
      

        .wb_cts03 .youtubeBox{width:856px;height:480px;margin:0 auto;margin-top:-15px;}
        .wb_cts03 .youtubeBox iframe{width:860px;height:480px;}
  
}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">      

        <div class="skybanner2">
            <a href="#event"><img src="https://static.willbes.net/public/images/promotion/2019/11/1436_sky2.png" alt="김신주 영어 선착순"/></a>
        </div>        
        
        <div class="evtCtnsBox evt_police" id="evt_police">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1328_police.jpg" title="윌비스 경찰팀">       
        </div>

        <div class="evtCtnsBox evt_top" id="evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1436_top.jpg" title="프리미엄 영어심화과정">       
        </div>     
        
        
        <div class="evtCtnsBox evt_01" id="evt_01">
			<img src="https://static.willbes.net/public/images/promotion/2019/11/1436_01.jpg"  title="경찰영어 전문교수진" />                   
            <div id="tab2">                 
                <div class="slide_con2">
                    <ul id="slidesImg5">
                        <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1436_01_tab_con2_01.png" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1436_01_tab_con2_02.png" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1436_01_tab_con2_03.png" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1436_01_tab_con2_04.png" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1436_01_tab_con2_05.png" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1436_01_tab_con2_06.png" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1436_01_tab_con2_07.png" /></li>
                    </ul>
                    <p class="leftBtn"><a id="imgBannerLeft5"><img src="https://static.willbes.net/public/images/promotion/2019/09/1009_01_arrowL.png"></a></p>
                    <p class="rightBtn"><a id="imgBannerRight5"><img src="https://static.willbes.net/public/images/promotion/2019/09//1009_01_arrowR.png"></a></p>
                </div>                 
            </div>                      
        </div>

        <div class="evtCtnsBox wb_cts01s">         
            <div class="wb_04_con2">
				<ul id="slidesImg2">
					<li><img src="https://static.willbes.net/public/images/promotion/2019/10/1436_02_slide1.png" alt="1" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2019/10/1436_02_slide2.png" alt="2" /></li>				
				</ul>
				<p class="leftBtn"><a id="imgBannerLeft2"><img src="https://static.willbes.net/public/images/promotion/2019/10/1436_left.png" alt="이전" /></a></p>
				<p class="rightBtn"><a id="imgBannerRight2"><img src="https://static.willbes.net/public/images/promotion/2019/10/1436_right.png" alt="다음" /></a></p>
			</div>           
        </div>
        
        <div class="evtCtnsBox wb_cts03">            
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1436_03.jpg"  title="오프닝 타임" />   
            <div class="tabs">
            <ul class="youtubetab">
                <li>
                    <a href="#tab01" class="active">
                        <img src="https://static.willbes.net/public/images/promotion/2019/11/1436_tab1_on.png" class="on"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/11/1436_tab1_off.png" class="off"/>
                    </a>
                </li>
                <li>
                    <a href="#tab02">
                        <img src="https://static.willbes.net/public/images/promotion/2019/11/1436_tab2_on.png" class="on"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/11/1436_tab2_off.png" class="off"/>
                    </a>
                </li>
            </ul>
            <div id="tab01" class="youtubeBox">
                <iframe src="https://www.youtube.com/embed/S1sXWy4SA8k" frameborder="0" allowfullscreen=""></iframe>                 
            </div>                                        
            <div id="tab02" class="youtubeBox">
                <iframe src="https://www.youtube.com/embed/197su_vtm_0" frameborder="0" allowfullscreen=""></iframe>           
            </div>
        </div>
        
        <div class="evtCtnsBox wb_cts04">            
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1436_04.jpg"  title="마스터 교재" />   
        </div>

        <div class="evtCtnsBox wb_cts05" id="event">    
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1436_05_v2.jpg" usemap="#Map1436_05" border="0" />
            <map name="Map1436_05" id="Map1436_05">
                <area shape="rect" coords="743,547,856,589" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1054" target="_blank" alt="학원 수강신청" />
                <area shape="rect" coords="870,548,985,590" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/157664" target="_blank" alt="동영상 수강신청" />
                <area shape="rect" coords="871,778,984,821" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/157766" target="_blank" alt="동영상 수강신청" />
                <area shape="rect" coords="369,1267,748,1373" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1412" target="_blank" alt="전과목 확인하기" />
            </map>
        </div>     
        
    </div>

    <!-- End evtContainer -->
  
    <script type="text/javascript">      
        $(document).ready(function() {
            var slidesImg2 = $("#slidesImg2").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                controls:false,
                autoHover: true,
                pager:false,
            });
                    
            $("#imgBannerLeft2").click(function (){
                slidesImg2.goToPrevSlide();
            });
            $("#imgBannerRight2").click(function (){
                slidesImg2.goToNextSlide();
            });
        });		

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
  

        $(document).ready(function() {
            var slidesImg5 = $("#slidesImg5").bxSlider({
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

            $("#imgBannerLeft5").click(function (){
                slidesImg5.goToPrevSlide();
            });

            $("#imgBannerRight5").click(function (){
                slidesImg5.goToNextSlide();
            });
        });  



        var tab1_url = "https://www.youtube.com/embed/S1sXWy4SA8k";
        var tab2_url = "https://www.youtube.com/embed/197su_vtm_0";    
      

        $(function() {
            $(".youtubeBox").hide();
            $(".youtubeBox:first").show();
            $(".youtubetab li a").click(function(){
                var activeTab = $(this).attr("href");
                var html_str = "";
                if(activeTab == "#tab01"){
                    html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab02"){
                    html_str = "<iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe>";          
                }
                $(".youtubetab a").removeClass("active");
                $(this).addClass("active");
                $(".youtubeBox").hide();
                $(".youtubeBox").html('');
                $(activeTab).html(html_str);
                $(activeTab).fadeIn();
                return false;
            });
        }); 




       
  

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop   