@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}        
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        
        /************************************************************/     

        .evtTop {background:#1D318A;}

        .evt01 {background:#222327;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2022/10/2790_01_bg.jpg) no-repeat center top; height: 1137px;}        
        .evt01 .imgA {position: absolute; top:605px; left:50%; margin-left:-460px; z-index: 2;}
        .evt01 .imgB {position: absolute; top:745px; left:50%; margin-left:-390px; z-index: 2;}

        .deadline {            
            animation:upDown 1s infinite;
            -webkit-animation:upDown 1s infinite;
            z-index:10;
        }
        @@keyframes upDown{
            from{margin-top:0}
            60%{margin-top:-10px}
            to{margin-top:0}
        }
        @@-webkit-keyframes upDown{
            from{margin-top:0}
            60%{margin-top:-10px}
            to{margin-top:0}
        }

        .evt02 {background:#222327;}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2022/10/2790_03_bg.jpg) no-repeat center top;}

        .evt05 {background:#D4F0F1;}

        .evt06 {background:#1D318A;}

        .evt07 {background:#89092F;}

    </style>

    <div class="evtContent NSK" id="evtContainer">         

        <div class="evtCtnsBox evtTop" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2790_top.jpg" title="5일일의 투자">
        </div>

        <div class="evtCtnsBox evt01">
           <span class="imgA deadline" data-aos="flip-down" data-aos-duration="1000"><img src="https://static.willbes.net/public/images/promotion/2022/10/2790_img01.png" alt=""/></span>
           <span class="imgB deadline" data-aos="flip-down" data-aos-duration="1000"><img src="https://static.willbes.net/public/images/promotion/2022/10/2790_img02.png" alt=""/></span>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2790_02.jpg" title="빅4">
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2790_03.jpg" title="석치수 자료해석">
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2790_04.jpg" title="강의정보">
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2790_05.jpg" title="welcome event">
                <a href="https://pass.willbes.net/pass/offLecture/show/cate/3143/prod-code/201562" target="_blank" title="바로가기" style="position: absolute;left: 26.63%;top: 72.95%;width: 46.58%;height: 10.26%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt06" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2790_06.jpg" title="psat so easy">
        </div>

        <div class="evtCtnsBox evt07" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2790_07.jpg" title="수강신청 바로가기">
                <a href="https://pass.willbes.net/pass/offPackage/show/prod-code/201485" target="_blank" title="학원실강" style="position: absolute;left: 66.63%;top: 50.95%;width: 29.58%;height: 13.06%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/Package/index/cate/3103/pack/648001" target="_blank" title="온라인" style="position: absolute;left: 66.63%;top: 67.85%;width: 29.58%;height: 13.06%;z-index: 2;"></a>
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