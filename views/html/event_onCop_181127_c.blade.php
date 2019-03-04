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
            position:relative;            
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_top {background:#841c1c url(http://file3.willbes.net/new_cop/2018/11/EV181126_c1_bg.jpg) no-repeat center top; position:relative}  
        .wb_cts01 {background:#f1eff0}
            .bannerImg3 {position:relative; width:100%; max-width:1210px; margin:0 auto; padding:0px 0px 124px 0px; }
            .bannerImg3 p {position:absolute; top:35%; width:30px; z-index:1000;}
            .bannerImg3 img {width:100%}
            .bannerImg3 p a {cursor:pointer}
            .bannerImg3 p.leftBtn3 {left:8%}
            .bannerImg3 p.rightBtn3 {right:8%}	
        .wb_cts01 ul:after {content:""; display:block; clear:both}
	
        .wb_cts02 {background:#fff url(http://file3.willbes.net/new_cop/2018/11/EV181126_c3_bg.jpg) center top no-repeat;}        
        .wb_cts03 {background:#fff;}
            .menuWarp {position:relative; width:1210px; height:490px; margin:0 auto; }
            .PeMenu {position:absolute; width:1210px; height:328px; top:0px; left:0px;}
            .PeMenu li { display:inline; float:left}
            .PeMenu li a img.off {display:block} 	
            .PeMenu li a img.on {display:none}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >            
            <img src="http://file3.willbes.net/new_cop/2018/11/EV181126_c1.png" alt="윌비스 신광은 N수생의 LEVEL UP " usemap="#Map20181127_c1" border="0"  />
            <map name="Map20181127_c1" >
                <area shape="rect" coords="87,14,569,86" href="{{ site_url('/home/html/event_onCop_180122_c') }}"  onfocus="this.blur();"  alt="초시생을 위한 합격비법" />
                <area shape="rect" coords="608,19,1072,89" href="#none"  alt="N수생을 위한 합격비법"/>
            </map>                     
        </div><!--WB_top//-->

	    <div class="evtCtnsBox wb_cts01" >
        	<img src="http://file3.willbes.net/new_cop/2018/11/EV181126_c2.jpg" alt="경찰 과목별 체감 난이도"/>
            <div class="bannerImg3">
                <ul id="slidesImg3">
                    <li><img src="http://file3.willbes.net/new_cop/2018/11/EV181126_c2_1.jpg" alt=""/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/11/EV181126_c2_2.jpg" alt=""/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/11/EV181126_c2_3.jpg" alt=""/></li>
                </ul>
                <p class="leftBtn3"><a id="imgBannerLeft3"><img src="http://file3.willbes.net/new_gosi/com_img/arrow03_1.png"></a></p>
                <p class="rightBtn3"><a id="imgBannerRight3"><img src="http://file3.willbes.net/new_gosi/com_img/arrow03_2.png"></a></p>
            </div>        
	    </div><!--WB_cts01//-->     
      
        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/2018/11/EV181126_c3.jpg" alt=""  />
        </div><!--WB_cts02//-->     
      
      
        <div class="evtCtnsBox wb_cts03" >
            <img src="http://file3.willbes.net/new_cop/2018/11/EV181126_c4.jpg" alt=""  /><br>
            <img src="http://file3.willbes.net/new_cop/2018/11/EV181126_c5.jpg" alt=""  />
            <div class="menuWarp">
                <div class="PeMenu">
                    <ul>
                        <li> 
                            <a href="http://www.willbescop.net/movie/event.html?event_cd=On_premium&topMenuType=O" target="_blank" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_cop/2018/11/EV181126_c6_1.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2018/11/EV181126_c6_1on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2018/11/EV181126_c6_1.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2018/11/EV181126_c6_1.jpg'" alt=""  />
                            </a>
                        </li>
                        <li>
                            <a href="http://www.willbescop.net/lecture/movieLectureSList.html?topMenu=081&topMenuName=일반경찰&topMenuType=O&leftMenuLType=M0002&newlearningCD=M0221&lecKType=J" target="_blank" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_cop/2018/11/EV181126_c6_2.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2018/11/EV181126_c6_2on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2018/11/EV181126_c6_2.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2018/11/EV181126_c6_2on.jpg'" alt=""  />
                            </a>
                        </li>
                        <li> 
                            <a href="http://www.willbescop.net/lecture/movieLectureSList.html?topMenu=081&topMenuName=일반경찰&topMenuType=O&leftMenuLType=M0002&newlearningCD=M0222&lecKType=J" target="_blank" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_cop/2018/11/EV181126_c6_3.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2018/11/EV181126_c6_3on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2018/11/EV181126_c6_3.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2018/11/EV181126_c6_3.jpg'" alt=""  />
                            </a>
                        </li>
                        <li> 
                            <a href="http://www.willbescop.net/lecture/movieLectureSList.html?topMenu=081&topMenuName=일반경찰&topMenuType=O&leftMenuLType=M0002&newlearningCD=M0223&lecKType=J" target="_blank" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_cop/2018/11/EV181126_c6_4.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2018/11/EV181126_c6_4on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2018/11/EV181126_c6_4.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2018/11/EV181126_c6_4.jpg'" alt=""  />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!--wb_cts03//-->                
        
    </div>
    <!-- End Container --> 

    <script language="javascript">
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
                slideWidth:1210,
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
            $('html, body').animate({scrollTop: targetOffset}, 700);
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

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */   
	    });       
    </script>    
@stop