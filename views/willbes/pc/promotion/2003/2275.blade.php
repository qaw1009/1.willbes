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
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/07/2275_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#FFF;}
        
        .wb_cts02 {background:#AE1D58;}

        .wb_cts03 {background:#FFF;}

        .wb_cts04 {background:#FFEEDC;}    

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2275_top.jpg" alt="불꽃소방 기본이론 팩" />            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2275_01.jpg" alt="윌비스 이론"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2275_02.jpg" alt="초반 이론 학습"> 
        </div>

        <div class="evtCtnsBox wb_cts03" id="careful" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2275_03.jpg" alt="이런 분들이 수강하시면 좋아요."/>
        </div>

        <div class="evtCtnsBox wb_cts04">       
            <div class="wrap">     
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2275_04.jpg" alt="본인에게 딱 맞는 학습 전략"/>
                <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/183360" title="신청하기" target="_blank" style="position: absolute;left: 16.79%;top: 76.59%;width: 22.93%;height: 6%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/183679" title="신청하기" target="_blank" style="position: absolute;left: 59.79%;top: 76.59%;width: 22.93%;height: 6%;z-index: 2;"></a>
            </div>     
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
      
    </script>

@stop