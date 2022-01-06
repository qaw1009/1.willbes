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
    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2498m_01.jpg" alt="석치수의 확실한 처방!" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2498m_02.jpg" alt="올바른 방향설정" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2498m_03.jpg" alt="석치수 자료해석" >
        <a href="http://naver.me/5CvH8cmy" title="진단평가&긴급처방+정답기입" target="_blank" style="position: absolute; left: 5.83%; top: 88.63%; width: 88.06%; height: 8.1%; z-index: 2;"></a>
    </div> 
    <div class="evtCtnsBox mb50" data-aos="fade-up">
        <div class="lecwrap mt50">
            <span>학원실강+동영상</span>
            <div>
                7급 Advanced  PSAT CLASS PASS 반
                <a href="https://pass.willbes.net/m/pass/offPackage/index?cate_code=3143" target="_blank">수강신청</a>
            </div>
            <div>
                7급 석치수 자료해석 Advanced  CLASS
                <a href="https://pass.willbes.net/m/pass/offLecture/show/cate/3143/prod-code/190126" target="_blank">수강신청</a>
            </div>
            <div>
                7급 박준범 상황판단 Advanced  CLASS
                <a href="https://pass.willbes.net/m/pass/offLecture/show/cate/3143/prod-code/190127" target="_blank">수강신청</a>
            </div>
            <div>
                7급 이나우 언어논리 Advanced  CLASS  
                <a href="https://pass.willbes.net/m/pass/offLecture/show/cate/3143/prod-code/190128" target="_blank">수강신청</a>
            </div>
            <div>
                7급 한승아 언어논리 Advanced  CLASS  
                <a href="https://pass.willbes.net/m/pass/offLecture/show/cate/3143/prod-code/190129" target="_blank">수강신청</a>
            </div>
        </div>

        <div class="lecwrap mt50">
            <span>동영상</span>
            <div>
                7급 Advanced  PSAT CLASS PASS 반
                <a href="https://gosi.willbes.net/m/package/show/cate/3103/pack/648002/prod-code/190120" target="_blank">수강신청</a>
            </div>
            <div>
                7급 석치수 자료해석 Advanced  CLASS
                <a href="https://pass.willbes.net/m/lecture/show/cate/3103/pattern/only/prod-code/190115" target="_blank">수강신청</a>
            </div>
            <div>
                7급 박준범 상황판단 Advanced  CLASS
                <a href="https://pass.willbes.net/m/lecture/show/cate/3103/pattern/only/prod-code/190116" target="_blank">수강신청</a>
            </div>
            <div>
                7급 이나우 언어논리 Advanced  CLASS  
                <a href="https://pass.willbes.net/m/lecture/show/cate/3103/pattern/only/prod-code/190117" target="_blank">수강신청</a>
            </div>
            <div>
                7급 한승아 언어논리 Advanced  CLASS  
                <a href="https://pass.willbes.net/m/lecture/show/cate/3103/pattern/only/prod-code/190118" target="_blank">수강신청</a>
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