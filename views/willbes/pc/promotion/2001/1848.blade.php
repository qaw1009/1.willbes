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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#dcdcdc;
        }
        .evtContent span {vertical-align:top;}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .sky {position:fixed; top:200px;right:10px;z-index:10;}

        .evtTop00 {background:#0a0a0a;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/1848_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#fff;}

        .evt02 {background:#fff url(https://static.willbes.net/public/images/promotion/2020/09/1848_02_bg.jpg) repeat-x center top;padding-bottom:100px}
        .evt02 .title {width:1120px; font-size:36px;  margin:0 auto 20px; text-align:left; color:#65069b}
        .evt02 .evt02box {width:1120px; padding:20px 0; margin:0 auto 50px; background:#fff;} 
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">  
        <div class="sky">
            <a href="#evt02">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1848_sky.jpg" alt="할인쿠폰 바로보기" >
            </a>        
        </div>       
        
        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg" title="대한민국 경찰학원 1위">        
        </div>
        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1848_top.jpg" title="심화 이론.기출 패키지">        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1848_01.jpg" title="쿠폰 이벤트">
        </div>

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1848_02.jpg" title="더 늦기전에 준비">
            <div class="title NSK-Black">단과</div>
            <div class="evt02box">                
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif                
            </div>
            <div class="title NSK-Black">패키지</div>
            <div class="evt02box">                
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                @endif                
            </div>
        </div>              
    </div>
    <!-- End Container -->
@stop