@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skybanner {position:fixed;top:250px;right:10px;z-index:1;}

        .evtTop {background:#127E29 url(https://static.willbes.net/public/images/promotion/2020/08/1785_top_bg.jpg) no-repeat center top;}	
        .evt01 {background:#fff;}
        .evt02 {background:#EDEDED;}
        .evt03 {background:#EDEDED;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">   

        @include('willbes.pc.promotion.2003.3035_cycle_sky')

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1785_top.jpg" alt="김동진 3순환 법원팀 전과목 패키지" />                         
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1785_01.jpg" alt="법원팀은 약속" />                         
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1785_02.jpg" alt="커리큘럼" usemap="#Map1785a" border="0" />
            <map name="Map1785a" id="Map1785a">
                <area shape="rect" coords="171,781,260,803" href="https://pass.willbes.net/promotion/index/cate/3035/code/1485" target="_blank" />
                <area shape="rect" coords="311,781,399,804" href="https://pass.willbes.net/promotion/index/cate/3035/code/1585" target="_blank" />
                <area shape="rect" coords="447,782,536,803" href="https://pass.willbes.net/promotion/index/cate/3035/code/1653" target="_blank" />
                <area shape="rect" coords="583,782,672,804" href="#evtContainer" alt="3순환" />
            </map>                             
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1785_03.jpg" alt="1순환 기본강의 패키지" usemap="#Map1785b" border="0" />
            <map name="Map1785b" id="Map1785b">
                <area shape="rect" coords="308,1042,816,1174" href="https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/171314" target="_blank" />
            </map>                              
        </div>
              
    </div>
    <!-- End Container -->   
@stop