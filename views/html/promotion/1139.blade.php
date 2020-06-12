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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/  

        .wb_top {background:#1e1e1e url(http://file3.willbes.net/new_cop/On_Transfer/EV190320_p1_bg.jpg) no-repeat center;}
        .wb_cts01 {background:#2d2d2d url(http://file3.willbes.net/new_cop/On_Transfer/EV190320_p2_bg.jpg) no-repeat center top;}
        .wb_cts02 {background:#161b1c url(http://file3.willbes.net/new_cop/On_Transfer/EV190320_p3_bg.jpg) no-repeat center top;}        
        .wb_cts03 {background:#f7f7f7;}	
        .wb_cts03 ul{width:100%; margin:0 auto; letter-spacing: -1px;}

        .content_guide_wrap{background:#fff; margin:0;}
        .content_guide_box{ position:relative; width:980px; margin:0 auto; padding:50px 0;}
        .content_guide_box .guide_tit{margin-bottom:20px;}
        .content_guide_box dl{ margin:0 20px; word-break:keep-all;border:2px solid #202020;padding:30px;}
        .content_guide_box dt{ margin-bottom:10px;}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-size:13px; font-weight:bold; margin-right:10px;}
        .content_guide_box dt img.btn{padding:2px 0 0 0;}
        .content_guide_box dd{ color:#777; font-size:13px; margin:0 0 20px 5px; line-height:17px;}
        .content_guide_box dd strong{ color:#555;}
        .content_guide_box dd p{ margin-bottom:3px;}
        .content_guide_box dd p.guide_txt_01{margin:5px 0 5px 15px;}


        .skybanner {
            position:fixed;
            bottom:200px;
            right:10px;
            width:167px;
            z-index:1;
        }
        .skybanner2 {
            position:absolute;
            width:187px;
            top:50px;
            left:50%;
            margin-left:-660px; 
            z-index:1;
        }        	
    </style>

    <div class="evtContent" id="evtContainer">      

        <!--퀵메뉴-->
        <div class="skybanner">
            <img src="http://file3.willbes.net/new_cop/On_Transfer/EV190320_p_sky.png" usemap="#sky01" alt="합격환승이벤트">
            <map name="sky01">
                <area shape="rect" coords="34,18,129,88" href="#transfer" alt="맨위로">
                <area shape="rect" coords="34,98,129,152" href="#sky1" alt="합격환승이벤트">
                <area shape="rect" coords="34,169,129,226" href="#sky2" alt="타학원 수강 인증">
                <area shape="rect" coords="34,242,129,294" href="#sky3" alt="이벤트 참여방법">
            </map>
        </div>

        <!--이벤트설명-->
        <div class="skybanner2">
            <img src="http://file3.willbes.net/new_cop/On_Transfer/EV190320_p_sky2.png" alt="타 학원 수강 인증 시, PASS 수강료 지원">
        </div>

        <div class="evtCtnsBox wb_top" id="transfer">
            <img src="http://file3.willbes.net/new_cop/On_Transfer/EV190320_p1.png" alt="합격환승"  />
        </div>

        <div class="evtCtnsBox wb_cts01" id="sky1">
            <img src="http://file3.willbes.net/new_cop/On_Transfer/EV190320_p2.png"  alt="합격입니다 " />
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/On_Transfer/EV190320_p3_1.png" alt="수강료지원" id="sky2"/>
            <img src="http://file3.willbes.net/new_cop/On_Transfer/EV190320_p3_2.png" alt="타학원 수강 인증" usemap="#rebound1" />
            <map name="rebound1">
                <area shape="rect" coords="273,428,698,507" href="javascript:doEvent()" onfocus='this.blur()' alt="타학원 수강 인증">
            </map>  
            <img src="http://file3.willbes.net/new_cop/On_Transfer/EV190320_p3_3.png" alt="이벤트참여방법" id="sky3"/>
        </div>
              
    </div>
    <!-- End Container --> 

    
@stop