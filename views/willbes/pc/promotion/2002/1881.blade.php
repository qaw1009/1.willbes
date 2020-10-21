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
        .evtTop {background:#ffb900 url(https://static.willbes.net/public/images/promotion/2020/10/1881_top_bg.jpg) no-repeat center top; }   

        .evt01,.evt03 {background:#282d40}
        .evt02,.evt04 {background:#e2e2e2}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">


        <div class="skybanner" >
            <a href="#none" onclick="javascript:alert('곧 공개됩니다.');"><img src="https://static.willbes.net/public/images/promotion/2020/10/1881_sky.png" alt="스카이베너" ></a>
        </div>               

		<div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1881_top.jpg" alt="11월 추천 강좌" />
        </div>

        <div class="evtCtnsBox evt01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1881_01.jpg" alt="10개월 슈퍼패스" usemap="#Map1881_01" border="0"  />
            <map name="Map1881_01">
              <area shape="rect" coords="302,1687,789,1776" href="#none" alt="10개월 슈퍼패스">
            </map>
        </div>      

        <div class="evtCtnsBox evt02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1881_02.jpg" alt="10개월 슈퍼패스" usemap="#Map1881_02" border="0"  />
            <map name="Map1881_02">
              <area shape="rect" coords="170,613,301,660" href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank" alt="10개월 오태진">
              <area shape="rect" coords="496,615,625,660" href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank" alt="10개월 원유철">
              <area shape="rect" coords="818,614,950,659" href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3011&campus_ccd=605001&course_idx=1085" target="_blank" alt="10개월 경행경채">
            </map>
        </div>

        <div class="evtCtnsBox evt03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1881_03.jpg" alt="4개월 슈퍼패스" usemap="#Map1881_03" border="0" />
            <map name="Map1881_03">
              <area shape="rect" coords="309,1604,784,1694" href="#none" alt="4개월 슈퍼패스">
            </map>       
        </div>

        <div class="evtCtnsBox evt04" id="apply" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1881_04.jpg" alt="4개월 슈퍼패스" usemap="#Map1881_04" border="0" />
            <map name="Map1881_04">
              <area shape="rect" coords="170,631,302,679" href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank" alt="4개월 오태진">
              <area shape="rect" coords="496,631,625,679" href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank" alt="4개월 원유철">
              <area shape="rect" coords="821,631,952,677" href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3011&campus_ccd=605001&course_idx=1085" target="_blank" alt="4개월 경행경채">
            </map>        
        </div>	
    </div>
    <!-- End Container -->
@stop