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
        .sky a {display:block;margin-bottom:25px;}
 

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/01/2027_top_bg.jpg) no-repeat center top;}

        .wb_01 {background:url(https://static.willbes.net/public/images/promotion/2021/01/2027_01_bg.jpg) no-repeat center top;}

        .wb_02 {background:#2F3B9D;}

        .wb_03 {background:#2F3B9D;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="#apply01"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2027_sky01.png" alt="산림자원직 패스 신청하기" >
            </a>    
            <a href="#apply02"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2027_sky02.png" alt="산림자원직 패스 신청하기" >
            </a>           
        </div>  

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2027_top.jpg" alt="전기/통신직 합격 패키지"  />
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2027_01.jpg" alt="교수진 라인업"  />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2027_02.jpg" alt="전기직 수강 신청하기" usemap="#apply01Map" id="apply01" border="0" />
            <map name="apply01Map" id="apply01Map">
                <area shape="rect" coords="174,746,476,809" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/177871" target="_blank" />
                <area shape="rect" coords="637,747,942,806" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/177866" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2027_03.jpg" alt="통신직 수강 신청하기" usemap="#apply02Map" id="apply02" border="0" />
            <map name="apply02Map" id="apply02Map">
                <area shape="rect" coords="174,386,476,448" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/178076" target="_blank" />
                <area shape="rect" coords="640,397,941,457" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/178074" target="_blank" />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script>    

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop