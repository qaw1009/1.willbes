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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        .wb_top {background:#555653 url(http://file3.willbes.net/new_gosi/2018/07/EV180723_c1_bg.jpg) no-repeat center top; position:relative;  }
        .wb_cts01 {background:#9cffbc url(http://file3.willbes.net/new_gosi/2018/07/EV180723_c2_bg.jpg) repeat-x}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#34372e url(http://file3.willbes.net/new_gosi/2018/07/EV180718_c7_bg.jpg) repeat;}
        .wb_cts05 {background:#fff}

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
            <div>
                <!-- a href="javascript:alert('마감되었습니다.');" /-->    
                <a href="#event">                    
                    <img src="http://file3.willbes.net/new_gosi/2018/07/EV180723_c12.png" alt="한권으로 공부하는 회계학" >
                </a>
            </div>
		</div>
        
        <div class="evtCtnsBox wb_top" >
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180723_c1.png" alt="윌비스 빛처럼 빠른 공무원 영어 정복 성기건 영어 " usemap="#Map20180719_c1" border="0"  />
            <map name="Map20180719_c1" >
                <area shape="rect" coords="823,1078,1047,1181" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800118" target="_blank" onfocus="this.blur();" />
            </map>
        </div>
        <!--WB_top//-->      
      
        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180723_c2.jpg" alt="쉬워도 문제, 어려우면 더 문제! 영어, 확실하게 준비하고 계신가요?" />
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180723_c3.jpg" alt="윌비스 성기건 교수님과 함께면 독해도 문법도 문제 없습니다." />	
        </div>
        <!--wb_cts01//-->      
  
        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180723_c4.jpg" alt="윌비스 성기건 교수님을 선택한다는 것,그것 하나만으로도 영어는 충분합니다." />	
        </div>
        <!--wb_cts02//--> 
      

        <div class="evtCtnsBox wb_cts03" id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180723_c5.jpg" alt="영어, 어떤 문제에도 당황하지 않는 자신감을 길러라!" usemap="#Map180724_c2" border="0" />
            <map name="Map180724_c2" >
                <area shape="rect" coords="779,738,1027,878" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800118" onfocus="this.blur();" target="_blank" />
            </map>            	
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts05" >
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180723_c6.jpg" alt="성기건영어 이용안내 및 유의사항 " />	
        </div>
        <!--wb_cts05//-->
    
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