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

        .wb_top {background:#8a919a url(https://static.willbes.net/public/images/promotion/2019/12/1478_top_bg.jpg) no-repeat center top;}

        .wb_cts01{background:#fff;}    

        .wb_cts02 {background:#ebebeb;}   

        .wb_cts03 {background:#079aa2;}

    </style>
    <div class="p_re evtContent NGR" id="evtContainer">        

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1478_top.gif" alt="회계학 김영훈 티패스" usemap="#Map1478a" border="0"  >
            <map name="Map1478a" id="Map1478a">
                <area shape="rect" coords="19,1059,458,1130" href="https://pass.willbes.net/professor/show/cate/3022/prof-idx/50227/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99" target="_blank" alt="교수님 홈 바로가기" />
                <area shape="rect" coords="489,1058,927,1130" href="#apply" alt="수강신청 바로가기" />
            </map>                    
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1478_01.jpg" alt="회계학 출제영역"  > 
        </div>    

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1478_02.jpg" alt="커리큘럼"  > 
        </div>    

        <div class="evtCtnsBox wb_cts03" id="apply"> 
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1478_03.jpg" alt="수강신청" usemap="#Map1478b" border="0"  >
            <map name="Map1478b" id="Map1478b">
                <area shape="rect" coords="747,662,937,735" href="https://pass.willbes.net/periodPackage/show/cate/3022/pack/648001/prod-code/158485" target="_blank" alt="2020 김영훈 회계학 T-PASS" />
            </map> 
        </div>       
                 
    </div>
    <!-- End Container -->

    <script type="text/javascript">
       
    </script>

@stop