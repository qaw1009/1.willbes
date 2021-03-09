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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/01/2030_top_bg.jpg) no-repeat center top;}	

        .evt_01 {background:#F8F8F8;}
        
        .evt_02 {background:#ffd6a2;padding-bottom:100px;}
        .evt_02 .title {width:1120px; font-size:25px;  margin:0 auto 20px; text-align:left; color:#464646;padding:25px;}
        .evt_02 .evt02_box {width:1120px; padding:20px 0; margin:0 auto 50px; background:#fff;} 	
 
        .evt_03 {background:#a2cbff;padding-bottom:100px;}

        .evt_04 {background:#ffadb0;padding-bottom:100px;}
        .evt_04 .title {width:1120px; font-size:25px;  margin:0 auto 20px; text-align:left; color:#464646;padding:25px;}
        .evt_04 .evt04_box {width:1120px; padding:20px 0; margin:0 auto 50px; background:#fff;} 	
 
        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2030_top.jpg" alt="오픈 피셋 클라스" />
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2030_01.jpg" alt="4명 교사" />
		</div>

		<div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2030_02.jpg" alt="7급 피셋 기본" />
            <div class="evt02_box" id="apply">       
            <div class="title NSK-Black">1. 7급 OPEN PSAT CLASS PASS반 </div>                 
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif  
            <div class="title NSK-Black">2. 7급 OPEN PSAT CLASS 단과반 </div>    
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                @endif                    
            </div>
		</div> 
        
		<div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2030_03.jpg" alt="7급 피셋 전과정반" />
            <div class="evt03_box" id="apply">       
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
                @endif                    
            </div>
		</div> 
        
		<div class="evtCtnsBox evt_04">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2030_04.jpg" alt="7급 피셋 코어 클라스" />
            <div class="evt04_box" id="apply">       
            <div class="title NSK-Black">1. 7급 PSAT CORE CLASS PASS반  </div>                 
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>4))
                @endif  
            <div class="title NSK-Black">2. 7급 PSAT CORE CLASS 단과반 </div>    
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>5))
                @endif                    
            </div>
		</div> 

	</div>
    <!-- End Container -->
@stop