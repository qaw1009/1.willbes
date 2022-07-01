@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap { margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/      
    
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
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2706m_top.jpg" alt="김동진 법원팀" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-top">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2706m_01.jpg" alt="1~5순환 티패스" >
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3035/pack/648001/prod-code/199180" alt="김동진" target="_blank" style="position: absolute;left: 19.28%;top: 31.53%;width: 24.13%;height: 2.34%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3035/pack/648001/prod-code/199181" alt="이덕훈" target="_blank" style="position: absolute;left: 56.68%;top: 31.53%;width: 24.13%;height: 2.34%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3035/pack/648001/prod-code/199182" alt="문형석" target="_blank" style="position: absolute;left: 19.28%;top: 51.53%;width: 24.13%;height: 2.34%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3035/pack/648001/prod-code/199183" alt="유안석" target="_blank" style="position: absolute;left: 56.68%;top: 51.53%;width: 24.13%;height: 2.34%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3035/pack/648001/prod-code/199184" alt="이국령" target="_blank" style="position: absolute;left: 19.28%;top: 71.53%;width: 24.13%;height: 2.34%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3035/pack/648001/prod-code/199185" alt="박재현" target="_blank" style="position: absolute;left: 56.68%;top: 71.53%;width: 24.13%;height: 2.34%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3035/pack/648001/prod-code/199186" alt="박초롱" target="_blank" style="position: absolute;left: 19.28%;top: 92.03%;width: 24.13%;height: 2.34%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3035/pack/648001/prod-code/199187" alt="임진석" target="_blank" style="position: absolute;left: 56.68%;top: 92.03%;width: 24.13%;height: 2.34%;z-index: 2;"></a>
        </div>        
    </div>

    <div class="evtCtnsBox" data-aos="fade-top">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2706m_02.jpg" alt="압도적 1위" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-top">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2706m_03.jpg" alt="통행의 힘" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-top">      
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2706m_04.jpg" alt="교수진 및 순환별 맛보기 강의" >           
    </div> 
    {{--
    <div class="evtCtnsBox" data-aos="fade-top">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2706m_05.jpg" alt="동행 면접스터디" >
    </div> 
    --}}
    <div class="evtCtnsBox" data-aos="fade-top">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2706m_06.jpg" alt="절대 만족 후기" >
            <a href="http://cafe.daum.net/LAW-KDJTEAM/I7Bo" alt="더많은 합격수기 확인하기" target="_blank" style="position: absolute;left: 18.88%;top: 91.97%;width: 62.53%;height: 3.99%;z-index: 2;"></a> 
        </div>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-top">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2706m_07.jpg" alt="상품 둘러보기" >
            <a href="https://pass.willbes.net/m/promotion/index/cate/3035/code/2701" alt="2023 오프라인 학원 종합반" target="_blank" style="position: absolute;left: 25.88%;top: 27.79%;width: 48.31%;height: 2.35%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/pass/promotion/index/cate/3059/code/2119" alt="자세히 알아보기" target="_blank" style="position: absolute;left: 69.88%;top: 31.01%;width: 26.33%;height: 4.35%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/pass/promotion/index/cate/3059/code/2119" alt="2023 오프라인 온란인관리반" target="_blank" style="position: absolute;left: 25.88%;top: 47.99%;width: 48.31%;height: 2.35%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/promotion/index/cate/3035/code/2696" alt="온라인 패스" target="_blank" style="position: absolute;left: 25.88%;top: 67.69%;width: 48.31%;height: 2.35%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/package/index/cate/3035/pack/648001" alt="온라인 패키지" target="_blank" style="position: absolute;left: 25.88%;top: 94.89%;width: 48.31%;height: 2.35%;z-index: 2;"></a>
        </div>
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