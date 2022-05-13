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
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2658m_top.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2658m_01.jpg" alt="" >
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU67JiI67mE7Iic7ZmY&course_idx=" title="예비순환" target="_blank" style="position: absolute; left: 3.06%; top: 95.66%; width: 13.61%; height: 2.22%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D" title="1순환" target="_blank" style="position: absolute; left: 19.44%; top: 95.66%; width: 13.61%; height: 2.22%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D" title="2순환" target="_blank" style="position: absolute; left: 35.28%; top: 95.66%; width: 13.61%; height: 2.22%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D" title="3순환" target="_blank" style="position: absolute; left: 51.39%; top: 95.66%; width: 13.61%; height: 2.22%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D" title="4순환" target="_blank" style="position: absolute; left: 67.36%; top: 95.66%; width: 13.61%; height: 2.22%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D" title="5순환" target="_blank" style="position: absolute; left: 83.61%; top: 95.66%; width: 13.61%; height: 2.22%; z-index: 2;"></a>
        </div>
    </div> 


    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2658m_02.jpg" alt="" >
            <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="더 많은 합격수기 보기" style="position: absolute; left: 34.46%; top: 79.5%; width: 30.89%; height: 5.55%; z-index: 2;"></a>
        </div>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2658m_03.jpg" alt="" >
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3035/pack/648001/prod-code/195716" target="_blank" style="position: absolute; left: 20.97%; top: 46.36%; width: 60.28%; height: 4.2%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3035/pack/648001/prod-code/195715" target="_blank" style="position: absolute; left: 20.97%; top: 87.94%; width: 60.28%; height: 4.2%; z-index: 2;"></a>
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