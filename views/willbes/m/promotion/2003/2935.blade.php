@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox.wrap {position:relative}
    /*.evtCtnsBox.wrap a {border:1px solid #000}*/

    .evt03 {background:#f4f4f4; padding-bottom:4vh}
    .evt04 {background:#000; padding-bottom:4vh}

    .shinyBtn {margin:0 5%;}
    .shinyBtn a {display:block; padding:1.8vh 0; font-size:2.6vh; color:#fff; background:#db4346;  border-radius:0.6vh; overflow:hidden; position: relative; margin-bottom:1vh}
    .shinyBtn a:hover {color:#fd9d1e; background:#000; }
    .shinyBtn a:after{
        content:'';
        position: absolute;
        top:0;
        left:0;
        background-color: #fff;
        width: 30px;
        height: 100%;
        z-index: 1;
        transform: skewY(129deg) skewX(-60deg);
    }
    .shinyBtn a:after{animation:shinyBtn 2s ease-in-out infinite;}
    @@keyframes shinyBtn {
        0% { transform: scale(0) rotate(45deg); opacity: 0; }
        80% { transform: scale(0) rotate(45deg); opacity: 0.2; }
        81% { transform: scale(4) rotate(45deg); opacity: 0.5; }
        100% { transform: scale(60) rotate(45deg); opacity: 0; }
    } 

    .youtubeWrap {position:relative; padding-bottom:56.25%; overflow: hidden; margin-top:-20px !important}
    .youtubeWrap iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

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
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2935m_top.jpg" alt="" />
    </div>

    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2935m_01.jpg" alt="" /> 
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2935m_02.jpg" alt="" />
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2935m_03.jpg" alt="" />
        <div class="shinyBtn NSK-Black">                
            <a href="#none" onclick="javascript:alert('준비중입니다.');">교재구매 바로가기 ></a>
        </div>
    </div>

    <div class="evtCtnsBox evt04" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2935m_04_01.jpg" alt="" />
        <div class="youtubeWrap">
            <iframe src="https://www.youtube.com/embed/qzgc1l4EtGA?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="shinyBtn NSK-Black mt30">                
            <a href="https://pass.willbes.net/m/professor/show/cate/3023/prof-idx/51439?subject_idx=2261" target="_blank">단과구매 ></a>
            <a href="#none" onclick="javascript:alert('준비중입니다.');">T-PASS 구매 ></a>
        </div> 
    </div>

    <div class="evtCtnsBox evt05" data-aos="fade-up">       
        <div class="youtubeWrap">
            <iframe src="https://www.youtube.com/embed/qzgc1l4EtGA?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div> 
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2935m_05.jpg" alt="" />
    </div>
</div>

<!-- End Container -->

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready(function() {
        AOS.init();
    });
</script>

@stop