@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2117_top_bg.jpg) no-repeat center;}
        .wb_cts01 {background:#2c2c2c; padding-bottom:150px}
        .wb_cts02 {background:#d4d4d4}
        .wb_cts03 {background:#dda700}
        .wb_cts04 {background:#fff}
        .wb_cts05 {background:#f7f7f7; padding-bottom:100px}

        .evtCtnsBox .btnst01 {display:inline-block; background:#363636; color:#fff; font-size:16px; padding:20px 40px}
        .evtCtnsBox .btnst01:hover {background:#dda700;}

        .wb_cts05 .btnst02 {display:inline-block; background:#fff; color:#333; font-size:16px; padding:15px 40px; border:2px solid #333; margin:0 10px}
        .wb_cts05 .btnst02:hover {background:#333; color:#fff}

        /* 탭 */
        .tabContaier{width:1120px; margin:100px auto 0}
        .tabContaier ul:after {content:''; display:block; clear:both;}
        .tabContaier li {display:inline; float:left; width:50%}
        .tabContaier a {display:block; height:50px; line-height:50px; text-align:center; font-size:20px; background:#f4f4f4; border:1px solid #e6e6e6; color:#b5b5b5;} 
        .tabContaier a:hover,
        .tabContaier a.active {background:#dda700; border:1px solid #c39403; color:#fff;}        
        .tabContents {margin-top:20px}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2117_top.jpg"  alt="적중의여신" />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2117_01.jpg"  alt="하승민 영어 해설강의" />
            <iframe width="854" height="480" src="https://www.youtube.com/embed/Kxp5vfGgP7g?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2117_02.jpg"  alt="적중=하승민" />            
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2117_03.jpg"  alt="적중" />
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2117_04.jpg"  alt="적중사례" />

            <div class="NSK-Black">
                <a href="https://police.willbes.net/pass/support/notice/show?board_idx=324116" target="_blank" class="btnst01">더 많은 적중사례 보러가기 ></a>
            </div>

            <div class="tabContaier">
                <ul class="NGEB">
                    <li>
                        <a href="#tab1" class="active">어휘 문제</a>
                    </li>
                    <li>
                        <a href="#tab2">어법 문제</a>
                    </li>
                </ul>
                <div class="tabContents" id="tab1">
                    <img  src="https://static.willbes.net/public/images/promotion/2021/03/2117_04_01.jpg" alt="어휘">
                </div>
                <div class="tabContents" id="tab2" >
                    <img  src="https://static.willbes.net/public/images/promotion/2021/03/2117_04_02.jpg" alt="어법">
                </div>
            </div>          
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2117_05.jpg"  alt="커리큘럼 & 강의신청" />
            <div>
                <a href="{{ site_url('/professor/show/cate/3001/prof-idx/50135/?subject_idx=1001&subject_name=%EC%98%81%EC%96%B4&tab=open_lecture') }}" target="_blank" class="btnst02">온라인강의 신청 ></a>
                <a href="{{ site_url('/pass/professor/show/prof-idx/50136/?cate_code=3010&subject_idx=1054&subject_name=%EC%98%81%EC%96%B4&tab=open_lecture') }}" target="_blank" class="btnst02">학원강의 신청 ></a>
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