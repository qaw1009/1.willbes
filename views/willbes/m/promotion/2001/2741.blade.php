@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5);}*/

    .evt06 {text-align:left}
    .evt06 .title {font-size:25px; font-weight:bold; margin-left:20px;padding:50px 0;}

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evt_top" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2741m_top.jpg"  alt="지텔프 지니" />        
    </div>

    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2741m_01.jpg" alt="곧 공개"/>
            <a href="https://police.willbes.net/m/professor/show/cate/3001/prof-idx/51397?subject_idx=2012&subject_name=G-TELP" target="_blank" title="교수 홈 바로가기" style="position: absolute;left: 34.31%;top: 37.19%;width: 31.58%;height: 5.04%;z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2741m_02.jpg" alt="맞춤 수업"/>       
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2741m_03.jpg" alt="why?"/>       
    </div>

    <div class="evtCtnsBox evt04" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2741m_04.jpg" alt="지텔프 43점"/>       
    </div>

    <div class="evtCtnsBox evt05" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2741m_05.jpg" alt="한방에 졸업하자"/>       
    </div>

    <div class="evtCtnsBox evt06 pb50" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2741m_06.jpg" alt="신규 개설 강좌" >  
        <div class="title">제니 G-TELP 단과강의 신청 ></div>   
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2741m_06_cms.jpg" alt="곧 공개됩니다" >
        {{--         
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif
        --}}
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