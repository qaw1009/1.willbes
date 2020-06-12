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

        .wb_cts01 {background:#0a0a0a url(http://file3.willbes.net/new_gosi/2017/08/EV170803_bg01.jpg) no-repeat center top; margin-top:20px;  position:relative;}
	    .wb_cts02 {background:#395ec4 url(http://file3.willbes.net/new_gosi/2018/08/EV180820_c2_bg.jpg) no-repeat center top;}	
	    .wb_cts03 {background:#fff url(http://file3.willbes.net/new_gosi/2017/08/EV170803_bg03.jpg) no-repeat center top;}
	    .wb_cts03 .btn {width:1210px; margin:0 auto}	
	    .wb_cts03 .btn li {float:left; display:inline}	
	    .wb_cts04 {background:#82909b url(http://file3.willbes.net/new_gosi/2017/08/EV170803_bg04.jpg) repeat;}

        .Pstyle {
            opacity:0;
            display:none;
            position:relative;
            width:auto;
            padding: 20px;
            background:#fff;
        }            
        .b-close {
            position:absolute;
            right:0;
            top:0;
            padding:5px;
            display:block;
            cursor:pointer;
            color:#000;
        }
        .popcontent {height:auto; width:auto}

        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:266px; 
            animation:upDown 1s infinite;
            -webkit-animation:upDown 1s infinite;
            z-index:10;
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
    
    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="skybanner">
            <div><a href="#event"><img src="http://file3.willbes.net/new_gosi/2018/08/EV180820_sky.png" alt="한권으로 공부하는 회계학"></a></div>
		</div>
        
        <div class="evtCtnsBox wb_cts01">
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180820_c1.png" alt="윌비스 2019 회계학 김현식" />
        </div><!--wb_cts01//-->
        
        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180820_c2.png" alt="" usemap="#Map170803_c1" border="0" />
            <map name="Map170803_c1" >
                <area shape="rect" coords="351,623,523,814" href="#event" />
            </map>
        </div><!--wb_cts02//-->
        
        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_gosi/2017/08/EV170803_c3.jpg" alt="" /></li>
            <img src="http://file3.willbes.net/new_gosi/2017/08/EV170803_c4.jpg" alt="" /></li>
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180820_c5.jpg" alt="" /></li>            
                <ul class="btn">
                    <li>
                        <a onclick="go_popup()">
                        <img src="http://file3.willbes.net/new_gosi/2017/08/EV170803_c51.jpg" alt="" />
                        </a>
                    </li>
                    <li>
                        <a onclick="go_popup01()">
                        <img src="http://file3.willbes.net/new_gosi/2017/08/EV170803_c52.jpg" alt="" />
                        </a>
                    </li>
                </ul>
            <img src="http://file3.willbes.net/new_gosi/2017/08/EV170803_c6.jpg" alt="" />
        </div><!--wb_cts03//-->

        <div id="popup" class="Pstyle">         
            <span class="b-close"><img src="http://file.willbes.net/new_image/2016/popClose.png"></span>         
            <div class="content">         
                <img src="http://file3.willbes.net/new_gosi/2017/08/EV170803_pop01.png" alt="찾아오시는길"/>
            </div>
        </div>
        <div id="popup01" class="Pstyle">         
            <span class="b-close"><img src="http://file.willbes.net/new_image/2016/popClose.png"></span>         
            <div class="content">         
                <img src="http://file3.willbes.net/new_gosi/2017/08/EV170803_pop02.png" alt="찾아오시는길"/>
            </div>
        </div>       
        
        <div class="evtCtnsBox wb_cts04" id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180820_c7.jpg" alt="" usemap="#Map170803_c2" border="0" />
            <map name="Map170803_c2" >
                <area shape="rect" coords="402,460,803,564" href="http://www.willbesgosi.net/lecture/movieLectureDetail.html?topMenu=005&topMenuType=O&searchSubjectCode=1018&searchLeccode=D201800500&leftMenuLType=M0001&lecKType=D" target="_blank"  onFocus="this.blur();" />
            </map>            
        </div><!--wb_cts04//--> 

    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript"> 
        function go_popup() {					 
                $('#popup').bPopup();					 
        };
        
        function go_popup01() {					 
                $('#popup01').bPopup();					 
        };

    </script> 
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */   
	    });
    </script> 
@stop