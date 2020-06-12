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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_cts01 {background:url(http://file3.willbes.net/new_gosi/2019/01/EV190122Y_01_bg.jpg) no-repeat center top;}
        .wb_cts02 {background:#eaeaea url(http://file3.willbes.net/new_gosi/2019/01/EV190122Y_02_bg.jpg) no-repeat center top}	
        .wb_cts03 {background:url(http://file3.willbes.net/new_gosi/2019/01/EV190122Y_03_bg.jpg) no-repeat center top; position:relative}
        .wb_cts03 a {position:absolute; width:661px; bottom:330px; left:52%; margin-left:-200px}

        .m_img1 {position:fixed;top:240px;right:10px;z-index:1}
    </style>


    <div class="evtContent" id="evtContainer">
        <div class="m_img1">
            <a href="{{ site_url('/mockTest/apply/cate/3019') }}" target="_blank" ><img src="http://file3.willbes.net/new_gosi/2019/01/EV190122Y_sky.png" alt="전국모의고사 신청하기" /></a>
        </div>
            
        <div class="evtCtnsBox wb_cts01" id="main">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190122Y_01.jpg" alt="실강pass"  />
        </div>
        
        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190122Y_02.jpg"  alt="실강pass안내" /><br />
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190122Y_02_1.jpg"  alt="실강pass안내" />
        </div>
        
        <div class="evtCtnsBox wb_cts03" id="pass1">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190122Y_03.jpg"  alt="실강pass안내" usemap="#Map190122A" border="0" />
            <map name="Map190122A" id="Map190122A">
                <area shape="rect" coords="524,434,1027,548" href="{{ site_url('/mockTest/apply/cate/3019') }}" target="_blank" />
            </map>            
        </div>	
    </div>
    <!-- End Container -->      

@stop