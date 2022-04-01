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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

		/************************************************************/ 

		.skybanner{position: fixed; top: 280px;right:2px;z-index: 1;}	  

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/04/1544_top_bg.jpg) no-repeat center top;}	

		.evt_01 {background:url(https://static.willbes.net/public/images/promotion/2021/04/1544_01_bg.jpg) no-repeat center top;}
        .evt_01 div {width:1120px; margin:0 auto; position:relative}
        .evt_02 {background:url(https://static.willbes.net/public/images/promotion/2021/04/1544_02_bg.jpg) no-repeat center top;}
        .evt_03 {background:url(https://static.willbes.net/public/images/promotion/2021/04/1544_03_bg.jpg) no-repeat center top;}
        .evt_04 {background:#2a2726}
        .evt_05 {padding:100px 0}
        
		.evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:20px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/1544_top.jpg" alt="황종휴 경제학" />
		</div>

		<div class="evtCtnsBox evt_01">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2022/04/1544_01.jpg" alt="경제학, 어떻게 준비하시겠습니까?" />
                <a href="#evt_04" title="" style="position: absolute; left: 23.13%; top: 66.61%; width: 52.86%; height: 15.14%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/1544_02.jpg" alt="3단계 기본기 완성" />
		</div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/1544_03.jpg" alt="경제학 예비순환" />
        </div>

        <div class="evtCtnsBox evt_04">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/1544_04.jpg" alt="특별 이벤트" />
        </div>   

        <div class="evtCtnsBox evt_05">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
        </div>       

	</div>
    <!-- End Container -->
@stop