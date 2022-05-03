@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both; position:relative}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    .lecinfo {font-size:2vh; margin:50px auto; border-top:1px solid #e3e3e3; border-bottom:1px solid #e3e3e3; padding:30px; text-align:left; line-height:1.4}
    .lecinfo p {font-weight:bold; color:#f72739}
    .lecinfo a {height:40px; line-height:40px; padding-left:10px; background:#012eaf; color:#fff; font-size:1.8vh; display:inline-block; margin-top:10px }
    .lecinfo a span {background:#f72739; display:inline-block; padding:0 10px; margin-left:10px}
    .lecinfo a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}
    
    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {  
        .lecinfo a {display:block; text-align:center; padding-left:0;}
        .lecinfo a span {display:block; width:100%; margin:0; text-align:center}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
        .lecinfo a {display:block; text-align:center; padding-left:0;}
        .lecinfo a span {display:block; width:100%; margin:0; text-align:center}
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }

</style>

<div id="Container" class="Container NSK">

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2642m_top.jpg" alt="7급 PSAT 모의고사" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2642m_01_01.jpg" alt="모의고사 + 라이브 동영상" >
        <div class="lecinfo">
            [강의시간]<br>
            (실시간 라이브 동영상 수강자, 시험지 출력) 오전 8:00~8:20<br>
            (실시간 라이브 동영상 수강자, 해설지 출력) 오전 9:30~9:50<br>
            (시험) 오전 8:30~9:30 (강의) 9:50~12:00
            <p>※ 자세한 진행방식은 수강안내를 참조하시기 바랍니다. </p>               
            <a href="https://pass.willbes.net/support/notice/show/cate/3019?board_idx=335962&s_cate_code=3103" target="_blank" title="">실시간온라인모의고사+라이브동영상 <span>수강안내 바로가기 ></span></a>
        </div>
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2642m_01_02.jpg" alt="동영상 업로드 일정" />
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2642m_02.jpg" alt="수강특전" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2642m_03.jpg" alt="교수진" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2642m_04.jpg" alt="마스터 클래스" >
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
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


{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')
@stop