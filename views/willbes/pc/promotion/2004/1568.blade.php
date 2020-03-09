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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evt_top {background:#010f7b url(https://static.willbes.net/public/images/promotion/2020/03/1568_top_bg.png) no-repeat center top;}	     

        .evt_05 {background:#000 url(https://static.willbes.net/public/images/promotion/2020/03/1568_05_bg.jpg) no-repeat center top;}	            

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">      

        <div class="evtCtnsBox evt_top" >
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1568_top.gif" alt="찐 국가직대비" />                 
        </div>

        <div class="evtCtnsBox evt_01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1568_01.jpg" alt="막판 점수 끌어올리기" />
        </div>

        <div class="evtCtnsBox evt_02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1568_02.jpg" alt="정확하게 학습" />
        </div>

        <div class="evtCtnsBox evt_03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1568_03.jpg" alt="파이널 정리 특강" />
        </div>

        <div class="evtCtnsBox evt_04" >
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1568_04.jpg" alt="수강신청" />
            
        </div>

        <div class="evtCtnsBox evt_05" >
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1568_05.jpg" alt="합격을 합신" />
        </div>

        
    </div>
    <!-- End Container -->

    <script type="text/javascript">     

    </script>
@stop