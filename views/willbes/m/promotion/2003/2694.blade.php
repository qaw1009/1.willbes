@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .wb_01 span {position:absolute; left:0; top:-20vh; width:100%; text-align:center; z-index: 2;}
    .wb_01 span img {max-width:469px; width:60%}
    .wb_03 {background:#ffcf00; padding-bottom:10vh}
    .wb_03 a {display:block; width:80%; margin:3vh auto 0; font-size:2.2vh; background:#000; color:#fff; padding:2vh 0; text-align:center; border-radius:50px; animation: colorBlink 1s ease-in-out infinite}
    .wb_04 {background:#335ce8;}

    /* 이용안내 */
    .wb_info {padding:50px 20px; color:#3a3a3a; line-height:1.4; background:#f4f4f4}
    .guide_box{text-align:left; word-break:keep-all}
    .guide_box h2 {font-size:3vh; margin-bottom:30px;}
    .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:18px;}        
    .guide_box dd{color:#3a3a3a; margin:0 0 20px 5px;}
    .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:1.5vh;font-weight:bold;}

    @@keyframes colorBlink {
        0% {background:#335ce8;}
        80% {background:#000;}
        100% {background:#335ce8;}
    }
         

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .wb_01 span {top:-10vh;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
        .wb_01 span {top:-15vh;}
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }
</style>

<div id="Container" class="Container NSK c_both">  
    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2694m_top.jpg" alt="기초입문 무료배포" >
    </div> 

    <div class="evtCtnsBox wb_01" data-aos="fade-up">
        <span data-aos="fade-down-left" data-aos-duration="500"><img src="https://static.willbes.net/public/images/promotion/2022/06/2694_top_img.png" alt=""/> </span>
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2694m_01.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2694m_02.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox wb_03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2694m_03.jpg" alt="" >
        <a href="https://pass.willbes.net/m/package/show/cate/3019/pack/648001/prod-code/199343" class="NSK-Black">지금 바로 무료로 받기 ▶</a>  
    </div> 

    @if(empty($arr_base['display_product_data']) === false)
        @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
    @endif

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2694m_04.jpg" alt="" > 
    </div> 

    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.m.promotion.show_comment_list_normal_partial')
    @endif

    <div class="evtCtnsBox wb_info" id="info">
        <div class="guide_box">
            <h2 class="NSK-Black">이벤트 유의사항</h2>
            <dl>
                <dd>
                    <ol>
                        <li>본 이벤트는 2022년 7월 31일까지 진행됩니다.</li>
                        <li>이벤트 대상 강좌 리스트 (*수강기간 30일)<br>
                        · 2023 오대혁 국어 기초입문 강의<br>
                        · 한덕현 영어 기초입문 강의 [쌩기초 탈출 프로젝트]<br>
                        · 2023 김상범 한국사 기초입문 강의<br>
                        · 2023 김철 행정학 기초입문 강의<br>
                        · 2023 이윤호 회계학 기초입문 강의<br>
                        · 2023 박창한 세법 기초입문 강의<br>
                        · 2023 이석준 소방행정법 기초입문 강의<br>
                        · 2023 이종오 소방학개론 기초입문 강의<br>
                        · 2023 이종오 소방관계법규 기초입문 강의<br>
                        · 2023 이윤주 조경직 기초입문 강의<br>
                        · 2023 윤용범 가축사양학 기초입문 강의<br>
                        · 2023 윤용범 가축육종학 기초입문 강의</li>
                        <li>원하는 강좌를 선택 후 0원으로 결제한 후 [내강의실]-[수강중강의]에서 수강할 수 있습니다.</li>
                        <li>같은 내용을 반복적으로 작성하거나 수강후기와 연관없는 댓글로 이벤트 참여 시 무통보 삭제 및 이벤트 정상 참여로 인정되지 않습니다.</li>
                    </ol>
                </dd>
            </dl>
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