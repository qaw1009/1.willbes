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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/05/2205_top_bg.jpg) no-repeat center top;}
        .evt_01 {width:1120px; margin:0 auto;}
 
        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2205_top.jpg" alt="빈출쟁점정리" />
		</div>       

        <div class="evtCtnsBox evt_01">  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2205_01.jpg" alt="강사진" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
        </div>        
	</div>
     <!-- End Container -->

@stop