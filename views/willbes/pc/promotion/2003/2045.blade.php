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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/ 

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/01/2045_top_bg.jpg) no-repeat center top;}	

        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2021/01/2045_01_bg.jpg) no-repeat center top;padding-bottom:50px;}	
        .evt_01 .title {width:1120px; font-size:25px;  margin:0 auto 20px; text-align:left; color:#464646;padding:25px;}
        .evt_01 .evt01_box {width:1120px; padding:20px 0; margin:0 auto 50px; background:#fff;} 	
 

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2045_top.jpg" alt="7급공채 기출해설 특강" />
		</div>      

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2045_01.jpg" alt="석치수,황종휴" />
            <div class="evt01_box" id="apply">                   
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif  
		</div>

	</div>
    <!-- End Container -->
@stop