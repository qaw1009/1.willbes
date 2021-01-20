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

        .sky {position:fixed; top:225px;right:25px;z-index:10;}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/01/2028_top_bg.jpg) no-repeat center top;}

        .wb_03 {background:#EBEBEB;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="#apply"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2028_sky.png" alt="이론패키지 신청하기" >
            </a>             
        </div>  

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2028_top.jpg" alt="장사원 x 선석 이론 패키지" usemap="#Map2028_home" border="0"  />
            <map name="Map2028_home" id="Map2028_home">
                <area shape="rect" coords="23,804,458,856" href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/50429/?subject_idx=1171&subject_name=%EC%9E%AC%EB%B0%B0%ED%95%99" target="_blank" />
                <area shape="rect" coords="748,804,1240,854" href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/51070/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2028_01.jpg" alt="고민하는 시간조차 아깝"  />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2028_02.jpg" alt="농업직 합격 솔루션"  />
        </div>

        <div class="evtCtnsBox wb_03" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2028_03.jpg" alt="바로 신청하기" usemap="#Map2028_apply" border="0" />
            <map name="Map2028_apply" id="Map2028_apply">
                <area shape="rect" coords="737,693,925,767" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/177865" target="_blank" />
            </map>          
        </div>

    </div>
    <!-- End Container -->

    <script>    

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop