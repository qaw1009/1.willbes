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

        .wb_cts01 {background:#00A7CB url(https://static.willbes.net/public/images/promotion/2019/09/1066_top_bg.jpg) center top no-repeat}
        .wb_cts02 {background:#f8f8f8}
        .wb_cts03 {background:#F3EFE4;}
        .wb_cts04 {background:#f8f8f8;padding-bottom:100px;padding-top:188px;}
        .wb_cts05 {background:#f8f8f8}
        .wb_cts06 {background:#242424;padding-bottom:100px;}
        .wb_cts07 {background:#DBC8B7;}

        .skybanner {position:fixed;top:250px;right:10px;width:259px; text-align:center; z-index:11;}      
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">      
        <div class="skybanner">
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1067" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1067_skybanner.png" title="첨삭지도반" >
            </a>       
        </div>
      
        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1066_top.jpg" title="" />       
        </div>    

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1066_01.jpg" usemap="#Map1066a" title="반반한 모의고사 무료방송" border="0" />
            <map name="Map1066a" id="Map1066a">
                <area shape="rect" coords="668,555,934,640" href="https://pass.willbes.net/promotion/index/cate/3019/code/1588#detail" target="_blnak" onfocus='this.blur()' />
                <area shape="rect" coords="669,664,936,751" href="https://pass.willbes.net/promotion/index/cate/3019/code/1588" target="_blnak" onfocus='this.blur()' />
            </map>   
        </div>

        <div class="evtCtnsBox wb_cts07" >
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1066_02.jpg" title="" />    
         
        </div>

        <div class="evtCtnsBox wb_cts04" id="cts04">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1066_04.png" usemap="#Map1066b" border="0" />
            <map name="Map1066b" id="Map1066b">
                <area shape="rect" coords="231,521,277,539" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154891" target="_blank" onfocus='this.blur()'/>
                <area shape="rect" coords="230,635,277,652" href="#none" onclick="javascript:alert('준비중입니다.');" onfocus='this.blur()'/>
                <area shape="rect" coords="230,694,277,711" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145823" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="230,752,278,769" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157580" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="229,828,278,845" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146100" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="426,456,472,474" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145623" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="425,514,472,531" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156740" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="426,572,472,590" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154900" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="424,648,473,666" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156355" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="424,735,473,754" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157579" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="625,520,672,536" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157581" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="625,692,674,710" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145826" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="626,826,671,844" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146969" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="829,468,878,484" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158678" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="830,559,879,578" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/164513" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="829,650,878,667" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158686" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="828,671,877,688" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158684" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="831,736,878,755" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/163563" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="831,762,878,779" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/164531" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="830,825,879,842" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158682" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="830,846,878,863" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158683" target="_blank" onfocus='this.blur()' />
            </map>          
        </div>

        <div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1066_05.png" usemap="#Map1066c" border="0" />
            <map name="Map1066c" id="Map1066c">
                <area shape="rect" coords="64,702,223,734" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150364" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="273,700,432,736" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150363" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="484,702,643,735" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150362" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="690,702,853,735" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/163562" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="899,701,1067,736" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158684" target="_blank" onfocus='this.blur()' />
            </map>
        </div>

    </div>
    <!-- End Container -->
@stop
 