@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .wb_01 span {position:absolute; left:0; top:-20vh; width:100%; text-align:center; z-index: 2;}
    .wb_01 span img {max-width:469px; width:60%}
    .wb_03 {background:#ffcf00; padding-bottom:10vh}
    .wb_03 a {display:block; width:80%; margin:3vh auto 0; font-size:2.2vh; background:#000; color:#fff; padding:2vh 0; text-align:center; border-radius:50px; animation: colorBlink 1s ease-in-out infinite}
    .wb_04 {background:#335ce8;}

    @@keyframes colorBlink {
        0% {background:#335ce8;}
        80% {background:#000;}
        100% {background:#335ce8;}
    }
         

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .wb_01 span {top:-10vh;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
        .wb_01 span {top:-15vh;}
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }
</style>

<div id="Container" class="Container NSK c_both">  
    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2694m_top.jpg" alt="기초입문 무료배포" >
    </div> 

    <div class="evtCtnsBox wb_01" data-aos="fade-up">
        <span data-aos="fade-down-left" data-aos-duration="500"><img src="https://static.willbes.net/public/images/promotion/2022/06/2694_top_img.png" alt=""/> </span>
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2694m_01.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2694m_02.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox wb_03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2694m_03.jpg" alt="" >
        <a href="https://pass.willbes.net/m/package/show/cate/3019/pack/648001/prod-code/198488" class="NSK-Black">지금 바로 무료로 받기 ▶</a>  
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2694m_04.jpg" alt="" > 
    </div> 

    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.m.promotion.show_comment_list_url_partial')
    @endif
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