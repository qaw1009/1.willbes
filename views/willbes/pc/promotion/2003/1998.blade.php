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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/12/1998_top_bg.jpg) no-repeat center top;}	
        .evt01 {background:#fff;}
        .evt02 {background:#EDEDED;}
        .evt03 {background:#EDEDED;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">   

        @include('willbes.pc.promotion.2003.3035_cycle_sky')

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1998_top.jpg" alt="김동진 5순환 법원팀 전과목 패키지" />                         
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1998_01.jpg" alt="법원팀은 약속" />                         
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1998_02.jpg" alt="커리큘럼" usemap="#Map1998a" border="0" />
            <map name="Map1998a" id="Map1998a">
                <area shape="rect" coords="170,785,261,808" href="https://pass.willbes.net/promotion/index/cate/3035/code/1485" target="_blank" />
                <area shape="rect" coords="310,785,400,808" href="https://pass.willbes.net/promotion/index/cate/3035/code/1585" target="_blank" />
                <area shape="rect" coords="446,786,537,808" href="https://pass.willbes.net/promotion/index/cate/3035/code/1653" target="_blank" />
                <area shape="rect" coords="576,785,667,807" href="https://pass.willbes.net/promotion/index/cate/3035/code/1785" target="_blank" />
                <area shape="rect" coords="716,786,805,807" href="https://pass.willbes.net/promotion/index/cate/3035/code/1862" target="_blank" />
                <area shape="rect" coords="855,786,945,809" href="#none" />
            </map>                             
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1998_03.jpg" alt="1순환 기본강의 패키지" usemap="#Map1998b" border="0" />
            <map name="Map1998b" id="Map1998b">
                <area shape="rect" coords="354,1190,766,1276" href="https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/177046"  target="_blank" />
            </map>                   
        </div>
              
    </div>
    <!-- End Container -->   
@stop