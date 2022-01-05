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
        
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2022/01/2499_top_bg.jpg) no-repeat center top;}
        .event01 {width:1120px; margin:0 auto 100px;}
        .event01 div {background:#b60300; margin:0 40px; border-radius:10px; padding:80px 0; color:#fff; font-size:26px; line-height:1.3}
        .event01 div a {display:block; width:60%; margin:30px auto 0; font-size:22px; color:#000; background:#fff; border-radius:50px; padding:20px; font-weight:bold }
        .event01 div a:hover {color:#fff; background:#000;}
    </style>


    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2499_top.jpg" alt="인천윌비스 불꽃 소방팀" />     
        </div>

        <div class="evtCtnsBox event01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2499_01.jpg" alt="2023년 과목개편"/>
            <div>
                23년 소방공무원 시험도 완벽대비<br>
                <strong>인천윌비스</strong>는 여러분의 <strong>합격</strong>을 위해 <strong>최선</strong>을 다합니다.
                <a href="https://willbesedu.willbes.net/pass/offPackage/index?cate_code=3126" target="_blank">23년 개편 소방반 수강신청 ></a>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>



@stop
