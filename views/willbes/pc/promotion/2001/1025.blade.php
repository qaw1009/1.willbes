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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/

        .wb_top {background:#2c2c2c url(https://static.willbes.net/public/images/promotion/2019/05/1025_p1_bg.jpg) no-repeat center;}
        .wb_cts01 {background:#d4d4d4}
        .wb_cts02 {background:#2c2c2c; padding-bottom:140px}
        .wb_cts03 {background:#958a53}
        .wb_cts04 {background:#fff}

        .wb_cts05 {background:#fff; padding-bottom:100px}
        /* 탭 */
        .tabContaier{width:1120px; margin:0 auto}
        .tabContaier ul {width:1000px; text-align:center; margin:0 auto}
        .tabContaier li {display:inline; float:left; width:33.33333%}
        .tabContaier a {display:block; height:50px; line-height:50px; text-align:center; font-size:20px; background:#f4f4f4; border:1px solid #e6e6e6; color:#b5b5b5; margin-right:10px} 
        .tabContaier li:last-child {margin:0}
        .tabContaier a:hover,
        .tabContaier a.active {background:#958a53; border:1px solid #958a53; color:#fff;}
        .tabContaier ul:after {content:''; display:block; clear:both;}
        .tabContents {margin-top:20px}

        .wb_cts06 {background:#f7f7f7}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1025_p1.jpg"  alt="적중의여신 " />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1025_p2.jpg"  alt="적중=하승민 " />
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1025_p3.jpg"  alt="동영상" />
            <iframe width="854" height="480" src="https://www.youtube.com/embed/ouOkVtFChAc?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1025_p4.jpg"  alt="적중" />
        </div>


        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1025_p5.jpg"  alt="100%" usemap="#more" />
            <map name="more" id="more">
                <area shape="rect" coords="397,519,728,580" href="https://police.willbes.net/pass/support/notice/show?board_idx=225453" onfocus='this.blur()' alt="적중사례" target="_blank">
            </map>          
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <div class="tabContaier">
                <ul class="NGEB">
                    <li>
                        <a class="active" href="#tab1">독해 문제</a>
                    </li>
                    <li>
                        <a href="#tab2">어휘 문제</a>
                    </li>
                    <li>
                        <a href="#tab3">어법 문제</a>
                    </li>
                </ul>
                <div class="tabContents" id="tab1">
                    <img  src="https://static.willbes.net/public/images/promotion/2019/05/1025_p5_1.jpg">
                </div>
                <div class="tabContents" id="tab2" >
                    <img  src="https://static.willbes.net/public/images/promotion/2019/05/1025_p5_2.jpg">
                </div>
                <div class="tabContents" id="tab3" >
                    <img  src="https://static.willbes.net/public/images/promotion/2019/05/1025_p5_3.jpg">
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1025_p6.jpg"  alt="커리큘럼 & 강의신청" usemap="#p1" />
            <map name="p1" id="p1">
                <area shape="rect" coords="167,1081,443,1149" href="{{ site_url('/professor/show/cate/3001/prof-idx/50135/?subject_idx=1001&subject_name=%EC%98%81%EC%96%B4&tab=open_lecture') }}" onfocus='this.blur()'  target="_blank" alt="온라인강의 신청">
                <area shape="rect" coords="509,1081,787,1149" href="{{ site_url('/pass/professor/show/prof-idx/50136/?cate_code=3010&subject_idx=1054&subject_name=%EC%98%81%EC%96%B4&tab=open_lecture') }}" onfocus='this.blur()' target="_blank" alt="학원강의 신청">
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


    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>

@stop