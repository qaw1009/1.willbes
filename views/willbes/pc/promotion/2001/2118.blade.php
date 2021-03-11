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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2118_top_bg.jpg) no-repeat center;}
        .wb_cts01 {background:#2c2c2c; padding-bottom:150px}
        .wb_cts02 {background:#898989}
        .wb_cts03 {background:#fff}
        .wb_cts04 {background:#f3f3f3; padding-bottom:100px}

        .evtCtnsBox .btnst01 {display:inline-block; background:#363636; color:#fff; font-size:16px; padding:20px 40px}
        .evtCtnsBox .btnst01:hover {background:#dda700;}

        .wb_cts04 .btnst02 {display:inline-block; background:#fff; color:#333; font-size:16px; padding:15px 40px; border:2px solid #333; margin:0 10px}
        .wb_cts04 .btnst02:hover {background:#333; color:#fff}

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
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2118_top.jpg"  alt="아침특강 또 적중" />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2118_01.jpg"  alt="김현정 영어 해설강의" />
            <iframe width="854" height="480" src="https://www.youtube.com/embed/Fm0hrgu1gXg?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2118_02.jpg"  alt="후기" />            
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2118_03.jpg"  alt="적중사례" />
            <div class="NSK-Black mb50">
                <a href="https://police.willbes.net/pass/support/notice/show?board_idx=324115" target="_blank" class="btnst01">더 많은 적중사례 보러가기 ></a>
            </div>
            <img  src="https://static.willbes.net/public/images/promotion/2021/03/2118_03_01.jpg" alt="">
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2118_04.jpg"  alt="커리큘럼 & 강의신청" />
            <div>
                <a href="{{ site_url('/professor/show/cate/3001/prof-idx/50748/?subject_idx=1001&subject_name=%EC%98%81%EC%96%B4&tab=open_lecture') }}" target="_blank" class="btnst02">온라인강의 신청 ></a>
                <a href="{{ site_url('/pass/professor/show/prof-idx/50130/?cate_code=3010&subject_idx=1082&subject_name=%EA%B8%B0%EC%B4%88%EC%98%81%EC%96%B4&tab=open_lecture') }}" target="_blank" class="btnst02">학원강의 신청 ></a>
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