@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .evt03 {background:#010111}
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
        margin: 0 3px;
        border-radius:10px;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover,
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #d5c15e;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 30px;
    }

    /*탭(이미지)*/
    .tabs{width:100%; text-align:center; padding-bottom:20px;}
    .tabs ul {width:1120px;margin:0 auto;padding-top:60px;}		
    .tabs li {display:inline; float:left;padding-right:20px;}  
    .tabs ul:after {content:""; display:block; clear:both}

    .evt_m08 .sTitle {margin:50px 0 30px; font-size:20px; text-align:left; color:#464646}
    .evt_m08 span {vertical-align:top;}

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
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_mtop.jpg" alt="" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-top">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m01.jpg" alt="" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-top">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m02.jpg" alt="" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-top">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m03.jpg" alt="" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-top">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m04.jpg" alt="" >
            <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/171830" target="_blank" title="신광은 경찰 패스" style="position: absolute;left: 25.44%;top: 48.95%;width: 50.78%;height: 4.71%;z-index: 2;"></a>
            <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/184584" target="_blank" title="신광은 경찰 패스" style="position: absolute;left: 25.44%;top: 89.45%;width: 50.78%;height: 4.71%;z-index: 2;"></a>
        </div>     
    </div>

    <div class="evtCtnsBox" data-aos="fade-top">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m05.jpg" alt="" >
            <a href="javascript:void(0)" title="14일 무료체험" style="position: absolute;left: 2.44%;top: 67.95%;width: 34.78%;height: 19.71%;z-index: 2;"></a>
            <a href="https://police.willbes.net/m/promotion/index/cate/3001/code/2390" target="_blank" title="신광은 경찰 패스" style="position: absolute;left: 11.44%;top: 91.65%;width: 80.78%;height: 5.71%;z-index: 2;"></a>
        </div>    
    </div>

    <div class="evtCtnsBox" data-aos="fade-top">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m06.jpg" alt="" >        
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m06_btn.jpg" title="플래너 6종 다운로드" />
            <a href="javascript:alert('PC 사이트를 이용해주세요.\nhttps://police.willbes.net/promotion/index/cate/3001/code/2416')" title="플래너 다운로드" style="position: absolute;left: 29.55%;top: 18.99%;width: 41.3%;height: 31.51%;z-index: 2;"></a>        
        </div>     
    </div>

    <div class="evtCtnsBox" data-aos="fade-top">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m07.jpg" alt="" >
        <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="홍보 이미지 받기" style="position: absolute;left: 28.55%;top: 15.99%;width: 43.3%;height: 40.51%;z-index: 2;"></a>
        <div class="slide_con">
            <ul id="slidesImg2">
                <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m07_01.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m07_02.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m07_03.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m07_04.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m07_05.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m07_06.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m07_07.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m07_08.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m07_09.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m07_10.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m07_11.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m07_12.png" alt="" /></li>
            </ul>
        </div>
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m07_btn.jpg" title="배경화면 다운로드" />
            <a href="javascript:alert('PC 사이트를 이용해주세요.\nhttps://police.willbes.net/promotion/index/cate/3001/code/2416')" title="배경화면 다운로드" style="position: absolute;left: 28.55%;top: 16.99%;width: 43.3%;height: 40.51%;z-index: 2;"></a>
        </div>  
    </div>

    <div class="evtCtnsBox evt_m08" data-aos="fade-top">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m08.jpg" alt="" >
        <div class="sTitle NSK-Black">2022대비 온라인 <span>심화기출</span> 신청</div>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif
        <div class="sTitle NSK-Black">2022대비 온라인 <span>기본이론</span> 신청</div>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
        @endif        
    </div>   

</div>
<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
</form>
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
<script type="text/javascript">
    var $regi_form = $('#regi_form');

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

      /*탭(이미지버전)*/
      $(document).ready(function(){
            $('.tabs ul').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                //$active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault()
                });
            });
        });
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop