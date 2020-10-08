@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/10/1857_top_bg.jpg) no-repeat center;}
        .wb_cts01 {background:#2c2c2c; padding-bottom:140px}
        .wb_cts02 {background:#d4d4d4;}
        .wb_cts03 {background:#653c97}
        .wb_cts04 {background:#fff}
        .wb_cts05 {background:#fff;}
        /* 탭 */
        .tabContaier{width:1120px; margin:0 auto}
        .tabContaier ul {width:1000px;text-align:center; margin:0 auto}
        .tabContaier li {display:inline; float:left; width:33.33333%}
        .tabContaier a {display:block; height:50px; line-height:50px; text-align:center; font-size:20px; background:#f4f4f4; border:1px solid #e6e6e6; color:#b5b5b5;} 
        .tabContaier li:last-child {margin:0}
        .tabContaier a:hover,
        .tabContaier a.active {background:#653c97; border:1px solid #653c97; color:#fff;}
        .tabContaier ul:after {content:''; display:block; clear:both;}
        .tabContents {margin-top:20px}

        .wb_cts06 {background:#f7f7f7}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1857_top.jpg"  alt="적중의여신 " />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1857_01.jpg"  alt="적중=하승민 " />
            <iframe width="854" height="480" src="https://www.youtube.com/embed/11wTJYKc5HM" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1857_02.jpg"  alt="동영상" />
            
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1857_03.jpg"  alt="적중" />
        </div>


        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1857_04.jpg"  alt="100%" usemap="#more" />
            <map name="more" id="more">
                <area shape="rect" coords="397,519,728,580" href="/pass/support/notice/show?board_idx=276719&" onfocus='this.blur()' alt="적중사례" target="_blank">
            </map>          
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <div class="tabContaier">
                <ul class="NGEB">
                    <li>
                        <a class="active" href="#tab1">어휘 문제</a>
                    </li>
                    <li>
                        <a href="#tab2">어법 문제</a>
                    </li>
                    <li>
                        <a href="#tab3">숙어 문제</a>
                    </li>
                </ul>
                <div class="tabContents" id="tab1">
                    <img  src="https://static.willbes.net/public/images/promotion/2020/10/1857_04_01.jpg">
                </div>
                <div class="tabContents" id="tab2" >
                    <img  src="https://static.willbes.net/public/images/promotion/2020/10/1857_04_02.jpg">
                </div>
                <div class="tabContents" id="tab3" >
                    <img  src="https://static.willbes.net/public/images/promotion/2020/10/1857_04_03.jpg">
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1857_05.jpg"  alt="커리큘럼 & 강의신청" usemap="#p1" />
            <map name="p1" id="p1">
                <area shape="rect" coords="238,1080,514,1148" href="{{ site_url('/professor/show/cate/3001/prof-idx/50135/?subject_idx=1001&subject_name=%EC%98%81%EC%96%B4&tab=open_lecture') }}" onfocus='this.blur()'  target="_blank" alt="온라인강의 신청">
                <area shape="rect" coords="582,1079,860,1147" href="{{ site_url('/pass/professor/show/prof-idx/50136/?cate_code=3010&subject_idx=1054&subject_name=%EC%98%81%EC%96%B4&tab=open_lecture') }}" onfocus='this.blur()' target="_blank" alt="학원강의 신청">
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