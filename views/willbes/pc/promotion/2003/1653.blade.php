@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/05/1653_top_bg.jpg) no-repeat center top;}	
        .evt01 {background:#fff;}
        .evt02 {background:#ededed;}
        .evt03 {background:#ededed;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">   

        <div class="skybanner">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1653_sky.png" alt="빠르게 가기" usemap="#Map1585sky" border="0" />
            <map name="Map1585sky" id="Map1585sky">
                <area shape="rect" coords="10,52,118,104" href="https://pass.willbes.net/promotion/index/cate/3035/code/1485" target="_blank" />
                <area shape="rect" coords="9,115,117,176" href="https://pass.willbes.net/promotion/index/cate/3035/code/1585" target="_blank" alt="1순환" />
                <area shape="rect" coords="7,184,118,248" href="#none" alt="2순환"/>
                <area shape="rect" coords="9,256,119,317" href="javascript:alert('개강 일정에 맞추어 공개됩니다.');" />
                <area shape="rect" coords="10,324,117,386" href="javascript:alert('개강 일정에 맞추어 공개됩니다.');" />
                <area shape="rect" coords="10,398,117,470" href="javascript:alert('개강 일정에 맞추어 공개됩니다.');" />
            </map>                         
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1653_top.jpg" alt="김동진 1순환 법원팀 전과목 패키지" />                         
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1653_01.jpg" alt="법원팀은 약속" />                         
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1653_02.jpg" alt="커리큘럼" usemap="#Map1585a" border="0" />
            <map name="Map1585a" id="Map1585a">
                <area shape="rect" coords="172,787,260,809" href="https://pass.willbes.net/promotion/index/cate/3035/code/1485" target="_blank" />
                <area shape="rect" coords="310,787,398,808" href="https://pass.willbes.net/promotion/index/cate/3035/code/1585" target="_blank" alt="1순환" />
                <area shape="rect" coords="447,786,537,810" href="#evtContainer" alt="2순환" />
            </map>                        
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1653_03.jpg" alt="1순환 기본강의 패키지" usemap="#Map1585b" border="0" />
            <map name="Map1585b" id="Map1585b">
                <area shape="rect" coords="316,1058,806,1147" href="https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/165364" target="_blank" />
            </map>                                     
        </div>
              
    </div>
    <!-- End Container -->   
@stop