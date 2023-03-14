@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.4; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {position:relative}
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
    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2926m_top.jpg" alt="Advanced PSAT Class"/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2926m_01.jpg" alt="">              
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2926m_02.jpg" alt="">            
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2926m_03.jpg" alt="">            
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2926m_04.jpg" alt="">            
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2926m_05.jpg" alt="">            
    </div>
    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2926m_06.jpg" alt="">    
        <a href="https://pass.willbes.net/m/pass/offLecture/index?cate_code=3143&course_idx=1436" target="_blank" title="학원실강 신청" style="position: absolute; left: 2.78%; top: 17.39%; width: 93.75%; height: 32.69%; z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/lecture/index/cate/3103/pattern/only?search_order=regist&subject_idx=&course_idx=1365&school_year=2023" target="_blank" title="온라인강의 신청" style="position: absolute; left: 2.78%; top: 52.17%; width: 93.75%; height: 32.69%; z-index: 2;"></a>        
    </div>
</div>

<!-- End Container -->

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready(function(){
        AOS.init();
    });
</script>


{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop