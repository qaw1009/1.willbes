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

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/05/1637_top_bg.jpg) no-repeat center top;}	
		.evt_01 {background:#fff;}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1637_top.jpg" alt="PSAT 기초입문강의" />
		</div>

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1637_01.jpg" alt="PSAT 기초입문강의" usemap="#Map1637" border="0" />
            <map name="Map1637">
                <area shape="rect" coords="253,657,865,774" href="https://gosi.willbes.net/lecture/index/cate/3096/pattern/only?search_order=course&course_idx=1128&school_year=2020" target="_blank">
            </map>
		</div>
	</div>
    <!-- End Container -->
@stop