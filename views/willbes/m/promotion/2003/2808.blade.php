@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .Container {font-size:62.5%;}
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size: calc(1.4rem + (((100vw - 1.4rem) / (90 - 20))) * (2.0 - 1.4)); line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .wb_cts05 {background:#E1E9FF;padding-bottom:50px;}

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
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2808m_01.jpg" alt="선착순" >        
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2808m_02.jpg" alt="gs-1순환" >
            <a href="https://pass.willbes.net/m/pass/offLecture/index?cate_code=3143&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D" target="_blank" title="gs1 순환 바로가기" style="position: absolute;left: 0.99%;top: 91.73%;width: 48.53%;height: 4.89%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/pass/offPackage/show/prod-code/202350" target="_blank" title="2차 올패스 바로가기" style="position: absolute;left: 50.29%;top: 91.73%;width: 48.53%;height: 4.89%;z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">       
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2808m_04.jpg" alt="통합관리 시스템" >        
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2808m_05.jpg" alt="커리큘럼" >           
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2808m_05_cycle.jpg" alt="순환별 커리큘럼" >           
    </div>

    <div class="evtCtnsBox wb_cts05" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2808m_05s.jpg" alt="학습효과 극대화" >           
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2808m_06.jpg" alt="7급 하격을 위한 초격차 전략" >           
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2808m_07.jpg" alt="학습 프로그램" >
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

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop