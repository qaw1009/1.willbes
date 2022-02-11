@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/
        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/02/2536_top_bg.jpg) no-repeat center top;position:relative;}
        .wb_top span.img01 {position:absolute; bottom:100px; left:50%; margin-left:-475px;}

        .wb_02 {background:#f2f2f2;}

        .wb_03 {background:#3e3e3e;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-down">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2536_top.jpg" alt="검찰직 단기 합격 공식"/>
            </div>
            <span data-aos="fade-left" class="img01"><img src="https://static.willbes.net/public/images/promotion/2022/02/2536_top_school.png" alt="문형석의 드림스쿨"/></span>  
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">           
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2536_01.jpg"  alt="드림스쿨"/>            
		</div>

          <div class="evtCtnsBox wb_02" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2536_02.jpg"  alt="참여방법"/>            
		</div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2536_03.jpg"  alt="바로가기"/>
                <a href="https://cafe.naver.com/theprosecution" title="네이버카페" target="_blank" style="position: absolute;left: 22.91%;top: 68.38%;width: 54.34%;height: 13.5%;z-index: 2;"></a>          
            </div>   
		</div>

    </div>

    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function(){AOS.init();});
    </script>   
    
@stop