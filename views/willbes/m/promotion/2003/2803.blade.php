@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .Container {font-size:62.5%;}
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size: calc(1.4rem + (((100vw - 1.4rem) / (90 - 20))) * (2.0 - 1.4)); line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    /*.evtCtnsBox a {border:1px solid #000}*/

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
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2803m_top.jpg" alt="상담신청 바로가기" >
            <a href="http://open.kakao.com/o/s3fKkLrc" target="_blank" title="바로가기" style="position: absolute;left: 7.99%;top: 64.73%;width: 84.23%;height: 13.39%;z-index: 2;"></a>            
        </div>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2803m_01.jpg" alt="상담이 필요한 학생" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2803m_02.jpg" alt="상담 고고" >
            <a href="http://open.kakao.com/o/s3fKkLrc" target="_blank" title="바로가기" style="position: absolute;left: 7.89%;top: 63.73%;width: 84.23%;height: 8.09%;z-index: 2;"></a>            
        </div>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2803m_03.jpg" alt="합격 윌비스" >           
    </div>

</div>

<!-- End Container -->

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready( function() {
        AOS.init();
    });    
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop