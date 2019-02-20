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

        .wb_top {width:100%; min-width:1210px; text-align:center; background:#0b1b0d url(http://file3.willbes.net/new_gosi/2018/06/EV180625_c1_bg.jpg) no-repeat center top; position:relative;}        
        .wb_cts01 {width:100%; text-align:center; min-width:1210px; background:#d6d6d6 url(http://file3.willbes.net/new_gosi/2018/06/EV180625_c4_bg.jpg) no-repeat center top;}            
        .wb_cts02 {width:100%; text-align:center; min-width:1210px; background:#fff;}        
        .wb_cts03 {width:100%; text-align:center; min-width:1210px; background:#1f2330 ;}
		 
    </style>
    
    @include('html.event_incOnTnb')

    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="wb_top" >
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180625_c1.jpg" alt="윌비스 매직아이 김신주 영어"  usemap="#Map180625_c2" border="0"  />
            <map name="Map180625_c2" >
                <area shape="rect" coords="813,206,993,410" href="#event" onfocus="this.blur();" />
            </map>
        </div>
        <!--WB_top//-->

        <div class="wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180625_c2.png" alt="윌비스 빠른 합격을 위한 매직아이 영어"  /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180625_c3.png" alt=""  />
        </div>
        <!--wb_cts01//-->   

        <div class="wb_cts02" >
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180625_c4.jpg" alt="윌비스 실전에 강한 매직아이 영어"  /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180625_c5.jpg" alt=""  /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180625_c6.jpg" alt="영어는 변수가 많아 언제나 배신할 수 있는 과목입니다. "  />
        </div>
        <!--wb_cts02//-->       

        <div class="wb_cts03" id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180625_c7.jpg" alt="2018 김신주 매잊ㄱ아이 영어 문법/어휘/독해 패키지"  /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180625_c8.jpg" alt="윌비스 행정법 변원갑 수강신청하기" usemap="#Map180625_c1" border="0"  />
            <map name="Map180625_c1" >
                    <area shape="rect" coords="626,300,945,372" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201600179" target="_blank" onfocus="this.blur();"/>
                    <area shape="rect" coords="646,535,950,612" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201600176" target="_blank" onfocus="this.blur();"/>
                    <area shape="rect" coords="653,781,959,863" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201600177" target="_blank" onfocus="this.blur();"/>
                    <area shape="rect" coords="643,1021,954,1115" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201600178" target="_blank" onfocus="this.blur();"/>
            </map>                    
        </div><!--wb_cts03//-->
    
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