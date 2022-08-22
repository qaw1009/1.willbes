@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap {position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/
    .evt01 {background:#2b2c31}
    .evt01 div {padding:0 3% 5%}

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2749m_top.jpg" alt="법원팀 동행5기 169명 최종합격" />
    </div>

    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2749m_01.jpg" alt="" />
        <div>
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2749_01_txt.png"/>
        </div>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2749m_02.jpg" alt="" />
            <a href="https://pass.willbes.net/m/promotion/index/cate/3035/code/2701" title="학원종합반" style="position: absolute; left: 3.75%; top: 83.45%; width: 45.28%; height: 11.65%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/promotion/index/cate/3035/code/2696" title="온라인패스" style="position: absolute; left: 50.69%; top: 83.45%; width: 45.28%; height: 11.65%; z-index: 2;"></a>
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