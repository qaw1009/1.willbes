@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap {position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/
    .evt03 {background:#010E2D}
    .evt03 div {padding:2% 5% 10%;}
    
</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2798m_top.jpg" alt="3~4순환 개강" />
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2798m_01.jpg" alt="윌비스 검찰팀" />
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2798m_02.jpg" alt="집중풀이 과정" />
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2798m_03.jpg" alt="최종합격률" />
        <div>
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2798_pass.png"/>
        </div>
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