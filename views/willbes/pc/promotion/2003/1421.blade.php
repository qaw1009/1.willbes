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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/10/1421_top_bg.jpg) no-repeat center top; position:relative}
        .wb_cts01 {background:#FFF;}
        .wb_cts02 {background:#5903a6;}
        .wb_cts03 {background:#FFF;}
        .wb_cts04 {background:#eceaf5; padding-bottom:150px}    
        
        .tabContaier {width:922px; margin:0 auto;}
        .tabContaier ul {margin-bottom:20px}
        .tabContaier li {display:inline-block; float:left; width:50%}
        .tabContaier ul:after {content:""; display:block; clear:both}
        .tabContaier a {display:block; text-align:center; height:80px; line-height:80px; border:2px solid #5903a6;
            border-radius:16px; margin-right:10px; font-size:26px; color:#5903a6;
        }
        .tabContaier li:last-child a {margin:0}
        .tabContaier a:hover,
        .tabContaier a.active {background:#5903a6; color:#fff}
        .tabContents {width:922px; margin:0 auto}
        .tabContents a {display:block; height:80px; line-height:80px; font-size:24px; font-weight:bold; text-align:center; color:#fff; background:#5903a6; }

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1421_top.jpg" alt="윌비스 이론패키지" />            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1421_01.jpg" alt="합격권 실력의 기초"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1421_02.jpg" alt="초반 이론 학습"> 
        </div>

        <div class="evtCtnsBox wb_cts03" id="careful" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1421_03.jpg" alt="이런 분들이 수강하시면 좋아요."/>
        </div>

        <div class="evtCtnsBox wb_cts04">            
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1421_04.jpg" alt="본인에게 딱 맞는 학습 전략"/>
            <div class="tabContaier">  
                <ul class="NGEB">
                    <li><a href="#tab01" class="active">9급 일반행정·세무·출관직</a></li>
                    <li><a href="#tab02">7급 일반행정·세무·외무영사직</a></li>
                </ul>
            </div>
            <div id="tab01" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1421_04_01.jpg" alt="9급"/>
                <a href="https://pass.willbes.net/userPackage/show/cate/3019/prod-code/154935/lidx/3" target="_blank">
                    9급 기본~심화 이론패키지 신청하기 >
                </a>
            </div>
            <div id="tab02" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1421_04_02.jpg" alt="7급"/>
                <a href="https://pass.willbes.net/userPackage/show/cate/3020/prod-code/154961/lidx/3" target="_blank">
                    7급 기본~심화 이론패키지 신청하기 >
                </a>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function(){
            $(".tabContents").hide();
            $(".tabContents:first").show();
            $(".tabContaier ul li a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabContaier ul li a").removeClass("active");
            $(this).addClass("active");
            $(".tabContents").hide();
            $(activeTab).fadeIn();
            return false;
            });
        });
    </script>

@stop