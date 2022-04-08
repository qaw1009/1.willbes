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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/03/2596_top_bg.jpg) no-repeat center top;}

        .wb_tops {background:#9CC1B9}
        .pass_apply {width:860px; margin:0 auto;}
        .pass_apply a {display:block; background:#000; font-size:44px; color:#fff; padding:20px; background:#000; border-radius:5px; box-shadow:10px rgba(0,0,0,.5);}
        .pass_apply a:hover {background:#533fd1}

        .wb_01 {background:#eee8df;}

        .wb_02 {background:#396659;}
        
        .wb_03 {background:#1c2022;padding-bottom:50px;}
         
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-down">            
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2596_top.jpg" alt="무료특강"/>                    
        </div>

        <div class="evtCtnsBox wb_tops"> 
            <div class="pass_apply NSK-Black">
                <a href="https://pass.willbes.net/lecture/index/cate/3148/pattern/free?search_order=regist&course_idx=1082" target="_blank">수강신청 바로가기 ></a>
            </div>
        </div>
        
        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2596_01.jpg"  alt="공개일정"/>
                <a href="https://cafe.naver.com/theprosecution" title="윌비스검찰팀" target="_blank" style="position: absolute;left: 26.11%;top: 84.62%;width: 47.54%;height: 10.5%;z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2596_02.jpg"  alt="면접반 개강"/>              
		</div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2596_03.jpg"  alt="공식 계정"/>
                <a href="https://cafe.naver.com/theprosecution" title="네이버카페" target="_blank" style="position: absolute;left: 19.41%;top: 59.78%;width: 10.34%;height: 19.5%;z-index: 2;"></a>
                <a href="https://www.youtube.com/channel/UC2J41ggwL4CTIJfoVBXsWkg" title="유튜브" target="_blank" style="position: absolute;left: 36.41%;top: 59.78%;width: 10.34%;height: 19.5%;z-index: 2;"></a>
                <a href="https://open.kakao.com/o/sm2o7cVd" title="카카오톡" target="_blank" style="position: absolute;left: 53.41%;top: 59.78%;width: 10.34%;height: 19.5%;z-index: 2;"></a>
                <a href="https://www.instagram.com/willbes_prosecution_team/?r=nametag" title="인스타" target="_blank" style="position: absolute;left: 70.41%;top: 59.78%;width: 10.34%;height: 19.5%;z-index: 2;"></a>               
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