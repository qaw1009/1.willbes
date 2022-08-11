@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/08/2735_top_bg.jpg) no-repeat center top; height: 1170px;}
        .wb_top span {position:absolute; left:50%}
        .wb_top .img01 {position:absolute; top:325px; margin-left:-466.5px; z-index: 1;}

        .evtCtnsBox .title02 {font-size:28px; color:#000; margin:90px auto 30px}
        .evtCtnsBox .title02 div {font-size:46px}

        .evtCtnsBox .title02 span {color:#ffda39; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite;}
        @@keyframes upDown{
            from{color:#2a069c}
            50%{color:#f44631}
            to{color:#2a069c}
        }
        @@-webkit-keyframes upDown{
            from{color:#2a069c}
            50%{color:#f44631}
            to{color:#2a069c}
        }

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <span class="img01" data-aos="fade-down"><img src="https://static.willbes.net/public/images/promotion/2022/08/2735_top.png" alt="w아카데미"/></span>
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2735_01.jpg" alt="시설안내"/>
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2735_02.jpg" alt="혜택 및 제공"/>
                <a href="https://blog.naver.com/pwjg85/222783521989" target="_blank" title="제휴고시식당" style="position: absolute;left: 7.53%;top: 18.14%;width: 84.93%;height: 16.19%;z-index: 2;"></a>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSf4tbxQj7FcxPG2vEDh0VE4kGS_4h8n8t_B66dK8CEYzs6q5Q/viewform?usp=sf_link" target="_blank" title="사전조사서 작성 바로기기" style="position: absolute;left: 14.53%;top: 79.64%;width: 69.93%;height: 2.39%;z-index: 2;"></a>
                <a href="https://naver.me/GZ0UmeUa" target="_blank" title="체험이벤트 신청" style="position: absolute;left: 7.53%;top: 90.14%;width: 84.93%;height: 9.79%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_03 pb100" data-aos="fade-up">
            <div class="title02" id="transfer">                
                <div class="NSK-Black"><span>선착순 마감되오니 등록을 서둘러 주세요!</span></div>
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

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop