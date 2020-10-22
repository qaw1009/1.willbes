@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative;}

        /************************************************************/

        .skybanner {position:fixed; top:225px;right:10px;z-index:10;}

        .evt00 {background:#0a0a0a}

        .evt_top {background:#151515 url(https://static.willbes.net/public/images/promotion/2020/10/1886_top_bg.jpg) no-repeat center}
        
        .evt_01,.evt_02 {background:#2B3541;}

        .evt_03 {background:#F5F5F5;}
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#signature"> 
                <img src="https://static.willbes.net/public/images/promotion/2020/10/1886_sky.png" alt="" >
            </a>             
        </div>   

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>   

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1886_top.jpg" usemap="#Map1886_top" title="" border="0" />
            <map name="Map1886_top" id="Map1886_top">
                <area shape="rect" coords="300,2022,824,2111" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2000" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1886_01.jpg" title="" />
        </div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1886_02.jpg" usemap="#Map1886_02" title="" border="0" />
            <map name="Map1886_02" id="signature">
                <area shape="rect" coords="302,1828,821,1926" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2000" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1886_03.jpg" usemap="#Map1886_03" title="" border="0" />
            <map name="Map1886_03" id="Map1886_03">
                <area shape="rect" coords="858,158,1024,224" href="https://police.willbes.net/promotion/index/cate/3001/code/1864" target="_blank" />
                <area shape="rect" coords="156,677,276,726" href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1351" target="_blank" />
                <area shape="rect" coords="505,676,618,727" href="https://police.willbes.net/promotion/index/cate/3001/code/1873" target="_blank" />
                <area shape="rect" coords="845,675,962,726" href="https://police.willbes.net/promotion/index/cate/3001/code/1786" target="_blank" />
            </map>
        </div>
        


       

    </div>
    <!-- End Container -->

    <script>
    
    </script>


@stop