@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

		/************************************************************/

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/07/2729_top_bg.jpg) no-repeat center top;}
        .evtCtnsBox a {display:block; width:1000px; margin:0 auto; background:#1b30b0; color:#fff; font-size:40px; text-align:center; padding:20px 0; border-radius:60px}
        .evtCtnsBox a:hover {background:#000; box-shadow:0 10px 20px rgba(0,0,0,.5);}
        .evtCtnsBox {margin-bottom:30px}
        .evt_02 {margin-bottom:150px}
        .evt_02 a {background:#8a4cf9;}
       
        /************************************************************/

    </style>

	<div class="evtContent NSK">

		<div class="evtCtnsBox evt_top" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/07/2729_top.jpg" alt="노무사 2차 대비 실전모의고사" />
		</div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2729_01.jpg" alt="접수방법" />
            <a href="https://job.willbes.net/pass/offPackage/index?cate_code=3111" class="NSK-Black">학원 실전모의고사 신청 ></a>
		</div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2729_02.jpg" alt="모의고사 문제지 구매" />
            <a href="https://job.willbes.net/lecture/index/cate/309002/pattern/only?search_order=regist&course_idx=1114" class="NSK-Black">실전모의고사 문제지 구매 ></a>
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