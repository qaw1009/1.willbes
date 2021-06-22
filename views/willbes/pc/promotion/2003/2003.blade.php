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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/ 

        .sky {position:fixed;top:250px;right:25px;z-index:1;}
        .sky a {display:block; margin-bottom:10px}

        .evtTop {background:#e1dddc url(https://static.willbes.net/public/images/promotion/2020/12/1971_top_bg.jpg) no-repeat center top;}	      
        .evtTop .tabs {width:1120px; margin:0 auto}
        .evtTop .tabs li {display:inline; float:left; width:33.333333%}
        .evtTop .tabs a {display:block; color:#b7b7b7; background:#37384b; padding:20px 0; text-align:center; font-size:35px; margin-right:1px}
        .evtTop .tabs a.active,
        .evtTop .tabs a:hover {color:#37384b; background:#fff;}
        .evtTop .tabs li:last-child {margin:0}
        .evtTop .tabs:after {content:''; display:block; clear:both}

        .evt02 {background:#e9e9e9;}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">

        <div class="sky">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2003_sky.png" alt="자격증" usemap="#Map2003_sky" border="0" />
            <map name="Map2003_sky" id="Map2003_sky">
                <area shape="rect" coords="0,-1,108,90" href="javascript:alert('2022 대비 Coming soon!')" />
                <area shape="rect" coords="-1,94,114,179" href="https://pass.willbes.net/promotion/index/cate/3028/code/2013" target="_blank" />
                <area shape="rect" coords="2,182,118,257" href="https://pass.willbes.net/promotion/index/cate/3028/code/2014" target="_blank" />
                <area shape="rect" coords="2,259,106,343" href="https://pass.willbes.net/promotion/index/cate/3028/code/2015" target="_blank" />
                <area shape="rect" coords="0,349,109,435" href="https://pass.willbes.net/promotion/index/cate/3028/code/2103" target="_blank" />
                <area shape="rect" coords="1,440,105,512" href="https://pass.willbes.net/promotion/index/cate/3028/code/2104" target="_blank" />
                <area shape="rect" coords="1,517,106,597" href="https://pass.willbes.net/promotion/index/cate/3028/code/2105" target="_blank" />
            </map>
        </div>

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1971_top.jpg" alt="윌비스 공무원 x 대방고시학원" />
            <ul class="tabs NSK-Black">
                <li><a href="/promotion/index/cate/3028/code/1971" target="_blank">기술직</a></li>
                <li><a href="/promotion/index/cate/3028/code/1999" target="_blank">세무직</a></li>
                <li><a href="#none" class="active">자격증</a></li>
            </ul>
		</div>

        <div id="tab03">
            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1971_tab03_01.jpg" alt="자격증" />
            </div>
            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1971_tab03_02.jpg" alt="자격증" usemap="#Map2003_apply" border="0" />
                <map name="Map2003_apply" id="Map2003_apply">
                    <area shape="rect" coords="115,655,296,704" href="https://pass.willbes.net/promotion/index/cate/3028/code/2103" target="_blank" />
                    <area shape="rect" coords="468,656,650,704" href="https://pass.willbes.net/promotion/index/cate/3028/code/2104" target="_blank" />
                    <area shape="rect" coords="822,656,1003,703" href="https://pass.willbes.net/promotion/index/cate/3028/code/2105" target="_blank" />
                </map>
            </div>
        </div>
	</div>
    <!-- End Container -->
@stop