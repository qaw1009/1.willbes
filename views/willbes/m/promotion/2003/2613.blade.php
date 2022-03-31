@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap { margin:0 auto; position:relative}
    .evtCtnsBox .wrap a {border:1px solid #000}
    
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
        <img src="https://static.willbes.net/public/images/promotion/2022/03/2613m_top.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2613m_01.jpg" alt="" >
            <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2087" title="예비순환" target="_blank" style="position: absolute; left: 3.06%; top: 94.46%; width: 13.61%; height: 2.22%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&course_idx=1410" title="1순환" target="_blank" style="position: absolute; left: 19.44%; top: 94.46%; width: 13.61%; height: 2.22%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&course_idx=1411" title="2순환" target="_blank" style="position: absolute; left: 35.28%; top: 94.46%; width: 13.61%; height: 2.22%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&course_idx=1412" title="3순환" target="_blank" style="position: absolute; left: 51.39%; top: 94.46%; width: 13.61%; height: 2.22%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&course_idx=1413" title="4순환" target="_blank" style="position: absolute; left: 67.36%; top: 94.46%; width: 13.61%; height: 2.22%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&course_idx=1413" title="5순환" target="_blank" style="position: absolute; left: 83.61%; top: 94.46%; width: 13.61%; height: 2.22%; z-index: 2;"></a>
        </div>
    </div> 


    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2613m_02.jpg" alt="" >
            <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="더 많은 합격수기 보기" style="position: absolute; left: 34.46%; top: 78.5%; width: 30.89%; height: 5.55%; z-index: 2;"></a>
        </div>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2613m_03.jpg" alt="" >
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3035/pack/648001/prod-code/193411" target="_blank" style="position: absolute; left: 26.53%; top: 47.95%; width: 48.47%; height: 4.36%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3035/pack/648001/prod-code/193410" target="_blank" style="position: absolute; left: 26.53%; top: 88.73%; width: 48.47%; height: 4.36%; z-index: 2;"></a>
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