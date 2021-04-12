@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/04/2172_top_bg.jpg) repeat-y center top;}     
        
        .wb_01 {background:url(https://static.willbes.net/public/images/promotion/2021/04/2172_01_bg.jpg) repeat-y center top;}   

        .wb_02 {background:#003427;position:relative;}   

        .wb_03 {background:#f1bd77}  
        
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">           
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2172_top.jpg" title="수강후기 별 다아방" />           
        </div>  

        <div class="evtCtnsBox wb_01">        
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2172_01.jpg" title="아아 받아가실분" />           
        </div> 

        <div class="evtCtnsBox wb_02">        
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2172_02.jpg" title="수강후기 작성방법" />     
            <a href="https://www.willbes.net/classroom/on/list/ongoing" target="_blank" title="수강후기 작성하러 가기" style="position: absolute; left: 39.21%; top: 48.21%; width: 21.93%; height: 4.26%; z-index: 2;"></a>      
        </div>  

        <div class="evtCtnsBox wb_03">        
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2172_03.jpg" title="수강후기 이벤트" />           
        </div>  

    </div>
    <!-- End Container -->
    <script>

    </script>
@stop