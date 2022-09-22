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
   
        .evtTop {background:#ffb900 url(https://static.willbes.net/public/images/promotion/2020/10/1881_top_bg.jpg) no-repeat center top; }   

        .evt01 {background:#282d40}

        .evt02 {background:#e2e2e2}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">


        <div class="skybanner" >
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/1874" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/10/1881_sky.png" alt="스카이베너" ></a>
        </div>

        <div class="evtCtnsBox evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1881_top.jpg" alt="11월 추천 강좌" />
        </div>

        <div class="evtCtnsBox evt01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1881_01.jpg" alt="10개월 슈퍼패스" usemap="#Map1881_01" border="0"  />
            <map name="Map1881_01">
              <area shape="rect" coords="302,1687,789,1776" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1882" target="_blank" alt="10개월 슈퍼패스">
            </map>
        </div>      

        <div class="evtCtnsBox evt02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1881_02.jpg" alt="10개월 슈퍼패스" usemap="#Map1881_02" border="0"  />
            <map name="Map1881_02">
              <area shape="rect" coords="170,613,301,660" href="https://police.willbes.net/pass/offPackage/show/prod-code/173849" target="_blank" alt="10개월 오태진">
              <area shape="rect" coords="496,615,625,660" href="https://police.willbes.net/pass/offPackage/show/prod-code/173848" target="_blank" alt="10개월 원유철">
              <area shape="rect" coords="818,614,950,659" href="https://police.willbes.net/pass/offPackage/show/prod-code/173850" target="_blank" alt="10개월 경행경채">
            </map>
        </div>

    </div>
    <!-- End Container -->
@stop