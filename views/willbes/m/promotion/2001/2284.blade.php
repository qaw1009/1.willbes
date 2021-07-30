@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    .evtCtnsBox .wrap a:hover {box-shadow:0 5px 20px rgba(0,0,0,.5); border-radius:6px}

    .evtCtnsBox .title {color:#2a2a2a; font-size:30px;}
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
    <div class="evtCtnsBox evt00" data-aos="fade-left">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/2284m_top.jpg" alt="경찰헌법"/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-left">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/2284m_01.jpg" alt="헌법이란"/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/2284m_02.jpg" alt="헌법을 이해하기 힘든 이유"/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-left">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/2284m_03.jpg" alt="헌법의 틀"/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2284m_04.jpg" alt="헌법 학습"/>
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2284" title="pc페이지로 이동" target="_blank" style="position: absolute;left: 10.42%;top: 74.69%;width: 78.89%;height: 14.95%;z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox" data-aos="fade-left">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2284m_05.jpg" alt="할인쿠폰 받기"/>
            <a href="javascript:void(0);" title="쿠폰" style="position: absolute;left: 10.42%;top: 81.19%;width: 78.89%;height: 10.95%;z-index: 2;"></a>
        </div>    
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">    
        <img src="https://static.willbes.net/public/images/promotion/2021/07/2284m_06.jpg"  alt="경찰 헌법 강의 신청"/>        
        <div class="title NSK-Black">경찰 헌법 강의 신청 ></div>        
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif      
    </div>

</div>	

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    $( document ).ready( function() {
    AOS.init();
    } );
</script>


@stop