@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .Container {font-size:62.5%;}
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}

    .lecwrap {font-size:14px; border:3px solid #1e1e1e; padding:30px; position: relative; text-align:left; margin:0 20px}
    .lecwrap > span {background:#1e1e1e; color:#fff; font-size:18px; padding:8px 20px; position:absolute; top:-20px; left:10px; width:auto; border-radius:30px; z-index: 2;}
    .lecwrap > div {border-bottom:1px solid #ccc; padding:15px 0; position: relative;}
    .lecwrap > div a {display:inline-block; background:#2a4aaa; color:#fff; padding:5px 10px; text-align:center; position:absolute; right:0; top:10px;}
    .lecwrap > div:last-child {border:0}


    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .lecwrap {padding:15px;}
        .lecwrap > div a {display:block; position:static; width:90px; margin-top:5px}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {  
        .lecwrap {padding:15px;}     
        .lecwrap > div {padding-right:80px}
        .lecwrap > div a {margin:0}
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }
</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2498m_01.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2498m_02.jpg" alt="" >
        <a href="https://pass.willbes.net/m/support/notice/show/cate/3019?board_idx=335962&s_cate_code=3103" title="" target="_blank" style="position: absolute; left: 23.83%; top: 48.53%; width: 55.06%; height: 3.1%; z-index: 2;"></a>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2498m_03.jpg" alt="" >
       
    </div> 
    <div class="evtCtnsBox mb50" data-aos="fade-up">
        <div class="lecwrap mt50">
            <span>학원실강+동영상</span>
            <div>
                7급 PSAT MASTER CLASS PASS반
                <a href="https://pass.willbes.net/m/pass/offPackage/index?cate_code=3143" target="_blank">수강신청</a>
            </div>
            <div>
                7급 PSAT MASTER CLASS 단과반
                <a href="https://pass.willbes.net/m/pass/offLecture/index?cate_code=3143" target="_blank">수강신청</a>
            </div>         
        </div>

        <div class="lecwrap mt50">
            <span>동영상</span>
            <div>
                7급 PSAT MASTER CLASS PASS반
                <a href="https://pass.willbes.net/m/package/show/cate/3103/pack/648002/prod-code/194897" target="_blank">수강신청</a>
            </div>
            <div>
                7급 PSAT MASTER CLASS 단과반
                <a href="https://pass.willbes.net/m/userPackage/show/cate/3103/prod-code/194900" target="_blank">수강신청</a>
            </div>
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