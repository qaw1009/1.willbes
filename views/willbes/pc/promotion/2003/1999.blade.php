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

        .sky {position:fixed; width:160px; top:75px;right:50px;z-index:1;}
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
            <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2013" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2013_sky.png" alt="">
            </a>            
            <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2014" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2014_sky.png" alt="">
            </a>
            <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2015" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2015_sky.png" alt="">
            </a>
            <a href="https://pass.willbes.net/promotion/index/cate/3028/code/1983" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/1983_sky.png" alt="">
            </a>
        </div>

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1971_top.jpg" alt="윌비스 공무원 x 대방고시학원" />
            <ul class="tabs NSK-Black">
                <li><a href="/promotion/index/cate/3028/code/1971" target="_blank">기술직</a></li>
                <li><a href="#none" class="active">세무직</a></li>
                <li><a href="/promotion/index/cate/3028/code/2003" target="_blank">자격증</a></li>
            </ul>
        </div>
        
        <div id="tab02">
            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1971_tab02_01.jpg" alt="세무직" />
            </div>
            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1971_tab02_02.jpg" alt="세무직" usemap="#Map1971C" border="0" />
                <map name="Map1971C">
                  <area shape="rect" coords="851,592,985,639" href="https://pass.willbes.net/lecture/show/cate/3022/pattern/only/prod-code/175999" target="_blank" alt="회계학 기본">
                  <area shape="rect" coords="852,650,985,696" href="https://pass.willbes.net/lecture/show/cate/3022/pattern/only/prod-code/176001" target="_blank" alt="회계학 심화">
                  <area shape="rect" coords="848,851,984,897" href="https://pass.willbes.net/lecture/show/cate/3022/pattern/only/prod-code/175992" target="_blank" alt="세법 기본">
                  <area shape="rect" coords="852,910,985,953" href="https://pass.willbes.net/lecture/show/cate/3022/pattern/only/prod-code/175998" target="_blank" alt="세법 심화">
                  <area shape="rect" coords="739,1308,932,1368" href="https://pass.willbes.net/promotion/index/cate/3022/code/1983" target="_blank" alt="세무직 패스">
                </map>
            </div>
        </div>
	</div>
    <!-- End Container -->
@stop