@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap { margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    .wb_tops {background:#251c1a; padding:50px 0}
    .pass_apply {margin:0 20px;}
    .pass_apply a {display:block; font-size:2.5vh; color:#000; padding:20px; background:#fff; border-radius:5px; box-shadow:10px rgba(0,0,0,.5);}
    .pass_apply a:hover {background:#ffdc4e;color:#000;}
    
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
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2600m_top.jpg" alt="검찰직 무료입문특강" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <a href="javascript:fnPlayerSample('193420', '1348889', 'HD');">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2600m_01.jpg" alt="공개일정" >
        </a>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2600m_02.jpg" alt="관리형 종합반" > 
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2600m_03.jpg" alt="체계적인 시스템" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2600m_04.jpg" alt="체계적인 시스템" >
    </div>

    <div class="evtCtnsBox wb_tops"> 
        <div class="pass_apply NSK-Black">
            <a href="https://pass.willbes.net/m/lecture/index/cate/3148/pattern/free?search_order=regist&course_idx=1078" target="_blank">수강신청 바로가기 ></a>
        </div>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2600m_05.jpg" alt="공식 계정" >    
            <a href="https://cafe.naver.com/theprosecution" title="네이버카페" target="_blank" style="position: absolute; left: 7.64%; top: 56.34%; width: 17.5%; height: 20.34%; z-index: 2;"></a>
            <a href="https://www.youtube.com/channel/UC2J41ggwL4CTIJfoVBXsWkg" title="유튜브" target="_blank" style="position: absolute; left: 29.03%; top: 56.34%; width: 17.5%; height: 20.34%; z-index: 2;"></a>
            <a href="https://open.kakao.com/o/sm2o7cVd" title="카카오톡" target="_blank" style="position: absolute; left: 50.56%; top: 56.34%; width: 17.5%; height: 20.34%; z-index: 2;"></a>
            <a href="https://www.instagram.com/willbes_prosecution_team/?r=nametag" title="인스타" target="_blank" style="position: absolute; left: 73.75%; top: 56.34%; width: 17.5%; height: 20.34%; z-index: 2;"></a>               
        </div>
    </div> 

</div>

<!-- End Container -->

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    $(document).ready(function() {
    AOS.init();
    });
</script>


{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')
@stop