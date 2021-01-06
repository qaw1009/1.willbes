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
                <li><a href="#tab01" class="active">기술직</a></li>
                <li><a href="/promotion/index/cate/3028/code/1999" target="_blank">세무직</a></li>
                <li><a href="/promotion/index/cate/3028/code/2003" target="_blank">자격증</a></li>
            </ul>
		</div>

        <div id="tab01">
            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1971_tab01_01.jpg" alt="기술직" />
            </div>
            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1971_tab01_02.jpg" alt="기술직" usemap="#Map1971A" border="0" />
                <map name="Map1971A">
                    <area shape="rect" coords="243,585,332,627" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176362" target="_blank" alt="전산직 기초">
                    <area shape="rect" coords="243,653,329,693" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176364" target="_blank" alt="전산직 기본">
                    <area shape="rect" coords="243,726,333,765" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176366" target="_blank" alt="전산직 심화">
                    <area shape="rect" coords="91,1094,288,1154" href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/176396" target="_blank" alt="곽후근 티패스">
                    <area shape="rect" coords="613,602,700,642" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176388" target="_blank" alt="환경직 기초">
                    <area shape="rect" coords="613,688,700,730" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176390" target="_blank" alt="환경직 기본">
                    <area shape="rect" coords="613,772,700,812" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176391" target="_blank" alt="환경직 심화">
                    <area shape="rect" coords="614,840,700,883" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176393" target="_blank" alt="환경직 특채">
                    <area shape="rect" coords="464,1094,652,1155" href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/176398" target="_blank" alt="환경직 티패스">
                    <area shape="rect" coords="985,585,1071,627" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176367" target="_blank" alt="산림자원직 기초">
                    <area shape="rect" coords="983,649,1070,694" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176370" target="_blank" alt="산림자원직 기본">                
                    <area shape="rect" coords="830,1095,1028,1153" href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/176397" target="_blank" alt="산림자원직 티패스">
                </map>
                <br>
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1971_tab01_03.jpg" alt="기술직" usemap="#Map1971B" border="0" />
                <map name="Map1971B">
                    <area shape="rect" coords="226,378,314,424" href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/51162?subject_idx=1169&subject_name=%EC%BB%B4%ED%93%A8%ED%84%B0%EC%9D%BC%EB%B0%98&tab=open_lecture" target="_blank" alt="곽후근">
                    <area shape="rect" coords="772,379,868,422" href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/51163?subject_idx=2129&subject_name=%ED%99%98%EA%B2%BD%EA%B3%B5%ED%95%99&tab=open_lecture" target="_blank" alt="신영조">
                    <area shape="rect" coords="226,560,313,600" href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/51165?subject_idx=1182&subject_name=%ED%99%94%ED%95%99&tab=open_lecture" target="_blank" alt="송연욱">
                    <area shape="rect" coords="775,559,868,600" href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/51164?subject_idx=1182&subject_name=%ED%99%94%ED%95%99&tab=open_lecture" target="_blank" alt="김병일">
                    <area shape="rect" coords="227,739,314,783" href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/50395?subject_idx=2130&subject_name=%ED%99%98%EA%B2%BD%EB%B3%B4%EA%B1%B4&tab=open_lecture" target="_blank" alt="하재남">
                    <area shape="rect" coords="776,740,865,782" href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/50541?subject_idx=1223&subject_name=%EC%9E%84%EC%97%85%EA%B2%BD%EC%98%81&tab=open_lecture" target="_blank" alt="장재영">
                    <area shape="rect" coords="109,1219,302,1277" href="https://pass.willbes.net/promotion/index/cate/3028/code/2013" target="_blank" alt="전산직 패스">
                    <area shape="rect" coords="461,1216,656,1279" href="https://pass.willbes.net/promotion/index/cate/3028/code/2014" target="_blank" alt="환경직 패스">
                    <area shape="rect" coords="814,1219,1009,1278" href="https://pass.willbes.net/promotion/index/cate/3028/code/2015" target="_blank" alt="산림자원직 패스">
                </map>
            </div>
        </div>
	</div>
    <!-- End Container -->
@stop