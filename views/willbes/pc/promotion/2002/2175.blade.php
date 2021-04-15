@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/
        .sky {position:fixed;top:300px;right:10px;z-index:1;}

        .evt00 {background:#0a0a0a}  
        
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/04/2175_top_bg.jpg) no-repeat center top;}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2021/04/2175_03_bg.jpg) no-repeat center top;} 
        
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="sky" >
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2135" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2175_sky.png" alt="스카이베너" ></a>
        </div>               

		<div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2175_top.jpg"  alt="5월 추천강좌" />
        </div> 

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2175_01.jpg"  alt="5개월 필합패스" />
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2169" target="_blank" title="5개월 필합패스 자세히 보기" style="position: absolute; left: 56.32%; top: 92.24%; width: 15.05%; height: 4.54%; z-index: 2;"></a>  
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2175_02.jpg"  alt="신청하기" />
            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/181461" target="_blank" title="원유철 신청하기" style="position: absolute; left: 28.32%; top: 36.24%; width: 9.05%; height: 3.54%; z-index: 2;"></a>  
            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/181463" target="_blank" title="오태진 신청하기" style="position: absolute; left: 45.32%; top: 36.24%; width: 9.05%; height: 3.54%; z-index: 2;"></a>  
            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/181464" target="_blank" title="경행경채 신청하기" style="position: absolute; left: 62.32%; top: 36.24%; width: 9.05%; height: 3.54%; z-index: 2;"></a>  
            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/181465" target="_blank" title="원유철 최불 신청하기" style="position: absolute; left: 28.32%; top: 76.24%; width: 9.05%; height: 3.54%; z-index: 2;"></a>  
            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/181466" target="_blank" title="오태진 최불 신청하기" style="position: absolute; left: 45.32%; top: 76.24%; width: 9.05%; height: 3.54%; z-index: 2;"></a>  
            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/181467" target="_blank" title="경행경채 최불 신청하기" style="position: absolute; left: 62.32%; top: 76.24%; width: 9.05%; height: 3.54%; z-index: 2;"></a>  
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2175_03.jpg"  alt="과목개편 시험 대비" />
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2171" target="_blank" title="10개월 슈퍼패스 자세히 보기" style="position: absolute; left: 57.32%; top: 68.24%; width: 16.05%; height: 2.54%; z-index: 2;"></a>  
            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/181444" target="_blank" title="10개월 슈퍼패스 신청하기" style="position: absolute; left: 30.32%; top: 89.24%; width: 12.05%; height: 2.54%; z-index: 2;"></a>  
            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/181445" target="_blank" title="환승/재등록 신청하기" style="position: absolute; left: 57.32%; top: 89.24%; width: 12.05%; height: 2.54%; z-index: 2;"></a>  
        </div>

    </div>
    <!-- End Container -->
@stop