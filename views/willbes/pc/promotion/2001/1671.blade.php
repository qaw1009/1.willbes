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
            background:#F4F4F4;
        }
        .evtContent span {vertical-align:top;}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative}

        /************************************************************/

        .sky {position:fixed; top:225px;right:0;z-index:10;}
        .sky li{padding-bottom:10px;}

        .evtTop00 {background:#404040}

        .evtTop {background:#071c41 url(https://static.willbes.net/public/images/promotion/2020/06/1671_top_bg.jpg) no-repeat center top;}

        .evt01,.evt02,.evt03 {background:#fff}

        .evt04 {padding-bottom:150px;}
        
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">        

        <ul class="sky">
            <li>
                <a href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1006" target="_blank"> 
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1671_sky01.png" alt="일반경찰 패키지" >
                </a>
            </li>
            <li>
                <a href="https://police.willbes.net/package/show/cate/3002/pack/648001/prod-code/165250" target="_blank"> 
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1671_sky02.png" alt="경행경채 패키지" >
                </a>
            </li>                
        </ul>       
        
        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_00.jpg" title="대한민국 경찰학원 1위">        
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1671_top.jpg" title="프리미엄 심화기출">        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1671_01.jpg" title="더 늦기전에 준비">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1671_02.jpg" title="전문교수진">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1671_03.jpg" title="지금부터 준비">
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1671_title.jpg" title="심화기출 강좌"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial')
            @else
              
            @endif          
        </div> 
        
	</div>
    <!-- End Container -->

    <script type="text/javascript">

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop