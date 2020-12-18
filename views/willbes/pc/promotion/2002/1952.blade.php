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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/12/1874_top_bg.jpg) no-repeat center top;}
        .evtTop01 {background:#282D41}
        .evtTop02 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1874_02_bg.jpg) no-repeat center top;}
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

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1874_top.jpg"  alt="12월 추천강좌" usemap="#Map1874" border="0" />
            <map name="Map1874">
              <area shape="rect" coords="834,799,1076,909" href="https://police.willbes.net/promotion/index/cate/3001/code/1864" target="_blank" alt="0원패스">
            </map>
        </div>

        <div class="evtCtnsBox evtTop01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1874_01.jpg"  alt="" usemap="#Map1874z" border="0" />
            <map name="Map1874z" id="Map1874z">
                <area shape="rect" coords="373,1150,745,1234" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1969" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evt02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1952_02.jpg" alt="" usemap="#Map1952a" border="0" />
            <map name="Map1952a" id="Map1952a">
                <area shape="rect" coords="186,355,298,392" href="https://police.willbes.net/pass/offPackage/show/prod-code/175189" target="_blank" />
                <area shape="rect" coords="508,355,619,392" href="https://police.willbes.net/pass/offPackage/show/prod-code/175202" target="_blank" />
                <area shape="rect" coords="827,355,938,391" href="https://police.willbes.net/pass/offPackage/show/prod-code/175204" target="_blank" />
            </map>
        </div>    

        <div class="evtCtnsBox evtTop02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1874_02.jpg"  alt="" usemap="#Map1874y" border="0" />
            <map name="Map1874y" id="Map1874y">
                <area shape="rect" coords="422,1914,693,1956" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1980" target="_blank" />
                <area shape="rect" coords="120,2201,979,2367" href="https://police.willbes.net/pass/offPackage/show/prod-code/176430" target="_blank" />
            </map>
        </div>   

    </div>
    <!-- End Container -->
@stop