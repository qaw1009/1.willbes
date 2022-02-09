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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/02/2530_top_bg.jpg) no-repeat center top;position:relative;}

        .pro_area {position:absolute;top:61.4%;left:50%;margin-left:-539px;}

        .wb_01, .wb_02, .wb_03 {background:#ebebeb;}    
       
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2530_top.jpg" alt="무료응싱 및 해설강의"/>
            <div class="pro_area"  data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2530_top_pro.png" alt="교수진"/>
            </div>
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2530_01.jpg"  alt="무료고사 응시방법"/>
		</div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2530_02.jpg"  alt="추가 이벤트 하나 더"/>
		</div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2530_03.jpg"  alt="면접반 이벤트 참여안내"/>
                <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" title="접수 바로가기" target="_blank" style="position: absolute;left: 30.91%;top: 41.08%;width: 38.34%;height: 5.5%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/theprosecution" title="네이버카페" target="_blank" style="position: absolute;left: 17.41%;top: 62.78%;width: 10.34%;height: 5.5%;z-index: 2;"></a>
                <a href="https://youtube.com/channel/UC2J41ggwL4CTIJfoVBXsWkg" title="유튜브" target="_blank" style="position: absolute;left: 30.01%;top: 62.78%;width: 11.34%;height: 5.5%;z-index: 2;"></a>
                <a href="https://open.kakao.com/o/sm2o7cVd" title="카카오톡" target="_blank" style="position: absolute;left: 43.41%;top: 62.78%;width: 15.34%;height: 5.5%;z-index: 2;"></a>
                <a href="http://pass.willbes.net" title="윌비스공무원" target="_blank" style="position: absolute;left: 59.71%;top: 62.78%;width: 10.34%;height: 5.5%;z-index: 2;"></a>
                <a href="https://instagram.com/willbes_prosecution_team?r=nametag" title="인스타계정" target="_blank" style="position: absolute;left: 71.91%;top: 62.78%;width: 10.34%;height: 5.5%;z-index: 2;"></a>
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