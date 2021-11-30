@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/11/2433_top_bg.jpg) no-repeat center top} 

        .evt02 {background:#65778d}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2433_04_bg.jpg) no-repeat center top;padding-bottom:100px;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop" data-aos="fade-down">
            <div class="wrap">       
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2433_top.jpg" alt="오대혁 국어"/>
                <a href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/50157?subject_idx=1107" title="교수님홈 바로가기" target="_blank" style="position: absolute;left: 30.25%;top: 72.99%;width: 17.3%;height: 5.25%;z-index: 2;"></a>
            </div>       
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2433_01.jpg" alt="망설이지 마세요"/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2433_02.jpg" alt="정통 커리큘럼"/>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2433_03.jpg" alt="후기"/>
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2433_04.jpg" alt="결제하기"/>
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

@stop