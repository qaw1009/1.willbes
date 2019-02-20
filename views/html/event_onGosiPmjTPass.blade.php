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

        .wb_top {width:100%; min-width:1210px; text-align:center; background:#2e5848 url(http://file3.willbes.net/new_gosi/2018/08/EV180802_c1_bg.jpg) no-repeat center top; position:relative}
        .wb_cts01 {width:100%; text-align:center; min-width:1210px; background:#f1efef url(http://file3.willbes.net/new_gosi/2018/08/EV180802_c2_bg.jpg) repeat-x}       
        .wb_cts02 {width:100%; text-align:center; min-width:1210px; background:#fff}       
        .wb_cts03 {width:100%; text-align:center; min-width:1210px; background:#31b38d}       
        .wb_cts05 {width:100%; text-align:center; min-width:1210px; background:#fff}

        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:261px; 
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
            <div><a href="#event"><img src="http://file3.willbes.net/new_gosi/2018/08/EV180802_c12.png" alt="윌비스 박민주 한국사" ></a></div>
		</div> 
        
        <div class="wb_top" >
      		<img src="http://file3.willbes.net/new_gosi/2018/08/EV180802_c1.png" alt="윌비스 한국사의 맥을 꿰뚫는 명품 강의 박민주 한국사 " usemap="#Map180802_c1" border="0"  />
            <map name="Map180802_c1" >
                <area shape="rect" coords="824,1077,1048,1180" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800120" target="_blank" onfocus="this.blur();" />
            </map>                  
        </div>
        <!--WB_top//-->      
      
        <div class="wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180802_c2.jpg" alt="많은 수험생들이 한국사를 버거워하는 이유는 무엇일까요? 체계 없이 단순 암기만을 추구하기 때문입니다." /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180802_c3.jpg" alt="윌비스 공무원 한국사의 대명사, 바로 민주국사입니다." />	
        </div><!--wb_cts01//-->      
  
        <div class="wb_cts02" >
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180802_c4.jpg" alt="윌비스 수강생들이 인정한 名品 한국사 강의!" />
        </div><!--wb_cts02//-->     

        <div class="wb_cts03" id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180802_c5.jpg" alt="방대한 양의 한국사, 구조화 이론으로 제대로 흐름 잡자!" usemap="#Map180802_c2" border="0" />
            <map name="Map180802_c2" >
                <area shape="rect" coords="726,786,974,926" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800120" onfocus="this.blur();" target="_blank" />
            </map>            
        </div><!--wb_cts03//-->

        <div class="wb_cts05" >
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180802_c6.jpg" alt="박민주 한국사 이용안내 및 유의사항 " />>	
        </div><!--wb_cts05//-->
    
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