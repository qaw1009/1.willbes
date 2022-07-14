@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/
    
    .evt00 {padding-top:15%; background:#273238}
    .video-container-box {padding:0 5%}
    .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;}
    .video-container iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}  

    .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
    .slide_con .bx-wrapper .bx-pager {        
        width: auto;
        left:0;
        right:0;
        text-align: center;
        z-index:90;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
        background: #ccc;
        width: 14px;
        height: 14px;
        margin: 0 4px;
        border-radius:10px;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover, 
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #e85b4a;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 30px;
    }

  

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
        <img src="https://static.willbes.net/public/images/promotion/2021/08/1068m_top.jpg" alt="장사원" > 
    </div> 
    
    <div class="evtCtnsBox evt00"  data-aos="fade-up">
        <div class="video-container-box">
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/chEceiSyKOg?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <img src="https://static.willbes.net/public/images/promotion/2021/08/1068m_00.jpg" alt="합격 전략의 중심" > 
    </div> 

    <div class="evtCtnsBox evt01s" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/1068m_01.jpg" alt="합격 전략의 중심" > 
        <div class="slide_con">
            <ul id="slidesImg1">
                <li><img src="https://static.willbes.net/public/images/promotion/2020/08/1068m_01_01.png" alt=""/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/08/1068m_01_02.png" alt=""/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/08/1068m_01_03.png" alt=""/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/08/1068m_01_04.png" alt=""/></li>
            </ul>
        </div> 
    </div> 
    
    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/1068m_02.jpg" alt="농업직 4관왕" > 
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2022/07/1068m_06.gif" alt="농촌지도사 이론 패키지" >
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/198483" target="_blank" title="기본/심화이론 패키지" style="position: absolute; left: 13.75%; top: 50.61%; width: 30.14%; height: 3.25%; z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/198575" target="_blank" title="7급 농업직 이론 패키지" style="position: absolute; left: 55.56%; top: 50.61%; width: 30.14%; height: 3.25%; z-index: 2;"></a>

        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/199703" target="_blank" title="농촌지도사 이론 패키지" style="position: absolute; left: 13.89%; top: 87.74%; width: 30.14%; height: 3.25%; z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/199704" target="_blank" title="농촌지도사 이론 패키지 경기인천" style="position: absolute; left: 56.94%; top: 87.74%; width: 30.14%; height: 3.25%; z-index: 2;"></a>
    </div>   

    <div class="evtCtnsBox" data-aos="fade-up">
        <a href="https://pass.willbes.net/m/professor/show/cate/3028/prof-idx/50429/?subject_idx=1171" target="_blank">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/1068m_07.jpg" alt="단과" > 
        </a>
    </div>
</div>

<!-- End Container -->
<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript"> 
    $(document).ready(function() {
        var slidesImg1 = $("#slidesImg1").bxSlider({
            auto: true, 
            speed: 500, 
            pause: 4000, 
            mode:'fade', 
            autoControls: false, 
            controls:false,
            pager:true,
        });        
    });
</script>

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