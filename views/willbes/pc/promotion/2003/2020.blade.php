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

        .sky {position:fixed; top:125px;right:10px;z-index:10;}
        .sky a {display:block;margin-bottom:10px;}

        .wb_top {background:#F0E0C9;}   

        .wb_02 {background:#F4F4F4;}
  
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="#apply01"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/02/2020_sky01.png" alt="국가직" >
            </a>    
            <a href="#apply01"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/02/2020_sky02.png" alt="국가직/지방직" >
            </a>       
            <a href="#apply02"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/02/2020_sky03.png" alt="진도별 문풀패키지" >
            </a>    
            <a href="#apply02"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/02/2020_sky04.png" alt="실전동형 모고패키지" >
            </a>            
        </div>  

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2020_top.jpg" alt="실력향상 문제풀이"  />
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2020_01.jpg" alt="문제풀이가 많은 비중"  />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2020_02.jpg" alt="스킬 적용"  />
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2020_03.jpg" alt="실전에 강해지는 힘"/>
        </div>

        <div class="evtCtnsBox wb_04" id="apply01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2020_04.jpg" alt="수강신청하기" usemap="#Map2020a" border="0"/>
            <map name="Map2020a" id="Map2020a">
                <area shape="rect" coords="117,604,470,690" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/177864" target="_blank" />
                <area shape="rect" coords="649,605,1005,692" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/179091" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_05" id="apply02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2020_05.jpg" alt="수강신청하기" usemap="#Map2020b" border="0"/>
            <map name="Map2020b" id="Map2020b">
                <area shape="rect" coords="113,507,471,595" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/177750" target="_blank" />
                <area shape="rect" coords="646,499,1007,584" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/179079" target="_blank" />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script>    

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop