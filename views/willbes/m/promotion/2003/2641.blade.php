@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both; position:relative}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
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

<div id="Container" class="Container NSK">

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2641m_top.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2641m_01.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2641m_02.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2641m_03.jpg" alt="" >
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU67JiI67mE7Iic7ZmY&course_idx=" title="예비순환" target="_blank" style="position: absolute; left: 10.42%; top: 89.67%; width: 12.64%; height: 3.83%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D" title="1순환" target="_blank" style="position: absolute; left: 24.58%; top: 89.67%; width: 12.64%; height: 3.83%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D" title="2순환" target="_blank" style="position: absolute; left: 38.19%; top: 89.67%; width: 12.64%; height: 3.83%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D" title="3순환" target="_blank" style="position: absolute; left: 52.22%; top: 89.67%; width: 12.64%; height: 3.83%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D" title="4순환" target="_blank" style="position: absolute; left: 65.97%; top: 89.67%; width: 12.64%; height: 3.83%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D" title="5순환" target="_blank" style="position: absolute; left: 79.86%; top: 89.67%; width: 12.64%; height: 3.83%; z-index: 2;"></a>
        </div>
    </div> 


    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2641m_04.jpg" alt="" >
            <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="면접스터디 후기" style="position: absolute; left: 18.75%; top: 86.28%; width: 62.22%; height: 6.47%; z-index: 2;"></a>
        </div>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2641m_05.jpg" alt="" >
            <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="더 많은 합격수기 보기" style="position: absolute; left: 34.46%; top: 78.5%; width: 30.89%; height: 5.55%; z-index: 2;"></a>
        </div>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2641m_06.jpg" alt="" >
            <a href="https://pass.willbes.net/m/pass/offLecture/index?cate_code=3059" style="position: absolute; left: 26.81%; top: 77.32%; width: 48.89%; height: 7.92%; z-index: 2;"></a>
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