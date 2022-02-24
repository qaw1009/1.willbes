@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            background:#fff;
            position:relative;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/      

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/2358_top_bg.jpg) center top no-repeat;}   

        .evt01 {position:relative;}
        .youtube {position:absolute; top:425px; left:50%;}
        .youtube iframe {width:537px; height:297px}

        .evt03 {background:#D5DFE9;}

        .evt05 {padding-bottom:100px;}
     
    </style>

    <div class="evtContent NSK" id="evtContainer">   

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2358_top.jpg" title="저스티스 범죄학" />       
        </div>       

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2358_01.jpg"  alt="범죄학의 정석" />
                <a href="https://police.willbes.net/professor/show/cate/3002/prof-idx/51278?subject_idx=2178&subject_name" target="_blank" title="교수님_홈" style="position: absolute;left: 72.98%;top: 75.03%;width: 11.46%;height: 7.27%;z-index: 2;"></a>
            </div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/8T1HxQ5PPhQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2358_02.jpg"  alt="무엇을 어떻게" />
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2358_03.jpg"  alt="커리큘럼" />
        </div>
        
        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2358_06.jpg"  alt="100프로무료" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif  
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2358_05.jpg"  alt="100프로무료" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif  
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
 