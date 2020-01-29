@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1066_top_bg.jpg) center top no-repeat}
        .wb_cts02 {background:#f8f8f8}
        .wb_cts03 {background:#F3EFE4;}
        .wb_cts04 {background:#f8f8f8;padding-bottom:100px;}
        .wb_cts05 {background:#f8f8f8}
        .wb_cts06 {background:#242424;padding-bottom:100px;}
        .wb_cts07 {background:#DBC8B7;}

        .skybanner {position:fixed;top:20px;right:10px;width:259px; text-align:center; z-index:11;}      
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">      
        <div class="skybanner">
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1067" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1067_skybanner.png" title="첨삭지도반" >
            </a>
            <a href="#cts04_A">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1066_sky.png" title="원데이영작" >
            </a>
            <a href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/157982" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2019/11/1067_skybanner2.png" title="수강학고 합격하기" >
            </a>
        </div>
      
        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1066_top.jpg" title="" />       
        </div>    

        <div class="evtCtnsBox wb_cts03" id="live">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1066_01.jpg" usemap="#Map" border="0" />
            <map name="Map" id="Map">
                <area shape="rect" coords="658,469,946,568" href="https://www.instagram.com/zenithenglishhan/" target="_blank" />
                <area shape="rect" coords="655,580,950,679" href="https://www.youtube.com/channel/UCPmdjTx3UUKCFt40KtRRdUQ" target="_blank" />
            </map>          
        </div>

        <div class="evtCtnsBox wb_cts07" >
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1066_02.jpg" title="" />    
         
        </div>

        <div class="evtCtnsBox wb_cts04" id="cts04">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1066_04.png" usemap="#Map1066z" title="제니스영어 커리큘럼" border="0" />
            <map name="Map1066z" id="Map1066z">
                <area shape="rect" coords="334,672,381,689" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154891" target="_blank" />
                <area shape="rect" coords="334,786,382,803" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158680" target="_blank" />
                <area shape="rect" coords="334,846,383,862" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145823" target="_blank" />
                <area shape="rect" coords="336,904,383,920" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157580" target="_blank" />
                <area shape="rect" coords="336,978,380,997" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146100" target="_blank" />
                <area shape="rect" coords="529,608,577,624" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145623" target="_blank" />
                <area shape="rect" coords="532,665,575,683" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156740" target="_blank" />
                <area shape="rect" coords="530,725,575,740" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154900" target="_blank" />
                <area shape="rect" coords="530,798,577,816" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156355" target="_blank" />
                <area shape="rect" coords="529,887,575,904" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157579" target="_blank" />
                <area shape="rect" coords="730,672,774,688" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157581" target="_blank" />
                <area shape="rect" coords="730,844,778,860" href="#none;" />
                <area shape="rect" coords="729,978,780,994" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146969" target="_blank" />
                <area shape="rect" coords="934,619,983,637" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158678" target="_blank" />
                <area shape="rect" coords="933,710,985,727" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/159037" target="_blank" />
                <area shape="rect" coords="932,799,985,814" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158686" target="_blank" />
                <area shape="rect" coords="932,886,983,902" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158685" target="_blank" />
                <area shape="rect" coords="934,908,982,924" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158684" target="_blank" />
                <area shape="rect" coords="935,976,983,993" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158682" target="_blank" />
                <area shape="rect" coords="935,998,981,1014" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158680" target="_blank" />
            </map>      
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1066_04s.jpg" usemap="#Map1066x" border="0" id="cts04_A"/>
            <map name="Map1066x" id="Map1066x">
                <area shape="circle" coords="755,163,75" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/161306" target="_blank" />
            </map> 
        </div>

        <div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1066_05.png" usemap="#Map1066y"title="학습비법패키지수강신청" border="0" />
            <map name="Map1066y" id="Map1066y">
                <area shape="rect" coords="844,358,1036,404" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/157982" target="_blank" />
                <area shape="rect" coords="63,850,225,885" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150364" target="_blank" />
                <area shape="rect" coords="270,850,434,885" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150363" target="_blank" />
                <area shape="rect" coords="482,850,642,886" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150362" target="_blank" />
                <area shape="rect" coords="692,852,852,884" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158681" target="_blank" />
                <area shape="rect" coords="899,851,1068,885" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158684" target="_blank" />
            </map>               
            {{--
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1066_06.gif" title="학습비법패키지수강신청" usemap="#Map1066c" border="0" />
            <map name="Map1066c" id="Map1066c">
                <area shape="rect" coords="682,37,1066,114" href="https://pass.willbes.net/promotion/index/cate/3019/code/1193" target="_blank" />
            </map>
            --}}
        </div>
    </div>
    <!-- End Container -->

    <script>
      
    </script>

@stop