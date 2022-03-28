@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .evt04 {padding:5% 0; text-align:left}
    .evt04 h4 {font-size:2.8vh; text-align:center; margin-bottom:3%}
    .evt04 div.NSK-Black {margin:0 20px; font-size:2.4vh;}


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
    <div class="evtCtnsBox"  data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/03/2603m_top.jpg" alt="4월 신규가입 이벤트" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/03/2603m_01.jpg" alt="경찰전문강의 20년" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/03/2603m_02.jpg" alt="웰컴팩" >
        <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" title="웰컴팩 모두 받기" style="position: absolute; left: 7.5%; top: 82.5%; width: 85%; height: 8.71%; z-index: 2;"></a>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/03/2603m_03.jpg" alt="" >
    </div>  

    <div class="evtCtnsBox evt04" data-aos="fade-up">
        <h4 class="NSK-Black">4월 추천 강좌</h4>
        <div class="NSK-Black">2022/23년 대비 온라인 기본이론 신청 👇</div>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif 
        <div class="NSK-Black">2022/23년 대비 온라인 심화이론 신청 👇</div>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
        @endif 
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


@stop