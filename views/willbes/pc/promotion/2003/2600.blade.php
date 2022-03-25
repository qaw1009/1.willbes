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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/03/2600_top_bg.jpg) no-repeat center top;}

        .wb_01 {background:#ffdc4e;}

        .wb_03 {background:#161b27;}
        
        .wb_05 {background:#1c2123;}
         
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-down">            
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2600_top.jpg" alt="무료입문특강"/>               
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2600_01.jpg"  alt="공개일정"/>
		</div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2600_02.jpg"  alt="관리형 종합반"/>              
		</div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2600_03.jpg"  alt="시간관리 시스템"/>              
		</div>

        <div class="evtCtnsBox wb_04" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2600_04.jpg"  alt="연간 커리큘럼"/>              
		</div>

        <div class="evtCtnsBox wb_05" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2600_05.jpg"  alt="공식 계정"/>
                <a href="https://cafe.naver.com/theprosecution" title="네이버카페" target="_blank" style="position: absolute; left: 23.3%; top: 57.14%; width: 8.21%; height: 13.11%; z-index: 2;"></a>
                <a href="https://www.youtube.com/channel/UC2J41ggwL4CTIJfoVBXsWkg" title="유튜브" target="_blank" style="position: absolute; left: 37.68%; top: 57.14%; width: 8.21%; height: 13.11%; z-index: 2;"></a>
                <a href="https://open.kakao.com/o/sm2o7cVd" title="카카오톡" target="_blank" style="position: absolute; left: 52.41%; top: 57.14%; width: 8.21%; height: 13.11%;z-index: 2;"></a>
                <a href="https://www.instagram.com/willbes_prosecution_team/?r=nametag" title="인스타" target="_blank" style="position: absolute; left: 67.95%; top: 57.14%; width: 8.21%; height: 13.11%; z-index: 2;"></a>               
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