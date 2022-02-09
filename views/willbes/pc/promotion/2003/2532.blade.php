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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/02/2532_top_bg.jpg) no-repeat center top;}
        
        .wb_02 {background:#1a1e21;}
         
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-down">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2532_top.jpg" alt="런칭 이벤트"/>
                <a href="https://pass.willbes.net/lecture/show/cate/3148/pattern/only/prod-code/191189" title="신청 바로가기" target="_blank" style="position: absolute;left: 27.11%;top: 87.12%;width: 45.54%;height: 7.5%;z-index: 2;"></a>
            </div>       
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2532_01.jpg"  alt="교재 소개"/>
                <a href="https://pass.willbes.net/lecture/show/cate/3148/pattern/only/prod-code/191189" title="신청 바로가기" target="_blank" style="position: absolute;left: 26.11%;top: 67.12%;width: 47.54%;height: 13.5%;z-index: 2;"></a>
            </div> 
		</div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2532_02.jpg"  alt="공식 계정"/>
                <a href="https://cafe.naver.com/theprosecution" title="네이버카페" target="_blank" style="position: absolute;left: 15.41%;top: 56.78%;width: 10.34%;height: 19.5%;z-index: 2;"></a>
                <a href="https://youtube.com/channel/UC2J41ggwL4CTIJfoVBXsWkg" title="유튜브" target="_blank" style="position: absolute;left: 29.91%;top: 56.78%;width: 10.34%;height: 19.5%;z-index: 2;"></a>
                <a href="https://open.kakao.com/o/sm2o7cVd" title="카카오톡" target="_blank" style="position: absolute;left: 43.91%;top: 56.78%;width: 11.51%;height: 19.5%;z-index: 2;"></a>
                <a href="http://pass.willbes.net" title="윌비스공무원" target="_blank" style="position: absolute;left: 59.41%;top: 56.78%;width: 10.34%;height: 19.5%;z-index: 2;"></a>
                <a href="https://instagram.com/willbes_prosecution_team?r=nametag" title="인스타계정" target="_blank" style="position: absolute;left: 73.41%;top: 56.78%;width: 10.34%;height: 19.5%;z-index: 2;"></a>
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