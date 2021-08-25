@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .dday {font-size:24px !important; padding:10px; background:#f5f5f5; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#000; font-size:14px !important;}

    .video-container {position:relative; padding-top:30px; padding-bottom:56.25%; margin:0 20px; height:0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

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

    <div class="evtCtnsBox"  data-aos="fade-left">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div> 

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2334m_top.jpg" alt="심화이론반" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-left">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2334m_01.jpg" alt="9월 스타트" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2334m_02.jpg" alt="심화이론 포인트" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-left">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2334m_03.jpg" alt="스페셜 단과" >
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif
    </div> 

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2334m_04.jpg" alt="스페셜 패키지" >
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
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

<script type="text/javascript">

</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')
@stop