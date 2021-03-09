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
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/ 

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/11/1933_top_bg.jpg) no-repeat center top;}	

        .evt_01 {background:#F75C64;}
        
        .evt_02 {background:#fff;padding-bottom:100px;}
        .evt_02 .title {width:1120px; font-size:25px;  margin:0 auto 20px; text-align:left; color:#464646}
        .evt_02 .evt02_box {width:1120px; padding:20px 0; margin:0 auto 50px; background:#fff;} 	
        .evt_02 .evt02_box .dis{color:#f35a61;vertical-align:baseline;}        
        .evt_02 .evt02_box .evt{color:#fff;vertical-align:baseline;border-radius:30px;background:#f35a61;padding:0 10px;}
        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1933_top.jpg" alt="" usemap="#Map1933_apply" border="0" />
            <map name="Map1933_apply" id="Map1933_apply">
                <area shape="rect" coords="251,914,879,1038" href="#apply" />
            </map>
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1933_01.jpg" alt="" />
		</div>

		<div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1933_02.jpg" alt="" />
            <div class="evt02_box" id="apply">       
            <div class="title NSK-Black" style="padding:75px 0 25px;"><span class="dis">50%할인</span> <span class="evt">EVENT1</span> 7급 PSAT CORE 특강 PASS </div>                 
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif  
            <div class="title NSK-Black" style="padding:75px 0 25px;"><span class="dis">단과 40%할인</span> <span class="evt">EVENT2</span> 7급 PSAT CORE 특강 단과반 </div>    
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                @endif                    
            </div>
		</div> 

	</div>
    <!-- End Container -->
@stop