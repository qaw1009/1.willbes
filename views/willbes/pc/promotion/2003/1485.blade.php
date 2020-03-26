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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/
        
        .Wb_top{background:#404044 url(https://static.willbes.net/public/images/promotion/2020/03/1485_top_bg.jpg) no-repeat center top;}

        .Wb_01 {background:#38c293;}

        .Wb_02 {background:#fff url(https://static.willbes.net/public/images/promotion/2019/12/1485_02_bg.jpg) no-repeat center top;}

        .Wb_03 {background:#ebfbf1;}

        .Wb_04 {background:#fff;}

        .Wb_05 {background:#1c2a25;}

        .Wb_06 {background:#38c293;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox Wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1485_top.jpg" alt="2021 김동진법원팀 예비순환"  > 
        </div>

        <div class="evtCtnsBox Wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1485_01.jpg" alt="중점 선행학습"  > 
        </div>

        <div class="evtCtnsBox Wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1485_02.jpg" alt="예비순환 믿고 따르기"  > 
        </div>

        <div class="evtCtnsBox Wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1485_03.jpg" alt="커리큘럼"  > 
        </div>

        <div class="evtCtnsBox Wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1485_04.jpg" alt="교수진" usemap="#Map1485a" border="0"  >
            <map name="Map1485a" id="Map1485a">
                <area shape="rect" coords="702,976,779,1005" href="http://cafe.daum.net/LAW-KDJTEAM" target="_blank" />
            </map> 
        </div>

        <div class="evtCtnsBox Wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1485_05.jpg" alt="수강신청 안내"  > 
        </div>

        <div class="evtCtnsBox Wb_06">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1485_06.jpg" alt="교수별 수강신청" usemap="#Map1485b" border="0"  >
            <map name="Map1485b" id="Map1485b">
                <area shape="rect" coords="782,139,963,194" href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/152001" target="_blank" />
                <area shape="rect" coords="783,381,961,434" href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/159031" target="_blank" />
                <area shape="rect" coords="783,621,961,674" href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/159035" target="_blank" />
                <area shape="rect" coords="782,861,964,915" href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/159036" target="_blank" />
                <area shape="rect" coords="782,1101,964,1154" href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/159033" target="_blank" />
                <area shape="rect" coords="782,1341,963,1395" href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/159032" target="_blank" />
                <area shape="rect" coords="782,1579,964,1635" href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/159034" target="_blank" />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>
@stop