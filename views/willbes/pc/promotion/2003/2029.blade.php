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

        .sky {position:fixed; top:225px;right:10px;z-index:10;}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/01/2029_top_bg.jpg) no-repeat center top;}

        .wb_01 {background:url(https://static.willbes.net/public/images/promotion/2021/01/2029_01_bg.jpg) no-repeat center top;}

        .wb_02 {background:#037576;}
  
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="#apply"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2029_sky.png" alt="산림자원직 패스 신청하기" >
            </a>             
        </div>  

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2029_top.jpg" alt="농업직 합격 패키지"  />
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2029_01.jpg" alt="교수진 라인업"  />
        </div>

        <div class="evtCtnsBox wb_02" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2029_02.jpg" alt="수강 신청하기" usemap="#2029_apply" border="0" />
            <map name="2029_apply" id="2029_apply">
                <area shape="rect" coords="174,771,477,843" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/177824" target="_blank" />
                <area shape="rect" coords="635,773,941,839" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/177825" target="_blank" />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script>    

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop