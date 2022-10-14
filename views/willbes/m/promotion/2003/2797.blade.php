@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .Container {font-size:62.5%;}
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size: calc(1.4rem + (((100vw - 1.4rem) / (90 - 20))) * (2.0 - 1.4)); line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    /*.evtCtnsBox a {border:1px solid #000}*/

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

    <div class="evtCtnsBox" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2797m_top.jpg" alt="해설강의 제공 공지" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2797m_01.jpg" alt="실전 모의고사" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2797m_01s.jpg" alt="교수진" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2797m_02.jpg" title="모의고사 접수방법">
            <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" title="모의고사 접수하기" style="position: absolute;left: 41.99%;top: 27.73%;width: 22.53%;height: 3.89%;z-index: 2;"></a>
            <a href="https://cafe.naver.com/theprosecution" target="_blank" title="네이버 카페" style="position: absolute;left: 10.19%;top: 56.33%;width: 22.63%;height: 3.79%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3148/pattern/free?search_order=regist&course_idx=1081" target="_blank" title="해설강의 바로가기" style="position: absolute;left: 12.19%;top: 84.53%;width: 75.63%;height: 9.82%;z-index: 2;"></a>
        </div>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2797m_03.jpg" title="공식계정">
            <a href="https://cafe.naver.com/theprosecution" target="_blank" title="네이버" style="position: absolute;left: 5.99%;top: 48.73%;width: 13.03%;height: 16.79%;z-index: 2;"></a>
            <a href="https://youtube.com/channel/UC2J41ggwL4CTIJfoVBXsWkg" target="_blank" title="유튜브" style="position: absolute;left: 24.29%;top: 48.73%;width: 13.03%;height: 16.79%;z-index: 2;"></a>
            <a href="https://open.kakao.com/o/sm2o7cVd" title="카카오톡" target="_blank" style="position: absolute;left: 41.99%;top: 48.73%;width: 17.03%;height: 16.79%;z-index: 2;"></a>
            <a href="https://instagram.com/willbes_prosecution_team?r=nametag" target="_blank" title="인스타" style="position: absolute;left: 62.99%;top: 48.73%;width: 13.03%;height: 16.79%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/intro/index" target="_blank" title="윌비스 공무원" style="position: absolute;left: 80.99%;top: 48.73%;width: 14.03%;height: 16.79%;z-index: 2;"></a>
        </div>
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