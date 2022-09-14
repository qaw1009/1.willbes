@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5);}*/

    .evt01 .youtube {position:relative; padding-top:30px; padding-bottom:56.25%; margin:0; height:0;background: #000;} 
    .evt01 .youtube iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%; z-index: 2;}  


    .evt05 {text-align:left}
    .evt05 .title {font-size:3vh; font-weight:bold; margin-left:20px}
        

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
    <div class="evtCtnsBox evtTop" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2737m_top.jpg" alt="경찰학 우찬"/>
    </div>

    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2737m_01.jpg" alt="젋고 쉽고 새로운 경찰학"/>
        <div class="youtube">
            <iframe src="https://www.youtube.com/embed/DNmn4xIMyTU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2737m_01_01.jpg" alt=""/>
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2737m_02.jpg" alt="학습요령"/>
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2737m_03.jpg" alt="커리큘럼"/>
    </div>

    <div class="evtCtnsBox evt04" data-aos="fade-up"> 
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2737m_04.jpg" title="경찰학">
    </div>

    <div class="evtCtnsBox evt05" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2737m_05.jpg" alt="신규 개설 강좌" >  
        <div class="title">박우찬 경찰학 단과강의 신청 > </div>   
        {{--<img src="https://static.willbes.net/public/images/promotion/2022/08/2737m_05_01.jpg" alt="곧 공개" > --}}
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
        @endif  
        <div class="title mt50">박우찬 경찰학 무료강의 신청 > </div>   
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif    
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