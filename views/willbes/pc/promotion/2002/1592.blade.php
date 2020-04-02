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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .wb_top {background:#2e3135 url(https://static.willbes.net/public/images/promotion/2020/04/1592_top_bg.jpg) no-repeat center top;}
        .wb_01 {background:#fff}
        .wb_02 {background:#fff}
        .wb_03 {background:#f3f3f3}
        .wb_04 {background:#025a61}
        .wb_05 {background:#3c3c3c url(https://static.willbes.net/public/images/promotion/2020/04/1592_05_bg.jpg) no-repeat center top;}        
    </style>


    <div class="p_re evtContent NGR" id="evtContainer">

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1592_top.jpg" alt="기본이론 종합반" usemap="#Map1592a" border="0" />
            <map name="Map1592a" id="Map1592a">
                <area shape="rect" coords="258,701,862,818" href="#apply" onfocus='this.blur()' />
            </map>
        </div>     

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1592_01.jpg" alt="어떤 커리큘럼이 좋을까"/>
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1592_02.jpg" alt="기본이론은 신광은경찰"/>
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1592_03.jpg" alt="혜택은 특별"/>
        </div>
               
        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1592_04.jpg" alt="혜택은 특별"/>
        </div>

        <div class="evtCtnsBox wb_05" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1592_05.jpg" alt="혜택은 특별" usemap="#Map1592b" border="0"/>
            <map name="Map1592b" id="Map1592b">
                <area shape="rect" coords="117,831,532,1029" href="https://police.willbes.net/pass/offPackage/show/prod-code/162555" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="597,829,997,1028" href="https://police.willbes.net/pass/offPackage/show/prod-code/162554" target="_blank" onfocus='this.blur()' />
            </map>
        </div>
      
    </div>
    <!-- End Container -->


    <script type="text/javascript"> 

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop