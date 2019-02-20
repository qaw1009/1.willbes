@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        body{width:100%; min-width:1240px; margin:auto;}
        .Depth {display:none}
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	

        .wb_cts01 {width:100%; min-width:1210px; text-align:center; background:#26347d url(http://file3.willbes.net/new_gosi/2018/06/EV180627_01_bg.png) center top  no-repeat;  margin-top:20px;}
        .wb_cts02 {width:100%; min-width:1210px; text-align:center; background:#f8f8f8}
        .wb_cts03 {width:100%; min-width:1210px; text-align:center; background:#333b95 url(http://file3.willbes.net/new_gosi/2018/06/EV180627_03_bg.png) center top  repeat-y;}	
        .wb_cts04 {width:100%; min-width:1210px; text-align:center; background:#f8f8f8}
        .wb_cts05 {width:100%; min-width:1210px; text-align:center; background:#f8f8f8}
        .wb_cts06 {width:100%; min-width:1210px; text-align:center; background:#242424}

        /* 슬라이드배너 */
        .bannerImg1 {position:relative; width:1210px; max-width:1210px; margin:0 auto; z-index:1000;}
        .bannerImg1 p {position:absolute; top:150px; width:65px; z-index:1000}
        .bannerImg1 img {width:100%;}
        .bannerImg1 p a {cursor:pointer}
        .bannerImg1 p.left_arr {left:2%; width:65px; height:65px;}
        .bannerImg1 p.right_arr {right:48%; width:65px; height:65px;}

        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:290px; 
            animation:upDown 1s infinite;
            -webkit-animation:upDown 1s infinite;
        }

        @@keyframes upDown{
            from{margin-top:0}
            60%{margin-top:-30px}
            to{margin-top:0}
        }
        @@-webkit-keyframes upDown{
            from{margin-top:0}
            60%{margin-top:-30px}
            to{margin-top:0}
        }  
    </style>
    
    @include('html.event_incOnTnb')

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
			<div><a href="http://www.willbesgosi.net/event/movie/event.html?event_cd=On_170405_c" target="_blank"><img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c_sky2.png" alt="환승이벤트" ></a></div>
		</div> 

        <div class="wb_cts01">
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180627_01.png" alt="" /> 
            <div class="bannerImg1">
                <ul id="slidesImg1">
                    <li><img src="http://file3.willbes.net/new_gosi/2018/05/EV180517_01_txt1.png" alt="1"/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/05/EV180517_01_txt2.png" alt="2"/></li> 
                    <li><img src="http://file3.willbes.net/new_gosi/2018/05/EV180517_01_txt3.png" alt="3"/></li> 
                </ul>
                <p class="left_arr"><a id="imgBannerLeft"><img src="http://file3.willbes.net/new_gosi/2018/05/EV_arr_l.png"></a></p>
                <p class="right_arr"><a id="imgBannerRight"><img src="http://file3.willbes.net/new_gosi/2018/05/EV_arr_r.png"></a></p>
            </div>         
        </div>
        <!--wb_cts01//-->

        <div class="wb_cts02"  id="evt01">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190110_2.png" alt="갓덕현 2019대비신규강좌" usemap="#Map_lec_han" border="0">
            <map name="Map_lec_han">
                <area shape="rect" coords="791,786,1038,847" href="http://www.willbesgosi.net/lecture/movieLectureDetail.html?topMenu=001&topMenuType=O&searchSubjectCode=1002&searchLeccode=D201800894&leftMenuLType=M0003&lecKType=D" target="_blank">
                <area shape="rect" coords="801,426,1047,483" href="http://www.willbesgosi.net/lecture/movieLectureDetail.html?topMenu=001&topMenuType=O&searchSubjectCode=1002&searchLeccode=D201800898&leftMenuLType=M0003&lecKType=D" target="_blank">
                <area shape="rect" coords="799,333,1050,394" href="http://www.willbesgosi.net/lecture/movieLectureDetail.html?topMenu=001&topMenuType=O&searchSubjectCode=1002&searchLeccode=D201800890&leftMenuLType=M0003&lecKType=D" target="_blank">
                <area shape="rect" coords="798,598,1047,660" href="http://www.willbesgosi.net/lecture/movieLectureDetail.html?topMenu=001&topMenuType=O&searchSubjectCode=1002&searchLeccode=D201800867&leftMenuLType=M0003&lecKType=D" target="_blank">
                <area shape="rect" coords="800,515,1045,579" href="http://www.willbesgosi.net/lecture/movieLectureDetail.html?topMenu=001&topMenuType=O&searchSubjectCode=1002&searchLeccode=D201800886&leftMenuLType=M0002&lecKType=D" target="_blank">
                <area shape="rect" coords="799,695,1044,758" href="http://www.willbesgosi.net/lecture/movieLectureDetail.html?topMenu=001&topMenuType=O&searchSubjectCode=1002&searchLeccode=D201800992&leftMenuLType=M0003&lecKType=D" target="_blank">
            </map>            
        </div>
        <!--wb_cts02//-->

        <div class="wb_cts03" id="live">
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180627_03.png" alt="" usemap="#Map_180412_lecplay"  border="0" />
            <map name="Map_180412_lecplay">
                <area shape="rect" coords="896,690,1141,802" href="https://www.youtube.com/channel/UCPmdjTx3UUKCFt40KtRRdUQ" target="_blank" alt="한덕현유튜브">
                <area shape="rect" coords="628,689,875,802" href="http://play.afreecatv.com/DHLAWRENCE31" target="_blank">
            </map>                
        </div>
        <!--wb_cts03//-->

        <div class="wb_cts04" >
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190110_4.png" alt="" />
        </div>
        <!--wb_cts04//-->

        <div class="wb_cts06" >
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190110_5.png" alt="학습비법패키지수강신청" usemap="#Map180412_lec2" border="0" />
                <map name="Map180412_lec2">
                <area shape="rect" coords="920,663,1101,711" href="http://www.willbesgosi.net/lecture/movieLectureDetail.html?topMenu=001&topMenuType=O&searchSubjectCode=&searchLeccode=D201800176&leftMenuLType=M0002&lecKType=D" target="_blank" />
                <area shape="rect" coords="715,665,892,712" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201700112" target="_blank" />
                <area shape="rect" coords="507,664,676,711" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201600163" target="_blank" />
                <area shape="rect" coords="291,661,467,712" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201600164" target="_blank" />
                <area shape="rect" coords="86,662,257,712" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201600165" target="_blank" />
            </map>            
        </div>
        <!--wb_cts06//-->
    
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

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */   
	    });
    </script>   

@stop