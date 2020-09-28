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

        .evtTop {background:#95292e url(https://static.willbes.net/public/images/promotion/2020/03/1585_top_bg.jpg) no-repeat center top;}	
        .evt01 {background:#fff;}
        .evt02 {background:#464d55;}
        .evt03 {background:#464d55;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">   

        @include('willbes.pc.promotion.2003.3035_cycle_sky')

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1585_top.jpg" alt="김동진 1순환 법원팀 전과목 패키지" />                         
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1585_01.jpg" alt="법원팀은 약속" />                         
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1585_02.jpg" alt="커리큘럼" usemap="#Map1585a" border="0" />
            <map name="Map1585a" id="Map1585a">
                <area shape="rect" coords="172,780,260,802" href="https://pass.willbes.net/promotion/index/cate/3035/code/1485" target="_blank" />
                <area shape="rect" coords="310,781,398,802" href="#evtContainer" alt="1순환" />
                <area shape="rect" coords="450,780,540,804" href="https://pass.willbes.net/promotion/index/cate/3035/code/1653" alt="2순환" />
                <area shape="rect" coords="581,781,671,803" href="https://pass.willbes.net/promotion/index/cate/3035/code/1785" target="_blank" />
            </map>                       
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1585_03.jpg" alt="1순환 기본강의 패키지" usemap="#Map1585b" border="0" />
            <map name="Map1585b" id="Map1585b">
                <area shape="rect" coords="346,1058,774,1148" href="https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/163599" target="_blank" />
            </map>                          
        </div>
              
    </div>
    <!-- End Container -->   
@stop