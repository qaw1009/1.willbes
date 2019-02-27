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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/       


        /*2018-07-31 상단변경*/
        .layer {width:100%; height:800px; -ms-overflow:hidden;}
        .video {width:100%; height:800px; overflow:hidden; position:relative; opacity:0.4; box-shadow:0px rgba(0,0,0,0.4); background:#000}
        .pngimg	 {width:1210px; margin:0 auto; position:relative; top:-800px;}
        .pngimg-real {width:1210px; height:0px; position:absolute;top:0;}
        .wb_mp4 {width:100%; text-align:center; margin:0 auto; background:#000; min-width:1210px;}
        .wb_mp4 ul {width:100%; margin:0 auto; min-width:1210px;}	
        
        /* 상단탭 */
        .wb_top {background:#ddd;}
        .tab_box {position:relative; width:1210px; height:110px; display:block; margin:0 auto; }
        .tab_menu {position:absolute; width:1210px; height:110px; top:0px; text-align:center;}
        .tab_menu li {display:inline; float:left;}
        .tab_menu li a img.off {display:block} 	
        .tab_menu li a img.on {display:none} 

        .wb_cts02 {background:#2b2a28 url(http://file.willbes.net/new_image/2016/08/EV160812_p1_bg.jpg) center 0 no-repeat;}
        .wb_cts03 {background:#b2a089 url(http://file.willbes.net/new_image/2016/08/EV160812_p2_bg.jpg) center 0 no-repeat;}
        .wb_cts04 {background:url(http://file.willbes.net/new_image/2016/08/EV160812_p3_bg.jpg) repeat;}
        .wb_cts05 {background:url(http://file.willbes.net/new_image/2016/08/EV160812_p3_bg.jpg) repeat;}
            .bannerImg3 {position:relative; width:100%; max-width:980px; margin:0 auto; background:url(http://file.willbes.net/new_image/2016/08/EV160812_p4_bg.jpg) no-repeat}
            .bannerImg3 p {position:absolute; top:50%; width:51px; z-index:50}
            .bannerImg3 img {width:100%}
            .bannerImg3 p a {cursor:pointer}
            .bannerImg3 p.leftBtn3 {left:1%}
            .bannerImg3 p.rightBtn3 {right:1%}	
        .wb_cts06 {width:100%;min-width:1210px;  text-align:center; background:#464646;}
        .wb_cts07 {width:100%;min-width:1210px;  text-align:center; background:#fafafa; padding-bottom:50px;}

        .skybanner {
            position:absolute; 
            top:20px; 
            right:10px;
            z-index:1;            
        }
        .skybanner_sectionFixed {position:fixed; top:20px}   
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180807_sky.png" alt="#" usemap="#Map_sky_go" border="0" />
            <map name="Map_sky_go">
                <area shape="rect" coords="10,18,90,65" href="http://willbesgosi.net/event/movie/event.html?event_cd=off_180426_01&topMenuType=F#lec_send" alt="자습형">
                <area shape="rect" coords="9,93,91,144" href="http://willbesgosi.net/event/movie/event.html?event_cd=off_180426_02&topMenuType=F#lec_send" alt="기숙형">
                <area shape="rect" coords="7,165,92,222" href="http://willbesgosi.net/event/movie/event.html?event_cd=off_180426_03&topMenuType=F#lec_send"alt="영어집중형">
            </map>
        </div>

        <div class="evtCtnsBox wb_mp4" id="main">
            <div class="layer">
                <div class="video">
                    <video style="width:100%;" autoplay loop muted="">
                    <source src="http://file3.willbes.net/new_gosi/2018/07/180629.mp4" type="video/mp4"></source>
                    </video>
                </div>
                <div class="pngimg">
                    <div class="pngimg-real">
                        <img src="http://file3.willbes.net/new_gosi/2018/07/EV180731_t.png" alt="윌비스 관리반" />
                    </div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_top">
            <div class="tab_box">
                <div class="tab_menu">
                    <ul>
                        <li><a href="<c:url value='/event/movie/event.html?event_cd=off_180426_01&topMenuType=F'/>"><img src="http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab1.png"  onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab1_on.png'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab1.png'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab1.png'" border="0"/></a></li>             
                        <li><a href="<c:url value='/event/movie/event.html?event_cd=off_180426_02&topMenuType=F'/>"><img src="http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab2.png"  onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab2_on.png'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab2.png'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab2.png'" border="0"/></a></li>
                        <li><a href="<c:url value='/event/movie/event.html?event_cd=off_180426_03&topMenuType=F'/>"><img src="http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab3_on.png"  onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab3_on.png'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab3.png'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab3.png'" border="0"/></a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts02" id="ksj_top">
            <img src="http://file.willbes.net/new_image/2016/08/EV160812_p1.png" alt="2017 김신주 영어집중관리반" />
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="http://file.willbes.net/new_image/2016/08/EV160812_p2.png" alt="학원 및 동영상 강의 일정안내" />
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="http://file.willbes.net/new_image/2016/08/EV160812_p3.png" alt="1,2,3" />
        </div>

        <div class="evtCtnsBox wb_cts05" style="padding-bottom:100px;">
            <div>
                <div class="bannerImg3">
                    <ul id="slidesImg3">
                        <li><img src="http://file.willbes.net/new_image/2016/08/EV160812_p4_1.png" alt="1"/></li>
                        <li><img src="http://file.willbes.net/new_image/2016/08/EV160812_p4_2.png" alt="2"/></li>
                        <li><img src="http://file.willbes.net/new_image/2016/08/EV160812_p4_3.png" alt="3"/></li>
                    </ul>
                    <p class="leftBtn3"><a id="imgBannerLeft3"><img src="http://file.willbes.net/new_image/2016/08/EV160812_btn01_1.png"></a></p>
                    <p class="rightBtn3"><a id="imgBannerRight3"><img src="http://file.willbes.net/new_image/2016/08/EV160812_btn01_2.png"></a></p>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts06">
            <img src="http://file.willbes.net/new_image/2016/08/EV160812_p5.png" alt="리얼적중스토리" />
        </div>

        <div class="evtCtnsBox wb_cts07">
            <p><img src="http://file.willbes.net/new_image/2016/08/EV160812_p6_1.png" alt="혜택" /></p>        
            <p id="lec_send"><img src="http://file.willbes.net/new_image/2016/08/EV160812_p6_3_1.png" alt="수강신청" usemap="#map2" />
                <map name="map2" id="lecture">
                    <area shape="rect" coords="273,61,710,142" href="http://www.willbesgosi.net/lecture/passLectureDetail.html?topMenu=001&topMenuName=9%EA%B8%89%EA%B3%B5%EB%AC%B4%EC%9B%90&searchTopCategoryCode=&searchCategoryCode=001&searchSubjectCode=1002&searchLeccode=D201801197&leftMenuLType=&lecKType=&USER_ID=&hSEARCHTYPE=&hSEARCHTEXT=&learningCD=&topMenuType=F&topMenuGnb=OM_009&SEARCHSERIESCODE=" onfocus="this.blur();"/>
                </map>
            </p>
        </div>                  
        
    </div>
    <!-- End Container -->


    <script type="text/javascript"> 
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:980,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft3").click(function (){
            slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
            slidesImg3.goToNextSlide();
            });
		});
	</script>    

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>       
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */   
	    });

        $( document ).ready( function() {
            var jbOffset = $( '.skybanner' ).offset();
            $( window ).scroll( function() {
              if ( $( document ).scrollTop() > jbOffset.top ) {
                $( '.skybanner' ).addClass( 'skybanner_sectionFixed' );
              }
              else {
                $( '.skybanner' ).removeClass( 'skybanner_sectionFixed' );
              }
            });
          } );

        $(document).ready(function() {
            $('.skybanner').onePageNav({
                currentClass: 'hvr-shutter-out-horizontal_active'
            });
        });       
    </script>    
@stop