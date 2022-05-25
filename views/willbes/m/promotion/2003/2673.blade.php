@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap { margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /* 이용안내 */
    .evtInfo {padding:50px 20px; background:#f4f4f4; color:#363636; line-height:1.5}
    .guide_box{text-align:left; word-break:keep-all; font-size:14px; color:#555;}
    .guide_box h2 {font-size:30px; margin-bottom:30px; color:#000}
    .guide_box dt{margin-bottom:10px; color:#fff; background:#000; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
    .guide_box dd{margin-bottom:50px;}
    .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;}
    .guide_box dd li.none {list-style:none; margin-left:0}
    .guide_box dd:last-child {margin:0}
    .evtInfo p {font-size:16px; color:#000; font-weight:bold; margin-top:30px}
    
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
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2673m_top.jpg" alt="합격설명회" />        
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2673m_01.jpg" alt="연간수강권" />  
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2673m_02.jpg" alt="참석신청 바로가기" />
            <a href="https://pass.willbes.net/m/pass/offLecture/show/cate/3149/prod-code/196776" title="" style="position: absolute; left: 6.53%; top: 90.7%; width: 86.67%; height: 3.36%; z-index: 2;"></a>
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