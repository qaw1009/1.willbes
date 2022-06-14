@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {position:relative; width:100%; max-width:720px; margin:0 auto; text-align:center; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    .evtTop p {color:#e80127; margin-bottom:10px}
    .evtTop .shinyBtn a {position: relative; overflow: hidden; display:block; width:80%; margin:0 auto; background:#e80127; color:#fff; font-size:2vh; padding:15px; text-align:center; border-radius:30px}
    .evtTop .shinyBtn a:after{
        content:'';
        position: absolute;
        top:0;
        left:0;
        background-color: #fff;
        width: 100%;
        height: 100%;
        z-index: 1;
        transform: skewY(129deg) skewX(-60deg);
    }
    .evtTop .shinyBtn a:after{animation:shinyBtn 3s ease-in-out infinite;}

    @@keyframes shinyBtn {
        0% { transform: scale(0) rotate(45deg); opacity: 0.1; }
        80% { transform: scale(0) rotate(45deg); opacity: 0.5; }
        81% { transform: scale(4) rotate(45deg); opacity: 0.8; }
        100% { transform: scale(50) rotate(45deg); opacity: 0.1; }
    }
   
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

    <div class="evtCtnsBox evtTop" data-aos="fade-down">            
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2679m_top.jpg" alt="공무원 룰렛이벤트" />
        <p>* 룰렛이벤트 참여는 PC버전에서만 가능합니다.</p>
        <div class="shinyBtn">
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2679" target="_blank">PC버전으로 이벤트 참여하기 ></a>    
        </div>  
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">         
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2679m_01.gif" alt="신규가입하기" />
            <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2003" target="_blank" style="position: absolute; left: 30.28%; top: 37.22%; width: 32.5%; height: 32.77%; z-index: 2;"></a>
        </div> 
    </div>

    <div class="evtCtnsBox event02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2679m_02.jpg" alt="소문내기 이벤트" />
    </div>
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.m.promotion.show_comment_list_url_partial')
    @endif

    <div class="evtCtnsBox event02" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2679m_03.jpg" alt="공무원 패스" />
            <a href="https://pass.willbes.net/m/home/index/cate/3019" title="9급" target="_blank" style="position: absolute; left: 6.39%; top: 16.97%; width: 42.36%; height: 24.03%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/home/index/cate/3103" title="7급" target="_blank" style="position: absolute; left: 51.11%; top: 16.97%; width: 42.36%; height: 24.03%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/home/index/cate/3023" title="소방" target="_blank" style="position: absolute; left: 6.39%; top: 42.36%; width: 42.36%; height: 24.03%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/home/index/cate/3024" title="군무원" target="_blank" style="position: absolute; left: 51.11%; top: 42.36%; width: 42.36%; height: 24.03%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/home/index/cate/3028" title="기술직" target="_blank" style="position: absolute; left: 6.39%; top: 68.24%; width: 42.36%; height: 24.03%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/home/index/cate/3035" title="법원팀" target="_blank" style="position: absolute; left: 51.11%; top: 68.24%; width: 42.36%; height: 24.03%; z-index: 2;"></a>
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