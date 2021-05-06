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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/05/2206_top_bg.jpg) no-repeat center top;}	
        .evtCtnsBox .title {color:#11153a; font-size:36px; margin:100px 0 50px;}
        .evt_01 {width:1120px; margin:0 auto;}

 
        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2206_top.jpg" alt="기록형 AtoZ" />
		</div>       

        <div class="evtCtnsBox evt_01">  
            <div class="title NSK-Black">[단과] 기록형 AToZ 특강</div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
            <div class="title NSK-Black">[기간제패키지] 기록형 AToZ 특강(강의소개필독)</div>            
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))            
            @endif  
        </div>        
	</div>
     <!-- End Container -->

@stop