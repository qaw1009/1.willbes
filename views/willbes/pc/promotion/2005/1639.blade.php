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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

		/************************************************************/ 

		.skybanner{position: fixed; top: 280px;right:2px;z-index: 1;}	  

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/05/1639_top_bg.jpg) no-repeat center top;}	
		.evt_01 {background:#211f20;}
        .evt_02 {background:#fff;}
        .evt_03 {background:#eee;}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1639_top.jpg" alt="경제학 gs3순환" />
		</div>

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1639_01.jpg" alt="경제학 gs3순환" />
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1639_02.jpg" alt="경제학 gs3순환" />
        </div>
        
        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1639_03.jpg" alt="경제학 gs3순환" usemap="#Map1639A" border="0" />
            <map name="Map1639A" id="Map1639A">
                <area shape="rect" coords="93,1376,546,1451" href="https://gosi.willbes.net/lecture/show/cate/3094/pattern/only/prod-code/164841" target="_blank" alt="5급행정" />
                <area shape="rect" coords="571,1373,1026,1455" href="https://gosi.willbes.net/lecture/show/cate/3095/pattern/only/prod-code/164851" target="_blank" alt="국립외교원" />
            </map>
		</div>
	</div>
    <!-- End Container -->
@stop