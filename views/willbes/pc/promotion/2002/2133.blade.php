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
        
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/2133_top_bg.jpg) no-repeat center top;}

        .evt01 .check {width:800px; margin:0 auto; padding:20px; font-size:16px; color:#000; text-align:left; letter-spacing:-1px;}
        .evt01 .check a {display:inline-block; padding:25px; color:#fff; background:#000; margin-left:250px; border-radius:50px; font-size:17px}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2133_03_bg.jpg) no-repeat center top;}
        
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        <div class="sky" >
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2135" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/03/2133_sky.png" alt="스카이베너" ></a>
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2133_top.jpg"  alt="4월 추천강좌" usemap="#Map2133_top" border="0" />
            <map name="Map2133_top" id="Map2133_top">
                <area shape="rect" coords="194,746,538,935" href="#apply1" />
                <area shape="rect" coords="575,748,916,939" href="#apply2" />
            </map>
        </div> 

        <div class="evtCtnsBox evt01" id="apply1">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2133_01.jpg"  alt="심화이론.기출 패키지" />
            <div class="check">                    
                <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2076" target="_blank">심화이론 · 기출 자세히 보기 ▶</a>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2133_02.jpg"  alt="신청하기" usemap="#Map2133_02" border="0" />
            <map name="Map2133_02" id="Map2133_02">
                <area shape="rect" coords="258,535,433,577" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" />
                <area shape="rect" coords="679,535,854,577" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1041" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evt03" id="apply2">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2133_03.jpg"  alt="과목개편 시험 대비" usemap="#Map2133_03" border="0" />
            <map name="Map2133_03" id="Map2133_03">
                <area shape="rect" coords="135,1985,999,2142" href="https://police.willbes.net/pass/offPackage/show/prod-code/176433" target="_blank" />
            </map>
        </div>

    </div>
    <!-- End Container -->
@stop