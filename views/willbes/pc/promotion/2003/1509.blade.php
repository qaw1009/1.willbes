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

        .wb_top {background: url(https://static.willbes.net/public/images/promotion/2020/01/1509_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#37789d;}

        .wb_cts02 {background:#fff;}
        
        .wb_cts03 {background:#bedeec;padding-bottom:150px;}     
        .tabContents {width:988px; margin:0 auto}
        .tabContents a {display:block; height:80px; line-height:80px; font-size:24px; font-weight:bold; text-align:center; color:#fff; background:#37789d; }

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1509_top.jpg" alt="진도별 문제풀이" />            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1509_01.jpg" alt="합격에 가까워지는"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1509_graph.gif" alt="비약적인 성적 상승"> 
        </div>

        <div class="evtCtnsBox wb_cts03" >   
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1509_03.jpg" alt="학습전략"> 
            <div class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1509_03.png" alt="패키지 신청하기"> 
                <a href="https://pass.willbes.net/userPackage/show/cate/3019/prod-code/159262/lidx/3" target="_blank">2020 진도별문제풀이 패키지 신청하기 >></a>
            </div>        
        </div>

        
    </div>
    <!-- End Container -->

    <script type="text/javascript">
       
    </script>

@stop