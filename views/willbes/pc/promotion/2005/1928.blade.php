@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/11/1928_top_bg.jpg) no-repeat center top;}	
	        
    
        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1928_top.jpg" alt="" />
		</div>

		<div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1928_01.jpg" alt="" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
		</div>
        <div class="evtCtnsBox mt40">
            <a href="https://gosi.willbes.net/userPackage/show/cate/3096/prod-code/175131" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1928_02.jpg" alt="" />
            </a>
        </div>

	</div>
    <!-- End Container -->
@stop