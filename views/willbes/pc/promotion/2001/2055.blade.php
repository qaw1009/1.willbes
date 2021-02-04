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

        .wb_cts03 {background:#fff}      
      
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
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2055_02.jpg" alt="2021 필수특강" usemap="#Map2055a" border="0" />
            <map name="Map2055a" id="Map2055a">
                <area shape="rect" coords="101,271,394,442" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/177228" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="103,562,390,734" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/177660" target="_blank"  onfocus='this.blur()' />
                <area shape="rect" coords="414,561,704,733" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/177365" target="_blank"  onfocus='this.blur()' />
                <area shape="rect" coords="732,562,1021,733" href="javascript:alert('Coming Soon!')"  onfocus='this.blur()' />
                <area shape="rect" coords="102,833,390,1002" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/177505" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="418,832,705,1003" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/178535" target="_blank" onfocus='this.blur()' />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts03" id="apply_2022">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2055_03.jpg" alt="2022 필수특강" usemap="#Map2055b" border="0" />
            <map name="Map2055b" id="Map2055b">
                <area shape="rect" coords="100,328,391,498" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/170566" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="417,327,706,499" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/169145" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="731,327,1021,498" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/168198" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="101,528,393,700" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/168022" target="_blank"  onfocus='this.blur()' />
                <area shape="rect" coords="418,528,707,699" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/167489" target="_blank"  onfocus='this.blur()' />
                <area shape="rect" coords="731,528,1022,697" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/167023" target="_blank"  onfocus='this.blur()' />
                <area shape="rect" coords="103,806,390,977" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/169886" target="_blank"  onfocus='this.blur()' />
                <area shape="rect" coords="417,804,707,979" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/169241" target="_blank"  onfocus='this.blur()' />
                <area shape="rect" coords="100,1087,392,1257" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/174684" target="_blank"  onfocus='this.blur()' />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script> 

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop