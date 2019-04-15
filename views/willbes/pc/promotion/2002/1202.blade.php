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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skyBanner {position:fixed; top:200px;right:10px;z-index:10;}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1202_top_bg.jpg) no-repeat center top;}   
        .evt01 {background:#e3e1db}
        .evt02 {background:#cacaca}
        .evt03 {background:#f7f7f7}
        .evt03 .evtInmg {position:relative; width:1120px; margin:0 auto}
        .evt03 .evtInmg div {position:absolute; top:1331px; text-align:center; width:100%; z-index:1; }
        .evt03 .evtInmg div a {margin:0 5px}
    </style>

<div class="p_re evtContent NSK" id="evtContainer">
    <div class="skyBanner">
        <a href="#lecGo"><img src="https://static.willbes.net/public/images/promotion/2019/04/1202_skybanner.png" title="4개월 심화+문풀"></a>      
    </div> 

    <div class="evtCtnsBox evtTop">
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1202_top.jpg" title="필합 4개월 pass">
	</div>

	<div class="evtCtnsBox evt01">
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1202_01.jpg" title="대한민국 1등 경찰학원, 경찰합격의 솔루션">
	</div>

	<div class="evtCtnsBox evt02">
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1202_02.jpg" title="필합 pass 특징">
	</div>

	<div class="evtCtnsBox evt03" id="lecGo">
        <div class="evtInmg">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1202_03.jpg" title="필합 pass 수강신청">
            <div>
                <a href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/04/1202_btn01.png" title="일반경채 4개월 필합 pass"></a>
                <a href="https://police.willbes.net/pass/offPackage/index?cate_code=3011&campus_ccd=605001" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/04/1202_btn02.png" title="경행경채 4개월 필합 pass"></a>
            </div>
        </div>	
	</div>
</div>
<!-- End Container -->
@stop