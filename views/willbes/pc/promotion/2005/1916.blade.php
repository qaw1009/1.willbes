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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/ 

        .evt_top {background:#39056A url(https://static.willbes.net/public/images/promotion/2020/11/1916_top_bg.jpg) no-repeat center top;}	
        
        .evt_01 {background:#303030 url(https://static.willbes.net/public/images/promotion/2020/11/1916_01_bg.jpg) no-repeat center top;}	
        
        .evt_02 {background:#F9F9F9 url(https://static.willbes.net/public/images/promotion/2020/11/1916_02_bg.jpg) no-repeat center top;}	

        .evt_03 {background:#fff url(https://static.willbes.net/public/images/promotion/2020/11/1916_03_bg.jpg) no-repeat center top;}

        .evt_04 {background:#fff url(https://static.willbes.net/public/images/promotion/2020/09/1848_04_bg.jpg) repeat-x center top;padding-bottom:25px;}
        .evt_04 .title {width:1120px; font-size:36px;  margin:0 auto 20px; text-align:left; color:#65069b;padding-top:50px;}
        .evt_04 .evt_04box {width:1120px; padding:20px 0; margin:0 auto 50px; background:#fff;} 

        .evt_05 {background:#fff url(https://static.willbes.net/public/images/promotion/2020/09/1848_05_bg.jpg) repeat-x center top;padding-bottom:25px;}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1916_top.jpg" alt="" />
		</div>

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1916_01.jpg" alt="" />
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1916_02.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1916_03.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1916_04.jpg" title="">
            <div class="title NSK-Black">기간제 패키지 강좌</div>
            <div class="evt_04box">                
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif                
            </div>
        </div>

        <div class="evtCtnsBox evt_05">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1916_05.jpg" alt="" usemap="#Map1916a" border="0" />
            <map name="Map1916a" id="Map1916a">
                <area shape="rect" coords="849,113,1064,178" href="https://gosi.willbes.net/userPackage/show/cate/3094/prod-code/174697" target="_blank" />
            </map>
        </div>

	</div>
    <!-- End Container -->
@stop