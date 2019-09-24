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
            position:relative;
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

        .wb_main {background:url(https://static.willbes.net/public/images/promotion/2019/09/1409_top_bg.jpg) no-repeat center top;}
        .wb01 {background:#eee;}
        .wb02 {background:#ff5da0;}
   
    </style>

    <div class="evtContent NGR" id="evtContainer">     
        
        <div class="evtCtnsBox wb_main" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1409_top.jpg"  alt="마무리특강"  />
        </div>

        <div class="evtCtnsBox wb01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1409_01.jpg"  alt="전문교수진" />
        </div>

        <div class="evtCtnsBox wb02" id="pass">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1409_02.jpg"  alt="마무리특강 수강신청" usemap="#Map1409a" border="0" />
            <map name="Map1409a" id="Map1409a">
                <area shape="rect" coords="917,748,1005,781" href="https://police.willbes.net/lecture/show/cate/3008/pattern/only/prod-code/157027" target="_blank" />
                <area shape="rect" coords="915,800,1007,832" href="https://police.willbes.net/lecture/show/cate/3008/pattern/only/prod-code/157030" target="_blank" />
                <area shape="rect" coords="916,849,1007,883" href="https://police.willbes.net/lecture/show/cate/3008/pattern/only/prod-code/157031" target="_blank" />
                <area shape="rect" coords="915,898,1006,933" href="https://police.willbes.net/lecture/show/cate/3008/pattern/only/prod-code/157028" target="_blank" />
                <area shape="rect" coords="913,950,1008,984" href="https://police.willbes.net/lecture/show/cate/3008/pattern/only/prod-code/157025" target="_blank" />
            </map>         
        </div>      

    </div>
    <!-- End Container -->

    <script type="text/javascript">

    </script>
@stop