@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">     
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; margin:0 auto; position:relative}
        .MainQuickMenuSSam {display:none}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/10/201028_ssam_top_bg.jpg) no-repeat center top;}
        .evt01 {}
        .evt02 {background:#33384c}
    </style> 

    <div class="evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/201028_ssam_top.jpg" alt="warm-up"/>            
        </div>

        <div class="evtCtnsBox evt01" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/201028_ssam_01.jpg" alt="초수 합격을 위한 선행학습"/>          
        </div>
        
        {{--단과 불러오기 PC--}}
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
        @endif 
        
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/201028_ssam_03.jpg" alt="유의사항"/>         
        </div>  
    </div>
    <!-- End Container -->
@stop