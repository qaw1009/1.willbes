@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.4; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {position:relative}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .evt_top {position:relative;}
    .evt_top a {position:absolute; bottom:16%; left:50%; margin-left:25%;}
    
    .evt02 .youtube {position:relative; padding-top:30px; padding-bottom:56.25%; margin:0; height:0;background: #0AAA86;} 
    .evt02 .youtube iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%; z-index: 2;}

    .evt_04 .title {font-size:25px; font-weight:bold;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
    .evt_04 .title {font-size:16px;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) { 
    .evt_04 .title {font-size:19px;}   
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
    .evt_04 .title {font-size:22px;}
    }

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evt_top" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2906m_top.jpg"  alt="한능검 오태진"/>
    </div>

    <div class="evtCtnsBox evt_01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2906m_01.jpg" title="검정제 시행">          
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2906m_02.jpg" alt="한능검 준비"/>  
        <div class="youtube">
            <iframe src="https://www.youtube.com/embed/rkkN4KuT4cQ?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>        
    </div>

    <div class="evtCtnsBox evt_03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2906m_03.jpg" title="수강 후기">            
    </div>

    <div class="evtCtnsBox evt_04" data-aos="fade-up" id="lec">
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2906m_04.jpg" title="신규 개설강좌">
        <div class="title">오태진 한국사 능력 검정시험 ></div>        
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
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

<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript">   

</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop