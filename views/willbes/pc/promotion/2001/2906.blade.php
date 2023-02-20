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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .sky {position:fixed;top:200px;right:10px;z-index:100;}
        .sky a {display:block; margin-bottom:10px}
        
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2023/02/2906_top_bg.jpg) no-repeat center top;position:relative;}    
        .evtTop a {position:absolute; bottom:250px; left:50%; margin-left:-200px}     

        .evt_02 {background:#0AAA86;position:relative;}
        .youtube {position:absolute; top:511px; left:50%;z-index:1;margin-left:-196px}
        .youtube iframe {width:605px; height:340px}

        .evt_03 {background:#F2F2F2;}

        .evt_04 {padding-bottom:100px; width:1120px; margin:0 auto}
        .evt_04 .title {font-size:30px; font-weight:bold; margin-bottom:10px; text-align:left}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#lec"><img src="https://static.willbes.net/public/images/promotion/2023/02/2906_sky.png" alt="한능검 접수 바로가기"></a>                  
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2906_top.jpg"  alt="한능검 오태진"/>
            <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51126?subject_idx=2088&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EB%8A%A5%EB%A0%A5%EA%B2%80%EC%A0%95%EC%8B%9C%ED%97%98" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/02/2906_home.png" alt="교수홈"  data-aos="fade-left"/></a>           
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2906_01.jpg" title="검정제 시행">            
        </div>
        
        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2906_02.jpg" title="한능검 준비">
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/rkkN4KuT4cQ?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>     
        </div>

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2906_03.jpg" title="수강 후기">            
        </div>

        <div class="evtCtnsBox evt_04" data-aos="fade-up" id="lec">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2906_04.jpg" title="신규 개설강좌">
            <div class="title">오태진 한국사 능력 검정시험 ></div>        
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif            
        </div>

    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });    

    </script>
      
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop