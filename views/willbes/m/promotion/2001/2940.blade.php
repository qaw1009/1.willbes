@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14vh; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/ 

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evt_top" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2940m_top.jpg"  alt="기출분석반" />        
    </div>

    <div class="evtCtnsBox evt01" id="evt_01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2940m_01.jpg" alt="선택 아닌 필수"/>       
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2940m_02.jpg" alt="커리큘럼"/>       
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2940m_03.jpg" title="획인하기"> 
        <a href="https://police.willbes.net/m/pass/offinfo/boardInfo/index/80" title="강의시간표 확인" target="_blank" style="position: absolute;left: 18.75%;top: 85.82%;width: 61.94%;height: 7.22%;z-index: 2;"></a>     
    </div>

    <div class="evtCtnsBox mt50" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2940m_04_01.jpg" title="스페셜 단과"/>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif
    </div>

    <div class="evtCtnsBox mt50" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2940m_04_02.jpg" title="스페셜 페키지"/>  
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
        @endif       
    </div> 

</div>

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready( function() {
    AOS.init();
    });
</script>



@stop