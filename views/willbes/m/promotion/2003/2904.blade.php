@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/
</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox wb_top"  data-aos="fade-up">            
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2904m_top.jpg" alt="7급 티패스" />            
    </div>

    <div class="evtCtnsBox wb_cts01"  data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2904m_01.jpg" alt=""/>
    </div>

    <div class="evtCtnsBox mb50 wb_cts02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2904m_02.jpg" alt=""/>
        <a href="https://pass.willbes.net/m/package/show/cate/3020/pack/648002/prod-code/205440" target="_blank" title="선동주 헌법" style="position: absolute; left: 15%; top: 22.19%; width: 31.11%; height: 26.09%; z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3020/pack/648002/prod-code/205441" target="_blank" title="이승민 행정법" style="position: absolute; left: 54.31%; top: 22.19%; width: 31.11%; height: 26.09%; z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3020/pack/648002/prod-code/205442" target="_blank" title="김철 행정학" style="position: absolute; left: 15%; top: 57.61%; width: 31.11%; height: 26.09%; z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3020/pack/648002/prod-code/205443" target="_blank" title="박태천 경제학" style="position: absolute; left: 54.31%; top: 57.61%; width: 31.11%; height: 26.09%; z-index: 2;"></a>
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

@stop




