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
            position: relative;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

        /************************************************************/        

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/06/2259_top_bg.jpg) no-repeat center top;}
        .evt_01 {width:1120px; margin:0 auto;}
 
        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2259_top.jpg" alt="썸머 이벤트" />
		</div>       

        <div class="evtCtnsBox evt_01">  
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2259_01.jpg" alt="강사진" />     
                <a href="https://gosi.willbes.net/lecture/index/cate/3099/pattern/only" target="_blank" title="pc수강" style="position: absolute; left: 14.55%; top: 68.12%; width: 34.91%; height: 5.67%; z-index: 2;"></a>
                <a href="https://gosi.willbes.net/m/lecture/index/cate/3099/pattern/only" target="_blank" title="모바일수강" style="position: absolute; left: 50.27%; top: 68.12%; width: 34.91%; height: 5.67%; z-index: 2;"></a>
            </div>
        </div>        
	</div>
     <!-- End Container -->

@stop