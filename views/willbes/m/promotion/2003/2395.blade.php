@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both; position:relative}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    .dday {font-size:2.5vh; padding:10px; background:#ebebeb; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#3a99f0; font-size:1.5vh;}

    
    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {  
        .dday a {padding:5px 10px;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {

    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }

</style>

<div id="Container" class="Container NSK">
    <div class="evtCtnsBox dday NSK-Thin">
        <strong>0원 배포까지 <span id="ddayCountText" class="NSK-Black"></span> </strong>
        <a href="#evt01">신청하기 ></a>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2395m_top.jpg" alt="7급 PSAT 모의고사" >
            <a href="#evt01" title="원데이 특강 신청하기" style="position: absolute; left: 28.19%; top: 21.17%; width: 45.28%; height: 4.15%; z-index: 2;"></a>
        </div>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2395m_01.jpg" alt="모의고사 + 라이브 동영상" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up" id="evt01">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2395m_02.jpg" alt="마스터 클래스" >
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif
    </div> 

</div>

<!-- End Container -->

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
      $(document).ready(function() {
        AOS.init();
      });

    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
    });
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop