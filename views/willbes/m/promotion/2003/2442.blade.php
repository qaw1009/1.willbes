@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .Container {font-size:62.5%;}
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size: calc(1.4rem + (((100vw - 1.4rem) / (90 - 20))) * (2.0 - 1.4)); line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}

    .evtInfoBox {text-align:left; line-height:1.5; padding:10vw 20px; background:#e4e4e4; color:#555; font-size:55%}
    .evtInfoBox h4 {margin-bottom:10px; font-size:140%}
    .evtInfoBox .infoTit {margin-bottom:10px}
    .evtInfoBox ul {margin-bottom:15px}
    .evtInfoBox li {list-style-type:none; margin-left:20px; margin-bottom:5px}
    .evtInfoBox .free{color:#e44900;}
    .evtInfoBox span {color:#fff; padding:0 2px}


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
        <img src="https://static.willbes.net/public/images/promotion/2021/12/2442m_top.jpg" alt="PSAT 석치수 무료특강" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/12/2442m_01.jpg" alt="석치수의 확실한 처방!" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/12/2442m_02.jpg" alt="올바른 방향설정" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/12/2442m_03.jpg" alt="석치수 자료해석" >
        <a href="" title="진단평가&긴급처방+정답기입" target="_blank" style="position: absolute; left: 5.83%; top: 88.63%; width: 88.06%; height: 8.1%; z-index: 2;"></a>
    </div> 
    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/12/2442m_04_01.jpg" alt="석치수 자료해석 진단평가&긴급처방 무료특강" >
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif
        <img src="https://static.willbes.net/public/images/promotion/2021/12/2442m_04_02.jpg" alt="오직psat자료해석만을 위한 13년간의 강의" >
    </div> 

    <!-- <div class="evtCtnsBox" data-aos="fade-up">
        <div class="evtInfoBox">
            <h4 class="NSK-Black">특강 정보</h4>
            <div class="infoTit"><strong>● 특강 취지</strong></div>
            <ul>
                <li>자료해석 풀이 방식에 대한 문제점을 발견하여 해결하고, 자신의 약점에 대한 구체적인 처방을 통해 2022년 7급 공채 <strong>必! 합격을 실현</strong></li>                    
            </ul>  
            <div class="infoTit"><strong>● 문제 구성 방식</strong></div>
            <ul>
                <li>PSAT 자료해석 빈출 유형으로 구성함을 원칙으로 <strong>본인의 확실한 실력을 확인할 수 있도록 상, 중, 하의 난이도 문제를 모두 포함하여 출제</strong></li>                                    
            </ul>
            <div class="infoTit"><strong>● 수강대상</strong></div>
            <ul>
                <li>1. 지금까지 응시한 진단평가에서 <strong>자신의 위치나 약점을 정확하게 확인할 수 없었던 수험생</strong></li>
                <li>2. 자료해석 공부 방법에 대해 <strong>확실한 가이드라인이 필요한 수험생</strong></li>
                <li>3. 아무리 공부를 해도 자료해석 <strong>실력이 늘지 않아 불안한 수험생</strong></li>
                <li>4. 2022년 7급 공채 자료해석 <strong>고득점을 원하는 수험생</strong></li>                       
            </ul>                     
            <div class="infoTit"><strong>● 수강특전</strong></div>
            <ul>   
                <li class="free">※ 정답기입&설문조사 참여자 무료제공!</li><br>
                <li> 1. 2022년 대비 석치수의 합격하는 <strong>7급 자료해석 기본서(2022년)</strong> 무료제공</li>
                <li> 2. <strong>자료해석 동영상강의 15% 할인쿠폰</strong> 증정</li>
                <li> 3. <strong> 2021년 7급 공채 자료해석 해설</strong> 무료제공</li>
                <li>4. <strong>2021년 5급 공채 자료해석 해설</strong> 무료제공</li>
                <li>5. <strong>2021년 민간경력 자료해석 해설</strong> 무료제공</li>
                <li>6. <strong>긴급처방 25문제 실전모의고사 단권화자료</strong>(복습용) 무료제공</li>
                <li>7.<strong> 긴급처방 25문제 실전모의고사 해설 + 유사기출 문제</strong> 모음</li>
                <li>8. 석치수의 합격하는 <strong>주요 개념 확인 노트</strong> 무료제공</li>
                <li>9. 전체문항 필기자료 무료제공</li>
                <li>10. 석치수의 <strong>합격하는 처방전</strong> 무료제공</li>
                <li>* 무료 제공 교재는 강사가 직접 구입하여 무료제공됩니다.</li>      
            </ul>                      
        </div>        
    </div> -->
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