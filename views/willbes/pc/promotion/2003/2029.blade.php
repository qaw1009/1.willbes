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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2029_top_bg.jpg) no-repeat center top;}
        
        .wb_01 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2029_01_bg.jpg) no-repeat center top;}

        .wb_04 {background:#027475}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="#apply"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2029_sky.png" alt="농업직" >
            </a>             
        </div>  

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2029_top.jpg" alt="농업직 5과목 패키지"  />
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2029_01.jpg" alt="교수진 라인업"  />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2029_02.jpg" alt="고민할 필요없이" />
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2029_03.jpg" alt="문제풀이까지"  />
        </div>

        <div class="evtCtnsBox wb_04" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2029_04.jpg" alt="농업직 수강신청하기" usemap="#Map2029a" border="0"  />
            <map name="Map2029a" id="Map2029a">
                <area shape="rect" coords="245,767,491,826" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/180962" target="_blank" />
                <area shape="rect" coords="626,767,872,826" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/179684" target="_blank" />
                <area shape="rect" coords="244,1218,489,1274" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/177824" target="_blank" />
                <area shape="rect" coords="624,1217,870,1277" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/177825" target="_blank" />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script>    

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop