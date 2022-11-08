@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14vh; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .youtubeWrap {position:relative; padding-bottom:56.25%; overflow: hidden; margin-top:-20px !important}
    .youtubeWrap iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    .wb_cts02 {margin-bottom:50px;}
</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox wb_top"  data-aos="fade-down">            
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2804m_top_01.jpg" alt="W 아카데미" /> 
        <div class="youtubeWrap">
            <iframe src="https://www.youtube.com/embed/hHymjMNgFis" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div> 
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2804m_top_02.jpg" alt="W 아카데미" />           
    </div>

    <div class="evtCtnsBox wb_cts01"  data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2804m_01.jpg" alt="3가지 제시"/>
        <a href="http://cafe.daum.net/W-academy" target="_blank" title="다음카페" style="position: absolute; left: 5.42%; top: 46.94%; width: 25.83%; height: 3.56%; z-index: 2;"></a>
        <a href="https://naver.me/GZ0UmeUa" target="_blank" title="체험신청" style="position: absolute; left: 36.53%; top: 46.94%; width: 25.83%; height: 3.56%; z-index: 2;"></a>
        <a href="https://open.kakao.com/o/swY4iaxe" target="_blank" style="position: absolute; left: 68.33%; top: 46.94%; width: 25.83%; height: 3.56%; z-index: 2;"></a>
    </div>

    <div class="evtCtnsBox wb_cts01_special"  data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2804m_02.jpg" alt="시간표"/>
    </div>

    <div class="evtCtnsBox mb50 wb_cts02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2804m_03.jpg" alt="혜택 및 제공"/>
    </div>

    <div class="evtCtnsBox wb_cts04"  data-aos="fade-up" >
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2804m_04.jpg" alt="신청안내"/>
        <a href="https://open.kakao.com/o/swY4iaxe" title="상담 신청" target="_blank" style="position: absolute; left: 9.17%; top: 76.99%; width: 31.67%; height: 5.41%; z-index: 2;"></a>
        <a href="https://naver.me/GZ0UmeUa" title="체험신청" target="_blank" style="position: absolute; left: 58.47%; top: 76.99%; width: 31.67%; height: 5.41%; z-index: 2;"></a>
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




