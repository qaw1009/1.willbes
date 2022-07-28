@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;} 

    /************************************************************/

    .evtCtnsBox a {display:block; width:90%; margin:0 auto; background:#1b30b0; color:#fff; font-size:3.8vh; text-align:center; padding:15px 0; border-radius:60px}
    .evtCtnsBox a:hover {background:#000; box-shadow:0 10px 20px rgba(0,0,0,.5);}
    .evtCtnsBox {margin-bottom:30px}
    .evt_02 {margin-bottom:150px}
    .evt_02 a {background:#8a4cf9;}

    /* 폰 가로, 태블릿 세로*/     
    @@media only screen and (max-width: 374px)  {

}
/* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       

    }
/* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {

    }

    </style>

    <div id="Container" class="Container NSK c_both">

        <div class="evtCtnsBox evt_top" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/07/2729m_top.jpg" alt="김영식 경제학" />
		</div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/07/2729m_01.jpg" alt="김영식 교수" />
            <a href="https://job.willbes.net/m/pass/offPackage/index?cate_code=3111" class="NSK-Black">학원 실전모의고사 신청 ></a>
		</div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/07/2729m_02.jpg" alt="경제학원론 대비 포인트" />
            <a href="https://job.willbes.net/m/lecture/index/cate/309002/pattern/only?search_order=regist&course_idx=1114" class="NSK-Black">실전모의고사 문제지 구매 ></a>
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