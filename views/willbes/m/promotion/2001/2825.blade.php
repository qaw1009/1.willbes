@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.4; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {position:relative}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .evt_top {position:relative;}
    .evt_top a {position:absolute; bottom:16%; left:50%; margin-left:25%;}

    .evt01 .youtube {position:relative; padding-top:30px; padding-bottom:56.25%; margin:0; height:0;background: #000;} 
    .evt01 .youtube iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%; z-index: 2;}

    .evt05 {background:#F5F5F5; padding-bottom:8vh}
    .slide_con {padding:0 30px 30px}
    .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
    .slide_con .bx-wrapper .bx-pager {
        width: auto;
        bottom: -30px;
        left:0;
        right:0;
        text-align: center;
        z-index:90;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
        background: #ccc;
        width: 14px;
        height: 14px;
        margin: 0 4px;
        border-radius:10px;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover,
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #2D57A3;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 30px;
    }

     /*레이어팝업*/
     .Pstyle {
        opacity: 0;
        display: none;
        position: relative;
        width: auto;
    }
    .b-close {
        right: 10px;
        top: 50px;
        padding: 5px;
        display: inline-block;
        cursor: pointer;
    }
    .Pstyle .content {height:auto; width:auto;}

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

    <div class="evtCtnsBox evt_top" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_top.jpg" alt="경찰학 김재규" >
        <a href="https://police.willbes.net/m/professor/show/cate/3001/prof-idx/51424?subject_idx=2128&subject_name=" target="_blank">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_top_btn.png" alt="교수홈"/>
        </a>
    </div> 

    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_01.jpg" alt="고득점 형사법"/>
        <div class="youtube">
            <iframe src="https://www.youtube.com/embed/ojZcGpQXrcs?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_01_01.jpg" alt=""/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_02.jpg"  alt="합격률"/>               
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_03.jpg"  alt="커리큘럼"/>               
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_04.jpg"  alt="경찰학 교재"/>  
            <a href="javascript:go_popup1()" title="핵심 서브노트" style="position: absolute;left: 39.96%;top: 45.25%;width: 15.69%;height: 3.19%;z-index: 2;"></a>
            <a href="javascript:go_popup2()" title="21개년 총알기출 ox" style="position: absolute;left: 39.96%;top: 66.45%;width: 15.69%;height: 3.19%;z-index: 2;"></a>
            <a href="javascript:go_popup3()" title="플러스 100제" style="position: absolute;left: 39.96%;top: 87.65%;width: 15.69%;height: 3.19%;z-index: 2;"></a>
        </div>             
    </div>

    <div class="evtCtnsBox evt05" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_05.jpg" alt="리얼 수강후기" >
        <div class="slide_con">
            <ul id="slidesImg2">
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment01.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment02.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment03.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment04.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment05.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment06.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment07.png" alt="" /></li>                
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment08.png" alt="" /></li>               
            </ul>
        </div>
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_06.jpg"  alt="그레이스 호퍼 명언"/>               
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_07.jpg"  alt="후회없는 선택"/>               
    </div>

     <!--레이어팝업-->
     <div id="popup1" class="Pstyle">
        <span class="b-close"></span>
        <div class="content1">                  
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_textbook01.png" class="off" alt="" />    
        </div> 
    </div>    
    <div id="popup2" class="Pstyle">
        <span class="b-close"></span>   
        <div class="content2">         
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_textbook02.png" class="off" alt="" />  
        </div> 
    </div>
    <div id="popup3" class="Pstyle">    
        <span class="b-close"></span>
        <div class="content3">            
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_textbook03.png" class="off" alt="" />  
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

<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
<script type="text/javascript">

    /*슬라이드*/
    $(document).ready(function() {
        var slidesImg1 = $("#slidesImg2").bxSlider({
            auto: true,
            speed: 500,
            pause: 4000,
            mode:'horizontal',
            autoControls: false,
            controls:false,
            pager:true,
        });
    });

    /*레이어팝업*/
    function go_popup1() {
            $('#popup1').bPopup();
        }   
        function go_popup2() {
            $('#popup2').bPopup();
        }
        function go_popup3() {
            $('#popup3').bPopup();
        }

</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop