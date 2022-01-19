@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .Container {font-size:62.5%;}
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}

    .embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } 
    .embed-container iframe, 
    .embed-container object, 
    .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }




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
    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2505m_01.jpg" alt="한덕현 동사구 업데이" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2505m_02.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2505m_03.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2505m_04.jpg" alt="" >
        <div class="embed-container">
            <iframe src="https://www.youtube.com/embed/xV7WNdZ0zug?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <a href="https://www.youtube.com/watch?v=xV7WNdZ0zug&list=PLBXfMpjrxeIEqNC7pkyBjgb61nB06NjgA" target="_blank" title="공식채널" >
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2505m_04_01.jpg" alt="" > 
        </a>
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