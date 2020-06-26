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

        .evt_top {background:#2AC4EB url(https://static.willbes.net/public/images/promotion/2020/06/1704_top_bg.jpg) no-repeat center top;}        

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">

		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1704_top.jpg" alt="쿨썸머 이벤트" />>
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1704_01.jpg" alt="특별 이벤트" />
		</div>       

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1704_02.jpg" alt="수강신청" usemap="#Map1704a" border="0" />
                @if(empty($__cfg['CateCode']) === false && $__cfg['CateCode'] == '3094')
                <map name="Map1704a" id="Map1704a">
                    <area shape="rect" coords="153,800,494,910" href="{{ site_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only') }}" target="_blank"/>
                    <area shape="rect" coords="539,800,963,912" href="{{ site_url('/m/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only') }}" target="_blank"/>
                </map>
                @elseif(empty($__cfg['CateCode']) === false && $__cfg['CateCode'] == '3095')
                <map name="Map1704a" id="Map1704a">
                    <area shape="rect" coords="153,800,494,910" href="{{ site_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only') }}" target="_blank"/>
                    <area shape="rect" coords="539,800,963,912" href="{{ site_url('/m/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only') }}" target="_blank"/>
                </map>
                @endif         
        </div> 
        
	</div>
    <!-- End Container -->
@stop