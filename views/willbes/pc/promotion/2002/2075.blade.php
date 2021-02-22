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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .sky {position:fixed;top:300px;right:10px;z-index:1;}
        .evt00 {background:#0a0a0a}  
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/02/2075_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#282D40}
        .evt02 {background:#E9E9E9}  
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2021/02/2075_03_bg.jpg) no-repeat center top;} 
        
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="sky" >
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2085" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/02/2075_sky.png" alt="스카이베너" ></a>
        </div>               

		<div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2075_top.jpg"  alt="3월 추천강좌" usemap="#Map2075_top" border="0" />
            <map name="Map2075_top" id="Map2075_top">
                <area shape="rect" coords="194,746,538,935" href="#apply1" />
                <area shape="rect" coords="575,748,916,939" href="#apply2" />
            </map>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2075_01.jpg"  alt="6개월 슈퍼패스 자세히 보기" usemap="#Map2075_01" border="0" />
            <map name="Map2075_01" id="Map2075_01">
                <area shape="rect" coords="359,1368,755,1458" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1975" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evt02" id="apply1">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2075_02.jpg" alt="6개월 슈퍼패스" usemap="#Map2075_02" border="0" />
            <map name="Map2075_02" id="Map2075_02">
                <area shape="rect" coords="151,465,303,519" href="https://police.willbes.net/pass/offPackage/show/prod-code/178693" target="_blank" />
                <area shape="rect" coords="485,465,636,520" href="https://police.willbes.net/pass/offPackage/show/prod-code/178691" target="_blank" />
                <area shape="rect" coords="810,466,967,520" href="https://police.willbes.net/pass/offPackage/show/prod-code/178694" target="_blank" />
            </map>
        </div> 

        <div class="evtCtnsBox evt03" id="apply2">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2075_03.jpg"  alt="과목개편 시험 대비" usemap="#Map2075_03" border="0" />
            <map name="Map2075_03" id="Map2075_03">
                <area shape="rect" coords="135,1985,999,2142" href="https://police.willbes.net/pass/offPackage/show/prod-code/176433" target="_blank" />
            </map>
        </div>

    </div>
    <!-- End Container -->
@stop