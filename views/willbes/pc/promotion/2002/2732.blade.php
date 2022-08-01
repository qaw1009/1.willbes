@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">            
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/08/2732_top_bg.jpg) no-repeat center top; height: 1120px;}        
        .wb_top .imgA {position: absolute; top:130px; left:50%; margin-left:-501px; z-index: 2;}

        .evt01 {background:#f5f5f7;}

        .evt02 {background:#242424;}

        .evt03 {background:#dfc6c2;}

        .evt04 {background:#efefef;}

        .evt05 {background:#ced9e0;}

        .evt06 {background:url(https://static.willbes.net/public/images/promotion/2022/08/2732_06_bg.jpg) no-repeat center top;}

        .evt07 {background:#013e0e;}
        .evt07 .apply {width:460px;margin:0 auto;padding-bottom:150px;}
        .evt07 .apply a {display:block;font-size:44px; color:#fff; padding:20px; background:#13c038; border-radius:50px;}
        .evt07 .apply a:hover {background:#533fd1}

        .evt08 {background:#1c1c1c;}

        .loadmap {position: relative; padding-bottom:56.25%;overflow: hidden; max-width:100%; height:auto; }
        .loadmap iframe {position:absolute; top: 0; left: 0; width:100%; height:100%;}
        
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">
           <span class="imgA" data-aos="flip-up" data-aos-duration="1000"><img src="https://static.willbes.net/public/images/promotion/2022/08/2732_top.png" alt="프리미엄 p.t"/></span>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2732_01.jpg" title="합격까지 빠르게">
        </div>

         <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2732_02.jpg" title="프리미엄 피티반 오픈">
        </div>  

         <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2732_03.jpg" title="포인트1">
        </div>  

         <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2732_04.jpg" title="포인트2">
        </div>  

         <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2732_05.jpg" title="포인트3">
        </div>  

         <div class="evtCtnsBox evt06" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2732_06.jpg" title="관리 시스템">
        </div>  

         <div class="evtCtnsBox evt07" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2732_07.jpg" title="신청하기">
            <div class="apply NSK-Black" data-aos="fade-up">
                <a href="https://police.willbes.net/pass/offPackage/index/type/agong?cate_code=3010&campus_ccd=605001&course_idx=1094" target="_blank" title="신청하기" >신청하기 ></a>
            </div> 
        </div>  

         <div class="evtCtnsBox evt08" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2732_08.jpg" title="최선을 다합니다">
        </div>

        <div class="loadmap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.7927493090915!2d126.94179831559448!3d37.51280597980801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c9fe8a0a1e2a5%3A0x3bc432e93a6e20c1!2zKOyjvCnsnIzruYTsiqQ!5e0!3m2!1sko!2skr!4v1603420278998!5m2!1sko!2skr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        
         <div class="evtCtnsBox evt09" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2732_09.jpg" title="오시는 길">
        </div>

	</div>

    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>
        
@stop