@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
   
    <!-- Container -->

    <link href="/public/css/willbes/style_2015.css?ver={{time()}}" rel="stylesheet">
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;
            font-size:14px;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        .sky {position:fixed;top:200px;right:10px;z-index:100;}
        .sky a {display:block; margin-bottom:10px}


        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2023/03/2879_top_bg.jpg) no-repeat center top;}
        .evtTop span {position: absolute; top:300px; left:50%; margin-left:-386px; width:773px; z-index: 2;}

        .evt01 {background:#ec614e; color:#fff; padding:25px; font-size:32px}
        .evt02 {padding:150px 0}
        .evt02 div {margin-bottom:20px}
        .evt02 .btns a {width:500px; margin:50px auto 0; font-size:30px; background:#1e1e1e; color:#fff; display:block; padding:20px; border-radius:50px}
        .evt02 .btns a:hover {background:#ec614e;}

        .evt03 {background:#2b2b2b url(https://static.willbes.net/public/images/promotion/2023/03/2879_02_bg.jpg) no-repeat center top; padding:600px 0 150px}
        .evt03 div {margin-bottom:20px}
        .evt03 .btns a {width:500px; margin:50px auto 0; font-size:30px; background:#fff200; color:#000; display:block; padding:20px; border-radius:50px}
        .evt03 .btns a:hover {background:#ec614e; color:#fff;}
    </style>   


    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="https://willbesedu.willbes.net/pass/promotion/index/cate/3126/code/2881" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/12/1101_sky.jpg" alt="합격보장반"></a>
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2879_top.jpg" alt="윌비스소방 통합생활관리반"/>
            <span data-aos="flip-left"><img src="https://static.willbes.net/public/images/promotion/2023/03/2879_top_img.png"  alt="윌비스소방 통합생활관리반"/></span>
        </div>

        <div class="evtCtnsBox evt01 NSK-Black" data-aos="fade-up">
            노량진 수험관리의 끝판왕! 통합생활관리반의 모든것!
        </div>

        <div class="evtCtnsBox evt02">            
            <div data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2023/03/2879_01_01.jpg" /></div>
            <div data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2023/03/2879_01_02.jpg" /></div>
            <div data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2023/03/2879_01_03.jpg" /></div>
            <div data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2023/03/2879_01_04.jpg" /></div>
            <div data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2023/03/2879_01_05.jpg" /></div>
            <div data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2023/03/2879_01_06.jpg" /></div>
            <div class="btns NSK-Black">
                <a href="https://pass.willbes.net/pass/consult/visitConsult/index?s_campus=605005" target="_blank">1:1 심층 방문상담 예약하기 ></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03">            
            <div data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2023/03/2879_02_01.png" /></div>
            <div data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2023/03/2879_02_02.png" /></div>
            <div data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2023/03/2879_02_03.png" /></div>
            <div data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2023/03/2879_02_04.png" /></div>
            <div data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2023/03/2879_02_05.png" /></div>
            <div data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2023/03/2879_02_06.png" /></div>
            <div data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2023/03/2879_02_07.png" /></div>
            <div data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2023/03/2879_02_08.png" /></div>
            <div class="btns NSK-Black">
                <a href="https://pass.willbes.net/pass/consult/visitConsult/index?s_campus=605005" target="_blank">1:1 심층 방문상담 예약하기 ></a>
            </div>
        </div>


        <div class="incheon">
            <div class="Section Section4_ic mt40 mb100">
                @include('willbes.pc.site.main_partial.campus_' . $__cfg['SiteCode'])
            </div>
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