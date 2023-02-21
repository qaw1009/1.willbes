@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.4; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {position:relative}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .evt_top {position:relative;}
    .evt_top a {position:absolute; bottom:16%; left:50%; margin-left:25%;}   
   
    .evt_01s .title {font-size:25px; font-weight:bold;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
    .evt_01s .title {font-size:16px;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) { 
    .evt_01s .title {font-size:19px;}   
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
    .evt_01s .title {font-size:22px;}
    }

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evt_top" data-aos="fade-down">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2908m_top.jpg"  alt="불어라 합격의 봄바람"/>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3103/pattern/only?search_order=regist&subject_idx=&course_idx=1365" title="결제 바로가기" style="position: absolute;left: 0%;top: 92.05%;width: 50.25%;height: 6.56%;z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox evt_01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2908m_01.jpg" title="전문과목">              
    </div>

    <div class="evtCtnsBox evt_01s pt50" data-aos="fade-up">           
        <div class="title">GS1 + GS2 순환 추가 수강 ></div>        
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif            
    </div>

    <div class="evtCtnsBox evt_02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2908m_02.jpg" title="특별 할인 이벤트">            
    </div>

</div>

<!-- End Container -->

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
</script>

<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript">   

</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop