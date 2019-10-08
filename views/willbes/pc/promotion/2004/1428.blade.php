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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/10/1428_top_bg.jpg) no-repeat center top; position:relative}
        .wb_cts01 {background:#FFF;}
        .wb_cts02 {background:#FFF;padding-bottom:150px}
        .wb_cts03 {background:#4e13e1;}
        .wb_cts04 {background:#fff; }    
        
        .tabContaier {width:980px; margin:0 auto;}
        .tabContaier ul {margin-bottom:10px}
        .tabContaier li {display:inline-block; float:left; width:50%}
        .tabContaier ul:after {content:""; display:block; clear:both}
        .tabContaier a {display:block; text-align:center; height:80px; line-height:80px; background:#aaa;
            margin-right:10px; font-size:24px; color:#fff;
        }
        .tabContaier li:last-child a {margin:0}
        .tabContaier a:hover,
        .tabContaier a.active {background:#b42e39}
        .tabContents {width:980px; margin:0 auto}
        .tabContents a {display:block; height:80px; line-height:80px; font-size:24px; font-weight:bold; text-align:center; color:#fff; background:#5903a6; }

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1428_top.jpg" alt="윌비스 기술직 라스트 캠프" />            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1428_01.jpg" alt="과목별 고득점 커리큘럼"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1428_02.jpg" alt="학습부터 생활까지 꽉찬 관리 시스템">
            <div class="tabContaier">  
                <ul class="NGEB">
                    <li><a href="#tab01" class="active">과목별 교수님의 학습 CARE</a></li>
                    <li><a href="#tab02">전담 매니저의 생활 CARE</a></li>
                </ul>
            </div>
            <div id="tab01" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1428_02_1.jpg" alt="9급"/>
            </div>
            <div id="tab02" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1428_02_2.jpg" alt="7급"/>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03" id="careful" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1428_03.jpg" alt="이런 분들이 수강하시면 좋아요."/>
        </div>

        <div class="evtCtnsBox wb_cts04">            
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1428_04.jpg" alt="윌비스 기술직 라스트 캠프 수강신청" usemap="#Map1428A" border="0"/>
            <map name="Map1428A" id="Map1428A">
                <area shape="rect" coords="219,404,909,486" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3052&amp;campus_ccd=605001&amp;course_idx=" target="_blank" alt="수강신청" />
            </map>             
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