@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox.wrap {position:relative}
    /*.evtCtnsBox.wrap a {border:1px solid #000}*/

    .evt01 {margin:50px 10px; font-size:1.8vh; line-height:1.3;}
    .evt01 div {padding:20px 0; text-align:left; border-bottom:1px solid #d4d4d4; position:relative; color:#737373; letter-spacing:-1px}
    .evt01 p {font-size:2vh}
    .evt01 p strong {color:#000}
    .evt01 a {padding:5px 10px; border-radius:10px; background:#00997f; color:#fff; position:absolute; right:0; top:25px; text-align:center; font-size:1.8vh;}
    .evt01 a:hover {background:#000}
    
    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .evt01 a {display:block; position: relative; margin-top:5px; top:0}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
        .evt01 a {display:block; position: relative; margin-top:5px; top:0}
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }

</style>

<div id="Container" class="Container NSK c_both">
    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/07/2722m_top.jpg" alt="김동진 법원팀" />
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/07/2722m_01.jpg" alt="김동진 법원팀" />
    </div>        

    <div class="evt01" data-aos="fade-left">
        <div>
            <p>2023 대비 <strong>법원직 동행6기 전체설명회</strong></p>
            진행 : 김동진 교수
            <a href="javascript:fnMobile('https://www.willbes.net/m/Player/getMobileSample/?m=&id=&p=199878&u=1368411&q=HD', '70FBCADA-CE5A-4786-BCD3-960EAC8B4EA1');">바로가기 👉</a>
        </div>
        <div>
            <p>2023 대비 <strong>법원직 동행6기 생활규칙안내</strong></p>
            진행 : 문형석 교수
            <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/free/prod-code/199879">바로가기 👉</a>
        </div>
        <div>
            <p>2023 대비 <strong>법원직 민법 커리큘럼안내</strong></p>
            진행 : 김동진 교수
            <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/free/prod-code/199881">바로가기 👉</a>
        </div>
        <div>
            <p>2023 대비 <strong>법원직 민사소송법 커리큘럼안내</strong></p>
            진행 : 이덕훈 교수
            <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/free/prod-code/199882">바로가기 👉</a>
        </div>
        <div>
            <p>2023 대비 <strong>법원직 형법 커리큘럼안내</strong></p>
            진행 : 이덕훈 교수
            <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/free/prod-code/199883">바로가기 👉</a>
        </div>
        <div>
            <p>2023 대비 <strong>법원직 형사소송법 커리큘럼안내</strong></p>
            진행 : 유안석 교수
            <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/free/prod-code/199884">바로가기 👉</a>
        </div>
        <div>
            <p>2023 대비 <strong>법원직 헌법 커리큘럼안내</strong></p>
            진행 : 이국령 교수
            <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/free/prod-code/199886">바로가기 👉</a>
        </div>
        <div>
            <p>2023 대비 <strong>법원직 국어 커리큘럼안내</strong></p>
            진행 : 박재현 교수
            <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/free/prod-code/199888">바로가기 👉</a>
        </div>
        <div>
            <p>2023 대비 <strong>법원직 영어 커리큘럼안내</strong></p>
            진행 : 박초롱 교수
            <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/free/prod-code/199889">바로가기 👉</a>
        </div>
        <div>
            <p>2023 대비 <strong>법원직 한국사 커리큘럼안내</strong></p>
            진행 : 임진석 교수
            <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/free/prod-code/199890">바로가기 👉</a>
        </div>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/07/2722m_02.jpg" alt="김동진 법원팀" />
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