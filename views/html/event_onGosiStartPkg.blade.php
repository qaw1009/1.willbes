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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}        

        .wb_top {background:#49494b url(http://file3.willbes.net/new_gosi/2018/10/EV181018_c1_bg.jpg)  no-repeat center top}
        .wb_cts01{background:#ffff00;}	
	    .wb_cts02{background:#fff url(http://file3.willbes.net/new_gosi/2018/10/EV181018_c4_bg.jpg) no-repeat center bottom}

        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:321px; 
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
                <a href="/event/movie/event.html?event_cd=On_190201_L" target="_blank">                    
                    <img src="http://file3.willbes.net/new_gosi/2018/10/EV181018_c5.png" alt="가입만 해도 6가지 혜택을 모~두! 윌비스 웰컴팩" >
                </a>
            </div>
		</div>
        
        <div class="evtCtnsBox wb_top">            
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181018_c1.jpg" alt=" 2019 윌비스 기초입문 풀패키지 O원 " usemap="#Map20181018_c1" border="0"  />
            <map name="Map20181018_c1" >
                <area shape="rect" coords="100,1665,1089,1783" href="http://www.willbesgosi.net/user/memberEntryProvision.html?topMenuType=O" target="_blank" onfocus="this.blur();"/>
            </map>
        </div><!--WB_top//-->      

        <div class="evtCtnsBox wb_cts01">
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181018_c2.jpg" alt="윌비스 충분히 고민하고 현명한 선택을 할 수 있도록 30일간 O원에 제공해드립니다." />
        </div><!--wb_cts01//-->    
  
        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181018_c3.jpg" alt="지금 가입하면 윌비스 기초입문 풀패키지가 0원!" usemap="#Map20181018_c2" border="0"/>
            <map name="Map20181018_c2" >
                <area shape="rect" coords="92,1955,1093,2059" href="http://www.willbesgosi.net/user/memberEntryProvision.html?topMenuType=O" onfocus="this.blur();" target="_blank" />
            </map>
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181018_c4.jpg" alt="윌비스 기초입문 풀패키지가 0원! 유의사항"/>
        </div><!--wb_cts02//-->    
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