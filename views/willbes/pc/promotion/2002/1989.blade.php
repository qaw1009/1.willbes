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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/12/1989_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#282D41}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1989_02_bg.jpg) no-repeat center top; }   
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="skybanner" >
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2004" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/12/1989_sky.png" alt="스카이베너" ></a>
        </div>               

		<div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1989_top.jpg"  alt="1월 추천강좌" />
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1989_01.jpg"  alt="" usemap="#Map1989B" border="0" />
            <map name="Map1989B" id="Map1989B">
                <area shape="rect" coords="374,1135,746,1219" href="https://police.willbes.net/promotion/index/cate/3001/code/1959" target="_blank" alt="문제풀이" />
                <area shape="rect" coords="314,1645,442,1699" href="https://police.willbes.net/pass/offPackage/show/prod-code/175178" target="_blank" alt="원유철 문풀" />
                <area shape="rect" coords="671,1656,805,1701" href="https://police.willbes.net/pass/offPackage/show/prod-code/176273" target="_blank" alt="오태진 문풀" />
                <area shape="rect" coords="153,2187,256,2227" href="https://police.willbes.net/pass/offPackage/show/prod-code/175163" target="_blank" alt="원유철 문풀2단계" />
                <area shape="rect" coords="385,2188,486,2224" href="https://police.willbes.net/pass/offPackage/show/prod-code/175164" target="_blank" alt="오태진 문풀2단계" />
                <area shape="rect" coords="613,2186,712,2225" href="https://police.willbes.net/pass/offPackage/show/prod-code/175421" target="_blank" alt="원유철 문풀3단계" />
                <area shape="rect" coords="847,2188,954,2226" href="https://police.willbes.net/pass/offPackage/show/prod-code/175422" target="_blank" alt="오태진 문풀3단계" />
            </map>
        </div>

        <div class="evtCtnsBox evt02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1989_02.jpg" alt="" usemap="#Map1989C" border="0" />
            <map name="Map1989C" id="Map1989C">
                <area shape="rect" coords="404,1742,708,1797" href="#none" onclick="javascript:alert('준비중입니다.');" alt="커리큘럼" />
                <area shape="rect" coords="144,2078,992,2224" href="https://police.willbes.net/pass/offPackage/show/prod-code/176431" target="_blank" alt="슈퍼패스 접수하기" />
            </map>
        </div> 
    </div>
    <!-- End Container -->
@stop