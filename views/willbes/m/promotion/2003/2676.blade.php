@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap { margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    .event02 {background:#e4d8c8; padding-bottom:100px}
    .event02 a {width:94%; margin:0 auto; display: block; font-size:2.8vh; background:#003b39; color:#fff; padding:20px 0; border-radius:60px}
    .event02 a:hover {background:#000}
    
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
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2676m_top.jpg" alt="장학생 선발 모의고사" />        
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2676m_01.jpg" alt="윌비스 검찰팀" />  
    </div>

    <div class="evtCtnsBox event02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2673m_02_01.jpg" alt="커리큘럼" />
        <a href="https://pass.willbes.net/m/pass/offLecture/show/cate/3149/prod-code/196775" title=""><strong>장학생 선발 모의고사 </strong> 응시신청 →</a>
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