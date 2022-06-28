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


        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/06/2704_top_bg.jpg) no-repeat center; height:1081px}
        .wb_top span {position:absolute; left:50%; margin-left:-473px; top:230px; width:946px; z-index: 10;}      

        .wb_02 a {display:inline-block;}

        .wb_03 {padding:150px 0}
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">
            <span data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2022/06/2704_top_img.png" alt="안다르" /></span>
		</div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2704_01.jpg" alt="콜라보 이벤트" />
		</div>

        <div class="evtCtnsBox wb_02">                
            <a href="https://www.andar.co.kr/product/list.html?cate_no=2084" target="_blank" title="안다르 회원가입" data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2022/06/2704_02_01.png" alt="" /></a>
            <a href="https://www.andar.co.kr/myshop/coupon/coupon.html" target="_blank" title="쿠폰등록" data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2022/06/2704_02_02.png" alt="" /></a>
        </div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2704_03.png"  alt="참여방법" />
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


    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop