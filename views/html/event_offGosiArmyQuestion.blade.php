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

        .wb_top {
            width:100%; min-width:1210px; text-align:center; 
            background:#000 url(http://file3.willbes.net/new_gosi/2019/01/EV190130_1_bg.png) no-repeat center top; position:relative;
        }
        .Wb_box  {display:block; width:1210px; margin:auto;} 
        
        .wb_cts02 {background:#ebebe1;}

        .wb_cts03 {background:#ebebe1;}	
        
        .wb_cts04 {background:#ebebe1;}

        .wb_cts05 {background:#b99b81 url(http://file3.willbes.net/new_gosi/2019/01/EV190130_5_bg.png) no-repeat center top;}
        .youtube01 {width:920px; border:16px solid #a98a6a; margin:auto; padding-bottom:100px;}

        .wb_cts06 {background:#ebebe1;}

        .wb_cts07 {background:#ebebe1;}

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            width:100px; 
            animation:upDown 1s infinite;
            -webkit-animation:upDown 1s infinite;
            z-index:10;
        }
        .skybanner div {margin-bottom:5px}
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
            <ul>
                <li><img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_sky1.gif" alt="군무원상담전화번호"></li>
                <li><a href="{{ site_url('/examAnnouncement/index/cate/3024') }}" target="_blank" ><img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_sky2.png" alt="시험정보" ></a></li>
                <li><a href="{{ site_url('/pass/promotion/index/cate/3043/code/1101') }}" target="_blank" ><img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_sky3.png" alt="통생반" ></a></li>
                <li><a href="https://www.youtube.com/watch?v=A6Vx6zyGmCg" target="_blank" ><img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_sky4.png" alt="통생반" ></a></li>
            </ul>
		</div>  

        <div class="evtCtnsBox wb_top">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_1.png" alt="윌비스군무원 이론요약&단원별문풀"/>
        </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_2.png" alt="#" />
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_3.png" alt="#" />
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_4.png" alt="#" />
        </div>
        <!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts05">
            <img src="http://file3.willbes.net/new_gosi/2018/11/EV181126_11_1.png" alt="#" border="0" />
            <div class="youtube01"><iframe width="920" height="515" src="https://www.youtube.com/embed/rMz8yDR9QNg" frameborder="0" allowfullscreen></iframe></div>
        </div>
        <!--wb_cts05//-->

        <div class="evtCtnsBox wb_cts06">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_6.png" alt="#" />
        </div>
        <!--wb_cts06//-->

        <div class="evtCtnsBox wb_cts07">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_7.png" alt="#"  usemap="#EV190130_7" border="0" />
            <map name="EV190130_7" id="EV190130_7">
                <area shape="rect" coords="986,197,1088,250" href="{{ site_url('/Package/show/cate/3043/pack/648001/prod-code/127443') }}" />
                <area shape="rect" coords="988,476,1086,537" href="{{ site_url('/Package/show/cate/3043/pack/648001/prod-code/127444') }}" />
            </map>
        </div>
        <!--wb_cts07//-->
    
    </div>
    <!-- End Container -->
                    
    <script>       
        /**/
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */   
	    });
    </script>   

@stop