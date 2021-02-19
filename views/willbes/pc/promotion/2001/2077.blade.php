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
            background:#fff;
        }
        .evtContent span {vertical-align:top;}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative}

        /************************************************************/

        .sky {position:fixed; top:225px;right:25px;z-index:10;}
        .sky li{padding-bottom:10px;}

        .evtTop00 {background:#0a0a0a}

        .evtTop {background: url(https://static.willbes.net/public/images/promotion/2021/02/2077_top_bg.jpg) no-repeat center top;}

        .evt02 {background:#E1E1E1}

        .evt03 {background:#F3F3F3}

        .evt04 {background:#784747;padding-bottom:100px;}

        .evt04_txt {color:#fff; margin-bottom:50px}    
        .evt04_txt span {border:3px solid #fff; border-radius:60px; padding:10px 20px; font-size:25px; display:inline-block;margin:10px;} 
        
        .evt04 .title {width:1120px; font-size:25px;  margin:0 auto 20px; text-align:left; color:#623a3b;padding:25px;}
        .evt04 .title .request{color:#f37853;}
        .evt04 .evt04_box {width:1120px; padding:20px 0; margin:0 auto 50px; background:#fff;} 	

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">        

        <ul class="sky">
            <li>
                <a href="#apply"> 
                    <img src="https://static.willbes.net/public/images/promotion/2021/02/2077_sky.png" alt="심화과정 바로가기" >
                </a>
            </li>            
        </ul>       
        
        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg" title="대한민국 경찰학원 1위">        
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2077_top.jpg" title="심화이론 이론.기출 패키지">        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2077_01.jpg" title="더 늦기전에 준비">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2077_02.jpg" title="전문교수진">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2077_03.jpg" title="지금부터 준비">
        </div>

        <div class="evtCtnsBox evt04" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2077_04.jpg" title="프리미엄 심화과정"/>
            <div class="evt04_txt">
                <span>일반경찰</span> <span>경행경채</span>
            </div>    
            <div class="evt04_box">       
                <div class="title NSK-Black">1. 온라인 심화과정 <span class="request">단과 신청 ></span></div>                 
                    @if(empty($arr_base['display_product_data']) === false)
                        @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                    @endif  
                <div class="title NSK-Black">2. 온라인 심화과정 <span class="request">패키지 신청 ></span></div>    
                    @if(empty($arr_base['display_product_data']) === false)
                        @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                    @endif                    
            </div>
        </div> 
        
	</div>
    <!-- End Container -->

    <script type="text/javascript">

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop