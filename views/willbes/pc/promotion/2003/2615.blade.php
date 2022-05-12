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
        /*.evtCtnsBox .wrap a {border:1px solid #fff}*/
        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/05/2615_top_bg.jpg) no-repeat center top;}

        .wb_01 {background:#01bdbf; padding-bottom:150px}

        .wb_03 {background:#f2e8dc;}
        
        .wb_04 {background:#1c2123;}
         
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-down">            
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2615_top.jpg" alt="무료 면접반 개강"/>               
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <a href="javascript:fnPlayerSample('193420', '1348889', 'HD');">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2615_01.jpg"  alt="면접반 소개"/>
            </a>
		</div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2615_02.jpg"  alt="관리형 종합반"/>              
		</div>
{{--
        <div class="evtCtnsBox wb_03" data-aos="fade-up">            
            <a href="https://pass.willbes.net/pass/offLecture/show/cate/3149/prod-code/192623" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/04/2615_03.jpg" alt="접수 바로가기"/></a>            
		</div>--}}

        <div class="evtCtnsBox wb_04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2615_04.jpg"  alt="공식 계정"/>
                <a href="https://cafe.naver.com/theprosecution" title="네이버카페" target="_blank" style="position: absolute; left: 20.27%; top: 59%; width: 8.57%; height: 19.14%; z-index: 2;"></a>
                <a href="https://www.youtube.com/channel/UC2J41ggwL4CTIJfoVBXsWkg" title="유튜브" target="_blank" style="position: absolute; left: 37.32%; top: 59%; width: 8.57%; height: 19.14%; z-index: 2;"></a>
                <a href="https://open.kakao.com/o/sm2o7cVd" title="카카오톡" target="_blank" style="position: absolute; left: 54.46%; top: 59%; width: 8.57%; height: 19.14%;z-index: 2;"></a>
                <a href="https://www.instagram.com/willbes_prosecution_team/?r=nametag" title="인스타" target="_blank" style="position: absolute; left: 71.16%; top: 59%; width: 8.57%; height: 19.14%; z-index: 2;"></a>               
            </div>
		</div>

    </div>

    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init({
				easing: 'ease-out-back',
				duration: 500
			});
        });
    </script> 
    
@stop