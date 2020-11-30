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

        .skybanner {position:fixed;top:300px;right:10px;z-index:1;}

        .evt00 {background:#0a0a0a}
        .evtTop {background:#0DEAE5 url(https://static.willbes.net/public/images/promotion/2020/11/1952_top_bg.jpg) no-repeat center top; }   
        .evt01 {background:#282D41}
        .evt02 {background:#282D41}
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2020/11/1952_03_bg.jpg) no-repeat center top; }   
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">


        <div class="skybanner" >
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/1959" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/11/1952_sky.png" alt="스카이베너" ></a>
        </div>               

		<div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1952_top.jpg" alt="12월 추천 강좌" />
        </div>

        <div class="evtCtnsBox evt01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1952_01.jpg" alt="" />
        </div>     

        <div class="evtCtnsBox evt02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1952_02.jpg" alt="" usemap="#Map1952a" border="0" />
            <map name="Map1952a" id="Map1952a">
                <area shape="rect" coords="186,355,298,392" href="https://police.willbes.net/pass/offPackage/show/prod-code/175189" target="_blank" />
                <area shape="rect" coords="508,355,619,392" href="https://police.willbes.net/pass/offPackage/show/prod-code/175202" target="_blank" />
                <area shape="rect" coords="827,355,938,391" href="https://police.willbes.net/pass/offPackage/show/prod-code/175204" target="_blank" />
            </map>
        </div>    

        <div class="evtCtnsBox evt03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1952_03.jpg" alt="" />
        </div>    

    </div>
    <!-- End Container -->
@stop