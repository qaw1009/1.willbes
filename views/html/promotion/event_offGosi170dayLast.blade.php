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

        .wb_cts01 {background:#2b2b35 url(http://file3.willbes.net/new_gosi/2018/11/EV181123_c15_bg.jpg) no-repeat center top; position:relative}

        .wb_cts02 {background:#fff url(http://file3.willbes.net/new_gosi/2018/11/EV181123_c4_bg.jpg) no-repeat center top}		        
        
        /* 탭 */
        .tabContaier {width:1210px; margin:0 auto;}	
        .tabContaier li {display:inline; float:left}	
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContaier .bg01 {background: url(http://file3.willbes.net/new_gosi/2018/11/EV181123_c8_bg.jpg) no-repeat center bottom; background-position:0px 2698px;}
        .tabContaier .bg02 {background: url(http://file3.willbes.net/new_gosi/2018/11/EV181123_c8_bg.jpg) no-repeat center bottom; background-position:0px 2917px;}


        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            width:130px; 
            animation:upDown 1s infinite;
            -webkit-animation:upDown 1s infinite;
            z-index:10;
        }
        .skybanner div {margin-bottom:10px}

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

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <div>
                <a href="http://www.willbesgosi.net/event/movie/event.html?event_cd=off_180426_02&topMenuType=F">
                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_sky.png" alt="7급 초시생 합격전략설명회">
                </a>
            </div>
		</div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190128_c15.png" alt="7급 행정직 탭" usemap="#Map181123_c1" border="0" /><br>
            <map name="Map181123_c1" >
                <area shape="rect" coords="156,19,540,86" href="event_offGosi106dayLast" onFocus="this.blur();"  alt="9급 106일 마무리반"/>
                <area shape="rect" coords="675,14,1061,91" href="#none" onFocus="this.blur();" alt="7개월 문제풀이 집약 커리큘럼"/>
            </map>
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190128_c16.png" alt="윌비스 7급 행정직 7개월 단기완성 순환반" />
        </div><!--wb_cts01//-->

            
        <div class="wb_cts02" >
        <div class="tabContaier"  >
            <ul class="cf">
                <li> 
                    <a class="active" href="#tab1">
                    <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_c17_1.jpg"  class="off" alt=""/>
                    <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_c17_1on.jpg" class="on"  />
                    </a>
                </li>
                <li> 
                    <a  href="#tab2">
                    <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_c17_2.jpg"  class="off" alt=""/>
                    <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_c17_2on.jpg" class="on"  />
                    </a>
                </li>                        
            </ul>
              
            <div class="tabContents" id="tab1" >
                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_c18.png" /><br>
                <img src="http://file3.willbes.net/new_gosi/2019/01/EV190128_c21.jpg" /><br>
                <img src="http://file3.willbes.net/new_gosi/2019/01/EV190128_c7.jpg" /><br>                 
                <a href="http://www.willbesgosi.net/event/movie/event.html?event_cd=off_180426_02&topMenuType=F">
                    <img src="http://file3.willbes.net/new_gosi/2019/01/EV190128_c9.jpg" />
                </a>
            </div>
	
            <div class="tabContents" id="tab2">
                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_c19.png" /><br>
                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_c12.jpg" /><br>
                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_c13.jpg" /> <br>     
                <a href="http://www.willbesgosi.net/event/movie/event.html?event_cd=off_180426_01&topMenuType=F">
                    <img src="http://file3.willbes.net/new_gosi/2019/01/EV190128_c14.jpg" />
                </a>
            </div>
        </div><!--tabContaier//-->
	  </div><!--wb_cts02//-->      
         
        
    </div>
    <!-- End Container -->

    <script>            
        $(document).ready(function(){
            $(".tabContents").hide(); 
            $(".tabContents:first").show();
            
            $(".tabContaier ul li a").click(function(){ 
                
                var activeTab = $(this).attr("href"); 
                $(".tabContaier ul li a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".tabContents").hide(); 
                $(activeTab).fadeIn(); 
                
                return false; 
            });
        });
        
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */   
	    });
    </script>    
@stop