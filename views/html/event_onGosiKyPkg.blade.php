@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        body{width:100%; min-width:1210px; margin:auto;}
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

        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        .wb_top {background:#16be50 url(http://file3.willbes.net/new_gosi/2018/09/EV180906_c1_bg.jpg) no-repeat center top; position:relative}
	    .wb_cts00 {background:#ebebeb}
        .wb_cts00 p img{ padding-right:7px}	

        .wb_cts01 {background:#ebebeb}
        .tabContaier{width:1210px; margin:0 auto; padding-top:20px; padding-bottom:170px}		
        .tabContaier li {display:inline; float:left; margin-bottom:20px}	
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .wb_cts01 iframe {width:854px; height:480px}

        .wb_cts02 {background:#fff}
	
        .wb_cts03 {background:#ebebeb}
        .wb_cts04 {background:#fff}
        
        .wb_cts06 {background:#fff}

        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:214px; 
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
    
    @include('html.event_incOnTnb')

    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="skybanner">
            <div><a href="#event"><img  src="http://file3.willbes.net/new_gosi/2018/09/EV180906_c7.png" alt="김영 영어 지금 신청시 영스타하프 추가제공"></a></div>
		</div>
        
        <div class="evtCtnsBox wb_top" >
      		<img src="http://file3.willbes.net/new_gosi/2018/09/EV180906_c1.png" alt=" 윌비스 공시 영어의 마스터, 김영 영어 " usemap="#Map20180906_c1" border="0"/>
            <map name="Map20180906_c1" >
                <area shape="rect" coords="743,980,1003,1101" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800075" target="_blank" onfocus="this.blur();"/>
            </map>
	    </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts00" >
            <img src="http://file3.willbes.net/new_gosi/2018/09/EV180906_c2.jpg" alt="윌비스 개념 강의와 기출문제풀이를 한 번에 끝낸다. 행정법 행정학 끝장캠프"  ><br>
            <img src="http://file3.willbes.net/new_gosi/2018/07/2018_7_13_15.gif" alt="윌비스 개념 강의와 기출문제풀이를 한 번에 끝낸다. 행정법 행정학 끝장캠프"  >
            <img src="http://file3.willbes.net/new_gosi/2018/07/2018_7_13_38.gif" alt="윌비스 개념 강의와 기출문제풀이를 한 번에 끝낸다. 행정법 행정학 끝장캠프"  >
            <img src="http://file3.willbes.net/new_gosi/2018/07/2018_7_13_40.gif" alt="윌비스 개념 강의와 기출문제풀이를 한 번에 끝낸다. 행정법 행정학 끝장캠프"  >
        </div><!--WB_cts00//-->
      

        <div class="evtCtnsBox wb_cts01">
            <img src="http://file3.willbes.net/new_gosi/2018/09/EV180906_c3.jpg" alt="윌비스 개념 강의와 기출문제풀이를 한 번에 끝낸다. 행정법 행정학 끝장캠프"  >
            <div class="tabContaier" >
                <ul>
                    <li> 
                        <a class="active" href="#tab1">
                        <img src="http://file3.willbes.net/new_gosi/2018/09/EV180906_c4_1.jpg"  class="off" alt="전기이론"/>
                        <img src="http://file3.willbes.net/new_gosi/2018/09/EV180906_c4_1on.jpg" class="on"  />
                        </a>
                    </li>
                    <li> 
                        <a  href="#tab2">
                        <img src="http://file3.willbes.net/new_gosi/2018/09/EV180906_c4_2.jpg"  class="off"  />
                        <img src="http://file3.willbes.net/new_gosi/2018/09/EV180906_c4_2on.jpg"  class="on"  alt="전기기기"/>
                        </a>
                    </li>
                </ul>
                
                <div class="tabContents" id="tab1">
                    <iframe src="https://www.youtube.com/embed/k7T5PSM-vlY?rel=0&start=1570;end=1848" frameborder="0" allowfullscreen></iframe>
                </div>

                <div class=" tabContents" id="tab2">
                    <iframe src="https://www.youtube.com/embed/k7T5PSM-vlY?rel=0&start=1940;end=2168" frameborder="0" allowfullscreen></iframe>
                </div>                
            </div><!--tabContaier//-->   
        </div><!--wb_cts01//-->    
  
        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_gosi/2018/09/EV180906_c5.jpg" alt="합격을 가르는 목표 점수별 스타트업"  />
        </div><!--wb_cts02//-->       

        <div class="evtCtnsBox wb_cts03"  id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/09/EV180906_c6.jpg" alt="윌비스 김영 교수 영어 완성PACK 수강신청" usemap="#Map20180906_c2" border="0" />
            <map name="Map20180906_c2" >
                <area shape="rect" coords="531,723,1101,782" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800075" onfocus="this.blur();" target="_blank" />
            </map>                    	
        </div><!--wb_cts03//-->
    
    </div>
    <!-- End Container -->
           
    <script>
        var tab1_url = "https://www.youtube.com/embed/k7T5PSM-vlY?rel=0&start=1570;end=1848";
        var tab2_url = "https://www.youtube.com/embed/k7T5PSM-vlY?rel=0&start=1940;end=2168";

        $(document).ready(function(){
        $(".tabContents").hide(); 
        $(".tabContents:first").show();
        $(".tabContaier ul li a").click(function(){ 
                var activeTab = $(this).attr("href"); 
                var html_str = "";
                if(activeTab == "#tab1"){
                    html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab2"){
                    html_str = "<iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe>";
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

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */   
	    });
    </script> 
@stop