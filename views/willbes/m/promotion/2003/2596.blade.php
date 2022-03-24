@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap { margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/
    
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

    <div class="evtCtnsBox" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/03/2596_mtop.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2596_m01.jpg" alt="" >
            <a href="https://cafe.naver.com/theprosecution" target="_blank" style="position: absolute;left: 26.25%;top: 79.38%;width: 47.52%;height: 8.01%;z-index: 2;"></a>
        </div>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/03/2596_m02.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2596_m03.jpg" alt="" >
            <a href="https://cafe.naver.com/theprosecution" target="_blank" style="position: absolute;left: 11.25%;top: 58.38%;width: 12.52%;height: 18.01%;z-index: 2;"></a>
            <a href="https://www.youtube.com/channel/UC2J41ggwL4CTIJfoVBXsWkg" target="_blank" style="position: absolute;left: 33.25%;top: 58.38%;width: 12.52%;height: 18.01%;z-index: 2;"></a>
            <a href="https://open.kakao.com/o/sm2o7cVd" target="_blank" style="position: absolute;left: 53.25%;top: 58.38%;width: 14.52%;height: 18.01%;z-index: 2;"></a>
            <a href="https://www.instagram.com/willbes_prosecution_team/?r=nametag" target="_blank" style="position: absolute;left: 75.75%;top: 58.38%;width: 12.52%;height: 18.01%;z-index: 2;"></a>
        </div>    
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