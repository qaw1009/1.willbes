@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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

        .sky {position:fixed; top:250px; right:10px; width:163px; z-index:1;}
        .sky a {display:block; margin-bottom:10px;}
 
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/02/2055_top_bg.jpg) no-repeat center top;}
        .wb_top .tImg  {background:#83B5FC;}
        .wb_top .tImg img {margin:0 7.5px;width:340px;height:185px;border:2px solid #fff;}

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2021/02/2055_01_bg.jpg) no-repeat center top;}

        .wb_cts02 {background:#fff}

        .wb_cts03 {background:#fff;padding-bottom:50px;}      
      
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">      

        <div class="sky">
            <a href="#apply_2021"><img src="https://static.willbes.net/public/images/promotion/2021/02/2055_sky.png"  title="2021 필수특강 바로가기" /></a>
            <a href="#apply_2022"><img src="https://static.willbes.net/public/images/promotion/2021/02/2055_sky2.png"  title="2022 필수특강 바로가기" /></a>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2055_top.jpg" alt="필수특강"  />
            <div class="tImg">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/2055_live01.gif" alt="신광은" />
                <img src="https://static.willbes.net/public/images/promotion/2021/02/2055_live02.gif" alt="장정훈" />
                <img src="https://static.willbes.net/public/images/promotion/2021/02/2055_live03.gif" alt="김원욱" />
            </div>
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2055_01.jpg" alt="업데이트" />
        </div>

        <div class="evtCtnsBox wb_cts02" id="apply_2021">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2055_02.jpg" alt="2021 필수특강" usemap="#Map2055a" border="0" />
            <map name="Map2055a" id="Map2055a">
                <area shape="rect" coords="102,277,395,448" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/177228" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="413,276,709,449" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/179738" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="103,569,390,741" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/177660" target="_blank"  onfocus='this.blur()' />
                <area shape="rect" coords="418,567,708,739" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/177365" target="_blank"  onfocus='this.blur()' />
                <area shape="rect" coords="733,566,1022,737" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/178782" target="_blank"  onfocus='this.blur()' />
                <area shape="rect" coords="102,837,390,1006" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/177505" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="418,836,705,1007" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/178535" target="_blank" onfocus='this.blur()' /> 
                <area shape="rect" coords="96,1038,395,1214" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/170566" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="409,1038,712,1214" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/169145" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="728,1035,1028,1215" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/168198" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="92,1236,395,1414" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/168022" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="407,1234,714,1416" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/167489" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="726,1233,1033,1417" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/167023" target="_blank" onfocus='this.blur()' />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts03" id="apply_2022">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2055_03.jpg" alt="2022 필수특강" usemap="#Map2055b" border="0" />
            <map name="Map2055b" id="Map2055b">
                <area shape="rect" coords="98,272,396,447" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180325" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="413,270,714,447" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180748" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="96,562,396,742" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180566" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="98,840,396,1027" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/174684" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="412,839,712,1026" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180567" target="_blank" onfocus='this.blur()' />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script> 

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop