@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {            
            min-width:1120px !important;
            max-width:2000px !important;
            width:100%;
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

        .wb_top08 {background:url(https://static.willbes.net/public/images/promotion/2022/08/2225_top_bg.jpg) no-repeat center top; height: 1222px;}
        .wb_top08 .imgA {position: absolute; top:350px; left:50%; margin-left:-211px; z-index: 2;}

        .wb_top09 {background:url(https://static.willbes.net/public/images/promotion/2022/09/2225_top_bg.jpg) no-repeat center top; height: 1200px;}
        .wb_top09 .imgA {position: absolute; top:175px; left:50%; margin-left:-470px; z-index: 2;}

        /*
        .wb_top2 {background:url(https://static.willbes.net/public/images/promotion/2022/07/2225_top_bg.jpg) no-repeat center top; height: 1154px; overflow: hidden;}
        .wb_top2 span {position: absolute; z-index: 2; -webkit-animation:swing 3s linear infinite; animation:swing 3s linear infinite}
        @@keyframes swing{
            0%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            25%{-webkit-transform:rotate3d(0,0,1,5deg);transform:rotate3d(0,0,1,5deg)}
            50%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            75%{-webkit-transform:rotate3d(0,0,1,-5deg);transform:rotate3d(0,0,1,-5deg)}
            100%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
        }
        .wb_top2 span.imgA {left:-50px; top:-80px}
        .wb_top2 span.imgB {left:50%; margin-left:350px; bottom:-80px}              
        .topimg {position: absolute; top:930px; left:50%; margin-left:-634px; z-index: 10;}
        */

        .wb_cts03 {background:#303132}

    </style>

    <div class="evtContent NSK" id="evtContainer"> 

        {{--8월--}}
        @if(time() < strtotime('202208312400'))
        <!--
        <div class="evtCtnsBox wb_top2" data-aos="fade-up">
            <span class="imgA"><img src="https://static.willbes.net/public/images/promotion/2022/07/2225_img_01.png" alt=""/></span>
            <span class="imgB"><img src="https://static.willbes.net/public/images/promotion/2022/07/2225_img_02.png" alt=""/></span>
        </div>       
        <div class="topimg" data-aos="flip-up" data-aos-duration="1000"><img src="https://static.willbes.net/public/images/promotion/2022/07/2225_img_03.png" alt="공무원 웰컴팩"/></div>
         -->
         <div class="evtCtnsBox wb_top08">
           <span class="imgA" data-aos="flip-up" data-aos-duration="1000"><img src="https://static.willbes.net/public/images/promotion/2022/08/2225_top_img.png" alt="윌비스 웰컴팩"/></span>
        </div>
        @else
        {{--9월--}}            
        <div class="evtCtnsBox wb_top09">
           <span class="imgA" data-aos="flip-up" data-aos-duration="1000"><img src="https://static.willbes.net/public/images/promotion/2022/09/2225_top_img.png" alt="윌비스 드림팩"/></span>
        </div>
        @endif   

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2225_member.jpg" alt="윌비스 회원가입"/>
                <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2003" target="_blank" title="회원가입하기" style="position: absolute;left: 28.77%;top: 25.12%;width: 42.27%;height: 15.45%;z-index: 2;"></a>
            </div>
        </div>
        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2225_dream_gift.jpg" alt="드림 기프트"/>
        </div>

        <div class="evtCtnsBox wb_cts03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2225_03.jpg" alt="자세히보기"/>
                <a href="https://pass.willbes.net/home/index/cate/3019" target="_blank" title="9급" style="position: absolute;left: 14.77%;top: 52%;width: 12.27%;height: 3.8%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/home/index/cate/3020" target="_blank" title="7급" style="position: absolute;left: 43.77%;top: 52%;width: 12.27%;height: 3.8%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/home/index/cate/3023" target="_blank" title="소방" style="position: absolute;left: 72.77%;top: 52%;width: 12.27%;height: 3.8%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/home/index/cate/3024" target="_blank" title="군무원" style="position: absolute;left: 14.77%;top: 85%;width: 12.27%;height: 3.8%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/home/index/cate/3028" target="_blank" title="기술직" style="position: absolute;left: 43.77%;top: 85%;width: 12.27%;height: 3.8%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/home/index/cate/3035" target="_blank" title="법원팀" style="position: absolute;left: 72.77%;top: 85%;width: 12.27%;height: 3.8%;z-index: 2;"></a>
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