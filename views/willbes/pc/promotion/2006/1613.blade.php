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
        .evt_top {background:#1E1F21 url(https://static.willbes.net/public/images/promotion/2020/04/1613_top_bg.jpg) no-repeat center top;}

		.evt_02 {background:#535353;padding-bottom:50px;} 

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">

		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1613_top.jpg" alt="감정평가사 파이널 패키지"/>
		</div>	

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1613_01.jpg" alt="수강신청" usemap="#Map1613a" border="0"/>
            <map name="Map1613a" id="Map1613a">
                <area shape="rect" coords="831,585,1031,686" href="https://job.willbes.net/package/show/cate/309003/pack/648001/prod-code/164215" target="_blank" onfocus='this.blur()' />
            </map>
		</div>	

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1613_02.jpg" alt="상품 이용안내"/>
		</div>	

	</div>
    <!-- End Container -->

    <script type="text/javascript">
      
    </script>
@stop