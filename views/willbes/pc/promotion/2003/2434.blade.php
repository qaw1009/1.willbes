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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/


        /************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/12/2434_top_bg.jpg) no-repeat center top;}
        .evt_top span.img01 {position:absolute; bottom:-80px; left:50%; margin-left:-100px;}
        .evt_top span.img02 {position:absolute; bottom:180px; left:50%; margin-left:-480px;z-index: 2;}
        .evt_02 {background:#c9c92d}
        .evt_03 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2434_03_bg.jpg) no-repeat center top;}
        .evt_04 {background:#f3f3f3; padding-bottom:150px}
    </style>

    
    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt_top">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2434_top.jpg" alt="김상범 한국사"/>  
                <a href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/50619/?subject_idx=1109" target="_blank" title="교수홈" style="position: absolute; left: 7.41%; top: 82.02%; width: 16.07%; height: 4.8%; z-index: 3;"></a>
            </div>
            <span data-aos="fade-left" class="img01"><img src="https://static.willbes.net/public/images/promotion/2021/12/2434_top_img01.png" alt="김상범 한국사"/></span>    
            <span data-aos="flip-left" class="img02"><img src="https://static.willbes.net/public/images/promotion/2021/12/2434_top_img02.png" alt="김상범 교수"/></span>       
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2434_01.jpg" alt="수강신청" />
        </div>
        
        <div class="evtCtnsBox evt_02" data-aos="fade-up">      
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2434_02.jpg" alt="무료수강 찬스" />
        </div> 

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2434_03.jpg" alt="선행과정"/>            
        </div>

        <div class="evtCtnsBox evt_04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2434_04.jpg" alt="법원팀 온라인 관리반"/>  
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