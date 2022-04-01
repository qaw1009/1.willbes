@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox span { vertical-align:top}   

    /************************************************************/

    .evt_apply {padding:50px 0;}



    </style>

    <div id="Container" class="Container NSK c_both">
        
        <div class="evtCtnsBox" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/1544m_top.jpg" alt="3순환 온라인 첨삭반">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/1544m_01.jpg" alt="강의일정 안내">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/1544m_02.jpg" alt="합격생 첨삭">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/1544m_03.jpg" alt="수험생활 관리">
        </div>

        <div class="evtCtnsBox evt_apply" data-aos="fade-up">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
            @endif
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
@stop