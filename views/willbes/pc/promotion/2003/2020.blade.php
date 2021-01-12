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

        .wb_top {background:#F0E0C9;}   

        .wb_02 {background:#F4F4F4;}
  
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2020_top.jpg" alt="실력향상 문제풀이"  />
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2020_01.jpg" alt="문제풀이가 많은 비중"  />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2020_02.jpg" alt="스킬 적용"  />
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2020_03.jpg" alt="수강 신청하기" usemap="#Map2020_apply" border="0"  />
            <map name="Map2020_apply" id="Map2020_apply">
                <area shape="rect" coords="136,1113,448,1185" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/177750" target="_blank"  />
                <area shape="rect" coords="668,1113,983,1185" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/177864" target="_blank"  />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script>    

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop