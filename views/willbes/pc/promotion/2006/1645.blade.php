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
        .evt_top {background:#1c4a9f url(https://static.willbes.net/public/images/promotion/2020/05/1645_top_bg.jpg) no-repeat center top;}

		.evt_02 {background:#535353;padding-bottom:50px;} 

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">

		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1645_top.jpg" alt="GS0 순환 할인"/>
		</div>	

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1645_01.jpg" alt="수강신청" usemap="#Map1645a" border="0" />
            <map name="Map1645a" id="Map1645a">
                <area shape="rect" coords="81,1778,552,1856" href="https://job.willbes.net/lecture/index/cate/309002/pattern/only?search_order=course&course_idx=1117" target="_blank" />
                <area shape="rect" coords="567,1779,1042,1857" href="https://job.willbes.net/userPackage/show/cate/309002/prod-code/160305" target="_blank" />
            </map>           
		</div>	

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1645_02.jpg" alt="수강안내"/>
		</div>	

	</div>
    <!-- End Container -->

    <script type="text/javascript">
      
    </script>
@stop