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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/06/1273_top_bg.jpg) no-repeat center top;}	
        .evt01 {background:#fff; padding-bottom:100px}
        .evt02 {background:#fff; padding:100px 0 0}
        .evt03 {background:#202020}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="skybanner" >
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1273_skybanner.png" alt="순환별 패키지" usemap="#Map1241C" border="0" >
                <map name="Map1241C" id="Map1241C">
                <area shape="rect" coords="9,51,118,106" href="https://pass.willbes.net/promotion/index/cate/3035/code/1089" target="_blank" alt="예비순환" />
                <area shape="rect" coords="9,117,118,178" href="https://pass.willbes.net/promotion/index/cate/3035/code/1241" target="_blank" alt="1순환" />
                <area shape="rect" coords="9,189,118,243" href="#evtContainer" alt="2순환" />
                <area shape="rect" coords="9,254,118,319" href="javascript:alert('준비중입니다.');" alt="3순환" />
                <area shape="rect" coords="9,326,119,386" href="javascript:alert('준비중입니다.');" alt="4순환" />
                <area shape="rect" coords="9,398,119,470" href="javascript:alert('준비중입니다.');" alt="5순환" />
            </map>
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1273_top.jpg" alt="김동진 법원팀 1순환 기본강의 패지키" />                         
        </div>

        <div class="evtCtnsBox evt01">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2019/06/1273_01.jpg" alt="커리큘럼" usemap="#Map1241A" border="0" />
                <map name="Map1241A" id="Map1241A">
                    <area shape="rect" coords="176,692,262,722" href="https://pass.willbes.net/promotion/index/cate/3035/code/1089" target="_blank" alt="예비순환바로가기" />
                </map>
            </div>
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2019/06/1273_02.jpg" alt="커리큘럼" usemap="#Map1241B" border="0" />
                <map name="Map1241B" id="Map1241B">
                    <area shape="rect" coords="319,1156,804,1257" href="https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/153859" target="_blank" />
                </map>
            </div>          
        </div>
    </div>
    <!-- End Container -->   
@stop