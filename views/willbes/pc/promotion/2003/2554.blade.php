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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/08/2554_top_bg.jpg) no-repeat center top; height:1250px;}
        .evt_top .main_img {position:absolute; top:350px; left:50%; margin-left:60px}
        .evt_top a {position:absolute; top:870px; left:50%; margin-left:200px}

        .wb_02 {background:#dedede}

        .wb_03 {background:#fcc016}     
        .evt_apply {width:770px; margin:0 auto;}
        .evt_apply a {display:block; font-size:32px; color:#ffeb01; padding:25px; background:#000500; border-radius:20px;text-align:center;}
        .evt_apply a:hover {background:#0467d4;color:#fff;}

        .wb_04 {padding:100px 0;}
        .wb_04 .sTitle {margin:0 0 30px; font-size:30px; text-align:left; color:#0467d4}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        {{--
        <div class="sky" id="QuickMenu">          
            <a href="#lecbuy01"><img src="https://static.willbes.net/public/images/promotion/2022/03/2554_sky.png" alt="생물학 이벤트" /></a>               
        </div>
        --}}
        
        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2554_top_img.png"  alt="생물학 강치욱" data-aos="fade-down" class="main_img"/>
            <a href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/51359?subject_idx=1222" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/08/2554_top_btn.png" alt="교수홈"  data-aos="fade-left"/></a>     
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2554_01.jpg" alt="자신있게 추천"/>           
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2554_02.jpg" alt="수강 후가"/>           
        </div>

        <div class="evtCtnsBox wb_03 pb100" data-aos="fade-up" id="lecbuy01">           
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2554_03.jpg" alt="1+1 이벤트" />
            <div class="evt_apply NSK-Black">
                <a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/200304" target="_blank" alt="수강후기 쓰기">지금 바로 1+1 EVENT 참여하기 ></a>
            </div>                   
        </div>
        
        

        <div class="evtCtnsBox wb_04" data-aos="fade-up" id="lecbuy02">
            <div class="wrap">
                <div class="sTitle NSK-Black">단과 수강신청</div>           
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif
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