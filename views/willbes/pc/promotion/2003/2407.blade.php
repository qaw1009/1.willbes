@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/11/2407_top_bg.jpg) no-repeat center;}

        .evt01 {background:#e1db13;}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2407_04_bg.jpg) no-repeat center;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">    

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2407_top.jpg" alt="백전불패 영어 장량"/>
                <a href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/51299?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99" target="_blank" title="홈 바로가기" style="position: absolute;left: 67.61%;top: 74.66%;width: 18.89%;height: 6.49%;z-index: 2;"></a>
            </div>                            
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2407_01.jpg" alt="무엇이 문제" />
        </div>                   

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2407_02.jpg" alt="후기" />    
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">           
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2407_03.jpg" alt="커리큘럼" />             
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2407_04.jpg" alt="신청하기" />   
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/187229" target="_blank" title="지금바로 신청하기" style="position: absolute;left: 24.61%;top: 70.66%;width: 25.89%;height: 8.49%;z-index: 2;"></a>
            </div> 
        </div>

    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );
    </script>


    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop