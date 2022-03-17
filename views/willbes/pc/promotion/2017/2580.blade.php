@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; font-size:14px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed; top:150px; right:10px; z-index:10;}

        .evtTop  {background:url("https://static.willbes.net/public/images/promotion/2022/03/2580_top_bg.jpg") no-repeat center top;}

        .evt02 {background:#2a387f}

        .youtube {padding:150px 0}
        .youtube iframe {width:897px; height:507px}

        .evtInfo {color:#646464; font-size:16px; background:#e2e2e2 url("https://static.willbes.net/public/images/promotion/2022/03/2580_03_bg.jpg") no-repeat center top; padding-bottom:100px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}
    </style>

    <div class="evtContent NSK">
        <div class="sky" id="QuickMenu">
            <a href="https://www.youtube.com/channel/UCUbuqBgYMeqiVR4FuEIgkiw" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/03/2580_sky.png" title="채널구독"></a>
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2580_top.jpg" alt="신태식 교육학논술"/>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2580_01.jpg" alt="커리큘럼"/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2580_02.jpg" alt="학습에 도전"/>
        </div>

        <div class="evtCtnsBox youtube" data-aos="fade-up">
            <iframe src="https://www.youtube.com/embed/V4B8cUDEXik?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>           
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2580_03.jpg"/>
                <a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/189065" title="수강하기" style="position: absolute; left: 77.5%; top: 58.23%; width: 18.57%; height: 23.18%; z-index: 2;"></a>
            </div>
            <div class="evtInfoBox">
                <h4 class="NSK-Black">신태식 교육학 2년 패키지 수강 시 유의 사항</h4>
                <ul>
                    <li>본 패키지 강의는 강의는 결제일로부터 2022년 12월 31일까지 제공됩니다.</li>
                    <li>본 패키지를 수강하고, 불합격시, 추가 갱신이 가능한 강좌입니다. (인증방법은 추후 공지)</li>
                    <li>본 패키지는 3배수로 제공됩니다.</li>
                    <li>윌비스의 전공 패키지를 수강하고 있다면, 추가 10%(127,500원)할인 받으실 수 있습니다.</li>
                    <li>추가 갱신된 강좌는 환불이 불가한 강좌입니다. (갱신강좌는 무료제공 강좌)</li>
                    <li>본 패키지 강의를 수강 후, 불법 공유가 적발되면 처벌을 받으실 수 있습니다.</li>
                    <li>본 패키지 수강에 필요한 교재는 별도로 구매하셔야 합니다.</li>
                </ul>
            </div>
        </div>  
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            AOS.init();
            fnReviewList(1);
        });
    </script>
@stop