@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .Container {font-size:62.5%;}
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size: calc(1.4rem + (((100vw - 1.4rem) / (90 - 20))) * (2.0 - 1.4)); line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .evtCtnsBox .sec05 {
        max-width: calc(100% - 20px);
        margin:10vw auto;              
        color:#121212
    }
    .sec05 .date {font-size:90%; padding:1vw 20px; background:#f1f1f1; border-radius:20rem; display:inline-block}
    .sec05 .date span {color:#cf1e02}

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
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2399m_01.gif" alt="PSAT 석치수 무료특강" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2399m_02.jpg" alt="7급 공채 대비" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2399m_03.jpg" alt="석치수의 합격 처방전" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2399m_04.jpg" alt="참여 상품" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="sec05">
            <div class="title NSK-Black">
                <div class="date">2021.<span>11.14</span>(일) 14:00</div>
                <div>
                    7급 PSAT 합격을 위한<br>
                    석치수 자료해석 진단평가&긴급처방 무료특강
                </div>
            </div>

            <div>
            </div>
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