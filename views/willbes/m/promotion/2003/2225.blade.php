@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}    
    /*.evtCtnsBox a {border:1px solid #000} */
</style>

<div id="Container" class="Container NSK c_both">    

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/03/2225m_top.jpg" alt="공무원 웰컴팩" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2225_m01.jpg" alt="아직도 고민만 하고 계세요?" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2225_m02.jpg" alt="모든 혜택이 0원" >
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2225_m03.jpg" alt="자세히보기">
        <a href="https://pass.willbes.net/m/home/index/cate/3019" target="_blank" title="9급" style="position: absolute;left: 18%;top: 35%;width: 17.27%;height: 3.8%;z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/home/index/cate/3020" target="_blank" title="7급" style="position: absolute;left: 65%;top: 35%;width: 17.27%;height: 3.8%;z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/home/index/cate/3023" target="_blank" title="소방" style="position: absolute;left: 18%;top: 59.5%;width: 17.27%;height: 3.8%;z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/home/index/cate/3024" target="_blank" title="군무원" style="position: absolute;left: 65%;top: 59.5%;width: 17.27%;height: 3.8%;z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/home/index/cate/3028" target="_blank" title="기술직" style="position: absolute;left: 18%;top: 84%;width: 17.27%;height: 3.8%;z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/home/index/cate/3035" target="_blank" title="법원팀" style="position: absolute;left: 65%;top: 84%;width: 17.27%;height: 3.8%;z-index: 2;"></a>
    </div>   
</div>
<!-- End Container -->

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    $(document).ready(function() {
        AOS.init();
    });
</script>

@stop