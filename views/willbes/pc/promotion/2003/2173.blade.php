@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
    .evtContent { 
        position:relative;            
        width:100% !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }	
    .evtContent span {vertical-align:auto}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
    /*****************************************************************/     
    
    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/04/2173_top_bg.jpg) no-repeat center top;} 
    .evt_01 {background:#fff340} 

    </style>


    <div class="evtContent NSK">
        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2173_top.jpg" alt="공린이를 위한 단과" />
        </div>

        <div class="evtCtnsBox evt_01">  
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2173_01.jpg" alt="합리적인 가격" />
        </div>

        <div class="evtCtnsBox evt_02">  
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2173_02_01.jpg" alt="" />
            <div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2173_02_02.jpg" alt="" />
            <div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                @endif
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2173_02_03.jpg" alt="" />
            <div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
                @endif
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2173_02_04.jpg" alt="" />
            <div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>4))
                @endif
            </div>
        </div>          
    </div>
   <!-- End Container -->
@stop