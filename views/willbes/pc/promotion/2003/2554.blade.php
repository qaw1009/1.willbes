@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top;}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        .sky {position:fixed;top:100px; right:10px ;width:140px; text-align:center; z-index:100;}    
        .sky a {display: block; margin-bottom:10px}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/03/2554_top_bg.jpg) no-repeat center top; height: 1026px;}
        .wb_top .wrap {width:1016px; position: absolute; left:50%; margin-left:-508px; top:150px; z-index: 1;}

        .wb_01 {padding-top:150px;}
        .wb_02 {background:#9831ff}
        .wb_02 a {position: absolute; left: 50%; top: 1390px; width:280px; margin-left:80px; height:50px; line-height:46px; z-index: 2; background:#141414; border:2px solid #000; border-radius:20px; color:#fed541; font-size:20px; font-weight:bold}
        .wb_02 a:hover {color:#000; background:#fed541; }

        .wb_03 {background:url(https://static.willbes.net/public/images/promotion/2022/04/2554_03_bg.jpg) no-repeat center top;}

        .evt_apply {width:570px; margin:90px auto 0;}
        .evt_apply a {display:block; font-size:28px; color:#fff; padding:25px; background:#000; border-radius:50px;}
        .evt_apply a:hover {background:#533fd1}
        .evt_apply span {color:#ffec67;}

        .wb_05 {padding:100px 0;}
        .wb_05 .sTitle {margin:0 0 30px; font-size:30px; text-align:left; color:#9831ff}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">          
            <a href="#lecbuy01"><img src="https://static.willbes.net/public/images/promotion/2022/03/2554_sky.png" alt="조경직 티패스" /></a>
            <a href="#lecbuy02"><img src="https://static.willbes.net/public/images/promotion/2022/04/2554_sky2.png" alt="" /></a>       
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <div class="wrap" data-aos-delay="500" data-aos="zoom-in-down">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2554_top.png" alt="조경직 이윤주"/>
                <a href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/51359?subject_idx=1222" target="_blank" title="교수홈" style="position: absolute; left: 72.15%; top: 61.96%; width: 23.03%; height: 6.17%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2554_01.jpg" alt="적극적인 채용"/>           
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up" id="lecbuy01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2554_02.jpg" alt="수강신청" />
                <a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/free/prod-code/191918" target="_blank">지금 바로 신청하기 ></a>
            </div>            
        </div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up" id="lecbuy02">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2554_03.jpg" alt="수강후기 이벤트" />
        </div>      

        <div class="evtCtnsBox wb_04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2554_04.jpg" alt="이벤트 기간" />
        </div>
        
        <div class="evtCtnsBox evt_review" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2554_review.png" alt="수강 후기" />
        </div>   

        <div class="evt_apply NSK-Black" data-aos="fade-up">
            <a href="https://www.willbes.net/classroom/on/list/ongoing" target="_blank" alt="수강후기 쓰기"><span>지금 바로 무료강좌 수강하고</span> 수강후기 쓰기 ></a>
        </div>   

        <div class="evtCtnsBox wb_05" data-aos="fade-up" id="lecbuy02">
            <div class="wrap">
                <div class="sTitle NSK-Black">단과 수강신청</div>           
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif
            </div>    
        </div> 
    </div>
    <!-- End Container -->


    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $(document).ready(function() {
        AOS.init();
      });
    </script>
@stop