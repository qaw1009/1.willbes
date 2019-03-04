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

        .wb_top {background:#141414 url(http://file3.willbes.net/new_cop/2017/01/EV170126_p1_bg_1.jpg) repeat-y top;}	
        
        /* 슬라이드배너 */
        .slide_con {position:relative; width:900px; margin:0 auto; padding-bottom:60px; padding-top:60px;}
        .slide_con p {position:absolute; top:35%; width:30px; z-index:100}
        .slide_con img {width:100%;}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-31px; top:50%; width:62px; height:62px; margin-top:-24px;opacity:0.9; filter:alpha(opacity=90);}
        .slide_con p.rightBtn {right:-31px;top:50%; width:62px; height:62px;  margin-top:-24px;opacity:0.9; filter:alpha(opacity=90);}

        /* 탭 */
        .tabContaier{width:100%; text-align:center;}
        .tabContaier ul {width:100%; max-width:980px; text-align:center; margin:0 auto  }		
        .tabContaier li {display:inline; float:left; }	
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContents iframe {width:854px; height:480px;}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" id="main">
			<img src="http://file3.willbes.net/new_cop/2017/01/EV170126_p1.png"  alt="1"  />
				<div style="width:980px;text-align:center;margin:0 auto;"> 				
                    <div class="tabContaier">
                        <ul class="cf">
                            <li style="padding-bottom:40px;"> 
                                <a class="active" href="#tab1">
                                <img src="http://file3.willbes.net/new_cop/2017/01/EV170126_p3_tap2_off.gif"  class="off" alt="02"/>
                                <img src="http://file3.willbes.net/new_cop/2017/01/EV170126_p3_tap2_on.gif" class="on"  />
                                </a>
                            </li>
                            <li> 
                                <a  href="#tab2">
                                <img src="http://file3.willbes.net/new_cop/2017/01/EV170126_p3_tap1_off.gif"  class="off" alt="01"/>
                                <img src="http://file3.willbes.net/new_cop/2017/01/EV170126_p3_tap1_on.gif" class="on"  />
                                </a>
                            </li>
                        </ul>
                        <div class="tabContents" id="tab1">
                           <iframe width="854" height="480" src="https://www.youtube.com/embed/VLLgwLjqrj4?list=PLBXfMpjrxeIF4IU5m8V4NW9Uw5lSZIpUb?rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="tabContents" id="tab2" ></div>
                    </div>
				</div>
				<img src="http://file3.willbes.net/new_cop/2017/01/EV170126_p3_2.png"  alt="3" />                
                <div class="slide_con">
                    <ul id="slidesImg3">
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll1.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll3.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll4.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll6.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll7.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll8.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll9.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll10.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll11.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll12.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll13.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll14.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll15.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll16.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll17.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll18.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll19.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll20.png" alt="방송출연"/></li>
                        <li><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll21.png" alt="방송출연"/></li>
                    </ul>
                    <p class="leftBtn"><a id="imgBannerLeft3"><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll_arr_l.png"></a></p>
                    <p class="rightBtn"><a id="imgBannerRight3"><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll_arr_r.png"></a></p>
                </div>
                <img src="http://file3.willbes.net/new_cop/2017/01/EV170126_p5.png"  alt="5" /><br>
				<img src="http://file3.willbes.net/new_cop/2017/01/EV170126_p2_1.png"  alt="신광은경찰팀 " usemap="#shin" border="0"/><br>
                <map name="Map160927_p" id="shin">
                    <area shape="rect" coords="520,295,959,334" href="http://www.willbescop.net/user/memberEntryProvision.html?topMenuType=O" onfocus='this.blur()'  alt="회원가입" target="_blink">
                </map>				
				<img src="http://file3.willbes.net/new_cop/2017/01/EV170126_p4_1.png"  alt="4" />
			</ul>
		</div>             
        
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        var tab1_url = "https://www.youtube.com/embed/VLLgwLjqrj4?list=PLBXfMpjrxeIF4IU5m8V4NW9Uw5lSZIpUb?rel=0";
        var tab2_url = "https://www.youtube.com/embed/iEExOwubOW0?rel=0";


        $(document).ready(function(){
        $(".tabContents").hide(); 
        $(".tabContents:first").show();
        $(".tabContaier ul li a").click(function(){ 
                var activeTab = $(this).attr("href"); 
                var html_str = "";
                if(activeTab == "#tab1"){
                    html_str = "<iframe src='"+tab1_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#tab2"){
                    html_str = "<iframe src='"+tab2_url+"' allowfullscreen></iframe>";
                }
                $(".tabContaier ul li a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".tabContents").hide(); 
                $(".tabContents").html(''); 
                $(activeTab).html(html_str);
                $(activeTab).fadeIn(); 
                return false; 
                });
            });


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
                slideWidth:900,
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