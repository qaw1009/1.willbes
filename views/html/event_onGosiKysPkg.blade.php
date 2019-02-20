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

        .wb_top {width:100%; min-width:1210px; text-align:center; background:#bbe202 url(http://file3.willbes.net/new_gosi/2018/10/EV181023_c1_bg.jpg) no-repeat center top; position:relative}
        .wb_cts00 {width:100%; text-align:center; min-width:1210px; background:#fff}     
        .wb_cts01 {width:100%; text-align:center; min-width:1210px; background:#eef0e7}
        .wb_cts03 {width:100%; text-align:center; min-width:1210px; background:#fff}  
		 
    </style>
    
    @include('html.event_incOnTnb')

    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="wb_top" >            
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181023_c1.png" alt="윌베스 2019 김윤수 탐구한국사 기본이론 " usemap="#Map20181023_c2" border="0"  />
            <map name="Map20181023_c2" >
            <area shape="rect" coords="158,744,651,845" href="#event"  onfocus="this.blur();"/>
            </map>                  
        </div><!--WB_top//-->

        <div class="wb_cts00" >
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181023_c3.jpg" alt=" 윌비스 탐구한국사가 합격의 기준이 됩니다."  /> 
        </div>
        <!--WB_cts00//-->        

        <div class="wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181023_c4.jpg" alt=" 윌비스 요즘 공시 한국사, 지엽적으로 공부해야 합격한다! "  /> 
        </div>
        <!--WB_cts01//-->        

        <div class="wb_cts03" id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181023_c5.jpg" alt="윌비스 2019 탐구한국사 수강신청" usemap="#Map20181023_c3" border="0" />
            <map name="Map20181023_c3" >
                <area shape="rect" coords="808,327,1004,360" href="http://www.willbesgosi.net/lecture/movieLectureDetail.html?topMenu=001&topMenuType=O&searchSubjectCode=1003&searchLeccode=D201800745&leftMenuLType=M0001&lecKType=D"  alt="전근대사" onfocus="this.blur();" />
                <area shape="rect" coords="809,370,1007,396" href="http://www.willbesgosi.net/lecture/movieLectureDetail.html?topMenu=001&topMenuType=O&searchSubjectCode=1003&searchLeccode=D201800747&leftMenuLType=M0001&lecKType=D"  alt="근현대사"  onfocus="this.blur();" />
                <area shape="rect" coords="882,435,1027,512" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800098" alt="전근대사+근현대사 PACKAGE" onfocus="this.blur();"/>
            </map>	
        </div>
        <!--wb_cts03//--> 

    </div>
    <!-- End Container -->
     
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */   
	    });
    </script> 
@stop