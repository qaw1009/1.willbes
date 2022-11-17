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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/11/2817_top_bg.jpg) no-repeat center top;}

        .evt_04 {width:1120px; margin:0 auto 100px;}
        .evt_04 span.top01 {position:absolute; left:7%;bottom:70px;z-index: 10;}
        .evt_04 span.top02 {position:absolute; left:80%;bottom:70px;z-index: 10;}
        .evt_04 div {background:#77041F; margin:0 40px; border-radius:10px; padding:80px 0; color:#fff; font-size:26px; line-height:1.3}
        .evt_04 div a {display:block; width:60%; margin:30px auto 0; font-size:22px; color:#000; background:#fff; border-radius:10px; padding:20px; font-weight:bold }
        .evt_04 div a:hover {color:#fff; background:#000;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt_top" data-aos="fade-down">            
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2817_top.jpg" alt="인천윌비스 불꽃 소방팀" />     
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2817_01.jpg" alt="개편 핵심 내용" />     
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2817_02.jpg" alt="소방가산점 비율" />     
        </div>

        <div class="evtCtnsBox evt_03" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2817_03.jpg" alt="커리큘럼" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2817_04.jpg" alt="커리큘럼" />  
        </div>

        <div class="evtCtnsBox evt_04 pb100" data-aos="fade-up">
            <span class="top01" data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2022/11/2817_left.png" alt="" /></span>
            <span class="top02" data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2022/11/2817_right.png" alt="" /></span>
            <div>
                24년 소방공무원 시험도 완벽대비<br>
                <strong>인천윌비스</strong>는 여러분의 <strong>합격</strong>을 위해 <strong>최선</strong>을 다합니다.
                <a href="https://willbesedu.willbes.net/pass/offPackage/index?cate_code=3126&search_text=UHJvZE5hbWU6MjM%3D" target="_blank">23년 개편 소방반 수강신청 ></a>
                <a href="https://willbesedu.willbes.net/pass/offPackage/show/prod-code/201609" target="_blank">24년 대비 소방 관리반 수강신청(선착순 소수정예) ></a>
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