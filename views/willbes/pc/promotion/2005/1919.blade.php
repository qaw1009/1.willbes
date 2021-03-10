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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; }

        /************************************************************/ 

        .evt_top {background:#ECECEC url(https://static.willbes.net/public/images/promotion/2020/11/1919_top_bg.jpg) no-repeat center top;}	
        
        .evt_01 {background:#fff}
        .evt_01 .title {width:1120px; font-size:36px;  margin:0 auto 20px; text-align:left; color:#47419C}
        .evt_01 .evt01_box {width:1120px; padding:20px 0; margin:0 auto 50px; background:#fff;} 	        
    
        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1919_top.jpg" alt="" />
		</div>

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1919_01.jpg" alt="" />
            <div class="title NSK-Black" style="padding-top:50px;">단과 [최종 마무리 핵심체크]</div>
            <div class="evt01_box">                
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif  
            <div class="title NSK-Black" style="padding:75px 0 25px;">단과 [사례형 전범위 모의시험+강평]</div>    
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                @endif                    
            </div>
		</div>

	</div>
    <!-- End Container -->
@stop