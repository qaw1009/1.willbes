@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox.wrap {position:relative}
    /*.evtCtnsBox.wrap a {border:1px solid #000}*/

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2735m_top.jpg" alt="w아카데미" />
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2735m_01.jpg" alt="시설안내" />
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2735m_02.jpg" alt="혜택 및 제공" />
            <a href="https://m.blog.naver.com/pwjg85/222783521989" target="_blank" title="제휴고시식당" style="position: absolute;left: 2.53%;top: 17.44%;width: 94.93%;height: 15.19%;z-index: 2;"></a>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSf4tbxQj7FcxPG2vEDh0VE4kGS_4h8n8t_B66dK8CEYzs6q5Q/viewform?usp=sf_link" target="_blank" title="사전조사서 작성 바로기기" style="position: absolute;left: 10.23%;top: 75.34%;width: 78.99%;height: 2.39%;z-index: 2;"></a>
            <a href="https://naver.me/GZ0UmeUa" target="_blank" title="체험이벤트 신청" style="position: absolute;left: 2.53%;top: 85.44%;width: 94.93%;height: 8.89%;z-index: 2;"></a>
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