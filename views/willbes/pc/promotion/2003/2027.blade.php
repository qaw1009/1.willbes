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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2027_top_bg.jpg) no-repeat center top;}
        
        .wb_01 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2027_01_bg.jpg) no-repeat center top;}

        .wb_04 {background:#2E3C9F}
        .wb_05 {background:#2E3C9F}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="#apply01"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2027_sky.png" alt="전기직" >
            </a>    
            <a href="#apply02"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2027_sky2.png" alt="통신직" >
            </a>           
        </div>  

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2027_top.jpg" alt="전기/통신직 5과목 패키지"  />
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2027_01.jpg" alt="교수진 라인업"  />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2027_02.jpg" alt="고민할 필요없이" />
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2027_03.jpg" alt="문제풀이까지"  />
        </div>

        <div class="evtCtnsBox wb_04" id="apply01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2027_04.jpg" alt="전기직 수강신청하기" usemap="#Map2027a" border="0"  />
            <map name="Map2027a" id="Map2027a">
                <area shape="rect" coords="84,714,324,763" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/177871" target="_blank" />
                <area shape="rect" coords="455,714,696,763" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/177866" target="_blank" />
                <area shape="rect" coords="823,714,1064,763" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/179678" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_05" id="apply02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2027_05.jpg" alt="통신직 수강신청하기" usemap="#Map2027b" border="0"  />
            <map name="Map2027b" id="Map2027b">
                <area shape="rect" coords="83,338,325,388" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/178076" target="_blank" />
                <area shape="rect" coords="455,346,697,395" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/178074" target="_blank" />
                <area shape="rect" coords="822,345,1065,395" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/179685" target="_blank" />
            </map>
        </div>        

    </div>
    <!-- End Container -->

    <script>    

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop