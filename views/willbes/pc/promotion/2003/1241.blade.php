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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            z-index:1;
        }

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/05/1241_top_bg.jpg) no-repeat center top;}	
        .evt01 {background:#fff; padding-bottom:100px}
        .evt02 {background:#fff; padding:100px 0 0}
        .evt03 {background:#202020}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="skybanner" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1241_skybanner.png" alt="순환별 패키지" usemap="#Map1241C" border="0" >
                <map name="Map1241C" id="Map1241C">
                <area shape="rect" coords="9,51,118,106" href="https://pass.willbes.net/promotion/index/cate/3035/code/1089" target="_blank" alt="예비순환" />
                <area shape="rect" coords="9,117,118,178" href="#evtContainer" alt="1순환" />
                <area shape="rect" coords="9,189,118,243" href="https://pass.willbes.net/promotion/index/cate/3035/code/1273" target="_blank" alt="2순환" />
                <area shape="rect" coords="9,254,118,319" href="https://pass.willbes.net/promotion/index/cate/3035/code/1381" target="_blank" alt="3순환" />
                <area shape="rect" coords="9,326,119,386" href="https://pass.willbes.net/promotion/index/cate/3035/code/1415" target="_blank" alt="4순환" />
                <area shape="rect" coords="9,398,119,470" href="https://pass.willbes.net/promotion/index/cate/3035/code/1483" target="_balnk "alt="5순환" />
            </map>
        </div> 

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1241_top.jpg" alt="김동진 법원팀 1순환 기본강의 패지키" />                         
        </div>

        <div class="evtCtnsBox evt01">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1241_01.jpg" alt="커리큘럼" usemap="#Map1241A" border="0" />
                <map name="Map1241A" id="Map1241A">
                    <area shape="rect" coords="176,692,262,722" href="https://pass.willbes.net/promotion/index/cate/3035/code/1089" target="_blank" alt="예비순환바로가기" />
                    <area shape="rect" coords="320,693,407,722" href="#evtContainer" alt="1순환" />
                    <area shape="rect" coords="453,694,540,721" href="https://pass.willbes.net/promotion/index/cate/3035/code/1273" target="_blank" alt="2순환" />
                    <area shape="rect" coords="583,692,673,724" href="https://pass.willbes.net/promotion/index/cate/3035/code/1381" target="_blank" alt="3순환" />
                    <area shape="rect" coords="722,692,812,723" href="https://pass.willbes.net/promotion/index/cate/3035/code/1415" target="_blank" alt="4순환" />
                    <area shape="rect" coords="858,694,946,722" href="https://pass.willbes.net/promotion/index/cate/3035/code/1483" target="_balnk "alt="5순환" />
                </map>
            </div>
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1241_02.jpg" alt="커리큘럼" usemap="#Map1241B" border="0" />
                <map name="Map1241B" id="Map1241B">
                    <area shape="rect" coords="215,1180,525,1242" href="https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/152392" target="_blank" alt="전과목 수강신청하기" />
                    <area shape="rect" coords="592,1179,915,1242" href="https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/155271" target="_blank" alt="법과목 수강신청하기"/>
                </map>
            </div>          
        </div>
    </div>
    <!-- End Container -->   
@stop